<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 echo CHARSET?>" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>phpcmsV9 - 后台管理中心</title>
<link href="<?php echo CSS_PATH?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH?>table_form.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/zh-cn-styles1.css" title="styles1" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/zh-cn-styles2.css" title="styles2" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/zh-cn-styles3.css" title="styles3" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/zh-cn-styles4.css" title="styles4" media="screen" />

<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>styleswitch.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<style type="text/css">
	html{_overflow-y:scroll}
</style><link href="<?php echo JS_PATH?>swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="<?php echo JS_PATH?>swfupload/swfupload.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo JS_PATH?>swfupload/fileprogress.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo JS_PATH?>swfupload/handlers.js"></script>

<script type="text/javascript">
<?php
	$args = V('g:args');
	echo 		F('attachment.initupload','content','8',$args,1,8,true);
?>
</script>

<div class="pad-10">
    <div class="col-tab">
        <ul class="tabBut cu-li">
            <li id="tab_swf_1"  class="on" onclick="SwapTab('swf','on','',5,1);">上传附件</li>
            <li id="tab_swf_2" onclick="SwapTab('swf','on','',5,2);">网络文件</li>
                        <li id="tab_swf_3" onclick="SwapTab('swf','on','',5,3);set_iframe('album_list','<?php echo URL('mgr/attachment.album_list');?>');">图库</li>
            <li id="tab_swf_4" onclick="SwapTab('swf','on','',5,4);set_iframe('album_dir','index.php?m=attachment&c=attachments&a=album_dir&args=1,jpg|jpeg|gif|png|bmp,1,,,0');">目录浏览</li>

                                </ul>
         <div id="div_swf_1" class="content pad-10 ">
        	<div>
				<div class="addnew" id="addnew">
					<span id="buttonPlaceHolder"></span>
				</div>
				<input type="button" id="btupload" value="开始上传" onClick="swfu.startUpload();" />
                <div id="nameTip" class="onShow">最多上传<font color="red"> 1</font> 个附件,单文件最大 <font color="red">2 MB</font></div>

                <div class="bk3"></div>
				
                <div class="lh24">支持 <font style="font-family: Arial, Helvetica, sans-serif">jpg、jpeg、gif、png、bmp</font> 格式。</div><input type="checkbox" id="watermark_enable" value="1"  onclick="change_params()"> 是否添加水印        	</div> 	
    		<div class="bk10"></div>
        	<fieldset class="blue pad-10" id="swfupload">
        	<legend>列表</legend>
        	<ul class="attachment-list"  id="fsUploadProgress">    
        	</ul>

    		</fieldset>
    	</div>
        <div id="div_swf_2" class="contentList pad-10 hidden">
        <div class="bk10"></div>
        	请输入网络地址<div class="bk3"></div><input type="text" name="info[filename]" class="input-text" value=""  style="width:350px;"  onblur="addonlinefile(this)">
		<div class="bk10"></div>
        </div>    	
    	        <div id="div_swf_3" class="contentList pad-10 hidden">
            <ul class="attachment-list">

        	 <iframe name="album-list" src="#" frameborder="false" scrolling="no" style="overflow-x:hidden;border:none" width="100%" height="550" allowtransparency="true" id="album_list"></iframe>   
        	</ul>
        </div>
        <div id="div_swf_4" class="contentList pad-10 hidden">
            <ul class="attachment-list">
        	 <iframe name="album-dir" src="#" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none" width="100%" height="330" allowtransparency="true" id="album_dir"></iframe>   
        	</ul>
        </div>
                     
    <div id="att-status" class="hidden"></div>

     <div id="att-status-del" class="hidden"></div>
    <div id="att-name" class="hidden"></div>
<!-- swf -->
</div>
</body>
<script type="text/javascript">
if ($.browser.mozilla) {
	window.onload=function(){
	  if (location.href.indexOf("&rand=")<0) {
			location.href=location.href+"&rand="+Math.random();
		}
	}
}
function imgWrap(obj){
	$(obj).hasClass('on') ? $(obj).removeClass("on") : $(obj).addClass("on");
}

function SwapTab(name,cls_show,cls_hide,cnt,cur) {
    for(i=1;i<=cnt;i++){
		if(i==cur){
			 $('#div_'+name+'_'+i).show();
			 $('#tab_'+name+'_'+i).addClass(cls_show);
			 $('#tab_'+name+'_'+i).removeClass(cls_hide);
		}else{
			 $('#div_'+name+'_'+i).hide();
			 $('#tab_'+name+'_'+i).removeClass(cls_show);
			 $('#tab_'+name+'_'+i).addClass(cls_hide);
		}
	}
}

function addonlinefile(obj) {
	var strs = $(obj).val() ? '|'+ $(obj).val() :'';
	$('#att-status').html(strs);
}

function change_params(){
	if($('#watermark_enable').attr('checked')) {
		swfu.addPostParam('watermark_enable', '1');
	} else {
		swfu.removePostParam('watermark_enable');
	}
}
function set_iframe(id,src){
	$("#"+id).attr("src",src); 
}
function album_cancel(obj,id,source){
	var src = $(obj).children("img").attr("path");
	var filename = $(obj).attr('title');
	if($(obj).hasClass('on')){
		$(obj).removeClass("on");
		var imgstr = $("#att-status").html();
		var length = $("a[class='on']").children("img").length;
		var strs = filenames = '';
		$.get('index.php?m=attachment&c=attachments&a=swfupload_json_del&aid='+id+'&src='+source+'&filename='+filename);
		for(var i=0;i<length;i++){
			strs += '|'+$("a[class='on']").children("img").eq(i).attr('path');
			filenames += '|'+$("a[class='on']").children("img").eq(i).attr('title');
		}
		$('#att-status').html(strs);
		$('#att-status').html(filenames);
	} else {
		var num = $('#att-status').html().split('|').length;
		var file_upload_limit = '1';
		if(num > file_upload_limit) {alert('不能选择超过'+file_upload_limit+'个附件'); return false;}
		$(obj).addClass("on");
		$.get('index.php?m=attachment&c=attachments&a=swfupload_json&aid='+id+'&src='+source+'&filename='+filename);
		$('#att-status').append('|'+src);
		$('#att-name').append('|'+filename);
	}
}
</script>
</html>
