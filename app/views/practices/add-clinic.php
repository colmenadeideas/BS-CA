<div class="field-wrapper form-inline col-sm-12 col-lg-12">
	<div class="col-sm-12 col-lg-12 text">
		¿Está ubicado en una Clinica, Hopital o Centro Médico?
	</div>
	<div class="col-sm-6 col-lg-6">
		<input name="isclinic" type="radio" class="isclinic" id="isclinic1" required value="1"  />
		<label for="isclinic1"><span></span>Si</label>
	</div>
	<div class="col-sm-6 col-lg-6">
		<input name="isclinic" type="radio" class="isclinic" id="isclinic2" required value="0" />
		<label for="isclinic2"><span></span>No</label>
	</div>			
</div>
<div id="clinic-address" class="collapse col-sm-12 col-lg-12">	
	<input name="clinic" class="form-control input-lg input-home-doctor" placeholder="Nombre de la Clínica, Hospital..." required="required" >
	<input name="clinic_id" type="hidden">
	<textarea name="address" id="address"  class="form-control input-lg input-home-location" 
	placeholder="Dirección" required="required" autocomplete="off"></textarea>
	<input name="address_location" type="hidden"><input name="address_url" type="hidden">
	<div class="col-sm-8 col-lg-8 row">	
		<input name="clinic_details" class="form-control input-lg input-home-doctor" placeholder="Piso, Consultorio" required="required">
	</div>					 	
</div>
<div id="regular-address" class="collapse col-sm-12 col-lg-12">	
	<textarea name="address" id="address"  class="form-control input-lg input-home-location" 
	placeholder="Dirección" required="required" autocomplete="off" ></textarea>
	<input name="address_location" type="hidden"><input name="address_url" type="hidden">					 	
</div>
<!-- <div class="text-right col-sm-12 col-lg-12 button-area">
	<input type="submit" name="submit" class="next btn btn-info btn-lg" value="Continuar" > 
</div> -->
