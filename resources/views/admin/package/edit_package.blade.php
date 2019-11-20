@extends('admin.package.add_package')
@section('edit_package_id', '/'.$package->id)
@section('nav-tabs')
<ul class="nav nav-tabs">
	<li class="nav-item"><a class="nav-link active" data-toggle="tab" onclick="window.location.href='{{url('admin/package/'.$package->id.'/edit')}}'">Package Info</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab"  onclick="window.location.href='{{url('admin/package-meta/'.$package->id)}}'">Meta data</a></li>
</ul>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection