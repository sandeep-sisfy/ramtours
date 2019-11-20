@extends('admin.main')

@section('admin_head_css')

@parent

    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />

    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css.map" />

@endsection

@section('title',$page_title)

@section('title_breadcrumb',$page_title)

@section('admin_container')

@php

   if(empty($hotel)){
       $selected='';
       $hotel='';
    }else{
        $selected=$hotel->hotel_location;
    }
    if(empty($hotel_type))
        $hotel_type='';

@endphp

{{-- empty check for edit purpose and helper use--}}

        <div class="container-fluid">

             {!!show_flash_msg()!!}

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="body">

                        <ul class="nav nav-tabs">

                            @section('nav-tabs')

                            <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">Hotel Info</a></li>

                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Gellery</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Meta data</a></li>
                            @show
                        </ul>
                        <form action="{{url('admin/hotel')}}@yield('edit_hotel_id')" id="add_hotel" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="hotel_name" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_name',$hotel,'hotel_name')!!}">
                                    {!! get_form_error_msg($errors, 'hotel_name') !!}
                                    <label class="form-label">Hotel Name</label>
                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_display_name" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_display_name',$hotel,'hotel_display_name')!!}">

                                    {!! get_form_error_msg($errors, 'hotel_display_name') !!}

                                    <label class="form-label">Hotel Display Name</label>

                                </div>

                            </div>
                           {{--  @yield('hotel_code') --}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="hotel_code" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_code',$hotel,'hotel_code')!!}">
                                    {!! get_form_error_msg($errors, 'hotel_code') !!}
                                    <label class="form-label">Hotel Code</label>
                                </div>
                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_address" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_address',$hotel,'hotel_address')!!}">

                                    {!! get_form_error_msg($errors, 'hotel_address') !!}

                                    <label class="form-label">Hotel Address</label>

                                </div>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick hotel_location" name="hotel_location">
                                        @foreach($main_locations as $location)
                                            <option value="{{$location->id}}" {{get_edit_select_check_pvr_old_value_with_obj('hotel_location', $hotel, 'hotel_location', $location->id, 'select')}} >{{$location->loc_name}}</option>
                                            {!! get_loctions_child_option($location->id, $selected, 'hotel_location') !!}
                                         @endforeach   
                                         <option value="">Select Location</option>            
                                    </select>
                                    <label class="form-label">Hotel Location</label>
                                </div>
                                {!! get_form_error_msg($errors, 'hotel_location') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick hotel_card" name="hotel_card">
                                        <option value="0">Select card</option> 
                                        @foreach($cards as $card)
                                            <option value="{{$card->id}}" {{get_edit_select_check_pvr_old_value_with_obj('hotel_card', $hotel, 'hotel_card', $card->id, 'select')}} >{{$card->card_title}}</option>
                                         @endforeach          
                                    </select>
                                    <label class="form-label">Hotel Card</label>
                                </div>
                                {!! get_form_error_msg($errors, 'hotel_card') !!}
                            </div>
                            <div class="form-group form-float">
                                <label class="hotel_include_local_tax">Include Local Taxes : </label>
                                <input type="radio" name="hotel_include_local_tax" id="local_yes" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('hotel_include_local_tax',$hotel,'hotel_include_local_tax',1, 'chacked')!!}>
                                <label for="local_yes" class="m-l-10 m-r-10">Yes</label>

                                <input type="radio" name="hotel_include_local_tax" id="local_no" class="with-gap radio-col-amber" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('hotel_include_local_tax',$hotel,'hotel_include_local_tax',0, 'chacked')!!}>
                                <label for="local_no" class="m-l-10 m-r-10">No</label>
                                {!! get_form_error_msg($errors, 'hotel_include_local_tax') !!}
                            </div>  
                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="infant_price" value="{!! get_edit_input_pvr_old_value_with_obj('infant_price',$hotel, 'infant_price')!!}">
                                        {!! get_form_error_msg($errors, 'infant_price') !!}
                                        <label class="form-label">Infant price</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick infant_price_currency" name="infant_price_currency">
                                        <option value="1" {{get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 1, 'select')}} >USD</option>
                                        <option value="2" {{get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 2, 'select')}} >Euro </option>
                                        <option value="3" {{get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 3, 'select')}} >Swiss Franc</option>
                                        <option value="4" {{get_edit_select_check_pvr_old_value_with_obj('infant_price_currency', $hotel, 'infant_price_currency', 4, 'select')}}>Shekel</option>
                                    </select>
                                    <label class="form-label">Room Infant price Currency</label>
                                </div>
                                {!! get_form_error_msg($errors, 'infant_price_currency') !!}
                            </div>  
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_contact" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_contact',$hotel,'hotel_contact')!!}">

                                    {!! get_form_error_msg($errors, 'hotel_contact') !!}

                                    <label class="form-label">Contact Number</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_email" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_email',$hotel,'hotel_email')!!}">

                                    {!! get_form_error_msg($errors, 'hotel_email') !!}

                                    <label class="form-label">Hotel Email</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_website" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_website',$hotel,'hotel_website')!!}">

                                    {!! get_form_error_msg($errors, 'hotel_website') !!}

                                    <label class="form-label">Hotel Website</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick " name="hotel_star" value="">

                                        <option value="">Select One</option>

                                        <option value="1" {{ get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel,'hotel_star', '1', 'select')}}>1</option>
                                        <option value="2" {{ get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '2', 'select')}}>2</option>
                                        <option value="3" {{ get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '3', 'select')}}>3</option>
                                        <option value="4"{{ get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '4', 'select')}}>4</option>
                                        <option value="5"{{ get_edit_select_check_pvr_old_value_with_obj('hotel_star', $hotel, 'hotel_star', '5', 'select')}}>5</option>
                                    </select>

                                    <label class="form-label">No. of Star Rating</label>

                                </div>

                                {!! get_form_error_msg($errors, 'hotel_star') !!}

                            </div>
                            
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick hotel_types" name="hotel_type[]" multiple="">

                                        @if(!empty($hotel_types))

                                        @foreach($hotel_types as $hotel_type)

                                        <option value="{{$hotel_type->id}}"  {{get_edit_select_check_pvr_old_value_with_obj_serlizie('hotel_type', $hotel, 'hotel_type', $hotel_type->id , 'select')}}>{{$hotel_type->hotel_type}}</option>

                                        @endforeach

                                        @endif                                      

                                    </select>

                                    <label class="form-label">Hotel Type</label>

                                </div>

                                {!! get_form_error_msg($errors, 'hotel_type') !!}

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick hotel_amenities" name="hotel_amenities[]" multiple="" data-live-search="true">

                                        @if(!empty($amenities))

                                        @foreach($amenities as $amenity)

                                        <option value="{{$amenity->id}}" {{get_edit_select_check_pvr_old_value_with_obj_serlizie('hotel_amenities', $hotel, 'hotel_amenities', $amenity->id , 'select')}}>{{$amenity->hotel_amenities}}</option>

                                        @endforeach

                                        @endif                               

                                    </select>                                   

                                    <label class="form-label">Hotel Amenities</label>

                                </div>

                                {!! get_form_error_msg($errors, 'hotel_amenities') !!}

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick hotel_feataure" name="hotel_features[]" multiple="">

                                        @if(!empty($features))

                                        @foreach($features as $feature)

                                        <option value="{{$feature->id}}" {{get_edit_select_check_pvr_old_value_with_obj_serlizie('hotel_features', $hotel, 'hotel_features', $feature->id , 'select')}}>{{$feature->hotel_feature}}</option>

                                        @endforeach

                                        @endif                               

                                    </select>

                                    <label class="form-label">Hotel Feature</label>

                                </div>

                                {!! get_form_error_msg($errors, 'hotel_feature') !!}

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="tourist_tax" value="{!! get_edit_input_pvr_old_value_with_obj('tourist_tax',$hotel,'tourist_tax')!!}">

                                    {!! get_form_error_msg($errors, 'tourist_tax') !!}

                                    <label class="form-label">Tourist Tax</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="place_payment_tax" value="{!! get_edit_input_pvr_old_value_with_obj('place_payment_tax',$hotel,'place_payment_tax')!!}">

                                    {!! get_form_error_msg($errors, 'place_payment_tax') !!}

                                    <label class="form-label">Place of payment of taxes</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="hotel_vac_apartment" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_vac_apartment',$hotel,'hotel_vac_apartment')!!}">

                                    {!! get_form_error_msg($errors, 'hotel_vac_apartment') !!}

                                    <label class="form-label">Hotel / Vacation Apartments</label>

                                </div>

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Enter Discription</label>

                                    <br><br>

                                    <textarea class="ckeditor" name="hotel_desc">{!! get_edit_input_pvr_old_value_with_obj('hotel_desc',$hotel,'hotel_desc')!!}</textarea>

                                    {!! get_form_error_msg($errors, 'hotel_desc') !!}

                                </div>

                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Hotel Instruction Text</label>
                                    <br><br>
                                    <textarea name="hotel_instruction_text" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('hotel_instruction_text',$hotel,'hotel_instruction_text')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'hotel_instruction_text') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Additional Comments</label>

                                    <br><br>

                                    <textarea class="ckeditor" name="additional_comment">{!! get_edit_input_pvr_old_value_with_obj('additional_comment',$hotel,'additional_comment')!!}</textarea>

                                    {!! get_form_error_msg($errors, 'additional_comment') !!}

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

@endsection

@section('admin_jscript')

@parent

    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>

    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 

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

@endsection







