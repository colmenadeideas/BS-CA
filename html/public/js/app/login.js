define(['globals', 'appassets/stepform', 'appassets/enhance'], function(globals, stepform, enhance) {
	
	function signin() {
		console.log("Login");
		enhance.fieldsfor("form-login");
		$('#form-login').validate({

			submitHandler : function(form) {
				$('#form-login .send').attr('disabled', 'disabled');
				//prevent double send
				$.ajax({
					type : "POST",
					url : URL + "account/login",
					data : $(form).serialize(),
					timeout : 12000,
					success : function(response) {
							
							var response = JSON.parse(response);
							var responseDiv = "#response-login";
							$('.send').removeAttr("disabled");
							var mensaje = response.response;
							console.log(mensaje);	
							switch (response.success) {						
								case 0: //TODO ERROR
									
									$(responseDiv).addClass('warning-response alert alert-danger');
									$(responseDiv).fadeIn(500);
									
									$("<div>"+mensaje+"</div>").hide().appendTo(responseDiv).fadeIn(1000).delay(3000).fadeOut(function() {
										$(responseDiv).fadeOut(500);
									});
									break;							
								case 1: //if continue	
								 	document.location = URL + 'account/identify';
									break;
							}
							
							//
							/*case 'timeout':
								var htmlz = "<div>¿tienes internet? pacere que hay problemas de conexión</div>";
								$(responseDiv).slideDown(500);
								$(htmlz).hide().appendTo(responseDiv).fadeIn(1000).delay(3000).fadeOut(function() {
									$(responseDiv).slideUp(500);
								});
								$(responseDiv).addClass('warning-response');
								$(responseDiv).slideDown(500);
								$(htmlz).hide().appendTo(responseDiv).fadeIn(1000).delay(3000).fadeOut(function() {
									$(responseDiv).slideUp(500);
								});

								break;*/

							

					},
					error : function(obj, errorText, exception) {
						console.log(errorText);

					}
				});
				return false;
			}
		});

	}

	return {
      signin: signin
	}

});