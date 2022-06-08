<div x-cloak x-show="open" class="fixed inset-0 z-20 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div <?php if( $clickAway ?? true ): ?> @click.away="open = false" <?php endif; ?> class="relative inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            
            <button class="absolute p-2 text-white bg-red-500 rounded-full hover:shadow top-4 rtl:left-4 ltr:right-4" <?php if( $onCancel ?? false ): ?> wire:click="<?php echo e($onCancel); ?>" <?php else: ?> wire:click="$emitUp('dismissModal')" <?php endif; ?>>
                <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('heroicon-o-x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            </button>
            <?php if($withForm ?? true): ?>
            <form wire:submit.prevent="<?php echo e($action ?? ''); ?>">
                <?php endif; ?>
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4 <?php echo e(isRTL() ? 'text-right':'text-left'); ?>">
                    <?php echo e($slot); ?>

                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <?php if( $action ?? false ): ?>
                    <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                        <?php echo e($confirmText ?? __('Save')); ?>

                    </button>
                    <?php endif; ?>
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" <?php if( $onCancel ?? false ): ?> wire:click="<?php echo e($onCancel); ?>" <?php else: ?> wire:click="$emitUp('dismissModal')" <?php endif; ?>>
                        <?php echo e($cancelText ?? __('Close')); ?>

                    </button>
                </div>
                <?php if($withForm ?? true): ?>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/modal.blade.php ENDPATH**/ ?>