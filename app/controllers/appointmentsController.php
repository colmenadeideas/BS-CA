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
				unset($array_data['submit']);
				
				if (!empty($step_id)){
					$template = "appointments/add/step".($step_id+1);	
					//$this->temp("save", "noresponse");	
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
			//armoar token
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