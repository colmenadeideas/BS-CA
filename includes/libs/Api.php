<?php
class Api extends ApiQuery {

	public function __construct() {

	}
	//PRINT FORMAT FUNCTION
	public function printResults($print = "json", $array_final) {
		
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {
			//MODO "ARRAY"
			return $array_final;
		}
	}


	//Practices/arreglo/doctor/22
	public function practices($print = "json", $parameter = "doctor", $id) {
		
		$id = escape_value($id);

		$array_practices = ApiQuery::getDoctorPractices($id);		

		//No Practices
		if (empty($array_practices)) {
			$response["tag"] = "practices";
			$response["empty"] = 1;
			$response["response"] = NO_PRACTICES_AVAILABLE;

			if ($print == 'json') {
				echo json_encode($response, JSON_UNESCAPED_UNICODE);
			} else {//modo "array"
				return $response;
			}
		} else {
			
			$practiceFields = DB::columnList('clinic');
			$i = 0;
			$array_final["empty"] = 0;
			
			foreach ($array_practices as $practice) {
				foreach ($practiceFields as $field) {
					@$array_final['practice'][$i][$field] = $practice[$field];
				}
				
			
				$array_schedules = ApiQuery::getDoctorPracticesSchedule($practice["id"]);
				$s = 0;
				foreach ($array_schedules as $schedule) {

					$array_final['practice'][$i]['schedule'][$s] = $schedule;
					$schedule['day'] = substr($schedule['day'], 0, -2);
					$array_final['practice'][$i]['schedule'][$s]['day'] = $schedule['day'];
					$ini_schedule = substr($schedule['ini_schedule'], 0, 2);

					if ($ini_schedule > 01 && $ini_schedule < 13) {
						$icon = " AM";//'<i class="fa fa-sun-o"></i> ';
					} else {
						$icon = " PM";//'<i class="fa fa-moon-o"></i> ';
					}

					if ($end_schedule > 01 && $end_schedule < 13) { $icon = " AM";	} else { $icon = " PM";	}


					$schedule['ini_schedule'] =  $schedule['ini_schedule']. $icon;
					$schedule['end_schedule'] =  $schedule['end_schedule']. $icon;
					$array_final['practice'][$i]['schedule'][$s]['ini_schedule'] = $schedule['ini_schedule'];
					$array_final['practice'][$i]['schedule'][$s]['end_schedule'] = $schedule['end_schedule'];

					$s++;
				}
				$i++;
			
			}			
			
			
			
			
					
			if ($print == 'json') {
				echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
			} else {//modo "array"
				return $array_final;
			}
		}

	}

	public function practice($print = "json", $practice_id, $parameter = "doctor", $id) {
		
		$practice_id = escape_value($practice_id);

		$array_practices = ApiQuery::getPractice($practice_id);		

		//No Practices
		if (empty($array_practices)) {
			$response["tag"] = "practices";
			$response["empty"] = 1;
			$response["response"] = NO_PRACTICES_AVAILABLE;

			if ($print == 'json') {
				echo json_encode($response, JSON_UNESCAPED_UNICODE);
			} else {//modo "array"
				return $response;
			}
		} else {
			
			$practiceFields = DB::columnList('clinic');
			$i = 0;
			$array_final["empty"] = 0;
			
			foreach ($array_practices as $practice) {
				foreach ($practiceFields as $field) {
					@$array_final['practice'][$i][$field] = $practice[$field];
				}
				
				$array_consultation_reasons = ApiQuery::getDoctorPracticesReasons($practice["id"]);

				$array_schedules = ApiQuery::getDoctorPracticesSchedule($practice["id"]);
				$s = 0;
				foreach ($array_schedules as $schedule) {

					$array_final['practice'][$i]['schedule'][$s] = $schedule;
					$schedule['day'] = substr($schedule['day'], 0, -2);
					$array_final['practice'][$i]['schedule'][$s]['day'] = $schedule['day'];
					$ini_schedule = substr($schedule['ini_schedule'], 0, 2);

					if ($ini_schedule > 01 && $ini_schedule < 13) {
						$icon = " AM";//'<i class="fa fa-sun-o"></i> ';
					} else {
						$icon = " PM";//'<i class="fa fa-moon-o"></i> ';
					}

					if ($end_schedule > 01 && $end_schedule < 13) { $icon = " AM";	} else { $icon = " PM";	}


					$schedule['ini_schedule'] =  $schedule['ini_schedule']. $icon;
					$schedule['end_schedule'] =  $schedule['end_schedule']. $icon;
					$array_final['practice'][$i]['schedule'][$s]['ini_schedule'] = $schedule['ini_schedule'];
					$array_final['practice'][$i]['schedule'][$s]['end_schedule'] = $schedule['end_schedule'];

					$s++;
				}
				$array_final['practice'][$i]['consultation_reasons'] = $array_consultation_reasons;
				$i++;
			
			}			
			
			
			
			
					
			if ($print == 'json') {
				echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
			} else {//modo "array"
				return $array_final;
			}
		}

	}
	
	//Appointments/arreglo/doctor/22/2014-02-09/2014-02-10/practice/11/
	public function appointments($print = "json", $by = "doctor", $id, $for_date = "", $to_date = "",$second_parameter = "", $practice_id = "") {

		$id = escape_value($id);
		//Si no hay parametros de fecha, tomar fecha actual + 7 días
		if($for_date == "") { $for_date = date("Y-m-d");	}
		if($to_date == "") 	{ $to_date 	= date("Y-m-d", strtotime("+7 days"));	}

		if (!empty($second_parameter)) {
			$second_parameter = escape_value($second_parameter);
			$practice_id = escape_value($practice_id);
			$for_date = escape_value($for_date);
			$to_date = escape_value($to_date);
			//$this->loadModel('appointments');
			$array_appointments = ApiQuery::getAppointmentsByDate($id, $for_date, $practice_id);
			//$this->loadModel('doctor');
			$array_practices = ApiQuery::getDoctorPractice($id, $practice_id);
			$practiceFields = DB::columnList('clinic');
			// $this->loadModel('patient');
			$array_final["empty"] = 0;
			$array_final['dates'][0]['date_string'] = $for_date;

			foreach ($practiceFields as $practicefield) {
				$array_final['dates'][0]['practice'][0][$practicefield] = $array_practices[0][$practicefield];
			}
			$a = 0;
			foreach ($array_appointments as $appointment) {
				$array_patient_data = ApiQuery::getPatientBy("id", $appointment['id_patient']);
				$appointment['patient_data'] = $array_patient_data;
				$array_final['dates'][0]['practice'][0]['appointments'][$a] = $appointment;
				$a++;
			}

			if ($print == 'json') {
				echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
			} else {//modo "array"
				return $array_final;
			}
		} else { //GET ALL PRACTICES DATES

			$array_practices = ApiQuery::getDoctorPractices($id);
			
			if (empty($array_practices)) {
				//Doctor has NO practices
				$response["tag"] = "practices";
				$response["empty"] = 1;
				$response["response"] = NO_PRACTICES_AVAILABLE;
	
				if ($print == 'json') {
					echo json_encode($response, JSON_UNESCAPED_UNICODE);
				} else {//modo "array"
					return $response;
				}
				
			} else {
				$practiceFields = DB::columnList('clinic');

				$array_dates = ApiQuery::getAppointmentsDate("id_doctor", $id, "ASC", $for_date, $to_date);
				
				//Later use inside
				//$this->loadModel('patient');
					
				if (empty($array_dates)) {
	
					$response["tag"] = "appointments";
					$response["empty"] = 1;
					$response["response"] = NO_APPOINTMENTS_DATE;
	
					//echo json_encode($response);
	
					if ($print == 'json') {
						echo json_encode($response, JSON_UNESCAPED_UNICODE);
					} else {//modo "array"
						return $response;
					}
	
				} else {
		
					$i = 0;
					$array_final["empty"] = 0;
					foreach ($array_dates as $date) {
						$date_array['date_string'] = $date["date"];
						//$array_final['appointments'][$i]['date'] = $date_array;
						$array_final['dates'][$i] = $date_array;
	
						$p = 0;
						foreach ($array_practices as $practice) {
							$array_appointments = ApiQuery::getAppointmentsByDate($id, $date["date"], $practice["id"]);

							foreach ($practiceFields as $practicefield) {
								$array_final['dates'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
								//$array_final['appointments'][$i]['date']['practice'][$p][$practicefield] = $practice[$practicefield];
							}

							//	$array_final['appointments'][$i]['date']['practice'][$p]['practice_id'] = $practice['id'];
							//$array_final['appointments'][$i]['date'][$date["date"]]['practice'][$practice['id']] = $date["date"];
							$a = 0;
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
	
					if ($print == 'json') {
						echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
					} else {//modo "array"
						return $array_final;
					}
				}
			} //end if doctor HAS practices
		} //end if emtpy second parameter

	}

	// AUTOCOMPLETE: This function is invoked when user is writing fields related to : Doctor's name, Clinics, Addresses and Doctor's Speciality
	public function autocomplete($print = "json", $what="all", $string) {

		//	$string = trim($_GET['term']);
		/*switch ($what) {
			case 'practices':
				$query = ApiQuery::autocomplete($what, $string);
				break;
			
			case "all":
				$query = ApiQuery::autocomplete($string);
				break;
		}*/
		$query = ApiQuery::autocomplete($what, $string);
		
		if ($print == 'json') {
			echo json_encode($query, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_final;
		}

	}

	public function search($type = "other", $terms, $location = "VE") {

		$type = escape_value($type);
		$terms = escape_value($terms);
		$location = escape_value($location);

		switch ($type) {

			default :
				// No Type is sent, no autocomplete match found

				//This is "TYPE NOT DEFINED" search
				$searchTerms = explode(',', $terms);
				$t = 0;

				foreach ($searchTerms as $term) {
					$term = trim($term);
					$array_final['filters'][$t]['term'] = $term;
					if ($t == 0) {
						$termsQuery = "WHERE term LIKE '%$term%'";
					} else if (!empty($term)) {
						$termsQuery .= " OR term LIKE '%$term%'";
						//$termsQuery[] = "OR term LIKE '%$term%'";
						//$string = "LIKE '%$string%'"
					}
					$t++;

				}

				$found_matches = $found_matches = ApiQuery::search($termsQuery);

				//Build Results json gatherin from all tables
				foreach ($found_matches as $match) {

					switch ($match['in_table']) {
						case 'doctor' :
							$queryString_Doctor[] .= $match['id'];
							break;
						case 'specialty' :
							//search DOCTORS with SPECIALTY ID (in doctor)
							$queryString_Specialty[] .= $match['id'];
							break;
						case 'clinic' :
							//search DOCTORS with CLINIC ID (in doctor_practice)
							$queryString_Clinic[] .= $match['id'];
							break;
					}

				}
				// 1- DOCTOR matches
				if (!empty($queryString_Doctor)) {
					$i = 0;
					$param = "doctor.id";
					foreach ($queryString_Doctor as $byDoctor) {
						if ($i != 0) { $queryStringDoctor .= " OR " . $param . " = ";
						} $queryStringDoctor .= $byDoctor;
						$i++;
					}
					$array_doctors_byDoctor = ApiQuery::getDoctorsBy($param, $queryStringDoctor);
				} else if (empty($queryString_Doctor)) {
					$array_doctors_byDoctor = array();
				}

				// 2- CLINIC PRACTICE matches
				if (!empty($queryString_Clinic)) {
					$i = 0;
					foreach ($queryString_Clinic as $byClinic) {
						if ($i != 0) { $queryStringClinic .= " OR id_clinic = ";
						} $queryStringClinic .= $byClinic;
						$i++;
					}
					//Get Doctors ID
					$array_doctors_byPractice = ApiQuery::getDoctorsByPractice($queryStringClinic);
					$d = 0;
					$param = "doctor.id";
					foreach ($array_doctors_byPractice as $doctor) {
						if ($d != 0) { $queryStringDoctor2 .= " OR " . $param . " = ";
						} $queryStringDoctor2 .= $doctor['id_doctor'];
						$d++;
					}
					$array_doctors_byClinic = ApiQuery::getDoctorsBy($param, $queryStringDoctor2);

				} else if (empty($queryString_Clinic)) {
					$array_doctors_byClinic = array();
				}
				// 3- CLINIC PRACTICE matches
				if (!empty($queryString_Specialty)) {
					$i = 0;
					$param = "doctor.specialty";
					foreach ($queryString_Specialty as $bySpecialty) {
						if ($i != 0) { $queryStringSpecialty .= " OR " . $param . " = ";
						} $queryStringSpecialty .= $bySpecialty;
						$i++;
					}
					$array_doctors_bySpecialty = ApiQuery::getDoctorsBy($param, $queryStringSpecialty);
				} else if (empty($queryString_Specialty)) {
					$array_doctors_bySpecialty = array();
				}

				//Merge all Doctors

				$array_doctors = array_unique(array_merge($array_doctors_byDoctor, $array_doctors_byClinic, $array_doctors_bySpecialty), SORT_REGULAR);

				break;
		}

		//Explode Search terms and add Query for every word
		//TODO  exclude words like the, de, and, y, con etc, and evaluate complete term

		//get all columns from Table
		$profileFields = DB::columnList('doctor');
		$practiceFields = DB::columnList('clinic');

		$i = 0;
		foreach ($array_doctors as $doctor) {

			foreach ($profileFields as $field) {
				$array_final['doctors'][$i][$field] = $doctor[$field];
			}

			$array_practices = ApiQuery::getDoctorPractices($doctor["id"]);

			$p = 0;
			foreach ($array_practices as $practice) {

				foreach ($practiceFields as $practicefield) {
					$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
				}
				$array_schedules = ApiQuery::getDoctorPracticesSchedule($practice["id"]);
				//$array_final['doctors'][$i]['practice'][$p]	= $practice;
				$s = 0;
				foreach ($array_schedules as $schedule) {

					$array_final['doctors'][$i]['practice'][$p]['schedule'][$s] = $schedule;
					$schedule['day'] = substr($schedule['day'], 0, -2);
					$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day'] = $schedule['day'];
					$ini_schedule = substr($schedule['ini_schedule'], 0, 2);

					if ($ini_schedule > 01 && $ini_schedule < 13) {
						$icon = " AM";//'<i class="fa fa-sun-o"></i> ';
					} else {
						$icon = " PM";//'<i class="fa fa-moon-o"></i> ';
					}

					//delete this if change to ICON
						$end_schedule = substr($schedule['end_schedule'], 0, 2);
						if ($end_schedule > 01 && $end_schedule < 13) { $icon = " AM";	} else { $icon = " PM";	}

						$schedule['ini_schedule'] = substr($schedule['ini_schedule'], 0, -3).$icon;//$icon . $schedule['ini_schedule'];
						$schedule['end_schedule'] = substr($schedule['end_schedule'], 0, -3).$icon;

					$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['ini_schedule'] = $schedule['ini_schedule'];
					$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['end_schedule'] = $schedule['end_schedule'];

					$s++;
				}
				$p++;
			}
			$i++;
		}

		echo json_encode($array_final, JSON_UNESCAPED_UNICODE);

	}

	
	//PATIENTS
	public function patients($print = "json", $relation="doctor",$id) {
		$relation = escape_value("id_".$relation);
		$id = escape_value($id);
		//get Relationships
		$relationships =	ApiQuery::getPatientsByRelationship($relation, $id);
		
		foreach ($relationships as $relationship) {
			//get each patient
			$patient = ApiQuery::getPatientBy('id', $relationship['id_patient']);
			$array_final['patients'][] = $patient[0];
		}
		
		//print_r($array_final); exit;
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {
			//MODO "ARRAY"
			return $array_final;
		}
		
	}
	
	//
	public function patient($print = "json", $id) {

		$id = escape_value($id);

		$array_patients = ApiQuery::getPatientBy('id', $id);
		//$array_patients = $this->getPatientBy('id', $id);
		//get all columns from Table
		$profileFields = DB::columnList('patient');
		$i = 0;
		foreach ($array_patients as $patient) {
			foreach ($profileFields as $field) {
				$array_final['patient'][$i][$field] = $patient[$field];
			}
		}
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_final;
		}

	}
	
	//get Doctor's Matrix of available slots  and current unavailable
	public function availability_matrix($print = "json", $id_doctor, $id_practice) {
		
		$array_schedules = ApiQuery::getDoctorPracticesSchedule($id_practice);
		$array_schedules_exceptions = ApiQuery::getDoctorPracticesScheduleExceptions($id_practice);
		$array_practice =	ApiQuery::getPractice($id_practice);
		
		
		$array_final["empty"] = 0;
		$array_final["max_days_ahead"] = $array_practice[0]['max_days_ahead'];
		$array_final["manage_time_slots"] = $array_practice[0]['manage_time_slots'];
		$array_final["days_in"] = $array_schedules;
		$array_final["days_out"] = $array_schedules_exceptions;
				
		
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_final;
		}
	}

	public function availability($print = "json", $id_doctor, $id_practice, $show = "days", $selecteddate="") {
		
		$available_dates_matrix = $this->availability_matrix("array",$id_doctor, $id_practice);

		define (APPOINTMENTS_INTERVAL, 30);//30min  
		// Build Dates ahead, based on Practice's limit max_days_ahead
	 	$start = strtotime('today UTC');
		$array_calendar = array();

		for($i = 0; $i<=$available_dates_matrix['max_days_ahead']; $i++){					
			$date_ahead = date ('Y-m-d', strtotime("+$i day", $start));
			$array_calendar[$i]['day'] = $date_ahead;
			$array_calendar[$i]['weekday'] = date( "D", strtotime($date_ahead)); // Mon, Fri
			$array_calendar[$i]['manage_time_slots'] = $available_dates_matrix['manage_time_slots'];
			
			$e=0;
			
			//Check if fits DAYS_IN matrix criteria
			foreach ($available_dates_matrix['days_in'] as $day_in_matrix) {
				
				if ($array_calendar[$i]['weekday'] == $day_in_matrix['day']) {
					//Block in case there's hours interrupting slots (breaks)
					$array_calendar[$i]['day_in'] = '1';
					$array_calendar[$i]['block'][$e]['max_quota'] = $day_in_matrix['quota'];
					$array_calendar[$i]['block'][$e]['ini_schedule'] = $day_in_matrix['ini_schedule'];
					$array_calendar[$i]['block'][$e]['end_schedule'] = $day_in_matrix['end_schedule'];
					
					//If Doctor wants OKIDOC to manage time slots (1)-->
					if ($available_dates_matrix['manage_time_slots'] == 1){
						//Create Hour Slots available
						$ini = sscanf($day_in_matrix['ini_schedule'], "%d:%d:00", $hour_ini, $minutes_ini);
						$ini__miliseconds_time = (($minutes_ini % 60) + ($hour_ini * 60)) *60;
						$end = sscanf($day_in_matrix['end_schedule'], "%d:%d:00", $hour_end, $minutes_end);
						$end__miliseconds_time = (($minutes_end % 60) + ($hour_end * 60)) *60;
						
						$range_slots = hoursRange( $ini__miliseconds_time, $end__miliseconds_time, 60 * APPOINTMENTS_INTERVAL, 'h:i a' );
						
//						$array_calendar[$i]['block'][$e]['slots'][] = $range_slots;

						foreach ($range_slots as $key => $value) {
							$array_calendar[$i]['block'][$e]['slots'][]['time'] = $value; 
						}
					}
					//Setting for Calendar ADAPTER in JS
					switch ($show) {
						case 'days':
							$array_calendar_daysONLY[] =  $array_calendar[$i]['day'];
							break;
						case 'hours':
							//$array_calendar_hoursONLY[] =  $array_calendar[$i]['day'];
							break;
					}	
					//end setting
					$e++;
				}
									
			}
			
			//Remove DAYS_OUT from matrix criteria, if match
			$d = 0;
			foreach ($array_calendar as $calendar_day) {
				
				foreach ($available_dates_matrix['days_out'] as $day_out) {
					if ($calendar_day['day'] == $day_out['date']) {
						//Remove from Calendar View
						unset($array_calendar[$d]);
					}						
				}
				
				$d++;
			}
		}

		

		if ($show == "days") {
			$array_calendar = $array_calendar_daysONLY;

		} else if ($show == "hours") {
			//work ONLY with given date, Remove everything else
			$f = 0;
			foreach ($array_calendar as $calendar_day_finals) {				
				if($selecteddate != ""){
					if ($calendar_day_finals['day'] != $selecteddate) {
						//Remove from Calendar View
						unset($array_calendar[$f]);
					}
				}
				$f++;
			}

			$array_calendar_selecteddate = current($array_calendar); //TODO Check if "current" is the ideal function to clean the index of array_calendar
			$array_calendar = "";
			$array_calendar["empty"] = 0;
			$array_calendar["doctor"] = $id_doctor;
			$array_calendar["practice"] = $id_practice;
			$array_calendar["date"][0] = $array_calendar_selecteddate;
			
		} else if ($show == "all"){
			//TODO revisar todo este armado, me parece repetitivo
			foreach ($array_calendar as $calendar_day_finals) {				
				$array_calendar_temp["dates"][] = $calendar_day_finals;
			}
			$array_calendar = $array_calendar_temp;
			$array_calendar["doctor"] = $id_doctor;
			$array_calendar["practice"] = $id_practice;
			$array_calendar["empty"] = 0;
		}
		

		if ($print == 'json') {
			echo json_encode($array_calendar, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_calendar;
		}
	}

	public function appointment($print = "json", $by = "doctor", $id, $second_parameter = "", $practice_id = "", $for_date = "", $to_date = "") {

		$id = escape_value($id);
		$second_parameter = escape_value($second_parameter);
		$practice_id = escape_value($practice_id);
		$for_date = escape_value($for_date);
		$to_date = escape_value($to_date);

		$array_appointments = ApiQuery::getAppointmentsByDate($id, $for_date, $practice_id);

		$array_practices = ApiQuery::getDoctorPractice($id, $practice_id);
		$practiceFields = DB::columnList('clinic');

		$array_final["empty"] = 0;
		$array_final['dates'][0]['date_string'] = $for_date;

		foreach ($practiceFields as $practicefield) {
			$array_final['dates'][0]['practice'][0][$practicefield] = $array_practices[0][$practicefield];
		}

		$a = 0;
		foreach ($array_appointments as $appointment) {
			$array_patient_data = ApiQuery::getPatientBy("id", $appointment['id_patient']);
			$appointment['patient_data'] = $array_patient_data;
			$array_final['dates'][0]['practice'][0]['appointments'][$a] = $appointment;
			$a++;
		}
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_final;
		}

	}

	//DOCTOR/$ID/: To get the object for 1 doctor
	public function doctor($print = "json", $id) {

		$id = escape_value($id);

		$array_doctors = ApiQuery::getDoctors('doctor.id', $id);
		//get all columns from Table
		$profileFields = DB::columnList('doctor');
		$practiceFields = DB::columnList('clinic');

		$i = 0;
		if (empty($array_doctors)) {
			$response["tag"] = "doctor";
			$response["empty"] = 1;
			$response["response"] = NO_DOCTOR_AVAILABLE;

			if ($print == 'json') {
				echo json_encode($response, JSON_UNESCAPED_UNICODE);
			} else {//modo "array"
				return $response;
			}
		} else {
			
			$array_final["empty"] = 0;
			foreach ($array_doctors as $doctor) {

				foreach ($profileFields as $field) {
					$array_final['doctors'][$i][$field] = $doctor[$field];
				}
				$array_practices = ApiQuery::getDoctorPractices($doctor["id"]);

				$p = 0;
				foreach ($array_practices as $practice) {

					foreach ($practiceFields as $practicefield) {
						$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
					}
					$array_schedules = ApiQuery::getDoctorPracticesSchedule($practice["id"]);
					$array_consultation_reasons = ApiQuery::getDoctorPracticesReasons($practice["id"]);
					//$array_final['doctors'][$i]['practice'][$p]	= $practice;
					$s = 0;
					foreach ($array_schedules as $schedule) {

						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s] = $schedule;
						$schedule['day'] = substr($schedule['day'], 0, -2);
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day'] = $schedule['day'];

						$ini_schedule = substr($schedule['ini_schedule'], 0, 2);

						if ($ini_schedule > 01 && $ini_schedule < 13) {
							//$icon = '<i class="fa fa-sun-o"></i> ';
							$icon = " AM ";
						} else {
							$icon = " PM";
							//$icon = '<i class="fa fa-moon-o"></i> ';
						}
						
						//delete this if change to ICON
						$end_schedule = substr($schedule['end_schedule'], 0, 2);
						if ($end_schedule > 01 && $end_schedule < 13) { $icon = " AM";	} else { $icon = " PM";	}

						$schedule['ini_schedule'] = substr($schedule['ini_schedule'], 0, -3).$icon;//$icon . $schedule['ini_schedule'];
						$schedule['end_schedule'] = substr($schedule['end_schedule'], 0, -3).$icon;
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['ini_schedule'] = $schedule['ini_schedule'];
						$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['end_schedule'] = $schedule['end_schedule'];

						$s++;
					}
					$array_final['doctors'][$i]['practice'][$p]['consultation_reasons'] = $array_consultation_reasons;
					$p++;
				}
				$i++;
			}
		}
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_final;
		}

	}
	
	//This function is likely to be deleted
	public function doctors($print = "json", $type, $value, $location = "VE") {
		//$this->loadModel('doctor');
		$array_doctors = ApiQuery::getDoctors('doctor.name', $value);
		//get all columns from Table
		$profileFields = DB::columnList('doctor');
		$practiceFields = DB::columnList('clinic');

		$i = 0;
		foreach ($array_doctors as $doctor) {

			foreach ($profileFields as $field) {
				$array_final['doctors'][$i][$field] = $doctor[$field];
			}

			$array_practices = ApiQuery::getDoctorPractices($doctor["id"]);

			$p = 0;
			foreach ($array_practices as $practice) {

				foreach ($practiceFields as $practicefield) {
					$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
				}

				$array_schedules = ApiQuery::getDoctorPracticesSchedule($practice["id"]);
				//$array_final['doctors'][$i]['practice'][$p]	= $practice;
				$s = 0;
				foreach ($array_schedules as $schedule) {

					$array_final['doctors'][$i]['practice'][$p]['schedule'][$s] = $schedule;
					$schedule['day'] = substr($schedule['day'], 0, -2);
					$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['day'] = $schedule['day'];

					$ini_schedule = substr($schedule['ini_schedule'], 0, 2);

					if ($ini_schedule > 01 && $ini_schedule < 13) {
						$icon = " AM";//'<i class="fa fa-sun-o"></i> ';
					} else {
						$icon = " PM";//'<i class="fa fa-moon-o"></i> ';
					}

					//delete this if change to ICON
						$end_schedule = substr($schedule['end_schedule'], 0, 2);
						if ($end_schedule > 01 && $end_schedule < 13) { $icon = " AM";	} else { $icon = " PM";	}

						$schedule['ini_schedule'] = substr($schedule['ini_schedule'], 0, -3).$icon;//$icon . $schedule['ini_schedule'];
						$schedule['end_schedule'] = substr($schedule['end_schedule'], 0, -3).$icon;


					$array_final['doctors'][$i]['practice'][$p]['schedule'][$s]['ini_schedule'] = $schedule['ini_schedule'];

					$s++;
				}
				$p++;
			}
			$i++;
		}
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_final;
		}

	}
	//GET TEMP FORM DATA
	public function getTempRecord($print = "json", $user_id, $tempkey) {

		$array_final = ApiQuery::getTempRecordResult($user_id, $tempkey);
		
		if ($print == 'json') {
			echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		} else {//modo "array"
			return $array_final;
		}	
	}

}
?>