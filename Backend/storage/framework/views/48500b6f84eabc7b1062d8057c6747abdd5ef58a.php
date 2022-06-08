<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($column->isVisible()): ?>
        <?php if($columnSelect && ! $this->isColumnSelectEnabled($column)) continue; ?>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-tables::tailwind.components.table.cell','data' => ['class' => method_exists($this, 'setTableDataClass') ? $this->setTableDataClass($column, $row) : '','id' => method_exists($this, 'setTableDataId') ? $this->setTableDataId($column, $row) : '','customAttributes' => method_exists($this, 'setTableDataAttributes') ? $this->setTableDataAttributes($column, $row) : []]]); ?>
<?php $component->withName('livewire-tables::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(method_exists($this, 'setTableDataClass') ? $this->setTableDataClass($column, $row) : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(method_exists($this, 'setTableDataId') ? $this->setTableDataId($column, $row) : ''),'customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(method_exists($this, 'setTableDataAttributes') ? $this->setTableDataAttributes($column, $row) : [])]); ?>
            <?php if($column->asHtml): ?>
                <?php echo e(new \Illuminate\Support\HtmlString($column->formatted($row))); ?>

            <?php else: ?>
                <?php echo e($column->formatted($row)); ?>

            <?php endif; ?>
         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/vendor/livewire-tables/tailwind/components/table/row-columns.blade.php ENDPATH**/ ?>