<!--Recover Password-->
<div class="modal fade modalbox" id="password-recovery" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modalhead">
				&nbsp;
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
			</div>
			<div class="modal-body text-center">


				
				<div class="logo-square">
					<img src="http://localhost/BS-OK/html/public/img/okidoc-logo-main-square.png" class="img-responsive">						
				</div>
				<form role="form" method="post">
					<fieldset>
						<h3 class="text-center">Ingresa tu correo electrónico y te ayudaremos</h3>
						<div class="form-group">
							<label for="email" class="placeholder"><?php echo SITE_FORM_EMAIL; ?></label>		
							<input type="email" name="recover-password" id="recover-password" class="form-control input-lg" placeholder="<?php echo SITE_FORM_EMAIL; ?>" required="required">
							
							
						</div>
								
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 right">
								<input type="submit" class="btn btn-lg btn-success btn-block recovery-send" value="Entrar">
							</div>
						</div>
						<br>
						<a href="#" class="right">Volver al Login</a>
					</fieldset>
				</form>

				<div id="recovery-response"></div>
			</div>

		</div>
	</div>
</div>