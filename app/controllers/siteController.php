<?php 
	
	class siteController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
	
		public function index() {
			
			$this->loadModel('doctor');
			@$this->view->speciality = doctorModel::listSpeciality();
				
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
	}
		
?>