define(['globals', 'assets/handlebars.min', 'appassets/stepform', 'appassets/enhance','functions'], function(globals, Handlebars, stepform, enhance,functions) {

	function add() {
		functions.handlebarsHelpers();
		//1) Get Available Practices for me (doctor) //
		var OKey = $('[name="OKey"]').val();
		$.getJSON(globals.URL+"api/practices/json/doctor/"+OKey, function(data) {
			
			var TemplateScript = $("#Practice-Template").html(); 
			var Template = Handlebars.compile(TemplateScript);

			$(".all-practices").append(Template(data));

			$('.practices-slider').slick({
				dots: true,
				infinite: true,
				speed: 300						
			});

			//Trigger form Step 1
			$('.practice').click(function(){
				form = $(this).closest('form');
				var selectedPracticeID = $(this).data('value');				
				$('[name="practice"]').val(selectedPracticeID);
				stepform.next(form);
				form.submit();
			});

			$('.btn.next').click(function(){
				form = $(this).closest('form');
				//stepform.tempsave(form, currentUrl);
				stepform.next(form);
			});

			console.log(data);
		});
		
		
	}
	//Add-Date
	function stepsCalendar(){
		var form = $(this).closest('form');
		var practiceID = $('[name="practice"]').val();
		$('#calendar').calendar({
			day_first: 0,
			day_name: ['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB', 'DOM'],
          	month_name: [	'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 
          					'NOVIEMBRE', 'DICIEMBRE'],
            adapter: globals.URL+'api/availability/json/'+globals.okey+'/'+practiceID+'/days',
            onSelectDate: function(date, month, year){

	          var notBookable = this.isAvailable(date, month, year);
	          if (notBookable === false){
				console.log("book me"+date+month+year);
				$('[name="selectedDate"]').val([year, month, date].join('-'));
				var form = $('#appointments');
				stepform.next(form);
				form.submit();
	          }			         
	        }		            
		});
	}
	//Add-Time
	function stepsTimeSlot(){
		
		var form = $(this).closest('form');
		var practiceID = $('[name="practice"]').val();
		var selectedDate = $('[name="selectedDate"]').val();
		
		functions.handlebarsHelpers();
		//1) Get Available TimeSlots for Date  //
		var OKey = $('[name="OKey"]').val();
		$.getJSON(globals.URL+"api/availability/json/"+OKey+"/"+practiceID+"/hours/"+selectedDate, function(data) {
			
			var TemplateScript = $("#Timeslot-Template").html(); 
			var Template = Handlebars.compile(TemplateScript);

			$(".all-hours").append(Template(data));

			$('.hours-slider').slick({
				dots: true,
				infinite: true,
				vertical: true,
				speed: 300						
			});

			//Trigger form Step 1
			$('.timehour').click(function(){
				form = $(this).closest('form');
				var selectedTimeValue = $(this).data('value');				
				$('[name="timehour"]').val(selectedTimeValue);
				stepform.next(form);
				form.submit();
			});

			$('.btn.next').click(function(){
				form = $(this).closest('form');
				//stepform.tempsave(form, currentUrl);
				stepform.next(form);
			});

			console.log(data);
		});
	}

	
	
	function list () {

		/*var list = $('.appointments-list');	
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
	 	});*/

		var list = $('.appointments-list');	
		var i = 0;

		$.each(list, function(){

			var l = $(this).children('.patient-pic').length;
			var i;
			for (i = 0; i < this.children.length; i++) {
				if (i > 2) {
		    			//$(this).children('div:nth-child('+3+')').attr("class", "hidden-patient col-lg-3 col-xs-3 patient-pic text-center");
		    			$(this).children('div:nth-child('+i+')').attr("class", "hidden-patient col-lg-3 col-xs-3 patient-pic text-center");
		    		};
		    	}	
		    	var t = $(this).find('.hidden-patient').length;
		    	c = $(this).children(".extra-patients-circle").length;
		    	
		    	if ((t > 0) && (c == 0)) {

		    		$(this).append('<div class="col-lg-3 col-xs-3 extra-patients-circle text-center"></div>');
		    		p = t;
		    		$(this).find('.extra-patients-circle').text('+'+p);

		    	};
		});
		$('.extra-patients-circle').click(function(){
	 		$(this).parent().find('.hidden-patient').slideDown();
			//$(this).parent().find('.hidden-patient').fadeIn(400);
	 		$(this).fadeOut();

	 		$(list).mouseleave(function() {
	 		   $(this).parent().find('.hidden-patient').slideUp();
			   //$(this).children('.hidden-patient').fadeOut();
	           $(this).find('.extra-patients-circle').fadeIn();
			});
	 	});

	 	// function of calendars 
	 	$('.calendar').datepicker({
			inline: true,		
			firstDay: 1,
			showOtherMonths: true,
			dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'vie', 'Sab'],
			gotoCurrent: false,
			minDate: +1
		});

		// apponitments, appointment add ajax request 
		$('#appointment-add').on('submit', function(e){
			e.preventDefault;
			var data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'url',
				data: data,
				beforeSend: function(){
					$('#loading').fadeIn(300).delay(500);
				},
				success: function(r){
					$('#loading').fadeOut(300);
				}
			});
			return false;
		});

	}
	function calendar() {

		$('.calendar').datepicker({
			inline: true,
			firstDay: 1,
			showOtherMonths: true,
			dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'vie', 'Sab'],
			gotoCurrent: false,
			minDate: +0,
			onSelect: function(){

			}
		});
		$('.hour-picker').datetimepicker({
			format: 'HH:mm',
			useCurrent: true,
	    }); 	

	}

	return {
      add: add,
      list: list,
      calendar: calendar,
      stepsCalendar:stepsCalendar,
      stepsTimeSlot: stepsTimeSlot

	}


});
