<script id="item-card-list" type="text/template">
	<div id="search" class="results-wrapper">	
		<div class="container cards-list">
				{{doctors}}
			<div class="col-lg-4 col-md-4 columna">
				<div id="results-doctor-{{#}}" class="item-card">
					<div class="item-card-header">
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
						<div class="item-head {{specialty}}">
							<h1>{{name}}</h1>
							<h4>{{specialty}}</h4>
							<div class="col-lg-12 col-md-12">
								<input id="doctor-rating-{{#}}" class="rating" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
							</div>					
						</div>
					</div>	
					<div id="collapse-{{#}}" class="info panel-collapse collapse in">
						&nbsp;
					{{if practice}}
						{{practice}}
						<div class="clinics-list container-fluid">
							<div class="col-md-5 clinic-name"> <h4>{{name}}</h4></div>

								{{if schedule}}
									{{schedule}}
										<div class="col-md-1 day-n">
											<h4>{{day}}</h4>
											<p class="placeholder">DIA</p>
										</div>
										<div class="col-md-3">
											<h4>{{ini_schedule}}</h4>
											<p class="placeholder">DESDE</p>
										</div>
										<div class="col-md-3">
											<h4>{{end_schedule}}</h4>
											<p class="placeholder">HASTA</p>
										</div>
									{{/schedule}}
								{{/if}}
							
						</div>
						{{/practice}}
					{{/if}}
					</div>
					
					<div class="col-md-12 item-card-footer" onload="he()">					
						
							<a class="btn btn-default btn-moreinfo right" href="#doctor/details/{{id}}">
								<?php echo SITE__SEE_MORE; ?> <i class="fa fa-plus"></i>
							</a>
							<button type="button" class="btn btn-default btn-book right">
								<?php echo SITE__BOOK_APPOINTMENT; ?>
							</button>
					</div>
					<div class="clearfix"></div>
				</div>
			</div> 
			{{/doctors}}
		</div>
	</div>
</script>