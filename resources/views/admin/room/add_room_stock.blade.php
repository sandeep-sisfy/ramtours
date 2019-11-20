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
   if(empty($room_stock))
    $room_stock='';
@endphp
 {!!show_flash_msg()!!}
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">                        
                        <form action="{{$form_url}}@yield('edit_stock_id')" id="add_room_price" method="POST" accept-charset="utf-8" >
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Start Date</label>
                                    <input type="text" class="form-control start_end_date" name="stock_start_date" value="{!! get_edit_input_pvr_old_value_with_obj('stock_start_date',$room_stock, 'stock_start_date')!!}">
                                    {!! get_form_error_msg($errors, 'stock_start_date') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">End Date</label>
                                    <input type="text" class="form-control start_end_date" name="stock_end_date" value="{!! get_edit_input_pvr_old_value_with_obj('stock_end_date',$room_stock, 'stock_end_date')!!}">
                                    {!! get_form_error_msg($errors, 'stock_end_date') !!}
                                </div>
                            </div>
                            <!--  <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="room_total" value="{!! get_edit_input_pvr_old_value_with_obj('room_total',$room_stock, 'room_total')!!}" >
                                    {!! get_form_error_msg($errors, 'room_total') !!}
                                    <label class="form-label">Room Total</label>
                                </div>
                            </div>  -->
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="room_available" value="{!! get_edit_input_pvr_old_value_with_obj('room_available',$room_stock, 'room_available')!!}">
                                    {!! get_form_error_msg($errors, 'room_available') !!}
                                    <label class="form-label">Room Available</label>
                                </div>
                            </div>   
                           
                                 
                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">
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
    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>
    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script src="{{ $assets_admin }}/plugins/momentjs/moment.js"></script>
    <script src="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript">
        $('.start_end_date').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            time: false
        });
          
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
                    maxlength:"Sub Category Name contain only 100 Charecters."
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }       
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