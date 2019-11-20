<!doctype html>
<html class="no-js " lang="{{ get_rami_setting('backend_lang') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>{{ __('APP_ADMIN_TITLE') }}::@yield('title')</title>
<!-- Favicon-->
@section('admin_head_css')
<link rel="icon" href="http://ramnew.sisfy.com/assets/front/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ $assets_admin }}/plugins/morrisjs/morris.css" /><!-- Custom Css -->
<link rel="stylesheet" href="{{ $assets_admin }}/css/main.css">
@if(rami_check_backend_language_dir_rtl()==1)
<link rel="stylesheet" href="{{ $assets_admin }}/css/rtl.css">
@endif
<link rel="stylesheet" href="{{ $assets_admin }}/css/color_skins.css">
@show
</head>