@extends('admin.car_features.add_car_features')
@section('edit_feature_id', '/'.$feature->id)
@section('method_field')
{{method_field('PUT')}}
@endsection