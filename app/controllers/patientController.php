<?php
	
	class patientController extends Controller {

		public function __construct() {
	
			parent::__construct();
			//Auth::handleLogin('panel');	 
			$this->view->userdata = $this->user->getUserdata();
        	$this->view->userdata = $this->view->userdata[0]; 
	
		}
		
		public function index($id) {
			$test = $this->model->getPatientBy("id", $id);
			print_r($test);
		}



		public function add($secondparameter, $tempkey="") {

			//Get Previous
			$tempdata = Api::getTempRecord("array", $this->view->userdata['id'], $tempkey);
			$this->view->tempkey = $tempdata[0]['tempkey'];
			$this->view->tempdata = json_decode($tempdata[0]['data'], TRUE);

			switch ($secondparameter) {
				case 'step2': 	$template = "add-physical-data"; 			break;
				case 'step3':	$template = "add-extra";			break;
				case 'step4':	$template = "add-preview";			break;
			}

			$this->view->render("patient/".$template);			
		}

		               
		

	}
?>