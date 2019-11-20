
<?php $__env->startSection('edit_homepage_id', '/'.$homepage->id); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.setting.homepage.add_homepage_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/setting/homepage/edit_homepage_setting.blade.php ENDPATH**/ ?>