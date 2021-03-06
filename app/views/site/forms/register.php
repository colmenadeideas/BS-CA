<div class="modal fade" id="signin" tabindex="-1" role="dialog" data-color="green">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>&nbsp;</h4>
      </div>
      <div class="modal-body">
      	
      	
	      	<div id="registration-panels" class="wraper">
				
				<div id="registration-forms" class="mask">
					
					<!-- ->
					
					<!--Choose Option-->
					<div id="register-who" class="masked-item">
						
						<div class="logo-square">
							<img src="<?php echo IMG; ?>okidoc-logo-main-square-white.png" class="img-responsive" />							
						</div>
						
						
						<div class="padding-20">
																	
							<a class="btn btn-lg btn-full btn-email" id="register_who_doctor" name="doctor">
								<i class="fa fa-envelope"></i> <?php echo SITE__SIGN_IN_WHO_DOCTOR; ?></a>
		      				
		      				
		      				
		      				<a class="btn btn-lg btn-full btn-email" id="register_who_patient" name="patient">
								<i class="fa fa-envelope"></i> <?php echo SITE__SIGN_IN_WHO_PATIENT; ?></a>
		      					      				

						</div>
						
	      				
	      				
	      			</div>	
	      			
	      			
	      		
					
					<!--Form Doctor-->
					<div id="register-select-doctor" class="masked-item">
						
						<div class="logo-square">
							<img src="<?php echo IMG; ?>okidoc-logo-main-square-white.png" class="img-responsive" />							
						</div>
						<div class="padding-20">										
							<a class="btn btn-lg btn-full btn-email" id="register_with_email"><i class="fa fa-envelope"></i> <?php echo SITE__SIGN_IN_WITH_EMAIL; ?></a>
		      				<hr><?php echo SITE__SIGN_IN_CHOOSE; ?>
		      				
							<a class="btn btn-lg btn-full btn-facebook more-margin" id="register_with_facebook" onclick="fblogin('doctor')"><i class="fa fa-facebook"></i> Doctor <?php echo SITE__SIGN_IN_WITH_FACEBOOK; ?></a>




							<a class="btn btn-lg btn-full btn-google" id="register_with_google"><i class="fa fa-google-plus"></i> <?php echo SITE__SIGN_IN_WITH_GOOGLE; ?></a>
							
							<!-- -->
	
<button id="signinButton"

    class="g-signin"
    data-callback="signinCallback"
    data-clientid="787160254039-53j11tf8qir6utj3qr315tmevs8fj58d.apps.googleusercontent.com"
    data-cookiepolicy="none"
    data-requestvisibleactions="http://schemas.google.com/AddActivity"
    data-scope=" https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email"
    data-role="patient"
    name="doctor" 
    onclick="doctor">
    
  </button>								
	
	
							<!-- -->
						</div>
						
	      				
	      				
	      			</div>	
	      			
	      			
	      			<!--Form Patient-->
					<div id="register-select-patient" class="masked-item">
						
						<div class="logo-square">
							<img src="<?php echo IMG; ?>okidoc-logo-main-square-white.png" class="img-responsive" />							
						</div>
						<div class="padding-20">										
							<a class="btn btn-lg btn-full btn-email" id="register_with_email"><i class="fa fa-envelope"></i> <?php echo SITE__SIGN_IN_WITH_EMAIL; ?></a>
		      				<hr><?php echo SITE__SIGN_IN_CHOOSE; ?>
		      				
							<a class="btn btn-lg btn-full btn-facebook more-margin" id="register_with_facebook" onclick="fblogin('patient')"><i class="fa fa-facebook"></i> Paciente <?php echo SITE__SIGN_IN_WITH_FACEBOOK; ?></a>


							<a class="btn btn-lg btn-full btn-google" id="register_with_google"><i class="fa fa-google-plus"></i> <?php echo SITE__SIGN_IN_WITH_GOOGLE; ?></a>
							
							
							<!--Test login with google-->
							
<button id="signinButton"

    class="g-signin"
    data-callback="signinCallback"
    data-clientid="787160254039-53j11tf8qir6utj3qr315tmevs8fj58d.apps.googleusercontent.com"
    data-cookiepolicy="none"
    data-requestvisibleactions="http://schemas.google.com/AddActivity"
    data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile"
    data-role="patient"
    name="paciente" 
    onclick="patient">
    
  </button>
  

							<!--                             -->
							<!--Termina test login with google-->
						</div>
						
	      				
	      				
	      			</div>	
	      							
					<!--Register with Email -->
					<div id="registration-emails" class="masked-item">	
						<div class="back-close">
												
							<a href="#register-select" class="back"><i class="fa fa-chevron-left"></i> </a>	
						</div>	
						<div  class="padding-20">
							<?php $this -> render('registration/patient'); ?>
						</div>
						
						
					</div>
					
				</div>
				
			</div>
      		<div class="clearfix"></div>
            		
			
      </div>
      
    </div>
  </div>
</div>