@extends('admin.review.add_review')
@section('edit_review_id', '/'.$review->id)
@section('method_field')
{{method_field('PUT')}}
@endsection