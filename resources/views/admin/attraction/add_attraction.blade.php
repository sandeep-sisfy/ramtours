@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($attraction)){
    $attraction='';
    $selected='';
   }else{
    $selected=$attraction->attraction_location;
   }
   
@endphp
 {!!show_flash_msg()!!}
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{url('admin/attraction')}}@yield('edit_attraction_id')" id="add_attraction" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_title" value="{!! get_edit_input_pvr_old_value_with_obj('attraction_title',$attraction, 'attraction_title')!!}">
                                    {!! get_form_error_msg($errors, 'attraction_title') !!}
                                    <label class="form-label">Attraction Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick change_title_class" name="attraction_location" id="attraction_location" data-live-search="true">
                                         <option value="">Select Location</option>
                                         @foreach($locations as $location)
                                            <option value="{{$location->id}}" {{get_edit_select_check_pvr_old_value_with_obj('attraction_location', $attraction, 'attraction_location', $location->id, 'select')}} >{{$location->loc_name}}</option>
                                            {!! get_loctions_child_option($location->id, $selected, 'attraction_location') !!}
                                         @endforeach
                                    </select>
                                    <label class="form-label">Attraction Location</label>
                                </div>

                                {!! get_form_error_msg($errors, 'attraction_location') !!}

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_distance" value="{!! get_edit_input_pvr_old_value_with_obj('attraction_distance',$attraction, 'attraction_distance')!!}">
                                    {!! get_form_error_msg($errors, 'attraction_distance') !!}
                                    <label class="form-label">Attraction Distance</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_sequence" value="{!! get_edit_input_pvr_old_value_with_obj('attraction_sequence',$attraction, 'attraction_sequence')!!}">
                                    {!! get_form_error_msg($errors, 'attraction_sequence') !!}
                                    <label class="form-label">Attraction Sequence</label>
                                </div>
                            </div>                                          
                            {{-- <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_lat" value="{!! get_edit_input_pvr_old_value_with_obj('attraction_lat',$attraction, 'attraction_lat')!!}">
                                    {!! get_form_error_msg($errors, 'attraction_lat') !!}
                                    <label class="form-label">Attraction Latitude</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="attraction_lng" value="{!! get_edit_input_pvr_old_value_with_obj('attraction_lng',$attraction, 'attraction_lng')!!}">
                                    {!! get_form_error_msg($errors, 'attraction_lng') !!}
                                    <label class="form-label">Attraction Longitude</label>
                                </div>
                            </div> --}}            
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>
    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script type="text/javascript">
        $("#add_tag").validate({
            rules: {
                title:{
                    required: true,
                    maxlength: 100,
                },
                contact_no:{
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Please enter Name here.",
                    maxlength:"Sub Category Name contain only 100 Charecters ."
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }       
            }
        });
    </script>
@endsection