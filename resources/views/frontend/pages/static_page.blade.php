@extends('frontend.home_main')
@section('rami_front_container')
   <section class="rt_frames">
    <div class="container">
      <div class="row contact-heading-box">
       <div class="col-md-6"><p>{{ $page->page_title }}</p></div>
       <div class="col-md-6"><img src="{{url('/assets/front/images')}}/term-condition-icon.jpg" alt=""></div>
     </div>
    </div>
  </section>
  <section class="bfcard">
    <div class="container">
       <div class="row">
        @if($page->having_right_link==1)
        <div class="col-md-3 bfleftnav">
          <div class="content-right-nav">
          @if(!empty($page->menu_title))
           <div class="content-nav-heading">{{$page->menu_title}}</div>
          @else
          <div class="content-nav-heading">$page->page_title</div>
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
       @include('frontend.pages.page_contact')
   </div>
</div>
  </section>  
@endsection
@section('rami_front_footer_js')
@endsection