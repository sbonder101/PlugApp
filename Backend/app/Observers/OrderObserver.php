<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Mail\OrderUpdateMail;
use App\Models\AutoAssignment;
use App\Models\PackageTypePricing;
use App\Services\JobHandlerService;
use App\Services\OrderEarningService;
use App\Traits\FirebaseAuthTrait;
use App\Traits\FirebaseDBTrait;
use App\Traits\OrderFCMTrait;
use App\Traits\OrderTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{

    use FirebaseDBTrait, FirebaseAuthTrait;
    use OrderTrait, OrderFCMTrait;

    public function creating(Order $model)
    {
        // logger("Pending Order", [$model]);
        if ((bool) setting('enableNumericOrderCode')) {
            $model->code = $this->generateOrderCode(10);
            $model->verification_code = $this->generateOrderCode(5, $check = false);
        } else {
            $model->code = Str::random(10);
            $model->verification_code = $this->generateRandomString(5);
        }
        if (empty($model->user_id)) {
            $model->user_id = Auth::id();
        }

        if (empty($model->payer)) {
            $model->payer = true;
        }
    }

    public function created(Order $model)
    {
        //sending notifications base on status change of the order
        $this->sendOrderUpdateMail($model);
        $this->autoMoveToReady($model);
        $this->autoMoveToPreparing($model);
        $this->clearAutoAssignment($model);
        $this->pushOrderToFCM($model);

        //for taxi booking
        if (!empty($model->taxi_order)) {
            (new JobHandlerService())->uploadTaxiOrderJob($model);
        }
    }

    public function updating(Order $model)
    {
        //sending notifications base on status change of the order
        //driver id changed
        // if ($model->isDirty('driver_id')) {
        //     (new JobHandlerService())->orderFCMNotificationJob($model, 3);
        // }

        //payment_status
        if (in_array($model->status, ['delivered', 'completed']) && $model->payment_method != null && $model->payment_method->is_cash) {
            $model->payment_status = "successful";
        }
    }

    public function updated(Order $model)
    {
        //sending notifications base on status change of the order
        //driver id changed
        if ($model->isDirty('driver_id')) {
            (new JobHandlerService())->orderFCMNotificationJob($model, 3);
        }
        //payment request notification 
        $this->paymentRequestNotification($model);
        //
        $model->refresh();
        $this->sendOrderUpdateMail($model);
        $orderEarningService = new OrderEarningService();
        $orderEarningService->updateEarning($model);

        $model->refundUser();
        $this->updatePaymentStatus($model);
        $this->autoMoveToReady($model);
        $this->autoMoveToPreparing($model);
        $this->clearAutoAssignment($model);
        $this->pushOrderToFCM($model);
        $this->clearFirestore($model);


        //for taxi booking
        if (!empty($model->taxi_order)) {
            (new JobHandlerService())->uploadTaxiOrderJob($model);
        }

        //revert qty of cancelled order
        $this->resetOrderQty($model);
    }

    //
    public function sendOrderUpdateMail($model)
    {
        //only delivered
        if (in_array($model->status, ['delivered'])) {
            //send mail
            try {
                \Mail::to($model->user->email)
                    ->cc([$model->vendor->email])
                    ->send(new OrderUpdateMail($model));
            } catch (\Exception $ex) {
                // logger("Mail Error", [$ex]);
                logger("Mail Error");
            }
        }
    }

    public function autoMoveToReady(Order $order)
    {

        //
        $packageTypePricing = PackageTypePricing::where([
            "vendor_id" => $order->vendor_id,
            "package_type_id" => $order->package_type_id,
        ])->first();

        //
        if (
            in_array($order->status, ["pending", "preparing"])
            && ($packageTypePricing->auto_assignment ?? 0)
            && ($order->payment_method != null && $order->payment_method->is_cash || $order->payment_status == "successful")
        ) {
            // logger("Auto move to ready kicked in");
            $order->setStatus("ready");
        }
    }

    public function autoMoveToPreparing(Order $order)
    {

        if (
            in_array($order->status, ["pending"])
            && ($order->vendor->auto_accept ?? 0)
            && ($order->payment_method != null && $order->payment_method->is_cash || $order->payment_status == "successful")
        ) {
            $order->setStatus("preparing");
        }
    }

    public function paymentRequestNotification(Order $order)
    {

        if ($order->isDirty('payment_status') && $order->payment_status == "request") {
            (new JobHandlerService())->orderPaymentRequestNotificationJob($order);
        }
    }




    function updatePaymentStatus($order)
    {
        //update payment_status after order is completed by driver or vendor
        $user = User::find(\Auth::id() ?? 0);
        if (
            !empty($user) && $user->hasAnyRole("admin|manager|driver") &&
            in_array($order->status, ["successful", "completed", "delivered"]) &&
            $order->payment_method != null && $order->payment_method->is_cash
        ) {
            $order->payment_status = "successful";
            $order->saveQuietly();
        }

        //calculate earning incase you missed it 
        $orderEarningService = new OrderEarningService();
        $orderEarningService->updateEarning($order);
    }
}
