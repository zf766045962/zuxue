<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="欢迎登录和注册魅族Flyme账户，您可以体验手机云服务功能，包括：在线下载应用，同步手机数据和查找手机等，让您的手机管理更加智能。" />
<meta name="keywords" content="魅族  meizu 登录flyme 云服务  查找手机  充值账户  MX M9 MX2" />
<meta content="width=1080" name="viewport"/>
<title>注册Flyme账户</title>
<script charset="utf-8" type="text/javascript" src="js/bbsjs/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/bbsjs/Validform_Datatype.js"></script>
<script type="text/javascript" src="js/bbsjs/Validform_v5.3.2_ncr_min.js"></script>
<!--<link href="/css/bbscss/Validform.css" type="text/css" rel="Stylesheet"/>-->
<link href="/css/bbscss/base.css" type="text/css" rel="Stylesheet"/>
<link href="/css/bbscss/nameRegister.css" type="text/css" rel="Stylesheet"/>
<script>
	window.onload=function(){
		var oBtn = document.getElementById('pwdBtn');
		var	oPass = document.getElementById('password');
		oBtn.onclick=function(){
			if(oPass.type == "password"){
				oPass.type="text";	
			}else if(oPass.type == "text"){
				oPass.type="password";
			};
		};
	};
</script>
</head>
<body> 
<div id='content' class="content">	
    <div class=ucSimpleHeader id="header">
        <a href="<?= URL('default')?>" class='meizuLogo'><i class='i_icon'><img style="margin-top:-10px"src="images/base.png"></i></a>
        <div id="trigger">
            <a href="<?= URL('login')?>" id="toLogin" class='linkAGray'>登录</a>
            <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
            <a href="<?= URL('login.register')?>" id="toRegister" class='linkAGray'>注册</a>
        </div>
    </div>
	<div class='middle'>
        <form id="mainForm" method="post" action="<?= URL('login.checkRegister_name')?>">
            <div class="number">
                <a class="linkAGray" id="toTelRegister" href="<?= URL('login.register')?>">邮箱注册</a>
                <span class="register-line"></span>
                <a class="linkABlue" id="toNameRegister" href="<?= URL('login.registerName')?>">账户名注册</a>
            </div>
            <div class="normalInput">
                <input type="text" value="" name="username" id="username" class='username' datatype="s" errormsg="账号名格式不正确!" maxlength='32' placeholder='账户名' />
            </div>
            <div class='lineWrap normalInput'>
                <input type="text" value="" name="password" id="password" datatype="*6-15" maxlength="16" placeholder='密码' errormsg="密码范围在6~15位之间!" />
                <input type="password" value="" name="password1" id="password1" maxlength="16" style='display:none' />
                <a id="pwdBtn" class="pwdBtnShow noselect">
                    <i class="i_icon" id='s2' onClick="eye1()"></i>
                    <i class="i_icon" id='s1' style="display:none" onClick="eye2()"><img src="images/5.png"></i>
                </a>
                <script>
                    function eye1(){
                        document.getElementById('s1').style.display="block";
                        document.getElementById('s2').style.display="none";
                    }
                    function eye2(){
                        document.getElementById('s2').style.display="block";
                        document.getElementById('s1').style.display="none";
                    }		
                </script>   
                <div class='clear'></div>
            </div>
            <div class='lineWrap normalInput'>
                <input type="text" value="" name="email" id="email" placeholder='安全邮箱' maxlength='32' datatype="e" errormsg="邮箱格式不正确!" autocomplete='off'/>
            </div>
            <div class='clear'></div>
            <div id='kapkeyWrap' class='lineWrap' style='display:block'>
                <div class='normalInput'>
                    <input type="text" value="" name="kapkey" id="kapkey" placeholder='验证码' class='kapkey' maxlength='6' autocomplete='off'/>
                    <img width="69" height="23" onClick="refreshCc()" id="code_img" style="cursor:pointer;" src="/code/vdimgck.php" ><a onClick="refreshCc()" href="javascript:void(0);" style="font-size:12px">刷新</a>
                </div>
                <div class='clear'></div>
            </div>
            <div id='rememberField' class="rememberField">
                <span><input name="acceptFlyme" id="acceptFlyme" type="checkbox" value="1" checked='checked'></span>
                <label class='pointer' for="acceptFlyme" tabindex="0">我已阅读并接受</label>
                <a href="/ServiceAgreement.jsp" target='_blank' class="linkABlue">《Flyme服务协议条款》</a>
            </div>
            <span id='acceptError' class='otherError' style='display:none;'>请确认已阅读并同意Flyme服务协议条款</span>
            <a id="register" class="fullBtnBlue" >注册</a>
            <a id="register1" class="fullBtnBlue" style="background-color:#B1B1B1;display:none">注册中...</a>
        </form>
	</div>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<script>
	$("#mainForm").Validform({
	btnSubmit:"#register", 
	tiptype:4, 
	postonce:true,
	ajaxPost:true,
	beforeSubmit:function(curform){
		document.getElementById('register').style.display="none";  
		document.getElementById('register1').style.display="block";
	},
	callback:function(data){
		//alert(data.info+'----'+data.status);
		if(data.status == 'y')
		{	
			//alert(data.info);
			window.location.href="<?= URL('bbsUser.my_userManage')?>"; 
		}else{
			//$('#register').html('注册');
			alert(data.info);
			document.getElementById('register1').style.display="none";
			document.getElementById('register').style.display="block";
		}
	}
});
</script>
<script>
	function refreshCc() { 
		var ccImg = document.getElementById("code_img"); 
		if (ccImg) { 
			ccImg.src= ccImg.src + '?' +Math.random(); 
		} 
	}
</script>
<?= TPL :: display('User_footer');?>
<div id="wechatPic"></div>
	</body>
</html>
<?php  //var_dump($_SESSION)?>