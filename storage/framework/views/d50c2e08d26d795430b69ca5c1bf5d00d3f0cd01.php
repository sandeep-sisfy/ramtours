<?php $__env->startSection('rami_mobile_nav'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_header_serach'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mobile_container'); ?>
		<section class="rt-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="rtpkghead">אפשרויות לינה בטירול</h3>
						<div class="rt_prev_btn"><a href="<?php echo e(URL::previous()); ?>"><img src="<?php echo e(url('assets/mobile')); ?>/images/prev-btn-blk.png"></a></div>
					</div>
				</div>
			</div>
		</section>
		<section class="rt-filters">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 rt-inner">
						<div id="accordion">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">סינון על פי קטגוריות: </button>
										<i class="fa fa-angle-down" aria-hidden="true"></i>
									</h5>
								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										 <?php echo rami_package_hotel_filter_html(1); ?>

									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="rt_accomm">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-12 rt-inner hotel_div" >
           			<?php $__currentLoopData = $all_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="rt-packframes filterable" data-type="<?php echo e(implode(unserialize($hotel->hotel_type),'-')); ?>" data-star="<?php echo e($hotel->	hotel_star); ?>">
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
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
					</div>
					<?php if(!empty($show_load_more)): ?>
	               <div class="col-sm-12 text-center load_more_hotels_div">
	                  <input type="hidden" name="hotel_location" value="<?php echo e($loc_id); ?>">
	                  <button id="load_more_packs" class="btn btn-primary btn-lg btn-block view-more load_more_hotels" type="submit" page_attr="2">ראה עוד</button>
	               </div>
	               <?php endif; ?>
				</div>
			</div>
		</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_footer_js'); ?>
   ##parent-placeholder-567c36b17da248bc79e13763be604ea7bbcd439a##
   <script type="text/javascript">
     $('.load_more_hotels_div').on('click', '.load_more_hotels', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var hotel_location=$('input[name=hotel_location]').val();
      $.ajax({
        url: '/hotel_load_more',
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', page:page,no_of_element:9, hotel_location:hotel_location, is_mobile:1},
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
<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/mobile/pages/accommodation.blade.php ENDPATH**/ ?>