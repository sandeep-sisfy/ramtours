@extends('frontend.home_main')
@section('rami_front_container')
  <section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
       <div class="inner-page-breadcrum">
          <strong>::</strong> <a href="{{ url('/') }}">דף הבית </a>
          <img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt=""> לינה 
          <img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt="">
          <strong> לחפש  </strong>
    </div>
    </div>
  </section>
  <section class="rt_frames">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">חיפוש אירוח   </h2>
          </div>
        <!--{!!rami_package_hotel_filter_html()!!}-->
        <div class="col-lg-12">
          {{-- <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="subs-head text-right">דירות נופש וצימרים בטירול  </h2>
            </div>
          </div> --}}
          <div class="row text-center hotel_div">
           @if($all_hotels->count()==0)
                 <div class="col-md-12">
                    לא נמצא שום רשומה
                 </div>
           @endif
           @foreach($all_hotels as $hotel)
              <div class="col-md-3 flightss filterable" data-type="{{ implode(unserialize($hotel->hotel_type),'-')}}" data-star="{{$hotel->  hotel_star}}">
                <div class="home-product-box">
                  <div class="content-image clearfix">    
                    @if(!empty($hotel->card))
                      <div class="rt_crdimg"><img src="{{rami_get_file_url($hotel->card->image)}}" alt="{{$hotel->card->card_title}}"></div>
                    @endif                
                   <a href="{{url('accommodation/'.$hotel['id'])}}"><img width="340" height="214" src="{{rami_get_hotel_single_image($hotel['id'])}}" class="img-fluid" alt=""></a>
                   <div class="date_code">
                     <div class="dates"></div>
                     <div class="ref_id_cont">
                       <span class="ref_id">{{$hotel['hotel_code']}}</span>
                     </div>
                   </div>
                  </div>
                  <div class="pakinner">
                    <div class="home-product-inner-box">
                    <div class="content-image-heading-english">
                      @if(!empty($hotel['hotel_display_name']))
                        {{$hotel['hotel_display_name']}}
                      @else
                        {{$hotel['hotel_code']}}
                      @endif
                    </div>
                    <div class="content-image-heading-border"></div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          @if(!empty($show_load_more))
           <div class="col-md-12 load_more_hotels_div">
            <input type="hidden" name="hotel_code_text" value="{{$hotel_code_text}}">
            <button class="test-btn load_more_hotels" type="submit" page_attr="2">ראה עוד</button>
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
    $('.load_more_hotels_div').on('click', '.load_more_hotels', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var hotel_code=$('input[name=hotel_code_text]').val();
      $.ajax({
        url: '/hotel_load_more',
        type: 'POST',
        data: {_token:'{{csrf_token()}}', page:page,no_of_element:8, hotel_code:hotel_code},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.hotel_div').append(res.html);
          if(res.is_last_page==1){
             $('.load_more_hotels_div').hide();
          }
          page=parseInt(page);
          page++;
          $('.load_more_hotels').attr('page_attr',page);
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