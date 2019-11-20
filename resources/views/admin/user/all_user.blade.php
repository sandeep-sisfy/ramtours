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
                <div class="card user_list">
                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered table-striped  pack_table dataTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail</th>
                                    <th data-breakpoints="sm xs">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><img src="{{ city_get_file_url($user->image) }}" width="50" height="50" alt="user img"></td>
                                    <td><h5>{{$user->fname}}</h5></td>
                                    <td><h5>{{$user->lname}}</h5></td>
                                    <td><h5>{{$user->email}}</h5></td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red user_del_btn" item_id="{{$user->id}}"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <form id='del_user_form' method="POST" action="{{url('admin/user')}}" style="display: none">
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
        $('.user_list').on('click', '.user_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
           if(confirm('Are You sure to delete this User.')){   
             var action=$('#del_user_form').attr('action');
             $('#del_user_form').attr('action', action+'/'+id);
             $('#del_user_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
@endsection
