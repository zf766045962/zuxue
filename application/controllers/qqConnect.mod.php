<?php
/**************************************************
*  Created:  2015-06-18
*
*  QQ第三方登录
*
*  @Xsmart (C)2015-2099 Nit Inc.
*  @Author Chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class qqConnect_mod
{
	// QQ登录
	function login(){
		$_SESSION['refererUrl'] = $_SERVER['HTTP_REFERER'];
		$qc = APP :: N('qqConnect/QC');
		$qc->qq_login();
	}
	
	// 回调地址
	function callback(){
		$qc = APP :: N('qqConnect/QC');
		$qc->qq_callback();
		$qc->get_openid();
		// 跳转处理地址
		header('Location: '.URL('qqConnect.doing'));
	}
	
	// 业务处理...
	function doing(){
		
		$qc 	= APP :: N('qqConnect/QC');
		
		// 获取用户信息
		$openId	= $qc->get_openid();
		$arr 	= $qc->get_user_info();//var_dump($arr);
		
		$result	= DS("publics._get","","users","QopenId='".$openId."'");	 //var_dump($result);die;
		if(empty($result)){
			$data['QopenId'] = $openId;
			$data['realname']= $arr['nickname'];
			$data['logo']	 = $arr['figureurl_qq_1'];
			$re	=	DS("publics._save","",$data,"users");
			if($re){
				$_SESSION['xr_id'] = $re;
			}
		}else{
			$_SESSION['xr_id']	=	$result[0]['id'];	
		}		
		// 跳转登录前页面
		header('Location: '.$_SESSION['refererUrl']);
	}
	
}
