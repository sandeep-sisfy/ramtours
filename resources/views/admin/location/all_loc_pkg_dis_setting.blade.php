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
                <div class="card setting_list">
                    <div class="header">
                        <h4>All Package Settings via Location &nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect "><a href="{{url('admin/location/'.$loc_id.'/package-setting/'.$pkg_type.'/page_content')}}">Add Location Page Content</a></button>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn restore_all_btn"><a href="{{url('admin/location')}}">All Locations</a></button>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_right_btn rami_admin_btn force_del_all_btn"><a href="{{url('admin/location/'.$loc_id.'/package-setting/'.$pkg_type.'/create')}}">Add-new-Settings</a></button>                        
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Location Name</th>
                                    <th>Package Type</th>
                                    <th>Sequence</th>
                                    <th>Month</th>
                                    <th>Title</th>
                                    <th>Skip dates</th>
									<th data-breakpoints="sm xs">Action</th>
								</tr>
                            </thead>
                            <tbody>
                                @foreach($all_pkg_settings as $pkg_setting)
                                <tr> 
                                    <td>{{++$loop->index}}</td>
                                    <td><h5>{{get_location_name($pkg_setting->loc_id)}}</h5></td>
                                    <td>{{get_package_type($pkg_setting->pkg_type)}}</td>
                                    <td>
                                       {{ $pkg_setting->sequence }}
                                    </td>
                                    <td>
                                       {{get_month_name($pkg_setting->month) }}
                                    </td>
                                    <td>
                                       {{ $pkg_setting->title }}
                                    </td>
                                    <td>
                                       {{ $pkg_setting->skip_date }}
                                    </td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/package-setting/'.$pkg_setting->pkg_type.'/edit/'.$pkg_setting->id) }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red set_del_btn" item_id="{{$pkg_setting->id}}"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <form id='del_set_form' method="POST" action="{{url('admin/package-setting')}}" style="display: none">
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
        $('.setting_list').on('click', '.set_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to delete this setting.')){   
             var action=$('#del_set_form').attr('action');
             $('#del_set_form').attr('action', action+'/'+id);
             $('#del_set_form').submit();
            }
        });
        $('.pack_table').DataTable();
    </script>
@endsection