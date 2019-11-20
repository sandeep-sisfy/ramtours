@extends('admin.main')
@section('title','Forgot Password')
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
<body class="theme-orange" style="zoom:90%">
<div class="authentication" style="width: 100%">
        <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo">
                            <img src="{{ config('constant.LOGO') }}" alt="Nexa">
                        </div>
                        <h1>{{ __('APP_NAME') }}</h1>
                    </div>
                </div>                        
                </div> 
                {!!show_flash_msg()!!}               
                <form class="col-lg-12" id="forgot" method="POST" action="{{ route('password.email')}}">
                    {{ csrf_field() }}
                    <h5 class="title">{{__('login.Forgot Password')}}</h5>
                    <small class="msg">{{__('login.Enter your e-mail address below to reset your password.')}}</small>
                    <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                {!! get_form_error_msg($errors, 'email') !!}
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-raised btn-primary waves-effect">{{__('login.Reset my password')}}</button>
                    </div>
                </form>
                <div class="col-lg-12 m-t-20">
                    <a href="{{url('login')}}" title="">{{__('login.SIGN IN')}}</a>
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
   $("#forgot").validate({

          rules: {
            email:{
              required: true,
              email:true
            }
         },
          messages: {
            email: {
              required: "Please enter your email id to reset password.",
              email:"Please Enter Valid Email Address."
            }
          }

    });
  
</script>
@endsection
@section('admin_footer')
@endsection
</body>
</html>