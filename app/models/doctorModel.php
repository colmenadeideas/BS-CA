<?php 
	
	class doctorModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function listSpecialty($by='name', $order='ASC') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "specialty ORDER BY $by $order");
		}
		
		public function list_avaliable_days($practice){
			return DB::query("SELECT * FROM " . DB_PREFIX . "doctor_practice_schedule where id_practice=%i",$practice);
		}
	
	public function listPracticeDate($practice,$date) {
			return DB::queryFirstRow("SELECT * FROM " . DB_PREFIX . "doctor_practice_schedule 
			where day =DATE_FORMAT(%s,'%W') and id_practice=%i",$date,$practice);			
		}		
		public function listCenterName($id) {
			
			return DB::queryFirstRow("select name,address from  " . DB_PREFIX . "clinic where id=%i",$id);
		}
		
		//***************************//		
		//Reformuladas:
		public function getDoctors($by="name", $param="", $order="ASC") {
			return DB::query("SELECT ". DB_PREFIX . "doctor.*, " . DB_PREFIX . "specialty.name AS specialty  FROM " . DB_PREFIX . "doctor INNER JOIN " . DB_PREFIX . "specialty ON " . DB_PREFIX . "specialty.id=" . DB_PREFIX . "doctor.specialty WHERE $by LIKE '%".$param."%' ORDER BY $by $order");
		
		}
		
		public function getDoctorPracticesFULL($id) {
			return DB::query("SELECT * FROM " . DB_PREFIX . "doctor_practice INNER JOIN " . DB_PREFIX . "doctor_practice_schedule ON " . DB_PREFIX . "doctor_practice.id=id_practice INNER JOIN clinic ON id_clinic=clinic.id WHERE id_doctor=%i", $id);
		}
		  
		public function getDoctorPractices($id) {
			return DB::query("SELECT doctor_practice.id, doctor_practice.id_doctor, doctor_practice.id_clinic, clinic.name, clinic.address FROM " . DB_PREFIX . "doctor_practice INNER JOIN clinic ON id_clinic=clinic.id WHERE doctor_practice.id_doctor=%i", $id);
		}
		public function getDoctorPractice($id, $id_clinic) {
			return DB::query("SELECT doctor_practice.id, doctor_practice.id_doctor, doctor_practice.id_clinic, clinic.name, clinic.address FROM " . DB_PREFIX . "doctor_practice INNER JOIN clinic ON id_clinic=clinic.id WHERE doctor_practice.id_doctor=%i AND doctor_practice.id_clinic=%i", $id, $id_clinic);
		}
		
		public function getDoctorPracticesSchedule($id) {
			return DB::query("SELECT * FROM " . DB_PREFIX . "doctor_practice_schedule WHERE id_practice=%i", $id);
		}
		
		//***************************//
		//Search by
		public function getDoctorsByPractice($id) {
			return DB::query("SELECT doctor_practice.id, doctor_practice.id_doctor, doctor_practice.id_clinic, clinic.name, clinic.address FROM " . DB_PREFIX . "doctor_practice INNER JOIN clinic ON id_clinic=clinic.id WHERE doctor_practice.id_clinic=%i", $id);
		
		}
		public function getDoctorsBy($param, $id) {
			$param= escape_value($param);
			$id = escape_value($id);
			return DB::query("SELECT ". DB_PREFIX . "doctor.*, " . DB_PREFIX . "specialty.name AS specialty  FROM " . DB_PREFIX . "doctor INNER JOIN " . DB_PREFIX . "specialty ON " . DB_PREFIX . "specialty.id=" . DB_PREFIX . "doctor.specialty WHERE ".$param."=". $id);
		
//			return DB::query("SELECT * FROM doctor WHERE id=
		}
		
		
		
	
	}


?>