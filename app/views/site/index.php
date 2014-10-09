<div class="site-head">
<?php $this->render('mockups/wayra'); ?>
<div class="container text-center temporaryfademe">
		<h1>
			<div class="left text-right">			
		</div>Encontrar un <span class="rotate">Cardiólogo, Ginecólogo, Nutricionista, Veterinario, Odontólogo</span> </h1>	
		<h3>busca al médico que necesitas y solicita una cita con comodidad</h3>	
		<?php $this->render('search/main-form'); ?>	
	</div>
</div>
<div id="search_result"></div>
<div id="results" class="desktop">
	<?php $this->render('mockups/filters'); ?>
	<?php $this->render('site/results'); ?>
</div>

<?php $this->render('site/forms/register'); ?>
<?php $this->render('site/forms/login'); ?>
