@extends('admin.room.add_room_price')
@section('edit_price_id', '/'.$room_price->id)
@section('nav-tabs')	
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{url('admin/room/'.$room_price->room_id.'/room_prices')}}" onclick="window.location.href='{{url('admin/room/'.$room_price->room_id.'/room_prices')}}'">Room Price</a>
	</li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection