@extends('admin.main')
@section('title','login')
@section('admin_head_css')
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/css/main.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/css/authentication.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/css/color_skins.css">
    @if(rami_check_backend_language_dir_rtl()==1)
    <link rel="stylesheet" href="{{ $assets_admin }}/css/rtl.css">
    @endif
@endsection
@section('admin_topnav')
@endsection
@section('admin_breadcrumb')
@endsection
@section('admin_left_menu')
@endsection
@section('admin_container')
<body class="theme-orange {{rami_get_backend_language_dir()}}" style="zoom:90%">
<div class="authentication" style="height: 100%">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="{{ config('constant.LOGO') }}" alt="{{ __('APP_NAME') }}" width="100"></div>
                        <h1>{{ __('APP_NAME') }}</h1>
                    </div>                        
                </div>
                <form class="col-lg-12" method="POST" action="{{ route('login') }}" id="sign_in">
                    {{ csrf_field() }}
                    <h5 class="title">{{__('Sign in to your Account')}}</h5>
                    {!!show_flash_msg()!!}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" value="{{old('email')}}">
                            {!! get_form_error_msg($errors, 'email') !!}
                            <label class="form-label" >{{__('login.Email')}}</label>
                            
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password">
                            <label class="form-label">{{__('login.Password')}}</label>
                            {!! get_form_error_msg($errors, 'password') !!}
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-cyan">
                        <label for="rememberme">{{__('login.Remember Me')}}</label>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-raised btn-primary waves-effect">{{__('login.SIGN IN')}}</button>
                        {{-- <a href="{{url('register')}}" class="btn btn-raised btn-default waves-effect">SIGN UP</a> --}}                        
                    </div> 
                    <div class="col-lg-12 m-t-20">
                        <a class="" href="{{ route('password.request') }}">
                                    {{__('login.Forgot Your Password')}}
                        </a> 
                    </div>
                </form>
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
    $("#sign_in").validate({
          rules: {
            email:{
              required: true,
              email:true
            },
            password:{
                required:true,
            }

          },
          messages: {
            email: {
              required: "{{__('login.Please enter your email to Sign-In.')}}",
              email:"{{__('login.Please Enter Valid Email Address.')}}"
            },
            password:{
                required:"{{__('login.Please enter your password to Sign-In.')}}"
            }
          }
    });
</script>
@endsection
@section('admin_footer')
@endsection
</body>
</html>