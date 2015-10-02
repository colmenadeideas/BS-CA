<!-- git event -->

<i class="sb-button glyphicon glyphicon glyphicon-resize-small"></i>
<div id="panel-drawer" class="sb-slidebar sb-left col-lg-3 col-md-3 col-sm-3 col-xs-3">
	
	<?php $this->render('panel/nav-big'); ?>
	
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
	    <li><a href="#panel/patient/add">Agregar Paciente</a></li>
		<li><a href="#panel/practice/add">Agregar Práctica</a></li>
		<li><a href="#panel/practice/intervals">Agregar Ausencia</a></li>
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