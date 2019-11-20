@extends('admin.attraction.add_attraction')
@section('edit_attraction_id', '/'.$attraction->id)
@section('method_field')
{{method_field('PUT')}}
@endsection