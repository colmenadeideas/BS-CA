<div class="modal fade" id="signin" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>&nbsp;</h4>
      </div-->
      <div class="modal-body">
      	
      	
	      	<div id="registration-panels" class="wraper">
				
				<div id="registration-forms" class="mask">
					<!--Choose Option-->
					<div id="register-select" class="masked-item">
						<div class="back-close">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>		
						</div>
						<div  class="padding-20">										
							<a class="btn btn-lg btn-full btn-email" id="register_with_email"><i class="fa fa-envelope"></i> <?php echo SITE_NAME__SIGN_IN_WITH_EMAIL; ?></a>
		      				<hr><?php echo SITE_NAME__SIGN_IN_CHOOSE; ?>
		      				<a class="btn btn-lg btn-full btn-facebook" id="register_with_facebook"><i class="fa fa-facebook"></i> <?php echo SITE_NAME__SIGN_IN_WITH_FACEBOOK; ?></a>
							<a class="btn btn-lg btn-full btn-google" id="register_with_google"><i class="fa fa-google-plus"></i> <?php echo SITE_NAME__SIGN_IN_WITH_GOOGLE; ?></a>
						</div>
						
	      				
	      				
	      			</div>					
					<!--Register with Email -->
					<div id="registration-emails" class="masked-item">	
						<div class="back-close">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>					
							<a href="#register-select" class="back"><i class="fa fa-chevron-left"></i> </a>	
						</div>	
						<div  class="padding-20">
							<?php $this -> render('registration/patient'); ?>
						</div>
						
						
					</div>
					
				</div>
				
			</div>
      		<div class="clearfix"></div>
            	
     	
      	
        <!--button class="btn-lg btn-default" id="register_doctor_button">Soy Medico</button>
		<button class="btn-lg btn-default" id="register_patient_button">Soy Paciente</button>
		<div id="patient"><?php $this->render('site/form/register_patient'); ?></div>
		<div id="doctor"><?php $this->render('site/form/register_doctor'); ?></div-->
			
			
			
      </div>
      
    </div>
  </div>
</div>