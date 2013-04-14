<?php

	class CoreDb{
		private $dbHandle;
		private $dbName;
		private $dbUser;
		private $dbPass;
		private $dbHost;
		protected $error=array();
		function CoreDb(){
			if(isset($_SERVER['DBNAME']))
			{
				$this->dbName = $_SERVER['DBNAME'];
			} 
			if(isset($_SERVER['DBUSER']))
			{
				$this->dbUser = $_SERVER['DBUSER'];
			} 
			if(isset($_SERVER['DBPASS']))
			{
				$this->dbPass = $_SERVER['DBPASS'];
			} 
			if(isset($_SERVER['DBHOST'])){
				$this->dbHost = $_SERVER['DBHOST'];
			}
		}
		function connect(){
			return false;
		}
		function isError(){
			return count($this->error)>0;
		}
		function lastError($propagate=false){
			if($propagate){
				echo $this->error[count($this->error) - 1];
			}
			return $this->error[count($this->error) - 1];
		}
	}

?>