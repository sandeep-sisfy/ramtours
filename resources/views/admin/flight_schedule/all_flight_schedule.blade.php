@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent   
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
@endsection
@section('admin_container')
@php 
    if(empty($flight_schedules ))
    $flight_schedules ='';
@endphp
    <div class="container-fluid">
        {!!show_flash_msg()!!}
        <div class="row clearfix">
            <div class="col-lg-12">                
                <div class="card flight_sche_list">
                    <div class="header">
                       <h4>Flights Schedule&nbsp;<span class="badge badge-primary">{{$all_count}}</span></h4>
                       <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="{{url('admin/flight-schedule/create')}}">Add-Schedule</a></button>
                        @if(!empty($trash_count))                           
                           <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="{{url('admin/flight-schedule/trash')}}">view Trash &nbsp;<span class="badge badge-danger">{{$trash_count}}</span></a></button>
                        @endif
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Flight Name</th>
                                    {{-- <th>Flight Date</th> --}}
                                    <th>Airline</th>
                                    <th>PNR Number</th>
                                    <th>Total Seat</th>
                                    <th>Available</th>
                                    <th>Price/person</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($flight_schedules as $flight_schedule)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td><span class="text-muted">
                                       {{$flight_schedule->flight_sche_title}}
                                        </span>
                                    </td>
                                    {{--<td><span class="text-muted">
                                       {{rami_get_require_date_time_format($flight_schedule->up_departure_time, 'Y-m-d')}}
                                        </span>
                                    </td>--}}
                                    <td><span class="text-muted">
                                        @if(!empty($flight_schedule->airline_name))
                                        {{$flight_schedule->airline_name->airl_title}}
                                        @endif
                                        </span>
                                    </td>
                                    <td><span class="text-muted">{{$flight_schedule->flight_pnr_no}}</span></td>
                                    <td><span class="text-muted">{{$flight_schedule->num_total_seat}}</span></td>
                                    <td><span class="text-muted">{{$flight_schedule->num_available_seat}}</span></td>
                                    <td><span class="text-muted">$ {{ get_rami_flight_price_for_single_flight($flight_schedule->id)}}</span></td>
                                    @php
                                        if($flight_schedule->flight_sche_status==1){
                                          $flight_sche_status='Active';
                                        }else{
                                          $flight_sche_status='In Active';
                                        }
                                    @endphp
                                    <td>
                                    	<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a target="_blank" href="{{ url('flight-detail/'.$flight_schedule->id) }}" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="material-icons" title="view" style="top:0px">pageview</i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="{{ url('admin/flight-schedule/'.$flight_schedule->id.'/edit') }}" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="zmdi zmdi-edit" title="Edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red flight_sche_del_btn" item_id="{{$flight_schedule->id}}">
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
                <form id='del_flight_sche_form' method="POST" action="{{url('admin/flight-schedule')}}" style="display: none">
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
        $('.flight_sche_list').on('click', '.flight_sche_del_btn', function(event) {
            event.preventDefault();
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to move this flight schedule into trash container.')){
                var action=$('#del_flight_sche_form').attr('action');
                $('#del_flight_sche_form').attr('action', action+'/'+id);
                $('#del_flight_sche_form').submit();
            }
        });
        $('.pack_table').DataTable();
    </script>
@endsection