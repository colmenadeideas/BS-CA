<?php
	
	class doctorController extends Controller {

		public function __construct() {
	
			parent::__construct();
	
		}
		
		public function index() {
			$this->details();
		}
		                
		// DETAILS:  Loads Doctor's View in Search with every related detail
		
		public function details($id) {
			$this->view->render('doc/details');
		}
		
		// Doctor profile
		public function profile() {
			
			$session = User::get('username');
			
			$profiledatos = DB::query("SELECT * FROM " . DB_PREFIX . "doctor WHERE username='$session'");
			
			//print_r($profiledatos);
			
			$this->view->usuario = $profiledatos;
			
			$this->view->buildpage('doc/profile');
		}
		
		/*public function details($id) {
			
			$doctor = $this->model->getDoctorsBy('doctor.id',$id);			
			//Build Object
			$i =0;
			$profileFields = DB::columnList('doctor');	
			$practiceFields = DB::columnList('clinic');	
			
			foreach ($profileFields as $field) {					
				$array_final['doctors'][$i][$field] = $doctor[0][$field];
			}							
			$array_practices = doctorModel::getDoctorPractices($doctor[0]["id"]);
			
			$p=0;	
			foreach ($array_practices as $practice) {
					
				foreach ($practiceFields as $practicefield) {
					$array_final['doctors'][$i]['practice'][$p][$practicefield] = $practice[$practicefield];
				}
					$array_schedules = doctorModel::getDoctorPracticesSchedule($practice["id"]);
					$array_final['doctors'][$i]['practice'][$p]	= $practice;
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

		//	echo json_encode($array_final, JSON_UNESCAPED_UNICODE);
		//	$this->view->doctor = $array_final["doctors"][0];
			$this->view->render('doc/details');	
					
		}	*/		

	}
?>