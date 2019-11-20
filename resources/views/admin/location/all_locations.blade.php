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
                <div class="card location_list">
                    <div class="header">
                        <h4>Locations &nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/location/create')}}">Add-Location</a></button>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Location Name</th>
                                    <th>Location Parent</th>
									<th data-breakpoints="sm xs">Action</th>
								</tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                <tr> 
                                    <td>{{++$loop->index}}</td>
                                    
                                    <td><h5>{{$location->loc_name}}</h5></td>
                                    <td>
                                           {{get_child_location_parent_name_seq($location->loc_par)}}
                                    </td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/location/'.$location->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/location/'.$location->id.'/package-setting/1') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="material-icons" title="F+H+C">hotel</i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/location/'.$location->id.'/package-setting/3') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="material-icons" title="F+C"> directions_car</i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/location/'.$location->id.'/package-setting/4') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="material-icons" title="Flight">flight</i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red loc_del_btn" item_id="{{$location->id}}"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <form id='del_loc_form' method="POST" action="{{url('admin/location')}}" style="display: none">
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
        $('.location_list').on('click', '.loc_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to delete this Location')){   
             var action=$('#del_loc_form').attr('action');
             $('#del_loc_form').attr('action', action+'/'+id);
             $('#del_loc_form').submit();
            }
        });
        $('.pack_table').DataTable();
    </script>
@endsection