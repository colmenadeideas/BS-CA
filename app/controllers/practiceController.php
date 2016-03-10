<?php

	class practiceController extends Controller {

		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('panel');	        
		}

		public function add($secondparameter, $tempkey="") {
			//has
			//-- step 1
			//---- step 2
			//------ step 3
			//-------- step 4
			//if (!empty($secondparameter)) {

			//Get Previous
			$tempdata = Api::getTempRecord("array", $this->view->userdata['id'], $tempkey);
			$this->view->tempkey = $tempdata[0]['tempkey'];
			$this->view->tempdata = json_decode($tempdata[0]['data'], TRUE);

			switch ($secondparameter) {
				case 'step2': 	$template = "add-days"; 			break;
				case 'step3':	$template = "add-quote";			break;
				case 'step4':	$template = "add-cost";				break;
				case 'step5':	$template = "add-preview";			break;
			}

			$this->view->render("practices/".$template);
			
		}
		/*
		case 'add':
				//has
				//-- step 1
				//---- step 2
				//------ step 3
				//-------- step 4
				if (!empty($secondparameter)) {

					//Get Previous
					$tempdata = Api::getTempRecord("array", $this->view->userdata['id'], $tempkey);
					$this->view->tempkey = $tempdata[0]['tempkey'];
					$this->view->tempdata = json_decode($tempdata[0]['data'], TRUE);

					switch ($secondparameter) {
						case 'step2': 	$template = "add-days"; 			break;
						case 'step3':	$template = "add-quote";	break;
						case 'step4':	$template = "add-cost";				break;
						case 'step5':	$template = "add-preview";			break;
					}
				} else {
					$this->view->tempkey = generateTempKey($this->view->userdata["username"]);			
					$template = "add";
				}
			
				break;
		*/
		
	} 
?>