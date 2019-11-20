               <?php $__env->startSection('rami_mobile_slider_imgs'); ?>
                  <?php $__currentLoopData = $hotel_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($loop->index==1): ?>
                              <div class="carousel-item active">
                           <?php else: ?>
                              <div class="carousel-item">
                           
                           <?php endif; ?>
                               <img class="img-fluid" src="<?php echo e(url('ramtours/'.$img->image)); ?>" alt="<?php echo e($img->title); ?>">
                           </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php $__env->stopSection(); ?>
<?php $__env->startSection('mobile_container'); ?>
      <section class="rt-info py-1">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="rtpkghead"><?php echo e(get_child_location_parent_name_seq($hotel->hotel_location)); ?></h3>
                  <div class="rt_btnsec">
                     <div class="accom_ico"><a href="#"><img src="<?php echo e(url('/assets/mobile')); ?>/images/ac-detail.png" alt=""></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="pkg_section py-1">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner text-right">
                  <h3><?php echo e($hotel->hotel_display_name); ?></h3>
               </div>
               <div class="col-sm-12 rt-inner text-right">
                  <div class="terms-heading-small-text"><?php echo e($hotel_code); ?>

                     <strong>: קוד מלון </strong> <?php echo e($hotel->hotel_address); ?>

                  </div>
               </div>
               <div class="col-sm-12 rt-inner listpkg">
                  <h3 class="pkg_head">לינה  :</h3>
                  <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile')); ?>/images/rooms.png" alt="">
                     <h4>פרטי המלון</h4>
                     <div class="pkg_btnn"><a href="javascript:void(0)" id="accom_ginfo_btn"><img src="<?php echo e(url('assets/mobile')); ?>/images/pkg-arrow-yellow.png" class="inf_arrow"></a></div>
                  </div>
                  <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile')); ?>/images/apartment-ico.png" alt="">
                     <h4>פרטי דירה</h4>
                     <div class="pkg_btnn"><a href="javascript:void(0)" id="accom_rooms_btn">
                        <img src="<?php echo e(url('assets/mobile')); ?>/images/pkg-arrow-yellow.png" class="inf_arrow"></a>
                     </div>
                  </div>
                  <?php if(!empty($map)): ?>
                  <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile')); ?>/images/location.png" alt="">
                     <h4>אטרקציות</h4>
                     <div class="pkg_btnn"><a href="javascript:void(0)" id="accom_map_btn">
                        <img src="<?php echo e(url('assets/mobile')); ?>/images/pkg-arrow-yellow.png" class="inf_arrow"></a>
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php if(!empty($hotel->hotel_instruction_text)): ?>
                   <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile')); ?>/images/notes.png" alt="">
                     <h4>הערות לעסקה </h4>
                     <div class="pkg_btnn"><a href="javascript:void(0)" id="accom_notes_btn">
                        <img src="<?php echo e(url('assets/mobile')); ?>/images/pkg-arrow-yellow.png" class="inf_arrow"></a>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
               <div class="col-sm-12 accom_sec">
                  <div class="bd-head">
                     <h3>הערות לעסקה</h3>
                  </div>
                  <div class="remarks test">
                     <p><strong>המחיר כולל:&nbsp;</strong>מיסים</p>
                  </div>
                  <div class="bd-head">
                     <h3>חוות דעת גולשים</h3>
                  </div>
                  <div class="opp_btn"><a href="javascript:void(0)" id="accom_opinion" class="add-opinion-button">+ הוסיפו חוות דעתכם</a>
                  </div>
                  <div class="terms-form-box" id="accom-form" style="display:none">
                     <div class="terms-heading">
                        <div class="contact-time-icon term-icon"><img src="<?php echo e(url('assets/mobile')); ?>/images/recomend-form-icon.jpg" alt=""></div>
                        הוסף את חוות דעתך בקצרה
                        <div class="contact-yellow-border"></div>
                     </div>
                     <form id="create_testimonial_form" method="post" action="" enctype="multipart/form-data">
                        <div class="opinion-input-box accom_str">          
                           <span>דרוג כללי&nbsp;&nbsp;</span><span id="starRating"> 
                           <img class="rating_star" src="<?php echo e(url('assets/mobile')); ?>/images/grey-star.png" alt="" val-attr="1">
                           <img class="rating_star" src="<?php echo e(url('assets/mobile')); ?>/images/grey-star.png" alt="" val-attr="2">
                           <img class="rating_star" src="<?php echo e(url('assets/mobile')); ?>/images/grey-star.png" alt="" val-attr="3">
                           <img class="rating_star" src="<?php echo e(url('assets/mobile')); ?>/images/grey-star.png" alt="" val-attr="4">
                           <img class="rating_star" src="<?php echo e(url('assets/mobile')); ?>/images/grey-star.png" alt="" val-attr="5">
                           </span>
                        </div>
                        <div class="opinion-input-box">
                           <input name="post_title" type="text" class="contact-input" placeholder="*שם מלא" value="">
                        </div>
                        <div class="opinion-input-box">
                           <input name="phone" type="text" class="contact-input" placeholder="*טלפון" value="">
                        </div>
                        <div class="clear"></div>
                        <div class="marginTop-20">
                           <textarea name="post_content" cols="" rows="" class="opinion-input-textarea form-control" placeholder="תוכן המלצה / תגובה..."></textarea>
                        </div>
                        <div class="reco-submit"><input name="submit_testimonial" type="submit" value="שלח" class="contact-submit" style="width:100%;"></div>
                     </form>
                     <div class="clear"></div>
                  </div>
               </div>
               <div class="col-sm-12 vac_pack"></div>
               <?php if(!empty($hotel_packages_count)): ?>
               <div class="col-sm-12">
                   <div class="row">
                     <div class="col-sm-12 text-center">
                       <h2 class="subs-head accom-relate">השכרת נופש וצימרים ב  <span><?php echo e($hotel->hotel_address); ?></span></h2>
                     </div>
                   </div>          
                   <div class="row text-center">  
                      <div class="col-sm-12 rt-inner">           
                        <?php $__currentLoopData = $hotel_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php echo rami_vacation_pkg_mobile_html($package); ?>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                      </div>      
                  </div>
                </div>
                <?php endif; ?>
            </div>
         </div>
      </section>
      <?php if(!empty($similar_loc_hotels_count)): ?>
      <section class="accom_frms">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="pkg_head"><?php echo e(get_location_name($hotel_location)); ?> לינה נוספות באיזור טירול</h3>
               </div>
               <div class="col-sm-12 rt-inner hotel_div">
                  <?php $__currentLoopData = $similar_loc_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel_new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>             
                   <div class="rt-packframes filterable">
                         <div class="accomm-right col-6 col-sm-6">
                           <a href="<?php echo e(url('/accommodation/'.$hotel_new->id)); ?>"><img width="340" height="214" src="<?php echo e(rami_get_hotel_single_image($hotel_new->id)); ?>" class="img-fluid" alt=""></a>
                           <div class="rt-code">
                             <div class="dates"></div>
                             <div class="ref_id_cont">
                               <span class="ref_id"><?php echo e($hotel_new->hotel_code); ?></span>
                             </div>
                           </div>
                         </div>
                         <div class="accomm-left col-6 col-sm-6">
                           <div class="home-product-inner-box">
                           <div class="accomm-heading"><h5><?php echo e($hotel->hotel_display_name); ?></h5></div>
                           <div class="content-image-heading-border"></div>
                           </div>
                         </div>
                       </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
               </div>
            </div>
         </div>
      </section>
      <?php endif; ?>      
      <!-- pop ups -->
      <div class="rt_popup accomsec" id="accom_gallery">
         <div class="popup-header">
            <div class="accom_close"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_navclse.png"></div>
            <h4><img src="<?php echo e(url('assets/mobile')); ?>/images/apartment-ico.png" alt="">גלריה</h4>
         </div>
         <div class="bd-sec ap_slect">
            <div class="col-sm-5 ap-cont">
               <div class="col-sm-12 gallery">
                  <?php $__currentLoopData = $hotel_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="pics">
                     <a data-fancybox="gallery1" href="<?php echo e(url('ramtours/'.$hotel_image['image'])); ?>">
                     <img class="img-fluid" src="<?php echo e(url('ramtours/'.$hotel_image['image'])); ?>" alt=""></a>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
            </div>
         </div>
      </div>
      <div class="rt_popup accomsec" id="accom_ginfo">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_navclse.png"></div>
            <h4><img src="<?php echo e(url('assets/mobile')); ?>/images/rooms.png" alt="">פרטי המלון  </h4>
         </div>
         <div class="ap-cont">
            <h5> <?php echo e($hotel->hotel_display_name); ?> </h5>
            <p>כתובת: <?php echo e($hotel_code); ?> - <?php echo e($hotel->hotel_address); ?> </p>
            <div class="ap-cont aprt">
               <h3 class="pkg_head">מתקני המלון :</h3>
               <ul>  
                  <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e(get_hotel_features($feature)); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
               <h3 class="pkg_head">פעילויות בקרבת מקום  :</h3>
               <ul>
                  <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e(get_hotel_amenities($amenity)); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
            </div>
            <?php if(!empty($hotel_card)): ?>
            <div class="ap-cont aprt">
              <h3 class="cont-head rt_cardhead">מידע על כרטיס </h3>
              <img src="<?php echo e(url('ramtours/'.$hotel_card['card_image'])); ?>" class="rt_cardimg">
                <p class="rt_cardesc">המתארחים במקום לינה זה זכאים 
                  <a href=" <?php echo e($hotel_card['link']); ?>" target="_blank">
                    <?php echo e($hotel_card['title']); ?>

                   </a>
                 </p>
            </div>
            <?php endif; ?>
            <h3 class="pkg_head">מידע כללי :</h3>
            <p><?php echo $hotel_desc; ?> </p>
         </div>
      </div>
      <?php if(!empty($map)): ?>
      <div class="rt_popup accomsec" id="accom_map">
         <div class="popup-header">
            <div class="accom_close"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_navclse.png"></div>
            <h4><img src="<?php echo e(url('assets/mobile')); ?>/images/location.png" alt="">אטרקציות</h4>
         </div>
         <div class="map-sec">
            <img src="<?php echo e(url('ramtours/'.$map)); ?>" alt="map" class="img-fluid">
            <div class="map_text">
               כל המפות באתר מיועדות להמחשה בלבד, ישנם אי דיוקים במרחקי האטרקציות למקום הלינה, לכן אין להסתמך על נתונים אלה לצורך תכנון הטיול.
            </div>
         </div>
         <div class="att-sec">
            <h3 class="pkg_head">אטרקציות באיזור מקום האירוח  :</h3>
            <div class="att-inner">
               <h5>מרחקי האטרקציות ממקום הלינה בקילומטרים</h5>
               <ul class="attr-pts">
                   <?php $__currentLoopData = $attractions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><span class="num"><?php echo e($attr->attraction_sequence); ?></span><span class="attr_name"><?php echo e($attr->attraction_title); ?></span><span class="distance"><?php echo e($attr->attraction_distance); ?> ק"מ</span></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <?php if(!empty($hotel->hotel_instruction_text)): ?>
      <div class="rt_popup accomsec" id="accom_notes">
         <div class="popup-header">
            <div class="accom_close"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_navclse.png"></div>
            <h4><img src="<?php echo e(url('assets/mobile')); ?>/images/notes.png" alt="">אטרקציות</h4>
         </div>
         <div class="att-sec">
            <?php echo $hotel->hotel_instruction_text; ?>

         </div>
      </div>
       <?php endif; ?>
      <div class="rt_popup accomsec" id="accom_rooms">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile/images/rt_navclse.png')); ?>"></div>
            <h4><img src="<?php echo e(url('assets/mobile/images/apartment-ico.png')); ?>" alt="">פרטי דירה</h4>
         </div>
         <div class="accordion" id="accordionExample">
            <?php $__currentLoopData = $hotel_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
               <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                     <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($loop->index); ?>" aria-expanded="false" aria-controls="collapseOne">
                        <div class="bd-sec ap_slect">
                           <div class="bd-head">
                        
                              <h3>
                                  <span> 
                                     <img src="<?php echo e(url('/assets/front/images')); ?>/ramtours-rooms.png"> חדרים -<?php echo e($room['room_area']); ?> מ"ר  |
                                    </span>
                                    <span>
                                      <img src="<?php echo e(url('/assets/front/images')); ?>/mann.png">&nbsp;מתאים להרכב של עד <?php echo e($room['max_people']); ?> נפשות  <span dir="ltr">(<?php echo e($room['room_code']); ?>)</span>|
                                    </span>
                                    <span> 
                                       <img src="<?php echo e(url('/assets/front/images')); ?>/aproom.png">
                                      <?php echo e($room['room_type']); ?>

                                    </span>   
                              </h3>
                           </div>
                        </div>
                     </button>
                  </h5>
               </div>
               <div id="collapse<?php echo e($loop->index); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                     <div class="col-sm-12 ap-cont">
                        <h3 class="pkg_head">מידע כללי  :</h3>
                     </div>
                     <div class="col-sm-7 ap-cont">
                        <!-- <h5><?php echo $room['title']; ?></h5> -->
                        <p><?php echo $room['room_desc']; ?></p>
                     </div>
                     <div class="col-sm-5 ap-cont">
                        <div class="col-sm-12 gallery">
                           <?php $__currentLoopData = $room['room_images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="pics">
                              <a data-fancybox="gallery1" href="<?php echo e(url('ramtours/'.$room_img->image)); ?>">
                              <img class="img-fluid" src="<?php echo e(url('ramtours/'.$room_img->image)); ?>" alt=""></a>
                           </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     </div>
                  </div>
               </div>
              </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
            
         </div>
      </div>
      <!-- pop up end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/mobile/pages/accommodation_detail.blade.php ENDPATH**/ ?>