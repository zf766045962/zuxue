<?php
/**************************************************
*  Created:  2014-10-09
*
*  bbs论坛用户中心
*
*  @Xsmart (C)2014-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class bbs1_mod extends action
{

		function password1(){
				$ss = $_SESSION['u_uidss'];
				$sa = DS('publics._get','','users',"id = $ss");

				if($sa[0]['password'] != md5(V('r:password'))){
					echo '{"code":"403005","message":"原密码有误，请重新输","redirect":"","value":""}';
				}else{
					DS('publics.date1','','users',"password ='".md5(V('r:resetPassword'))."'","id = $ss");
					echo '{"code":"200","message":"","redirect":"","value":true}';
				}
		}
		function password2(){
		
				$ss = $_SESSION['u_uidss'];
				$sa = DS('publics._get','','users',"id = $ss");
				if($sa[0]['password'] != md5(V('r:password'))){
					echo '{"code":"200","message":"","redirect":"","value":"33TVW35ZRVCUDA3ZM56LNOW8HMU37JGO"}';
					/*echo '{"code":"200","message":"","redirect":"","value":"I69UC14OOCGED8KUL2Q0NJJZJU9YHCAS"}';*/
				}else{		
					echo '{"code":"200","message":"","redirect":"","value":"I69UC14OOCGED8KUL2Q0NJJZJU9YHCAS"}';
				}
			
			}
		function email(){
				$nam=DS('publics._get','','users', "id='".$_SESSION['u_uidss']."'");
				function et($email,$password,$worklog,$content,$younan,$address){

				require_once('js/mail1/class.phpmailer.php'); //载入PHPMailer类 
				 
				$mail = new PHPMailer(); //实例化 
				$mail->IsSMTP(); // 启用SMTP 
				$mail->Host = "smtp.exmail.qq.com"; //SMTP服务器 以163邮箱为例子 
				$mail->Port = 25;  //邮件发送端口 
				$mail->SMTPAuth   = true;  //启用SMTP认证 
				 
				$mail->CharSet  = "UTF-8"; //字符集 
				$mail->Encoding = "base64"; //编码方式 
				 
				$mail->Username = "$email";  //你的邮箱 
				$mail->Password = "$password";  //你的密码 
				$mail->Subject = "$worklog"; //邮件标题 
				 
				$mail->From = "$email";  //发件人地址（也就是你的邮箱） 
				$mail->FromName = "$younan";  //发件人姓名 
				 
				 
				foreach($address as $k=>$val){
						$mail->AddAddress($val[0],$val[1]);; //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名") 
					}	
				//foreach($addcc as $k1=>$val1){
				//		$mail->AddCC($val1[0],$val1[1]);//抄送
				//	}
				
				
				
				 
				//$mail->AddAttachment('./upload/xx.xls','2014工作日志报表 瞿栋.xls'); // 添加附件,并指定名称 
				$mail->IsHTML(true); //支持html格式内容 
				//$mail->AddEmbeddedImage("logo.jpg", "my-attach", "logo.jpg"); //设置邮件中的图片 
				$mail->Body = "$content"; //邮件主体内容 
				 
				//发送 
				$mail->Send();	
				}
				$shb = rand(100000,999999);
				$_SESSION['yzm'] = $shb;
				$content = '请记住你的验证码（'.$_SESSION['yzm'].'）';//你的内容	
				$email 			= 		'xuanchaojie@vi163.com';//你的邮箱
				$password		=		'xcj12345';//你的邮箱密码
				$younan 		= 		'玄超杰';//发件人
				$em = V('r:email')==NULL?$nam[0]['email']:V('r:email');
					
					$b= (strpos($em,"@"));
					$nam = substr($em,0,$b);

				$address		=		array(array($em,$nam));
				//$address		=		array(array('chenyining@vi163.com','陈壹宁'),array('zhangshichao@vi163.com','张士超'));//收件人
				//$addcc			=		array(array('liuyongwei@vi163.com','刘永伟'));//抄送
						
				et($email,$password,date("Y-m-d".' 工作日志'),$content,$younan,$address);
				echo '{"code":"200","message":"","redirect":"","value":true}';
					
		}
		function email1(){
			
				$ss = $_SESSION['u_uidss'];
			if(V('r:kapkey') == $_SESSION['yzm']){
				DS('publics.date1','','users',"email ='".V('r:email')."'","id = $ss");
				echo ' 
{"code":"200","message":"","redirect":"","value":{"clientId":9898090,"companyId":0,"email":"274859735@qq.com","flyme":"","lastloginip":-572679603,"lastlogintime":1415689093,"loginName":"","salt":"94f2cf"}}';
				}else{
					echo '{"code":"200000","message":"验证码有误","redirect":"","value":""}';
					}	
		}
		function email2(){
			if(V('r:kapkey') == $_SESSION['yzm']){
						echo '{"code":"200","message":"","redirect":"","value":true}';
					}else{
						echo '{"code":"200000","message":"验证码有误","redirect":"","value":""}';
					}
				//echo '{"code":"200","message":"","redirect":"","value":true}';
		}
		
		function email3(){
				
				echo '{"code":"200","message":"","redirect":"","value":{"color":2,"score":100}}';
		}
		function email0(){

				$ss = $_SESSION['u_uidss'];	
				
				if(V('r:kapkey') == $_SESSION['yzm']){
					
					DS('publics.date1','','users',"email ='".V('r:email')."'","id = $ss");	
					echo '{"code":"200","message":"","redirect":"","value":"9PJWSMVL2MGB0IC201WI5X206XA0JSD9"}';
					
				}else{
					echo '{"code":"200000","message":"验证码有误","redirect":"","value":""}';
					}
		}
		function connment(){
			$ss = $_SESSION['u_uidss'];	
			$author=DS('publics._get','','users', "id=$ss");
			$author = $author[0]['username'];
			$data =	time();	
			
			DS('publics.date2','','bbs_postcomment',"tid,pid,author,authorid,dateline,comment","'".V('r:tid')."','".V('r:fid')."','$author',$ss,'$data','".V('r:names')."'");	
			DS('publics.date1','','bbs_post',"recoverytime = '$data'","pid = '".V('r:tid')."'");
			$all=DS('publics.get_total','','bbs_postcomment', "rpid = 0 and tid = '".V('r:tid')."' and comment != ''");
			DS('publics.date1','','bbs_post',"alltip = $all","pid = '".V('r:tid')."'");
					
			$sa = DS('publics._get','','bbs_postcomment',"rpid=0 and tid ='".V('r:tid')."' order by id desc limit 1");
			
		    $tidid = DS('publics._get','','bbs_post'," pid ='".V('r:tid')."'");
			//var_dump($tidid);
			$remin['uid']			= $ss;
			$remin['followid'] 		= $tidid[0]['authorid'];
			$remin['information']   =$tidid[0]['subject'] ;
			//$remin['information2']   = V('r:names');
			$remin['status']  		= 3;
			$remin['is_read'] 	 	= 0;
			$remin['tid']  			= V('r:tid');
			$remin['fid'] 		 	= V('r:fid');
			$remin['addtime'] 		= time();
			$remin['tidaddtime'] 	= $data;
			DS('publics._save','',$remin,'remind');
			
			
			if(V('r:page') != NULL){	
echo "<script> location.href='".URL('bbs.thread_detail','&tid='.V('r:tid').'&fid='.V('r:fid').'&page='.V('r:page').'#'.$sa[0]['id'])."' </script>";
			}else{
				echo "<script> location.href='".URL('bbs.thread_detail','&tid='.V('r:tid')).'&fid='.V('r:fid')."'</script>";
				}
		}
		function yzz(){
				echo $_SESSION['verify_code'];
		}
		function name1(){
				$con1=DS('publics._get','','bbs_postcomment', "id='".V('r:cc')."'"); 
				echo $con1[0]['author'];	
		}
		function con2(){
				$con1=DS('publics._get','','bbs_postcomment', "id='".V('r:cc')."'"); 
				echo htmlspecialchars($con1[0]['comment']);
		}
		function zhfid(){
				$con1=DS('publics._get','','bbs_postcomment', "id='".V('r:cc')."'"); 
				echo $con1[0]['id'];
		}
		function zhfsql(){
				$ss = $_SESSION['u_uidss'];
				$author=DS('publics._get','','users', "id=$ss");
				$author = $author[0]['username'];
						
				$data = time();	
		DS('publics.date2','','bbs_postcomment',"tid,pid,author,authorid,dateline,comment,rpid","'".V('r:tid')."','".V('r:fid')."','$author',$ss,'$data','".V('r:con3')."','".V('r:names')."'");	
		
			echo "<script> location.href='".URL('bbs.thread_detail','&tid='.V('r:tid').'&fid='.V('r:fid').'&page='.V('r:page').'#'.V('r:names'))."' </script>";	
		}
		function con(){
				$ss = $_SESSION['u_uidss'];
				$author=DS('publics._get','','users', "id=$ss");
				$author = $author[0]['username'];
				$con1=DS('publics._get','','bbs_postcomment', "rpid='".V('r:cc')."' and pid = $ss and tid ='".V('r:tid')."' limit 0");
				$id = $con1[0]['id']; 
				//var_dump($con1);
				$con21=DS('publics._get','','bbs_postcomment', "rpid='".V('r:cc')."' and pid = $ss and score = 1 and tid ='".V('r:tid')."'");
				$con22=DS('publics._get','','bbs_postcomment', "rpid='".V('r:cc')."' and pid = $ss and score = 2 and tid ='".V('r:tid')."'");
				if($ss != NULL){	
				if($con22 == NULL){
				if($con21 == NULL){
				if(is_int(V('r:tid'))){
					$tid = V('r:tid');
					}else{
						$tid = 0;
						}
				if($con1 != NULL){
					DS('publics.date1','','bbs_postcomment',"score = 1","id = '$id'");	
					$fdnd=DS('publics.get_total','','bbs_postcomment', "rpid ='".V('r:cc')."' and score = 1 and tid ='".V('r:tid')."'");
					echo $fdnd."  ".'人反对';
					
					}else{	
					DS('publics.date2','','bbs_postcomment',"tid,pid,author,score,rpid","'".V('r:tid')."',$ss,'$author',1,'".V('r:cc')."'");	
					$fdnd=DS('publics.get_total','','bbs_postcomment', "rpid ='".V('r:cc')."' and score = 1 and tid ='".V('r:tid')."'");
					echo $fdnd." ".'人反对';	
						}
						}else{
							echo '不能重复反对';
							}
				//echo $con1[0]['id'];
		}else{
			echo '你已经支持过了';
			}
				}else{
					echo '请先登录';
					}
		
		}
		function up(){
				$ss = $_SESSION['u_uidss'];
				$author=DS('publics._get','','users', "id=$ss");
				$author = $author[0]['username'];
				$con1=DS('publics._get','','bbs_postcomment', "rpid='".V('r:cc')."' and pid = $ss and tid ='".V('r:tid')."' limit 1");
				$id = $con1[0]['id']; 
			
				$con21=DS('publics._get','','bbs_postcomment', "rpid='".V('r:cc')."' and pid = $ss and score = 2 and tid ='".V('r:tid')."'");
				$con22=DS('publics._get','','bbs_postcomment', "rpid='".V('r:cc')."' and pid = $ss and score = 1 and tid ='".V('r:tid')."'");

				if($ss != NULL){			
				if($con22 == NULL){
				if($con21 == NULL){
				if(is_int(V('r:tid'))){
					$tid = V('r:tid');
					}else{
						$tid = 0;
						}
				if($con1 != NULL){
					DS('publics.date1','','bbs_postcomment',"score = 2","id = '$id'");	
					$fdnd=DS('publics.get_total','','bbs_postcomment', "rpid ='".V('r:cc')."' and score = 2 and tid ='".V('r:tid')."'");
					echo $fdnd."  ".'人支持';
					
					}else{	
					DS('publics.date2','','bbs_postcomment',"tid,pid,author,score,rpid","'".V('r:tid')."',$ss,'$author',2,'".V('r:cc')."'");	
					$fdnd=DS('publics.get_total','','bbs_postcomment', "rpid ='".V('r:cc')."' and score = 2 and tid ='".V('r:tid')."'");
					echo $fdnd." ".'人支持';	
						}
						}else{
							echo '不能重复支持';
							}
				//echo $con1[0]['id'];
		}else{
			 echo '你已经反对过了';
			}
		}else{
			echo '请先登录';
			}	
		}
		function lctz(){
			$page = ceil((V('r:lctz'))/10);
			$conwz=DS('publics._get','','bbs_postcomment', "comment != '' and rpid=0 and tid = '".V('r:tid')."'");
			if(V('r:all') >= V('r:lctz') and V('r:lctz') > 0 ){
			foreach($conwz as $k=>$val){  
				
				if($k+1 == V('r:lctz')){
					echo "<script> location.href='".URL('bbs.thread_detail','&fid='.V('r:fid').'&tid='.V('r:tid').'&page='.$page.'#'.$val['id'])."'</script>";
					}
				
				}
				}else{
					echo "<script> location.href='".URL('bbs.thread_detail','&fid='.V('r:fid').'&tid='.V('r:tid'))."'</script>";
					}	
		}
		function savepagesss(){
			$ss = $_SESSION['u_uidss'];
			//var_dump($ss);
			DS('publics.date1','','users',"avatar = '".V('r:page')."'","id ='$ss'");	
			
			//echo V('r:page');
		}
		function datename(){
			$conwz=DS('publics._get','','users', "username='".V('r:nickname')."'");
			$timesss=DS('publics._get','','users', "id='".$_SESSION['u_uidss']."'");
			
			if(substr(V('r:nickname'),0,6) == '用户'){
				echo '{"code":"500","message":"昵称不能以用户开头","redirect":"","value":""}';
			}else if($conwz != NULL){
				echo '{"code":"500","message":"用户名已被注册","redirect":"","value":""}';
				}else{
				echo ' {"code":"200","message":"","redirect":"","value":true}';
			}/*else{
				DS('publics.date1','','users',"uptime =$data","id ='".$_SESSION['u_uidss']."'");
				DS('publics.date1','','users',"username ='".V('r:nickname')."'","id ='".$_SESSION['u_uidss']."'");
				}*/
			
		}
		function datename2(){
			$data =	time();	
			$timesss=DS('publics._get','','users', "id='".$_SESSION['u_uidss']."'");	
			if($timesss[0]['uptime'] == NULL){
				DS('publics.date1','','users',"uptime =$data","id ='".$_SESSION['u_uidss']."'");
				DS('publics.date1','','users',"username ='".V('r:nickname')."'","id ='".$_SESSION['u_uidss']."'");
				echo '{"code":"200","message":"","redirect":"","value":"'.V('r:nickname').'"}';
				}else if(time() - $timesss[0]['uptime'] > 7948800){
					DS('publics.date1','','users',"uptime =$data","id ='".$_SESSION['u_uidss']."'");
					DS('publics.date1','','users',"username ='".V('r:nickname')."'","id ='".$_SESSION['u_uidss']."'");				
					}else{
				$time = date('Y-m-d H:i:s',$timesss[0]['uptime'] );
				echo '{"code":"500","message":"三个月才可修改一次昵称,上次修改于'.$time.'","redirect":"","value":""}';
			}
		}
		function quesy(){
				$ss = $_SESSION['u_uidss'];
				$sa = DS('publics._get','','users',"id = $ss");
				 
				if($sa[0]['password'] != md5(V('r:password'))){
						echo '{"code":"403005","message":"账号密码有误，请重新输入","redirect":"","value":""}';
				}else{
					echo '{"code":"200","message":"","redirect":"","value":true}';
				}
			
		}
		function updateUserAnswer(){
			if(V('r:questionCode1') != NULL and V('r:questionCode2') !=NULL ){
			DS('publics.date1','','users',"question1 ='".V('r:questionCode1')."'","id ='".$_SESSION['u_uidss']."'");
			DS('publics.date1','','users',"answer1 ='".V('r:answer1')."'","id ='".$_SESSION['u_uidss']."'");
			DS('publics.date1','','users',"qusetry2 ='".V('r:questionCode2')."'","id ='".$_SESSION['u_uidss']."'");
			DS('publics.date1','','users',"answre2 ='".V('r:answer2')."'","id ='".$_SESSION['u_uidss']."'");		
			echo '{"code":"200","message":"","redirect":"","value":true}';
			}else{
				echo '{"code":"403005","message":"请选择问题","redirect":"","value":""}';
				}
		}
		function isValidUserAnswer(){
			$con=DS('publics._get','','users', "answer1 = '".V('r:answer1')."' and answre2 = '".V('r:answer2')."'");	
			if($con != NULL){
				echo '{"code":"200","message":"","redirect":"","value":true}';
				}else{			 
					echo '{"code":"500","message":"密保验证错误","redirect":"","value":""}';
					}	
		
		}
		function tipdup(){
			$ss = $_SESSION['u_uidss'];
			$con1=DS('publics._get','','bbs_postcomment', "tid='".V('r:tid')."' and pid = $ss and score = '3'");	
			$con2=DS('publics._get','','bbs_postcomment', "tid='".V('r:tid')."' and pid = $ss and score = '4'");
			if($ss != NULL){	
			if($con2 == NULL){
			if($con1 == NULL){			
				DS('publics.date2','','bbs_postcomment',"tid,pid,score","'".V('r:tid')."',$ss,3");	
				$fdnd=DS('publics.get_total','','bbs_postcomment', "score = 3 and tid ='".V('r:tid')."' and pid = $ss");
				echo $fdnd."  ".'人反对';	
				}else{
					echo '不能重复反对';	
					}	
		}else{
			echo '你已经支持过了';	
			}
			}else{
				echo '请先登录';
				}
		}
		
		function tipsup(){
			$ss = $_SESSION['u_uidss'];
			$con1=DS('publics._get','','bbs_postcomment', "tid='".V('r:tid')."' and pid = $ss and score = '3'");	
			$con2=DS('publics._get','','bbs_postcomment', "tid='".V('r:tid')."' and pid = $ss and score = '4'");
			if($ss != NULL){	
			if($con1 == NULL){
			if($con2 == NULL){			
				DS('publics.date2','','bbs_postcomment',"tid,pid,score","'".V('r:tid')."',$ss,4");	
				$fdnd=DS('publics.get_total','','bbs_postcomment', "score = 4 and tid ='".V('r:tid')."' and pid = $ss");
				echo $fdnd."  ".'人支持';	
				}else{
					echo '不能重复支持';	
					}	
		}else{
			echo '你已经反对过了';	
			}
			}else{
				echo '请先登录';
				}
		}
		
		
		
		function qiandao(){
			$con1=DS('publics._get','','users',"id ='".$_SESSION['u_uidss']."'");	
			
			$num = $con1[0]['frozen_money'];
			
			if($con1[0]['qiandaodate'] == date('Ymd',time())){
				echo '1';
				}else if((int)date('Ymd',time()) - (int)$con1[0]['qiandaodate'] != 0){
					$pointss2 = $num +5;
					
					$data['frozen_money'] = $pointss2;
					$data['uptime']		  = time();
					 
					DS('publics2._update','',$data,"users","id",$_SESSION['u_uidss']);
					
					$data1['userID'] 		= $_SESSION['u_uidss'];
					$data1['oid'] 	 		= date("Ymdhis",time()).rand(1000,9999);
					$data1['integral'] 		= 5;
					$data1['sourceType'] 	= 4;
					$data1['addtime'] 		= time();
					DS('publics2._save','',$data1,"integral");	
					echo 202;
					
					DS('publics.date1','','users',"qiandaodate = '".date('Ymd',time())."' ","id ='".$_SESSION['u_uidss']."'");
				}
		}
		
		
		
		
		
		function qiandao1(){
			$con1=DS('publics._get','','users',"id ='".$_SESSION['u_uidss']."'");	
			
			$po = $con1[0]['adds'];
			$po1 = $con1[0]['points'];
			$pointss = DS('integral.get_integral','',$_SESSION['u_uidss']);
			
			if($con1[0]['qiandaodate'] == date('Ymd',time())){
				echo '1';
				}else if((int)date('Ymd',time()) - (int)$con1[0]['qiandaodate'] != 0){
					$pointss2 = $pointss +5;
					DS('publics.date1','','integral',"integralAll = $pointss2 ","uid ='".$_SESSION['u_uidss']."'");
					DS('publics.date2','','integral',"uid,integralAll,integral,addtime,sourceType,sourceID","'".$_SESSION['u_uidss']."',$pointss2,5,'".time()."',9,9");	
					echo 202;
					DS('publics.date1','','users',"qiandaodate = '".date('Ymd',time())."' ","id ='".$_SESSION['u_uidss']."'");
				}
		}
	
		function start(){
			
			TPL::display('start');
		}
		function i_up(){
			TPL::display('i_up');
		}
		function main(){
			TPL::display('main');
		}		
		
		
}
