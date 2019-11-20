
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <?php echo show_flash_msg(); ?>

                        <form action="<?php echo e(url('/admin/edit_hotel_image/'.$hotel_image->id)); ?>" method="POST" accept-charset="utf-8" id="add_cat" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title" value="<?php echo get_edit_input_pvr_old_value_with_obj('title', $hotel_image , 'title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'title'); ?>

                                    <label class="form-label">Image Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="sequence" value="<?php echo get_edit_input_pvr_old_value_with_obj('sequence', $hotel_image , 'sequence'); ?>">
                                    <?php echo get_form_error_msg($errors, 'sequence'); ?>

                                    <label class="form-label">Image sequence</label>
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="previous">Hotel Image: </label>
                                <img src="<?php echo e(rami_get_file_url($hotel_image->image)); ?>" width="75" height="75" alt="location_image">
                            </div>
                            <div class="form-group">
                                <label for="upload">Hotel Images Here : </label>
                                <input name="hotel_image" type="file" class="form-control list_file" accept="image/*" />
                                <?php echo get_form_error_msg($errors, 'hotel_image'); ?>

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


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/hotel/edit_hotel_image.blade.php ENDPATH**/ ?>