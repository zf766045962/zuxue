<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文件上传</title>
</head>
<body class="main-body">
<form enctype="multipart/form-data" method="post" name="upform" action="<?php echo URL('mgr/articleclass.upload')?>">
  <input name="upfile" type="file" class="input-txt"  style="width:260px;border:1 solid #9a9999; cursor:pointer;font-size:9pt; background-color:#ffffff" size="30" />
  <input type="submit" value="上传图片" style="width:60;border:1 outset #9a9999; cursor:pointer; font-size:9pt; background-color:#ffffff" size="30">
<br>
</form>
</body>
</html>
