@extends('admin.car.add_car_price')
@section('edit_price_id', '/'.$car_price->id)
@section('nav-tabs')
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/car/'.$car_price->car_id.'/car_prices')}}'">car Price</a></li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection