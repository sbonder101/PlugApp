<div class="px-4">
    <div class="flex items-center w-full mb-2 text-2xl font-semibold">
        <?php echo e($title ?? 'List'); ?>

        <?php if($showNew ?? false): ?>
        <div class="mx-auto"></div>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.new','data' => ['title' => ''.e($actionTitle ?? '').'']]); ?>
<?php $component->withName('buttons.new'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($actionTitle ?? '').'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if($newInfo ?? false): ?>
    <p class="mb-4 text-xs font-light"><?php echo e(__('Note: Please login as vendor manager to be able create new data')); ?></p>
    <?php endif; ?>
    
    <?php echo e($slot); ?>



</div>

<div wire:loading class="fixed top-0 bottom-0 left-0 z-50 w-full h-full ">
    <div class="fixed top-0 bottom-0 left-0 w-full h-full bg-black opacity-75"></div>
    <div class="fixed top-0 bottom-0 left-0 flex items-center justify-center w-full h-full">
        <img src="<?php echo e(asset('images/loading.svg')); ?>" class="" />
    </div>
</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/baseview.blade.php ENDPATH**/ ?>