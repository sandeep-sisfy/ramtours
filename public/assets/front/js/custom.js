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
if($('#rami_pakage_adults').val()==1){
  $('#rami_pakage_adults').val(2)
}
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

  $('.flight_row').click(function(){     
       $(this).toggleClass('opened');      

   });
  $('#add_opinion').click(function(){     
       $('#showopiniondiv').toggle();      

   });
 $('.flt_hide_detail').click(function(){ 
    var new_ele1 =$(this).attr("data-target");
     $(new_ele1).removeClass("show"); 
 });
 
 /***** Third Level Dropdown *****/
    $('.navbar .dropdown-item').on('click', function (e) {
        var $el = $(this).children('.dropdown-toggle');
        var $parent = $el.offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if (!$parent.parent().hasClass('navbar-nav')) {
            if ($parent.hasClass('show')) {
                $parent.removeClass('show');
                $el.next().removeClass('show');
                $el.next().css({"top": -999, "left": -999});
            } else {
                $parent.parent().find('.show').removeClass('show');
                $parent.addClass('show');
                $el.next().addClass('show');
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }
           // e.preventDefault();
            e.stopPropagation();
        }
    });

    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
       // $(this).find('li.dropdown').removeClass('show open');
        $(this).find('ul.dropdown-menu').removeClass('show open');
    });
/***** Third Level Dropdown *****/
     
/***** Dropdown On Hover *****/

 $(".btn-group").hover(
  function () {
      $('>.dropdown-menu', this).stop(true, true).fadeIn("500");
      $(this).addClass('open');
  },
  function () {
      $('>.dropdown-menu', this).stop(true, true).fadeOut("500");
      $(this).removeClass('open');
  });
 $('.show_more_review').click(function(){ 
   $('.carousel-item.active').addClass("show"); 
   $('.show_more_review').hide(); 
   $('.show_less_review').show();
  });
  $('.show_less_review').click(function(){ 
  $('.carousel-item.active').removeClass("show");
  $('.show_more_review').show();
  $('.show_less_review').hide();
  });
$('.notes_transaction').click( function(){
      $('.remarks_sect').toggleClass("show");
       $(this).text($(this).text() == 'הערות לעסקה'  ?  'סגירה' : 'הערות לעסקה');
  });
 
})(jQuery); // End of use strict
//$(document).ready(function(){
	//	$("#rt_warning").modal('show');
//});

 /**** Highlight Dates of Start Date Calender *****/
 var highlight_sdates = ['1-11-2016','3-11-2016','7-11-2016','11-11-2016'];
            $(document).ready(function(){                
                // Initialize datepicker
                $('.sDate').datepicker({
                    beforeShowDay: function(date){                        
                        var month = date.getMonth()+1;
                        var year = date.getFullYear();
                        var day = date.getDate();                        
                        // Change format of date
                        var newdate = day+"-"+month+'-'+year;
                        // Set tooltip text when mouse over date
                        var tooltip_text = "New event on "+newdate;
                        // Check date in Array
                        if(jQuery.inArray(newdate, highlight_sdates) != -1){
                            return [true, "highlight", tooltip_text ];
                        }
                        return [true];
                    }
                });
            });

/**** Highlight Dates of End Date Calender *****/
  var highlight_edates = ['19-6-2015','27-8-2015','30-8-2015','8-11-2015'];
            $(document).ready(function(){                
                // Initialize datepicker
                $('.eDate').datepicker({
                    beforeShowDay: function(date){                        
                        var month = date.getMonth()+1;
                        var year = date.getFullYear();
                        var day = date.getDate();                        
                        // Change format of date
                        var newdate = day+"-"+month+'-'+year;
                        // Set tooltip text when mouse over date
                        var tooltip_text = "New event on "+newdate;
                        // Check date in Array
                        if(jQuery.inArray(newdate, highlight_edates) != -1){
                            return [true, "highlight", tooltip_text ];
                        }
                        return [true];
                    }
                });
                $('body').on('click', '.home-product-box', function(event) {
                    var href=$(this).find('a').attr('href');
                    window.location.href=href;
                });
                $('body').on('click', '.flt_header', function(event) {
                    var href=$(this).find('a').attr('href');
                    window.location.href=href;
                });
            });

