@extends('mobile.home_main')
@section('rami_mobile_nav')
@endsection
@section('rami_mobile_header_serach')
@endsection
@section('mobile_container')
      <section class="rt-info">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                   @if(!empty($page_title))
                    <h3 class="rtpkghead">{{$page_title}} </h3>
                  @else
                    <h3 class="rtpkghead">טיסות ל{{$loc_name}} </h3>
                  @endif
                  <div class="rt_btnsec">
                     <div class="rt_prev_btn"><a href="{{ URL::previous() }}"><img src="{{url('assets/mobile')}}/images/prev-btn-blk.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="fltdltss">
         <div class="container">
            <div class="row flights_div">
               @foreach($all_flights_sche as $flight_she)
                  {!! rami_flights_mobile_page_html($flight_she)!!}
               @endforeach
            </div>
            @if(!empty($show_load_more))
               <div class="col-sm-12 text-center load_more_flights_div">
                  <input type="hidden" name="flight_location" value="{{$loc_id}}">
                  <input type="hidden" name="flight_start_date" value="{{$ser_start_date}}">
                  <input type="hidden" name="flight_end_date" value="{{$ser_end_date}}">
                  <input type="hidden" name="flight_location_source" value="{{$loc_source}}">
                  <input type="hidden" name="is_serach" value="{{$is_serach}}">
                  <button id="load_more_packs" class="btn btn-primary btn-lg btn-block view-more load_more_flights" type="submit" page_attr="2">ראה עוד</button>
               </div>
            @endif
         </div>
</section>
@endsection
@section('rami_mobile_footer_js')
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
        data: {_token:'{{csrf_token()}}', page:page,no_of_element:9, flight_location:flight_location, flight_start_date:flight_start_date, flight_end_date:flight_end_date, flight_location_source:flight_location_source, is_serach:is_serach, is_mobile:1},
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
      