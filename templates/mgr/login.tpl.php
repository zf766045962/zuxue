<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
html{ background:#F2F5F8;}
body{ background:#F2F5F8;}
</style>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin.js'></script>
<link rel="shortcut icon" href="<?php echo W_BASE_URL;?>favicon.ico">
<script language="javascript" type="text/javascript">
function refreshCc() {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '?' +Math.random();
	}
}
$(function() {
	$('input[type="text"],textarea,input[type="password"]').blur(function() {
		checkForm(this);
	});
	$('#username').focus();
	///alert('ddd')
});
function ajax_submit() {
	if (!checkForm($('#loginFrm').get(0))) {
		return false;
	}
	var url = '<?php echo URL('mgr/admin.chklogin',array('ajax'=>1));?>';
	var data = {
			'username': $('#username').val(),
			'password': $('#password').val(),
			'verify_code': $('#verify_code').val()
		};
	$.post(url, data, function(json){
		if ('string' == typeof json) {
			json = eval('(' + json + ')');
		}
		if (json.state == '200') {
			window.location.href = '<?php echo URL('mgr/admin.index_content','','');?>';
		} else {
			if (json.state == '401') {
				$('#username_msg').html(json.msg).addClass("tips-error").show();
				$('#password_msg').hide();
				$('#verify_code_msg').hide();
			} else if (json.state == '402') {
				$('#password_msg').html(json.msg).addClass("tips-error").show();
				$('#username_msg').hide();
				$('#verify_code_msg').hide();
			} else if (json.state == '403'){
				$('#verify_code_msg').html(json.msg).addClass("tips-error").show();
				$('#username_msg').hide();
				$('#password_msg').hide();
			} else   {
				$('#success_msg').html(json.msg).addClass("tips-pass").show();
				$('#password_msg').hide();
				$('#verify_code_msg').hide();
				$('#username_msg').hide();
				//window.top.location.href = "admin.php";
			}
		}
	})
}

//if(window.self!=window.top) window.open(window.location,'_top');
</script>
</head>
<body>
<div id="login-wrap">
	<div class="login-main">
    	<div class="login-tit">
        	<div class="admin-logo"></div>
            <div class="tit"></div>
        </div>
        <div class="login-cont">
        	<form id="loginFrm" action="" method="post" onsubmit="ajax_submit();return false;">
                <div class="account1">
                	<label for="">用户名：</label>
                    <input class="input-txt w180" id="username" name="username" type="input" />
                    <span id="username_msg"></span>
                </div>             
             
                <div class="account1">
                	<label for="">密码：</label>
                    <input class="input-txt w180" id="password" name="password" type="password" />
                    <span id="password_msg"></span>
                </div>
				<?php if(IS_USE_CAPTCHA):?>
                <div class="account2">
                	<label for="">验证码：</label>
                    <input class="input-txt w180" id="verify_code" name="verify_code" type="text" autocomplete="off" />
                    <span id="verify_code_msg"></span>
                </div>
				<!-- 验证码 -->
                <div class="account3">
                	<img id="checkCodeImg" src="/code/vdimgck.php" />
                 <a href="javascript:refreshCc();">看不清楚，换一张</a>
                </div>

				 <div class="account3">
                	 <span id="success_msg"></span>
                </div>
				<?php endif;?>
                <input class="admin-btn" onfocus="this.blur()" name="" type="submit" value="登 录" />
                <!--<input class="admin-btn-no" name=""  type="submit" value="登 录" />-->
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php if($is_admin_report): USER::set('isAdminReport', '');?>
	<!-- report -->
	<img src="<?php echo F('report','register');?>" class="hidden"/>
<?php endif;?>
