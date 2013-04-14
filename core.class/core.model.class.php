<?php
	/*
	 * creator : jareas
	 * comment : this class is base for all model classes
	 * 
	 */
	Class CoreModel{
		var $table="";
		var $class_name = "";
		var $db_con;
		var $field_id;
		var $fields;
		var $fields_to_save;
		var $errors = array();
		public function isError(){
			return count($this->errors) > 0;
		}
		public function timestamp($field,$id){
			$sql = "update %s set %s = sysdate() where %s='%s'";
			$sql = sprintf($sql,$this->table,$field,$this->field_id,$id);
			$this->db_con->Query($sql);
			if($this->db_con->isError()){
				$this->errors[] = $this->db_con->lastError(true);
				return false; 
			}
			return true;
		}
		private function getDbInstance(){
			static $db;
			if(!$db){
				$db = CoreIncludes::getInstance($_SERVER['DBTYPE']);
			}
			$this->db_con = $db;
		} 
		protected function getAll(){
			$sql = 'select * from %s';
			$sql = sprintf($sql,$this->table);
			$this->db_con->Query($sql);
			$ret = array();
			while ($row = $this->db_con->getNextRow()){
				$ret[] = $row;
			}
			return $ret;
			
		}
		protected function setModelFields(){
			if($this->table){
				$sql = 'show columns from %s';
				$sql = sprintf($sql,$this->table);
				$this->db_con->Query($sql,false);
				while($row = $this->db_con->getNextRow()){
					$this->fields[$row['Field']] = '';
				}
			}
		}
		function setTable($tablename){
			$this->table = $tablename;
			$this->setModelFields();
		}
		function CoreModel($table_name=""){
			//connecting with database
			$this->getDbInstance();
			$this->class_name = get_class($this);
			if($table_name == ""){
				$tmp = preg_split('/[A-Z]/', $this->class_name,PREG_SPLIT_NO_EMPTY);
				foreach($tmp as $key=>$value){
					$this->table .= lcfirst($value) . "_" ;
				}	
				$this->table = rtrim($this->table,"_");
			}
			$this->field_id = 'id';
			$this->setModelFields();
			
		}
		function getByValue($key,$value){
			$sql = "select * from %s where %s = '%s'";
			$sql = sprintf($sql,$this->table,$key,$value);
			$ret = $this->db_con->Query($sql);
			return $this->db_con->getNextRow();
			
		}
		private function setFieldsValues($data){
			unset($this->fields_to_save);
			foreach($data as $key=>$value){
				if(isset($this->fields[$key])){
					$this->fields_to_save[$key] = $value;
				}
			}
		}
		function Save($data){
			$this->setFieldsValues($data);
			if(isset($data[$this->field_id])){
				return $this->Update();
			}else{
				return $this->Add();
			}
		}
		private function getFieldsSqlFormat($format){
			$ret = '';
			if ($format=='U'){
				foreach ($this->fields_to_save as $key=>$value){
					if($key != $this->field_id){
						$ret .= $key . ' = ' . "'$value',";
					}
				}
				if(isset($this->fields[$this->table . '_date_updated'])){
					$ret .= $this->table . '_date_updated = sysdate()';
				}
				$ret = rtrim($ret,",");
				return $ret;
			}else if($format=='I'){
				$ret['fields'] = "(";
				$ret['values'] = "(";
				foreach($this->fields_to_save as $key=>$value){
					$ret['fields'] .= $key . ',';
					$ret['values'] .="'" . $value . "',";
				}
				if(isset($this->fields[$this->table . '_date_created'])){
					$ret['fields'] .= $this->table . '_date_created';
					$ret['values'] .="sysdate()";
				}
				$ret['fields'] = trim($ret['fields'],',') . ')';
				$ret['values'] = trim($ret['values'],',') . ')';
				return $ret['fields'] . 'values' . $ret['values'];
			}
			print_r($ret);
			
		}
		private function Update(){
			$sql = 'update %s set %s where ' . $this->field_id . " = '%s'";
			$sql = sprintf($sql,$this->table,$this->getFieldsSqlFormat('U'),$this->fields_to_save[$this->field_id]);
			$this->db_con->Query($sql);
			return $this->fields_to_save[$this->field_id];
		} 
		private function Add(){
			$sql = 'insert into %s %s';
			$sql = sprintf($sql,$this->table,$this->getFieldsSqlFormat('I'));
			$this->db_con->Query($sql);
			return $this->db_con->getLastInsertedId();
		} 
		function getBasicInfo($_id){
			return $this->getByValue($this->table . '_id',$_id);
		}
		
		
		
	}