<?php

	class CoreLogin{
		var $dataLogin;
		var $user;
		var $password;
		public function userValidation(){
			$this->user = $_POST['users_id'];
			$this->password = $_POST['users_password'];
			$this->getDataUser();
			if($this->LoginValido()){
				$this->dataLogin['loginResult'] = 'ok';
				$this->dataLogin['lastLogin'] = $this->dataUser['users_last_login'];
				$this->dataLogin['firstName'] = $this->dataUser['users_first_name'];
				$this->dataLogin['lastName'] = $this->dataUser['users_last_name'];
				$path = session_save_path();
				session_start();
				foreach($this->dataLogin as $key=>$value){
					$_SESSION['user'][$key] = $value;
				}	
			}else{
				$this->dataLogin['errorMessage'] = 'User or Password does not match.';
				$this->dataLogin['loginResult'] = 'error';
			}
		}
		public function setLastLogin(){
			$data['id'] = $this->dataUser['User']['id'];
			$data['last_login'] = getdate();
			$this->User->save($data);
		}
		public function LoginValido(){
			return (isset($this->dataLogin['id']));
		}
		private function getDataUser($login=true){
			if(!isset($this->dataLogin['users_user_id']) || ($this->dataLogin['users_user_id'] != $_POST['users_user_id'])){
				$users_obj = CoreIncludes::getInstance('Users');
				$user_info = $users_obj->getUserByUserId($_POST['users_user_id']);
				$this->dataLogin = $user_info;
				if($login && ($user_info['user_password'] == sha1($_POST['users_password']))){
					$datetime = new DateTime();
					$users_obj->setLastLogin(array('id'=>$user_info['id'],'last_login'=>$datetime->format('Y\-m\-d\ H:i:s')));
				}
			}
			return $this->dataLogin;
		}
		public function getDataLogin(){
			return json_encode($this->dataLogin);
		}
		public function forgotPassword(){
			$this->getDataUser(false);
			$ret = array();
			if(!isset($this->dataLogin['user_id'])){
				$ret['valid'] = 0;
				$ret['message'] = 'The User ID provided could not be found on our system. Please, check the spelling and submit the request again.';
			}else{
				$ret['valid'] = 1;
				$ret['message'] = 'A new password was sent to ' . $this->dataLogin['email'] . '. Use the password to log in the system.';
				$this->emailNewPassword($this->dataLogin['email']);
			}
			echo json_encode($ret);
		}
		public function requestPassConfirmation($code){
			$smarty = CoreIncludes::getInstance('Selfsmarty');
			$smarty->assign('image',base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR .   "images/financial-planning-a-pen-on-a-pile-of-charts.jpg")));
			$user_obj = CoreIncludes::getInstance('Users');
			$user_info = $user_obj->getUserByPasswordConfirmationCode($code);
			$user_obj->save(array('id'=>$user_info['id'],'user_password'=>$user_info['new_password']));
			$smarty->assign('user_info',$user_info);
			$smarty->assign('home',$_SERVER['HTTP_HOST']);
			$smarty->display('newpasswordconfirmation.tpl');
		}
		function emailNewPassword($to){
			$user_obj = CoreIncludes::getInstance('Users');
			$this->getDataUser();
			$newPass = $this->generateRandomString(10);
			$newPassCodeRequest = $this->generateRandomString(20);
			$user_obj->save(array('id'=>$this->dataLogin['id'],'new_password'=>sha1($newPass),'new_password_code_request'=>$newPassCodeRequest));
			
			$viewVars = array('fullName'=>$this->dataLogin['user_first_name'] . " " .$this->dataLogin['user_last_name']
					,'newPassword' => $newPass
					,'linkConfirmation'=>"<a href=http://". $_SERVER['HTTP_HOST'] . "/app/login.php?requestPassConfirmation=" . $newPassCodeRequest . ">http://". $_SERVER['HTTP_HOST'] . "/app/login.php?requestPassConfirmation=" . $newPassCodeRequest . "</a>"
			);
			$this->sendMailUser($to,'','Financial System - New Password Request','newpassword','newpassword',$viewVars);
		}
		private function sendMailUser($to,$message,$subject,$template='default',$view='default',$viewVars=array()){
			$smarty = CoreIncludes::getInstance('Selfsmarty');
			$smarty->assign('image',base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR .  "images/financial-planning-a-pen-on-a-pile-of-charts.jpg")));
			$smarty->assign('viewVars',$viewVars);
			$content =$smarty->fetch('newpassword.tpl'); 
						
			$email = CoreIncludes::getInstance('Selfphpmailer');
			$email->IsMail();
			$email->IsHTML(true);
			$email->Body = $content;
			$email->From = 'noreply@pieceofcake.no-ip.org';
			$email->FromName = 'Financial System';
			$email->AddAddress($to);
			$email->Subject = $subject;
			$email->Send();
		}
		private function generateRandomString($length = 10) {
			return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		}
		
	}
	
	