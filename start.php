<?php
define('APP_ROOT',__DIR__);
date_default_timezone_set('Asia/Chongqing');
if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	define('LF',"\r\n");
}else{
	define('LF',"\n");
}

require(APP_ROOT.'/Include/Auth.inc.php');

use \Workerman\Worker;
use \Workerman\WebServer;
use \Workerman\Lib\Timer;
use \Workerman\Connection\TcpConnection;

TcpConnection::$maxPackageSize = 30*1024*1024;

//后台
$adminWeb = new WebServer('http://0.0.0.0:8888');
$adminWeb->addRoot('localhost', __DIR__ . '/Admin/');
$adminWeb->count = 1;
$adminWeb->name = 'Admin';

//前台
if(file_exists(APP_ROOT.'/Include/WebServer.inc.php')){
	require(APP_ROOT.'/Include/WebServer.inc.php');
}

//探针
$tzer = new Worker();
$tzer->name = 'Tzer';
$tzer->count = 1;
$tzer->onWorkerStart = function($worker){
	require_once(APP_ROOT.'/Include/Timers.inc.php');
	TzerOnWorkerStart($worker);
};
$tzer->onWorkerStop = function($worker){
	recycleKill();
};
Worker::$stdoutFile = APP_ROOT.'/yzm.log';
Worker::$daemonize = true;
Worker::runAll();