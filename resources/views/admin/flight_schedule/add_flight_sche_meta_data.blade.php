@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link href="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($package))
    $package='';
@endphp
 {!!show_flash_msg()!!}
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        @section('nav-tabs')
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link"  onclick="window.location.href='{{url('admin/flight-schedule/'.$flight_schedule->id.'/edit')}}'" data-toggle="tab">Flight schedule Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/flight-schedule-alert/'.$flight_schedule->id)}}'">Flight schedule Info</a></li>
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:void(0)">Meta data</a></li>
                            </ul>
                        @show
                        <form action="{{url('admin/flight-schedule-meta/'.$flight_schedule->id)}}" id="add_flight_sche_meta" method="POST" accept-charset="utf-8">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Flight Schedule Slug</label>
                                    <input  class="form-control" type="text" name="slug" value="{!! get_edit_input_pvr_old_value_with_obj('slug',$flight_schedule,'slug')!!}">
                                    {!! get_form_error_msg($errors, 'slug') !!}
                                </div>
                            </div>          
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Flight Schedule Title</label>
                                    <br><br>
                                    <input  class="form-control" type="text" name="flight_sche_title_text" value="{!! get_edit_input_pvr_old_value_with_obj('flight_sche_title_text',$flight_schedule,'flight_sche_title_text')!!}">
                                    {!! get_form_error_msg($errors, 'flight_sche_title_text') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Flight Schedule Header code</label>
                                    <br><br>
                                    <textarea name="flight_sche_header_custom_code" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('flight_sche_header_custom_code',$flight_schedule,'flight_sche_header_custom_code')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'flight_sche_header_custom_code') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Flight Schedule Footer Custom Code</label>
                                    <br><br>
                                    <textarea name="flight_sche_footer_custom_code" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('flight_sche_footer_custom_code',$flight_schedule,'flight_sche_footer_custom_code')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'flight_sche_footer_custom_code') !!}
                                </div>
                            </div>                   
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Save
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
@endsection