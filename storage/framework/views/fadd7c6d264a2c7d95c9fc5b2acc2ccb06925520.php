
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link href="<?php echo e($assets_admin); ?>/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
<div class="container-fluid">
    <?php echo show_flash_msg(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div>
                        <form action="<?php echo e(url('/admin/package/package-page-placeholders')); ?>" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                            <div class="row page_place_holder" style="border: 1px solid #ebebeb; margin: -5px;">
                                <h5 style="padding: 6px 10px 0 10px;margin-bottom: -10px;">Top Static Nav Placeholders</h5>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="basic_details" value="<?php echo e(get_rami_page_placeholder('basic_details', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'basic_details'); ?>

                                            <label class="form-label">Basic details</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="apartment" value="<?php echo e(get_rami_page_placeholder('apartment', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'apartment'); ?>

                                            <label class="form-label">Apartment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="gallery" value="<?php echo e(get_rami_page_placeholder('gallery', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'gallery'); ?>

                                            <label class="form-label">Gallery</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="choice_of_apartments" value="<?php echo e(get_rami_page_placeholder('choice_of_apartments', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'choice_of_apartments'); ?>

                                            <label class="form-label"> Choice of apartments  </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="hotel_review" value="<?php echo e(get_rami_page_placeholder('hotel_review', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'hotel_review'); ?>

                                            <label class="form-label">Hotel Review</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="map" value="<?php echo e(get_rami_page_placeholder('map', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'map'); ?>

                                            <label class="form-label">Map</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="flights" value="<?php echo e(get_rami_page_placeholder('flights', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'flights'); ?>

                                            <label class="form-label">Flights</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="vehicle" value="<?php echo e(get_rami_page_placeholder('vehicle', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'vehicle'); ?>

                                            <label class="form-label">Vehicle</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row page_place_holder" style="border: 1px solid #ebebeb; margin: 40px -5px;">
                                <h5 style="padding: 6px 10px 0 10px;margin-bottom: -10px;">Additional Text for defferect sections</h5>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_apartment" value="<?php echo e(get_rami_page_placeholder('help_text_apartment', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'help_text_apartment'); ?>

                                            <label class="form-label">Apartment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_gallery" value="<?php echo e(get_rami_page_placeholder('help_text_gallery', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'help_text_gallery'); ?>

                                            <label class="form-label">Gallery</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_apartment_info" value="<?php echo e(get_rami_page_placeholder('help_text_apartment_info', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'help_text_apartment_info'); ?>

                                            <label class="form-label"> Hotel information  </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_attraction" value="<?php echo e(get_rami_page_placeholder('help_text_attraction', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'help_text_attraction'); ?>

                                            <label class="form-label">Attractions</label>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_flights" value="<?php echo e(get_rami_page_placeholder('help_text_flights', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'help_text_flights'); ?>

                                            <label class="form-label">Flights</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_vehicle" value="<?php echo e(get_rami_page_placeholder('help_text_vehicle', 1)); ?>">
                                            <?php echo get_form_error_msg($errors, 'help_text_vehicle'); ?>

                                            <label class="form-label">Vehicle</label>
                                        </div>
                                    </div>
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
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/package/package_page_placeholder.blade.php ENDPATH**/ ?>