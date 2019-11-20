@extends('frontend.home_main')
@section('rami_front_container')
   <section class="test-header">
    <div class="container">
      <div class="row contact-heading-box">
       <div class="col-md-6">
        <p>לינה / {{$hotel->hotel_address}}</p>
      </div>
       <div class="col-md-6"><img src="{{url('/assets/front/images')}}/hotel-room-top-icon.jpg" alt=""></div>
     </div>
    </div>
  </section>
  <section class="test-cont rt_accomd">
    <div class="container">
       <div class="row contact-content ">
        <div class="col-md-12">
         <div class="rt_accomm-detail">
         <div class="hotel-room-inner">
          <div class="hotel-room-heading-right">
          <div class="terms-heading">
             @foreach($hotel_types as $hotel_type)
                      @if($loop->index==0)
                        {{ get_hotel_type($hotel_type)}}
                      @else
                      {{'/ '.get_hotel_type($hotel_type)}}
                      @endif
                @endforeach
            <div class="hotel-yellow-border-center">
            </div>
          </div>
          </div>
          <div class="hotel-room-heading-left">
            <div class="terms-heading">
            <div class="h_name">{{$hotel->hotel_display_name }}</div>
            <div class="terms-heading-small-text">{{$hotel->hotel_code }} <strong>: קוד מלון </strong> &nbsp;&nbsp{{$hotel->hotel_address }} </div></div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark" id="rt_affix">
            <ul class="navbar-nav text-uppercase ml-auto rt_tabs">
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#gallery">גלריה</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#generalinfo">מידע כללי</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#choose-apartments">בחירת דירות</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger active" href="#map">מפה</a></li>
              </ul>
          </nav>
          @if(!empty($hotel->hotel_images))
          <div class="pkg-section" id="gallery">
             <div class="row">
                <div class="col-md-12 gallery">
                     @foreach($hotel->hotel_images as $img)
                      <div class="pics">
                        <a data-fancybox="gallery" href="{{url('ramtours/'.$img->image)}}">
                          <img class="img-fluid" src="{{url('ramtours/'.$img->image)}}" alt="">
                         </a>
                         @if(($loop->index==5)&&($hotel_gallery_count >0))
                        <div class="more_img">
                           +{{$hotel_gallery_count }}
                        </div>
                        @endif
                      </div>
                     @endforeach
                </div>
            </div>
          </div>
          @endif
           <div class="pkg-section" id="generalinfo">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>מידע כללי </h3></div>
             </div>
             <div class="col-md-6 ap-cont">
              <p>{!! $hotel->hotel_desc !!}</p>
             </div>
             <div class="col-md-6 ap-cont aprt">
              <h6 class="cont-head">מתקני המלון  </h6>
              <ul class="hotelroom">
               @foreach($amenities as $amenity)
                      <li>{{ get_hotel_amenities($amenity) }}</li>
                @endforeach
              </ul>
              <h6 class="cont-head">פעילויות בקרבת מקום  </h6>
              <ul class="hotelroom">
                @foreach($features as $feature)
                  <li>{{ get_hotel_features($feature) }}</li>
                @endforeach
              </ul>
            </div>
            @if(!empty($hotel_card))
            <div class="col-md-12 ap-cont">
              <h6 class="cont-head rt_cardhead">מידע על כרטיס </h6>
              <img src="{{url('ramtours/'.$hotel_card['card_image'])}}" class="rt_cardimg">
                <p class="rt_cardesc">המתארחים במקום לינה זה זכאים 
                  <a href=" {{$hotel_card['link']}}" target="_blank">
                    {{$hotel_card['title']}}
                   </a>
                 </p>
            </div>
            @endif
           </div>
          </div>
          <div class="pkg-section" id="choose-apartments">
           <div class="row">
             <div class="col-md-12 bd-sec ap_slect">
              <div class="bd-head"><h3>תאור החדרים</h3></div>
             </div>
             @foreach($hotel_rooms as $room)
             <div class="col-md-12 ap-cont">
              <h3 class="cont-head">
                 <span> 
                   <img src="{{url('/assets/front/images')}}/ramtours-rooms.png"> 
                     @if(!empty($room['room_area']))
                          {{$room['room_type']}} - {{$room['room_area']}} מ"ר  |
                        @else
                           {{$room['room_type']}} |
                        @endif
                  </span>
                  <span>
                    <img src="{{url('/assets/front/images')}}/mann.png">&nbsp;מתאים להרכב של עד {{$room['max_people']}} נפשות  <span dir="ltr">({{$room['room_code']}})</span>|
                  </span>
                  <span> 
                     <img src="{{url('/assets/front/images')}}/aproom.png">
                    זמין במלאי יחידות   
                  </span>        
              </h3>
             </div>
             <div class="col-md-7 ap-cont">
             <p> {!! $room['room_desc'] !!}<p>
             <p>מתאים להרכב של עד  {{$room['max_people']}} נפשות</p>
            </div>
            <div class="col-md-5 ap-cont">
             <div class="col-md-12 gallery">
                @foreach($room['room_images'] as $room_img)
                <div class="pics">
                  <a data-fancybox="gallery1" href="{{url('ramtours/'.$room_img->image)}}">
                  <img class="img-fluid" src="{{url('ramtours/'.$room_img->image)}}" alt=""></a>
                </div>
                 @endforeach
              </div>
            </div>
            @endforeach
           </div>
          </div>
          @if(!empty($map))
          <div class="pkg-section" id="map">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>אטרקציות באיזור מקום האירוח<img src="{{url('/assets/front/images')}}/location.png"></h3></div>
             </div>
             <div class="col-md-4 att-sec">
              <div class="att-inner">
                <h5>מרחקי האטרקציות ממקום הלינה בקילומטרים</h5>
              <ul class="attr-pts">
                @foreach($attractions as $attr)
                  <li><span class="num">{{$attr->attraction_sequence}}</span><span class="attr_name">{{$attr->attraction_title}}</span><span class="distance">{{$attr->attraction_distance}} ק"מ</span></li>
                @endforeach
              </ul>
              </div>
            </div>
            <div class="col-md-8 map-sec">
               <img src="{{url('ramtours/'.$map)}}" alt="map" class="img-fluid">
                <div class="map-text">
                כל המפות באתר מיועדות להמחשה בלבד, ישנם אי דיוקים במרחקי האטרקציות למקום הלינה, לכן אין להסתמך על נתונים אלה לצורך תכנון הטיול.
                </div>
            </div>
           </div>
          </div>
          @endif
          @if(!empty($hotel->hotel_instruction_text))
           <div class="pkg-section" id="notes">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>הערות לעסקה<img src="{{url('/assets/front/images')}}/notes.png"></h3></div>
             </div>

             <div class="col-md-12">
                {!! $hotel->hotel_instruction_text !!}
             </div>
             </div>
           </div>
           @endif
          {{-- hotel reviews --}}
          {!! get_rami_hotel_reviews($hotel_reviews) !!}
           @if($hotel_packages->count()>0)
          <section class="vac_pack">
           <div class="container">
             <div class="row">
             <div class="col-md-12"><h2>חבילות קשורות</h2></div>    
             @foreach($hotel_packages as $hotel_package)
              {!!rami_vacation_pkg_html($hotel_package)!!}
             @endforeach
             </div>  
           </div>
          </section>
          @endif
        <!--  <div class="col-md-12">
            <div class="bd-head"><h3>הערות לעסקה</h3></div>
            <div class="remarks test"><p><strong>המחיר כולל:&nbsp;</strong>מיסים</p></div>
            <div class="bd-head"><h3>חוות דעת גולשים</h3></div>
            <div class="opp_btn"><a href="javascript:void(0)" id="add_opinion" class="add-opinion-button">+ הוסיפו חוות דעתכם</a>
            </div>
            <div class="terms-form-box" id="showopiniondiv">
            <div class="terms-heading"><div class="contact-time-icon term-icon"><img src="{{url('/assets/front/images')}}/recomend-form-icon.jpg" alt=""></div>הוסף את חוות דעתך בקצרה
            <div class="contact-yellow-border"></div>
            </div>

            <form id="create_testimonial_form" method="post" action="">
              <div class="opinion-input-box">
              <span>דרוג כללי&nbsp;&nbsp;</span><span id="starRating">
                <img class="rating_star" src="{{url('/assets/front/images')}}/grey-star.png" alt="" val-attr="1">
                <img class="rating_star" src="{{url('/assets/front/images')}}/grey-star.png" alt="" val-attr="2">
                <img class="rating_star" src="{{url('/assets/front/images')}}/grey-star.png" alt="" val-attr="3">
                <img class="rating_star" src="{{url('/assets/front/images')}}/grey-star.png" alt="" val-attr="4">
                <img class="rating_star" src="{{url('/assets/front/images')}}/grey-star.png" alt="" val-attr="5">
              </span>
              </div>
              <div class="opinion-input-box">
              <input name="post_title" type="text" class="contact-input" placeholder="*שם מלא" value="">
              </div>
              <div class="opinion-input-box-last">
              <input name="phone" type="text" class="contact-input" placeholder="*טלפון" value="">
              </div>
              <div class="clear"></div>
              <div class="marginTop-20">
              <textarea name="post_content" cols="" rows="" class="opinion-input-textarea" placeholder="תוכן המלצה / תגובה..."></textarea>
              </div>
              <div class="reco-submit"><input name="submit_testimonial" type="submit" value="שלח" class="contact-submit" style="width:100%;">
              </div>
            </form>
              <div class="clear"></div>
              </div>
          </div>-->
        @if($similar_loc_hotels_count>0)
          <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="subs-head accom-relate">השכרת נופש וצימרים ב  <span>{{$hotel->hotel_address}}</span></h2>
            </div>
          </div>          
          <div class="row text-center">             
            @foreach($similar_loc_hotels as $hotel)
            <div class="col-md-3 flightss">
              <div class="home-product-box">
                <div class="content-image clearfix">
                  <a href="{{ url('/accommodation/'.$hotel->id) }}"><img width="340" height="214" src="{{rami_get_hotel_single_image($hotel->id)}}" class="img-fluid" alt=""></a>
                  <div class="date_code">
                    <div class="dates"></div>
                    <div class="ref_id_cont">
                      <span class="ref_id">{{ $hotel->hotel_code }}</span>
                    </div>
                  </div>
                </div>
                <div class="pakinner">
                  <div class="home-product-inner-box">
                  <div class="content-image-heading-english">{{ $hotel->hotel_display_name }}</div>
                  <div class="content-image-heading-border"></div>
                  </div>
                </div>
              </div>
          </div>
          @endforeach        
      </div>
    </div>
    @endif
    </div>
          </div>
          </div>
  </section>
@endsection