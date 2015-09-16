<h2 class="text-center forms">Resgistro de Pacientes</h2>
<div class="progressbar-container col-lg-12 col-sm-12" >
	<!-- progressbar -->
	<ul class="progressbar">
		<li>Informacion general</li>
		<li>Datos esenciales</li>
		<li>Observaciones</li>
	</ul>
</div>
<div class="inn col-lg-8 col-sm-8">
	<div class="col-sm-2"></div>
	<form id="patient" action="" novalidate="novalidate" method="post" class="light-form col-sm-12 step" step="1">	
		<div class="field-wrapper col-sm-5 col-lg-5">
			<label for="name" class="placeholder">Nombre</label>
			<input type="text" size="18" name="name" placeholder="Nombre" fequired="fequired" class="form-control input-lg signinput ">
		</div>
		<div class="field-wrapper col-sm-5 col-lg-5">
			<label for="name" class="placeholder">Apellido</label>
			<input type="text" size="18" name="lastname" placeholder="Apellido" fequired="fequired" class="form-control input-lg signinput ">
		</div>
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label for="id" class="placeholder">C.I.</label>
			<input type="text" size="9" name="id" placeholder="C.I." fequired="fequired" class="form-control input-lg signinput bfixed">
		</div>
		<div class="field-wrapper col-sm-10 col-lg-10">
			<label for="e-mail" class="placeholder">Correo</label>
			<input type="email" size="24" name="e-mail" placeholder="Correo" fequired="fequired" class="form-control input-lg signinput ">
		</div>
		<div class="field-wrapper col-sm-10 col-lg-10">
			<label for="e-mail" class="placeholder">Connfirme el correo</label>
			<input type="email" size="24" name="e-mail" placeholder="Confirme su correo" fequired="fequired" class="form-control input-lg signinput ">
		</div>
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label for="adress" class="placeholder">Direccion</label>
			<input type="text" name="adress" placeholder="Direccion" fequired="fequired" class="form-control input-lg signinput">
		</div>
		<div class="col-sm-12 col-lg-12">
			<button type="submit" class="btn btn-green btn-lg register-send text-right">
				Siguiete
			</button>
		</div>
		<div class="row eso">
		<br>
		</div>

		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->username['id']; ?>" fequired>	
	</form>
	<script>addpatient();progressbar();</script>
</div>

