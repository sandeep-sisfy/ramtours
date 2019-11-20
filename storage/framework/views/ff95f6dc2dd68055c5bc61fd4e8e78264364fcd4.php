
<?php $__env->startSection('mobile_container'); ?>
  <section class="rt_error">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
              <img src="<?php echo e(url('assets/mobile')); ?>/images/payment-success.png" class="img-fluid" alt="Payment Error">
              <h5>שגיאת תשלום </h5>
              <p>מצטער ! לא ניתן לעבד את התשלום שלך. בבקשה נסה שוב <br> אנא בדוק בדוא"ל שלך את אישור ההזמנה. </p>
              </div>
            </div>
           </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/mobile/pages/payment_success.blade.php ENDPATH**/ ?>