<!DOCTYPE html>
<html lang="en" dir="rtl">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <?php if(!empty($site_title)): ?>
      <title><?php echo e($site_title); ?></title>
      <?php else: ?>
      <title>Ramtours</title>
      <?php endif; ?>
      <?php if(!empty($header_custom_code)): ?>
      <?php echo $header_custom_code; ?>

      <?php endif; ?>
      <?php $__env->startSection('rami_mobile_header_css'); ?>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="<?php echo e(url('assets/mobile')); ?>/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo e(url('assets/mobile')); ?>/css/jquery.fancybox.css" rel="stylesheet">
      <link href="<?php echo e(url('assets/mobile')); ?>/css/daterangepicker.css" rel="stylesheet">
      <link href="<?php echo e(url('assets/mobile')); ?>/css/style.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
      <?php echo $__env->yieldSection(); ?>
   </head>
   <body class="home <?php echo $__env->yieldContent('rami_front_page_class'); ?>"><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/mobile/mobile_part/head.blade.php ENDPATH**/ ?>