<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>">
<div class="dates-timeline col-lg-12 col-xs-12">
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
					<h1><?php echo $practice['name']; ?></h1>						
						<!--Appointments -->
						<div class="col-lg-12 col-xs-12 row appointments-list">
							<?php 
								$p = 0;
								foreach ($practice['appointments'] as $appointment) { 
								?>					
									<div class="col-lg-3 col-xs-3 patient-pic text-center">
										<img  src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle" />
										<h4><?php echo $appointment['patient_data'][0]['name'] . " ". $appointment['patient_data'][0]['lastname']; ?></h4>
										<h6><?php echo $appointment['suggested_time_appointment']; ?></h6>
									</div>
								
							<?php $p++; } ?>
							
						</div>							
						
					</div>
			<?php }
			} ?>
		</div>
		<div class="col-lg-12 col-xs-12 date-spacer"></div>
		
	<?php $i++; } ?>
</div>