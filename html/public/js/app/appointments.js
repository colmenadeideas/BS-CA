define(['globals'], function(globals) {
	
	function add() {
		
		
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

	return {
      add: add,
      list: list
	}

});