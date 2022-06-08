<div
    <?php if( $ignore ?? false ): ?>
        wire:ignore
    <?php endif; ?>
>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['title' => $title]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <div class="relative inline-block w-full">
        <select class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
            name="<?php echo e($name ?? ''); ?>"
            <?php if( $multiple ?? false ): ?>
                multiple="multiple"
            <?php endif; ?>
            id="<?php echo e($id ?? $name ?? ''); ?>"

            <?php if( $defer ?? true ): ?>
                wire:model.defer='<?php echo e($name ?? ''); ?>'
            <?php else: ?>
                wire:model='<?php echo e($name ?? ''); ?>'
            <?php endif; ?>

            <?php if( $width ?? false ): ?>
                style="width: <?php echo e($width); ?>%"
            <?php endif; ?>
            >
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $optionId = $option->id ?? $option['id'];
                ?>
                <option value="<?php echo e($optionId); ?>" <?php echo e($selected ?? '' == $optionId ? 'selected':''); ?>> <?php echo e(Str::ucfirst($option->name ?? $option['name'])); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>

</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/select2.blade.php ENDPATH**/ ?>