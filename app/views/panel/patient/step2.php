<form id="patient2" action="" novalidate="novalidate" method="post" class="light-form col-md-12 step" step="2" style="margin:auto;">	
	<div class="form-inline field-wrapper form-inline col-sm-12 col-lg-12">
		<h2 class="col-sm-5" style="margin:0;padding:0;">Indique su sexo:</h2>
		<div class="col-sm-3 col-lg-3 form-inline">
			<input name="sex" type="radio" class="sex" id="sexMale" value="male" required/>
			<label for="sexMale"><span></span>Hombre</label>
		</div>
		<div class="col-sm-2 col-lg-2">
			<input name="sex" type="radio" class="sex" id="sexFemale" value="female" required/>
			<label for="sexFemale"><span></span>Mujer</label>
		</div>			
    </div>
	<div class="form-inline field-wrapper col-sm-6 col-lg-6">
		<label style="display:block" for="age" class="placeholder"></label>
		<h2>Edad:</h2>
		<input  style="width:100px; display:inline;" type="number" min="1" max="100" maxlength="3" name="age" value="25" size="3" required="required" class="form-control bfh-number">
		<h3 style="display: inline;">anos</h3>
	</div>
	<div class="field-wrapper col-sm-12 col-lg-6 form-inline">
		<label style="display:block" for="height" class="placeholder"></label>
		<h2>Estatura:</h2>
		<input  style="width:100px; display:inline;" type="text"  maxlength="4" name="height" value="1,70" size="3" required="required" class="form-control bfh-number">
		<h3 style="display: inline;">M</h3>
	</div>
	<div class="field-wrapper col-sm-12 col-lg-6 form-inline">
		<label style="display:block" for="weight" class="placeholder"></label>
		<h2>Peso</h2>
		<input  style="width:100px; display:inline;" type="number" min="1" max="300" maxlength="3" name="weight" value="70" size="3" required="required" class="form-control bfh-number">
		<h3 style="display: inline;">Kg</h3>
	</div>
	<div class="field-wrapper col-sm-12 col-lg-6 form-inline">
		<label style="display:block" for="weight" class="placeholder"></label>
		<h2>Tipo de Sangre</h2>
		<input  style="display:inline;" type="text" min="1" max="365" maxlength="3" name="weight" size="1" required="required" class="form-control bfh-number bfixed">
		
	</div>
	<div class="col-sm-12 col-lg-12">
		<button type="submit" class="btn btn-green">
			Siguiete
		</button>
	</div>
	<div class="row eso">

	</div>
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->username['id']; ?>" required>	
	<script>addpatient();progressbar();</script>
</form>
