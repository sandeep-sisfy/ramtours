@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link href="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($review))
    $review='';
    if(empty($hotels))
     $hotels='';   
@endphp
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
             {!!show_flash_msg()!!}
        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="body">                        

                        <form action="{{url('admin/review')}}@yield('edit_review_id')" id="add_review" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            @section('method_field')

                            @show                            

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="first_name" value="{!! get_edit_input_pvr_old_value_with_obj('first_name',$review,'first_name')!!}">

                                    {!! get_form_error_msg($errors, 'first_name') !!}

                                    <label class="form-label">First Name</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="text" class="form-control" name="last_name" value="{!! get_edit_input_pvr_old_value_with_obj('last_name',$review,'last_name')!!}">

                                    {!! get_form_error_msg($errors, 'last_name') !!}

                                    <label class="form-label">Last Name</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="email" class="form-control" name="email" value="{!! get_edit_input_pvr_old_value_with_obj('email',$review,'email')!!}">

                                    {!! get_form_error_msg($errors, 'email') !!}

                                    <label class="form-label">Email</label>

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <select class="form-control show-tick" name="hotel_id" data-live-search="true">

                                        <option value="">Select Hotel</option>

                                        @if(!empty($hotels))

                                        @foreach($hotels as $hotel)

                                        <option value="{{$hotel->id}}" {{get_edit_select_check_pvr_old_value_with_obj('hotel_id', $hotel, 'hotel_id', $hotel->id , 'select')}}>{{$hotel->hotel_name}}</option>

                                        @endforeach

                                        @endif                                      

                                    </select>

                                    <label class="form-label">Hotel</label>

                                </div>

                                {!! get_form_error_msg($errors, 'hotel_id') !!}

                            </div>
                            <div class="form-group form-float">

                                <div class="form-line">

                                    <input type="number" class="form-control" name="rating" value="{!! get_edit_input_pvr_old_value_with_obj('rating',$review,'rating')!!}">

                                    {!! get_form_error_msg($errors, 'rating') !!}

                                    <label class="form-label">Rating</label>

                                </div>

                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title_review" value="{!! get_edit_input_pvr_old_value_with_obj('title_review',$review,'title_review')!!}">
                                    {!! get_form_error_msg($errors, 'title_review') !!}
                                    <label class="form-label">Title Review</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Review</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="review">{!! get_edit_input_pvr_old_value_with_obj('review',$review,'review')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'review') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control review_date  change_title_class" name="review_date" value="{!! get_edit_input_pvr_old_value_with_obj('review_date',$review,'review_date')!!}">
                                    {!! get_form_error_msg($errors, 'review_date') !!}
                                    <label class="form-label">Review Date</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>
    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
    <script src="{{ $assets_admin }}/plugins/momentjs/moment.js"></script>
    <script src="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
    <script type="text/javascript">
        $('.review_date').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            time: true
        });
        $("#add_tag").validate({
            rules: {
                title:{
                    required: true,
                    maxlength: 100,
                },
                contact_no:{
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Please enter Name here.",
                    maxlength:"Sub Category Name contain only 100 Charecters ."
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }
            }
        });
    </script>
@endsection