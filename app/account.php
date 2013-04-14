<?php
require_once($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR . $_SERVER['BASE_DIR'] . DIRECTORY_SEPARATOR . 'init.php');

	if($_REQUEST['action'] == 'maintain'){
		$smarty->assign('wrapper','wrappers/account/account.tpl');
	}else{
		$smarty->assign('wrapper','wrappers/account/account.tpl');
	}

$smarty->assign('user',$_SESSION['user']);
$smarty->display('pages.tpl');
	
?>