<?php
	//Main anti XSS function
	function escape_value($data) {
	/*	if (ini_get('magic_quotes_gpc')) {
			$data = stripslashes($data);
		}
		$data = strip_tags($data, '<p><a><br>');
		//use this if local
		return mysql_real_escape_string($data);
		//use this for server
		//return mysql_escape_string($data); 
		*/
		return $data;
	}
	
	function create_slug($data) {
		$search = explode(',','&iacute;,&eacute;,&aacute;,&oacute;,&uacute;,&ntilde;,&aacute;,Á,É,Í,Ó,Ú,á,é,í,ó,ú,ñ,#,.,@, ,');
		$replace = explode(",","i,e,a,o,u,n,a,A,E,I,O,U,a,e,i,o,u,n,,_,_,-");
		$data = str_replace($search, $replace, $data);
		return $data;
	}
	
	//Replace commas with dot, for numerical Values
	function pointforcomma($data){
		$data = str_replace(",", ".", $data);
		return $data;	
	}
	
	function email($value){
		if (required($value)){	
			$valid=filter_var($value,FILTER_VALIDATE_EMAIL);
			return $valid;
		}else{
			return false;
		 }
	}
	
	function  integer($value){
		if (required($value)){
			return	$valid=is_int(intval($value) );
		}else{
			return false;
		 }
		
	}
	
	function required($value){
		$valid=!empty($value);
		return $valid;
	}
	
	function stringDate($date)
	{	if (required($date)){
	    	$d = DateTime::createFromFormat('Y-m-d', $date);
	    	return $d && $d->format('Y-m-d') == $date;
		}else{
			return false;
		 }
	}

/*
	function createJsonDoctor($array_doctores){
	 	$archivo=DATA.COUNTRY."/doctors2.js";
		 $fp = fopen($archivo, "w+");
		//selecionar cada doctor
		echo "holis";
		
		 fwrite($fp, "var doctores =".utf8_decode(json_encode($array_doctores).";"));
		 fclose($fp);
	}
 * */

	

?>