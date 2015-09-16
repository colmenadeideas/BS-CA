<form id="practice" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="4" data-stepfoward="0" action="" novalidate="novalidate" method="post" class="light-form stepform1">

	<h3 class="text-center">Esta será la información de su práctica</h3><br>
	<div class="practice-sheet">
		<div class="col-sm-12 col-lg-12 text">
			<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
			<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required >

						
			<input name="isclinic" type="radio" class="isclinic" id="isclinic1" required 
				<?php if ($this->tempdata['isclinic'] == "1") { echo ' checked ="checked"'; } ?> value="1" />
			<input name="isclinic" type="radio" class="isclinic" id="isclinic2" required 
				<?php if ($this->tempdata['isclinic'] == "0") { echo ' selected ="selected"'; } ?>value="0" />
			<h4 class="division text-right">Ubicación</h4>
			<div class="col-sm-3 col-lg-3 previewtext">
				Nombre
			</div>
			<div class="col-sm-9 col-lg-9">
				<?php if ($this->tempdata['isclinic'] == "1") { ?>
				<input name="clinic" class="form-control input-lg input-home-doctor" placeholder="Nombre de la Clínica, Hospital..." value="<?php echo $this->tempdata['clinic']; ?>" >
				<input name="address_details" class="form-control input-lg input-home-doctor" placeholder="Piso, Consultorio..." value="<?php echo $this->tempdata['clinic_details']; ?>" >
				<?php } ?>
			</div>
			
				
			<input name="clinic_id" type="hidden" value="<?php echo $this->tempdata['clinic_id']; ?>" >	
			<div class="col-sm-3 col-lg-3 previewtext">
				Dirección
			</div>
			<div class="col-sm-9 col-lg-9">
				<textarea name="address" id="address" class="form-control input-lg input-home-location" 
			placeholder="Dirección"  autocomplete="off" ><?php echo $this->tempdata['address']; ?></textarea>
				<input name="address_location" type="hidden" value="<?php echo $this->tempdata['address_location']; ?>">
				<input name="address_url" type="hidden" value="<?php echo $this->tempdata['address_url']; ?>">
			</div>
			
			
									
			
			
			<div class="clearfix"></div>
			<!--days-->
			<h4 class="division text-right">Horario</h4>
			<?php 
			
				for ($i=1; $i < 8; $i++) { 
					if ($this->tempdata['day_'.$i] != ""){
				?>	
				<div class="col-sm-2 col-lg-2">		
					<input id="day" class="form-control input-lg smaller text-center" type="text" name="day_<?php echo $i; ?>" value="<?php echo $this->tempdata['day_'.$i]; ?>" />
					<input class="timepicker form-control input-lg smaller text-center" type="text" name="ini_schedule_<?php echo $i; ?>" value="<?php echo $this->tempdata['ini_schedule_'.$i]; ?>" />
					<input class="timepicker form-control input-lg smaller text-center" type="text" name="end_schedule_<?php echo $i; ?>" value="<?php echo $this->tempdata['end_schedule_'.$i]; ?>" />
				</div>


			<?php } } ?>
			<div class="clearfix"></div>
			
			<!--quote-->
			<h4 class="division text-right">Cupos</h4>
			<div class="col-lg-3 col-md-3 col-sm-3  previewtext">Días máximos para reservar consulta</div>
			<div class="col-lg-3 col-md-3 col-sm-3 text-left"><input type="number" min="1" max="365" maxlength="3" value="<?php echo $this->tempdata['max_days_ahead']; ?>" name="max_days_ahead" size="3"  class="form-control bfh-number">	
			</div>

			<div class="col-lg-3 col-md-3 col-sm-3  previewtext">Administrar cupos automáticamente</div>
			<div class="col-lg-3 col-md-3 col-sm-3 text-left">
				<input name="manage_time_slots" type="radio" class="manage_time_slots" id="manage_time_slots1" required <?php if ($this->tempdata['manage_time_slots'] == "1") { echo ' checked ="checked"'; } ?>value="1" />
				<label for="manage_time_slots1"><span></span>Si</label>
				<input name="manage_time_slots" type="radio" class="manage_time_slots" id="manage_time_slots2" required <?php if ($this->tempdata['manage_time_slots'] == "0") { echo ' checked ="checked"'; } ?> value="0" />
				<label for="manage_time_slots2"><span></span>No</label>
				
			</div>
			<div class="clearfix"></div>
			<?php if ($this->tempdata['manage_time_slots'] == "0") { ?>
					<br>
				<div id="days-list" class="collapse in">
					<div class="col-lg-3 col-md-3 col-sm-3  previewtext">
						Cantidad máxima de pacientes por día
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 text-left">								
					
					<?php for ($i=1; $i < 8; $i++) { 
						if ($this->tempdata['day_'.$i] != ""){
						$this->tempdata['day'][] = $this->tempdata['day_'.$i];	
					?>
						<div class="col-sm-2 col-lg-2">
							<h4><?php echo $this->tempdata['day_'.$i]; ?></h4>
							<input type="number" min="1" 
							value="<?php echo $this->tempdata['day_quote_'.$i]; ?>" 
							max="40" maxlength="2" size="7" name="day_quote_<?php echo $i;?>" class="form-control">
						</div>
						<?php					
					} }?>

					</div>
				
				</div>
			<?php } ?>
			<div class="clearfix"></div>
			
			<!--cost-->
			<h4 class="division text-right">Servicios</h4>
			<?php foreach ($this->tempdata['reason'] as $key => $value) { ?>
				<div class="col-sm-4 col-lg-4">	
					<input type="text" name="reason[<?php echo $key; ?>]" placeholder="Motivo de la consulta"  class="form-control input-lg" value="<?php echo $value; ?>">

					<span class="sidetext">Bs F</span>  <input style="width: auto; display: inline;padding-left: 5px" type="text" maxlength="8" size="7" name="price[<?php echo $key; ?>]" placeholder="Costo"  class="form-control input-lg" value="<?php echo $this->tempdata['price'][$key]; ?>">
				
					<input style=" display: inline;" id="time-lapse-cost" data-format="hh:mm" placeholder="HH:MM" maxlength="5" class="time-lapse form-control input-lg smaller" type="text" name="time[<?php echo $key; ?>]" value="<?php echo $this->tempdata['time'][$key]; ?>" /><span class="sidetext">min</span> 
			</div>
			<?php } ?>

		</div>
	</div>
	
	<div class=" col-sm-12 col-lg-12 button-area text-right">
		<input type="submit" name="next" class="next btn btn-success btn-lg" value="Crear" > 
	</div>
</form>

<div class="hidden-message">

	<h4 class="text-center forms">Su practica se ha guardado con exito</h4>
	<div style="display:table;margin:auto;">
		<button class="btn btn-green btn-lg register-send"><a href="panel/practice/add">Agregar otra</a> </button>
		<button class="btn btn-green btn-lg register-send"><a href="panel/practice/list">Volver a inicio</a> </button>
	</div>
</div>