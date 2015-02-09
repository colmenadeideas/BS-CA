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
<<<<<<< HEAD
<<<<<<< HEAD
=======
    
    
    <!-- Register with Facebook-->
    <!-- Revisar si puede ubicarse en otra direccion que no sea "head"-->
    
    <div id="fb-root"></div>
    <script>
    
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1545942492291033',
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
>>>>>>> origin/Calendario_Paciente
   
   function fblogin(role){
FB.login(function(response) {

        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            
            console.log("response" +response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api('/me', function(response) {
                user_email = response.email; //get user email
                response.role = role;
                console.log(response);
                console.log(response.email);
          // you can store this data into your database  
          
          
          $.ajax({
				type : "POST",
				url : URL + "account/process/",
				data : response,
				timeout : 15000,
				success : function(response) {
						console.log('works' + response);
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
          
                     
            });

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'publish_stream,email'
    });
}
	</script>
	
	<div id="status">
</div>
	
</head>
<body>
<<<<<<< HEAD
=======
    
    
    <!-- Register with Facebook-->
    <!-- Revisar si puede ubicarse en otra direccion que no sea "head"-->
    
    <div id="fb-root"></div>
    <script>
    
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1545942492291033',
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
   
   function fblogin(role){
FB.login(function(response) {

        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            
            console.log("response" +response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api('/me', function(response) {
                user_email = response.email; //get user email
                response.role = role;
                console.log(response);
                console.log(response.email);
          // you can store this data into your database  
          
          
          $.ajax({
				type : "POST",
				url : URL + "account/process/",
				data : response,
				timeout : 15000,
				success : function(response) {
						console.log('works' + response);
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
          
                     
            });

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'publish_stream,email'
    });
}
	</script>
	
	<div id="status">
</div>
	
</head>
<body>
	
>>>>>>> origin/Panel-Doctor
=======
	
>>>>>>> origin/Calendario_Paciente
	<div class="container-fluid">
    		<div class="row">