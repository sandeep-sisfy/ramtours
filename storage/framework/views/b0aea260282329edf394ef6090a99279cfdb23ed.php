<?php $__env->startSection('rami_front_container'); ?>
  <section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
       <div class="inner-page-breadcrum">
          <strong>::</strong> <a href="<?php echo e(url('/')); ?>">דף הבית </a>
          <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt=""> לינה 
          <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
          <strong> <?php echo e($loc_name); ?></strong>
    </div>
    </div>
  </section>
  <section class="rt_frames">
    <div class="container">
       <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">אפשרויות לינה  <?php echo e($loc_name); ?> </h2>
        </div>
        <!--<?php echo rami_package_hotel_filter_html(); ?>-->
        <div class="col-lg-12">
          
          <div class="row text-center hotel_div">
           <?php $__currentLoopData = $all_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-3 flightss filterable" data-type="<?php echo e(implode(unserialize($hotel->hotel_type),'-')); ?>" data-star="<?php echo e($hotel->  hotel_star); ?>">
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php if(!empty($show_load_more)): ?>
           <div class="col-md-12 load_more_hotels_div">
            <input type="hidden" name="hotel_location" value="<?php echo e($loc_id); ?>">
            <button class="test-btn load_more_hotels" type="submit" page_attr="2">ראה עוד</button>
           </div>
          <?php endif; ?>  
        </div>
      </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_front_footer_js'); ?>
##parent-placeholder-50c56da52e71826fbb807d7dfe32bd0402ef3ba4##
  <script type="text/javascript">
    $('.load_more_hotels_div').on('click', '.load_more_hotels', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var hotel_location=$('input[name=hotel_location]').val();
      $.ajax({
        url: '/hotel_load_more',
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', page:page,no_of_element:8, hotel_location:hotel_location},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.hotel_div').append(res.html);
          if(res.is_last_page==1){
             $('.load_more_hotels_div').hide();
          }
          page=parseInt(page);
          page++;
          $('.load_more_hotels').attr('page_attr',page);
        }else{
          alert(res.msg);
        }
      })
      .fail(function() {
        alert('some thing went wrong.');
      })
            
    });

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/pages/accommodation.blade.php ENDPATH**/ ?>