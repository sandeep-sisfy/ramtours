$(".form-control[type!='checkbox']").each(function(){
  var val=$(this).val();
  if ((typeof val != "undefined")&&(val !='')) {
    $(this).parent().addClass('focused');
  }
});
//validation login page
$("#sign_in").validate({
  rules: {
    email:{
      required: true,
      email:true
    },
    password:{
        required:true,
    }
  },
  messages: {
    email: {
      required: "Please enter your email to Sign-In.",
      email:"Please Enter Valid Email Address."
    },
    password:{
      required:"Please enter your password to Sign-In."
    }
  }
});
//end login page js