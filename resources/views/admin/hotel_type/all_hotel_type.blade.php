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
                <div class="card hotel_list">
                    <div class="header">
                        <h4>Hotel Type&nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/hotel-type/create')}}">Add Hotel Type</a></button>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered table-striped  pack_table dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hotel Type</th>
                                    <th data-breakpoints="sm xs">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotels as $hotel)
                                <tr> 
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$hotel->hotel_type}}</td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/hotel-type/'.$hotel->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red hotel_del_btn" item_id="{{$hotel->id}}"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <form id='del_hotel_form' method="POST" action="{{url('admin/hotel-type')}}" style="display: none">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
                </div>
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
        $('.hotel_list').on('click', '.hotel_del_btn', function(event) {
            event.preventDefault();
            var id= $(this).attr('item_id');
               if(confirm('Are You sure to delete this Hotel Type.')){
                 var action=$('#del_hotel_form').attr('action');
                 $('#del_hotel_form').attr('action', action+'/'+id);
                 $('#del_hotel_form').submit();
               }
        });
        $('.pack_table').DataTable();
    </script>
@endsection

