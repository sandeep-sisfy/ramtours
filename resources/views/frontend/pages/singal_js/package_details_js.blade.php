<script type="text/javascript">
  $('#rami_pakage_adults').change(function(event) {
    setup_cart();
  });
  $('#rami_pakage_childs').change(function(event) {
    setup_cart();
  });
  $('#rami_pakage_infants').change(function(event) {
    setup_cart();
  });
  $(document).ready(function($) {
    setup_cart();
  });
  $('.rami_cart_select_div').on('change', 'select', function(event) {
    event.preventDefault();
    setup_cart();
  });
  $('#bf_card_cont').on('click', '#bf_card', function(event) {
    setup_cart();
  });

  function rami_getting_package_rooms(){
   var rooms=$('.rami_package_room').find('select').length;
   var all_rooms=[];
   var count=1;
   var i=0;
   while (rooms >= count) {
      ++i;
      var ele='chnage_select'+i;
      if($('.rami_package_room').find('.'+ele).length < 1){
        continue;
      }
      all_rooms[count]={room_id:$('.rami_package_room .'+ele).val(), room_class_id:i};
      count++;
   }
   return all_rooms;
  }
  function rami_getting_package_cars(){
   var cars=$('.rami_package_cars').find('select').length;
   var count=1;
   var all_cars=[];
   var i=0;
   while (cars >= count) {
      ++i;
      var ele='chnage_select'+i;
      if($('.rami_package_cars').find('.'+ele).length < 1){
        continue;
      }
      all_cars[count]={car_id:$('.rami_package_cars .'+ele).val(), car_class_id:i};
      count++;
   }
   return all_cars;
  }
  var cart_id='{{ strtotime(date('d-m-Y h:i:s')).rand(0,99)}}';
  function setup_cart(){
  var package_id= '{{$package->id}}';
  var package_type='{{$package->package_type}}';
  var _token='{!! csrf_token() !!}';
  var rami_pakage_adults=parseInt($('#rami_pakage_adults').val());
  var rami_pakage_childs=parseInt($('#rami_pakage_childs').val());
  var rami_pakage_infants=parseInt($('#rami_pakage_infants').val());


  if($('#bf_card').prop("checked") == true){
      var card=1;
  }
  else{
     var card=0;
  }
  if(rami_pakage_adults < 2){
    //alert('one Adult is compulsory');
    alert('2 מבוגרים הנדרשים להזמנה  ');
    return false;
  }
  if((rami_pakage_childs < 0)||(isNaN(rami_pakage_childs))||(rami_pakage_childs>99)){
    //alert('Child should be number between 0 to 99');
    alert('ילד צריך להיות מספר בין 0 ל  99 ');
    return false;
  }
   if((rami_pakage_infants < 0)||(isNaN(rami_pakage_infants))||(rami_pakage_infants>99)){
    //alert('infants should be number between 0 to 99');
    alert('תינוקות צריכים להיות בין 0 ל 99 ');
    return false;
  }
  if((rami_pakage_adults > 99)||((isNaN(rami_pakage_adults)))){
    //alert('Adults should be number between 1 to 99');
    alert('מבוגרים צריכים להיות בין 1 ל  99');
    return false;
  }
  $.ajax({
    url: '{{url('cart-setup')}}',
    type: 'POST',
    data: {_token: _token, package_id:package_id, package_type:package_type, cart_id:window.cart_id, adults:rami_pakage_adults, childs:rami_pakage_childs, infants:rami_pakage_infants, rooms:rami_getting_package_rooms(), cars:rami_getting_package_cars(), flight:$('.rami_package_flights').find('select').val(), card:card},
  })
  .done(function(res) {
    if(res.status=='success'){
	    totTxt = "המחיר המוצע הינו בהרכב של  " + rami_pakage_adults + " מבוגרים";
	    if (rami_pakage_childs > 0) {
		    totTxt = totTxt + " ו-" + rami_pakage_childs + " ילדים";
	    }

        var price= '<span>' + totTxt + '</span>€'+res.total_euro;

        $('.pkgprc').empty();
        $('.pkgprc').html(price);
        if(res.error_room.length >0){
          //alert('please check current room not added in cart not avalible in stock');
          alert('אנא בדוק את החדר הנוכחי שלא נוסף לעגלה לא ניתן להשיג במלאי  ');
        }
        if(res.error_fligts != 0){
          //alert('please check current flight not added cart because require vacancy not avalible');
          alert('אנא בדוק את העגלה הנוכחית שלא הוספה עגלה מכיוון שדורש פנוי אינו זמין ');
        }

    }else{
      alert(res.msg);
      //location.reload();
    }
  })
  .fail(function() {
   alert('somthing went wrong ');
   //location.reload();
  })

  }


    $('.rami_cart_select_div').on('click', '.add_button', function(event) {
      event.preventDefault();
      var main_parent =$(this).parent().parent();
      var counter=main_parent.find('select').length;
      counter++;
      for(var i = counter; i>0; i++) {
        counter=i;
        var new_class='chnage_select'+i;
        if(main_parent.find('.'+new_class).length !=1){
          break;
        }
      }
      var ele_name=$(this).prev().attr('element_name');
      var html='<div class="aprt-inner">';
      html+='<select class="rami_pkg_chnage_select '+new_class+'" element_no="'+counter+'" element_name="'+ele_name+'" >';
      html+=$(this).prev().html();
      html+='</select>';
      html+='<a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus" aria-hidden="true"></i></a>';
      html+='</div>';
      main_parent.append(html);
      $(this).closest('.aprt-inner').next().find('.rami_pkg_chnage_select').val(0);
    });

    //remove room or ccar
    $('.rami_cart_select_div').on('click', '.remove_button', function(event) {
        var main_parent =$(this).parent().remove();
         setup_cart();
    });

    $('.rami_incr_btn').click(function(event) {
      var cur_val=parseInt($(this).parent().prev('input').val());
      cur_val++;
      if(cur_val>99){
        return false;
      }else{
        $(this).parent().prev('input').val(cur_val)
      }
       setup_cart();
   });
   $('.rami_decr_btn').click(function(event) {
      var cur_val=parseInt($(this).parent().prev('input').val());
      cur_val--;
      if(($(this).parent().prev('input').attr('id')=='rami_pakage_adults')&&(cur_val<2)){
        return false;
      }else if(cur_val<0){
        return false;
      }
      else{
        $(this).parent().prev('input').val(cur_val)
      }
       setup_cart();
   });
    $('body').on('click', '.checking_cart', function(event) {
      $.ajax({
        url: '{{url('verify-cart')}}',
        type: 'post',
        data: {_token: '{!! csrf_token() !!}', cart_id:window.cart_id},
      })
      .done(function(res) {
         if(res.status=='success'){
           window.location.href=res.url;
         }else{
           if(res.flight_error==1){
            res.msg =' הוסף טיסות אחרות   ';
           }
           if(res.car_error==1){
            // res.msg +=',Add More Cars ';
            res.msg ='הרכב שבחרתם קטן מדי למספר הנפשות בעסקה ,יש לשנות הבחירה או להזמין 2 רכבים. ';
           }
           if(res.room_error==1){
           // res.msg +=',Add More Room ';
            res.msg ='הדירה או החדר שבחרתם אינם מתאימים למספר הנפשות בעסקה.יש להוסיף חדר נוסף או לבחור חדר או דירה גדולים יותר.';

           }
           alert(res.msg);
         }
      })
      .fail(function() {
        console.log("error");
      })



     });



</script>
