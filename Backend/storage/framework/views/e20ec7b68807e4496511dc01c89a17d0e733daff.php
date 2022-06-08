<table class="w-full border rounded">
    <thead>
        <tr class="font-medium bg-gray-200 ">
            <th class="p-2"><?php echo e(__('Product')); ?></th>
            <th class="p-2"><?php echo e(__('Options')); ?></th>
            <th class="p-2"><?php echo e(__('Price')); ?></th>
            <th class="p-2"><?php echo e(__('Quantity')); ?></th>
        </tr>
    </thead>
    <tbody>

        <?php if( !empty($products) ): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr class="font-light border-b ">
                    <td class="p-2"><?php echo e($product->product->name); ?></td>
                    <td class="p-2"><?php echo e($product->options); ?></td>
                    <td class="p-2"><?php echo e(currencyFormat($product->price)); ?></td>
                    <td class="p-2"><?php echo e($product->quantity); ?></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </tbody>
</table>
<?php /**PATH /home/sbonder/plug.sboniso.org.za/resources/views/components/order/products.blade.php ENDPATH**/ ?>