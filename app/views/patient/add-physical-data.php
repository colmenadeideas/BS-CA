	<div class="field-wrapper col-sm-4 col-lg-4">
		<label style="display:block" for="age" class="placeholder"></label>
		<h2>Edad</h2>
		<input  style="width:100px; display:inline;" type="number" min="1" max="100" maxlength="3" name="age" placeholder="25" value="<?php echo $this->tempdata['age']; ?>" size="3" required="required" class="form-control bfh-number">
		<span class="sidetext">años</span>
	</div>
	<div class="field-wrapper col-sm-4 col-lg-4 form-inline">
		<label style="display:block" for="height" class="placeholder"></label>
		<h2>Estatura</h2>
		<input  style="width:100px; display:inline;" type="text"  maxlength="4" name="height" placeholder="1,70" value="<?php echo $this->tempdata['height']; ?>" size="3" required="required" class="form-control bfh-number">
		<span class="sidetext">mts</span>
	</div>


	<div class="field-wrapper col-sm-4 col-lg-4 form-inline">
		<label style="display:block" for="weight" class="placeholder"></label>
		<h2>Peso</h2>
		<input  style="width:100px; display:inline;" type="number" min="1" max="300" maxlength="3" name="weight" placeholder="70" value="<?php echo $this->tempdata['weight']; ?>"  size="3" required="required" class="form-control bfh-number">
		<span class="sidetext">Kg</span>
	</div>
	<div class="field-wrapper form-inline col-sm-4 col-lg-4">
		<h2>Sexo</h2>
		<div class="inlineradio">
			<input name="gender" type="radio" class="gender" id="gender1" required value="M" <?php if ($this->tempdata['gender'] == "M") { echo ' checked ="checked"'; } ?> />
			<label for="gender1"><span></span>Hombre</label>
		
			<input name="gender" type="radio" class="gender" id="gender2" required value="F" <?php if ($this->tempdata['gender'] == "F") { echo ' checked ="checked"'; } ?>/>
			<label for="gender2"><span></span>Mujer</label>
		</div>			
	</div>
	<div class="field-wrapper col-sm-6 col-lg-6 form-inline">
		<label style="display:block" for="weight" class="placeholder"></label>
		<h2>Tipo de Sangre</h2>
		<div class="inlineradio">
			<input name="blood-type" type="radio" class="blood-type" id="blood-type1" required value="A" 
			<?php if ($this->tempdata['blood-type'] == "A") { echo ' checked ="checked"'; } ?> />
			<label for="blood-type1"><span></span>A</label>			
		
			<input name="blood-type" type="radio" class="blood-type" id="blood-type2" required value="B" 
			<?php if ($this->tempdata['blood-type'] == "B") { echo ' checked ="checked"'; } ?> />
			<label for="blood-type2"><span></span>B</label>
		
			<input name="blood-type" type="radio" class="blood-type" id="blood-type3" required value="AB" 
			<?php if ($this->tempdata['blood-type'] == "AB") { echo ' checked ="checked"'; } ?> />
			<label for="blood-type3"><span></span>AB</label>		

			<input name="blood-type" type="radio" class="blood-type" id="blood-type4" required value="O" 
			<?php if ($this->tempdata['blood-type'] == "O") { echo ' checked ="checked"'; } ?> />
			<label for="blood-type4"><span></span>O</label>
		</div>
		<div class="clearfix"></div>
		<div class="inlineradio">
			<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol1" required value="+" 
			<?php if ($this->tempdata['blood-symbol'] == "+") { echo ' checked ="checked"'; } ?> />
			<label for="blood-symbol1"><span></span>+</label>

			<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol3" required value="-" 
			<?php if ($this->tempdata['blood-symbol'] == "-") { echo ' checked ="checked"'; } ?> />
			<label for="blood-symbol3"><span></span>-</label>
		</div>			
		
	</div>