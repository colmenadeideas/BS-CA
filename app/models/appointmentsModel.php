<?php
	
	class appointmentsModel extends Model{
	
		public function __construct() {
	
			parent::__construct();
			
		}
		
		
		/*public function checkFreeDay($practice_schedule,$date){
			 DB::query("SELECT * FROM " .DB_PREFIX . "appointments
			where date_appointment =%s and id_practice_schedule=%i",$date,$practice_schedule);
			 return$counter = DB::count();
		}
<<<<<<< HEAD
		
		
=======
>>>>>>> origin/Panel-Doctor
		//
		public function getAppointments($by="id_doctor", $param="", $order="ASC") {
			return DB::query("SELECT * FROM ". DB_PREFIX . "appointments WHERE $by =$param ORDER BY id $order");
		}
		public function getAppointmentsDate($by="id_doctor", $param="", $order="ASC") {
			return DB::query("SELECT date FROM ". DB_PREFIX . "appointments WHERE $by =$param GROUP BY date ORDER BY date $order");
		}
		public function getAppointmentsByDate($id, $date, $id_clinic) {
			return DB::query("SELECT * FROM ". DB_PREFIX . "appointments WHERE id_doctor = $id AND date = '".$date."' AND id_clinic ='".$id_clinic."'  ORDER BY id ASC" );
		}
		public function getAppointment($id) {
			return DB::query("SELECT * FROM ". DB_PREFIX . "appointments WHERE id='$id'");
<<<<<<< HEAD
		}
		
=======
		}*/
>>>>>>> origin/Panel-Doctor
	}
?>
