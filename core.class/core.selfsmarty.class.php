<?php
	require_once(BASE_DIR . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'Smarty' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'Smarty.class.php') ;
	class CoreSelfsmarty extends Smarty{
		function CoreSelfsmarty(){
			parent::__construct();
			$this->setTemplateDir(BASE_DIR . DIRECTORY_SEPARATOR . 'templates');
			$this->setCompileDir(BASE_DIR . DIRECTORY_SEPARATOR . 'templates_c');
		}
		function display($template,$cache_id=null,$compile_id=null,$parent=null){
			parent::display($template,$cache_id,$compile_id,$parent);
		}	
	}

?>