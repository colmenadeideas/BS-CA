<!-- git event -->

<i class="sb-button glyphicon glyphicon glyphicon-resize-small"></i>
<div id="panel-drawer" class="sb-slidebar sb-left col-lg-3 col-md-3 col-sm-3 col-xs-3">
	<div class="drawer_profile col-lg-12 col-xs-12 text-center">
		<a href="<?php echo URL ?>account/edit/profile" id="settings-icon"><i class="glyphicon glyphicon-cog" ></i></a>
		<a href="" id="notifications-icon"><i class="glyphicon glyphicon-bell" ></i></a>
		<div class="col-lg-9 col-lg-offset-1 text-center">
			<img src="<?php echo IMG; ?>default-male.png" class="img-responsive img-circle">			
		</div>	
		<div class="col-lg-12 col-xs-12"><h2> Hola, <?php echo $this->userdata[0]['name']; ?></h2>	</div>
	</div>

	
	<div class="drawer_menu row col-lg-12">
		<ul id="menu-content" class="menu-content">
                <li class="col-md">
                  <a href="#">
                  	<i class="fa fa-calendar-o fa-lg"></i> &nbsp; Próximas Citas
                  </a>
                </li>

                <li data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-user fa-lg"></i> &nbsp; Pacientes <span class="arrow"></span></a>
                </li>
                <li data-toggle="collapse" data-target="#service" class="">
                  <a href="#"><i class="fa fa-clock-o fa-lg"></i> &nbsp; Prácticas y Horarios <span class="arrow"></span></a>
                </li>  
	                <ul class="sub-menu collapse in" id="service">
	                 
	                  <li>New Service 3</li>
	                </ul>
                <li>
                	<a href="#">
                  		<i class="fa fa-envelope-o fa-lg"></i> &nbsp; Mensajes
                  	</a>
                </li>
            </ul>
	</div>
	
	
	
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 sb-slidebar">
	<!--to work with the fixed position of #panel-drawer sidebar -->
</div>
<div id="sb-site">
<div id="panel-desktop" class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	<div class="sb-toggle-left navbar-left">
		<div class="navicon-line"></div>
		<div class="navicon-line"></div>
		<div class="navicon-line"></div>
	</div>
	<input class="col-lg-11 col-xs-11" placeholder="Buscar" id="panel-search"/>
	
	<div id="search-add" class="dropdown ol-lg-1 col-xs-1">
	  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
	  <!-- <span class="caret"></span> --></button>
	  <ul class="dropdown-menu addmenu">
	    <li>Agregar Paciente</li>
		<li>Agregar Practica</li>
		<li>Agregar Periodo de ausencia</li>
		<li>Agregar Informacion</li>
	  </ul>
	</div>


	



	<!-- <div class="col-lg-12 col-xs-12 cm-container">
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active" id="cm-home"><a href="#"><i class="glyphicon glyphicon-home"></i> <span class="sr-only">     (current)</span></a></li>
					<li><a href="#">Link de contexto</a></li>
					<li><a href="#">Link de contexto</a></li>
					
				</ul>
				

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> + <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
					</li>
				</ul>

				
			</div>
		</div>
		</nav>
	</div> -->
	
	<div class="col-lg-12 col-xs-12" id="desktop">
		<div id="loading"></div>