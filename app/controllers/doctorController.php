<?php
	class doctorController extends Controller {
	
		public function __construct() {
	
			parent::__construct();
	
		}
	
		public function index() {
			$this -> details();
		}
	
		// DETAILS:  Loads Doctor's View in Search with every related detail
		public function details($id) {
			//api search is done in JS
			$this -> view -> render('doc/profile');
		}
	
	}
?>