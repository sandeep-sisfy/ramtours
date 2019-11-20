@extends('admin.setting.homepage.add_homepage_setting')
@section('edit_homepage_id', '/'.$homepage->id)
@section('method_field')
{{method_field('PUT')}}
@endsection