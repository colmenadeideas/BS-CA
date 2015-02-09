<?php
	
<<<<<<< HEAD
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

=======
	//error_reporting(E_ALL);
	//ini_set("display_error",1);
>>>>>>> Panel-Doctor
	require_once ('../includes/config/local.php'); //if Production Site change to server.php
	require_once ('../includes/config/config.php');
	
	
	function __autoload($class) {
			
		require ( LIBS . $class. '.php');
		
		
	}
	require ( LIBS . 'Functions.php');
	require ( LANG . DEFAULT_LANGUAGE .'.php');
	
	$app = new App();
	
	$app->init();	
	
?>