<!DOCTYPE html>
<html lang="es">
<head>	
	<meta charset="<?php echo DB_ENCODE; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Besign Colmena de ideas - besign.com.ve">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favico.png">
    
    <title><?php echo $this -> title; ?></title>
	
	<link href="<?php echo CSS; ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>fullcalendar.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>all.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>styles.css" rel="stylesheet">
	
	<?php echo GOOGLE_FONTS; ?>
	<?php echo GOOGLE_ANALYTICS; ?>

    <script src="<?php echo JS; ?>config.js"></script>
    <script data-main="<?php echo JS; ?>main-site" src="<?php echo JS; ?>assets/require.js"></script>
    
    
    <!-- Register with Facebook-->
    <!-- Revisar si puede ubicarse en otra direccion que no sea "head"-->
    
    <div id="fb-root"></div>
    <script>
		window.fbAsyncInit = function() {
			FB.init({
				appId : '1575295952727755', //Este es el ID de la api creada por Delia: 1545942492291033
				xfbml : true,
				version : 'v2.2'
			});
		}; ( function(d, s, id) {
				var js,
				    fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {
					return;
				}
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		
		var facebook = 'facebook'; //
		function fblogin(role) {
			
			
			FB.login(function(response) {
				if (response.authResponse) {
					console.log('Welcome!  Fetching your information.... ');
					console.log("response" + response);
					access_token = response.authResponse.accessToken;
					user_id = response.authResponse.userID;
					
					//get FB UID
					FB.api('/me', function(userobject) {
						
						FB.api('/me/picture?width=300&height=300', function(fbpicture) {
													
						user_email = userobject.email;
						userobject.role = role;
						userobject.fbpicture = fbpicture;
						userobject.facebook = facebook; //
						
						email = userobject.email;
						console.log(userobject);
						//console.log(response.email);
						
						
						$.ajax({
							type : "post",
							url : URL + "account/checkregistered/username/",
							data : userobject,
							timeout : 15000,
							success : function(response) {
								console.log("Registered: "+response);
								console.log(userobject);
								switch(response) {
									
									case 'false': //Usuario nuevo, registrar de modo normal
										$.ajax({
											type : "post",
											url : URL + "account/processRedes/",
											data : userobject,
											timeout : 15000,
											success : function(response) {
												console.log('Registrado exitosamente via Facebook: ' + response);
											},
											error : function(response) {
												console.log(response);
												$('.register-send').removeAttr("disabled");
												//$('#response-registration').html(response).fadeIn('fast');
											}
										});

										break;
									case 'true':
										//Si esta registrado, actualizar datos de perfil facebook
										$.ajax({
											type : "post",
											url : URL + "account/updatedataRedes/",
											data : userobject,
											timeout : 15000,
											success : function(response) {
												console.log('Datos de Facebook ctualizados:  ' + response);
												
												// recibir un true/ false
												//realizar un ajax para el login (tomar ejemplo de login.js)
												switch(response) {
													case 'true': //Ya actualizo, ahora registra la sesion
													$.ajax({
														type : "POST",
														url : URL + "account/login",
														data : userobject,
														timeout : 12000,
														success : function(response) {
															
														var obj = jQuery.parseJSON(response);
														console.log('asdasd: ' + obj.response);	
														//response = obj.response
														//console.log('(' + response + ')');															
															
															var responseDiv = "#response-login";
															$('.send').removeAttr("disabled");
															$(responseDiv).addClass('alert alert-danger');
															switch (obj.response) {
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
													
												}
												
												
												//TODO Pendiente definir si se cierra la ventana o que ocurre despues de ese paso
												$('#registration-patient').remove();
												$('#response-registration').html(response).fadeIn('fast');
											},
											error : function(response) {
												console.log(response);
												$('.register-send').removeAttr("disabled");
												$('#response-registration').html(response).fadeIn('fast');
											}
										});
										break;
								}
							}
						});
						})
					});
					
				} else {
					//TODO anotar si cierra la ventana
				}
			},{
				scope : 'publish_stream,email,user_birthday,user_location'
			});
			
			
		
			
			
			
		}
	</script>
	
	
	<!-- -->
	<!--Register with Google -->
	
    <!-- Coloca este JavaScript asíncrono justo delante de la etiqueta </body> -->
    
    <script type="text/javascript">
		(function() {
			var po = document.createElement('script');
			po.type = 'text/javascript';
			po.async = true;
			po.src = 'https://apis.google.com/js/client:plusone.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(po, s);
		})();
				
    </script>
	
	<script>
	var google = 'google'; //
	function signinCallback(authResult) { 
		
			
			// var buttons = document.getElementsByTagName("button");
			// var buttonsCount = buttons.length;
			// for (var i = 0; i <= buttonsCount; i += 1) {
			    // buttons[i].onclick = function(e) {
			        // role= this.name;
			        // console.log('Imprime el role: ' + role);
			    // };
			// }
			//-------------
			$("#register_who_patient, #register_who_doctor").click(function() {
			    role=this.name; // or alert($(this).attr('id'));
			    console.log('El role es: '+ role); 
			});
			//exit();
			
	  if (authResult['access_token']) {
	    
	    gapi.auth.setToken(authResult); // Almacena el token recuperado.
	    getEmail();                     // Activa la solicitud para obtener la dirección de correo electrónico.
	    
	    
	    console.log('Acceso permitido, bienvenido: ');	// Autorizado correctamente
	    //document.getElementById('signinButton').setAttribute('style', 'display: none'); // Oculta el botón ahora que el usuario está autorizado
	  } else if (authResult['error']) {
	    // Se ha producido un error.
	    //console.log('There was an error: ' + authResult['error']);
	  }
	  
	  function getEmail(){
	    // Carga las bibliotecas oauth2 para habilitar los métodos userinfo.
	    gapi.client.load('oauth2', 'v2', function() {
	          var request = gapi.client.oauth2.userinfo.get();
	          request.execute(getEmailCallback);
	        });
	  }
	
	  function getEmailCallback(userobject){
	    var el = document.getElementById('email');
	    var email = '';
	
	    if (userobject['email']) {
	      email = 'Email: ' + userobject['email'];
	             
	      userobject.role = role; // role
	      userobject.google = google;
	    
	    
			 $.ajax({
							type : "post",
							url : URL + "account/checkregistered/username/",
							data : userobject,
							timeout : 15000,
							success : function(response) {
								console.log("Registered: "+response);
								console.log(userobject);
								switch(response) {
									
									case 'true': //Si esta registrado, actualizar datos de perfil Google
										$.ajax({
											type : "post",
											url : URL + "account/updatedataRedes/",
											data : userobject,
											timeout : 15000,
											success : function(response) {
												console.log('Datos de Google actualizados: ' + response);
												
												//---
												// recibir un true/ false
												//realizar un ajax para el login (tomar ejemplo de login.js)
												switch(response) {
													case 'true': //Ya actualizo, ahora registra la sesion
													$.ajax({
														type : "POST",
														url : URL + "account/login",
														data : userobject,
														timeout : 12000,
														success : function(response) {
															
															var obj = jQuery.parseJSON(response);
															console.log('asdasd: ' + obj.response);
															
															var responseDiv = "#response-login";
															$('.send').removeAttr("disabled");
															$(responseDiv).addClass('alert alert-danger');
															switch (obj.response) {
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
													
												}
												
												//---
											},
											error : function(response) {
												console.log(response);
												$('.register-send').removeAttr("disabled");
												//$('#response-registration').html(response).fadeIn('fast');
											}
										});

										break;
									case 'false':
										//Usuario nuevo, registrar de modo normal
										$.ajax({
											type : "post",
											url : URL + "account/processRedes/",
											data : userobject,
											timeout : 15000,
											success : function(response) {
												console.log('Registrar exitosamente via Google:  ' + response);
												//TODO Pendiente definir si se cierra la ventana o que ocurre despues de ese paso
												$('#registration-patient').remove();
												$('#response-registration').html(response).fadeIn('fast');
											},
											error : function(response) {
												console.log(response);
												$('.register-send').removeAttr("disabled");
												$('#response-registration').html(response).fadeIn('fast');
											}
										});
										break;
								}
							}
						});
    
    }

    console.log(userobject);   // Sin comentario para inspeccionar el objeto completo.
    

    el.innerHTML = email;
    toggleElement('email');
  }

  function toggleElement(id) {
    var el = document.getElementById(id);
    if (el.getAttribute('class') == 'hide') {
      el.setAttribute('class', 'show');
    } else {
      el.setAttribute('class', 'hide');
    }
  }
  
  //
}




</script>

    
	<!-- -->
	
	
	<div id="status">
</div>
	
</head>
<body>
	
	<div class="container-fluid">
    		<div class="row">