
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>
	<div class="container-fluid">
       <?php echo show_flash_msg(); ?>

        <div class="row clearfix city_main_content">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial1" value="<?php echo e($all_flights_sche); ?>" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#00ced1" readonly>
                        <h6 class="m-t-20">Flights</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial2" value="<?php echo e($all_cars); ?>" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#ffa07a" readonly>
                        <h6 class="m-t-20">Cars</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial3" value="<?php echo e($all_hotels); ?>" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#8fbc8f" readonly>
                        <h6 class="m-t-20">Hotels</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial4" value="<?php echo e($all_packages); ?>" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#00adef" readonly>
                        <h6 class="m-t-20">Packages</h6>
                    </div>
                </div>
            </div>            
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>