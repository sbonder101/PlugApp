<?php

namespace App\Services;

use App\Jobs\DriverDetailsJob;
use App\Jobs\DriverVehicleTypeJob;
use App\Jobs\OrderStatusNotificationJob;
use App\Jobs\OrderPaymentRequestNotificationJob;
use App\Jobs\TaxiOrderUploadJob;
use App\Jobs\TaxiOrderMatchingJob;
use App\Jobs\ClearDriverFirebaseJob;
use App\Jobs\ClearFirebaseJob;
use App\Jobs\PushToFirebaseJob;
use App\Jobs\NewVendorJob;
use App\Jobs\VendorUpdateJob;
use App\Traits\FirebaseAuthTrait;
use App\Traits\FirebaseMessagingTrait;

class JobHandlerService
{
    use FirebaseAuthTrait, FirebaseMessagingTrait;

    public function __constuct()
    {
        //
    }

    public function driverDetailsJob($driver)
    {

        //update driver free record on firebase
        if (delayFCMJob()) {
            DriverDetailsJob::dispatch($driver)
                ->delay(
                    now()->addSeconds(
                        jobDelaySeconds()
                    )
                );
        } else {
            (new DriverDetailsJob($driver))->handle();
        }
    }

    public function driverVehicleTypeJob($driver)
    {

        if (delayFCMJob()) {
            DriverVehicleTypeJob::dispatch($driver)
                ->delay(
                    now()->addSeconds(
                        jobDelaySeconds()
                    )
                );
        } else {
            (new DriverVehicleTypeJob($driver))->handle();
        }
    }

    public function clearDriverFCMJob($expiredDriverNewOrder)
    {

        //clear firebase data
        if (delayFCMJob()) {
            ClearDriverFirebaseJob::dispatch($expiredDriverNewOrder)
                ->delay(
                    now()->addSeconds(
                        jobDelaySeconds()
                    )
                );
        } else {
            (new ClearDriverFirebaseJob($expiredDriverNewOrder))->handle();
        }
    }

    public function pushOrderToFCMJob($order)
    {

        //clear firebase data
        if (delayFCMJob()) {
            PushToFirebaseJob::dispatch($order, \Auth::user())
                ->delay(
                    now()->addSeconds(
                        jobDelaySeconds()
                    )
                );
        } else {
            (new PushToFirebaseJob($order, \Auth::user()))->handle();
        }
    }

    public function clearFCMJob($order)
    {

        //clear firebase data
        ClearFirebaseJob::dispatch($order, \Auth::user())
            ->delay(
                now()->addSeconds(
                    (jobDelaySeconds() + 40) ?? 60
                )
            );
    }


    //
    //Type
    /**
     * 1 - Regulater Status change
     * 2 - Taxi status change
     * 3 - Driver notification
     */
    public function orderFCMNotificationJob($order, $type = 1)
    {

        //clear firebase data
        if (delayFCMJob()) {
            OrderStatusNotificationJob::dispatch($order, $type)
                ->delay(
                    now()->addSeconds(
                        jobDelaySeconds()
                    )
                );
        } else {
            (new OrderStatusNotificationJob($order, $type))->handle();
        }
    }

    public function orderPaymentRequestNotificationJob($order)
    {

        //clear firebase data
        if (delayFCMJob()) {
            OrderPaymentRequestNotificationJob::dispatch($order)
                ->delay(
                    now()->addSeconds(
                        jobDelaySeconds()
                    )
                );
        } else {
            (new OrderPaymentRequestNotificationJob($order))->handle();
        }
    }

    //for taxi order push to firestore
    public function uploadTaxiOrderJob($order)
    {

        $taxiUseFirebaseServer = (bool) setting('taxiUseFirebaseServer', false);
        if (!$taxiUseFirebaseServer) {
            //TODO: To be able to disable pushing data to firebase
            TaxiOrderMatchingJob::dispatch($order)
                ->delay(
                    now()->addSeconds(setting('taxiDelayTaxiMatching', 2))
                );
        } else {
            //clear firebase data
            if (delayFCMJob()) {
                TaxiOrderUploadJob::dispatch($order)
                    ->delay(
                        now()->addSeconds(
                            jobDelaySeconds()
                        )
                    );
            } else {
                (new TaxiOrderUploadJob($order))->handle();
            }
        }
    }




    //Vendor mails
    public function sendWelcomeToVendor($vendor)
    {

        NewVendorJob::dispatch($vendor)
            ->delay(
                now()->addSeconds(
                    jobDelaySeconds()
                )
            );
    }
    public function sendUpdateToVendor($vendor)
    {

        VendorUpdateJob::dispatch($vendor)
            ->delay(
                now()->addSeconds(
                    jobDelaySeconds()
                )
            );
    }
}
