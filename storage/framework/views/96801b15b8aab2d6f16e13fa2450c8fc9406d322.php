<?php $__env->startSection('rami_mobile_nav'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_header_serach'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mobile_container'); ?>
      <section class="rt-info">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="rtpkghead">פרטי טיסה</h3>
                  <div class="rt_btnsec">
                     <div class="rt_prev_btn"><a href="<?php echo e(URL::previous()); ?>"><img src="<?php echo e(url('assets/mobile')); ?>/images/prev-btn-blk.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="fltdltss fltdlttsec">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 flt-inner pkgflt_secc">
                  <div class="flights-details-box-inner flt_header">
                     <div class="flight-payment">
                        <div class="flt-dates">
                           <ul>
                              <li><img src="<?php echo e(url('assets/mobile')); ?>/images/flt-location.png">יעד : </li>
                              <li><img src="<?php echo e(url('assets/mobile')); ?>/images/flt-calnder.png"><?php echo e($all_flight['start_date']); ?> - <?php echo e($all_flight['end_date']); ?></li>
                           </ul>
                        </div>
                        <div class="ftbtnsec">
                           <div class="flt-price">$<?php echo e(get_rami_flight_price_for_single_flight($all_flight['id'])); ?> <span class="fltunit">לאדם</span></div>
                           <div class="flt-btnn"><a href="javascript:void(0)" class="checking_cart flt-book">המשך להזמנה</a> </div>
                        </div>
                     </div>
                     <div class="clear"></div>
                     <div class="flight-tophead">
                        <div class="flight-date">יעד :<?php echo e($all_flight['up_desti']); ?></div>
                        <div class="flights-headings"><?php echo e($all_flight['up_airline_name']); ?></div>
                     </div>
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
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="rt-filters fltlftpart">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner">
                  <div class="col-sm-12 flight-left-frm">
                     <div class="flight-prise-box">
                        <div class="flight-prise-inner" data-p_per_person="487">
                           <div class="font13">נותרו <?php echo e($all_flight['num_available_seat']); ?> מקומות פנויים</div>
                           <div class="car-details-price flight_price">$<?php echo e(get_rami_flight_price_for_single_flight($all_flight['id'])); ?><span> לנוסע</span></div>
                           <div>
                              <label>בחירת מספר נוסעים (עד 5 בסך הכל)</label>
                              <div class="pass_select">
                                 <label class="num_lbl">מספר מבוגרים:</label>
                                 <input type="number"  min="1" max="7" class="num_passangers adults" value="<?php echo e(get_search_adult()); ?>" id="rami_pakage_adults">
                                 <div class="quantity-nav">
                                    <div class="quantity-button quantity-up">+</div>
                                    <div class="quantity-button quantity-down">-</div>
                                 </div>
                              </div>
                              <div class="pass_select">
                                 <label class="num_lbl">מספר ילדים (2-16):</label>
                                 <input type="number"  min="0" max="6" class="num_passangers kids" value="<?php echo e(get_search_child()); ?>" id="rami_pakage_childs">
                                 <div class="quantity-nav">
                                    <div class="quantity-button quantity-up">+</div>
                                    <div class="quantity-button quantity-down">-</div>
                                 </div>
                              </div>
                              <div class="pass_select">
                                 <label class="num_lbl">מספר תינוקות (0-2):</label>
                                 <input type="number"  min="0" max="6" class="num_passangers infants" value="<?php echo e(get_search_child()); ?>" id="rami_pakage_infants">
                                 <div class="quantity-nav">
                                    <div class="quantity-button quantity-up">+</div>
                                    <div class="quantity-button quantity-down">-</div>
                                 </div>
                              </div>
                           </div>
                           <div class="flight-total">סה״כ: <span class="yellow-text">$<?php echo e(get_rami_flight_price_for_single_flight($all_flight['id'])); ?></span></div>
                           <div class="clear"></div>
                           <div class="flights-buttons-box">
                              <input name="" type="button" class="flight-for-button slideDiv" value="לפרטים" id="5112">
                                 <input name="" type="button" class="flight-choose-button add-to-cart_flight checking_cart" value="הזמינו">
                                 <div class="section" id="pay_remarks">
                                    <p style="text-align: right; ">למזמינים חבילת נופש, טיסה או טוס וסע ניתן לשלם בכרטיס אשראי עד 4 תשלומים ללא ריבית או יותר בקרדיט. אפשר גם בהעברה לבנק או במשרדנו בגבעת שמואל במזומן.</p>
                                    <p style="text-align: right; border-top: 1px #ffa800 solid ;padding-top: 3px; margin-top: 5px; margin-bottom: 0px;font-size: 15px;">שריינו את הטיסה שבחרתם בתשלום מקדמה של סה"כ <span style="font-size: 20px;color: #ffa800;">200</span> בלבד להזמנה דרך האתר. נציגנו יצרו עמכם קשר לאישור ההזמנה ויתרת תשלום.</p>
                                    <p style="text-align: right; padding-top: 0; margin-bottom: 10px;font-size: 15px;display: none;">ההזמנה ניתנת לביטול תוך 14 יום מרגע ההזמנה תמורת 100 שקלים לאדם.</p>
                                    <p>
                                       <img class="optimized_c_cards" src="<?php echo e(url('assets/mobile')); ?>/images/visa.jpg">
                                    </p>
                                    <p>אתר רם נסיעות מאובטח ע"י תקן PCI הבנלאומי ,סטנדרט גבוה מאוד המבטיח רמת אבטחה גבוהה מאוד לרכישות באינטרנט. ניתן לשלם בכרטיסי אשראי הבאים:</p>
                                 </div>
                              <div id="flight_page_contact_pop_cont">
                                 <div class="contact_popup_basic">
                                    <a class="wp-colorbox-inline cboxElement" href="#contact_popup" data-toggle="modal" data-target="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
                                    <input type="hidden" id="site_url" value="<?php echo e(url('/')); ?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php echo $__env->make('mobile.pages.contact_us_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_mobile_footer_js'); ?>
##parent-placeholder-567c36b17da248bc79e13763be604ea7bbcd439a##
<?php echo $__env->make('mobile.pages.singal_js.flight_details_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('mobile.pages.singal_js.contact_us_popup_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/mobile/pages/flight_detail.blade.php ENDPATH**/ ?>