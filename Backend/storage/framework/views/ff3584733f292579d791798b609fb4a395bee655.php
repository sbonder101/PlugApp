<div>
    <hr />
    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(Route::has($navItem->route)): ?>
    <?php if(empty($navItem->roles ?? '')): ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.menu-item','data' => ['title' => ''.e($navItem->name).'','route' => ''.e($navItem->route).'']]); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($navItem->name).'','route' => ''.e($navItem->route).'']); ?>
        <?php echo e(svg($navItem->icon)->class("w-5 h-5")); ?>

     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php else: ?>
    <?php if(auth()->check() && auth()->user()->hasAnyRole($navItem->roles)): ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.menu-item','data' => ['title' => ''.e($navItem->name).'','route' => ''.e($navItem->route).'']]); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($navItem->name).'','route' => ''.e($navItem->route).'']); ?>
        <?php echo e(svg($navItem->icon)->class("w-5 h-5")); ?>

     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/livewire/component/dynamic-nav-menu.blade.php ENDPATH**/ ?>