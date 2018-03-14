<?php
use \Workerman\WebServer;
//前台
$cores = 1;
if (false === ($str = @file("/proc/cpuinfo"))){
	exit('Can not get CPU cores'.LF);
}
$str = implode("", $str);
@preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
if (false !== is_array($model[1])){
    $cores = sizeof($model[1]);
}
echo "WebServer runs in $cores threads.".LF;
$webserver = new WebServer('http://0.0.0.0:80');
$webserver->addRoot('localhost', APP_ROOT . '/Storage/');
$webserver->name = 'FrontWeb';
$webserver->count = $cores;
