<?php $__env->startSection('rami_front_container'); ?>
<section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
        <div class="inner-page-breadcrum">
          <strong>::</strong> 
            <a href="<?php echo e(url('/')); ?>"> טיסה</a>
              <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
          מינכן <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
          <strong>
            <?php echo e($all_flight['up_flight_no']); ?> <?php echo e($all_flight['up_source']); ?> to <?php echo e($all_flight['up_desti']); ?>

          </strong>
        </div>
      </div>
  </section>
  <section class="rt_flts">
    <div class="container">
     <div class="row flt-inner">
        <div class="col-lg-9 flights-details-box flight_boxx">
             <div class="flights-details-box-inner">
            <div class="flight-conttt">
              <div class="flight-tophead">
                <div class="flights-headings">יציאה  : <?php echo e($all_flight['up_depart_full_date']); ?>

                </div>
                <div class="flight-date">יעד : <?php echo e($all_flight['up_desti']); ?></div>
                <div class="flight-places"></div>
                <div class="flight-duration">משך טיסה כולל  <?php echo e($all_flight['up_time_taken']); ?></div>
              </div>
                      <?php if(empty($all_flight['up_flights'])): ?>
                          <div class="flight-secc top">
                             <div class="flights-icon">
                              <img width="262" height="165" src="<?php echo e(url('ramtours/'.$all_flight['up_airline_logo'])); ?>" class="img-fluid" alt="">
                               <div class="flt_inff"><span class="fltt_name"><?php echo e($all_flight['up_airline_name']); ?> </span></div>
                             </div>
                             <div class="flight-text-box tf1">
                              <?php echo e($all_flight['up_source']); ?>

                              <span class="rt_tmm"><?php echo e($all_flight['up_departure_time']); ?>

                              </span><?php echo e($all_flight['up_departure_time_in_month_date']); ?> 
                            </div>
                             <div class="flight-take-off ftbord">
                              <span class="rt_plane">
                                <i class="fa fa-plane" aria-hidden="true"></i>
                              </span>
                            </div>
                             <div class="flight-text-box tf2">
                              <?php echo e($all_flight['up_desti']); ?>

                              <span class="rt_tmm">
                              <?php echo e($all_flight['up_arrival_time']); ?>

                              </span><?php echo e($all_flight['up_arrival_time_in_month_date']); ?> 
                            </div>
                             <div class="flight-text-box tf3">
                                <span class="fltt-info">
                                פרטי הטיסה
                              </span>
                              <span class="fltt-ttltime">
                                 <?php echo e('טיסת '.$all_flight['up_flight_no']); ?> <?php echo e($all_flight['up_source']); ?> ל<?php echo e($all_flight['up_desti']); ?>

                               </span>
                            </div>
                             <div class="flight-text-box tf4"></div>
                             <div class="clear"></div>
                           </div>

                        <?php endif; ?>
                        <?php $__currentLoopData = $all_flight['up_flights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="flight-secc top">
                           <div class="flights-icon">
                            <img width="262" height="165" src="<?php echo e(url('ramtours/'.$flight['airline_logo'])); ?>" class="img-fluid" alt="">
                             <div class="flt_inff"><span class="fltt_name"><?php echo e($flight['airline_name']); ?> </span></div>
                           </div>
                           <div class="flight-text-box tf1">
                            <?php echo e($flight['source']); ?>

                            <span class="rt_tmm"><?php echo e($flight['departure_time']); ?>

                            </span> <?php echo e($flight['depart_time_in_month_date']); ?>

                          </div>
                           <div class="flight-take-off ftbord">
                            <span class="rt_plane">
                              <i class="fa fa-plane" aria-hidden="true"></i>
                            </span>
                          </div>
                           <div class="flight-text-box tf2">
                            <?php echo e($flight['desti']); ?>

                            <span class="rt_tmm">
                            <?php echo e($flight['arrival_time']); ?>

                            </span> <?php echo e($flight['arrival_time_in_month_date']); ?>

                          </div>
                           <div class="flight-text-box tf3">
                              <span class="fltt-info">
                              פרטי הטיסה
                            </span>
                            <span class="fltt-ttltime">
                               <?php echo e('טיסת '.$flight['flight_no']); ?> <?php echo e($flight['source']); ?> ל<?php echo e($flight['desti']); ?>

                             </span>
                          </div>
                           <div class="flight-text-box tf4"></div>
                           <div class="clear"></div>
                         </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
              <div class="flight-tophead">
                            <div class="flights-headings">חזור: <?php echo e($all_flight['down_depart_full_date']); ?></div>
                            <div class="flight-date">יעד : <?php echo e($all_flight['down_desti']); ?> </div>
                            <div class="flight-places"></div>
                            <div class="flight-duration">משך טיסה כולל  <?php echo e($all_flight['down_time_taken']); ?></div>

              </div>
               <?php if(empty($all_flight['down_flights'])): ?>
                            <div class="flight-secc bottom">
                               <div class="flights-icon">
                                <img width="262" height="165" src="<?php echo e(url('ramtours/'.$all_flight['down_airline_logo'])); ?>" class="img-fluid" alt="">
                                 <div class="flt_inff"><span class="fltt_name"><?php echo e($all_flight['down_airline_name']); ?> </span></div>
                               </div>
                               <div class="flight-text-box tf1">
                                <?php echo e($all_flight['up_source']); ?>

                                <span class="rt_tmm"><?php echo e($all_flight['down_departure_time']); ?>

                                </span><?php echo e($all_flight['down_departure_time_in_month_date']); ?> 
                              </div>
                               <div class="flight-take-off ftbord">
                                <span class="rt_plane">
                                  <i class="fa fa-plane" aria-hidden="true"></i>
                                </span>
                              </div>
                               <div class="flight-text-box tf2">
                                <?php echo e($all_flight['down_desti']); ?>

                                <span class="rt_tmm">
                                <?php echo e($all_flight['down_arrival_time']); ?>

                                </span><?php echo e($all_flight['down_arrival_time_in_month_date']); ?> 
                              </div>
                               <div class="flight-text-box tf3">
                                  <span class="fltt-info">
                                  פרטי הטיסה
                                </span>
                                <span class="fltt-ttltime">
                                   <?php echo e('טיסת '.$all_flight['up_flight_no']); ?> <?php echo e($all_flight['up_source']); ?> ל<?php echo e($all_flight['up_desti']); ?>

                                 </span>
                              </div>
                               <div class="flight-text-box tf4"></div>
                               <div class="clear"></div>
                             </div>

                          <?php endif; ?>
                          <?php $__currentLoopData = $all_flight['down_flights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="flight-secc bottom">
                             <div class="flights-icon">
                              <img width="262" height="165" src="<?php echo e(url('ramtours/'.$flight['airline_logo'])); ?>" class="img-fluid" alt="">
                               <div class="flt_inff"><span class="fltt_name"><?php echo e($flight['airline_name']); ?> </span></div>
                             </div>
                             <div class="flight-text-box tf1">
                              <?php echo e($flight['source']); ?>

                              <span class="rt_tmm"><?php echo e($flight['departure_time']); ?>

                              </span> 8 יולי
                            </div>
                             <div class="flight-take-off ftbord">
                              <span class="rt_plane">
                                <i class="fa fa-plane" aria-hidden="true"></i>
                              </span>
                            </div>
                             <div class="flight-text-box tf2">
                              <?php echo e($flight['desti']); ?>

                              <span class="rt_tmm">
                              <?php echo e($flight['arrival_time']); ?>

                              </span> 8 יולי
                            </div>
                             <div class="flight-text-box tf3">
                                <span class="fltt-info">
                                פרטי הטיסה
                              </span>
                              <span class="fltt-ttltime">
                                 <?php echo e('טיסת '.$flight['flight_no']); ?> <?php echo e($flight['source']); ?> ל<?php echo e($flight['desti']); ?>

                               </span>
                            </div>
                             <div class="flight-text-box tf4"></div>
                             <div class="clear"></div>
                           </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              </div>
            </div>
            </div>
        <div class="col-md-3 flight-left-frm">
          <div class="flight-prise-box">
      <div class="flight-prise-inner" data-p_per_person="487">
      <div class="font13">נותרו  <?php echo e($all_flight['num_available_seat']); ?> מקומות פנויים</div>
      <div class="car-details-price flight_price">$<?php echo e(get_rami_flight_price_for_single_flight($all_flight['id'])); ?><span> לנוסע</span></div>
      <div>
      <label>בחירת מספר נוסעים (עד 5 בסך הכל)</label>
      <div class="pass_select">
      <label class="num_lbl">מספר מבוגרים:</label>
        <input type="number" data-current_val="1" min="1" max="99" class="num_passangers adults" value="<?php echo e(get_search_adult()); ?>" id="rami_pakage_adults">
        <div class="quantity-nav">
          <div class="quantity-button quantity-up rami_incr_btn">+</div>
          <div class="quantity-button quantity-down rami_decr_btn">-</div>
        </div>
      </div>
      <div class="pass_select">
      <label class="num_lbl">מספר ילדים (2-16):</label>
        <input type="number" data-current_val="0" min="0" max="99" class="num_passangers kids" value="<?php echo e(get_search_child()); ?>" id="rami_pakage_childs">
         <div class="quantity-nav">
            <div class="quantity-button quantity-up rami_incr_btn">+</div>
            <div class="quantity-button quantity-down rami_decr_btn">-</div>
         </div>
      </div>
      <div class="pass_select">
      <label class="num_lbl">מספר תינוקות (0-2):</label>
        <input type="number" data-current_val="0" min="0" max="99" class="num_passangers infants" value="<?php echo e(get_search_child()); ?>" id="rami_pakage_infants">
         <div class="quantity-nav">
            <div class="quantity-button quantity-up rami_incr_btn">+</div>
            <div class="quantity-button quantity-down rami_decr_btn">-</div>
         </div>
      </div>
      </div>
      <div class="flight-total">סה״כ:    <span class="yellow-text">$<?php echo e(get_rami_flight_price_for_single_flight($all_flight['id'])); ?></span></div>
      <div class="clear"></div>
      <div class="flights-buttons-box">
      <input name="" type="button" class="flight-for-button slideDiv" value="לפרטים" id="5112">

      <input name=""  type="button" class="flight-choose-button add-to-cart_flight checking_cart"  value="הזמינו">
      <div class="section" id="pay_remarks">
      <p style="text-align: right; ">למזמינים חבילת נופש, טיסה או טוס וסע ניתן לשלם בכרטיס אשראי עד 4 תשלומים ללא ריבית או יותר בקרדיט. אפשר גם בהעברה לבנק או במשרדנו בגבעת שמואל במזומן.</p>
      <p style="text-align: right; border-top: 1px #ffa800 solid ;padding-top: 3px; margin-top: 5px; margin-bottom: 0px;font-size: 15px;">שריינו את הטיסה שבחרתם בתשלום מקדמה של סה"כ <span style="font-size: 20px;color: #ffa800;">200</span> בלבד להזמנה דרך האתר. נציגנו יצרו עמכם קשר לאישור ההזמנה ויתרת תשלום.</p>
      <p style="text-align: right; padding-top: 0; margin-bottom: 10px;font-size: 15px;display: none;">ההזמנה ניתנת לביטול תוך 14 יום מרגע ההזמנה תמורת 100 שקלים לאדם.</p>
      <p>
        <img class="optimized_c_cards" src="<?php echo e(url('/assets/front/images')); ?>/visa.jpg">
      </p>
      <p>אתר רם נסיעות מאובטח ע"י תקן PCI הבנלאומי ,סטנדרט גבוה מאוד המבטיח רמת אבטחה גבוהה מאוד לרכישות באינטרנט. ניתן לשלם בכרטיסי אשראי הבאים:</p>
      </div>
      <div id="flight_page_contact_pop_cont">
          <div class="contact_popup_basic">
               <a class="wp-colorbox-inline cboxElement" href="#contact_popup" data-toggle="modal" data-target="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
          </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="clear"></div>
     </div>
     </div>
</section>
<?php echo $__env->make('frontend.pages.contact_us_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_front_footer_js'); ?>
##parent-placeholder-50c56da52e71826fbb807d7dfe32bd0402ef3ba4##
<?php echo $__env->make('frontend.pages.singal_js.flight_details_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.pages.singal_js.contact_us_popup_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/frontend/pages/flight_detail.blade.php ENDPATH**/ ?>