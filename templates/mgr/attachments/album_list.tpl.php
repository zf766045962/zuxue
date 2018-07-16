<?php 
	$show_header = $show_validator = $show_scroll = 1; 
	 $this->_display('attachments/header');
	 $file_upload_limit=2000000;
?>

<style type="text/css">
#tooltip{
 position:absolute;
 border:1px solid #ccc;
 background:#333;
 padding:2px;
 display:none;
 color:#fff;
}
</style>


<link href="<?php echo JS_PATH?>swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<form name="myform" action="" method="get" >
<input type="hidden" value="attachment" name="m">
<input type="hidden" value="attachments" name="c">
<input type="hidden" value="album_load" name="a">
<input type="hidden" value="<?php echo $file_upload_limit?>" name="info[file_upload_limit]">
<div class="lh26" style="padding:10px 0 0">
<label>文件名称</label>
<input type="text" value="" class="input-text" name="info[filename]"> 
<label>上传日期</label>
<input type="submit" value="搜索" class="button" name="dosubmit">
</div>
</form>
<div class="bk20 hr"></div>
<ul class="attachment-list"  id="fsUploadProgress">
<?php
 if($infos){ foreach($infos as $r) {
 ?>
<li>
	<div class="img-wrap">
		<a  title="<?php echo $r['originalname']?>" class="tooltip" href="javascript:;" onclick="javascript:album_cancel(this,'<?php echo $r['aid']?>','<?php echo $r['filepath']?>')"><img src="<?php echo W_BASE_URL.$r['filepath']?>" width="120" path="<?php echo W_BASE_URL.$r['filepath']?>"/><div class="icon"></div></a>
	</div>
</li>
<?php } }?>
</ul>
 <div id="pages" class="text-c"> <?php echo $pager?></div>
<script type="text/javascript">
$(document).ready(function(){
	set_status_empty();
});	
function set_status_empty(){
	parent.window.$('#att-status').html('');
	parent.window.$('#att-name').html('');
}
function album_cancel(obj,id,source){
	var src = $(obj).children("img").attr("path");
	var filename = $(obj).children("img").attr("title");
	if($(obj).hasClass('on')){
		$(obj).removeClass("on");
		var imgstr = parent.window.$("#att-status").html();
		var length = $("a[class='on']").children("img").length;
		var strs = filenames = '';
		$.get('<?php echo URL('mgr/attachment.swfupload_json_del','admin.php') ?>&a=&aid='+id+'&src='+source);
		for(var i=0;i<length;i++){
			strs += '|'+$("a[class='on']").children("img").eq(i).attr('path');
			filenames += '|'+$("a[class='on']").children("img").eq(i).attr('title');
		}
		parent.window.$('#att-status').html(strs);
		parent.window.$('#att-name').html(filenames);
	} else {
		var num = parent.window.$('#att-status').html().split('|').length;
		var file_upload_limit = '<?php echo $file_upload_limit?>';
		if(num > file_upload_limit) {alert('不能选择超过'+file_upload_limit+'个附件'); return false;}
		$(obj).addClass("on");
		$.get('<?php echo URL('mgr/attachment.swfupload_json','admin.php') ?>&aid='+id+'&src='+source);
		parent.window.$('#att-status').append('|'+src);
		parent.window.$('#att-name').append('|'+filename);
	}
}


$(function(){
 var x = 10;
 var y = 20;
 $("a.tooltip").mouseover(function(e){
  this.myTitle = this.title;
  this.title = ""; 
  var imgTitle = this.myTitle? "<br/>" + this.myTitle : "";
  var imgUrl =  $(this).children().attr("src");
  var tooltip = "<div id='tooltip'><img src='"+ imgUrl +"' alt='大图预览'/>"+imgTitle+"<\/div>"; //创建 div 元素
  $("body").append(tooltip); //把它追加到文档中       
  $("#tooltip")
   .css({
    "top": (e.pageY+y) + "px",
    "left":  (e.pageX+x)  + "px"
   }).show("fast");   //设置x坐标和y坐标，并且显示
    }).mouseout(function(){
  this.title = this.myTitle; 
  $("#tooltip").remove();  //移除 
    }).mousemove(function(e){
  $("#tooltip")
   .css({
    "top": (e.pageY+y) + "px",
    "left":  (e.pageX+x)  + "px"
   });
 });
})


</script>