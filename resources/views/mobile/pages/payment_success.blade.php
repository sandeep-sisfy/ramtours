@extends('mobile.home_nonav')
@section('mobile_container')
<section class="rt_error">
  <div class="container">
    <div class="row">
      <div class="col-md-12 payment_iframe">
        <img src="{{url('assets/front/images/payment-success.png')}}" alt="Payment Successful">
        <h5>עיסקה בוצעה בהצלחה </h5>
        <p>תודה ! התשלום שלך התקבל בהצלחה <br> אנא בדוק בדוא"ל שלך את אישור ההזמנה. </p>
      </div>
    </div>
  </div>
</section>
@endsection