<?php
/**************************************************
*  Created:  2013-03-06
*
*  默认首页
*
*  @Xsmart (C)2006-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class member_mod extends action
{


	function __construct(){
		
		if($_SESSION['xr_id'] == ''){
			echo "<script>location.href='/index.php';</script>";		
		}
	}
	//老师会员中心 
	function xmember()
	{  
		if(!empty($_SESSION['xr_id'])){
			$page		=	V("r:page","1");
			$tid		=	V('r:tid');																	//var_dump($tid);
			$ctype		=	V('r:ctype');																//var_dump($ctype);	
			$qtype		=	V('r:qtype');																//var_dump($pro_name);
			$pro_name	=	V('r:pro_name');	
			
			$ctype		=	V('r:ctype','1');
			//会员信息
			$info		=	DS("publics._get","","users","id=".$_SESSION['xr_id']);							//var_dump($info);die;
			
			//账户信息--学生
			$count 		= DS("publics2.page_list","",10,"userID =".$_SESSION['xr_id']." and isshow = '1'"," addtime desc",V('r'),"integral");	
			//已用学币--学生
			$sum 		= DS("publics2.sum","","integral","userID =".$_SESSION['xr_id']." and sourceType=1");	
			$sum 		= $sum[0]['all'];
			//var_dump($order);die;
			
			if($ctype == 1){
			
				//购买的课程--学生
				$bookInfo 	= DS("publics2.groupBy1","","integral","userID =".$_SESSION['xr_id']." and sourceType = '1'");	
			
				TPL :: assign('bookInfo',$bookInfo);
			}else if($ctype == 2){
				//收藏的课程
				$bookInfo = DS("publics2.page_list","",12,"userID =".$_SESSION['xr_id']." and sourceType = '1'"," addtime desc",V('r'),"collect");	
				TPL :: assign('bookInfo',$bookInfo['info']);
				TPL :: assign('bpagehtml',$bookInfo['pagehtml']);
			
			}else if($ctype == 3){
				$bookInfo = DS("publics2.page_list","",12,"catid=2 and FIND_IN_SET('1',exception)","inputtime desc",V('r'),"system");	
				TPL :: assign('bookInfo',$bookInfo['info']);
				TPL :: assign('bpagehtml',$bookInfo['pagehtml']);	
			} 
				
			//我的考核
			if(V('r:times3') != '' && V('r:times4')!=''){ 
				$times3 = strtotime(V("r:times3")); 
				$times4 = strtotime(V("r:times4")); 
				TPL :: assign("times3",V('r:times3'));
				TPL :: assign("times4",V('r:times4'));  
				//var_dump($times1);var_dump($times2);die;
				$exam  = DS("publics2.page_list","",15,"uid =".$_SESSION['xr_id']." and testDate >= ".$times3." and testDate <= ".$times4," updatetime desc, testDate desc",V('r'),"testing");
				TPL :: assign('exam',$exam['info']);
				TPL :: assign('epagehtml',$exam['pagehtml']);
			}else{
				$exam = DS("publics2.page_list","",20,"uid =".$_SESSION['xr_id'],"updatetime desc,testDate desc",V('r'),"testing");	
				TPL :: assign('exam',$exam['info']);
				TPL :: assign('epagehtml',$exam['pagehtml']);
			}
			//浏览的课程
			//$buyInfo = DS("publics2.page_list","",12,"userID =".$_SESSION['xr_id']." and sourceType = '1'"," addtime desc",V('r'),"integral");
			//随堂笔记
			if(V('r:times1') != '' && V('r:times2')!=''){ 
				$times1 = strtotime(V("r:times1")); 
				$times2 = strtotime(V("r:times2")); 
				TPL :: assign("times1",V('r:times1'));
				TPL :: assign("times2",V('r:times2'));  
				//var_dump($times1);var_dump($times2);die;
				$notes  = DS("publics2.page_list","",15,"uid =".$_SESSION['xr_id']." and inputtime >= ".$times1." and inputtime <= ".$times2," inputtime desc",V('r'),"notes"); 
			}else{
				$notes = DS("publics2.page_list","",15,"uid =".$_SESSION['xr_id']," inputtime desc",V('r'),"notes");
			}
			//我的问答--学生
			$where		=	"uid =".$_SESSION['xr_id'];
			
			if($qtype == '2'){
				$where .= " and isdeal = '1'";	
			}     
			
			if($qtype == '3'){
				$where .= " and isdeal = '0'";	
			}
			
			if(!empty($pro_name)){
				$where .= " and askquiz like '%".$pro_name."%'";		
			}
			
			$question	= DS("publics2.page_list","","10",$where," inputtime desc",V('r'),"question");
			
			//我的帖子
			$bbs_post	=DS("publics2.page_list","","10",$where," inputtime desc",V('r'),"question");
			
			//提问我的--老师
				
			//老师所教课程
			$course		= DS("publics2._get","","course","teach_id=".$_SESSION['xr_id']);		//var_dump($course);die;
			//生成老师所教课程ID数组
			if(!empty($course)){
				foreach($course as $ck=>$cv){
					$arr[] = $cv['id'];	
				}	
			}
			if(!empty($arr)){
				$in = implode(',',$arr);
			}//var_dump($in);die;
			//得到关于老师所教课程的问题
			$cou_question = DS("publics2.page_list","",10,"coid in (".$in.")","inputtime desc",V('r'),"question");//var_dump($cou_question);die;				
			TPL :: assign('page',$page);
			
			TPL :: assign('tid',$tid);
			TPL :: assign('sum',$sum);
			TPL :: assign('ctype',$ctype);
			TPL :: assign('qtype',$qtype);
			TPL :: assign('pro_name',$pro_name);
			
			TPL :: assign('info',$info[0]);
			 
			TPL :: assign('collect',$collect['info']);  
			TPL :: assign('spagehtml',$collect['pagehtml']);
			
			TPL :: assign('notes',$notes['info']);  
			TPL :: assign('npagehtml',$notes['pagehtml']);
			
			TPL :: assign('count',$count['info']);  
			TPL :: assign('cpagehtml',$count['pagehtml']);   
			                     
			
			TPL :: assign('question',$question['info']);  
			TPL :: assign('qpagehtml',$question['pagehtml']); 
			
			TPL :: assign('cou_question',$cou_question['info']);  
			TPL :: assign('coupagehtml',$cou_question['pagehtml']); 
			
			TPL :: display('member/xmember');  
		}else{
			TPL :: display("index");	
		}
	}
	
	/***************************************************************************************************/
	
	
	/***************************************************************************************************/
	//保存/修改 会员资料
	function save_information(){
		//$data			=	V('r');
		$data['uptime']		=	time();
		$data['logo']		= 	V('r:img1');
		
		
		$data['m']			=	V('r:m');
  		$data['realname'] 	= 	V('r:realname');
		$data['sex'] 		= 	V('r:sex');
		$data['age'] 		= 	V('r:age');
		$data['phone'] 		= 	V('r:phone');
		$data['email'] 		= 	V('r:email');
		$data['location_p'] = 	V('r:location_p');
		$data['location_c'] = 	V('r:location_c');
		$data['location_a'] = 	V('r:location_a');
		$data['address'] 	= 	V('r:address');
		$data['introduce'] 	= 	V('r:introduce');
		$data['uptime'] 	= 	V('r:uptime');
		
		//var_dump($data['logo']);die;
	
		if(!empty($_SESSION['xr_id']) && isset($_SESSION['xr_id'])){
			$info 	= 	DS("publics2._get","","users","id=".$_SESSION['xr_id']);
			$re		=	DS("publics2._update","",$data,"users","id",$_SESSION['xr_id']);			//var_dump($re);die;
			if(!empty($re)){
				if($info[0]["type"]==1){
					echo "<script>window.location.href= 'index.php?m=member.xmember&tid=4'</script>";
				}else{
					echo "<script>window.location.href= 'index.php?m=member.xmember&tid=7'</script>";	
				}
			}else{
				echo "<script>alert('网络繁忙，稍后重试！');history.go(-1);</script>";
			}		
		}		
	}
	
	
	/***************************************************************************************************/
	//老师-修改密码页面
	function pass(){
		
		$tid	=	V('r:tid');																		//var_dump($tid);
		
		TPL :: assign('tid',$tid);
		TPL :: display('member/pass');		
	}
	
	
	/***************************************************************************************************/
	//修改密码
	function updatepass(){
		
		$pass				=	V("r:pass");										
		$userpass			=	V("r:userpass");
		$data["password"]	=	V("r:userpass1");
		$re					= 	DS("publics._get","","users","id=".$_SESSION['xr_id']);
		
		if(!empty($re) && ($re[0]["password"] == md5($userpass))){
			
			$res	=	DS("publics._update","",$data,"users","id",$_SESSION['xr_id']);
			if($res){
				exit('{"status":1,"info":"密码修改成功！"}');
			}else{
				exit('{"status":2,"info":"网络繁忙，请稍后重试！"}');		
			}
		}else{
			exit('{"status":3,"info":"旧密码输入有误"}');	
		}
	}


	/***************************************************************************************************/	
	//老师-绑定手机页面
	function phone(){
		
		$tid	=	V('r:tid');																		//var_dump($tid);
		
		TPL :: assign('tid',$tid);
		TPL :: display('member/phone');		
	}
	
	
	
	/***************************************************************************************************/	
	//老师-发送短信
	function sendPhone(){
		$sphone				=	V('r:phone');
		
		if(!empty($_COOKIE['phone_time'])){
			if(time()-$_COOKIE['phone_time'] <= 60){
				exit('{"status":3,"info":"发送邮件时间间隔太短！"}');		
			}	
		}
		
		if(!empty($_SESSION['phone_time'])){
			if(time()-$_SESSION['phone_time'] <= 60){
				exit('{"status":4,"info":"发送邮件时间间隔太短！"}');		
			}	
		}
		$pcode				=	mt_rand('1000','9999'); 
		$sender = APP :: N('httpSend');
		$strReg = "101100-WEB-HUAX-332425";
		$strPwd = "EMALMTUX";
		$strSourceAdd = "";// 子通道号，可为空（预留参数一般为空）
		$strPhone = $sphone;					// 手机号码，多个手机号用半角逗号分开，最多1000个
		$strContent = "您好，您的手机动态验证码为:".$pcode." 。该码10分钟内有效且只能输入1次，若10分钟内未输入，需重新获取。【学啊网】";
		$strSmsUrl = "http://www.stongnet.com/sdkhttp/sendsms.aspx";
		$strSmsParam = "reg=" . $strReg . "&pwd=" . $strPwd . "&sourceadd=" . $strSourceAdd . "&phone=" . $strPhone . "&content=" . $strContent;
		$strRes = $sender->postSend($strSmsUrl,$strSmsParam);
			
			$_SESSION['xr_pcode']	=	$pcode;
			$_SESSION['xr_phone']	=	$sphone	;
			setcookie("phone_time",time(),time()+7776000);
			$_SESSION['phone_time']	=	time();
		exit('{"status":1,"info":"发送成功！"}');	
	}
	
	
	/***************************************************************************************************/	
	//老师-绑定手机
	function phonecode(){
		
		$pcode			=	V("r:code");																	//var_dump($code);die;
		//$data['phone']	=	V("r:phone");
		$data['phone']	=	$_SESSION['xr_phone'];
		$data['uptime']	=	time();																	//var_dump($email);die;
		if($pcode == $_SESSION['xr_pcode']){														//var_dump($_SESSION['xr_code']);die;
			$re	=	DS("publics2._update","",$data,"users","id",$_SESSION['xr_id']);
			if($re){
				exit('{"status":1,"info":"成功绑定！"}');	
			}else{
				exit('{"status":2,"info":"网络繁忙，请稍后重试！"}');		
			}
		}else{
				exit('{"status":3,"info":"验证码错误"}');	
		}
	}
	
	
	
	/***************************************************************************************************/	
	//老师-绑定qq页面
	function qq(){
		
		$tid	=	V('r:tid');																		//var_dump($tid);
		
		TPL :: assign('tid',$tid);
		TPL :: display('member/qq');		
	}
	
	
	/***************************************************************************************************/	
	//老师-绑定email页面
	function email(){
		
		$tid	=	V('r:tid');																		//var_dump($tid);
		
		TPL :: assign('tid',$tid);
		TPL :: display('member/email');		
	}
	
	
	/***************************************************************************************************/	
	//老师-发送邮件
	function sendEmail(){
		$semail				=	V('r:email');
		if(!empty($_COOKIE['email_time'])){
			if(time()-$_COOKIE['email_time'] <= 60){
				exit('{"status":3,"info":"发送邮件时间间隔太短！"}');		
			}	
		}
		
		if(!empty($_SESSION['email_time'])){
			if(time()-$_SESSION['email_time'] <= 60){
				exit('{"status":4,"info":"发送邮件时间间隔太短！"}');		
			}	
		}
		
		$mail 				= APP :: N('PHPMailer'); //建立邮件发送类 
		$mail->IsSMTP(); // 使用SMTP方式发送 
		$mail->Host 		= "smtp.qq.com"; // 您的企业邮局域名 
		$mail->SMTPAuth 	= true; // 启用SMTP验证功能 
		$mail->Username 	= "906485326@qq.com"; // 邮局用户名(请填写完整的email地址) 
		$mail->Password 	= "a123123"; // 邮局密码
		$mail->Port 		= 25;   
		$mail->CharSet 		= "UTF-8";
		$mail->Encoding 	= "base64"; //编码方式 
		$mail->From 		= "906485326@qq.com"; //邮件发送者email地址 
		$mail->FromName 	= "学啊";  
		$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式 
		$mail->Subject 		= "学啊验证信息"; //邮件标题
		$code				=	mt_rand('1000','9999'); 
		$mail->Body 		= "<p>这是一封来自学啊的绑定邮箱的验证信息，请复制下面的验证码：
您的验证码是:".$code."</p>"; 
		$mail->AddAddress($semail); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		//var_dump($mail->ErrorInfo)//var_dump($mail->Send());die;
		if($mail->Send()){
			$_SESSION['xr_ecode']	=	$code;
			$_SESSION['xr_email']	=	$semail	;
			setcookie("email_time",time(),time()+7776000);
			$_SESSION['email_time']	=	time();
			exit('{"status":1,"info":"邮件已发送！"}');		
		} else	{
			exit('{"status":2,"info":"网络繁忙，请稍后重试！"}');	
		}
	}
	
	
	/***************************************************************************************************/	
	//老师-绑定邮箱
	function emailcode(){
		
		$code			=	V("r:code");																	//var_dump($code);die;
		
		$data['email']	=	$_SESSION['xr_email'];															//var_dump($email);die;
		$data['uptime']	=	time();
		if($code == $_SESSION['xr_ecode']){														//var_dump($_SESSION['xr_code']);die;
			$re	=	DS("publics2._update","",$data,"users","id",$_SESSION['xr_id']);
			if($re){
				unset($_SESSION['xr_email']);
				exit('{"status":1,"info":"成功绑定！"}');	
			}else{
				exit('{"status":2,"info":"网络繁忙，请稍后重试！"}');		
			}
		}else{
				exit('{"status":3,"info":"验证码错误"}');	
		}
	}
	
	
	
	
	//充值金币  
	function save_bone(){
		$site_learn = DS('publics.get_index','','site_learn');
		$data['uid']		= V('r:uid');
		$data['price'] 		= V('r:price');
		$data['money'] 		= V('r:price')*$site_learn[0]['value'];
		$data['status'] 	= 1;
		$data['oid'] 		= time().rand(1000,9999);
		$data['addtime']	= time();
		
		$data1['userID']	= V('r:uid'); 
		$data1['oid'] 		= $data['oid'];
		$data1['integral'] 	= $data['money'];
		$data1['status'] 	= 0;
		$data1['sourceType']= 2;
		$data1['addtime']	= time();
			
		$balance = DS("publics2._save","",$data,"balance");
		$integral = DS("publics2._save","",$data1,"integral");
		if($balance && $integral){
			exit('{"status":1,"info":"下单成功！","order":'.$data['oid'].',"price":'.$data['price'].'}');	 
		}else{
			exit('{"status":2,"info":"网络繁忙！"}');		
		}	
	}
	
	
	
	
	
	
	/***************************************************************************************************/	
	//充值金币    原版
	function save_bone_1(){
		$data['uid']		= V('r:uid');
		$data['price'] 		= V('r:price');
		$data['money'] 		= V('r:price');
		$data['stastus'] 	= 1;
		$data['oid'] 		= time();
		$data['addtime']	= time();
			
		$balance = DS("publics2._save","",$data,"balance");
		if($balance){
			
			//更新用户表积分 	
			$info 	= DS("publics2._get","","users","id=".V('r:uid'));
			$data1['uptime'] 		= time();
			$data1['frozen_money'] = $data['money'] + $info[0]['frozen_money'];
			$up  	= DS("publics2._update","",$data1,"users","id",$data['uid']);
			
			//更新或保存integral表
			$integral = DS("publics2._get","","integral","userID=".V('r:uid')." order by addtime desc");
			if($integral){
				$data2['userID']		= V('r:uid');
				$data2['integral'] 		= V('r:price');
				$data2['integralAll'] 	= V('r:price') + $integral[0]['integralAll'];
				$data2['oid'] 			= $data['oid'];
				$data2['sourceType']	= 2;
				$data2['addtime']		= time();
				$re2 = DS("publics2._save","",$data2,"integral");
				if($re2){
					exit('{"status":1,"info":"充值成功！"}');		
				}else{
					exit('{"status":2,"info":"网络繁忙！"}');		
				}	
			}else{
				$data2['userID']		= V('r:uid');
				$data2['integral'] 		= V('r:price');
				$data2['integralAll'] 	= V('r:price');
				$data2['oid'] 			= $data['oid'];
				$data2['sourceType']	= 2;
				$data2['addtime']		= time();
				$re2 = DS("publics2._save","",$data2,"integral");
				if($re2){
					exit('{"status":1,"info":"充值成功！"}');		
				}else{
					exit('{"status":2,"info":"网络繁忙！"}');		
				}
			}
			 
		}else{
			exit('{"status":3,"info":"网络繁忙！"}');		
		}	
	}
	
	
	function delOrder(){
		$oid = V('r:oid');
		$data['isshow'] = 0;
		$up = DS("publics2._update","",$data,"integral","id",$oid);
		if(empty($up)){
			exit('{"status":2,"info":"网络繁忙！"}');		 
		}else{
			exit('{"status":1,"info":"成功删除！"}');		
		}
			
	}
	
	function delquestion(){
		$qid = V('r:qid');
		$up = DS("publics2._del","","question","id=".$qid);
		if(empty($up)){
			exit('{"status":2,"info":"网络繁忙！"}');		 
		}else{
			exit('{"status":1,"info":"成功删除！"}');		
		}
			
	}
	
	
	function success_bone(){
		TPL :: display("member/success_bone") ;	
	}
	
	function exam_detail(){
		
		if(empty($_SESSION['xr_id'])){
			header('Location:index.php');
		}
		$coid	= V('r:coid');
		$tid	= V('r:tid','5');
		TPL :: assign("coid",$coid);
		TPL :: assign("tid",$tid);
		
		$course	=	DS("publics2._get","","course","id=".$coid);
		TPL :: assign("course",$course[0]);
		
		$exam	=	DS("publics2._get","","exam","courseid=".$coid." order by listorder asc,difficulty asc,inputtime desc");	
		TPL :: assign("exam",$exam);
		
		TPL :: display("member/exam_detail");	
	}
	
	function save_grade(){
		$data['uid'] 		= V("r:uid");
		$data['coid'] 		= V("r:coid");
		$data['score']		= V("r:scode");
		
		
		$grade	=	DS("publics2._get","","testing","uid=".$data['uid']." and coid=".$data['coid']);
		if(empty($grade)){
			$data['testDate']	= time();
			$data['updatetime']	= time();
			$re = DS("publics2._save","",$data,"testing");
			if($re){
				exit('{"status":1,"info":"成功保存！"}');		
			}else{
				exit('{"status":1,"info":"网络繁忙！"}');	
			}	
		}else{
			$data['updatetime']	= time();
			$re = DS("publics2._update","",$data,"testing","uid",$data['uid']." and coid=".$data['coid']);
			if($re){
				exit('{"status":1,"info":"成功保存！"}');	
			}else{
				exit('{"status":2,"info":"网络繁忙！"}');	
			}	
		}
	}
	
	function del_exam(){
		$eid = V("r:eid");
		$re = DS("publics2._del","","testing","id=".$eid);
		if($re){
			exit('{"status":1,"info":"成功保存！"}');
		}else{
			exit('{"status":2,"info":"网络繁忙！"}');	
		}	
	}
	function istest(){
		$uid	=	V("r:uid");
		$uinfo	=	DS("publics2._get","","users","id=".$uid);
		if($uinfo[0]['type'] == 2){
			exit('{"status":1,"info":"学生"}');
		}else{
			exit('{"status":2,"info":"无需测试"}');	
		} 	
	}
	
	function delColl(){
		$sysid	=	V('r:sysid');
		$re	=	DS("publics2._del","","collect","id=".$sysid);
		if($re){
			exit('{"status":1,"info":"成功删除"}');	
		}else{
			exit('{"status":2,"info":"网络繁忙"}');	
		}	
	}
}
