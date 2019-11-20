@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php 
    if(empty($airline))
    $airline='';
@endphp
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
             {!!show_flash_msg()!!}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">                        
                        <form action="{{url('admin/airline')}}@yield('edit_airline_id')" id="add_airl_suplier" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="airl_title" value="{!! get_edit_input_pvr_old_value_with_obj('airl_title',$airline,'airl_title')!!}">

                                    {!! get_form_error_msg($errors, 'airl_title') !!}
                                    
                                    <label class="form-label">Airline Name</label>
                                </div>
                            </div>                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="airl_cont_1" value="{!! get_edit_input_pvr_old_value_with_obj('airl_cont_1',$airline,'airl_cont_1')!!}">
                                    {!! get_form_error_msg($errors, 'airl_cont_1') !!}
                                    <label class="form-label">Contact Number 1</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="airl_cont_2" value="{!! get_edit_input_pvr_old_value_with_obj('airl_cont_2',$airline,'airl_cont_2')!!}">
                                    {!! get_form_error_msg($errors, 'airl_cont_2') !!}
                                    <label class="form-label">Contact Number 2</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="airl_email" value="{!! get_edit_input_pvr_old_value_with_obj('airl_email',$airline,'airl_email')!!}">
                                    {!! get_form_error_msg($errors, 'airl_email') !!}
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Airline Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="airl_disc">{!! get_edit_input_pvr_old_value_with_obj('airl_disc',$airline,'airl_disc')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'airl_disc') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="airl_name_eng" value="{!! get_edit_input_pvr_old_value_with_obj('airl_name_eng',$airline,'airl_name_eng')!!}">
                                    {!! get_form_error_msg($errors, 'airl_name_eng') !!}
                                    <label class="form-label">Airline Name In English</label>
                                </div>
                                <p class="font col-orange">For website use please enter name in english.</p>
                            </div>
                            @yield('airl_logo_img')
                            <div class="form-group">
                                <label for="upload">Upload Image Here : </label>
                                <input type="file" name="airl_logo_img" class="form-control list_file" accept="image/*" />
                                {!! get_form_error_msg($errors, 'airl_logo_img') !!}
                            </div>
                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 go_to_ext_page_btn m-r-10 m-l-10">Save & Add Flight
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
       
    </script>
@endsection



