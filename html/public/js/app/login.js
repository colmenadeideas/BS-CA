function signin() {
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
				console.log('(' + response + ')');
					var responseDiv = "#response-login";
					$('.send').removeAttr("disabled");
					$(responseDiv).addClass('alert alert-danger');
					switch (response) {
						case 'timeout':
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

							break;

						case 'error':

							var htmlz = "<div>Usuario o Clave incorrecto</div>";
							$(responseDiv).addClass('warning-response');
							$(responseDiv).fadeIn(500);
							$(htmlz).hide().appendTo(responseDiv).fadeIn(1000).delay(3000).fadeOut(function() {
								$(responseDiv).fadeOut(500);
							});

							break;

						case 'welcome':
							document.location = URL + 'account/identify';
							break;

					}

				},
				error : function(obj, errorText, exception) {
					console.log(errorText);

				}
			});
				return false;
		}
	});

}