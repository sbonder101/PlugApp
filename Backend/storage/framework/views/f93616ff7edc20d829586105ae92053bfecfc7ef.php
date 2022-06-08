<?php $__env->startSection('title', __('Wallet Topup')); ?>
<div class="">

    <div wire:loading.flex>
        <div class="w-11/12 p-12 mx-auto mt-20 border rounded shadow md:w-6/12 lg:w-4/12">
            <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('heroicon-o-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-12 h-12 mx-auto text-gray-400 md:h-24 md:w-24']); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <p class="text-xl font-medium text-center"><?php echo e(__('Wallet Topup')); ?></p>
            <p class="text-sm text-center"><?php echo e(__('Please wait while we process your payment')); ?></p>
        </div>
    </div>

    <?php if(($selectedPaymentMethod->slug ?? '') != 'offline'): ?>
    <div wire:loading.remove class="w-11/12 p-4 mx-auto mt-20 border rounded shadow md:w-6/12 lg:w-4/12 md:grid-cols-2">
        <div class="flex my-4">
            <div class="items-center">
                <img src="<?php echo e($selectedModel->wallet->user->photo); ?>" class="w-32 h-32 rounded-full md:w-58 md:h-58" />
                <p><?php echo e($selectedModel->wallet->user->name); ?></p>
            </div>
            <div class="ml-auto text-right">
                <p class="text-2xl font-bold"><?php echo e(currencyFormat( $selectedModel->amount)); ?></p>
                <?php echo e(__('Account Top-up')); ?>

            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button wire:click='initPayment(<?php echo e($paymentMethod->id); ?>)'>
                <div class="flex items-center p-1 border rounded shadow">
                    <img src="<?php echo e($paymentMethod->photo); ?>" class="w-2/12 md:w-3/12" />
                    <?php echo e($paymentMethod->name); ?>

                </div>
            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if( ($selectedPaymentMethod->slug ?? '') == "paypal" ): ?>
        <div id="paypal-button-container" class="py-12"></div>
        <?php endif; ?>
    </div>
    <p class="w-full p-4 text-sm text-center text-gray-500"><?php echo e(__('Do not close this window')); ?></p>
    <?php else: ?>
    <?php echo $__env->make('livewire.payment.offline.wallet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <?php echo $__env->make('livewire.payment.gateways.paytm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('livewire.payment.gateways.payu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</div>
<?php $__env->startPush('scripts'); ?>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo e($paypalMethod->public_key ?? ''); ?>&currency=<?php echo e(setting('currencyCode', 'USD')); ?>&intent=capture">
</script>
<script src="<?php echo e(asset('js/topup.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/livewire/payment/wallet.blade.php ENDPATH**/ ?>