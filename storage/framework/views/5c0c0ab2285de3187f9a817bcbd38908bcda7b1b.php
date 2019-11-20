<?php $__env->startSection('admin_topnav'); ?>
<body class="theme-orange <?php echo e(rami_get_backend_language_dir()); ?>" >
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">        
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <p>Please wait...</p>
            <div class="m-t-30"><img src="<?php echo e(config('constant.LOGO')); ?>" alt="<?php echo e(__('APP_NAME')); ?>" width="48" height="48"></div>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div><!-- Search  -->
    <!--top nav -->
    <nav class="navbar">
        <div class="col-12">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo e(url('/admin')); ?>"><?php echo e(config('constant.APP_ADMIN_TITLE')); ?></a>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true">
                        <i class="zmdi zmdi-fullscreen"></i>                   
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="admin-logout mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo e(csrf_field()); ?>

    </form>
<!-- top nav-->
<?php echo $__env->yieldSection(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/adminpart/topnav.blade.php ENDPATH**/ ?>