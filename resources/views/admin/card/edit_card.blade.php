@extends('admin.card.add_card')
@section('edit_card_id', '/'.$card->id)
@section('nav-tabs')
	<li class="nav-item"><a class="nav-link active"  href="javscript:void(0)" data-toggle="tab" >card Info</a></li>	
	<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/card/'.$card->id.'/page')}}'" >Card Page</a></li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection
@section('card_img')
@if(!empty($card->image))
<div class="form-group">
    <label for="previous">Card Image: </label>
	<img src="{{ rami_get_file_url($card->image) }}" width="75" height="75" alt="card Image">
</div>
@endif
@endsection