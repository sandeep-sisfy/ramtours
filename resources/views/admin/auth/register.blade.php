@extends('admin.main')
@section('title','login')
@section('admin_head_css')
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/css/main.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/css/authentication.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/css/color_skins.css">
@endsection
@section('admin_topnav')
@endsection
@section('admin_breadcrumb')
@endsection
@section('admin_left_menu')
@endsection
@section('admin_container')
<body class="theme-orange">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="{{ config('constant.LOGO') }}" alt="Nexa"></div>
                        <h1>{{ config('constant.APP_NAME') }}</h1>
                    </div>                        
                </div>
                <form class="col-lg-12" id="sign_up" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <h5 class="title">Register a new membership</h5>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="fname" value="{{old('fname')}}">
                                {!! get_form_error_msg($errors, 'fname') !!}
                                <label class="form-label">First Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="lname" value="{{old('lname')}}">
                                {!! get_form_error_msg($errors, 'lname') !!}
                                <label class="form-label">Last Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" value="{{old('email')}}" >
                                {!! get_form_error_msg($errors, 'email') !!}
                                <label class="form-label">Email Address</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" id="password">
                                {!! get_form_error_msg($errors, 'password') !!}
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password_confirmation">
                                {!! get_form_error_msg($errors, 'password_confirmation') !!}
                                <label class="form-label">Confirm Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                             <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                             {!! get_form_error_msg($errors, 'terms') !!}
                            <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                        </div>
                        <div class="col-lg-12">                        
                            <button type="submit" class="btn btn-raised btn-primary waves-effect">SIGN UP</button>                         
                        </div>   
                </form>
                
            <div class="col-lg-12 m-t-20">
                    <a href="login">You already have a membership?</a>
                </div>                    
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin_jscript')
<script src="{{ $assets_admin }}/bundles/libscripts.bundle.js"></script>    
<script src="{{ $assets_admin }}/bundles/vendorscripts.bundle.js"></script>
<script src="{{ $assets_admin }}/bundles/mainscripts.bundle.js"></script>
<script src="{{ $assets_admin }}/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript">
    $("#sign_up").validate({
          rules: {
            fname:{
              required: true,
              maxlength: 50
            },
            lname:{
              required: true,
              maxlength: 50
            },
            email:{
              required: true,
              email:true
            },
            password:{
                required:true,
                minlength: 6
            },
            password_confirmation:{
                required:true,
                equalTo: "#password"

            },
            terms:{
                required: true,
            }

          },
          messages: {
            fname: {
              required: "Please enter your First Name.",
              maxlength:"First name contain maximum 50 letters."
            },
            lname: {
              required: "Please enter your Last Name",
              maxlength:"Last name contain maximum 50 letters."
            },
            email: {
              required: "Please enter your email to Sign-Up.",
              email:"Please Enter Valid Email Address."
            },
            password:{
                required:"Please enter your password to Sign-Up.",
                minlength:"Password length should be minimum 6 letters."
            },
            password_confirmation:{
                required:"Please re-enter password for password confirmation.",
                equalTo:"Confirm password should be matched with password."
            },
            terms:{
                required:"Please agree all terms of usage."
            }
          }
    });
    $('#terms').click(function(event) {
        if($(this).prop('checked')==true){
            $('#terms-error').remove();
        }
    });
    
</script>
@endsection
@section('admin_footer')
@endsection
</body>
</html>