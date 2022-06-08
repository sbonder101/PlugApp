<?php $__env->startSection('title', __('Order Payment')); ?>
<?php if($selectedModel->payment_method->slug != 'offline'): ?>
    <div class="" wire:init="initPayment">
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
            <p class="text-xl font-medium text-center"><?php echo e(__('Order Payment')); ?></p>
            <p class="text-sm text-center">
                <?php echo e(__('Please wait while we process your payment')); ?></p>
            <?php if( $selectedModel->payment_method->slug == "paypal" ): ?>
                <div id="paypal-button-container" class="py-12"></div>
            <?php endif; ?>
        </div>

        
        <p class="w-full p-4 text-sm text-center text-gray-500">
            <?php echo e(__('Do not close this window')); ?></p>
    </div>

<?php else: ?>
    <?php echo $__env->make('livewire.payment.offline.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('livewire.payment.gateways.paytm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('livewire.payment.gateways.payu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php if($selectedModel->payment_method->slug == 'stripe'): ?>
        <script src="https://js.stripe.com/v3/"></script>
    <?php elseif( $selectedModel->payment_method->slug == "razorpay" ): ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <?php elseif( $selectedModel->payment_method->slug == "flutterwave" ): ?>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
    <?php elseif( $selectedModel->payment_method->slug == "paystack" ): ?>
        <script src="https://js.paystack.co/v1/inline.js"></script>
    <?php elseif( $selectedModel->payment_method->slug == "billplz" ): ?>
        <script src="https://js.paystack.co/v1/inline.js"></script>
    <?php elseif( $selectedModel->payment_method->slug == "paypal" ): ?>
        <script
            src="https://www.paypal.com/sdk/js?client-id=<?php echo e($selectedModel->payment_method->public_key); ?>&currency=<?php echo e(setting('currencyCode', 'USD')); ?>&intent=capture">
        </script>
        
    <?php endif; ?>

    <script src="<?php echo e(asset('js/payment.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/livewire/payment/order.blade.php ENDPATH**/ ?>