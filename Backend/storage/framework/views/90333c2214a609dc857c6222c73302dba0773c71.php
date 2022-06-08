<?php if( $model->is_active ?? false ): ?>
    <span class="px-2 py-1 text-sm font-medium text-center text-white bg-green-500 rounded-xl"><?php echo e(__('Active')); ?></span>
<?php else: ?>
    <span class="px-2 py-1 text-sm font-medium text-center text-white bg-red-500 rounded-xl"><?php echo e(__('Inactive')); ?></span>
<?php endif; ?>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/table/active.blade.php ENDPATH**/ ?>