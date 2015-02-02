    <div class="container">	
       <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<?php
  // print_r( $this->appointments['dates']);
?>
<div class="rows">
	<?php
	 foreach($this->appointments ['dates'] as $cita){
		 ?>
  <div class="col-md-12">
	<div class="col-md-1">
	 	 	<img src="<?php echo IMG; ?>default-male.png" class="img-circle img-responsive"><?php echo $cita['date_string'];?>
	 	 	</div>
	 	<?php
	 	foreach ($cita['practice'] as  $practice){
			?>
			<div class="col-md-1">
				
 	 	 <?php echo $practice['id_state'];  ?>
	 	 	</div> 	
	 	<?php 		
			$practice['address'];
			$practice['id_zone'];
			$practice['id_state'];
			$practice['id_cyte'];
				
			foreach ($practice['appointments'] as $appointment){
				?>
				<div class="col-md-2">
					
	 	 	 <?php echo $appointment['id'];?>
	 	 	 
	 	 	 <?php echo $appointment['date'];?>
 	 	 	<?php echo " ". $appointment['id_clinica'] ; ?>
 	 	 </div>
	 	<?php
	 			// $appointment['id'];
				// $appointment['id_doctor'];
				// $appointment['id_clinica'];
				// $appointment['date'];
				// $appointment['suggested_time_appointment'];
				
				foreach ($appointment['patient_data'] as $patient_data){
			?>
		<div class="col-md-1">
	 	 <div class="col-md-1 col-md-2">
	 	 	<?php echo $patient_data['name']; echo "&nbsp;".$patient_data['lastname'];?>
	 	 	<?php echo $patient_data['email']; ?>
	 	 	<?php echo " ".$patient_data['status'];?>
	 	 	  </div>
	 	</div>
	 	<?php
	 				$appointment['lastname'];
					$patient_data['name'];
					$patient_data['lastname'];
					$patient_data['email'];
					$patient_data['status'];
				}
			}
		}
	}
	?>
	</div>
<div class="col-md-12" align="center"><input class="bootstrap-datetimepicker-widget" type="button" value="ver mas resultados" onclick="mostrarMas();"/></div>
	
	</div>
	