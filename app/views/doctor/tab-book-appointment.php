<script id="BookAppointment-Template" type="text/template">
	<div class="steps">




		
        
            <div class="row stepsy" style="border-bottom:0;">
                
                <div id="stepsy1" class="col-xs-3 stepsy-step active">
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="stepsy-dot"></a>
                  <div class="stepsy-info text-center">LUGAR</div>
                </div>
                <div id="stepsy2" class="col-xs-3 stepsy-step disabled">
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="stepsy-dot"></a>
                  <div class="stepsy-info text-center">MOTIVO</div>
                </div>
                
                <div id="stepsy3" class="col-xs-3 stepsy-step disabled"><!-- complete -->
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="stepsy-dot"></a>
                  <div class="stepsy-info text-center">Fecha</div>
                </div>
                
                <div id="stepsy4" class="col-xs-3 stepsy-step disabled"><!-- active -->
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="stepsy-dot"></a>
                  <div class="stepsy-info text-center">Pago</div>
                </div>
            </div>
        
        










	</div>
	<div id="book-wrapper">
		<form id="appointments" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" action="" novalidate="novalidate" method="post" class="light-form stepform1">
			<div class="book-steps">
				<!--Step 1-->
				<div id="step1" class="slide-step active" data-stepback="0" data-stepfoward="2">
					
					<input type="hidden"  id="OKey" name="OKey" value="{{id}}" required>
					<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>">
					<!--extra data-->
					<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
						<h2 class="text-center text">¿Dónde deseas pedir la cita?</h2>
						<div class="all-practices list">		
							<?php $this->render('panel/appointments/template-clinics'); ?>				
						</div>
					</div>
					
				</div>
				<!--Step 2-->
				<div id="step2" class="slide-step" data-stepback="1" data-stepfoward="3">
					Step2
				</div>
				<!--Step 3-->
				<div id="step3" class="slide-step" data-stepback="2" data-stepfoward="4">
					Step3
				</div>
				<!--Step 4-->
				<div id="step4" class="slide-step" data-stepback="3" data-stepfoward="5">
					Step4
				</div>
			</div><!--end book-steps -->
		</form>		
		<?php $this->render('panel/appointments/add-patient'); ?>
	</div><!--end book-wrapper -->


	
</script>