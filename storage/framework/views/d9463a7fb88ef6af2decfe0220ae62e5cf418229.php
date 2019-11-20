<?php $__env->startSection('mobile_container'); ?>
      <section class="hot_deals">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 rt-inner home_packs">
                  <h3 class="hdeals_head">מבחר חבילות נופש</h3>
                  <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo rami_vacation_pkg_mobile_html($pack); ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
               <?php if($show_load_more==1): ?>
               <div class="col-sm-12 text-center rami_load_more_btn_div">
                  <button class="btn btn-primary btn-lg btn-block view-more rami_load_more_btn" type="submit" page_attr="2">ראה עוד</button>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </section>
      <section class="our-spc" style="display: none">
         <div class="container px-2">
            <div class="row no-gutters">
               <div class="col-sm-12">
                  <h3 class="hdeals_head">המומחיות שלנו</h3>
                  <div class="rt-spec">
                     <div class="col-6 col-sm-6 rt-specinner">
                        <a href="javascript:void(0)"> <img src="<?php echo e(url('assets/mobile')); ?>/images/spec-2.png" class="img-fluid" alt=""></a>
                        <h3 class="sp_dsc">חבילת נופש לאוסטריה
                           מתחיל מ 679 €
                        </h3>
                     </div>
                     <div class="col-6 col-sm-6 rt-specinner">
                        <a href="javascript:void(0)"> <img src="<?php echo e(url('assets/mobile')); ?>/images/spec-1.png" class="img-fluid" alt=""></a>
                        <h3 class="sp_dsc">חבילת נופש ליער השחור
                           מתחיל מ 439 €
                        </h3>
                     </div>
                     <div class="col-6 col-sm-6 rt-specinner">
                        <a href="javascript:void(0)"> <img src="<?php echo e(url('assets/mobile')); ?>/images/spec-4.png" class="img-fluid" alt=""></a>
                        <h3 class="sp_dsc">חבילת נופש לגרמניה
                           החל מ 499 €
                        </h3>
                     </div>
                     <div class="col-6 col-sm-6 rt-specinner">
                        <a href="javascript:void(0)"><img src="<?php echo e(url('assets/mobile')); ?>/images/spec-3.png" class="img-fluid" alt=""></a>
                        <h3 class="sp_dsc">חבילת נופש להולנד
                           מתחיל מ 609 €
                        </h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="rt_popup" id="date_popup_cont">
         <div class="popup-header">
            <div class="rt_close"><img src="<?php echo e(url('assets/mobile/images/rt_navclse.png')); ?>"></div>
            <h4>בחר תאריך</h4>
         </div>
      </div>
   <?php $__env->stopSection(); ?>
    <div id="data_hidden_price" style="display:none"> 
    </div>
    <div id="data_hidden_price_flight" style="display:none"> 
    </div>
   <?php $__env->startSection('rami_mobile_footer_js'); ?>
   ##parent-placeholder-567c36b17da248bc79e13763be604ea7bbcd439a##
    <script type="text/javascript">
    $('.rami_load_more_btn_div').on('click', '.rami_load_more_btn', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      $.ajax({
        url: '/load_more',
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', page:page,type:2,no_of_element:4},
      })
      .done(function(res) {        
        if(res.status=='success'){
          $('.home_packs').append(res.html);
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
      });
    });
    $('.sDate_pack').change(function(){
        var date= $(this).val().split('-');
        var sDate= date[0]+'-'+date[1]+'-'+date[2];
        var eDate= date[3]+'-'+date[4]+'-'+date[5];
        $('input[name=pack_start_date]').val($.trim(sDate));
        $('input[name=pack_end_date]').val($.trim(eDate));
        chnage_pakage_picker_date();
      });
    $('.sDate_flight').change(function(){
        var date= $(this).val().split('-');
        var sDate= date[0]+'-'+date[1]+'-'+date[2];
        var eDate= date[3]+'-'+date[4]+'-'+date[5];
        $('input[name=flight_start_date]').val($.trim(sDate));
        $('input[name=flight_end_date]').val($.trim(eDate));
        chnage_flights_picker_date();
    });
    $('body').on('mouseup', 'td.pk_et_date', function(event) {
       event.preventDefault();
       $(this).addClass('finsh_range');
       $('.pk_et_date').addClass('disabled');
       $('.pk_et_date').removeClass('available');
       $('.pk_et_date').removeClass('pk_start_date');
       $('.calendar').find('td').addClass("in-range-rami");
       $('.pk_start_date').closest('.calendar').prevAll('.calendar').addClass('in-range123');
       $('.finsh_range').closest('.calendar').nextAll('.calendar').addClass('in-range123');
       $('.in-range123').find('td').removeClass("in-range-rami");
       $('.in-range123').removeClass("in-range123");
       $('.rt_start').closest('tr').prevAll('tr').addClass('in-range12345');
       $('.finsh_range').closest('tr').nextAll('tr').addClass('in-range12345');
       $('.in-range12345').find('td').removeClass("in-range-rami");
       $('.in-range12345').removeClass("in-range12345");
       $('.rt_start').prevAll('td').removeClass('in-range-rami')
       $('.finsh_range').nextAll('td').removeClass('in-range-rami');
       $('.other_avl_range').addClass('pk_start_date available picker_price_added');
       $('.other_avl_range').removeClass('disabled');
    });
    $('body').on('mouseup', 'td.picker_price_added', function(event){
      if($(this).closest('.calendar').hasClass('right')){
        var tbody= $(this).closest('tbody')
        var tr= $(this).closest('tr')
      }
      $('.rt_start').addClass('picker_price_added');
      $('.in-range-rami').removeClass('in-range-rami');
      $('.rt_start').removeClass('rt_start');
      $('.finsh_range').removeClass('finsh_range');
      // alert($(this).closest('.calendar').attr('class'));
      // //$('.next').trigger('click');
      if($('#rt_tab3').hasClass('active')){
        var price_parent='data_hidden_price_flight';
        var cur_symbol='$';
      }else{
        var price_parent='data_hidden_price';
        var cur_symbol='€';
      }
      //$('.picker_price_added .picker_low_price').remove();
      $('.picker_price_added').removeClass('in-range');
      $('.picker_price_added').removeClass('pk_start_date');
      $('.picker_price_added').removeClass('active');
      $('.picker_price_added').removeClass('active');
      $('.picker_price_added').removeClass('available');
      $('.picker_price_added').removeClass('start-date');
      $('.picker_price_added').removeClass('weekend');
      $('.picker_price_added').removeClass('today');
      $('.picker_price_added').addClass('disabled');
      $('.picker_price_added').addClass('other_avl_range');
      $('.picker_price_added').removeClass('picker_price_added');
      $(this).addClass('rt_start pk_start_date')
      $(this).removeClass('disabled');
      $(this).removeClass('other_avl_range');
      var end_date= $(this).attr('date-end-dates');
      var end_date=end_date.split('???');
      //console.log(end_date);
      var start_class=$(this).attr('class');
      start_class = start_class.replace("pk_start_date", "");
      start_class = start_class.replace("pk_et_date", "");
      start_class = start_class.replace("rt_start", "");
      start_class = start_class.replace(' ', "");
      start_class=$.trim(start_class);
      //console.log(start_class);
      $('.pk_et_date').each(function(index, el) {
        var et_class=$(this).attr('class');
        et_class = et_class.replace("pk_et_date", "");
        et_class = et_class.replace("disabled", "");
        et_class = et_class.replace("start-date", "");
        et_class = et_class.replace("active", "");
        et_class = et_class.replace("active", "");
        et_class = et_class.replace("available", "");
        et_class = et_class.replace("picker_price_added", "");
        et_class = et_class.replace("in-range", "");
        et_class = et_class.replace("end-date", "");
        et_class = et_class.replace("pk_start_date", "");
        et_class = et_class.replace("weekend", "");
        et_class = et_class.replace("off", "");
        et_class = et_class.replace("today", "");
        et_class = et_class.replace("other_avl_range", "");
        et_class = et_class.replace(' ', "");
        et_class=$.trim(et_class);
        //console.log(et_class);
        // console.log(end_date);
        if($.inArray( et_class, end_date) != -1){
          $(this).removeClass('disabled');
          $(this).addClass('pk_start_date');
          $(this).addClass('available');
          var new_start_class='pack_'+start_class+'_'+et_class;
          //console.log(new_start_class);
          var price= $('#'+price_parent+' .'+new_start_class).val();
          $(this).children('.picker_low_price').remove();
          $(this).append('<div class="picker_low_price">'+cur_symbol+price+'</div');
        }
      });

    });
    function call_pack_daterangepicker(element, data_array, date_array, end_array,  class_prefix, symbol){
       $(element).daterangepicker({
        singleDatePicker: false,
        customClass: 'startDate',
         autoApply: false,
        startDate: moment(),
        parentEl: '#date_popup_cont',
       // autoUpdateInput: false,
        locale: {
          format: 'YYYY-MM-DD',
          daysOfWeek: ["א","ב","ג","ד","ה","ו"," ש"],
          monthNames: ["ינואר","פברואר","מרץ","אפריל","מאי","יוני",
            "יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר","דצמבר"]
        ,
        applyLabel:"חפש",
        cancelLabel: "לבטל"
            
        },
        isCustomDate: function(date) {
            if(($.inArray( date.format('YYYY-MM-DD'), date_array) != -1 )&&($.inArray( date.format('YYYY-MM-DD'), end_array) != -1 )){
              var id= date.format('YYYY-MM-DD');
              return class_prefix+'start_date picker_price_added '+class_prefix+'et_date '+date.format('YYYY-MM-DD')+'/-/'+data_array[date.format('YYYY-MM-DD')].price+'/-/'+symbol+'/-/'+data_array[date.format('YYYY-MM-DD')].end_date;
            }else if($.inArray( date.format('YYYY-MM-DD'), date_array) != -1 ){
              return class_prefix+'start_date picker_price_added '+date.format('YYYY-MM-DD')+'/-/'+data_array[date.format('YYYY-MM-DD')].price+'/-/'+symbol+'/-/'+data_array[date.format('YYYY-MM-DD')].end_date;
            }else if($.inArray( date.format('YYYY-MM-DD'), end_array) != -1){
              return date.format('YYYY-MM-DD')+' '+class_prefix+'et_date disabled'
            }else{
              return 'disabled';
            }
          }
      });
    }
    $('.sDate_flight').val('');  
    $('.sDate_pack').val('');
      /***** Date Popup  ******/
     $('.sDate_pack').click(function(){ 
        $('#date_popup_cont').addClass('show');
        $('body').addClass('fixed');  
        $('input[name=daterangepicker_start]').val('').removeClass('rt_active');
        $('input[name=daterangepicker_end]').val('').removeClass('rt_active');
        $('.today').removeClass('today active start-date active end-date available');
                
       });
       $('.sDate_flight').click(function(){ 
   //   alert(1);
        $('#date_popup_cont').addClass('show');
        $('body').addClass('fixed');
        $('input[name=daterangepicker_start]').val('').removeClass('rt_active');
        $('input[name=daterangepicker_end]').val('').removeClass('rt_active'); 
        $('.today').removeClass('today active start-date active end-date available');       
       });  
     $('.applyBtn').click(function(){ 
       $('.rt_popup').removeClass('show');
       $('body').removeClass('fixed');        
     });
     $('.cancelBtn').click(function(){ 
       $('.rt_popup').removeClass('show');
       $('body').removeClass('fixed');        
     });
     $('#pack_location').change(function(){
       var loc= $(this).val();
       $.ajax({
        url: '/packages-location-dates',
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', pack_location:loc},
      })
      .done(function(res) {        
         if(res.status=='success'){
          var pack_dates=[];
          var pack_dates_only=[];
          var pack_end_dates=[];
          $('#data_hidden_price').empty();
          $.each(res.pack_dates, function(index, el) {
            var class_new='pack_'+el.package_start_date+'_'+el.package_end_date;
            var price=el.package_lowest_price;
            if($('#data_hidden_price .'+class_new).length!=0){
              $('#data_hidden_price .'+class_new).val(price);
            }
            else{
              $('#data_hidden_price').append('<input class="'+class_new+'" value="'+price+'">');
            }
            if(typeof pack_dates[el.package_start_date] != "undefined"){
              pack_dates[el.package_start_date].end_date=pack_dates[el.package_start_date].end_date+'???'+el.package_end_date;
              pack_dates[el.package_start_date].price=el.package_lowest_price;
            }else{
              pack_dates[el.package_start_date]={
              date:el.package_start_date, price:el.package_lowest_price, end_date:el.package_end_date
              };
            }
            pack_dates_only.push(el.package_start_date);
            pack_end_dates.push(el.package_end_date);
          });
          var element='.sDate_pack';
          call_pack_daterangepicker(element,pack_dates,pack_dates_only, pack_end_dates, 'pk_', '€');
          $('.sDate_pack').val('');
          $('input[name=pack_start_date]').val('');
          $('input[name=set_end_date]').val('');

        }else{
          $('#rt_warning .rt_errormsg').html(res.msg);
          $("#rt_warning").modal('show');
          var pack_dates=[];
          var element='.sDate_pack';
          call_pack_daterangepicker(element,pack_dates);
          $('.sDate_pack').val('');
         $('input[name=pack_start_date]').val('');
         $('input[name=set_end_date]').val('');
        }
      })
      .fail(function() {
        alert('some thing went wrong.');
      });
     });
     $( "#pack_location" ).trigger("change");
     function chnage_pakage_picker_date(){
      if($('input[name=pack_start_date]').val()==$('input[name=pack_end_date]').val()){
         var d = new Date();
         var month=("0" + (d.getMonth() + 1)).slice(-2);
         var new_date=$.trim(d.getFullYear()+'-'+month+'-'+d.getDate());
         if($('input[name=pack_start_date]').val()==new_date){
          $('input[name=pack_start_date]').val('');
          $('input[name=pack_end_date]').val('');
          $('.sDate_pack').val('');
         }
      }
     }
     function chnage_flights_picker_date(){
      if($('input[name=flight_start_date]').val()==$('input[name=flight_end_date]').val()){
         var d = new Date();
         var month=("0" + (d.getMonth() + 1)).slice(-2);
         var new_date=$.trim(d.getFullYear()+'-'+month+'-'+d.getDate());
         if($('input[name=flight_start_date]').val()==new_date){
         $('input[name=flight_end_date]').val('');
         $('input[name=flight_start_date]').val('');
          $('.sDate_flight').val('');
         }
      }
     }
     $('#pack_location_search_btn').click(function(event) {
       chnage_pakage_picker_date();
     });
     $('#flights_location_search_btn').click(function(event) {
       chnage_flights_picker_date();
     });
     
     $('select[name=destination_location]').change(function(event) {
        var desti=$(this).val();
        var src=$('select[name=source_location]').val();
       flight_dates_by_src_desti(src, desti);
        
     });
     $( "select[name=destination_location]" ).trigger( "change" );
     $('select[name=source_location]').change(function(event) {
        var src=$(this).val();
        var desti=$('select[name=destination_location]').val();
       flight_dates_by_src_desti(src, desti);
        
     });

     function flight_dates_by_src_desti(src, desti){
       $.ajax({
          url: '/flights-src-desti-dates',
          type: 'POST',
          data: {_token:'<?php echo e(csrf_token()); ?>', src:src,desti:desti},
        })
         .done(function(res) {
          if(res.status=='success'){
             var flights_dates=[];
             var flights_dates_only=[];
             var flights_end_dates=[];
             $('#data_hidden_price_flight').empty();
             $.each(res.flights_dates, function(index, el) {
              var class_new='pack_'+el.up_departure_time+'_'+el.down_departure_time;
              var price=el.flight_price;
              if($('#data_hidden_price_flight .'+class_new).length!=0){
                $('#data_hidden_price_flight .'+class_new).val(price);
              }
              else{
                $('#data_hidden_price_flight').append('<input class="'+class_new+'" value="'+price+'">');
              }
              if(typeof flights_dates[el.up_departure_time] != "undefined"){
                flights_dates[el.up_departure_time].end_date=flights_dates[el.up_departure_time].end_date+'???'+el.down_departure_time;
                flights_dates[el.up_departure_time].price=el.flight_price;
              }else{
                flights_dates[el.up_departure_time]={
                date:el.up_departure_time, price:el.flight_price, end_date:el.down_departure_time
                };
              }
              flights_dates_only.push(el.up_departure_time);
              flights_end_dates.push(el.down_departure_time);
             });
            call_pack_daterangepicker('.sDate_flight',flights_dates,flights_dates_only, flights_end_dates, 'pk_', '$');
            $('.sDate_flight').val('');
            $('input[name=flight_start_date]').val('');
            $('input[name=flight_end_date]').val('');
          }else{
           // alert(res.msg);
            var flights_dates=[];
            call_pack_daterangepicker('.sDate_flight',flights_dates);
           }
        })
        .fail(function() {
           alert('some thing went wrong.');
        })
     }

     $('body').on('click', '.cancelBtn', function(event) {
       event.preventDefault();
        $('.rt_popup').removeClass('show');
     });
     $('body').on('click', '.applyBtn', function(event) {
       event.preventDefault();
        $('.rt_popup').removeClass('show');
     });
      $('body').on('apply.daterangepicker', function(ev, picker) {
      $('.rt_popup').removeClass('show');
      $('body').removeClass('fixed');       
    }); 
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mobile.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/mobile/pages/home.blade.php ENDPATH**/ ?>