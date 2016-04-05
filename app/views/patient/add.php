<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Paciente</h2>

	<!-- TODO: Activar el progressbar -->
	<div class="progressbar-container col-lg-12 col-sm-12" >
		<!-- progressbar -->
		<ul class="progressbar animated">
			<li>Informacion general</li>
			<li>Datos esenciales</li>
			<li>Observaciones</li>
		</ul>
	</div>

	<div id="steps-wrapper">
		<form id="patient" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" action="" novalidate="novalidate" method="post" class="light-form stepform1" data-controller="patient">
			<div class="form-steps steps4">

				<!--Step 1-->
				<div id="step1" class="slide-step active" data-stepback="0" data-stepfoward="2">
					
					<!--extra data-->
					<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
					<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>
					
					<?php $this->render('patient/add-personal-data'); ?>
				</div>
				<!--Step 2-->
				<div id="step2" class="slide-step" data-stepback="1" data-stepfoward="3">					
				</div>
				<!--Step 3-->
				<div id="step3" class="slide-step" data-stepback="2" data-stepfoward="4">					
				</div>
				<!--Step 4-->
				<div id="step4" class="slide-step" data-stepback="3" data-stepfoward="0">
				</div>
			</div><!--end form-steps -->
			<div class="text-right col-sm-12 col-lg-12 button-area">
				<input type="submit" name="previous" class="previous btn hideme" value="Anterior">
				<input type="submit" name="next" class="next btn btn-info btn-lg" value="Continuar" > 
			</div>
		</form>	
		
		<!--Notification -->
		<div class="hidden-message">
			<div class="process-notification">
				<div class="circle-icon">
					<i class="glyphicon glyphicon-ok"></i>
				</div>
				<div class="content-area">
					<h4 class="text-center forms">Paciente agregado con éxito</h4>
					<div class="button-group">
						<a href="#patient/add" class="btn btn-alt-choice">Agregar otro paciente</a>
						<a href="#appointments/add/" class="btn btn-first-choice">Agregar Cita</a>
					</div>
				</div>
			</div>
		</div>	
		
	</div><!--end steps-wrapper -->

</div>
<div class="col-lg-2 col-sm-2"></div>