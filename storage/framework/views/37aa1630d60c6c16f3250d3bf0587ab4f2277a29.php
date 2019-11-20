
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>
<?php
   if(empty($page))
    $page='';
?>
 <?php echo show_flash_msg(); ?>

 

        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">                                
                            <?php $__env->startSection('nav-tabs'); ?>
                                <li class="nav-item"><a class="nav-link"  href="javascript:void(0)" data-toggle="tab">Page Info</a></li>
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:void(0)">Meta data</a></li>
                            <?php echo $__env->yieldSection(); ?>
                        </ul>
                        
                        <form action="<?php echo e(url('admin/page')); ?><?php echo $__env->yieldContent('edit_page_id'); ?>" id="add_page" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="page_title" value="<?php echo get_edit_input_pvr_old_value_with_obj('page_title',$page, 'page_title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'page_title'); ?>

                                    <label class="form-label">Page Title</label>
                                </div>
                            </div>                       
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Page Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor1" name="page_disc"><?php echo get_edit_input_pvr_old_value_with_obj('page_disc',$page,'page_disc'); ?></textarea>
                                    <?php echo get_form_error_msg($errors, 'page_disc'); ?>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="menu_title" value="<?php echo get_edit_input_pvr_old_value_with_obj('menu_title',$page, 'menu_title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'menu_title'); ?>

                                    <label class="form-label">Menu Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="sequence" value="<?php echo get_edit_input_pvr_old_value_with_obj('sequence',$page, 'sequence'); ?>">
                                    <?php echo get_form_error_msg($errors, 'sequence'); ?>

                                    <label class="form-label">Sequence</label>
                                </div>
                            </div>
                            <?php echo $__env->yieldContent('page_img'); ?>
                            <div class="form-group">
                                <label for="upload">Upload Page Image Here : </label>
                                <input type="file" name="page_img" class="form-control list_file" accept="image/*" />
                                <?php echo get_form_error_msg($errors, 'page_img'); ?>

                            </div>
                            <?php echo $__env->yieldContent('page_other_link'); ?>
                            <div class="form-group form-float">
                                <label class="status">Show in Header Menu: </label>
                                <input type="radio" name="show_in_header_menu" id="yes_header" class="with-gap radio-col-amber" value="1" <?php echo get_edit_select_check_pvr_old_value_with_obj('show_in_header_menu',$page,
                                'show_in_header_menu',1, 'show_in_header_menu'); ?>>
                                <label for="yes_header" class="m-l-10 m-r-10">Yes</label>
                                <input type="radio" name="show_in_header_menu" id="no_footer" class="with-gap radio-col-amber" value="0" <?php echo get_edit_select_check_pvr_old_value_with_obj('show_in_header_menu',$page,'show_in_header_menu',0, 'chacked'); ?>>
                                <label for="no_footer" class="m-l-10 m-r-10">No</label>
                                <?php echo get_form_error_msg($errors, 'show_in_header_menu'); ?>

                            </div>
                            <div class="form-group form-float">
                                <label class="status">Show in Footer Menu: </label>
                                <input type="radio" name="show_in_footer_menu" id="yes" class="with-gap radio-col-amber" value="1" <?php echo get_edit_select_check_pvr_old_value_with_obj('show_in_footer_menu',$page,
                                'show_in_footer_menu',1, 'show_in_footer_menu'); ?>>
                                <label for="yes" class="m-l-10 m-r-10">Yes</label>
                                <input type="radio" name="show_in_footer_menu" id="no" class="with-gap radio-col-amber" value="0" <?php echo get_edit_select_check_pvr_old_value_with_obj('show_in_footer_menu',$page,'show_in_footer_menu',0, 'chacked'); ?>>
                                <label for="no" class="m-l-10 m-r-10">No</label>
                                <?php echo get_form_error_msg($errors, 'show_in_footer_menu'); ?>

                            </div>
                                                       
                            <div class="form-group form-float">
                                <label class="status">Status : </label>
                                <input type="radio" name="page_status" id="active" class="with-gap radio-col-amber" value="1" <?php echo get_edit_select_check_pvr_old_value_with_obj('page_status',$page,
                                'page_status',1, 'page_status'); ?>>
                                <label for="active" class="m-l-10 m-r-10">Active</label>
                                <input type="radio" name="page_status" id="deactive" class="with-gap radio-col-amber" value="0" <?php echo get_edit_select_check_pvr_old_value_with_obj('page_status',$page,'page_status',0, 'chacked'); ?>>
                                <label for="deactive" class="m-l-10 m-r-10">Deactive</label>
                                <?php echo get_form_error_msg($errors, 'page_status'); ?>

                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 
                             m-r-10 m-l-10 go_to_next_page_btn">Save & Add Meta
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
        // CKEDITOR.replace('content',{
        //     Class:'ckeditor1'
        // });
        
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.contentsLangDirection = 'rtl';
        CKEDITOR.config.height = 600;
        CKEDITOR.config.contentsLanguage = 'hr';
        CKEDITOR.replaceClass='ckeditor1';
        
        $('.save_form_btn').click(function(event) {
            $('#go_to_next_page').val(0);
        });
        $('.go_to_next_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });
    </script> 
              
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/page/add_page.blade.php ENDPATH**/ ?>