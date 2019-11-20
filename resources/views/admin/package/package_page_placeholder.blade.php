@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <link href="{{ $assets_admin }}/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('admin_container')
<div class="container-fluid">
    {!!show_flash_msg()!!}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div>
                        <form action="{{url('/admin/package/package-page-placeholders')}}" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="row page_place_holder" style="border: 1px solid #ebebeb; margin: -5px;">
                                <h5 style="padding: 6px 10px 0 10px;margin-bottom: -10px;">Top Static Nav Placeholders</h5>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="basic_details" value="{{get_rami_page_placeholder('basic_details', 1)}}">
                                            {!! get_form_error_msg($errors, 'basic_details') !!}
                                            <label class="form-label">Basic details</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="apartment" value="{{get_rami_page_placeholder('apartment', 1)}}">
                                            {!! get_form_error_msg($errors, 'apartment') !!}
                                            <label class="form-label">Apartment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="gallery" value="{{get_rami_page_placeholder('gallery', 1)}}">
                                            {!! get_form_error_msg($errors, 'gallery') !!}
                                            <label class="form-label">Gallery</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="choice_of_apartments" value="{{get_rami_page_placeholder('choice_of_apartments', 1)}}">
                                            {!! get_form_error_msg($errors, 'choice_of_apartments') !!}
                                            <label class="form-label"> Choice of apartments  </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="hotel_review" value="{{get_rami_page_placeholder('hotel_review', 1)}}">
                                            {!! get_form_error_msg($errors, 'hotel_review') !!}
                                            <label class="form-label">Hotel Review</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="map" value="{{get_rami_page_placeholder('map', 1)}}">
                                            {!! get_form_error_msg($errors, 'map') !!}
                                            <label class="form-label">Map</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="flights" value="{{get_rami_page_placeholder('flights', 1)}}">
                                            {!! get_form_error_msg($errors, 'flights') !!}
                                            <label class="form-label">Flights</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="vehicle" value="{{get_rami_page_placeholder('vehicle', 1)}}">
                                            {!! get_form_error_msg($errors, 'vehicle') !!}
                                            <label class="form-label">Vehicle</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row page_place_holder" style="border: 1px solid #ebebeb; margin: 40px -5px;">
                                <h5 style="padding: 6px 10px 0 10px;margin-bottom: -10px;">Additional Text for defferect sections</h5>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_apartment" value="{{get_rami_page_placeholder('help_text_apartment', 1)}}">
                                            {!! get_form_error_msg($errors, 'help_text_apartment') !!}
                                            <label class="form-label">Apartment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_gallery" value="{{get_rami_page_placeholder('help_text_gallery', 1)}}">
                                            {!! get_form_error_msg($errors, 'help_text_gallery') !!}
                                            <label class="form-label">Gallery</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_apartment_info" value="{{get_rami_page_placeholder('help_text_apartment_info', 1)}}">
                                            {!! get_form_error_msg($errors, 'help_text_apartment_info') !!}
                                            <label class="form-label"> Hotel information  </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_attraction" value="{{get_rami_page_placeholder('help_text_attraction', 1)}}">
                                            {!! get_form_error_msg($errors, 'help_text_attraction') !!}
                                            <label class="form-label">Attractions</label>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_flights" value="{{get_rami_page_placeholder('help_text_flights', 1)}}">
                                            {!! get_form_error_msg($errors, 'help_text_flights') !!}
                                            <label class="form-label">Flights</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="help_text_vehicle" value="{{get_rami_page_placeholder('help_text_vehicle', 1)}}">
                                            {!! get_form_error_msg($errors, 'help_text_vehicle') !!}
                                            <label class="form-label">Vehicle</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection