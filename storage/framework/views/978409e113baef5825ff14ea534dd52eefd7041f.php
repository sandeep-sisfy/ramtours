
<?php $__env->startSection('edit_price_id', '/'.$room_price->id); ?>
<?php $__env->startSection('nav-tabs'); ?>	
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="<?php echo e(url('admin/room/'.$room_price->room_id.'/room_prices')); ?>" onclick="window.location.href='<?php echo e(url('admin/room/'.$room_price->room_id.'/room_prices')); ?>'">Room Price</a>
	</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.room.add_room_price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/room/edit_room_price.blade.php ENDPATH**/ ?>