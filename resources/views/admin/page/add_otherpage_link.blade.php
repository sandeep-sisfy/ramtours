@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($pagelink))
    $pagelink='';
@endphp
 {!!show_flash_msg()!!}
 
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{url('admin/pagelink/'.$page_id)}}@yield('edit_pagelink_id')" id="add_page" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pagelink_title" value="{!! get_edit_input_pvr_old_value_with_obj('pagelink_title',$pagelink, 'pagelink_title')!!}">
                                    {!! get_form_error_msg($errors, 'pagelink_title') !!}
                                    <label class="form-label">Page Title</label>
                                </div>
                            </div>                       
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pagelink_url" value="{!! get_edit_input_pvr_old_value_with_obj('pagelink_url',$pagelink, 'pagelink_url')!!}">
                                    {!! get_form_error_msg($errors, 'pagelink_url') !!}
                                    <label class="form-label">URL</label>
                                </div>
                            </div>                          
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
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
@endsection