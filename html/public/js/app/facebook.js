define(['globals', 'functions', 'facebook'], function(globals, Functions) {
	FB.init({
		appId      : '1545942492291033',
	    cookie     : true,  // enable cookies to allow the server to access the session
	    xfbml      : true,  // parse social plugins on this page
	    version    : 'v2.2'
	});

	/*FB.getLoginStatus(function(response) {
		console.log(response);
	});*/

	function checkLoginState(role) {
		FB.getLoginStatus(function(response) {
			response.role = role;
			statusChangeCallback(response);
		});
	}
	function statusChangeCallback(response) {
	    console.log(response);
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      //testAPI();
	      checkMe(response);
	    } else if (response.status === 'not_authorized') {
	      // The person is logged into Facebook, but not your app.	     
	      login();
	    } else {
	      login();
	    }
	}

	function login() {
		FB.login(function(response){
			if (response.status === 'connected') {
			    // Logged into your app and Facebook.
			    checkMe(response);
			} else if (response.status === 'not_authorized') {
				// The person is logged into Facebook, but not your app.
			   	console.log(response);
			} else {
			    console.log("The person is not logged into Facebook, so we're not sure ifthey are logged into this app or not.");
			    console.log(response);			    
			}
		}, { scope: 'public_profile, email, user_birthday, user_location'});
	}

	function checkMe(response) {
		var access_token 	= response.authResponse.accessToken;
		var user_id 		= response.authResponse.userID;

	    FB.api('/me', function(userobject) {
	      	userobject.role	= response.role;
	      	getPicAndProcess(userobject);
		});

	    function getPicAndProcess(userobject) {
	    	FB.api("/me/picture?width=300&height=300", function (response) {
				    if (response && !response.error) {
				        temp = response;
				        response = userobject;
				        response.data 			= temp.data;
				        response.email 			= userobject.email;
				        response.socialnetwork 	= 'facebook';
						processMe(response);
						//console.log(response);
					}
				}
			);
	    }

	}

	function processMe(userobject){
		$.ajax({
			type : "post",
			url : globals.URL + "account/checkregistered/username/",
			data : userobject,
			timeout : 50000,
			success : function(response) {
				console.log("Is Registered empty?: "+response);
				switch(response) {
					case 'true':
						//Usuario nuevo, registrar de modo normal
						registerMe(userobject);
						break;
					case 'false':
						//Registrado, Actualizar con datos Facebook
						$.ajax({
							type : "post",
							url : URL + "account/update/data/",
							data : userobject,
							timeout : 15000,
							success : function(response) {
								console.log('Datos de Redes Actualizados:  ' + response);	
								// recibir un true/ false
								//loginSocial();
								//TODO Pendiente definir si se cierra la ventana o que ocurre despues de ese paso
								$('#signin').modal('hide')
							},
							error : function(response) {
								console.log(response);
							}
						});
				}
			}
		});
	}

	function registerMe(userobject) {

		$.ajax({
			type : "post",
			url : URL + "account/process/",
			data : userobject,
			timeout : 15000,
			success : function(response) {
				console.log('Registrado exitosamente via Facebook: ' + response );
				$('#response-registration').html(response).fadeIn('fast');
				$('#register-select-'+userobject.role).fadeOut('fast');
			},
			error : function(response) {
				console.log(response);
				$('.register-send').removeAttr("disabled");
				$('#response-registration').html(response).fadeIn('fast');
			}
		});
	}

	



	return {
		checkLoginState: checkLoginState,
		statusChangeCallback: 	statusChangeCallback
	}

});