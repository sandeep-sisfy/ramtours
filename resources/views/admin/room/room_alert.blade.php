@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link href="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
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
                                <li class="nav-item"><a class="nav-link " data-toggle="tab" onclick="window.location.href='{{url('admin/room/'.$room->id.'/edit')}}'">Room Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{url('admin/room/gallery/'.$room->id)}}" onclick="window.location.href='{{url('admin/room/gallery/'.$room->id)}}'">Gellery</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/room/'.$room->id.'/room_prices')}}'">Room Price</a></li>
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:void(0)">Room Alerts</a></li>
                            @show
                        </ul>                        
                        <form action="{{url('admin/room-alert/'.$room->id)}}" id="add_alert" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Room Booking Date</label>
                                    <input type="text" class="form-control start_end_date" name="booking_date" value="{!! get_edit_input_pvr_old_value_with_obj('booking_date',$room, 'booking_date')!!}">
                                    {!! get_form_error_msg($errors, 'booking_date') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Date 1</label>
                                    <input type="text" class="form-control start_end_date" name="alert_date_1" value="{!! get_edit_input_pvr_old_value_with_obj('alert_date_1',$room, 'alert_date_1')!!}">
                                    {!! get_form_error_msg($errors, 'alert_date_1') !!}
                                </div>
                            </div>                                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Message 1</label>
                                    <br><br>
                                    <textarea name="alert_msg_1" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('alert_msg_1',$room,'alert_msg_1')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'alert_msg_1') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Date 2</label>
                                    <input type="text" class="form-control start_end_date" name="alert_date_2" value="{!! get_edit_input_pvr_old_value_with_obj('alert_date_2',$room, 'alert_date_2')!!}">
                                    {!! get_form_error_msg($errors, 'alert_date_2') !!}
                                </div>
                            </div>                                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Message 2</label>
                                    <br><br>
                                    <textarea name="alert_msg_2" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('alert_msg_2',$room,'alert_msg_2')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'alert_msg_2') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Date 3</label>
                                    <input type="text" class="form-control start_end_date" name="alert_date_3" value="{!! get_edit_input_pvr_old_value_with_obj('alert_date_3',$room, 'alert_date_3')!!}">
                                    {!! get_form_error_msg($errors, 'alert_date_3') !!}
                                </div>
                            </div>                                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Message 3</label>
                                    <br><br>
                                    <textarea name="alert_msg_3" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('alert_msg_3',$room,'alert_msg_3')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'alert_msg_3') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Date 4</label>
                                    <input type="text" class="form-control start_end_date" name="alert_date_4" value="{!! get_edit_input_pvr_old_value_with_obj('alert_date_4',$room, 'alert_date_4')!!}">
                                    {!! get_form_error_msg($errors, 'alert_date_4') !!}
                                </div>
                            </div>                                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Message 4</label>
                                    <br><br>
                                    <textarea name="alert_msg_4" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('alert_msg_4',$room,'alert_msg_4')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'alert_msg_4') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Date 5</label>
                                    <input type="text" class="form-control start_end_date" name="alert_date_5" value="{!! get_edit_input_pvr_old_value_with_obj('alert_date_5',$room, 'alert_date_5')!!}">
                                    {!! get_form_error_msg($errors, 'alert_date_5') !!}
                                </div>
                            </div>                                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Alert Message 5</label>
                                    <br><br>
                                    <textarea name="alert_msg_5" rows="5" style="width:100%;margin-top: -20px" >{!! get_edit_input_pvr_old_value_with_obj('alert_msg_5',$room,'alert_msg_5')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'alert_msg_5') !!}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/plugins/momentjs/moment.js"></script>
    <script src="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript">
         $('.start_end_date').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            time: false
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
    </script>
@endsection