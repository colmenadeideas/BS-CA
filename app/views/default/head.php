<!DOCTYPE html>
<html lang="es">
<head>	
	<meta charset="<?php echo DB_ENCODE; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Besign Colmena de ideas - besign.com.ve">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favico.png">
    
    <title><?php echo $this->title; ?></title>
	
	<link href="<?php echo CSS; ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>fullcalendar.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>all.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>styles.css" rel="stylesheet">
	
	<?php echo GOOGLE_FONTS; ?>
	<?php echo GOOGLE_ANALYTICS; ?>

    <script src="<?php echo JS; ?>config.js"></script>
    <script data-main="<?php echo JS;?>main-site" src="<?php echo JS; ?>assets/require.js"></script>
    
    
    <!-- Register with Facebook-->
    <!-- Revisar si puede ubicarse en otra direccion que no sea "head"-->    
    <div id="fb-root"></div>
    <!--script src="https://apis.google.com/js/client:platform.js?onload=render" async defer></script-->
    <!--script>
	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '1545942492291033', //Este es el ID de la api creada por Gabriel: 1575295952727755
	      xfbml      : true,
	      version    : 'v2.2'
	    });
	};
	
	(function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	 }(document, 'script', 'facebook-jssdk'));

	
	//Renders custom Buttons for GOOGLE
	function render_() {
	 	gapi.signin.render("registerGoogleDoctor", { 	
		  'callback': signinCallback,  // TODO: this is invoked when load, so have to manage not only regisration, but also already active sessions
		  'clientid': '787160254039-53j11tf8qir6utj3qr315tmevs8fj58d.apps.googleusercontent.com', 
		  'cookiepolicy': 'none', 
		  'requestvisibleactions': 'http://schemas.google.com/AddActivity',
		  'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email'
		});	
		gapi.signin.render("registerGooglePatient", { 	
		  'callback': signinCallback, 
		  'clientid': '787160254039-53j11tf8qir6utj3qr315tmevs8fj58d.apps.googleusercontent.com', 
		  'cookiepolicy': 'none', 
		  'requestvisibleactions': 'http://schemas.google.com/AddActivity',
		  'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email'
		});	
	}
	//Google default Login Function
	function signinCallback_(authResult) { 
		//get Role from clicked button
		$("#registerGoogleDoctor, #registerGooglePatient").click(function() {
			role = this.name; //console.log('El role es: '+ role); 
		});
				
		if (authResult['access_token']) {
			gapi.auth.setToken(authResult); // Almacena el token recuperado.
		    getEmail();                     // Activa la solicitud para obtener la dirección de correo electrónico.
		    console.log('Acceso permitido, bienvenido: ');	// Autorizado correctamente
		    //document.getElementById('signinButton').setAttribute('style', 'display: none'); // Oculta el botón ahora que el usuario está autorizado
		 } else if (authResult['error']) {
		   	// Se ha producido un error.
		   	console.log('There was an error: ' + authResult['error']);
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
		        userobject.role = role;
				userobject.socialnetwork = 'google';
				userobject.accesstoken = authResult['access_token'];
		    	processSocialRegistration(userobject);
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
	}
</script-->
	
<div id="status">
</div>
	
</head>
<body>
	
	<div class="container-fluid">
    		<div class="row">