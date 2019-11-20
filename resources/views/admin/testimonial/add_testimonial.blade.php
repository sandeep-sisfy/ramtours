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
   if(empty($testimonial))
    $testimonial='';
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
                        <form action="{{url('admin/testimonial')}}@yield('edit_testimonial_id')" id="add_testimonial" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title" value="{!! get_edit_input_pvr_old_value_with_obj('title',$testimonial,'title')!!}">
                                    {!! get_form_error_msg($errors, 'title') !!}
                                    <label class="form-label">Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="first_name" value="{!! get_edit_input_pvr_old_value_with_obj('first_name',$testimonial,'first_name')!!}">
                                    {!! get_form_error_msg($errors, 'first_name') !!}
                                    <label class="form-label">First Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="last_name" value="{!! get_edit_input_pvr_old_value_with_obj('last_name',$testimonial,'last_name')!!}">
                                    {!! get_form_error_msg($errors, 'last_name') !!}
                                    <label class="form-label">Last Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="{!! get_edit_input_pvr_old_value_with_obj('email',$testimonial,'email')!!}">
                                    {!! get_form_error_msg($errors, 'email') !!}
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Remark</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="remark">{!! get_edit_input_pvr_old_value_with_obj('remark',$testimonial,'remark')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'remark') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control testimonial_date  change_title_class" name="testimonial_date" value="{!! get_edit_input_pvr_old_value_with_obj('testimonial_date',$testimonial,'testimonial_date')!!}">
                                    {!! get_form_error_msg($errors, 'testimonial_date') !!}
                                    <label class="form-label">Testimonial Time</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="profit">Testimonial Status : </label>
                                <input type="radio" name="status" id="show" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('status',$testimonial,'status',1, 'chacked')!!}>
                                <label for="show" class="m-l-10 m-r-10">show</label>
                                <input type="radio" name="status" checked="true" id="hide" class="with-gap radio-col-amber" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('status',$testimonial,'status',0, 'chacked')!!}>
                                <label for="hide" class="m-l-10 m-r-10">hide</label>
                                {!! get_form_error_msg($errors, 'status') !!}
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
    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>
    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->     
    <script src="{{ $assets_admin }}/plugins/momentjs/moment.js"></script>
    <script src="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript">
        $('.testimonial_date').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            time: true
        });
        $("#add_testimonial").validate({
            rules:{
                first_name:{
                    required: true,
                    maxlength: 100,
                },
                last_name:{
                    required: true,
                }
            },
            messages:{
                first_name:{
                    required: "Please enter first Name here.",
                },
                last_name:{
                    required:"Please enter last number here.",
                }      
            }
        });
    </script>
@endsection



