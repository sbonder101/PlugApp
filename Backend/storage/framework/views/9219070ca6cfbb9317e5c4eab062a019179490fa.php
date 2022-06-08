
<div x-data="{ open: <?php if ((object) ('showEdit') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showEdit'->value()); ?>')<?php echo e('showEdit'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showEdit'); ?>')<?php endif; ?> }">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modal-lg','data' => ['confirmText' => ''.e(__('Update')).'','action' => 'updateOrderProducts','clickAway' => false]]); ?>
<?php $component->withName('modal-lg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['confirmText' => ''.e(__('Update')).'','action' => 'updateOrderProducts','clickAway' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>

        <p class="text-xl font-semibold"><?php echo e(__('Edit Order')); ?> <?php echo e(__("Products")); ?></p>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('component.autocomplete-input', ['title' => ''.e(__('Product')).'','column' => 'name','model' => 'Product','emitFunction' => 'autocompleteProductSelected','updateQueryClauseName' => 'productQueryClasueUpdate','clear' => true,'queryClause' => $productSearchClause,'onclearCalled' => 'clearAutocompleteFieldsEvent'])->html();
} elseif ($_instance->childHasBeenRendered('0Yyxumw')) {
    $componentId = $_instance->getRenderedChildComponentId('0Yyxumw');
    $componentTag = $_instance->getRenderedChildComponentTagName('0Yyxumw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0Yyxumw');
} else {
    $response = \Livewire\Livewire::mount('component.autocomplete-input', ['title' => ''.e(__('Product')).'','column' => 'name','model' => 'Product','emitFunction' => 'autocompleteProductSelected','updateQueryClauseName' => 'productQueryClasueUpdate','clear' => true,'queryClause' => $productSearchClause,'onclearCalled' => 'clearAutocompleteFieldsEvent']);
    $html = $response->html();
    $_instance->logRenderedChild('0Yyxumw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <table class="w-full p-2 mt-5 border rounded-sm">
                <thead>
                    <tr>
                        <th class="w-1/12 p-2 bg-gray-300 border-b">S/N</th>
                        <th class="w-3/12 p-2 bg-gray-300 border-b">Name</th>
                        <th class="w-4/12 p-2 bg-gray-300 border-b">Options</th>
                        <th class="w-2/12 p-2 bg-gray-300 border-b">QTY</th>
                        <th class="w-2/12 p-2 bg-gray-300 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $editOrderProducts ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="items-center w-1/12 px-2 py-1 border-b">
                                <span><?php echo e($key + 1); ?></span>
                            </td>
                            <td class="items-center w-2/12 px-2 py-1 border-b">
                                <?php echo e($product->name); ?>

                            </td>
                            <td class="items-center w-4/12 px-2 py-1 border-b">
                                <?php $__currentLoopData = $product->option_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="p-1 mb-2 border-b">
                                        <p class="text-sm font-medium"><?php echo e($option_group->name); ?></p>
                                        <p class="ml-2">
                                            <?php $__currentLoopData = $option_group->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php
                                                    if($option_group->multiple){
                                                        $optionId = "editProductOptions.".$product->id.".".$option_group->id.".".$option->id;
                                                    }else{
                                                        $optionId = "editProductOptions.".$product->id.".".$option_group->id;
                                                    }
                                                ?>
                                                <?php if($option_group->multiple): ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.checkbox','data' => ['title' => ''.e($option->name.' ('.currencyFormat($option->price).')').'','name' => ''.e($optionId).'','defer' => false]]); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($option->name.' ('.currencyFormat($option->price).')').'','name' => ''.e($optionId).'','defer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                                <?php else: ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.radio','data' => ['type' => 'radio','title' => ''.e($option->name.' ('.currencyFormat($option->price).')').'','name' => ''.e($optionId).'','defer' => false,'value' => ''.e($option->id).'']]); ?>
<?php $component->withName('radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'radio','title' => ''.e($option->name.' ('.currencyFormat($option->price).')').'','name' => ''.e($optionId).'','defer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'value' => ''.e($option->id).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td class="items-center w-1/12 px-2 py-1 border-b">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['name' => 'editOrderProductsQtys.'.e($product->id).'','type' => 'number']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'editOrderProductsQtys.'.e($product->id).'','type' => 'number']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            </td>
                            <td class="items-center w-2/12 px-2 py-1 border-b">
                                
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.plain','data' => ['wireClick' => '$emit(\'removeProductFromOrder\', \''.e($product->id).'\' )','bgColor' => 'bg-red-500']]); ?>
<?php $component->withName('buttons.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wireClick' => '$emit(\'removeProductFromOrder\', \''.e($product->id).'\' )','bgColor' => 'bg-red-500']); ?>
                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('heroicon-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <hr class="my-4" />
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.page-loader','data' => ['target' => 'updateOrderProducts']]); ?>
<?php $component->withName('page-loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['target' => 'updateOrderProducts']); ?>
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
</div><?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/livewire/edit-order.blade.php ENDPATH**/ ?>