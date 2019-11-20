@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <link href="{{ $assets_admin }}/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('admin_container')
<div class="container-fluid">
	{!!show_flash_msg()!!}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                	<div>
	                    <form action="{{url('/admin/setting/')}}@yield('setting_action')" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
	                        {{ csrf_field() }}
	                        {{method_field('PUT')}}
	                        @foreach($settings as $setting)
	                        <div class="form-group">
	                            <label for="upload">{{get_adv_image_form_title($setting)}}</label>
	                            @if(!empty(get_adv_image($setting)))
	                            <img src="{{ get_adv_image($setting) }}" width="75" height="75" alt="user img" class="adv_image">
	                            @endif
	                            <input name="{{$setting}}" type="file" class="form-control list_file" accept="image/*" />
	                            {!! get_form_error_msg($errors, $setting) !!}
	                        </div>
	                        @endforeach
	                        <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Submit
	                        </button>
	                   </form>
	               </div>
		        </div>
        	</div>
        </div>               
    </div>            
        
@endsection
@section('admin_jscript')
@parent
<script src="{{ $assets_admin }}/plugins/light-gallery/js/lightgallery-all.js"></script> 
<script src="{{ $assets_admin }}/js/pages/medias/image-gallery.js"></script>
@endsection
