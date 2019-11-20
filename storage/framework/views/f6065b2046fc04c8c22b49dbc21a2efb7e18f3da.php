<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/dropzone/dropzone.css">
    <link href="<?php echo e($assets_admin); ?>/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>
<div class="container-fluid">
    <?php echo show_flash_msg(); ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/hotel/'.$hotel_id.'/edit')); ?>" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/hotel/'.$hotel_id.'/edit')); ?>'">hotel Info</a></li>
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="<?php echo e(url('admin/hotel/gallery/'.$hotel_id)); ?>">Gellery</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/hotel-meta/'.$hotel_id)); ?>'">Meta data</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="home">
                                <form action="<?php echo e(url('admin/hotel/add_image/'.$hotel_id)); ?>" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                    <div class="dz-message">
                                        <div class="drag-icon-cph"><i class="material-icons">touch_app</i>
                                        </div>
                                        <h3 class="drop_files">Drop files here or click to Save Images.</h3>
                                    </div>
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('PUT')); ?>

                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="font col-orange">For multiple Image uploading drop files here or click to Save Images.</p>
                            <div class="form-group" style="text-align:center">
                                <button type="button" class="btn btn-success btn-primary waves-effect m-t-20 upload_comp" onclick="window.location.reload();" >Save Images
                                </button>
                                <button type="button" class="btn btn-success btn-primary waves-effect m-t-20 upload_comp" onclick='window.location.href="<?php echo e(url('/admin/room/create')); ?>"'>Save & add room
                                </button>
                            </div>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                <?php if(!empty($hotel)): ?>
                                <?php $__currentLoopData = $hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-20 rami_bk_galerry_box"> <a href="<?php echo e(rami_get_file_url($image->image)); ?>" data-sub-html="<?php echo e($image->title); ?>"> <img class="img-fluid img-thumbnail" src="<?php echo e(rami_get_file_url($image->image)); ?>" alt="<?php echo e($image->title); ?>" style="height:250px; width: 250px"> </a>
                                       <div class="btn-group text-center rami_galerry_btn">
                                          <button type="button" class="btn btn-raised bg-light-blue waves-effect edit_hotel_gallery" image_id="<?php echo e($image->id); ?>"><i class="material-icons">mode_edit</i></button>
                                           <button type="button" class="btn btn-raised bg-red waves-effect del_hotel_gallery" image_id="<?php echo e($image->id); ?>"> <i class="material-icons">delete_forever</i> </button>
                                       </div>
                                   </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <form id='del_hotel_img_form' method="POST" action="<?php echo e(url('admin/hotel/delete_image')); ?>" style="display: none">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
<script src="<?php echo e($assets_admin); ?>/plugins/dropzone/dropzone.js"></script>
<script src="<?php echo e($assets_admin); ?>/plugins/light-gallery/js/lightgallery-all.js"></script>
<script src="<?php echo e($assets_admin); ?>/js/pages/medias/image-gallery.js"></script>
<script type="text/javascript">
    Dropzone.options.frmFileUpload={
        paramName: "list_image", // The name that will be used to transfer the file
        maxFilesize: 5, // MB
        acceptedFiles:'image/*',
        dictFileTooBig:'File Size Is large please Add image less than 2MB',
        dictInvalidFileType:'Only Image File Allow to Upload',
        error:function(msg, er) {
        	alert(er);
        }
    };
    $('.edit_hotel_gallery').click(function(event) {
        if(confirm('Are you want to edit this image')){
            var url='admin/hotel/'+$(this).attr('image_id')+'/edit_image/';
            window.location.href='<?php echo e(url('')); ?>'+'/'+url;
        }

    });
    $('.del_hotel_gallery').click(function(event) {
        if(confirm('Are you want to Delete this image')){
            var url =$('#del_hotel_img_form').attr('action')+'/'+$(this).attr('image_id');
            $('#del_hotel_img_form').attr('action', url);
            $('#del_hotel_img_form').submit();
        }
    });
/*image validation*/
        $("#frmFileUpload").validate({
            rules: {
                file:{
                    image: true,
                },
            },
            messages: {
                file:{
                   image:"Please upload image file."
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/hotel/gallery.blade.php ENDPATH**/ ?>