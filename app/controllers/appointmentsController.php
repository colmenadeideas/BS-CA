<?php
	class appointmentsController extends Controller {
	
		public function __construct() {
	
			parent::__construct();
	
		}

		function process ($step="", $step_id="") {
			$array_data = array();					
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);	
				if ($field_data != "") { //only filled data?
					$array_data[$field] = $field_data;
				}
			}
			
			if (!empty($step_id) && $step_id > 0){

				//Invocar TEMP				
				require_once('tempController.php');	
				$temp = new tempController;	
				$temp->save("noresponse");

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
			
			//If No Patient_id, create Patient
			if($array_data['patient_id'] == "" || !isset($array_data['patient_id'])) { 
				//Create Patient _id
				$array_patient['name'] 			= $array_data['name'];
				$array_patient['lastname'] 		= $array_data['lastname'];
				$array_patient['email'] 		= $array_data['email'];
				$array_patient['id_card'] 		= $array_data['id_card'];
				$array_patient['birth'] 		= $array_data['birth'];
				$array_patient['gender'] 		= $array_data['gender'];
				$array_patient['phone'] 		= $array_data['phone'];
				$array_patient['creationdate'] 	= date("Y-m-d h:i:s");
				$array_patient['status'] 		= 'sleep';

				$array_patient['cellphone'] 	=	$array_data['cellphone'];
				$array_patient['blood_type'] 	=	$array_data['blood_type'];	
				$array_patient['blood_symbol'] 	=	$array_data['blood_symbol'];
				$array_patient['height'] 		=	$array_data['height'];
				$array_patient['weight'] 		=	$array_data['weight'];
				$array_patient['age'] 			=	$array_data['age'];

				$array_patient['data'] 			= json_encode($array_patient);
				
				require_once('patientController.php');	
				$patient = new patientController;					
				$insert_patient = $patient->processSingle($array_patient);

				if ($insert_patient > 0) {
					$array_appointment['id_patient'] = DB::insertId();
				} else {
					//echo "error";
				}
			} else {
				$array_appointment['id_patient'] = $array_data['patient_id'];
			}
				// con id de paciente
			//Construir Cita
			$array_appointment['id_doctor']				=	$array_data['id_doctor'];
			$array_appointment['id_practice']			=	$array_data['id_practice'];
			$array_appointment['date']					=	$array_data['date'];
			$array_appointment['id_practice_schedule']	=	$array_data['id_practice_schedule'];

			$insert_appointment = $this->helper->insert('appointments', $array_appointment);

			if ($insert_appointment > 0) {
				//DELETE TEMP DATA
				$this->helper->delete('temporal_data', $array_data['tempkey'], 'tempkey');

				$response["tag"] = "process";
				$response["success"] = 1;
				$response["error"] = 0;	
				$response["response"] = "created";

				echo json_encode($response);

			/* 
			Others needed, for later on
			- suggested_time_appointment	
			- conditions
			*/

			} else {
				echo "error";
			}
		}

		function add($step = "", $to_date = "") {

			$secondparameter = $step; 
			$tempkey = $to_date;
			//has
			//-- step 1
			//---- step 2
			//------ step 3
			//-------- step 4

			if (!empty($secondparameter)) {

				//Get Previous
			//	$tempdata = Api::getTempRecord("array", $this->view->userdata['id'], $tempkey);
			//	$this->view->tempkey = $tempdata[0]['tempkey'];
			//	$this->view->tempdata = json_decode($tempdata[0]['data'], TRUE);

				switch ($secondparameter) {
					case 'step2': 	$template = "appointments/patient/add-reason"; 	break;
					case 'step3': 	$template = "appointments/patient/add-date"; 	break;
					case 'step4': 	

						//if loggedIn 
						$user = $this->user->getUserdata();
				        if (!empty($user)) {
				        	//$role = User::get('role'); TODO se usarán los roles para definir acciones en la parte SITE paciente?
				        	//if ($role == ' patient') {
								$this->add("step5");
				        	//}

				        } else {
				        	$template = "appointments/patient/identify";
				        }
						break;
						
					case 'step5':		
						$template = "appointments/patient/add-payment";
						//$this->view->preference = $this->payment();		
						$mp = new MP (MP_CLIENT_ID, MP_CLIENT_SECRET);
						
						$preference_data = array (
						    "items" => array (
						        array (
						            "title" => "Consulta Médica",
						            "quantity" => 1,
						            "currency_id" => "VEF",
						            "unit_price" => 500.00
						        )
						    )
						);

						$this->view->preference = $mp->create_preference($preference_data);
						
						break;
					case 'step6':	$template = "add-preview";			break;
				//	case 'step6':	$template = "add-preview";			break;
				}

			} else {
				//$this->view->tempkey = generateTempKey($this->view->userdata["username"]);			
				$template = "add";
			}

			$this->view->render($template);
			
		}

		function payment() {
			//Carge la info de pago
			//Envie el json o array
			//imprime la vista de resumen de pago
			
			//inicip MP
			//armar token
			//variables


			$mp = new MP (MP_CLIENT_ID, MP_CLIENT_SECRET);
			
			$preference_data = array (
			    "items" => array (
			        array (
			            "title" => "Consulta Médica",
			            "quantity" => 1,
			            "currency_id" => "VEF",
			            "unit_price" => 500.00
			        )
			    )
			);

			/*$this->view->preference =*/
			return $mp->create_preference($preference_data);
/*
			echo '<!DOCTYPE html>
			<html>
				<head>
					<title>Pay</title>
				</head>
				<body>
					<a href="'.$preference['response']['sandbox_init_point'].'">Pay</a>
				</body>
			</html>';*/
		}
	

	}			
?>