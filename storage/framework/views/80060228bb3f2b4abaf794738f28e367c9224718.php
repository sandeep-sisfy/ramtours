
<?php $__env->startSection('rami_front_container'); ?>
     <section class="rt_error">
     <div class="container">
      <div class="row">
        <div class="col-md-12">
        <img src="<?php echo e(url('assets/front/images/payment-success.png')); ?>" alt="Payment Successful">
        <h5>התשלום הצליח  </h5> 
        <p>תודה ! התשלום שלך התקבל בהצלחה  <br> אנא בדוק בדוא"ל שלך את אישור ההזמנה. </p>
        </div>
      </div>
     </div>
  </section>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_front_footer_js'); ?>
##parent-placeholder-50c56da52e71826fbb807d7dfe32bd0402ef3ba4##
<script type="text/javascript">
  $.ajax({
    url: '<?php echo e(url("auto/setup_all_package_cost")); ?>',
    type: 'GET',
  })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/pages/payment_success.blade.php ENDPATH**/ ?>