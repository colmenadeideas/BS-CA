<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img id="profile-icon" src="<?php echo ICONS; ?>settings.png"/> &nbsp;<?php echo $this -> userdata[0]['name']; ?>
		<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li>
				<a href="<?php echo URL; ?>settings/profile"><i class="glyphicon glyphicon-user"></i> Mi perfil</a>
			</li>
			<li>
				<a href="<?php echo URL; ?>settings/edit/password"><i class="glyphicon glyphicon-lock"></i> Cambiar Contraseña</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="<?php echo URL; ?>settings/logout"><i class="glyphicon glyphicon-log-out"></i> Salir</a>
			</li>
		</ul>
	</li>
</ul>