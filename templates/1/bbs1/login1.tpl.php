<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="欢迎登录和注册魅族Flyme账户，您可以体验手机云服务功能，包括：在线下载应用，同步手机数据和查找手机等，让您的手机管理更加智能。" />
	<meta name="keywords" content="魅族  meizu 登录flyme 云服务  查找手机  充值账户  MX M9 MX2 MX3" />
	<meta content="width=1080" name="viewport"/>
	<title>登录Flyme 账户</title>
	<script type="text/javascript">
		var cdn = 'https://https-res.meizu.com';
	</script>
	<link href="/css/bbscss/base.css" type="text/css" rel="Stylesheet"/>
	<link href="/css/bbscss/login.css" type="text/css" rel="Stylesheet"/>
</head>
<body>
	<div id='content' class="content">
		
<div class=ucSimpleHeader id="header">
	<a href="#" class='meizuLogo'><i class='i_icon'><img style="margin-top:-10px"src="images/base.png"></i></a>
	<div id="trigger">
		<a href="<?= URL('bbsUser.login')?>" id="toLogin" class='linkAGray'>登录</a>
		<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
		<a href="<?= URL('bbsUser.register')?>" id="toRegister" class='linkAGray'>注册</a>
    </div>
</div>
		<form id="mainForm" enctype="application/x-www-form-urlencoded">
			<div class='normalInput'>
				<input type="text" value="" name="account" id="account" maxlength='32' placeholder='手机号/ Flyme 账户名'  autocomplete='off'/>
			</div>
			<div class='normalInput'>
				<input type="password" value="" name="password" id="password" maxlength='16' placeholder='密码' autocomplete='off'/> 
			</div>
			<div id='kapkeyWrap' class='lineWrap' style='display:none'>
				<div class='normalInput'>
					<input type="text" value="" name="kapkey" id="kapkey" class='kapkey' maxlength='6' autocomplete='off'/>
					<img id="imgKey" class='pointer' title="点击可刷新验证码"/>
				</div>
			</div>
			<input type="hidden" name="appuri" value="http://bbs.meizu.cn/logging.php" id="appuri" /> 
			<input type="hidden" name="useruri" value="http://bbs.meizu.cn/" id="useruri" /> 
			<input type="hidden" name="service" value="bbs" id="service" /> 
			<input type="hidden" name="sid" value="" id="sid" />
			<div class='rememberField'>
			 <span><input name="remember" id="remember" type="checkbox" value="1"/></span>
				<label for="remember" tabindex="0">记住登录状态</label>
				<a id="/forgetpwd" href="/forgetpwd" class='linkABlue'>忘记密码?</a>
			</div>
			<a id="login" class='fullBtnBlue'>登录</a>
			<div class='transferField'>
				<a name="btnArea" id="transfer" href="/bbsUserToFlyme" class='linkAGray'>社区账户转换为 Flyme 账户</a>
			</div>
		</form>
	</div>	
	




<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<div id='flymeFooter' class='footerWrap'>
	<div class='footerInner'>
		<div class='footer-layer1'>
			<div class='footer-innerLink'>
				<a href="#" target="_blank" title="关于魅族">关于魅族</a>
				<img class="foot-line" src="images/space.gif">
				<a href="http://hr.meizu.com" target="_blank" title="工作机会">工作机会</a>
				<img class="foot-line" src="images/space.gif">
				<a href="#" target="_blank" title="联系我们">联系我们</a>
				<img class="foot-line" src="images/space.gif">
				<a href="#" target="_blank" title="法律声明">法律声明</a>
				<img class="foot-line" src="#">
				<a href="javascript:void(0);" id="globalName" class="footer-language" title="简体中文">简体中文&nbsp;&nbsp;&nbsp;</a>
			</div>
			<div class='footer-service'>
				<span class='service-label'>客服热线</span>
				<span class='service-num'>400-788-3333</span>
				<a id='service-online' class='service-online' href="javascript:void(0);" title="在线客服">在线客服</a>
			</div>
			<div class='footer-outerLink'>
				<a class='footer-sinaMblog' href="http://weibo.com/meizumobile" target="_blank"><i class='i_icon'></i></a>
				<a class='footer-tencentMblog' href="http://t.qq.com/meizu_tech" target="_blank"><i class='i_icon'></i></a>
				<a id='footer-weChat' class='footer-weChat' href="javascript:void(0);" target="_blank"><i class='i_icon'></i></a>
				<a class='footer-qzone' href="http://user.qzone.qq.com/2762957059" target="_blank"><i class='i_icon'></i></a>
			</div>
			<div id="globalContainer" class="footer-language_menu">
				<a href="http://www.meizu.cn" title="简体中文" class="checked">简体中文</a>
				<a href="http://www.meizu.com.hk" title="繁體中文" class="ClobalItem">繁體中文</a>
				<a href="http://en.meizu.com" title="English" class="ClobalItem">English</a>
				<a href="http://ru.meizu.com" title="Русский" class="ClobalItem">Русский</a>
				<a href="http://il.meizu.com" title="עברית" class="ClobalItem" style="border-width:0px;">עברית</a>
			</div>
		</div>
		<div class='clear'></div>
		<div id='flymeCopyright' class="copyrightWrap">
			<div class="copyrightInner">
				<span>©2014 Meizu Telecom Equipment Co., Ltd. All rights reserved.</span>
				<a href="http://www.miitbeian.gov.cn/" class='linkAGray' target="_blank">备案号: 粤ICP备13003602号-4</a> 
				<a href="http://www.res.meizu.com/resources/www/images/icp2.jpg" class='linkAGray' target="_blank">经营许可证编号: 粤B2-20130198</a>
				<a target="_blank" href="http://www2.res.meizu.com/zh_cn/images/common/com_licence.jpg" hidefocus="true" class="linkAGray">营业执照</a>
			</div>
		</div>
	</div>
</div>
<div id="wechatPic"></div>

	<script charset="utf-8" type="text/javascript" src="js/bbsjs/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/bbsjs/jquery.form.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/jquery.validate.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/utils.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/flyme.elements.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/base.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/login.js" charset="utf-8"></script>
	</body>
</html>