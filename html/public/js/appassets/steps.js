define(['globals', 'appassets/enhance'], function(globals, enhance) {

	function run() {

		$("form").validate({ // TODO select form VISIBLE AND LAST
			//ignore: [], //TODO configurar esto para que pueda servir los radiobutton como en Practice/add
			submitHandler : function(form) {
				var controller = $(form).data('controller');
				var currentUrl = window.location.href;
				//1) Save,				
				var currentID = $(form).attr('id');
				var currentID = $('#'+currentID+' .slide-step.active');
				var step = currentID.data('stepfoward')-1;
				
				$.ajax({
					type : "POST",
					url : globals.URL + controller + "/process/step/"+step,
					data : $(form).serialize()+ "&form="+controller+"&url="+currentUrl+"&tempkey="+$(form).data('tempkey'),
					timeout : 12000,
					success : function(response) {
						var response = JSON.parse(response);
						//console.log(response);	
						switch (response.success) {						
							case 0: //TODO ERROR	
								break;							
							case 1: //if continue	
							 	//console.log(response.template);
							 	/*$(updateArea).load(
							 		response.template+"/"+response.tempkey, function () {	
							 	})
							 	.hide().html(response.template).fadeIn(500, function(){
							 		enhance.fieldsfor(stepForm, step);
							 		run();
							 	});*/
							 	nextStep(controller);							 	

								break;
						}
					},
					error : function(obj, errorText, exception) {
						console.log(errorText);
					}
				});
				

				//2) Then Load Next
				//nextStep(controller);
			}
		});

		$('.btn.next').click(function(evt){
			var form = $(this).closest('form');
			go("next",form);
			evt.preventDefault();
								
		});

		$('.btn.previous').click(function(evt){
			var form = $(this).closest('form');
			go("prev",form);
			evt.preventDefault();			
		});

	}

	function go(where, form) {

		$('.btn.next').attr('disabled', 'disabled');	
		$('.btn.previous').attr('disabled', 'disabled');	

		var formIs = "#"+form.attr('id');
		//Identify Step
		var current = $(formIs+' .slide-step.active');
		var step = current.data('stepfoward');
		var controller = form.data('controller');
		var stepForm = current.closest("form");

		switch (where) {
			case "next":
				//console.log(controller+" > "+step);
				if (step == 0) {
					process(stepForm);
					//event.preventDefault();
					//return;
				} else {
					//Validate
					stepForm.submit();					
				}
				break;

			case "prev":

				if (current.data('stepback') == 0) {
					//process(stepform);
					//event.preventDefault();
					//return;
				} else {
					prevStep();
				}
				break;		

		}

	}
	
	function nextStep(controller){ //TODO animar con el ScrollTo

		$('.form-steps').animate({
		    left: "-=100%",
		    //height: "toggle"
		  }, 1000, function() {

			currentSlide = $( ".form-steps .slide-step.active" );
			$( currentSlide ).removeClass( "active");
			$( currentSlide ).addClass( "semihidden");

			$( currentSlide ).next().removeClass( "semihidden");
		    $( currentSlide ).next().addClass( "active");	


			var pleasewait = '<div id="pleasewait"></div>';
			
			nextSlide = $(currentSlide).data('stepfoward');	

			if (nextSlide > 0) {
				$('.btn.previous').removeClass( "hideme");
			} else {
				$('.btn.previous').addClass( "hideme");
			}
			if ($( currentSlide ).next().data('stepfoward') == 0) {
				$('.btn.next').addClass( "hideme");
				$('.btn.previous').addClass( "hideme");
			}	

			var updateArea = "#step"+nextSlide;
			$(updateArea).hide().html(pleasewait).fadeIn(300);

			//Load Next Step
			$.ajax({
				url : globals.URL + controller+"/add/step"+nextSlide+"/"+$(currentSlide).parent().parent().data('tempkey'), 
				timeout : 50000,
				success : function(response) {	
					console.log(controller+"/add/step"+nextSlide);
					$(updateArea).hide().html(response)
					.fadeIn(200, function(){					 	
			           	require(['app/'+controller], function(controllerObject) {
							controllerObject.runSteps();
						});	
						$('.btn.next').removeAttr("disabled");	
						$('.btn.previous').removeAttr("disabled");					
					});	

				},
				error : function(obj, errorText, exception) {
					console.log(errorText);
				}
			});

		});
	}

	function prevStep(howFar){
		if (howFar == undefined) {
			howFarGo = 1;
		} else {
			var getClass 	= $('.form-steps').attr('class');
			var cleanClass 	= getClass.replace('form-steps','');
			cleanClass 	= cleanClass.split("step");
			var howFarGo = cleanClass[0] - howFar; 
			console.log(cleanClass[0] +" "+howFar+" "+howFarGo);			
		}

		$('.form-steps').animate({
		    left: "+="+(howFarGo * 100)+"%",
		    //height: "toggle"
		  }, 1000, function() {

		  	currentSlide = $( ".form-steps .slide-step.active" );
			$( currentSlide ).removeClass( "active");
			$( currentSlide ).addClass( "semihidden");

			if (howFar != undefined) { //If step is given
				$( "#step"+howFar).removeClass( "semihidden");
		    	$( "#step"+howFar ).addClass( "active");
		    	$('.btn.next').removeClass( "hideme");
			} else {
				$( currentSlide ).prev().removeClass( "semihidden");
		    	$( currentSlide ).prev().addClass( "active");
			}
			
			$('.btn.next').removeAttr("disabled");	
			$('.btn.previous').removeAttr("disabled");

		    var updateArea = "#"+$(currentSlide).attr('id');
			$(updateArea).hide().html("").fadeIn(300); // Lo borra para no interferir con la validacion al retroceder
			
			prevSlide = $(currentSlide).data('stepback');
			console.log(prevSlide)
		    if (prevSlide == 1) {
				$('.btn.previous').addClass( "hideme");
			} else {
				$('.btn.previous').removeClass( "hideme");
			}
		    
		});		
	}


	function process(stepform) {

		var stepForm = stepform.attr('id');	
		var currentUrl = window.location.href;

		$("#"+stepForm).validate({
			submitHandler : function(form) {
				//Loading
				//TODO show loading
				$('.send').attr('disabled', 'disabled');	
				var controller = $(form).data('controller');			
				$.ajax({
					type : "POST",
					url : globals.URL + controller + "/process/step/"+step,
					data : $(form).serialize()+ "&form="+controller+"&url="+currentUrl+"&tempkey="+$(form).data('tempkey'),
					data : $(form).serialize()+ "&form="+stepForm+"&url="+currentUrl+"&tempkey="+$(form).data('tempkey'),
					timeout : 12000,
					success : function(response) {
						//$('.send').removeAttr("disabled");
						var response = JSON.parse(response);
						console.log(response.response);	
						
						switch (response.success) {						
							case 0: //TODO ERROR	
								break;							
							case 1: //if continue	
							 	//console.log(response.template);
							 	/*$(updateArea).load(
							 		response.template+"/"+response.tempkey, function () {	
							 	})
							 	.hide().html(response.template).fadeIn(500, function(){						 		
							 	});*/
							 	$('#response-'+stepform).last().modal('show'); 							 	

						 		$(form).slideUp(300)
								$('.hidden-message').delay(350).fadeIn(300);
								break;
						}
					},
					error : function(obj, errorText, exception) {
						$('.send').removeAttr("disabled");
						console.log(errorText);
					}
				});
				//return false;
			}
		});
	}

	return {
		run: 		run,
		prevStep: prevStep
	}

});