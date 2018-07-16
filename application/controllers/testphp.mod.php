<?php
/**************************************************
*  Created:  2014-12-07
*
*  testphp
*
*  @Xsmart (C)2006-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class testphp_mod
{
	/*function default_action(){
		
		$rs = F('publics.sendTemplateSMS','15568822736',array('陈','0123456'),15534,'8a48b5514bfc2b4a014bfc399fbf0021',1);
		var_dump($rs);
	}*/
	
	function default_action(){
		$sender = APP :: N('httpSend');
		$strReg = "101100-WEB-HUAX-332425";
		$strPwd = "EMALMTUX";
		$strSourceAdd = "";// 子通道号，可为空（预留参数一般为空）
		$strPhone = "13311131777";					// 手机号码，多个手机号用半角逗号分开，最多1000个
		$strContent = "您好，您的手机动态验证码为：8888 。该码10分钟内有效且只能输入1次，若10分钟内未输入，需重新获取。【学啊网】";
		$strSmsUrl = "http://www.stongnet.com/sdkhttp/sendsms.aspx";
		$strSmsParam = "reg=" . $strReg . "&pwd=" . $strPwd . "&sourceadd=" . $strSourceAdd . "&phone=" . $strPhone . "&content=" . $strContent;
		$strRes = $sender->postSend($strSmsUrl,$strSmsParam);
		echo $strRes;
	}
}