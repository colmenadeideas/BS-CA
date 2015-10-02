<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Cita</h2>
	
	<form id="appointment-add" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="0" data-stepfoward="2" action="" novalidate="novalidate" method="post" class="light-form stepform1">
		<!--extra data-->
		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
		<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>

		<div class="col-sm-12 col-lg-12">
			<input name="name" type="text" id="appointment-add-name" class="form-control input-lg input-home-doctor" placeholder="Buscar paciente..." required="required">
		</div>
		<div class="field-wrapper form-inline col-sm-5 col-lg-5">
			
			<div class="col-sm-12 col-lg-12">
				<input name="clinic" type="text" class="form-control input-lg input-home-doctor" placeholder="Clinica" required="required">
			</div>	
			<div class="col-sm-12 col-lg-12">
				<input name="reason" type="text" class="form-control input-lg input-home-doctor" placeholder="Razon" required="required">
			</div>
	
		</div>
		<div class="col-sm-7 col-lg-7">
			<div class="calendar" id="appointment-add-calendar"></div>
		</div>	
		<div class="text-right col-sm-9 col-lg-9 button-area">
			<input type="submit" name="submit" class="next btn btn-info btn-lg" value="Guardar y nuevo" > 
		</div>
		<div class="text-right col-sm-3 col-lg-3 button-area">
			<input type="submit" name="submit" class="next btn btn-info btn-lg" value="Guardar" > 
		</div>
	</form>



</div>