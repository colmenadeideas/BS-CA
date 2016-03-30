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
		

	

	// Métodos Listos
	// TODO revisar si lo podemos unificar en AppointmentsController, para que asi lado paciente y lado Panel usen 1 sola funcion
	public function appointments($action = "next", $from_date = "", $to_date = "") {

		switch ($action) {
			// TODO chack if we can use this lines that were duplicated into appointmentsController.php
			case 'add':
				$secondparameter = $from_date; 
				$tempkey = $to_date;
				//has
				//-- step 1
				//---- step 2
				//------ step 3
				//-------- step 4

				if (!empty($secondparameter)) {

					//Get Previous
					$tempdata = Api::getTempRecord("array", $this->view->userdata['id'], $tempkey);
					$this->view->tempkey = $tempdata[0]['tempkey'];
					$this->view->tempdata = json_decode($tempdata[0]['data'], TRUE);

					switch ($secondparameter) {
						case 'step2': 	$template = "add-date"; 			break;
						case 'step3': 	$template = "add-time"; 			break;
						case 'step4':	$template = "add-patient";			break;
					//	case 'step5':	$template = "add-preview";			break;
					}

				} else {
					$this->view->tempkey = generateTempKey($this->view->userdata["username"]);			
					$template = "add";
				}

				$this->view->render("panel/appointments/".$template);
			

				
				break;

			case 'next':
				//Get Next Appointments
				//Appointments/arreglo/doctor/22/2014-02-09/2014-02-10/practice/11/
				
				$this->view->appointments = Api::appointments("array" , "doctor", $this->view->userdata['id'], $from_date, $to_date);

				if ($this->view->appointments['tag'] == 'practices' && $this->view->appointments['empty'] == 1) {
					// Doctor hasn't add PRACTICES
					//TODO: suggest add practices
					$this->view->render("panel/appointments/none", "doctor");
					
				} else if ($this->view->appointments['tag'] == 'appointments' && $this->view->appointments['empty'] == 1) {
					
					$this->view->render("panel/appointments/none", "doctor");
					
				} else {
								 
					$this->view->render("panel/appointments/next", "doctor");
				}

				break;


			case 'date':
				$this->view->appointments = Api::appointments("array" , "doctor", $this->view->userdata['id'], $from_date, $from_date);
				$this->view->render("panel/appointments/detail", "doctor");
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
	


	//TODO me lleve process appointments a ApointmentsController
	function process ($what, $step="", $step_id="") {

		switch ($what) {

			case 'appointments':
				
				$array_data = array();	
				
				foreach ($_POST as $key => $value) {
					$field = escape_value($key);
					$field_data = escape_value($value);	
					if ($field_data != "") { //only filled data?
						$array_data[$field] = $field_data;
					}
				}
				unset($array_data['submit']);
				
				if (!empty($step_id)){
					$template = "appointments/add/step".($step_id+1);	
					$this->temp("save", "noresponse");	
					switch ($step_id) {
						case 1: 							
							break;
						
						default:
							$previous = Api::getTempRecord("array", $array_data['id_doctor'], $array_data['tempkey']);
							if (!empty($previous)){
								$this->view->tempdata = json_decode($previous[0]['data'], TRUE);
							}							
							break;							
					}
					$response["tag"] = "process";
					$response["success"] = 1;
					$response["error"] = 0;	
					$response["response"] = "saved";
					$response["template"] = $template;
					$response["tempkey"] = $array_data['tempkey'];
					
					echo json_encode($response);	
				}
				break;		
		}
	}
	

		
}
?>