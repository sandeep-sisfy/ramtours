@extends('admin.pkg_person.add_pkg_person')
@section('edit_pkg_person_id', '/'.$pkg_person->id)
@section('method_field')
{{method_field('PUT')}}
@endsection