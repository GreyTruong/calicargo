(function($){

"use strict";

$(document).ready(function() {


	var win_h = $(window).height(),
		accent_color = $("footer .copyrights a").css('color');


	//Back-to-top Button
	$(window).scroll(function(e) {
	    
        if($(window).scrollTop() > 150){
	        $(".back-to-top").addClass('active');
	    }
	    else {
	    	$(".back-to-top").removeClass('active');
	    }
	});
	$(".back-to-top").click(function(event) {
		event.preventDefault();

		$(window).scrollTo(0, 1500, {easing:'easeOutExpo'});
	});
	//Videos
	$("body").fitVids();
	

    //Shop Product Detail & Shop Cart -> "Product Quantity"
    $(".product-single .cart .minus, .shop-cart .product-quantity .minus").click(function(event) {
    	
    	var quantity = parseInt($(this).next().val());

    	if(isNaN(quantity) || quantity < 1) {
    		quantity = 1;
    	}
    	quantity--;
    	$(this).next().val(quantity);
    });
    $(".product-single .cart .plus, .shop-cart .product-quantity .plus").click(function(event) {
    	
    	var quantity = parseInt($(this).prev().val());

    	if(isNaN(quantity) || quantity < 0) {
    		quantity = 0;
    	}
    	quantity++;
    	$(this).prev().val(quantity);
    });


    //Fancybox images
    $(".fancybox-image").fancybox({
	 
	    padding     : 0,
	    margin      : 100,
	    openEffect  : 'elastic',
	    closeEffect : 'elastic',
	    openSpeed   : 400,
	    closeSpeed  : 400,
	 
	    helpers : {
	        overlay : {
	            css : {
	                'background' : 'rgba(0, 0, 0, 0.75)'
	            }
	        }
	    }
	});



/*==========================================================================================================================================
/*==========================================================================================================================================
	Animation
============================================================================================================================================
============================================================================================================================================*/

	$("body").imagesLoaded(function(){

		$('.animated').each(function(index, el) {
			
			var current = $(this);

			current.appear();

			current.on('appear', function() {
			 
			    var animation = current.attr('data-animation');
			    if ( !current.hasClass('visible') ) {

			        var animationDelay = current.attr('data-animation-delay');
			        if ( animationDelay ) {

			            setTimeout(function(){
			                current.addClass( animation + " visible" );
			            }, animationDelay);

			        } 
			        else {
			            current.addClass( animation + " visible" );
			        }
			    }
			});

			if(current.is(':appeared') && !current.hasClass('visible')) {
			    
			    var animation = current.attr('data-animation');
		        var animationDelay = current.attr('data-animation-delay');

		        if ( animationDelay ) {

		            setTimeout(function(){
		                current.addClass( animation + " visible" );
		            }, animationDelay);

		        } 
		        else {
		            current.addClass( animation + " visible" );
		        }
			}
		});
	});


/*==========================================================================================================================================
/*==========================================================================================================================================
	Menu
============================================================================================================================================
============================================================================================================================================*/

	//Dropdown effect
	$("header nav li").hover(function() {
	 
	    if ( $(this).children('ul').length > 0 && !$(this).parent().parent().hasClass('mega-menu') && !$(".mobile-navigation").is(':visible') ) {
	        $(this).find('> ul').fadeIn(300);
	    }
	 
		}, function() {
	 
	    if ( $(this).children('ul').length > 0 && !$(this).parent().parent().hasClass('mega-menu') && !$(".mobile-navigation").is(':visible') ) {
	        $(this).find('> ul').stop().fadeOut(300);
	    }
	});

	// Enabling Sticky Menu.
	$(window).scroll(function(e) {
	    var window_top_offset = $(window).scrollTop();
	    
        if($("header .header-container").offset().top <= 150){
	        $("header").removeClass('sticky');
	    }
	    else {
	        $("header").addClass('sticky');
	    }
	});

	//Unfolding sub-menus in responsive mode.
	$("header nav li a .arrow-down").click(function(event) {
	 	
	 	event.preventDefault();

	 	var anchor = $(this).parent();

		anchor.unbind('click');

	    //Check if it has sub menus
	    if ( anchor.parent().children('ul').length > 0 && $(".mobile-navigation").is(':visible') ) {
	 
	        anchor.parent().find('> ul').slideToggle(300);
	    }
	});

	//Mobile navigation
	$(".mobile-navigation").click(function(event) {
	     
	    event.preventDefault();
	 
	    $("header nav").slideToggle(100);
	});
	 
	//Search button
	$(".top-bar .header-search").click(function(event) {
	    event.preventDefault();
	 
	    $(".top-bar .header-search-form").stop().fadeToggle(300);
	    $(".header-search-form form input").focus();
	});

	//Search Close
	$(".top-bar .header-search-form .close").click(function(event) {
	    event.preventDefault();
	 
	    $(".top-bar .header-search-form").stop().fadeToggle(300);
	});


/*==========================================================================================================================================
/*==========================================================================================================================================
	Sliders
============================================================================================================================================
============================================================================================================================================*/
	

	//Home layout 1,2,3,5,7 Slider
	$('.slideshow-container.style-1 .slideshow-inner').revolution({

		delay:8000,
		startwidth:1170,
		startheight:460,
		keyboardNavigation:"on",
		onHoverStop:"off",
		hideTimerBar:"on",
		fullWidth:"on",
		autoHeight:"off",
		forceFullWidth:"off",
		shadow:0,
		hideThumbs:100,

		navigationType:"none",
		navigationArrows:"solo",

		soloArrowLeftHalign:"left",
		soloArrowLeftValign:"center",
		soloArrowLeftHOffset:20,
		soloArrowRightHalign:"right",
		soloArrowRightValign:"center",
		soloArrowRightHOffset:20,
	});

	

	//Shop Product Detail Slider
	$(".product-single .product-media #product-img-nav").flexslider({
	  
		animation: "slide",
		directionNav: false,
		controlNav: false,
		animationLoop: true,
		slideshow: false,
		itemWidth: 70,
		itemMargin: 30,
		asNavFor: '#product-img-slider'
	});
	$(".product-single .product-media #product-img-slider").flexslider({
	  	
	  	prevText: "",
	  	nextText: "",
		animation: "slide",
		controlNav: false,
		smoothHeight: true,
		animationLoop: true,
		slideshow: false,
		sync: "#product-img-nav",
	});

	//About Slider
	$(".flexslider").flexslider({
	  
	    prevText: "",
	    nextText: "",
	    slideshow: true,
	    slideshowSpeed: 4000,
	    animationSpeed: 600,
	    controlNav: false,
	    directionNav: true,
	});
/*==========================================================================================================================================
/*==========================================================================================================================================
	Shortcodes
============================================================================================================================================
============================================================================================================================================*/
	//Tabs "Horizontal"
	$(".tabs-1 .tabs-container").tabs({
	    hide: 200,
	    show: 500
	});

	//Tabs Vertical
	$( ".tabs-2 .tabs-container" ).tabs({
	    hide: 200,
	    show: 500
	}).addClass( "ui-tabs-vertical ui-helper-clearfix" );
	$( ".tabs-2 .tabs-container li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );


	//Accordions
	$(".accordion-1 .accordion-container").accordion({
	    heightStyle: "content",
	    icons: { "header": "icon2-plus", "activeHeader": "icon2-minus" },
	    animate: 200,
	    header: "h3",
		autoHeight: true
	});


	//Toggles
	$(".toggle-1 .accordion-container").accordion({
	    heightStyle: "content",
	    icons: { "header": "icon2-plus", "activeHeader": "icon2-minus" },
	    animate: 200,
	    header: "> div > h3",
		autoHeight: true,
		collapsible: true,

		beforeActivate: function(event, ui) {

	        if (ui.newHeader[0]) {
	            var currHeader  = ui.newHeader;
	            var currContent = currHeader.next('.ui-accordion-content');
	        } 
	        else {
	            var currHeader  = ui.oldHeader;
	            var currContent = currHeader.next('.ui-accordion-content');
	        }

	        var isPanelSelected = currHeader.attr('aria-selected') == 'true';
	 

	        currHeader.toggleClass('ui-corner-all',isPanelSelected)
	        		  .toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));
	 

	        currHeader.children('.ui-icon').toggleClass('icon2-plus',isPanelSelected).toggleClass('icon2-minus',!isPanelSelected);
	 

	        currContent.toggleClass('accordion-content-active',!isPanelSelected)   
	        if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }
	 
	        return false;
	    }
	});

	//Maps
	$("#map-1").gMap({
	   
	    address: "519 Montague Expy, Milpitas, CA 95035",
	    zoom: 15,
	    scrollwheel: true,
	    maptype: 'ROADMAP', //'HYBRID', 'SATELLITE', 'ROADMAP' or 'TERRAIN'
	   
	    controls: {
	           panControl: true,
	           zoomControl: true,
	           mapTypeControl: false,
	           scaleControl: false,
	           streetViewControl: true,
	           overviewMapControl: false
	    },
	    markers: [
	        {
	            address: "London, UK"
	        }
	    ]
	});


	//Videos "Fancybox video"
	$(".video-promo").click(function(event) {

		event.preventDefault();


		$.fancybox({
	    	openEffect	: 'elastic',
	    	closeEffect	: 'elastic',
	    	padding 	: 0,
			type 		: 'iframe',
			href 		: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),

	    	helpers : {
		        overlay : {
		            css : {
		                'background' : 'rgba(0, 0, 0, 0.9)'
		            }
		        }
		    }
		});
	});
/*SHIPPING ORDER*/	
	$("#success-notification").hide();
	$("#failure-notification").hide();
	$('#more-order-item').on('click tap', function(e){
		e.preventDefault();
		var id = $(this).data('id')+1;				
		var new_item = $('<div class="form-group"><label class="col-xs-2 control-label">Item '+id+'</label><div class="col-xs-4"><input class="form-control" type="url" data-bv-uri-message="Invalid link" name="item_link'+id+'" id="item'+id+'" placeholder="Item link"></div><div class="col-xs-2"><input type="number" data-bv-integer-message="Required" class="form-control" id="qty'+id+'"  name="item_qty'+id+'" placeholder="Quantity"></div><div class="col-xs-2"><input type="text" class="form-control" name="item_size'+id+'"  id="size'+id+'" placeholder="Size" required data-bv-notempty-message="Required"></div><div class="col-xs-2"><input type="text" class="form-control"  name="item_color'+id+'" id="color'+id+'" placeholder="Color" required data-bv-notempty-message="Required"></div></div>');
		var p = $(this).parent().parent();
		new_item.insertBefore(p);
		$(this).data('id',id);
		$('#total_item').val(id);
		console.log($('#item'+id));
		$('#order_amazon_form').bootstrapValidator('addField',$('#item'+id));
		$('#order_amazon_form').bootstrapValidator('addField',$('#qty'+id));		
		$('#order_amazon_form').bootstrapValidator('addField',$('#size'+id));				
		$('#order_amazon_form').bootstrapValidator('addField',$('#color'+id));						
	});	

/*******Form Validator***********/

    $('.shipping-form').bootstrapValidator({
        message: 'This value is not valid',   
        fields: {
        	number:{
        		message: 'Tracker number is invalid',
        		validators: {
                    notEmpty: {
                        message: 'Tracker number is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Tracker number can only contain digits & alphabets'
                    }
                }
        	},
            firstname: {
                message: 'The firstname is not valid',
                validators: {
                    notEmpty: {
                        message: 'First Name is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'First Name can only consist of alphabetical'
                    }
                }
            },
			middlename: {
                message: 'The middlename is not valid',
                validators: {                                     
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Middle Name can only consist of alphabetical'
                    }
                }
            },
            lastname: {
                message: 'The lastname is not valid',
                validators: {
                    notEmpty: {
                        message: 'Last Name is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Last Name can only consist of alphabetical'
                    }
                }
            },
            address: {
                message: 'The address is not valid',
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ,]+$/,
                        message: 'The address can only consist of alphabetical and digits'
                    }
                }
            },
            city: {
                message: 'The city is not valid',
                validators: {
                    notEmpty: {
                        message: 'The city is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The city can only consist of alphabetical'
                    }
                }
            },
            state: {
                message: 'The state is not valid',
                validators: {
                    notEmpty: {
                        message: 'The state is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The state can only consist of alphabetical'
                    }
                }
            },
            code: {
                message: 'The zip code is not valid',
                validators: {
                    notEmpty: {
                        message: 'The zip code is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The zip code can only consist of digits'
                    }
                }
            },
            country: {
                message: 'The country is not valid',
                validators: {
                    notEmpty: {
                        message: 'The country is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The country can only consist of alphabetical'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            tel: {
                validators: {
                    notEmpty: {
                        message: 'The telephone number is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[0-9]{8,}$/,
                        message: 'Telephone number must have at least 8 digits'
                    }
                }
            },
            firstname2: {
                message: 'The firstname is not valid',
                validators: {
                    notEmpty: {
                        message: 'First Name is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'First Name can only consist of alphabetical'
                    }
                }
            },
			middlename2: {
                message: 'The middlename is not valid',
                validators: {                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Middle Name can only consist of alphabetical'
                    }
                }
            },
            lastname2: {
                message: 'The lastname is not valid',
                validators: {
                    notEmpty: {
                        message: 'Last Name is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Last Name can only consist of alphabetical'
                    }
                }
            },
            address2: {
                message: 'The address is not valid',
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ,]+$/,
                        message: 'The address can only consist of alphabetical and digits'
                    }
                }
            },
            city2: {
                message: 'The city is not valid',
                validators: {
                    notEmpty: {
                        message: 'The city is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The city can only consist of alphabetical'
                    }
                }
            },
            state2: {
                message: 'The state is not valid',
                validators: {
                    notEmpty: {
                        message: 'The state is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The state can only consist of alphabetical'
                    }
                }
            },
            code2: {
                message: 'The zip code is not valid',
                validators: {
                    notEmpty: {
                        message: 'The zip code is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The zip code can only consist of alphabetical & digits'
                    }
                }
            },
            country2: {
                message: 'The country is not valid',
                validators: {
                    notEmpty: {
                        message: 'The country is required and cannot be empty'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The country can only consist of alphabetical'
                    }
                }
            },
            tel2: {
                validators: {
                    notEmpty: {
                        message: 'The telephone number is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[0-9]{8,}$/,
                        message: 'Telephone number must have at least 8 digits'
                    }
                }
            },
            email2: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            height: {
                validators: {
                    notEmpty: {
                        message: 'The height is required and cannot be empty'
                    },
                    numeric: {
                        message: 'The height entered is not valid'
                    }
                }
            },
            length: {
                validators: {
                    notEmpty: {
                        message: 'The length is required and cannot be empty'
                    },
                    numeric: {
                        message: 'The length entered is not valid'
                    }
                }
            },
            depth: {
                validators: {
                    notEmpty: {
                        message: 'The depth is required and cannot be empty'
                    },
                    numeric: {
                        message: 'The depth entered is not valid'
                    }
                }
            },                                                                     
            weight: {
                validators: {
                    notEmpty: {
                        message: 'The weight is required and cannot be empty'
                    },
                    numeric: {
                        message: 'The weight entered is not valid'
                    }
                }
            },
			item_link1:{
				validators: {
                    notEmpty: {
                        message: 'Must enter at least 1 item'
                    },
                    uri: {
                        message: 'The link entered is not valid'
                    }
                }				
			},
			item_qty1: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    digits: {
                        message: 'Must be number'
                    }
                }
            },
			item_size1: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: 'No special characters'
                    }
                }
            },
			item_color1: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: 'No special characters'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            var form_id = $form.attr("id");
            // Format form data
            var arrayData = $('form#' + form_id).serializeArray();
			var objectData = {};
            $.each(arrayData, function() {
                var value;
                if (this.value != null) {
                    value = this.value;
                } else {
                    value = '';
                }
                if (objectData[this.name] != null) {
                    if (!objectData[this.name].push) {
                        objectData[this.name] = [objectData[this.name]];
                    }
                    objectData[this.name].push(value);
                } else {
                    objectData[this.name] = value;
                }
            });
            
            var ship_order_url = "shipOrder/ship_order";
            // Process request for amazon shipping forms
            if(form_id == 'shipping_form_amazon'){            					
				$.ajax({
					url: ship_order_url,
					type: "POST",
					data: {shipping_amazon_info : objectData},
					context: document.body
					}).done(function(data) {
						if(data == 'success') {
							$("#success-notification").show();
							$("#shipping-form-main-panel").hide();
						}
						console.log(data);
					})
					.error(function(){
						$("#failure-notification").show();
						$('form#shipping_form_amazon').reset();
				});
            }

            // Process request for ups shipping forms
            else if(form_id == 'shipping_form_ups'){
	            $.ajax({
				url: ship_order_url,
				type: "POST",
				data: {shipping_ups_info : objectData},
				context: document.body
				}).done(function(data) {
					$("#success-notification").show();
					$("#shipping-form-main-panel").hide();
				})
				.error(function(err){
					console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
					$("#failure-notification").show();
					$('form#shipping_form_ups').reset();
				});
            }   
			else if(form_id == 'order_amazon_form'){
	            $.ajax({
				url: ship_order_url,
				type: "POST",
				data: {order_amazon_info : objectData},
				context: document.body
				}).done(function(data) {
					$("#success-notification").show();
					$("#shipping-form-main-panel").hide();
				})
				.error(function(){
					$("#failure-notification").show();
					$('form#shipping_form_ups').reset();
				});
            }            
    });

/*******End of Form Validator****/
});
})(jQuery);