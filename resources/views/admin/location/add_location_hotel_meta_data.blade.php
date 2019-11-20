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

   if(empty($location))

    $location='';

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

                                <li class="nav-item"><a class="nav-link"  onclick="window.location.href='{{url('admin/location/'.$location->id.'/edit')}}'" data-toggle="tab">Location Info</a></li>

                                <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$location->id.'/package-setting/1')}}'">F+H+C Setting</a></li>

                                <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$location->id.'/package-setting/3')}}'">F+C Setting</a></li>

                                <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$location->id.'/package-setting/4')}}'">Flight Setting</a></li>

                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" onclick="window.location.href='{{url('admin/location/hotelmeta/'.$location->id)}}'">Location Hotel Meta data</a></li>

                                <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/flightmeta/'.$location->id)}}'">Location flight Meta data</a></li>

                                <li class="nav-item"><a class="nav-link " data-toggle="tab" onclick="window.location.href='{{url('admin/location/packagemeta/'.$location->id)}}'">Location package Meta data</a></li>

                            </ul>

                        @show

                        <form action="{{url('admin/location/hotelmeta/'.$location->id)}}" id="add_location_meta" method="POST" accept-charset="utf-8">

                            {{ csrf_field() }}

                            {{ method_field('PUT')}}            

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Location Hotel Slug</label>

                                    <input  class="form-control" type="text" name="loc_hotel_slug" value="{!! get_edit_input_pvr_old_value_with_obj('loc_hotel_slug',$location,'loc_hotel_slug')!!}">

                                    {!! get_form_error_msg($errors, 'loc_hotel_slug') !!}

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Location Hotel Title Text</label>                                   

                                    <input  class="form-control" type="text" name="loc_hotel_title_text" value="{!! get_edit_input_pvr_old_value_with_obj('loc_hotel_title_text',$location,'loc_hotel_title_text')!!}">                                    

                                    {!! get_form_error_msg($errors, 'loc_hotel_title_text') !!}

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">location hotel header custom code</label>

                                    <br><br>

                                    <textarea name="loc_hotel_header_custom_code" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('loc_hotel_header_custom_code',$location,'loc_hotel_header_custom_code')!!}</textarea>

                                    {!! get_form_error_msg($errors, 'loc_hotel_header_custom_code') !!}

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">location hotel footer custom code</label>

                                    <br><br>

                                    <textarea name="loc_hotel_footer_custom_code" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('loc_hotel_footer_custom_code',$location,'loc_hotel_footer_custom_code')!!}</textarea>

                                    {!! get_form_error_msg($errors, 'loc_hotel_footer_custom_code') !!}

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