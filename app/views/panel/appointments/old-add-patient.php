<form id="appointments" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="3" data-stepfoward="4" action="" novalidate="novalidate" method="post" class="light-form stepform1">
	<!--extra data-->
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
	<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>

	<input type="hidden"  name="practice" 	  value="<?php echo $this->tempdata['practice']; ?>">
	<input type="hidden"  name="selectedDate" value="<?php echo $this->tempdata['selectedDate']; ?>">
		
			<button type="button" class="btn btn-default btn-filter"><?php echo $this->tempdata['selectedDate']; ?> 
				<i class="fa fa-close"></i>
			</button>
			<h2 class="text-center text">Indique el nombre del Paciente</h2>
			
			<div class="all-hours list">		
				<div class="col-sm-12 col-lg-12">
					<input name="patient-name" type="text" class="form-control input-lg" placeholder="Nombre o Apellido">
				</div>

				<script id="Timeslot-Template" type="text/x-handlebars-template">
				{{#if date.length}}
					<div class="hours-slider" data-slick='{"slidesToShow": 4 }' >					
					{{#date}}
						{{#block}}
								{{#slots}}
						<div class="column-steps loop-item clickable timehour" data-value="{{time}}" > 
							<h5>{{time}}</h5>							
						</div>
						 {{/slots}}
						    {{/block}}
				  	{{/date}}				  	
				  	</div>

				  	<input type="text"  name="timehour" required>
				  	

				{{else}}
					<?php //$this -> render('app/board/empty'); ?>
				{{/if}}
				</script>				
			</div>

<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
</form>

		<div class="field-wrapper form-inline col-sm-5 col-lg-5">
							
			<div class="col-sm-12 col-lg-12">
				<input name="reason" type="text" class="form-control input-lg input-home-doctor" placeholder="Motivo de la consulta" required="required">
			</div>
	
		</div>		

		<textarea class="col-md-12" name="notes" id="" cols="30" rows="10" placeholder="Notas"></textarea>
		
