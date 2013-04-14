<?php
	class includes{
		// get instance with the following order
		// custom/class
		// base/class
		// base/core.class
		
		public function getInstance($class_name){
			static $classes;
			if(isset($classes[$class_name])){
				return $classes[$class_name];
			}else{
				if(isset($GLOBALS['REGISTERED'][$class_name])){
					require_once($GLOBALS['REGISTERED'][$class_name]['PATH']);
					
				}else{
					$file_custom_class = CUSTOM_DIR . DIRECTORY_SEPARATOR . $class_name . '.class.php';
					$file_base_class = BASE_DIR . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR. $class_name . '.class.php';
					//$file_core_class = BASE_DIR . DIRECTORY_SEPARATOR . 'core.class' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . $class_name . '.class.php';
					if(file_exists($file_custom_class)){
						require_once($file_custom_class);
					}else if(file_exists($file_base_class)){
						require_once($file_base_class);
					}
				}
				$class = new $class_name();
				$classes[$class_name] = $class;
			}
			return $classes[$class_name];
		}
	}