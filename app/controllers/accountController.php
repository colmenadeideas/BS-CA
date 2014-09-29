<?php 
	
	class accountController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
	
		public function index() {
				
		//	$this->view->buildpage('site/index');			
		
		}
		
		public function add() {
		
					$user_email = escape_value($_POST['email']);
					//User Profile
					$array_user['username'] = $user_email;
					$array_profile['name'] = escape_value($_POST['name']);
					//$array_profile['email'] = escape_value($_POST['email']);
					$array_profile['phone'] = escape_value($_POST['phone']);
					$array_profile['id_card'] = escape_value($_POST['id_card']);	
					$array_profile['birth'] = escape_value($_POST['birth']);		
					$array_profile['sex'] = escape_value($_POST['sex']);				
					//User
					
					
					$array_user['role'] = escape_value($_POST['role']);
					$role=$array_user['role'];
					$temp_key = uniqid(rand(), true);				
					$array_user['pass_hash'] = $this->user->create_hash($temp_key);
					
					//Add User
					 $insert = $this->helper->insert('users', $array_user);
					
					if ($insert > 0) {
						$id =  DB::insertId();
						
						//Create and add Profile
						if ("patient"==$role)
							$array_profile['id_patient'] = $id;
							
						if ("doctor"==$role){
							$array_profile['id_doctor'] = $id;
							$array_profile['especiality'] = escape_value($_POST['especiality']);
					}
						$insert_profile = $this->helper->insert($role, $array_profile);
						//Create Role Permissions for User
			
						
						//::::Log Action::::					
						
						
						//Email User Activation
						
							//Email User Activation Notification
							$message = SYSTEM_SIMPLE_EMAIL_HEAD;								
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1;
							$message .= 'Su usuario es: '. $array_user['username'] .'<br><br>';
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2;
							$message .= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$array_user['username'].'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Activar Usuario</a>';				
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART3;
							$message .= SYSTEM_SIMPLE_EMAIL_FOOTER;
							
						//	$this->email->sendMail($user_email, SYSTEM_EMAIL, ACTIVATION_USER_SUBJECT , $message);						
							
						
					
					
					}
		}


public function authenticate($temp_password, $username) {
			
			$username = escape_value($username);
			$password = escape_value($temp_password);			
			
			$validUser = $this->user->validateUsername($username);
			
			if(empty($validUser)){						
				//echo "user";
				echo ERROR_AUTHENTICATE;
				exit;
								
			} else {
				$validPass = $this->user->validatePassword($username, $password);
				
				if(empty($validPass)){
					//echo "pass";	
					echo ERROR_AUTHENTICATE;
					exit;				
				} else {
					$role = escape_value($validUser[0]['role']);
					$username = escape_value($validUser[0]['username']);
					$this->user->init();
			        $this->user->set('role', $role);
					$this->user->set('loggedIn', true);
			        $this->user->set('username', $username);
			           
					//echo 'welcome';
					$this->firstlogin($password);					
					exit;
				}
			}
			
			
		} 
		
		public function signin() {
			
			$already_loggedin = User::get('role');
			
			if (empty($already_loggedin)) {
				
				$this->view->title = SITE_NAME. " | Entrar";						
				$this->view->render('login/index');
				
			} else {
				//Redirect		
				$this->identify();
			}
		}
		
		
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
			//aqui voy
			if(empty($validUser)){
				echo "error";
			} else {
				$validPass = $this->user->validatePassword($username, $password);
				if(empty($validPass)){
					echo "error";
				} else {
						$role = escape_value($validUser[0]['role']);
						$username = escape_value($validUser[0]['username']);
						$this->user->init();
				        $this->user->set('role', $role);
						$this->user->set('loggedIn', true);
				        $this->user->set('username', $username);				           
						echo 'welcome';					
						exit;
					}
			}
				
		}
		
		public function logout() {			
			
			$this->user->destroy();
			header('location: '. URL);		
			//$this->signin();
		} 
		
		public function identify () {
				
			User::checkSession();
			//Auth::handleLogin('account');
			User::gotoMainArea();			
			
		}
		
		//Settings
		public function firstlogin($old_password= '') {
				
			$this->edit('password', $old_password);
			
		}
	}
		
?>