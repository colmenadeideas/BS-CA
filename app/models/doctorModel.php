<?php 
	
	class doctorModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function listSpeciality($by='name', $order='ASC') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "speciality ORDER BY $by $order");
		}
		
	
	}

?>