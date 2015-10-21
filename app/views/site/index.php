<?php $this -> render('default/preloader'); ?>
<!-- <div class="container-fluid site-home">
	<div class="flow-container">
		<div class="bg-flow">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
		</div>
		<div class="bg-flow">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
		</div>
		<div class="bg-flow">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
			<img src="../public/img/bg-city-pin.png" alt="" class="">
		</div>
</div> -->
<!-- TODO CHANGE BACKGROUND -->
<div class="container-fluid site-home">
	<div class="row">
		<div class="col-lg-1 col-md-1 col-sm-1 "></div>
		<div class="col-lg-10 col-md-10 col-sm-10 ">
			<h1>
				<div class="col-lg-6 col-md-6 col-sm-6 text-right">
					Encontrar un
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6  text-left row">
					<span class="rotate">Cardiólogo, Ginecólogo, Nutricionista, Veterinario, Odontólogo</span>
				</div>
				
				
			</h1>
			<h3 class="text-center">busca al médico que necesitas y pide una cita con comodidad</h3>
			<div class="text-center">
				<?php $this -> render('search/main-form'); ?>
			</div>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-1 "></div>
	</div>
</div>

<div>
	<div id="results"></div>
</div>
<!-- Start featured section -->
<section class="container-fluid whatisit" id="site-featured">
	<div class="featured-circles text-center">
		<div class="featured-circle">
			<i class="glyphicon glyphicon-search"></i>
			<h4>Busca <br> al medico</h4>
		</div>
		<div class="featured-circle">
			<i class="glyphicon glyphicon-ok"></i>
			<h4 style="font-weight: 300;margin-bottom: 0;padding-bottom: 0;line-height: 0;margin-top: 17px;">Marca el</h4><h4>dia de la cita</h4>
		</div>
		<div class="featured-circle">
			<i class="glyphicon glyphicon-heart-empty"></i>
			<h4>Asiste a<br>la consulta</h4>
		</div>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-5" style="margin-top:113px;font-weight:300;font-weight: 300;">
		<h2> <span  style="line-height:0;font-weight:300;">LA FORMA MAS <br></span><span>RAPIDA Y FACIL</span></h2>
		<button class="btn-default btn featured-btn">EMPIEZA AHORA</button>
	</div>
</section>	
<section class="container-fluid" id="site-promotion">
	<div class="col-md-6 text-right right" style="margin-top:150px;margin-right:150px;">
		<h2><span style="line-height:0;font-weight:300;">Si eres medico <br></span>
			<span>administra s tus <br></span>
			<span style="line-height:0;font-weight:300;">pacientes de la forma mas <br></span>
			<span>rapida y facil</span></h2>

		<button class="btn-default btn featured-btn" style="border: solid 2px;">EMPIEZA AHORA</button>
	</div>
	<div class="col-md-1 right"></div>
</section>

<div id="templates">
	<?php $this -> render('mockups/filters'); ?>
	<?php $this -> render('mockups/item-card'); ?>
</div>

<?php $this -> render('site/forms/register'); ?>



