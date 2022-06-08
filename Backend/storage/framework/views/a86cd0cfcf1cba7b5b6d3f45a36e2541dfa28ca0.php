<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="<?php echo e(setting('localeCode', 'en')); ?>" dir="<?php echo e(isRTL() ? 'rtl':'ltr'); ?>">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="<?php echo e(setting('favicon')); ?>"/>
    <title><?php echo $__env->yieldContent('title', "" ); ?> - <?php echo e(setting('websiteName', env("APP_NAME"))); ?></title>
    <?php echo $__env->make('layouts.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('styles'); ?>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50"
      :class="{ 'overflow-hidden': isSideMenuOpen }">

      <!-- Desktop sidebar -->
      <?php echo $__env->make('layouts.partials.nav.desktop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- Mobile sidebar -->
      <?php echo $__env->make('layouts.partials.nav.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="flex flex-col flex-1 w-full">
        
        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('header.profile')->html();
} elseif ($_instance->childHasBeenRendered('SFm0ylw')) {
    $componentId = $_instance->getRenderedChildComponentId('SFm0ylw');
    $componentTag = $_instance->getRenderedChildComponentTagName('SFm0ylw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SFm0ylw');
} else {
    $response = \Livewire\Livewire::mount('header.profile');
    $html = $response->html();
    $_instance->logRenderedChild('SFm0ylw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>



        <main class="h-full overflow-y-auto">
            <div class="container grid px-6 py-5 mx-auto">
                <?php echo e($slot ?? ""); ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>

        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('header.subscription')->html();
} elseif ($_instance->childHasBeenRendered('4J6siIv')) {
    $componentId = $_instance->getRenderedChildComponentId('4J6siIv');
    $componentTag = $_instance->getRenderedChildComponentTagName('4J6siIv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4J6siIv');
} else {
    $response = \Livewire\Livewire::mount('header.subscription');
    $html = $response->html();
    $_instance->logRenderedChild('4J6siIv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      </div>
    </div>

    <?php echo $__env->make('layouts.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/layouts/app.blade.php ENDPATH**/ ?>