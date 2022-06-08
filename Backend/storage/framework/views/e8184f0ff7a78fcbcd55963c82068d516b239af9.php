<?php echo \Livewire\Livewire::scripts(); ?>

<script src="http://plug.sboniso.org.za/vendor/livewire-charts/app.js"></script>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-alert::components.scripts','data' => []]); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/init-alpine.js')); ?>"></script>
<script src="<?php echo e(asset('js/easymde.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/privacy.js')); ?>"></script>
<script src="<?php echo e(asset('js/main.js')); ?>"></script>


<?php echo $__env->make('layouts.partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/layouts/partials/scripts.blade.php ENDPATH**/ ?>