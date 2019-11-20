@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($car)){
    $car='';
    $selected='';
    }else{
    $selected=$car->location;
    }
@endphp
 {!!show_flash_msg()!!}
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            @section('nav-tabs')
                                <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">car Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">car Price</a></li>
                            @show
                        </ul>
                        <form action="{{url('admin/car')}}@yield('edit_car_id')" id="add_car" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_title" value="{!! get_edit_input_pvr_old_value_with_obj('car_title',$car, 'car_title')!!}">
                                    {!! get_form_error_msg($errors, 'car_title') !!}
                                    <label class="form-label">Car Title</label>
                                </div>
                            </div>                       
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Car Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="car_desc">{!! get_edit_input_pvr_old_value_with_obj('car_desc',$car,'car_desc')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'car_desc') !!}
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick car_supliers" name="car_suplier" data-header="Select a car suplier">
                                        @foreach($car_supliers as $car_suplier)
                                        <option value="{{$car_suplier->id}}" {{ get_edit_select_check_pvr_old_value_with_obj('car_suplier', $car, 'car_suplier', $car_suplier->id , 'select', $car_suplier_selected)}}>{{$car_suplier->car_suplier_name}}</option>
                                        @endforeach                                      
                                    </select>
                                    <label class="form-label">Car Suplier</label>
                                </div>
                                {!! get_form_error_msg($errors, 'car_suplier') !!}
                            </div> 
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick car_location" name="location"  data-header="Select a Location">
                                         @foreach($main_locations as $location)
                                            <option value="{{$location->id}}" {{get_edit_select_check_pvr_old_value_with_obj('location', $car, 'location', $location->id, 'select')}} >{{$location->loc_name}}</option>
                                            {!! get_loctions_child_option($location->id, $selected, 'location') !!}
                                         @endforeach 
                                    </select>
                                    <label class="form-label">Location</label>
                                </div>
                                {!! get_form_error_msg($errors, 'location') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control car_feataure" name="car_features[]"  multiple="true" data-header="Select a Car features">
                                         @foreach($car_features as $feature)
                                            <option value="{{$feature->id}}" {{get_edit_select_check_pvr_old_value_with_obj_serlizie('car_features', $car, 'car_features', $feature->id, 'select')}} >{{$feature->car_feature}}</option>
                                         @endforeach 
                                    </select>
                                    <label class="form-label">Car Features</label>
                                </div>
                                {!! get_form_error_msg($errors, 'car_features') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick max_people" name="max_people"  data-header="Select a Max Peoples" required="true">
                                        @for($i=1;$i<=9;$i++)
                                            <option value="{{ $i }}" {{get_edit_select_check_pvr_old_value_with_obj('max_people', $car, 'max_people', $i, 'select')}} >{{$i}} People </option>
                                        @endfor
                                    </select>
                                    <label class="form-label">Max Peopele</label>
                                </div>
                                {!! get_form_error_msg($errors, 'max_people') !!}
                            </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="car_profit" value="{!! get_edit_input_pvr_old_value_with_obj('car_profit',$car, 'car_profit')!!}">
                                        {!! get_form_error_msg($errors, 'car_profit') !!}
                                        <label class="form-label">Car Profit per day</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick profit_currency" name="profit_currency">
                                        <option value="1" {{get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 1, 'select')}} >USD</option>
                                        <option value="2" {{get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 2, 'select')}} >Euro </option>
                                        <option value="3" {{get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 3, 'select')}} >Swiss Franc</option>
                                        <option value="4" {{get_edit_select_check_pvr_old_value_with_obj('Profit_currency', $car, 'Profit_currency', 4, 'select')}}>Shekel</option>
                                    </select>
                                    <label class="form-label">Profit Currency</label>
                                </div>
                                {!! get_form_error_msg($errors, 'profit_currency') !!}
                            </div>                               
                            {{-- <div class="form-group form-float">
                                <label class="status">Satus : </label>
                                <input type="radio" name="status" id="active" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('status',$car,
                                'status',1, 'status')!!}>
                                <label for="active" class="m-l-10 m-r-10">Active</label>
                                <input type="radio" name="status" id="deactive" class="with-gap radio-col-amber" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('status',$car,'status',0, 'chacked')!!}>
                                <label for="deactive" class="m-l-10 m-r-10">Deactive</label>
                                {!! get_form_error_msg($errors, 'status') !!}
                            </div>
                            <div class="form-group form-float">
                                <label class="show_on_front">Show on Front : </label>
                                <input type="radio" name="show_on_front" id="yes" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('show_on_front',$car,'show_on_front',1, 'chacked')!!}>
                                <label for="yes" class="m-l-10 m-r-10">Yes</label>
                                <input type="radio" name="show_on_front" id="no" class="with-gap radio-col-amber" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('show_on_front',$car,'show_on_front',0, 'chacked')!!}>
                                <label for="no" class="m-l-10 m-r-10">No</label>
                                {!! get_form_error_msg($errors, 'show_on_front') !!}
                            </div>   --}}
                            @yield('car_img')
                            <div class="form-group">
                                <label for="upload">Upload Image Here : </label>
                                <input type="file" name="car_img" class="form-control list_file" accept="image/*" />
                                {!! get_form_error_msg($errors, 'car_img') !!}
                            </div>                 
                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 go_to_ext_page_btn m-r-10 m-l-10">Save & Add Car price
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
         $('.car_feataure').selectpicker({
           actionsBox:true,
           liveSearchPlaceholder:'Search Car features here',
           noneSelectedText:'Please Select Car features',
           title:'Car Features',
           liveSearch:"true",
           noneResultsText: 'Car feature not found'
        });
        $('.car_location').selectpicker({
           liveSearchPlaceholder:'Search location here',
           noneSelectedText:'Please Select location',
           title:'Car location',
           liveSearch:"true",
           noneResultsText: 'location not found'
        });
        $('.car_supliers').selectpicker({
           liveSearchPlaceholder:'Search car supliers here',
           noneSelectedText:'Please Select car supliers',
           title:'Car supliers',
           liveSearch:"true",
           noneResultsText: 'car supliers not found'
        });
        $('.max_people').selectpicker({
           liveSearchPlaceholder:'Search max people',
           noneSelectedText:'Please Select max people',
           title:'max people',
           noneResultsText: 'max people not found'
        });
        $("#add_car").validate({
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
                    maxlength:"Sub Category Name contain only 100 Charecters .",
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
        @if($profit_currency==0)
            $('.profit_currency').val(4);
        @else
            $('.profit_currency').val({{$profit_currency}});
        @endif
    </script>
        
@endsection