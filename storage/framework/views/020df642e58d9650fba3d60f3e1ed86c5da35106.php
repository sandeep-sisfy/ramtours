
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>
<?php
   if(empty($car)){
    $car='';
    $selected='';
    }else{
    $selected=$car->location;
    }
?>
 <?php echo show_flash_msg(); ?>


        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <?php $__env->startSection('nav-tabs'); ?>
                                <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">car Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">car Price</a></li>
                            <?php echo $__env->yieldSection(); ?>
                        </ul>
                        <form action="<?php echo e(url('admin/car')); ?><?php echo $__env->yieldContent('edit_car_id'); ?>" id="add_car" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_title" value="<?php echo get_edit_input_pvr_old_value_with_obj('car_title',$car, 'car_title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'car_title'); ?>

                                    <label class="form-label">Car Title</label>
                                </div>
                            </div>                       
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Car Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="car_desc"><?php echo get_edit_input_pvr_old_value_with_obj('car_desc',$car,'car_desc'); ?></textarea>
                                    <?php echo get_form_error_msg($errors, 'car_desc'); ?>

                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick car_supliers" name="car_suplier" data-header="Select a car suplier">
                                        <?php $__currentLoopData = $car_supliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_suplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($car_suplier->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('car_suplier', $car, 'car_suplier', $car_suplier->id , 'select', $car_suplier_selected)); ?>><?php echo e($car_suplier->car_suplier_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                      
                                    </select>
                                    <label class="form-label">Car Suplier</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'car_suplier'); ?>

                            </div> 
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick car_location" name="location"  data-header="Select a Location">
                                         <?php $__currentLoopData = $main_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('location', $car, 'location', $location->id, 'select')); ?> ><?php echo e($location->loc_name); ?></option>
                                            <?php echo get_loctions_child_option($location->id, $selected, 'location'); ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                    <label class="form-label">Location</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'location'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control car_feataure" name="car_features[]"  multiple="true" data-header="Select a Car features">
                                         <?php $__currentLoopData = $car_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($feature->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj_serlizie('car_features', $car, 'car_features', $feature->id, 'select')); ?> ><?php echo e($feature->car_feature); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                    <label class="form-label">Car Features</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'car_features'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick max_people" name="max_people"  data-header="Select a Max Peoples" required="true">
                                        <?php for($i=1;$i<=9;$i++): ?>
                                            <option value="<?php echo e($i); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('max_people', $car, 'max_people', $i, 'select')); ?> ><?php echo e($i); ?> People </option>
                                        <?php endfor; ?>
                                    </select>
                                    <label class="form-label">Max Peopele</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'max_people'); ?>

                            </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="car_profit" value="<?php echo get_edit_input_pvr_old_value_with_obj('car_profit',$car, 'car_profit'); ?>">
                                        <?php echo get_form_error_msg($errors, 'car_profit'); ?>

                                        <label class="form-label">Car Profit per day</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick profit_currency" name="profit_currency">
                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 1, 'select')); ?> >USD</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 2, 'select')); ?> >Euro </option>
                                        <option value="3" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 3, 'select')); ?> >Swiss Franc</option>
                                        <option value="4" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 4, 'select')); ?>>Shekel</option>
                                    </select>
                                    <label class="form-label">Profit Currency</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'profit_currency'); ?>

                            </div>                               
                            
                            <?php echo $__env->yieldContent('car_img'); ?>
                            <div class="form-group">
                                <label for="upload">Upload Image Here : </label>
                                <input type="file" name="car_img" class="form-control list_file" accept="image/*" />
                                <?php echo get_form_error_msg($errors, 'car_img'); ?>

                            </div>                 
                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 go_to_ext_page_btn m-r-10 m-l-10">Save & Add Car price
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
    <script src="<?php echo e($assets_admin); ?>/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script type="text/javascript">
         $('.car_feataure').selectpicker({
           actionsBox:true,
           liveSearchPlaceholder:'Search Car features here',
           noneSelectedText:'Please Select Car features',
           title:'Car Features',
           liveSearch:"true",
           noneResultsText: 'Car feature not found'
        });
        $('.car_location').selectpicker({
           liveSearchPlaceholder:'Search location here',
           noneSelectedText:'Please Select location',
           title:'Car location',
           liveSearch:"true",
           noneResultsText: 'location not found'
        });
        $('.car_supliers').selectpicker({
           liveSearchPlaceholder:'Search car supliers here',
           noneSelectedText:'Please Select car supliers',
           title:'Car supliers',
           liveSearch:"true",
           noneResultsText: 'car supliers not found'
        });
        $('.max_people').selectpicker({
           liveSearchPlaceholder:'Search max people',
           noneSelectedText:'Please Select max people',
           title:'max people',
           noneResultsText: 'max people not found'
        });
        $("#add_car").validate({
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
                    maxlength:"Sub Category Name contain only 100 Charecters .",
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }       
            }
        });
        $('.save_form_btn').click(function(event) {
            $('#go_to_next_page').val(0);
        });
        $('.go_to_ext_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });
        <?php if($profit_currency==0): ?>
            $('.profit_currency').val(4);
        <?php else: ?>
            $('.profit_currency').val(<?php echo e($profit_currency); ?>);
        <?php endif; ?>
    </script>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/car/add_car.blade.php ENDPATH**/ ?>