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
@php 
    if(empty($homepage))
    $homepage='';
@endphp
    {!!show_flash_msg()!!}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                	<div>
	                    <form action="{{url('/admin/setting/homepage')}}@yield('edit_homepage_id')" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
	                        {{ csrf_field() }}
                            @section('method_field')
                            @show
	                        <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="home_page_title" value="{!! get_edit_input_pvr_old_value_with_obj('home_page_title',$homepage,'home_page_title')!!}">
                                    {!! get_form_error_msg($errors, 'home_page_title') !!}
                                    <label class="form-label">HomePage Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="menu_title" value="{!! get_edit_input_pvr_old_value_with_obj('menu_title',$homepage,'menu_title')!!}">
                                    {!! get_form_error_msg($errors, 'menu_title') !!}
                                    <label class="form-label">Menu Title</label>
                                </div>
                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick pkg_location" name="pkg_location[]" multiple="" data-live-search="true"  >
                                        @foreach($all_locations as $location)
                                            <option value="{{$location->id}}" {{get_edit_select_check_pvr_old_value_with_obj('pkg_location', $location, 'pkg_location', $location->id, 'select')}} >{{$location->loc_name}}</option>
                                            {!! get_loctions_child_option($location->id) !!}
                                         @endforeach
                                    </select>
                                    <label class="form-label">Location</label>
                                </div>
                                {!! get_form_error_msg($errors, 'pkg_location') !!}
                            </div>                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick show_by_month" name="show_by_month" >
                                        @for($i=1; $i<=12; $i++)
                                            <option value='{{$i}}'{{ get_edit_select_check_pvr_old_value_with_obj('show_by_month',$homepage,'show_by_month', $i,'select') }}>{{get_month_name($i)}}</option>
                                        @endfor
                                    </select>
                                    <label class="form-label">Package show on Month</label>
                                </div>
                                {!! get_form_error_msg($errors, 'show_by_month') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick rami_package_type" name="package_type" value="">
                                        <option value="">--Select One--</option>
                                        <option value="1"{{ get_edit_select_check_pvr_old_value_with_obj('package_type', $homepage,'package_type', '1', 'select')}}>flight+Hotel+car</option>
                                        <option value="3"{{ get_edit_select_check_pvr_old_value_with_obj('package_type', $homepage,'package_type', '3', 'select')}}>flight+car</option>
                                        <option value="4"{{ get_edit_select_check_pvr_old_value_with_obj('package_type', $homepage,'package_type', '4', 'select')}}>flight</option>
                                    </select>
                                    <label class="form-label">Package Type</label>
                                </div>
                                {!! get_form_error_msg($errors, 'package_type') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="no_of_package_show" value="{!! get_edit_input_pvr_old_value_with_obj('no_of_package_show',$homepage,'no_of_package_show')!!}">
                                    {!! get_form_error_msg($errors, 'no_of_package_show') !!}
                                    <label class="form-label">Number of Packaga Show On HomePage</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="skip_dates" value="{!! get_edit_input_pvr_old_value_with_obj('skip_dates',$homepage,'skip_dates')!!}">
                                    {!! get_form_error_msg($errors, 'skip_dates') !!}
                                    <label class="form-label">Skip Dates</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="show_in_sequence" value="{!! get_edit_input_pvr_old_value_with_obj('show_in_sequence',$homepage,'show_in_sequence')!!}">
                                    {!! get_form_error_msg($errors, 'show_in_sequence') !!}
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
@section('admin_jscript')
@parent
<script type="text/javascript">
     $('.pkg_location').selectpicker({
           actionsBox:true,
           liveSearchPlaceholder:'Search Location',
           noneSelectedText:'Please Select Location',
           title:'Select Location',
           liveSearch:"true",
           virtualScroll:10,
           dropupAuto:false,
           noneResultsText: 'Location not found',
        });
        $('.show_by_month').selectpicker({
           actionsBox:false,
           liveSearchPlaceholder:'Search Month',
           noneSelectedText:'Please Select Month',
           title:'Select Month', 
           virtualScroll:10,
           liveSearch:"true",
           dropupAuto:false,
           noneResultsText: 'Month not found',
        });

     
</script>
@endsection