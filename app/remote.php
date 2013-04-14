<?php

require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'init.php');
if($_GET['processRequest']){
	$req = $_GET['processRequest'];
	$res = array("result"=>"1");

	switch ($req){
		case 'checkLogin':
			login();
			break;
		case 'logout':
			logout();
			break;
		case 'forgotPassword':
			forgotPassword();
			break;
		case 'getFiles':
			getFiles();
			break;
		case 'setFileDefault': 
			setFileDefault($data);
			break;
		case 'deleteLine':
			deleteLine($data,$id);
			break;
		case 'saveForm':
			saveForm($data);
			break;
	}
	
}
function forgotPassword(){
	$login_obj = CoreIncludes::getInstance('Login');
	
	echo $login_obj->forgotPassword();
	
}
function logOff(){
	$this->getSession()->delete('User');
	$this->redirect('/');
}

function logout(){
	ob_start();
	CoreIncludes::getApp('logout',false,false,true);
	ob_clean();
	echo json_encode(array('loginResult'=>'redirect','redirectTo'=>CoreIncludes::getApp('login',true)));
}

function login(){
	$login_obj = CoreIncludes::getInstance('Login');
	$login_obj->userValidation();
	echo $login_obj->getDataLogin();
	
}