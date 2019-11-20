<?php $__env->startSection('rami_front_container'); ?>
   <section class="test-header">
    <div class="container">
      <div class="row contact-heading-box">
       <div class="col-md-6">
        <p>לינה / <?php echo e($hotel->hotel_address); ?></p>
      </div>
       <div class="col-md-6"><img src="<?php echo e(url('/assets/front/images')); ?>/hotel-room-top-icon.jpg" alt=""></div>
     </div>
    </div>
  </section>
  <section class="test-cont rt_accomd">
    <div class="container">
       <div class="row contact-content ">
        <div class="col-md-12">
         <div class="rt_accomm-detail">
         <div class="hotel-room-inner">
          <div class="hotel-room-heading-right">
          <div class="terms-heading">
             <?php $__currentLoopData = $hotel_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($loop->index==0): ?>
                        <?php echo e(get_hotel_type($hotel_type)); ?>

                      <?php else: ?>
                      <?php echo e('/ '.get_hotel_type($hotel_type)); ?>

                      <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="hotel-yellow-border-center">
            </div>
          </div>
          </div>
          <div class="hotel-room-heading-left">
            <div class="terms-heading">
            <div class="h_name"><?php echo e($hotel->hotel_display_name); ?></div>
            <div class="terms-heading-small-text"><?php echo e($hotel->hotel_code); ?> <strong>: קוד מלון </strong> &nbsp;&nbsp<?php echo e($hotel->hotel_address); ?> </div></div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark" id="rt_affix">
            <ul class="navbar-nav text-uppercase ml-auto rt_tabs">
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#gallery">גלריה</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#generalinfo">מידע כללי</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#choose-apartments">בחירת דירות</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger active" href="#map">מפה</a></li>
              </ul>
          </nav>
          <?php if(!empty($hotel->hotel_images)): ?>
          <div class="pkg-section" id="gallery">
             <div class="row">
                <div class="col-md-12 gallery">
                     <?php $__currentLoopData = $hotel->hotel_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="pics">
                        <a data-fancybox="gallery" href="<?php echo e(url('ramtours/'.$img->image)); ?>">
                          <img class="img-fluid" src="<?php echo e(url('ramtours/'.$img->image)); ?>" alt="">
                         </a>
                         <?php if(($loop->index==5)&&($hotel_gallery_count >0)): ?>
                        <div class="more_img">
                           +<?php echo e($hotel_gallery_count); ?>

                        </div>
                        <?php endif; ?>
                      </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
          </div>
          <?php endif; ?>
           <div class="pkg-section" id="generalinfo">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>מידע כללי </h3></div>
             </div>
             <div class="col-md-6 ap-cont">
              <p><?php echo $hotel->hotel_desc; ?></p>
             </div>
             <div class="col-md-6 ap-cont aprt">
              <h6 class="cont-head">מתקני המלון  </h6>
              <ul class="hotelroom">
               <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e(get_hotel_amenities($amenity)); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <h6 class="cont-head">פעילויות בקרבת מקום  </h6>
              <ul class="hotelroom">
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e(get_hotel_features($feature)); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <?php if(!empty($hotel_card)): ?>
            <div class="col-md-12 ap-cont">
              <h6 class="cont-head rt_cardhead">מידע על כרטיס </h6>
              <img src="<?php echo e(url('ramtours/'.$hotel_card['card_image'])); ?>" class="rt_cardimg">
                <p class="rt_cardesc">המתארחים במקום לינה זה זכאים 
                  <a href=" <?php echo e($hotel_card['link']); ?>" target="_blank">
                    <?php echo e($hotel_card['title']); ?>

                   </a>
                 </p>
            </div>
            <?php endif; ?>
           </div>
          </div>
          <div class="pkg-section" id="choose-apartments">
           <div class="row">
             <div class="col-md-12 bd-sec ap_slect">
              <div class="bd-head"><h3>תאור החדרים</h3></div>
             </div>
             <?php $__currentLoopData = $hotel_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-md-12 ap-cont">
              <h3 class="cont-head">
                 <span> 
                   <img src="<?php echo e(url('/assets/front/images')); ?>/ramtours-rooms.png"> 
                     <?php if(!empty($room['room_area'])): ?>
                          <?php echo e($room['room_type']); ?> - <?php echo e($room['room_area']); ?> מ"ר  |
                        <?php else: ?>
                           <?php echo e($room['room_type']); ?> |
                        <?php endif; ?>
                  </span>
                  <span>
                    <img src="<?php echo e(url('/assets/front/images')); ?>/mann.png">&nbsp;מתאים להרכב של עד <?php echo e($room['max_people']); ?> נפשות  <span dir="ltr">(<?php echo e($room['room_code']); ?>)</span>|
                  </span>
                  <span> 
                     <img src="<?php echo e(url('/assets/front/images')); ?>/aproom.png">
                    זמין במלאי יחידות   
                  </span>        
              </h3>
             </div>
             <div class="col-md-7 ap-cont">
             <p> <?php echo $room['room_desc']; ?><p>
             <p>מתאים להרכב של עד  <?php echo e($room['max_people']); ?> נפשות</p>
            </div>
            <div class="col-md-5 ap-cont">
             <div class="col-md-12 gallery">
                <?php $__currentLoopData = $room['room_images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pics">
                  <a data-fancybox="gallery1" href="<?php echo e(url('ramtours/'.$room_img->image)); ?>">
                  <img class="img-fluid" src="<?php echo e(url('ramtours/'.$room_img->image)); ?>" alt=""></a>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>
          </div>
          <?php if(!empty($map)): ?>
          <div class="pkg-section" id="map">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>אטרקציות באיזור מקום האירוח<img src="<?php echo e(url('/assets/front/images')); ?>/location.png"></h3></div>
             </div>
             <div class="col-md-4 att-sec">
              <div class="att-inner">
                <h5>מרחקי האטרקציות ממקום הלינה בקילומטרים</h5>
              <ul class="attr-pts">
                <?php $__currentLoopData = $attractions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><span class="num"><?php echo e($attr->attraction_sequence); ?></span><span class="attr_name"><?php echo e($attr->attraction_title); ?></span><span class="distance"><?php echo e($attr->attraction_distance); ?> ק"מ</span></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              </div>
            </div>
            <div class="col-md-8 map-sec">
               <img src="<?php echo e(url('ramtours/'.$map)); ?>" alt="map" class="img-fluid">
                <div class="map-text">
                כל המפות באתר מיועדות להמחשה בלבד, ישנם אי דיוקים במרחקי האטרקציות למקום הלינה, לכן אין להסתמך על נתונים אלה לצורך תכנון הטיול.
                </div>
            </div>
           </div>
          </div>
          <?php endif; ?>
          <?php if(!empty($hotel->hotel_instruction_text)): ?>
           <div class="pkg-section" id="notes">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>הערות לעסקה<img src="<?php echo e(url('/assets/front/images')); ?>/notes.png"></h3></div>
             </div>

             <div class="col-md-12">
                <?php echo $hotel->hotel_instruction_text; ?>

             </div>
             </div>
           </div>
           <?php endif; ?>
          
          <?php echo get_rami_hotel_reviews($hotel_reviews); ?>

           <?php if($hotel_packages->count()>0): ?>
          <section class="vac_pack">
           <div class="container">
             <div class="row">
             <div class="col-md-12"><h2>חבילות קשורות</h2></div>    
             <?php $__currentLoopData = $hotel_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel_package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo rami_vacation_pkg_html($hotel_package); ?>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>  
           </div>
          </section>
          <?php endif; ?>
        <!--  <div class="col-md-12">
            <div class="bd-head"><h3>הערות לעסקה</h3></div>
            <div class="remarks test"><p><strong>המחיר כולל:&nbsp;</strong>מיסים</p></div>
            <div class="bd-head"><h3>חוות דעת גולשים</h3></div>
            <div class="opp_btn"><a href="javascript:void(0)" id="add_opinion" class="add-opinion-button">+ הוסיפו חוות דעתכם</a>
            </div>
            <div class="terms-form-box" id="showopiniondiv">
            <div class="terms-heading"><div class="contact-time-icon term-icon"><img src="<?php echo e(url('/assets/front/images')); ?>/recomend-form-icon.jpg" alt=""></div>הוסף את חוות דעתך בקצרה
            <div class="contact-yellow-border"></div>
            </div>

            <form id="create_testimonial_form" method="post" action="">
              <div class="opinion-input-box">
              <span>דרוג כללי&nbsp;&nbsp;</span><span id="starRating">
                <img class="rating_star" src="<?php echo e(url('/assets/front/images')); ?>/grey-star.png" alt="" val-attr="1">
                <img class="rating_star" src="<?php echo e(url('/assets/front/images')); ?>/grey-star.png" alt="" val-attr="2">
                <img class="rating_star" src="<?php echo e(url('/assets/front/images')); ?>/grey-star.png" alt="" val-attr="3">
                <img class="rating_star" src="<?php echo e(url('/assets/front/images')); ?>/grey-star.png" alt="" val-attr="4">
                <img class="rating_star" src="<?php echo e(url('/assets/front/images')); ?>/grey-star.png" alt="" val-attr="5">
              </span>
              </div>
              <div class="opinion-input-box">
              <input name="post_title" type="text" class="contact-input" placeholder="*שם מלא" value="">
              </div>
              <div class="opinion-input-box-last">
              <input name="phone" type="text" class="contact-input" placeholder="*טלפון" value="">
              </div>
              <div class="clear"></div>
              <div class="marginTop-20">
              <textarea name="post_content" cols="" rows="" class="opinion-input-textarea" placeholder="תוכן המלצה / תגובה..."></textarea>
              </div>
              <div class="reco-submit"><input name="submit_testimonial" type="submit" value="שלח" class="contact-submit" style="width:100%;">
              </div>
            </form>
              <div class="clear"></div>
              </div>
          </div>-->
        <?php if($similar_loc_hotels_count>0): ?>
          <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="subs-head accom-relate">השכרת נופש וצימרים ב  <span><?php echo e($hotel->hotel_address); ?></span></h2>
            </div>
          </div>          
          <div class="row text-center">             
            <?php $__currentLoopData = $similar_loc_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 flightss">
              <div class="home-product-box">
                <div class="content-image clearfix">
                  <a href="<?php echo e(url('/accommodation/'.$hotel->id)); ?>"><img width="340" height="214" src="<?php echo e(rami_get_hotel_single_image($hotel->id)); ?>" class="img-fluid" alt=""></a>
                  <div class="date_code">
                    <div class="dates"></div>
                    <div class="ref_id_cont">
                      <span class="ref_id"><?php echo e($hotel->hotel_code); ?></span>
                    </div>
                  </div>
                </div>
                <div class="pakinner">
                  <div class="home-product-inner-box">
                  <div class="content-image-heading-english"><?php echo e($hotel->hotel_display_name); ?></div>
                  <div class="content-image-heading-border"></div>
                  </div>
                </div>
              </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
      </div>
    </div>
    <?php endif; ?>
    </div>
          </div>
          </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/pages/accommodation_detail.blade.php ENDPATH**/ ?>