@extends('admin.flight_schedule.add_flight_schedule')
@section('edit_flight_schedule_id', '/'.$flight_schedule->id)
@section('method_field')
{{method_field('PUT')}}
@endsection
@section('nav-tabs')
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active"  onclick="window.location.href='{{url('admin/flight-schedule/'.$flight_schedule->id.'/edit')}}'" data-toggle="tab">Flight schedule Info</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/flight-schedule-alert/'.$flight_schedule->id)}}'">Flight schedule Alert</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/flight-schedule-meta/'.$flight_schedule->id)}}'">Meta data</a></li>
    </ul>
@show
@section('method_field')
@if(!empty($flight_schedule->current_price))
<div class="form-group form-float">
    <div class="form-line">
        <input type="text" class="form-control" name="current_price" value="{{ $flight_schedule->current_price }}">        
        <label class="form-label">Price per person</label>
    </div>
</div>
@endif
@endsection