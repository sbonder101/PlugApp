<div>
    <div class="items-center justify-between block my-3 md:flex">
        <?php if($show_search ?? true ): ?>
            <div class="w-full">
                <div class="flex items-center w-10/12 p-2 bg-white border border-gray-300 rounded md:w-5/12">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                    <input type="search" class="w-full h-6 px-3 border-0 focus:outline-none" placeholder="<?php echo e(__('Search')); ?>" wire:model="search">
                </div>
            </div>
        <?php endif; ?>
        <?php if($header_view): ?>
            <div class="ml-auto">
                <?php echo $__env->make($header_view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3 card">
        <?php if($models->isEmpty()): ?>
            <div class="card-body">
                <?php echo e(__('No results to display.')); ?>

            </div>
        <?php else: ?>
            <div class="p-0 card-body">
                <div class="table-responsive">
                    <table class="table <?php echo e($table_class); ?> mb-0">
                        <thead class="<?php echo e($thead_class); ?>">
                        <tr>
                            <?php if($checkbox && $checkbox_side == 'left'): ?>
                                <?php echo $__env->make('laravel-livewire-tables::checkbox-all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th class="ltr:text-left rtl:text-right align-middle text-nowrap border-top-0 <?php echo e($this->thClass($column->attribute)); ?>">
                                    <?php if($column->sortable): ?>
                                        <span style="cursor: pointer;" wire:click="sort('<?php echo e($column->attribute); ?>')">
                                            <?php echo e($column->heading); ?>


                                            <?php if($sort_attribute == $column->attribute): ?>
                                                <i class="fa fa-sort-amount-<?php echo e($sort_direction == 'asc' ? 'up-alt' : 'down'); ?>"></i>
                                            <?php else: ?>
                                                <i class="fa fa-sort-amount-up-alt" style="opacity: .35;"></i>
                                            <?php endif; ?>
                                        </span>
                                    <?php else: ?>
                                        <?php echo e($column->heading); ?>

                                    <?php endif; ?>
                                </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($checkbox && $checkbox_side == 'right'): ?>
                                <?php echo $__env->make('laravel-livewire-tables::checkbox-all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($this->trClass($model)); ?>">
                                <?php if($checkbox && $checkbox_side == 'left'): ?>
                                    <?php echo $__env->make('laravel-livewire-tables::checkbox-row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td class="align-middle <?php echo e($this->tdClass($column->attribute, $value = Arr::get($model->toArray(), $column->attribute))); ?>">
                                        <?php if($column->view): ?>
                                            <?php echo $__env->make($column->view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <?php echo e($value); ?>

                                        <?php endif; ?>
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($checkbox && $checkbox_side == 'right'): ?>
                                    <?php echo $__env->make('laravel-livewire-tables::checkbox-row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="row justify-content-between">
        <div class="col-auto">
            <?php echo e($models->links()); ?>

        </div>
        <?php if($footer_view): ?>
            <div class="col-md-auto">
                <?php echo $__env->make($footer_view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/vendor/laravel-livewire-tables/table.blade.php ENDPATH**/ ?>