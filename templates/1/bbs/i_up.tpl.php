<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//拟用户名

$username=$_SESSION['u_uidss'].time(); //
//站点网址
$web['sitehttp']='http://'.(!empty($_SERVER['HTTP_X_FORWARDED_HOST'])?$_SERVER['HTTP_X_FORWARDED_HOST']:$_SERVER['HTTP_HOST']).'/';
//时区
$web['time_pos']=8;
//上传最大尺寸（KB）
$web['max_file_size'][15]=200;
//截图质量（限jpg、70-100，100为最好质量）
$web['pic_quality']=100;
//截图尺寸（大、小二种，分宽、高）
$web['img_w_b'] = 100;
$web['img_h_b'] = 100;
$web['img_w_s'] = 100;
$web['img_h_s'] = 100;


//图片路径
$web['img_up_dir']='i_upload';
//源图命名（应用于论坛等程序时可以用会员名编码命名）


	if(V('r:srcc') != NULL) {


		$web['img_name_b']	= substr_replace(V('r:srcc'), 'gif', -3, 3);

	} else {
		$web['img_name_b']='162100screenshots-'.(!empty($username)?urlencode($username):user_ip());
	}


//$web['img_name_b']='162100screenshots-'.(!empty($username)?urlencode($username):user_ip());
//截图命名
//$web['img_name_s']=''.$web['img_name_b'].'_small';
$web['img_name_s1']=''.$web['img_name_b'].'_small1';
$web['img_name_s2']=''.$web['img_name_b'].'_small2';
//截图类型（限jpg、gif、png）建议gif，这样可以上传小动画
$web['img_up_format']='gif';



?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
<title>上传图片 - 162100（头像）截图程序 - Power by 162100.com</title>
<link href="i_include/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="allBox">
  <div id="picBox">
    <div id="picViewOuter" style="height:255px">
<?php

if(strpos($_SERVER['HTTP_REFERER'],$web['sitehttp'])!==0){
  err('禁止本站外提交！');
}
//本机上传
if ($_POST['ptype'] == 1) {
  if ($web['max_file_size'][15] == 0) {
    err('系统设定为禁止上传。');
  }
  if (is_array($_FILES['purl1']) && $_FILES['purl1']['size']) {
    if (!file_exists($web['img_up_dir']) && !@mkdir($web['img_up_dir'], 0777)) {
      err('图片无法上传，上传目录不存在。');
    }
    $inis = ini_get_all();
    $uploadmax = $inis['upload_max_filesize'];
    if ($_FILES['purl1']['size'] > $web['max_file_size'][15] * 1024) {
      err('图片上传不成功！上传的文件请小于'.$web['max_file_size'][15].'KB。');
    }
    if (!preg_match('/\.(jpg|gif|png)$/i', strtolower($_FILES['purl1']['name']), $matches)) {
      err('图片上传不成功！请选择一个有效的文件：允许的格式有（jpg|gif|png）。');
    }
    if ($fp = @fopen($_FILES['purl1']['tmp_name'], 'rb')) {
      $img_contents = @fread($fp, $_FILES['purl1']['size']);
      @fclose($fp);
    } else {
      $img_contents = @file_get_contents($_FILES['purl1']['tmp_name']);
    }
    if (preg_match('/<\?php|eval|POST|base64_decode|base64_encode/i', $img_contents, $m_err)) {
      err('提示！禁止提交。该文件含有禁止的代码'.str_replace('?', '\?', $m_err[0]).'。');
    }
    @chmod($web['img_up_dir'], 0777);
    if (@move_uploaded_file($_FILES['purl1']['tmp_name'], $web['img_up_dir'].'/'.$web['img_name_b'].'.'.$matches[1])) {
      fsetcookie($web['img_up_dir'].'/'.$web['img_name_b'].'.'.$matches[1]);
      alert('图片上传成功！',URL('bbs1.main'));
    } else {
      err('图片上传不成功！');
	  
    }
  } else {
    err('图片不存在！路径不正确；或系统出错，请稍候再试。');
  }


//网络图片
} elseif ($_POST['ptype'] == 2) {
  $filename = $_POST['purl2'];
  if ($filename == '' || !preg_match('/^https?:\/\/.+\.(jpg|gif|png)$/i', $filename, $matches)) {
    err('图片URL输入不合法！网址以http://开头！图片格式限(jpg|gif|png)。');
  }
  if (!$im = @file_get_contents($filename)) {
    err('无法获取此图片！请确定图片URL正确。');
  }
  if (strlen($im) > 2 * 1024 * 1024) {
    err('图片上传不成功！链接的文件请小于2MB。');
  }
  $t = strtolower($matches[1]);
  write_file($web['img_up_dir'].'/'.$web['img_name_b'].'.'.$t, $im);
  fsetcookie($web['img_up_dir'].'/'.$web['img_name_b'].'.'.$t);
  alert('头像上传成功！',URL('bbs1.main'));


//截图
} elseif ($_POST['ptype'] == 4) {
  if (extension_loaded('gd')) {
    if (!function_exists('gd_info')) {
      err('重要提示：你的gd版本很低，图片处理功能可能受到约束。');
    }
  } else {
    err('重要提示：你尚未加载gd库，图片处理功能可能受到约束。');
  }
  $cimg_o = $_COOKIE['162100screenshotsImg'];
  $img_info = getimagesize($cimg_o);
  $_POST['imgw'] = $_POST['imgw'] == $img_info[0] ? $_POST['imgw'] : $img_info[0];
  $_POST['imgh'] = $_POST['imgh'] == $img_info[1] ? $_POST['imgh'] : $img_info[1];
  //如果图片尺寸符合标准而直接提交的话
  if ($_POST['imgto'] == 1) {
    if ($_POST['imgw'] > $web['img_w_b'] || $_POST['imgh'] > $web['img_h_b']) {
      err('图片尺寸不符标准！');
    }
  } else {
    $cut_x = $_POST['imgw'] / $_POST['noww'] * $_POST['px'];
    $cut_y = $_POST['imgh'] / $_POST['nowh'] * $_POST['py'];
    $cut_w = $_POST['imgw'] / $_POST['noww'] * $_POST['pw'];
    $cut_h = $_POST['imgh'] / $_POST['nowh'] * $_POST['ph'];
    if ($_POST['pw'] / $_POST['ph'] > $web['img_w_b'] / $web['img_h_b']) {
      $ow1 = $web['img_w_b'];
      $oh1 = ceil($ow1 * $_POST['ph'] / $_POST['pw']);
    } else {
      $oh1 = $web['img_h_b'];
      $ow1 = ceil($oh1 * $_POST['pw'] / $_POST['ph']);
    }
    /*
    if ($_POST['pw'] / $_POST['ph'] > $web['img_w_s'] / $web['img_h_s']) {
      $ow1 = $web['img_w_s'];
      $oh1 = ceil($ow1 * $_POST['ph'] / $_POST['pw']);
    } else {
      $oh1 = $web['img_h_s'];
      $ow1 = ceil($oh1 * $_POST['pw'] / $_POST['ph']);
    }
    */
    if (run_img_resize($cimg_o, $cimg_o, $cut_x, $cut_y, $cut_w, $cut_h, $cut_w, $cut_h, $web['pic_quality']) && run_img_resize($cimg_o, $cimg_o, 0, 0, $ow1, $oh1, false, false, $web['pic_quality'])) {
      $ow = $_POST['pw'];
      $oh = $_POST['ph'];
      if ($ow1 / $oh1 >= 240 / 180) {
        if ($ow1 > 240) {
          $ow1 = 240;
          $oh1 = ceil(240 * $_POST['ph'] / $_POST['pw']);
        }
      } else {
        if ($oh1 > 180) {
          $oh1 = 180;
          $ow1 = ceil(180 * $_POST['pw'] / $_POST['ph']);
        }
      }
    } else {
      err('截图失败！');
    }
  }
  $cimg_o = typeto($cimg_o, $web['img_up_format']);
  fsetcookie($cimg_o);
  $t = time();
  echo '<iframe id="imgifr" name="imgifr" src="'.get_en_url($web['img_up_dir'].'/'.$web['img_name_b']).'.'.$web['img_up_format'].'" style="display:none"></iframe>
<script>
window.onload = function() {
  document.getElementById(\'imgifr\').contentWindow.location.reload(true);
  if(parent!=self){
    if(parent.document.getElementById(\'screenshotsShow\')!=null) {
      parent.document.getElementById(\'screenshotsShow\').innerHTML=\'<img src="head/'.get_en_url($web['img_up_dir'].'/'.$web['img_name_b']).'.'.$web['img_up_format'].'?'.$t.'" />\';
	   parent.document.getElementById(\'urlssb\').innerHTML=\''.$web['img_name_b'].'?'.$t.'"\';
	   parent.document.getElementById(\'bigImg\').src=\''.$web['img_name_b'].'?'.$t.'"\';
	   parent.document.getElementById(\'middleImg\').src=\''.$web['img_name_b'].'?'.$t.'"\';
		parent.document.getElementById(\'smallImg\').src=\''.$web['img_name_b'].'?'.$t.'"\';
    }
  }
}
</script>';
  err('

截图成功！<div class="sword">（可点右键另存为）</div><center><a href="'.get_en_url($web['img_up_dir'].'/'.$web['img_name_b']).'.'.$web['img_up_format'].'" target="_blank"><img class="i_face_small" src="'.$web['img_name_b'].'?'.$t.'" /></a></center>', 'alert');
//DS('publics.date1','','users',"avatar = '".V('r:page')."'","id ='".V('r:uid')."'");

  exit;

}



function get_en_url($d) {
  $arr = @explode('/', $d);
  $arr = array_map('urlencode', $arr);
  return @implode('/', $arr);
}

function err($text, $bj = 'err') {
	$ss = URL('bbs1.start');
  die('<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table style="margin:auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<span class="'.$bj.'"></span>'.$text.'</td>
  </tr>
</table><p><a href=\''.$ss.'\'>重载图片</a></p></td>
  </tr>
</table></div></div></div></body></html>');
}

function alert($text, $url = 'i_up.php') {
  die('<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table style="margin:auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="alert"></span>'.$text.'</td>
  </tr>
</table>
<script>location.href=\''.$url.'\';</script></td>
  </tr>
</table></div></div></div></body></html>');
}

//转换格式
function typeto($im, $format) {
  $fr = strtolower(ltrim(strrchr($im, '.'), '.'));
  if ($format == 'jpg') $f = 'jpeg';
  elseif ($format == 'png') $f = 'png';
  else $f = 'gif';
  if ($fr != $format) {
    switch ($fr) {
      case 'gif':
      $img = imagecreatefromgif($im);
      break;
      case 'png':
      $img = imagecreatefrompng($im);
      break;
      case 'jpg':
      $img = imagecreatefromjpeg($im);
      break;
    }
    @unlink($im);
    $im = preg_replace("/\.".preg_quote($fr)."$/", "", $im).".".$format;
    eval('
    if(image'.$f.'($img, $im)) {
      imagedestroy($img);
    }
    ');
  }
  return $im;
}

//处理缩略图
function run_img_resize($img, $resize_img_name, $dx, $dy, $resize_width, $resize_height, $w, $h, $quality) {
  $img_info = @getimagesize($img);
  $width = $img_info[0];
  $height = $img_info[1];
  $w = $w == false ? $width : $w;
  $h = $h == false ? $height : $h;
  switch ($img_info[2]) {
    case 1 :
    $img = @imagecreatefromgif($img);
    break;
    case 2 :
    $img = @imagecreatefromjpeg($img);
    break;
    case 3 :
    $img = @imagecreatefrompng($img);
    break;
  }
  if (!$img) return false;
  if (function_exists('imagecopyresampled')) {
    $resize_img = @imagecreatetruecolor($resize_width, $resize_height);
    $white = @imagecolorallocate($resize_img, 255, 255, 255);
    @imagefilledrectangle($resize_img, 0, 0, $resize_width, $resize_height, $white);// 填充背景色
    @imagecopyresampled($resize_img, $img, 0, 0, $dx, $dy, $resize_width, $resize_height, $w, $h);
  } else {
    $resize_img = @imagecreate($resize_width, $resize_height);
    $white = @imagecolorallocate($resize_img, 255, 255, 255);
    @imagefilledrectangle($resize_img, 0, 0, $resize_width, $resize_height, $white);// 填充背景色
    @imagecopyresized($resize_img, $img, 0, 0, $dx, $dy, $resize_width, $resize_height, $w, $h);
  }
  //if(file_exists($resize_img_name)) unlink($resize_img_name);
  switch ($img_info[2]) {
    case 1 :
    @imagegif($resize_img, $resize_img_name);
    break;
    case 2 :
    @imagejpeg($resize_img, $resize_img_name, $quality); //100质量最好，默认75
    break;
    case 3 :
    @imagepng($resize_img, $resize_img_name);
    break;
  }
  @imagedestroy($resize_img);
  return true;
}

//写文件
function write_file($file,$text){
  if(!file_exists($file)){
    if(!@touch($file)){
      err('操作失败！原因分析：文件'.$file.'不存在或不可创建或读写，可能是当前运行环境权限不足');
    }
  }
  $arr_dir=@explode('/',$file);
  $dir_num=count($arr_dir);
  if($dir_num>0){
    for($i=0;$i<$dir_num;$i++){
      $the_dir=str_pad('',3*($dir_num-$i-1),'../').$arr_dir[$i];
      @chmod($the_dir,0777);
    }
  }
  @chmod($file,0777);
  if(is_writable($file) && ($fp=@fopen($file,'rb+'))){
    f_lock($fp);
    @ftruncate($fp,0);
    if(strlen($text)>0 && !@fwrite($fp,$text)){
      err('操作失败！原因分析：文件'.$file.'不存在或不可创建或读写，可能是权限不足！');
	}
    @flock($fp,LOCK_UN);
    fclose($fp);
  }else{
    err('操作失败！原因分析：文件'.$file.'不存在或不可读写');
  }
}

//锁定文件
function f_lock($fp){
  if($fp){
    if(!flock($fp,LOCK_EX)){
      sleep(1);
      f_lock($fp);
    }
  }
}

//记忆文件名
function fsetcookie($img){
  echo '<script>document.cookie="162100screenshotsImg="+encodeURIComponent(\''.$img.'\')+"; path=/;";</script>';
}

//获取ip
function user_ip(){
  global $web;
  if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }elseif(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['REMOTE_ADDR'])){
    $ip=$_SERVER['REMOTE_ADDR'];
  }elseif(getenv('HTTP_X_FORWARDED_FOR')){
    $ip=getenv('HTTP_X_FORWARDED_FOR');
  }elseif(getenv('HTTP_CLIENT_IP')){
    $ip=getenv('HTTP_CLIENT_IP');
  }elseif(getenv('REMOTE_ADDR')){
    $ip=getenv('REMOTE_ADDR');
  }else{
    $ip=gmdate('YmdHis',time()+(floatval($web['time_pos'])*3600));
  }
  return $ip;
}


?>
    </div>
  </div>
</div>
</body>
</html>