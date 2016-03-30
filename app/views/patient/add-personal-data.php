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
		<input name="id_card" type="text" class="form-control input-lg input-home-doctor" placeholder="Cédula" required="required">
	</div>
	<div class="col-sm-6 col-lg-6">
		<input name="birth" type="text" class="form-control input-lg input-home-doctor" placeholder="Fecha de Nacimiento" required="required">
	</div>	
	<div class="col-sm-6 col-lg-6">					
		<input name="cellphone" type="text" class="form-control input-lg input-home-doctor" placeholder="Teléfono Móvil" required="required">
	</div>
	<div class="col-sm-6 col-lg-6">
		<input name="phone" type="text" class="form-control input-lg input-home-doctor" placeholder="Teléfono Habitación" required="required">
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