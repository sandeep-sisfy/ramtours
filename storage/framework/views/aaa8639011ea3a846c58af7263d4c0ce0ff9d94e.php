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
               <?php $__env->startSection('rami_front_page_class', 'rami_pkg_body_cls'); ?>
   <?php $__env->startSection('mobile_container'); ?>   
    <section class="rt-info">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="rt_info_right">
                     <h3 class="rtpkghead">חבילת נופש ל <?php if(!empty($package->package_desti)): ?><?php echo e($package->package_desti->loc_name); ?><?php endif; ?></h3>
                     <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo e(rami_get_require_date_format($package->package_end_date, 'd/m').' - ' .rami_get_require_date_format($package->package_start_date, 'd/m')); ?> </div>
                  </div>
                  <div class="rt_btnsec">
                     <div class="rt_prev_btn"><a href="<?php echo e(URL::previous()); ?>"><img src="<?php echo e(url('assets/mobile/images/prev-btn-blk.png')); ?>"></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="steps">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 stepwizard">
                  <div class="stepwizard-row setup-panel">
                     <div class="stepwizard-step active">
                        <a href="#step-1" class="btn active">1</a>
                        <p>פרטי המוצר     </p>
                     </div>
                     <div class="stepwizard-step">
                        <a href="#step-2" class="btn" disabled="disabled">2</a>
                        <p>פרטי הנוסעים     </p>
                     </div>
                     <div class="stepwizard-step">
                        <a href="#step-3" class="btn" disabled="disabled">3</a>
                        <p>תשלום    </p>
                     </div>
                     <div class="stepwizard-step last">
                        <a href="#step-3" class="btn" disabled="disabled"><img src="<?php echo e(url('assets/mobile/images/step-check.png')); ?>" alt=""></a>
                        <p>אישור הזמנה  </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="pkg_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner abtpkg">
                  <h3 class="pkg_head"> החבילה כוללת :</h3>  
                 <!-- <h5>  החבילה כוללת:     </h5>-->
                  <p><?php echo rami_vacation_pkg_del_top_text($package->package_flight_location); ?></p>
                  <p class="rt_dts" style="display: none">משפחתי סטיישן   <?php echo e(rami_get_no_of_days_diff($package->package_start_date, $package->package_end_date)); ?> ימים   </p>
               </div>
               <div class="col-sm-12 rt-inner listpkg">
                  <h3 class="pkg_head">לינה  : <span class="rt_headd"><?php echo e(get_rami_page_placeholder('help_text_apartment',1)); ?></span></h3>
                  <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile/images/rooms.png')); ?>" alt="">
                     <h4>פרטי המלון</h4>
                     <div class="pkg_btnn"><a href="JavaScript:Void(0);" id="rt_lodging_btn"><img src="<?php echo e(url('assets/mobile/images/pkg-arrow-yellow.png')); ?>" class="inf_arrow"></a></div>
                  </div>
                  <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile/images/apartment-ico.png')); ?>" alt="">
                     <h4>פרטי דירה</h4>
                     <div class="pkg_btnn"><a href="JavaScript:Void(0);" id="rt_rooms_btn">
                        <img src="<?php echo e(url('assets/mobile/images/pkg-arrow-yellow.png')); ?>" class="inf_arrow"></a>
                     </div>
                  </div>
                  <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile/images/location.png')); ?>" alt="">
                     <h4>אטרקציות</h4>
                     <div class="pkg_btnn"><a href="JavaScript:Void(0);" id="rt_map_btn">
                        <img src="<?php echo e(url('assets/mobile/images/pkg-arrow-yellow.png')); ?>" class="inf_arrow"></a>
                     </div>
                  </div>
                  <?php if($hotel_reviews->count()>0): ?>
                  <div class="rtpkglst">
                     <img src="<?php echo e(url('assets/mobile/images/review-ico.png')); ?>" alt="">
                     <h4>לקוחות ממליצים</h4>           
                     <div class="pkg_btnn"><a href="JavaScript:Void(0);" id="rt_review_btn">
                        <img src="<?php echo e(url('assets/mobile/images/pkg-arrow-yellow.png')); ?>" class="inf_arrow"></a>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
              
               <div class="col-sm-12 flt-inner pkgflt_secc">
                  <h3 class="pkg_head">טיסות   : <span class="rt_headd"><?php echo e(get_rami_page_placeholder('help_text_flights',1)); ?></span></h3>
                   <?php $__currentLoopData = $all_flights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="flights-details-box-inner">
                     <!-- <div class="flight-tophead">
                        <div class="flight-date">יעד : <?php echo e($all_flight['up_desti']); ?> </div>
                        <div class="flights-headings"> <?php echo e($all_flight['up_flight_no']); ?></div>
                     </div> -->
                     <?php if(!empty($all_flight['up_flights'])): ?>
                        <?php $__currentLoopData = $all_flight['up_flights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="clear"></div>
                           <div class="flight-secc top">
                              <div class="flights-icon"><img width="262" height="165" src="<?php echo e(url('ramtours/'.$flight['airline_logo'])); ?>" class="img-fluid" alt=""> </div>
                              <div class="flight-text-box tf1"><?php echo e($flight['source']); ?><span class="rt_tmm"><?php echo e($flight['departure_time']); ?></span>
                                 <span class="rt_dts"><?php echo e($flight['depart_full_date']); ?></span>
                              </div>
                              <div class="flight-take-off ftbord">
                                 שעות  <?php echo e($flight['time_taken']); ?>

                                 <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                              </div>
                              <div class="flight-text-box tf2"><?php echo e($flight['desti']); ?> <span class="rt_tmm"><?php echo e($flight['arrival_time']); ?></span><span class="rt_dts">
                                 <?php echo e($flight['arrival_full_date']); ?>

                              </span>
                              </div>
                              <div class="clear"></div>
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php else: ?>
                           <div class="clear"></div>
                           <div class="flight-secc top">
                              <div class="flights-icon"><img width="262" height="165" src="<?php echo e(url('ramtours/'.$all_flight['up_airline_logo'])); ?>" class="img-fluid" alt=""> </div>
                              <div class="flight-text-box tf1"><?php echo e($all_flight['up_source']); ?><span class="rt_tmm"><?php echo e($all_flight['up_departure_time']); ?></span>
                                 <span class="rt_dts"><?php echo e($all_flight['up_depart_full_date']); ?></span>
                              </div>
                              <div class="flight-take-off ftbord">
                                 שעות  <?php echo e($all_flight['up_time_taken']); ?>

                                 <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                              </div>
                              <div class="flight-text-box tf2"><?php echo e($all_flight['up_desti']); ?> <span class="rt_tmm"><?php echo e($all_flight['up_arrival_time']); ?></span><span class="rt_dts">
                                 <?php echo e($all_flight['up_arrival_full_date']); ?>

                              </span>
                              </div>
                              <div class="clear"></div>
                           </div>
                     <?php endif; ?>
                     <!-- div class="flight-tophead">
                        <div class="flight-date">יעד : <?php echo e($all_flight['down_desti']); ?>  </div>
                        <div class="flights-headings"> <?php echo e($all_flight['down_flight_no']); ?></div>
                     </div> -->
                      <?php if(!empty($all_flight['down_flights'])): ?>
                        <?php $__currentLoopData = $all_flight['down_flights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="clear"></div>
                           <div class="flight-secc bottom">
                              <div class="flights-icon"><img width="262" height="165" src="<?php echo e(url('ramtours/'.$flight['airline_logo'])); ?>" class="img-fluid" alt=""> </div>
                              <div class="flight-text-box tf1"><?php echo e($flight['source']); ?><span class="rt_tmm"><?php echo e($flight['departure_time']); ?></span>
                                 <span class="rt_dts"><?php echo e($flight['depart_full_date']); ?></span>
                              </div>
                              <div class="flight-take-off ftbord">
                                 שעות  <?php echo e($flight['time_taken']); ?>

                                 <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                              </div>
                              <div class="flight-text-box tf2"><?php echo e($flight['desti']); ?> <span class="rt_tmm"><?php echo e($flight['arrival_time']); ?></span><span class="rt_dts">
                                 <?php echo e($flight['arrival_full_date']); ?>

                              </span>
                              </div>
                              <div class="clear"></div>
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                        <div class="clear"></div>
                        <div class="flight-secc bottom">
                           <div class="flights-icon"><img width="262" height="165" src="<?php echo e(url('ramtours/'.$all_flight['down_airline_logo'])); ?>" class="img-fluid" alt=""> </div>
                           <div class="flight-text-box td1"><?php echo e($all_flight['down_source']); ?> <span class="rt_tmm"><?php echo e($all_flight['down_departure_time']); ?></span><span class="rt_dts"><?php echo e($all_flight['down_depart_full_date']); ?></span>
                           </div>
                           <div class="flight-take-off ftbord">
                              שעות  <?php echo e($all_flight['down_time_taken']); ?>

                              <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                           </div>
                           <div class="flight-text-box td2">ת<?php echo e($all_flight['down_desti']); ?> <span class="rt_tmm"> <?php echo e($all_flight['down_arrival_time']); ?> </span><span class="rt_dts">
                              <?php echo e($all_flight['down_arrival_full_date']); ?>

                           </span>
                           </div>
                           <div class="clear"></div>
                        </div>
                      <?php endif; ?>
                     
                  </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
               
               <div class="col-sm-12 car-inner">
                  <h3 class="pkg_head">רכב  : <span class="rt_headd"><?php echo e(get_rami_page_placeholder('help_text_vehicle',1)); ?></span></h3>
                  <div class="rt_crt_sec col-sm-12">
                     <img src="<?php echo e(url('ramtours/'.$all_cars['first_car_img'])); ?>" class="img-fluid"> 
                     <h4 class="pkg_subhead"><?php echo $all_cars['first_car_title']; ?> </h4>
                     <p><?php echo $all_cars['first_car_des']; ?> </p>
                     <div class="rtpkglst">
                        <img src="<?php echo e(url('assets/mobile/images/pkg-car.png')); ?>" alt="">
                        <h4>אפשרויות שדרוג רכב  </h4>
                        <div class="pkg_btnn">
                           <a href="JavaScript:Void(0);" id="rt_car_btn">
                           <img src="<?php echo e(url('assets/mobile/images/pkg-arrow-yellow.png')); ?>" class="inf_arrow">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="pkg-price">
         <div class="container">
            <div class="row">
               <div class="col-6  col-sm-6 rt-inner">
                  <h3><span>החל מ</span>€<?php echo e($package->package_lowest_price); ?></h3>
               </div>
               <div class="col-6 col-sm-6 rt-inner">
                  <button class="btn btn-lg btn-primary btn-block " type="submit" id="pkg_prc_btn">המשיכו להזמנה
                  </button></div>
            </div>
         </div>
      </section>
      <div class="rt_popup" id="rt_lodging">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile/images/rt_navclse.png')); ?>"></div>
            <h4><img src="<?php echo e(url('assets/mobile/images/rooms.png')); ?>" alt="">פרטי המלון</h4>
         </div>
         <div class="ap-cont">
            <h5>  <?php echo e($hotel->hotel_display_name); ?>   </h5>
            <p>כתובת: <?php echo e($hotel->hotel_code); ?> - <?php echo e($hotel->hotel_address); ?></p>
            <div class="ap-cont aprt">
               <h3 class="pkg_head">מתקני המלון :</h3>
               <ul>
                  <ul>
                    <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e(get_hotel_amenities($amenity)); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </ul>
               <h3 class="pkg_head">פעילויות בקרבת מקום  :</h3>
               <ul>
                  <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e(get_hotel_features($feature)); ?></li>
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
            <p><?php echo $hotel->hotel_desc; ?>

            </p>
             <?php if(!empty($hotel->hotel_instruction_text)): ?>
                  <h3 class="pkg_head">אטרקציות:</h3>
                  <p class="att-sec">
                     <?php echo $hotel->hotel_instruction_text; ?>

                  </p>
               </div>
                <?php endif; ?>
         </div>
      </div>
      <?php if(!empty($map)): ?>
      <div class="rt_popup" id="rt_map">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile/images/rt_navclse.png')); ?>"></div>
            <h4><img src="<?php echo e(url('assets/mobile/images/location.png')); ?>" alt="">אטרקציות באיזור מקום הלינה. </h4>
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
      <div class="rt_popup" id="rt_review">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile/images/rt_navclse.png')); ?>"></div>
            <h4><img src="<?php echo e(url('assets/mobile/images/review-ico.png')); ?>" alt="">לקוחות ממליצים
         </h4></div>
         
         <?php if(!empty($hotel_reviews)): ?>
          <div class="pkg-section" id="reviews-box">
           <div class="row">
            <div id="hotel_reviews" class="col-md-12">  
             <?php echo get_rami_hotel_reviews($hotel_reviews); ?>   
            </div>           
          </div>
         </div>
        <?php endif; ?>
         
      </div>
      <div class="rt_popup" id="rt_rooms">
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
                                    
                                    זמין במלאי  <?php echo e($room['room_avalible']); ?> יחידות
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
                        <h5><?php echo $room['title']; ?></h5>
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
      <div class="rt_popup" id="rt_car">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile/images/rt_navclse.png')); ?>"></div>
            <h4><img src="<?php echo e(url('assets/mobile/images/pkg-car.png')); ?>" alt="">אפשרויות שדרוג רכב  </h4>
            <div class="rt_crt_sec col-sm-12">
               <h3 class="pkg_head">גולף סטיישן ידני ממוזג  :</h3>
               <ul class="crprice">
                  <?php $__currentLoopData = $all_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(empty($car['car_title'])): ?>
                    <?php continue; ?>
                  <?php endif; ?>
                  <li><span class="crt-desp"><?php echo e($car['car_title']); ?></span>
                 <!--  <span class="mcrprz"><?php echo e($car['car_price']); ?></span> -->
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
            </div>
         </div>
      </div>
      <div class="rt_popup" id="pkg_prc">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile/images/rt_navclse.png')); ?>"></div>
            <h4>בחירת דירה והרכב נוסעים</h4>
         </div>
         <div class="pkg-right">
            <div class="pkg-box">
               <div class="pkg-price">
                  <div class="pkg-btns"><button class="btn btn-lg btn-primary btn-block checking_cart" type="submit">המשיכו להזמנה
                      </button></div>
                  <div class="pkgprc"><span>מחיר סופי</span>€<?php echo e($package->package_lowest_price); ?> </div>
               </div>
               <div class="pkg-frm">
                  <div class="pkggs pkg_adults">
                     <label>מבוגר </label>
                     <div class="pkg-select">
                        <div class="aprt-inner2">
                          <select id="rami_pakage_adults">
                            <?php for($i=2; $i<=10; $i++): ?>
                                 <option value="<?php echo e($i); ?>" <?php if($i==get_search_adult()): ?> Selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                          </select>
                          <i class="fa fa-angle-down" aria-hidden="true"></i> 
                        </div>
                     </div>
                  </div>
                  <div class="pkggs pkg_kids">
                     <label>ילד (2-16) </label>
                     <div class="pkg-select">
                        <div class="aprt-inner2">
                            <select id="rami_pakage_childs">
                              <?php for($i=0; $i<=10; $i++): ?>
                                 <option value="<?php echo e($i); ?>" <?php if($i==get_search_child()): ?> Selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                              <?php endfor; ?>
                            </select>    
                            <i class="fa fa-angle-down" aria-hidden="true"></i>            
                          </div>
                     </div>
                  </div>
                  <div class="pkggs pkg_infants">
                     <label>תינוק (0-2) </label>
                     <div class="pkg-select">
                        <div class="aprt-inner2">
                            <select id="rami_pakage_infants">
                              <?php for($i=0; $i<=10; $i++): ?>
                                 <option value="<?php echo e($i); ?>" <?php if($i==get_search_child()): ?> Selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                              <?php endfor; ?>
                            </select>    
                            <i class="fa fa-angle-down" aria-hidden="true"></i>            
                          </div>
                     </div>
                  </div>
                  <label>אנא בחר טיסה</label>
                  <div class="pkg-select rami_cart_select_div rami_package_flights">
                      <div class="aprt-inner">
                        <select>
                          <option value="0">אנא בחר טיסה</option>
                          <?php $__currentLoopData = $all_flights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($all_flight['id']); ?>"><?php echo e($all_flight['title']); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      </div>
                  </div>
                    <label>דירה</label>
                    <div class="pkg-select apart rami_cart_select_div rami_package_room" >
                         <div class="aprt-inner">
                           <select  class="rami_pkg_chnage_select chnage_select1" element_no='1' element_name="room">
                             <option value="0">אנא בחר חדר</option>
                             <?php $__currentLoopData = $hotel_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($room['id']); ?>"  <?php if($room['id']==$package->cheapest_room): ?> selected="true" <?php endif; ?>>
                                  <span> 
                                     חדרים -<?php echo e($room['room_area']); ?> מ"ר  |
                                    </span>
                                    <span>
                                     &nbsp;מתאים להרכב של עד <?php echo e($room['max_people']); ?> נפשות  <span dir="ltr">(<?php echo e($room['room_code']); ?>)</span>|
                                    </span>
                                    <span> 
                                      <?php echo e($room['room_type']); ?>

                                 </span>   
                               </option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                               <a href="javascript:void(0);" class="add_button" title="Add More room"><i class="fa fa-plus" aria-hidden="true"></i></a>
                         </div>

                     </div>
                   <label>מבחר סוג רכב  </label>
                  <div class="pkg-select apart rami_cart_select_div rami_package_cars" >
                     <div class="aprt-inner">
                      <select  class="rami_pkg_chnage_select chnage_select1" element_no='1' element_name="car">
                          <option>אנא בחר מכונית</option>
                          <?php $__currentLoopData = $all_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(empty($car['id'])): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <option value="<?php echo e($car['id']); ?>"><?php echo e($car['car_title']); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                            <a href="javascript:void(0);" class="add_button" title="Add More room"><i class="fa fa-plus" aria-hidden="true"></i></a>
                      </div>
                 </div>
                  <div class="pkg-trms">
                  <!-- <?php if(!empty($hotel_card)): ?>
                   <div id="bf_card_cont" class="custom-control custom-checkbox">
                      <input id="bf_card" class="custom-control-input" type="checkbox">
                      <label class="custom-control-label" for="bf_card">
                        אבקש להוסיף לחבילה <span class="card_title"><?php echo e($hotel_card['title']); ?></span>עלות של 
                         <span class="card_price"><?php echo e($hotel_card['price']); ?></span> יורו למשפחה. </label>
                   </div>
                   <?php endif; ?> -->
                    <div id="bf_card_cont" class="custom-control custom-checkbox">
                      <input id="bf_card" class="custom-control-input" type="checkbox">
                      <label class="custom-control-label" for="bf_card">
                        אבקש להוסיף לחבילה כרטיס היער השחור משפחתי בעלות של 252 יורו למשפחה.
                      </label>
                   </div>
                    <p class="rt_balinfo">תוספת למבוגר מעל גיל 16 היא 30 יורו ללילה.</p>
                    <p class="rt_balinfo">תוספת תינוק (0-2) לחבילה היא בעלות 150 דולר .</p>
                    <p class="rt_balinfo">שריינו את החופשה שבחרתם בתשלום מקדמה של סה"כ <span style="color:#ffa800">200</span> ₪ בלבד להזמנה דרך האתר.</p>
                    <p class="rt_balinfo">נציגנו יצרו עמכם קשר לאישור ההזמנה ויתרת תשלום.</p>
                    <p><a href="JavaScript:Void(0);" class="notes_transaction">הערות לעסקה</a></p>
                     <div class="pack_data_section remarks_sect">
                                <div class="pack_data_title">
                                    <img src="https://www.ramtours.com/wp-content/themes/ramtours/images/remarks_icon.png" alt="">
                                    <div class="cap">הערות</div>
                                </div>
                                <div class="section">             
                                 <?php if($hotel_include_taxtes==1): ?>
                                   <p>
                                     המחיר כולל מיסים מקומיים.
                                   </p>
                                   <?php else: ?>            
                                   <p>המחיר אינו כולל מיסים מקומיים
                                         יש לשלם במקום הלינה מיסים מקומיים בעלות של:                    
                                   </p>
                                <?php endif; ?>
                                </div>
                                <div class="tax_remarks" style="font-weight: bold; font-size: 18px; ">
                                    מס: 
                                </div>
                                <div class="pack_remarks"><p>מחיר החבילה המוצעת &nbsp;הינו למשפחה אחת של עד 6 נפשות בלבד.<br>
                             המלאי מוגבל.<strong><br>
                             המחיר בחבילה כולל:</strong><br>
                             טיסה סדירה ליעד המבוקש, אירוח בדירת נופש/מלון ורכב סטיישן משפחתי ל-8 ימים<br>
                             ניתן להזמין חדרי מלון/דירות בגדלים אחרים ויש לפנות למשרדנו לצורך כך.<br>
                             בהרכב של 6 נפשות ייתכן ותידרש הזמנת 2 חדרים במלון , לצורך כך יש לפנות למשרדנו לתמחור.<br>
                             <br>
                             בדירות נופש כולל מצעים ומגבות, נקיון סופי</p>
                            <p>נושא המחזור הינו מנדטורי ביער השחור. על מנת לעמוד &nbsp;בדרישות מקום הלינה וחוקי גרמניה אנא מלאו אחר <a href="https://www.ramtours.com/%D7%94%D7%A0%D7%97%D7%99%D7%95%D7%AA-%D7%9E%D7%97%D7%96%D7%95%D7%A8-%D7%91%D7%99%D7%A2%D7%A8-%D7%94%D7%A9%D7%97%D7%95%D7%A8/" target="_blank" rel="noopener">הנחיות המחזור</a><br>
                             <br>
                             יתכן ומקום הלינה המוצע בחבילה זו אינו זמין יותר בתאריכי החבילה והחברה רשאית להציע מקום לינה דומה באותה רמה ובאותו איזור על פי בחירת הלקוח ובכפוף להסכמתו.</p>
                            <p>ט.ל.ח</p></div>
                                                                                <div class="pack_remarks"></div>
                                                                       
                            </div>
                  </div>
                  <div class="pkg-btns">
                     <button  class="btn btn-lg btn-primary btn-block checking_cart" type="submit">המשיכו להזמנה
                     </button>
                     <button class="btn btn-lg btn-default btn-block" type="submit">שאלות? הקליקו ליצירת קשר &gt;&gt;</button>
                  </div>
                  <div class="pkg-chk">
                     <img src="<?php echo e(url('assets/mobile/images/checkout-img.jpg')); ?>" alt="checkout Image">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $__env->stopSection(); ?>
      <?php $__env->startSection('rami_mobile_footer_js'); ?>
      ##parent-placeholder-567c36b17da248bc79e13763be604ea7bbcd439a##
      <?php echo $__env->make('mobile.pages.singal_js.package_details_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php $__env->stopSection(); ?>
    

<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/mobile/pages/package_detail.blade.php ENDPATH**/ ?>