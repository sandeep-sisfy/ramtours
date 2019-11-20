
<?php $__env->startSection('edit_price_id', '/'.$car_price->id); ?>
<?php $__env->startSection('nav-tabs'); ?>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/car/'.$car_price->car_id.'/car_prices')); ?>'">car Price</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.car.add_car_price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/car/edit_car_price.blade.php ENDPATH**/ ?>