@extends('admin.location.add_loc_page_content')
@section('page_id', '/'.$page->id)
@section('method_field')
{{method_field('PUT')}}
@endsection