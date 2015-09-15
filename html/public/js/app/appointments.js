define(['globals'], function(globals) {
	
	function add() {
		
		
	}
	function addMenu(){$('#addMenu').slideToggle(400);}	
	
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
			p = t;
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

	function autocomplete(){
		$("#panel-search").autocomplete({
		        source: URL+"api/autocomplete/json/",
		        minLength: 2,
		        delay: 100,
		        messages: {
			        noResults: '',
			        results: function() {}
			    },
		      /*  select: function(event, ui) {		        	
		            var url = ui.item.name;
		            if(url != '#') {
		                location.href = '/blog/' + url;
		            }
		        },*/
		        html: true,
				/* appendTo: '#specialty-input',*/
		      	// optional (if other layers overlap autocomplete list)
		        open: function(event, ui) {
		            $(".ui-autocomplete").css("z-index", 1000);
		           //$(".ui-autocomplete").css("background", 'red');
		        },
		        /*close : function (event, ui) {
		        val = $("input[name=search_term]").val();
		         $("input[name=search_term]").autocomplete( "search", val ); //keep autocomplete open by 
		         //searching the same input again
		         $("input[name=search_term]").focus();
		        return false;  
		    }*/
		});
	}

	return {
      add: add,
      list: list,
      addMenu: addMenu,
      autocomplete: autocomplete
	}


});