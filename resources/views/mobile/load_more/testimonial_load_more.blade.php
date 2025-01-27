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
          <a class="contact_pop_open" href="#contact_popup">שאלות? הקליקו ליצירת קשר </a>
      </div>
      @endforeach