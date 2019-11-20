   @extends('mobile.home_main')
    @section('mobile_container')
     <section class="rt-info">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="rtpkghead">חבילות טוס וסע למינכן</h3>
                  <div class="rt_prev_btn"><a href="{{ URL::previous() }}"><img src="{{url('assets/mobile/images/prev-btn-blk.png')}}"></a></div>
               </div>
            </div>
         </div>
      </section>
      <section class="rt-filters">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner">
                  <div id="accordion">
                     <div class="card">
                        <div class="card-header" id="headingOne">
                           <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">סינון על פי קטגוריות: </button>
                              <i class="fa fa-angle-down" aria-hidden="true"></i>
                           </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                           <div class="card-body">
                              <div class="filters_panel">
                                 <div class="filters_panel">
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
                                 </div>
                                 <div class="clearfix"></div>
                                 <!--<div class="package-category-sidebar-banners">
                                    <a href="#"><img src="images/banner-1.png" alt=""></a>
                                    <a href="#"><img src="images/banner-2.png" alt=""></a>
                                 </div>-->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="rt_flydrive">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="rtflyhead">אפריל 2019</h3>
               </div>
               <div class="col-sm-12 rt-inner">
                  @foreach($all_pkgs_fc as $pkg_fc)
                     {!!rami_fly_drive_pkg_mobile_html($pkg_fc)!!}
                  @endforeach
               </div>
               
              
            </div>
         </div>
      </section>
      @endsection
     