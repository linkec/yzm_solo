<!DOCTYPE html>
<html lang="zh-cn">
 <head> 
  <meta charset="utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <title>云转码</title> 
  <link href="/css/zui.min.css" rel="stylesheet" /> 
  <script src="/js/jquery.js"></script> 
  <script src="/js/zui.min.js"></script> 
  <link href="/lib/datatable/zui.datatable.min.css" rel="stylesheet" /> 
  <script src="/lib/datatable/zui.datatable.min.js"></script> 
  <script type="text/javascript" src="/js/plupload.full.min.js"></script>
  <script type="text/javascript" src="/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
  <link rel="stylesheet" href="/js/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />

 </head> 
 <body> 
  <div class="row" style="width:1024px;  margin-left: auto;margin-right: auto;"> 
   <h1 class="header-dividing">云转码{#YZMVER#}<span class="pull-right">#<span id="syspid">{#posix_getpid()#}</span></span></h1> 
   <div class="col-xs-2"> 
    <ul class="nav nav-tabs nav-stacked"> 
     <li {#$act=='upload' ? 'class="active"':''#}><a href="/admin/upload">文件上传</a></li> 
     <li {#$act=='list' ? 'class="active"':''#}><a href="/admin/list">文件列表</a></li> 
     <li {#$act=='settings' ? 'class="active"':''#}><a href="/admin/settings">系统设置</a></li> 
     <li {#$act=='license' ? 'class="active"':''#}><a href="/admin/license">授权信息</a></li> 
     <li {#$act=='status' ? 'class="active"':''#}><a href="/admin/status">运行状态</a></li> 
     <li><a href="/admin/logout">安全退出</a></li> 
    </ul> 
   </div> 
   <div class="col-xs-10"> 
    <div class="tab-content"> 