<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>动态显示服务器运行程序的进度条</title>
<style>
	body, div input { font-family: Tahoma; font-size: 9pt;} 
</style>
</head>
<body>
<?php
	extract($_POST);
	error_reporting(E_ALL & ~E_NOTICE);
	include_once $_SERVER["DOCUMENT_ROOT"]."/application/class/mysqlDb.class.php";
	include_once $_SERVER["DOCUMENT_ROOT"]."/application/user_config.php";
	$db = new mysqlDb(DB_HOST,DB_USER,DB_PASSWD,DB_NAME,'',DB_CHARSET);
	if($sendType == 1 && $cid != 0){
		$address = $db->query("select address from xsmart_email_address where cid=$cid");
	}
	$smtp	= $db->query('select * from xsmart_email_smtp where is_ok = 1 order by sort asc');
	$basic	= $db->query('select * from xsmart_email_basic where id = 1');
	$basic  = $basic[0];
	if($basic['tplid'] != ''){
		$tpl = $db->query('select * from xsmart_email_tpl where id = '.$basic['tplid']);
		$tpl	= $tpl[0];
	}else{
		echo "<script>alert('请选择模板');location.href='admin.php?m=mgr/email.tpl';</script>";	
	}
	
	include_once $_SERVER["DOCUMENT_ROOT"]."/application/class/PHPMailer.class.php";
	
	echo str_pad('',4096);
	set_time_limit(0);
	$width = 500;                   //显示的进度条长度，单位 px 
	$total = count($address);     	//总共需要操作的记录数 
	$pix = $width / $total;        	//每条记录的操作所占的进度条单位长度 
	$progress = 0;                  //当前进度条长度
	
?>
<script language="JavaScript"> 
	function updateProgress(sMsg, iWidth) 
	{  
		document.getElementById("status").innerHTML = sMsg; 
		document.getElementById("progress").style.width = iWidth + "px";
		document.getElementById("percent").innerHTML = parseInt(iWidth / <?= $width; ?> * 100) + "%"; 
	} 
</script>
<div style="margin: 4px; padding: 8px; border: 1px solid gray; background: #EAEAEA; width: <?= $width+8; ?>px"> 
    <div><font color="gray">发送时请勿关闭此页面！</font></div> 
    <div style="padding: 0; background-color: white; border: 1px solid navy; width: <?= $width; ?>px"> 
    <div id="progress" style="padding: 0; background-color: #FFCC66; border: 0; width: 0px; text-align: center;   height: 16px"></div>             
    </div>
    <div id="status" style="height:">&nbsp;</div>
    <div id="percent" style="position: relative; top: -30px; text-align: center; font-weight: bold; font-size: 8pt">0%</div>
</div>
<?php 
	ob_flush();
	flush();
	
	$error_num = 0;
	foreach ($address as $key=>$val) {
		$mail = new PHPMailer;
		$n = rand(0,count($smtp)-1);
		$mail->IsSMTP();
		$mail->Host 	= $smtp[$n]['smtp'];
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = $smtp[$n]['username'];
		$mail->Password = $smtp[$n]['password'];
		$mail->Port		= 25;
		$mail->CharSet 	= "UTF-8";
		$mail->From 	= $smtp[$n]['username'];
		$mail->FromName = $basic["sender"];
		$mail->AddAddress($val['address'], "");
		//$mail->AddReplyTo("", "");
		//是否添加附件
		if($is_file == 1 && $fileUrl != ''){
			$mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].$fileUrl);
		}
		//是否使用HTML格式
		if($is_html == 1){
			$mail->IsHTML(true);
		}
		//邮件标题
		$mail->Subject = $tpl['title'];
		//邮件内容
		$mail->Body = $tpl['content'];
		//附加信息，可以省略
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
		if(!$mail->Send()){
			$error_num++;
			//echo "邮件发送失败.错误原因: " . $mail->ErrorInfo;
			//exit;
		}
?>
<script language="JavaScript">
	updateProgress("正在发送邮件到<?= $val['address'];?>....", <?= min($width, intval($progress));?>);
</script>
<?php 
	ob_flush();
	flush();
	$progress += $pix;
	sleep(1);
}
?>

<script language="JavaScript">
    updateProgress("发送已完成！失败 <?= $error_num;?> 条！", <?= $width;?>);
</script>　　
<a href="admin.php?m=mgr/email.send" style="color:#36F; font-size:16px; text-decoration:underline; margin-left:450px;">返 回</a>
<?php 
	ob_flush();
	flush();
?>
</body>
</html>