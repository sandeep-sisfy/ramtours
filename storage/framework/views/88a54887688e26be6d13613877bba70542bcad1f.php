 <?php $__env->startSection('rami_mobile_header_serach'); ?>
 <section class="rt_inputs">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt_tabview">
                  <div class="panel with-nav-tabs panel-dark">
                     <div class="card-header">
                        <ul class="nav nav-tabs">
                           <li class="nav-item">
                              <a href="#rt_tab1" data-toggle="tab" class="nav-link active">
                                 <div class="rt_tabimg"></div>
                                 <span class="rt_tabdesc">חבילות נופש</span>
                              </a>
                           </li>
                           <!-- <li class="nav-item">
                              <a href="#rt_tab2" data-toggle="tab" class="nav-link">
                                 <div class="rt_tabimg"><img src="<?php echo e(url('assets/mobile')); ?>/images/rtabs-2.png"></div>
                                 <span class="rt_tabdesc">חבילות טוס וסע</span>
                              </a>
                           </li> -->
                           <li class="nav-item">
                              <a href="#rt_tab3" data-toggle="tab" class="nav-link">
                                 <div class="rt_tabimg"></div>
                                 <span class="rt_tabdesc">טיסות</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#rt_tab4" data-toggle="tab" class="nav-link">
                                 <div class="rt_tabimg"></div>
                                 <span class="rt_tabdesc">דירות נופש</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <div class="card-body">
                        <div class="tab-content">
                          <div class="tab-pane fade in active" id="rt_tab1">
                            <form action="<?php echo e(url('/search-vacation-packages')); ?>" method="GET" accept-charset="utf-8" id="add_hotel_features" enctype="multipart/form-data">
                              <?php echo e(csrf_field()); ?>

                              <div class="col-sm-12 md-input">          
                                 <select class="md-form-control" required="" name="pack_location" id="pack_location">
                                   <!--<option value="0" class="select_info">--בחר יעד--</option-->
                                    <?php $__currentLoopData = $fhcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fhc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($fhc->id); ?>"><?php echo e($fhc->loc_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select> 
                                 <div class="rt_inputicons"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_locinput.png"></div>
                                 <label>בחר יעד</label>                          
                              </div>
                              <div class="col-12 col-sm-12 md-input">          
                                 <input type="text"  class="sDate sDate_pack md-form-control" value="בחר תאריך " placeholder="בחר תאריך " readonly>
                                <!-- <label>תאריך עזיבה</label>-->
                                 <input type="hidden" class="set_start_date" name="pack_start_date" value="">
                                 <input type="hidden" class="set_end_date"name="pack_end_date" value="">                
                                 <div class="rt_inputicons"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_calico.png"></div>
                              </div>
                              <div class="col-4 col-sm-4 md-input"> 
                                  <div class="rt_passsrch pkg_adults">
                                     <label>מבוגר (16+)</label>
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
                              </div>
                              <div class="col-4 col-sm-4 md-input">   
                                  <div class="rt_passsrch pkg_kids">
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
                              </div>
                              <div class="col-4 col-sm-4 md-input">   
                                <div class="rt_passsrch pkg_infants">
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
                              </div>
                              <div class="col-sm-12 md-input">          
                                 <button class="btn btn-primary btn-lg btn-block rt_srch_btn" type="submit" id="pack_location_search_btn">חפש חבילות</button>
                              </div>
                          </form>
                          </div>
                           <!-- <div class="tab-pane fade" id="rt_tab2">
                            <form action="<?php echo e(url('/fly-travel-packages')); ?>" method="GET" accept-charset="utf-8" id="add_hotel_features" >
                              <?php echo e(csrf_field()); ?>

                              <div class="col-sm-12 md-input">          
                                 <select class="md-form-control" required="">
                                   <option value="0" class="select_info">--בחר יעד--</option>
                                    <?php $__currentLoopData = $fcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($fc->loc_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select> 
                                 <label>בחר יעד</label>                         
                              </div>
                              <div class="col-12 col-sm-12 md-input">          
                                 <input type="text" name="startDate" class="sDate md-form-control" value="בחר תאריך " readonly>
                                 <label>תאריך עזיבה</label>                          
                              </div>
                              <div class="col-6 col-sm-6 md-input"> 
                                 <input type="text" name="endDate" class="eDate md-form-control" value="30 באפריל 2019">
                                 <label>תאריך חזרה</label>                          
                              </div>
                              <div class="col-6 col-sm-6 md-input">          
                                 <input class="md-form-control" required="" value="2" type="text">
                                 <label>מבוגרים</label>                          
                              </div>
                              <div class="col-6 col-sm-6 md-input">          
                                 <input class="md-form-control" required="" value="3" type="text">
                                 <label>ילדים</label> 
                                 <span class="rttinfo"> ילד   (2-12)</span>                        
                              </div>
                              <div class="col-sm-12 md-input">          
                                 <button class="btn btn-primary btn-lg btn-block rt_srch_btn" type="submit">חפש טיסות </button>
                              </div>
                            </form>
                           </div> -->
                           <div class="tab-pane fade" id="rt_tab3">
                            <form action="<?php echo e(url('/search-flights')); ?>" method="GET" accept-charset="utf-8" id="flights">
                              <?php echo e(csrf_field()); ?>

                              <div class="col-6 col-sm-6 md-input">          
                                 <select class="md-form-control" name="source_location" id="source_location">
                                  <!--  <option value="0" class="select_info">--מקור--</option>  -->
                                    <?php $__currentLoopData = $flights_src; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($flight->id); ?>"><?php echo e($flight->loc_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                 </select>
                                 <div class="rt_inputicons"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_plane1.png"></div>
                                 <label>המראה מ</label>                         
                              </div>
                              <div class="col-6 col-sm-6 md-input">          
                                 <select class="md-form-control" name="destination_location">
                               <!-- <option value="0" class="select_info">-- יעד --</option>  -->
                                    <?php $__currentLoopData = $flights_desti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($flight->id); ?>"><?php echo e($flight->loc_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                                 <div class="rt_inputicons"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_plane2.png"></div>
                                 <label> נחיתה ב     </label>                       
                              </div>
                              <div class="col-12 col-sm-12 md-input">          
                                 <input type="text"  class="sDate_flight md-form-control" value="בחר תאריך " placeholder="בחר תאריך " readonly>
                                 <input type="hidden" name="flight_start_date" >
                                 <input type="hidden" name="flight_end_date">
                                <!-- <label>תאריך עזיבה</label> -->                
                                 <div class="rt_inputicons"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_calico.png"></div>
                              </div>
                              <!--<div class="col-6 col-sm-6 md-input"> 
                                 <input type="text" name="endDate" class="eDate md-form-control" value="30 באפריל 2019">
                                 <label>תאריך חזרה</label>                          
                              </div>-->
                              <div class="col-4 col-sm-4 md-input"> 
                                  <div class="rt_passsrch pkg_adults">
                                     <label>מבוגר (16+)</label>
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
                              </div>
                              <div class="col-4 col-sm-4 md-input">   
                                  <div class="rt_passsrch pkg_kids">
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
                              </div>
                              <div class="col-4 col-sm-4 md-input">   
                                <div class="rt_passsrch pkg_infants">
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
                              </div>
                              <div class="col-sm-12 md-input">          
                                 <button class="btn btn-primary btn-lg btn-block rt_srch_btn" type="submit" id="flights_location_search_btn">חפש טיסות </button>
                              </div>
                            </form>
                           </div>
                           <div class="tab-pane fade" id="rt_tab4">
                            <form action="<?php echo e(url('/search-accommodation')); ?>" method="GET" accept-charset="utf-8" id="accommodation">
                            <?php echo e(csrf_field()); ?>

                              <div class="col-sm-12 md-input">          
                                 <select class="md-form-control" name="accom_location">
                                    <!--<option value="0" class="select_info">--בחר יעד--</option>-->
                                    <?php $__currentLoopData = $accs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($acc->id); ?>"><?php echo e($acc->loc_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                                 <div class="rt_inputicons"><img src="<?php echo e(url('assets/mobile')); ?>/images/rt_locinput.png"></div>
                                 <label>בחר יעד</label>                   
                              </div>
                              <!-- <div class="col-12 col-sm-12 md-input">          
                                 <input type="text" name="startDate" class="sDate md-form-control" value="בחר תאריך " readonly>
                                 <label>תאריך עזיבה</label>                          
                              </div> -->
                             <!-- <div class="col-6 col-sm-6 md-input"> 
                                 <input type="text" name="endDate" class="eDate md-form-control" value="30 באפריל 2019">
                                 <label>תאריך חזרה</label>                          
                              </div>-->
                              <div class="col-4 col-sm-4 md-input"> 
                                  <div class="rt_passsrch pkg_adults">
                                     <label>מבוגר (16+)</label>
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
                              </div>
                              <div class="col-4 col-sm-4 md-input">   
                                  <div class="rt_passsrch pkg_kids">
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
                              </div>
                              <div class="col-4 col-sm-4 md-input">   
                                <div class="rt_passsrch pkg_infants">
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
                              </div>
                              <div class="col-sm-12 md-input">          
                                 <button class="btn btn-primary btn-lg btn-block rt_srch_btn" type="submit"> חפש דירות נופש
                              </button></div>
                            </form>
                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </section>
    <?php echo $__env->yieldSection(); ?><?php /**PATH /home/eli/ramtours/resources/views/mobile/mobile_part/home_search.blade.php ENDPATH**/ ?>