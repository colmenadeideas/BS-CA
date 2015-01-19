<?php
	
	class patientController extends Controller {

		public function __construct() {
	
			parent::__construct();
	
		}
		
		public function index($id) {
			$test = $this->model->getPatientBy("id", $id);
			print_r($test);
		}
		                
		

	}
?>