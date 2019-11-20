
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>
<?php
   if(empty($attraction)){
    $attraction='';
    $selected='';
   }else{
    $selected=$attraction->attraction_location;
   }
   
?>
 <?php echo show_flash_msg(); ?>


        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="<?php echo e(url('admin/attraction')); ?><?php echo $__env->yieldContent('edit_attraction_id'); ?>" id="add_attraction" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_title" value="<?php echo get_edit_input_pvr_old_value_with_obj('attraction_title',$attraction, 'attraction_title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'attraction_title'); ?>

                                    <label class="form-label">Attraction Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick change_title_class" name="attraction_location" id="attraction_location" data-live-search="true">
                                         <option value="">Select Location</option>
                                         <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('attraction_location', $attraction, 'attraction_location', $location->id, 'select')); ?> ><?php echo e($location->loc_name); ?></option>
                                            <?php echo get_loctions_child_option($location->id, $selected, 'attraction_location'); ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label class="form-label">Attraction Location</label>
                                </div>

                                <?php echo get_form_error_msg($errors, 'attraction_location'); ?>


                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_distance" value="<?php echo get_edit_input_pvr_old_value_with_obj('attraction_distance',$attraction, 'attraction_distance'); ?>">
                                    <?php echo get_form_error_msg($errors, 'attraction_distance'); ?>

                                    <label class="form-label">Attraction Distance</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_sequence" value="<?php echo get_edit_input_pvr_old_value_with_obj('attraction_sequence',$attraction, 'attraction_sequence'); ?>">
                                    <?php echo get_form_error_msg($errors, 'attraction_sequence'); ?>

                                    <label class="form-label">Attraction Sequence</label>
                                </div>
                            </div>                                          
                                        
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
    <script src="<?php echo e($assets_admin); ?>/js/pages/forms/editors.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script type="text/javascript">
        $("#add_tag").validate({
            rules: {
                title:{
                    required: true,
                    maxlength: 100,
                },
                contact_no:{
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Please enter Name here.",
                    maxlength:"Sub Category Name contain only 100 Charecters ."
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }       
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/attraction/add_attraction.blade.php ENDPATH**/ ?>