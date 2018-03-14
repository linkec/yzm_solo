<?php
$route = explode('/',$_SERVER["REQUEST_URI"]);
if(!isset($route[1])){
	\Workerman\Protocols\Http::end("GET ".$_SERVER["REQUEST_URI"].' Failed');
}
if($route[1]=='share'){
	$vkey = $route[2];
	require(APP_ROOT.'/Include/config.php');
	require_once APP_ROOT.'/Include/Mysql.inc.php';
	$db = new DBConnection($dbc['host'], $dbc['port'], $dbc['user'], $dbc['password'], $dbc['db_name']);
	$video = $db->query("SELECT * FROM videos WHERE vkey='$vkey'");
	if($video){
		$title = $video[0]['vname'];
		$m3u8_url = '/'.$video[0]['vpath'].'playlist.m3u8';
		$screenshot_url = '/'.$video[0]['vpath'].'screenshot1.png';
		require(template_echo('play'));
	}else{
		\Workerman\Protocols\Http::end("GET ".$_SERVER["REQUEST_URI"].' Failed');
	}
}else{
	\Workerman\Protocols\Http::end("GET ".$_SERVER["REQUEST_URI"].' Failed');
}
?>