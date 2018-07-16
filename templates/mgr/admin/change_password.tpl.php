<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码 - 帐号管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>

</head>
<body class="main-body">
<div class="main-wrap">
	<div class="path"><p>当前位置：系统设置<span>&gt;</span>修改密码</p></div>
    <div class="main-cont">
        <h3 class="title">修改密码</h3>
		<div class="set-area">
        	<div class="form">
            	<form action="<?=URL("mgr/admin.savepwd")?>" method="post" id="passwordForm">
                <div class="form-row">
                	<label class="form-field">登录名</label>
                    <div class="form-cont">
                        <p class="text"><?php echo $username;?></p>
                    </div>
                </div>
                <div class="form-row">
                	<label for="old_pwd" class="form-field">请输入旧密码</label>
                    <div class="form-cont">
                        <input id="old_pwd" name="old_pwd" class="input-txt w120" type="password" 
                        vrel="_f|ft|ne|sz=min:5,max:20,m:长度在5-20个字符之间,ww" 
                        warntip="#old_pwdTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus"  
                        oktip="#old_pwdOkTip"/>
                        <span class="tips-error hidden" id="old_pwdTip">提示</span>
                       	<span class="tips-right hidden" id="old_pwdOkTip">格式正确</span>
                    </div>
                </div>
			
                <div class="form-row">
                	<label for="pwd" class="form-field">请输入新密码</label>
                    <div class="form-cont">
                        <input id="pwd" name="pwd" class="input-txt w120" type="password" 
                        vrel="_f|ft|ne|sz=min:5,max:20,m:长度在5-20个字符之间,ww" 
                        warntip="#pwdTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus"  
                        oktip="#pwdOkTip"/>
                        <span class="tips-error hidden" id="pwdTip">提示</span>
                       	<span class="tips-right hidden" id="pwdOkTip">格式正确</span>
                    </div>
                </div>
                 <div class="form-row">
                	<label for="re_pwd" class="form-field">请再输入一次</label>
                    <div class="form-cont">
                        <input id="re_pwd" name="re_pwd" class="input-txt w120" type="password" 
                        vrel="_f|ne|repw" 
                        warntip="#re_pwdTip" 
                        oktip="#re_pwdOkTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus" />
                        <span class="tips-error hidden" id="re_pwdTip">错误</span>
                       	<span class="tips-right hidden" id="re_pwdOkTip">格式正确</span>
                    </div>
                </div>
                <input name="id" type="hidden" value="<?php echo $info['id'];?>" />
                <div class="btn-area">
                	<a  id="submitBtn" class="btn-general highlight"><span>提交</span></a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">

var valid = Xwb.use('Validator', {

//var valid = new Validator({
	form: '#passwordForm',
    trigger:'#submitBtn',
	comForm : true,
	validators : {
			 'repw':function(elem, v, data, next)
			 {
				if($('#pwd').val()!= $('#re_pwd').val())
				{
					data.m = '两次输入不一致';
					this.report(false, data);
				} 
				else
				{ 
					data.m = '验证通过';
					this.report(true, data);
				}
				next();
			 
			 },


			}
	}
);
	

</script>
