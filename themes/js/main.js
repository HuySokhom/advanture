(function ($) {
 "use strict";
    
/*----------------------------
    wow js active
------------------------------ */
    new WOW().init();
    
/*----------------------------
    jQuery MeanMenu
------------------------------ */
	jQuery('nav#dropdown').meanmenu();	
	
/*----------------------------
    Best Sell Owl Carousel
------------------------------ */  
    $(".best-sell-slider").owlCarousel({
        autoPlay: true,
        slideSpeed:2000,
        pagination:false,
        navigation:true,
        items : 4,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
/*----------------------------
    Partner Owl Carousel
------------------------------ */  
    $(".partner-carousel").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:true,	  
        items : 4,
        /* transitionStyle : "fade", */    /* [This code for animation ] */
        navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
    
/*----------------------------
    Price Slider Activate
------------------------------ */  
    $( "#slider-range" ).slider({
        range: true,
        min: 110,
        max: 300,
        values: [ 120, 240 ],
        slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
	   " - $" + $( "#slider-range" ).slider( "values", 1 ) );  
    
/*--------------------------
    ScrollUp
---------------------------- */	
    $.scrollUp({
        scrollName: 'scrollUp',
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade',
        animationInSpeed: 2000
    });	   
 
/*--------------------------
    Counter Up
---------------------------- */	
    $('.counter').counterUp({
        delay: 70,
        time: 5000
    });
    
/*------------------------------------
    Tooltip
-------------------------------------- */
    $('[data-toggle="tooltip"]').tooltip();


    $("#text-search").validate({
        rules: {
            keywords: {
                required: true,
                maxlength: 25,
            },
        },
        messages: {
            "keywords": {
                required: "Please, enter text"
            },
        },
    });
    /**
     * send mail form validation
     */
    $("#contact-form").validate({
        rules: {
            f_name: {
                required: true,
                maxlength: 25,
            },
            l_name: {
                required: true,
                maxlength: 25,
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
                maxlength: 100,
            }
        },
        messages: {
            "f_name": {
                required: "Please, enter a first name"
            },
            "l_name": {
                required: "Please, enter a last name"
            },
            "email": {
                required: "Please, enter an email",
                email: "Email is invalid"
            },
            "message": {
                required: "Please, enter an message",
            }
        },
        submitHandler: function (form) {
            // @todo
            //var values = $(this).serialize();
            var data = {
                name: $('#name').val(),
                email: $('#email').val(),
                enquiry: $('#enquiry').val(),
            };

            console.log(data);
            $.ajax({
                url: "api/SendMail",
                dataType: "json",
                type: "POST",
                data: data,
                success: function (response) {
                    $('#text-message').text('Send Successful.');
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
            return false;
        }
    });

})(jQuery); 