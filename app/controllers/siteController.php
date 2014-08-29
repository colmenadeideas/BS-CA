<?php 
	
	class siteController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
	
		public function index() {
			
			$this->loadModel('doctor');
			@$this->view->speciality = doctorModel::listSpeciality();
			
		
			$this->view->buildpage('site/index');			
			}
	}
		
?>