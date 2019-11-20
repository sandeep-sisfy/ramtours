
<?php $__env->startSection('edit_car_id', '/'.$car->id); ?>
<?php $__env->startSection('nav-tabs'); ?>
	<li class="nav-item"><a class="nav-link active"  href="javscript:void(0)" data-toggle="tab">car Info</a></li>	
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/car/'.$car->id.'/car_prices')); ?>'">Car Price</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('car_img'); ?>
<div class="form-group">
    <label for="previous">Car Image: </label>
	<img src="<?php echo e(rami_get_file_url($car->image)); ?>" width="75" height="75" alt="car Image">
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.car.add_car', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/car/edit_car.blade.php ENDPATH**/ ?>