<?php
class CoreHandleApp{
	function handle(){
		$logado = CoreHandleApp::logado();
		$uri_no_params =strstr($_SERVER['REQUEST_URI'],"?",true) ? strstr($_SERVER['REQUEST_URI'],"?",true) : $_SERVER['REQUEST_URI'];
		switch ($uri_no_params){
			case '/app/login.php':
				if(!isset($_GET['requestPassConfirmation'])){
					CoreIncludes::getApp('login');
				}
				
				break;
			case '/':
				if($logado){
					CoreIncludes::getApp('dashboard');
				}else{
					CoreIncludes::getApp('login');
				}
				break;
			case '/app/remote.php':
				break;
			default:
				if(!$logado && !$GLOBALS['CRON']){
					CoreIncludes::getApp('login');
				}
		}
	}
	function logado(){
		session_start();
		return $_SESSION['user']['id'] != '';
	}
}