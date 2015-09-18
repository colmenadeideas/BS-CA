<div class="col-md-12" style="">
    <div class="row"> 
        <div class="title-header text-center col-md-12">

        <!-- <div class="col-md-6 col-md-offset-3">
            <div class="title-header"> -->
					  <h1> <small>Cambio de Clave</small></h1>
			<!-- </div> -->
            <div class="account-wall">
                
                <img  src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle profile-img" />
                <form id="password-update" class="form-signin">
                
                <div class="form-group">
					<label class="control-label"></label>
					<input class="form-control" id="password_old" name="password_old"  <?php if (empty($this->old_password)) { echo 'type="password"'; } else { echo 'type="hidden" value="'.$this->old_password.'"';} ?> required autofocus placeholder="Contraseña anterior">
				</div>
				<div class="form-group">
					<label class="control-label">NuevaContraseña</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>				
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password nuevamente" required>
				</div>
							
							
                
                <button id="send" class="btn btn-lg btn-primary btn-block" type="submit">
                    Cambiar y Entrar</button>
                
                </form>
                <div class="clear" style="height:20px"></div>
				<div id="msg"><div id="response"></div><div class="b-close"></div></div>	
            </div>
            
        </div>
    </div>
</div>