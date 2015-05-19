
<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Práctica</h2>
	
	<form id="form-add-practice" action="" novalidate="novalidate" method="post" class="light-form">
		
		
		<div class="field-wrapper form-inline col-sm-12 col-lg-12">
			<div class="col-sm-12 col-lg-12 text">
				¿Está ubicado en una Clinica, Hospital o Centro Médico?
			</div>
			<div class="col-sm-6 col-lg-6">
				<input name="isclinic" type="radio" id="isclinic1" value="1" />
				<label for="isclinic1"><span></span>Si</label>
			</div>
			<div class="col-sm-6 col-lg-6">
				<input name="isclinic" type="radio" id="isclinic2" value="0" />
				<label for="isclinic2"><span></span>No</label>
			</div>			
	    </div>
	     <div id="clinic-adress" class="collapse">	
			<input name="clinic" class="form-control input-lg input-home-doctor" placeholder="Nombre de la Clínica, Hospital..." required="required">
			<input name="clinic_id" type="hidden">					 	
		</div>
		 <div id="regular-address" class="collapse">	
			<textarea name="address" class="form-control input-lg input-home-location" 
			placeholder="Dirección" required="required" autocomplete="off"></textarea>
			<input name="address_location" type="hidden"><input name="address_url" type="hidden">					 	
		</div>
        
			
		
		<div class="field-wrapper col-sm-12 col-lg-12">
			<label for="name" class="placeholder"><?php echo SITE__FORM_NAME; ?></label>
			<input type="text" name="name" placeholder="<?php echo SITE__FORM_NAME; ?>" required="required" class="form-control input-lg signinput">
		</div>
		
		<div class="field-wrapper form-inline col-sm-12 col-lg-12">
			<div class="col-sm-12 col-lg-12 text">
				Indique los días disponibles de Consulta
			</div>				 
		</div>
		<div class="field-wrapper form-inline col-sm-12 col-lg-12">
			<table class="table table-nolines text-center">
				<thead>
					<tr>
						<td></td>
						<td>LUN</td>
						<td>MAR</td>
						<td>MIE</td>
						<td>JUE</td>
						<td>VIE</td>
						<td>SAB</td>
						<td>DOM</td>
					</tr>
				</thead>
				<tr>
					<td></td>
					<td>
					<div class="checkbox">
						<input type="checkbox" value="Mon" id="day_1" name="day">
						<label for="day_1"></label>
					</div></td>
					<td>
					<div class="checkbox">
						<input type="checkbox" value="Tue" id="day_2" name="day">
						<label for="day_2"></label>
					</div></td>
					<td>
					<div class="checkbox">
						<input type="checkbox" value="Wen" id="day_3" name="day">
						<label for="day_3"></label>
					</div></td>
					<td>
					<div class="checkbox">
						<input type="checkbox" value="Thu" id="day_4" name="day">
						<label for="day_4"></label>
					</div></td>
					<td>
					<div class="checkbox">
						<input type="checkbox" value="Fri" id="day_5" name="day">
						<label for="day_5"></label>
					</div></td>
					<td>
					<div class="checkbox">
						<input type="checkbox" value="Sat" id="day_6" name="day">
						<label for="day_6"></label>
					</div></td>
					<td>
					<div class="checkbox">
						<input type="checkbox" value="Sun" id="day_7" name="day">
						<label for="day_7"></label>
					</div></td>

				</tr>
				<tr>
					<td>Desde:</td>
					<td>
						<div class="input-group">
							<label for="ini_schedule_1" class="placeholder"></label>
							<input id="ini_schedule_1" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_1"/>	
						</div>			     
					</td>
					<td>
						<div class="input-group">
				        	<label for="ini_schedule_2" class="placeholder"></label>
							<input id="ini_schedule_2" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_2"/>
				        </div>
				    </td>
					<td>
						<div class="input-group">
							<label for="ini_schedule_3" class="placeholder"></label>
							<input id="ini_schedule_3" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_3"/>	
						</div>				     
					</td>
					<td>
						<div class="input-group">
							<label for="ini_schedule_4" class="placeholder"></label>
							<input id="ini_schedule_4" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_4"/>	
						</div>				     
					</td>
					<td>
						<div class="input-group">
							<label for="ini_schedule_5" class="placeholder"></label>
							<input id="ini_schedule_5" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_5"/>	
						</div>				     
					</td>
					<td>
						<div class="input-group">
							<label for="ini_schedule_6" class="placeholder"></label>
							<input id="ini_schedule_6" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_6"/>	
						</div>				     
					</td>
					<td>
						<div class="input-group">
							<label for="ini_schedule_7" class="placeholder"></label>
							<input id="ini_schedule_7" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_7"/>		
						</div>			     
					</td>				
					
				</tr>
				<tr>
					<td>Hasta:</td>
					<td>
						<div class="input-group">
							<label for="end_schedule_1" class="placeholder">Hasta</label>
							<input id="end_schedule_1" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_1"/>		
						</div>	
					</td>
					<td>
						<div class="input-group">
							<label for="end_schedule_2" class="placeholder">Hasta</label>
							<input id="end_schedule_2" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_2"/>		
						</div>	
					</td>
					<td>
						<div class="input-group">
							<label for="end_schedule_3" class="placeholder">Hasta</label>
							<input id="end_schedule_3" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_3"/>		
						</div>	
					</td>
					<td>
						<div class="input-group">
							<label for="end_schedule_4" class="placeholder">Hasta</label>
							<input id="end_schedule_4" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_4"/>		
						</div>	
					</td>
					<td>
						<div class="input-group">
							<label for="end_schedule_5" class="placeholder">Hasta</label>
							<input id="end_schedule_5" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_5"/>		
						</div>	
					</td>
					<td>
						<div class="input-group">
							<label for="end_schedule_6" class="placeholder">Hasta</label>
							<input id="end_schedule_6" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_6"/>		
						</div>	
					</td>
					<td>
						<div class="input-group">
							<label for="end_schedule_7" class="placeholder">Hasta</label>
							<input id="end_schedule_7" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_7"/>		
						</div>	
					</td>
				</tr>
				
				
			</table>
		</div>
	
		
          
        
        
	
		<div class="col-sm-12 col-lg-12 text-right">
			<button type="submit" class="btn btn-green btn-lg register-send">
				GUARDAR <i class="fa fa-check"></i>
			</button>
		</div>
		id_clinic
		max_days_ahead
		manage_time_slots y/n
		
		
		--- schedule
		day
		ini_schedule
		end_schedule
		quota
		
		--schedule_intervals_matrix
		consultation_reason
		initial_interval
		price

		
		
		
		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->username['id']; ?>" required>
		
	</form>
	
	
</div>
<div class="col-lg-2 col-sm-2"></div>