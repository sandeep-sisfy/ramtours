@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($flight)){
   	$flight='';
    $selected_src='';
    $selected_des='';
   }else{
    $selected_src=$flight->flight_source;
    $selected_des=$flight->flight_desti;
   }
    
   @endphp
 {!!show_flash_msg()!!}
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{url('admin/flight')}}@yield('edit_flight_id')" id="add_flight" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control update_title" name="flight_title" value="{!! get_edit_input_pvr_old_value_with_obj('flight_title',$flight,'flight_title')!!}">
                                    {!! get_form_error_msg($errors, 'flight_title') !!}
                                    <label class="form-label">Flight Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick change_title_class" name="flight_airline" data-live-search="true">
                                        <option value="">Select Airline</option>
                                        @foreach($airlines as $airline)
                                        <option value="{{$airline->id}}" {{get_edit_select_check_pvr_old_value_with_obj('flight_airline', $flight, 'flight_airline', $airline->id , 'select', $selected_airlines)}}>{{$airline->airl_title}}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label">Airline</label>
                                </div>
                                {!! get_form_error_msg($errors, 'flight_airline') !!}
                            </div>                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick change_title_class" name="flight_source" id="flight_source" data-live-search="true">
                                         <option value="">Select Location</option>
                                         @foreach($locations as $location)
                                            <option value="{{$location->id}}" {{get_edit_select_check_pvr_old_value_with_obj('flight_source', $flight, 'flight_source', $location->id, 'select')}} >{{$location->loc_name}}</option>
                                            {!! get_loctions_child_option($location->id,$selected_src, 'flight_source' ) !!}
                                         @endforeach
                                    </select>
                                    <label class="form-label">Source</label>
                                </div>

                                {!! get_form_error_msg($errors, 'flight_source') !!}

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control change_title_class" name="airport_name" value="{!! get_edit_input_pvr_old_value_with_obj('airport_name',$flight,'airport_name')!!}">
                                    {!! get_form_error_msg($errors, 'airport_name') !!}
                                    <label class="form-label">Airport Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick change_title_class" name="flight_desti" id="flight_desti" data-live-search="true">
                                        <option value="">Select Location</option>
                                         @foreach($locations as $location)
                                            <option value="{{$location->id}}" {{get_edit_select_check_pvr_old_value_with_obj('flight_desti', $flight, 'flight_desti', $location->id, 'select')}} >{{$location->loc_name}}</option>
                                            {!! get_loctions_child_option($location->id, $selected_des, 'flight_desti') !!}
                                         @endforeach
                                    </select>
                                    <label class="form-label">Destination</label>
                                </div>
                                {!! get_form_error_msg($errors, 'flight_desti') !!}
                            </div>                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control change_title_class" name="flight_number" value="{!! get_edit_input_pvr_old_value_with_obj('flight_number',$flight,'flight_number')!!}">
                                    {!! get_form_error_msg($errors, 'flight_number') !!}
                                    <label class="form-label">Flight Number</label>
                                </div>
                            </div>
                            {{-- <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="flight_adv_res" value="{!! get_edit_input_pvr_old_value_with_obj('flight_adv_res',$flight,'flight_adv_res')!!}">
                                    {!! get_form_error_msg($errors, 'flight_adv_res') !!}
                                    <label class="form-label">Reservation</label>
                                </div>
                                <p class="font col-orange">days before early booking on this flight.</p>
                            </div> --}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="flight_type" value="">
                                        <option value="">Select One</option>
                                        <option value="1" {{ get_edit_select_check_pvr_old_value_with_obj('flight_type', $flight,'flight_type', '1', 'select')}}>Regular</option>
                                        <option value="2" {{ get_edit_select_check_pvr_old_value_with_obj('flight_type', $flight, 'flight_type', '2', 'select')}}>Charted</option>
                                    </select>
                                    <label class="form-label">Flight Type</label>
                                </div>
                                {!! get_form_error_msg($errors, 'flight_type') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Flight Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="flight_disc">{!! get_edit_input_pvr_old_value_with_obj('flight_disc',$flight,'flight_disc')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'flight_disc') !!}
                                </div>
                            </div>

                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="1">
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 go_to_ext_page_btn m-r-10 m-l-10">Save & Add Flight Schedule
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
        $('.go_to_ext_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });
//dynamic title flight//
        /*var name_array  = new Array('flight_airline','flight_number', 'flight_source', 'flight_desti');
        $('#add_flight').on('change', '.change_title_class', function(event) {
            event.preventDefault();
            var title = '.update_title';
            var make_title='';
            $.each(name_array,  function(index, el) {
                var cur_val=$('.change_title_class[name='+el+']').val();
               if((cur_val == "")||(typeof cur_val=='undefined')){
                cur_val=0;
               }
                if(index==0){
                     if($('.change_title_class[name='+el+']').is("select")) {
                        make_title+=$('.change_title_class[name='+el+'] option[value='+cur_val+']').text();
                      }else{
                        make_title+=$('.change_title_class[name='+el+']').val();
                      }
                }else{
                    if($('.change_title_class[name='+el+']').is("select")) {
                         make_title+='-'+$('.change_title_class[name='+el+'] option[value='+cur_val+']').text();
                      }else{
                        make_title+='-'+$('.change_title_class[name='+el+']').val();
                      }
                }

            });
            make_title=make_title.replace("--", "");
            $(title).val(make_title);

        });*/
    </script>
@endsection







