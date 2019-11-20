@extends('admin.hotel.add_hotel')
@section('edit_hotel_id','/'.$hotel->id)
@section('nav-tabs')
	<li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">Hotel Info</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{url('admin/hotel/gallery/'.$hotel->id)}}" onclick="window.location.href='{{url('admin/hotel/gallery/'.$hotel->id)}}'">Gellery</a></li>
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/hotel-meta/'.$hotel->id)}}'">Meta data</a></li>
@endsection
{{--  for dynamic hotel code as per location- 
 @section('hotel_code')
	@if(!empty($hotel->hotel_code))
	<div class="form-group form-float">
		<div class="form-line">
		    <input type="text" class="form-control" value="{{ $hotel->hotel_code }}" readonly="true">
		    <label class="form-label">Hotel Code</label>
		</div>
	</div>
	@endif
@endsection --}}
@section('method_field')
{{method_field('PUT')}}
@endsection