@extends('frontend.home_main')
@section('rami_front_container')
<section class="bfheader">
    <div class="container">
        <div class="row contact-heading-box">
            <div class="col-md-6">
                <p>תשלום עבור ההזמנה </p>
            </div>
        </div>
    </div>
</section>
<section class="test-cont">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-content rt_tstmn">

                    <iframe class="payment_iframe" src={{$url}}></iframe>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection