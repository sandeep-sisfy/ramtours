@extends('frontend.home_main')
@section('rami_front_container')
<section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">  
       <div class="inner-page-breadcrum">
    <strong>::</strong> <a href="{{ url('/') }}">דף הבית </a><img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt="">
    טיסות  <img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt="">
    <strong>{{$loc_name}}</strong>
    </div>
    </div>
  </section> 
  <section class="rt_fights">
    <div class="container">
     <div class="row flt-inner"> 
     <div class="content-heading col-lg-12">
        @if(!empty($page_title))
          <h1>{{$page_title}} </h1>
        @else
          <h1>טיסות ל{{$loc_name}} </h1>
        @endif
       
     </div>   
    <!-- {!!rami_flight_filter_html()!!}   -->
      <div class="col-lg-12 flights_div">
        @foreach($all_flights_sche as $flight_she)
          {!! rami_flights_page_html($flight_she)!!}
        @endforeach
      </div>
         @if(!empty($show_load_more))
           <div class="col-md-12 load_more_flights_div">
            <input type="hidden" name="flight_location" value="{{$loc_id}}">
            <input type="hidden" name="flight_start_date" value="{{$ser_start_date}}">
            <input type="hidden" name="flight_end_date" value="{{$ser_end_date}}">
            <input type="hidden" name="flight_location_source" value="{{$loc_source}}">
            <input type="hidden" name="is_serach" value="{{$is_serach}}">
            <button class="test-btn load_more_flights" type="submit" page_attr="2">ראה עוד</button>
           </div>
          @endif  
      </div>  
     </div> 
     </div>  
</section>  
@endsection
@section('rami_front_footer_js')
@parent
  <script type="text/javascript">
    $('.load_more_flights_div').on('click', '.load_more_flights', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var flight_location=$('input[name=flight_location]').val();
      var flight_start_date=$('input[name=flight_start_date]').val();
      var flight_end_date=$('input[name=flight_end_date]').val();
      var is_serach=$('input[name=is_serach]').val();
      var flight_location_source=$('input[name=flight_location_source]').val();
      $.ajax({
        url: '/flight_load_more',
        type: 'POST',
        data: {_token:'{{csrf_token()}}', page:page,no_of_element:8, flight_location:flight_location, flight_start_date:flight_start_date, flight_end_date:flight_end_date, flight_location_source:flight_location_source, is_serach:is_serach},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.flights_div').append(res.html);
          if(res.is_last_page==1){
             $('.load_more_flights_div').hide();
          }
          page=parseInt(page);
          page++;
          $('.load_more_flights').attr('page_attr',page);
        }else{
          alert(res.msg);
        }
      })
      .fail(function() {
        alert('some thing went wrong.');
      })
            
    });

  </script>
@endsection