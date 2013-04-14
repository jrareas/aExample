<?php
	class CoreIncludes{
		// get instance with the following order
		// custom/class
		// base/class
		// base/core.class
		public function getInc($inc_name,$fulldir=''){
			
			$file_custom = CUSTOM_DIR . DIRECTORY_SEPARATOR . 'templates/wrappers' . DIRECTORY_SEPARATOR . $inc_name . '.inc.tpl';
			$file_base = BASE_DIR . DIRECTORY_SEPARATOR . 'templates/wrappers' . DIRECTORY_SEPARATOR . $inc_name . '.inc.tpl';
			if(file_exists($file_custom)){
				return $file_custom;
			}else if(file_exists($file_base)){
				return $file_base;
			}else{
				return false;
			}
		}
		
		public function getInstance($class_name,$full_require=""){
			static $classes;
			if(isset($classes[$class_name])){
				return $classes[$class_name];
			}else{
				if($full_require){
					require_once($full_require);
				}else{
					if(isset($GLOBALS['REGISTERED'][$class_name])){
						require_once($GLOBALS['REGISTERED'][$class_name]['PATH']);
							
					}else{
						$file_base_class = BASE_DIR . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR. lcfirst($class_name) . '.class.php';
						$file_core_class = BASE_DIR . DIRECTORY_SEPARATOR . 'core.class' . DIRECTORY_SEPARATOR . 'core.' . lcfirst($class_name) . '.class.php';
						if(file_exists($file_base_class)){
							require_once($file_core_class);
							require_once($file_base_class);
						}else if(file_exists($file_core_class)){
							require_once($file_core_class);
							$class_name = 'Core'. $class_name;
						}
					}
				}
				$class = new $class_name();
				
				$classes[$class_name] = $class;
			}
			return $classes[$class_name];
		}
		public function getApp($appName,$only_uri=false,$cronApp=false,$require=false){
			//$file_custom_app = CUSTOM_DIR . DIRECTORY_SEPARATOR . ((!$cronApp)?'app':'cronjobs') . DIRECTORY_SEPARATOR . $appName . '.php';
			$file_base_app = BASE_DIR . DIRECTORY_SEPARATOR . ((!$cronApp)?'app':'cronjobs') . DIRECTORY_SEPARATOR . $appName . '.php';
			if(file_exists($file_base_app)){
							$uri =  ((!$cronApp)?'/app':'/cronjobs') . '/' . $appName . '.php';
				if($only_uri){
					return $uri; 
				}else{
					//require_once  $file_base_app;
					//exit;
					if($_SERVER['REQUEST_URI'] != $uri){
						if($require){
							require_once  $file_base_app;
						}else{
							header('Location: ' . $uri);
						}
						
					}
					
				}
			}
			else
			{
				throw new Exception("File not exists:$file_base_app" );
			}
				
		}
	}
