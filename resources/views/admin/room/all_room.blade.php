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
                <div class="card room_list">
                    <div class="header">
                        <h4>Rooms &nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/room/create')}}">Add-Room</a></button>
                        @if(!empty($trash_count))
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="{{url('admin/room/trash')}}">View Trash &nbsp;<span class="badge badge-danger">{{$trash_count}}</span></a></button>
                       @endif
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Old room id</th>
                                    <th>Room code</th> 
                                    <th>Hotel Name</th>
                                    <th>Room Type</th>         
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <td>{{++$loop->index}}</td>      
                                    <td>
                                        <span class="text-muted">{{$room->room_title}}</span>
                                    </td>
                                    <td>
                                        {{$room->old_room_id}}
                                    </td>
                                    <td>
                                        {{$room->id}}
                                    </td>
                                    <td>
                                        <span class="text-muted">
                                        @if(!empty($room->hotel))
                                            {{ $room->hotel->hotel_name }}
                                        @endif
                                        </span></td>
                                    <td>
                                        <span class="text-muted">
                                        @if(!empty($room->room_type_name))
                                            {{ $room->room_type_name->room_type}}
                                        @endif</span>
                                    </td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/room/'.$room->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/room/gallery/'.$room->id) }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-image" title="Gallery"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">    
                                        <a href="{{ url('admin/room/'.$room->id.'/room_stock') }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="material-icons" title="Room Stock">local_hotel</i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">    
                                        <a href="{{ url('admin/room/'.$room->id.'/room_prices') }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="material-icons" title="price">euro_symbol</i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red room_del_btn" item_id="{{$room->id}}">
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
                <form id='del_room_form' method="POST" action="{{url('admin/room')}}" style="display: none">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
            </div>
        </div>
@endsection
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
        $('.room_list').on('click', '.room_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to move this room into trash container.')){   
             var action=$('#del_room_form').attr('action');
             $('#del_room_form').attr('action', action+'/'+id);
             $('#del_room_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
@endsection

