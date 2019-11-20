      <?php $__env->startSection('rami_mobile_slider'); ?>
      <section class="rt_slider">
         <div class="rt-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('assets/mobile')); ?>/images/logo.png"></a></div>
         <div id="rt_maincarousel" class="carousel slide" data-ride="carousel">
            <div class="overlay"></div>
            <div class="carousel-inner">
               <?php $__env->startSection('rami_mobile_slider_imgs'); ?>
               <div class="carousel-item active">
                  <img src="<?php echo e(url('assets/mobile')); ?>/images/rt_slider.jpg" class="img-fluid" alt="First slide">
               </div>
               <div class="carousel-item">
                  <img src="<?php echo e(url('assets/mobile')); ?>/images/rt_slider-1.jpg" class="img-fluid" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img src="<?php echo e(url('assets/mobile')); ?>/images/rt_slider-3.jpg" class="img-fluid" alt="Third slide">
               </div>
               <?php echo $__env->yieldSection(); ?>
            </div>
            <a class="carousel-control-prev" href="#rt_maincarousel" role="button" data-slide="prev">
            <img src="<?php echo e(url('assets/mobile')); ?>/images/prev.png" alt="Previous">       
            </a>
            <a class="carousel-control-next" href="#rt_maincarousel" role="button" data-slide="next">
            <img src="<?php echo e(url('assets/mobile')); ?>/images/next.png" alt="Next"> 
            </a>
         </div>
      </section>
      <?php echo $__env->yieldSection(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/mobile/mobile_part/slider.blade.php ENDPATH**/ ?>