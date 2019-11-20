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
                <div class="card amenity_list">
                    <div class="header">
                        <h4>Amenities &nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/hotel-amenities/create')}}">Add-Amenities</a></button>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered table-striped  pack_table dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amenity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                @foreach($amenities as $amenity)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    {{-- <td><img src="{{ rami_get_file_url($hotel->company_logo) }}" width="50" height="50" alt="car logo img"></td> --}}   
                                    <td>{{$amenity->hotel_amenities}}</td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/hotel-amenities/'.$amenity->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red amenity_del_btn" item_id="{{$amenity->id}}"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_amenity_form' method="POST" action="{{url('admin/hotel-amenities')}}" style="display: none">
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
        $('.amenity_list').on('click', '.amenity_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to delete this hotel Amenity.')){   
             var action=$('#del_amenity_form').attr('action');
             $('#del_amenity_form').attr('action', action+'/'+id);
             $('#del_amenity_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
@endsection

