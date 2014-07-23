<?php 
	
	class siteController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
	
		public function index() {
				
			$this->view->buildpage('site/index');			
		
		}
	}
		
?>