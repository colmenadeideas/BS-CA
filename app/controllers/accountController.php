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
					$temp_key = uniqid(rand(), true);				
					$array_user['pass_hash'] = $this->user->create_hash($temp_key);
					
					//Add User
					 $insert = $this->helper->insert('users', $array_user);
					
					if ($insert > 0) {
						$id =  DB::insertId();
						$array_profile['id_patient'] = $id;
						//Create and add Profile
						$insert_profile = $this->helper->insert('patient', $array_profile);
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
	}
		
?>