<?php
	class Api extends ApiQuery {
		
		public function __construct(){
			
		}
		
		//Appointments/arreglo/doctor/22/practice/11/2014-02-09
		public function appointments ($arreglo="json", $by = "doctor", $id, $second_parameter ="", $practice_id="", $for_date="", $to_date="") {
			$id= escape_value($id);
			
			if (!empty($second_parameter)) {
				$second_parameter	= escape_value($second_parameter);
				$practice_id		= escape_value($practice_id);
				$for_date			= escape_value($for_date);
				$to_date			= escape_value($to_date);
			
				//$this->loadModel('appointments');
				$array_appointments = ApiQuery::getAppointmentsByDate( $id, $for_date, $practice_id);
				//$this->loadModel('doctor');
				$array_practices = ApiQuery::getDoctorPractice($id, $practice_id);
				$practiceFields = DB::columnList('clinic');	
				// $this->loadModel('patient');
				$array_final["empty"] = 0;
				$array_final['dates'][0]['date_string'] = $for_date;

				foreach ($practiceFields as $practicefield) {												
					$array_final['dates'][0]['practice'][0][$practicefield] = $array_practices[0][$practicefield];	
				}
				$a=0;
				foreach ($array_appointments as $appointment) {
					$array_patient_data = ApiQuery::getPatientBy("id", $appointment['id_patient']);
					$appointment['patient_data'] = $array_patient_data;
					$array_final['dates'][0]['practice'][0]['appointments'][$a] = $appointment;
					$a++;
				}
				
				if ($arreglo == 'json'){
					echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
				} else{ //modo "array"
					return $array_final;
				}
				
			} else {
				
				$array_practices = ApiQuery::getDoctorPractices($id);
				$practiceFields = DB::columnList('clinic');	
				//print_r($array_practices);
							
				$array_dates = ApiQuery::getAppointmentsDate("id_doctor", $id, "ASC");
				
				//Later use inside
				//$this->loadModel('patient');
					
				if(empty($array_dates)){					
					
					
					$response["tag"] = "appointments";
					$response["empty"] = 1;
					$response["response"] = NO_APPOINTMENTS_DATE;
						
					//echo json_encode($response);
					
					if ($arreglo == 'json') {
						echo json_encode($response, JSON_UNESCAPED_UNICODE);						
					} else{ //modo "array"
						return $response;
					}
					
				
				}else{
					
					$i=0;
					$array_final["empty"] = 0;
					foreach ($array_dates as $date){
						$date_array['date_string'] = $date["date"];		
						//$array_final['appointments'][$i]['date'] = $date_array;	
						$array_final['dates'][$i] = $date_array;				
						 
						$p=0;
						foreach ($array_practices as $practice) {
							$array_appointments = ApiQuery::getAppointmentsByDate( $id, $date["date"], $practice["id"]);
							
							
							foreach ($practiceFields as $practicefield) {
								$array_final['dates'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];	
								//$array_final['appointments'][$i]['date']['practice'][$p][$practicefield] = $practice[$practicefield];					
							}
							
							
						//	$array_final['appointments'][$i]['date']['practice'][$p]['practice_id'] = $practice['id'];
							//$array_final['appointments'][$i]['date'][$date["date"]]['practice'][$practice['id']] = $date["date"];
							$a=0;
							foreach ($array_appointments as $appointment) {								
								$array_patient_data = ApiQuery::getPatientBy("id", $appointment['id_patient']);
								$appointment['patient_data'] = $array_patient_data;
								
									$array_final['dates'][$i]['practice'][$p]['appointments'][$a] = $appointment;
																
								$a++;
							}
							$p++;
						}					
						$i++;
					}				
					
					
					
					if ($arreglo == 'json') {						
						echo json_encode($array_final, JSON_UNESCAPED_UNICODE);					
					} else{ //modo "array"
						return $array_final;
					}
				}
			} //end if emtpy second parameter
			
		}
		
		// AUTOCOMPLETE: This function is invoked when user is writing fields related to : Doctor's name, Clinics, Addresses and Doctor's Speciality
		public function autocomplete( $arreglo="json", $string){
			
		//	$string = trim($_GET['term']);//TODO escape values			
			$query = ApiQuery::autocomplete($string);
			if ($arreglo == 'json') {						
					echo json_encode($query, JSON_UNESCAPED_UNICODE);
							} else{ //modo "array"
						return $array_final;
					}
			
		}
		
		public function search ($type = "other", $terms, $location = "VE"){		
			
		 	$this->api->search($string);

		}
		//
		public function patient ( $arreglo="json", $id){
			
			$id = escape_value($id);			 
				
			
			$array_patients = ApiQuery::getPatientBy('id', $id);	
			//$array_patients = $this->getPatientBy('id', $id);			
			//get all columns from Table
			$profileFields = DB::columnList('patient');
			$i=0;
			foreach($array_patients as $patient) {		
				foreach ($profileFields as $field){					
					$array_final['patient'][$i][$field] = $patient[$field];	
				}
			}
			if ($arreglo == 'json') {						
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
							} else{ //modo "array"
						return $array_final;
					}
			
		}
		
		
	
	public function appointment ($arreglo="json",  $by = "doctor", $id, $second_parameter ="", $practice_id="", $for_date="", $to_date="") {
			
				$id					= escape_value($id);			
				$second_parameter	= escape_value($second_parameter);
				$practice_id		= escape_value($practice_id);
				$for_date			= escape_value($for_date);
				$to_date			= escape_value($to_date);
				
							
				$array_appointments = ApiQuery::getAppointmentsByDate( $id, $for_date, $practice_id);
				
				$array_practices = ApiQuery::getDoctorPractice($id, $practice_id);
				$practiceFields = DB::columnList('clinic');	
				
				$array_final["empty"] = 0;
				$array_final['dates'][0]['date_string'] = $for_date;	

				foreach ($practiceFields as $practicefield) {												
					$array_final['dates'][0]['practice'][0][$practicefield] = $array_practices[0][$practicefield];	
				}
				
				$a=0;
				foreach ($array_appointments as $appointment) {
					$array_patient_data = ApiQuery::getPatientBy("id", $appointment['id_patient']);
					$appointment['patient_data'] = $array_patient_data;
					$array_final['dates'][0]['practice'][0]['appointments'][$a] = $appointment;
					$a++;
				}if ($arreglo == 'json') {						
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);	
							} else{ //modo "array"
						return $array_final;
					}
				
		}

//DOCTOR/$ID/: To get the object for 1 doctor
	  public function doctor ( $arreglo="json", $id) {
		
			$id = escape_value($id);
			 
			
			$array_doctors = ApiQuery::getDoctors('doctor.id', $id);
			//get all columns from Table
			$profileFields = DB::columnList('doctor');	
			$practiceFields = DB::columnList('clinic');		
 
			$i=0;
			foreach($array_doctors as $doctor) {
				
				foreach ($profileFields as $field) {					
					$array_final['doctors'][$i][$field] = $doctor[$field];
				}
				$array_practices = ApiQuery::getDoctorPractices($doctor["id"]);
				
				$p=0;	
				foreach ($array_practices as $practice) {
					
					foreach ($practiceFields as $practicefield) {
						$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
					}
					$array_schedules = ApiQuery::getDoctorPracticesSchedule($practice["id"]);
					//$array_final['doctors'][$i]['practice'][$p]	= $practice;
					$s=0;
					foreach ($array_schedules as $schedule) {
						
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]	= $schedule;
						$schedule['day'] = substr($schedule['day'], 0, -2);
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day']	= $schedule['day'];

						$ini_schedule =substr($schedule['ini_schedule'], 0, 2);
						
						if ($ini_schedule > 01 &&  $ini_schedule < 13 ) {
							$icon = '<i class="fa fa-sun-o"></i> ';
						} else {
							$icon = '<i class="fa fa-moon-o"></i> ';
						}
						
						$schedule['ini_schedule'] = $icon. $schedule['ini_schedule'];
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['ini_schedule']	= $schedule['ini_schedule'];
						
						
						$s++;
					}
					$p++;
				}						
				$i++;
			}
					if ($arreglo == 'json') {						
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
							} else{ //modo "array"
						return $array_final;
					}
			
		}


	//This function is likely to be deleted
 	public function doctors ($arreglo= "json",$type, $value, $location = "VE"){
			//$this->loadModel('doctor');
			$array_doctors = ApiQuery::getDoctors('doctor.name', $value);
			//get all columns from Table
			$profileFields = DB::columnList('doctor');	
			$practiceFields = DB::columnList('clinic');		
 
			$i=0;
			foreach($array_doctors as $doctor) {
				
				foreach ($profileFields as $field) {					
					$array_final['doctors'][$i][$field] = $doctor[$field];
				}
							
				$array_practices =ApiQuery::getDoctorPractices($doctor["id"]);
				
				$p=0;	
				foreach ($array_practices as $practice) {
					
					foreach ($practiceFields as $practicefield) {
						$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
					}

					$array_schedules = ApiQuery::getDoctorPracticesSchedule($practice["id"]);
					//$array_final['doctors'][$i]['practice'][$p]	= $practice;
					$s=0;
					foreach ($array_schedules as $schedule) {
						
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]	= $schedule;
						$schedule['day'] = substr($schedule['day'], 0, -2);
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day']	= $schedule['day'];

						$ini_schedule = substr($schedule['ini_schedule'], 0, 2);
												
						if ($ini_schedule > 01 &&  $ini_schedule < 13 ){
							$icon = '<i class="fa fa-sun-o"></i> ';
						}else{
							$icon = '<i class="fa fa-moon-o"></i> ';
						}
						
						$schedule['ini_schedule'] = $icon. $schedule['ini_schedule'];
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['ini_schedule']	= $schedule['ini_schedule'];
						
						
						$s++;
					}
					$p++;
				}				
				$i++;
			}
			if ($arreglo == 'json') {
										echo json_encode($array_final, JSON_UNESCAPED_UNICODE);				
			} else{ //modo "array"
						return $array_final;
					}
			
		}
	}
?>