<?php $__env->startSection('admin_head_css'); ?>

##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##

    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css" />

    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/bootstrap-select/css/bootstrap-select.css.map" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title',$page_title); ?>

<?php $__env->startSection('title_breadcrumb',$page_title); ?>

<?php $__env->startSection('admin_container'); ?>

<?php

   if(empty($hotel)){
       $selected='';
       $hotel='';
    }else{
        $selected=$hotel->hotel_location;
    }
    if(empty($hotel_type))
        $hotel_type='';

?>



        <div class="container-fluid">

             <?php echo show_flash_msg(); ?>


        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="body">

                        <ul class="nav nav-tabs">

                            <?php $__env->startSection('nav-tabs'); ?>

                            <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">Hotel Info</a></li>

                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Gellery</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Meta data</a></li>
                            <?php echo $__env->yieldSection(); ?>
                        </ul>
                        <form action="<?php echo e(url('admin/hotel')); ?><?php echo $__env->yieldContent('edit_hotel_id'); ?>" id="add_hotel" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startSection('method_field'); ?>
                            <?php echo $__env->yieldSection(); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="hotel_name" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_name',$hotel,'hotel_name'); ?>">
                                    <?php echo get_form_error_msg($errors, 'hotel_name'); ?>

                                    <label class="form-label">Hotel Name</label>
                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_display_name" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_display_name',$hotel,'hotel_display_name'); ?>">

                                    <?php echo get_form_error_msg($errors, 'hotel_display_name'); ?>


                                    <label class="form-label">Hotel Display Name</label>

                                </div>

                            </div>
                           
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="hotel_code" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_code',$hotel,'hotel_code'); ?>">
                                    <?php echo get_form_error_msg($errors, 'hotel_code'); ?>

                                    <label class="form-label">Hotel Code</label>
                                </div>
                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_address" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_address',$hotel,'hotel_address'); ?>">

                                    <?php echo get_form_error_msg($errors, 'hotel_address'); ?>


                                    <label class="form-label">Hotel Address</label>

                                </div>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick hotel_location" name="hotel_location">
                                        <?php $__currentLoopData = $main_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('hotel_location', $hotel, 'hotel_location', $location->id, 'select')); ?> ><?php echo e($location->loc_name); ?></option>
                                            <?php echo get_loctions_child_option($location->id, $selected, 'hotel_location'); ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                         <option value="">Select Location</option>            
                                    </select>
                                    <label class="form-label">Hotel Location</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'hotel_location'); ?>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick hotel_card" name="hotel_card">
                                        <option value="0">Select card</option> 
                                        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($card->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('hotel_card', $hotel, 'hotel_card', $card->id, 'select')); ?> ><?php echo e($card->card_title); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
                                    </select>
                                    <label class="form-label">Hotel Card</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'hotel_card'); ?>

                            </div>
                            <div class="form-group form-float">
                                <label class="hotel_include_local_tax">Include Local Taxes : </label>
                                <input type="radio" name="hotel_include_local_tax" id="local_yes" class="with-gap radio-col-amber" value="1" <?php echo get_edit_select_check_pvr_old_value_with_obj('hotel_include_local_tax',$hotel,'hotel_include_local_tax',1, 'chacked'); ?>>
                                <label for="local_yes" class="m-l-10 m-r-10">Yes</label>

                                <input type="radio" name="hotel_include_local_tax" id="local_no" class="with-gap radio-col-amber" value="0" <?php echo get_edit_select_check_pvr_old_value_with_obj('hotel_include_local_tax',$hotel,'hotel_include_local_tax',0, 'chacked'); ?>>
                                <label for="local_no" class="m-l-10 m-r-10">No</label>
                                <?php echo get_form_error_msg($errors, 'hotel_include_local_tax'); ?>

                            </div>  
                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="infant_price" value="<?php echo get_edit_input_pvr_old_value_with_obj('infant_price',$hotel, 'infant_price'); ?>">
                                        <?php echo get_form_error_msg($errors, 'infant_price'); ?>

                                        <label class="form-label">Infant price</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick infant_price_currency" name="infant_price_currency">
                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 1, 'select')); ?> >USD</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 2, 'select')); ?> >Euro </option>
                                        <option value="3" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 3, 'select')); ?> >Swiss Franc</option>
                                        <option value="4" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 4, 'select')); ?>>Shekel</option>
                                    </select>
                                    <label class="form-label">Room Infant price Currency</label>
                                </div>
                                <?php echo get_form_error_msg($errors, 'infant_price_currency'); ?>

                            </div>  
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_contact" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_contact',$hotel,'hotel_contact'); ?>">

                                    <?php echo get_form_error_msg($errors, 'hotel_contact'); ?>


                                    <label class="form-label">Contact Number</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_email" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_email',$hotel,'hotel_email'); ?>">

                                    <?php echo get_form_error_msg($errors, 'hotel_email'); ?>


                                    <label class="form-label">Hotel Email</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_website" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_website',$hotel,'hotel_website'); ?>">

                                    <?php echo get_form_error_msg($errors, 'hotel_website'); ?>


                                    <label class="form-label">Hotel Website</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick " name="hotel_star" value="">

                                        <option value="">Select One</option>

                                        <option value="1" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel,'hotel_star', '1', 'select')); ?>>1</option>
                                        <option value="2" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '2', 'select')); ?>>2</option>
                                        <option value="3" <?php echo e(get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '3', 'select')); ?>>3</option>
                                        <option value="4"<?php echo e(get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '4', 'select')); ?>>4</option>
                                        <option value="5"<?php echo e(get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '5', 'select')); ?>>5</option>
                                    </select>

                                    <label class="form-label">No. of Star Rating</label>

                                </div>

                                <?php echo get_form_error_msg($errors, 'hotel_star'); ?>


                            </div>
                            
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick hotel_types" name="hotel_type[]" multiple="">

                                        <?php if(!empty($hotel_types)): ?>

                                        <?php $__currentLoopData = $hotel_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($hotel_type->id); ?>"  <?php echo e(get_edit_select_check_pvr_old_value_with_obj_serlizie('hotel_type', $hotel, 'hotel_type', $hotel_type->id , 'select')); ?>><?php echo e($hotel_type->hotel_type); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>                                      

                                    </select>

                                    <label class="form-label">Hotel Type</label>

                                </div>

                                <?php echo get_form_error_msg($errors, 'hotel_type'); ?>


                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick hotel_amenities" name="hotel_amenities[]" multiple="" data-live-search="true">

                                        <?php if(!empty($amenities)): ?>

                                        <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($amenity->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj_serlizie('hotel_amenities', $hotel, 'hotel_amenities', $amenity->id , 'select')); ?>><?php echo e($amenity->hotel_amenities); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>                               

                                    </select>                                   

                                    <label class="form-label">Hotel Amenities</label>

                                </div>

                                <?php echo get_form_error_msg($errors, 'hotel_amenities'); ?>


                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick hotel_feataure" name="hotel_features[]" multiple="">

                                        <?php if(!empty($features)): ?>

                                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($feature->id); ?>" <?php echo e(get_edit_select_check_pvr_old_value_with_obj_serlizie('hotel_features', $hotel, 'hotel_features', $feature->id , 'select')); ?>><?php echo e($feature->hotel_feature); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>                               

                                    </select>

                                    <label class="form-label">Hotel Feature</label>

                                </div>

                                <?php echo get_form_error_msg($errors, 'hotel_feature'); ?>


                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="tourist_tax" value="<?php echo get_edit_input_pvr_old_value_with_obj('tourist_tax',$hotel,'tourist_tax'); ?>">

                                    <?php echo get_form_error_msg($errors, 'tourist_tax'); ?>


                                    <label class="form-label">Tourist Tax</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="place_payment_tax" value="<?php echo get_edit_input_pvr_old_value_with_obj('place_payment_tax',$hotel,'place_payment_tax'); ?>">

                                    <?php echo get_form_error_msg($errors, 'place_payment_tax'); ?>


                                    <label class="form-label">Place of payment of taxes</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_vac_apartment" value="<?php echo get_edit_input_pvr_old_value_with_obj('hotel_vac_apartment',$hotel,'hotel_vac_apartment'); ?>">

                                    <?php echo get_form_error_msg($errors, 'hotel_vac_apartment'); ?>


                                    <label class="form-label">Hotel / Vacation Apartments</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Enter Discription</label>

                                    <br><br>

                                    <textarea class="ckeditor" name="hotel_desc"><?php echo get_edit_input_pvr_old_value_with_obj('hotel_desc',$hotel,'hotel_desc'); ?></textarea>

                                    <?php echo get_form_error_msg($errors, 'hotel_desc'); ?>


                                </div>

                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Hotel Instruction Text</label>
                                    <br><br>
                                    <textarea name="hotel_instruction_text" rows="5" style="width:100%;margin-top: -20px" ><?php echo get_edit_input_pvr_old_value_with_obj('hotel_instruction_text',$hotel,'hotel_instruction_text'); ?></textarea>
                                    <?php echo get_form_error_msg($errors, 'hotel_instruction_text'); ?>

                                </div>
                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Additional Comments</label>

                                    <br><br>

                                    <textarea class="ckeditor" name="additional_comment"><?php echo get_edit_input_pvr_old_value_with_obj('additional_comment',$hotel,'additional_comment'); ?></textarea>

                                    <?php echo get_form_error_msg($errors, 'additional_comment'); ?>


                                </div>

                            </div>                           

                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">

                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save

                            </button>

                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 
                             m-r-10 m-l-10 go_to_next_page_btn">Save & Add Gallery

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

    <script src="<?php echo e($assets_admin); ?>/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 

    <script type="text/javascript">

         $('.hotel_amenities').selectpicker({

           actionsBox:true,

           liveSearchPlaceholder:'Search Hotel Amenities here',

           noneSelectedText:'Please Select Hotel Amenities',

           title:'Hotel Amenities',

           dropdownAlignRight:true,

           virtualScroll:300,

           dropupAuto:false,           

           liveSearchNormalize:"true",

        });

          $('.hotel_feataure').selectpicker({

           actionsBox:true,

           liveSearchPlaceholder:'Search Hotel features here',

           noneSelectedText:'Please Select Hotel features',

           title:'Hotel Features',

           liveSearch:"true",

           virtualScroll:300,

           dropupAuto:false,

           noneResultsText: 'Hotel feature not found'

        });

        $('.hotel_types').selectpicker({

           actionsBox:true,

           liveSearchPlaceholder:'Search Hotel types here',

           noneSelectedText:'Please Select Hotel types',

           title:'Hotel types',

           liveSearch:"true",

           virtualScroll:300,

           dropupAuto:false,

           noneResultsText: 'Hotel types not found'

        });

        $('.hotel_location').selectpicker({

           actionsBox:true,

           liveSearchPlaceholder:'Search Hotel location here',

           noneSelectedText:'Please Select Hotel location',

           title:'Hotel location',

           liveSearch:"true",

           virtualScroll:300,

           dropupAuto:false,

           noneResultsText: 'Hotel location not found'

        });         

        $("#add_tag").validate({

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

        $('.save_form_btn').click(function(event) {
            $('#go_to_next_page').val(0);
        });
        $('.go_to_next_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });

    </script>

<?php $__env->stopSection(); ?>








<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/hotel/add_hotel.blade.php ENDPATH**/ ?>