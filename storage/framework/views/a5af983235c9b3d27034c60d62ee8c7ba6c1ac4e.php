

<?php $__env->startSection('rami_front_container'); ?>
  <section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
       <div class="inner-page-breadcrum">
    <strong>::</strong> <a href="<?php echo e(url('/')); ?>">דף הבית </a>
    <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
    חבילות
    <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
    </div>
    </div>
  </section>
  <section class="rt_frames">
    <div class="container">
       <div class="row">
        <div class="col-lg-12 text-center">
              <h2 class="section-heading">חבילות נופש באיזור   <?php echo e($loc_name); ?></h2>
        </div>
       
        
      
        <div class="col-lg-12">
          <div class="row text-center pakage_div">
           <?php $__currentLoopData = $all_pkgs_fhc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkgs_fhc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php echo rami_vacation_pkg_html($pkgs_fhc, 3); ?>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
           <?php if(!empty($show_load_more)): ?>
           <div class="col-md-12 load_more_packs_div">
            <input type="hidden" name="pack_location" value="<?php echo e($loc_id); ?>">
            <input type="hidden" name="pack_start_date" value="<?php echo e($ser_start_date); ?>">
            <input type="hidden" name="pack_end_date" value="<?php echo e($ser_end_date); ?>">
            <button class="test-btn load_more_packs" type="submit" page_attr="2">ראה עוד</button>
           </div>
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
    $('.load_more_packs_div').on('click', '.load_more_packs', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var pack_location=$('input[name=pack_location]').val();
      var pack_start_date=$('input[name=pack_start_date]').val();
      var pack_end_date=$('input[name=pack_end_date]').val();
      $.ajax({
        url: '/package_load_more',
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', page:page,no_of_element:8, pack_location:pack_location, pack_start_date:pack_start_date, pack_end_date:pack_end_date},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.pakage_div').append(res.html);
          if(res.is_last_page==1){
             $('.load_more_packs_div').hide();
          }
          page=parseInt(page);
          page++;
          $('.load_more_packs').attr('page_attr',page);
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
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/pages/search_vacation_packages.blade.php ENDPATH**/ ?>