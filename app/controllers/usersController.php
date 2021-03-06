<?php 
	
	class UsersController extends Controller {
		
		public function __construct() {
			parent::__construct();	
			
		}
		
		//TODO Check previous projects for Methods for Control Panel ( Edit, Add, list, all)
		
		//CREATE: MEthod called by Control Panel form, or ACCOUNTCONTROLLER to generate user after verification
		public function create($data){
				
			//User
			$array_user['username'] = escape_value($data['username']);
			$array_user['role'] = escape_value($data['role']);
			$temp_key = uniqid(rand(), true);				
			$array_user['pass_hash'] = $this->user->create_hash($temp_key);
			$table = $array_user['role'];		
			
			//Add User
			if (isset($data['wakeup'])) {
				//just update user
				$insert = $this->helper->update('users', $data['wakeup'], $array_user);
				$id = $data['wakeup'];
			} else {
				
				if (isset($data['status'])) {
					$array_user['status'] = $data['status'];
				}
				// create user
				
				$insert = $this->helper->insert('users', $array_user);
				$id =  DB::insertId();
			}			
			
			if ($insert > 0) {				
				
				$this->create_profile($table,$id,$data);
				$send_mail = 'Y';
				//Si hay status ...
				if (isset($data['status'])) {
					//... check if Email should be sent or not
					if ($data['status'] == 'sleep') {
						$send_mail = 'N';
					}
				}							
				
				if ($send_mail === 'Y') {
					
					//Email User Activation Notification
					$message = SYSTEM_SIMPLE_EMAIL_HEAD;								
					$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1;
					$message .= SYSTEM_EMAIL__YOUR_USER_IS_MESSAGE. $array_user['username'] .'<br><br>';
					$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2;
					$message .= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$array_user['username'].'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Activar Usuario</a>';				
					$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART3;
					$message .= SYSTEM_SIMPLE_EMAIL_FOOTER;
					
					$this->email->sendMail($array_user['username'], SYSTEM_EMAIL, ACTIVATION_USER_SUBJECT , $message);
						
				}			
					
			}		
			return DB::affectedRows();
					
		}

		//CREATE: MEthod called by Control Panel form, or ACCOUNTCONTROLLER to generate user after verification
		public function createRedes($data){
				
			//User
			$array_user['username'] = escape_value($data['username']);
			$array_user['role'] = escape_value($data['role']);
			$temp_key = escape_value($data['id']);				
			$array_user['pass_hash'] = $this->user->create_hash($temp_key);
			$table = $array_user['role'];		
			
			//Add User
			if (isset($data['wakeup'])) {
				//just update user
				$insert = $this->helper->update('users', $data['wakeup'], $array_user);
				$id = $data['wakeup'];
			} else {
				
				if (isset($data['status'])) {
					$array_user['status'] = $data['status'];
				}
				// create user
				
				$insert = $this->helper->insert('users', $array_user);
				$id =  DB::insertId();
			}			
			
			if ($insert > 0) {				
				
				$this->create_profile($table,$id,$data);
				$send_mail = 'Y';
				//Si hay status ...
				if (isset($data['status'])) {
					//... check if Email should be sent or not
					if ($data['status'] == 'sleep') {
						$send_mail = 'N';
					}
				}							
				
				if ($send_mail === 'Y') {
					
					//Email User Activation Notification
					$message = SYSTEM_SIMPLE_EMAIL_HEAD;								
					$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1;
					$message .= SYSTEM_EMAIL__YOUR_USER_IS_MESSAGE. $array_user['username'] .'<br><br>';
					$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2;
					$message .= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$array_user['username'].'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Activar Usuario</a>';				
					$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART3;
					$message .= SYSTEM_SIMPLE_EMAIL_FOOTER;
					
					$this->email->sendMail($array_user['username'], SYSTEM_EMAIL, ACTIVATION_USER_SUBJECT , $message);
						
				}			
					
			}		
			return DB::affectedRows();
					
		}


		// CREATE_PROFILE: Method called by ACCOUNTCONTROLLER or USERS to generate User Profile in Database separate table
		public function create_profile($table,$id, $data) {
			
			//Only accepts registered tables
			switch ($table) {
				case 'patient': break;
				case 'doctor': break;
				case 'doctor_assistant': break;			
				default: exit; break;
			}
			
			$array_profile['id'] = $id;
			//User Profile
			$array_profile['username'] 	= escape_value($data['username']);
			$array_profile['name'] 		= escape_value($data['name']);
			$array_profile['lastname'] 	= escape_value($data['lastname']);
			$array_profile['email'] 	= escape_value($data['email']);
			$array_profile['birth'] 	= escape_value($data['birth']);
			$array_profile['gender'] 	= escape_value($data['gender']);
			//$array_profile['phone'] 	= escape_value($data['phone']);
			//$array_profile['id_card'] = escape_value($data['id_card']);
			$array_profile['data']		=	$data['data'];
			$array_profile['picture'] 	= escape_value($data['picture']);
			if (isset($data['status'])) {
				$array_profile['status'] = escape_value($data['status']);
			}
			$array_profile['location'] 	= escape_value($data['location']);			
			//Create and add Profile			
			if (isset($data['wakeup'])) {
				//just update user
				$insert = $this->helper->update($table, $id, $array_profile);
			} else {
				// create user profile
				$insert_profile = $this->helper->insert($table, $array_profile);
			}	
			
			
		}		
		
	
	}

?>