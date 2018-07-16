<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="欢迎登录和注册魅族Flyme账户，您可以体验手机云服务功能，包括：在线下载应用，同步手机数据和查找手机等，让您的手机管理更加智能。" />
	<meta name="keywords" content="魅族  meizu 登录flyme 云服务  查找手机  充值账户  MX M9 MX2" />
	<meta content="width=1080" name="viewport"/>
	<title>注册Flyme账户</title>
    <script charset="utf-8" type="text/javascript" src="js/bbsjs/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/bbsjs/Validform_Datatype.js"></script>
    <script type="text/javascript" src="js/bbsjs/Validform_v5.3.2_ncr_min.js"></script>
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
    <link href="/css/bbscss/Validform.css" type="text/css" rel="Stylesheet"/>
	<link href="/css/bbscss/base.css" type="text/css" rel="Stylesheet"/>
	<link href="/css/bbscss/register.css" type="text/css" rel="Stylesheet"/>
</head>
<body>
	<div id='content' class="content">
		
<div class=ucSimpleHeader id="header">
	<a href="index.php" class='meizuLogo'><i class='i_icon'><img style="margin-top:-10px"src="images/base.png"></i></a>
	<div id="trigger">
		<a href="<?= URL('login')?>" id="toLogin" class='linkAGray'>登录</a>
		<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
		<a href="<?= URL('login.register')?>" id="toRegister" class='linkAGray'>注册</a>
    </div>
</div>
		<form id="mainForm" method="post" action="<?= URL('login.checkRegister')?>">
			<div class="number">
				<a class="linkABlue" id="toTelRegister" href="#">邮箱注册</a>
				<span class="register-line"></span>
				<a class="linkAGray" id="toNameRegister" href="<?= URL('login.registerName')?>">账户名注册</a>
			</div>
			<div class='normalInput'>
				<input type="text" value="" name="username" id="username" datatype="*2-11" errormsg="用户名长度在4~11位之间" placeholder='用户名' autocomplete='off'>
			</div>
            <div class='normalInput'>
				<input type="text" value="" name="email" id="email" datatype="e" errormsg="邮箱格式不正确!" placeholder='邮箱' autocomplete='off'>
			</div>
			<div class="normalInput">
				<input type="text" name="param" id="param" maxlength="6" placeholder='验证码' autocomplete='off'/>
				<span class="form-line"></span>
				<a id="getKey" href="javascript:void(0);" class="linkABlue" onclick="sendEmail()">获取验证码</a>
			</div>		
			<div class='normalInput'>
				<!--<input type="text" name="password" id="password" maxlength="16" value='' placeholder='密码' autocomplete="off" />-->
				<input type="text" name="password" id="password" datatype="*6-15" errormsg="密码范围在6~15位之间!" value='' placeholder='密码' autocomplete="off" />
				<a id="pwdBtn" class="pwdBtnShow noselect" onselectstart="return false">
					<i class="i_icon" id='s2' style="display:block"></i>
					<i class="i_icon" id='s1' style="display:none"><img src="images/5.png"></i>
				</a>
				<script>
					$("#s2").click(function(){
							$("#s1").attr({ style: "display: none", style: "display: block" });
							$("#s2").attr({ style: "display: block", style: "display: none" });
						$("#s1").click(function(){
							$("#s1").attr({ style: "display: block", style: "display: none" });
							$("#s2").attr({ style: "display: none", style: "display: block" });
						})
	
						})
				</script>
				
				<div class='clear'></div>
			</div>
			<div id='rememberField' class="rememberField">
				<span><input name="acceptFlyme" id="acceptFlyme" type="checkbox" value="1" checked='checked'></span>
				<label class='pointer' for="acceptFlyme" tabindex="0">我已阅读并接受</label>
				<a href="/ServiceAgreement.jsp" target='_blank' class="linkABlue">《Flyme服务协议条款》</a>
			</div>
			<span id='acceptError' class='otherError' style='display:none;'>请确认已阅读并同意Flyme服务协议条款</span>
			<a id="register" class="fullBtnBlue">注册</a>
            <a id="register1" class="fullBtnBlue" style="background-color:#B1B1B1;display:none">
                	注册中.....
                </a>
		</form>
	</div>
    <?php
    	//echo $_SESSION['ylttx_email_code'];
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<script>
	$("#mainForm").Validform({
	btnSubmit:"#register", 
	tiptype:4, 
	postonce:true,
	ajaxPost:true,
	beforeSubmit:function(curform){
		//$('#register').html('信息提交中。。。。');
		document.getElementById('register').style.display="none";  
		document.getElementById('register1').style.display="block";	
	},
	callback:function(data){
		//alert(data.info+'----'+data.status);
		if(data.status == 'y')
		{	
			//alert(data.info)
			window.location.href="<?= URL('bbsUser.my_userManage')?>"; 
		}else{
			//$('#register').html('注册');
			document.getElementById('register1').style.display="none";
			document.getElementById('register').style.display="block";
			alert(data.info);
		}
	}
});
</script>
<script>
	function sendEmail(){
		//alert('fds');
		var email	=	$('#email').val();
		/*if(){
			
			return false;	
		}*/
		
		$('#getKey').html('获取中...');	
		$.ajax({
			url:'<?= URL('login.new_send')?>',
			type:'POST',
			data:{
				email: email
			},
			success:function(e){
				alert(e);
				if(e == 1){
					alert('发送成功');
					$('#getKey').html('获取验证码');	
				}else{
					alert('发送失败');
				}
			}
		});	
	}
</script>
<div id="wechatPic"></div>
    <?php 
	TPL :: display('User_footer');
	?>
	</body>
</html>
