@extends('admin.hotel_type.add_hotel_type')
@section('edit_hotel_id', '/'.$hotel->id)
@section('method_field')
{{method_field('PUT')}}
@endsection