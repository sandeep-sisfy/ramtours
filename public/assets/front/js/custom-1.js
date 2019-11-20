(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 43)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });
// Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#rt_affix',
    offset: 46
  });  

/* copy loaded thumbnails into carousel */
$('.panel .img-responsive').on('load', function() {
  
}).each(function(i) {
  if(this.complete) {
    var item = $('<div class="item"></div>');
    var itemDiv = $(this).parent('a');
    var title = $(this).parent('a').attr("title");
    
    item.attr("title",title);
    $(itemDiv.html()).appendTo(item);
    item.appendTo('#modalCarousel .carousel-inner'); 
    if (i==0){ // set first item active
     item.addClass('active');
    }
  }
});
/**** Spinner ******/
(function ($) {
  $('.spinner .btn:first-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
  });
  $('.spinner .btn:last-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
  });
})(jQuery);

/****** Append Apartment Select ******/
 var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.apart'); //Input field wrapper
    var fieldHTML = '<div class="aprt-inner"><select><option>דירה</option><option>דירה</option><option>דירה</option></select><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus" aria-hidden="true"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div.aprt-inner').remove(); //Remove field html
        x--; //Decrement field counter
    });

  /****** Append Apartment Select ******/
 var maxField2 = 10; //Input fields increment limitation
    var addButton2 = $('.add_button2'); //Add button selector
    var wrapper2 = $('.apart2'); //Input field wrapper
    var fieldHTML2 = '<div class="aprt-inner2"><select><option>פולקסווגן פאסאט</option><option>פולקסווגן פאסאט</option><option>פולקסווגן פאסאט</option></select> <a href="javascript:void(0);" class="remove_button2" title="Remove field"><i class="fa fa-minus" aria-hidden="true"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton2).click(function(){ //Once add button is clicked
        if(x < maxField2){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper2).append(fieldHTML2); // Add field html
        }
    });
    $(wrapper2).on('click', '.remove_button2', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div.aprt-inner2').remove(); //Remove field html
        x--; //Decrement field counter
    });

/* activate the carousel */
$('#modalCarousel').carousel({interval:false});

/* change modal title when slide changes */
$('#modalCarousel').on('slid.bs.carousel', function () {
  $('.modal-title').html($(this).find('.active').attr("title"));
})

/* when clicking a thumbnail */
$('.panel-thumbnail>a').click(function(e){
  
    e.preventDefault();
    var idx = $(this).parents('.panel').parent().index();
    var id = parseInt(idx);
    
    $('#myModal').modal('show'); // show the modal
    $('#modalCarousel').carousel(id); // slide carousel to selected
    return false;
});



  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });
  $('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });
 $('.nav-close').click(function(){
       $('.navbar-collapse').toggleClass('show');
       $('body').toggleClass('fixed');
   });

 $('.rt-advsearch .input-group').click(function(){  
       $('.rt-advform').toggleClass('show'); 
       $('.rt-advsearch').toggleClass('disp');     
   });
 $('.adv_btn').click(function(){  
       $('.rt-advform').toggleClass('show'); 
       $('.rt-advsearch').toggleClass('disp');     
   });
  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 56
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);  
  
})(jQuery); // End of use strict
