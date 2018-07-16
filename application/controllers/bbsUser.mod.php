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
class bbsUser_mod extends action
{
	// 基本资料
	function my_basic_info()
	{
		/*
			1. 使用"get_info"方法查询xsmart_user_info_basic取出当前用户基本资料信息数据
			返回值：array 一维数组
		*/
		$uid = $_SESSION['u_uidss'];
		$re1 = DS('publics.get_info','','user_info1',"uid='".$uid."'");
		TPl :: assign('re1',$re1);
		TPL :: display('bbs/my_basic_info');
	} 

	
	// 职业信息
	function my_profession_info()
	{
		/*
			1. 使用"get_info"方法查询xsmart_user_info取出当前用户职业信息数据
			返回值：array 一维数组
		*/
		$uid = $_SESSION['u_uidss'];
		$re1 = DS('publics.get_info','','user_info1',"uid='".$uid."'");
		TPl :: assign('re1',$re1);
		TPL :: display('bbs/my_profession_info');
	}
	
	// 活动信息
	function my_activity_info()
	{
		/*
			1. 使用"get_info"方法查询xsmart_user_info取出当前用户活动信息数据
			返回值：array 一维数组
		*/
		$uid = $_SESSION['u_uidss'];
		$re1 = DS('publics.get_info','','user_info1',"uid='".$uid."'");
		TPl :: assign('re1',$re1);
		TPL :: display('bbs/my_activity_info');
	}

	// 个人信息
	function my_info()
	{
		/*
			1. 使用"get_info"方法查询xsmart_user_info取出当前用户个人信息数据
			返回值：array 一维数组
		*/
		$uid = $_SESSION['u_uidss'];
		$re1 = DS('publics.get_info','','user_info1',"uid='".$uid."'");
		TPl :: assign('re1',$re1);
		TPL :: display('bbs/my_info');
	}

	// 信息保存(ajax)
	function saveUserInfo()
	{
		/*
			接收参数: 一维数组 $arr = $_POST;
			1. 使用"get_total"方法查询xsmart_user_info是否存在记录条数>0
			2. if(条数 > 0) {
				使用"_save"方法更新数据
			}else{
				使用"_save"方法保存数据
			}
			返回值: int 0/1
			if(empty($_POST)){exit;}else{}*/
		$uid = $_SESSION['u_uidss'];//echo $uid;echo "444";die;
		$username = V('r:username');
		$iid      = V('r:iid');//echo $uid;echo $username;
		$num = DS('publics.get_total','','user_info1',"uid='".$uid."'");//var_dump($num);
		
		if($iid == 1 || $iid == 0){
			$data['gender']          = V('r:gender');  
			$data['birthyear']       = V('r:birthyear');  
			$data['birthmonth']      = V('r:birthmonth');  
			$data['birthday']        = V('r:birthday');
			$data['qq']              = V('r:qq');  
			$data['field1']          = V('r:field1');  
			$data['resideprovince']  = V('r:resideprovince');  
			$data['field3']          = V('r:field3');  
			$data['privacy1']        = V('r:privacy1');  
			$data['uid']             = $uid;
			$data['username']        = $username;//var_dump($_POST);//var_dump($data);
			if($num == 0){
				$save = DS('publics._save','',$data,'user_info1');//var_dump($save);
				if(!empty($save)){
					echo "1";
				}else{
					echo "网络繁忙";
				}
			}else{
				$update = DS('publics._update','',$data,'user_info1','uid',$uid);//var_dump($update);
				if(!empty($update)){
					echo "2";
				}else{
					echo "您没有修改信息";
				}
			}
		}else if($iid == 2){
			$data['education']       = V('r:education');  
			$data['graduateschool']  = V('r:graduateschool');  
			$data['privacy2']        = V('r:privacy2');  
			$data['uid']             = $uid;
			$data['username']        = $username;//var_dump($_POST);//var_dump($data);
			if($num == 0){
				$save = DS('publics._save','',$data,'user_info1');//var_dump($save);
				if(!empty($save)){
					echo "1";
				}else{
					echo "网络繁忙";
				}
			}else{
				$update = DS('publics._update','',$data,'user_info1','uid',$uid);
				if(!empty($update)){
					echo "2";
				}else{
					echo "您没有修改信息";
				}
			}
		}else if($iid == 3){
			$data['realname']   = V('r:realname');  
			$data['idcard'] 	= V('r:idcard');
			$data['idcardtype'] = V('r:idcardtype');  
			$data['privacy3']   = V('r:privacy3');  
			$data['uid']        = $uid;
			$data['username']   = $username;//var_dump($_POST);//var_dump($data);
			if($num == 0){
				$save = DS('publics._save','',$data,'user_info1');//var_dump($save);
				if(!empty($save)){
					echo "1";
				}else{
					echo "网络繁忙";
				}
			}else{
				$update = DS('publics._update','',$data,'user_info1','uid',$uid);
				if(!empty($update)){
					echo "2";
				}else{
					echo "您没有修改信息";
				}
			}
		}else if($iid == 4){
			$data['bio']      = V('r:bio');  
			$data['interest'] = V('r:interest');  
			$data['privacy4'] = V('r:privacy4');  
			$data['uid']      = $uid;
			$data['username'] = $username;//var_dump($_POST);//var_dump($data);
			if($num == 0){
				$save = DS('publics._save','',$data,'user_info1');//var_dump($save);
				if(!empty($save)){
					echo "1";
				}else{
					echo "网络繁忙";
				}
			}else{
				$update = DS('publics._update','',$data,'user_info1','uid',$uid);
				if(!empty($update)){
					echo "2";
				}else{
					echo "您没有修改信息";
				}
			}
		}
	}
	
	// 账户管理
	function my_userManage()
	{
		/*
			1. 使用"get_info"方法查询xsmart_user账户信息   2. 使用"get_info"方法查询xsmart_security_question密保问题
		*/
		TPL :: display('bbs/my_userManage');
	}
	
	// 修改头像
	function my_avatar()
	{
		/*
			1. 使用"get_info"方法查询xsmart_user取出头像信息
			返回值：string 头像
		*/
		$uid = $_SESSION['u_uidss'];
		
		$re = DS('publics._get','','users',"id='".$uid."'");
		TPL :: assign('re',$re);
		TPL :: display('bbs/my_avatar');
	}
	
	// 保存修改的头像(ajax)
	function saveAvatar()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数: 一维数组 用户id 更新后的头像信息
			1. 使用"_save"方法更新xsmart_user头像信息数据
			返回值：int 0/1
		*/
	}
	
	// 发送邮箱验证码(ajax)
	function send_emailcode(){
		/*
			接收参数: null
			1. 查询当前用户邮箱 
			2. 将验证码随机数保存至session中
			3. 发送验证码
			返回值：int 0/1
		*/
	}

	// 密保验证(ajax)
	function questionCheck()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数：二维数组
			$post = array(
				0 => array(问题1id,回答1),
				1 => array(问题2id,回答2),
				...
			);
			if(!empty($arr)){
				foreach($arr as $key=>$val){
					1. 使用"get_total"方法查询xsmart_user_security，条件 问题and回答and用户id
					2. if(以上结果 == 0){
						exit('0');
					}
				}
			}
			exit('1');
			返回值：int 0/1
		*/
	}
	
	// 修改或者保存密保问题
	function saveSecurity()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数：二维数组
			$post = array(
				0 => array(问题1id,回答1),
				1 => array(问题2id,回答2),
				...
			);
			if(!empty($arr)){
				1. 使用"_del"方法删除xsmart_user_security当前用户的密保问题
				foreach($arr as $key=>$val){
					2. 使用"_save"方法保存xsmart_user_security当前用户的密保问题
				}
				3. 使用"_save"方法更新xsmart_user密保状态字段为1
			}
			返回值：int 0/1 成功或失败.
		*/
	}
	
	// 添加关注(ajax)
	function add_follow()
	{
		/*
			接收参数：被关注者uid
			注意：单向关注/互相关注
			返回值：jsonString
				关注成功 exit( '{"status":1,"info":"关注成功！"}' );
				关注失败 exit( '{"status":0,"info":"网络繁忙，请稍后再试！"}' );
				已关注过 exit( '{"status":2,"info":"您已关注过！"}' );
				不能关注（拉黑） exit( '{"status":3,"info":"关注失败，您无权限关注此人！"}' );
		*/
		$fid = V('g:fid');//echo $fid."<br>";
		$uid = $_SESSION['u_uidss'];//echo $uid."<br>";
		$data['uid']       = $uid;
		$data['followuid'] = $fid;
		$ure = DS('publics._get','','users',"id='".$uid."'"); 
		$fre = DS('publics._get','','users',"id='".$fid."'");
		$data['username']  = $ure[0]['username'];
		$data['fusername'] = $fre[0]['username'];
		$data['dateline']  = time();  
		$add = DS('publics._save','',$data,'user_follow');
		$add1 = DS('publics._get','','user_follow',"uid='".$uid."' and followuid='".$fid."'");
		//var_dump($add1);die;
		if(!empty($add1)){
			echo "成功添加关注";	
		}else{
			echo "网络繁忙";	
		}
	}   
	
	// 取消关注(ajax)
	function del_follow()
	{
		/*if(empty($_POST)){
			exit;
		}*/
		/*
			接收参数：被取消关注者uid
			注意：单向关注/互相关注
			返回值：jsonString
				成功 exit( '{"status":1,"info":"关注成功！"}' );
				失败 exit( '{"status":0,"info":"网络繁忙，请稍后再试！"}' );
		*/
		$uid = $_SESSION['u_uidss'];//echo $uid."<br>";
		$fid = V('r:fid');//echo $fid."<br>";
		$del_re  = DS('publics._del','','user_follow',"uid='".$uid."' and followuid='".$fid."'");
		if(!empty($del_re)){
			echo "成功取消关注";
		}else{
			echo "网络繁忙";	
		}
	}
	
	// 添加收藏(ajax)
	function add_favorite()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数：tid 		int 		主题id
					title  		string 		标题
					description string 		描述
									
			返回值：jsonString
				收藏成功 exit( '{"status":1,"info":"关注成功！"}' );
				收藏失败 exit( '{"status":0,"info":"网络繁忙，请稍后再试！"}' );
				已收藏过 exit( '{"status":2,"info":"您已关注过！"}' );
		*/
	}
	
	// 取消收藏(ajax)
	function del_favorite()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数：tid 收藏id
			返回值：jsonString
				成功 exit( '{"status":1,"info":"关注成功！"}' );
				失败 exit( '{"status":0,"info":"网络繁忙，请稍后再试！"}' );
		*/
	}
	
	// 添加好友请求(ajax)
	function friendRequest()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数：fuid 		int 		被请求用户ID
					fusername  	string 		被请求用户名称
					gid 		int 		好友所在的好友组ID
					note 		string 		申请附言
									
			返回值：jsonString
				申请已发送 exit( '{"status":1,"info":"关注成功！"}' );
				申请发送失败 exit( '{"status":0,"info":"网络繁忙，请稍后再试！"}' );
		*/
	}
	
	// 同意 | 拒绝添加好友
	function friendRequest_reply()
	{
		/*
			接收参数：type	  	int		0/1/2   请求是否是通过或通过并加为好友
					uid  		string 		被请求用户id
									
			返回值： int  0/1  操作成功或失败
		*/
	}
	
	//删除好友
	function del_friend(){
		$fid = V('r:fid');//echo $fid;
		$uid = $_SESSION['u_uidss'];
		$del = DS('publics._del','','user_friend',"uid='".$uid."' and fuid='".$fid."'");//echo $del;
		if($del){
			echo "成功删除好友";	
		}else{
			echo "网络繁忙";	
		}	
	}
	
	// 我的动态 - 关注/大厅/广播
	function my_dynamic()
	{
		$uid = $_SESSION['u_uidss'];//echo $uid;die;
		$re = DS('publics.get_info','','user_follow ',"uid='".$uid."'");
		
		TPL :: assign('re',$re);
		TPL :: display('bbs/my_dynamic');
	}
	
	// 我的帖子
	function my_submit()
	{	
		/*
			接收参数：type	string
				thread 主题			
				reply 回复   		(帖子)
				postcomment 点评		(对帖子的回复)
									
			返回值：array 二维数组
		*/
		$uid = $_SESSION['u_uidss']; //echo $uid;
		$forumId = V('r:forum_id');
		$status  = V('r:status');
		$cid = V('r:cid');
		//echo $cid;
		if(V('r:forum_id') != NULL and V('r:forum_id')!= 0){
			$where = ' and fid='.V('r:forum_id');
			}
		if(V('r:forum_id') != NULL and V('r:forum_id')!= 0){
			$where1 = ' and pid='.V('r:forum_id');
			}	
			if($cid == 1 || $cid == 0){
				$re = DS('publics.get_info','','bbs_post',"fid != 0 and authorid=".$uid.$where.' order by dateline desc limit 0,20');
				TPL :: assign('status',$status);
				TPL :: assign('re',$re);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit1');
			}if($cid == 2){
				//echo 123;
				$re = DS('publics.get_info','','bbs_postcomment',"pid != 0 and  poststatus != 1 and authorid=".$uid.$where1.' order by dateline desc limit 0,20');
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit');
			}if($cid == 3){
				$re = DS('publics.get_info','','bbs_postcomment',"uid='".$uid."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit3');
			}
		/*if(!empty($forumId)){
			echo 1;
			if($cid == 1 || $cid == 0){
				$re = DS('publics.get_info','','bbs_post',"authorid=".$uid.$where.' order by dateline desc');
				TPL :: assign('status',$status);
				TPL :: assign('re',$re);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit1');
			}if($cid == 2){
				echo 1231;
				$re = DS('publics.get_info','','bbs_postcomment',"authorid=".$uid.$where.' order by dateline desc');
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit');
			}if($cid == 3){
				$re = DS('publics.get_info','','bbs_postcomment',"uid='".$uid."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit3');
			}
		}else if(!empty($forumId) && empty($status)){
			if($cid == 1 || $cid == 0){
				$re = DS('publics.get_info','','bbs_post',"authorid='".$uid."' and fid='".$forumId."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit1');
			}if($cid == 2){
				$re = DS('publics.get_info','','bbs_postcomment',"uid='".$uid."' and fid='".$forumId."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit');
			}if($cid == 3){
				$re = DS('publics.get_info','','bbs_postcomment',"uid='".$uid."' and fid='".$forumId."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit3');
			}	
		}else if(empty($forumId) && !empty($status)){
			
			if($cid == 1 || $cid == 0){
				$re = DS('publics.get_info','','bbs_post',"authorid='".$uid."' and status='".$status."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit1');
			}if($cid == 2){
				echo 'asd';
				$re = DS('publics.get_info','','bbs_postcomment',"uid='".$uid.$where1."' and status='".$status."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit');
			}if($cid == 3){
				$re = DS('publics.get_info','','bbs_postcomment',"uid='".$uid."' and status='".$status."'");
				TPL :: assign('re',$re);
				TPL :: assign('status',$status);
				TPL :: assign('fffid',$forumId);
				TPL :: display('bbs/my_submit3');
			}
		}*/
	}
	
	function delpost(){
		$pid	=	V("r:pid");
		if($_SESSION['xr_id'] == ''){
			exit;	
		}else{
			$re = DS("publics._del","","bbs_post","pid=".$pid);
			if($re){
				exit('{"status":1,"info":"成功删除"}');	
			} else{
				exit('{"status":2,"info":"网络繁忙"}');		
			}
		}
	}
	// 我的收藏
	function my_favorite()
	{
		/*
			接收参数：null		
			返回值：array 二维数组
		*/
		$uid = $_SESSION['u_uidss'];
		$re = DS('publics.get_info','','user_favorite',"uid='".$uid."'");
		TPL :: assign('re',$re);
		TPL :: display('bbs/my_favorite');
	}
	
	// 我的关系 - 收听/听众
	function my_follow()
	{
		/*
			接收参数：type	string 
			following 收听	 follower 听众  
			uid  int  没有默认为当前用户	
			返回值：array 二维数组
		*/
		
			$re = DS('publics.get_info','','user_follow',"uid='" . $uid . "'");//var_dump($re);
			TPL :: assign('re',$re);
			TPL :: display('bbs/my_follow');
		
	}
	
	// 我的关系 - 好友
	function my_friend()
	{
		/*
			接收参数：keyword string 搜索的昵称或备注						
			返回值：array 二维数组
		*/
		$gid = V('r:gid');
		$uid = $_SESSION['u_uidss'];
		if(empty($gid)){
			if(!empty($uid))
			{
				$re = DS('publics.get_info','','user_friend',"uid='".$uid."'");
				TPL :: assign('re',$re);
				TPL :: assign('ggid',$gid);
				TPL :: display('bbs/my_friend');
			}
		}else{
			if(!empty($uid))
			{
				$re = DS('publics.get_info','','user_friend',"uid='".$uid."' and gid='".$gid."'");
				TPL :: assign('ggid',$gid);
				TPL :: assign('re',$re);
				TPL :: display('bbs/my_friend');
			}
		}
	}
	
	// 我的关系 - 搜索
	function my_search()
	{
		/*
			接收参数：keyword string 搜索的昵称或备注						
			返回值：array 二维数组
		*/
		TPL :: display('bbs/my_search');
	}
	
	// 修改收听备注(ajax)
	function updBkname()
	{
		/*if(empty($_POST)){
			exit;
		}
			接收参数：type		string  	修改对象 属于 好友friend/关注follow
					followuid 	int 		被修改用户ID
					bkname		string		用户备注
									
			返回值：int		1/0
				成功 exit( '{"status":1,"info":"关注成功！"}' );
				失败 exit( '{"status":0,"info":"网络繁忙，请稍后再试！"}' );
		*/
		$uid    = $_SESSION['u_uidss'];//echo $uid."<br>";
		$fid    = V('r:fid');//echo $fid."<br>";
		$bkname = V('r:bkname');//echo $bkname;
		$ure = DS('publics._get','','users',"id='".$uid."'");//var_dump($ure);
		$fre = DS('publics._get','','users',"id='".$fid."'");//var_dump($fre);
		$data['uid']       = $uid;
		$data['followuid'] = $fid;
		$data['username']  = $ure[0]['username'];
		$data['fusername'] = $fre[0]['username'];
		$data['bkname']    = $bkname;
		$data['dateline']  = time();
		$data1[0] = "uid";
		$data1[1] = "fid";
		$data2[0] = $uid;
		$data2[1] = $fid;
		$bkre = DS('publics._update','',$data,'user_follow','uid',"'$uid' and followuid ='$fid'");//var_dump($bkre);
		if(!empty($bkre)){
			exit( '{"status":1,"info":"修改成功！"}');
		}else{
			exit( '{"status":0,"info":"网络繁忙，请稍后再试！"}');
		}
	}
	
	//修改好友备注
	function updBKFname(){
		$uid              = $_SESSION['u_uidss'];//echo $uid;
		$fid              = V('g:fid');//echo $fid;
		$data['note']     = V('g:name');//echo $note;
		$data['dateline'] = time();
		$upd  = DS('publics._update','',$data,'user_friend','uid',"'$uid' and fuid = '$fid'");
		//echo $upd;
		if($upd){
			echo "更改成功";	
		}else{
			echo "网络繁忙";	
		} 	
	}
	
	// 我的消息 - 个人/系统
	function my_msgs()
	{
		/*
			接收参数：filter string privatepm/announcepm 个人/系统
			
		*/
		$uid = $_SESSION['u_uidss'];
		$res =DS('publics.page_list','',15,"(uid='$uid' or followuid = '$uid') and is_de1 != '".$_SESSION['u_uidss']."' and is_de12 != '".$_SESSION['u_uidss']."'",'sendTime desc',V('g'),'user_msgs');
		//$res = DS('publics._get','','user_msgs',"uid='$uid' or followuid = '$uid' order by sendTime desc limit 0,20");//var_dump($re); 
		TPL :: assign('res',$res);
		TPL :: display('bbs/my_msgs');
	}
	
	// 我的消息 - 提醒
	function my_notice()
	{
		/*
			接收参数：filter string privatepm/announcepm 个人/系统
			
		*/
		$uid = $_SESSION['u_uidss'];
		$re = DS('publics._get','','user_notification',"uid='".$uid."'");
		TPL :: assign('re',$re);
		TPL :: display('bbs/my_notice');
	}
	
	// 我的消息 - 发送消息
	function send_msg()
	{
		$uid = $_SESSION['u_uidss'];
		TPL :: display('bbs/send_msg');
	}
	
	// 我的消息 - 发送消息
	function send_msg_finish()
	{
		/*
			接收参数：uid int 用户id
					uname string 接收人
					content string 信息内容	
			1. 返回值：一维数组
				array(
					'status' => 0/1/2  成功/失败/权限
				);
		*/
		$re  = DS('publics._get','','users',"username='".V('g:username')."'");
		$uid 			   = $_SESSION['u_uidss'];//echo $uid;die;
		$data['followuid'] = $re[0]['id'];
		$data['fusername'] = V('g:username');//echo $data['fusername'];die;
		$data['message']   = V('g:message');//echo $data['message'];die; 
		$ire = DS('publics._get','','users',"id='".$uid."'");
		$data['uid']       = $uid;
		$data['username']  = $ire[0]['username'];
		$data['sendTime']  = time();
		$re  = DS('publics._get','','users',"username='".$data['fusername']."'");//var_dump($re);
		//判断收件人是否存在
		
		
		
		
		if(empty($re)){
			echo "收件人不存在";
		}else{
			
			
		$remin['uid'] = $_SESSION['u_uidss'];
		$remin['followid'] = $re[0]['id'];
		$remin['information']   = V('g:message');
		$remin['status']  	= 1;
		$remin['is_read']  	= 0;
		$remin['addtime'] 	= time();
        DS('publics._save','',$remin,'remind');
		
			
			//判断是否是好友
			//$re1 = DS('publics._get','','user_friend',"fusername='".$username."'");//var_dump($re1);
			/*if(empty($re1)){
				echo "该用户不是您好友";
			}else{*/
				//var_dump($re5);die;
				$re2 = DS('publics._save','',$data,'user_msgs');
				//判断是否保存成功
				if($re2 != ""){
					echo "发送成功";
				}else{
					echo "网络繁忙";
				}	
			/*}*/
		}
	}
	
	
	function send_msg_finish22()
	{
		/*
			接收参数：uid int 用户id
					uname string 接收人
					content string 信息内容	
			1. 返回值：一维数组
				array(
					'status' => 0/1/2  成功/失败/权限
				);
		*/
		
		
		
		
		
		$re  = DS('publics._get','','users',"username='".V('g:username')."'");
		$uid 			   = $_SESSION['u_uidss'];//echo $uid;die;
		$data['followuid'] = $re[0]['id'];
		$data['fusername'] = V('g:username');//echo $data['fusername'];die;
		$data['message']   = V('g:message');//echo $data['message'];die; 
		$ire = DS('publics._get','','users',"id='".$uid."'");
		$data['uid']       = $uid;
		$data['username']  = $ire[0]['username'];
		$data['sendTime']  = time();
	    $re2 = DS('publics._save','',$data,'user_msgs');
		
		
		
		
		
		if($re2 != ""){
					echo "发送成功";
		}else{
					echo "网络繁忙";
		}	
			
	}
	
	
	//回复信息
	function reply_msgs(){
		$uid = $_SESSION['u_uidss'];//echo $uid."<br>";
		$fid = V('r:fid');//echo $fid."<br>";
		TPL :: display('bbs/reply_msgs');	
	}
	//删除信息
	function del_msgs(){
		$uid = $_SESSION['u_uidss'];//echo $uid;
		$id  = V('r:id');//echo $id;die;
		$dre = DS('publics._del','','user_msgs',"id='$id'");
		//var_dump($dre);
		
		if($dre == true){
			
			echo "成功删除";
		}else{
			
			echo "网络繁忙";
		}	
	}
	
	// 用户的广播
	function user_broadcast()
	{
		/*
			接收参数：uid int 用户id
			1. 用户信息帖子数 收听数 听众					
				返回值：一维数组
			2. 用户的动态
				返回值：二维数组
		*/
		$id = V('r:id');
		if(empty($id)){
			TPL :: display('bbs/user_broadcast');
		}else{
			TPL :: assign('id',$id);
			TPL :: display('bbs/user_broadcast');	
		}
	}
	//
	function user_thread1(){
		echo "1";
	}
	
	// 用户的主题
	function user_thread()
	{	
		/*
			接收参数：uid int 用户id
					type string thread/reply 发表/回复
			1. 用户主题 type=thread		
				返回值：二维数组
			2. 用户回复 type=reply
				返回值：二维数组
		*/
		$uuid = V('r:id');
		$typeid = V('r:typeid');
		if($typeid == 2){
			if(empty($uuid)){
				$uuid = $_SESSION['u_uidss'];
				$typeid = V('r:typeid');
				$thread1 = DS('publics._get','','bbs_postcomment',"authorid='".$uuid."'");
				TPL :: assign('thread1',$thread1);
				TPL :: assign('typeid',$typeid);
				TPL :: display('bbs/user_thread');
			}else{
				$thread1 = DS('publics._get','','bbs_postcomment',"authorid='".$uuid."'");
				TPL :: assign('thread1',$thread1);
				TPL :: assign('typeid',$typeid);
				TPL :: assign('uuid',$uuid);
				TPL :: display('bbs/user_thread');	
			}
		}else{
			if(empty($uuid)){
				$uuid = $_SESSION['u_uidss'];
				$thread1 = DS('publics._get','','bbs_post',"authorid='".$uuid."'");
				TPL :: assign('thread1',$thread1);
				TPL :: display('bbs/user_thread');
			}else{
				$thread1 = DS('publics._get','','bbs_post',"authorid='".$uuid."'");
				TPL :: assign('thread1',$thread1);
				TPL :: assign('uuid',$uuid);
				TPL :: display('bbs/user_thread');	
			}
		}
	}
	
	// 用户的个人资料
	function user_info()
	{	
		/*
			接收参数：uid int 用户id
			1. 基本资料					
				返回值：一维数组
			2. 论坛统计
				返回值：二维数组
			3. 活跃概况
				返回值：二维数组
			4. 统计信息
				返回值：二维数组
		*/
		$uuid = V('r:id');
		if(empty($uuid)){
			$uuid = $_SESSION['u_uidss'];
			$info = DS('publics._get','','user_count',"uid='$uuid'");
			TPL :: assign('info',$info);
			TPL :: display('bbs/user_info');	
		}else{
			$info = DS('publics._get','','user_count',"uid='$uuid'");
			TPL :: assign('info',$info);
			TPL :: display('bbs/user_info');	
		}
	} 
	
	//发帖页
	function send_submit()
	{
		TPL :: display('bbs/send_submit');	
	}
	
	//发帖-发送帖子
	function send_submit_finish(){
		$uid = $_SESSION['u_uidss'];//echo $uid."<br>";
		if(V('r:subject') != NULL and V('r:fid') != NULL and V('r:fid') != 0){
			$tiems = time();
			$data['authorid'] = $uid;//echo $uid;
			$data['fid']      = V('r:fid');//echo $data['fid'];
			$data['subject']  = V('r:subject');//echo $data['subject'];
			$data['content']  = V('r:message');//echo $data['message'];
			$ure = DS('publics._get','','users',"id='$uid'");
			//var_dump($ure);
			$data['author']   = $ure[0]['realname'];
			$data['dateline'] = $tiems;
			//判断是否发表成功
			$sre = DS('publics._save','',$data,'bbs_post');//var_dump($sre);
			
			
			
		}else{
		$data['authorid'] = $uid;//echo $uid;
		//$data['fid']      = V('r:forumlist');//echo $data['fid'];
		//$data['subject']  = V('r:subject');//echo $data['subject'];
		$data['comment']  = V('r:message');//echo $data['message'];
		$ure = DS('publics._get','','users',"id='$uid'");
		//var_dump($ure);
		$data['author']   = $ure[0]['realname'];
		$data['classid']   = 1;
		$data['dateline'] = time();
		//判断是否发表成功
		$sre = DS('publics._save','',$data,'bbs_postcomment');//var_dump($sre);
		}
		if($sre != ""){
			echo "发表成功";	
		}else{
			echo "网络繁忙";	
		}
	}	
	
	
	
	function send_submit_finish1(){
		    $uid = $_SESSION['u_uidss'];//echo $uid."<br>";
			$tiems = time();
			$data['authorid'] = $uid;//echo $uid;
			$data['fid']      = V('r:fid');//echo $data['fid'];
			$data['subject']  = V('r:subject');//echo $data['subject'];
			$data['content']  = V('r:message');//echo $data['message'];
			$ure = DS('publics._get','','users',"id='$uid'");
			//var_dump($ure);
			$data['author']   = $ure[0]['realname'];
			$data['dateline'] = $tiems;
			//判断是否发表成功
			$sre = DS('publics._save','',$data,'bbs_post');//var_dump($sre);
			
			
			$ididss = DS('publics._get','','bbs_post',"fid =".V('r:fid') . ' and authorid = '.$uid
		  .' and dateline='.$tiems );
		 
		$comment['pid'] 	= V('r:fid');
		$comment['authorid'] 	= $uid;
		$comment['dateline'] = $tiems;
		$comment['poststatus'] = 1;
		$comment['tid']   = $ididss[0]['pid'];
		
        DS('publics._save','',$comment,'bbs_postcomment');
			if($sre != ""){
			echo "发表成功";	
		}else{
			echo "网络繁忙";	
		}
			
	
		
	}	
	
	//显示帖子页
	function show_submit()
	{
		TPL :: display('bbs/show_submit');	
	}	
	
	//显示帖子页
	function reset_submit()
	{
		TPL :: display('bbs/reset_submit');	
	}	
	function yzz()
	{
		
		echo $_SESSION['verify_code'];
	}
	
	// 添加 | 取消特别收听(ajax)
	//function updBkname()
	//{
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：followuid	int  	被关注用户ID
					status		int    	0/1
			表名 : xsmart_user_follow 用户关注关系表
									
			返回值：int		1/0   操作成功/失败
		*/
	//}
	
	//打招呼
	function send_a_poke(){
		$fid   = V('r:fid');echo $fid;
		$note  = V('r:note');echo $note;	
	}
	
	//判断好友分组
	function grouped(){
		$fid = V('r:fid');//echo $fid;
		$gid = V('r:gid');echo $gid;	
	}
	
	//设置好友分组
	function setgroup(){
		$uid    = $_SESSION['u_uidss'];//echo $uid;
		$fid    = V('r:fid');//echo $fid;
		$gid    = V('r:groupid');//echo $gid;
		$data['gid'] = $gid;
		$test   = DS('publics._get','','user_friend',"uid='".$uid."' and fuid='".$fid."'");
		if($test[0]['gid'] == $gid){
			echo "您没有选择更改分组";	
		}else{
			$change = DS('publics._update','',$data,'user_friend','uid',$uid." and fuid ='$fid'"); 
			if($change){
				echo "1";	
			}else{
				echo "网络繁忙";
			}
		}	
	}
	
	//设置好友分组2
	function remove_group(){
		$gid = V('r:gid');
		$fid = V('r:fid');
		$data['gid'] = $gid;
		$arr = V('r:gasarr');//var_dump($arr);
		$brr = explode(',',$arr);//var_dump($brr);
		$uid = $_SESSION['u_uidss'];
		if(!empty($brr)){
			foreach($brr as $bk=>$bv){
				$upd[] = DS('publics._update','',$data,'user_friend','uid',$uid." and fuid='".$bv."'");	
			}
			if(!empty($upd)){
				echo "更改成功";
			}else{
				echo "没有选择更改";	
			}
		}else{
			echo "网络繁忙";	
		}	
	}
/************************************************************************************************/

}