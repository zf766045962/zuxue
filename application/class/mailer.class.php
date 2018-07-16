<?php
/************************************************
 * 有身份验证的电子邮件发送类（PHP）
 * 使用本类发送邮件需要一个SMTP服务器地址以及一个合法帐号
 * 如163的SMTP地址为：smtp.163.split.netease.com
 * 合法帐号可以通过随意注册一个免费信箱来获得。
 * 改编 一起PHP技术联盟 www.17php.com rznqp@163.com
 * 本类的SMTP协议实现部分借鉴了其他开发者的成果，一并致谢。
 *  2007.11 欢迎使用
 ***********************************************/
class mailer{
var $smtpHost;
var $smtpUser;
var $smtpPass;
var $mailFrom;
 /* 邮件正文的格式,默认支持HTML代码
  * 可选项 plain ：文本格式
  *    html  ：HTML格式
  */
 var $contentType = "html";
 var $errMsg = '';
/**
 * 3参数构造器
 * @param String $host SMTP服务器
 * @param String $user 帐号名
 * @param String $pass 密码
 * 无返回值
 */
function _new($host,$user,$pass){
	$this->smtpHost = $host;
	$this->smtpUser = $user;
	$this->smtpPass = $pass;
	$this->mailFrom = $this->smtpUser;
}
    /**
 * 发送邮件
 * @param String $addr 收件人的E-mail地址
 * @param String $fromName 显示的发件人姓名
 * @param String $title 邮件标题
 * @param String $content 邮件正文
 * 返回 布尔型：成功返回true，否则返回false
 */
    function send($addr,$fromName,$title,$content){
     $headers = "Content-Type: text/".$this->contentType."; charset=\"utf-8\"
Content-Transfer-Encoding: base64"; 
     $lb="
"; 
     $hdr = explode($lb,$headers);
     if($content){
   		$c=explode($lb,$content);
		
		//$bdy = preg_replace("/^./","..",$c);
		$bdy = $c;
	} 
$smtp = array( 
array("EHLO hello".$lb,"220,250","EHLO error: "), 
array("AUTH LOGIN".$lb,"334","AUTH error:"), 
array(base64_encode($this->smtpUser).$lb,"334","AUTHENTIFICATION error : "), 
array(base64_encode($this->smtpPass).$lb,"235","AUTHENTIFICATION error : ")
); 
$smtp[] = array("MAIL FROM: <".$this->mailFrom.">".$lb,"250","MAIL FROM error: "); 
$smtp[] = array("RCPT TO: <".$addr.">".$lb,"250","RCPT TO error: "); 
$smtp[] = array("DATA".$lb,"354","DATA error: "); 
$smtp[] = array("From: ".$fromName.$lb,"",""); 
$smtp[] = array("To: ".$addr.$lb,"",""); 
$smtp[] = array("Subject: ".$title.$lb,"",""); 
foreach($hdr as $h) {
     $smtp[] = array($h.$lb,"","");
} 
$smtp[] = array($lb,"",""); 
if($bdy) {
   foreach($bdy as $b) {
      $smtp[] = array(base64_encode($b.$lb).$lb,"","");
    }
} 
$smtp[] = array(".".$lb,"250","DATA(end)error: "); 
$smtp[] = array("QUIT".$lb,"221","QUIT error: "); 
//打开SOCKET
$fp = @fsockopen($this->smtpHost, 25); 
if (!$fp) $this->errMsg = "<b>错误:</b> 无法连接到 ".$this->smtpHost.""; 
while($result = @fgets($fp, 1024)){
   if(substr($result,3,1) == " ") { break; }
}   
foreach($smtp as $req){ 
@fputs($fp, $req[0]); 
if($req[1]){ 
   while($result = @fgets($fp, 1024)){ 
    if(substr($result,3,1) == " ") { break; } 
   }; 
if (!strstr($req[1],substr($result,0,3))){ 
     $this->errMsg.=$req[2].$result.""; 
} 
} 
} 
@fclose($fp); 
if($this->errMsg ==''){
return true; 
}else{
return false;
}
    }
}
?>


