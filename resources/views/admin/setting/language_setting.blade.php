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

	                    <form action="{{url('/admin/setting/language_setting')}}" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
	                        {{ csrf_field() }}
	                        {{method_field('PUT')}}
	                        <div class="form-group form-float">
                                <div class="form-line add_select">
                                    <select class="form-control show-tick" name="backend_lang">
                                        <option value="">Please select Backend Language</option>
                                        <option value="en" {!!get_edit_select_check_pvr_old_value('backend_lang',get_rami_setting('backend_lang'), 'en', 'select')!!}>English</option>
                                        <option value="he" {!!get_edit_select_check_pvr_old_value('backend_lang', get_rami_setting('backend_lang') , 'he', 'select')!!}>Hebrew</option>
                                    </select>
                                    <label class="form-label">Backend Language</label>
                                </div>
                                {!! get_form_error_msg($errors, 'backend_lang') !!}
                            </div>
	                        <div class="form-group form-float">
                                <label class="gender">Backend Language Direction : </label>
                                <input type="radio" name="backend_lang_direction" id="ltr" class="with-gap radio-col-amber" value="ltr"  {!!get_edit_select_check_pvr_old_value('backend_lang_direction', get_rami_setting('backend_lang_direction') , 'ltr', 'chacked')!!}>
                                <label for="ltr" class="m-l-10 m-r-10">LTR</label>
                                <input type="radio" name="backend_lang_direction" id="rtl" class="with-gap radio-col-amber" value="rtl" {!!get_edit_select_check_pvr_old_value('backend_lang_direction', get_rami_setting('backend_lang_direction') , 'rtl', 'chacked')!!}>
                                <label for="rtl" class="m-l-20 m-r-10">RTL</label>
                                {!! get_form_error_msg($errors, 'backend_lang_direction') !!}
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

