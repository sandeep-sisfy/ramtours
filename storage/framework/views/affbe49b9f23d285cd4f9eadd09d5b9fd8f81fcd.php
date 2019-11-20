<?php $__env->startSection('rami_front_container'); ?>
   <section class="rt_frames">
    <div class="container">
      <div class="row contact-heading-box">
       <div class="col-md-6"><p><?php echo e($page->page_title); ?></p></div>
       <div class="col-md-6"><img src="<?php echo e(url('/assets/front/images')); ?>/term-condition-icon.jpg" alt=""></div>
     </div>
    </div>
  </section>
  <section class="bfcard">
    <div class="container">
       <div class="row">
        <?php if($page->having_right_link==1): ?>
        <div class="col-md-3 bfleftnav">
          <div class="content-right-nav">
          <?php if(!empty($page->menu_title)): ?>
           <div class="content-nav-heading"><?php echo e($page->menu_title); ?></div>
          <?php else: ?>
          <div class="content-nav-heading">$page->page_title</div>
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
       <?php echo $__env->make('frontend.pages.page_contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
  </section>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_front_footer_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/frontend/pages/static_page.blade.php ENDPATH**/ ?>