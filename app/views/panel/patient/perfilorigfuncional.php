<?php  

$patient=$this->patient['patient'];
//print_r($patient[0]['data']);
//$patientdata=$patient[0]['data'];
//print_r($patientdata[peso]);
//echo $patientdata->peso;


//print_r($this->patienthistorydetail['Detail'][0]);

//print_r($this->patienthistorydetail['Detail']);

?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="patientprofilemain">
	<center><h1>Perfil de Paciente:<br></h1>
		<h2> <?php print_r($patient[0]['name'] . " " . $patient[0]['lastname']); 
	//echo $patient['id'] ; ?></h2>
	
		<img src="<?php echo IMG; ?>default-<?php if ( $patient[0]['gender'] == "F"){ echo "female"; } else { echo "male"; } ?>.png">
	</center>
		<!--ul>
			<li></li>
		</ul-->
		
	</div>
	
	<div class="col-lg-12 col-md-12 col-sm-12 right-details" id="datospatient" no-padding" style="background-color: #0DE6C9;height: 100px;">
	
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 right-details no-padding"  >
		<div class="col-lg-12 menubar-action book-menu no-padding pestanamenu" >
			<ul class="nav nav-tabs" role="tablist" >
				<li class="col-lg-3 col-md-3 col-sm-3 pestana no-padding" style="background-color:#4E92F6; color:white;"><a class="pestana no-padding" href="#data" role="tab" data-toggle="tab"><center class="pestanac no-padding">Datos</center></a></li>
				<li class="col-lg-3 col-md-3 col-sm-3 pestana no-padding" style="background-color:#4E92F6; color:white;"><a class="pestana no-padding" href="#book-appointment" role="tab" data-toggle="tab"><center class="pestanac no-padding">Pedir Cita</center></a></li>
				<li class="col-lg-3 col-md-3 col-sm-3 pestana no-padding" style="background-color:#4E92F6; color:white; "><a class="pestana no-padding" href="#profile" role="tab" data-toggle="tab"><center class="pestanac no-padding">Perfil</center></a></li>
				<li class="active col-lg-3 col-md-3 col-sm-3 pestana no-padding" style="background-color:#4E92F6; color:white; "><a class="pestana no-padding" href="#messages" role="tab" data-toggle="tab"><center class="pestanac no-padding">Mensajes</center></a></li>
			</ul>
		</div>
		<!-- Tab panes -->
		<div class="tab-content " >
			<div class="tab-pane fade" id="data" style="margin-bottom:10%;">
			Data
					<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>
					<h4><?php echo "Telefono: ".$patient[0]['phone'] ?></h4>
					<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>	
					<h4><?php echo "Num Doc ID: ".$patient[0]['id_card'] ?></h4>
					<h4><?php echo "Fecha de nacimiento: ".$patient[0]['birth'] ?></h4>
					<h4><?php echo "Correo: ".$patient[0]['email'] ?></h4>
			</div>
			<div class="tab-pane fade" id="book-appointment" style="margin-bottom:10%;">
			Appointments
					<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>
					<h4><?php echo "Telefono: ".$patient[0]['phone'] ?></h4>
					<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>	
					<h4><?php echo "Num Doc ID: ".$patient[0]['id_card'] ?></h4>
					<h4><?php echo "Fecha de nacimiento: ".$patient[0]['birth'] ?></h4>
					<h4><?php echo "Correo: ".$patient[0]['email'] ?></h4>
			</div>
			<div class="tab-pane fade " id="profile">
			Perfil
					<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>
					<h4><?php echo "Telefono: ".$patient[0]['phone'] ?></h4>
					<h4><?php echo "Status: ".$patient[0]['status'] ?></h4>	
					<h4><?php echo "Num Doc ID: ".$patient[0]['id_card'] ?></h4>
					<h4><?php echo "Fecha de nacimiento: ".$patient[0]['birth'] ?></h4>
					<h4><?php echo "Correo: ".$patient[0]['email'] ?></h4>		
			</div>
			<div class="tab-pane fade active in" id="messages">
			  
					<div class="dates-timeline timeline-profile col-lg-12 col-xs-12">
						<?php 
							//print_r($this->appointments);
							$i = 0;
							foreach($this->appointments ['dates'] as $date){ ?>	
							<div id="date-<?php echo $date['date_string']; ?>">
								<div class="col-lg-2 col-sm-2">
									<div class="date-circle"><?php echo substr($date['date_string'], -2);  ?> 
										<div class="month"><?php $dt = DateTime::createFromFormat('!m', substr($date['date_string'], 5, -3));
															echo $dt->format('M')." '". substr($date['date_string'], 2,-6); ?>
							 			</div>
									</div>
								</div>
								<div class="col-lg-10 col-sm-10">
									&nbsp;
								</div>
							
							</div>		
							<div id="<?php echo $i."-".$date['date_string']; ?>" class="col-lg-12 col-xs-12 dates-practices">
								<?php foreach ($date['practice'] as $practice) { 
										if (!empty($practice['appointments'])) { ?>
										<!--Practice -->
										<div class="col-lg-2 col-sm-2"></div>
										<div class="col-lg-10 col-xs-10"> 
										<h1><?php //echo $practice['name']; ?></h1>						
											<!--Appointments -->
											<div class="col-lg-12 col-xs-12 row appointments-list">
												<?php 
													$p = 0;
													foreach ($practice['appointments'] as $appointment) {
														if($appointment['patient_data'][0]['id']==$patient[0]['id']){
													?>					
														<div class="col-lg-3 col-xs-3 patient-pic text-center">
															<!--span class="button-action">Ver Perfil Paciente</span--> 
															<a href="#patient/profile/<?php print_r($appointment['patient_data'][0]['id']); ?>" class="wrap-action">
															<img  src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle" />
															<h4><?php echo $appointment['patient_data'][0]['name'] . " ". $appointment['patient_data'][0]['lastname']/*. " ". $appointment['patient_data'][0]['id']*/; ?></h4>
															<h6><?php echo $appointment['suggested_time_appointment']; ?></h6>
															</a>
														</div>
													
												<?php $p++; 
													
													}
														} ?>
												
											</div>							
											
										</div>
								<?php }
								} ?>
							</div>
							<div class="col-lg-12 col-xs-12 date-spacer"></div>
							
						<?php $i++; } ?>
					</div>
			</div>
		</div>	
	</div>
<?php   ?>