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
                <div class="card card_list">
                    <div class="header">
                       <h4>Cards&nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                       <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/card/create')}}">Add Card</a></button>
                       @if(!empty($trash_count))
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="{{url('admin/card/trash')}}">view Trash &nbsp;<span class="badge badge-danger">{{$trash_count}}</span></a></button>
                       @endif
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered table-striped pack_table dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <!-- <th>Card Price Currency</th>
                                    <th>Card Price</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cards as $card)        
                                <tr>
                                    <td>{{++$loop->index}}</td>  
                                    <td><span class="text-muted">{{$card->card_title}}</span></td>
                                   <!--  <td><span class="text-muted">{!! get_currency_symbol($card->price_currency) !!}</span></td>
                                    <td><span class="text-muted">{{$card->price}}</span></td> -->
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="{{ url('admin/card/'.$card->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit"></i>
                                        </a>
                                    </div>                                    
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red card_del_btn" item_id="{{$card->id}}">
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
                <form id='del_card_form' method="POST" action="{{url('admin/card')}}" style="display: none">
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
        $('.card_list').on('click', '.card_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to move this card into trash container.')){   
             var action=$('#del_card_form').attr('action');
             $('#del_card_form').attr('action', action+'/'+id);
             $('#del_card_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
@endsection