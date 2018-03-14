<?php
\Workerman\Protocols\Http::sessionStart();
require(APP_ROOT.'/Include/config.php');
require_once APP_ROOT.'/Include/Mysql.inc.php';
$db = new DBConnection($dbc['host'], $dbc['port'], $dbc['user'], $dbc['password'], $dbc['db_name']);
$hiconsole_req = explode('/',$_SERVER["REQUEST_URI"]);
$mod = isset($hiconsole_req[1]) ? $hiconsole_req[1] : 'default';
$act = isset($hiconsole_req[2]) ? $hiconsole_req[2] : 'default';

if(isset($_SESSION['password']) && $_SESSION['password']==$config['password']){
	$app_uid = 1;
}else{
	$app_uid = null;
}

if(!is_dir(APP_ROOT.'/Storage/')){
	make_dir(APP_ROOT.'/Storage/');
}

if(!is_dir(APP_ROOT.'/.tmp/')){
	mkdir(APP_ROOT.'/.tmp/');
}

switch($mod){
	default:
		if(!$app_uid){
			\Workerman\Protocols\Http::header('location:/login');
		}else{
			\Workerman\Protocols\Http::header('location:/admin/list');
		}
		break;
	case'test':
		require(template_echo('admin.test'));
		break;
	case'admin':
		if(!$app_uid){
			\Workerman\Protocols\Http::header('location:/login');
		}
		switch($act){
			case'upload':
				if($_SERVER['REQUEST_METHOD']=='POST'){
					doUpload($db);
				}else{
					require(template_echo('admin.upload'));
				}
				break;
			case'delete':
				$vid = intval($hiconsole_req[3]);
				doDelete($db,$vid);
				break;
			case'phpinfo':
				break;
			case'reload':
				echo 'reloading...';
				recycleKill();
				shell_exec("php ".APP_ROOT."/start.php reload");
				break;
			case'settings':
				if($_SERVER['REQUEST_METHOD']=='POST'){
					if(count($_FILES)){
						foreach($_FILES as $file){
							if($file['name']=='subtitles'){
								if(in_array(strtolower(trim(strrchr($file['file_name'], '.'), '.')),array('ass','srt'))){
									$subs = APP_ROOT.'/Include/'.$file['file_name'];
									file_put_contents($subs,$file['file_data']);
									$_POST['subtitles'] = $subs;
								}
							}
							if($file['name']=='player_logo'){
								if(in_array(strtolower(trim(strrchr($file['file_name'], '.'), '.')),array('jpg','gif','png'))){
									$playerLogo = APP_ROOT.'/Storage/static/logo.'.strtolower(trim(strrchr($file['file_name'], '.'), '.'));
									file_put_contents($playerLogo,$file['file_data']);
									$_POST['player_logo'] = '/static/logo.'.strtolower(trim(strrchr($file['file_name'], '.'), '.'));
								}
							}
						}
					}
					$_POST['player_jscode'] = isset($_POST['player_jscode']) ? $_POST['player_jscode'] : '';
					$_POST['player_menu'] = isset($_POST['player_menu']) ? $_POST['player_menu'] : '';
					$_POST['player_jscode'] = base64_encode($_POST['player_jscode']);
					$_POST['player_menu'] = base64_encode($_POST['player_menu']);
					$config = array_replace($config,$_POST);
					settings_cache($dbc,$config);
				}
				require(template_echo('admin.settings'));
				break;
			case'license':
				global $license,$HWID;
				require(template_echo('admin.license'));
				break;
			case'list':
				$res = doList($db,$act,$config);
				foreach($res as  $k=>$v){
					${$k} = $v;
				}
				require(template_echo('admin.list'));
				break;
			case'status':
				if($_SERVER['REQUEST_METHOD']=='POST'){
					echo file_get_contents(APP_ROOT.'/.tmp/top');
				}else{
					require(template_echo('admin.status'));
				}
				break;
			case'logout':
				$_SESSION['password'] = null;
				\Workerman\Protocols\Http::header('location:/login');
				break;
		}
		break;
	case'login':
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if($_POST['password']!=$config['password']){
				require(template_echo('login'));
			}else{
				$_SESSION['password'] = $_POST['password'];
				\Workerman\Protocols\Http::header('location:/admin/list');
			}
		}else{
			require(template_echo('login'));
		}
		break;
}
?>