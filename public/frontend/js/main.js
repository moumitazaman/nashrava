(function ($) {
 "use strict";

/*----------------------------
    MeanMenu active
------------------------------ */
	$(".main-menu").meanmenu();	

/*----------------------------
	OWL js active
------------------------------ */
	new WOW().init();

/*----------------------------
	OWL Carousels active
------------------------------ */  
	$("#new-product-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		pagination:false,
		navigation:true,	  
		items : 4,
		/* transitionStyle : "fade", */    /* [This code for animation ] */
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,2],
        itemsTablet: [767,1],
		itemsMobile : [479,1],
	});
	$("#best-seller-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		pagination:false,
		navigation:true,	  
		items : 4,
		/* transitionStyle : "fade", */    /* [This code for animation ] */
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,2],
		itemsTablet: [767,1],
		itemsMobile : [479,1],
	});

	$("#blog-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		pagination:false,
		navigation:true,	  
		items : 3,
		/* transitionStyle : "fade", */    /* [This code for animation ] */
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,1],
		itemsMobile : [479,1],
	});  
	$("#testimonial-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		pagination:true,
		navigation:false,	  
		items : 1,
		/* transitionStyle : "fade", */    /* [This code for animation ] */
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1],
		itemsMobile : [479,1],
	});  	
	$("#brand-loago-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:1000,
		pagination:false,
		navigation:false,	  
		items : 6,
		/* transitionStyle : "fade", */    /* [This code for animation ] */
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,4],
		itemsTablet: [768,4],
		itemsTablet: [767,2],
		itemsMobile : [479,2],
	}); 
	$("#featured-product-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		pagination:false,
		navigation:true,	  
		items : 4,
		/* transitionStyle : "fade", */    /* [This code for animation ] */
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,2],
		itemsTablet: [767,1],
		itemsMobile : [479,1],
	}); 
	$(".related-product-carousel-active").owlCarousel({
		autoPlay: false, 
		slideSpeed:2000,
		pagination:false,
		navigation:true,	  
		items : 1,
		/* transitionStyle : "fade", */    /* [This code for animation ] */
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1],
		itemsMobile : [479,1],
	});  

/*--------------------------
	Google Map 
---------------------------- */	   
	$(".map-btn").on("click", function(){
		$("#googleMapfooter").slideToggle(300);
	});	  	   
/*--------------------------
	Category Dorpdown
---------------------------- */	   
	$(".category-menu > li").on("click", function(){
		$("ul.cat-toggle").slideToggle(300);
	});	  	   

/*----------------------------
	Price-slider active
------------------------------ */  
	$( "#slider-range" ).slider({
		range: true,
		min: 40,
		max: 1600,
		values: [ 100, 999 ],
		slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
	" - $" + $( "#slider-range" ).slider( "values", 1 ) );  
	
/*----------------------------
    Cart-plus-minus-button 
------------------------------*/
	$(".cart-plus-minus").append("<div class='dec qtybutton'>-</i></div><div class='inc qtybutton'>+</div>");

	$(".qtybutton").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
	});

/*----------------------------
    Slick Slider 
------------------------------*/
	$(".details-thumb-big").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		fade: true,
		asNavFor: ".details-thumb-small"
	});
	$(".details-thumb-small").slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: ".details-thumb-big",
		dots: false,
		centerMode: true,
		focusOnSelect: true,
		arrows: false,
		prevArrow: "<button type='button' class='custom-prev'><i class='fa fa-long-arrow-left'></i></button>",
		nextArrow:"<button type='button' class='custom-next'><i class='fa fa-long-arrow-right'></i></button>"
	});
	
/*--------------------------
    ScrollUp
---------------------------- */	
	$.scrollUp({
		scrollText: "<i class='fa fa-angle-up'></i>",
		easingType: "linear",
		scrollSpeed: 900,
		animation: 'fade'
	}); 
})(jQuery); 