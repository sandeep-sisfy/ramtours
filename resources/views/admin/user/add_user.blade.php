@extends('admin.main')
@section('title',$page_title)
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
<div class="profile-header">
	@yield('profile_header')
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{url('/admin/user')}}@yield('edit_user_id')"  id="add_user" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="fname" id="fname" value="{!! get_edit_input_pvr_old_value('fname',$user,'fname')!!}">
                                    {!! get_form_error_msg($errors, 'fname') !!}
                                    <label class="form-label">First Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lname" id="lname" value="{!! get_edit_input_pvr_old_value('lname',$user,'lname')!!}">
                                    {!! get_form_error_msg($errors, 'lname') !!}
                                    <label class="form-label">Last Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" id="email" value="{!! get_edit_input_pvr_old_value('email',$user,'email')!!}">
                                    {!! get_form_error_msg($errors, 'email') !!}
                                    <label class="form-label">email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="contact" id="contact" value="{!! get_edit_input_pvr_old_value('contact',$user,'contact')!!}">
                                    {!! get_form_error_msg($errors, 'contact') !!}
                                    <label class="form-label">Contact Number</label>
                                </div>
                            </div>
                            {{-- <div class="form-group form-float">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="dob"class="datepicker form-control" name="dob" placeholder="Please choose a date...">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group form-float">
                                <label class="gender">Gender : </label>
                                <input type="radio" name="gender" id="male" class="with-gap" value="1" {!!get_edit_select_check_pvr_old_value('gender',$user,'gender',1, 'chacked')!!}>
                                <label for="male" class="m-l-20">Male</label>
                                <input type="radio" name="gender" id="female" class="with-gap" value="2" {!!get_edit_select_check_pvr_old_value('gender',$user,'gender',2, 'chacked')!!}>
                                <label for="female" class="m-l-20">Female</label>
                                {!! get_form_error_msg($errors, 'gender') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
									<input type="text" id="address" class="form-control" name="address" value="{!! get_edit_input_pvr_old_value('address',$user,'address')!!}">
                                    {!! get_form_error_msg($errors, 'address') !!}
                                    <label class="form-label">Address</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="city" id="city" value="{!! get_edit_input_pvr_old_value('city',$user,'city')!!}">
                                    {!! get_form_error_msg($errors, 'city') !!}
                                    <label class="form-label">City</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pincode" value="{!! get_edit_input_pvr_old_value('pincode',$user,'pincode')!!}">
                                    {!! get_form_error_msg($errors, 'pincode') !!}
                                    <label class="form-label">PinCode</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="country" id="country" value="{!! get_edit_input_pvr_old_value('country',$user,'country')!!}">
                                    {!! get_form_error_msg($errors, 'country') !!}
                                    <label class="form-label">Country</label>
                                </div>
                            </div>
							<div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">About Us</label>
                                    <br><br>
                                    <textarea class="ckeditor" id="about_user" name="about_user">{!! get_edit_input_pvr_old_value('about_user',$user,'about_user')!!}
                                    </textarea>
                                    {!! get_form_error_msg($errors, 'about_user') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Status : </label>
                                <input type="radio" name="user_status" id="active" class="with-gap" value="1" {!!get_edit_select_check_pvr_old_value('user_status',$user,'user_status',1, 'chacked')!!}>
                                <label for="active" class="m-l-20">Active</label>
                                <input type="radio" name="user_status" id="disable" class="with-gap" value="2" {!!get_edit_select_check_pvr_old_value('user_status',$user,'user_status',0, 'chacked')!!}>
                                <label for="disable" class="m-l-20">Disable</label>
                                <input type="radio" name="user_status" id="pending" class="with-gap" value="3" {!!get_edit_select_check_pvr_old_value('user_status',$user,'user_status',2, 'chacked')!!}>
                                <label for="pending" class="m-l-20">Pending</label>
                            </div>
                            {!! get_form_error_msg($errors, 'user_status') !!}
                            @yield('user_image') {{-- for edit page user previous image shown here --}}
                            <div class="form-group">
                                <label for="upload">Upload User Images Here : </label>
                                <input name="image" id="image" type="file" class="form-control list_file" accept="image/*" />
								{!! get_form_error_msg($errors, 'image') !!}
                            </div>
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
    <script src="{{ $assets_admin }}/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
	<script src="{{ $assets_admin }}/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
	<!-- Bootstrap Material Datetime Picker Plugin Js --> 
	<script src="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript">
        $("#add_user").validate({
            rules: {
                fname:{
                    required: true,
                    maxlength: 100,
                },
                lname:{
                    required: true,
                    maxlength:500,
                },
                email:{
                    required: true,
                },
                contact:{
                    required: true,
                    maxlength:10,
                    minlength:10
                },
                user_status:{
                    max:1,
                    min:0
                },
                gender:{
                    max:1,
                    min:0
                }
            },
            messages: {
                fname:{
                    required: "Please enter First Name here.",
                    maxlength:"First Name contain only 100 Charecters ."
                },
                lname:{
                    required:"Please enter Last Name here.",
                    maxlength:"Last Name contain only 100 Charecters .",
                },
                email:{
                    required:"Please Enter Email Address here.",
                },
                contact:{
                    required:"Contact Number should be required.",
                },
                user_status:{
                    max:"Something Went Wrong.",
                    min:"Something Went Wrong."
                },
                gender:{
                    max:"Something Went Wrong.",
                    min:"Something Went Wrong."
                }
            }
        });
    </script>
@endsection

