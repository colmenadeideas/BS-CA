
<div id="doc-details">
	
	<script id="item-details" type="text/template">
		{{doctors}}
		
		<style>
		
		.site-head { height:10px !important; margin-top:0 !important; min-height:0;}
		
		
		.menubar-action { background: #3898F9; padding: 15px; }
		.img-profile { /*padding: 0 20px 20px;*/ 
			margin: 0 20px 20px;max-width: 93%;box-shadow: 0px 1px 10px rgba(0,0,0,0.25);padding: 5px;}
		.menubar-action  .nav-tabs { border:none; transition: all ease 0.5s}
		.menubar-action .nav-tabs>li.active>a, .menubar-action li a  { border: none;  color: rgba(255,255,255,0.5); text-transform: uppercase; background: none; font-weight: 400 }
		.menubar-action .nav-tabs>li.active>a  {font-weight: 600; color: rgba(255,255,255,1); }
		.menubar-action .nav-tabs>li.active>a:hover, .menubar-action .nav-tabs>li>a:hover , .menubar-action .nav-tabs>li.active>a:focus { background: none; }
		.menubar-action .nav-tabs>li.active:after { top: 100%;	left: 50%;	border: solid transparent;	content: " ";	height: 0;	width: 0;	position: absolute;
						pointer-events: none;	border-color: rgba(136, 183, 213, 0);	border-top-color: #3898F9;	border-width: 30px;
	margin-left: -30px }
	.menubar-action .nav-tabs>li.active, .menubar-action .nav-tabs>li.active>a:hover, .menubar-action .nav-tabs>li>a:hover , .menubar-action .nav-tabs>li.active>a:focus {	color: rgba(255,255,255,1) }
		.title-profile h4, .title-profile h5 { text-transform: uppercase; opacity: 0.8 }
		.title-profile h5, { /*color: #949494;*/ font-weight:200; opacity: 0.6}
		.badge { padding:15px; border-radius: 20px }
		.trophy { text-align: center; text-transform:uppercase; min-height:75px; font-size: 80%; background: #00B1C0; color: #FFF; padding: 20px 0; border-left: solid 2px #FFF;
margin: 20px 0 ; font-weight:100; border-radius: 4px;}
		.trophy span { font-size:120%; font-weight:400;}
		#doc-details #inner { background:#F7F7F7; padding: 30px 20px; border-bottom: solid 1px #CCC }
		#doc-details {width: 100%;    height: 100%;  background: #FFF; padding-top: 40px }

		.steps h2 { color:#1CD6BD; margin: 25px 0 40px;}
		.steps .dates-available { 
			border-radius: 3px; padding: 10px; font-weight: 200;display: inline-block;
		}
		
		.steps .date-resume { margin: 0 auto 5px;padding: 3px 7px;border-radius: 15px;border: solid 2px #FFF;opacity: 0.7;color: #009EFC;font-weight: 600;background: #FFF; }
		.steps h4 { text-transform: uppercase;font-weight: 700 !important;letter-spacing: 0.5px;font-size: 20px;}
		.weekday { font-weight:600}
		.hours-day { opacity: 0.7}
		
		
		.steps .date-resume2 { margin: 0 auto 5px;padding: 3px 7px;border-radius: 15px; opacity: 0.7;color: #FFF; }
		.steps .date-resume2 .weekday {font-weight: 600; color: #009EFC; background: #FFF;padding: 5px 8px;  width: 30px; border-radius: 15px;}
		.steps .date-resume2 .hours-day { opacity: 0.7; padding: 5px;}
		
		
		.carousel-control.right, .carousel-control.left {  background: none !important; color: #565A5C; text-shadow: none !important; font-size: xx-large;width: 50px; padding: 100px 0 0 0;}
		.practice-item2 {border: 2px solid #E2E2E2;background: #FFF;border-radius: 15px;margin: 0 10px; }
		.practice-item { background: #009EFC;color: #FFF;font-weight: 800 !important;border-radius: 15px;margin: 0 10px;padding: 20px 10px;}
		.practice-item img { padding: 20px 30px 10px;}
		.column-steps {/*position: relative;
min-height: 1px;
padding-right: 15px;
padding-left: 15px;*/
		 width:270px; float: left;
}
		/*form styles*/

/*basic reset*/
/*form styles*/
#msform {	text-align: center;/*	position: relative;*/}
#msform fieldset {
	/*background: #FFF;*/
	border: 0 none;
	padding: 20px 30px;	
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	/*position: absolute;*/
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {	display: none;}
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
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}

/*progressbar*/
#progressbar {
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	width: 33.33%;
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





		</style>
		
				
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
					
					
				  <div class="tab-pane fade in active" id="book-appointment">
				 
						{{if practice}}			
					
				  	
				  		
						<!-- multistep form -->
						<form id="msform" class="steps">
							<!-- progressbar -->
							<ul id="progressbar">
								<li class="active">Account Setup</li>
								<li>Social Profiles</li>
								<li>Personal Details</li>
							</ul>
							<!-- fieldsets -->
							<fieldset>
								<h2>¿Donde quieres pedir tu cita?</h2>
								
								
								<div id="practices-loop" class="carousel slide" data-ride="carousel">
								    <!-- Wrapper for slides -->
								  
								  
								  <div class="carousel-inner" role="listbox">
								    <div class="item active">
								    	<div class="columns-centered">
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
								      	
								      {{/practice}}
								      </div>
								    </div>
								    
								  </div>
								 
								
								  <!-- Controls -->
								  <a class="carousel-control left" href="#practices-loop" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
								  </a>
								  <a class="carousel-control right" href="#practices-loop" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
								  </a>
								</div>
								
								
								<input type="button" name="next" class="next action-button" value="Next" />
							</fieldset>
							<fieldset>
								<h2 class="fs-title">Social Profiles</h2>
								<h3 class="fs-subtitle">Your presence on the social network</h3>
								<input type="text" name="twitter" placeholder="Twitter" />
								<input type="text" name="facebook" placeholder="Facebook" />
								<input type="text" name="gplus" placeholder="Google Plus" />
								<input type="button" name="previous" class="previous action-button" value="Previous" />
								<input type="button" name="next" class="next action-button" value="Next" />
							</fieldset>
							<fieldset>
								<h2 class="fs-title">Personal Details</h2>
								<h3 class="fs-subtitle">We will never sell it</h3>
								<input type="text" name="fname" placeholder="First Name" />
								<input type="text" name="lname" placeholder="Last Name" />
								<input type="text" name="phone" placeholder="Phone" />
								<textarea name="address" placeholder="Address"></textarea>
								<input type="button" name="previous" class="previous action-button" value="Previous" />
								<input type="submit" name="submit" class="submit action-button" value="Submit" />
							</fieldset>
							<div class="clearfix"></div>	
						</form>
						
						{{else}}
							Este Doctor no tiene consultas, sugierele crear un centro
						{{/if}}
						

						
				  	
						
				  </div>
				  <div class="tab-pane fade" id="profile">
				  	Perfil
				  </div>
				</div>
			</div>
			
		</div>
		
		{{/doctors}}
		
		
		
		
		
		
		
		
		
		
		
	</script>
</div>
