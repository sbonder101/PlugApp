<button type="button" 
    class="<?php echo e($w ?? ''); ?> <?php echo e($h ?? ''); ?> flex items-center p-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 <?php echo e($bgColor ?? 'bg-gray-600'); ?> border border-transparent rounded-lg active:bg-gray-600 hover:<?php echo e($bgColor ?? 'bg-gray-600'); ?> focus:outline-none focus:shadow-outline-gray"
    <?php if(!empty($wireClick)): ?>
        wire:click="<?php echo e($wireClick); ?>"
    <?php endif; ?>

    <?php if(!empty($onClick)): ?>
        @click="<?php echo e($onClick); ?>"
    <?php endif; ?>
    title="<?php echo e($title ?? ''); ?>">
    <?php echo e($slot ?? ''); ?>

</button>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/buttons/plain.blade.php ENDPATH**/ ?>