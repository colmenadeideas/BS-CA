<?php

	class apiController extends Controller {
	
		public function __construct() {
	
			parent::__construct();
	
		}
		
		// AUTOCOMPLETE: This function is invoked when user is writing fields related to : Doctor's name, Clinics, Addresses and Doctor's Speciality
		public function autocomplete() {			
			$string = trim($_GET['term']);//TODO escape values
			$query = $this->model->autocomplete($string);
			echo json_encode($query, JSON_UNESCAPED_UNICODE);
		}
		
		
		// SEARCH: Main search processing is done with this function
		public function search ($type = "other", $terms, $location = "VE") {
			
			switch ($type) {
				/*
				case 'doctor_name':
					break;
				case 'clinic_name':
					break;
				case 'clinic_address':
					break;
				case 'doctor_specialty':
					break;
				*/
				default: // No Type is sent, no autocomplete match found
				
				//This is "TYPE NOT DEFINED" search
					$searchTerms = explode(',', $terms);			
					$t = 0;
					
					foreach ($searchTerms as $term) {
					    $term = trim($term);				
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