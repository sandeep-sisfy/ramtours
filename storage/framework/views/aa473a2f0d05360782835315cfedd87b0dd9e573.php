
<?php $__env->startSection('edit_hotel_id','/'.$hotel->id); ?>
<?php $__env->startSection('nav-tabs'); ?>
	<li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">Hotel Info</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="<?php echo e(url('admin/hotel/gallery/'.$hotel->id)); ?>" onclick="window.location.href='<?php echo e(url('admin/hotel/gallery/'.$hotel->id)); ?>'">Gellery</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/hotel-meta/'.$hotel->id)); ?>'">Meta data</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.hotel.add_hotel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/hotel/edit_hotel.blade.php ENDPATH**/ ?>