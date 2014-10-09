<?php 
	
	class doctorModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function listSpeciality($by='name', $order='ASC') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "speciality ORDER BY $by $order");
		}
		
		public function list_avaliable_days($practice){
			return DB::query("SELECT * FROM " . DB_PREFIX . "doctor_practice_schedule where id_practice=%i",$practice);
		}
	
	public function listPracticeDate($practice,$date) {
			return DB::queryFirstRow("SELECT * FROM " . DB_PREFIX . "doctor_practice_schedule 
			where day =DATE_FORMAT(%s,'%W') and id_practice=%i",$date,$practice);
			
		}
		public function listDoctor($by='name', $order='ASC') {
<<<<<<< HEAD
			return DB::queryFirstRow("SELECT * FROM doctor inner join speciality on speciality.id=doctor.especiality ORDER BY $by $order");
			
		}
=======
			return DB::query("SELECT ". DB_PREFIX . "doctor.*," . DB_PREFIX . "speciality.name as speciality  FROM " . DB_PREFIX . "doctor inner join " . DB_PREFIX . "speciality on " . DB_PREFIX . "speciality.id=" . DB_PREFIX . "doctor.especiality ORDER BY $by $order");
			
		}
		
		public function listDoctorPractice($id) {
			return DB::query("select * from " . DB_PREFIX . "doctor_practice inner join " . DB_PREFIX . "doctor_practice_schedule on " . DB_PREFIX . "doctor_practice.id=id_practice inner join clinic on id_clinic=clinic.id where id_doctor=%i",$id);
		}
		
		public function listCenterName($id) {
			
			return DB::queryFirstRow("select name,address from  " . DB_PREFIX . "clinic where id=%i",$id);
		}
>>>>>>> cferrer
	
	}

?>