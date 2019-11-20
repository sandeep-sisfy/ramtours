
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link href="<?php echo e($assets_admin); ?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>
<?php
   if(empty($testimonial))
    $testimonial='';
    if(empty($hotel_type))
     $hotel_type='';   
?>

        <div class="container-fluid">
             <?php echo show_flash_msg(); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">                        
                        <form action="<?php echo e(url('admin/testimonial')); ?><?php echo $__env->yieldContent('edit_testimonial_id'); ?>" id="add_testimonial" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title" value="<?php echo get_edit_input_pvr_old_value_with_obj('title',$testimonial,'title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'title'); ?>

                                    <label class="form-label">Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="first_name" value="<?php echo get_edit_input_pvr_old_value_with_obj('first_name',$testimonial,'first_name'); ?>">
                                    <?php echo get_form_error_msg($errors, 'first_name'); ?>

                                    <label class="form-label">First Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="last_name" value="<?php echo get_edit_input_pvr_old_value_with_obj('last_name',$testimonial,'last_name'); ?>">
                                    <?php echo get_form_error_msg($errors, 'last_name'); ?>

                                    <label class="form-label">Last Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="<?php echo get_edit_input_pvr_old_value_with_obj('email',$testimonial,'email'); ?>">
                                    <?php echo get_form_error_msg($errors, 'email'); ?>

                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Remark</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="remark"><?php echo get_edit_input_pvr_old_value_with_obj('remark',$testimonial,'remark'); ?></textarea>
                                    <?php echo get_form_error_msg($errors, 'remark'); ?>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control testimonial_date  change_title_class" name="testimonial_date" value="<?php echo get_edit_input_pvr_old_value_with_obj('testimonial_date',$testimonial,'testimonial_date'); ?>">
                                    <?php echo get_form_error_msg($errors, 'testimonial_date'); ?>

                                    <label class="form-label">Testimonial Time</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="profit">Testimonial Status : </label>
                                <input type="radio" name="status" id="show" class="with-gap radio-col-amber" value="1" <?php echo get_edit_select_check_pvr_old_value_with_obj('status',$testimonial,'status',1, 'chacked'); ?>>
                                <label for="show" class="m-l-10 m-r-10">show</label>
                                <input type="radio" name="status" checked="true" id="hide" class="with-gap radio-col-amber" value="0" <?php echo get_edit_select_check_pvr_old_value_with_obj('status',$testimonial,'status',0, 'chacked'); ?>>
                                <label for="hide" class="m-l-10 m-r-10">hide</label>
                                <?php echo get_form_error_msg($errors, 'status'); ?>

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
    <script src="<?php echo e($assets_admin); ?>/plugins/momentjs/moment.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript">
        $('.testimonial_date').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            time: true
        });
        $("#add_testimonial").validate({
            rules:{
                first_name:{
                    required: true,
                    maxlength: 100,
                },
                last_name:{
                    required: true,
                }
            },
            messages:{
                first_name:{
                    required: "Please enter first Name here.",
                },
                last_name:{
                    required:"Please enter last number here.",
                }      
            }
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/testimonial/add_testimonial.blade.php ENDPATH**/ ?>