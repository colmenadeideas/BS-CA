<?php
	class apiController extends Controller {
		public function __construct() {
	
			parent::__construct();
		}
		// AUTOCOMPLETE: This function is invoked when user is writing fields related to : Doctor's name, Clinics, Addresses and Doctor's Speciality
		public function autocomplete($print="json", $what="all") {
			$string = trim($_GET['term']);	
			//TODO escape values	
			$this -> api -> autocomplete($print, $what, $string);
		}
		// SEARCH: Main search processing is done with this function
		public function search($type = "other", $terms, $location = "VE") {

			$this -> api -> search($type, $terms, $location);
		}
		//PATIENT/$ID
		public function patient	( $print="json", $id) {
			$this->api->patient($print, $id);
		}
		public function patients( $print="json", $relationship, $id) {
			$this->api->patients($print, $relationship, $id);
		}
		
		
		//DOCTOR/$ID
		public function doctor($print="json", $id ) {
			$this -> api -> doctor($print, $id);
		}
		
		public function doctors( $print="json", $type, $value, $location = "VE"){
			$this -> api -> doctors($print , $type, $value);
		}
		
		//DOCTOR/$ID/PRACTICES/$ID
		public function practices ($print = "json", $parameter = "doctor", $id) {
			$this->api->practices ($print, $parameter, $id);
		}
		
		public function practice ($print = "json", $practice_id, $parameter = "doctor", $id) {
			$this->api->practice ($print, $practice_id, $parameter , $id);
		}
				
		
		public function appointments($print="json", $by = "doctor", $id, $for_date = "", $to_date = "", $second_parameter = "", $practice_id = ""){
			//TODO definir el envio del 1er parametro
			$this -> api -> appointments($print, $by, $id, $for_date , $to_date, $second_parameter, $practice_id);
		}
		//AVAILABILITY/$doctor_id/$practice_id/DAYS
		public function availability($print="json", $doctor_id, $practice_id, $show="all", $givendate=""){
			$this -> api -> availability($print, $doctor_id, $practice_id, $show, $givendate);
		}
		
		
		////PATIENT/$ID
		public function patienthistorydetail($print="json", $id) {
			$this->api->patienthistorydetail($print, $id);
		}
		
	}
?>