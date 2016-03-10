<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Práctica</h2>

	<div id="steps-wrapper">
		<form id="practice" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" action="" novalidate="novalidate" method="post" class="light-form stepform1" data-controller="practice">
			<div class="form-steps">
				<!--Step 1-->
				<div id="step1" class="slide-step active" data-stepback="0" data-stepfoward="2">
					
					<!--<input type="hidden"  id="OKey" name="OKey" value="{{id}}" required> -->
					<!--extra data-->
					<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
					<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>
					
					<?php $this->render('practices/add-clinic'); ?>	
					
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
			</div><!--end form-steps -->
		</form>		
		
	</div><!--end steps-wrapper -->

</div>
<div class="col-lg-2 col-sm-2"></div>