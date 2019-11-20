
<?php $__env->startSection('rami_front_container'); ?>
  <section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
       <div class="inner-page-breadcrum">
          <strong>::</strong> <a href="<?php echo e(url('/')); ?>">דף הבית </a>
          <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
            <?php if(!empty($package->package_desti)): ?>
              <?php echo e($package->package_desti->loc_name); ?>

            <?php endif; ?>
          <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
          <strong>
            חבילת נופש
              <?php if(!empty($package->package_desti)): ?>
                <?php echo e('ל'.$package->package_desti->loc_name); ?>

              <?php endif; ?>
              <?php echo e(rami_get_require_date_format($package->package_end_date, 'd/m').'-' .rami_get_require_date_format($package->package_start_date, 'd/m')); ?>

         </strong>
      </div>
    </div>
  </section>
  <section class="steps">
    <div class="container">
      <div class="row">
        <div class="stepwizard">
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
              <a href="#step-3" class="btn" disabled="disabled"><img src="<?php echo e(url('/assets/front/images')); ?>/step-check.png" alt=""></a>
              <p>אישור הזמנה  </p>
            </div>
          </div>
       </div>
      </div>
    </div>
  </section>
  <section class="pkg-data">
    <div class="container">
      <div class="row">
        <div class="col-md-3 pkgrt-sec">
          <div class="pkg-right" id="pkgrtsec">
          <div class="pkg-box">
            <h3 class="pkgfrm-head">בחירת דירה והרכב נוסעים   </h3>
            <div class="pkg-price">
              <div class="pkg-btns"><button  class="btn btn-lg btn-primary btn-block checking_cart" type="submit">
                  המשיכו להזמנה
              </button></div>
              <div class="pkgprc"> <span>מחיר סופי </span>€<?php echo e($package->package_lowest_price); ?></div>
           </div>
           <div class="pkg-frm">
            
            <div class="input-group spinner spin_right">
             <label>מבוגר </label>
             <!-- <input type="text" id="rami_pakage_adults" class="form-control" min="1" max="99" value="<?php echo e(get_search_adult()); ?>">
              <div class="input-group-btn-vertical">
                <button class="btn btn-default rami_incr_btn" type="button">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
                <button class="btn btn-default rami_decr_btn" type="button">
                  <i class="fa fa-minus" aria-hidden="true"></i>
                </button>
              </div>-->
              <select id="rami_pakage_adults">
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                 <option value="7">7</option>
                 <option value="8">8</option>
                 <option value="9">9</option>
                 <option value="10">10</option>
              </select>
              <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
            <div class="input-group spinner spin_left">
             <label>תינוק (0-2)  </label>
              <!--<input type="text" id="rami_pakage_infants" class="form-control" min="0" max="99" value="<?php echo e(get_search_child()); ?>">
              <div class="input-group-btn-vertical">
                 <button class="btn btn-default rami_incr_btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button class="btn btn-default rami_decr_btn" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
              </div>-->
              <select id="rami_pakage_infants">
                 <option value="0">0</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                 <option value="7">7</option>
                 <option value="8">8</option>
                 <option value="9">9</option>
                 <option value="10">10</option>
              </select>
              <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
            <div class="input-group spinner spin_left">
             <label>ילד (2-16)  </label>
              <!--<input type="text" id="rami_pakage_childs" class="form-control" min="0" max="99" value="<?php echo e(get_search_infant()); ?>">
              <div class="input-group-btn-vertical">
                 <button class="btn btn-default rami_incr_btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button class="btn btn-default rami_decr_btn" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
              </div>-->
              <select id="rami_pakage_childs">
                 <option value="0">0</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                 <option value="7">7</option>
                 <option value="8">8</option>
                 <option value="9">9</option>
                 <option value="10">10</option>
              </select>
              <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
            <div class="pkg-select rami_cart_select_div rami_package_flights">
                <label>בחר טיסה</label>
                <div class="aprt-inner">
                  <select>
                    <option value="0">בחר טיסה</option>
                    <?php $__currentLoopData = $all_flights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($all_flight['id']); ?>" <?php if($all_flight['id']==$package->cheapest_flight_sche): ?> selected="true" <?php endif; ?> ><?php echo e($all_flight['title']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            
           <div class="pkg-select apart rami_cart_select_div rami_package_room" >
               <label>דירה</label>
                <div class="aprt-inner">
                  <select  class="rami_pkg_chnage_select chnage_select1" element_no='1' element_name="room">
                    <option value="0">בחר חדר</option>
                    <?php $__currentLoopData = $hotel_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($room['id']); ?>" <?php if($room['id']==$package->cheapest_room): ?> selected="true" <?php endif; ?> >
                        <span>
                        <img src="<?php echo e(url('/assets/front/images')); ?>/ramtours-rooms.png"> 
                        <?php if(!empty($room['room_area'])): ?>
                           <?php echo e($room['room_type']); ?> - <?php echo e($room['room_area']); ?> מ"ר  |
                        <?php else: ?>
                           <?php echo e($room['room_type']); ?> |
                        <?php endif; ?>
                       
                        </span>
                        <span>
                          &nbsp;מתאים להרכב של עד <?php echo e($room['max_people']); ?> נפשות  <span dir="ltr">(<?php echo e($room['room_code']); ?>)</span>|
                        </span>
                        <span> 
                             זמין במלאי  <?php echo e($room['room_avalible']); ?> יחידות
                                
                        </span>    
                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                      <a href="javascript:void(0);" class="add_button" title="Add More room"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
            </div>            
            <div class="pkg-select apart rami_cart_select_div rami_package_cars" >
                <label>מבחר סוג רכב  </label>
               <div class="aprt-inner">
                <select  class="rami_pkg_chnage_select chnage_select1" element_no='1' element_name="car">
                    <option value="0">בחר מכונית</option>
                    <?php $__currentLoopData = $all_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(empty($car['id'])): ?>
                          <?php continue; ?>
                      <?php endif; ?>
                      <option value="<?php echo e($car['id']); ?>"  <?php if($car['id']==$package->cheapest_car): ?> selected="true" <?php endif; ?> ><?php echo e($car['car_title']); ?></option>
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
              <p><a href="" class="notes_transaction" onclick="return false">הערות לעסקה</a></p>
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
             <button class="btn btn-lg btn-primary btn-block checking_cart"  type="submit">המשיכו להזמנה
             </button>
            </div>
            <div class="contact_popup_basic">
               <a class="wp-colorbox-inline cboxElement" href="#contact_popup" data-toggle="modal" data-target="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
              </div>              
             <div class="pkg-inf">
              <p>אתר רם נסיעות מאובטח ע"י תקן PCI הבנלאומי ,סטנדרט גבוה מאוד המבטיח רמת אבטחה </p>
              <p>גבוהה מאוד לרכישות באינטרנט. ניתן לשלם בכרטיסי אשראי הבאים:</p>
             </div>
             <div class="pkg-chk">
              <img src="<?php echo e(url('/assets/front/images')); ?>/checkout-img.jpg" alt="checkout Image">
             </div>
          </div>
        </div>
        </div>
      </div>
        <div class="col-md-9 pkg-left">
          <div class="pkg-inner">
          <div class="pkg-header">
            <h3>
              <?php if($package->is_display_pkg_title==1): ?>
                  <?php echo e($package->package_title); ?>

              <?php else: ?>
                  חבילת נופש
                  <?php if(!empty($package->package_desti)): ?>
                    <?php echo e('ל'.$package->package_desti->loc_name); ?>

                  <?php endif; ?>
                   <?php echo e(rami_get_require_date_format($package->package_end_date, 'd/m').'-' .rami_get_require_date_format($package->package_start_date, 'd/m')); ?>

              <?php endif; ?>
            </h3>
          </div>
          <nav class="navbar navbar-expand-lg navbar-dark" id="rt_affix">
            <ul class="navbar-nav text-uppercase ml-auto rt_tabs">
               <li class="nav-item">
                <a class="nav-link js-scroll-trigger active" href="#basic-details"><?php echo e(get_rami_page_placeholder('basic_details', 1)); ?></a>
              </li>
               <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#aprment"><?php echo e(get_rami_page_placeholder('apartment', 1)); ?>

                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#gallery"><?php echo e(get_rami_page_placeholder('gallery', 1)); ?>

                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#choose-apartments"><?php echo e(get_rami_page_placeholder('choice_of_apartments', 1)); ?></a>
              </li>
              <?php if($hotel_reviews->count()>0): ?>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#reviews-box"><?php echo e(get_rami_page_placeholder('hotel_review', 1)); ?></a>
              </li>
              <?php endif; ?>
              <?php if(!empty($map)): ?>
               <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#map"><?php echo e(get_rami_page_placeholder('map', 1)); ?>

                </a>
              </li>
              <?php endif; ?>
               <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#flights"><?php echo e(get_rami_page_placeholder('flights', 1)); ?>

                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#car"><?php echo e(get_rami_page_placeholder('vehicle', 1)); ?> </a>
              </li>

              </ul>
          </nav>
          <div class="pkg-section" id="basic-details">
           <div class="row">
            <div class="col-md-5 bd-sec">
              <div class="bd-head"><h3> יעד החופשה:
                <?php if(!empty($package->package_desti)): ?>
                <?php echo e($package->package_desti->loc_name); ?>

                <?php endif; ?>
                <img src="<?php echo e(url('/assets/front/images')); ?>/location.png"></h3></div>
                <?php if(!empty($package->pkg_instruction_text)): ?>
                    <p><?php echo $package->pkg_instruction_text; ?></p>
                <?php else: ?>
                    <p><?php echo rami_vacation_pkg_del_top_text($package->package_flight_location); ?></p>
                <?php endif; ?>                
            </div>
            <div class="col-md-4 bd-sec">
              <div class="bd-head"><h3>תאריכים<img src="<?php echo e(url('/assets/front/images')); ?>/date-ico.png"></h3> </div>
              <p><?php echo e($package->package_end_date); ?> - <?php echo e($package->package_start_date); ?></p>
              <p>ימים   <?php echo e(rami_get_no_of_days_diff($package->package_start_date, $package->package_end_date)); ?></p>
            </div>
            <div class="col-md-3 bd-sec">
              <div class="bd-head"><h3>מקום אירוח<img src="<?php echo e(url('/assets/front/images')); ?>/apartment-ico.png"></h3> </div>
              <?php if(!empty($hotel_instructions)): ?>
                  <p><?php echo $hotel_instructions; ?></p>
              <?php else: ?>
                  <p>דירת נופש</p>
                  <p>ללא ארוחות</p>
              <?php endif; ?>
            </div>
           </div>
          </div>
          <div class="pkg-section" id="aprment">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>לינה <span class="rt_headd"> <?php echo e(get_rami_page_placeholder('help_text_apartment',1)); ?></span><img src="<?php echo e(url('/assets/front/images')); ?>/rooms.png"></h3></div>
             </div>
             <div class="col-md-12 ap-cont">
              <h6 class="cont-head"><?php echo e($hotel->hotel_display_name); ?></h6>
                <p>כתובת: <?php echo e($hotel->hotel_code); ?> - <?php echo e($hotel->hotel_address); ?> </p>
              </div>
              <div class="col-md-12 ap-cont">
              <h6 class="cont-head">מידע כללי</h6>
              <p><?php echo $hotel->hotel_desc; ?> </p>
              </div>
               <?php if(!empty($hotel->hotel_instruction_text)): ?>
              <div class="col-md-12 ap-cont">
              <h6 class="cont-head">אטרקציות</h6>
                 <p>
                     <?php echo $hotel->hotel_instruction_text; ?>

                </p>
               </div>
                <?php endif; ?>
              <div class="col-md-12 ap-cont">
                <h6 class="cont-head">פעילויות בקרבת מקום</h6>
                  <ul>
                    <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e(get_hotel_amenities($amenity)); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>
              <div class="col-md-12 ap-cont">
              <h6 class="cont-head">מתקני המלון </h6>
              <ul>
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
          <div class="pkg-section" id="gallery">
           <div class="row">
            <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>גלריה <span class="rt_headd"> <?php echo e(get_rami_page_placeholder('help_text_gallery',1)); ?></span><img src="<?php echo e(url('/assets/front/images')); ?>/gallery.png"></h3></div>
             </div>
             <div class="col-md-12 gallery">
                <?php $__currentLoopData = $hotel_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="pics">
                        <a data-fancybox="gallery" href="<?php echo e(url('ramtours/'.$img->image)); ?>">
                            <img class="img-fluid" src="<?php echo e(url('ramtours/'.$img->image)); ?>" alt="<?php echo e($img->title); ?>">
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
          <div class="pkg-section pack_room" id="hotel_rooms">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3><img src="<?php echo e(url('/assets/front/images')); ?>/apartment-ico.png"> מידע על המלון <span class="rt_headd"> <?php echo e(get_rami_page_placeholder('help_text_apartment_info',1)); ?></span></h3></div>
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
                    זמין במלאי  <?php echo e($room['room_avalible']); ?> יחידות   
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
              <div class="bd-head"><h3>אטרקציות באיזור מקום האירוח  <span class="rt_headd"> <?php echo e(get_rami_page_placeholder('help_text_attraction',1)); ?></span><img src="<?php echo e(url('/assets/front/images')); ?>/location.png"></h3></div>
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
          
          <?php echo get_rami_hotel_reviews($hotel_reviews); ?>

          <div class="pkg-section" id="flights">
           <div class="row flt-inner">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>טיסה <span class="rt_headd"> <?php echo e(get_rami_page_placeholder('help_text_flights',1)); ?></span><img src="<?php echo e(url('/assets/front/images')); ?>/flight-ico.png"></h3></div>
             </div>
             <div class="col-md-12 rt_flts">
           <div class="flights-details-box-inner">
                <?php $__currentLoopData = $all_flights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                   <?php echo e('טיסת '.$all_flight['down_flight_no']); ?> <?php echo e($all_flight['down_source']); ?> ל<?php echo e($all_flight['up_desti']); ?>

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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
           </div>
          </div>
          <div class="pkg-section" id="car">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>רכב  <span class="rt_headd"> <?php echo e(get_rami_page_placeholder('help_text_vehicle',1)); ?></span><img src="<?php echo e(url('/assets/front/images')); ?>/pkg-car.png"></h3></div>
             </div>
             <div class="col-md-8">
             <h5><?php echo e($all_cars['first_car_title']); ?></h5>
              <p><?php echo $all_cars['first_car_des']; ?></p>
              <!-- <h6 class="cont-head">אפשרויות שדרוג רכב בתשלום (מחיר ליום) </h6> -->
              <h6 class="cont-head">אפשרויות לשדרוג הרכב בחבילה </h6>
              <ul class="crprice">
                <?php $__currentLoopData = $all_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(empty($car['car_title'])): ?>
                    <?php continue; ?>
                  <?php endif; ?>
                  <?php if($car['id']==$package['cheapest_car']): ?>
                    <?php continue; ?>
                  <?php endif; ?>
                  <li><?php echo e($car['car_title']); ?>

                  <!-- <span class="mcrprz"><?php echo e('€'.$car['car_price']); ?></span> -->
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <div class="col-md-4 ap-cont">
              <img src="<?php echo e(url('ramtours/'.$all_cars['first_car_img'])); ?>" class="img-fluid">
            </div>
           </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
  <?php echo $__env->make('frontend.pages.contact_us_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rami_front_footer_js'); ?>
##parent-placeholder-50c56da52e71826fbb807d7dfe32bd0402ef3ba4##
<?php echo $__env->make('frontend.pages.singal_js.package_details_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.pages.singal_js.contact_us_popup_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/frontend/pages/package_detail.blade.php ENDPATH**/ ?>