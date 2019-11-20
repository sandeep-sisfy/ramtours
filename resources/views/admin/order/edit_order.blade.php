@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css"/>
@endsection
@section('admin_container')
@php 
    if(empty($cat))
    $cat='';
@endphp
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{url('/admin/orders-detail/'.$order->id)}}" method="POST" accept-charset="utf-8" id="edit_order" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        
                            @section('method_field')
                            {{method_field('PUT')}}
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="col-lg-3 col-md-6 form-control"  value="{{ $order->low_profile_code }}" readonly="true" >
                                    <label class="form-label">Low Profile Code</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="col-lg-3 col-md-6 form-control"  value="{{ $order->internal_deal_number }}" readonly="true" >
                                    <label class="form-label">Codecom deal number id</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="col-lg-3 col-md-6 form-control"  value="{{ $order->tran_id }}" readonly="true" >
                                    <label class="form-label">Transection id</label>
                                </div>
                            </div>                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="{{ $order->payee_name }}" readonly="true" >
                                    <label class="form-label">Payee Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="col-lg-3 col-md-6 form-control"  value="{{ $order->payee_email_id }}" readonly="true" >
                                    <label class="form-label">Payee Email</label>
                                </div>
                            </div>                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="{{ $order->item_name}}" readonly="true">
                                    <label class="form-label">Item Name</label>
                                </div>
                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control"  value="{{ $order->total_amount_skl }}" readonly="true">
                                    <label class="form-label">Total Amount</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control"  value="{{ $order->amount_paid_in_skl }}" readonly="true">
                                    <label class="form-label">Amount Paid</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control"  value="{{ $order->total_amount_skl-$order->amount_paid_in_skl }}" readonly="true">
                                    <label class="form-label">Remaining Amount</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Payment Status : </label>
                                <input type="radio" name="payment_status" id="active" class="with-gap" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('payment_status',$order,'payment_status',1, 'chacked')!!}>
                                <label for="active" class="m-l-20">Success</label>
                                <input type="radio" name="payment_status" id="partial_payment" class="with-gap" value="4" {!!get_edit_select_check_pvr_old_value_with_obj('payment_status',$order,'payment_status',4, 'chacked')!!}>
                                <label for="partial_payment" class="m-l-20">Partical Payment</label>
                                <input type="radio" name="payment_status" id="pending" class="with-gap" value="2" {!!get_edit_select_check_pvr_old_value_with_obj('payment_status',$order,'payment_status',2, 'chacked')!!}>
                                <label for="pending" class="m-l-20">Pending</label>
                                <input type="radio" name="payment_status" id="disable" class="with-gap" value="3" {!!get_edit_select_check_pvr_old_value_with_obj('payment_status',$order,'payment_status',3, 'chacked')!!}>
                                <label for="disable" class="m-l-20">Failed</label>
                            </div>  
                             {!! get_form_error_msg($errors, 'payment_status') !!}                          
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Submit
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
@endsection

