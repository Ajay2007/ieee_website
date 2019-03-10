
jQuery(document).ready(function( $ ) {
		
   
   //for # link
	$('#navigation li a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
		&& location.hostname == this.hostname) {
		  var $target = $(this.hash);
		  $target = $target.length && $target
		  || $('[name=' + this.hash.slice(1) +']');
		  if ($target.length) {
			var targetOffset = $target.offset().top;
			$('html,body')
			.animate({scrollTop: targetOffset}, 1000);
		   return false;
		  }
		}
	});
	
	 //for preloader
	 (function () {
	    $(window).load(function() {
	        $('#preloader-item').fadeOut();
	        $('#preloader').delay(350).fadeOut('slow');
	    });
	}());
	
	
	 //for animated
	 new WOW().init();
	 
	 
   //mixtup
  $(".portfolio-wrapper").mixItUp();
  
     //for nice scroll 
	     (function($){
        $("html").niceScroll({
            cursorborder:"",
            cursorcolor:"#00F",
            boxzoom:false,
            scrollspeed:60,
            cursorcolor: "#fbd202",
            cursorwidth: "5px",
            zindex: "9999999",
            mousescrollstep:40,
            enablemousewheel: true,
        });
   })(jQuery);
   
   
   //for prettyphoto
    $("a[rel^='prettyPhoto']").prettyPhoto();
   
  (function($){
        $("area[data-gal^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[data-gal^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'pp_default',slideshow:3000, autoplay_slideshow: false});
        $(".gallery:gt(0) a[data-gal^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
       })(jQuery);
    });
	
	
	
$(function(){

    // main-slider
	var slideHeight = $(window).height();
	$('#home-slider .item').css('height',slideHeight);

	$(window).resize(function(){'use strict',
		$('#home-slider .item').css('height',slideHeight);
	});
	
	
	
	//menu
	jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 1) {
            jQuery("#navigation").css("background-color","#33B6CD");
            jQuery("#navigation").addClass("animated-nav");
        } else {
            jQuery("#navigation").css("background-color","transparent");
            jQuery("#navigation").removeClass("animated-nav");
        }
    }); 
	
	
});

   //for all parallax effect	
     $('.youtube-parallax').parallax({imageSrc:'images/background/bg1.jpg'}); 
     $('.team-parallax').parallax({imageSrc:'images/background/bg2.jpg'}); 

	 
	 
// Testimonials Carousel
	
var testimonial = $("#testimonial-carousel");

testimonial.owlCarousel({
	navigation : true,
	pagination: true,
	slideSpeed : 2500,
	stopOnHover: true,
	autoPlay: 3000,
	singleItem: true,
	transitionStyle : "goDown",
	navigationText: ['<i class="fa fa-chevron-down"></i>', ]
}); 
