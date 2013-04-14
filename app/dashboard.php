<?php
require_once($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR  . 'init.php');



$smarty->assign('wrapper','wrappers/dashboard.tpl');
$smarty->assign('user',$_SESSION['user']);

$smarty->display('pages.tpl');
