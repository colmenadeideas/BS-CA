<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

<div id="identification" class="col-lg-6 col-lg-6 col-sm-6">
	<div class="col-md-12">
		<h3 class="text-center">DETALLE DE CARGOS</h3>
	</div>
	<div class="col-md-12 amount-item">
		<div class="col-md-8 amount-detail">					
			<i class="fa fa-stethoscope"></i> &nbsp;Costos Honorarios					
		</div>
		<div class="col-md-4 amount-cost">Bs. 500,00</div>				
	</div>
	<div class="col-md-12 amount-item">
		<div class="col-md-8 amount-detail">					
			<i class="fa fa-stethoscope"></i> &nbsp;Costos Honorarios					
		</div>
		<div class="col-md-4 amount-cost">Bs. 500,00</div>				
	</div>

	<div class="col-md-12 amount-resume">
		<div class="col-md-12 no-padding">
			<div class="col-md-6 text-right amount-sub-total">
				Sub-total:
			</div>
			<div class="col-md-6 text-right amount-sub-total no-padding">
				Bs. 3800,00
			</div>
		</div>
		<div class="col-md-12 no-padding">
			<div class="col-md-6 text-right amount-sub-total">
				I.V.A:
			</div>
			<div class="col-md-6 text-right amount-sub-total no-padding">
				Bs. 1252,00
			</div>
		</div>
		<div class="col-md-12 no-padding">
			<div class="col-md-6 text-right amount-total">
				TOTAL:
			</div>
			<div class="col-md-6 text-right amount-total no-padding">
				Bs. 4252,00
			</div>
		</div>				
	</div>
	<br><br>
	<div class="col-md-6">
		<a class="btn btn-edit btn-edit-consult">MODIFICAR</a>
	</div>
	<div class="col-md-6">
		<button href="#" data-initpoint="<?php echo $this->preference['response']['sandbox_init_point']; ?>" class="startPayment btn btn-sucess btn-confirm">CONFIRMAR</button>
	</div>




</div>
<div id="appointment-resume" class="col-lg-6 col-lg-6 col-sm-6">
	<h3 class="text-center">SU CITA</h3>
	<div class="ficha col-lg-12">
		<div class="appointment-details">
			<div class="col-lg-2"></div>
			<div class="col-lg-10">
			<img src="http://localhost/BS-OK/html/public/img/okidoc-logo-main.png" class="img-responsive">
			</div>
			<div class="col-lg-2"></div>
			<span class="appointment-title">Fecha</span>	
			<span class="appointment-day" >20</span>
			<span class="appointment-date">ENERO 2015</span>
		</div>
		<div class="appointment-details">
			<span class="appointment-title">Hora</span>			
			<span class="appointment-time">9:15 AM</span>
		</div>
		<span class="appointment-title">Lugar</span>	
		<h4>Centro Policlinico la Viña</h4>
		
		<span class="appointment-title">Doctor</span>			
		<img src="<?php echo IMG; ?>default-male.png" alt="" class="img-circle img-ficha">		
		<h4>Dr. Maria Hernandez Perez</h4>

	</div>
	<br><br>
	<div class="clearfix"></div>
	
</div>
<!--script id="Patient-Identify-Template" type="text/template">
</script-->

