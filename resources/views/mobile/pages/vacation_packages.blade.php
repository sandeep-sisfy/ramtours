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
                  <h3 class="rtpkghead">חבילות נופש </h3>
                  <div class="rt_prev_btn"><a href="{{ URL::previous() }}"><img src="{{url('assets/mobile')}}/images/prev-btn-blk.png"></a></div>
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
                            {!! rami_package_hotel_filter_html(1)!!}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="rt_searchresult">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner pakage_div">

                <h3 class="rtpkg_title">{{$page_title }}</h3>
                 @foreach($all_pkgs_fhc as $pkgs_fhc)
                 {!!rami_vacation_pkg_mobile_html($pkgs_fhc)!!}
                 @endforeach
               </div>
               @if(!empty($show_load_more))
               <div class="col-sm-12 text-center load_more_packs_div">
                  <input type="hidden" name="pack_location" value="{{$loc_id}}">
                  <input type="hidden" name="pack_start_date" value="{{$ser_start_date}}">
                  <input type="hidden" name="pack_end_date" value="{{$ser_end_date}}">
                  <button id="load_more_packs" class="btn btn-primary btn-lg btn-block view-more load_more_packs" type="submit" page_attr="2">ראה עוד</button>
               </div>
               @endif
            </div>
         </div>
      </section>
@endsection
@section('rami_mobile_footer_js')
   @parent
   <script type="text/javascript">
    $('.load_more_packs_div').on('click', '.load_more_packs', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var pack_location=$('input[name=pack_location]').val();
      var pack_start_date=$('input[name=pack_start_date]').val();
      var pack_end_date=$('input[name=pack_end_date]').val();
      $.ajax({
        url: '/package_load_more',
        type: 'POST',
        data: {_token:'{{csrf_token()}}', page:page,no_of_element:9, pack_location:pack_location, pack_start_date:pack_start_date, pack_end_date:pack_end_date, is_mobile:1},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.pakage_div').append(res.html);
          if(res.is_last_page==1){
             $('.load_more_packs_div').hide();
          }
          page=parseInt(page);
          page++;
          $('.load_more_packs').attr('page_attr',page);
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