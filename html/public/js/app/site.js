define(['globals', 'appassets/enhance', 'app/search', 'app/login'], function(globals, enhance, search, login ) {
	
	function run() {
		var currentLocation = getPage(4);
		i = 4; //for animation
		ii = 1; //for animation

		switch(currentLocation) {
			case "login":
				login.signin();
				break;

			default:

				$(".rotate").textrotator({
					animation : "fade",
					separator : ",",
					speed : 800
				});

				$('.navbar').css('background', 'none');	
	
				$('.datetimepicker').datetimepicker({pickTime: false, });				

				search.run();
				//animateBackground();

				break;
		}
            var r = 255;
            var g = 255;
            var b = 255;
            var r1 = 54;
            var g1 = 152;
            var b1 = 249;
            var last_scroll;
            var p;
            var x;
		    /* Every time the window is scrolled ... */
		    $(window).scroll( function(e){
		    
		        /* Check the location of each desired element */     
	        	var st = $(this).scrollTop();
	            var top_of_section = $('#site-featured').offset().top;
	            var bottom_of_window = $(window).scrollTop() + $(window).height() ;
	            var bottom_of_section = $('#site-featured').offset().top + $('#site-featured').outerHeight();

	            
	            /* user entered */
	            if( (top_of_section < bottom_of_window) && (bottom_of_section > bottom_of_window) ) {
	                $('.featured-circles').css({ 
	                	"position": "fixed",
	                	"margin-top": "663px"
	                });
                	// scrolled percentage
                	
                	var p = ((bottom_of_window - top_of_section)/(bottom_of_section - bottom_of_window))*100;


	                // Going up or down event
	                if (st > last_scroll){

	                	r = r - 100;
	                	g = g - 100;
	                	b = b - 100;
	                	r1 = r1 + 100;
	                	g1 = g1 + 100;
	                	b1 = b1 + 100;
	                	if (r < 54) { r = 54 };
	                	if (g < 152) { g = 152 };
	                	if (b < 249) { b = 249 };
	                	if (r1 > 255) { r1 = 255 };
	                	if (g1 > 255) { g1 = 255 };
	                	if (b1 > 255) { b1 = 255 };

	                }else{

	                	r1 = r1 - 100;
	                	g1 = g1 - 100;
	                	b1 = b1 - 100;
	                	r = r + 100;
	                	g = g + 100;
	                	b = b + 100;
	                	if (r > 255) { r = 255 };
	                	if (g > 255) { g = 255 };
	                	if (b > 255) { b = 255 };
	                	if (r1 < 54) { r1 = 54 };
	                	if (g1 < 152) { g1 = 152 };
	                	if (b1 < 249) { b1 = 249 };

	                }
                	// Change color of circles
	                $('.featured-circles').children('div').css({ 
	            		"background": "rgb("+r+","+g+","+b+")"
	            	});
	            	$('.featured-circles').children('div').children().css({ 
	            		"color": "rgb("+r1+","+g1+","+b1+")"
	            	});       
	                console.log(p); // cops
	                // user left the section
	            }else if( (bottom_of_section < bottom_of_window) || (top_of_section > bottom_of_window) ){
            		$('.featured-circles').css({ 
	            		"position": "absolute",
            		    "margin-top": "530px"
	            	});
                 	
	                $('.featured-circles').children('div').css({ 
	            		"background": "rgb("+r+","+g+","+b+")"
	            	});       

	            }
	  			// Set last scroll
            	last_scroll = st;
		    });
		
	}
	function list () {

		var list = $('.appointments-list');	
		var i = 0;
		$.each(list, function(){
			var l = $(this).children('.patient-pic').length;
		    var c = this.children;
	    	var i;
	    	for (i = 0; i < c.length; i++) {
	    		if (i > 3) {
	    			c[3].className = "hidden-patient";
					c[i].className = "hidden-patient";
				};
	   		}	
		var t = $(this).find('.hidden-patient').length;
		if (t >= 1) {
			$(this).append('<div class="col-lg-2 col-xs-2 extra-patients-circle text-center"></div>');
			p = t-3
			$(this).find('.extra-patients-circle').text('+'+p);
		};
	 	});
	 	$('.extra-patients-circle').click(function(){
	 		//var day = $(this).parent().parent().parent().attr('id').replace(/-/g, '/');
	 		var day = $(this).parent().parent().parent().attr('id');
	 		var clinic = $(this).parent().parent().find('h1').text();
	 		var did = '22';
	 		document.location.href = "#panel/appointments/"+clinic+"/22/"+day;	 		
	 	});
	}

	function animateBackground() {
		
		var $c = $('.flow-container'),
			$w = $(window);
	 
		$c.carouFredSel({
			align: false,
			items: 1,
			width: "300%",
			auto: true,
			scroll: {
				items: 1,
				duration: 30000,
				timeoutDuration: 0,
				easing: 'linear'
			}
		});
		
		$w.bind('resize.example', function() {
			var nw = $w.width();
			if (nw < 990) {
				nw = 990;
			}
			$c.width(nw * 3);
			$c.parent().width(nw);
	 
		}).trigger('resize.example');
		pinanimation();
		setInterval(pinanimation,3750);
	}

	function pinanimation() {
		$('.bg-flow:nth-child(3)>img').css("opacity", "0");
		if(i > 8){
			i = 1;
			if(ii == 1){
				ii++;
			}
		}
		if ((ii == 2)&&(i>3)) {
			ii = 1;
		};

		$('.bg-flow:nth-child('+ii+')>img:nth-child('+i+')').css({
	    	top: function( index, value ) {
	    		return parseFloat( value ) - 50
	    	}
		});
		$('.bg-flow:nth-child('+ii+')>img:nth-child('+i+')').animate({
			opacity: 1,
			"top": "+=50"
		},500) 
		i++;
		console.log(ii + " --> "+i)
	}

	return {
      run: run,
      list: list,
      animateBackground: animateBackground
	}

});