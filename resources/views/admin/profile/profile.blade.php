@extends('admin.main')
@section('title',$page_title)
@section('admin_page_class', 'profile-page')
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php 
    if(empty($user))
    $user='';
@endphp

<div class="container-fluid">
    <div class="profile-header">
        <div class="profile_info row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="profile-image float-md-right"> <img src="{{  get_cur_user_image() }}" height="180px" width="120px" alt=""> 
                </div>
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

                        <form action="{{url('/admin/updateprofile/'.$profile->id)}}" id="admin_profile" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">

                            {{ csrf_field() }}

                          {{  method_field('PUT') }}

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="fname" value="{!! get_edit_input_pvr_old_value('fname',$profile->fname)!!}">

                                    {!! get_form_error_msg($errors, 'fname') !!}

                                    <label class="form-label">First Name</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="lname" value="{!! get_edit_input_pvr_old_value('lname',$profile->lname)!!}">

                                    {!! get_form_error_msg($errors, 'lname') !!}

                                    <label class="form-label">Last Name</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="email" class="form-control" name="email" value="{!! get_edit_input_pvr_old_value('email',$profile->email)!!}">

                                    {!! get_form_error_msg($errors, 'email') !!}

                                    <label class="form-label">email</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="contact" value="{!! get_edit_input_pvr_old_value('contact',$profile->contact)!!}">

                                    {!! get_form_error_msg($errors, 'contact') !!}

                                    <label class="form-label">Contact Number</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                    <div class="form-line">

                                        <input type="text" class="dob form-control" name="dob" value="{!! get_edit_input_pvr_old_value('address',$profile->dob)!!}">
                                        <label class="form-label">Date of birth</label>
                                    </div>

                            

                            </div>

                            <div class="form-group form-float">
                                <label class="gender">Gender : </label>
                                <input type="radio" name="gender" id="male" class="with-gap radio-col-amber" value="1" {!!get_edit_select_check_pvr_old_value('gender',$profile->gender,1, 'chacked')!!}>
                                <label for="male" class="m-l-10 m-r-10">Male</label>
                                <input type="radio" name="gender" id="female" class="with-gap radio-col-amber" value="2" {!!get_edit_select_check_pvr_old_value('gender',$profile->gender,2, 'chacked')!!}>
                                <label for="female" class="m-l-10 m-r-10">Female</label>
                                {!! get_form_error_msg($errors, 'gender') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="address" value="{!! get_edit_input_pvr_old_value('address',$profile->address)!!}">
                                    {!! get_form_error_msg($errors, 'address') !!}
                                    <label class="form-label">Address</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="city" value="{!! get_edit_input_pvr_old_value('city',$profile->city)!!}">
                                    {!! get_form_error_msg($errors, 'city') !!}
                                    <label class="form-label">City</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pincode" value="{!! get_edit_input_pvr_old_value('pincode',$profile->pincode)!!}">
                                    {!! get_form_error_msg($errors, 'pincode') !!}
                                    <label class="form-label">PinCode</label>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="country" value="{!! get_edit_input_pvr_old_value('country',$profile->country)!!}">
                                    {!! get_form_error_msg($errors, 'country') !!}
                                    <label class="form-label">Country</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">About Us</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="about_user">{!! get_edit_input_pvr_old_value('about_userabout_user',$profile->about_user)!!}
                                    </textarea>
                                    {!! get_form_error_msg($errors, 'about_user') !!}
                                </div>
                            </div>
                            <div class="form-group form-float" >
                                <label for="previous">Profile Image: </label>
                                <img src="{{ rami_get_file_url($profile->image) }}" width="100" height="100" alt="profile img" style="border-radius: 50%; border: 5px solid #BEBEBE">
                            </div>

                            <div class="form-group form-float">

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

<script type="text/javascript">
    $('.dob').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY',
        clearButton: true,
        time: false
    });
    $("#admin_profile").validate({
        rules: {
            fname:{
                required: true,
                maxlength: 100,
            },
            lname:{
                required: true,
                maxlength:100,
            },
            email:{
                required: true,
            },
            contact:{
                required: true,
                maxlength:10,
                minlength:10
            },

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

        }

    });

</script>

@endsection

