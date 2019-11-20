  @foreach($all_hotels as $hotel)
      <div class="col-md-3 flightss">
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