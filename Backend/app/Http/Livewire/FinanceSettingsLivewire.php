<?php

namespace App\Http\Livewire;

use Exception;
use LVR\Colour\Hex;

class FinanceSettingsLivewire extends BaseLivewireComponent
{

    // App settings
    public $enableReferSystem;
    public $referRewardAmount;
    public $enableDriverWallet;
    public $driverWalletRequired;
    public $vendorEarningEnabled;
    public $driversCommission;
    public $vendorsCommission;
    public $minimumTopupAmount;
    public $walletTopupPercentage;
    public $vendorSetDeliveryFee;
    public $allowWalletTransfer;
    public $fullInfoRequired;
    public $preventOrderCancellation = [];
    public $autoRefund;
    
    public $orderStatues = [];


    public function mount()
    {
        //

        $this->enableDriverWallet = (bool) setting('enableDriverWallet');
        $this->driverWalletRequired = (bool) setting('driverWalletRequired');
        $this->vendorEarningEnabled = (bool) setting('vendorEarningEnabled');
        $this->enableReferSystem = (bool) setting('enableReferSystem');
        $this->vendorSetDeliveryFee = (bool) setting('vendorSetDeliveryFee');
        $this->referRewardAmount = (float) setting('referRewardAmount');
        $this->driversCommission = setting('driversCommission', "0");
        $this->vendorsCommission = setting('vendorsCommission', "0");
        $this->minimumTopupAmount = setting('minimumTopupAmount', 100);
        $this->walletTopupPercentage = setting('walletTopupPercentage', 100);
        $this->allowWalletTransfer = (bool) setting('finance.allowWalletTransfer', true);
        $this->fullInfoRequired = (bool) setting('finance.fullInfoRequired', false);
        $this->preventOrderCancellation = setting('finance.preventOrderCancellation', "");
        if( !is_array($this->preventOrderCancellation)){
            $this->preventOrderCancellation = json_decode(setting('finance.preventOrderCancellation', ""), true) ?? [];
        }
        $this->orderStatues = config("backend.order.statuses") ?? [];
        $this->autoRefund = (bool) setting('finance.autoRefund', true);
    }

    public function render()
    {

        $this->mount();
        return view('livewire.settings.finance-settings');
    }


    public function saveAppSettings()
    {


        try {

            $this->isDemo();
            $appSettings = [
                'enableDriverWallet' =>  $this->enableDriverWallet,
                'driverWalletRequired' =>  $this->driverWalletRequired,
                'vendorEarningEnabled' =>  $this->vendorEarningEnabled,
                'driversCommission' =>  $this->driversCommission,
                'vendorsCommission' =>  $this->vendorsCommission,
                'minimumTopupAmount' =>  $this->minimumTopupAmount,
                'walletTopupPercentage' =>  $this->walletTopupPercentage,
                'enableReferSystem' =>  $this->enableReferSystem,
                'referRewardAmount' =>  $this->referRewardAmount,
                'vendorSetDeliveryFee' =>  $this->vendorSetDeliveryFee,
                'finance' => [
                    'allowWalletTransfer' =>  $this->allowWalletTransfer,
                    'fullInfoRequired' =>  $this->fullInfoRequired,
                    'preventOrderCancellation' => json_encode($this->preventOrderCancellation),
                    'autoRefund' =>  $this->autoRefund,
                ],
            ];

            // update the site name
            setting($appSettings)->save();



            $this->showSuccessAlert(__("Finance Settings saved successfully!"));
            $this->reset();
        } catch (Exception $error) {
            logger("error", [$error]);
            $this->showErrorAlert($error->getMessage() ?? __("Finance Settings save failed!"));
        }
    }
}
