<script type="text/javascript">
    function validate_input_by_name(elements){
      var error=1;
      $.each(elements, function(index, el) {
        $('[name='+el+']').next('.error').remove();
        var ele=$('[name='+el+']');
        if(!ele[0].checkValidity()){
          $('[name='+el+']').after('<level class="error">'+$('[name='+el+']')[0].validationMessage+'</level>');
          error=0;
        }
      });
       return error;
    }
    $('#contact_popup_btn').click(function(event) {
      var elements =['first_name_contact','last_name_contact','email_contact','phone_contact','msg_contact'];
      if(validate_input_by_name(elements)){
          submit_contact_form();
      }
      return false;
    });
    function submit_contact_form(){
      $.ajax({
        url:"<?php echo e(url('submit-contact-form')); ?>",
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', first_name_contact: $('[name=first_name_contact]').val(), last_name_contact: $('[name=last_name_contact]').val(),email_contact: $('[name=email_contact]').val(),phone_contact: $('[name=phone_contact]').val(),msg_contact: $('[name=msg_contact]').val()},
          beforeSend:function(){
            $('.rt_loader').show();
          }
      })
      .done(function(res) {
         if(res.status=='success'){
          $('#rt_warning .modal-title').html('');
          $('#rt_warning .modal-title').html('!!success');
          $('#rt_warning .rt_errormsg').html('אילתה שלח את מנהל ההצלחה');
          $('#rt_warning').modal('show');
          $('#contact_popup_form')[0].reset();
          $('#contact_popup').hide();
          $('.modal-backdrop').removeClass('show');
          $('.rt_loader').hide();
         }else{
          $('#rt_warning .modal-title').html('');
          $('#rt_warning .modal-title').html('Error!');
          $('#rt_warning .rt_errormsg').html('בדוק שוב את שדות הקלט שלך  ');
          $('#rt_warning').modal('show');
          $('.rt_loader').hide();
          $('.modal-backdrop').removeClass('show');
         }
      })
      .fail(function() {
        alert('somthing went wrong');
      })

    }
    $('.testimonial_div').on('click', '.rami_load_more_btn', function(event) {
      event.preventDefault();
      var page=$(this).attr('page_attr');
      $.ajax({
        url: '/load_more',
        type: 'POST',
        data: {_token:'<?php echo e(csrf_token()); ?>', page:page,type:1,no_of_element:4},
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
          $('.rt_loader').hide();
          $('.modal-backdrop').removeClass('show');
          alert(res.msg);
        }
      })
      .fail(function() {
        alert('some thing went wrong.');
      })
            
    });

  </script><?php /**PATH /home/eli/ramtours/resources/views/mobile/pages/singal_js/contact_us_popup_js.blade.php ENDPATH**/ ?>