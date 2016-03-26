define(['globals', 'appassets/enhance', 'appassets/steps'], function(globals, enhance, steps) {
	
	function add() {
		steps.run();
		runSteps();
	}

	function runSteps() {
		step1();
		step2();
		step3();
		step4();
		step5();
	}

	function step1() {
		
		if ($('#step1').is(".active") == true){			
			enhance.fieldsfor("practice");
			autocomplete();
		}		
	}
	function step2() {
		
		if ($('#step2').is(".active") == true){
			enhance.fieldsfor("practice");
		}
	}

	function step3() {
		
		if ($('#step3').is(".active") == true){
			enhance.fieldsfor("practice");
		}
	}

	function step4() {		
		if ($('#step4').is(".active") == true){
			enhance.fieldsfor("practice");
		}
	}

	function step5() {		
		if ($('#step5').is(".active") == true){
			enhance.fieldsfor("practice");
			$('.goAndEdit').click(function(e) {
				var destination = $(this).data('goandedit');
				var step = destination.split("step");
				steps.prevStep(step[1]);
				e.preventDefault();						
			});
		}
	}




/*PREVIO a 070316 */
	
	function autocomplete() {
	
		$("input[name=clinic]").autocomplete({
				source : URL + "api/autocomplete/json/practices/", //aqui llama al api que retorna el valor de las clinicas guardadas previamente
				minLength : 1,
				delay : 50,
				messages : {
				noResults : '',
				results : function() {
				}
			},
			select: function(event, ui) {
				console.log(ui);
				$("input[name='clinic_id']").val(ui.item.id_value);
			/* var url = ui.item.name;
			 if(url != '#') {
			 location.href = '/blog/' + url;
			 }*/
			 },
			html : true,
			/*        appendTo: '#specialty-input',*/
			// optional (if other layers overlap autocomplete list)
			open : function(event, ui) {
				$(".ui-autocomplete").css("z-index", 1000);
				//$(".ui-autocomplete").css("background", 'red');
			},
		});
	
	}
	//TODO is this function local to PRACTICES or global TO SEARCH?
	function searchLocation () {
		
		$("textarea[name='address']").geocomplete({
		}).bind("geocode:result", function(event, result) {
			//Retener Coordenadas
			$("input[name='address_location']").val(result.geometry.location.k+","+result.geometry.location.D);
			$("input[name='address_url']").val(result.url);
			//result.formatted_address
			console.log(result);			
		}).bind("geocode:error", function(event, status) {
			// $.log("ERROR: " + status);
		}).bind("geocode:multiple", function(event, results) {
			//   $.log("Multiple: " + results.length + " results found");
		});
		
		$("#find").click(function() {
			$("textarea[name='city']").trigger("geocode");
		});
		
	}

	return {
		add: add,
		runSteps: runSteps,
      	autocomplete: autocomplete,
      	searchLocation: searchLocation
	}

});