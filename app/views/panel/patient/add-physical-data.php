<form id="patient" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="1" data-stepfoward="3" action="" novalidate="novalidate" method="post" class="light-form stepform1">
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
	
	<div class="field-wrapper col-sm-4 col-lg-4">
		<label style="display:block" for="age" class="placeholder"></label>
		<h2>Edad</h2>
		<input  style="width:100px; display:inline;" type="number" min="1" max="100" maxlength="3" name="age" value="25" size="3" required="required" class="form-control bfh-number">
		<span class="sidetext">años</span>
	</div>
	<div class="field-wrapper col-sm-4 col-lg-4 form-inline">
		<label style="display:block" for="height" class="placeholder"></label>
		<h2>Estatura</h2>
		<input  style="width:100px; display:inline;" type="text"  maxlength="4" name="height" value="1,70" size="3" required="required" class="form-control bfh-number">
		<span class="sidetext">mts</span>
	</div>


	<div class="field-wrapper col-sm-4 col-lg-4 form-inline">
		<label style="display:block" for="weight" class="placeholder"></label>
		<h2>Peso</h2>
		<input  style="width:100px; display:inline;" type="number" min="1" max="300" maxlength="3" name="weight" value="70" size="3" required="required" class="form-control bfh-number">
		<span class="sidetext">Kg</span>
	</div>
	<div class="field-wrapper form-inline col-sm-4 col-lg-4">
		<h2>Sexo</h2>
		<div class="inlineradio">
			<input name="sex" type="radio" class="sex" id="sex1" required value="M"  />
			<label for="sex1"><span></span>Hombre</label>
		
			<input name="sex" type="radio" class="sex" id="sex2" required value="F" />
			<label for="sex2"><span></span>Mujer</label>
		</div>			
	</div>
	<div class="field-wrapper col-sm-6 col-lg-6 form-inline">
		<label style="display:block" for="weight" class="placeholder"></label>
		<h2>Tipo de Sangre</h2>
		<div class="inlineradio">
			<input name="blood-type" type="radio" class="blood-type" id="blood-type1" required value="A"  />
			<label for="blood-type1"><span></span>A</label>			
		
			<input name="blood-type" type="radio" class="blood-type" id="blood-type2" required value="B" />
			<label for="blood-type2"><span></span>B</label>
		
			<input name="blood-type" type="radio" class="blood-type" id="blood-type3" required value="AB" />
			<label for="blood-type3"><span></span>AB</label>		

			<input name="blood-type" type="radio" class="blood-type" id="blood-type4" required value="O" />
			<label for="blood-type4"><span></span>O</label>
		</div>
		<div class="clearfix"></div>
		<div class="inlineradio">
			<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol1" required value="+"  />
			<label for="blood-symbol1"><span></span>+</label>

			<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol3" required value="-" />
			<label for="blood-symbol3"><span></span>-</label>
		</div>			
		
	</div>



	

	<div class="text-right col-sm-12 col-lg-12 button-area">
		<input type="submit" name="previous" class="previous btn" value="Anterior">
		<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
	</div>
</form>