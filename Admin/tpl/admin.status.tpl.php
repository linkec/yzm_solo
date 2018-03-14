<!--#include admin.header#-->
<h1>#top<a class="btn btn-danger pull-right" onclick="reloadSys();">重新启动</a><span class="pull-right" style="font-size:14px;line-height:24px;padding-right:50px;"><i class="icon icon-long-arrow-down"></i> <span id="inBdw">0</span> / <i class="icon icon-long-arrow-up"></i><span id="outBdw">0</span></span></h1>
<pre id="status_data" style="background:black;color:white;word-break: inherit;">
{#file_get_contents(APP_ROOT.'/.tmp/top')#}
</pre>
<h1>#df -h</h1>
<pre style="background:black;color:white;">
{#shell_exec('df -h')#}
</pre>
<h1>#ps -ef | grep ffmpeg</h1>
<pre style="background:black;color:white;">
{#shell_exec('ps -ef | grep ffmpeg | grep -v grep ')#}
</pre>
<script>
function getData(){
	$.ajax({
		url:'/admin/status',
		type:'POST',
		success:function(data){
			$('#status_data').html(data);
		},
		complete:function(){
			setTimeout(function(){getData()},1000);
		}
	});
}
var inBand = 0;
var outBand = 0;
function getBdw(){
	$.ajax({
		url:'/admin/bdw',
		type:'POST',
		dataType:'json',
		success:function(data){
			if(inBand==null){
				inBand = data.in;
			}
			if(outBand==null){
				outBand = data.out;
			}
			$('#inBdw').html(Math.round((data.in-inBand)*8/1024/1024)/100 + ' Mbps');
			$('#outBdw').html(Math.round((data.out-outBand)*8/1024/1024)/100 + ' Mbps');
			inBand = data.in;
			outBand = data.out;
		},
		complete:function(){
			setTimeout(function(){getBdw()},1000);
		}
	});
}
function reloadSys(){
	$.ajax({
		url:'/admin/reload',
		type:'GET',
		success:function(data){
			alert(data);
			document.location = '/admin/status/?syspid='+$('#syspid').html();
		}
	});
}
getData();
getBdw();
<!--#if(isset($_GET['syspid'])){#-->
if($('#syspid').html()!={$_GET['syspid']}){
	alert('重启成功');
}
<!--#}#-->
</script>
<!--#include admin.footer#-->