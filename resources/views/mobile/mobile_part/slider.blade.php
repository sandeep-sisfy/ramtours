      @section('rami_mobile_slider')
      <section class="rt_slider">
         <div class="rt-logo"><a href="{{ url('/')}}"><img src="{{url('assets/mobile')}}/images/logo.png"></a></div>
         <div id="rt_maincarousel" class="carousel slide" data-ride="carousel">
            <div class="overlay"></div>
            <div class="carousel-inner">
               @section('rami_mobile_slider_imgs')
               <div class="carousel-item active">
                  <img src="{{url('assets/mobile')}}/images/rt_slider.jpg" class="img-fluid" alt="First slide">
               </div>
               <div class="carousel-item">
                  <img src="{{url('assets/mobile')}}/images/rt_slider-1.jpg" class="img-fluid" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img src="{{url('assets/mobile')}}/images/rt_slider-3.jpg" class="img-fluid" alt="Third slide">
               </div>
               @show
            </div>
            <a class="carousel-control-prev" href="#rt_maincarousel" role="button" data-slide="prev">
            <img src="{{url('assets/mobile')}}/images/prev.png" alt="Previous">       
            </a>
            <a class="carousel-control-next" href="#rt_maincarousel" role="button" data-slide="next">
            <img src="{{url('assets/mobile')}}/images/next.png" alt="Next"> 
            </a>
         </div>
      </section>
      @show