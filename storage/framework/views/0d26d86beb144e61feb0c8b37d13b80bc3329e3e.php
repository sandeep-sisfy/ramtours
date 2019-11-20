
<?php $__env->startSection('edit_package_id', '/'.$package->id); ?>
<?php $__env->startSection('nav-tabs'); ?>
<ul class="nav nav-tabs">
	<li class="nav-item"><a class="nav-link active" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/package/'.$package->id.'/edit')); ?>'">Package Info</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab"  onclick="window.location.href='<?php echo e(url('admin/package-meta/'.$package->id)); ?>'">Meta data</a></li>
</ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.package.add_package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/package/edit_package.blade.php ENDPATH**/ ?>