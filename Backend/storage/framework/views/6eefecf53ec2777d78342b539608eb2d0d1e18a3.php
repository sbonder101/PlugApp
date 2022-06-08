<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.table','data' => ['wire:sortable' => ''.e($reordering ? $reorderingMethod : '').'']]); ?>
<?php $component->withName('livewire-tables::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:sortable' => ''.e($reordering ? $reorderingMethod : '').'']); ?>
     <?php $__env->slot('head'); ?> 
        <?php if($reordering): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.heading','data' => []]); ?>
<?php $component->withName('livewire-tables::table.heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if($bulkActionsEnabled && count($bulkActions)): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.heading','data' => []]); ?>
<?php $component->withName('livewire-tables::table.heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="inline-flex rounded-md shadow-sm">
                    <input
                        wire:model="selectPage"
                        type="checkbox"
                        class="rounded-md shadow-sm border-gray-300 block transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                </div>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($column->isVisible()): ?>
                <?php if($columnSelect && ! $this->isColumnSelectEnabled($column)) continue; ?>

                <?php if($column->isBlank()): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.heading','data' => []]); ?>
<?php $component->withName('livewire-tables::table.heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.heading','data' => ['sortingEnabled' => $sortingEnabled,'sortable' => $column->isSortable(),'column' => $column->column(),'direction' => $column->column() ? $sorts[$column->column()] ?? null : null,'text' => $column->text() ?? '','class' => $column->class() ?? '','customAttributes' => $column->attributes()]]); ?>
<?php $component->withName('livewire-tables::table.heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['sortingEnabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortingEnabled),'sortable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->isSortable()),'column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->column()),'direction' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->column() ? $sorts[$column->column()] ?? null : null),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->text() ?? ''),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->class() ?? ''),'customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->attributes())]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('body'); ?> 
        <?php
            $colspan = count($columns);
            if ($bulkActionsEnabled && count($bulkActions)) $colspan++;
            if ($reordering) $colspan++;
        ?>

        <?php echo $__env->make('livewire-tables::tailwind.includes.bulk-select-row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.row','data' => ['wire:loading.class.delay' => 'opacity-50','wire:key' => 'table-row-'.e($row->{$primaryKey}).'','wire:sortable.item' => ''.e($row->{$primaryKey}).'','reordering' => $reordering,'url' => method_exists($this, 'getTableRowUrl') ? $this->getTableRowUrl($row) : '','class' => 
                    ($index % 2 === 0 ?
                    'bg-white' . (method_exists($this, 'getTableRowUrl') ? ' hover:bg-gray-100' : '') :
                    'bg-gray-50') .
                    (method_exists($this, 'getTableRowUrl') ? ' hover:bg-gray-100' : '') .
                    (method_exists($this, 'setTableRowClass') ? ' ' . $this->setTableRowClass($row) : '')
                ,'id' => method_exists($this, 'setTableRowId') ? $this->setTableRowId($row) : '','customAttributes' => method_exists($this, 'setTableRowAttributes') ? $this->setTableRowAttributes($row) : []]]); ?>
<?php $component->withName('livewire-tables::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:loading.class.delay' => 'opacity-50','wire:key' => 'table-row-'.e($row->{$primaryKey}).'','wire:sortable.item' => ''.e($row->{$primaryKey}).'','reordering' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($reordering),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(method_exists($this, 'getTableRowUrl') ? $this->getTableRowUrl($row) : ''),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
                    ($index % 2 === 0 ?
                    'bg-white' . (method_exists($this, 'getTableRowUrl') ? ' hover:bg-gray-100' : '') :
                    'bg-gray-50') .
                    (method_exists($this, 'getTableRowUrl') ? ' hover:bg-gray-100' : '') .
                    (method_exists($this, 'setTableRowClass') ? ' ' . $this->setTableRowClass($row) : '')
                ),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(method_exists($this, 'setTableRowId') ? $this->setTableRowId($row) : ''),'customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(method_exists($this, 'setTableRowAttributes') ? $this->setTableRowAttributes($row) : [])]); ?>
                <?php if($reordering): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.cell','data' => ['wire:sortable.handle' => true]]); ?>
<?php $component->withName('livewire-tables::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:sortable.handle' => true]); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline" style="width:1em;height:1em;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>

                <?php if($bulkActionsEnabled && count($bulkActions)): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.cell','data' => []]); ?>
<?php $component->withName('livewire-tables::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                        <div class="inline-flex rounded-md shadow-sm">
                            <input
                                wire:model="selected"
                                wire:loading.attr.delay="disabled"
                                value="<?php echo e($row->{$primaryKey}); ?>"
                                onclick="event.stopPropagation();return true;"
                                type="checkbox"
                                class="rounded-md shadow-sm border-gray-300 block transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                            />
                        </div>
                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>

                <?php echo $__env->make($rowView, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.row','data' => []]); ?>
<?php $component->withName('livewire-tables::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.cell','data' => ['colspan' => $colspan]]); ?>
<?php $component->withName('livewire-tables::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['colspan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colspan)]); ?>
                    <div class="flex justify-center items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>

                        <span class="font-medium py-8 text-gray-400 text-xl"><?php echo app('translator')->get($emptyMessage); ?></span>
                    </div>
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
     <?php $__env->endSlot(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/vendor/livewire-tables/tailwind/includes/table.blade.php ENDPATH**/ ?>