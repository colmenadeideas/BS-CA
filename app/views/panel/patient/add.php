<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Paciente</h2>
	


	<!-- TODO: Activar el progressbar -->
	<div class="progressbar-container col-lg-12 col-sm-12" >
		<!-- progressbar -->
		<ul class="progressbar">
			<li>Informacion general</li>
			<li>Datos esenciales</li>
			<li>Observaciones</li>
		</ul>
	</div>



	<div id="stepform">		
		<form id="patient" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="0" data-stepfoward="2" action="" novalidate="novalidate" method="post" class="light-form stepform1">
			<!--extra data-->
			<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
			<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>
			
			<div class="field-wrapper form-inline col-sm-12 col-lg-12">
				<div class="col-sm-6 col-lg-6">
					<input name="name" type="text" class="form-control input-lg input-home-doctor" placeholder="Nombres" required="required">
				</div>
				<div class="col-sm-6 col-lg-6">
					<input name="lastname" type="text" class="form-control input-lg input-home-doctor" placeholder="Apellidos" required="required">
				</div>
				<div class="col-sm-6 col-lg-6">
					<input name="cedula" type="text" class="form-control input-lg input-home-doctor" placeholder="Cédula" required="required">
				</div>
				<div class="col-sm-6 col-lg-6">
					<input name="birth" type="text" class="form-control input-lg input-home-doctor" placeholder="Fecha de Nacimiento" required="required">
				</div>	
				<div class="col-sm-12 col-lg-12">
					<input name="email" type="text" class="form-control input-lg input-home-doctor" placeholder="Email" required="required">
				</div>		
			</div>
			<div id="regular-address" class="col-sm-12 col-lg-12">	
				<textarea name="address" id="address"  class="form-control input-lg input-home-location" 
				placeholder="Dirección" required="required" autocomplete="off"></textarea>
				<input name="address_location" type="hidden"><input name="address_url" type="hidden">					 	
			</div>
			<div class="text-right col-sm-12 col-lg-12 button-area">
				<input type="submit" name="submit" class="next btn btn-info btn-lg" value="Continuar" > 
			</div>
		</form>
	</div>


</div>
<div class="col-lg-2 col-sm-2"></div>