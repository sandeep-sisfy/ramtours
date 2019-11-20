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
        {!!show_flash_msg()!!}
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card car_list">
                    <div class="header">
                       <h4>Cars&nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                       <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/car/create')}}">Add Car</a></button>
                       @if(!empty($trash_count))
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="{{url('admin/car/trash')}}">view Trash &nbsp;<span class="badge badge-danger">{{$trash_count}}</span></a></button>
                       @endif
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered table-striped pack_table dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Car Supplier</th>
                                    <th>Car Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $car)        
                                <tr>
                                    <td>{{++$loop->index}}</td>  
                                    <td><span class="text-muted">{{$car->car_title}}</span></td>
                                    <td><span class="text-muted">
                                        @if(!empty($car->car_supp_name))
                                            {{ $car->car_supp_name->car_suplier_name }}
                                        @endif
                                    </span></td>
                                    <td><span class="text-muted">{{ $car->car_loc_name->loc_name }}</span></td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/car/'.$car->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/car/'.$car->id.'/car_prices') }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="material-icons" title="price">euro_symbol</i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red car_del_btn" item_id="{{$car->id}}">
                                            <i class="zmdi zmdi-delete" title="delete"></i>
                                        </a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_car_form' method="POST" action="{{url('admin/car')}}" style="display: none">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
            </div>
        </div>
@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/bundles/datatablescripts.bundle.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{ $assets_admin }}/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
    <script type="text/javascript">
        $('.car_list').on('click', '.car_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to move this car into trash container.')){   
             var action=$('#del_car_form').attr('action');
             $('#del_car_form').attr('action', action+'/'+id);
             $('#del_car_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
@endsection