<?php 
foreach ($this->patients['patients'] as $patient) { 
	//print_r($patient);
	
	?>
	<div class="col-lg-4 col-xs-4 patient-item">
		<img src="<?php echo IMG; ?>default-<?php if ( $patient['gender'] == "F"){ echo "female"; } else { echo "male"; } ?>.png">
		<h4><?php //print_r($patient); 
		echo $patient['name'] . " " . $patient['lastname']; ?></h4>
		<ul>
			<li></li>
		</ul>
		<a href="#patient/profile/<?php print_r($patient['id']); ?>" class="wrap-action">
		<span class="button-action">Ver Perfil Paciente</span> 
		</a>
	</div>
<?php } ?>
<div class="add-action col-lg-12 col-xs-12 text-right">
	
	<a href="#patient/add/" class="wrap-action">
		<span class="button-instruction">Agregar un Paciente</span> <span class="btn-action btn-add">+</span>
	</a>
</div>