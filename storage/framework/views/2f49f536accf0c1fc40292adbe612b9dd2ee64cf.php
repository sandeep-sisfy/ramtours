
<?php $__env->startSection('edit_testimonial_id', '/'.$testimonial->id); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.testimonial.add_testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/testimonial/edit_testimonial.blade.php ENDPATH**/ ?>