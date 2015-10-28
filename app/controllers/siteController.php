<?php 
	
	class siteController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
	
		public function index() {
			$this->view->title = SITE_NAME. " Tu Salud está aquí";
			$this->view->render('site/registerforbeta');				
		}
		
		public function mailbetalist() { //register in pre beta			
			
			$array_data['email'] = escape_value($_POST['email']);
			//$array_data['name'] = escape_value($_POST['name']);
			$array_data['whoami'] = escape_value($_POST['whoami']);
			$array_data['ip_address'] = $this->helper->getIpAddress();
			
			
			//Check if already registered
			$already_registered = $this->model->getBetaListed($array_data['email']);
			//print_r($already_registered); exit;
			if (empty($already_registered)) {
				//Register
				 $this->helper->insert('mailbetalist', $array_data);
				echo "Recibirás la invitación al Demo en su lanzamiento. Te avisaremos";
			
			} else {
				echo "Ya estás anotado para recibir la invitación al Demo. Te avisaremos";				
			}
							
		}
		
		public function demo() {
			
			$this->view->title = SITE_NAME;
				
			$this->view->buildpage('site/index');			
		}
		
		public function login() {
			
			$this->view->title = SITE_NAME;	
			$this->view->render('default/head');
			$this->view->render('login/index');		
			$this->view->render('default/footer');				
		}
		
		public function test() {			
			
			$this->view->render('default/head');	
			$this->view->render('default/nav');	
			$this->view->render('test');		
			$this->view->render('footer');	
		}
		
		public function search(){
			
			foreach ($_POST as $key => $value) {
								
				$campo = escape_value($key);
				$valor = escape_value($value);
				switch ($key) {
					case 'specialty':
						$specialty=$valor;
						break;	
					case 'city':
						$city=$valor;
						break;	
					case 'date':
						$date=$valor;
						break;	
				}
			}
			$this->model->search_list();
		}
		
		
		public function calendar($practice){
			$this->loadModel('doctor');
			@$this->view->practice_days = doctorModel::list_avaliable_days($practice);
			$this->view->practice=$practice;
			//var_dump($this->view->horario);
			$this->view->buildpage('site/calendar');
		}
		
		public function crea_json_prueba(){
			$this->loadModel('doctor');
			@$array_doctores = doctorModel::listDoctor('doctor.name');
			$i=0;
			foreach( $array_doctores as $doctores){
				$array_final[$i]["name"]=$doctores["name"];
				$array_final[$i]["specialty"]=$doctores["specialty"];
				$array_final[$i]["image"]=$doctores["image"];
				$array_practicas = doctorModel::listDoctorPractice($doctores["id_doctor"]);
			//	var_dump($array_practicas);
				$array_final[$i]["practice"]=$array_practicas;
				
				
				$i++;
			}
			//var_dump($array_final);
			createJsonDoctor($array_final);
		}
		
		function redirect($controller, $method) {
								
			//Auth::handleLogin($controller);	
			
			if(!empty($method)) {
				$full_url = $controller."/".$method;
			} else {
				$full_url = $controller;
			}
			header('location: '.URL.$full_url);
				
		}
		
		function doctor($method='') {			
			$controller = 'doctor';
			$this->redirect($controller, $method);							
		}

		function payment() {
			//Carge la info de pago
			//Envie el json o array
			//imprime la vista de resumen de pago
		}
		
		
	}
		
?>