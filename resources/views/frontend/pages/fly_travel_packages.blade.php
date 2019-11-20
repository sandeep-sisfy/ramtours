@extends('frontend.home_main')
@section('rami_front_container')
<section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
       <div class="inner-page-breadcrum">
    <strong>::</strong>
    <a href="{{ url('/') }}">דף הבית </a>
    <img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt="">
    מינכן <img src="{{url('/assets/front/images')}}/bread-crum-arrow.png" alt="">
    <strong>טיסת לופטהנזה 681 מישראל למינכן / </strong>
    </div>
    </div>
  </section>
  <section class="rt_frames">
    <div class="container">
       <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">חבילות טוס וסע למינכן</h2>
        </div>
       <div class="col-md-3">
         <div class="filters_panel"><div class="filters_panel   ">
          <div class="cap"><label>סינון על פי קטגוריות:</label></div>
          <div class="filter_group" data-param="card">
          <label class="cat_name">כרטיסי אטרקציות</label>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" id="rt-f1">
             <label class="custom-control-label" for="rt-f1">כרטיס אדום</label>
          </div>
          </div>
          <div class="filter_group" data-param="star_rating">
          <label class="cat_name">דירוג כוכבים</label>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="2" id="rt-f2">
             <label class="custom-control-label" for="rt-f2">2 כוכבים</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="3" id="rt-f3">
             <label class="custom-control-label" for="rt-f3">3 כוכבים</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="4" id="rt-f4">
             <label class="custom-control-label" for="rt-f4">4 כוכבים</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="5" id="rt-f5">
             <label class="custom-control-label" for="rt-f5">5 כוכבים</label>
          </div>
          </div>
          <div class="filter_group" data-param="accommodation_types">
          <label class="cat_name">סוג מקום האירוח</label>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="2" id="rt-f6">
             <label class="custom-control-label" for="rt-f6">מלון</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="3" id="rt-f7">
             <label class="custom-control-label" for="rt-f7">צימר</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="17" id="rt-f8">
             <label class="custom-control-label" for="rt-f8">דירת נופש</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="356" id="rt-f9">
             <label class="custom-control-label" for="rt-f9">בית הארחה</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="357" id="rt-f10">
             <label class="custom-control-label" for="rt-f10">בקתה</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="358" id="rt-f11">
             <label class="custom-control-label" for="rt-f11">פנסיון</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="360" id="rt-f12">
             <label class="custom-control-label" for="rt-f12">וילה</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="367" id="rt-f12">
             <label class="custom-control-label" for="rt-f12">כפר נופש</label>
          </div>
          </div>
          <div class="filter_group" data-param="facilities">
          <label class="cat_name">מתקנים שיש במקום</label>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="5" id="rt-f13">
             <label class="custom-control-label" for="rt-f13">בריכה</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="28" id="rt-f14">
             <label class="custom-control-label" for="rt-f14">ספא</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="28" id="rt-f14">
             <label class="custom-control-label" for="rt-f14">ספא</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="68" id="rt-f15">
             <label class="custom-control-label" for="rt-f15">מסעדה</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="351" id="rt-f16">
             <label class="custom-control-label" for="rt-f16">חדר משפחה</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="352" id="rt-f17">
             <label class="custom-control-label" for="rt-f17">גישה לנכים</label>
          </div>
          </div>
          <div class="filter_group" data-param="meals">
          <label class="cat_name">ארוחות</label>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="2" id="rt-f18">
             <label class="custom-control-label" for="rt-f18">ארוחת בוקר</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="3" id="rt-f19">
             <label class="custom-control-label" for="rt-f19">חצי פנסיון</label>
          </div>
          </div>
          <div class="filter_group" data-param="near">
          <label class="cat_name">מיקום</label>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="353" id="rt-f20">
             <label class="custom-control-label" for="rt-f20">למרגלות הרים</label>
          </div>
          <div class="filter_cont custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" value="96" id="rt-f21">
             <label class="custom-control-label" for="rt-f21">בקרבת אגם</label>
          </div>
          </div>
          </div><div class="clearfix"></div>
          <div class="package-category-sidebar-banners">
            <a href="#"><img src="{{url('/assets/front/images')}}/banner-1.png" alt=""></a>
            <a href="#"><img src="{{url('/assets/front/images')}}/banner-2.png" alt=""></a>
          </div>
          </div>
       </div>
        <div class="col-lg-9">
          {{-- <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-right">אפריל 2019</h2>
            </div>
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-right"> יולי 2019</h2>
            </div>
          </div> --}}
          <div class="row text-center"> 
          <div class="col-lg-12 no-record">
              <p class="text-right">Records Not Found</p>
            </div>
            @foreach($all_pkgs_fc as $pkgs_fc)
           {!!rami_fly_drive_pkg_html($pkgs_fc,$col = 4)!!}
           
          @endforeach
         {{--  <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 17/07-24/07 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €509 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 08/07-16/07 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €549 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 09/07-17/07 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €549 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 30/07-07/08  </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €699 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
       <div class="col-lg-12 text-center">
          <h2 class="section-heading text-right">אוגוסט 2019</h2>
       </div>
       <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 30/07-06/08 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €579 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 30/07-06/08 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €579 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 30/07-06/08 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €579 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 30/07-06/08 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €579 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 30/07-06/08 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €579 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div>
        <div class="col-md-4 flightss pkgs">
            <div class="home-product-box">
              <div class="content-image clearfix">
                <div class="rt_approval"><img src="{{url('/assets/front/images')}}/approval.png"></div>
               <a href="fly-travel-packages-detail.html"><img width="340" height="214" src="{{url('/assets/front/images')}}/driveandfly1.gif" class="img-fluid" alt=""></a>
               <div class="date_code">
                 <div class="dates">
                  <span class="pack-date">
                  <img src="{{url('/assets/front/images')}}/frm-cal.png"> 30/07-06/08 </span>
                 </div>
               </div>
              </div>
              <div class="pakinner">
                <div class="home-product-inner-box">
                <div class="content-image-heading">
                <span class="orange_bottom_1px">חבילת טוס וסע ליער השחור </span>
                </div>
                <div class="nights">
                <span class="num_nights">טיסה לציריך</span>
                </div>
                <div class="immediate_approval">  חבילה באישור מיידי! </div>
                </div>
              </div>
              <div class="content-box-rate">
              <div class="rate-sec">
                <div class="rate-box">
                <span>החל מ </span>
                €579 <span>לאדם</span>
              <span class="pack-nights">7 לילות </span>
              </div>
              </div>
              <div class="content-box-line"></div>
              </div>
             </div>
        </div> --}}
        <div class="col-md-12"><button class="test-btn" type="submit">ראה עוד</button></div>
      </div>
    </div>
  </div>

</div>
  </section>
  @endsection