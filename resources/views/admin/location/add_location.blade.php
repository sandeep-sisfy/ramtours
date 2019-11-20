@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css"/>
@endsection
@php 
    if(empty($location))
    $location='';
@endphp
@section('admin_container')
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        @section('nav-tabs')
                        @show
                        {!!show_flash_msg()!!}
                        <form action="{{url('/admin/location')}}@yield('location_id')" method="POST" accept-charset="utf-8" id="add_cat" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="loc_name" value="{!! get_edit_input_pvr_old_value_with_obj('loc_name', $location , 'loc_name')!!}">
                                    {!! get_form_error_msg($errors, 'loc_name') !!}
                                    <label class="form-label">Location Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="loc_short_code" value="{!! get_edit_input_pvr_old_value_with_obj('loc_short_code', $location , 'loc_short_code')!!}">
                                    {!! get_form_error_msg($errors, 'loc_short_code') !!}
                                    <label class="form-label">Location Short Code</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Enter Location Discription</label>
                                    <br><br>
                                    <textarea class=""  id="location_des" name="loc_des">{!! get_edit_input_pvr_old_value_with_obj('loc_des', $location , 'loc_des')!!}</textarea>

                                    {!! get_form_error_msg($errors, 'loc_des') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <input type="checkbox" id="sub_location" name="sub_location" class="filled-in chk-col-amber"  value="1" {!!get_edit_select_check_pvr_old_value('sub_location', '', '1', 'check')!!} @yield('main_locaton_check')/>
                                <label for="sub_location">Is Sub location</label>
                            </div>
                            <div class="form-group form-float main_location_list hide_elememt">
                                <div class="form-line add_select">
                                    <select class="form-control show-tick" name="main_location" data-live-search="true">
                                        <option value="">Please select Main location</option>
                                        @foreach($main_locations as $main_location)
                                            <option value="{{ $main_location->id }}" {!!get_edit_select_check_pvr_old_value_with_obj('main_location', $location, 'loc_par', $main_location->id , 'select')!!}>{{ $main_location->loc_name }}</option>
                                            {!!get_loctions_child_option($main_location->id,1,  $loc_par)!!}
                                        @endforeach
                                    </select>
                                    <label class="form-label">Main location</label>
                                </div>
                                {!! get_form_error_msg($errors, 'main_location') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lat" value="{!! get_edit_input_pvr_old_value_with_obj('lat', $location , 'loc_lat')!!}">
                                    {!! get_form_error_msg($errors, 'lat') !!}
                                    <label class="form-label">Location latitude</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lng" value="{!! get_edit_input_pvr_old_value_with_obj('lng', $location , 'loc_lng')!!}">
                                    {!! get_form_error_msg($errors, 'lng') !!}
                                    <label class="form-label">Location longitude</label>
                                </div>
                            </div>
                            @yield('location_image')
                            <div class="form-group">
                                <label for="upload">Location Map Images Here : </label>
                                <input name="location_map" type="file" class="form-control list_file" accept="image/*" />
                                {!! get_form_error_msg($errors, 'location_map') !!}
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">save
                            </button>
                        </form>

                    </div>

                </div>               

            </div>            

        </div>

@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script type="text/javascript">
       CKEDITOR.replace('location_des', {
        language: '{{get_rami_setting('backend_lang')}}'
        });
       $('#sub_location').change(function(event) {
            if($(this).prop("checked") == true){
                $('.main_location_list').slideDown('slow');
            }else{
               $('.main_location_list').slideUp('slow'); 
            }
       });

        if($('#sub_location').prop("checked") == true){
                $('.main_location_list').slideDown('slow');
            }else{
               $('.main_location_list').slideUp('slow'); 
        }
        $("#add_cat").validate({
            rules: {
                cat_name:{
                    required: true,
                    maxlength: 100,
                },
                cat_disc:{
                    required: true,
                    maxlength:500,
                }
            },
            messages: {
                cat_name: {
                    required: "Please enter Category Name here.",
                    maxlength:"Category Name contain only 100 Charecters ."
                },
                cat_disc:{
                    required:"Please enter Category Discription here.",
                    maxlength:"Category Discription contain only 500 Charecters.",

                }                
            }
        });
    </script>
@endsection

