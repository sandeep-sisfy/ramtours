@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php 
    if(empty($user))
    $user='';
@endphp
<div class="profile-header">
    <div class="profile_info row">
        <div class="col-lg-3 col-md-4 col-12">
            <div class="profile-image float-md-right"> <img src="{{ $assets_admin }}/images/profile_av.jpg" alt=""> </div>
        </div>
        <div class="col-lg-6 col-md-8 col-12">
            <h4 class="m-t-5 m-b-0"><strong>John</strong> Deo</h4>
            <span class="job_post">Ui UX Designer</span>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
        </div>                
    </div>
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{url('/admin/save_change_pwd')}}" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                        
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="old_pwd">
                                    {!! get_form_error_msg($errors, 'old_pwd') !!}
                                    <label class="form-label">Old Password</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="new_pwd">
                                    {!! get_form_error_msg($errors, 'new_pwd') !!}
                                    <label class="form-label">New Password</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="new_pwd_confirmation">
                                    {!! get_form_error_msg($errors, 'new_pwd_confirmation') !!}
                                    <label class="form-label">Confirm Password</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Change Password
                            </button>
                        </form>
                    </div>
                </div>               
            </div>            
        </div>
            	
@endsection
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css"/>
    <link href="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>
    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script src="{{ $assets_admin }}/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
	<script src="{{ $assets_admin }}/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
	<!-- Bootstrap Material Datetime Picker Plugin Js --> 
	<script src="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
@endsection
