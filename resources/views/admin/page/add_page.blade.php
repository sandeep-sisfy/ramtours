@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($page))
    $page='';
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
                                <li class="nav-item"><a class="nav-link"  href="javascript:void(0)" data-toggle="tab">Page Info</a></li>
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:void(0)">Meta data</a></li>
                            @show
                        </ul>
                        
                        <form action="{{url('admin/page')}}@yield('edit_page_id')" id="add_page" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="page_title" value="{!! get_edit_input_pvr_old_value_with_obj('page_title',$page, 'page_title')!!}">
                                    {!! get_form_error_msg($errors, 'page_title') !!}
                                    <label class="form-label">Page Title</label>
                                </div>
                            </div>                       
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Page Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor1" name="page_disc">{!! get_edit_input_pvr_old_value_with_obj('page_disc',$page,'page_disc')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'page_disc') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="menu_title" value="{!! get_edit_input_pvr_old_value_with_obj('menu_title',$page, 'menu_title')!!}">
                                    {!! get_form_error_msg($errors, 'menu_title') !!}
                                    <label class="form-label">Menu Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="sequence" value="{!! get_edit_input_pvr_old_value_with_obj('sequence',$page, 'sequence')!!}">
                                    {!! get_form_error_msg($errors, 'sequence') !!}
                                    <label class="form-label">Sequence</label>
                                </div>
                            </div>
                            @yield('page_img')
                            <div class="form-group">
                                <label for="upload">Upload Page Image Here : </label>
                                <input type="file" name="page_img" class="form-control list_file" accept="image/*" />
                                {!! get_form_error_msg($errors, 'page_img') !!}
                            </div>
                            @yield('page_other_link')
                            <div class="form-group form-float">
                                <label class="status">Show in Header Menu: </label>
                                <input type="radio" name="show_in_header_menu" id="yes_header" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('show_in_header_menu',$page,
                                'show_in_header_menu',1, 'show_in_header_menu')!!}>
                                <label for="yes_header" class="m-l-10 m-r-10">Yes</label>
                                <input type="radio" name="show_in_header_menu" id="no_footer" class="with-gap radio-col-amber" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('show_in_header_menu',$page,'show_in_header_menu',0, 'chacked')!!}>
                                <label for="no_footer" class="m-l-10 m-r-10">No</label>
                                {!! get_form_error_msg($errors, 'show_in_header_menu') !!}
                            </div>
                            <div class="form-group form-float">
                                <label class="status">Show in Footer Menu: </label>
                                <input type="radio" name="show_in_footer_menu" id="yes" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('show_in_footer_menu',$page,
                                'show_in_footer_menu',1, 'show_in_footer_menu')!!}>
                                <label for="yes" class="m-l-10 m-r-10">Yes</label>
                                <input type="radio" name="show_in_footer_menu" id="no" class="with-gap radio-col-amber" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('show_in_footer_menu',$page,'show_in_footer_menu',0, 'chacked')!!}>
                                <label for="no" class="m-l-10 m-r-10">No</label>
                                {!! get_form_error_msg($errors, 'show_in_footer_menu') !!}
                            </div>
                                                       
                            <div class="form-group form-float">
                                <label class="status">Status : </label>
                                <input type="radio" name="page_status" id="active" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('page_status',$page,
                                'page_status',1, 'page_status')!!}>
                                <label for="active" class="m-l-10 m-r-10">Active</label>
                                <input type="radio" name="page_status" id="deactive" class="with-gap radio-col-amber" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('page_status',$page,'page_status',0, 'chacked')!!}>
                                <label for="deactive" class="m-l-10 m-r-10">Deactive</label>
                                {!! get_form_error_msg($errors, 'page_status') !!}
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 
                             m-r-10 m-l-10 go_to_next_page_btn">Save & Add Meta
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
        // CKEDITOR.replace('content',{
        //     Class:'ckeditor1'
        // });
        
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.contentsLangDirection = 'rtl';
        CKEDITOR.config.height = 600;
        CKEDITOR.config.contentsLanguage = 'hr';
        CKEDITOR.replaceClass='ckeditor1';
        
        $('.save_form_btn').click(function(event) {
            $('#go_to_next_page').val(0);
        });
        $('.go_to_next_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });
    </script> 
              
@endsection