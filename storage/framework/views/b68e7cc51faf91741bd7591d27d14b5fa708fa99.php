          <?php $__currentLoopData = $all_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="rt-packframes">
              <div class="accomm-left col-6 col-sm-6">
                <div class="accomm-heading">
                  <h5>
                     <?php if(!empty($hotel['hotel_display_name'])): ?>
                                  <?php echo e($hotel['hotel_display_name']); ?>

                                <?php else: ?>
                                  <?php echo e($hotel['hotel_code']); ?>

                                <?php endif; ?>
                  </h5>
                </div>
              </div>
              <div class="accomm-right col-6 col-sm-6">
                 <?php if(!empty($hotel->card)): ?>
                  <div class="inst-approv">
                    <img src="<?php echo e(rami_get_file_url($hotel->card->image)); ?>" alt="<?php echo e($hotel->card->card_title); ?>" class="img-fluid">
                  </div>
                <?php endif; ?>  
                <a href="<?php echo e(url('/accommodation/'.$hotel['id'])); ?>"><img src="<?php echo e(rami_get_hotel_single_image($hotel['id'])); ?>" alt="" class="img-fluid"></a>   
                <div class="rt-code"><span><?php echo e($hotel['hotel_code']); ?></span></div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/mobile/load_more/hotels.blade.php ENDPATH**/ ?>