<?php
	
	class patientController extends Controller {

		public function __construct() {
	
			parent::__construct();
			//Auth::handleLogin('panel');	 
			$this->view->userdata = $this->user->getUserdata();
        	$this->view->userdata = $this->view->userdata[0]; 
	
		}
		
		public function index($id) {
			$test = $this->model->getPatientBy("id", $id);
			print_r($test);
		}



		public function add($secondparameter, $tempkey="") {

			//Get Previous
			$tempdata = Api::getTempRecord("array", $this->view->userdata['id'], $tempkey);
			$this->view->tempkey = $tempdata[0]['tempkey'];
			$this->view->tempdata = json_decode($tempdata[0]['data'], TRUE);

			switch ($secondparameter) {
				case 'step2': 	$template = "add-physical-data"; 			break;
				case 'step3':	$template = "add-extra";			break;
				case 'step4':	$template = "add-preview";			break;
			}

			$this->view->render("patient/".$template);			
		}

		//Processes Steps
		function process ($step="", $step_id="") {
			
			$array_data = array();
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);	
				if ($field_data != "") { //only filled data?
					$array_data[$field] = $field_data;
				}
			}
			unset($array_data['submit']);

			if (!empty($step_id) && $step_id > 0){

				//Invocar TEMP				
				require_once('tempController.php');	
				$temp = new tempController;	
				$temp->save("noresponse"); //$this->temp("save", "noresponse");	

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
				$response["tempkey"] = $array_data['tempkey'];
				
				echo json_encode($response);
			} else {
				$this->processSingle($array_data);
			}
		}

		//Processes Single Record. TODO Make this function only accesible from Process
		function processSingle($array_data) {

			$array_patient['username'] 	= $array_data['email'];
			$array_patient['name']		= $array_data['name'];
			$array_patient['lastname']	= $array_data['lastname'];
			$array_patient['email']		= $array_data['email'];
			$array_patient['id_card']	= $array_data['id_card'];
			$array_patient['birth']		= $array_data['manage_time_slots'];
			$array_patient['gender']	= $array_data['gender'];
			$array_patient['phone']		= $array_data['phone'];
			$array_patient['data']		= json_encode($array_data);
			$array_patient['avatar']	= $array_data['avatar'];					

			//Create the patient
			$array_patient['role'] = 'patient';
			$array_patient['status'] = 'sleep'; //Doctor is creating the patient, there for is 'sleep' for user
			//Register User				
			require_once('usersController.php');	
			$users = new usersController;	
			$create_user = $users->create($array_patient);	
			
			if ($create_user > 0) {				
				
				//DELETE TEMP DATA
				$this->helper->delete('temporal_data', $array_data['tempkey'], 'tempkey');

				$response["tag"] = "process";
				$response["success"] = 1;
				$response["error"] = 0;	
				$response["response"] = "created";

				echo json_encode($response);

			} else {
				//error
				echo "error";
			}

		}
           

	}
?>