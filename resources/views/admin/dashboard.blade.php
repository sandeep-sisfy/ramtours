@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
	<div class="container-fluid">
       {!! show_flash_msg() !!}
        <div class="row clearfix city_main_content">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial1" value="{{$all_flights_sche}}" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#00ced1" readonly>
                        <h6 class="m-t-20">Flights</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial2" value="{{$all_cars}}" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#ffa07a" readonly>
                        <h6 class="m-t-20">Cars</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial3" value="{{$all_hotels}}" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#8fbc8f" readonly>
                        <h6 class="m-t-20">Hotels</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial4" value="{{$all_packages}}" data-width="90" data-height="90" data-thickness="0.05" data-fgColor="#00adef" readonly>
                        <h6 class="m-t-20">Packages</h6>
                    </div>
                </div>
            </div>            
        </div>

@endsection