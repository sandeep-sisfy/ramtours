@extends('admin.testimonial.add_testimonial')
@section('edit_testimonial_id', '/'.$testimonial->id)
@section('method_field')
{{method_field('PUT')}}
@endsection