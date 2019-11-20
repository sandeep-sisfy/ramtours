@extends('admin.hotel_amenities.add_hotel_amenities')
@section('edit_amenities_id', '/'.$amenity->id)
@section('method_field')
{{method_field('PUT')}}
@endsection