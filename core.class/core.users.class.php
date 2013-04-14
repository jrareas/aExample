<?php
require_once(BASE_DIR . '/core.class/core.model.class.php');
	Class CoreUsers extends CoreModel{
		function CoreUsers($table_name=""){
			parent::__construct($table_name);
		}
		function getUserByPasswordConfirmationCode($passconfcode){
			return $this->getByValue('new_password_code_request', $passconfcode);
		}
	}