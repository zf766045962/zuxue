<?php
/**************************************************
*  Created:  2014-08-4
*
*  登陆，注册，找回密码
*
*  @Xsmart (C)2014-2099 Nit Inc.
*  @Author zhangshichao
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
include "./application/class/PHPMailer.class.php";//邮件类
class login_mod extends action
{
	//登陆
	function default_action()
	{	
		TPL :: display('login');
	}
	
	//
	
	function send_code(){
		$username = V('r:username'); 
		
		$info = DS("publics2._get","","users","username='".$username."'");
		if(empty($info)){
			if(!empty($_COOKIE['phone_time'])){
				if(time()-$_COOKIE['phone_time'] <= 60){
					exit('{"status":3,"info":"发送验证码时间间隔太短！"}');		
				}	
			}
		
			if(!empty($_SESSION['phone_time'])){
				if(time()-$_SESSION['phone_time'] <= 60){
					exit('{"status":4,"info":"发送验证码时间间隔太短！"}');		
				}	
			}
			
			$pcode				=	mt_rand('1000','9999'); 
			//$pcode	= '8888';	
			$sender = APP :: N('httpSend');
			$strReg = "101100-WEB-HUAX-332425";
			$strPwd = "EMALMTUX";
			$strSourceAdd = "";// 子通道号，可为空（预留参数一般为空）
			$strPhone = $username;					// 手机号码，多个手机号用半角逗号分开，最多1000个
/*			$strContent = "您好，您的手机动态验证码为:".$pcode." 。该码10分钟内有效且只能输入1次，若10分钟内未输入，需重新获取。【学啊网】";
			$strSmsUrl = "http://www.stongnet.com/sdkhttp/sendsms.aspx";
			$strSmsParam = "reg=" . $strReg . "&pwd=" . $strPwd . "&sourceadd=" . $strSourceAdd . "&phone=" . $strPhone . "&content=" . $strContent;
			$strRes = $sender->postSend($strSmsUrl,$strSmsParam);*/
				
			$_SESSION['xr_pcode']	=	$pcode;
			$_SESSION['xr_rphone']	=	$username;
			setcookie("phone_time",time(),time()+7776000);
			$_SESSION['phone_time']	=	time();
				
			exit('{"status":1,"info":"发送成功！","info":"'.$pcode.'",}');
				
		}else{
			exit('{"status":2,"info":"该手机号已经注册！"}');		
		}	
	}
	
	
	//验证码验证，登陆注册页通用
	function ajax_checkcode() {
		$checkCode = V('r:param');
		
		if(strtolower($checkCode) == $_SESSION['verify_code']) {
			exit( '{"status":"y","info":" "}' );
		} else {
			exit( '{"status":"n","info":"验证码有误"}' );
		}
	}
	
	//用户名查重
	function checkUsername() {
		$username 	= V('r:param');
		$re			= DS('publics._get','','users',' `username`="'.$username.'" or `phone`="'.$username.'" or `email`="'.$username.'"');
		if(!empty($re)) {
			exit( '{"status":"n","info":"此用户名已被使用"}' );
		} else {
			exit( '{"status":"y","info":" "}' );
		}
	}
	
	
	                            
	//登陆验证
	function ajax_login() {
		$username	= 	V('r:username');												//var_dump($username);die;
		$password	= 	V('r:password');											//$password	= V('r:password');//var_dump($password);die;			   
		$remandEmail	= 	V('r:remandEmail');
		$result	= DS('publics._get','','users'," username = '".$username."' and password = '".md5($password)."'");
		//echo $result;
		if(!empty($result)) {
			$_SESSION['xr_id']	 	= 	$result[0]['id'];
			$_SESSION['xr_name'] 	= 	$result[0]['username'];
			
			/*记住密码--开始*/ 
			if($remandEmail==1){ 
				setcookie("xr_name",$result[0]['username'],time()+7776000); 
			}else{ 
				setcookie("xr_name",'',time()-1); 
			}
			exit( '{"status":1,"info":"登录成功"}' ); 
		} else {
			exit( '{"status":2,"info":"用户名或密码有误"}' );
		}
	}


	function ajax_register() {
		$ppcode				= 	V('r:pcode');
		$data['username']	=	V('r:username');
		$data['username']	=	trim($data['username']);
		$password			=	V('r:password');
		$data['password']	=	md5($password);
		$data['realname']	=	V('r:nk_name');
		$data['type']		=	"2";
		$data['addtime']	=	time();
		$data['uptime']		=	time();
        $verify_code = strtolower(V('p:verify_code'));
        //检查是否启用验证码
        if(IS_USE_CAPTCHA ) {
            $autocode = APP :: N('SimpleCaptcha');
            if (!$autocode->checkAuthcode($verify_code)) {
                exit( '{"status":3,"info":"验证码错误！"}' );
            }
        }
        $userInfo = DS("publics2._get","","users","username=".$data['username']);
        if(!empty($userInfo)){
            exit( '{"status":3,"info":"亲,手机号码已存在！"}' );
        }
        $re	=	DS('publics._save','',$data,'users');
        if($re) {
            if(!empty($_SESSION['xr_tuid']) && isset($_SESSION['xr_tuid']) && $_SESSION['xr_tuid'] != 0){
                $tuinfo = DS("publics2._get","","users","id=".$_SESSION['xr_tuid']);
                $data2['frozen_money'] = $tuinfo[0]['frozen_money'] + 50;

                $re1	=	DS('publics._update','',$data2,'users','id',$_SESSION['xr_tuid']);
                if($re1){

                    $data3['integral']		= 1;
                    $data3['sourceType']	= 3;
                    $data3['oid'] 			= time();
                    $data3['addtime'] 		= time();
                    $data3['userID'] 		= $_SESSION['xr_tuid'];
                    $re3	=	DS('publics._save','',$data3,'integral');
                    if($re3){
                        unset($_SESSION['xr_tuid']);
                    }
                }
            }
            exit( '{"status":1,"info":"恭喜您，注册成功！"}' );
        } else {
            exit( '{"status":2,"info":"注册失败！"}' );
        }
	}

	//手机注册
	function register2() {
		
		TPL :: display('register2');	
	}
	
	// 短信验证码
	function send_pcode(){
		if(empty($_POST))
			exit;
		$tel 		= V('p:tel');

		$code = rand(100000,999999);
		$content = $code.'(一路听天下注册验证码，请在5分钟内注册)。如非本人操作，请忽略【一路听天下】 ';
		$url = 'http://sms.chanzor.com:8001/sms.aspx?action=send&account=ylttx&password=987832&mobile='.$tel.'&content='.$content;
		$xml = file_get_contents($url);
		
		$rs = DS('publics.read_xml','',$xml,'str');
		if($rs['returnsms']['successCounts']['value'] > 0){
			// 发送成功程序
			$_SESSION['ylttx_phone_code'] = $code;
			echo 1;exit;
		} else {
			echo 0;exit;
		}
	}
	
	// 邮箱验证码
	function send_ecode(){
		if(empty($_POST))
			exit;
		$email 		= V('p:email');

		$code = rand(100000,999999);
		$content = '一路听天下邮箱注册验证码： '.$code.' 。【一路听天下】';
		$mail = APP :: N('PHPMailer'); // 建立邮件发送类 
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->Host = "smtp.exmail.qq.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = "server@t1678.com"; // 邮局用户名(请填写完整的email地址)
		$mail->Password = "zaq123"; // 邮局密码
		$mail->Port = 25;
		$mail->CharSet = "UTF-8";
		$mail->From = "server@t1678.com"; //邮件发送者email地址
		$mail->FromName = "一路听天下";			
		$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		$mail->Subject = "一路听天下-注册验证码"; //邮件标题
		$mail->Body = $content; //邮件内容			
		$mail->AddAddress($email,''); //收件人地址
		if($mail->Send()) {
			$_SESSION['ylttx_email_code'] = $code;
			echo 1;exit;
		} else {
			echo 0;exit;
		}
	}
	
	// 短信验证码
	function check_pcode() {
		$checkCode	=	V('r:param');	
		if($checkCode == $_SESSION['ylttx_phone_code']) {
			exit( '{"status":"y","info":" "}' );
		} else {
			exit( '{"status":"n","info":"验证码输入有误"}' );
		}
	} 
	
	// 邮箱验证码
	function check_ecode() {
		$checkCode	=	V('r:param');	
		if($checkCode == $_SESSION['ylttx_email_code']) {
			exit( '{"status":"y","info":" "}' );
		} else {
			exit( '{"status":"n","info":"验证码输入有误"}' );
		}
	} 
	
	//ajax手机注册
	function ajax_register2() {
		$data['phone']		=	V('r:phone');
		$data['username']	=	V('r:username');
		$data['username']	=	trim($data['username']);
		$password			=	V('r:password');
		$data['password']	=	md5($password);
		$data['addtime']	=	time();
		
		$re	=	DS('publics._save','',$data,'users');
		if($re) {
			exit( '{"status":1,"info":"恭喜您，注册成功！"}' );	
		} else {
			exit( '{"status":2,"info":"注册失败！"}' );
		}	
	}

	//检查找回密码第一步
	function ajaxForget() {
		$email	=	V('r:email');
		
		$result	=	DS('publics._get','','users','email="'.$email.'"');
		
		$emailArr	=	explode('@',$email);
		$com	=	$emailArr[1];
		
		if(!empty($result)) {
			$mail = APP :: N('PHPMailer'); // 建立邮件发送类 
			$mail->IsSMTP(); // 使用SMTP方式发送
			$mail->Host = "smtp.exmail.qq.com"; // 您的企业邮局域名
			$mail->SMTPAuth = true; // 启用SMTP验证功能
			$mail->Username = "server@t1678.com"; // 邮局用户名(请填写完整的email地址)
			$mail->Password = "zaq123"; // 邮局密码
			$mail->Port = 25;
			$mail->CharSet = "UTF-8";
			$mail->From = "server@t1678.com"; //邮件发送者email地址
			$mail->FromName = "一路听天下";			
			$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
			$mail->Subject = "一路听天下-找回密码"; //邮件标题
			$mail->Body = "请您点击<a href='http://".$_SERVER['HTTP_HOST'].URL('login.forget_three','&rs='.base64_encode($email).'&time='.time())."'>链接</a>以重置密码"; //邮件内容			
			$mail->AddAddress($email,''); //收件人地址
			if($mail->Send()) {
				exit( '{"status":1,"info":"'.$email.'"}' );
			} else {
				exit( '{"status":2,"info":"邮件发送失败"}' );
			}
			
		} else {
			exit( '{"status":2,"info":"请您检查输入的邮箱是否有误"}' );	
		}
	}

	//找回密码第二步
	function forget_two() {
		$email	=	V('r:email');
		TPL :: assign('email',$email);
		
		TPL :: display('forget_two');	
	}
	
	
	//找回密码第三步
	function forget_three() {
		
		TPL :: display('forget_three');	
	}
	
	/*ajax修改密码*/
	function ajaxForget_three() {
		$time	=	V('r:time');
		if($time - time() >= 86400) {
			header("Location: index.php?m=forget");
		}
		
		$email	=	V('r:email');
		$email	=	base64_decode($email);       
		$newpass	=	V('r:newpass');
			
		$data['password']	=	md5($newpass);
		$data['ec_salt']	=	'';
		
		$re	=	DS('login.changePass','','users','`password`="'.$data['password'].'"','`email`="'.$email.'"');
		if($re) {
			exit( '{"status":1,"info":"新密码设置成功"}' );	
		} else {
			exit( '{"status":2,"info":"新密码设置失败"}' );	
		}
	}
	
	//退出
	function loginOut(){
		unset($_SESSION['xr_id']);
		unset($_SESSION['u_uidss']);
		exit( '{"status":1,"info":"成功提出"}' );
	}
	
	
	function test() {
		$data	=	F('get_userinfo.get_userinfo','33322');    
		
		var_dump($data);
	}

	//测试注册
	function register3() {
		
		TPL :: display('register3');	
	}
	
	/*忘记密码*/
	function forget(){
		TPL :: display('forget');	
	}
	
	/*判断邮箱还是手机-开始重置密码*/
	function resetPassword(){ 
		/*echo '<pre>';
var_dump(V('p'));
echo '</pre>';die;*/
		$username	=	V('r:username');
		$result		=	DS('publics._get','','member',"username='".$username."'");
		if(empty($result)){
			exit('{"info":"您输入的手机号或邮箱不存在","status":"1"}');	
		}else{
			$a	=	substr_count($username,'@');
			/*判断是手机还是邮箱*/
			if($a){
				/*发邮件*/
				$email	=	$username;
				
				$password	=	mt_rand('10000000','99999999');
		
				$memberinfo	=	DS('publics._get','','member','`username`="'.$email.'"');
		
				$org_pass	=	$memberinfo[0]['password'];
		
				$change_result	=	DS('test.change_pass','',$email,md5($password));
		
				$mail = APP :: N('PHPMailer'); //建立邮件发送类 
		
				$mail->IsSMTP(); // 使用SMTP方式发送
		
				$mail->Host = "smtp.qq.com"; // 您的企业邮局域名
		
				$mail->SMTPAuth = true; // 启用SMTP验证功能
		
				$mail->Username = "qixin@vi163.com"; // 邮局用户名(请填写完整的email地址)
		
				$mail->Password = "123456a"; // 邮局密码
		
				$mail->Port = 25;
		
				$mail->CharSet = "UTF-8";
		
				$mail->From = "qixin@vi163.com"; //邮件发送者email地址
		
				$mail->FromName = "藏有之家";			
		
				$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		
				$mail->Subject = "藏有之家-找回密码邮件"; //邮件标题
		
				$mail->Body = "<p>您好，您的新密码是(".$password.")，请您尽快登陆个人中心修改密码，以保证账号安全</p>"; 		//邮件内容
		
				$mail->AddAddress($email,''); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		
				if($mail->Send()) {
					//邮件发送成功
					exit('{"status":"y","info":"密码重置成功，新密码已发送至您的邮箱，请注意查收"}');
				} else {
					//邮件发送失败，密码还原
					$change_result	=	DS('test.change_pass','',$email,$org_pass);
					exit('{"status":"3","info":"网络繁忙，请稍后再试"}');
				}
						
			}else{
				/*发短信*/
				//短信接口用户名 $uid
				$uid = 'zjgz';
				//短信接口密码 $passwd
				$passwd = '123456';
				//发送到的目标手机号码 $telphone
				$telphone = trim(V('p:username'));
				

				$password	=	mt_rand('10000000','99999999');
		
				$memberinfo	=	DS('publics._get','','member','`username`="'.$telphone.'"');
		
				$org_pass	=	$memberinfo[0]['password'];
		
				$change_result	=	DS('test.change_pass','',$telphone,md5($password));
				
				
				//短信内容 $message
				$message = '您好，您的新密码是【'.$password.'】，请您尽快登陆个人中心修改密码，以保证账号安全';
				$message	=	iconv("UTF-8","GB2312//IGNORE",$message);
				$gateway = "http://115.28.14.21/WS/Send.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$telphone}&Content={$message}&Cell=&SendTime=";
				$result = file_get_contents($gateway);
				
				if(0 == $result){
					exit('{"info":"您的密码已重置，新密码已发送至您的手机，请注意查收","status":"y"}');
				}else{
					//短信发送失败将密码还原
					$change_result	=	DS('test.change_pass','',$telphone,$org_pass);
					exit('{"info":"错误提示代码'.$result.'","status":"n"}');
				}
		}
	}
}
	
/************************************************************************************************/
	/* 注册验证 */
	function ajac_register_code(){
		//var_dump(V("r:resphone"));die;
		$resphone = ltrim(rtrim(V("r:resphone")," ")," ");
		$resyzm = ltrim(rtrim(V("r:resyzm")," ")," ");
		//var_dump($resyzm);die;
		//检查是否启用验证码
			if(IS_USE_CAPTCHA ) {
				$autocode = APP :: N('SimpleCaptcha');
				if (!$autocode->checkAuthcode($resyzm)) {
					exit('{"status":"444", "msg":"验证码错误，"}');
				}
			}
		$result = DS("publics._get","","users","username='".$resphone."'");

		if($result == NULL){
			exit('{"status":"3","msg":"user errno"}');
		}
		$sender = APP :: N('httpSend');
		$strReg = "101100-WEB-HUAX-332425";
		$strPwd = "EMALMTUX";
		$strSourceAdd = "";// 子通道号，可为空（预留参数一般为空）
		$_SESSION['phone_key']  = rand(1000,9999);
		$strPhone = $result[0]['username'];					// 手机号码，多个手机号用半角逗号分开，最多1000个
		$strContent = "您好，您的手机动态验证码为：".$_SESSION['phone_key']."。该码10分钟内有效且只能输入1次，若10分钟内未输入，需重新获取。【学啊网】";
		$strSmsUrl = "http://www.stongnet.com/sdkhttp/sendsms.aspx";
		$strSmsParam = "reg=" . $strReg . "&pwd=" . $strPwd . "&sourceadd=" . $strSourceAdd . "&phone=" . $strPhone . "&content=" . $strContent;
		if($_SESSION['sendtime'] == ''){
			$_SESSION['sendtime'] = time();
			$_SESSION['xr_phone'] = $resphone;
			$strRes = $sender->postSend($strSmsUrl,$strSmsParam);
		}else{
			if((time() - $_SESSION['sendtime']) < 60){
			exit('{"status":"9","msg":"间隔时间未超过60秒"}');
			}else{
			$_SESSION['sendtime'] = time();
			$_SESSION['xr_phone'] = $resphone;
			$strRes = $sender->postSend($strSmsUrl,$strSmsParam);
			exit('{"status":"0","msg":"success"}');
			}
		}
		
	}
	
	function check_msgCode(){
		$phone_key	=	V("r:phone_key");
		if($phone_key == ""){
			exit;	
		}else{
			if($phone_key == $_SESSION['phone_key']){
				exit('{"status":"1","msg":"验证成功"}');	
			}else{
				exit('{"status":"2","msg":"短信验证码不正确"}');		
			}	
		}	
	}
	
	function forgetpass(){
		$one_pass 	= md5(ltrim(rtrim(V("p:one_pass")," ")," "));
		$data["password"]	=	$one_pass;
		$data["addtime"]	= 	time();
		$resu= DS('publics._update','',$data,'users',"username",$_SESSION['xr_phone']);
		if($resu){
			unset($_SESSION['xr_phone']);
			exit('{"status":"1","msg":"修改成功"}');	
		}else{
	
			exit('{"status":"2","msg":"网络繁忙"}');
		}
	}

}
