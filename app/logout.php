<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR . 'init.php');
	session_start();
	unset($_SESSION['user']['id']);
	//CoreIncludes::getApp('login');
	//CoreHandleApp::handle();
	
	