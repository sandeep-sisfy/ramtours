@extends('admin.car.add_car')
@section('edit_car_id', '/'.$car->id)
@section('nav-tabs')
	<li class="nav-item"><a class="nav-link active"  href="javscript:void(0)" data-toggle="tab">car Info</a></li>	
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/car/'.$car->id.'/car_prices')}}'">Car Price</a></li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection
@section('car_img')
<div class="form-group">
    <label for="previous">Car Image: </label>
	<img src="{{ rami_get_file_url($car->image) }}" width="75" height="75" alt="car Image">
</div>
@endsection