
<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Práctica</h2>


<style type="text/css">
/*form styles*/
.stepform h3 { background:#999; padding: 10px 0; color: #FCFCFC}
.stepform {	text-align: center;	position: relative; }
.stepform fieldset {

	border: 0 none;
	padding: 20px 30px;	
	box-sizing: border-box;
	/*width: 100%;
	margin: 0 5%;*/
	/*stacking fieldsets above each other*/
	position: absolute;
}
/*Hide all except first fieldset*/
.stepform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
.add-on { margin: -42px 10px 0 0; }
.stepform input, .stepform textarea {	border-radius: 3px;	margin-bottom: 10px;	font-size: /*13px*/ 100%; color: #333; }
.stepform textarea { padding: 15px; }

/*buttons*/
.stepform .action-button {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
.stepform .action-button:hover, .stepform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
	
}
#progressbar li {
	list-style-type: none;
	color: #FFF;
	font-size: 75%;
	font-weight: 600;
	width: 20%;
	float: left;
	position: relative;
	
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 25px;
	line-height: 25px;
	display: block;
	font-size: 10px;
	color: #B9B9B9;
	background: #E4E4E4;
	border-radius: 15px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 25px;
	background: #E4E4E4;
	position: absolute;
	left: -50%;
	top: 0px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #4E92F6;
	color: white;
}

</style>

		<form id="add" action="" novalidate="novalidate" method="post" class="light-form stepform">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active"></li>
				<li></li>
				<li></li>
			</ul>
		 	
		 	<!-- PASO 1 -->
		 	<fieldset data-step="1" data-content="address" >
		 		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->username['id']; ?>" required>

		 		<div class="field-wrapper form-inline col-sm-12 col-lg-12">
					<div class="col-sm-12 col-lg-12 text">
						¿Está ubicado en una Clinica, Hospital o Centro Médico?
					</div>
					<div class="col-sm-6 col-lg-6">
						<input name="isclinic" type="radio" class="isclinic" id="isclinic1" required value="1" />
						<label for="isclinic1"><span></span>Si</label>
					</div>
					<div class="col-sm-6 col-lg-6">
						<input name="isclinic" type="radio" class="isclinic" id="isclinic2" value="0" />
						<label for="isclinic2"><span></span>No</label>
					</div>			
	    		</div>
			    <div id="clinic-address" class="collapse col-sm-12 col-lg-12">	
					<input name="clinic" class="form-control input-lg input-home-doctor" placeholder="Nombre de la Clínica, Hospital..." required="required">
					<input name="clinic_id" type="hidden">					 	
				</div>
				<div id="regular-address" class="collapse col-sm-12 col-lg-12">	
					<textarea name="address" id="address"  class="form-control input-lg input-home-location" 
					placeholder="Dirección" required="required" autocomplete="off"></textarea>
					<input name="address_location" type="hidden"><input name="address_url" type="hidden">					 	
				</div>
				<div class="text-right col-sm-12 col-lg-12 button-area">
					<input type="button" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
				</div>
				
        	</fieldset>
		 	<!-- PASO 2-->
			<fieldset data-step="1" data-content="days" >
				<div class="field-wrapper form-inline col-sm-12 col-lg-12">
					<div class="col-sm-12 col-lg-12 text">
						Indique los días y horarios de su Consulta
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
								<input type="checkbox" value="LUN" id="day_1" name="day" class="day">
								<label for="day_1"></label>
							</div></td>
							<td>
							<div class="checkbox">
								<input type="checkbox" value="MAR" id="day_2" name="day" class="day">
								<label for="day_2"></label>
							</div></td>
							<td>
							<div class="checkbox">
								<input type="checkbox" value="MIE" id="day_3" name="day" class="day">
								<label for="day_3"></label>
							</div></td>
							<td>
							<div class="checkbox">
								<input type="checkbox" value="JUE" id="day_4" name="day" class="day">
								<label for="day_4"></label>
							</div></td>
							<td>
							<div class="checkbox">
								<input type="checkbox" value="VIE" id="day_5" name="day" class="day">
								<label for="day_5"></label>
							</div></td>
							<td>
							<div class="checkbox">
								<input type="checkbox" value="SAB" id="day_6" name="day" class="day">
								<label for="day_6"></label>
							</div></td>
							<td>
							<div class="checkbox">
								<input type="checkbox" value="DOM" id="day_7" name="day" class="day">
								<label for="day_7"></label>
							</div></td>

						</tr>
						<tr>
							<td>Desde:</td>
							<td>
								<div class="input-group collapse div_schedule_1">
									<label for="ini_schedule_1" class="placeholder"></label>
									<input id="ini_schedule_1" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_1"/>	
								</div>			     
							</td>
							<td>
								<div class="input-group collapse div_schedule_2">
						        	<label for="ini_schedule_2" class="placeholder"></label>
									<input id="ini_schedule_2" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_2"/>
						        </div>
						    </td>
							<td>
								<div class="input-group collapse div_schedule_3">
									<label for="ini_schedule_3" class="placeholder"></label>
									<input id="ini_schedule_3" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_3"/>	
								</div>				     
							</td>
							<td>
								<div class="input-group collapse div_schedule_4">
									<label for="ini_schedule_4" class="placeholder"></label>
									<input id="ini_schedule_4" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_4"/>	
								</div>				     
							</td>
							<td>
								<div class="input-group collapse div_schedule_5">
									<label for="ini_schedule_5" class="placeholder"></label>
									<input id="ini_schedule_5" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_5"/>	
								</div>				     
							</td>
							<td>
								<div class="input-group collapse div_schedule_6">
									<label for="ini_schedule_6" class="placeholder"></label>
									<input id="ini_schedule_6" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_6"/>	
								</div>				     
							</td>
							<td>
								<div class="input-group collapse div_schedule_7">
									<label for="ini_schedule_7" class="placeholder"></label>
									<input id="ini_schedule_7" class="timepicker form-control input-lg smaller" type="text" name="ini_schedule_7"/>		
								</div>			     
							</td>				
							
						</tr>
						<tr>
							<td>Hasta:</td>
							<td>
								<div class="input-group collapse div_schedule_1">
									<label for="end_schedule_1" class="placeholder">Hasta</label>
									<input id="end_schedule_1" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_1"/>		
								</div>	
							</td>
							<td>
								<div class="input-group collapse div_schedule_2">
									<label for="end_schedule_2" class="placeholder">Hasta</label>
									<input id="end_schedule_2" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_2"/>		
								</div>	
							</td>
							<td>
								<div class="input-group collapse div_schedule_3">
									<label for="end_schedule_3" class="placeholder">Hasta</label>
									<input id="end_schedule_3" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_3"/>		
								</div>	
							</td>
							<td>
								<div class="input-group collapse div_schedule_4">
									<label for="end_schedule_4" class="placeholder">Hasta</label>
									<input id="end_schedule_4" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_4"/>		
								</div>	
							</td>
							<td>
								<div class="input-group collapse div_schedule_5">
									<label for="end_schedule_5" class="placeholder">Hasta</label>
									<input id="end_schedule_5" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_5"/>		
								</div>	
							</td>
							<td>
								<div class="input-group collapse div_schedule_6">
									<label for="end_schedule_6" class="placeholder">Hasta</label>
									<input id="end_schedule_6" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_6"/>		
								</div>	
							</td>
							<td>
								<div class="input-group collapse div_schedule_7">
									<label for="end_schedule_7" class="placeholder">Hasta</label>
									<input id="end_schedule_7" class="timepicker form-control input-lg smaller" type="text" name="end_schedule_7"/>		
								</div>	
							</td>
						</tr>
						
						
					</table>
				</div>
				<div class="text-right col-sm-12 col-lg-12 button-area">
					<input type="button" name="previous" class="previous btn" value="Anterior">
					<input type="button" name="next" class="next btn btn-info btn-lg" value="Continuar" >
					<!--button type="submit" class="btn btn-green btn-lg register-send">
						GUARDAR <i class="fa fa-check"></i>
					</button-->
				</div>			
          
       
		
		
		--- schedule
		day
		ini_schedule
		end_schedule
		quota
		
		--schedule_intervals_matrix
		consultation_reason
		initial_interval
		price

		
		
		
					        
		                
		 	</fieldset>
		 	<!-- PASO 3 -->
			<fieldset>

				<?php $this->render('panel/practices/add-quote'); ?>
		    	<div class="text-right col-sm-12 col-lg-12 button-area">
					<input type="button" name="previous" class="previous btn" value="Anterior">
					<input type="button" name="next" class="next btn btn-info btn-lg" value="Continuar" >					
				</div>
		    </fieldset>
		    <!-- PASO 4 -->
		    <fieldset>
				
		            <input type="submit" name="submit" class="btn btn-success send" value="Listo!">
		                    
		    </fieldset>
		 
	
<!----
--_--
-->


		
		
		
		
	</form>
	<div id="response" class="col-lg-offset-3 col-xs-offset-3 col-lg-6 col-xs-6 registration-response"></div> 

	<!--div class="hidden-mesage"><h2 class="text-center forms">Su practica de ha guardado con exito</h2></div-->
	
</div>
<div class="col-lg-2 col-sm-2"></div>