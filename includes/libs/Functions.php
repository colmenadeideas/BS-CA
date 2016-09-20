<?php
	//Main anti XSS function
	function escape_value($data) {
		if (is_array($data)){
			return $data;
		} else {
			
			if (ini_get('magic_quotes_gpc')) {
				$data = stripslashes($data);
			}
			$data = strip_tags($data, '<p><a><br>');
			//use this if local
			
			//return @mysql_real_escape_string($data);
			//use this for server
	        return mysql_escape_string($data); 
		}
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
	
	function stringDate($date){	
		if (required($date)){
	    	$d = DateTime::createFromFormat('Y-m-d', $date);
	    	return $d && $d->format('Y-m-d') == $date;
		}else{
			return false;
		 }
	}
	
	function getPage() {
		$current = explode("/",$_SERVER['REQUEST_URI']);
		if (end($current) == "") {
			return "home";
		} else {
			return end($current);	
		}
	}

	/*
	 * Builds array with Hours Range
	 * http://stackoverflow.com/questions/3903317/how-can-i-make-an-array-of-times-with-half-hour-intervals
	 * EXAMPLE: 
	 * Every 15 Minutes, All Day Long
	 * $range = hoursRange( 0, 86400, 60 * 15 );
	 * 
	 * EXAMPLE 2: 
	 * Every 30 Minutes from 8 AM - 5 PM, using Custom Time Format
	 * $range2 = hoursRange( 28800, 61200, 60 * 30, 'h:i a' );
	 */
	 function hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
		$times = array();
			
		if ( empty( $format ) ) {
			$format = 'g:i a';
		}
			
		foreach ( range( $lower, $upper, $step ) as $increment ) {
			$increment = gmdate( 'H:i', $increment );
			
			list( $hour, $minutes ) = explode( ':', $increment );
			
			$date = new DateTime( $hour . ':' . $minutes );
			
			$times[(string) $increment] = $date->format( $format );
		}
		return $times;
	}

	
	function generateTempKey($username) {
			
		return $username.uniqid(rand(), true);
			
	}

	function moneyFormat($data) {
		return money_format('%.2n', $data);
	}

	function dayTranslate($data) {
		$data = strtoupper($data);
		switch ($data) {
			case 'LUN':
				$data = "MON";
				break;
			case 'MAR':
				$data = "TUE";
				break;
			case 'MIE':
				$data = "WEN";
				break;
			case 'JUE':
				$data = "THU";
				break;
			case 'VIE':
				$data = "FRI";
				break;
			case 'SAB':
				$data = "SAT";
				break;
			case 'DOM':
				$data = "SUN";
				break;			
		}
		return $data;
	}

	function dayTranslateEN($data) {
		$data = strtoupper($data);
		switch ($data) {
			case 'MON':
				$data = "LUN";
				break;
			case 'TUE':
				$data = "MAR";
				break;
			case 'WEN':
				$data = "MIE";
				break;
			case 'THU':
				$data = "JUE";
				break;
			case 'FRI':
				$data = "VIE";
				break;
			case 'SAT':
				$data = "SAB";
				break;
			case 'SUN':
				$data = "DOM";
				break;			
		}
		return $data;
	}

	

?>