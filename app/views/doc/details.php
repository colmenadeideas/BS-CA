<div id="doc-details">
	<script id="item-details" type="text/template">
		<div class="container">
		{{doctors}}
			<div id="card" class="col-lg-3 col-md-3">
				
				<div class="default-pic">
					<img src="
					{{if image|empty}}
					{{if gender|equals>F}}
					<?php echo IMG; ?>default-female.png
					{{else}}
					<?php echo IMG; ?>default-male.png
					{{/if}}
					{{else}}
					{{image}}
					{{/if}}" class="img-responsive img-circle">
	
				</div>
				
				{{if practice}}
						{{practice}}
						<div class="clinics-list">
							<div class="clinic-name"><i class="fa fa-building-o"></i> {{name}}</div>
							<div class="dates">
								{{if schedule}}
									{{schedule}}
										<div class="day">
											{{day}}
										</div>
										<div class="time">
											{{ini_schedule}}-{{end_schedule}}
										</div>
									{{/schedule}}
								{{/if}}
							</div>
						</div>
						{{/practice}}
					{{/if}}
					
			</div>
			<div id="name" class="col-lg-9 col-md-9">
				<div class="item-head {{specialty}}">
					<h4>{{specialty}}</h4>
					<h1>{{name}}</h1>	
									
				</div>
				
				<div class="col-lg-5 col-md-5">
					<input id="doctor-rating-{{#}}" class="rating" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
				</div>	
				<button type="button" class="btn btn-default btn-book">
					<?php echo SITE__BOOK_APPOINTMENT; ?>
				</button>			
				
			</div>			
			<div id="view" class="col-lg-9 col-md-9">				
				
				<!-- Nav tabs -->
				<ul class="nav nav-tabs doc-menu" role="tablist">
					  <li class="active"><a href="#sumary" role="tab" data-toggle="tab">Detalles</a></li>
					  <li><a href="#calendar" role="tab" data-toggle="tab">Disponibilidad</a></li>
					  <li><a href="#contact" role="tab" data-toggle="tab">Contacto</a></li>
				</ul>
				
				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane fade in active" id="sumary">...</div>
				  <div class="tab-pane fade" id="calendar">...</div>
				  <div class="tab-pane fade" id="contact">...</div>
				</div>
				
				
			</div>
			{{/doctors}}
		</div>
	</script>
</div>
