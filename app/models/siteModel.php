<?
	class siteModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function search_list($special_param,$name="",$city="", $order='ASC') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "doctor
			inner join " . DB_PREFIX . "doctor_practice on doctor." . DB_PREFIX . "id_doctor=" . DB_PREFIX . "doctor_practice.id_doctor
			inner join " . DB_PREFIX . "clinic on " . DB_PREFIX . "clinic.id=" . DB_PREFIX . "doctor_practice.id_clinic
			inner join " . DB_PREFIX . "speciality on " . DB_PREFIX . "speciality.id= " . DB_PREFIX . "doctor.especiality
			where " . DB_PREFIX . "speciality like '%%s%'  and id_city=%s and " . DB_PREFIX . "doctor.name like '%%s%'
			ORDER BY $by $order",$speciality,$city,$speciality);
		}
		
	
	}
	
?>