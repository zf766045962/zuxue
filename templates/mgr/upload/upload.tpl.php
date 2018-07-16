<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文件上传</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/upload_imgyl.js"></script>
<link href="http://phpcms.vi163.cn/statics/js/calendar/jscal2.css" type="text/css" rel="stylesheet">
<link href="http://phpcms.vi163.cn/statics/js/calendar/border-radius.css" type="text/css" rel="stylesheet">
<link href="http://phpcms.vi163.cn/statics/js/calendar/win2k.css" type="text/css" rel="stylesheet">
<script src="http://phpcms.vi163.cn/statics/js/calendar/calendar.js" type="text/javascript"></script>
<script src="http://phpcms.vi163.cn/statics/js/calendar/lang/en.js" type="text/javascript"></script>
</head>
<body  style="OVERFLOW:SCROLL;OVERFLOW-Y:HIDDEN;OVERFLOW-X:HIDDEN">

<form enctype="multipart/form-data" method="post" name="upform" action="<?php echo URL('mgr/upload.uupload')?>" style="width:180px;">

  <input type="hidden" name="types" value="<?php echo $types?>" />
  <input type="hidden" name="folders" value="<?php echo $folders?>" />
   <input type="hidden" name="nametype" value="<?php echo $nametype?>" />
   <input type="hidden" name="field" value="<?php echo $field?>" />
  
   
						 
							
                		 <table class="tupianyulan">
                         
							<tr>
								
                                	<td id="localImag"><img id="preview" style="diplay:none" src="<?php if(empty($path)){ echo '/css/admin/bgimg/moren.gif';}else{ echo $path;}?>"/></td>
                               
							</tr>
                		 </table>
                          <div class="yulan" >
								 <input type="button" value="图片浏览" class="button" style="width: 66px;">
								 <input type="file" name="upfile" id="doc" onChange="javascript:setImagePreview();">
								 </div>
								 <input type="submit" value="上传图片" class="button uploadimg" style="width: 66px;">
								 <div style="clear:both;"></div>
							  </div>
                         </div> 
<br>
</form>
 <script type="text/javascript">
	 $("#sub_hidefileupload").change(function () {  
    $("#txt_autorssfeed").val($(this).val());  
}); 
</script>
</body>
</html>
