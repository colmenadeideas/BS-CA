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
<div>
	<div id="results"></div>
</div>

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
<div class="container-fluid whatisit">
	<div class="container">
		<div class="col-lg-4 col-md-4 col-sm-4 text-center">
			<img class="img-responsive" src="<?php echo IMG; ?>default-female.png">
			<h3>Bondad del servicio</h3>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 text-center">
			<img class="img-responsive" src="<?php echo IMG; ?>default-male.png">
			<h3>Bondad del servicio</h3>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 text-center">
			<img class="img-responsive" src="<?php echo IMG; ?>default-female.png">
			<h3>Bondad del servicio</h3>
		</div>	
	</div>
</div>

<div id="templates">
	<?php $this -> render('mockups/filters'); ?>
	<?php $this -> render('mockups/item-card'); ?>
</div>

<?php $this -> render('site/forms/register'); ?>



