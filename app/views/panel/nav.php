<div id="panel-drawer" class="sb-slidebar sb-left col-lg-3 col-md-3 col-sm-3 col-xs-3">
	<div class="drawer_profile col-lg-12 col-xs-12 text-center">
		<div class="col-lg-9 col-lg-offset-2 text-center">
			<img src="<?php echo IMG; ?>default-male.png" class="img-responsive img-circle">			
		</div>	
		<div class="col-lg-12 col-xs-12"><h2> Hola, <?php echo $this->userdata[0]['name']; ?></h2>	</div>
	</div>

	
	<div class="drawer_menu row col-lg-12">
		<ul id="menu-content" class="menu-content">
                <li>
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
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	<!--to work with the fixed position of #panel-drawer sidebar -->
</div>
<div id="sb-site">
<div id="panel-desktop" class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	<div class="sb-toggle-left navbar-left">
		<div class="navicon-line"></div>
		<div class="navicon-line"></div>
		<div class="navicon-line"></div>
	</div>
	<div class="col-lg-12 col-xs-12" id="panel-search"> Buscar</div>

	<div id="search-add" class="col-lg-1 col-xs-1" onClick="addMenu();">
		<div></div>
	</div>
	<ul id="addMenu">
		<li>Agregar Paciente</li>
		<li>Agregar Practica</li>
		<li>Agregar Periodo de ausencia</li>
		<li>Agregar Informacion</li>
	</ul>



	<div class="col-lg-12 col-xs-12" id="desktop">
		
