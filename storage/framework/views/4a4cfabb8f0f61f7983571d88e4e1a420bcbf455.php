<body id="page-top" class="home <?php echo $__env->yieldContent('rami_front_page_class'); ?>">
<?php $__env->startSection('rami_front_header'); ?>
<section class="top-header">
  <div class="container">
    <div class="row top-strip">
      <div class="col-md-6">
         <div class="top-search-box">
        <form action="<?php echo e(url('search')); ?>" method="POST" accept-charset="utf-8" id="search_form_header" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="top-search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
          <input name="hotel_code" type="text" class="top-search" placeholder="חפש באתר...">
        </form>
         </div>
        </div>
        <div class="col-md-6">
          <div class="top-services-text"> לשירותכם גם נציג שירות <span class="top-number">
            <a href="tel:072-372-6240">072-372-6240</a></span>
          </div>
          <div class="social-ico">
            <ul>
              <li><a href="javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
              <li><a href="https://www.facebook.com/RmNsywtWtyyrwt"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
    </div>
  </div>
</section>

<?php /**PATH /home/eli/ramtours/resources/views/frontend/front_part/topnav.blade.php ENDPATH**/ ?>