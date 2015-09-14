<!DOCTYPE html>
<html lang="es">
<head>	
	<meta charset="<?php echo DB_ENCODE; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="¡Tu Salud está aquí! Acercamos Pacientes y Doctores como nunca antes">
    <meta name="author" content="Besign Colmena de ideas - besign.com.ve">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favico.png">
    
    <title><?php echo $this -> title; ?></title>
	
	<link href="<?php echo CSS; ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>styles.css" rel="stylesheet">
	
	<?php echo GOOGLE_FONTS; ?>
	<?php echo GOOGLE_ANALYTICS; ?>

    <script src="<?php echo JS; ?>config.js"></script>
    <script src="<?php echo JS; ?>assets/jquery.min.js"></script>
    <script src="<?php echo JS; ?>assets/jquery.validate.min.js"></script>
    <script src="<?php echo JS; ?>functions.js"></script>
    
  
</head>
<style>

@-webkit-keyframes animate_background { 
    from { 
        background-position: 0 bottom;
    } 
    to { 
        background-position: -1500px bottom;
    } 
}
@-moz-keyframes animate_background { 
    from { 
        background-position: 0 bottom;
    } 
    to { 
        background-position: -1500px bottom;
    } 
}
@-o-keyframes animate_background { 
    from { 
        background-position: 0 bottom;

    } 
    to { 
        background-position: -1500px bottom;
    } 
}
@keyframes animate_background { 
    from { 
        background-position: 0 bottom;
    } 
    to { 
        background-position: -1500px bottom;
    } 
}
	.betaregister {
		background: url(<?php echo IMG;?>bg-city.png) repeat-x bottom center, -webkit-gradient(linear, left top, left bottom, color-stop(0%,#3898F9), color-stop(100%,#50D8C4));
		background: url(<?php echo IMG;?>bg-city.png) repeat-x bottom center, -webkit-linear-gradient(top,  #3898F9 0%,#50D8C4 100%) );
		background: url(<?php echo IMG;?>bg-city.png) repeat-x bottom center, -moz-linear-gradient(top,  #3898F9 0%,#50D8C4 100%);
		background: url(<?php echo IMG;?>bg-city.png) repeat-x bottom center, -ms-linear-gradient(top,  #3898F9 0%,#50D8C4 100%);
		background: url(<?php echo IMG;?>bg-city.png) repeat-x bottom center, -o-linear-gradient(top,  #3898F9 0%,#50D8C4 100%) );
		background: url(<?php echo IMG;?>bg-city.png) repeat-x bottom center, linear-gradient(to bottom,  #3898F9 0%,#50D8C4 100%);

	
    -webkit-animation: animate_background 35s linear 0s infinite;
    -moz-animation: animate_background 35s linear 0s infinite;
    -o-animation: animate_background 35s linear 0s infinite;
    animation: animate_background 35s linear 0s infinite;


	}

	h2 {
		color: #FFF;
		font-weight:100
	}
	h3 {
		color: #85F4E3;
		font-weight:400;
		margin-top:30px
	}
	h1 {
		color: #FFF;
		font-weight:100
	}
	input {
	  min-width: 100%; margin-bottom:10px;  margin-right:10px
	}
	.radio { margin-bottom:15px !important; color:#FFF; font-size:150%}
	.btn.btn-login, .btn.btn-register, .btn.btn-register-outline { margin:0}
	#response {
	  padding: 25px;
	  font-size: 150%;
	  background-color: #31DBC1;
	  border-radius: 10px;
	  font-weight: 600;
	  display:none;
	}


</style>
<script>
$(document).ready( function(){
	
	$('#mailbeta').validate({

		submitHandler : function(form) {
			$('.send').attr('disabled', 'disabled');
			$.ajax({
				type : "POST",
				url : URL + "site/mailbetalist",
				data : $(form).serialize(),
				timeout : 12000,
				success : function(response) {
					console.log(response);
					$('#mailbeta').remove();
					$('#response').html(response).fadeIn('fast');
					
				},
				error : function(response) {
					$('.send').removeAttr("disabled");
					$('#response').html(response);
				}
			});
			return false;
		}
	});
});
</script>	
<body class="betaregister">
		
	<div class="container-fluid">
		<div class="col-lg-6 col-md-6 col-sm-6 text-center" style="padding-top: 15%">
			
			<img src="<?php echo IMG; ?>okidoc-logo-main-square-white.png" class="img-responsive" style="margin:auto !important">
			<h1>Tu Salud está aquí</h1>
				
		</div>	
		<div class="col-lg-6 col-md-6 col-sm-6 " style="padding-top: 15%">
			<h2>Muy Pronto Pacientes y Doctores estarán <strong>conectados como nunca antes</strong></h2>
			<!--h1>La próxima revolución en servicios médicos está por llegar</h1-->
			
			<h3>Registrate para el demo</h3>
			<h4><br></h4>
			<form id="mailbeta" role="form" class="form-inline" method="post" action="" novalidate="novalidate">
				<div class="col-lg-12 col-sm-12 row">
					<div class="radio">
					  <label>
					    <input type="radio" name="whoami" id="whoami1" value="doctor" >
					   &nbsp; Soy Médico &nbsp;&nbsp;&nbsp;
					  </label>
					</div>
					<div class="radio">
					  <label>
					   <input type="radio" name="whoami" id="whoami2" value="patient" checked>
					   &nbsp;Soy Paciente
					  </label>
					</div>
				</div>
				<br>
				<div class="col-lg-6 col-md-6 ">
					<input type="email" name="email" placeholder="Escribe tu email" class="form-control input-lg" required />
					<input type="hidden" name="interests" value="<?php echo $this -> course[0]['name']; ?>" />
				</div>
				<div class="col-lg-1 col-md-1 row">
					<button type="submit" class="btn btn-info btn-lg btn btn-register-outline send">Enviar</button>
				</div>
				
				
					
					
					<!--button class="btn btn-lg btn-green send btn-login">
						<i class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;BUSCAR
					</button-->
			</form>
			<div id="response" class="col-sm-8 col-md-8 col-lg-8"></div>
			
		</div>
		
			
	</div>
	
	
	    
	</body>
</html>