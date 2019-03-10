//for change template colour
//=============================
jQuery(document).ready(function( $ ) {
//for main colour
$("span.main-color").click(function(){
    $("body").addClass("main-color-bar").removeClass("blue-color-bar red-color-bar yellow-color-bar black-color-bar green-color-bar");
});

//for green colour
$("span.blue-color").click(function(){
    $("body").addClass("blue-color-bar").removeClass("main-color-bar red-color-bar yellow-color-bar black-color-bar green-color-bar");
});

//for yellow colour
$("span.yellow-color").click(function(){
    $("body").addClass("yellow-color-bar").removeClass("main-color-bar green-color-bar red-color-bar black-color-bar green-color-bar");
});

//for red colour
$("span.red-color").click(function(){
    $("body").addClass("red-color-bar").removeClass("main-color-bar green-color-bar yellow-color-bar black-color-bar green-color-bar");
});


//for black colour
$("span.black-color").click(function(){
    $("body").addClass("black-color-bar").removeClass("main-color-bar green-color-bar red-color-bar yellow-color-bar green-color-bar");
});

//for green colour
$("span.green-color").click(function(){
    $("body").addClass("green-color-bar").removeClass("main-color-bar blue-color-bar red-color-bar yellow-color-bar black-color-bar");
});


	$(".spinner-button").click( function(event){
	event.preventDefault();
	if ( $(this).hasClass("show-hide") ){
	$(".demo-color-panel").stop().animate({left:"-230px"}, 500);
	} else {
	$(".demo-color-panel").stop().animate({left:"0px"}, 500);
	}
	$(this).toggleClass("show-hide");
	return false;
	  });
	  
	  
	  
	  jQuery('.switcherShowHide').click(function() {
		if ( jQuery('.switcherShowHide').hasClass('switcherToggle') )
			{
			jQuery('.switcherShowHide').removeClass('switcherToggle');
			jQuery('.switcher').removeClass('opened');
		}else
		{   
			jQuery('.switcherShowHide').addClass('switcherToggle');
			jQuery('.switcher').addClass('opened');
		}

	});
	

});







