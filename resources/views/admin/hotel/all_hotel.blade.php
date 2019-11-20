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
                       <h4>Hotels&nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                       <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/hotel/create')}}">Add-Hotel</a></button>
                       @if(!empty($trash_count))
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="{{url('admin/hotel/trash')}}">Private Hotel &nbsp;<span class="badge badge-danger">{{$trash_count}}</span></a></button>
                       @endif
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>hotel name</th>
                                    <th>hotel code</th>
                                    <th>contact number</th>
                                    <th>Email</th>
                                    <th>website</th>
                                    <th>location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                    
                                @foreach($hotels as $hotel)
                                <tr>
                                    <td>{{++$loop->index}}
                                    </td>
                                    <td>{{$hotel->hotel_name}}
                                    </td>
                                    <td>{{$hotel->hotel_code}}</td>
                                    <td>{{$hotel->hotel_contact}}</td>
                                    <td>{{$hotel->hotel_email}}</td>
                                     <td>{{$hotel->hotel_website}}</td>
                                    <td>                                 
                                       @if(!empty($hotel->hotel_loction_name))
                                       {{$hotel->hotel_loction_name->loc_name}}
                                       @endif
                                    </td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a target="_blank" href="{{ url('accommodation-detail/'.$hotel->id) }}" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="material-icons" title="view" style="top:0px">pageview</i>
                                            </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/hotel/'.$hotel->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/hotel/gallery/'.$hotel->id) }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-image" title="Gallery"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red hotel_del_btn" item_id="{{$hotel->id}}"><i class="zmdi zmdi-delete" title="Private"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_hotel_form' method="POST" action="{{url('admin/hotel')}}" style="display: none">
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
        $('.hotel_list').on('click','.hotel_del_btn',function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to make this hote Private.')){   
              var action=$('#del_hotel_form').attr('action');
              $('#del_hotel_form').attr('action', action+'/'+id);
              $('#del_hotel_form').submit();
            }
        });
        $('.pack_table').DataTable();          
    </script>
@endsection

