<?php

// git event

class panelController extends Controller {

	public function __construct() {
		
		parent::__construct();
		//Auth::handleLogin('panel');
       // $this->view->title = SITE_NAME . " | Panel" ;	 //Temporarly defined to avoid individual var
       // $this->view->userdata  = array("id"=>"22", "username" => "adlarez@besign.com.ve", "role" => "doctor" 	);
        $this->view->userdata = $this->user->getUserdata();
        $this->view->userdata = $this->view->userdata[0];
        
	}
	
	public function index(){
       
		$this->view->buildpage("panel/appointments/next", "doctor");
	}
	

	public function patient($action, $secondparameter="") {
		switch ($action) {
			case 'add':				
				$this->view->tempkey = generateTempKey($this->view->userdata["username"]);					
				$this->view->render("patient/add");
				break;	

			case 'profile':	
				//$id = escape_value($secondparameter);	
				//$this->view->patient = Api::patient("array" , $id);
				//$this->view->patient = $this->view->patient['patient'][0];
				$this->view->render("patient/profile");
				break;
				
				/*
			case 'profile':
				
				$this->view->patient =Api::patient($arreglo="array",$id);
				
				//$PacientHistoryID = Api::getPacientHistoryID($id);
				
				//$PacientHistoryID= Api::getPacientHistoryID($arreglo="array",$id);
				
				$this->view->patienthistorydetail=Api::patienthistorydetail($arreglo="array" ,$id);
				
				//$this->view->PacientHistoryByDate=Api::getPacientHistoryByDate($PacientHistoryID[0]['id']);
				
				$this->view->appointments = Api::appointments("array" , "doctor", $this->view->userdata['id'], $from_date, $to_date);
				
				$template = "perfil";
				break;
				
			case 'get':
				$template = "id";
				break;

				*/

			default:
				//list
				$this->view->patients = Api::patients("array" , "doctor", $this->view->userdata['id']);

				if ($this->view->patients['empty'] != 1) {
					$this->view->render("patient/list");
				} else {
					$this->view->render("patient/none");
				}				
				break;
		}
	}


	public function nav($action) {

		switch ($action) {	
			case 'nav-small':
				$template = "nav-small";
				break;
			case 'nav-small':
				$template = "nav-big";
				break;		
			default:
				$template = "nav-big";
				break;
		}

		$this->view->render("panel/".$template);
	}
		

	
	public function appointments($action = '', $secondparameter = "", $thirdparameter = "") {

		$from_date 	= $secondparameter;
		$to_date 	= $thirdparameter;

		switch ($action) {
			// TODO check if we can use this lines that were duplicated into appointmentsController.php
			case 'add':
				
				$this->view->tempkey = generateTempKey($this->view->userdata["username"]);					
				$this->view->render("appointments/doctor/add");				
				break;

			case 'next':
				//Get Next Appointments
				//Appointments/arreglo/doctor/22/2014-02-09/2014-02-10/practice/11/		
				$this->view->appointments = Api::appointments("array" , "doctor", $this->view->userdata['id'], $from_date, $to_date);

				if ($this->view->appointments['tag'] == 'practices' && $this->view->appointments['empty'] == 1) {
					// Doctor hasn't add PRACTICES
					//TODO: suggest add practices
					$this->view->render("appointments/doctor/none");
					
				} else if ($this->view->appointments['tag'] == 'appointments' && $this->view->appointments['empty'] == 1) {
					
					$this->view->render("appointments/doctor/none");
					
				} else {
								 
					$this->view->render("appointments/doctor/next");
				}

				break;


			case 'date':
				$this->view->appointments = Api::appointments("array" , "doctor", $this->view->userdata['id'], $from_date, $from_date);
				$this->view->render("appointments/doctor/next-detail");
				break;
		}		
	
	}

	/* TODO Igualar este concepto: PanelController solo tiene los build, y la lógica de cada proceso vive en otros controladores*/
	public function practice($action = '', $secondparameter = "") {
		switch ($action) {
			case 'add':
				
				$this->view->tempkey = generateTempKey($this->view->userdata["username"]);					
				$this->view->render("practices/add");

				break;	
			case 'intervals':

				switch ($secondparameter) {
					case 'add':
						//TODO: es para todas las clinicas? o para una sola por vez
						$this->view->render("practices/add-intervals");
						break;
					
					default:
						//list
						$this->view->render("practices/list-intervals");
						break;
				}
				break;			

			default:
				//list
				$this->view->practices = Api::practices("array" , "doctor", $this->view->userdata['id']);
			
				if ($this->view->practices['empty'] != 1) {
					$this->view->render("practices/list");
				} else {
					$this->view->render("practices/none");
				}
				
				break;
		}
	}

}
?>