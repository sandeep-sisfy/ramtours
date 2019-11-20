@extends('frontend.home_main')
@section('rami_front_container')
  <section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
        <div class="inner-page-breadcrum">
          <strong>::</strong> <a href="{{url('/')}}">דף הבית </a>
          <img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt="">
            @if(!empty($package->package_desti))
              {{ $package->package_desti->loc_name }}
            @endif
          <img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt="">
          <strong>
            @if(!empty($package->package_desti))
              {{ $package->package_desti->loc_name }}
            @endif
            לטוס ולנסוע
            {{ rami_get_require_date_format($package->package_end_date, 'm/d').' - ' .rami_get_require_date_format($package->package_start_date, 'm/d') }}
         </strong>
      </div>
    </div>
  </section>
  <section class="steps">
    <div class="container">
      <div class="row">
        <div class="stepwizard">
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
              <a href="#step-3" class="btn" disabled="disabled"><img src="{{url('/assets/front/images')}}/step-check.png" alt=""></a>
              <p>אישור הזמנה  </p>
            </div>
          </div>
       </div>
      </div>
    </div>
  </section>
  <section class="pkg-data">
    <div class="container">
      <div class="row">
             <div class="col-md-3 pkgrt-sec">
          <div class="pkg-right" id="pkgrtsec">
          <div class="pkg-box">
            <h3 class="pkgfrm-head">בחירת דירה והרכב נוסעים</h3>
            <div class="pkg-price">
              <div class="pkg-btns"><button  class="btn btn-lg btn-primary btn-block checking_cart" type="submit">להזמין עכשיו</button></div>
              <div class="pkgprc"><span>מחיר סופי </span>€{{$package->package_lowest_price}}</div>
           </div>
           <div class="pkg-frm">
            <label>מבוגרים  </label>
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
            <label>מספר ילדים (עד גיל 16)</label>
            <div class="input-group spinner">
              <input type="text" id="rami_pakage_childs" class="form-control" min="1" max="99" value="2">
              <div class="input-group-btn-vertical">
                 <button class="btn btn-default rami_incr_btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button class="btn btn-default rami_decr_btn" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
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
                      <a href="javascript:void(0);" class="add_button" title="Add More room"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
           </div>
            <div class="pkg-trms">
              <p>נציגנו יצרו עמכם קשר לאישור ההזמנה ויתרת תשלום  </p>
              <p><a href="#">הערות לעסקה</a></p>
            </div>
            <div class="pkg-btns">
             <button class="btn btn-lg btn-primary btn-block checking_cart" >המשיכו להזמנה  </button>
             <button class="btn btn-lg btn-default btn-block" type="submit">שאלות? הקליקו ליצירת קשר >></button>
            </div>
             <div class="pkg-inf">
              <p>אתר רם נסיעות מאובטח ע"י תקן PCI הבנלאומי ,סטנדרט גבוה מאוד המבטיח רמת אבטחה </p>
              <p>גבוהה מאוד לרכישות באינטרנט. ניתן לשלם בכרטיסי אשראי הבאים:</p>
             </div>
             <div class="pkg-chk">
              <img src="{{url('/assets/front/images')}}/checkout-img.jpg" alt="checkout Image">
             </div>
          </div>
        </div>
        </div>
      </div>
        <div class="col-md-9 pkg-left">
          <div class="pkg-inner">
          <div class="pkg-header">
            <h3>חבילת טוס וסע  {{ rami_get_require_date_format($package->package_end_date, 'm/d').' - ' .rami_get_require_date_format($package->package_start_date, 'm/d') }}</h3>
          </div>
          <nav class="navbar navbar-expand-lg navbar-dark" id="rt_affix">
            <ul class="navbar-nav text-uppercase ml-auto rt_tabs">
               <li class="nav-item"><a class="nav-link js-scroll-trigger active" href="#basic-details">חפרטים בסיסיים</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#flights">טיסות</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#car">טאוטו</a></li>

              </ul>
          </nav>
          <div class="pkg-section" id="basic-details">
           <div class="row">
            <div class="col-md-6 bd-sec">
              <div class="bd-head"><h3>לטוס ולנסוע
                @if(!empty($package->package_desti))
                {{ $package->package_desti->loc_name }}
                @endif
                <img src="{{url('/assets/front/images')}}/location.png"></h3></div>
              <p>החבילה כוללת: טיסה סדירה + רכב</p>
             <!-- <p>משפחתי סטיישן</p>-->
            </div>
            <div class="col-md-6 bd-sec">
              <div class="bd-head"><h3 style="position: relative;
    left: 1px;width: 100.4%!important;">תאריכים<img src="{{url('/assets/front/images')}}/date-ico.png"></h3> </div>
              <p>{{ $package->package_end_date }} - {{ $package->package_start_date }}</p>
              <p> מים   {{rami_get_no_of_days_diff($package->package_start_date, $package->package_end_date)}}</p>
            </div>
       <!--     <div class="col-md-4 bd-sec">
              <div class="bd-head"><h3 style="opacity:0;">מקום אירוח<img src="{{url('/assets/front/images')}}/apartment-ico.png"></h3> </div>
             <!-- <p>דירת נופש</p>
              <p>ללא ארוחות</p>--
            </div>-->
           </div>
          </div>
          <div class="pkg-section" id="flights">
           <div class="row flt-inner">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>טיסה<img src="{{url('/assets/front/images')}}/flight-ico.png"></h3></div>
             </div>
             <div class="col-md-12 rt_flts">
           <div class="flights-details-box-inner">
                @foreach($all_flights as $all_flight)
                    <div class="flight-conttt">
                          <div class="flight-tophead">
                            <div class="flights-headings">יציאה  : {{$all_flight['depart_full_date']}}</div>
                            <div class="flight-date">יעד : {{$all_flight['up_desti']}}</div>
                            <div class="flight-places"></div>
                            <div class="flight-duration">משך טיסה כולל  {{$all_flight['up_time_taken']}}</div>
                          </div>
                          <div class="flight-secc top">
                             <div class="flights-icon">
                              <img width="262" height="165" src="{{url('ramtours/'.$all_flight['up_airline_logo'])}}" class="img-fluid" alt="">
                               <div class="flt_inff"><span class="fltt_name">{{
                                 $all_flight['up_airline_name'] }} </span></div>
                             </div>
                             <div class="flight-text-box tf1">
                              <span class="rt_tmm">{{$all_flight['up_departure_time']}}
                              </span>{{$all_flight['up_source']}}
                            </div>
                             <div class="flight-take-off ftbord">
                              <span class="rt_plane">
                                <i class="fa fa-plane" aria-hidden="true"></i>
                              </span>
                            </div>
                             <div class="flight-text-box tf2">
                              <span class="rt_tmm">
                              {{$all_flight['up_arrival_time']}}
                              </span>{{$all_flight['up_desti']}}
                            </div>
                             <div class="flight-text-box tf3">
                                <span class="fltt-info">
                                פרטי הטיסה
                              </span>
                              <span class="fltt-ttltime">
                                 {{$all_flight['up_flight_no']}} {{$all_flight['up_source'] }} to {{$all_flight['up_desti'] }}
                               </span>
                            </div>
                             <div class="flight-text-box tf4"></div>
                             <div class="clear"></div>
                           </div>
                          <div class="flight-tophead">
                            <div class="flights-headings">חזור: {{$all_flight['back_full_date']}}</div>
                            <div class="flight-date">יעד : {{$all_flight['down_desti'] }} </div>
                            <div class="flight-places"></div>
                            <div class="flight-duration">משך טיסה כולל  {{$all_flight['down_time_taken']}}</div>

                          </div>
                          <div class="flight-secc bottom">
                          <div class="flights-icon"><img width="262" height="165" src="{{url('ramtours/'.$all_flight['down_airline_logo'])}}" class="img-fluid" alt="">
                            <div class="flt_inff">
                              <span class="fltt_name">{{$all_flight['down_airline_name']}}</span>
                            </div>
                          </div>
                          <div class="flight-text-box td1">
                            <span class="rt_tmm">
                            {{$all_flight['down_departure_time']}}
                            </span>{{$all_flight['down_source']}}
                          </div>
                          <div class="flight-take-off ftbord">
                            <span class="rt_plane">
                              <i class="fa fa-plane" aria-hidden="true"></i>
                            </span>
                          </div>
                          <div class="flight-text-box td2">
                            <span class="rt_tmm"> {{$all_flight['down_arrival_time']}}
                            </span>{{$all_flight['down_desti']}}
                          </div>
                          <div class="flight-text-box td3">
                            <span class="fltt-info">פרטי הטיסה</span>
                            <span class="fltt-ttltime">{{$all_flight['down_flight_no']}} {{$all_flight['down_source']}} {{$all_flight['down_desti']}} </span></div>
                          <div class="flight-text-box td4"></div>
                          <div class="clear"></div>
                          </div>

                      </div>
                @endforeach
            </div>

           </div>
          </div>
          <div class="pkg-section" id="car">
           <div class="row">
             <div class="col-md-12 bd-sec">
              <div class="bd-head"><h3>רכב  <img src="{{url('/assets/front/images')}}/pkg-car.png"></h3></div>
             </div>
             <div class="col-md-8">
             <h5>{{$all_cars['first_car_title']}}</h5>
              <p>{!!$all_cars['first_car_des']!!}</p>
              <h6 class="cont-head">Other Cars</h6>
              <ul class="crprice">
                @foreach($all_cars as $car)
                  @if(empty($car['car_title']))
                    @continue
                  @endif
                  <li>{{$car['car_title']}}
                  <span class="mcrprz">{{$car['car_price']}}</span>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-md-4 ap-cont">
              <img src="{{url('ramtours/'.$all_cars['first_car_img'])}}" class="img-fluid">
            </div>
           </div>
          </div>

        </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('rami_front_footer_js')
@parent
@include('frontend.pages.singal_js.package_fly_travel_details_js')
@endsection