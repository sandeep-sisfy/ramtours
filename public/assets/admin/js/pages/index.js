//[custom Javascript]

//Project:	Nexa - Responsive Bootstrap 4 Template
//Version:  1.0
//Last change:  15/12/2017
//Primary use:	Nexa - Responsive Bootstrap 4 Template

//should be included in all pages. It controls some layout


$(function () {
    "use strict"; 
});


//===============================================================================
$(window).on('scroll',function() {
    $('.card .sparkline').each(function(){
    var imagePos = $(this).offset().top;

    var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+400) {
            $(this).addClass("pullUp");
        }
    });
});

$(document).ready(function() {
    $('.admin-logout').click(function(event) {
        if(confirm("Are You sure to Sign-out")){
            $('#logout-form').submit();
        }
    });
});
