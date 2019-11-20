@extends('mobile.home_main')
@section('rami_mobile_nav')
@endsection
@section('rami_mobile_header_serach')
@endsection
@section('mobile_container')
<section class="rt-info">
    <div class="container">     
      <div class="row">
        <div class="col-sm-12"><h3 class="rtpkghead">לקוחות רם נסיעות ממליצים  </h3>      
        <div class="rt_btnsec">
          <div class="pgico"><a href="#"><img src="{{url('assets/mobile')}}/images/recommendation-icon.png" alt=""></a></div>
        </div>
      </div> 
      </div>
    </div>
</section>
<section class="test-mn">
  <div class="container testimonial_div">
    <div class="row">
       <div class="col-sm-12">
        <h3> לקוחות רם נסיעות ממליצים </h3>
        <p>אנחנו ברם נסיעות ותיירות&nbsp;רוצים לתת לכם את השירות הטוב ביתר ואת חויית המשתמש באתר בצורה האפקטיבית, האולטימטיבית והנוחה ביותר. לכן הקדשנו דף המלצות זה עבורם על מנת<br>
          שתתרשמו מהמלצותיהם של לקוחותינו ואף תוסיפו את חוות דעתכם האישית ובכך נוכל יחד לתרום לחוויה המשותפת.<br>
         תודה רבה מראש, רמי.</p>
       </div>
       <div class="col-sm-12 testmn_form">
        <div class="contact-time-icon"><img src="{{url('assets/mobile')}}/images/recomend-form-icon.jpg" alt=""></div>
        <div class="contact-heading">טופס קשר מהיר</div>
        <div class="contact-yellow-border"></div>
        {!!show_flash_msg()!!}
        <div class="contact-rtform" lang="he-IL" dir="rtl">
        {{-- <form id="create_testimonial_form" method="post" action="" enctype="multipart/form-data">
        <div class="recomendation-input-box">
        <input name="post_title" type="text" class="contact-input" placeholder="*שם מלא" value="">
        </div>
        <div class="recomendation-input-box-left">
        <input name="email" type="email" class="contact-input" placeholder="*דואר אלקטרוני" value="">
        </div>
        <div class="clear"></div>
        <div class="recomendation-text-area">
        <textarea name="post_content" cols="" rows="" class="contact-input-textarea" placeholder="תוכן המלצה / תגובה..."></textarea>
        </div>
        <div class="reco-submit"><input name="submit_testimonial" type="submit" value="שלח" class="contact-submit"></div>
        </form>--}}
        <form action="{{url('/submit-testimonial')}}" id="add_testimonial" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="recomendation-input-box">
          <input name="first_name" type="text" class="contact-input" placeholder="* הזן שם פרטי " value="{!! get_edit_input_pvr_old_value('first_name','')!!}" required="true">
          {!! get_form_error_msg($errors, 'first_name') !!}
          </div>
          <div class="recomendation-input-box-left">
          <input name="last_name" type="text" class="contact-input" placeholder="* הזן שם משפחה" value="{!! get_edit_input_pvr_old_value('last_name','')!!}" required="true">
           {!! get_form_error_msg($errors, 'last_name') !!}
          </div>
          <div class="clear"></div>
          <div class="recomendation-text-area">
          <input name="email" type="email" class="contact-input" placeholder="*דואר אלקטרוני" value="{!! get_edit_input_pvr_old_value('email','')!!}" required="true">
           {!! get_form_error_msg($errors, 'email') !!}
          </div>
          <div class="clear"></div>
          <div class="recomendation-text-area">
          <input name="title" type="text" class="contact-input" placeholder="*שם מלא" value="{!! get_edit_input_pvr_old_value('title','')!!}" required="true">
           {!! get_form_error_msg($errors, 'title') !!}
          </div>
          <div class="clear"></div>
          <div class="recomendation-text-area">
          <textarea name="remark" cols="" rows="" class="contact-input-textarea" placeholder="תוכן המלצה / תגובה..." required="true" {!! get_edit_input_pvr_old_value('remark','')!!} ></textarea>
           {!! get_form_error_msg($errors, 'remark') !!}
          </div>
          <div class="reco-submit"><input type="submit" value="שלח" class="contact-submit"></div>
        </form>
        </div>     
       </div>
      @foreach($testimonials as $testimonial) 
      <div class="col-sm-12 test-block ">
         <div class="recomendation-round-box">
            <div class="recomendation-images">
                <div class="recomendation-images-inner">                              
                <img src="{{url('assets/mobile')}}/images/boy.png" alt="">
                </div>
              </div>
          </div>
          <div class="test-inner-box">
            <div class="test-heading">{{ $testimonial->title }} 
             <div class="reco-yellow-border-center"></div>
            </div>
            <div class="test-date">
              <img src="{{url('/assets/front/images')}}/calander-icon-recomended.jpg" alt="">{{ $testimonial->testimonial_date }}
            </div>
            <div class="clear"></div>
            <div class="testi-cont">
               <p>
                   {!! str_ireplace('\r\n', '<br>', $testimonial->remark)  !!}
               </p>
             </div>                     
             <div class="clear"></div>
          </div>
          <div class="contact_popup_basic">
            <a class="wp-colorbox-inline cboxElement" href="#contact_popup" data-toggle="modal" data-target="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
         </div>
      </div>
      @endforeach
      <div class="col-sm-12 text-center rami_load_more_btn_div">
        <button class="btn btn-primary btn-lg btn-block view-more rami_load_more_btn" type="submit" page_attr="2">ראה עוד</button>
        </div>
     </div>
    </div>
  </div>
</section>
@include('mobile.pages.contact_us_popup')
@endsection
@section('rami_mobile_footer_js')
@parent
@include('mobile.pages.singal_js.contact_us_popup_js')
  <script type="text/javascript">
    $('.testimonial_div').on('click', '.rami_load_more_btn', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      $.ajax({
        url: '/load_more',
        type: 'POST',
        data: {_token:'{{csrf_token()}}', page:page,type:1,no_of_element:4,is_mobile:1},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.rami_load_more_btn_div').before(res.html);
          if(res.is_last_page==1){
             $('.rami_load_more_btn_div').hide();
          }
          page=parseInt(page);
          page++;
          $('.rami_load_more_btn').attr('page_attr',page);
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