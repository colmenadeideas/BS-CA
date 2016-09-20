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

<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//control.mockingfish.com/js/01351.js?" + Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

<!--ptengine-->
<script type="text/javascript">
    window._pt_lt = new Date().getTime();
    window._pt_sp_2 = [];
    _pt_sp_2.push('setAccount,3a7b2c70');
    var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    (function() {
        var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
        atag.src = _protocol + 'cjs.ptengine.com/pta_en.js';
        var s = document.getElementsByTagName('script')[0]; 
        s.parentNode.insertBefore(atag, s);
    })();
</script>

<!--HEatMap-->
<script type="text/javascript">
(function() {
var hm = document.createElement('script'); hm.type ='text/javascript'; hm.async = true;
hm.src = ('++u-heatmap-it+log-js').replace(/[+]/g,'/').replace(/-/g,'.');
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(hm, s);
})();
</script>


	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '451279901730252');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=451279901730252&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->




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
	/*.betaregister */ #register{
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



<style>

#register{
	height:100%;
	overflow: auto;
	padding-top: 10%;
	padding-bottom: 5%;
}
.container{	
	padding-top: 5%;
	padding-bottom: 5%;
}
#doctor-pacient{ background-color: #FFF;}
	 

#doctor-pacient p, #doctor-pacient h2 {	color:#48C2D6; }
#pacient p, #pacient h2 {	color:#FFF; }
#pacient {   background: #3EA9EA; }


#registrate-btn-up {
	font-size: 150%;
	margin: 15px 0 20px;	
}



.bloque {  padding: 100px 0; min-height:435px; display: inline-block; width: 100% }
.bloque h2 {
	font-weight: 100;
    font-size: 500%;
    line-height: 90%;
}
.bloque p {	    padding-top: 20px;    font-size: 170%;      font-weight:bold; }
.bloque .uppercase { text-transform: uppercase; }
html {height: 100%}
body {height: 90%}

p.okidoc-what-is-it { color: #4C4C4C !important; font-weight: 400; padding: 0 50px 100px; }
.down { position: absolute; bottom: 10%; left: 50%; right: 50%; width: 50px; height: 50px; color: #FFF; text-shadow: 1px 1px 3px rgba(0,0,0,0.5); }
#calltoaction p { font-size: 300%; color: #FFF }
.btn-success { background: #5CB85C !important}

 


.bounce {
  -webkit-animation:bounce 1s infinite;
}

@-webkit-keyframes bounce {
  0%       { bottom:11%; }
  25%, 75% { bottom:12%; }
  50%      { bottom:13%; }
  100%     { bottom:10%;}
}
@media screen and (max-width: 600px) {
	h1, h2, .bloque h2 {   font-weight: 400; }
	h3 { color: #000}
	#register img { width: 150px;}
	h2,h3 {font-size: 20px !important;}
	 .radio label { float: left !important; font-size: 75%;}
	h4 { margin: 0 !important; display: none}
	h3 {    margin-top: 10px; !important}
	h1 {     margin-top: 10px; font-size: 29px;}
	.bloque p { font-size: 130%}
	.bloque h2 {font-size: 38px !important; margin-bottom: 20px;    text-align: center;}
	.parapacientes {position: absolute;
    top: -80px;}

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
	$('#registrate-btn-up').click(function(){

        $('html, body').animate({ scrollTop: "0px" },1000);
        return false;
	});
});
</script>	
<body class="betaregister">
<section id="register">

	<div class="container-fluid"  >
		<div class="col-lg-6 col-md-6 col-sm-6 text-center">
			
			<img src="<?php echo IMG; ?>okidoc-logo-main-square-white.png" class="img-responsive" style="margin:auto !important">
			<h1>Tu Salud está aquí</h1>
				
		</div>	
		<div class="col-lg-6 col-md-6 col-sm-6 ">
			<h2>Muy Pronto Pacientes y Doctores estarán <strong>conectados como nunca antes</strong></h2>
			<!--p>La próxima revolución en servicios médicos está por llegar.</p-->
			
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
					<input type="text" name="name" placeholder="Y si gustas, tu Nombre" class="form-control input-lg" />
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
	<div class="down bounce"><i class="fa fa-arrow-down fa-3x"></i></div>
</section>
	
<section id="doctor-pacient" class="bloque" >
	<div class="col-lg-6 col-md-6 col-sm-6">
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 text-right">
		<p class="okidoc-what-is-it"><strong>OKIDOC</strong> es un sistema de Booking y pago de Citas Médicas, Búsqueda y administración de Consulta.<br>
		Encuentra, reserva y comunicate con tu salud, sin esfuerzo! Para médicos y pacientes
		</p>
	</div>
	<div class="col-lg-12 text-center">
        <div class="col-lg-3 col-md-3 col-sm-3 text-right">
        	<h2>Para Doctores</h2> 
        </div>          
        <div class="col-lg-3 col-md-3 col-sm-3">
			<center>
				<img src="http://okidoctor.com/public/img/icono3.png" class="img-responsive" alt="Gestiona tus Consultas" title="Gestiona tus Consultas">
			</center>
			<p class="uppercase">Gestiona tus Consultas </p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3">
			 <center><img src="http://okidoctor.com/public/img/icono2.png" class="img-responsive" alt="Recibe Pagos" title="Recibe Pagos"></center>
			 <p class="uppercase">Recibe Pagos</p>	
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3">
			 <center><img src="http://okidoctor.com/public/img/icono1.png" class="img-responsive" alt="¡Aumenta tu lista de Pacientes!" title="¡Aumenta tu lista de Pacientes!"></center>
			 <p class="uppercase">¡Aumenta tu lista de Pacientes!</p>	
		</div>	
     </div>
        
</section>
<section id="pacient" class="bloque">
	<div class="col-lg-12 text-center">
        <div class="col-lg-3 col-md-3 col-sm-3">
			<center>
				<img src="http://okidoctor.com/public/img/icono6.png" class="img-responsive" alt="Busca un Médico" title="Busca un Médico">
			</center>
			<p class="uppercase">Busca un Médico</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3">
			 <center><img src="http://okidoctor.com/public/img/icono5.png" class="img-responsive" alt="Pide y paga tu cita en línea" title="Pide y paga tu cita en línea"></center>
			 <p class="uppercase">Pide y paga tu cita en línea</p>	
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3">
			 <center><img src="http://okidoctor.com/public/img/icono4.png" class="img-responsive" alt="Asiste a la consulta ¡Sin esperas!" title="Asiste a la consulta ¡Sin esperas!"></center>
			 <p class="uppercase">Asiste a la consulta ¡Sin esperas!</p>	
		</div>	
		<div class="col-lg-3 col-md-3 col-sm-3 text-left parapacientes">
        	<h2>Para Pacientes</h2> 
        </div>
     </div>
     
        
</section>
<section id="calltoaction" class="bloque text-center">
	<p>¿Quieres conocer más sobre los beneficios?</p>
	<button type="button" id="registrate-btn-up" class="btn btn-info btn-lg btn btn-success">Registrate</button>
	<br>
	<a href="mailto:hello@okidoctor.com">hello@okidoctor.com</a><br>
	<div style="color:rgba(255,255,255,0.8)">Venezuela 2016</div>
</section>


	    
	</body>
</html>