<?php
//print_r($_SERVER); 
ob_start();
$_SERVER['DOCUMENT_ROOT'] = rtrim((__FILE__),$_SERVER['argv'][0]);
$GLOBALS['CRON'] = '1';

$_SERVER['BASE_DIR'] = '/base';
$_SERVER['CUSTOM_DIR'] = '/custom';
$_SERVER['DBTYPE'] = 'mysql';

$_SERVER['DBHOST'] = '127.0.0.1';
$_SERVER['DBUSER'] ='financial';
$_SERVER['DBPASS'] ='financial';
$_SERVER['DBNAME'] ='financial_system_local';
$_SERVER['CRON_SCRIPT']= '';

foreach($_SERVER['argv'] as $key=>$value){
	if(strstr($value,'=')){
		$param_key = strstr($value,'=',true);
		switch ($param_key){
		case 'DBHOST':
			$_SERVER['DBHOST'] = ltrim(strstr($value,'='),'=');
			break;
		case 'DBUSER':
			$_SERVER['DBUSER'] = ltrim(strstr($value,'='),'=');
			break;
		case 'DBPASS':
			$_SERVER['DBPASS'] = ltrim(strstr($value,'='),'=');
			break;
		case 'DBNAME':
			$_SERVER['DBNAME'] = ltrim(strstr($value,'='),'=');
			break;
		case 'BASE_DIR':
			$_SERVER['BASE_DIR'] = ltrim(strstr($value,'='),'=');
			break;
		case 'CUSTOM_DIR':
			$_SERVER['CUSTOM_DIR'] = ltrim(strstr($value,'='),'=');
			break;
		case 'DBTYPE':
			$_SERVER['DBTYPE'] = ltrim(strstr($value,'='),'=');
			break;
		case 'CRON_SCRIPT':
			$_SERVER['CRON_SCRIPT'] = ltrim(strstr($value,'='),'=');
			break;
		case 'DOCUMENT_ROOT':
			$_SERVER['DOCUMENT_ROOT'] = ltrim(strstr($value,'='),'=');
			break;
		}
		
	}else{
		continue;
	}
}
ini_set('display_errors',1);
error_reporting(E_ERROR);
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR . $_SERVER['BASE_DIR'] . DIRECTORY_SEPARATOR . 'init.php');

$cronjobs_obj = CoreIncludes::getInstance('Cronjobs');
if($_SERVER['CRON_SCRIPT']){
	$job = $cronjobs_obj->getCronjobByScript($_SERVER['CRON_SCRIPT']);
	
	CoreIncludes::getApp(rtrim($_SERVER['CRON_SCRIPT'],'.php'),false,true,true);
	
	$cronjobs_obj->timestamp('cronjobs_last_run',$job['cronjobs_id']);
	mail($job['cronjobs_email_notify_errors'],'Cron job ' . $_SERVER['CRON_SCRIPT'],ob_get_contents());
	
}else{
	$jobs = $cronjobs_obj->getActiveJobs();
	$interval = array();
	$days = array();
	
	foreach ($jobs as $key=>$value){
		if(!runByDayOfWeek($value)){
			continue;
		}
		if(!runByHour($value)){
			continue;
		}
		require_once CoreIncludes::getApp(rtrim($value['cronjobs_script'],'.php'),false,true);
	}
}
ob_flush();
function runByHour($value){
	$HOUR = date('G') -1;
	if($value['cronjobs_hours_to_run'] == '*' ){
		return true;
	}
	if(strstr($value['cronjobs_hours_to_run'],'-')){
		$interval = explode('-',$value['cronjobs_hours_to_run']);
		return $HOUR >= $interval[0] && $HOUR <= $interval[1]; 
	}
	if(strstr($value['cronjobs_hours_to_run'],',')){
		$hours = explode(',',$value['cronjobs_hours_to_run']);
		return in_array($hours, $HOUR);
	}		
}
function runByDayOfWeek($value){
	$DOW = date('N');
	if($value['cronjobs_days_of_week'] == '*'){
		return true;
	}
	if(strstr($value['cronjobs_days_of_week'],'-')){
		$interval = explode('-',$value['cronjobs_days_of_week']);
		return ($DOW >= $interval[0] && $DOW <= $interval[1] );	
	}
	if(strstr($value['cronjobs_days_of_week'],',')){
		$days = explode(',',$value['cronjobs_days_of_week']);
		return in_array($days, $DOW);
	}		
}
?>