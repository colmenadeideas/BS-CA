$(document).ready(function() {
	$(".rotate").textrotator({
		animation : "fade",
		separator : ",",
		speed : 800
	});
	
	$('.datetimepicker').datetimepicker({pickTime: false, });
	
	$.backstretch([
	      URL+"public/images/backgrounds/01.jpg"
	    , URL+"public/images/backgrounds/02.jpg"
	  ], {duration: 3000, fade: 2000});

	//TODO trigger this diferently
	search_location();
	checkSearchView();

});