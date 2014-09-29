<?php

	class accountModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getAccount($data, $by='id') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "user_profile WHERE $by=%s LIMIT 1", $data);
		}
				
	}
		
?>