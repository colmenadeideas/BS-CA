$(document).ready(function() {

	$('a.panel').click(function() {

		$('a.panel').removeClass('selected');
		$(this).addClass('selected');

		current = $(this);

		$('#wrapper').scrollTo($(this).attr('href'), 800);

		return false;
	});


	$(".rotate").textrotator({
			animation : "fade",
			separator : ",",
			speed : 800
	});

	
	
}); 
