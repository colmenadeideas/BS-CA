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
	}

?>