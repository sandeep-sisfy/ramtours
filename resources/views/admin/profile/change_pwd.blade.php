@extends('admin.main')

@section('title',$page_title)

@section('admin_page_class', 'profile-page')

@section('title_breadcrumb',$page_title)

@section('admin_head_css')

@parent

    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css"/>

    <link href="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

@endsection

@section('admin_container')

@php 

    if(empty($user))

    $user='';

@endphp


<div class="container-fluid">
    <div class="profile-header">
        <div class="profile_info row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="profile-image float-md-right"> <img src="{{  get_cur_user_image() }}" height="180px" width="105px" alt=""> </div>
            </div>
            <div class="col-lg-6 col-md-8 col-12">
                <h4 class="m-t-5 m-b-0"><strong>{{get_cur_user_name()}}</strong></h4>
                <span class="job_post">{{get_cur_user_email()}}</span>
                <p>{!! $profile->AboutDisc !!}</p>
            </div>                
        </div>
    </div>


    {!!show_flash_msg()!!}

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="body">

                        <form action="{{url('/admin/save_change_pwd')}}" id="change_pwd" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">

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

@section('admin_jscript')

@parent

    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>

    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 

    <script src="{{ $assets_admin }}/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 

	<script src="{{ $assets_admin }}/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 

	<!-- Bootstrap Material Datetime Picker Plugin Js --> 

	<script src="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <script type="text/javascript">

        $("#change_pwd").validate({

            rules: {

                old_pwd:{

                    required: true,

                },

                new_pwd:{

                    required: true,

                    maxlength: 100

                },

                confirmed_new_pwd:{

                    required: true,

                }

                

            },

            messages: {

                old_pwd: {

                    required: "Please enter Old Password.",

                },

                new_pwd:{

                    required: "Please enter Newd Password.",

                },

                confirmed_new_pwd:{

                    required: "Please enter Confirm Password."

                }          

            }

        });

    </script> 

@endsection

