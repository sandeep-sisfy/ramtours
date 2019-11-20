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
	                    <form action="{{url('/admin/setting/notification')}}" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
	                        {{ csrf_field() }}
	                        {{method_field('PUT')}}
	                        <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="noti_number" value="{{ get_rami_setting('notification_mobile_number')}}">
                                    {!! get_form_error_msg($errors, 'noti_number') !!}
                                    <label class="form-label">Notification Contact Number</label>
                                </div>
                            </div>
	                        <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="{{
                                    get_rami_setting('notification_email_id')
                                }}">
                                    {!! get_form_error_msg($errors, 'email') !!}
                                    <label class="form-label">Notification Mail</label>
                                </div>
                            </div>
	                        <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Submit
	                        </button>
	                   </form>
	               </div>
		            
        		</div>
        	</div>
        </div>               
    </div>            
        
@endsection

