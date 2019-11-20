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
            <div class="profile-image float-md-right"> <img src="{{  get_cur_user_image() }}" height="120px" width="105px" alt=""> </div>
        </div>
        <div class="col-lg-6 col-md-8 col-12">
            <h4 class="m-t-5 m-b-0"><strong>{{get_cur_user_name()}}</strong></h4>
            <span class="job_post">{{get_cur_user_email()}}</span>
            <p>{!! $profile->AboutDisc !!}</p>
        </div>                
    </div>
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{url('/admin/updateprofile/'.$profile->id)}}" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                          {{  method_field('PUT') }}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="fname" value="{!! get_edit_input_pvr_old_value('fname',$profile,'fname')!!}">
                                    {!! get_form_error_msg($errors, 'fname') !!}
                                    <label class="form-label">First Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lname" value="{!! get_edit_input_pvr_old_value('lname',$profile,'lname')!!}">
                                    {!! get_form_error_msg($errors, 'lname') !!}
                                    <label class="form-label">Last Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="{!! get_edit_input_pvr_old_value('email',$profile,'email')!!}">
                                    {!! get_form_error_msg($errors, 'email') !!}
                                    <label class="form-label">email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="contact" value="{!! get_edit_input_pvr_old_value('contact',$profile,'contact')!!}">
                                    {!! get_form_error_msg($errors, 'contact') !!}
                                    <label class="form-label">Contact Number</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="gender">Gender : </label>
                                <input type="radio" name="gender" id="male" class="with-gap" value="1" {!!get_edit_select_check_pvr_old_value('gender',$profile,'gender',1, 'chacked')!!}>
                                <label for="male" class="m-l-20">Male</label>
                                <input type="radio" name="gender" id="female" class="with-gap" value="2" {!!get_edit_select_check_pvr_old_value('gender',$profile,'gender',2, 'chacked')!!}>
                                <label for="female" class="m-l-20">Female</label>
                                {!! get_form_error_msg($errors, 'gender') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="address" value="{!! get_edit_input_pvr_old_value('address',$profile,'address')!!}">
                                    {!! get_form_error_msg($errors, 'address') !!}
                                    <label class="form-label">Address</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="city" value="{!! get_edit_input_pvr_old_value('city',$profile,'city')!!}">
                                    {!! get_form_error_msg($errors, 'city') !!}
                                    <label class="form-label">City</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pincode" value="{!! get_edit_input_pvr_old_value('pincode',$profile,'pincode')!!}">
                                    {!! get_form_error_msg($errors, 'pincode') !!}
                                    <label class="form-label">PinCode</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="country" value="{!! get_edit_input_pvr_old_value('country',$profile,'country')!!}">
                                    {!! get_form_error_msg($errors, 'country') !!}
                                    <label class="form-label">Country</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">About Us</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="about_user">{!! get_edit_input_pvr_old_value('about_userabout_user',$profile,'about_user')!!}
                                    </textarea>
                                    {!! get_form_error_msg($errors, 'about_user') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="previous">Profile Image: </label>
                                <img src="{{ city_get_file_url($profile->image) }}" width="75" height="75" alt="profile img">
                            </div>
                            <div class="form-group">
                                <label for="upload">Upload Profile Images Here : </label>
                                <input name="image" type="file" class="form-control list_file" accept="image/*" />
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">update
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
