<?php $this -> render('default/preloader'); ?>
<div id="desktop"></div>
<div class="site-head animation1s">
	<?php $this -> render('mockups/wayra'); ?>
	<div class="container text-center temporaryfademe">
		<h1 style="margin:auto; width: 670px;">
		<div class="text-right" style="float:left;">
			Encontrar un &nbsp;
		</div>
		<div class="text-left" style="float:left;">
			<span class="rotate">Cardiólogo, Ginecólogo, Nutricionista, Veterinario, Odontólogo</span>
		</div></h1>
		<div class="clearfix"></div>
		<h3>busca al médico que necesitas y solicita una cita con comodidad</h3>
		<?php $this -> render('search/main-form'); ?>
	</div>
</div>
<div id="templates">
	<?php $this -> render('mockups/filters'); ?>
	<?php $this -> render('mockups/item-card'); ?>
</div>
<div id="results"></div>

<?php $this -> render('site/forms/register'); ?>



