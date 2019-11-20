
<?php $__env->startSection('location_id', '/'.$location->id); ?>
<?php $__env->startSection('main_locaton_check', $local_main_check); ?>;
<?php $__env->startSection('nav-tabs'); ?>
<ul class="nav nav-tabs">
	<li class="nav-item"><a class="nav-link active"  href="javscript:void(0)" data-toggle="tab">Location Info</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/location/'.$location->id.'/package-setting/1')); ?>'">F+H+C Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/location/'.$location->id.'/package-setting/3')); ?>'">F+C Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/location/'.$location->id.'/package-setting/4')); ?>'">Flight Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/location/hotelmeta/'.$location->id)); ?>'">Location Hotel Meta Data</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/location/flightmeta/'.$location->id)); ?>'">Location flight Meta Data</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/location/packagemeta/'.$location->id)); ?>'">Location package Meta Data</a></li>
</ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('location_image'); ?>
<?php if(!empty($location->loc_map)): ?>
<div class="form-group">
    <label for="previous">Locatation Map Image: </label>
	<img src="<?php echo e(rami_get_file_url($location->loc_map)); ?>" width="75" height="75" alt="location_image">
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.location.add_location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/location/edit_location.blade.php ENDPATH**/ ?>