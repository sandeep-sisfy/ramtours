@extends('admin.user.add_user')
@section('edit_user_id', '/'.$user->id)
@section('profile_header')
<div class="profile_info row">
    <div class="col-lg-3 col-md-4 col-12">
        <div class="profile-image float-md-right"> <img src="{{ city_get_file_url($user->image) }}"  width="105px" height="120px" alt="user"> </div>
    </div>
    <div class="col-lg-6 col-md-8 col-12">
        <h4 class="m-t-5 m-b-0"><strong>{{$user->fname}}</strong> {{$user->lname}}</h4>
        <span class="job_post">{{$user->email}}</span>
        <p>{!! $user->AboutDisc !!}</p>
    </div>                
</div>
@endsection
@section('user_image')
<div class="form-group">
	<label for="previous">Old User Image: </label>
	<img src="{{ city_get_file_url($user->image) }}" width="75" height="75" alt="user img">
</div>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection