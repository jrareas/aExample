<?php
require_once(BASE_DIR . '/core.class/core.users.class.php');
	class Users extends CoreUsers{
		function Users($tableName=''){
			parent::__construct($tableName);
		}
		function getUserByUserId($user_id){
			return $this->getByValue('user_id', $user_id);
		}
		function setLastLogin($data){
			return $this->Save($data);
		}
	}