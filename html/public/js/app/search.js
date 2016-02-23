define(['globals', 'assets/handlebars.min', 'appassets/stepform', 'appassets/enhance','functions'], function(globals, Handlebars, stepform, enhance, Functions) {
	
	function run() {

		searchLocation();
		autocomplete();
		checkSearchView();


		$("input[name=search_term]").on("autocompleteselect", function(event, ui) {
			$("input[name=type]").val(ui.item.type);
		});

		var sendbutton = $('#form-search-doctor .send');
		//Home  Main form Validate and send
		$('#form-search-doctor').validate({
			submitHandler : function(form) {
				//sendbutton.attr('disabled', 'disabled');				
				//Get Form Vars
				place = $('input[name=city_value]').val();
				value = $("input[name=search_term]").val();
				type = $("input[name=type]").val();

				if (!type) { type = 'all'; } 
				
				window.location.hash = '#search/'+type+'/'+value+'/'+place;	
				searchDoctor();		
							
				return false;
			}
		});
	}

	function autocomplete() {
	
		$("input[name=search_term]").autocomplete({
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
	
	function searchLocation() {

		$("input[name='city']").geocomplete({
		//	country : "ve"
		}).bind("geocode:result", function(event, result) {
			$("input[name='city_value']").val(result.name);
		}).bind("geocode:error", function(event, status) {
			// $.log("ERROR: " + status);
		}).bind("geocode:multiple", function(event, results) {
			//   $.log("Multiple: " + results.length + " results found");
		});

		$("#find").click(function() {
			$("input[name='city']").trigger("geocode");
		});

		/*$("#examples a").click(function() {
			$("input[name='city']").val($(this).text()).trigger("geocode");
			return false;
		});*/
	}


	function searchDoctor() {
		
		Functions.handlebarsHelpers();
		var getSearch = window.location.hash;
		var searchSplit = getSearch.split("/");
		var type  		= searchSplit[1];
		var value 		= searchSplit[2];
		var place 	= searchSplit[3];

		var searchterms = value.match(/\S+/g); //value.split(/\b\s+(?!$)/);
		
		$.getJSON(globals.URL+"api/search/"+type+"/"+searchterms ,function(data) { 

			var TemplateScriptSearch = $("#Search-Filters-Template").html();
			var TemplateSearch = Handlebars.compile(TemplateScriptSearch);
			$("#searchfilters").html(TemplateSearch(data));

			var TemplateScript = $("#Items-Card-Template").html(); 
			var Template = Handlebars.compile(TemplateScript);
			$("#results").html(Template(data));
			
			checkSearchView();

			//fade each result
			$('.item-card').css('opacity','0');	
			$('.item-card').each(function(i) {
				$(this).delay((i++) * 300).fadeTo(500, 1); 
			});	
			//Activate Rating	
			$(".rating").rating();

			$(".btn-filter").click(function(){				
				var term = $(this).data("term");
				$(this).remove();
				var actualHash 	= window.location.hash
				var newHash 	= actualHash.replace(term, "");
				var newHash 	= newHash.replace(" /", "/");
				var newHash 	= newHash.replace("//", "/");
				window.location.hash = newHash;
				//window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath); 				
			});
		});

		return false;
	}
	//TODO Revise this two methods "searchDoctor" && "checkSearchView"
	

	function checkSearchView() {
		
		var currentHash= window.location.hash;
		var hashCheck = currentHash.split('/');
		
		//TODO Check for something else in case of #search, otherwise it will trigger the miniform with no results
		if (hashCheck[0] == '#search' || hashCheck[0] == '#doctor') {
			//Set Minimum Form
			$('.site-home').css({
				'margin-top':'10px',
				'min-height': '100px',
				'background-size': 'auto 100%',
				'padding-top': '0'
			});
			$('.site-home h1').fadeOut('fast');
			$('.site-home h3').fadeOut('fast');
			$('#form-search-doctor').css({
				'margin-top':'0',
			});
			$('.navbar').css({'padding-bottom':'0' });
			

			$('#results').css({
				'margin-top': '0px',
				'opacity':'1',
				'display':'block'
			});
			$('#site-featured, #site-promotion').remove();
		}
		
	}
	


	return {
      run: run,
      autocomplete: autocomplete,
      searchLocation: searchLocation,
      searchDoctor: searchDoctor
	}

});