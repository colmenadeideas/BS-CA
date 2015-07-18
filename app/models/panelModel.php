<?php

	class panelModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getPractice($table, $data, $by='id') {
			
			if ($table == "") {
				$table = 'doctor_practice';				
				$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
				
				
				
				
			} else {
				$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
			}
			return $result;
		}
				
	}
		
?>