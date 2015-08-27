<form id="practice" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="4" data-stepfoward="5" action="" novalidate="novalidate" method="post" class="light-form stepform1">

	<?php print_r($this->tempdata); ?>
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
	<h3 class="text-center">Esta es la información de su práctica</h3>
	<div class="practice-sheet">
		<div class="col-sm-12 col-lg-12 text">
			



			<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
			<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>

			<input name="isclinic" type="radio" class="isclinic" id="isclinic1" required value="1" />
			<input name="isclinic" type="radio" class="isclinic" id="isclinic2" required value="0" />
			<input name="clinic" class="form-control input-lg input-home-doctor" placeholder="Nombre de la Clínica, Hospital..." required="required">
			<input name="clinic_id" type="hidden">				
			<textarea name="address" id="address"  class="form-control input-lg input-home-location" 
			placeholder="Dirección" required="required" autocomplete="off"></textarea>
			<input name="address_location" type="hidden"><input name="address_url" type="hidden">	
			<!--days-->
			<input type="checkbox" value="MAR" id="day_2" name="day[]" class="day">
			<input id="ini_schedule_4" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_4"/>
			<input id="end_schedule_4" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_4"/>
			<!--quote-->
			<input type="number" min="1" max="365" maxlength="3" value="30" name="max_days_ahead" size="3" required="required" class="form-control bfh-number">	
			<input name="autoquota" type="radio" class="autoquota" id="autoquota1" required value="1" />
			<input type="number" min="1" 
					max="40" maxlength="2" size="7" name="day_quote_<?php echo $key;?>" value="1"  required="required" class="form-control">
			<!--cost-->
			<input type="text" name="reason[]" placeholder="Motivo de la consulta" required="required" class="form-control input-lg signinput"> cancelará 
				<input style="width: auto; display: inline;" type="text" maxlength="8" size="7" name="cost[]" placeholder="Costo" required="required" class="form-control input-lg signinput"><h3 style="display: inline;">Bs F</h3> 
				y estará 
				<input id="time-lapse-cost" data-format="hh:mm" placeholder="HH:MM" maxlength="5" class="time-lapse form-control input-lg smaller" type="text" name="time[]"/>




		</div>
	</div>
	
	<div class="text-right col-sm-12 col-lg-12 button-area">
		<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
	</div>
</form>

<div class="hidden-message">

	<h3 class="text-center forms">Su practica se ha guardado con exito</h3>
	<div style="display:table;margin:auto;">
		<button class="btn btn-green btn-lg register-send"><a href="panel/practice/add">Agregar otra</a> </button>
		<button class="btn btn-green btn-lg register-send"><a href="panel/practice/list">Volver a inicio</a> </button>
	</div>
</div>