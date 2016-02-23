<div id="doc-details" class="col-lg-10 col-md-offset-1">
	<script id="Profile-Template" type="text/x-handlebars-template">
	{{#doctors}}
	<div class="col-lg-4 col-md-4 col-sm-4 item-details">	
		<button type="button" class="close left " data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="clearfix"></div>
			<div class="col-lg-5">			
				<img src="
						{{#ifEquals gender 'F'}}
						    <?php echo IMG; ?>default-female.png
						{{else}}
						    <?php echo IMG; ?>default-male.png
						{{/ifEquals}}							
						" class="img-responsive img-circle img-profile">
			</div>
			<div class="col-lg-7 col-md-7 title-profile no-padding">
				<h1>{{name}} {{lastname}}</h1>
				<h4>{{specialty}}</h4>
				<input id="doctor-rating-" class="rating" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
				<h5><i class="glyphicon glyphicon-map-marker"></i> Caracas, Venezuela</h5>				
			</div>
			<div class="col-lg-12"></div>
			<div class="rating-all">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 trophy">
					<i class="glyphicon glyphicon-user fa-2x"></i>
					<span>Pacientes</span>
					<span>100</span>
					<div class="middledivider"></div>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 trophy">
				<i class="glyphicon glyphicon-heart-empty fa-2x"></i>
					<span>Atención</span>
					<span>MUY BUENA</span><br>
					<div class="middledivider"></div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 trophy">
					<i class="glyphicon glyphicon-time fa-2x"></i>
					<span>Tiempo <br>de espera</span>
					<span>Poco</span>
				</div>	
			</div>
			<div class="col-lg-12 text-center">
				<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

				
				
					<a href="#messages" role="tab" data-toggle="tab" class="btn btn-message">DEJAR MENSAJE</a>
					<a href="#book-appointment" role="tab" data-toggle="tab" class="btn btn-book"><?php echo SITE__BOOK_APPOINTMENT; ?></a>
					
				</div>
			</div>
		

	</div>
	<!--End Left-->
	<!--Right-->
	<div class="col-lg-8 col-md-8 col-sm-8 right-details no-padding">
		<div class="col-lg-12 menubar-action book-menu no-padding">
			<ul class="nav nav-tabs" role="tablist" class="col-lg-12">
				<li class="active"><a href="#book-appointment" role="tab" data-toggle="tab">Pedir Cita</a></li>
				<li><a href="#profile" role="tab" data-toggle="tab">Perfil</a></li>
				<li><a href="#messages" role="tab" data-toggle="tab">Mensajes</a></li>
			</ul>
		</div>
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade in active" id="book-appointment">
				 
				 {{> TabBookApointment}}

				<div class="clearfix"></div>
			</div>
			<div class="tab-pane fade" id="profile">
			  	Perfil
			</div>
			<div class="tab-pane fade" id="messages">
			  	Mensajes
			</div>
		</div>	
	</div><!--End Right-->
	{{/doctors}}	
	</script>
</div>
<div class="clearfix"></div>
<div id="templates">
	<?php $this->render('doctor/tab-book-appointment'); ?>
</div>