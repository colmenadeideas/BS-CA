<?php

	class accountModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getAccount($table, $data, $by='id') {
			
			if ($table == "") {
				$table = 'patient';				
				$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
				
				if (empty($result)) {
				//if ($result < 1) {
					$table = 'doctor';				
					$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
					
					if (empty($result)) {
					//if ($result < 1) {
						$table = 'doctor_assistant';				
						$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
					}
				}
				
				
			} else {
				$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
			}
			return $result;
		}
				
	}
		
?>