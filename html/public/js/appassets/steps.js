define(['globals', 'appassets/enhance'], function(globals, enhance) {

	function run() {

		$('.btn.next').click(function(evt){
			form = $(this).closest('form');
			//stepform.tempsave(form, currentUrl);
			
			next(form);
			form.submit();
			//evt.stopPropagation(); THIS IS NOT NECESSARY BY NOW
			evt.preventDefault();
			
		});

	}

	function next(){
		//TODO Necesita que el form no esté identificado?

		//Identify Step
		var current = $('.slide-step.active');
		var step = current.data('stepfoward');
		var stepForm = current.closest("form");
		var controller = stepForm.data('controller');

		var currentUrl = window.location.href;
		console.log("Wan to go Step: "+step);
		
		if (step == 0) {
			process(stepform);
			//event.preventDefault();
			//return;
		} else {
			
			//Validate
			$(stepForm).validate({
				//ignore: [], TODO configurar esto para que pueda servir los radiobutton como en Practice/add
				submitHandler : function(form) {
					nextStep(controller);		
				}
			});
		} // end else
	}

	function nextStep(controller){


		var pleasewait = '<div id="pleasewait"></div>';

		var goTo = slideRight();

		activeSlide = $( ".form-steps .slide-step.active" ).prev();	
		nextSlide = $(activeSlide).data('stepfoward');
		previousSlide  = nextSlide-1;

		var updateArea = "#step"+nextSlide;

		$(updateArea).hide().html(pleasewait).fadeIn(300);
			$.ajax({
				url : globals.URL + controller+"/add/step"+nextSlide, 
				timeout : 50000,
				success : function(response) {	
					console.log(controller+"/add/step"+nextSlide);
					$(updateArea).hide().html(response)
					 	.fadeIn(200, function(){
					 	//run();
			           // switch(active_page[1]) {
					 	require(['app/'+controller], function(controllerL) {
								//case 'profile':
									controllerL.run();
									//break;
			          	}); 
						//}
					});	

				},
				error : function(obj, errorText, exception) {
					console.log(errorText);
				}
		});
	}

	function slideRight() {
		$('.form-steps').animate({
		    left: "-=100%",
		    //height: "toggle"
		  }, 1000, function() {
		    // Animation complete.
		});
		currentSlide = $( ".form-steps .slide-step.active" );
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

	return {
		run: 		run,
		next: 		next,
		nextStep: 	nextStep
	}

});