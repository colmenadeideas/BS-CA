<?php
	
	 error_reporting(E_ALL);
	
	 require_once ('../includes/config/local.php'); //if Production Site change to server.php
	
	 require_once ('../includes/config/config.php');
	
	 function __autoload($class) {
 		//echo $class."<br>";
		 require ( LIBS . $class. '.php');
		
 		
	}
	 
	 require ( LIBS . 'Functions.php');
	
	
	 require ( LANG . DEFAULT_LANGUAGE .'.php');	
	
	 $app = new App();
	
	 $app->init();	
	
	
?>