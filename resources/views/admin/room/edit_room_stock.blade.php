@extends('admin.room.add_room_stock')
@section('edit_stock_id', '/'.$room_stock->id)
@section('nav-tabs')	
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{url('admin/room/'.$room_stock->room_id.'/room_stock')}}" onclick="window.location.href='{{url('admin/room/'.$room_stock->room_id.'/room_prices')}}'">Room Price</a>
	</li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection