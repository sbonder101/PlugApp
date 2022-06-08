<div class="flex rounded-md shadow-sm mt-1">
    <input
        wire:model.stop="filters.<?php echo e($key); ?>"
        wire:key="filter-<?php echo e($key); ?>"
        id="filter-<?php echo e($key); ?>"
        type="date"
        <?php if(isset($filter->options['min']) && strlen($filter->options['min'])): ?> min="<?php echo e($filter->options['min']); ?>" <?php endif; ?>
        <?php if(isset($filter->options['max']) && strlen($filter->options['max'])): ?> max="<?php echo e($filter->options['max']); ?>" <?php endif; ?>
        class="flex-1 shadow-sm border-gray-300 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo <?php if(isset($filters[$key]) && strlen($filters[$key])): ?> rounded-none rounded-l-md <?php else: ?> rounded-md <?php endif; ?>"
    />
</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/vendor/livewire-tables/tailwind/includes/filter-type-date.blade.php ENDPATH**/ ?>