<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Cita</h2>
	
	<div id="stepform">	
		<form id="appointments" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="0" data-stepfoward="2" action="" novalidate="novalidate" method="post" class="light-form stepform1">
			<!--extra data-->
			<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
			<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>
			<h2 class="text-center text">¿Dónde deseas agregar la cita?</h2>
			<div class="all-practices list">		
				<script id="Practice-Template" type="text/x-handlebars-template">
				{{#if practice.length}}
					<div class="practices-slider" data-slick='{"slidesToShow": 3 }'>
					
					{{#practice}}
						<div class="column-steps loop-item clickable practice"  id="practice-{{id}}" data-value="{{id}}">
							<img src="<?php echo IMG; ?>icon-okidoc-hospital.png" class="img-responsive" alt="{{name}}">
							<h5>{{name}}</h5>

							<div class="hours-day">
								{{#schedule}}
						         <span class="weekday">{{day}}</span> {{formatTime ini_schedule}} - {{formatTime end_schedule}}
						        {{/schedule}}
							</div>
						</div>
				  	{{/practice}}
				  	<input type="hidden"  name="practice" required>
				  	</div>
				{{else}}
					<?php //$this -> render('app/board/empty'); ?>
				{{/if}}
				</script>				
			</div>
		</form>
	</div>
</div>