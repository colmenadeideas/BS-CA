<div class="field-wrapper form-inline col-sm-12 col-lg-12">
	<div class="col-sm-12 col-lg-12 text">
		Complete para agregar los formatos de su consulta
	</div>
	
	<div class="practice-format col-sm-12 col-lg-12">
		<div class="col-sm-12 col-lg-12 text">
			El paciente Juan viene por 
			<input type="text" name="reason[]" placeholder="Motivo de la consulta" required="required" class="form-control input-lg signinput"> cancelará 
			<input style="width: auto; display: inline;" type="text" maxlength="8" size="7" name="price[]" placeholder="Costo" required="required" class="form-control input-lg signinput"><h3 style="display: inline;">Bs F</h3> 
			y durará 
			<input id="time-lapse" data-format="hh:mm" placeholder="HH:MM" maxlength="5" class="time-lapse form-control input-lg smaller" type="text" name="time[]"/>
			min aprox en consulta
		</div>		
		<div class="remove-action col-lg-12 col-xs-12 text-right" style="display:none">
			<a href="#" class="wrap-action remove-reason">
				<span class="button-instruction">Eliminar </span> <span class="btn-action btn-delete">+</span>
			</a>
		</div>
		

	</div>

	<div id="reasons">
	</div>
</div>

<div class="add-action col-lg-12 col-xs-12 text-right">
	<a id="add-reason" href="#" class="wrap-action add-reason">
		<span class="button-instruction">Agregar otro servicio</span> <span class="btn-action btn-add">+</span>
	</a>
</div>
