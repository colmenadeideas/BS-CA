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