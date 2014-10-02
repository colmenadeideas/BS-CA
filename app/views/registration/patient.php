<div id="registration-patient">		
	<form id="form-registration-patient" action="" novalidate="novalidate" method="post">
		<div class="col-sm-12 col-lg-12">
			<input type="text" name="name" placeholder="<?php echo SITE_NAME__FORM_NAME; ?>" required="required" class="form-control input-lg">
		</div>
		<div class="col-sm-12 col-lg-12">
			<input type="text" name="lastname" placeholder="<?php echo SITE_NAME__FORM_LASTNAME; ?>" required="required" class="form-control input-lg">
		</div>
		<div class="col-sm-12 col-lg-12 inner-addon left-addon">
		    <i class="glyphicon glyphicon-envelope"></i>
		    <input type="text" name="email" placeholder="<?php echo SITE_NAME__FORM_EMAIL; ?>" required="required" class="form-control input-lg">
		</div>
		<div class="col-sm-12 col-lg-12 inner-addon left-addon">
		    <i class="glyphicon glyphicon-calendar"></i>
			<input type="text" name="birth" placeholder="<?php echo SITE_NAME__FORM_BIRTH; ?>" data-date-format="DD/MM/YYYY" required class="form-control input-lg datetimepicker left"/>
			
		</div>
		<!--extra system vars-->
		<input type="hidden"  id="role" name="role" placeholder="role" value="patient" required>
		
		<div class="col-sm-12 col-lg-12">
			<button type="submit" class="btn-full btn btn-success btn-lg register-send">
				<?php echo SITE_NAME__SIGN_IN; ?> <i class="fa fa-check"></i>
			</button>
		</div>
		
	</form>
</div>
<div id="response-registration" class="text-center">
</div>