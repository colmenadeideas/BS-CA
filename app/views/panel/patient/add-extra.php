<form id="patient" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="1" data-stepfoward="3" action="" novalidate="novalidate" method="post" class="light-form stepform1">
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
	
	<div class="field-wrapper form-inline col-sm-12 col-lg-12">
		<div class="col-sm-1 col-lg-1 text">
			Sexo:
		</div>
		<div class="col-sm-3 col-lg-3">
			<input name="sex" type="radio" class="sex" id="sex1" required value="M"  />
			<label for="sex1"><span></span>Hombre</label>
		</div>
		<div class="col-sm-3 col-lg-3">
			<input name="sex" type="radio" class="sex" id="sex2" required value="F" />
			<label for="sex2"><span></span>Mujer</label>
		</div>			
	</div>


	<div class="field-wrapper col-sm-6 col-lg-6">
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
		<div class="col-sm-3 col-lg-3">
			<input name="blood-type" type="radio" class="blood-type" id="blood-type1" required value="A"  />
			<label for="blood-type1"><span></span>A</label>			
		</div>
		<div class="col-sm-3 col-lg-3">
			<input name="blood-type" type="radio" class="blood-type" id="blood-type2" required value="B" />
			<label for="blood-type2"><span></span>B</label>
		</div>
		<div class="col-sm-3 col-lg-3">
			<input name="blood-type" type="radio" class="blood-type" id="blood-type3" required value="AB" />
			<label for="blood-type3"><span></span>AB</label>		
		</div>
		<div class="col-sm-3 col-lg-3">
			<input name="blood-type" type="radio" class="blood-type" id="blood-type4" required value="O" />
			<label for="blood-type4"><span></span>O</label>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-3 col-lg-3">
			<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol1" required value="+"  />
			<label for="blood-symbol1"><span></span>+</label>
		</div>
		<div class="col-sm-3 col-lg-3">
			<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol3" required value="-" />
			<label for="blood-symbol3"><span></span>-</label>
		</div>			
		
	</div>



	

	<div class="text-right col-sm-12 col-lg-12 button-area">
		<input type="submit" name="previous" class="previous btn" value="Anterior">
		<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
	</div>
</form>



	<div class="col-sm-12 col-lg-12 text-right">
		<button class="btn btn-green btn-lg skipt">
			SALTAR Y FINALIZAR 
		</button>
	</div>
	<form id="patient3" action="" novalinodate="novalinodate" method="post" class="light-form col-sm-12 step" step="3">	
		<div class="field-wrapper extra-question form-inline col-sm-12 col-lg-12"> 
			<h3 class="col-sm-12 col-lg-12 ">
				¿Ha tenido algna sirugia?
			</h3>
			<div class="col-sm-4 col-lg-4">
				<input name="q1" type="radio" class="yes" id="q1_1" value="1"   />
				<label for="q1_1"><span></span>Si</label>
			</div>
			<div class="col-sm-4 col-lg-4">
				<input name="q1" type="radio" class="no" id="q1_0" value="0" />
				<label for="q1_0"><span></span>No</label>
			</div>
			<div id="" class="collapse qex col-sm-12 col-lg-12">	
				<input name="q1ex" class="form-control input-lg input-home-doctor" placeholder="Indique">
			</div>			
	    </div>
	    
		<div class="field-wrapper extra-question form-inline col-sm-12 col-lg-12">
			<h3 class="col-sm-12 col-lg-12 ">
				¿Toma algun medicameto?
			</h3>
			<div class="col-sm-4 col-lg-4">
				<input name="q2" type="radio" class="yes" id="q2_1" value="1"   />
				<label for="q2_1"><span></span>Si</label>
			</div>
			<div class="col-sm-4 col-lg-4">
				<input name="q2" type="radio" class="no" id="q2_0" value="0" />
				<label for="q2_0"><span></span>No</label>
			</div>
			<div id="" class="collapse qex col-sm-12 col-lg-12">	
				<input name="q1ex" class="form-control input-lg input-home-doctor" placeholder="Indique">
			</div>			
	    </div>
	    
		<div class="field-wrapper extra-question form-inline col-sm-12 col-lg-12">
			<h3 class="col-sm-12 col-lg-12 ">
				¿Es alergico a aluguna sustancia?
			</h3>
			<div class="col-sm-4 col-lg-4">
				<input name="q3" type="radio" class="yes" id="q3_1" value="1" />
				<label for="q3_1"><span></span>Si</label>
			</div>
			<div class="col-sm-4 col-lg-4">
				<input name="q3" type="radio" class="no" id="q3_0" value="0" />
				<label for="q3_0"><span></span>No</label>
			</div>
			<div id="" class="collapse qex col-sm-12 col-lg-12">	
				<input name="q1ex" class="form-control input-lg input-home-doctor" placeholder="Indique">
			</div>			
	    </div>
	    
		<div class="field-wrapper extra-question form-inline col-sm-12 col-lg-12">
			<h3 class="col-sm-12 col-lg-12 ">
				¿Sufre de problemas cardiacos?
			</h3>
			<div class="col-sm-4 col-lg-4">
				<input name="q4" type="radio" class="yes" id="q4_1" value="1"   />
				<label for="q4_1"><span></span>Si</label>
			</div>
			<div class="col-sm-4 col-lg-4">
				<input name="q4" type="radio" class="no" id="q4_0" value="0" />
				<label for="q4_0"><span></span>No</label>
			</div>
			<div id="" class="collapse qex col-sm-12 col-lg-12">	
				<input name="q1ex" class="form-control input-lg input-home-doctor" placeholder="Indique">
			</div>			
	    </div>
	    
		<div class="field-wrapper extra-question form-inline col-sm-12 col-lg-12">
			<h3 class="col-sm-12 col-lg-12 ">
				¿Sufre problemas de respiracion?
			</h3>
			<div class="col-sm-4 col-lg-4">
				<input name="q5" type="radio" class="yes" id="q5_1" value="1"   />
				<label for="q5_1"><span></span>Si</label>
			</div>
			<div class="col-sm-4 col-lg-4">
				<input name="q5" type="radio" class="no" id="q5_0" value="0" />
				<label for="q5_0"><span></span>No</label>
			</div>
			<div id="" class="collapse qex col-sm-12 col-lg-12">	
				<input name="q1ex" class="form-control input-lg input-home-doctor" placeholder="Indique">
			</div>			
	    </div>

			<button type="submit" class="btn btn-green btn-lg register-send text-right">
				Siguiete
			</button>
		</div>
		<div class="row eso">
			<br>
		</div>
		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->username['id']; ?>" required>	
	</form>
	<script>addpatient();patient3();progressbar();</script>
</div>