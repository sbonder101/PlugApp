<?php $__env->startSection('title', __('Settings')); ?>
<div>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.baseview','data' => ['title' => ''.e(__('Settings')).'']]); ?>
<?php $component->withName('baseview'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(__('Settings')).'']); ?>


        
        <?php if($this->showNotification): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('settings.notification', [])->html();
} elseif ($_instance->childHasBeenRendered('UhSAjEP')) {
    $componentId = $_instance->getRenderedChildComponentId('UhSAjEP');
    $componentTag = $_instance->getRenderedChildComponentTagName('UhSAjEP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UhSAjEP');
} else {
    $response = \Livewire\Livewire::mount('settings.notification', []);
    $html = $response->html();
    $_instance->logRenderedChild('UhSAjEP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php elseif($this->showApp): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('settings.web-app-settings', [])->html();
} elseif ($_instance->childHasBeenRendered('8HJsOJp')) {
    $componentId = $_instance->getRenderedChildComponentId('8HJsOJp');
    $componentTag = $_instance->getRenderedChildComponentTagName('8HJsOJp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8HJsOJp');
} else {
    $response = \Livewire\Livewire::mount('settings.web-app-settings', []);
    $html = $response->html();
    $_instance->logRenderedChild('8HJsOJp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php elseif($this->showPrivacy): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('settings.privacy-policy', [])->html();
} elseif ($_instance->childHasBeenRendered('XIQPrQA')) {
    $componentId = $_instance->getRenderedChildComponentId('XIQPrQA');
    $componentTag = $_instance->getRenderedChildComponentTagName('XIQPrQA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XIQPrQA');
} else {
    $response = \Livewire\Livewire::mount('settings.privacy-policy', []);
    $html = $response->html();
    $_instance->logRenderedChild('XIQPrQA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php elseif($this->showContact): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('settings.contact', [])->html();
} elseif ($_instance->childHasBeenRendered('wxspBjs')) {
    $componentId = $_instance->getRenderedChildComponentId('wxspBjs');
    $componentTag = $_instance->getRenderedChildComponentTagName('wxspBjs');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wxspBjs');
} else {
    $response = \Livewire\Livewire::mount('settings.contact', []);
    $html = $response->html();
    $_instance->logRenderedChild('wxspBjs', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php elseif($this->showTerms): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('settings.terms', [])->html();
} elseif ($_instance->childHasBeenRendered('HXTEb0N')) {
    $componentId = $_instance->getRenderedChildComponentId('HXTEb0N');
    $componentTag = $_instance->getRenderedChildComponentTagName('HXTEb0N');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HXTEb0N');
} else {
    $response = \Livewire\Livewire::mount('settings.terms', []);
    $html = $response->html();
    $_instance->logRenderedChild('HXTEb0N', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php elseif($this->showPageSetting): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('settings.page', [])->html();
} elseif ($_instance->childHasBeenRendered('J7c9MaM')) {
    $componentId = $_instance->getRenderedChildComponentId('J7c9MaM');
    $componentTag = $_instance->getRenderedChildComponentTagName('J7c9MaM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('J7c9MaM');
} else {
    $response = \Livewire\Livewire::mount('settings.page', []);
    $html = $response->html();
    $_instance->logRenderedChild('J7c9MaM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php elseif($this->showCustomNotificationMessage): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('settings.custom-notification-message', [])->html();
} elseif ($_instance->childHasBeenRendered('22lqhHL')) {
    $componentId = $_instance->getRenderedChildComponentId('22lqhHL');
    $componentTag = $_instance->getRenderedChildComponentTagName('22lqhHL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('22lqhHL');
} else {
    $response = \Livewire\Livewire::mount('settings.custom-notification-message', []);
    $html = $response->html();
    $_instance->logRenderedChild('22lqhHL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php else: ?>
        <?php echo $__env->make('livewire.settings.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/livewire/settings/index.blade.php ENDPATH**/ ?>