<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="LoginRegisterPatient">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <!-- CONTENT -->
		<div class="col-lg-12 text-center">
		<h3>To continue with your booking, please Login</h3>
		</div>

		<div id="identify-patient" class="col-lg-6 col-lg-6 col-sm-6">
			<div id="or-register" class="wraper">
		      	<div id="register-mask">
		      		<div class="masked-view text-center">
		      			<h4><br><br>Si aún no tiene cuenta,<br>es tiempo de crearla aquí<br>
		      			<button class="btn btn-register-outline" id="or-register-button">Registrarme</button> 
		      			</h4>
		      		</div>
		      		<div class="masked-view text-center">
		      			<h3>Register</h3> 
		      			<div class=" register-bg">
		      			<?php $this -> render('site/forms/registration/patient'); ?>
		      			</div>
		      		</div>					
				</div>
			</div>
		</div>
		<div id="login-patient" class="col-lg-6 col-lg-6 col-sm-6">
			<br>
			<?php $this->render('login/loginbox'); ?>
		</div>
		<div class="clearfix"></div>
		<!-- CONTENT -->
    </div>
  </div>
</div>