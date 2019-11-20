@extends('admin.location.add_loc_pkg_dis_setting'){{-- 
@section('loc_id', '/'.$loc->id) --}}
@section('nav-tabs')
	<li class="nav-item"><a class="nav-link active"  href="javscript:void(0)" data-toggle="tab">Location Info</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$loc_pkg_setting->loc_id.'/package-setting/1')}}'">F+H+C Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$loc_pkg_setting->loc_id.'/package-setting/3')}}'">F+C Setting</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/location/'.$loc_pkg_setting->loc_id.'/package-setting/4')}}'">Flight Setting</a></li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection