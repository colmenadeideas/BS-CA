define(['globals', 'appassets/enhance', 'appassets/steps'], function(globals, enhance, steps) {
	
	function add() {
		steps.run();
		runSteps();
	}

	function runSteps() {
		
		if ($('#step1').is(".active") == true){			
			enhance.fieldsfor("practice");
			autocomplete();
		} else		
			
		if ($('#step2').is(".active") == true){
			enhance.fieldsfor("practice");
		} else
			
		if ($('#step3').is(".active") == true){
			enhance.fieldsfor("practice");
		} else
	
		if ($('#step4').is(".active") == true){
			enhance.fieldsfor("practice");
		} else
		
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

	//Intervals TODO rename and revise numbers
	function intervals() {

		start();
		day();
		$('.ui-corner-all').click(function(){
			day();
		});

		$('#add').on('click', function (){
			var day = $('.current-day').children('h3').text();
			var date = $('.current-day').children('h3').text().split(" / ");
			if(($('#InitDate').children('li').length > 0) && ($('#InitDate>li:nth-child(1)').text() != day)) {
				$('#finalDate').find('.placeholder').remove();
				$('#finalDate').append('<li></li>').children('li').text(day);
				$('#finalDate>li:nth-child(3)').remove();
				$('#InitDate>li:nth-child(3)').remove();
				$('#finalDatex').fadeIn(200);
				$('#finalDate').css('border', 'solid 1px #3ED87A');
			} else{	
				$('#InitDate').find('.placeholder').remove();
				$('#InitDate').append('<li></li>').children('li').text(day);
				$('#InitDatex').fadeIn(200);
				$('#InitDate').css('border', 'solid 1px #3ED87A');			
			}
		});

		$('.current-day').draggable({
			appendTo: "body",
			helper: "clone"
		});

		$( ".dropable" ).droppable({
			activeClass: "ui-state-default",
			hoverClass: "ui-state-hover",
			accept: ":not(.ui-state-active)",
			out: function( event, ui ) {
				ui.draggable.remove();
			},
			drop: function( event, ui ) {
				$( this ).find( ".placeholder" ).remove();
				if( $(this).children().length == 1){
					$(this).find('.x').fadeIn(200);
					$(this).css('border', 'solid 1px #3ED87A');	
					$( "<li></li>" ).text( ui.draggable.text()).appendTo(this);
				}else{
					alert("Ya hay unafecha insertada, eliminela para cambiarla");
				}
				$('.step3').children('h5').fadeOut().text("Ahora selecciona la fecha de reintegro").fadeIn(400);
			}
		});

		$('.x').click(function() {
			$(this).parent().find('li').remove();
			$(this).hide();
			$(this).parent().css('border', 'dashed 1px #ccc');	
		});

	}
	//Intervals TODO rename and revise numbers
	function day() {
		
		$('td').on('click', function () {
			var currentDay = parseInt($('.ui-state-active').text());
			var M = parseInt($('.ui-state-active').parent('td').attr('data-month'));
			var currentM = M+1;
			var currentY = parseInt($('.ui-state-active').parent('td').attr('data-year'));
			$('.current-day').children('h3').hide().text(currentDay +" / "+currentM+" / "+currentY).fadeIn(400);
			$('.aleft').hide().fadeIn();
			$('#add').hide().fadeIn();
			day();
		});	

	}
	//Intervals TODO rename and revise numbers
	function start() {

		$('#calendar').datepicker({
			inline: true,
			firstDay: 1,
			showOtherMonths: true,
			dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'vie', 'Sab'],
			gotoCurrent: false,
			minDate: +1
		});
	}
	
	return {
		add: add,
		runSteps: runSteps,
		intervals: intervals,
      	autocomplete: autocomplete,
      	searchLocation: searchLocation
	}

});