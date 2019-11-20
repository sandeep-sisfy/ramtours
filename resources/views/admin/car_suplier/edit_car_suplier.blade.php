@extends('admin.car_suplier.add_car_suplier')

@section('edit_car_suplier_id', '/'.$car->id)

@section('method_field')

{{method_field('PUT')}}

@endsection

@section('car_suplier_logo')

<div class="form-group">

    <label for="previous">Car Supplier Logo: </label>

	<img src="{{ rami_get_file_url($car->car_suplier_logo) }}" width="75" height="75" alt="car logo">

</div>

@endsection