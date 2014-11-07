
		
<form id="form-login" role="form" method="post">
<div class="field-wrapper col-sm-12 col-lg-12">
			<label for="name" class="placeholder"><?php echo SITE__FORM_NAME; ?></label>
			<input type="text" name="name" placeholder="<?php echo SITE__FORM_NAME; ?>" required="required" class="form-control input-lg signinput">
		</div>
	<fieldset>
		<div class="form-group">
			<input type="email" name="email" id="email" class="form-control input-lg" placeholder="<?php echo SITE__FORM_USERNAME; ?>" required autofocus>
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" class="form-control input-lg" placeholder="<?php echo SITE__FORM_PASSWORD; ?>" required>
		</div>
		<a href="" class="btn btn-link pull-right"><?php echo SITE__FORM_PASSWORD_FORGOT; ?></a>
		<br><br>
		<div class="row">
			<div class="col-md-offset-6 col-xm-offset-6 col-xs-offset-6 col-xs-6 col-sm-6 col-md-6">
				<input type="submit" class="btn btn-lg btn-success btn-block send" value="Entrar">
			</div>
		</div>
	</fieldset>
</form>

 