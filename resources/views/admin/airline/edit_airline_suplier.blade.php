@extends('admin.airline.add_airline_suplier')

@section('edit_airline_id', '/'.$airline->id)

@section('method_field')

{{method_field('PUT')}}

@endsection

@section('airl_logo_img')

<div class="form-group">

    <label for="previous">Airline Logo: </label>

	<img src="{{ rami_get_file_url($airline->airl_logo_img) }}" width="75" height="75" alt="airline logo">

</div>

@endsection