@section('rami_mobile_footer_js')
      <script src="{{url('assets/mobile')}}/js/jquery.min.js"></script>
      <script src="{{url('assets/mobile')}}/js/bootstrap.bundle.min.js"></script>
      <script src="{{url('assets/mobile')}}/js/jquery.easing.min.js"></script>
      <script src="{{url('assets/mobile')}}/js/jquery.fancybox.min.js"></script>
      <script src="{{url('assets/mobile')}}/js/jquery.touchSwipe.min.js"></script>
      <script src="{{url('assets/mobile')}}/js/moment.min.js"></script>
      <script src="{{url('assets/mobile')}}/js/daterangepicker.js"></script>
      <script src="{{url('assets/mobile')}}/js/filters.min.js"></script>  
      <script src="{{url('assets/mobile')}}/js/custom.js"></script>      
@show
      @if(!empty($footer_custom_code))
            {!! $footer_custom_code !!}
      @endif 
   </body>
</html>