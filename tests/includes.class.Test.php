<?php
	require_once '../core.class/core.includes.class.php';
	define('BASE_DIR', dirname( dirname(__FILE__) ));
	class includesTest extends PHPUnit_Framework_TestCase{
		public function setUp(){}
		public function tearDown(){}
		public function testgetInstance(){
			$this->assertNotNull(CoreIncludes::getInstance('Selfsmarty'));
			$this->assertNotNull(CoreIncludes::getInstance('Users'));
		}
	}