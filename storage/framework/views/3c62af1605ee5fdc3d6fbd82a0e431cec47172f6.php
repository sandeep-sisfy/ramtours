  <?php $__currentLoopData = $all_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-3 flightss">
        <div class="home-product-box">
          <div class="content-image clearfix">
              <?php if(!empty($hotel->card)): ?>
                <div class="rt_crdimg"><img src="<?php echo e(rami_get_file_url($hotel->card->image)); ?>" alt="<?php echo e($hotel->card->card_title); ?>"></div>
              <?php endif; ?>                    
           <a href="<?php echo e(url('accommodation/'.$hotel['id'])); ?>"><img width="340" height="214" src="<?php echo e(rami_get_hotel_single_image($hotel['id'])); ?>" class="img-fluid" alt=""></a>
           <div class="date_code">
             <div class="dates"></div>
             <div class="ref_id_cont">
               <span class="ref_id"><?php echo e($hotel['hotel_code']); ?></span>
             </div>
           </div>
          </div>
          <div class="pakinner">
            <div class="home-product-inner-box">
            <div class="content-image-heading-english">
              <?php if(!empty($hotel['hotel_display_name'])): ?>
                <?php echo e($hotel['hotel_display_name']); ?>

              <?php else: ?>
                <?php echo e($hotel['hotel_code']); ?>

              <?php endif; ?>
            </div>
            <div class="content-image-heading-border"></div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/load_more/hotels.blade.php ENDPATH**/ ?>