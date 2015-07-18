<h2 class="text-center forms">Gestion de Cupos por practica</h2>
<div class="col-lg-12 col-xs-12 practice-item">
	
<form id="form-quote-practice" action="" novalidate="novalidate" method="post" class="light-form">
	<div class="col-sm-12 col-lg-12 text-right">
			<button type="submit" class="btn btn-green btn-lg register-send">
				GUARDAR <i class="fa fa-check"></i>
			</button>
	</div>
	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
			   		 
	   		 		
		<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		
			<div class="col-sm-12 col-lg-12 text">
				<input name="hours" type="checkbox" class="hours" id="hours" value="1" />
				<label for="hours"><span></span>¿Desea que el sistema gestione las horas?</label>
			</div>
			
			<div class="col-sm-12 col-lg-12 text">
				¿De que forma desea gestionar la configuración de las citas?
			</div>
			<div class="col-sm-6 col-lg-6">
				<input name="quot" type="radio" class="quot" id="quot1" value="1"  />
				<!--label for="quot1"  data-toggle="collapse" data-target="#general" aria-expanded="false" aria-controls="general" ><span></span>General</label-->
				<label for="quot1" ><span></span>General</label>
			</div>
			<div class="col-sm-6 col-lg-6">
				<input name="quot" type="radio" class="quot" id="quot2" value="0"  />
				<label for="quot2"><span></span>Por Practica</label>
			</div>			
	    </div>
	   		 
	   		 <div id="general" class="collapse" >   				 
	   		 
	   		    </br>
				</br>
					<td>Maximo dias para reservar cita</td>
					</br>
				<td ><input name="general_max_days_ahead" type="number" class="Small form-control" id="max_days_ahead" value="0" required /></td>
				</br>
					<td>Cupos por dia</td>
					</br>
				<td ><input name="general_quota" type="number" class="Small form-control" id="quota" value="0" /></td>
				</div>
				
			</div>
		</div>
	<div id="practica" class="collapse">
<?php  foreach ($this->practices['practice'] as $practice) { ?>
			<div  class="col-lg-12 col-xs-12 practice-item">
		
				
				<div class="col-lg-6 col-xs-6">
		
					<h1><?php echo $practice['name']; ?></h1>
					<?php echo $practice['address']; ?>
					<?php  if (!empty($practice['schedule'])) { ?>
						</br>
					<td>Maximo dias para reservar cita</td>
					<td class=""><input name="max_days_ahead" type="number" class="Small form-control" id="max_days_ahead" value="0" /></td>
					</br>
					<?php
						}
  ?>
					
				</div>
				<div class="col-lg-6 col-xs-6">
					<?php  if (empty($practice['schedule'])) { ?>
						Agregar Horario de Consulta
					<?php
							} else {
 ?>
						<table class="table table-striped text-center">
							<thead>
								<tr>
									<td> ID</td>
									<td> DÍA</td>
									<td>HORA INICIO</td>
									<td>HORA FINAL</td>
									<td>CUPOS</td>
									<td></td>
								</tr>
							</thead>
							<?php foreach ($practice['schedule'] as $schedule_day) { ?>
							  	<tr>
							  		<td class="success"type="hidden" ><?php echo $schedule_day['id_practice']; ?></td>
							  		<td class="success"><?php echo $schedule_day['day']; ?></td>								
									<td class=""><?php echo $schedule_day['ini_schedule']; ?></td>
									<td class=""><?php echo $schedule_day['end_schedule']; ?></td>
									<td class=""><input name="quota" type="number" class="Small form-control" id="quota" value="0" /></td>
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
						}
 ?>
				</div>
				
			</div>
			<?php } ?>
			</div>
			<div class="add-action col-lg-12 col-xs-12 text-right">
				<a href="#panel/practice/add" class="wrap-action">
					<span class="button-instruction">Agregar otra Práctica</span> <span class="btn-action btn-add">+</span>
				</a>
			</div>
			
		
		
		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this -> username['id']; ?>" required>
		
		</form>
	