
<?php $__env->startSection('title','login'); ?>
<?php $__env->startSection('admin_head_css'); ?>
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/authentication.css">
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/color_skins.css">
    <?php if(rami_check_backend_language_dir_rtl()==1): ?>
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/rtl.css">
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_topnav'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_left_menu'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
<body class="theme-orange <?php echo e(rami_get_backend_language_dir()); ?>" style="zoom:90%">
<div class="authentication" style="height: 100%">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="<?php echo e(config('constant.LOGO')); ?>" alt="<?php echo e(__('APP_NAME')); ?>" width="100"></div>
                        <h1><?php echo e(__('APP_NAME')); ?></h1>
                    </div>                        
                </div>
                <form class="col-lg-12" method="POST" action="<?php echo e(route('login')); ?>" id="sign_in">
                    <?php echo e(csrf_field()); ?>

                    <h5 class="title"><?php echo e(__('Sign in to your Account')); ?></h5>
                    <?php echo show_flash_msg(); ?>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                            <?php echo get_form_error_msg($errors, 'email'); ?>

                            <label class="form-label" ><?php echo e(__('login.Email')); ?></label>
                            
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password">
                            <label class="form-label"><?php echo e(__('login.Password')); ?></label>
                            <?php echo get_form_error_msg($errors, 'password'); ?>

                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-cyan">
                        <label for="rememberme"><?php echo e(__('login.Remember Me')); ?></label>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-raised btn-primary waves-effect"><?php echo e(__('login.SIGN IN')); ?></button>
                                                
                    </div> 
                    <div class="col-lg-12 m-t-20">
                        <a class="" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('login.Forgot Your Password')); ?>

                        </a> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin_jscript'); ?>
<script src="<?php echo e($assets_admin); ?>/bundles/libscripts.bundle.js"></script>    
<script src="<?php echo e($assets_admin); ?>/bundles/vendorscripts.bundle.js"></script>
<script src="<?php echo e($assets_admin); ?>/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo e($assets_admin); ?>/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript">
    $("#sign_in").validate({
          rules: {
            email:{
              required: true,
              email:true
            },
            password:{
                required:true,
            }

          },
          messages: {
            email: {
              required: "<?php echo e(__('login.Please enter your email to Sign-In.')); ?>",
              email:"<?php echo e(__('login.Please Enter Valid Email Address.')); ?>"
            },
            password:{
                required:"<?php echo e(__('login.Please enter your password to Sign-In.')); ?>"
            }
          }
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_footer'); ?>
<?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>