<!doctype html>
<html class="no-js " lang="<?php echo e(get_rami_setting('backend_lang')); ?>">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title><?php echo e(__('APP_ADMIN_TITLE')); ?>::<?php echo $__env->yieldContent('title'); ?></title>
<!-- Favicon-->
<?php $__env->startSection('admin_head_css'); ?>
<link rel="icon" href="http://ramnew.sisfy.com/assets/front/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/morrisjs/morris.css" /><!-- Custom Css -->
<link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/main.css">
<?php if(rami_check_backend_language_dir_rtl()==1): ?>
<link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/rtl.css">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/color_skins.css">
<?php echo $__env->yieldSection(); ?>
</head><?php /**PATH /home/eli/ramtours/resources/views/admin/adminpart/head.blade.php ENDPATH**/ ?>