<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Gestion de cupos por dia</h2>
	
	<form id="quote" action="" novalidate="novalidate" method="post" class="light-form">
		
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label style="display:block" for="reason" class="">Maximo de dias de reservacion</label>
			<input  style="width:100px; display:inline;" type="number" min="1" max="365" maxlength="3" name="max_days" value="7" size="3" required="required" class="form-control bfh-number"><h3 style="display: inline;">Dia(s)</h3>
		</div>
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label style="display:block" for="cost" class="">Numero de cupos por dia</label>
			<input style="width: 100px; display: inline;" type="number" min="1" max="40" maxlength="2" size="7" name="all_days_spots" value="5"  required="required" class="form-control spots">
			<div style="margin-left:30px" class="checkbox-inline">
				<label><input id="auto-spots" type="checkbox" value="" checked>Administrar cupos automaticamente</label>
			</div>			
		</div>
		<div class="practice-list collapse">
			
		</div>

		<div class="col-sm-12 col-lg-12 text-right">
			<button type="submit" class="btn btn-green btn-lg register-send">
				GUARDAR <i class="fa fa-check"></i>
			</button>
		</div>
			
		
		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->username['id']; ?>" required>
		
	</form>

	
	
</div>
<div class="col-lg-2 col-sm-2"></div>