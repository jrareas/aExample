<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR .  'init.php');
	$smarty = CoreIncludes::getInstance('Selfsmarty');
	if(isset($_GET['requestPassConfirmation'])){
		$login_obj = CoreIncludes::getInstance('Login');
		$login_obj->requestPassConfirmation($_GET['requestPassConfirmation']);
	}else{
		$smarty->display('login.tpl');
	}
?>