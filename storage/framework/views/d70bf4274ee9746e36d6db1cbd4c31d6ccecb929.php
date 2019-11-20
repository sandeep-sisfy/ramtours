  <?php $__env->startSection('rami_front_footer_js'); ?>
  <script src="<?php echo e(url('assets/front/js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(url('assets/front/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(url('assets/front/js/jquery.easing.min.js')); ?>"></script>
  <script src="<?php echo e(url('assets/front/js/jquery.fancybox.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('assets/front/js/jquery-ui.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('assets/front/js/moment.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('assets/front/js/daterangepicker.js')); ?>"></script>
  <script src="<?php echo e(url('assets/front/js/filters.min.js')); ?>"></script>
  <script src="<?php echo e(url('assets/front/js/custom.js')); ?>"></script>
  <?php echo $__env->yieldSection(); ?>
  <?php if(!empty($footer_custom_code)): ?>
    <?php echo $footer_custom_code; ?>

  <?php endif; ?>
</body>
</html>
<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/front_part/foot.blade.php ENDPATH**/ ?>