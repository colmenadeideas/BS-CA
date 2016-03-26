<div class="col-sm-12 col-lg-12 nopadding">
	<div class="col-sm-8 col-lg-8 nopadding">
		<h3 class="text-center">Esta será la información de su práctica
		</h3>
	</div>
	<div class="col-sm-4 col-lg-4 nopadding">
		<input type="submit" name="next" class="btn btn-success btn-lg" value="Crear" > 	
	</div>
</div>
<div class="practice-sheet">
	<div class="col-sm-12 col-lg-12 text">
								
		<input name="isclinic" type="radio" class="isclinic" id="isclinic1" required 
			<?php if ($this->tempdata['isclinic'] == "1") { echo ' checked ="checked"'; } ?> value="1" />
		<input name="isclinic" type="radio" class="isclinic" id="isclinic2" required 
			<?php if ($this->tempdata['isclinic'] == "0") { echo ' selected ="selected"'; } ?>value="0" />
		<h4 class="division text-right">
			<a href="#" class="goAndEdit" data-goAndEdit="step1">Ubicación <i class="fa fa-pencil fa-2"></i></a>
		</h4>
		<div class="col-sm-3 col-lg-3 previewtext">
			Nombre
		</div>
		<div class="col-sm-9 col-lg-9">
			<?php 	if ($this->tempdata['isclinic'] == "1") { 
						echo $this->tempdata['clinic']; 
					 	echo $this->tempdata['clinic_details']; ?>
			<?php 	} ?>
		</div>
		
		<div class="col-sm-3 col-lg-3 previewtext">
			Dirección
		</div>
		<div class="col-sm-9 coxl-lg-9">
			<?php echo $this->tempdata['address']; ?>				
		</div>
								
		<div class="clearfix"></div>

		<!--days-->
		<h4 class="division text-right">
			<a href="#" class="goAndEdit" data-goAndEdit="step2">Horario <i class="fa fa-pencil fa-2"></i></a>
		</h4>
		<?php 
		
			for ($i=1; $i < 8; $i++) { 
				if ($this->tempdata['day_'.$i] != ""){
			?>	
			<div class="col-sm-2 col-lg-2">		
				<h4><?php echo $this->tempdata['day_'.$i]; ?></h4>
				<?php echo $this->tempdata['ini_schedule_'.$i]; ?><br>
				<?php echo $this->tempdata['end_schedule_'.$i]; ?>
			</div>
		<?php 
				} 
			} 
		?>
		<div class="clearfix"></div>
		
		<!--quote-->
		<h4 class="division text-right">
			<a href="#" class="goAndEdit" data-goAndEdit="step3">Cupos <i class="fa fa-pencil fa-2"></i></a>
		</h4>
		<div class="col-lg-4 col-md-4 col-sm-4  previewtext">Días máximos para reservar consulta</div>
		<div class="col-lg-2 col-md-2 col-sm-2 text-left"><?php echo $this->tempdata['max_days_ahead']; ?>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4  previewtext">Administrar cupos automáticamente</div>
		<div class="col-lg-2 col-md-2 col-sm-2 text-left">
			<?php if ($this->tempdata['manage_time_slots'] == "1") { echo "SI"; } else { echo "NO"; } ?>				
		</div>
		<div class="clearfix"></div>
		<?php if ($this->tempdata['manage_time_slots'] == "0") { ?>
				<br>
			<div id="days-list" class="collapse in">
				<div class="col-lg-4 col-md-4 col-sm-4  previewtext">
					Cantidad máxima de pacientes por día
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 text-left">								
				
				<?php 
					for ($i=1; $i < 8; $i++) { 
						if ($this->tempdata['day_'.$i] != ""){
						$this->tempdata['day'][] = $this->tempdata['day_'.$i];	
				?>
							<div class="col-sm-2 col-lg-2">
								<h4><?php echo $this->tempdata['day_'.$i]; ?></h4>
								<?php echo $this->tempdata['day_quote_'.$i]; ?>
							</div>
				<?php 	} 
					}
				?>
				</div>
			
			</div>
		<?php } ?>
		<div class="clearfix"></div>
		
		<!--cost-->
		<h4 class="division text-right">
			<a href="#" class="goAndEdit" data-goAndEdit="step4">Servicios <i class="fa fa-pencil fa-2"></i></a>
		</h4>
		<?php foreach ($this->tempdata['reason'] as $key => $value) { ?>
			<div class="col-sm-4 col-lg-4">	
				<h4><?php echo $value; ?></h4>

				<span class="sidetext">Bs F</span> <?php echo moneyFormat($this->tempdata['price'][$key]); ?><br>				
				<?php echo $this->tempdata['time'][$key]; ?> <span class="sidetext">min</span> 
		</div>
		<?php } ?>

	</div>
</div>