
<?php $__env->startSection('edit_flight_schedule_id', '/'.$flight_schedule->id); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('nav-tabs'); ?>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active"  onclick="window.location.href='<?php echo e(url('admin/flight-schedule/'.$flight_schedule->id.'/edit')); ?>'" data-toggle="tab">Flight schedule Info</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/flight-schedule-alert/'.$flight_schedule->id)); ?>'">Flight schedule Alert</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/flight-schedule-meta/'.$flight_schedule->id)); ?>'">Meta data</a></li>
    </ul>
<?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('method_field'); ?>
<?php if(!empty($flight_schedule->current_price)): ?>
<div class="form-group form-float">
    <div class="form-line">
        <input type="text" class="form-control" name="current_price" value="<?php echo e($flight_schedule->current_price); ?>">        
        <label class="form-label">Price per person</label>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.flight_schedule.add_flight_schedule', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/flight_schedule/edit_flight_schedule.blade.php ENDPATH**/ ?>