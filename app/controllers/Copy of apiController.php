<?php
	class apiController extends Controller {
		public function __construct() {
	
			parent::__construct();
			
	
		}
		
		// AUTOCOMPLETE: This function is invoked when user is writing fields related to : Doctor's name, Clinics, Addresses and Doctor's Speciality
		public function autocomplete(){
			$string = trim($_GET['term']);//TODO escape values
			$this->api->autocomplete($string);
			//$query = $this->model->autocomplete($string);
			//echo json_encode($query, JSON_UNESCAPED_UNICODE);
			
		}
		
		
		// SEARCH: Main search processing is done with this function
		public function search ($type = "other", $terms, $location = "VE"){
			
			switch ($type){
				
				case 'doctor_name':
					break;
				case 'clinic_name':
					break;
				case 'clinic_address':
					break;
				case 'doctor_specialty':
					break;
				default: // No Type is sent, no autocomplete match found
				
				//This is "TYPE NOT DEFINED" search
					$searchTerms = explode(',', $terms);			
					$t = 0;
					
					foreach ($searchTerms as $term) {
					    $term = trim($term);
						$array_final['filters'][$t]['term'] = $term;				
						if($t == 0) {
							$termsQuery = "WHERE term LIKE '%$term%'"; 					
						} else if (!empty($term)) {			         
					        $termsQuery .= " OR term LIKE '%$term%'";  //$termsQuery[] = "OR term LIKE '%$term%'";
					        //$string = "LIKE '%$string%'"			        
					    } $t++;
						
					}
					
					$found_matches = $this->model->search($termsQuery);
				
					$this->loadModel('doctor');
					//Build Results json gatherin from all tables
					foreach ($found_matches as $match) {
					
						switch ($match['in_table']) {
							case 'doctor':
								$queryString_Doctor[] .= $match['id'];							
								break;
							case 'specialty':	
								//search DOCTORS with SPECIALTY ID (in doctor)
								$queryString_Specialty[] .= $match['id'];							
								break;
							case 'clinic':
								//search DOCTORS with CLINIC ID (in doctor_practice)
								$queryString_Clinic[] .= $match['id'];						
								break;
						}
									
					}
					// 1- DOCTOR matches
					if (!empty($queryString_Doctor)){
						$i=0;
						$param = "doctor.id";
						foreach ($queryString_Doctor as $byDoctor) {
							 if ($i!=0) { $queryStringDoctor .= " OR ".$param." = "; } $queryStringDoctor.= $byDoctor; $i++;
						}
						$array_doctors_byDoctor = doctorModel::getDoctorsBy($param,$queryStringDoctor);
					} else if (empty($queryString_Doctor)) {
						$array_doctors_byDoctor = array();
					}
					
					// 2- CLINIC PRACTICE matches
					if (!empty($queryString_Clinic)){
						$i=0;
						foreach ($queryString_Clinic as $byClinic) {
							 if ($i!=0) { $queryStringClinic .= " OR id_clinic = "; } $queryStringClinic.= $byClinic; $i++;
						}
						//Get Doctors ID
						$array_doctors_byPractice = doctorModel::getDoctorsByPractice($queryStringClinic);
						$d=0;
						$param = "doctor.id";
						foreach ($array_doctors_byPractice as $doctor) {
							if ($d!=0) { $queryStringDoctor2 .= " OR ".$param." = "; } $queryStringDoctor2.= $doctor['id_doctor']; $d++;
						}
						$array_doctors_byClinic = doctorModel::getDoctorsBy($param, $queryStringDoctor2);
						
					}else if (empty($queryString_Clinic)) {
						$array_doctors_byClinic = array();
					}			
					// 3- CLINIC PRACTICE matches
					if (!empty($queryString_Specialty)){
						$i=0;
						$param = "doctor.specialty";
						foreach ($queryString_Specialty as $bySpecialty) {
							 if ($i!=0) { $queryStringSpecialty .= " OR ".$param." = "; } $queryStringSpecialty.= $bySpecialty; $i++;
						}
						$array_doctors_bySpecialty = doctorModel::getDoctorsBy($param,$queryStringSpecialty);
					} else if (empty($queryString_Specialty)) {
						$array_doctors_bySpecialty = array();
					}
					
					//Merge all Doctors
					
					$array_doctors = array_unique(array_merge($array_doctors_byDoctor,$array_doctors_byClinic,$array_doctors_bySpecialty), SORT_REGULAR); 
			
				break;
			}
			
			//Explode Search terms and add Query for every word
			//TODO  exclude words like the, de, and, y, con etc, and evaluate complete term
			
			
		 	//get all columns from Table
			$profileFields = DB::columnList('doctor');	
			$practiceFields = DB::columnList('clinic');		
 
			$i=0;
			foreach($array_doctors as $doctor) {
				
				foreach ($profileFields as $field) {					
					$array_final['doctors'][$i][$field] = $doctor[$field];
				}
							
				$array_practices = doctorModel::getDoctorPractices($doctor["id"]);
				
				$p=0;	
				foreach ($array_practices as $practice) {
					
					foreach ($practiceFields as $practicefield) {
						$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
					}
					$array_schedules = doctorModel::getDoctorPracticesSchedule($practice["id"]);
					//$array_final['doctors'][$i]['practice'][$p]	= $practice;
					$s=0;
					foreach ($array_schedules as $schedule) {
						
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]	= $schedule;
						$schedule['day'] = substr($schedule['day'], 0, -2);
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day']	= $schedule['day'];

						$ini_schedule = substr($schedule['ini_schedule'], 0, 2);
						
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
		 
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);

		}
		//PATIENT/$ID
		public function patient ($id){
			$id = escape_value($id);
			 
			$this->loadModel('patient');
			$array_patients = patientModel::getPatientBy('id', $id);
			//get all columns from Table
			$profileFields = DB::columnList('patient');	
				
 
			$i=0;
			foreach($array_patients as $patient) {
				
				foreach ($profileFields as $field) {					
					$array_final['patient'][$i][$field] = $patient[$field];
				}
				
				
							
				$array_practices = doctorModel::getDoctorPractices($doctor["id"]);
				
				$p=0;	
				foreach ($array_practices as $practice) {
					
					foreach ($practiceFields as $practicefield) {
						$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
					}
					$array_schedules = doctorModel::getDoctorPracticesSchedule($practice["id"]);
					//$array_final['doctors'][$i]['practice'][$p]	= $practice;
					$s=0;
					foreach ($array_schedules as $schedule) {
						
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]	= $schedule;
						$schedule['day'] = substr($schedule['day'], 0, -2);
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day']	= $schedule['day'];

						$ini_schedule = substr($schedule['ini_schedule'], 0, 2);
						
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
		 
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);

		}


		//APPOINTMENTS/DOCTOR/$ID/RANGE : To Get Latest Doctor's Appointments grouped by day?
		public function appointments ($by = "doctor", $id, $second_parameter ="", $practice_id="", $for_date="", $to_date="") {
			
			$id					= escape_value($id);			

			if (!empty($second_parameter)) {
				$second_parameter	= escape_value($second_parameter);
				$practice_id		= escape_value($practice_id);
				$for_date			= escape_value($for_date);
				$to_date			= escape_value($to_date);
				
				$this->loadModel('appointments');			
				$array_appointments = appointmentsModel::getAppointmentsByDate( $id, $for_date, $practice_id);
				$this->loadModel('doctor');
				$array_practices = doctorModel::getDoctorPractice($id, $practice_id);
				$practiceFields = DB::columnList('clinic');	
				$this->loadModel('patient');
				$array_final["empty"] = 0;
				$array_final['dates'][0]['date_string'] = $for_date;	

				foreach ($practiceFields as $practicefield) {												
					$array_final['dates'][0]['practice'][0][$practicefield] = $array_practices[0][$practicefield];	
				}
				
				$a=0;
				foreach ($array_appointments as $appointment) {
					$array_patient_data = patientModel::getPatientBy("id", $appointment['id_patient']);
					$appointment['patient_data'] = $array_patient_data;
					$array_final['dates'][0]['practice'][0]['appointments'][$a] = $appointment;
					$a++;
				}
				echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
				
			} else {
				$this->loadModel('doctor');
				$array_practices = doctorModel::getDoctorPractices($id);
				$practiceFields = DB::columnList('clinic');	
				//print_r($array_practices);
				$this->loadModel('appointments');			
				$array_dates = appointmentsModel::getAppointmentsDate("id_doctor", $id, "ASC");
				//Later use inside
				$this->loadModel('patient');
					
				if(empty($array_dates)){
					$response["tag"] = "appointments";
					$response["empty"] = 1;
					$response["response"] = NO_APPOINTMENTS_DATE;				
					echo json_encode($response);
								
				}else {
				
					$i=0;
					$array_final["empty"] = 0;
					foreach ($array_dates as $date) {				
						
						$date_array['date_string'] = $date["date"];		
						//$array_final['appointments'][$i]['date'] = $date_array;	
						$array_final['dates'][$i] = $date_array;				
						 
						$p=0;
						foreach ($array_practices as $practice) {
							$array_appointments = appointmentsModel::getAppointmentsByDate( $id, $date["date"], $practice["id"]);
							
							
							foreach ($practiceFields as $practicefield) {
								$array_final['dates'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];	
								//$array_final['appointments'][$i]['date']['practice'][$p][$practicefield] = $practice[$practicefield];					
							}
							
							
						//	$array_final['appointments'][$i]['date']['practice'][$p]['practice_id'] = $practice['id'];
							//$array_final['appointments'][$i]['date'][$date["date"]]['practice'][$practice['id']] = $date["date"];
							$a=0;
							foreach ($array_appointments as $appointment) {
								
										
								
								$array_patient_data = patientModel::getPatientBy("id", $appointment['id_patient']);
								$appointment['patient_data'] = $array_patient_data;
								
									$array_final['dates'][$i]['practice'][$p]['appointments'][$a] = $appointment;
																
								$a++;
							}
							$p++;
						}					
						$i++;
					}				
					
					echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
				}
			} //end if emtpy second parameter
			
		}
		//Appointments/doctor/22/practice/11/2014-02-09
		public function appointment ($by = "doctor", $id, $second_parameter ="", $practice_id="", $for_date="", $to_date="") {
			
				$id					= escape_value($id);			
				$second_parameter	= escape_value($second_parameter);
				$practice_id		= escape_value($practice_id);
				$for_date			= escape_value($for_date);
				$to_date			= escape_value($to_date);
				
				$this->loadModel('appointments');			
				$array_appointments = appointmentsModel::getAppointmentsByDate( $id, $for_date, $practice_id);
				$this->loadModel('doctor');
				$array_practices = doctorModel::getDoctorPractice($id, $practice_id);
				$practiceFields = DB::columnList('clinic');	
				$this->loadModel('patient');
				$array_final["empty"] = 0;
				$array_final['dates'][0]['date_string'] = $for_date;	

				foreach ($practiceFields as $practicefield) {												
					$array_final['dates'][0]['practice'][0][$practicefield] = $array_practices[0][$practicefield];	
				}
				
				$a=0;
				foreach ($array_appointments as $appointment) {
					$array_patient_data = patientModel::getPatientBy("id", $appointment['id_patient']);
					$appointment['patient_data'] = $array_patient_data;
					$array_final['dates'][0]['practice'][0]['appointments'][$a] = $appointment;
					$a++;
				}
				echo json_encode($array_final, JSON_UNESCAPED_UNICODE);	
		}
		
		//DOCTOR/$ID/: To get the object for 1 doctor
		public function doctor ($id) {
			
			$id = escape_value($id);
			 
			$this->loadModel('doctor');
			$array_doctors = doctorModel::getDoctors('doctor.id', $id);
			//get all columns from Table
			$profileFields = DB::columnList('doctor');	
			$practiceFields = DB::columnList('clinic');		
 
			$i=0;
			foreach($array_doctors as $doctor) {
				
				foreach ($profileFields as $field) {					
					$array_final['doctors'][$i][$field] = $doctor[$field];
				}
							
				$array_practices = doctorModel::getDoctorPractices($doctor["id"]);
				
				$p=0;	
				foreach ($array_practices as $practice) {
					
					foreach ($practiceFields as $practicefield) {
						$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
					}
					$array_schedules = doctorModel::getDoctorPracticesSchedule($practice["id"]);
					//$array_final['doctors'][$i]['practice'][$p]	= $practice;
					$s=0;
					foreach ($array_schedules as $schedule) {
						
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]	= $schedule;
						$schedule['day'] = substr($schedule['day'], 0, -2);
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day']	= $schedule['day'];

						$ini_schedule = substr($schedule['ini_schedule'], 0, 2);
						
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
		 
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);

		}

		//This function is likely to be deleted
		public function doctors ($type, $value, $location = "VE") {
			
			$this->loadModel('doctor');
			$array_doctors = doctorModel::getDoctors('doctor.name', $value);
			//get all columns from Table
			$profileFields = DB::columnList('doctor');	
			$practiceFields = DB::columnList('clinic');		
 
			$i=0;
			foreach($array_doctors as $doctor) {
				
				foreach ($profileFields as $field) {					
					$array_final['doctors'][$i][$field] = $doctor[$field];
				}
							
				$array_practices = doctorModel::getDoctorPractices($doctor["id"]);
				
				$p=0;	
				foreach ($array_practices as $practice) {
					
					foreach ($practiceFields as $practicefield) {
						$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
					}
					$array_schedules = doctorModel::getDoctorPracticesSchedule($practice["id"]);
					//$array_final['doctors'][$i]['practice'][$p]	= $practice;
					$s=0;
					foreach ($array_schedules as $schedule) {
						
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]	= $schedule;
						$schedule['day'] = substr($schedule['day'], 0, -2);
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day']	= $schedule['day'];

						$ini_schedule = substr($schedule['ini_schedule'], 0, 2);
						
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
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		}
	}
?>