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
    if(empty($loc_pkg_setting))
    $loc_pkg_setting='';    
@endphp
    {!!show_flash_msg()!!}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div>
                        <form action="{{ $form_url }}" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
                            {{ csrf_field() }}                                
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title" value="{!! get_edit_input_pvr_old_value_with_obj('title',$loc_pkg_setting,'title')!!}">
                                    {!! get_form_error_msg($errors, 'title') !!}
                                    <label class="form-label">Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="month" value="">
                                        <option value="">--Select One--</option>
                                        <option value='1'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '1','select') }}>January</option>
                                        <option value='2'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '2','select') }}>February</option>
                                        <option value='3'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '3','select') }}>March</option>
                                        <option value='4'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '4','select') }}>April</option>
                                        <option value='5'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '5','select') }}>May</option>
                                        <option value='6'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '6','select') }}>June</option>
                                        <option value='7'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '7','select') }}>July</option>
                                        <option value='8'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting, 'month','8','select') }}>August</option>
                                        <option value='9'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting, 'month','9','select') }}>September</option>
                                        <option value='10'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month','10','select') }}>October</option>
                                        <option value='11'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting,'month', '11','select') }}>November</option>
                                        <option value='12'{{ get_edit_select_check_pvr_old_value_with_obj('month',$loc_pkg_setting, 'month','12','select') }}>December</option>
                                    </select>
                                    <label class="form-label">Package show on Month</label>
                                </div>
                                {!! get_form_error_msg($errors, 'month') !!}
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="no_of_package_show" value="{!! get_edit_input_pvr_old_value_with_obj('no_of_package_show',$loc_pkg_setting,'no_of_package_show')!!}">
                                    {!! get_form_error_msg($errors, 'no_of_package_show') !!}
                                    <label class="form-label">No of Package Show On Front</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="sequence" value="{!! get_edit_input_pvr_old_value_with_obj('sequence',$loc_pkg_setting,'sequence')!!}">
                                    {!! get_form_error_msg($errors, 'sequence') !!}
                                    <label class="form-label">Package Sequence</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="skip_date" value="{!! get_edit_input_pvr_old_value_with_obj('skip_date',$loc_pkg_setting,'skip_date')!!}">
                                    {!! get_form_error_msg($errors, 'skip_date') !!}
                                    <label class="form-label">Skip date</label>
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
        $('.hotel_location').selectpicker({
           actionsBox:true,
           liveSearchPlaceholder:'Search Hotel location here',
           noneSelectedText:'Please Select Hotel location',
           title:'Hotel location',
           liveSearch:"true",
           virtualScroll:300,
           dropupAuto:false,
           noneResultsText: 'Hotel location not found'
        });
    </script>
@endsection    