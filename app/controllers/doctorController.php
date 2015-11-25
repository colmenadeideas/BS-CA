<?php
	class doctorController extends Controller {
	
		public function __construct() {
	
			parent::__construct();
	
		}
	
		public function index() {
			$this -> details();
		}
	
		// DETAILS:  Loads Doctor's View in Search with every related detail
		public function details($id) {
			
			//$appointments_time_matrix = $this->api->getPracticeIntervals();
			//api search is done in JS
			$this -> view -> render('doc/details');
		}
		public function preview() {
			
			//$appointments_time_matrix = $this->api->getPracticeIntervals();
			//api search is done in JS
			$this -> view -> render('doc/resume');
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