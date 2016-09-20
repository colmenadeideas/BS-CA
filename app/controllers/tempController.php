<?php

	class tempController extends Controller {

		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('panel');	        	
		}

		/*function save ($echoresponse = "Y") {					
			$array_dataFull = array();

			foreach ($_POST as $key => $value) {
				if (is_array($_POST)) {
					$array_data['data'][$key] = $value;
				} else {
					$field = escape_value($key);
					$field_data = escape_value($value);	
					$array_data['data'][$field] = $field_data;
				}				
			}
			$array_dataFull['user_id'] = $array_data['data']['id_doctor'];
			$array_dataFull['role'] = 'doctor';
			$array_dataFull['tempkey'] = $array_data['data']['tempkey'];
			$array_dataFull['url'] = $array_data['data']['url'];
			$array_data['inmerse']['date'] = $array_data['data'];
			
			
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
			} 

			//$array_dataFull['data'][] = array('data' => , json_encode($array_data['data'], JSON_UNESCAPED_UNICODE));
			$array_dataFull['data'] = json_encode($array_data['inmerse'], JSON_FORCE_OBJECT);

			//if (!empty($previous)) {
				//$insert = $this->helper->update('temporal_data', $previous[0]['id'], $array_dataFull);
			//} else {
				$insert = $this->helper->insert('temporal_data', $array_dataFull);
			//}
			print_r($insert); exit;
			if ($insert > 0) {
				$response["tag"] = "temp";
				$response["success"] = 1;
				$response["error"] = 0;	
				$response["response"] = "saved";	
				$response["tempkey"] = $array_dataFull["tempkey"];
			}
			if ($echoresponse == "Y") {
				echo json_encode($response);
			}
		}*/

		function save ($echoresponse = "Y") {
					
			$array_data = array();	
	
			foreach ($_POST as $key => $value) {
				if (is_array($_POST)) {
					$array_data['data'][$key] = utf8_encode($value);
				} else {
					$field = escape_value($key);
					$field_data = escape_value($value);	
					$array_data['data'][$field] = utf8_encode($field_data);
				}				
			}


			$array_data['user_id'] = $array_data['data']['id_doctor'];
			$array_data['role'] = 'doctor';/*$this->user->getUserdata('role');*/ //TODO get role with functions;
			$array_data['tempkey'] = $array_data['data']['tempkey'];
			$array_data['url'] = $array_data['data']['url'];				
			
			$previous = Api::getTempRecord("array", $array_data['user_id'], $array_data['tempkey']);

			//Delete Previous temp
			if (!empty($previous)) {

				$data_temp = $previous['data'][0];
				//$data = $previous['data'];
				//$data_temp = json_decode($data,TRUE); Is this necessesary?
				//use as array
				foreach ($data_temp as $key => $value) {
					if($array_data['data'][$key] != "" || array_key_exists($key, $array_data['data'])){

					} else {
						$array_data['data'][$key] = $value;
					}
				}				
			} 
			
			$array_data['data'] = json_encode($array_data['data'], JSON_UNESCAPED_UNICODE);
			if (!empty($previous)) {
				$insert = $this->helper->update('temporal_data', $previous['id'], $array_data);
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
		}

		
	} 
?>