<header class="masthead">
    <div class="container">
      <div class="row header-headings">
        <div class="col-md-5 rt_usrfrm">
            <div class="card mt-3 tab-card">
              <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="header_search_tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link" id="rami_package_tab" data-toggle="tab" href="#rami_package" role="tab" aria-controls="One" aria-selected="true"><img src="<?php echo e(url('/assets/front/images')); ?>/rtuf1.png" alt=""><span>חבילות נופש  </span></a>
                  </li>
                 <!--  <li class="nav-item">
                      <a class="nav-link" id="rami_fly_drive_tab" data-toggle="tab" href="#rami_fly_drive" role="tab" aria-controls="Two" aria-selected="false"><img src="<?php echo e(url('/assets/front/images')); ?>/rtuf2.png" alt=""><span>חבילות טוס וסע</span></a>
                  </li> -->
                  <li class="nav-item">
                      <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false"><img src="<?php echo e(url('/assets/front/images')); ?>/rtuf3.png" alt=""><span>טיסות</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="three-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false"><img src="<?php echo e(url('/assets/front/images')); ?>/rtuf4.png" alt=""><span>דירות נופש</span></a>
                  </li>
                </ul>
              </div>
              <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active p-3" id="rami_package" role="tabpanel">
                <div class="formBox container">
                <form action="<?php echo e(url('/search-vacation-packages')); ?>" method="GET" accept-charset="utf-8" id="add_hotel_features" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-md-12">
                      <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/rtuf10.png"></span></div>
                          <select class="d-block w-100 form-control" name="pack_location" id="pack_location" required="">
                           <!-- <option value="0">בחר יעד</option>-->
                            <?php $__currentLoopData = $fhcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fhc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($fhc->id); ?>"><?php echo e($fhc->loc_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                      </div>
                  </div>
                  <div class="row rt_custm">
                      <div class="col-md-12">
                        <div class="input-group input-append date">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text" class="sDate_pack form-control"  autocomplete="off" placeholder="בחר תאריך " readonly="">
                          <input type="hidden" name="pack_start_date">
                          <input type="hidden" name="pack_end_date">
                        </div>
                      </div>
                      <!-- div class="col-md-6">
                        <div class="input-group input-append date">
                           <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text" class="pack_end_date form-control"  name="pack_end_date" autocomplete="off">
                        </div>
                      </div> -->
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <label class="rt_packlabel">מבוגר   </label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/user.png"></span></div>
                         <select class="d-block w-100 form-control" name="pack_adult" >
                            <?php for($i=2;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_adult()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="rt_packlabel">ילד (2-16) </label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/child.png" class="rt_childico"></span></div>
                          <select class="d-block w-100 form-control" name="pack_child" >
                            <?php for($i=0;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_child()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="rt_packlabel">תינוק (0-2) </label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text "><img src="<?php echo e(url('/assets/front/images')); ?>/infant.png" class="rt_infantico"></span></div>
                          <select class="d-block w-100 form-control" name="pack_infant" >
                            <?php for($i=0;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_infant()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                          </select>
                        </div>
                      </div>
                      
                  </div>
                  <div class="row">
                      <div class="col-md-7"></div>
                      <div class="col-md-5">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                          חפש חבילות
                        </button>
                      </div>
                  </div>
                </form>
                </div>
                </div>
              <!--   <div class="tab-pane fade p-3" id="rami_fly_drive" role="tabpanel">
                  <div class="formBox container">
                  <form action="<?php echo e(url('/fly-travel-packages')); ?>" method="GET" accept-charset="utf-8" id="add_hotel_features" >
                  <div class="row">
                      <div class="col-md-12">
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/rtuf10.png"></span></div>
                          <select class="d-block w-100 form-control" name="fc_location">
                            <option value="0">--select one--</option>
                            <?php $__currentLoopData = $fcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($fc->loc_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-append date">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text" class="fc_start_date form-control" name="startDate" value="07/01/2015">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="input-group input-append date">
                           <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text" class="fc_end_date form-control" name="endDate" value="07/15/2015">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/user.png"></span></div>
                          <select class="d-block w-100 form-control" id="country5" required="">
                            <option value="" hidden>מספר מבוגרים</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/user.png"></span></div>
                         <select class="d-block w-100 form-control" id="country6" required="">
                            <option value="" hidden>מספר ילדים בגילאי 2-16</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-7"></div>
                      <div class="col-md-5">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                           חפש חבילות
                        </button>
                      </div>
                  </div>
                </form>
                 </div>
                </div> -->
                <div class="tab-pane fade p-3" id="three" role="tabpanel">
                  <div class="formBox container">
                  <form action="<?php echo e(url('/search-flights')); ?>" method="GET" accept-charset="utf-8" id="flights">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/rtuf8.png"></span></div>
                            <select class="d-block w-100 form-control" name="source_location" >
                            <!--<option value="0">--תבחר אחד --</option>-->
                            <?php $__currentLoopData = $flights_src; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($fc->id); ?>"><?php echo e($fc->loc_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                          </select>
                        </div>
                      </div>
                       <div class="col-md-6">
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">
                              <img src="<?php echo e(url('/assets/front/images')); ?>/rtuf9.png"></span></div>
                              <select class="d-block w-100 form-control" name="destination_location">
                             <!-- <option value="0">--תבחר אחד --</option>-->
                              <?php $__currentLoopData = $flights_desti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($fc->id); ?>"><?php echo e($fc->loc_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                      </div>
                  </div>
                  <div class="row rt_custm">
                      <div class="col-md-12">
                        <div class="input-group input-append date">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text"  class="flight_sDate form-control" autocomplete="off" placeholder="בחר תאריך " readonly="">
                           <input type="hidden" name="flight_start_date">
                          <input type="hidden" name="flight_end_date">
                        </div>
                      </div>
                       <!-- <div class="col-md-6">
                        <div class="input-group input-append date">
                           <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text" name="flight_end_date" class="flight_eDate form-control" autocomplete="off">
                        </div>
                      </div> -->
                  </div>
                 <div class="row">
                      <div class="col-md-4">
                       <label class="rt_packlabel">מבוגר   </label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/user.png"></span></div>
                          <select class="d-block w-100 form-control" name="flight_adult">
                            <option value="" hidden>מספר מבוגרים</option>
                            <?php for($i=1;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_adult()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                          </select>

                        </div>
                      </div>
                      <div class="col-md-4">
                       <label class="rt_packlabel">ילד (2-16) </label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/child.png" class="rt_childico"></span></div>
                         <select class="d-block w-100 form-control" name="flight_child">
                            <option value="" hidden>מספר הילדים</option>
                             <?php for($i=0;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_child()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="rt_packlabel">תינוק (0-2) </label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/infant.png" class="rt_infantico"></span></div>
                         <select class="d-block w-100 form-control" name="flight_infant">
                            <option value="" hidden>מספר הילדים</option>
                             <?php for($i=0;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_infant()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-7"></div>
                      <div class="col-md-5">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                     חפש טיסות
                      </button>
                      </div>
                  </div>
                  </form>
                 </div>
                </div>
                <div class="tab-pane fade p-3" id="four" role="tabpanel">
                  <div class="formBox container">
                  <form action="<?php echo e(url('/search-accommodation')); ?>" method="GET" accept-charset="utf-8" id="accommodation">
                    <?php echo e(csrf_field()); ?>

                  <div class="row rt_custm">
                      <div class="col-md-12">
                         <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/rtuf10.png"></span></div>
                          <select class="d-block w-100 form-control" id="country" required="" name="accom_location">
                            <!--<option value="0">בחר יעד</option>-->
                            <?php $__currentLoopData = $accs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($acc->id); ?>"><?php echo e($acc->loc_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                  </div>
              <!--     <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-append date">
                          <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text" class="sDate form-control" id="startDate" value="07/01/2015">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="input-group input-append date">
                           <div class="input-group-prepend"><span class="input-group-text">
                            <img src="<?php echo e(url('/assets/front/images')); ?>/calenderr.png"></span></div>
                          <input type="text" class="eDate form-control" id="endDate" value="07/15/2015">

                        </div>
                      </div>
                  </div> -->
                  <div class="row">
                    <div class="col-md-4">
                     <label class="rt_packlabel">מבוגר   </label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/user.png"></span></div>
                        <select class="d-block w-100 form-control" id="country" name="acc_adults">
                           <?php for($i=1;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_adult()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="rt_packlabel">ילד (2-16) </label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/child.png" class="rt_childico"></span></div>
                        <select class="d-block w-100 form-control" id="country" name="acc_childs">
                          <option value="" hidden>מספר הילדים</option>
                           <?php for($i=0;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_child()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="rt_packlabel">תינוק (0-2) </label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo e(url('/assets/front/images')); ?>/infant.png" class="rt_infantico"></span></div>
                        <select class="d-block w-100 form-control" id="country" name="acc_infants">
                          <option value="" hidden>מספר הילדים</option>
                           <?php for($i=0;$i<7;$i++): ?>
                            <option value="<?php echo e($i); ?>" <?php if($i== get_search_child()): ?> selected="true" <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                      <button class="btn btn-primary btn-lg btn-block" type="submit">
                      חפש דירות נופש  </button>                      
                    </div>
                  </div>
                  </form>
                 </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-7">
         <!-- <div class="contact_pop_opener">
            <div class="txt">
            <div class="cap">שאלות?</div>
            <div class="call">התקשרו 03-600-7100</div>
            <a class="cboxElement" href="#contact_popup">או הקליקו ליצירת קשר</a> </div>
          </div>-->
        </div>
      </div>
    </div>
  </header><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/frontend/front_part/slider-search.blade.php ENDPATH**/ ?>