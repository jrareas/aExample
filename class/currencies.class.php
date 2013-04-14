<?php
require_once(BASE_DIR . '/core.class/core.currencies.class.php');
Class Currencies extends CoreCurrencies{
	function Currencies($table_name=''){
		parent::__construct($table_name);
	}
}