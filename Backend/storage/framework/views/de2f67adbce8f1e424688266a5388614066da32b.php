<label class="block mt-4 text-sm">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['title' => $title]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <div
        class="w-full p-2 bg-gray-100 border border-gray-300 border-dashed rounded"
        x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">

        <div x-show="!isUploading">

            
            <input type="file" class="hidden" accept="<?php echo e($rules ?? ''); ?>" <?php echo e(($multiple ?? false) ? 'multiple':''); ?>

                <?php if( $defer ?? true ): ?>
                    wire:model.defer='<?php echo e($name ?? ''); ?>'
                <?php else: ?>
                    wire:model='<?php echo e($name ?? ''); ?>'
                <?php endif; ?>
            />

            <?php if( !empty($photo) ): ?>

                <div class="flex items-center space-x-4">
                    <?php if( $image ?? true ): ?>
                        <img src="<?php echo e($photo->temporaryUrl() ?? ''); ?>" class="w-20 h-20">
                    <?php endif; ?>
                    <div class="font-light text-gray-500">
                        <p>Type: <?php echo e(Str::upper($photoInfo["extension"])); ?></p>
                        <p>Size: <?php echo e($photoInfo["size"]); ?> MB</p>
                        <button wire:click="$set('<?php echo e($name); ?>')" class="px-2 mt-2 text-xs text-red-400 border border-red-400 rounded">
                            <?php echo e(__('Remove')); ?>

                        </button>
                    </div>
                </div>

            <?php elseif( !empty($preview) ): ?>

                <div class="flex items-center space-x-4">
                    <img src="<?php echo e($preview); ?>" class="w-20 h-20">
                    <div class="font-light text-gray-500">
                        <div class="px-2 mt-2 text-xs border rounded text-primary-400 border-primary-400">
                            <?php echo e(__('Change')); ?>

                        </div>
                    </div>
                </div>

            <?php else: ?>

                
                <p class="flex items-center text-sm font-light text-gray-400">
                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('heroicon-o-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 p-1 text-gray-500 border rounded-full shadow ltr:mr-3 rtl:ml-3']); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php echo e(__('Click/Tap to select media')); ?> | <?php echo e($types ?? 'Any File'); ?>

                </p>

            <?php endif; ?>







        </div>

        
        <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress" class="w-full h-1 overflow-hidden bg-red-500 rounded"></progress>
        </div>
    </div>
    <?php $__errorArgs = [$name ?? ''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="mt-1 text-xs text-red-700"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </label>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/media-upload.blade.php ENDPATH**/ ?>