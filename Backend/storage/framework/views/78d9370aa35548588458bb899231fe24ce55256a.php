<?php if($bulkActionsEnabled && count($bulkActions) && (($selectPage && $rows->total() > $rows->count()) || count($selected))): ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.row','data' => ['wire:key' => 'row-message','class' => 'bg-indigo-50']]); ?>
<?php $component->withName('livewire-tables::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:key' => 'row-message','class' => 'bg-indigo-50']); ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.cell','data' => ['colspan' => $colspan]]); ?>
<?php $component->withName('livewire-tables::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['colspan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colspan)]); ?>
            <?php if(count($selected) && !$selectAll && !$selectPage): ?>
                <div>
                    <span>
                        <?php echo app('translator')->get('You have selected'); ?>
                        <strong><?php echo e(count($selected)); ?></strong>
                        <?php echo app('translator')->get(':rows', ['rows' => count($selected) === 1 ? 'row' : 'rows']); ?>.
                    </span>

                    <button
                        wire:click="resetBulk"
                        wire:loading.attr="disabled"
                        type="button"
                        class="ml-1 text-sm font-medium leading-5 text-gray-700 text-blue-600 underline transition duration-150 ease-in-out focus:outline-none focus:text-gray-800 focus:underline"
                    >
                        <?php echo app('translator')->get('Unselect All'); ?>
                    </button>
                </div>
            <?php elseif($selectAll): ?>
                <div>
                    <span>
                        <?php echo app('translator')->get('You are currently selecting all'); ?>
                        <strong><?php echo e(number_format($rows->total())); ?></strong>
                        <?php echo app('translator')->get('rows'); ?>.
                    </span>

                    <button
                        wire:click="resetBulk"
                        wire:loading.attr="disabled"
                        type="button"
                        class="ml-1 text-sm font-medium leading-5 text-gray-700 text-blue-600 underline transition duration-150 ease-in-out focus:outline-none focus:text-gray-800 focus:underline"
                    >
                        <?php echo app('translator')->get('Unselect All'); ?>
                    </button>
                </div>
            <?php else: ?>
                <?php if($rows->total() === count($selected)): ?>
                    <div>
                        <span>
                            <?php echo app('translator')->get('You have selected'); ?>
                            <strong><?php echo e(count($selected)); ?></strong>
                            <?php echo app('translator')->get(':rows', ['rows' => count($selected) === 1 ? 'row' : 'rows']); ?>.
                        </span>

                        <button
                            wire:click="resetBulk"
                            wire:loading.attr="disabled"
                            type="button"
                            class="ml-1 text-sm font-medium leading-5 text-gray-700 text-blue-600 underline transition duration-150 ease-in-out focus:outline-none focus:text-gray-800 focus:underline"
                        >
                            <?php echo app('translator')->get('Unselect All'); ?>
                        </button>
                    </div>
                <?php else: ?>
                    <div>
                        <span>
                            <?php echo app('translator')->get('You have selected'); ?>
                            <strong><?php echo e($rows->count()); ?></strong>
                            <?php echo app('translator')->get('rows, do you want to select all'); ?>
                            <strong><?php echo e(number_format($rows->total())); ?></strong>?
                        </span>

                        <button
                            wire:click="selectAll"
                            wire:loading.attr="disabled"
                            type="button"
                            class="ml-1 text-sm font-medium leading-5 text-gray-700 text-blue-600 underline transition duration-150 ease-in-out focus:outline-none focus:text-gray-800 focus:underline"
                        >
                            <?php echo app('translator')->get('Select All'); ?>
                        </button>

                        <button
                            wire:click="resetBulk"
                            wire:loading.attr="disabled"
                            type="button"
                            class="ml-1 text-sm font-medium leading-5 text-gray-700 text-blue-600 underline transition duration-150 ease-in-out focus:outline-none focus:text-gray-800 focus:underline"
                        >
                            <?php echo app('translator')->get('Unselect All'); ?>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/vendor/livewire-tables/tailwind/includes/bulk-select-row.blade.php ENDPATH**/ ?>