<?php $__env->startSection('rami_mobile_nav'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_header_serach'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mobile_container'); ?>
      <section class="rt-info">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                   <?php if(!empty($page_title)): ?>
                    <h3 class="rtpkghead"><?php echo e($page_title); ?> </h3>
                  <?php else: ?>
                    <h3 class="rtpkghead">טיסות ל<?php echo e($loc_name); ?> </h3>
                  <?php endif; ?>
                  <div class="rt_btnsec">
                     <div class="rt_prev_btn"><a href="<?php echo e(URL::previous()); ?>"><img src="<?php echo e(url('assets/mobile')); ?>/images/prev-btn-blk.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="fltdltss">
         <div class="container">
            <div class="row flights_div">
               <?php $__currentLoopData = $all_flights_sche; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight_she): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo rami_flights_mobile_page_html($flight_she); ?>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if(!empty($show_load_more)): ?>
               <div class="col-sm-12 text-center load_more_flights_div">
                  <input type="hidden" name="flight_location" value="<?php echo e($loc_id); ?>">
                  <input type="hidden" name="flight_start_date" value="<?php echo e($ser_start_date); ?>">
                  <input type="hidden" name="flight_end_date" value="<?php echo e($ser_end_date); ?>">
                  <input type="hidden" name="flight_location_source" value="<?php echo e($loc_source); ?>">
                  <input type="hidden" name="is_serach" value="<?php echo e($is_serach); ?>">
                  <button id="load_more_packs" class="btn btn-primary btn-lg btn-block view-more load_more_flights" type="submit" page_attr="2">ראה עוד</button>
               </div>
            <?php endif; ?>
         </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_footer_js'); ?>
   ##parent-placeholder-567c36b17da248bc79e13763be604ea7bbcd439a##
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
        data: {_token:'<?php echo e(csrf_token()); ?>', page:page,no_of_element:9, flight_location:flight_location, flight_start_date:flight_start_date, flight_end_date:flight_end_date, flight_location_source:flight_location_source, is_serach:is_serach, is_mobile:1},
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
      
<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/mobile/pages/flights.blade.php ENDPATH**/ ?>