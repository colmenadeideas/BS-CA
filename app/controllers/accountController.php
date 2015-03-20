<?php 
	 /**
	 * AccountController handles:
	 * - Creating users accounts
	 * - Login & Sign Up
	 * - Identifies users and redirects to proper site initialization
	 * - First time login 
	 */
	
	class accountController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
		}
	
		public function index() {
							
			$this->signin();		
		}
		
		// SIGNIN: verifies if User already logged in, if not shows login screen
		public function signin() {
			
			 $already_loggedin = User::get('role');
			
			if (empty($already_loggedin)) {
				
				$this->view->title = SITE_NAME. " | " .SITE_NAME__SIGN_IN ;						
				$this->view->render('login/index');
				
			} else {
				//Redirect		
				$this->identify();
			}
		}
		
		// LOGIN: Method called by login form, process the form and returns authorization response from server
		public function login() {
				
			$array_datos = array();	
			foreach ($_POST as $key => $value) {
				$campo = escape_value($key);
				$valor = escape_value($value);
				
				$data = "\$" . $campo . "='" . escape_value($valor) . "';";						
				eval($data);
			}
			
			$username = $email;
			$validUser = $this->user->validateUsername($username);
			
			if(empty($validUser)){
					
				//echo "errorNAME";				
				$response["tag"] = "login";
				$response["success"] = 0;
				$response["error"] = 1;	
	            $response["response"] = LOGIN_MESSAGE_ERROR;				
				echo json_encode($response);
				
			} else {
				$validPass = $this->user->validatePassword($username, $password);
				if(empty($validPass)){
					//echo "errorPASS";
					$response["tag"] = "login";
					$response["success"] = 0;
					$response["error"] = 1;	
		            $response["response"] = LOGIN_MESSAGE_ERROR;	
					echo json_encode($response);
					
				} else {
						$role = escape_value($validUser[0]['role']);
						$username = escape_value($validUser[0]['username']);
						
						$profile = $this->getAccount($role, $validUser[0]['id']);
						
						$this->user->init();
				        $this->user->set('role', $role);
						$this->user->set('loggedIn', true);
				        $this->user->set('username', $username);				           
						//echo "welcome";	
						
						$response["tag"] = "login";
						$response["success"] = 1;
						$response["error"] = 0;	
						$response["response"] = "welcome";		
						$response["user"]["role"] = $role;
						$response["user"]["uid"] = $validUser[0]['id'];
						$response["user"]["name"] = $profile[0]['name'];
			            $response["user"]["email"] = $username;						
												
						echo json_encode($response);
										
						exit;
					}
			}
				
		}
		
		
		
		
		// AUTHENTICATE: Method called when user is verified via Email -after registration-, and is logging in for the first time	
		public function authenticate($temp_password, $username) {
			
			$username = escape_value($username);
			$password = escape_value($temp_password);			
			
			$validUser = $this->user->validateUsername($username);
			
			if(empty($validUser)){	//Wrong User					
			
				echo ERROR_AUTHENTICATE_MESSAGE;
				exit;
								
			} else {
				$validPass = $this->user->validatePassword($username, $password);
				
				if(empty($validPass)){ //Wrong Password
				
					echo ERROR_AUTHENTICATE_MESSAGE;
					exit;				
					
				} else {
					$role = escape_value($validUser[0]['role']);
					$username = escape_value($validUser[0]['username']);
					$this->user->init();
			        $this->user->set('role', $role);
					$this->user->set('loggedIn', true);
			        $this->user->set('username', $username);
			           
					// Welcome
					$this->firstlogin($password);					
					exit;
				}
			}
			
		} 
		
		// IDENTIFY: verifies which session corresponds to user, and redirects them to appropiate area
		public function identify () {
			
			User::checkSession();
			//Auth::handleLogin('account');
			User::gotoMainArea();			
			
		}
		
		// LOGOUT: kills session and redirects user to home
		public function logout() {			
			
			$this->user->destroy();
			header('location: '. URL);	
		} 
		
		
		
		/*
		 * USER CREATION
		 */
		 
		// SEARCHREGISTERED: Method called by form RECOVERY, to async check if user is in fact registered
		function searchregistered($field, $data){
			$result = $this->getAccount($data, $field);
			echo json_encode($result);
		}
		
		// CHECKREGISTERED: Method called by form REGISTRATION, to async check if user is already registered
		function checkregistered($what) {
			
			//Check if already exist in User database
			switch (escape_value($what)) {
				case 'username':
					$requested_data = escape_value($_POST['email']);	
					//echo $requested_data;
					$already_registered =	$this->getAccount("", $requested_data, "username"); //checkRegistered
					//print_r($already_registered);
					if (!empty($already_registered)){
						if ($already_registered[0]['status'] === 'sleep') {
							$already_registered = '';
						}	
					}
					
					break;
				
			}
			//print_r($already_registered) ;
			if (empty($already_registered)) {
			    echo 'false';
			} else {
			    echo 'true';
			}
		}
		
				
		// RECAPTCHA: Method called by form to check if valid captcha was provided
		function recaptcha() {
			
			$resp = recaptcha_check_answer (RECAPTCHA_PRIVATEKEY,
			                                $_SERVER["REMOTE_ADDR"],
			                                $_POST["recaptcha_challenge_field"],
			                                $_POST["recaptcha_response_field"]);
			
			if (!$resp->is_valid) {
			 	// die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");
				// echo 'false'; 
				echo 'true';
			} else {
			    echo 'true';
			}

		}
		
		
		// PROCESS: Method called by form REGISTRATION, to process vars and create user
		function process() {
			
			//print_r($_POST);
			
			//exit();
				
			$array_data = array();	
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);				
				$array_data[$field] = $field_data;
			}
			
			unset($array_data['recaptcha_challenge_field']);
			unset($array_data['recaptcha_response_field']);			
			
			
			// 1 -Creates User&Profile and Sends Authentication Link
			$array_user['username'] 	= $array_data['email'];
			$array_user['role'] 		= $array_data['role'];
			$array_user['status'] 		= 'active';
			//Data for Profile
			$array_user['name'] 		= $array_data['first_name'];
			$array_user['lastname'] 		= $array_data['last_name'];
			$array_user['email'] 		= $array_data['email'];
			$array_user['phone'] 		= $array_data['phone'];
			//TODO Users registration will be a process of steps
			//TODO REFACTOR Should 'sex' and 'birth' be located in fields or should they go to a json field DATA?
			//$array_user['id_card'] 		= $array_data['id_card'];
			//$array_profile['birth'] 		= $array_data['birth'];		
			//$array_profile['sex'] 		= $array_data['v'];
			@$array_user['data'] 		= json_encode( array('creationdate'=> date("Y-m-d h:i:s")));
			
			// //Facebook
			// if (isset($array_data['id'])){
				// unset($array_user['data']);
// 				
				// $data 		= json_encode( array('creationdate'=> date("Y-m-d h:i:s")));
				// $array_data['fb_id'] = $array_data['id'];
// 				
				// $data_temp = json_decode($data,true);			
				// $data_temp['fb_id'] = $array_data['fb_id'];
// 				
				// $array_user['data'] 		= json_encode($data_temp);
// 				
				// unset($array_data['id']);
				// $array_user['gender'] 		= $array_data['gender'];
				// $array_user['birth'] 		= $array_data['birthday'];
// 				
				// //Location
				// $locationfb = $array_data['location']['name'];
				// $array_user['location'] = $locationfb;	
// 				
				// //Picture
				// $urlpicture = $array_data['fbpicture']['data']['url']; //Obtenemos la url-foto del array
// 				
				// $image_data=file_get_contents($urlpicture);
				// $encoded_image=base64_encode($image_data);
				// //print_r($encoded_image);
				// $array_user['picture'] 		= $encoded_image;
// 			
			// }
			
			//Check if already exist in User database
			$already_registered =	$this->getAccount("",$array_data['email'], 'username');
			
			if(!empty($already_registered)){
					
				if ($already_registered[0]['status'] === 'sleep'){
					//si está sleep ->
					$array_user['wakeup'] 	= $already_registered[0]['id'];
					//Register User				
					require_once('usersController.php');	
					$users = new usersController;	
					$create_user = $users->create($array_user);	
						
				}
			} else if (empty($already_registered)) {
					
				//Register User				
				require_once('usersController.php');	
				$users = new usersController;	
				$create_user = $users->create($array_user);	
			}
			
			if ($create_user > 0) {								
				echo REGISTRATION_MESSAGE_SUCCESS;		
			} else {
				echo REGISTRATION_MESSAGE_ERROR;
			}
			
			
		}


		// // PROCESSUPDATE: User upgrade method
		// function updatedata($data) {
// 							
			// $array_data = array();	
			// foreach ($_POST as $key => $value) {
				// $field = escape_value($key);
				// $field_data = escape_value($value);				
				// $array_data[$field] = $field_data;
			// }
// 			
			// unset($array_data['recaptcha_challenge_field']);
			// unset($array_data['recaptcha_response_field']);			
// 			
// 			
			// // 1 -Creates User&Profile and Sends Authentication Link
			// $array_user['username'] 	= $array_data['email'];
			// $array_user['role'] 		= $array_data['role'];
			// // $array_user['status'] 		= 'active';
			// //Data for Profile
			// $array_user['name'] 		= $array_data['name'];
			// $array_user['email'] 		= $array_data['email'];
			// $array_user['phone'] 		= $array_data['phone'];
			// //TODO Users registration will be a process of steps
			// //TODO REFACTOR Should 'sex' and 'birth' be located in fields or should they go to a json field DATA?
			// //$array_user['id_card'] 		= $array_data['id_card'];
			// //$array_profile['birth'] 		= $array_data['birth'];		
			// //$array_profile['sex'] 		= $array_data['v'];
			// $array_user['gender'] 		= $array_data['gender'];
// 			
			// //Location Facebook
			// $locationfb = $array_data['location']['name'];
			// $array_user['location'] = $locationfb;
// 			
			// //Facebook picture
			// $urlpicture = $array_data['fbpicture']['data']['url']; //Obtenemos la url-foto del array
// 			
			// $image_data=file_get_contents($urlpicture);
			// $encoded_image=base64_encode($image_data);
			// //print_r($encoded_image);
			// $array_user['picture'] 		= $encoded_image;
// 			
			// //Lastupdate
			// $array_data['lastupdatedata'] 	= date("Y-m-d h:i:s");
// 			
// 			
			// if (isset($array_data['email'])){
				// switch ($array_user['role']) {
					// case 'doctor':
						// $role_table ='doctor';						
						// break;
// 						
					// case 'patient':
						// $role_table ='patient';							
						// break;
				// }
// 				
// 				
				// $current_user = $this->getAccount($role_table, $array_data['email'], 'username');
// 								
				// $data = $current_user[0]['data'];
				// $data_temp = json_decode($data,true);
				// // print_r($data_temp);
				// // exit();
// 				
				// $data_temp['lastupdate'] = $array_data['lastupdatedata'];
// 			
				// $array_user['data'] 		= json_encode($data_temp);
// 				
// 				
				// unset($array_user['role']);
				// //insertar
				// $insert = $this->helper->update($role_table, $array_data['email'], $array_user);
				// //print_r($array_user);
// 								
			// }
// 			
// 			
			// }


		function processRedes() {
			
			//print_r($_POST);
			//exit();
			$array_data = array();	
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);				
				$array_data[$field] = $field_data;
			}
			
			//print_r($array_data['email']);
			unset($array_data['recaptcha_challenge_field']);
			unset($array_data['recaptcha_response_field']);	
			
			// 1 -Creates User&Profile and Sends Authentication Link
			$array_user['username'] 	= $array_data['email'];
			$array_user['role'] 		= $array_data['role'];
			$array_user['status'] 		= 'active';
			//Data for Profile
			// $array_user['name'] 		= $array_data['name'];
			// $array_user['lastname'] 	= $array_data['lastname'];
			$array_user['email'] 		= $array_data['email'];
			$array_user['phone'] 		= $array_data['phone'];
			//TODO Users registration will be a process of steps
			//TODO REFACTOR Should 'sex' and 'birth' be located in fields or should they go to a json field DATA?
			//$array_user['id_card'] 		= $array_data['id_card'];
			$array_user['birth'] 		= $array_data['birthday'];		
			//$array_profile['sex'] 		= $array_data['v'];
			$array_user['gender'] 		= $array_data['gender'];
			
			//-------------------------
			
			//Facebook
			if (isset($array_data['facebook'])){
				
				$array_user['name'] 		= $array_data['first_name'];
				$array_user['lastname'] 		= $array_data['last_name'];
								
				$data 		= json_encode( array('creationdate'=> date("Y-m-d h:i:s")));
				$array_data['fb_id'] = $array_data['id'];
				
				$data_temp = json_decode($data,true);			
				$data_temp['fb_id'] = $array_data['fb_id'];
				
				$array_user['data'] 		= json_encode($data_temp);
				
				unset($array_data['id']);
				$array_user['gender'] 		= $array_data['gender'];
				$array_user['birth'] 		= $array_data['birthday'];
				
				//Location
				$locationfb = $array_data['location']['name'];
				$array_user['location'] = $locationfb;	
				
				//Picture
				$urlpicture = $array_data['fbpicture']['data']['url']; //Obtenemos la url-foto del array
				
				$image_data=file_get_contents($urlpicture);
				$encoded_image=base64_encode($image_data);
				//print_r($encoded_image);
				$array_user['picture'] 		= $encoded_image;
			
			}
			
			//Google
			if (isset($array_data['google'])){
				$array_user['name'] 		= $array_data['given_name'];
				$array_user['lastname'] 	= $array_data['family_name'];
				
				
				//Google picture
				$image_data=file_get_contents($array_data['picture']);
				$encoded_image=base64_encode($image_data);
				//echo $encoded_image;
				$array_user['picture'] 		= $encoded_image;
							
				//Google data
				$data 		= json_encode( array('creationdate'=> date("Y-m-d h:i:s")));
				$array_data['gg_id'] = $array_data['id'];
				
				$data_temp = json_decode($data,true);			
				$data_temp['gg_id'] = $array_data['gg_id'];
				
				$array_user['data'] 		= json_encode($data_temp);
			
			}
			
			
			
			//Check if already exist in User database
			$already_registered =	$this->getAccount("",$array_data['email'], 'username');
			
			
			if(!empty($already_registered)){
					
				if ($already_registered[0]['status'] === 'sleep'){
					//si está sleep ->
					$array_user['wakeup'] 	= $already_registered[0]['id'];
					//Register User				
					require_once('usersController.php');	
					$users = new usersController;	
					$create_user = $users->createRedes($array_user);	
						
				}
			} else if (empty($already_registered)) {
					
				//Register User				
				require_once('usersController.php');	
				$users = new usersController;	
				$create_user = $users->createRedes($array_user);	
			}
			
			if ($create_user > 0) {								
				echo REGISTRATION_MESSAGE_SUCCESS;		
			} else {
				echo REGISTRATION_MESSAGE_ERROR;
			}
			
			
		}

		// PROCESSUPDATE: User upgrade method
		function updatedataRedes($data) {
							
			$array_data = array();	
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);				
				$array_data[$field] = $field_data;
			}
			
			//unset($array_data['recaptcha_challenge_field']);
			//unset($array_data['recaptcha_response_field']);		
			
			
			// 1 -Creates User&Profile and Sends Authentication Link
			$array_user['username'] 	= $array_data['email'];
			$array_user['role'] 		= $array_data['role'];
			// $array_user['status'] 		= 'active';
			//Data for Profile
			// $array_user['name'] 		= $array_data['name'];
			// $array_user['lastname'] 	= $array_data['lastname'];
			$array_user['email'] 		= $array_data['email'];
			$array_user['phone'] 		= $array_data['phone'];
			//TODO Users registration will be a process of steps
			//TODO REFACTOR Should 'sex' and 'birth' be located in fields or should they go to a json field DATA?
			//$array_user['id_card'] 		= $array_data['id_card'];
			//$array_profile['birth'] 		= $array_data['birth'];		
			//$array_profile['sex'] 		= $array_data['v'];
			$array_user['gender'] 		= $array_data['gender'];
			
			//UPDATE Facebook
			if (isset($array_data['facebook'])){
				
				$array_user['name'] 			= $array_data['first_name'];
				$array_user['lastname'] 		= $array_data['last_name'];
				
				//Location Facebook
				$locationfb = $array_data['location']['name'];
				$array_user['location'] = $locationfb;
				
				//Facebook picture
				$urlpicture = $array_data['fbpicture']['data']['url']; //Obtenemos la url-foto del array
				
				$image_data=file_get_contents($urlpicture);
				$encoded_image=base64_encode($image_data);
				//print_r($encoded_image);
				$array_user['picture'] 		= $encoded_image;
				
				//Lastupdate
				$array_data['lastupdatedata'] 	= date("Y-m-d h:i:s");
				
			}
			
			//UPDATE Google
			if (isset($array_data['google'])){
					
				$array_user['name'] 		= $array_data['given_name'];
				$array_user['lastname'] 	= $array_data['family_name'];
			
				// picture
				$image_data=file_get_contents($array_data['picture']);
				$encoded_image=base64_encode($image_data);
				//echo $encoded_image;
				$array_user['picture'] 		= $encoded_image;
				
				$array_data['lastupdatedata'] 	= date("Y-m-d h:i:s");
				
			}			
			
			
			if (isset($array_data['email'])){
				switch ($array_user['role']) {
					case 'doctor':
						$role_table ='doctor';						
						break;
						
					case 'patient':
						$role_table ='patient';							
						break;
				}
				//hacer el query para tener el perfil del usuario actual, 
				$current_user = $this->getAccount($role_table, $array_data['email'], 'username');
				
				
				//obtenemos la variable de 'data' almacenada				
				$data = $current_user[0]['data'];
				
				//la decodificamos para volverla array
				$data_temp = json_decode($data,true);
				//necesitamos que '$data_temp' sea un array y poderlo imprimir
				// print_r($data_temp);
				
				// exit();
				
				
				//adicionamos 'lastupdate' 
				$data_temp['lastupdate'] = $array_data['lastupdatedata'];
			
				//codificamos json
				$array_user['data'] 		= json_encode($data_temp);
				
				
				
				unset($array_user['role']);
				//insertar
				$insert = $this->helper->update($role_table, $array_data['email'], $array_user);
				//print_r($array_user);
				
				//Check if already inserted
				$already_inserted =	$this->getAccount("",$array_data['email'], 'username');
				// print_r($already_inserted);
				// exit();
				//generate true/false de si lo inserto o no para enviar respuesta a la funcion de registro
				if (empty($already_inserted)) {
			    echo 'false';
				} else {
				    echo 'true';
				}
			}
			
			
			}

		
		/*
		 * SETTINGS methods
		 */
		 
		// FIRSTLOGIN: takes user to inmediately set a password ( when coming from AUTHENTICATE from mail he doesn't have one);
		public function firstlogin($old_password= '') {
				
			$this->edit('password', $old_password);
			
		}
		// PROFILE: shows main Account area
		public function profile () {
			$this->edit('profile');
		}
		
		// RECOVER: Method called by form, checks user and triggers recovery by email password process
		function recover($what='password'){
			
			$username = escape_value($_POST['recover-password']);
			//Check for username in Database
			$already_registered =	$this->model->getAccount($username, 'username');
			
			if (empty($already_registered)) {
				echo SYSTEM_USERNAME_NOT_EXISTS;
			} else {
				$temp_key = uniqid(rand(), true);	
				$array_user['pass_hash'] = $this->user->create_hash($temp_key);
				$insert = $this->helper->update('users', $already_registered[0]["id"], $array_user);
				//Send Passwrod change email
				$message =  SETTINGS_EMAIL_HEAD;								
				$message .= PASSWORD_RECOVERY_MESSAGE_PART1;
				$message .= PASSWORD_RECOVERY_MESSAGE_PART2;
				$message .= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$username.'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Cambiar Password</a>';				
				$message .= PASSWORD_RECOVERY_MESSAGE_PART3;
				$message .= SETTINGS_EMAIL_FOOTER;
					
				$this->email->sendMail($username, SYSTEM_EMAIL, PASSWORD_RECOVERY_SUBJECT , $message);
				
				echo PASSWORD_RECOVERY_SUCCESS_RESPONSE;
			}
			
				
		}
		
		// EDIT: Views to edit Password or Profile
		public function edit ($what, $old_password = ''){
			
			$this->view->userdata = $this->user->getUserdata();
				
			Auth::handleLogin('account');
			
			$this->view->page = "";

			switch ($what) {
				case 'password':
					
					$this->view->title = "Configuración | Clave";
					$this->view->old_password =		$old_password;									
					$this->view->buildpage('settings/password-change','settings');
					break;
					
				case 'profile':
							 			
					$this->view->title = "Configuración | Mi perfil";
					
					$username 	= $this->user->get('username');
					$role 		= $this->user->get('role');
					$this->view->userdata = $this->user->getUserdata($role, $username);
		
					//Page
					$this->view->buildpage('settings/profile','settings');
				
					break;	
				
			}			
			
		}
		


		/*
	 	* function register() {			
			
			$already_loggedin = User::get('role');
			
			if (empty($already_loggedin)) {
				
				$this->view->title = "Registrarse |" . SITE_NAME;
				$this->view->render('default/head');
				$this->view->render('registration/public');
				$this->view->render('default/footer');
				
			} else {
				//Redirect		
				$this->identify();
			}
			
			
		}*/
		
		public function update($what) {
			//TODO Auth this method  YES or NO? Make it private
								
			$username 	= $this->user->get('username');
			$role 		= $this->user->get('role');
			
			$userdata 	= $this->user->getUserdata($role, $username);			
			
		
			if (empty($userdata)) {
				exit;
				
			} else {
				
				$email 	= $userdata[0]['email'];
								
				$fields = '';
				$values = '';
				$array_datos = array();	
				$array_datos['username'] = $username;
				
				
				
				foreach ($_POST as $key => $value) {
							
					if ($value === '') { // skips empty fields
									
					} else {
								
						$campo = escape_value($key);
						$valor = escape_value($value);
						
						switch ($key) {
											
							case 'submit': //omitir campo
								break;
								
							case 'password_confirm': //omitir campo
								break;
	
							default:
							
							//Convert to $variables every filled field		
						
							$data = "\$" . $campo . "='" . $valor . "';";						
							eval($data);
					
							$array_datos[$campo] = $valor;
						
						}
								
					}
									
				}
				switch ($what) {
						
					case 'password':
						
						//Validate Data
						$validPass = $this->user->validatePassword($username, $password_old);
						
						if(empty($validPass)){
								
							echo SYSTEM_INVALID_PASSWORD;					
						
						} else {
								
							//Previous Password Approved, move on						
							$array_datos['pass_hash'] = $this->user->create_hash($password);
							
							//remove extra $_POST;
							unset($array_datos['password_old'], $array_datos['password']);
							 
							//Update Data
							$this->helper->update('users', $username, $array_datos, 'username', 1);
							$updated_data = DB::affectedRows();
							
							if($updated_data !== 0)  {
								
								//Notificacion 
								$message = SYSTEM_EMAIL__PASSWORD_CHANGE;
				
								$bodyuser = $this->email->buildNiceEmail('settings', SYSTEM_PASSWORD_CHANGE, $message);
										
								//Notificar registro
								$this->email->sendMail($email, SYSTEM_EMAIL , SYSTEM_PASSWORD_CHANGE, $bodyuser);
								
								// Insertar registro de Session
								User::logSession($username);						
								
								//Redirect	
								$this->view->redirect_link = URL .'account/identify';
								$this->view->response = SYSTEM_PASSWORD_CHANGE;
								$this->view->render('redirect');						
								
							} 
							
												
							
						}				
						
						
						break;
					
					default:
						echo "def";
						break;
				}
				
			}				
					
			
		
		}
		//ESTE METODO SE EXTRAJO DE "accountModel" para seguir con el proceso de registro pero debe ser integrada nuevamente a su origen.
		public function getAccount($table, $data, $by='id') {
					
					
					if ($table == "") {
						$table = 'patient';				
						$result = DB::query("SELECT * FROM $table WHERE $by = '$data' LIMIT 1");
						
						if (empty($result)) {
							$table = 'doctor';				
							$result = DB::query("SELECT * FROM $table WHERE $by=%s LIMIT 1", $data);
						
							if (empty($result)) {
								$table = 'doctor_assistant';				
								$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
							}
						}
						
						
					} else {
						$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
					}
					//print_r($result);
					return $result;
		}
			
		
		
		
	}
		
?>