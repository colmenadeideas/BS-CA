<?php 
	
	class appointmentsModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		
		public function checkFreeDay($practice_schedule,$date){
			 DB::query("SELECT * FROM " . DB_PREFIX . "appointments
			where date_appointment =%s and id_practice_schedule=%i",$date,$practice_schedule);
			 return$counter = DB::count();
		}
		
	}

?>