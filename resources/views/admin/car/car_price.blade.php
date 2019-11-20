@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/footable-bootstrap/css/footable.bootstrap.min.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/footable-bootstrap/css/footable.standalone.min.css">
    <link rel="stylesheet" href="{{ $assets_admin }}/css/ecommerce.css">
@endsection
@section('admin_container')
    <div class="container-fluid">
        {!!show_flash_msg()!!}
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card car_price_list">
                    <div class="header">
                        <h4>Car Price for "{{ $car_name }}" &nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                            <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/car/'.$car_id.'/car_prices/create')}}">Add-Car-Price</a></button> 
                        @if(!empty($trash_count))
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="{{url('admin/room/trash')}}">view Trash &nbsp;<span class="badge badge-danger">{{$trash_count}}</span></a></button>
                       @endif
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Price Currency</th>       
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                    @if(!empty($car_prices))
                                    @foreach($car_prices as $price)                                   
                                    <tr>
                                        <td>{{++$loop->index}}</td> 
                                        <td><span class="text-muted">
                                                {{ $price->price_start_date }}
                                            </span></td>
                                        <td><span class="text-muted">
                                                {{ $price->price_end_date}}</span></td>
                                        </td>
                                        <td><span class="text-muted">
                                            {{ get_currency_symbol($price->price_currency) }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/car_prices/'.$price->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="zmdi zmdi-edit" title="Edit"></i>
                                            </a>                                        
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red car_del_btn" item_id="{{$price->id}}">
                                                <i class="zmdi zmdi-delete" title="delete"></i>
                                            </a>
                                        </td>
                                        </tr>
                                    @endforeach 
                                    @endif
                            </tbody>
                        </table>
                    </div>        
                </div>
                @if(!empty($car_prices))
                <form id='del_car_form' method="POST" action="{{url('admin/car_prices')}}" style="display:none">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
                @endif
            </div>
        </div>
@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{ $assets_admin }}/js/pages/tables/footable.js"></script><!-- Custom Js --> 
    <script type="text/javascript">
        $('.car_price_list').on('click','.car_del_btn', function(event) {
            event.preventDefault();           
            var id = $(this).attr('item_id');
            if(confirm('Are you sure to delete this price.')){   
                var action=$('#del_car_form').attr('action');
                $('#del_car_form').attr('action', action+'/'+id);
                $('#del_car_form').submit();
            }
        });
    </script>
@endsection