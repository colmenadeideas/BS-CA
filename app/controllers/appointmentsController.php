<?
class appointmentsController extends Controller {
	
public function __construct() {
			
			parent::__construct();
		
		}

		public function reserve($practice,$date){
				
			if (!integer($practice) ){
				
				return "error";
			}
			if (!stringDate($date) ){
				return "error";
			}
			
			$this->loadModel('doctor');
			@$schedule = doctorModel::listPracticeDate($practice,$date);
			//chequeo si existen citas este dia
			if (!empty($schedule)){
				 @$num_citas = appointmentsModel::checkFreeDay($practice,$date);
				if($num_citas<$schedule["quota"]){
					$array_appointments["id_practice_schedule"]=$schedule["id"] ;
					$array_appointments["date_appointment"]=$date;
					$array_appointments["id_patient"]=1; //ojoooo
					$insert= $this->helper->insert("appointments", $array_appointments);
					echo "se guardo";
				}else {
					echo "no cupo";
				}
				
			}else{
				echo "no ve ese dia";
			}
		
		
	}
}
?>
