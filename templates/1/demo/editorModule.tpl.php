<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>editorModule类-Demo</title>
</head>

<body>
<?php $editor = APP :: N('editorModule');?>
<br />
<?= $editor->uploadButton('file','picture1','/var/file/a.doc','上传按钮1');?>
<?= $editor->uploadButton('image','picture2','/var/image/b.jpg','上传按钮2');?>
<br />
<br />
<?= $editor->colorPicker('color1','#000000','取色器1');?>
<?= $editor->colorPicker('color2','#999999','取色器2');?>
<br />
<br />
<?= $editor->files('file1','/var/file/a.doc','上传文件1');?>
<?= $editor->files('file2','/var/file/b.doc','上传文件2');?>
<br />
<br />
<?= $editor->fileManager('file3','/var/file/aa.doc','服务器选择文件1');?>
<?= $editor->fileManager('file4','/var/file/bb.doc','服务器选择文件2');?>
<br />
<br />
<!-- 多文件上传 -->
<?= $editor->images();?>

<br />
<br />
预览 : (img标签中 id= "唯一名称 + View" 即可) <br />

<?= $editor->image(1,'img1','/var/img/1.jpg','网络图片+本地上传');?>
<img src="" id="img1View" /><br />

<?= $editor->image(2,'img2','/var/img/2.jpg','本地上传');?>
<img src="" id="img2View" /><br />

<?= $editor->image(3,'img3','/var/img/3.jpg','网络图片');?>
<img src="" id="img3View" /><br />

<?= $editor->image(1,'img4','/var/img/3.jpg','文本框不显示的上传',0);?>
<br />



<br />
<br />

</body>
</html>