@extends('mobile.home_main')
@section('rami_mobile_nav')
@endsection
@section('rami_mobile_header_serach')
@endsection
@section('mobile_container')
  <section class="rt-info rtasd">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="rtpkghead">{{ $page->page_title }}</h3>
                  <div class="rt_btnsec">
                     <div class="acdico"><a href="#"><img src="{{url('assets/mobile')}}/images/blk_card.png" alt=""></a></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
  <section class="bfcard">
    <div class="container">
       <div class="row">
        @if($page->having_right_link==1)
        <div class="col-sm-12 bfleftnav">
          <div class="content-right-nav">
          @if(!empty($page->menu_title))
           <div class="content-nav-heading"><span>{{$page->menu_title}} </span><img src="{{url('assets/mobile')}}/images/rt_menu.png" class="bfmenu"></div>
          @else
          <div class="content-nav-heading">$page->page_title <img src="{{url('assets/mobile')}}/images/rt_menu.png" class="bfmenu"></div>
          @endif
         
          <div class="right-menu">          
          <ul class="right-nav">
            @foreach($page_links as $page_link)
            <li><a href="{{url($page_link->pagelink_url)}}">{{ $page_link->pagelink_title  }}</a></li>
            @endforeach
          </ul>
          </div>
          </div>
        </div>
        @endif
        <div class="{{$page_class}}">
             <div class="contact-content">
                  <div class="terms">
                    @if(!empty($page->page_img))
                     <img src="{{rami_get_file_url($page->page_img)}}" alt="" class="img-fluid">
                   @endif
                  <h1>{{ $page->page_title }}</h1>
                  {!! str_ireplace('\n', '' ,str_ireplace('\r\n', '', $page->page_disc))  !!}
                </div>
            </div>
       </div>
   </div>
   @include('frontend.pages.page_contact')
</div>
  </section>  
@endsection
@section('rami_mobile_footer_js')
@parent
@endsection