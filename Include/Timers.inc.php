<?php
use \Workerman\Lib\Timer;
function TzerOnWorkerStart($worker){
	require(APP_ROOT.'/Include/config.php');
	require_once APP_ROOT.'/Include/Mysql.inc.php';
	$db = new DBConnection($dbc['host'], $dbc['port'], $dbc['user'], $dbc['password'], $dbc['db_name']);
	if(!is_dir(APP_ROOT.'/.tmp/')){
		mkdir(APP_ROOT.'/.tmp/');
	}
	Timer::add(1,'TzerLoop',array($config,$db,$worker));
}