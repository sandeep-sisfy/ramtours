@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
@endsection
@section('admin_container')
    <div class="container-fluid">
        @php
            if($payment_status=''){
                $payment_status='';
            }
        @endphp
        {!!show_flash_msg()!!}
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card order_list">
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>CardCom Deal Number</th>
                                    <th>Transection Id</th>
                                    <th>Customer Names</th>
                                    <th>Payment Status</th>
                                    <th>Total Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td><span class="text-muted">{{date('d-M-Y' , strtotime($order->created_at))}}</span></td>
                                    <td><span class="text-muted">{{$order->internal_deal_number}}</span></td>
                                    <td><span class="text-muted">{{$order->tran_id}}</span></td>
                                    <td><span class="text-muted">{{$order->payee_name}}</span></td>
                                    @php
                                    if($order->payment_status=='1'){
                                        $payment_status='success';
                                    }elseif($order->payment_status=='2'){
                                        $payment_status='pending';
                                    }elseif($order->payment_status=='3'){
                                        $payment_status='failed';
                                    }elseif($order->payment_status=='4'){
                                        $payment_status='Partial Payment';
                                    }
                                    @endphp
                                    <td><span class="text-muted">{{$payment_status}}</span></td>
                                    <td><span class="text-muted">{{$order->total_amount_skl}}</span></td>
                                    <td><span class="text-muted">{{$order->amount_paid_in_skl}}</span></td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href={{ url('admin/orders-detail/'.$order->id.'/edit') }} class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit order status"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red order_del_btn" item_id='{{$order->id}}'>
                                            <i class="zmdi zmdi-delete" title="Delete"></i>
                                        </a>
                                    </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <form id='del_order_form' method="POST" action="{{url('admin/orders-detail')}}" style="display: none">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
                 
            </div>
        </div>

@endsection
        {{-- <div class="modal fade" id="shipp_bill_model" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="largeModalLabel">Billing & Shipping Address</h4>
                    </div>
                    <div class="modal-body" id="shipp_bill_model_body">
                        

                     </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div> --}}

@section('admin_jscript')
@parent
    <!-- Jquery DataTable Plugin Js --> 
    <script src="{{ $assets_admin }}/bundles/datatablescripts.bundle.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
    <script type="text/javascript">
        $('.pack_table').DataTable();
        $('.order_list').on('click', '.order_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
           if(confirm('Are you sure to delete this Order Details.')){   
             var action=$('#del_order_form').attr('action');
             $('#del_order_form').attr('action', action+'/'+id);
             $('#del_order_form').submit();
           }
        });
        $('.order_list').on('click', '.get_shiping_billing_add', function(event) {
           var order_id=$(this).attr('order_id');
           $.ajax({
               url: '{{ url("/admin/orders-detail/get_billing_shipping")}}',
               type: 'POST',
               data: {_token: $('input[name=_token]').val(), order_id:order_id,type:1},
           })
           .done(function(res) {
              $('#shipp_bill_model_body').empty();
               $('#shipp_bill_model_body').append(res);
               $('#shipp_bill_model').modal('show');
           })
           .fail(function() {
               alert('somrthing Went Wrong');
           })
           
        });
        
    </script>
@endsection