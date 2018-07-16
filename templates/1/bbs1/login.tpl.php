<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="欢迎登录和注册魅族Flyme账户，您可以体验手机云服务功能，包括：在线下载应用，同步手机数据和查找手机等，让您的手机管理更加智能。" />
    <!--<link href="/css/bbscss/Validform.css" type="text/css" rel="Stylesheet"/>-->
    <meta name="keywords" content="魅族  meizu 登录flyme 云服务  查找手机  充值账户  MX M9 MX2 MX3" />
	<meta content="width=1080" name="viewport"/>
    <script charset="utf-8" type="text/javascript" src="js/bbsjs/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/bbsjs/Validform_Datatype.js"></script>
    <script type="text/javascript" src="js/bbsjs/Validform_v5.3.2_ncr_min.js"></script>
	<title>登录Flyme 账户</title>
	<link href="/css/bbscss/base.css" type="text/css" rel="Stylesheet"/>
	<link href="/css/bbscss/login.css" type="text/css" rel="Stylesheet"/>
</head>
<body>
	<div id='content' class="content">
        <div class=ucSimpleHeader id="header">
            <a href="#" class='meizuLogo'>
            	<i class='i_icon'><img style="margin-top:-10px"src="images/base.png"></i>
			</a>
            <div id="trigger">
                <a href="<?= URL('login')?>" id="toLogin" class='linkAGray'>登录</a>
                <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                <a href="<?= URL('login.register')?>" id="toRegister" class='linkAGray'>注册</a>
            </div>
        </div>
		<form id="mainForm" method="post" action="<?= URL('login.checkLogin')?>"> 
			<div class='normalInput'>
				<input type="text" value="" name="account" id="account" maxlength='32' datatype="*2-11"  placeholder='手机号/ Flyme 账户名' errormsg="账号名格式不正确!" />
			</div>
			<div class='normalInput'>
				<input type="password" value="" name="password" id="password" maxlength='16' datatype="*" placeholder='密码' autocomplete='off'errormsg="密码范围在6~15位之间!" /> 
              </div>
			<div class='rememberField'>
         	<span><input name="remember" id="remember" type="checkbox" value="1"/></span>
				<label for="remember" tabindex="0">记住登录状态</label>
				<!--<a id="/forgetpwd" href="/forgetpwd" class='linkABlue'>忘记密码?</a>-->
			</div>
			<a id="login" class='fullBtnBlue'>登录</a>
            <a id="login1" class="fullBtnBlue" style="background-color:#B1B1B1;display:none">登录中...</a>
			<div class='transferField'>
				<a name="btnArea" id="transfer" href="/bbsUserToFlyme" class='linkAGray'>社区账户转换为 Flyme 账户</a>
			</div>
		</form>
	</div>	
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?= TPL :: display('bbs/User_footer');?>
<div id="wechatPic"></div>
<script>
	$("#mainForm").Validform({
	btnSubmit:"#login", 
	tiptype:4, 
	postonce:true,
	ajaxPost:true,
	beforeSubmit:function(curform){
		document.getElementById('login').style.display="none";  
		document.getElementById('login1').style.display="block";		
	},
	callback:function(data){
		if(data.status == 'y')
		{
			window.location.href="<?= URL('bbs.index');?>"; 
		}else{
			alert(data.info);
			document.getElementById('login1').style.display="none";
			document.getElementById('login').style.display="block";
		}
	}
});
</script>
</body>
</html>