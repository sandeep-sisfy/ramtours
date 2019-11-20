@extends('admin.page.add_otherpage_link')
@section('edit_pagelink_id', '/edit/'.$pagelink->id)
@section('method_field')
{{method_field('PUT')}}
@endsection
