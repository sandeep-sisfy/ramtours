<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link href="<?php echo e($assets_admin); ?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_container'); ?>
<?php
   if(empty($flight_schedule))
    $flight_schedule='';
   $flight_type_up=get_edit_input_pvr_old_value_with_obj('flight_type_up',$flight_schedule, 'flight_type_up');
   $flight_type_down=get_edit_input_pvr_old_value_with_obj('flight_type_down',$flight_schedule, 'flight_type_down');
?>
 <?php echo show_flash_msg(); ?>


        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <?php $__env->startSection('nav-tabs'); ?>
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">Flight schedule Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Flight schedule alert</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Meta data</a></li>
                            </ul>
                        <?php echo $__env->yieldSection(); ?>
                        <form action="<?php echo e(url('admin/flight-schedule')); ?><?php echo $__env->yieldContent('edit_flight_schedule_id'); ?>" id="add_flight_sche" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control update_title"  name="flight_sche_title" value="<?php echo get_edit_input_pvr_old_value_with_obj('flight_sche_title',$flight_schedule, 'flight_sche_title'); ?>">
                                    <?php echo get_form_error_msg($errors, 'flight_sche_title'); ?>

                                    <label class="form-label">Flight Schedule Title</label>
                                </div>
                               <!--  <p class="font col-orange">This field in not editable.</p> -->
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick flight_type" name="flight_type_up"  id="flight_type_up" >
                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('flight_type_up', $flight_schedule, 'flight_type_up', 1, 'select')); ?>>Single Flight</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('flight_type_up', $flight_schedule, 'flight_type_up', 2, 'select')); ?>>Connected Flight</option>
                                    </select>
                                    <label class="form-label">Flight Type UP</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'flight_type_up'); ?>

                            </div>
                           
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <?php if($flight_type_up==2): ?>
                                    <select class="form-control show-tick airline  airline_up change_title_class" name="airline_up[]" id="airline_up" show_airline_class="flight_up_select" data-live-search="true" multiple="">
                                        <option id="sel_airline_up_first_option">Please Select Airline</option>
                                        <?php if(!empty($airlines)): ?>
                                        <?php $__currentLoopData = $airlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($airline->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj_serlizie('airline_up', $flight_schedule, 'multi_airline_up', $airline->id , 'select')); ?>

                                            ><?php echo e($airline->airl_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php else: ?>
                                        <select class="form-control show-tick airline  airline_up change_title_class" name="airline_up" id="airline_up" show_airline_class="flight_up_select" data-live-search="true">
                                        <option id="sel_airline_up_first_option">Please Select Airline</option>
                                        <?php if(!empty($airlines)): ?>
                                        <?php $__currentLoopData = $airlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($airline->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('airline_up', $flight_schedule, 'airline_up', $airline->id , 'select')); ?>

                                            ><?php echo e($airline->airl_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php endif; ?>
                                    <label class="form-label">Airline UP</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'airline_up'); ?>

                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <?php if($flight_type_up==2): ?>
                                        <select class="form-control show-tick flight_up change_title_class" name="flight_up[]" id="flight_up_select" old_value="<?php echo e(rami_get_prv_serialize_data( 'flight_up', $flight_schedule, 'multi_flight_up')); ?>" multiple="">
                                        </select>
                                    <?php else: ?>
                                        <select class="form-control show-tick flight_up change_title_class" name="flight_up" id="flight_up_select" old_value="<?php echo e(get_edit_input_pvr_old_value_with_obj('flight_up', $flight_schedule, 'flight_up')); ?>">
                                        </select>
                                    <?php endif; ?>
                                    <label class="form-label">Flights UP</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'flight_up'); ?>

                            </div>
                            <label id="flight_up_level">Up flights</label>
                            <?php if($flight_type_up==2): ?>
                                <?php $__currentLoopData = rami_get_prv_serialize_data_array('flight_up',$flight_schedule, 'multi_flight_up'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($flight_connections_up[$flight])): ?>
                                        <input type="hidden" name="flight_prv_up_departure_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('up_departure_'.$flight, checking_array_is_empty_for_val($flight_connections_up,$flight), 'departure_time')); ?>">
                                         <input type="hidden" name="flight_prv_up_arrival_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('up_arrival_'.$flight, checking_array_is_empty_for_val($flight_connections_up,$flight),'arrival_time')); ?>">
                                        <?php else: ?>:
                                         <input type="hidden" name="flight_prv_up_departure_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('up_departure_'.$flight, '' ,'departure_time')); ?>">
                                         <input type="hidden" name="flight_prv_up_arrival_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('up_arrival_'.$flight, '','arrival_time')); ?>">
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <div id="up_flights_error" id="display:none">
                                <?php if($flight_type_up==2): ?>
                                     <?php $__currentLoopData = rami_get_prv_serialize_data_array('flight_up',$flight_schedule, 'multi_flight_up'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo get_form_error_msg($errors, 'up_departure_'.$flight); ?>

                                        <?php echo get_form_error_msg($errors, 'up_arrival_'.$flight); ?>

                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                           
                            <div class="row" id="up_flights_div" style="border: 1px solid #e0e0e0; margin: 0px; display: none">
                                 
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control flight_time  change_title_class" name="up_departure_time" value="<?php echo get_edit_input_pvr_old_value_with_obj('up_departure_time',$flight_schedule,'up_departure_time'); ?>">
                                    <?php echo get_form_error_msg($errors, 'up_departure_time'); ?>

                                    <label class="form-label">Up Departure Time</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control flight_time  change_title_class" name="up_arrival_time" value="<?php echo get_edit_input_pvr_old_value_with_obj('up_arrival_time',$flight_schedule,'up_arrival_time'); ?>">
                                    <?php echo get_form_error_msg($errors, 'up_arrival_time'); ?>

                                    <label class="form-label">Up Arrival Time</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick airline flight_type" name="flight_type_down"  id="flight_type_down" >
                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('flight_type_down', $flight_schedule, 'flight_type_down', 1, 'select')); ?>>Single Flight</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('flight_type_down', $flight_schedule, 'flight_type_down', 2, 'select')); ?>>Connected Flight</option>
                                    </select>
                                    <label class="form-label">Flight Type Down</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'flight_type_down'); ?>

                            </div>


                            <div class="form-group form-float">
                                <div class="form-line">
                                     <?php if($flight_type_down==2): ?>
                                        <select class="form-control show-tick airline  airline_down change_title_class" name="airline_down[]" id="airline_down" show_airline_class="flight_down_select" data-live-search="true" multiple="">
                                            <option id="sel_airline_down_first_option">Please Select Airline</option>
                                            <?php if(!empty($airlines)): ?>
                                            <?php $__currentLoopData = $airlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($airline->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj_serlizie('airline_down', $flight_schedule, 'multi_airline_down', $airline->id , 'select')); ?>

                                                ><?php echo e($airline->airl_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php else: ?>
                                            <select class="form-control show-tick airline  airline_down change_title_class" name="airline_down" id="airline_down" show_airline_class="flight_down_select" data-live-search="true">
                                            <option id="sel_airline_down_first_option">Please Select Airline</option>
                                            <?php if(!empty($airlines)): ?>
                                            <?php $__currentLoopData = $airlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($airline->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('airline_down', $flight_schedule, 'airline_down', $airline->id , 'select')); ?>

                                                ><?php echo e($airline->airl_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php endif; ?>
                                    <label class="form-label">Airline DOWN</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'airline_down'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                     <?php if($flight_type_down==2): ?>
                                        <select class="form-control show-tick flight_down change_title_class" name="flight_down[]" id="flight_down_select" old_value="<?php echo e(rami_get_prv_serialize_data('flight_down', $flight_schedule, 'multi_flight_down')); ?>" multiple="">
                                        </select>
                                    <?php else: ?>
                                        <select class="form-control show-tick flight_down change_title_class" name="flight_down" id="flight_down_select" old_value="<?php echo e(get_edit_input_pvr_old_value_with_obj('flight_down', $flight_schedule, 'flight_down')); ?>">
                                        </select>
                                    <?php endif; ?>
                                    <label class="form-label">Flights DOWN</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'flight_down'); ?>

                            </div>
                             <label id="flight_down_level">Down flights</label>
                               <?php if($flight_type_down==2): ?>
                                 <?php $__currentLoopData = rami_get_prv_serialize_data_array('flight_down',$flight_schedule, 'multi_flight_down'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($flight_connections_down[$flight])): ?>:
                                        <input type="hidden" name="flight_prv_down_departure_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('down_departure_'.$flight, checking_array_is_empty_for_val($flight_connections_down,$flight),'departure_time')); ?>">
                                         <input type="hidden" name="flight_prv_down_arrival_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('down_arrival_'.$flight, checking_array_is_empty_for_val($flight_connections_down,$flight), 'arrival_time')); ?>">
                                        <?php else: ?>:
                                        <input type="hidden" name="flight_prv_down_departure_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('down_departure_'.$flight, '','departure_time')); ?>">
                                         <input type="hidden" name="flight_prv_down_arrival_<?php echo e($flight); ?>" value="<?php echo e(get_edit_input_pvr_old_value_with_obj('down_arrival_'.$flight, '', 'arrival_time')); ?>">
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            <div id="down_flights_error" id="display:none">
                                <?php if($flight_type_down==2): ?>
                                     <?php $__currentLoopData = rami_get_prv_serialize_data_array('flight_down',$flight_schedule, 'multi_flight_down'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo get_form_error_msg($errors, 'down_departure_'.$flight); ?>

                                        <?php echo get_form_error_msg($errors, 'down_arrival_'.$flight); ?>

                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            
                            <div class="row" id="down_flights_div" style="border: 1px solid #e0e0e0; margin: 0px;">
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control flight_time  change_title_class" name="down_departure_time" value="<?php echo get_edit_input_pvr_old_value_with_obj('down_departure_time',$flight_schedule,'down_departure_time'); ?>">
                                    <?php echo get_form_error_msg($errors, 'down_departure_time'); ?>

                                    <label class="form-label">Down Departure Time</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control flight_time  change_title_class" name="down_arrival_time" value="<?php echo get_edit_input_pvr_old_value_with_obj('down_arrival_time',$flight_schedule,'down_arrival_time'); ?>">
                                    <?php echo get_form_error_msg($errors, 'down_arrival_time'); ?>

                                    <label class="form-label">Down Arrival Time</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Enter Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="flight_sche_desc"><?php echo get_edit_input_pvr_old_value_with_obj('flight_sche_desc',$flight_schedule,'flight_sche_desc'); ?></textarea>
                                    <?php echo get_form_error_msg($errors, 'flight_sche_desc'); ?>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick price_currency" name="price_curr">
                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_curr', $flight_schedule, 'price_curr', 1, 'select')); ?> >USD</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_curr', $flight_schedule, 'price_curr', 2, 'select')); ?> >Euro </option>
                                        <option value="3" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_curr', $flight_schedule, 'price_curr', 3, 'select')); ?> >Swiss Franc</option>
                                        <option value="4" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('price_curr', $flight_schedule, 'price_curr', 4, 'select')); ?>>Shekel</option>
                                    </select>
                                    <label class="form-label">Price Currency</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'price_curr'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="price_per_person" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_per_person',$flight_schedule, 'price_per_person'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_per_person'); ?>

                                    <label class="form-label">Price per person</label>
                                </div>
                            </div>
                            <?php echo $__env->yieldContent('current_price'); ?>
                            <div class="form-group form-float">
                                <label class="profit">Profit : </label>
                                <input type="radio" name="profit_type" id="flat" class="with-gap radio-col-amber" value="1" <?php echo get_edit_select_check_pvr_old_value_with_obj('profit_type',$flight_schedule,'profit_type',1, 'chacked'); ?>>
                                <label for="flat" class="m-l-10 m-r-10">flat</label>
                                <input type="radio" name="profit_type" id="per" chacked="true" class="with-gap radio-col-amber" value="2" <?php echo get_edit_select_check_pvr_old_value_with_obj('profit_type',$flight_schedule,'profit_type',2, 'chacked'); ?>>
                                <label for="per" class="m-l-10 m-r-10">per</label>
                                <?php echo get_form_error_msg($errors, 'profit_type'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick profit_currency" name="profit_curr">
                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('profit_curr', $flight_schedule, 'profit_curr', 1, 'select')); ?> >USD</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('profit_curr', $flight_schedule, 'profit_curr', 2, 'select')); ?> >Euro </option>
                                        <option value="3" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('profit_curr', $flight_schedule, 'profit_curr', 3, 'select')); ?> >Swiss Franc</option>
                                        <option value="4" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('profit_curr', $flight_schedule, 'profit_curr', 4, 'select')); ?>>Shekel</option>
                                    </select>
                                    <label class="form-label">Profit Currency</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'profit_curr'); ?>

                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="flight_profit" value="<?php echo get_edit_input_pvr_old_value_with_obj('flight_profit',$flight_schedule, 'flight_profit'); ?>">
                                    <?php echo get_form_error_msg($errors, 'flight_profit'); ?>

                                    <label class="form-label">Flight Profit</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="flight_pnr_no" value="<?php echo get_edit_input_pvr_old_value_with_obj('flight_pnr_no',$flight_schedule, 'flight_pnr_no'); ?>">
                                    <?php echo get_form_error_msg($errors, 'flight_pnr_no'); ?>

                                    <label class="form-label">PNR Number</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="num_total_seat" value="<?php echo get_edit_input_pvr_old_value_with_obj('num_total_seat',$flight_schedule, 'num_total_seat'); ?>">
                                    <?php echo get_form_error_msg($errors, 'num_total_seat'); ?>

                                    <label class="form-label">No. of total Seat</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="num_available_seat" value="<?php echo get_edit_input_pvr_old_value_with_obj('num_available_seat',$flight_schedule, 'num_available_seat'); ?>">
                                    <?php echo get_form_error_msg($errors, 'num_available_seat'); ?>

                                    <label class="form-label">No. of Seat Available</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="flight_incr_price_str" value="">
                                        <option value="">Select One</option>
                                        <option value="1" selected="true" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('flight_incr_price_str', $flight_schedule,'flight_incr_price_str', '1', 'select')); ?>>by Amount</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('flight_incr_price_str', $flight_schedule, 'flight_incr_price_str', '2', 'select')); ?>>by Per(%)</option>
                                    </select>
                                    <label class="form-label">Increase by price</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'flight_incr_price_str'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_90" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_90',$flight_schedule, 'price_incr_90'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_90'); ?>

                                    <label class="form-label">Increment by 90(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_80" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_80',$flight_schedule, 'price_incr_80'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_80'); ?>

                                    <label class="form-label">Increment by 80(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_70" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_70',$flight_schedule, 'price_incr_70'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_70'); ?>

                                    <label class="form-label">Increment by 70(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_60" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_60',$flight_schedule, 'price_incr_60'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_60'); ?>

                                    <label class="form-label">Increment by 60(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_50" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_50',$flight_schedule, 'price_incr_50'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_50'); ?>

                                    <label class="form-label">Increment by 50(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_40" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_40',$flight_schedule, 'price_incr_40'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_40'); ?>

                                    <label class="form-label">Increment by 40(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_30" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_30',$flight_schedule, 'price_incr_30'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_30'); ?>

                                    <label class="form-label">Increment by 30(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_20" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_20',$flight_schedule, 'price_incr_20'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_20'); ?>

                                    <label class="form-label">Increment by 20(%)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price_incr_10" value="<?php echo get_edit_input_pvr_old_value_with_obj('price_incr_10',$flight_schedule, 'price_incr_10'); ?>">
                                    <?php echo get_form_error_msg($errors, 'price_incr_10'); ?>

                                    <label class="form-label">Increment by 10(%)
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Save
                            </button>
                            <button type="button" class="btn btn-success btn-primary waves-effect m-t-20 " onclick="window.location.reload();" >Discard Changes
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
    <script src="<?php echo e($assets_admin); ?>/js/pages/forms/editors.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/momentjs/moment.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           // alert($('#airline_up').val());
            if($('#airline_up').val()!==''){
                var airline_id =$('#airline_up').val();
                var show_airline_class=$('#airline_up').attr('show_airline_class');
                get_flight_by_airline(airline_id, show_airline_class);
            }
             if($('#airline_down').val()!==''){
                var airline_id =$('#airline_down').val();
                var show_airline_class=$('#airline_down').attr('show_airline_class');
                get_flight_by_airline(airline_id, show_airline_class);
            }

            $('#add_flight_sche').on('change', '.airline', function(event) {
                event.preventDefault();
                var show_airline_class=$(this).attr('show_airline_class');
                var airline_id = $(this).val();
                get_flight_by_airline(airline_id,show_airline_class);
                /* Act on the event */
            }); 
            
                   
        });
        $('.airline_up').selectpicker({
            liveSearchPlaceholder:'Search Airline',
            noneSelectedText:'Please Select Airline',
            liveSearch:"true",
            noneResultsText: 'Airline not found.'
        });
        $('.airline_down').selectpicker({
            liveSearchPlaceholder:'Search Airline',
            noneSelectedText:'Please Select Airline',
            liveSearch:"true",
            noneResultsText: 'Airline not found.'
        });

        
        $('.price_currency').selectpicker({
            liveSearchPlaceholder:'Search Price Currency',
            noneSelectedText:'Please Select Price Currency',
            title:'Price Currency',
            liveSearch:"true",
            noneResultsText: 'Price Currency not found.'
        });
        $('.profit_currency').selectpicker({
            liveSearchPlaceholder:'Search Profit Currency',
            noneSelectedText:'Please Select Profit Currency',
            title:'Profit Currency',
            liveSearch:"true",
            noneResultsText: 'Profit Currency not found.'
        });
        function drew_error_eleemnts_error(){
                $('#up_flights_error label').each(function(index, el) {
                    var id = $(this).attr('id');
                    var new_id=id.replace("-error", "");
                    $('input[name='+new_id+']').after('<label id="'+id+'" class="error" for="'+new_id+'">'+$(this).text()+'</label>');  
                    $(this).remove();          
                });
                 $('#down_flights_error label').each(function(index, el) {
                    var id = $(this).attr('id');
                    var new_id=id.replace("-error", "");
                    $('input[name='+new_id+']').after('<label id="'+id+'" class="error" for="'+new_id+'">'+$(this).text()+'</label>');  
                   $(this).remove();          
                });      
            }
        function get_flight_by_airline(airline_id, show_airline_class){
            $.ajax({
                url: "<?php echo e(url('/get_flight_from_airline')); ?>",
                type: 'POST',
                data: {_token:'<?php echo e(csrf_token()); ?>', airline_id:airline_id},
            })
            .done(function(res) {
                var option='';
                var sel="";
                var cur_selected =$('#'+show_airline_class).attr('old_value');
                cur_selected=$.trim(cur_selected);
                cur_selected= cur_selected.split(',');

                if($('#'+show_airline_class).parent().parent().parent().prev().prev().children().children().children('.flight_type').val()==1){
                    option+='<option value="">Please Select Flight</option>';
                }
                if(res.status=='success'){
                    $.each(res.flight, function(index, el) {
                        var id=el.id.toString();
                        if(cur_selected.indexOf(id)!=-1){
                           sel="selected='true'";
                        }else{
                            sel="";
                        }
                       option+='<option value="'+el.id+'"'+sel+'>'+el.flight_title+'</option>';
                    });
                }else{
                    option+='<option value="">Please Select Flight</option>';
                }
                $('#'+show_airline_class).html('');
                $('#'+show_airline_class).html(option);
                $('#'+show_airline_class).selectpicker('refresh');
                if(($('#'+show_airline_class).hasClass('flight_up'))&&($('#flight_type_up').val()==2)){
                     drew_coonnected_flights_section($('#'+show_airline_class).val(), 'flight_up_select', 'up_flights_div', 'up');
                     $.each($('#'+show_airline_class).val(), function(index, val) {
                          if($('input[name=flight_prv_up_departure_'+val+']').length>0){
                              $('input[name=up_departure_'+val+']').val($('input[name=flight_prv_up_departure_'+val+']').val());
                          }
                          if($('input[name=flight_prv_up_arrival_'+val+']').length>0){
                            $('input[name=up_arrival_'+val+']').val($('input[name=flight_prv_up_arrival_'+val+']').val());
                          }
                     });
                }else if(($('#'+show_airline_class).hasClass('flight_down'))&&($('#flight_type_down').val()==2)){
                    drew_coonnected_flights_section($('#'+show_airline_class).val(), 'flight_down_select', 'down_flights_div', 'down');
                     $.each($('#'+show_airline_class).val(), function(index, val) {
                          if($('input[name=flight_prv_down_departure_'+val+']').length>0){
                              $('input[name=down_departure_'+val+']').val($('input[name=flight_prv_down_departure_'+val+']').val());
                          }
                          if($('input[name=flight_prv_down_arrival_'+val+']').length>0){
                            $('input[name=down_arrival_'+val+']').val($('input[name=flight_prv_down_arrival_'+val+']').val());
                          }
                     });
                }
                drew_error_eleemnts_error();

            })
            .fail(function() {
                alert('somthing went wrong');
            })


        }

    /* date time picker */
        $('.flight_time').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            clearButton: true,
            time: true
        });
        $('.flight_date_return').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            time: false
        });

        $("#add_flight_sche").validate({
            rules: {
                title:{
                    required: true,
                    maxlength: 100,
                },
                contact_no:{
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Please enter Name here.",
                    maxlength:"Sub Category Name contain only 100 Charecters ."
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }
            }
        });
        $('#flight_up_level').hide();
        $('#up_flights_div').hide();
        $('#flight_down_level').hide();
        $('#down_flights_div').hide();
        flight_type_up(1);
        flight_type_down(1);
        $('#flight_type_up').change(function(event) {
             flight_type_up();
        });
        $('#flight_type_down').change(function(event) {
           flight_type_down();
        });
        function flight_type_up(intial_load=0) {
            var type=$('#flight_type_up').val();
            if(type==2){
                $('.airline_up').attr({
                    multiple: '',
                    name: 'airline_up[]'
                });
                $('.flight_up').attr({
                    multiple: '',
                    name: 'flight_up[]'
                });
                if(intial_load==0){
                    $('.airline_up').val('');
                    $('.flight_up').val('');
                }
                 $('#sel_airline_up_first_option').hide();
                 $('.airline_up').selectpicker('destroy');
                 $('.airline_up').selectpicker();
                 $('.flight_up').selectpicker('destroy');
                 $('.flight_up').selectpicker();
                 $('.flight_up').addClass('multi_flights_up');
                 $('#flight_up_level').show();
                 $('#up_flights_div').show();
                 $('input[name=up_arrival_time]').closest('.form-group').hide();
                 $('input[name=up_departure_time]').closest('.form-group').hide();
            }if(type==1){
                if(intial_load==0){
                    $('.airline_up').val('');
                    $('.flight_up').val('');
                }
                 $('#sel_airline_up_first_option').show();
                 $('.airline_up').removeAttr('multiple');
                 $('.airline_up').attr('name', 'airline_up');
                 $('.flight_up').attr('name', 'flight_up');
                 $('.flight_up').removeAttr('multiple');
                 $('.airline_up').selectpicker('destroy');
                 $('.airline_up').selectpicker();
                 $('.flight_up').selectpicker('destroy');
                 $('.flight_up').selectpicker();
                 $('.flight_up').removeClass('multi_flights_up');
                 $('#flight_up_level').hide();
                 $('#up_flights_div').hide();
                 $('input[name=up_arrival_time]').closest('.form-group').show();
                 $('input[name=up_departure_time]').closest('.form-group').show();          
            }
        }
         function flight_type_down(intial_load=0) {
            var type=$('#flight_type_down').val();
            if(type==2){
                $('.airline_down').attr({
                    multiple: '',
                    name: 'airline_down[]'
                });
                $('.flight_down').attr({
                    multiple: '',
                    name: 'flight_down[]'
                });
                 if(intial_load==0){
                    $('.airline_down').val('');
                    $('.flight_down').val('');
                }
                 $('#sel_airline_down_first_option').hide();
                 $('.airline_down').selectpicker('destroy');
                 $('.airline_down').selectpicker();
                 $('.flight_down').selectpicker('destroy');
                $('.flight_down').selectpicker();
                 $('.flight_down').addClass('multi_flights_down');
                 $('#flight_down_level').show();
                 $('#down_flights_div').show();
                 $('input[name=down_arrival_time]').closest('.form-group').hide();
                 $('input[name=down_departure_time]').closest('.form-group').hide();
            }if(type==1){
                if(intial_load==0){
                    $('.airline_down').val('');
                    $('.flight_down').val('');
                }
                 $('#sel_airline_down_first_option').show();
                 $('.airline_down').removeAttr('multiple');
                 $('.airline_down').attr('name', 'airline_down');
                 $('.flight_down').attr('name', 'flight_down');
                 $('.flight_down').removeAttr('multiple');
                 $('.airline_down').selectpicker('destroy');
                 $('.airline_down').selectpicker();
                 $('.flight_down').selectpicker('destroy');
                 $('.flight_down').selectpicker();
                 $('.flight_down').removeClass('multi_flights_down');
                 $('#flight_down_level').hide();
                 $('#down_flights_div').hide();
                 $('input[name=down_arrival_time]').closest('.form-group').show();
                 $('input[name=down_departure_time]').closest('.form-group').show();          
            }
        };
        $('.flight_up').change(function(event) {
            if($(this).hasClass('multi_flights_up')){
               if($(this).val()==''){
                return false;
               }
                drew_coonnected_flights_section($(this).val(), 'flight_up_select', 'up_flights_div', 'up');

            }
        });
         $('.flight_down').change(function(event) {
            if($(this).hasClass('multi_flights_down')){
                  if($(this).val()==''){
                    return false;
                   }
                drew_coonnected_flights_section($(this).val(), 'flight_down_select', 'down_flights_div', 'down');

            }
        });
        function drew_coonnected_flights_section($flights, select_id, div_id, type){
           var html=""
           $.each($flights, function(index, val) {
                html += '<div class="col-md-4" style="padding-top: 25px; font-size: 16px;">';
                html += '<span class="text-center page-header">'+$('#'+select_id+' option[value='+val+']').html()+'</span>';
                html += '</div>';
                html +='<div class="col-md-4">';
                html +='<div class="form-group form-float">';
                html +='<div class="form-line">';
                html +='<label class="form-label">Departure Time</label>';
                html +='<input type="text" class="form-control flight_time" name="'+type+'_departure_'+val+'" >';
                html +=' </div>';                               
                html +=' </div>';                           
                html +=' </div>';
                html +='<div class="col-md-4">';
                html +='<div class="form-group form-float">';
                html +='<div class="form-line">';
                html +='<label class="form-label">Arrival Time</label>';
                html +='<input type="text" class="form-control flight_time" name="'+type+'_arrival_'+val+'" >';
                html +=' </div>';                               
                html +=' </div>';                           
                html +=' </div>';                         

           });
           $('#'+div_id).empty();
           $('#'+div_id).append(html);
           $('#'+div_id).show();
            $('.flight_time').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            clearButton: true,
            time: true
           });
        }

        var name_array  = new Array('airline_up','flight_up', 'up_departure_time', 'down_departure_time');
        // $('#add_flight_sche').on('change', '.change_title_class', function(event) {
        //     event.preventDefault();
        //     var title = '.update_title';
        //     var make_title='';
        //     $.each(name_array,  function(index, el) {
        //         var cur_val=$('.change_title_class[name='+el+']').val();
        //        if((cur_val == "")||(typeof cur_val=='undefined')){
        //         cur_val=0;
        //        }
        //         if(index==0){
        //              if($('.change_title_class[name='+el+']').is("select")) {
        //                 make_title+=$('.change_title_class[name='+el+'] option[value='+cur_val+']').text();
        //               }else{
        //                 make_title+=$('.change_title_class[name='+el+']').val();
        //               }
        //         }else{
        //             if($('.change_title_class[name='+el+']').is("select")) {
        //                  make_title+='-'+$('.change_title_class[name='+el+'] option[value='+cur_val+']').text();
        //               }else{
        //                 make_title+='-'+$('.change_title_class[name='+el+']').val();
        //               }
        //         }

        //     });
        //     make_title=make_title.replace("--", "");
        //     $(title).val(make_title);

        // });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/flight_schedule/add_flight_schedule.blade.php ENDPATH**/ ?>