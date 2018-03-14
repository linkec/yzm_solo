<!--#include admin.header#-->
<div id="uploader">
	<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
</div>
<script type="text/javascript">
$(function() {
	$("#uploader").pluploadQueue({
		runtimes : 'html5,flash',
		url : '/admin/upload',
		chunk_size: '10mb',
		max_retries: 10,
		rename : true,
		dragdrop: true,
		filters : {
			// Maximum file size
			max_file_size : '10000mb',
			// Specify what files to browse for
			mime_types: [
				{ title : "Video files", extensions : "mvb,flv,vob,mp4,mov,3gp,wmv,mkv,mpg,ts,avi,mpeg,avi,rmvb,rm"}
			]
		},
		flash_swf_url : '/js/Moxie.swf',
		silverlight_xap_url : '/js/Moxie.xap'
	});
});
</script>
<script type="text/javascript" src="/js/i18n/zh_CN.js"></script>
<!--#include admin.footer#-->