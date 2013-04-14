<?php
	require_once(BASE_DIR . '/core.class/core.mysql.class.php');
	class mysql extends CoreMysql{
		function mysqlDb(){
			parent::__construct();
		}
	}

?>