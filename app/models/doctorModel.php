<<<<<<< HEAD
<?php

=======
<?php 
	
>>>>>>> cferrer
	class doctorModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
<<<<<<< HEAD
		public function listDoctors($by='name', $order='DESC') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "doctor ORDER BY $by $order");
		}
		
		public function getCourse($data, $by='id') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses WHERE $by=%s LIMIT 1", $data);
		}
		/*public function getCourseGroup($data, $by='id') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_available_groups WHERE $by=%s LIMIT 1", $data);
		}
		public function listAvailableGroups($data, $by='id', $order='DESC') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_available_groups WHERE parent_id=%s ORDER BY $by $order", $data);
		}
		
		public function openingsLeftPerCourse($data, $by='id', $order='DESC') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE course_available_group_id=%s AND status='clearpayment' ORDER BY $by $order", $data);
		}*/
		
	}
		
=======
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

>>>>>>> cferrer
?>