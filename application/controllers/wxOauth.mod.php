<?php
/**************************************************
*  Created:  2015-06-22
*
*  微信第三方登录
*
*  @Xsmart (C)2015-2099 Nit Inc.
*  @Author Chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class wxOauth_mod
{
	// 微信登录
	function login($flag = true){
		if($flag)
		
		$_SESSION['refererUrl'] = $_SERVER['HTTP_REFERER'];
		$_SESSION['wxState'] = rand(1000,9999);
		header('location:https://open.weixin.qq.com/connect/qrconnect?appid='.WX_APPID.'&redirect_uri='.urlencode('http://'.$_SERVER['SERVER_NAME'].'/index.php?m=wxOauth.callback').'&response_type=code&scope=snsapi_login&state='.$_SESSION['wxState'].'#wechat_redirect');
	}
	
	// 回调地址 - 获取凭证
	function callback(){
		if($_SESSION['wxState'] != V('g:state')){
			exit;
		}
		if(V('g:code','') == ''){
			$this->login(false);
		}
		$rs = json_decode(file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.WX_APPID.'&secret='.WX_APPSECRET.'&code='.V('g:code').'&grant_type=authorization_code'),true);
		$rs = json_decode(file_get_contents('https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.WX_APPID.'&grant_type=refresh_token&refresh_token='.$rs['refresh_token']),true);
		$_SESSION['WX_access_token']	= $rs['access_token'];
		$_SESSION['WX_openid'] 			= $rs['openid'];
		header('Location: '.URL('wxOauth.doing'));
	}
	
	// 业务处理...
	function doing(){
		// 获取用户信息
		$arr = json_decode(file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$_SESSION['WX_access_token'].'&openid='.$_SESSION['WX_openid']),true);
		
		$result	= DS("publics._get","","users","WopenId='".$arr['openid']."'");	 //var_dump($result);die;
		if(empty($result)){
			$data['WopenId'] = $arr['openid'];
			$data['unionid'] = $arr['unionid'];
			$data['realname']= $arr['nickname'];
			$data['logo']	 = $arr['headimgurl'];
			$re	=	DS("publics._save","",$data,"users");
			if($re){
				$_SESSION['xr_id'] = $re;
			}
		}else{
			$_SESSION['xr_id']	=	$result[0]['id'];	
		}		
		//var_dump($arr);die;
		// 跳转登录前页面
		header('Location: '.$_SESSION['refererUrl']);
	}
	
}
