<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="row treview-inner">
         <div class="col-md-3">
           <div class="recomendation-round-box">
            <div class="recomendation-images">
                <div class="recomendation-images-inner">                              
                <img src="<?php echo e(url('/assets/front/images')); ?>/boy.png" alt="">
                </div>
              </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="test-inner-box">
            <div class="test-heading"><?php echo e($testimonial->title); ?> 
              <div class="reco-yellow-border-center"></div>
            </div>
            <div class="test-date">
              <img src="<?php echo e(url('/assets/front/images')); ?>/calander-icon-recomended.jpg" alt=""> <?php echo e($testimonial->testimonial_date); ?>

            </div>
            <div class="clear"></div>
            <div class="testi-cont">
              <p><?php echo str_ireplace('\r\n', '<br>', $testimonial->remark); ?>

              </p>
            </div>                   
            <div class="clear"></div>
            </div>
            <a class="contact_pop_open" href="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
         
         </div>
       </div>        
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            <?php /**PATH /home/eli/ramtours/resources/views/frontend/load_more/testimonials.blade.php ENDPATH**/ ?>