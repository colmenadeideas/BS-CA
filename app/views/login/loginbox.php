<div class="logo-square">
		<img src="<?php echo IMG; ?>okidoc-logo-main-square-full-white.png" class="img-responsive" />							
</div>
<div class="col-lg-8 col-lg-push-2">
	
	<form id="form-login" role="form" method="post">
		<div class="field-wrapper ">
			<label for="email" class="placeholder"><?php echo SITE__FORM_USERNAME; ?></label>		
			<input type="email" name="email" id="email" class="form-control input-lg signinput" placeholder="<?php echo SITE__FORM_USERNAME; ?>" required="required"  autofocus>
		</div>
		<div class="field-wrapper ">
			<label for="name" class="placeholder"><?php echo SITE__FORM_PASSWORD; ?></label>
			<input type="password" name="password" id="password" placeholder="<?php echo SITE__FORM_PASSWORD; ?>" required="required" class="form-control input-lg signinput">			
		</div>

		<div class="row">
			<div class=" col-xs-12  col-lg-12">
				<input type="submit" class="btn btn-lg btn-full btn-success btn-block send" value="Entrar">
			</div>
		</div>
	</form>
	<div id="response-login"></div>
</div>

<div class="clearfix"></div>

<p>&nbsp;</p>


<div class="text-center">
	<hr><br>
	<div class="col-lg-6 col-xs-6">
		<a class="btn btn-sm btn-facebook btn-full" id="login_with_facebook"><i class="fa fa-facebook"></i> <?php echo SITE__LOG_IN_WITH_FACEBOOK; ?></a>
	</div>
	<div class="col-lg-6 col-xs-6">
		<a class="btn btn-sm btn-google btn-full" id="login_with_google"><i class="fa fa-google-plus"></i> <?php echo SITE__LOG_IN_WITH_GOOGLE; ?></a>
	</div>
	<div class="col-lg-12 col-xs-12 padding-20 text-center">
		<a href="" class="btn btn-link"><?php echo SITE__FORM_PASSWORD_FORGOT; ?></a>
	</div>
	
	
</div>

 