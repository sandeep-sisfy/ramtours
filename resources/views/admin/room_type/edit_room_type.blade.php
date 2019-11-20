@extends('admin.room_type.add_room_type')
@section('edit_room_id', '/'.$room->id)
@section('method_field')
{{method_field('PUT')}}
@endsection