<?php 
	
	class patientModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
				
		/*public function getPatientBy($param="id", $id) {
			$param= escape_value($param);
			$id = escape_value($id);
			return DB::query("SELECT * FROM " . DB_PREFIX . "patient WHERE id=%s", $id);
		}*/
	}
?>
