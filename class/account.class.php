<?php
class Accounts extends CoreAccounts{
	function Accounts($tableName=''){
		parent::__construct($tableName);
	}
	function getAccountByAccountId($accounts_id){
		return $this->getByValue('accounts_id', $accounts_id);
	}
}