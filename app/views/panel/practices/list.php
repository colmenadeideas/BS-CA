<?php  foreach ($this->practices['practice'] as $practice) { ?>
<div class="col-lg-12 col-xs-12 practice-item">
	
	<div class="col-lg-6 col-xs-6">
		<h1><?php echo $practice['name']; ?></h1>
		<?php echo $practice['address']; ?>
	</div>
	<div class="col-lg-6 col-xs-6">
		<?php  if (empty($practice['schedule'])) { ?>
			Agregar Horario de Consulta
		<?php	
		} else { ?>
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<td> DÍA</td>
						<td>HORA INICIO</td>
						<td>HORA FINAL</td>
						<td>CUPOS</td>
						<td></td>
					</tr>
				</thead>
				<?php foreach ($practice['schedule'] as $schedule_day) { ?>
				  	<tr>
				  		<td class="success"><?php echo $schedule_day['day']; ?></td>								
						<td class=""><?php echo $schedule_day['ini_schedule']; ?></td>
						<td class=""><?php echo $schedule_day['end_schedule']; ?></td>
						<td class=""><span class="label label-default"><?php echo $schedule_day['quota'] ; ?></span></td>
						<td class="">
							<button class="btn btn-sm btn-warning">
								<i class="fa fa-edit fa-lg"></i>
							</button>
							<button class="btn btn-sm btn-warning">
								<i class="fa fa-trash-o fa-lg"></i>
							</button>
						</td>
					</tr>
				<?php } ?>
				
			</table>
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