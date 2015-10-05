<style>
.progressbar { 
    -webkit-animation-name: fadeOutUp; 
    animation-name: fadeOutUp; 
}
</style>
<form id="patient" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="4" data-stepfoward="4" action="" novalidate="novalidate" method="post" class="light-form stepform1 animated fadeInUp">

	<div class="practice-sheet">

		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
		<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required >
		<div class="col-sm-12 col-lg-12">
			<div class="col-lg-5 col-md-5 nopadding">
				<div class="field-wrapper col-sm-12 col-lg-12">
					<img src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle">  
				</div>
				<div class="field-wrapper col-sm-4 col-lg-4">
					<label style="display:block" for="age" class="placeholder"></label>
					<input  style="width:100px; display:inline;" type="number" min="1" max="100" maxlength="3" name="age" value="<?php echo $this->tempdata['age']; ?>" size="3" required="required" class="form-control bfh-number">
					<span class="sidetext">años</span>
				</div>
				<div class="field-wrapper col-sm-4 col-lg-4 form-inline">
					<label style="display:block" for="height" class="placeholder"></label>
					
					<input  style="width:100px; display:inline;" type="text"  maxlength="4" name="height" value="<?php echo $this->tempdata['height']; ?>" size="3" required="required" class="form-control bfh-number">
					<span class="sidetext">mts</span>
				</div>
				<div class="field-wrapper col-sm-4 col-lg-4 form-inline">		
					<input  style="width:100px; display:inline;" type="number" min="1" max="300" maxlength="3" name="weight" value="<?php echo $this->tempdata['weight']; ?>" size="3" required="required" class="form-control bfh-number">
					<span class="sidetext">Kg</span>
				</div>

				

				<div class="field-wrapper col-sm-12 col-lg-12 inlineradio">
					<!-- <span class="sidetext">Sexo</span> -->
					<input name="gender" type="radio" class="gender" id="gender1" required 
					<?php if ($this->tempdata['gender'] == "M") { echo ' checked ="checked"'; } ?> value="M"  />
					<label for="gender1"><span></span>Hombre</label>

					<input name="gender" type="radio" class="gender" id="gender2" required 
					<?php if ($this->tempdata['gender'] == "F") { echo ' checked ="checked"'; } ?> value="F" />
					<label for="gender2"><span></span>Mujer</label>
				</div>
				<div class="field-wrapper col-sm-12 col-lg-12 inlineradio">
					<span class="sidetext">Tipo de Sangre</span><br>
					<input name="blood-type" type="radio" class="blood-type" id="blood-type1" required 
					<?php if ($this->tempdata['blood-type'] == "A") { echo ' checked ="checked"'; } ?> value="A"  />
					<label for="blood-type1"><span></span>A</label>		
					
					<input name="blood-type" type="radio" class="blood-type" id="blood-type2" required 
					<?php if ($this->tempdata['blood-type'] == "B") { echo ' checked ="checked"'; } ?> value="B" />
					<label for="blood-type2"><span></span>B</label>

					<input name="blood-type" type="radio" class="blood-type" id="blood-type3" required 
					<?php if ($this->tempdata['blood-type'] == "AB") { echo ' checked ="checked"'; } ?> value="AB" />
					<label for="blood-type3"><span></span>AB</label>		
					
					<input name="blood-type" type="radio" class="blood-type" id="blood-type4" required 
					<?php if ($this->tempdata['blood-type'] == "O") { echo ' checked ="checked"'; } ?> value="O" />
					<label for="blood-type4"><span></span>O</label>
					<div class="clearfix"></div>
					<div class="inlineradio">
						<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol1" required 
						<?php if ($this->tempdata['blood-symbol'] == "+") { echo ' checked ="checked"'; } ?> value="+"  />
						<label for="blood-symbol1"><span></span>+</label>
						
						<input name="blood-symbol" type="radio" class="blood-symbol" id="blood-symbol3" required 
						<?php if ($this->tempdata['blood-symbol'] == "-") { echo ' checked ="checked"'; } ?> value="-" />
						<label for="blood-symbol3"><span></span>-</label>
					</div>			
				</div>




			</div>
			<div id="right-side-card" class="col-lg-7 col-md-7 nopadding">
				
				<!--Step2 (add-physical-data) -->			
				<h4 class="division text-right">Datos Físicos</h4>
				<div class="col-sm-6 col-lg-6">
					<input name="name" type="text" value="<?php echo $this->tempdata['name']; ?>" class="form-control input-lg input-home-doctor" placeholder="Nombres" >
				</div>
				<div class="col-sm-6 col-lg-6">
					<input name="lastname" type="text" value="<?php echo $this->tempdata['lastname']; ?>" class="form-control input-lg input-home-doctor" placeholder="Apellidos" >
				</div>
				<div class="col-sm-6 col-lg-6">
					<input name="cedula" type="text" value="<?php echo $this->tempdata['cedula']; ?>" class="form-control input-lg input-home-doctor" placeholder="Cédula" >
				</div>
				<div class="col-sm-6 col-lg-6">
					<input name="birth" type="text" value="<?php echo $this->tempdata['birth']; ?>" class="form-control input-lg input-home-doctor" placeholder="Fecha de Nacimiento" >
				</div>	
				<div class="col-sm-6 col-lg-6">					
					<input name="cellphone" type="text" value="<?php echo $this->tempdata['cellphone']; ?>"class="form-control input-lg input-home-doctor" placeholder="Teléfono Móvil" >
				</div>
				<div class="col-sm-6 col-lg-6">
					<input name="phone" type="text" value="<?php echo $this->tempdata['phone']; ?>" class="form-control input-lg input-home-doctor" placeholder="Teléfono Habitación" >
				</div>
				<div class="col-sm-12 col-lg-12">
					<input name="email" type="text" value="<?php echo $this->tempdata['email']; ?>" class="form-control input-lg input-home-doctor" placeholder="Email" >
				</div>

				<textarea name="address" id="address"  class="form-control input-lg input-home-location" 
				placeholder="Dirección" autocomplete="off"></textarea>
				<input name="address_location" type="hidden"><input name="address_url" type="hidden">


				<h4 class="division text-right">Horario</h4>
				<div class="field-wrapper form-inline col-sm-12 col-lg-12">
					<div class="col-sm-6 col-lg-6 text text-right">
						¿Ha sido operado alguna vez?
					</div>
					<div class="col-sm-6 col-lg-6 inlineradio">
						<input name="extra1" type="radio" class="extra1" id="extra1_1" required 
						<?php if ($this->tempdata['extra1'] == "1") { echo ' checked ="checked"'; } ?> value="1"  />
						<label for="extra1_1"><span></span>Si</label>			

						<input name="extra1" type="radio" class="extra1" id="extra1_2" required 
						<?php if ($this->tempdata['extra1'] == "0") { echo ' checked ="checked"'; } ?> value="0" />
						<label for="extra1_2"><span></span>No</label>
					</div>			
				</div>
				<div class="field-wrapper form-inline col-sm-12 col-lg-12">
					<div class="col-sm-6 col-lg-6 text text-right">
						¿Toma algún medicamento?
					</div>
					<div class="col-sm-6 col-lg-6 inlineradio">
						<input name="extra2" type="radio" class="extra2" id="extra2_1" required 
						<?php if ($this->tempdata['extra2'] == "1") { echo ' checked ="checked"'; } ?> value="1"  />
						<label for="extra2_1"><span></span>Si</label>			

						<input name="extra2" type="radio" class="extra2" id="extra2_2" required 
						<?php if ($this->tempdata['extra2'] == "0") { echo ' checked ="checked"'; } ?> value="0" />
						<label for="extra2_2"><span></span>No</label>
					</div>			
				</div>

				<div class="clearfix"></div>
			

			</div>
		</div>


		
	</div>
	<div>
		<div class="col-sm-6 col-lg-6 nopadding">
			<input type="button" name="cancel" value="cancel" class="btn btn-lg btn-cancel" onClick="window.location='#'" />

		</div>
		<div class="col-sm-6 col-lg-6 nopadding">
			<button type="submit" name="next" class="next btn btn-success btn-confirm btn-lg"><i class="fa fa-check"></i> Crear</button>
			<input type="submit" name="next" class="next btn btn-success btn-lg" value="Crear" > 
			<!-- <input type="submit" name="next" class="next btn btn-success btn-confirm btn-lg" value="Crear" >  -->
		</div>
	</div>



	<!-- <div class=" col-sm-12 col-lg-12 button-area text-right">
		<input type="submit" name="next" class="next btn btn-success btn-lg" value="Crear" > 
	</div> -->
</div>
</form>


<script type="text/javascript">
	$('#myModal').modal('show');
</script>
<style>
.modal-footer { padding: 0 0 20px; text-align: center; border:none; }
.modal img {margin:auto;}
</style>
<div class="modal fadeq" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      		<div class="col-sm-12 col-lg-12">
        		<div class="col-sm-2 col-lg-2">
        		</div>
        		<div class="col-sm-8 col-lg-8 text-center">
					<img src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle">  
				</div>
				<div class="col-sm-2 col-lg-2">
        		</div>
       		</div>
				<h4 class="text-center forms">Su practica se ha guardado con exito</h4>
				<div class="clearfix"></div>
      </div>
      <div class="modal-footer">
      	<div class="col-sm-6 col-lg-6">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Volver al inicio</button>
        </div>
        <div class="col-sm-6 col-lg-6">
        	<div class="add-action col-lg-12 col-xs-12 text-right">
				<a href="#panel/practice/add" class="wrap-action">
					<span class="button-instruction">Agregar otra Práctica</span> <span class="btn-action btn-add">+</span>
				</a>
			</div>

        	<button type="button" class="btn btn-lg btn-add btn-primary">CREAR CITA PARA ESTE PACIENTE</button>
        </div>
      </div>
    </div>
  </div>
</div>