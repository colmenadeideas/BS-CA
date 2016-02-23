define(['globals', 'functions', 'appassets/enhance', 'app/search', 'app/login', 'app/registration'], function(globals, Functions, enhance, search, Login, Registration ) {
	
	function run() {
		circlesAnimation();

		var currentLocation = Functions.getPage(4);
		i = 4; //for animation
		ii = 1; //for animation

		switch(currentLocation) {
			case "login":
				Login.signin();
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
				Registration.run();
				break;
		}
	
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

	function circlesAnimation() {
		var scroll_pos = 0;
	    var animation_begin_pos = 0; //where you want the animation to begin
	    var animation_end_pos = 500; //where you want the animation to stop
	    var beginning_color = new $.Color( 'rgb(255,255,255)' ); //we can set this here, but it'd probably be better to get it from the CSS; for the example we're setting it here.
	    var ending_color = new $.Color( 'rgb(56,152,249)' ); ;//what color we want to use in the end
	    
	    $(document).scroll(function() {
	        scroll_pos = $(this).scrollTop(); 
	        if(scroll_pos >= animation_begin_pos && scroll_pos <= animation_end_pos ) { 	           
	           
	            var percentScrolled = scroll_pos / ( animation_end_pos - animation_begin_pos );
	            var newRed = beginning_color.red() + ( ( ending_color.red() - beginning_color.red() ) * percentScrolled );
	            var newGreen = beginning_color.green() + ( ( ending_color.green() - beginning_color.green() ) * percentScrolled );
	            var newBlue = beginning_color.blue() + ( ( ending_color.blue() - beginning_color.blue() ) * percentScrolled );
	            var newColor = new $.Color( newRed, newGreen, newBlue );

	            var percentScrolledColor = scroll_pos / ( animation_begin_pos - animation_end_pos );
	            var newRedColor = ending_color.red() + ( ( beginning_color.red() - ending_color.red() ) * percentScrolledColor );
	            var newGreenColor = ending_color.green() + ( ( beginning_color.green() - ending_color.green() ) * percentScrolledColor );
	            var newBlueColor = ending_color.blue() + ( ( beginning_color.blue() - ending_color.blue() ) * percentScrolledColor );
	            var newColorColor = new $.Color( newRedColor, newGreenColor, newBlueColor );


	            var secondaryPos = scroll_pos - 85;
	            
	            $('.featured-circle').animate({ backgroundColor: newColor, color: newColorColor }, 0);
	            $('.featured-circles').animate({ top: secondaryPos }, 0);

	        } else if ( scroll_pos > animation_end_pos ) {
	             $('.featured-circle').animate({ backgroundColor: ending_color, color: beginning_color }, 0);

	             $('.featured-circles').animate({ top: '500px' }, 0);

	        } else if ( scroll_pos < animation_begin_pos ) {
	             $('.featured-circle').animate({ backgroundColor: beginning_color, color: ending_color }, 0);

	             $('.featured-circles').animate({ top: '-85px' }, 0);
	        } else { }
	    });
	}

	return {
      run: run,
      animateBackground: animateBackground
	}

});