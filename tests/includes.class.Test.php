<?php
	
	defined('BASE_DIR') or define('BASE_DIR', dirname( dirname(__FILE__) ));
	require_once BASE_DIR . DIRECTORY_SEPARATOR . 'core.class/core.includes.class.php';
	class includesTest extends PHPUnit_Framework_TestCase{
		public function setUp(){}
		public function tearDown(){}
		public function testgetInstanceSelfSmarty(){
			$this->assertNotNull(CoreIncludes::getInstance('Selfsmarty'));
		}
		public function testgetInstanceUsers(){
			$this->assertNotNull(CoreIncludes::getInstance('Users'));
		}
		
	}