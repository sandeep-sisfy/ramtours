<?php $__env->startSection('admin_breadcrumb'); ?>

<section class="content <?php echo $__env->yieldContent('admin_page_class'); ?>">

    <div class="block-header">

        <div class="row">

            <div class="col-lg-7 col-md-6 col-sm-12">

                <h2><?php echo $__env->yieldContent('title_breadcrumb'); ?>

                <small class="text-muted">Welcome to <?php echo e(config('constant.APP_ADMIN_TITLE')); ?></small>

                </h2>

            </div>

            <div class="col-lg-5 col-md-6 col-sm-12">

              <?php echo make_breadcrumb_admin(); ?>


                <!-- 

                <ul class="breadcrumb float-md-right">

                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Nexa</a></li>

                    <li class="breadcrumb-item active"><?php echo e(Route::currentRouteName()); ?></li>

                </ul> -->

            </div>

        </div>

    </div>

    

<?php echo $__env->yieldSection(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/adminpart/breadcrumb.blade.php ENDPATH**/ ?>