$(function() {
    //caches a jQuery object containing the header element
    var header = $(".navbar");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();


        if (scroll > 370) {
            header.removeClass('navbar-static-top').addClass("navbar-fixed-top");
            
        } else {
        	
            header.removeClass("navbar-fixed-top").addClass('navbar-static-top');
        }
    });
});