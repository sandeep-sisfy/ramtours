@extends('frontend.home_main')
@section('rami_front_container')
     <section class="rt_error">
     <div class="container">
      <div class="row">
        <div class="col-md-12">
        <img src="{{url('assets/front/images/payment-success.png')}}" alt="Payment Successful">
        <h5>התשלום הצליח  </h5> 
        <p>תודה ! התשלום שלך התקבל בהצלחה  <br> אנא בדוק בדוא"ל שלך את אישור ההזמנה. </p>
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
