			  		<fieldse class="text-center place-book">
								<h2>¿DONDE QUIERES PEDIR TU CITA?</h2>
								
								
								   
								<div id="wrapper" class="looper">
									<div id="practices-loop">
										{{practice}}
								      
									       <div class="column-steps practice-item">
									       	  <h4>{{name}} {{#}} {{##}}</h4>
									       	  
									       	  <img src="<?php echo IMG;?>icon-okidoc-hospital.png" class="img-responsive" alt="{{name}}" />
									       	  <div class="dates-available">
									       	  
									       	  	<div>
									       	  	
									       	  	{{if schedule}}
										       	  	{{schedule}}
										       	  	
													    <div class="text-right date-resume">
													    	<div class="left weekday">{{day}}&nbsp;</div>
													    	<div class="left hours-day">{{ini_schedule}}-{{end_schedule}}</div>
													    	&nbsp;
													    </div>
													    
													    <div class="text-right date-resume2">
													    	<div class="left weekday">{{day}}&nbsp;</div>
													    	<div class="left hours-day">{{ini_schedule}}-{{end_schedule}}</div>
													    	&nbsp;
													    </div>
										       	  	{{/schedule}}
									       	  	{{/if}}
									       	  	</div>
									       	  </div>
									       	  
											</div>
											<div class="column-steps practice-item">
									       	  <h4>{{name}} {{#}} {{##}}</h4>
									       	  
									       	  <img src="<?php echo IMG;?>icon-okidoc-hospital.png" class="img-responsive" alt="{{name}}" />
									       	  <div class="dates-available">
									       	  
									       	  	<div>
									       	  	
									       	  	{{if schedule}}
										       	  	{{schedule}}
										       	  	
													    <div class="text-right date-resume">
													    	<div class="left weekday">{{day}}&nbsp;</div>
													    	<div class="left hours-day">{{ini_schedule}}-{{end_schedule}}</div>
													    	&nbsp;
													    </div>
													    
													    <div class="text-right date-resume2">
													    	<div class="left weekday">{{day}}&nbsp;</div>
													    	<div class="left hours-day">{{ini_schedule}}-{{end_schedule}}</div>
													    	&nbsp;
													    </div>
										       	  	{{/schedule}}
									       	  	{{/if}}
									       	  	</div>
									       	  </div>
									       	  
											</div>
																						
											
								      	
								      {{/practice}}
									</div>
									<a id="handler-back-practice" class="goback" href="#"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
									<a id="handler-fowr-practice" class="gofoward" href="#"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>									
								</div>
							<input type="button" name="previous" class="previous action-button" value="Previous" />
    						<input type="button" name="next" class="next action-button" value="Next" />
							</fieldset>