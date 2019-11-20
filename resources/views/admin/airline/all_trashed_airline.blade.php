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
                <div class="card airline_list">
                    <div class="header">
                        <h4>Trashed Airlines&nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                        @if(!empty($all_count))
                    		<button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn airline_res_btn"><a href="{{url('admin/airline/restore')}}">Restore All</a></button>
                            <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_right_btn rami_admin_btn force_del_btn"><a href="{{url('admin/airline/destroy')}}">Delete All</a></button>
                        @endif                        
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Title</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                @foreach($trash_airline as $airline)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td><img src="{{ rami_get_file_url($airline->airl_logo_img) }}" width="50" height="50" alt="airline logo img"></td>
                                    <td>{{$airline->airl_title}}</td>
                                    <td>{{$airline->airl_cont_1}}</td>
                                    <td>{{$airline->airl_email}}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-green airline_res_single_btn" item_id="{{$airline->id}}">
                                                <i class="zmdi zmdi-edit" title="Restore"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="javascript:void(0)" class="btn btn-default waves-effect waves-float waves-red airl_del_btn" item_id="{{$airline->id}}"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_airl_form' method="POST" action="{{url('admin/airline/destroy')}}" style="display: none">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
                <form id='res_airline_form' method="POST" action="{{url('admin/airline/restore')}}" style="display: none">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
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
        $('.airline_list').on('click', '.airl_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to delete this Airline')){   
             var action=$('#del_airl_form').attr('action');
             $('#del_airl_form').attr('action', action+'/'+id);
             $('#del_airl_form').submit();
           }
        });
        $('.airline_list').on('click', '.force_del_btn', function(event) {
            event.preventDefault(); 
            if(confirm('Are you sure to delete all Trash Airline')){   
             var action=$('#del_airl_form').attr('action');
             $('#del_airl_form').submit();
           }
        });
        $('.airline_list').on('click', '.airline_res_single_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to restore this Airline')){   
                var action=$('#res_airline_form').attr('action');
                $('#res_airline_form').attr('action', action+'/'+id);
                $('#res_airline_form').submit();
            }
        });
        $('.airline_list').on('click', '.airline_res_btn', function(event) {
            event.preventDefault(); 
            if(confirm('Are you sure to restore all Trash Airline')){   
                var action=$('#res_airline_form').attr('action');
                $('#res_airline_form').submit();
            }
        });
        $('.pack_table').DataTable();
    </script>
@endsection

