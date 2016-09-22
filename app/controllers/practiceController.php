<?php

	class practiceController extends Controller {

		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('panel');	 
			$this->view->userdata = $this->user->getUserdata();
        	$this->view->userdata = $this->view->userdata[0];           	
		}

		public function add($secondparameter, $tempkey="") {

			//Get Previous
			$tempdata = Api::getTempRecord("array", $this->view->userdata['id'], $tempkey);
			$this->view->tempkey = $tempdata[0]['tempkey'];
			$this->view->tempdata = json_decode($tempdata[0]['data'], TRUE);

			switch ($secondparameter) {
				case 'step2': 	$template = "add-days"; 			break;
				case 'step3':	$template = "add-quote";			break;
				case 'step4':	$template = "add-cost";				break;
				case 'step5':	$template = "add-preview";			break;
			}

			$this->view->render("practices/".$template);			
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
							//$this->view->tempdata = json_decode($previous[0]['data'], TRUE);
							$this->view->tempdata = json_decode($previous[0]['data'], TRUE);
						}							
						break;							
				}

				$response["tag"] = "process1";
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

			if ($array_data['isclinic'] == 1){
				
				if($array_data['clinic_id'] == "" || !isset($array_data['clinic_id'])) { 
					$array_clinic['name'] 			= $array_data['clinic'];
					$array_clinic['address'] 		= $array_data['address'];
					//Create the clinic_id
					$insert_clinic = $this->helper->insert('clinic', $array_clinic);
					if ($insert_clinic > 0) {
						$array_data['clinic_id'] = DB::insertId();
					} else {
						//error
					}
				}

				$array_practice['id_clinic'] 		= $array_data['clinic_id'];
				$array_practice['address_details'] 	= $array_data['clinic_details']; //address_details
				
			}
			
			elseif ($array_data['isclinic'] == 0){			
				$array_practice['address_details'] 	= $array_data['address'];
			}


			$array_practice['id_doctor'] 			= $array_data['id_doctor'];
			$array_practice['max_days_ahead']		= $array_data['max_days_ahead'];
			$array_practice['manage_time_slots']	= $array_data['manage_time_slots'];
			//Create the Practice
			$insert_practice = $this->helper->insert('doctor_practice', $array_practice);
			if ($insert_practice > 0) {
				//Create Schedule
				$array_practice_schedule['id_practice'] 	= DB::insertId();

				for ($i=1; $i < 8; $i++) { 
					if ($array_data['day_'.$i] != ""){								
						$array_practice_schedule['day']				= dayTranslate($array_data['day_'.$i]);
						$array_practice_schedule['ini_schedule']	= $array_data['ini_schedule_'.$i];
						$array_practice_schedule['end_schedule']	= $array_data['end_schedule_'.$i];
						if ($array_data['manage_time_slots'] == 1) {
							$array_practice_schedule['quota']			= -1; //Auto calculated
						} else {
							$array_practice_schedule['quota']			= $array_data['day_quote_'.$i];
						}

						$insert_schedule = $this->helper->insert('doctor_practice_schedule', $array_practice_schedule);
					}
				}
				//Create Reasons Matrix
				$array_intervals_matrix['id_practice'] 			= $array_practice_schedule['id_practice'];
				if (is_array($array_data['reason']) || !empty($array_data['reason'])) {
					foreach ($array_data['reason'] as $key => $value) {
						$array_intervals_matrix['consultation_reason'] 	= $value;
						$array_intervals_matrix['initial_interval'] 	= $array_data['time'][$key];
						$array_intervals_matrix['price'] 				= $array_data['price'][$key];

						$insert_intervals_matrix = $this->helper->insert('doctor_practice_schedule_intervals_matrix', $array_intervals_matrix);
					}
				}
				//DELETE TEMP DATA
				$this->helper->delete('temporal_data', $array_data['tempkey'], 'tempkey');

				$response["tag"] = "process";
				$response["success"] = 1;
				$response["error"] = 0;	
				$response["response"] = "created";

				echo json_encode($response);

			} else {
				echo "error";
			}
		}


		//Fuction to save each step
		function update($practice_id) {


			$array_data = array();
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);	
				if ($field_data != "") { //only filled data?
					$array_data[$field] = $field_data;
				}
				if((strpos($field, 'day_')!==FALSE) or (strpos($field, 'ini_schedule_')!==FALSE) or (strpos($field, 'end_schedule_')!==FALSE))
				{
					$week[$field]= $field_data;
				}
			}
			$day['day_1'] = 'Mon';
			$day['day_2'] = 'Tue';
			$day['day_3'] = 'Wen';
			$day['day_4'] = 'Thu';
			$day['day_5'] = 'Fri';
			$day['day_6'] = 'Sat';
			$day['day_7'] = 'Sun';
			$array_update_dp['address_details']   = $array_data['addressDetails'];
			$array_update_dp['max_days_ahead']    = $array_data['max_days_ahead'];
			$array_update_dp['manage_time_slots'] = $array_data['manage_time_slots'];
			$array_update_dp['name'] = $array_data['name'];		
			$array_update_dp['sh'] = $array_data['name'];		

			/*borrar desde aqui*/
			if(TRUE){
				$array_data['id'] = 14;
				$array_data['id_doctor'] = 1;
				$array_data['id_clinic'];
				$array_data['address_details'] = 'called 152';
				$array_data['max_days_ahead'] = 90;
				$array_data['manage_time_slots'];
				$array_data['timestamp'];
				
				$array_data['day_1'] =  'LUN';
				$array_data['ini_schedule_1'] =  '05:00 PM';
				$array_data['end_schedule_1'] =  '07:00 PM';

				$array_data['day_2'] =  'MAR';
				$array_data['ini_schedule_2'] =  '05:00 PM';
				$array_data['end_schedule_2'] =  '07:00 PM';

				$array_data['day_3'] =  'MIE';
				$array_data['ini_schedule_3'] =  '05:00pm';
				$array_data['end_schedule_3'] =  '07:00pm';

				$array_data['day_4'] =  'JUE';
				$array_data['ini_schedule_4'] =  '05:00 PM';
				$array_data['end_schedule_4'] =  '07:00 PM';

				$array_data['day_5'] =  'VIE';
				$array_data['ini_schedule_5'] =  '05:00 PM';
				$array_data['end_schedule_5'] =  '07:00 PM';

				$array_data['day_6'] =  'SAB';
				$array_data['ini_schedule_6'] =  '05:00 PM';
				$array_data['end_schedule_6'] =  '07:00 PM';

				$array_data['day_7'] =  'DOM';
				$array_data['ini_schedule_7'] =  '05:00:00 PM';
				$array_data['end_schedule_7'] =  '11:45pm';





				foreach ($array_data as $field => $field_data) {
								
					if((strpos($field, 'day_')!==FALSE) or (strpos($field, 'ini_schedule_')!==FALSE) or (strpos($field, 'end_schedule_')!==FALSE))
					{
						$week[$field] = $field_data;
					}
				}
				/*hasta */
			}
			$this->helper->delete('doctor_practice_schedule', $practice_id, 'id_practice');
			
			foreach ($week as $field => $field_data) {
				
				if((strpos($field, 'day_')!==FALSE))
				{
					$week_data['id_practice'] = $practice_id;
					$week_data['day'] = $day[$field];
				}

				if ((strpos($field, 'ini_schedule_')!==FALSE)) 
				{	
					$cadena = strtotime($field_data);
					$cadena = date("H:i:s", $cadena);
					$week_data['ini_schedule'] = $cadena;
				}

				if((strpos($field, 'end_schedule_')!==FALSE))
				{	
					$cadena = strtotime($field_data);
					$cadena = date("H:i:s", $cadena);
					$week_data['end_schedule'] = $cadena;
					
					$insert_schedule = $this->helper->insert('doctor_practice_schedule', $week_data);
					unset($week_data);
				}
				
			}
			$array_data['doctor_practice_schedule'] = $week
			//print_r($week_data);
			// $insert_schedule = $this->helper->insert('doctor_practice_schedule', $week_data);
			//$this->helper->update('doctor_practice', $practice_id , $array_update_dp);
			//$this->helper->delete('doctor_practice_schedule', $practice_id, 'id_practice');

			$response["data"] = $array_data;

			//if ($insert_practice > 0) {

				$response["tag"] = "update";
				$response["success"] = 1;
				$response["error"] = 0;	
				$response["response"] = "updated";

				//echo json_encode($response);

			/*} else {
				$response["success"] = 0;
				echo json_encode($response);
			}*/
		}


		

		/*
		25-03-16 Mudé esta funcion al tempController para poder usar la misma desde otros Métodos+Controllers

		function temp ($action, $echoresponse = "Y") {

			switch ($action) {
				case 'save':
					
					$array_data = array();	
			
					foreach ($_POST as $key => $value) {
						if (is_array($_POST)) {
							$array_data['data'][$key] = $value;
						} else {
							$field = escape_value($key);
							$field_data = escape_value($value);	
							$array_data['data'][$field] = $field_data;
						}
						
					}
					$array_data['user_id'] = $array_data['data']['id_doctor'];
					$array_data['role'] = 'doctor';//$this->user->getUserdata('role'); //TODO get role with functions;
					$array_data['tempkey'] = $array_data['data']['tempkey'];
					$array_data['url'] = $array_data['data']['url'];				
					
					$previous = Api::getTempRecord("array", $array_data['user_id'], $array_data['tempkey']);
					
					//Delete Previous temp
					if (!empty($previous)) {

						$data = $previous[0]['data'];
						$data_temp = json_decode($data,true);
						//use as array
						foreach ($data_temp as $key => $value) {
							if($array_data['data'][$key] != "" || array_key_exists($key, $array_data['data'])){

							} else {
								$array_data['data'][$key] = $value;
							}
						}	
						//$this->helper->delete('temporal_data', $previous[0]['id']); //TODO es necesario borrar el registro?
					} 
					
					$array_data['data'] = json_encode($array_data['data']);
					if (!empty($previous)) {
						$insert = $this->helper->update('temporal_data', $previous[0]['id'], $array_data);
					} else {
						$insert = $this->helper->insert('temporal_data', $array_data);
					}
					
					if ($insert > 0) {
						$response["tag"] = "temp";
						$response["success"] = 1;
						$response["error"] = 0;	
						$response["response"] = "saved";	
						$response["tempkey"] = $array_data["tempkey"];
					}
					if ($echoresponse == "Y") {
						echo json_encode($response);
					}					

					break;
				
				default:
					exit;
					break;
			}
		}*/
		
	} 
?>