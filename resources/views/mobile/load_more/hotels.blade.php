          @foreach($all_hotels as $hotel)
            <div class="rt-packframes">
              <div class="accomm-left col-6 col-sm-6">
                <div class="accomm-heading">
                  <h5>
                     @if(!empty($hotel['hotel_display_name']))
                                  {{$hotel['hotel_display_name']}}
                                @else
                                  {{$hotel['hotel_code']}}
                                @endif
                  </h5>
                </div>
              </div>
              <div class="accomm-right col-6 col-sm-6">
                 @if(!empty($hotel->card))
                  <div class="inst-approv">
                    <img src="{{rami_get_file_url($hotel->card->image)}}" alt="{{$hotel->card->card_title}}" class="img-fluid">
                  </div>
                @endif  
                <a href="{{url('/accommodation/'.$hotel['id'])}}"><img src="{{rami_get_hotel_single_image($hotel['id'])}}" alt="" class="img-fluid"></a>   
                <div class="rt-code"><span>{{$hotel['hotel_code']}}</span></div>
              </div>
            </div>
            @endforeach 