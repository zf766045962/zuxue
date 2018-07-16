<?php
/**
 * @file			get_reg_url_func.php
 * @CopyRight		(C)2006-2012 framework Inc.
 * @Project			Xsmart
 * @Author			@@
 * @Create Date:	2011-10-2

 * @Brief			获取注册url函数-Xsmart
 */

function get_reg_url()
{

	$token = DR('Xsmart/xwb.getRequestToken');
	$token = $token['rst'];
	USER::setOAuthKey($token, false);

	$callbackOpt = 'cb=login';
	///　登录后的跳转URL
	$loginCallBack = V('g:loginCallBack', '');
	if ($loginCallBack) {
		$loginCallBack = '&loginCallBack='.urlencode($loginCallBack);
	}
	
	$lang = '';
	switch(APP::getLang()) {
		case 'zh_cn':
			$lang = 'zh-Hans';
			break;
		case 'zh_tw':
			$lang = 'zh-Hant';
			break;
		case 'en':
			$lang = 'en';
			break;
	}
	$oauthCbUrl = W_BASE_HTTP.URL('account.oauthCallback', $callbackOpt).$loginCallBack;

	$params_str = 'oauth_token='.urlencode($token['oauth_token']).'&oauth_callback='.urlencode($oauthCbUrl).'&lang='.$lang;

	$url = WEIBO_API_URL.'oauth/register?'.$params_str;

	return $url;
}
