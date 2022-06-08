<label class="block mt-4 text-sm">
    <span class="text-gray-700"><?php echo e($title ?? ''); ?></span>
    <input <?php echo e($attributes->merge(['class' => 'block w-full p-2 mt-1 text-sm border border-gray-300 rounded focus:border-primary-400 focus:outline-none focus:shadow-outline-primary'])); ?>


      placeholder="<?php echo e($placeholder ?? ''); ?>"
      type="<?php echo e($type ?? 'text'); ?>"
      id='<?php echo e($name ?? ''); ?>'
      <?php if( $defer ?? true ): ?>
        wire:model.defer='<?php echo e($name ?? ''); ?>'
      <?php else: ?>
        wire:model='<?php echo e($name ?? ''); ?>'
      <?php endif; ?>

      <?php if( $disable ?? false ): ?>
        disabled
      <?php endif; ?> 

    />
    <?php $__errorArgs = [$name ?? ''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="mt-1 text-xs text-red-700"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </label>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/input.blade.php ENDPATH**/ ?>