@extends('frontend.home_main')
@section('rami_front_container')
   <section class="rt_error">
     <div class="container">
      <div class="row">
        <div class="col-md-12">
        <img src="{{url('assets/front/images/payment-error.png')}}" alt="Payment Error">
        <h5>שגיאת תשלום </h5>
        <p>מצטער ! לא ניתן לעבד את התשלום שלך. בבקשה נסה שוב</p>
        </div>
      </div>
     </div>
  </section>  
@endsection
@section('rami_front_footer_js')
@parent
<script type="text/javascript">
  $.ajax({
    url: '{{ url("auto/setup_all_package_cost")}}',
    type: 'GET',
  })
</script>
@endsection

