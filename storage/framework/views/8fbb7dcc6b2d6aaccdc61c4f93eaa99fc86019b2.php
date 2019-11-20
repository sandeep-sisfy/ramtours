
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link href="<?php echo e($assets_admin); ?>/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
<div class="container-fluid">
<?php 
    if(empty($homepage))
    $homepage='';
?>
    <?php echo show_flash_msg(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                	<div>
	                    <form action="<?php echo e(url('/admin/setting/homepage')); ?><?php echo $__env->yieldContent('edit_homepage_id'); ?>" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
	                        <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
	                        <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="home_page_title" value="<?php echo get_edit_input_pvr_old_value_with_obj('home_page_title',$homepage,'home_page_title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'home_page_title'); ?>

                                    <label class="form-label">HomePage Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="menu_title" value="<?php echo get_edit_input_pvr_old_value_with_obj('menu_title',$homepage,'menu_title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'menu_title'); ?>

                                    <label class="form-label">Menu Title</label>
                                </div>
                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick pkg_location" name="pkg_location[]" multiple="" data-live-search="true"  >
                                        <?php $__currentLoopData = $all_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('pkg_location', $location, 'pkg_location', $location->id, 'select')); ?> ><?php echo e($location->loc_name); ?></option>
                                            <?php echo get_loctions_child_option($location->id); ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label class="form-label">Location</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'pkg_location'); ?>

                            </div>                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick show_by_month" name="show_by_month" >
                                        <?php for($i=1; $i<=12; $i++): ?>
                                            <option value='<?php echo e($i); ?>'<?php echo e(get_edit_select_check_pvr_old_value_with_obj('show_by_month',$homepage,'show_by_month', $i,'select')); ?>><?php echo e(get_month_name($i)); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <label class="form-label">Package show on Month</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'show_by_month'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick rami_package_type" name="package_type" value="">
                                        <option value="">--Select One--</option>
                                        <option value="1"<?php echo e(get_edit_select_check_pvr_old_value_with_obj('package_type', $homepage,'package_type', '1', 'select')); ?>>flight+Hotel+car</option>
                                        <option value="3"<?php echo e(get_edit_select_check_pvr_old_value_with_obj('package_type', $homepage,'package_type', '3', 'select')); ?>>flight+car</option>
                                        <option value="4"<?php echo e(get_edit_select_check_pvr_old_value_with_obj('package_type', $homepage,'package_type', '4', 'select')); ?>>flight</option>
                                    </select>
                                    <label class="form-label">Package Type</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'package_type'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="no_of_package_show" value="<?php echo get_edit_input_pvr_old_value_with_obj('no_of_package_show',$homepage,'no_of_package_show'); ?>">
                                    <?php echo get_form_error_msg($errors, 'no_of_package_show'); ?>

                                    <label class="form-label">Number of Packaga Show On HomePage</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="skip_dates" value="<?php echo get_edit_input_pvr_old_value_with_obj('skip_dates',$homepage,'skip_dates'); ?>">
                                    <?php echo get_form_error_msg($errors, 'skip_dates'); ?>

                                    <label class="form-label">Skip Dates</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="show_in_sequence" value="<?php echo get_edit_input_pvr_old_value_with_obj('show_in_sequence',$homepage,'show_in_sequence'); ?>">
                                    <?php echo get_form_error_msg($errors, 'show_in_sequence'); ?>

                                    <label class="form-label">Package Sequence</label>
                                </div>
                            </div>
	                        <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Submit
	                        </button>
                        </form>	                    
	               </div>
        		</div>
        	</div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
<script type="text/javascript">
     $('.pkg_location').selectpicker({
           actionsBox:true,
           liveSearchPlaceholder:'Search Location',
           noneSelectedText:'Please Select Location',
           title:'Select Location',
           liveSearch:"true",
           virtualScroll:10,
           dropupAuto:false,
           noneResultsText: 'Location not found',
        });
        $('.show_by_month').selectpicker({
           actionsBox:false,
           liveSearchPlaceholder:'Search Month',
           noneSelectedText:'Please Select Month',
           title:'Select Month', 
           virtualScroll:10,
           liveSearch:"true",
           dropupAuto:false,
           noneResultsText: 'Month not found',
        });

     
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/setting/homepage/add_homepage_setting.blade.php ENDPATH**/ ?>