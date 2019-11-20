@extends('frontend.home_main')
@section('rami_front_container')
  @if(!empty($show_setting))
 <!-- <nav class="navbar navbar-expand-lg navbar-dark" id="rt_affix">
    <div class="container">
      <ul class="navbar-nav text-uppercase ml-auto rt_tabs">
         @foreach($show_setting as $setting)
           @if((!empty($setting['menu_title']))&&(!empty($setting['results'])))
                  @if($loop->index==0)
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger active" href="#nav_{{ $setting['id']}}">{{$setting['menu_title']}}</a>
                    </li>
                  @else
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#nav_{{ $setting['id']}}">{{$setting['menu_title']}}</a>
                    </li>
                  @endif
            @endif
         @endforeach
        </ul>
    </div>
  </nav>-->
  @endif
  @if(!empty($show_setting))
    @foreach($show_setting as $setting)
      @if(!empty($setting['results']))
        <section class="rt_frames" id="nav_{{ $setting['id'] }}">
          <div class="container">
            <div class="row text-center page-section" >
              @if(!empty($setting['section_title']))
              <div class="col-lg-12 text-center">
                <h2 class="section-heading">{{ $setting['section_title'] }}</h2>
              </div>
              @endif
                 @foreach($setting['results'] as $result)
                    @if($setting['package_type']==1)
                      {!!rami_vacation_pkg_html($result)!!}
                    @elseif($setting['package_type']==3)
                      {!!rami_fly_drive_pkg_html($result)!!}
                    @elseif($setting['package_type']==4)
                      {!!rami_flight_pkg_html($result)!!}
                    @endif
                   
                 @endforeach
            </div>
            <div class="row" style="display: none">
               <div class="col-md-12 text-center">
                <button class="btn btn-primary btn-lg btn-block view-more" type="submit">ראה עוד</button>
               </div>
             </div>
           </div>
        </section>
        @endif
    @endforeach
  @endif
@endsection
@section('rami_front_footer_js')
<div id="data_hidden_price" style="display:none"> 
</div>
<div id="data_hidden_price_flight" style="display:none"> 
</div>
<input type="hidden" name="rander_closest_tr" value="-1">
<input type="hidden" name="rander_closest_td" value="-1">
<input type="hidden" name="rander_trigger_self_event" value="-1">
<input type="hidden" name="rander_count" value="0">
@parent
<script type="text/javascript">
            $(document).ready(function(){               
                
                $('body').on('mouseup', 'td.picker_price_added', function(event){
                  if($('input[name=rander_trigger_self_event]').val()==1){
                      var rend_count=$('input[name=rander_count]').val();
                      if($(this).closest('.calendar').hasClass('left')){
                          var tr=$(this).closest('tr').index();
                          var td=$(this).closest('td').index();
                          if(($('input[name=rander_closest_tr]').val()!=tr)||($('input[name=rander_closest_td]').val()!=td)){
                            return false;
                          }
                      }else{
                        return false;
                      }
                      rend_count++;
                      if($('.td.picker_price_added').length <= rend_count){
                        $('input[name=rander_trigger_self_event]').val(0);
                      }
                    }
                  if($(this).closest('.calendar').hasClass('right')){
                     var tbody= $(this).closest('tbody')
                     var tr= $(this).closest('tr')
                  }
                    // alert($(this).closest('.calendar').attr('class'));
                    // //$('.next').trigger('click');
                    if($('#three-tab').hasClass('active')){
                      var price_parent='data_hidden_price_flight';
                      var cur_symbol='$';
                    }else{
                      var price_parent='data_hidden_price';
                      var cur_symbol='€';;
                    }
                    $('.picker_price_added .picker_low_price').remove();
                    $('.picker_price_added').removeClass('pk_start_date');
                    $('.picker_price_added').removeClass('in-range');
                    $('.picker_price_added').removeClass('active');
                    $('.picker_price_added').removeClass('active');
                    $('.picker_price_added').removeClass('available');
                    $('.picker_price_added').removeClass('start-date');
                    $('.picker_price_added').removeClass('weekend');
                    $('.picker_price_added').removeClass('today');
                    $('.picker_price_added').addClass('disabled');
                    $('.picker_price_added').removeClass('picker_price_added');
                    $(this).addClass('rt_start pk_start_date')
                    $(this).removeClass('disabled');
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
                      et_class = et_class.replace("today", "");
                      et_class = et_class.replace("off", "");
                      et_class = et_class.replace(' ', "");
                      et_class=$.trim(et_class);
                      //console.log(et_class);
                      if($.inArray( et_class, end_date) != -1){
                        $(this).removeClass('disabled');
                        $(this).addClass('pk_start_date');
                        $(this).addClass('available');
                        $(this).addClass('pk_et_date_find');
                        var new_start_class='pack_'+start_class+'_'+et_class;
                        //console.log(new_start_class);
                        var price= $('#'+price_parent+' .'+new_start_class).val();
                        $(this).append('<div class="picker_low_price">'+cur_symbol+price+'</div');
                      }
                    });
                    if($(this).closest('.calendar').hasClass('right')){
                      if($('.pk_et_date_find').length<1){
                        var tr=$(this).closest('tr').index();
                        var td=$(this).closest('td').index();
                        $('input[name=rander_closest_tr]').val(tr);
                        $('input[name=rander_closest_td]').val(td);
                        $('input[name=rander_trigger_self_event]').val(1);
                        $('input[name=rander_count]').val(0);
                        $('.next').trigger('click');
                        $('td.picker_price_added').trigger('mouseup');
                      }
                      if($('.off.pk_et_date_find').length==$('.pk_et_date_find').length){
                        var tr=$(this).closest('tr').index();
                        var td=$(this).closest('td').index();
                        $('input[name=rander_closest_tr]').val(tr);
                        $('input[name=rander_closest_td]').val(td);
                        $('input[name=rander_trigger_self_event]').val(1);
                        $('input[name=rander_count]').val(0);
                        $('.next').trigger('click');
                        $('td.picker_price_added').trigger('mouseup');
                      }
                    }
                   
                 });
                function call_pack_daterangepicker(element, data_array, date_array, end_array,  class_prefix, symbol){
                   $(element).daterangepicker({
                      singleDatePicker: false,
                      //customClass: 'startDate',
                      autoApply: true,
                      opens: 'left',
                      locale: {
                        format: 'YYYY-MM-DD',
                        daysOfWeek: ["א","ב","ג","ד","ה","ו"," ש"],
                        monthNames: ["ינואר","פברואר","מרץ","אפריל","מאי","יוני",
                          "יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר","דצמבר"]
                      ,
                      applyLabel: "הגש מועמדות",
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

          $('.sDate_pack').change(function(){
              var date= $(this).val().split('-');
              var sDate= date[0]+'-'+date[1]+'-'+date[2];
              var eDate= date[3]+'-'+date[4]+'-'+date[5];
              $('input[name=pack_start_date]').val($.trim(sDate));
              $('input[name=pack_end_date]').val($.trim(eDate));
              chnage_pakage_picker_date();
            });
          $('.flight_sDate').change(function(){
              var date= $(this).val().split('-');
              var sDate= date[0]+'-'+date[1]+'-'+date[2];
              var eDate= date[3]+'-'+date[4]+'-'+date[5];
              $('input[name=flight_start_date]').val($.trim(sDate));
              $('input[name=flight_end_date]').val($.trim(eDate));
              chnage_flight_picker_date();
          }); 
         $('.sDate_pack').val('');  
         $('.flight_sDate').val('');
                /***** Date Popup  ******/
         $('.sDate_pack').click(function(){
            $('input[name=daterangepicker_start]').val('');
            $('input[name=daterangepicker_end]').val('').removeClass('rt_active');
            $('.today').removeClass('start-date end-date');
           });
           $('.flight_sDate').click(function(){ 
            $('input[name=daterangepicker_start]').val('');
            $('input[name=daterangepicker_end]').val('').removeClass('rt_active'); 
            $('.today').removeClass('today active start-date active end-date available');       
           });  
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

            function chnage_flight_picker_date(){
            if($('input[name=flight_start_date]').val()==$('input[name=flight_end_date]').val()){
               var d = new Date();
               var month=("0" + (d.getMonth() + 1)).slice(-2);
               var new_date=$.trim(d.getFullYear()+'-'+month+'-'+d.getDate());
               if($('input[name=flight_start_date]').val()==new_date){
                $('input[name=flight_start_date]').val('');
                $('input[name=flight_end_date]').val('');
                $('.flight_sDate').val('');
               }
            }
           }

           chnage_pakage_picker_date();
           chnage_flight_picker_date();
        
            
            $('#pack_location').change(function(event) {
              var loc=$(this).val();
              $.ajax({
                url: '/packages-location-dates',
                type: 'POST',        
                data: {_token:'{{csrf_token()}}', pack_location:loc},
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
              })
              
            });
            $('#pack_location').trigger('change');
            $('select[name=destination_location]').change(function(event) {
              var desti=$(this).val();
              var src=$('select[name=source_location]').val();
             flight_dates_by_src_desti(src, desti);
              
            });
            $('select[name=destination_location]').trigger('change');
            $('select[name=source_location]').change(function(event) {
              var src=$(this).val();
              var desti=$('select[name=destination_location]').val();
             flight_dates_by_src_desti(src, desti);
              
           });

           function flight_dates_by_src_desti(src, desti){
            $.ajax({
                url: '/flights-src-desti-dates',
                type: 'POST',
                data: {_token:'{{csrf_token()}}', src:src,desti:desti},
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
                  call_pack_daterangepicker('.flight_sDate',flights_dates,flights_dates_only, flights_end_dates, 'pk_', '$');
                  $('.flight_sDate').val('');
                  $('input[name=flight_start_date]').val('');
                  $('input[name=flight_end_date]').val('');
                }else{
                 // alert(res.msg);
                  var flights_dates=[];
                  call_pack_daterangepicker('.flight_sDate',flights_dates);
                 }
              })
              .fail(function() {
                 alert('some thing went wrong.');
              })
           }

     });
</script>
@endsection
