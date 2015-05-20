<?php

class panelController extends Controller {

	public function __construct() {
		
		parent::__construct();
		//Auth::handleLogin('panel');	
		
	}
	
	public function index(){
		
		$this->view->userdata = $this->user->getUserdata();		
		
		$this->view->buildpage("", "doctor");
	}
	
	public function appointments($date_range, $days) {
		
		//Get Next Appointments
		$this->view->appointments = $this->api-> appointments("array" , "doctor", /*$this->view->userdata[0]['id']*/ '22');
		
		if ($this->view->appointments['tag'] == 'practices' && $this->view->appointments['empty'] == 1) {
			// Doctor hasn't add PRACTICES
			//TODO: suggest add practices
			$this->view->render("panel/appointments/none", "doctor");
			
		} else 
		if ($this->view->appointments['tag'] == 'appointments' && $this->view->appointments['empty'] == 1) {
			
			$this->view->render("panel/appointments/none", "doctor");
			
		} else {
						 
			$this->view->render("panel/appointments/next", "doctor");
		}
	}
	
	public function practice($action) {
		
		switch ($action) {
			case 'add':
				$template = "add";
				break;
			
			default:
				//list
				$this->view->practices = $this->api-> practices("array" , "doctor", /*$this->view->userdata[0]['id']*/ '22');
				
				if ($this->view->practices['empty'] != 1) {
					
					$template = "list";
					
				} else {
					
					$template = "none";
					
				}
		
				break;
		}
		
		
		
		$this->view->render("panel/practices/".$template);
	}
	
	/*public function index($id){
		
		//TODO pasar parametros desde variable
		
		$appointments = $this -> api ->appointments("array", "doctor", $id);
		
		if ($appointments['empty'] ==1){
			$this->view-> render('panel/head');
			$this->view-> render('panel/appointments_none');
			$this->view-> render('panel/footer');
		}else{
			//HAY CITAS
			
			
			//print_r($appointments);
							
				$this->view->appointments = $appointments;
				$patient = $this->api->patient($arreglo="json", $id);
			//page
			$this -> view -> render('panel/head');
			$this -> view -> render('panel/appointments_home');
			$this -> view -> render('panel/footer');
			
		
		}
	}*/
}
?>