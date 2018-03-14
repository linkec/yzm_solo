<!--#include admin.header#-->
<div class="tab-pane fade active in" id="tab3Content3">
<form class="form-horizontal" method="POST" enctype="multipart/form-data">
  <div class="form-group">
	<label for="10" class="col-sm-2">登陆密码</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="10" name="password" value="{$config['password']}">
	</div>
  </div>
  <div class="form-group">
	<label for="2" class="col-sm-2">进程数</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="2" name="workers" value="{$config['workers']}">
	</div>
  </div>
  <div class="form-group">
	<label for="1" class="col-sm-2">播放器接口</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="1" name="player" value="{$config['player']}">
	</div>
  </div>
  <div class="form-group">
	<label for="4" class="col-sm-2">码率</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="4" name="bitrate" value="{$config['bitrate']}">
	</div>
  </div>
  <div class="form-group">
	<label for="5" class="col-sm-2">分辨率</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="5" name="wxh" value="{$config['wxh']}">
	</div>
  </div>
  <div class="form-group">
	<label for="6" class="col-sm-2">切片时长</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="6" name="segment_time" value="{$config['segment_time']}">
	</div>
  </div>
  <div class="form-group">
	<label for="7" class="col-sm-2">截图分辨率</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="7" name="screenshot_wxh" value="{$config['screenshot_wxh']}">
	</div>
  </div>
  <div class="form-group">
	<label for="8" class="col-sm-2">截图个数</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="8" name="screenshot_amont" value="{$config['screenshot_amont']}">
	</div>
  </div>
  <div class="form-group">
	<label for="9" class="col-sm-2">视频输出目录</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="9" name="storage_path" value="{#APP_ROOT.'/Storage/'#}" disabled>
	</div>
  </div>
  <div class="form-group">
	<label for="3" class="col-sm-2">广告字幕</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="3" name="subtitles" value="{$config['subtitles']}">
		</div>
		<div class="col-sm-5">
			<input type="file" class="form-control" id="3" name="subtitles">
		</div>
  </div>
  <div class="form-group">
	<label for="10" class="col-sm-2">播放器LOGO</label>
		<div class="col-sm-5">
		  <input type="text" class="form-control" id="10" name="player_logo" value="{$config['player_logo']}">
		</div>
		<div class="col-sm-5">
			<input type="file" class="form-control" id="10" name="player_logo">
		</div>
  </div>
  <div class="form-group">
	<label for="11" class="col-sm-2">播放器右键菜单</label>
	<div class="col-sm-10">
	  <textarea class="form-control" name="player_menu">{#base64_decode($config['player_menu'])#}</textarea>
	</div>
  </div>
  <div class="form-group">
	<label for="12" class="col-sm-2">播放器统计代码</label>
	<div class="col-sm-10">
	  <textarea class="form-control" name="player_jscode">{#base64_decode($config['player_jscode'])#}</textarea>
	</div>
  </div>
  <div class="form-group">
	<label for="13" class="col-sm-2">播放器授权码</label>
	<div class="col-sm-10">
	  <input type="text" class="form-control" id="13" name="player_license" value="{$config['player_license']}">
	</div>
  </div>
  <div class="form-group">
	<label class="col-sm-2">保存MP4</label>
	<div class="col-sm-10">
	<label class="radio-inline">
	  <input type="radio" name="savemp4" value=1 {#ifchecked(1,$config['savemp4'],'int')#}> 是
	</label>
	<label class="radio-inline">
	  <input type="radio" name="savemp4" value=0 {#ifchecked(0,$config['savemp4'],'int')#}> 否
	</label>
	</div>
  </div>
  <button type="submit" class="btn btn-primary">保存设置</button>
</form>
</div>
<!--#include admin.footer#-->