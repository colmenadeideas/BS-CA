<?php  
$patient=$this->patient;


?>
<div class="col-lg-6 col-xs-6 ">
	<h1>Perfil de Paciente <?php echo $patient['id'] ; ?></h1>
	
		<img src="<?php echo IMG; ?>default-<?php if ( $patient['gender'] == "F"){ echo "female"; } else { echo "male"; } ?>.png">
		<h4><?php //print_r($patient); 
		//echo $patient['name'] . " " . $patient['lastname']; ?></h4>
		<!--ul>
			<li></li>
		</ul-->
		
	</div>
<?php   ?>