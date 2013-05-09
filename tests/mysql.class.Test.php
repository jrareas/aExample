<?php
	require_once BASE_DIR . DIRECTORY_SEPARATOR . 'core.class/core.includes.class.php';
	class MysqlTest extends PHPUnit_Framework_TestCase{
		private $mysql;
		public function setUp(){
			$this->mysql = CoreIncludes::getInstance('mysql');
		}
		public function tearDown(){
			unset($this->mysql);
		}
		public function testConnect(){
			$this->assertTrue($this->mysql->connect());
		}
	}