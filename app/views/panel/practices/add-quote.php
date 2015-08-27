<form id="practice" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="2" data-stepfoward="4" action="" novalidate="novalidate" method="post" class="light-form stepform1">
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
	
	
	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-12 col-lg-12 text">
			¿Con cuantos días de anticipación quieres permitir la reserva de citas?
		</div>
		<div class="col-sm-6 col-lg-6">
			Hasta
			<input type="number" min="1" max="365" maxlength="3" value="30" name="max_days_ahead" size="3" required="required" class="form-control bfh-number"> Dia(s)
		</div>					
	</div>


	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-12 col-lg-12 text text-center">
			¿Quiere que los cupos se administren automáticamente?
		</div>
		<div class="col-sm-6 col-lg-6">
			<input name="autoquota" type="radio" class="autoquota" id="autoquota1" required value="1" />
			<label for="autoquota1"><span></span>Si</label>
		</div>
		<div class="col-sm-6 col-lg-6">
			<input name="autoquota" type="radio" class="autoquota" id="autoquota2" required value="0" />
			<label for="autoquota2"><span></span>No</label>
		</div>


		<div id="days-list" class="col-sm-12 col-lg-12 collapse">
			<br>
			<div class="col-sm-12 col-lg-12 text text-center">
				Indique la cantidad máxima de pacientes que desea admitir por día
			</div>
			<?php foreach ($this->tempdata['day'] as $key => $value) { ?>				
				<div class="col-sm-2 col-lg-2">
					<h3><?php echo $value; ?></h3>
					<input type="number" min="1" 
					max="40" maxlength="2" size="7" name="day_quote_<?php echo $key;?>" value="5"  required="required" class="form-control">
				</div>
			<?php }
			?>
		</div>			
	</div>

	


	<div class="text-right col-sm-12 col-lg-12 button-area">
		<input type="submit" name="previous" class="previous btn" value="Anterior">
		<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
	</div>
</form>