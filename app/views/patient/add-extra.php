<form id="patient" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="1" data-stepfoward="4" action="" novalidate="novalidate" method="post" class="light-form stepform1">
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
	<div class="field-wrapper form-inline text-right col-sm-12 col-lg-12">
	<button class="btn btn-green btn-lg skipt">
			SALTAR ESTE PASO 
	</button>
	</div>
	
	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-6 col-lg-6 text text-right">
			¿Ha sido operado alguna vez?
		</div>
		<div class="col-sm-6 col-lg-6 inlineradio">
			<input name="extra1" type="radio" class="extra1" id="extra1_1" required value="A"  />
			<label for="extra1_1"><span></span>Si</label>			
		
			<input name="extra1" type="radio" class="extra1" id="extra1_2" required value="B" />
			<label for="extra1_2"><span></span>No</label>
		</div>			
	</div>
	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-6 col-lg-6 text text-right">
			¿Toma algún medicamento?
		</div>
		<div class="col-sm-6 col-lg-6 inlineradio">
			<input name="extra2" type="radio" class="extra2" id="extra2_1" required value="A"  />
			<label for="extra2_1"><span></span>Si</label>			
		
			<input name="extra2" type="radio" class="extra2" id="extra2_2" required value="B" />
			<label for="extra2_2"><span></span>No</label>
		</div>			
	</div>
	



	

	<div class="text-right col-sm-12 col-lg-12 button-area">
		<input type="submit" name="previous" class="previous btn" value="Anterior">
		<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
	</div>
</form>