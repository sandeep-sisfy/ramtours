@extends('mobile.home_main')
   @section('mobile_container')
    <section class="rt-info">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="rt_info_right">
                     <h3 class="rtpkghead">
                        @if(!empty($package->package_desti))
                              {{ $package->package_desti->loc_name }}
                         @endif
                      חבילת טוס וסע  
                       </h3>
                     <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i>
                        {{ rami_get_require_date_format($package->package_end_date, 'm/d').' - ' .rami_get_require_date_format($package->package_start_date, 'm/d') }}
                     </div>
                     
                  </div>
                  <div class="rt_btnsec">
                     <div class="rt_prev_btn"><a href="{{ URL::previous() }}"><img src="{{url('assets/mobile')}}/images/prev-btn-blk.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="steps">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 stepwizard">
                  <div class="stepwizard-row setup-panel">
                     <div class="stepwizard-step active">
                        <a href="#step-1" class="btn active">1</a>
                        <p>פרטי המוצר     </p>
                     </div>
                     <div class="stepwizard-step">
                        <a href="#step-2" class="btn" disabled="disabled">2</a>
                        <p>פרטי הנוסעים     </p>
                     </div>
                     <div class="stepwizard-step">
                        <a href="#step-3" class="btn" disabled="disabled">3</a>
                        <p>תשלום    </p>
                     </div>
                     <div class="stepwizard-step last">
                        <a href="#step-3" class="btn" disabled="disabled"><img src="{{url('assets/mobile')}}/images/step-check.png" alt=""></a>
                        <p>אישור הזמנה  </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="pkg_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner abtpkg">
                  <h3 class="pkg_head">החבילה הכללה  :</h3>
                  <p>החבילה כוללת: טיסה סדירה + רכב</p>
               </div>
               <div class="col-sm-12 flt-inner pkgflt_secc">
                  <h3 class="pkg_head">טיסות   :</h3>
                   @foreach($all_flights as $all_flight)
                  <div class="flights-details-box-inner">
                     <div class="flight-tophead">
                        <div class="flight-date">יעד : {{$all_flight['up_desti']}} </div>
                        <div class="flights-headings"> {{$all_flight['up_flight_no']}}</div>
                     </div>
                     <div class="clear"></div>
                     <div class="flight-secc top">
                        <div class="flights-icon"><img width="262" height="165" src="{{url('ramtours/'.$all_flight['up_airline_logo'])}}" class="img-fluid" alt=""> </div>
                        <div class="flight-text-box tf1">{{$all_flight['up_source']}}<span class="rt_tmm">{{$all_flight['up_departure_time']}}</span>
                           <span class="rt_dts">{{$all_flight['depart_full_date']}}</span>
                        </div>
                        <div class="flight-take-off ftbord">
                           שעות  {{$all_flight['up_time_taken']}}
                           <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                        </div>
                        <div class="flight-text-box tf2">{{ $all_flight['up_desti']}} <span class="rt_tmm">{{$all_flight['up_arrival_time']}}</span><span class="rt_dts">
                           {{$all_flight['up_arrival_full_date']}}
                        </span>
                        </div>
                        <div class="clear"></div>
                     </div>
                     <div class="flight-tophead">
                        <div class="flight-date">יעד : {{$all_flight['down_desti']}}  </div>
                        <div class="flights-headings"> {{$all_flight['down_flight_no']}}</div>
                     </div>
                     <div class="clear"></div>
                     <div class="flight-secc bottom">
                        <div class="flights-icon"><img width="262" height="165" src="{{url('ramtours/'.$all_flight['down_airline_logo'])}}" class="img-fluid" alt=""> </div>
                        <div class="flight-text-box td1">{{$all_flight['down_source']}} <span class="rt_tmm">{{$all_flight['down_departure_time']}}</span><span class="rt_dts">{{$all_flight['back_full_date']}}</span>
                        </div>
                        <div class="flight-take-off ftbord">
                           שעות  {{$all_flight['down_time_taken']}}
                           <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                        </div>
                        <div class="flight-text-box td2">ת{{$all_flight['down_desti']}} <span class="rt_tmm"> {{$all_flight['down_arrival_time']}} </span><span class="rt_dts">
                           {{$all_flight['down_arrival_full_date']}}
                        </span>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
                   @endforeach
               </div>
               
              <div class="col-sm-12 car-inner">
                  <h3 class="pkg_head">רכב  :</h3>
                  <div class="rt_crt_sec col-sm-12">
                     <img src="{{url('ramtours/'.$all_cars['first_car_img'])}}" class="img-fluid"> 
                     <h4 class="pkg_subhead">{!!$all_cars['first_car_title']!!} </h4>
                     <p>{!!$all_cars['first_car_des']!!} </p>
                     <div class="rtpkglst">
                        <img src="{{url('assets/mobile/images/pkg-car.png')}}" alt="">
                        <h4>אפשרויות שדרוג רכב  </h4>
                        <div class="pkg_btnn">
                           <a href="#" id="rt_car_btn">
                           <img src="{{url('assets/mobile/images/pkg-arrow-yellow.png')}}" class="inf_arrow">
                           </a>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </section>
      <section class="pkg-price">
         <div class="container">
            <div class="row">
               <div class="col-6  col-sm-6 rt-inner">
                  <h3><span>החל מ</span>€{{$package->package_lowest_price}}</h3>
               </div>
               <div class="col-6 col-sm-6 rt-inner">
                  <button class="btn btn-lg btn-primary btn-block " type="submit" id="pkg_prc_btn">המשיכו להזמנה</button>
               </div>
            </div>
         </div>
      </section>
       <div class="rt_popup" id="rt_car">
         <div class="popup-header">
            <div class="rt_close"><img src="{{url('assets/mobile/images/rt_navclse.png')}}"></div>
            <h4><img src="{{url('assets/mobile/images/pkg-car.png')}}" alt="">אפשרויות שדרוג רכב  </h4>
            <div class="rt_crt_sec col-sm-12">
               <h3 class="pkg_head">גולף סטיישן ידני ממוזג  :</h3>
               <ul class="crprice">
                  @foreach($all_cars as $car)
                  @if(empty($car['car_title']))
                    @continue
                  @endif
                  <li><span class="crt-desp">{{$car['car_title']}}</span>
                  <span class="mcrprz">{{$car['car_price']}}</span>
                </li>
                @endforeach
               </ul>
            </div>
         </div>
      </div>
      <div class="rt_popup" id="rt_car">
         <div class="popup-header">
            <div class="rt_close"><img src="{{url('assets/mobile/images/rt_navclse.png')}}"></div>
            <h4><img src="{{url('assets/mobile/images/pkg-car.png')}}" alt="">אפשרויות שדרוג רכב  </h4>
            <div class="rt_crt_sec col-sm-12">
               <h3 class="pkg_head">גולף סטיישן ידני ממוזג  :</h3>
               <ul class="crprice">
                  @foreach($all_cars as $car)
                  @if(empty($car['car_title']))
                    @continue
                  @endif
                  <li><span class="crt-desp">{{$car['car_title']}}</span>
                  <span class="mcrprz">{{$car['car_price']}}</span>
                </li>
                @endforeach
               </ul>
            </div>
         </div>
      </div>
      <div class="rt_popup" id="pkg_prc">
         <div class="popup-header">
            <div class="rt_close"><img src="{{url('assets/mobile/images/rt_navclse.png')}}"></div>
            <h4>בחירת דירה והרכב נוסעים</h4>
         </div>
         <div class="pkg-right">
            <div class="pkg-box">
               <div class="pkg-price">
                  <div class="pkg-btns"><button class="btn btn-lg btn-primary btn-block checking_cart" type="submit">להזמין עכשיו</button></div>
                  <div class="pkgprc"><span>מחיר סופי</span>€{{$package->package_lowest_price}} </div>
               </div>
               <div class="pkg-frm">
                  <div class="pkggs">
                     <label>מבוגרים</label>
                     <div class="pkg-select">
                        <div class="aprt-inner2">
                            <div class="input-group spinner">
                             <input type="text" id="rami_pakage_adults" class="form-control" min="1" max="99" value="2">
                             <div class="input-group-btn-vertical">
                               <button class="btn btn-default rami_incr_btn" type="button">
                                 <i class="fa fa-plus" aria-hidden="true"></i>
                               </button>
                               <button class="btn btn-default rami_decr_btn" type="button">
                                 <i class="fa fa-minus" aria-hidden="true"></i>
                               </button>
                             </div>
                           </div>  
                        </div>
                     </div>
                  </div>
                  <div class="pkggs">
                     <label>מספר ילדים (עד גיל 16)</label>
                     <div class="pkg-select">
                        <div class="aprt-inner2">
                            <div class="input-group spinner">
                             <input type="text" id="rami_pakage_childs" class="form-control" min="1" max="99" value="2">
                             <div class="input-group-btn-vertical">
                                <button class="btn btn-default rami_incr_btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                               <button class="btn btn-default rami_decr_btn" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                             </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <label>Please Select Flight</label>
                  <div class="pkg-select rami_cart_select_div rami_package_flights">
                      <div class="aprt-inner">
                        <select>
                          <option value="0">Please Select Flight</option>
                          @foreach($all_flights as $all_flight)
                              <option value="{{$all_flight['id']}}">{{$all_flight['title']}}</option>
                          @endforeach
                      </select>
                      </div>
                  </div>
                   <label>מבחר סוג רכב  </label>
                  <div class="pkg-select apart rami_cart_select_div rami_package_cars" >
                     <div class="aprt-inner">
                      <select  class="rami_pkg_chnage_select chnage_select1" element_no='1' element_name="car">
                          <option>Please Select car</option>
                          @foreach( $all_cars as $car)
                            @if(empty($car['id']))
                                @continue
                            @endif
                            <option value="{{$car['id']}}">{{$car['car_title']}}</option>
                          @endforeach
                        </select>
                            <a href="javascript:void(0);" class="add_button" title="Add More car"><i class="fa fa-plus" aria-hidden="true"></i></a>
                      </div>
                 </div>
                  <div class="pkg-trms">
                     <p>נציגנו יצרו עמכם קשר לאישור ההזמנה ויתרת תשלום  </p>
                     <p><a href="#">הערות לעסקה</a></p>
                  </div>
                  <div class="pkg-btns">
                     <button  class="btn btn-lg btn-primary btn-block checking_cart" type="submit">המשיכו להזמנה</button>
                     <button class="btn btn-lg btn-default btn-block" type="submit">שאלות? הקליקו ליצירת קשר &gt;&gt;</button>
                  </div>
                  <div class="pkg-chk">
                     <img src="{{url('assets/mobile/images//checkout-img.jpg')}}" alt="checkout Image">
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endsection
      @section('rami_mobile_footer_js')
      @parent
      @include('mobile.pages.singal_js.package_fly_travel_details_js')
      @endsection
     