@extends('admin.room.add_room')
@section('edit_room_id', '/'.$room->id)
@section('nav-tabs')
	<li class="nav-item"><a class="nav-link active"  href="javscript:void(0)" data-toggle="tab">Room Info</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{url('admin/room/gallery/'.$room->id)}}" onclick="window.location.href='{{url('admin/room/gallery/'.$room->id)}}'">Gellery</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/room/'.$room->id.'/room_prices')}}'">Room Price</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/room-alert/'.$room->id)}}'">Room Alerts</a></li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection