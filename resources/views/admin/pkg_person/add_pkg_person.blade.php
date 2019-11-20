@extends('admin.main')

@section('admin_head_css')

@parent

    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />

@endsection

@section('title',$page_title)

@section('title_breadcrumb',$page_title)

@section('admin_container')

@php

   if(empty($pkg_person))

    $pkg_person='';

@endphp

 {!!show_flash_msg()!!}

{{-- empty check for edit purpose and helper use--}}

        <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="body">

                        <form action="{{url('admin/package-person')}}@yield('edit_pkg_person_id')" id="add_attraction" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            @section('method_field')

                            @show

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="pkg_title" value="{!! get_edit_input_pvr_old_value_with_obj('pkg_title',$pkg_person,'pkg_title')!!}">

                                    {!! get_form_error_msg($errors, 'pkg_title') !!}

                                    <label class="form-label">Package Title</label>

                                </div>

                            </div>                                       

                            {{-- <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="infants" value="{!! get_edit_input_pvr_old_value_with_obj('infants',$pkg_person, 'infants')!!}">

                                    {!! get_form_error_msg($errors, 'infants') !!}

                                    <label class="form-label">No. of Infants</label>

                                </div>

                            </div> --}}

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="adults" value="{!! get_edit_input_pvr_old_value_with_obj('adults',$pkg_person, 'adults')!!}">

                                    {!! get_form_error_msg($errors, 'adults') !!}

                                    <label class="form-label">No. of Adults</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="childs" value="{!! get_edit_input_pvr_old_value_with_obj('childs',$pkg_person, 'childs')!!}">

                                    {!! get_form_error_msg($errors, 'childs') !!}

                                    <label class="form-label">No. of Childs</label>

                                </div> 
                                <p class="font col-orange">Child age should be less than 16 yrs.</p>                              

                            </div>                           

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Enter Discription</label>

                                    <br><br>

                                    <textarea class="ckeditor" name="pkg_desc">{!! get_edit_input_pvr_old_value_with_obj('pkg_desc',$pkg_person,'pkg_desc')!!}</textarea>

                                    {!! get_form_error_msg($errors, 'pkg_desc') !!}

                                </div>

                            </div>

                            {{-- <div class="form-group form-float">

                                <label class="form-label">Status: </label>

                                <input type="radio" name="pkg_status" id="status_yes" class="with-gap" value="1" {!! get_edit_select_check_pvr_old_value('pkg_status',$pkg_person,'pkg_status',1, 'chacked') !!}>

                                <label for="status_yes">Active</label>

                                <input type="radio" name="pkg_status" id="status_no" class="with-gap" value="0" {!! get_edit_select_check_pvr_old_value('pkg_status',$pkg_person,'pkg_status',0, 'chacked') !!}>

                                <label for="status_no" class="m-l-20">Inactive</label>

                                {!! get_form_error_msg($errors, 'pkg_status') !!}

                            </div> --}}

                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Submit

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

    </script>

@endsection