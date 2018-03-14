<!doctype html>
<head>
<meta charset="utf-8">
	<title>{$title} - 在线播放</title>
   <!-- player skin -->
   <link rel="stylesheet" href="/static/skin/skin.css">

   <!-- site specific styling -->
   <style>
   body { font: 12px "Myriad Pro", "Lucida Grande", sans-serif; text-align: center;}
   .flowplayer { 
    position: fixed;
    top: 0;
    left: 0;
}
   .flowplayer.is-mouseout:not(.is-paused) .fp-logo {
  display: none;
  /* fouces location */
}
.flowplayer .fp-logo {
  left: auto; 
  right: 3%;
  /* logolocation */
}
#css-splash {
   background-color:#111;
   background-size: 100%;
   /* pre loading */
}
   </style>
   <!-- for video tag based installs flowplayer depends on jQuery 1.7.2+ -->
   <script src="/static/jquery-1.11.2.min.js"></script>
   <!-- include flowplayer -->
   <script src="/static/flowplayer.min.js?v=7.2.2&m=0.0.1"></script>
   <script src="/static/flowplayer.hlsjs.min.js"></script>
   <script src="/static/flowplayer.speed-menu.min.js"></script>
   <script>
flowplayer.conf.logo = {
	href: "javascript:void(0)",
	src:  "{$config['player_logo']}"
};
flowplayer.conf.share = false;
flowplayer.conf.fullscreen = true;
flowplayer.conf.autoplay = false;
flowplayer.conf.aspectRatio = "16:9";
flowplayer.conf.adaptiveRatio = true;
flowplayer.conf.native_fullscreen = true;
</script>
</head>
<body>
   <div id="css-splash" class="flowplayer fp-mute" data-key="{$config['player_license']}" data-ratio="1">
      <video>
         <source type="application/x-mpegurl" src="{$m3u8_url}">
      </video>
      <div class="fp-context-menu fp-menu">{#base64_decode($config['player_menu'])#}</div>
   </div>
   {#base64_decode($config['player_jscode'])#}
</body>

