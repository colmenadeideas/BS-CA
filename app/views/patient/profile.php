<div class="col-lg-12 text-center patient-profile nopadding">
	<script id="Patient-Profile-Template" type="text/x-handlebars-template">
		{{#patient}}
			<img src="
				{{#ifEquals gender 'F'}}
				    <?php echo IMG; ?>default-female.png
				{{else}}
				    <?php echo IMG; ?>default-male.png
				{{/ifEquals}}							
				" class="img-responsive img-circle img-profile    profile-pic">
			
			<h1>{{name}} {{lastname}}</h1>

			<div class="col-lg-12 col-md-12 col-sm-12 physical-data">	
					
					<div class="col-lg-1 col-md-1 col-sm-1"></div>
					<div class="data-slider col-lg-10 col-md-10 col-sm-10" data-slick='{"slidesToShow": 4 }'>					
					
						<h4>O+<br>
							<small>SANGRE</small>
						</h4>
						<h4>1,50 M <br>
							<small>ESTATURA</small>
						</h4>
						<h4>25 Años<br>
							<small>EDAD</small>
						</h4>
						<h4>76 KG <br>
							<small>PESO</small>
						</h4>
						<h4>GLUTEN <br>
							<small>ALERGIA</small>
						</h4>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1"></div>			

			</div>
			
			<div class="col-lg-12 menubar-action book-menu nopadding" >
				<ul class="nav nav-tabs profile-nav" role="tablist" >
					<li class="col-lg-3 col-md-3 col-sm-3 nopadding">
						<a href="#data" role="tab" data-toggle="tab">Datos</a>
					</li>
					<li class="col-lg-3 col-md-3 col-sm-3 nopadding">
						<a href="#activity" role="tab" data-toggle="tab">Eventos</a>
					</li>
					<li class="col-lg-3 col-md-3 col-sm-3 nopadding">
						<a href="#indications" role="tab" data-toggle="tab">Indicaciones</a>
					</li>
					<li class="col-lg-3 col-md-3 col-sm-3 nopadding">
						<a href="#messages" role="tab" data-toggle="tab">Mensajes</a>
					</li>

				</ul>
			</div>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane fade" id="data">
				Data
						<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>
						<h4><?php echo "Telefono: ".$patient[0]['phone'] ?></h4>
						<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>	
						<h4><?php echo "Num Doc ID: ".$patient[0]['id_card'] ?></h4>
						<h4><?php echo "Fecha de nacimiento: ".$patient[0]['birth'] ?></h4>
						<h4><?php echo "Correo: ".$patient[0]['email'] ?></h4>
				</div>
				<div class="tab-pane fade" id="activity" style="margin-bottom:10%;">
				</div>
				<div class="tab-pane fade " id="indications">
				</div>
				<div class="tab-pane fade active in" id="messages">
			</div>

{{#practice}}			
				{{#schedule}}
				<div class="schedule-hours">
		         <span class="weekday">{{day}}</span> {{scheduleFormat ini_schedule end_schedule}}
		     	</div>
		        {{/schedule}}
			{{/practice}}
			
			
		{{/patient}}	
	</script>
</div>

	<!-- 
{{#history}}
						<div class="column-steps loop-item clickable practice"  id="practice-{{id}}" data-value="{{id}}">
							<img src="<?php echo IMG; ?>icon-okidoc-hospital.png" class="img-responsive" alt="{{name}}">
							<h4>{{name}}</h4>

							<div class="hours-day">
								{{#schedule}}
								<div class="schedule-hours">
						         <span class="weekday">{{day}}</span> {{scheduleFormat ini_schedule end_schedule}}
						     	</div>
						        {{/schedule}}
							</div>
						</div>
					{{/history}}
					{{else}}
					<?php //$this -> render('app/board/empty'); ?>
				{{/if}} -->



