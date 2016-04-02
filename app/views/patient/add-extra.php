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
			<input name="extra1" type="radio" class="extra1" id="extra1_1" required value="A" 
			<?php if ($this->tempdata['extra1'] == "A") { echo ' checked ="checked"'; } ?> />
			<label for="extra1_1"><span></span>Si</label>			
		
			<input name="extra1" type="radio" class="extra1" id="extra1_2" required value="B" 
			<?php if ($this->tempdata['extra1'] == "B") { echo ' checked ="checked"'; } ?> />
			<label for="extra1_2"><span></span>No</label>
		</div>			
	</div>
	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-6 col-lg-6 text text-right">
			¿Toma algún medicamento?
		</div>
		<div class="col-sm-6 col-lg-6 inlineradio">
			<input name="extra2" type="radio" class="extra2" id="extra2_1" required value="A" 
			<?php if ($this->tempdata['extra2'] == "A") { echo ' checked ="checked"'; } ?> />
			<label for="extra2_1"><span></span>Si</label>			
		
			<input name="extra2" type="radio" class="extra2" id="extra2_2" required value="B" 
			<?php if ($this->tempdata['extra2'] == "B") { echo ' checked ="checked"'; } ?> />
			<label for="extra2_2"><span></span>No</label>
		</div>			
	</div>