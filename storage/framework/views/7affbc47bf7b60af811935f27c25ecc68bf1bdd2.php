
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link href="<?php echo e($assets_admin); ?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>

 <?php echo show_flash_msg(); ?>


        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <?php $__env->startSection('nav-tabs'); ?>                                
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:void(0)">Car Price</a></li>
                            <?php echo $__env->yieldSection(); ?>
                        </ul>                        
                        <form action="<?php echo e($form_url); ?><?php echo $__env->yieldContent('edit_price_id'); ?>" id="add_car_price" method="POST" accept-charset="utf-8" >
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <input type="hidden" name="car_id" id="car_id" value="<?php echo e($car_id); ?>">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Start Date</label>
                                    <input type="text" class="form-control start_end_date" name="price_start_date" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_start_date',$car_price, 'price_start_date'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_start_date'); ?>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">End Date</label>
                                    <input type="text" class="form-control start_end_date" name="price_end_date" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_end_date',$car_price, 'price_end_date'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_end_date'); ?>

                                </div>
                            </div>
                            <?php if(!empty($max_people)): ?>                          
                            <?php for($i=1;$i<=$max_people;$i++): ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="price_for_<?php echo e($i); ?>" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_for_'.$i,$car_price, 'price_for_'.$i); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_for_'.$i); ?>

                                    <label class="form-label">Car Price for <?php echo e($i); ?> people</label>
                                </div>
                            </div>
                            <?php endfor; ?>
                            <?php endif; ?>                             
                            <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick price_currency" name="price_currency">
                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_currency', $car_price, 'price_currency', 1, 'select')); ?> >USD</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_currency', $car_price, 'price_currency', 2, 'select')); ?> >Euro </option>
                                        <option value="3" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_currency', $car_price, 'price_currency', 3, 'select')); ?> >Swiss Franc</option>
                                        <option value="4" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_currency', $car_price, 'price_currency', 4, 'select')); ?>>Shekel</option>
                                    </select>
                                    <label class="form-label">Price Currency</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'price_currency'); ?>

                            </div>           
                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
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
        $('.start_end_date').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            time: false
        });
        $('.hotel').selectpicker({
           liveSearchPlaceholder:'Search Hotel',
           noneSelectedText:'Please Select Hotel',
           title:'Hotel',
           liveSearch:"true",
           noneResultsText: 'Hotel not found'
        });
        $('.max_people').selectpicker({
           liveSearchPlaceholder:'Search max people',
           noneSelectedText:'Please Select max people',
           title:'max people',
           liveSearch:"true",
           noneResultsText: 'max people not found'
        });
        $('.price_currency').selectpicker({
           liveSearchPlaceholder:'Search Price Currency',
           noneSelectedText:'Please Select Price Currency',
           title:'Price Currency',
           liveSearch:"true",
           noneResultsText: 'Price Currency not found'
        });        
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
                    maxlength:"Sub Category Name contain only 100 Charecters."
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }       
            }
        });
        $('.save_form_btn').click(function(event) {
            $('#go_to_next_page').val(0);
        });
        $('.go_to_next_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/car/add_car_price.blade.php ENDPATH**/ ?>