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
                  <h3 class="rtpkghead">פרטי טיסה</h3>
                  <div class="rt_btnsec">
                     <div class="rt_prev_btn"><a href="{{ URL::previous() }}"><img src="{{url('assets/mobile')}}/images/prev-btn-blk.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="fltdltss fltdlttsec">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 flt-inner pkgflt_secc">
                  <div class="flights-details-box-inner flt_header">
                     <div class="flight-payment">
                        <div class="flt-dates">
                           <ul>
                              <li><img src="{{url('assets/mobile')}}/images/flt-location.png">יעד : </li>
                              <li><img src="{{url('assets/mobile')}}/images/flt-calnder.png">{{ $all_flight['start_date'] }} - {{ $all_flight['end_date'] }}</li>
                           </ul>
                        </div>
                        <div class="ftbtnsec">
                           <div class="flt-price">${{ get_rami_flight_price_for_single_flight($all_flight['id'])}} <span class="fltunit">לאדם</span></div>
                           <div class="flt-btnn"><a href="javascript:void(0)" class="checking_cart flt-book">המשך להזמנה</a> </div>
                        </div>
                     </div>
                     <div class="clear"></div>
                     <div class="flight-tophead">
                        <div class="flight-date">יעד :{{$all_flight['up_desti'] }}</div>
                        <div class="flights-headings">{{ $all_flight['up_airline_name']}}</div>
                     </div>
                      @if(!empty($all_flight['up_flights']))
                        @foreach($all_flight['up_flights'] as $flight)
                           <div class="clear"></div>
                           <div class="flight-secc top">
                              <div class="flights-icon"><img width="262" height="165" src="{{url('ramtours/'.$flight['airline_logo'])}}" class="img-fluid" alt=""> </div>
                              <div class="flight-text-box tf1">{{$flight['source']}}<span class="rt_tmm">{{$flight['departure_time']}}</span>
                                 <span class="rt_dts">{{$flight['depart_full_date']}}</span>
                              </div>
                              <div class="flight-take-off ftbord">
                                 שעות  {{$flight['time_taken']}}
                                 <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                              </div>
                              <div class="flight-text-box tf2">{{ $flight['desti']}} <span class="rt_tmm">{{$flight['arrival_time']}}</span><span class="rt_dts">
                                 {{$flight['arrival_full_date']}}
                              </span>
                              </div>
                              <div class="clear"></div>
                           </div>
                        @endforeach
                     @else
                           <div class="clear"></div>
                           <div class="flight-secc top">
                              <div class="flights-icon"><img width="262" height="165" src="{{url('ramtours/'.$all_flight['up_airline_logo'])}}" class="img-fluid" alt=""> </div>
                              <div class="flight-text-box tf1">{{$all_flight['up_source']}}<span class="rt_tmm">{{$all_flight['up_departure_time']}}</span>
                                 <span class="rt_dts">{{$all_flight['up_depart_full_date']}}</span>
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
                     @endif
                     <!-- div class="flight-tophead">
                        <div class="flight-date">יעד : {{$all_flight['down_desti']}}  </div>
                        <div class="flights-headings"> {{$all_flight['down_flight_no']}}</div>
                     </div> -->
                      @if(!empty($all_flight['down_flights']))
                        @foreach($all_flight['down_flights'] as $flight)
                           <div class="clear"></div>
                           <div class="flight-secc bottom">
                              <div class="flights-icon"><img width="262" height="165" src="{{url('ramtours/'.$flight['airline_logo'])}}" class="img-fluid" alt=""> </div>
                              <div class="flight-text-box tf1">{{$flight['source']}}<span class="rt_tmm">{{$flight['departure_time']}}</span>
                                 <span class="rt_dts">{{$flight['depart_full_date']}}</span>
                              </div>
                              <div class="flight-take-off ftbord">
                                 שעות  {{$flight['time_taken']}}
                                 <span class="rt_plane"><i class="fa fa-plane" aria-hidden="true"></i></span>
                              </div>
                              <div class="flight-text-box tf2">{{ $flight['desti']}} <span class="rt_tmm">{{$flight['arrival_time']}}</span><span class="rt_dts">
                                 {{$flight['arrival_full_date']}}
                              </span>
                              </div>
                              <div class="clear"></div>
                           </div>
                        @endforeach
                      @else
                        <div class="clear"></div>
                        <div class="flight-secc bottom">
                           <div class="flights-icon"><img width="262" height="165" src="{{url('ramtours/'.$all_flight['down_airline_logo'])}}" class="img-fluid" alt=""> </div>
                           <div class="flight-text-box td1">{{$all_flight['down_source']}} <span class="rt_tmm">{{$all_flight['down_departure_time']}}</span><span class="rt_dts">{{$all_flight['down_depart_full_date']}}</span>
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
                      @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="rt-filters fltlftpart">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner">
                  <div class="col-sm-12 flight-left-frm">
                     <div class="flight-prise-box">
                        <div class="flight-prise-inner" data-p_per_person="487">
                           <div class="font13">נותרו {{ $all_flight['num_available_seat'] }} מקומות פנויים</div>
                           <div class="car-details-price flight_price">${{ get_rami_flight_price_for_single_flight($all_flight['id'])}}<span> לנוסע</span></div>
                           <div>
                              <label>בחירת מספר נוסעים (עד 5 בסך הכל)</label>
                              <div class="pass_select">
                                 <label class="num_lbl">מספר מבוגרים:</label>
                                 <input type="number"  min="1" max="7" class="num_passangers adults" value="{{ get_search_adult()  }}" id="rami_pakage_adults">
                                 <div class="quantity-nav">
                                    <div class="quantity-button quantity-up">+</div>
                                    <div class="quantity-button quantity-down">-</div>
                                 </div>
                              </div>
                              <div class="pass_select">
                                 <label class="num_lbl">מספר ילדים (2-16):</label>
                                 <input type="number"  min="0" max="6" class="num_passangers kids" value="{{ get_search_child() }}" id="rami_pakage_childs">
                                 <div class="quantity-nav">
                                    <div class="quantity-button quantity-up">+</div>
                                    <div class="quantity-button quantity-down">-</div>
                                 </div>
                              </div>
                              <div class="pass_select">
                                 <label class="num_lbl">מספר תינוקות (0-2):</label>
                                 <input type="number"  min="0" max="6" class="num_passangers infants" value="{{ get_search_child() }}" id="rami_pakage_infants">
                                 <div class="quantity-nav">
                                    <div class="quantity-button quantity-up">+</div>
                                    <div class="quantity-button quantity-down">-</div>
                                 </div>
                              </div>
                           </div>
                           <div class="flight-total">סה״כ: <span class="yellow-text">${{ get_rami_flight_price_for_single_flight($all_flight['id'])}}</span></div>
                           <div class="clear"></div>
                           <div class="flights-buttons-box">
                              <input name="" type="button" class="flight-for-button slideDiv" value="לפרטים" id="5112">
                                 <input name="" type="button" class="flight-choose-button add-to-cart_flight checking_cart" value="הזמינו">
                                 <div class="section" id="pay_remarks">
                                    <p style="text-align: right; ">למזמינים חבילת נופש, טיסה או טוס וסע ניתן לשלם בכרטיס אשראי עד 4 תשלומים ללא ריבית או יותר בקרדיט. אפשר גם בהעברה לבנק או במשרדנו בגבעת שמואל במזומן.</p>
                                    <p style="text-align: right; border-top: 1px #ffa800 solid ;padding-top: 3px; margin-top: 5px; margin-bottom: 0px;font-size: 15px;">שריינו את הטיסה שבחרתם בתשלום מקדמה של סה"כ <span style="font-size: 20px;color: #ffa800;">200</span> בלבד להזמנה דרך האתר. נציגנו יצרו עמכם קשר לאישור ההזמנה ויתרת תשלום.</p>
                                    <p style="text-align: right; padding-top: 0; margin-bottom: 10px;font-size: 15px;display: none;">ההזמנה ניתנת לביטול תוך 14 יום מרגע ההזמנה תמורת 100 שקלים לאדם.</p>
                                    <p>
                                       <img class="optimized_c_cards" src="{{ url('assets/mobile') }}/images/visa.jpg">
                                    </p>
                                    <p>אתר רם נסיעות מאובטח ע"י תקן PCI הבנלאומי ,סטנדרט גבוה מאוד המבטיח רמת אבטחה גבוהה מאוד לרכישות באינטרנט. ניתן לשלם בכרטיסי אשראי הבאים:</p>
                                 </div>
                              <div id="flight_page_contact_pop_cont">
                                 <div class="contact_popup_basic">
                                    <a class="wp-colorbox-inline cboxElement" href="#contact_popup" data-toggle="modal" data-target="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
                                    <input type="hidden" id="site_url" value="{{ url('/') }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      @include('mobile.pages.contact_us_popup')
@endsection
@section('rami_mobile_footer_js')
@parent
@include('mobile.pages.singal_js.flight_details_js')
@include('mobile.pages.singal_js.contact_us_popup_js')
@endsection