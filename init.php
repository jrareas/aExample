<?php
	//include class handle requires. This class is core only
//	ini_set('display_errors',1);

	date_default_timezone_set("America/Toronto");
	define('BASE_DIR', $_SERVER['DOCUMENT_ROOT']);
	require_once(BASE_DIR . '/core.class/core.includes.class.php');
	require_once(BASE_DIR . '/core.class/core.handle.app.php');
	CoreHandleApp::handle();
	$smarty = CoreIncludes::getInstance('Selfsmarty');
	
?>