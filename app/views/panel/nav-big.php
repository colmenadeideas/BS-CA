<div class="drawer_profile col-lg-12 col-xs-12 text-center">
    <a href="<?php echo URL; ?>account/edit/profile" id="settings-icon"><i class="glyphicon glyphicon-cog" ></i></a>
    <a href="" id="notifications-icon"><i class="glyphicon glyphicon-bell" ></i></a>
    <div class="col-lg-9 col-lg-offset-1 text-center">
      <img src="<?php echo IMG; ?>default-male.png" class="img-responsive img-circle">      
    </div>  
    <div class="col-lg-12 col-xs-12"><h2> Hola, <?php echo $this->userdata[0]['name']; ?></h2>  </div>
  </div>

<div class="drawer_menu row col-lg-12">
   <ul id="menu-big" class="menu-content">
      <li class="col-md">
         <a href="#appointments/next">
        	   <i class="fa fa-calendar-o fa-lg"></i> &nbsp; Próximas Citas
         </a>
      </li>

      <li data-toggle="collapse" data-target="#products" class="collapsed active">
         <a href="#patient/list"><i class="fa fa-user fa-lg"></i> &nbsp; Pacientes <span class="arrow"></span></a>
      </li>
      <li data-toggle="collapse" data-target="#service" class="">
         <a href="#practice/list"><i class="fa fa-clock-o fa-lg"></i> &nbsp; Prácticas y Horarios <span class="arrow"></span></a>
      </li>  
        <ul class="sub-menu collapse in" id="service">
         <a href="#practice/intervals"><li>Ausencias</li></a>
        </ul>
      <li>
      	<a href="#">
        		<i class="fa fa-envelope-o fa-lg"></i> &nbsp; Mensajes
        	</a>
      </li>
   </ul>
</div>