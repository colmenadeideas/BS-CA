<?php

class panelController extends Controller {

	public function __construct() {
		
		parent::__construct();
		//Auth::handleLogin('panel');
        $this->view->title = "Doctor PANEL";	 //Temporarly defined to avoid individual var
		
	}
	
	public function index(){
        
		$this->view->userdata = $this->user->getUserdata();		
		
		$this->view->buildpage("panel/appointments/next", "doctor");
	}
	
	public function appointments($date_range, $days) {
		
		//Get Next Appointments
		$this->view->appointments = $this->api-> appointments("array" , "doctor", /*$this->view->userdata[0]['id']*/ '22');
		
		if ($this->view->appointments['tag'] == 'practices' && $this->view->appointments['empty'] == 1) {
			// Doctor hasn't add PRACTICES
			//TODO: suggest add practices
			$this->view->render("panel/appointments/none", "doctor");
			
		} else 
		if ($this->view->appointments['tag'] == 'appointments' && $this->view->appointments['empty'] == 1) {
			
			$this->view->render("panel/appointments/none", "doctor");
			
		} else {
						 
			$this->view->render("panel/appointments/next", "doctor");
		}
	}
	
	public function practice($action) {
		$this->view->username=array("id"=>"22");
		switch ($action) {
			case 'add':
				$template = "add";
				break;
			
				case 'quote':
					
				$template = "quote";
					
				//list
				$this->view->practices = $this->api-> practices("array" , "doctor", /*$this->view->userdata[0]['id']*/ '22');
				
				if ($this->view->practices['empty'] != 1) {
					
					$template = "quote";
					
				} else {
					
					$template = "none";
					
				}
		
				break;
				case 'cost':
				$template = "cost";
				break;
				case 'settings':
					$this->view->practices = $this->api-> practices("array" , "doctor", /*$this->view->userdata[0]['id']*/ '22');
					$template = "settings";
				break;						
				default:
				//list
				$this->view->practices = $this->api-> practices("array" , "doctor", /*$this->view->userdata[0]['id']*/ '22');
				
				if ($this->view->practices['empty'] != 1) {
					
					$template = "list";
					
				} else {
					
					$template = "none";
					
				}
		
				break;
		}

		$this->view->render("panel/practices/".$template);
	}
	
	/*public function index($id){
		
		//TODO pasar parametros desde variable
		
		$appointments = $this -> api ->appointments("array", "doctor", $id);
		
		if ($appointments['empty'] ==1){
			$this->view-> render('panel/head');
			$this->view-> render('panel/appointments_none');
			$this->view-> render('panel/footer');
		}else{
			//HAY CITAS
			
			
			//print_r($appointments);
							
				$this->view->appointments = $appointments;
				$patient = $this->api->patient($arreglo="json", $id);
			//page
			$this -> view -> render('panel/head');
			$this -> view -> render('panel/appointments_home');
			$this -> view -> render('panel/footer');
			
		
		}
	}*/

	public function patient($action) {
		$this->view->username=array("id"=>"22");
		switch ($action) {
			case 'id':
				$template = "id";
				break;
			case 'register':
				$template = "register";
				break;
			case 'step2':
				$template = "step2";
				break;	
			case 'step3':
				$template = "step3";
				break;					
			default:
				$template = "register";
				break;
		}

		$this->view->render("panel/patient/".$template);
	}
	public function doctor($action) {
		$this->view->username=array("id"=>"22");
		switch ($action) {
			case 'breaks':
				$template = "breaks";
				break;	
			case 'settings':
				$template = "settings";
				break;								
			default:
				$template = "breaks";
				break;
		}

		$this->view->render("panel/doctor/".$template);
	}
		

	function pruebaparadavid() {

		$array_practice['id_doctor'] 	= "22";
		// paso 1 el ID del doctor
		$reg = $this->model->getLastPractice("",$array_practice['id_doctor'], 'id_doctor');
		 echo $reg[0]['id'] ;
		 echo '<br>';
		 $array_practice['max_days_ahead'] 	= "66";
		
		 // paso 2 actualizar los datos del doctor co el iD encontrado en el paso 1
		$s = $this->helper->update('doctor_practice', $reg[0]['id'], $array_practice);
		

		$reg2 = $this->model->getLastPractice("",$array_practice['id_doctor'], 'id_doctor');
		print_r($reg2);
		// $reg = $this->model->getLastPractice("",$array_practice['id_doctor'], 'id_doctor');
		


	}
	
	function processpractice() {
			
			$array_data = array();	
			
			// getting all the POST variables
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);				
				$array_data[$field] = $field_data;
			}
			$array_practice['id_doctor'] 	= $array_data['id_doctor'];

			// setting up the variables of the ajax request	
			if ($array_data['param'] == "add") {				
				
				$array_practice['id_clinic'] 	= "3";
				$array_practice['address_details'] 	= $array_data['address'];
				/*$array_practice[''] 	= $array_data[''];
				$array_practice[''] 	= $array_data[''];
				$array_practice[''] 	= $array_data[''];
				$array_practice[''] 	= $array_data[''];
				$array_practice[''] 	= $array_data[''];*/
				if ($array_data['isclinic'] == 1){
				$array_practice['id_clinic'] = $array_data['clinic_id'];
				$array_practice['address_details'] 	= false;
				}				
				if ($array_data['isclinic'] == 0){			
				$array_practice['id_clinic'] = 101;			
				$array_practice['address_details'] = $array_data['address'];
				}
				// insert values into database
				$insert_practice = $this->helper->insert('doctor_practice', $array_practice);

			}
			elseif ($array_data['param'] == "quote") 
			{
				// get curent doctor id
				$reg = $this->model->getLastPractice("",$array_practice['id_doctor'], 'id_doctor');
				$array_practice['max_days_ahead'] 	= $array_data['max_days'];
		
				// update max_days_ahead on current doctor's practice
				$s = $this->helper->update('doctor_practice', $reg[0]['id'], $array_practice);
				$insert_practice = $this->model->getLastPractice("",$array_practice['id_doctor'], 'id_doctor');

			}
			elseif ($array_data['param'] == "cost") {
				$array_practice['consultation_reason'] 	= $array_data['reason'];
				$array_practice['price'] = $array_data['cost'];
				$array_practice['initial_interval'] = $array_data['time-lapse'];
				// insert values into database
				$insert_practice = $this->helper->insert('doctor_practice_schedule_intervals_matrix', $array_practice);
			}

			//$already_registered =	$this->model->getPractice("",$array_data['id_doctor'], 'id_doctor');
			
				if ($insert_practice > 0) {					
					//processquote();					
					echo "true";									
				}	else{					
					echo "Error: " . mysql_error();
				}	
				
				
			}


function processquote() {
			
			$array_data = array();	
			$array_quote = array();
			
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);				
				$array_data[$field] = $field_data;
			}
			
			
			
			//$array_quote['id_practice'] = $array_data['id_practice'];
			
			//for ($x = 0; $x <= 6; $x++) {
				//$day="day_".$x;
				//$array_quote['day'] = $array_data[$day];
			//	$array_quote['quota'] = $array_data['quota'];
				
			//	$array_quote['id_practice']=11;
			//	$array_quote['quota']=15;
				
			  
				//$insert_quote = $this->helper->insert('doctor_practice', $array_quote);
				
				//static function update($tablename, $id, $vars, $by ='id'){
				//$insert_quote = $this->helper->update('doctor_practice', 2, $array_quote);
				
			//} 

					$array_quote['id_practice']=11;
					$array_quote['quota']=15;
				
					$insert_quote = $this->helper->update('doctor_practice_schedule', 2, $array_quote);
			
			
			
			//$array_practice['id_doctor'] 	= $array_data['id_doctor'];
			//$array_practice['id_doctor'] 	= "22";
			//$array_practice['id_clinic'] 	= "3";
			
			//$array_practice['address_details'] 	= $array_data['address'];
			
			//if ($array_data['isclinic']==1){
			//$array_practice['id_clinic'] 	= $array_data['clinic_id'];
			//$array_practice['address_details'] 	= "";
			//}
			
			//if ($array_data['isclinic']==0){
			
			//$array_practice['id_clinic'] 	= 101;
			
			//$array_practice['address_details'] 	= $array_data['address'];
			//}

			
			//$already_registered =	$this->model->getPractice("",$array_data['id_doctor'], 'id_doctor');
			
			
			
			
				if (!$insert_practice > 0) {
					
					
					echo "Registrado";
					
				}	else{
					
					echo "No Registrado";
				}	
				
				
			}
	
}
?>