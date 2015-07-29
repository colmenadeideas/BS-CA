<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar costos</h2>
	
	<form id="cost" action="" novalidate="novalidate" method="post" class="light-form">
		
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label for="reason" class="placeholder">Razon de la consulta</label>
			<input type="text" name="reason" placeholder="Razon de la consulta" required="required" class="form-control input-lg signinput">
		</div>
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label for="cost" class="placeholder">Costo e la consulta</label>
			<input style="width: auto; display: inline;" type="text" maxlength="8" size="7" name="cost" placeholder="Costo" required="required" class="form-control input-lg signinput"><h3 style="display: inline;">BsF</h3>
		</div>
		<div class="field-wrapper form-inline col-sm-12 col-lg-12">
			<div class="col-sm-12 col-lg-12 text">
				Indique la duracion estimada de la consulta
			</div>				 
		</div>
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label for="" class="placeholder">Duracion estimada</label>
			<input id="time-lapse-cost" data-format="hh:mm" placeholder="HH:MM" class="time-lapse form-control input-lg smaller" type="text" name="time-lapse"/>		
		</div>
		<div class="col-sm-12 col-lg-12 text-right">
			<button type="submit" class="btn btn-green btn-lg register-send">
				GUARDAR <i class="fa fa-check"></i>
			</button>
		</div>
			
		
		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->username['id']; ?>" required>
		
	</form>
	<div class="hidden-message">

		<h3 class="text-center forms">Su practica se ha guardado con exito</h3>
		<div style="display:table;margin:auto;">
		<button class="btn btn-green btn-lg register-send"><a href="panel/practice/add">Agregar otra</a> </button>
		<button class="btn btn-green btn-lg register-send"><a href="panel/practice/list">Volver a inicio</a> </button>
		</div>
	</div>
	
	
</div>
<div class="col-lg-2 col-sm-2"></div>