$(document).ready(function() {
	
	var currentLocation = getPage(5);
	if (currentLocation == "login") {
		signin();
		floatinput();
		
	} else {
		//console.log(currentLocation);
		$(".rotate").textrotator({
			animation : "fade",
			separator : ",",
			speed : 800
		});
		/*$.backstretch([
	      URL+"public/images/backgrounds/01.jpg"
	    , URL+"public/images/backgrounds/02.jpg"
	  ], {duration: 3000, fade: 2000});*/
	  
	}
	
	$('.navbar').css('background', 'none');
	
	
	$('.datetimepicker').datetimepicker({pickTime: false, });
	

	//TODO trigger this diferently
	search_location();
	checkSearchView();
	
	
$(function() {
 
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
	
});

i = 4;
ii = 1;
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

});