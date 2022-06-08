<?php $__env->startSection('title', 'Login'); ?>
<div>
    <div class="min-h-screen p-6 bg-gray-50 ">
        <div class="flex items-center ">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl ">
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img aria-hidden="true" class="object-cover w-full h-full" src="<?php echo e(setting('loginImage', asset('images/login-office.jpeg'))); ?>" alt="Office" />
                    </div>
                    
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <form wire:submit.prevent="login">
                                <?php echo csrf_field(); ?>
                                <h1 class="mb-4 text-xl font-semibold text-gray-700"><?php echo e(__('Login')); ?></h1>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['title' => ''.e(__('Email')).'','type' => 'email','placeholder' => 'info@mail.com','name' => 'email']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(__('Email')).'','type' => 'email','placeholder' => 'info@mail.com','name' => 'email']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['title' => ''.e(__('Password')).'','type' => 'password','placeholder' => '***************','name' => 'password']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(__('Password')).'','type' => 'password','placeholder' => '***************','name' => 'password']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                <div class="hidden">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['title' => '','type' => '','placeholder' => '','name' => 'fcmToken']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => '','type' => '','placeholder' => '','name' => 'fcmToken']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.checkbox','data' => ['description' => ''.e(__('Remember me')).'','name' => 'remember']]); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['description' => ''.e(__('Remember me')).'','name' => 'remember']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                <p class="flex items-center justify-end mt-2">
                                    <a class="text-sm font-medium text-primary-600 hover:underline" href="<?php echo e(route('password.forgot')); ?>">
                                        <?php echo e(__('Forgot your password?')); ?>

                                    </a>
                                </p>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.buttons.primary','data' => ['title' => ''.e(__('Login')).'']]); ?>
<?php $component->withName('buttons.primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(__('Login')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            </form>

                            
                            <?php if( setting('partnersCanRegister',true) ): ?>

                            <div class="justify-center my-5 text-center">
                                <p class="flex items-center justify-center space-x-2">
                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('heroicon-o-briefcase'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-primary-500']); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    <span class="my-2 text-sm font-light"><?php echo e(__(('Become a Vendor/Seller'))); ?></span> <a href="<?php echo e(route('register')); ?>#vendor" class="ml-2 font-bold text-primary-500 text-md"><?php echo e(__(('Click here'))); ?></a>
                                </p>
                                <p class="flex items-center justify-center space-x-2">
                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('heroicon-o-truck'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-primary-500']); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    <span class="my-2 text-sm font-light"><?php echo e(__(('Become a Driver/Rider'))); ?></span> <a href="<?php echo e(route('register')); ?>#driver" class="ml-2 font-bold text-primary-500 text-md"><?php echo e(__(('Click here'))); ?></a>
                                </p>

                            </div>

                            <?php endif; ?>

                            <?php if(!App::environment('production')): ?>
                            <hr class="my-5" />
                            <div class="p-2 mb-5 bg-red-100 border rounded shadow cursor-pointer hover:shadow-lg" wire:click="loadAccount(0)">
                                <p class="font-medium ">Admin Account</p>
                                <p class="text-sm ">Email: admin@demo.com | Password: password</p>
                            </div>
                            <div class="p-2 mb-5 bg-red-100 border rounded shadow cursor-pointer hover:shadow-lg" wire:click="loadAccount(3)">
                                <p class="font-medium ">City-admin Account</p>
                                <p class="text-sm ">Email: city-admin@demo.com | Password: password</p>
                            </div>

                            <div class="p-2 mb-5 bg-purple-100 border rounded shadow cursor-pointer hover:shadow-lg" wire:click="loadAccount(1)">
                                <p class="font-medium ">Manager Account</p>
                                <p class="text-sm ">Email: manager@demo.com | Password: password</p>
                            </div>
                            <div class="p-2 mb-5 bg-purple-100 border rounded shadow cursor-pointer hover:shadow-lg" wire:click="loadAccount(2)">
                                <p class="font-medium ">Manager Account(Parcel Vendor)</p>
                                <p class="text-sm ">Email: manager1@demo.com | Password: password</p>
                            </div>
                            <div class="p-2 mb-5 bg-purple-100 border rounded shadow cursor-pointer hover:shadow-lg" wire:click="loadAccount(4)">
                                <p class="font-medium ">Manager Account(Service Vendor)</p>
                                <p class="text-sm ">Email: manager3@demo.com | Password: password</p>
                            </div>

                            <div class="p-2 mb-5 bg-green-100 border rounded shadow cursor-pointer hover:shadow-lg" >
                                <p class="font-medium ">Client Account (You can not login to backend)</p>
                                <p class="text-sm ">Email: client@demo.com | Password: password</p>
                            </div>



                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="p-2 mx-auto text-center">
            <p class="text-xs text-gray-500"><?php echo e(__('version')); ?> <?php echo e(setting('appVerison', "1.0.0" )); ?></p>
        </div>
    </div>
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.loading','data' => []]); ?>
<?php $component->withName('loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/livewire/auth/login.blade.php ENDPATH**/ ?>