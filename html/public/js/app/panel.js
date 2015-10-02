define(['globals', 'appassets/enhance' ], function(globals, enhance) {
	
	function run() {

		$('.collapse').collapse();

		enhance.floatinput();
		$("[id^=collapse]").on('shown', function(){
		    $(this).parents('.accordion-group').find('.accordion-toggle')
		         .prop('checked', true);
		});

		//DEFINITIVAS
		resizePanel();
		autocomplete();

		/*var currentLocation = getPage(4);

		switch(currentLocation) {
			case "login":
				login.signin();
				break;

			default:

				break;
		}*/
		
	}
	//LEFT PANEL Resize
	function resizePanel() {
		$('.sb-button').click(function(e){

			var position = $(this).attr("position");
			
			if ((position == "opened") || (position == undefined)) {
				$(this).attr("position", "closed");
				$(this).removeClass("glyphicon-resize-small");
				$(this).addClass("glyphicon-resize-full");
				
				$('.sb-slidebar').removeClass("col-lg-3 col-md-3 col-sm-3").addClass("col-lg-1 col-md-1 col-sm-1", 500);
				$('#panel-desktop').delay(200).removeClass("col-lg-9 col-md-9 col-sm-9").addClass("col-lg-11 col-md-11 col-sm-11", 500);
				$('.sb-slidebar').delay(400).removeClass("col-xs-3").addClass("col-xs-1");
				$('#panel-drawer').load("panel/nav/nav-small");
				$(this).fadeOut(400, function(){
					$('.sb-button').css({
					"top": "auto",
					"bottom": "15px",
					"left": "2.5%"
					});
					$(this).fadeIn();
				});
				
				return false;
			}
			
			if (position == "closed") {
				$(this).removeClass("glyphicon-resize-full");
				$(this).addClass("glyphicon-resize-small");
				$(this).attr("position", "opened");
				$('.sb-slidebar').removeClass("col-lg-1 col-md-1 col-sm-1").addClass("col-lg-3 col-md-3 col-sm-3", 500);
				$('#panel-desktop').delay(200).removeClass("col-lg-11 col-md-11 col-sm-11").addClass("col-lg-9 col-md-9 col-sm-9", 500);
				$('.sb-slidebar').delay(400).removeClass("col-xs-1").addClass("col-xs-3");
				$('#panel-drawer').load("panel/nav/nav-big");
				$('.drawer_menu').css("padding", "0");
				$(this).fadeOut(400, function(){
					$('.sb-button').css({
					"bottom": "15px",
					"left": "10.5%"
					});
					$(this).fadeIn();
				});
				return false;
			};
			
		});
	} 
	//TOP SEARCH AUTOCOMPLETE
	function autocomplete(){
		$("#panel-search, #appointment-add-name").autocomplete({
		        source: URL+"api/autocomplete/json/patient/",
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
      run: run      
	}

});