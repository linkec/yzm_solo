<!--#include admin.header#-->
     <div class="tab-pane fade active in" id="tab3Content2"> 
      <!-- 文件搜索 --> 
      <div class="input-group  col-md-6 row" style="margin: 15px auto;"> 
		<form action="/admin/list/" style="display: inherit;" >
       <div class="input-control search-box search-box-circle has-icon-left has-icon-right search-example" id="searchboxExample"> 
        <input name="kw" id="searchInput" type="search" class="form-control search-input" placeholder="搜索" value="{$kw}"/> 
        <label for="searchInput" class="input-control-icon-left search-icon"><i class="icon icon-search"></i></label> 
       </div> 
       <span class="input-group-btn"> <button class="btn btn-primary" type="submit">搜索</button> </span> 
       </form> 
      </div> 
      <div class="row"> 
       <div class="modal fade" id="myModal"> 
        <div class="modal-dialog"> 
         <div class="modal-content"> 
          <div class="modal-body"> 
           <div class="row">
            <div class="form-group"> 
             <label class="col-sm-2">视频地址：</label> 
             <div class="col-sm-10"> 
              <input type="text" class="form-control" id="player_url" value="" onclick="this.select()"/> 
             </div> 
            </div> 
            <div class="form-group"> 
             <label class="col-sm-2">切片地址：</label> 
             <div class="col-sm-10"> 
              <input type="text" class="form-control" id="m3u8_url" value=""  onclick="this.select()"/> 
             </div> 
            </div> 
            <div class="form-group"> 
             <label class="col-sm-2">截图地址：</label> 
             <div class="col-sm-10"> 
              <input type="text" class="form-control" id="screenshot_url" value=""  onclick="this.select()"/> 
             </div> 
            </div>  
           </div> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div>
      <table class="table datatable "> 
       <thead> 
        <tr> 
         <!-- 以下两列左侧固定 --> 
         <th>文件名</th> 
         <th>上传时间</th> 
         <!-- 以下列右侧固定 --> 
         <th>转码状态</th> 
         <th>操作</th> 
        </tr> 
       </thead> 
       <tbody> 
	   
		<!--#foreach($videos as $v){#-->
        <tr> 
         <td>{$v['vname']}</td> 
         <td>{#date('Y-m-d H:i:s',$v['in_time'])#}</td> 
         <td>&nbsp;{#vstatus($v['vstatus'])#}&nbsp;</td> 
         <td><a href="" data-toggle="modal" data-target="#myModal" onclick="setURL('{$config['player']}share/{$v['vkey']}','{$config['player']}{$v['vpath']}playlist.m3u8','{$config['player']}{$v['vpath']}screenshot1.jpg')">&nbsp;获取地址&nbsp;</a>
		 <a onclick="doDelete({$v['vid']})" href=""><i class="icon-trash icon-trash"></i>&nbsp;删除</a> </td> 
        </tr>
		<!--#}#-->
       </tbody> 
      </table> 
      <!-- 分页 --> 
      <div> 
	  {$pager}
      </div> 
     </div> 
  <script type="text/javascript">
	$('table.datatable').datatable();
	function setURL(url1,url2,url3){
		$('#player_url').val(url1);
		$('#m3u8_url').val(url2);
		$('#screenshot_url').val(url3);
	}
	function doDelete(id){
		event.preventDefault();
		var r=confirm("确认是否删除？删除后将不复存在！")
		if (r==true){
			document.location='/admin/delete/'+id;
		}
	}
  </script>  
<!--#include admin.footer#-->