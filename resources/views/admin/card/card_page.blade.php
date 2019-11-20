@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($card))
    $card='';
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
                                <li class="nav-item"><a class="nav-link"  onclick="window.location.href='{{url('admin/card/'.$card->id.'/edit')}}'" data-toggle="tab">Card  Info</a></li>
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:void(0)">Card Page</a></li>
                            @show
                        </ul>
                        <form action="{{url('admin/card/'.$card->id.'/page')}}" id="add_card" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="page_title" value="{!! get_edit_input_pvr_old_value_with_obj('page_title',$card, 'page_title')!!}">
                                    {!! get_form_error_msg($errors, 'page_title') !!}
                                    <label class="form-label">Page Title</label>
                                </div>
                            </div>                       
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Page Html</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="page_html">{!! get_edit_input_pvr_old_value_with_obj('page_html',$card,'page_html')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'page_html') !!}
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
    <script type="text/javascript">
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
    </script>
        
@endsection