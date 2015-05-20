<?php
	class doctorController extends Controller {
	
		public function __construct() {
	
			parent::__construct();
	
		}
	
		public function index() {
			$this -> details();
			echo"hola";
		}
	
		// DETAILS:  Loads Doctor's View in Search with every related detail
		public function details($id) {
			
			//$appointments_time_matrix = $this->api->getPracticeIntervals();
			//api search is done in JS
			$this -> view -> render('doc/details');
		}
		
		
		public function calendartest() {
			
			$available_dates_matrix = $this->api->availability("array","1");
			
			define (APPOINTMENTS_INTERVAL, 30); // 30 min
			//print_r($available_dates_matrix);		
			
			
			// Build Dates ahead, based on Practice's limit max_days_ahead
		 	$start = strtotime('today UTC');
			$array_calendar = array();
			
			for($i = 0; $i<=$available_dates_matrix['max_days_ahead']; $i++){					
				$date_ahead = date ('Y-m-d', strtotime("+$i day", $start));
				$array_calendar[$i]['day'] = $date_ahead;
				$array_calendar[$i]['weekday'] = date( "D", strtotime($date_ahead)); // Mon, Fri
				$array_calendar[$i]['manage_time_slots'] = $available_dates_matrix['manage_time_slots'];
				$e=0;
				
				//Check if fits DAYS_IN matrix criteria
				foreach ($available_dates_matrix['days_in'] as $day_in_matrix) {
					
					if ($array_calendar[$i]['weekday'] == $day_in_matrix['day']) {
						//Block in case there's hours interrupting slots (breaks)
						$array_calendar[$i]['day_in'] = '1';
						$array_calendar[$i]['block'][$e]['max_quota'] = $day_in_matrix['quota'];
						$array_calendar[$i]['block'][$e]['ini_schedule'] = $day_in_matrix['ini_schedule'];
						$array_calendar[$i]['block'][$e]['end_schedule'] = $day_in_matrix['end_schedule'];
						
						//If Doctor wants OKIDOC to manage time slots (1) -->
						if ($available_dates_matrix['manage_time_slots'] == 1){
							//Create Hour Slots available
							$ini = sscanf($day_in_matrix['ini_schedule'], "%d:%d:00", $hour_ini, $minutes_ini);
							$ini__miliseconds_time = (($minutes_ini % 60) + ($hour_ini * 60)) *60;
							$end = sscanf($day_in_matrix['end_schedule'], "%d:%d:00", $hour_end, $minutes_end);
							$end__miliseconds_time = (($minutes_end % 60) + ($hour_end * 60)) *60;
							
							$range_slots = hoursRange( $ini__miliseconds_time, $end__miliseconds_time, 60 * APPOINTMENTS_INTERVAL, 'h:i a' );
							
							$array_calendar[$i]['block'][$e]['slots'] = $range_slots;
						}	
						$e++;
					}					
				}
				
				//Remove DAYS_OUT from matrix criteria, if match
				$d = 0;
				foreach ($array_calendar as $calendar_day) {
					foreach ($available_dates_matrix['days_out'] as $day_out) {
						if ($calendar_day['day'] == $day_out['date']) {
							//Remove from Calendar View
							unset($array_calendar[$d]);
						}						
					}
					$d++;
				}
			}

			print_r($array_calendar);
			
		}
			//DONT USE THIS NOW, WILL USE MAYBE LATER FOR DOCTOR'S PANEL
		public function calendar() {
			//Start Date			
			 $dateComponents = getdate();
		     $day = $dateComponents['mday']; 	
		     $month = $dateComponents['mon']; 			     
		     $year = $dateComponents['year'];
			 
			 //servira? weekday
			 $weekday = $dateComponents['weekday'];
			 
			 //time
			 $minute = $dateComponents['minutes'];
			 $hour = $dateComponents['hours'];
			//print_r($dateComponents);
			
			
			 // Create array containing abbreviations of days of week.
		     $daysOfWeek = array('S','M','T','W','T','F','S');		
		     // What is the first day of the month in question?
		     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);		
		     // How many days does this month contain?
		     $numberDays = date('t',$firstDayOfMonth);		
		     // Retrieve some information about the first day of the month in question.
		     $dateComponents = getdate($firstDayOfMonth);		
		     // What is the name of the month in question?
		     $monthName = $dateComponents['month'];		
		     // What is the index value (0-6) of the first day of the month in question.
		     $dayOfWeek = $dateComponents['wday'];
		
			
			
			
			//$calArray['daysOfWeek'] = $dayOfWeek;
			
			
			if ($dayOfWeek > 0) { 
		          $calArray .= "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
		    }
			print_r($calArray);		
			
			
			
			
			// Create the table tag opener and day headers
			$calendar = "<table class='calendar'>";
		    $calendar .= "<caption>$monthName $year</caption>";
		    $calendar .= "<tr>";
			foreach($daysOfWeek as $day) {
		          $calendar .= "<th class='header'>$day</th>";
		    } 
 			$currentDay = 1;
		    $calendar .= "</tr><tr>";
			
			if ($dayOfWeek > 0) { 
		          $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
		    }
			$month = str_pad($month, 2, "0", STR_PAD_LEFT);
		  
		     while ($currentDay <= $numberDays) {		
		          // Seventh column (Saturday) reached. Start a new row.		
		          if ($dayOfWeek == 7) {		
		               $dayOfWeek = 0;
		               $calendar .= "</tr><tr>";		
		          }
		          
		          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);		          
		          $date = "$year-$month-$currentDayRel";		
		          $calendar .= "<td class='day' rel='$date'>$currentDay</td>";		
		          // Increment counters		 
		          $currentDay++;
		          $dayOfWeek++;		
		    }
		     
		     
		
		     // Complete the row of the last week in month, if necessary
		
		     if ($dayOfWeek != 7) { 		     
		          $remainingDays = 7 - $dayOfWeek;
		          $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>"; 		
		     }
		     
		     $calendar .= "</tr>";
		
		     $calendar .= "</table>";
		
		     echo $calendar;
		     
		    
		}






			function subirimagen(){
						//http://casamadrugada.net/tutoriales/php/como-subir-archivos-imagenes-utilizando-php-y-mysql/
						
						//conexion a la base de datos
				//mysql_connect("servidor", "usuario", "contrasena") or die(mysql_error()) ;
				//mysql_select_db("base_de_datos") or die(mysql_error()) ;
				
				//comprobamos si ha ocurrido un error.
				if ($_FILES["imagen"]["error"] > 0){ //$_FILES es un arreglo que se almacena automaticamente cuando se crea un archivo con el input file
					echo "ha ocurrido un error";
				} else {
					//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
					//y que el tamano del archivo no exceda los 100kb
					$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
					$limite_kb = 100;
				
					if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
						//esta es la ruta donde copiaremos la imagen
						//recuerden que deben crear un directorio con este mismo nombre
						//en el mismo lugar donde se encuentra el archivo subir.php
						$ruta = "imagenes/" . $_FILES['imagen']['name'];
						//comprobamos si este archivo existe para no volverlo a copiar.
						//pero si quieren pueden obviar esto si no es necesario.
						//o pueden darle otro nombre para que no sobreescriba el actual.
						if (!file_exists($ruta)){
							//aqui movemos el archivo desde la ruta temporal a nuestra ruta
							//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
							//almacenara true o false
							$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
							if ($resultado){
								$nombre = $_FILES['imagen']['name'];
								//@mysql_query("INSERT INTO imagenes (imagen) VALUES ('$nombre')") ; //se guarda el nombre aleatorio del archivo guardado en tabla imagenes
								echo "el archivo ha sido movido exitosamente";
							} else {
								echo "ocurrio un error al mover el archivo.";
							}
						} else {
							echo $_FILES['imagen']['name'] . ", este archivo existe";
						}
					} else {
						echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
					}
					}
				  }
				}

			function verimagen(){
									//conexion a la base de datos
							mysql_connect("servidor", "usuario", "contrasena") or die(mysql_error()) ;
					mysql_select_db("base_de_datos") or die(mysql_error()) ;
					
					//si la variable imagen no ha sido definida nos dara un advertencia.
					$id = $_GET['imagen'];
					
					//vamos a crear nuestra consulta SQL
					$consulta = "SELECT imagen FROM imagenes WHERE imagen_id = $id";
					//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
					//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
					$resultado= @mysql_query($consulta) or die(mysql_error());
					
					//si el resultado fue exitoso
					//obtendremos el dato que ha devuelto la base de datos
					$datos = mysql_fetch_assoc($resultado);
					//ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
					$ruta = "imagenes/" . $datos['imagen'];
					
					//ahora solamente debemos mostrar la imagen
					echo "<img src='$ruta' />";
							
			}
			
			
			function vertodasimagenes(){
		
		
					//conexion a la base de datos
			mysql_connect("servidor", "usuario", "contrasena") or die(mysql_error()) ;
			mysql_select_db("base_de_datos") or die(mysql_error()) ;
			
			//vamos a crear nuestra consulta SQL
			$consulta = "SELECT imagen FROM imagenes";
			//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
			//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
			$resultado= @mysql_query($consulta) or die(mysql_error());
			
			//si el resultado fue exitoso
			//obtendremos los datos que ha devuelto la base de datos
			//y con un ciclo recorreremos todos los resultados
			while ($datos = @mysql_fetch_assoc($resultado) ){
				//ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
				$ruta = "imagenes/" . $datos['imagen'];
			
				//ahora solamente debemos mostrar la imagen
				echo "<img src='$ruta' />";		
		
				}
				}
			
?>