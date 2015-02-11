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
	
	
	

});