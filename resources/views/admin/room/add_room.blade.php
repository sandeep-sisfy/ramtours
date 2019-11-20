@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($room))
    $room='';
@endphp
 {!!show_flash_msg()!!}
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card add_room">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            @section('nav-tabs')
                                <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">Room Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Gellery</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Room Price</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0)">Room Alerts</a></li>
                            @show
                        </ul>
                        <form action="{{url('admin/room')}}@yield('edit_room_id')" id="add_package" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="room_title" value='{{ get_edit_input_pvr_old_value_with_obj('room_title',$room, 'room_title')}}'>
                                    {!! get_form_error_msg($errors, 'room_title') !!}
                                    <label class="form-label">Room Title</label>
                                </div>
                            </div>
                            <!-- <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="old_room_id" value="{!! get_edit_input_pvr_old_value_with_obj('old_room_id',$room, 'old_room_id')!!}" >
                                    <label class="form-label">Old Room ID</label>
                                    {!! get_form_error_msg($errors, 'old_room_id') !!}
                                    <p class="font col-orange">This is old site room id.</p>
                                </div>
                            </div> -->
                            @if(!empty($room))
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control"  value="@if(!empty($room->old_room_id)){{$room->old_room_id.'-d'}}
                                     @else {{$room->id.'-d'}} @endif
                                    " readonly="">
                                    <label class="form-label">Room code</label>
                                    <p class="font col-orange">This is automatically generated Code</p>
                                </div>
                            </div>
                            @endif                                          
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Room Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="room_desc">{!! get_edit_input_pvr_old_value_with_obj('room_desc',$room,'room_desc')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'room_desc') !!}
                                </div>
                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick hotel" name="room_hotel" >
                                         @foreach($hotels as $hotel)
                                            <option value="{{$hotel->id}}" {{get_edit_select_check_pvr_old_value_with_obj('room_hotel', $room, 'room_hotel', $hotel->id, 'select')}} >{{$hotel->hotel_name}}</option>
                                         @endforeach 
                                    </select>
                                    <label class="form-label">Hotels</label>
                                </div>
                                {!! get_form_error_msg($errors, 'room_hotel') !!}
                            </div>                           
                            <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick room_type" name="room_type">
                                        @foreach($room_types as $room_type)
                                            <option value="{{$room_type->id}}" {{get_edit_select_check_pvr_old_value_with_obj('room_type', $room, 'room_type',$room_type->id, 'select')}} >{{$room_type->room_type}}</option>
                                        @endforeach 
                                    </select>
                                    <label class="form-label">Room Type</label>
                                </div>
                                {!! get_form_error_msg($errors, 'room_type') !!}
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick max_people" name="max_people"  data-header="Select a Max Peoples" required="true">
                                         @for($i=1;$i<=21;$i++)
                                            <option value="{{ $i }}" {{get_edit_select_check_pvr_old_value_with_obj('max_people', $room, 'max_people', $i, 'select')}} >{{$i}} People </option>
                                         @endfor
                                    </select>
                                    <label class="form-label">Max Peopele</label>
                                </div>
                                {!! get_form_error_msg($errors, 'max_people') !!}
                            </div>                            
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="room_area" value="{!! get_edit_input_pvr_old_value_with_obj('room_area',$room, 'room_area')!!}">
                                    {!! get_form_error_msg($errors, 'room_area') !!}
                                    <label class="form-label">Room Size(in sq. feet)</label>
                                </div>
                            </div>             
                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 
                             m-r-10 m-l-10 go_to_next_page_btn">Save & Add Gallery
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
         $('.hotel').selectpicker({
           liveSearchPlaceholder:'Search Hotel',
           noneSelectedText:'Please Select Hotel',
           title:'Hotel',
           liveSearch:"true",
           noneResultsText: 'Hotel not found'
        });
          $('.max_people').selectpicker({
           liveSearchPlaceholder:'Search max people',
           noneSelectedText:'Please Select max people',
           title:'max people',
           noneResultsText: 'max people not found'
        });
        $('.room_type').selectpicker({
           liveSearchPlaceholder:'Search Room Type',
           noneSelectedText:'Please Select Room Type',
           title:'Room Type',
           liveSearch:"true",
           noneResultsText: 'Room Type not found'
        });
        $("#add_room").validate({
            rules: {
                room_title:{
                    required: true,
                },
                room_hotel:{
                    required: true,
                },
                 room_total:{
                    required: true,
                },
                 room_available:{
                    required: true,
                },
                 room_type:{
                    required: true,
                },
                 max_people:{
                    required: true,
                },
                room_area:{
                    required: true,
                }
            },
            messages: {                      
            }
        });
        $('.save_form_btn').click(function(event) {
            $('#go_to_next_page').val(0);
        });
        $('.go_to_next_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });
        
    </script>
@endsection



