<div class="col-md-12" style="">
    <div class="title-header text-center col-md-12">
        <h1>Cambiar contraseña</h1>
    </div>
    <img  src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle" />
</div>
<div class="col-md-12 text-center">
    <h2><?php echo $this->userdata[0]['name']; ?> <small> ( <i class="glyphicon glyphicon-user"></i> <?php echo $this->userdata[0]['rif']; ?> )</small></h2>
    <h5>Paciente</h5>
    <h4 class="">4 consultas realizadas</h4>
</div>

<div class="account-wall col-md-6 col-md-offset-3">

    <form id="password-update" class="form-signin">

        <div class="form-group" style="margin-top: 40px;">
            <h4>Contraseña actual</h4>
            <label class="control-label"></label>
            <input class="form-control" id="password_old" name="password_old"  <?php if (empty($this->old_password)) { echo 'type="password"'; } else { echo 'type="hidden" value="'.$this->old_password.'"';} ?> required autofocus placeholder="Contraseña anterior">
        </div>

        <div class="form-group">
            <h4>Nueva Contraseña</h4>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>				
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password nuevamente" required>
        </div>
        <button id="send" class="btn btn-lg btn-primary" type="submit">Cambiar y Entrar</button>

    </form>
        <div class="clear" style="height:20px"></div>
        <div id="msg"><div id="response"></div><div class="b-close"></div></div>	
</div>
