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
	                    <form action="{{url('/admin/setting/homepage')}}" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
	                        {{ csrf_field() }}
	                        {{method_field('PUT')}}
	                        <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="home_page_title" value="">
                                    {!! get_form_error_msg($errors, 'home_page_title') !!}
                                    <label class="form-label">HomePage Title</label>
                                </div>
                            </div>                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="show_by_month" value="">
                                        <option value="">--Select One--</option>
                                        <option value='1'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '1','select')!!}>January</option>
									    <option value='2'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '2','select')!!}>February</option>
									    <option value='3'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '3','select')!!}>March</option>
									    <option value='4'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '4','select')!!}>April</option>
									    <option value='5'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '5','select')!!}>May</option>
									    <option value='6'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '6','select')!!}>June</option>
									    <option value='7'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '7','select')!!}>July</option>
									    <option value='8'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '8','select')!!}>August</option>
									    <option value='9'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '9','select')!!}>September</option>
									    <option value='10'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '10','select')!!}>October</option>
									    <option value='11'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '11','select')!!}>November</option>
									    <option value='12'{!!get_edit_select_check_pvr_old_value('show_by_month',get_rami_setting('show_by_month'), '12','select')!!}>December</option>
                                    </select>
                                    <label class="form-label">Package show on Month</label>
                                </div>
                                {!! get_form_error_msg($errors, 'show_by_month') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick rami_package_type" name="show_package_type" value="">
                                        <option value="">--Select One--</option>
                                        <option value="1"{!!get_edit_select_check_pvr_old_value('show_package_type',get_rami_setting('show_package_type'), '1', 'select')!!}>flight+Hotel+car</option>
                                        <option value="2"{!!get_edit_select_check_pvr_old_value('show_package_type',get_rami_setting('show_package_type'), '2', 'select')!!}>flight+Hotel</option>
                                        <option value="3"{!!get_edit_select_check_pvr_old_value('show_package_type',get_rami_setting('show_package_type'), '3', 'select')!!}>flight+car</option>
                                        <option value="4"{!!get_edit_select_check_pvr_old_value('show_package_type',get_rami_setting('show_package_type'), '4', 'select')!!}>flight</option>
                                    </select>
                                    <label class="form-label">Vacation Package Type</label>
                                </div>
                                {!! get_form_error_msg($errors, 'show_package_type') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="show_no_package" value="">
                                    {!! get_form_error_msg($errors, 'show_no_package') !!}
                                    <label class="form-label">Package Show On HomePage</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="package_sequence" value="">
                                    {!! get_form_error_msg($errors, 'package_sequence') !!}
                                    <label class="form-label">Package Sequence</label>
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