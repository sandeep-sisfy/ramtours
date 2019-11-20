<?php $__env->startSection('rami_mobile_nav'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_header_serach'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mobile_container'); ?>
  <section class="rt-info rtasd">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="rtpkghead"><?php echo e($page->page_title); ?></h3>
                  <div class="rt_btnsec">
                     <div class="acdico"><a href="#"><img src="<?php echo e(url('assets/mobile')); ?>/images/blk_card.png" alt=""></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
  <section class="bfcard">
    <div class="container">
       <div class="row">
        <?php if($page->having_right_link==1): ?>
        <div class="col-sm-12 bfleftnav">
          <div class="content-right-nav">
          <?php if(!empty($page->menu_title)): ?>
           <div class="content-nav-heading"><span><?php echo e($page->menu_title); ?> </span><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_menu.png" class="bfmenu"></div>
          <?php else: ?>
          <div class="content-nav-heading">$page->page_title <img src="<?php echo e(url('assets/mobile')); ?>/images/rt_menu.png" class="bfmenu"></div>
          <?php endif; ?>
         
          <div class="right-menu">          
          <ul class="right-nav">
            <?php $__currentLoopData = $page_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(url($page_link->pagelink_url)); ?>"><?php echo e($page_link->pagelink_title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="<?php echo e($page_class); ?>">
             <div class="contact-content">
                  <div class="terms">
                    <?php if(!empty($page->page_img)): ?>
                     <img src="<?php echo e(rami_get_file_url($page->page_img)); ?>" alt="" class="img-fluid">
                   <?php endif; ?>
                  <h1><?php echo e($page->page_title); ?></h1>
                  <?php echo str_ireplace('\n', '' ,str_ireplace('\r\n', '', $page->page_disc)); ?>

                </div>
            </div>
       </div>
   </div>
   <?php echo $__env->make('frontend.pages.page_contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
  </section>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_footer_js'); ?>
##parent-placeholder-567c36b17da248bc79e13763be604ea7bbcd439a##
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/mobile/pages/static_page.blade.php ENDPATH**/ ?>