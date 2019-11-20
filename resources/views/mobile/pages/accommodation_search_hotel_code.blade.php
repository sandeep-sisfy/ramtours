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
            <h3 class="rtpkghead">אפשרויות לינה בטירול</h3>
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
    </section>
    <section class="rt_accomm">
      <div class="container">
        <div class="row">
          {{-- <div class="col-sm-12">
            <h3 class="rtpkghead">דירות נופש וצימרים בטירול</h3>
          </div> --}}
          <div class="col-sm-12 rt-inner hotel_div" >
                @foreach($all_hotels as $hotel)
            <div class="rt-packframes filterable" data-type="{{ implode(unserialize($hotel->hotel_type),'-')}}" data-star="{{$hotel-> hotel_star}}">
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
                <a href="{{url('/accommodation/'.$hotel['id'])}}"><img src="{{rami_get_hotel_single_image($hotel['id'])}}" alt="" class="img-fluid"></a>   
                <div class="rt-code"><span>{{$hotel['hotel_code']}}</span></div>
              </div>
            </div>
            @endforeach           
          </div>
          @if(!empty($show_load_more))
                 <div class="col-sm-12 text-center load_more_hotels_div">
                   <input type="hidden" name="hotel_code_text" value="{{$hotel_code_text}}">
                    <button id="load_more_packs" class="btn btn-primary btn-lg btn-block view-more load_more_hotels" type="submit" page_attr="2">ראה עוד</button>
                 </div>
                 @endif
        </div>
      </div>
    </section>
@endsection
@section('rami_mobile_footer_js')
   @parent
   <script type="text/javascript">
     $('.load_more_hotels_div').on('click', '.load_more_hotels', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      var hotel_code=$('input[name=hotel_code_text]').val();
      $.ajax({
        url: '/hotel_load_more',
        type: 'POST',
        data: {_token:'{{csrf_token()}}', page:page,no_of_element:9, hotel_code:hotel_code, is_mobile:1},
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