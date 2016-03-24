	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-12 col-lg-12 text">
			¿Con cuantos días de anticipación quieres permitir la reserva de citas?
		</div>
		<div class="col-sm-6 col-lg-6">
			Hasta
			<input type="number" min="1" max="365" maxlength="3" value="30" name="max_days_ahead" size="3" required="required" 
			class="form-control bfh-number" value="<?php echo $this->tempdata['max_days_ahead']; ?>"> Dia(s)
		</div>					
	</div>


	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-12 col-lg-12 text text-center">
			¿Quiere que los cupos se administren automáticamente?
		</div>
		<div class="col-sm-6 col-lg-6">
			<input name="manage_time_slots" type="radio" class="manage_time_slots" id="manage_time_slots1" required value="1" 
			<?php if ($this->tempdata['manage_time_slots'] == "1") { echo ' checked ="checked"'; } ?> value="1" />
			<label for="manage_time_slots1"><span></span>Si</label>
		</div>
		<div class="col-sm-6 col-lg-6">
			<input name="manage_time_slots" type="radio" class="manage_time_slots" id="manage_time_slots2" required value="0" 
			<?php if ($this->tempdata['manage_time_slots'] == "0") { echo ' checked ="checked"'; } ?>/>
			<label for="manage_time_slots2"><span></span>No</label>
		</div>


		<div id="days-list" class="col-sm-12 col-lg-12 collapse <?php if ($this->tempdata['manage_time_slots'] == "0") { echo "in"; } ?>">
			<br>
			<div class="col-sm-12 col-lg-12 text text-center">
				Indique la cantidad máxima de pacientes que desea admitir por días
			</div>
			<?php 
				for ($i=1; $i < 8; $i++) { 
					if ($this->tempdata['day_'.$i] != ""){
						$this->tempdata['day'][] = $this->tempdata['day_'.$i];	
						?>
						<div class="col-sm-2 col-lg-2">
							<h3><?php echo $this->tempdata['day_'.$i]; ?></h3>
							<input type="number" min="1" 
							max="40" maxlength="2" size="7" name="day_quote_<?php echo $i;?>" 
							value="<?php echo $this->tempdata['day_quote_'.$i]; ?>"  required="required" class="form-control">
						</div>
						<?php					
					}
				}				
			?>
		</div>			
	</div>
	
	<!-- <div class="text-right col-sm-12 col-lg-12 button-area">
		<input type="submit" name="previous" class="previous btn" value="Anterior">
		<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
	</div> -->