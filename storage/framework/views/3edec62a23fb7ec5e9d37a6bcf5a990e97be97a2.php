<?php $__env->startSection('rami_front_container'); ?>
<section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">  
       <div class="inner-page-breadcrum">
    <strong>::</strong> <a href="<?php echo e(url('/')); ?>">דף הבית </a><img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
    טיסות  <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
    <strong><?php echo e($loc_name); ?></strong>
    </div>
    </div>
  </section> 
  <section class="rt_fights">
    <div class="container">
     <div class="row flt-inner"> 
     <div class="content-heading col-lg-12">
        <?php if(!empty($page_title)): ?>
          <h1><?php echo e($page_title); ?> </h1>
        <?php else: ?>
          <h1>טיסות ל<?php echo e($loc_name); ?> </h1>
        <?php endif; ?>
       
     </div>   
    <!-- <?php echo rami_flight_filter_html(); ?>   -->
      <div class="col-lg-12 flights_div">
        <?php $__currentLoopData = $all_flights_sche; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight_she): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo rami_flights_page_html($flight_she); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
         <?php if(!empty($show_load_more)): ?>
           <div class="col-md-12 load_more_flights_div">
            <input type="hidden" name="flight_location" value="<?php echo e($loc_id); ?>">
            <input type="hidden" name="flight_start_date" value="<?php echo e($ser_start_date); ?>">
            <input type="hidden" name="flight_end_date" value="<?php echo e($ser_end_date); ?>">
            <input type="hidden" name="flight_location_source" value="<?php echo e($loc_source); ?>">
            <input type="hidden" name="is_serach" value="<?php echo e($is_serach); ?>">
            <button class="test-btn load_more_flights" type="submit" page_attr="2">ראה עוד</button>
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
    $('.load_more_flights_div').on('click', '.load_more_flights', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var flight_location=$('input[name=flight_location]').val();
      var flight_start_date=$('input[name=flight_start_date]').val();
      var flight_end_date=$('input[name=flight_end_date]').val();
      var is_serach=$('input[name=is_serach]').val();
      var flight_location_source=$('input[name=flight_location_source]').val();
      $.ajax({
        url: '/flight_load_more',
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', page:page,no_of_element:8, flight_location:flight_location, flight_start_date:flight_start_date, flight_end_date:flight_end_date, flight_location_source:flight_location_source, is_serach:is_serach},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.flights_div').append(res.html);
          if(res.is_last_page==1){
             $('.load_more_flights_div').hide();
          }
          page=parseInt(page);
          page++;
          $('.load_more_flights').attr('page_attr',page);
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
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/pages/flights.blade.php ENDPATH**/ ?>