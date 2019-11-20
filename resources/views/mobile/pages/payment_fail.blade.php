@extends('mobile.home_main')
@section('mobile_container')
<section class="rt_error">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
              <img src="{{url('assets/mobile')}}/images/payment-error.png" class="img-fluid" alt="Payment Error">
              <h5>שגיאת תשלום </h5>
              <p>מצטער ! לא ניתן לעבד את התשלום שלך. בבקשה נסה שוב</p>
              </div>
            </div>
           </div>
</section>
@endsection
@section('rami_mobile_footer_js')
@parent
<script type="text/javascript">
  $.ajax({
    url: '{{ url("auto/setup_all_package_cost")}}',
    type: 'GET',
  })
</script>
@endsection