
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css"/>
<?php $__env->stopSection(); ?>
<?php 
    if(empty($location))
    $location='';
?>
<?php $__env->startSection('admin_container'); ?>
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <?php $__env->startSection('nav-tabs'); ?>
                        <?php echo $__env->yieldSection(); ?>
                        <?php echo show_flash_msg(); ?>

                        <form action="<?php echo e(url('/admin/location')); ?><?php echo $__env->yieldContent('location_id'); ?>" method="POST" accept-charset="utf-8" id="add_cat" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="loc_name" value="<?php echo get_edit_input_pvr_old_value_with_obj('loc_name', $location , 'loc_name'); ?>">
                                    <?php echo get_form_error_msg($errors, 'loc_name'); ?>

                                    <label class="form-label">Location Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="loc_short_code" value="<?php echo get_edit_input_pvr_old_value_with_obj('loc_short_code', $location , 'loc_short_code'); ?>">
                                    <?php echo get_form_error_msg($errors, 'loc_short_code'); ?>

                                    <label class="form-label">Location Short Code</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Enter Location Discription</label>
                                    <br><br>
                                    <textarea class=""  id="location_des" name="loc_des"><?php echo get_edit_input_pvr_old_value_with_obj('loc_des', $location , 'loc_des'); ?></textarea>

                                    <?php echo get_form_error_msg($errors, 'loc_des'); ?>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <input type="checkbox" id="sub_location" name="sub_location" class="filled-in chk-col-amber"  value="1" <?php echo get_edit_select_check_pvr_old_value('sub_location', '', '1', 'check'); ?> <?php echo $__env->yieldContent('main_locaton_check'); ?>/>
                                <label for="sub_location">Is Sub location</label>
                            </div>
                            <div class="form-group form-float main_location_list hide_elememt">
                                <div class="form-line add_select">
                                    <select class="form-control show-tick" name="main_location" data-live-search="true">
                                        <option value="">Please select Main location</option>
                                        <?php $__currentLoopData = $main_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($main_location->id); ?>" <?php echo get_edit_select_check_pvr_old_value_with_obj('main_location', $location, 'loc_par', $main_location->id , 'select'); ?>><?php echo e($main_location->loc_name); ?></option>
                                            <?php echo get_loctions_child_option($main_location->id,1,  $loc_par); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label class="form-label">Main location</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'main_location'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lat" value="<?php echo get_edit_input_pvr_old_value_with_obj('lat', $location , 'loc_lat'); ?>">
                                    <?php echo get_form_error_msg($errors, 'lat'); ?>

                                    <label class="form-label">Location latitude</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lng" value="<?php echo get_edit_input_pvr_old_value_with_obj('lng', $location , 'loc_lng'); ?>">
                                    <?php echo get_form_error_msg($errors, 'lng'); ?>

                                    <label class="form-label">Location longitude</label>
                                </div>
                            </div>
                            <?php echo $__env->yieldContent('location_image'); ?>
                            <div class="form-group">
                                <label for="upload">Location Map Images Here : </label>
                                <input name="location_map" type="file" class="form-control list_file" accept="image/*" />
                                <?php echo get_form_error_msg($errors, 'location_map'); ?>

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
    <script src="<?php echo e($assets_admin); ?>/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script type="text/javascript">
       CKEDITOR.replace('location_des', {
        language: '<?php echo e(get_rami_setting('backend_lang')); ?>'
        });
       $('#sub_location').change(function(event) {
            if($(this).prop("checked") == true){
                $('.main_location_list').slideDown('slow');
            }else{
               $('.main_location_list').slideUp('slow'); 
            }
       });

        if($('#sub_location').prop("checked") == true){
                $('.main_location_list').slideDown('slow');
            }else{
               $('.main_location_list').slideUp('slow'); 
        }
        $("#add_cat").validate({
            rules: {
                cat_name:{
                    required: true,
                    maxlength: 100,
                },
                cat_disc:{
                    required: true,
                    maxlength:500,
                }
            },
            messages: {
                cat_name: {
                    required: "Please enter Category Name here.",
                    maxlength:"Category Name contain only 100 Charecters ."
                },
                cat_disc:{
                    required:"Please enter Category Discription here.",
                    maxlength:"Category Discription contain only 500 Charecters.",

                }                
            }
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/location/add_location.blade.php ENDPATH**/ ?>