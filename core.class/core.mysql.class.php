<?php
	require_once(BASE_DIR . '/core.class/core.db.class.php');
	class CoreMysql extends CoreDb{
		var $result;
		function CoreMysql(){
			parent::__construct();
			$this->connect();
		}
		function connect(){
			if(isset($_SESSION['DBHandle']) && $_SESSION['DBHandle'])
			{
				$this->dbHandle = $_SESSION['DBHandle'];
			}else {
				$this->dbHandle = mysql_connect($_SERVER['DBHOST'],$_SERVER['DBUSER'],$_SERVER['DBPASS']);
			}
			if(!mysql_select_db($_SERVER['DBNAME'] ,$this->dbHandle )){
				$this->error[] = mysql_error($this->dbHandle);
			}
		}
		function getNextRow(){
			if($this->result){
				return mysql_fetch_assoc($this->result);
			}else{
				return array();
			}
			
		}
		function Query($sql,$keepError=true){
			$this->result = mysql_query($sql,$this->dbHandle);
			
			if(!$this->result && $keepError){
				$this->error[] = mysql_error($this->dbHandle);
			}
		}
		function getLastInsertedId(){
			return mysql_insert_id($this->dbHandle);
		}
	}

?>