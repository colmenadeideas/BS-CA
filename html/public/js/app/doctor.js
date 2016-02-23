define(['globals', 'assets/handlebars.min', 'appassets/stepform', 'appassets/enhance', 'app/appointments','app/payment','functions' ], function(globals, Handlebars,  stepform, enhance, Appointments, Payment, functions) {

	function profile() {

		var currentHash = window.location.hash;
		var hashIs = currentHash.split("/");

		functions.handlebarsHelpers();

		$.getJSON(globals.URL + "api/doctor/json/" + hashIs[2], function(data) {
			console.log(data);
			var TemplateScript = $("#Profile-Template").html(); 
			var Template = Handlebars.compile(TemplateScript);
			Handlebars.registerPartial("TabBookApointment", $("#BookAppointment-Template").html());
			$("#doc-details").append(Template(data));
			
			$(".rating").rating();	
			//Get Tab to Open
			$('a[href="#'+hashIs[3]+'"]').tab('show');			

			//Tab Appointment
			appointment();	

		});
		
	}

	
	function run (){
		
		appointment();
		reasons();
		days();
		patient();
		payment();
	}

	function payment () {

		if ($('#step4').is(".active") == true || $('#step5').is(".active") == true){
			
			$('.startPayment').click( function(e){
				var init_point = $(this).data("initpoint");
				Payment.startPayment(init_point);
				e.preventDefault();
			});
			$('#step4').css("background","#F3F3F3");
			
			$('.btn-edit-consult').click(function(){
				slideBeginning();
			});
		}
	}

	function patient() {
		if ($('#step4').is(".active") == true){
			
			$('#or-register-button').click(function(e){
				$('#register-mask').animate({
				    left: "-=100%",
				  }, 1000, function() {
				});
				e.preventDefault();
			});
		}
	}
	
	function days() {

		if ($('#step3').is(".active") == true){

			var doctor = $('[name="OKey"]').val();
			var practice = $('[name="practice"]').val();
		
			$.when($.getJSON(globals.URL+"api/availability/json/"+doctor+"/"+practice+"/all/", function (data) {
				console.log(data);
			    var TemplateScript = $("#Available-Days-Template").html(); 
			    var Template = Handlebars.compile(TemplateScript);
				$("#step3").append(Template(data));
			}, function () {
			    
			})).done( function(){
				
				$('.date-slider').slick({
					dots: true,
					infinite: false,
					speed: 300						
				});
				//Trigger form Step 3
				$('.timeslot').click(function(e){
					form = $(this).closest('form');

					var selectedDateID = $(this).data('date');				
					$('[name="date"]').val(selectedDateID);
					var selectedTimeID = $(this).data('time');				
					$('[name="time"]').val(selectedTimeID);
					//stepform.next(form);
					next(form);
					form.submit();
					e.preventDefault();
				});
			});
		}
	}

	function reasons() {
		if ($('#step2').is(".active") == true){
			/*$('.reasons-slider').slick({
				dots: true,
				infinite: false,
				speed: 300						
			});*/

			var doctor = $('[name="OKey"]').val();
			var practice = $('[name="practice"]').val();
		
			$.when($.getJSON(globals.URL+"api/practice/json/"+practice+"/doctor/"+doctor+"/", function (data) {
				console.log(data);
			    var TemplateScript = $("#List-Reasons-Template").html(); 
			    var Template = Handlebars.compile(TemplateScript);
				$("#step2").append(Template(data));
			}, function () {
			    
			})).done( function(){
				
				$('.reasons-slider').slick({
					dots: true,
					infinite: false,
					speed: 300						
				});
				//Trigger form Step 3
				$('.reason').click(function(e){
					form = $(this).closest('form');

					var selectedReason = $(this).data('reason');				
					$('[name="consultation_reason"]').val(selectedReason);
					var selectedInterval = $(this).data('initial_interval');				
					$('[name="initial_interval"]').val(selectedInterval);
					//stepform.next(form);
					next(form);
					form.submit();
					e.preventDefault();
				});
			});







		}
	}

	function appointment() {
		if ($('#step1').is(".active") == true){
			$('.practices-slider').slick({
				dots: true,
				infinite: false,
				speed: 300						
			});

			//Trigger form Step 1
			$('.practice').click(function(){
				form = $("#appointments"); //$(this).closest('form');

				var selectedPracticeID = $(this).data('value');				
				$('[name="practice"]').val(selectedPracticeID);
				//stepform.next(form);
				next(form);
				form.submit();
			});
		}
	}
	

	function next(){
		//TODO Necesita que el form no esté identificado?

		//Identify Step
		var current = $('.slide-step.active');
		var step = current.data('stepfoward');
		var stepForm = current.closest("form");
		var currentUrl = window.location.href;
		console.log("Step: "+step);
		
		if (step == 0) {
			process(stepform);
			//event.preventDefault();
			//return;
		} else {
				
			//Validate
			$(stepForm).validate({
				submitHandler : function(form) {
					nextStep();				
				}
			});
		} // end else
	}

	function nextStep(){

		var pleasewait = '<div id="pleasewait"></div>';

		var goTo = slideRight();

		activeSlide = $( ".book-steps .slide-step.active" ).prev();	
		nextSlide = $(activeSlide).data('stepfoward');
		previousSlide  = nextSlide-1;

		var updateArea = "#step"+nextSlide;

		$(updateArea).hide().html(pleasewait).fadeIn(300);
			$.ajax({
				url : globals.URL + "appointments/add/step"+nextSlide, 
				timeout : 50000,
				success : function(response) {	
					console.log("appointments/add/step"+nextSlide);
					$(updateArea).hide().html(response)
					 	.fadeIn(200, function(){
					 	run();
					});	

				},
				error : function(obj, errorText, exception) {
					console.log(errorText);
				}
		});

	}


	function profileMARKUP() {

		template = document.getElementById("item-details").firstChild.textContent;
		//Tabs Templates
		Mark.includes.TabBookApointment = document.getElementById("template-BookAppointment").firstChild.textContent;


		var currentHash = window.location.hash;
		var id = currentHash.split("/");

		var context = $.getJSON(URL + "api/doctor/json/" + id[2], function(data) {
			console.log(data);
			var context = data;
			$('#doc-details').html(Mark.up(template, context));
			//Activate Rating
			$(".rating").rating();					
			/*bookingform();
			bookingSteps();
			day();*/

			console.log(context['doctors']['0']['practice']['0']['schedule']['0']['quota']);

		});
		//Build Other views	
	}

	function slideRight() {
		$('.book-steps').animate({
		    left: "-=100%",
		    //height: "toggle"
		  }, 1000, function() {
		    // Animation complete.
		});
		currentSlide = $( ".book-steps .slide-step.active" );
		$( currentSlide ).removeClass( "active");
		$( currentSlide ).addClass( "semihidden");

		var stepName 	= $( currentSlide ).attr( "id");
		var stepNumber 	= stepName.split("step");

		currentStepsy = $("#stepsy"+stepNumber[1]);
 		$( currentStepsy).removeClass( "active");
		$( currentStepsy ).addClass( "complete");

		$( currentSlide ).next().addClass( "active");
		$( currentSlide ).next().removeClass( "semihidden");

		$(currentStepsy).next().removeClass( "disabled");
		$(currentStepsy).next().addClass( "active");
	}
	function slideLeft() {
		$('.book-steps').animate({
		    left: "+=100%",
		  }, 1000, function() {
		});
		currentSlide = $( ".book-steps .slide-step.active" );
		$( currentSlide ).removeClass( "active");
		$( currentSlide ).addClass( "semihidden");


		var stepName 	= $( currentSlide ).attr( "id");
		var stepNumber 	= stepName.split("step");

		currentStepsy = $("#stepsy"+stepNumber[1]);
 		$( currentStepsy).removeClass( "active");
		$( currentStepsy).addClass( "disabled");

		$( currentSlide ).prev().addClass( "active");
		$( currentSlide ).prev().removeClass( "semihidden");

		$(currentStepsy).prev().removeClass( "complete");
		$(currentStepsy).prev().addClass( "active");


	}

	function slideBeginning() {
		
		currentSlide = $( ".book-steps .slide-step.active" );
		$( currentSlide ).removeClass( "active");
		$("#step1").addClass( "active");
		$("#step1").removeClass( "semihidden");

		$(".stepsy-step").removeClass( "active complete");
		$(".stepsy-step").addClass( "disabled");
		$("#stepsy1").addClass( "active");
		$("#stepsy1").removeClass( "disabled");

		$('.book-steps').animate({
		    left: 0,
		  }, 1500, function() {
		});
		

	}

	//template-Appointment
	
	return {
		profile: 	profile,
		next: 		next,
		nextStep: nextStep
	}

});