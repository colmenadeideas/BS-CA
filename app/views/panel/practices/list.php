<?php  foreach ($this->practices['practice'] as $practice) { ?>
<div class="col-lg-5 col-xs-10 practice-item">
	<div class="address text-center container-fluid">
		<?php  if (empty($practice['address'])) { ?>
			<h4>Agregar Ubicacion</h4>
		<?php } else { ?>
		<div class="mask"></div>
		<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d981.6283542407336!2d-68.01264916195233!3d10.220111993255733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sve!4v1442851170606" width="100%" height="100px" frameborder="0" style="border:0" allowfullscreen></iframe>
		<?php } ?>
	</div>
	
	<div class="row text-center">
		<h2><?php echo $practice['name']; ?></h2>
	</div>
	<div class="col-lg-12 col-xs-12">
		<?php  if (empty($practice['schedule'])) { ?>
			Agregar Horario de Consulta
		<?php	
		} else { ?>

				<?php foreach ($practice['schedule'] as $schedule_day) { ?>
				  	<div class="container-fluid details">
				  		<div class="col-md-2">
				  			<h3><?php echo $schedule_day['day']; ?></h3>
				  			<p class="placeholder">DIA</p>
				  		</div>								
						<div class="col-md-4">
							<h3><?php echo $schedule_day['ini_schedule']; ?></h3>
							<p class="placeholder">DESDE</p>
						</div>
						<div class="col-md-4">
							<h3><?php echo $schedule_day['end_schedule']; ?></h3>
							<p class="placeholder">HASTA</p>
						</div>
						<div class="col-md-2">
							<h3><?php echo $schedule_day['quota'] ; ?></h3>
							<p class="placeholder">CUPOS</p>
						</div>
					</div>
				<?php } ?>
				
			<?php
		} ?>
	</div>
	
</div>
<?php } ?>
<div class="add-action col-lg-12 col-xs-12 text-right">
	<a href="#panel/practice/add" class="wrap-action">
		<span class="button-instruction">Agregar otra Práctica</span> <span class="btn-action btn-add">+</span>
	</a>
</div>