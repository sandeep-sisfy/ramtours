<?php $__env->startSection('rami_front_container'); ?>
<section class="test-header">
  <?php 
    if(empty($testimonial))
    $testimonial='';
?>
    <div class="container">
      <div class="row contact-heading-box">
       <div class="col-md-6"><p>לקוחות רם נסיעות ממליצים </p></div>
       <div class="col-md-6"><img src="<?php echo e(url('/assets/front/images')); ?>/recommendation-icon.jpg" alt=""></div>
     </div>
    </div>
  </section>
  <section class="test-cont">
    <div class="container">
       <div class="row">
        <div class="col-md-12">
         <div class="contact-content rt_tstmn">
         <img src="<?php echo e(url('/assets/front/images')); ?>/recomendation-body-header.jpg" class="img-fluid test_img">
         <div class="hotel-room-inner">
         <div class="terms-heading text-head-center">לקוחות רם נסיעות ממליצים <div class="hotel-yellow-border-center"></div>
         </div>
         <p>לקוחות יקרים,</p>
         <p>אנחנו ברם נסיעות ותיירות&nbsp;רוצים לתת לכם את השירות הטוב ביתר ואת חויית המשתמש באתר בצורה האפקטיבית, האולטימטיבית והנוחה ביותר. לכן הקדשנו דף המלצות זה עבורם על מנת<br>
          שתתרשמו מהמלצותיהם של לקוחותינו ואף תוסיפו את חוות דעתכם האישית ובכך נוכל יחד לתרום לחוויה המשותפת.<br>
          תודה רבה מראש, רמי.</p>
          </div>        
        <div class="col-md-12 testmn_form">
        <div class="contact-time-icon"><img src="<?php echo e(url('/assets/front/images')); ?>/recomend-form-icon.jpg" alt=""></div>
        <div class="contact-heading">טופס קשר מהיר</div>
        <div class="contact-yellow-border"></div>
        <?php echo show_flash_msg(); ?>  
        <div class="contact-rtform" lang="he-IL" dir="rtl">        
        <form action="<?php echo e(url('/submit-testimonial')); ?>" id="add_testimonial" method="POST" accept-charset="utf-8" >
        <?php echo e(csrf_field()); ?>

          <div class="recomendation-input-box">
          <input name="first_name" type="text" class="contact-input" placeholder="* הזן שם פרטי " value="<?php echo get_edit_input_pvr_old_value('first_name',''); ?>" required="true">
          <?php echo get_form_error_msg($errors, 'first_name'); ?>

          </div>
          <div class="recomendation-input-box-left">
          <input name="last_name" type="text" class="contact-input" placeholder="* הזן שם משפחה" value="<?php echo get_edit_input_pvr_old_value('last_name',''); ?>" required="true">
           <?php echo get_form_error_msg($errors, 'last_name'); ?>

          </div>
          <div class="clear"></div>
          <div class="recomendation-text-area">
          <input name="email" type="email" class="contact-input" placeholder="*דואר אלקטרוני" value="<?php echo get_edit_input_pvr_old_value('email',''); ?>" required="true">
           <?php echo get_form_error_msg($errors, 'email'); ?>

          </div>
          <div class="clear"></div>
          <div class="recomendation-text-area">
          <input name="title" type="text" class="contact-input" placeholder="*שם מלא" value="<?php echo get_edit_input_pvr_old_value('title',''); ?>" required="true">
           <?php echo get_form_error_msg($errors, 'title'); ?>

          </div>
          <div class="clear"></div>
          <div class="recomendation-text-area">
          <textarea name="remark" cols="" rows="" class="contact-input-textarea" placeholder="תוכן המלצה / תגובה..." required="true" <?php echo get_edit_input_pvr_old_value('remark',''); ?> ></textarea>
           <?php echo get_form_error_msg($errors, 'remark'); ?>

          </div>
          <div class="reco-submit"><input type="submit" value="שלח" class="contact-submit"></div>
        </form>
        </div>     
       </div>
      </div>
    </div> 
  </section>
   <section class="test-reviews">
    <div class="container testimonial_div">
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
             <a class="contact_pop_open" href="#contact_popup" data-toggle="modal" data-target="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
         
         </div>
       </div>        
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        <div class="row treview-inner rami_load_more_btn_div">      
            <div class="col-md-12">       
              <button class="test-btn rami_load_more_btn"  page_attr="2">להראות יותר  </button>
            </div>
        </div>
      </div>
    </section>
<?php echo $__env->make('frontend.pages.contact_us_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_front_footer_js'); ?>
##parent-placeholder-50c56da52e71826fbb807d7dfe32bd0402ef3ba4##
  <?php echo $__env->make('frontend.pages.singal_js.contact_us_popup_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/frontend/pages/testimonials.blade.php ENDPATH**/ ?>