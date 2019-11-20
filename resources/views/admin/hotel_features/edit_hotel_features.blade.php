@extends('admin.hotel_features.add_hotel_features')
@section('edit_feature_id', '/'.$feature->id)
@section('method_field')
{{method_field('PUT')}}
@endsection