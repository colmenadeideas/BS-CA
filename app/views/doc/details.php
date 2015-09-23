
		<style>
		
		
		.column-steps {/*position: relative;
min-height: 1px;
padding-right: 15px;
padding-left: 15px;*/
		 width:260px; float: left;
}


.reason-item { background: #FFF;color: #999; 
border: solid 1px #CCC;
box-shadow: 0 0 10px rgba(0,0,0,0.1);
font-weight: 800 !important;border-radius: 15px;margin: 0 10px;padding: 20px 10px; text-align: center}
		


/*basic reset*/
/*form styles*/
#msform {	text-align: center;/*	position: relative;*/}
#msform fieldset {
	padding: 20px 30px;
	width: 100%;
/*	display:none;*/
	visibility:hidden;
	overflow:hidden
}
.activestep { visibility:visible !important }

.calendar-item { background: #009EFC;color: #FFF;font-weight: 800 !important;border-radius: 15px;margin: 0 10px;padding: 20px 10px; text-align: center}

/*#msform fieldset {
	/*background: #FFF;*/
	/*border: 0 none;
	padding: 20px 30px;	
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;*/
	
	/*stacking fieldsets above each other*/
	/*position: absolute;*/
/*}*/
/*Hide all except first fieldset*/
/*#msform fieldset:not(:first-of-type) {	display: none;}*/
/*inputs*/
#msform input, #msform textarea {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#msform .action-button {
	width: 140px;
	background: none;
	font-weight: 400;
	text-transform: uppercase;
	color: #999;
	border: solid 2px #999;
	border-radius: 20px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
	
	
padding: 10px 20px;
font-size: 95%;
letter-spacing: 1px;
}
#msform .action-button:hover, #msform .action-button:focus {
	color: #FFF;
	background-color: #2C72BD;
	border-color: #2C72BD;
	
	box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
}



/*progressbar*/
#progressbar {
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
	width: 500px;
	margin: auto;
	padding: 10px;
	border-radius: 15px;
	background: #FFF;
	border-radius: 40px;
}
#progressbar li {
	list-style-type: none;
	width: 25%;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
	border-radius: 10px;
}
	
#msform .choose-this {
	width: 140px;
	background: none;
	font-weight: 400;
	text-transform: uppercase;
	color: #999;
	border: solid 2px #999;
	border-radius: 20px;
	cursor: pointer;
	margin: 10px 5px;	
	padding: 10px 20px;
	font-size: 95%;
	letter-spacing: 1px;
	}
	

#msform .choose-this:hover, #msform .choose-this:focus {
	color: #FFF;
	background-color: #45CFCB;
	border-color: #45CFCB;	
	box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
}

#calendar-loop h4 { font-size:400%; font-weight:100}
#calendar-loop h5 { color:white;font-weight: 100;font-size: 200%;letter-spacing: 1px;text-transform: uppercase;}
.date-resume2 {
    margin-left: 50px;
    display: inline-block;
    padding: 10px;
    color: white;
    background-color: #009EFC;
    border-radius: 20px;
}
.hcontainer{
	margin: auto;
	width: 80%;
	text-align: center;
}
.hcontainer h4{
	margin-bottom: 30px; 
}



		</style>
		
<div id="doc-details">
	
	<script id="item-details" type="text/template">
		{{doctors}}
		
				
		<div class="container">
			<div class="col-lg-3">
					<img src="
					{{if image|empty}}
					{{if gender|equals>F}}
					<?php echo IMG; ?>default-female.png
					{{else}}
					<?php echo IMG; ?>default-female.png
					{{/if}}
					{{else}}
					{{image}}
					{{/if}}" class="img-responsive img-circle img-profile">
	
			</div>
			<div class="col-lg-9">
				<div class="col-lg-7 title-profile">
					<h1>{{name}} {{lastname}}</h1>
					<h4>{{specialty}}</h4>
					<h5><i class="glyphicon glyphicon-map-marker"></i> Caracas, Venezuela</h5>
				</div>
				<div class="col-lg-3 pull-right">
					<button class="btn btn-register pull-right" data-toggle="modal" data-target="#signin"><?php echo SITE__BOOK_APPOINTMENT; ?></button>
				</div>
				
				<div class="col-lg-5">
					<!--div class="col-lg-5 col-md-5">
						<input id="doctor-rating-{{#}}" class="rating" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
					</div-->
					
					<div class="col-lg-3 trophy pull-right">
						<span>100</span><br>
						Pacientes
					</div>
					<div class="col-lg-3 trophy pull-right">
						<span>BUENA</span><br>
						Atención
					</div>
					<div class="col-lg-3 trophy pull-right">
						<span><i class="glyphicon glyphicon-time"></i></span><br>
						Poca espera
					</div>			
				</div>
				
				<div class="clearfix"></div>
				
				
					
										
				<div class="col-lg-12 menubar-action">
					<ul class="nav nav-tabs" role="tablist" class="col-lg-12">
						<li><a href="#book-appointment" role="tab" data-toggle="tab">Cita</a></li>
						<li><a href="#profile" role="tab" data-toggle="tab">Perfil</a></li>
						<li><a href="#messages" role="tab" data-toggle="tab">Mensajes</a></li>
					</ul>
				</div>
				
				
								
			</div>



			<div id="inner" class="col-lg-12">	
				
				
				<!-- Tab panes -->
				<div class="tab-content">

				<fieldset class="activestep step3 hidden">
					<h2 class="text-center">¿Cuando deseas tu cita?</h2>
					
					<div id="wrapper" class="looper" style="padding-top: 150px;">
						<div id="calendar-loop">
							<div class="column-steps calendar-item">
								<h5>Viernes</h5>
								<h4>06</h4>
								<h5>Feb 15</h5>
										</div>
										<div class="column-steps calendar-item">
											<h5>Viernes</h5>
											<h4>06</h4>
											<h5>Feb 15</h5>

										</div>
										<div class="column-steps calendar-item">
											Cita antes de operación
							
										</div>
										<div class="column-steps calendar-item">
											Entrega de mensajes							
										</div>
							
									</div>
									<div class="hcontainer hidden">
										<h4>Horarios disponibles</h4>
										{{practice}}
											{{schedule}}
												 <div class="text-center date-resume2">
												 		<div class=" hours-day">{{ini_schedule}}-{{end_schedule}}</div>
												    </div>
									       	  	{{/schedule}}
										{{/practice}}										
												
									</div>

											
									<a id="handler-back-cal" class="goback" href="#"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
									<a id="handler-fowr-cal" class="gofoward" href="#"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
								</div>	    						
								<div class="clearfix"></div>
							</fieldset>


					<form class="text-center title-profile reason-book">
						<h4>INDIQUE LA RAZON DE LA CONSULTA</h4>
						<button class="btn btn-register "> Primera vez </button>
						<button class="btn btn-register "> Pre-operatorio</button>
						<button class="btn btn-register "> Post-operatorio </button>
				  	</form>
				  		<fieldset class="text-center place-book hidden"  id="step2" >

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
							</fieldset>
		
				 	<div class="tab-pane fade" id="profile">
				  		Perfil
				 	</div>
				</div>
			</div>
			
		</div>
		
		{{/doctors}}
		
	</script>
</div>
