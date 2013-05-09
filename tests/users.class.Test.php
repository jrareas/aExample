<?php
	defined('BASE_DIR') or define('BASE_DIR', dirname( dirname(__FILE__) ));
	require_once BASE_DIR . DIRECTORY_SEPARATOR . 'core.class/core.includes.class.php';
	class UsersTest extends PHPUnit_Framework_TestCase{
		protected $user;
		public function setUp(){
			$this->user = CoreIncludes::getInstance('Users');
		}
		public function tearDown(){
			unset($this->user);
		}
		public function testgetUserByUserId(){
			$user_arr = $this->user->getUserByUserId('admin');
			$this->assertArrayHasKey('id',$user_arr) ;
		}
	}