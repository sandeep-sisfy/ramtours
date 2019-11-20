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
                <div class="card pack_list">
                    <div class="header">
                        <h4>Pack Person &nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/package-person/create')}}">Add-Pack-Person</a></button>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pack Title</th>
                                    <th>Adult</th>
                                    <th>Child</th>{{-- 
                                    <th>status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pkg_persons as $pkg_person)
                                <tr>
                                    <td>{{++$loop->index}}</td>                                    
                                    <td><span class="text-muted">{{$pkg_person->pkg_title}}</span></td>
                                    <td><span class="text-muted">{{$pkg_person->adults}}</span></td>
                                    <td><span class="text-muted">{{$pkg_person->childs}}</span></td>
                                    
                                  {{--   @php
                                        if($pkg_person->pkg_status=='1'){
                                            $pkg_status='active';
                                        }else{
                                            $pkg_status='in active';
                                        }
                                    @endphp
                                    <td><span class="text-muted">{{$pkg_status}}</span></td> --}}
                                    <td>
                                        <a href="{{ url('admin/package-person/'.$pkg_person->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red pack_del_btn" item_id="{{$pkg_person->id}}">
                                            <i class="zmdi zmdi-delete" title="delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_pack_form' method="POST" action="{{url('admin/package-person')}}" style="display: none">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
            </div>
        </div>
@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{ $assets_admin }}/js/pages/tables/footable.js"></script><!-- Custom Js --> 
    <script type="text/javascript">
        $('.pack_list').on('click', '.pack_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are You sure to delete this Attraction.')){   
             var action=$('#del_pack_form').attr('action');
             $('#del_pack_form').attr('action', action+'/'+id);
             $('#del_pack_form').submit();
           }
        });
    </script>
@endsection