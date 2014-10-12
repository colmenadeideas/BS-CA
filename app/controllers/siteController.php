<?php 
	
	class siteController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
	
		public function index() {
			
			$this->loadModel('doctor');
			@$this->view->specialty = doctorModel::listSpecialty();
				
			$this->view->buildpage('site/index');			
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
	}
	
		
?>