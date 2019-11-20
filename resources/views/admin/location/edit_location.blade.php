@extends('admin.location.add_location')
@section('location_id', '/'.$location->id)
@section('main_locaton_check', $local_main_check);
@section('nav-tabs')
<ul class="nav nav-tabs">
	<li class="nav-item"><a class="nav-link active"  href="javscript:void(0)" data-toggle="tab">Location Info</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$location->id.'/package-setting/1')}}'">F+H+C Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$location->id.'/package-setting/3')}}'">F+C Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$location->id.'/package-setting/4')}}'">Flight Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/hotelmeta/'.$location->id)}}'">Location Hotel Meta Data</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/flightmeta/'.$location->id)}}'">Location flight Meta Data</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/packagemeta/'.$location->id)}}'">Location package Meta Data</a></li>
</ul>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection
@section('location_image')
@if(!empty($location->loc_map))
<div class="form-group">
    <label for="previous">Locatation Map Image: </label>
	<img src="{{ rami_get_file_url($location->loc_map) }}" width="75" height="75" alt="location_image">
</div>
@endif

@endsection