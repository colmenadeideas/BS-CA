<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Cita</h2>
	
	<div id="stepform">	
		<form id="appointments" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="0" data-stepfoward="2" action="" novalidate="novalidate" method="post" class="light-form stepform1">
			<!--extra data-->
			<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
			<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>
			<h2 class="text-center text">¿Dónde deseas crear la cita?</h2>
			<div class="all-practices list">
				<script id="Practice-Template" type="text/x-handlebars-template">		
					<?php $this->render('panel/appointments/template-clinics'); ?>	
				</script>			
			</div>
		</form>
	</div>
</div>