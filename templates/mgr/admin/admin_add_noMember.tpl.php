<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员</title>

</head>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>


<body>
	<div class="path"><p>当前位置：管理员管理<span>&gt;</span>添加管理员</p></div>
    <div class="main-cont">
    	<h3 class="title">用户信息</h3>
    	<form action="<?php echo URL('mgr/admin.saveAdd_ModeNoMember');?>" method="post" id="shortLinkForm">
        <div id="need">
              	  <div class="form-row">
                	<label for="name1" class="form-field">用户名</label>
                    	   <input name="username" id="username" class="input-txt" type="text" value=""  vrel="_f|ft|english|ne=m:不能为空|sz=min:6,max:20,m:长度在6-20个字符之间,ww" warntip="#usernameTip" style-wrong="input-error" style-focus="input-focus" oktip="#usernameOkTip"/>
                             <span class="tips-error hidden" id="usernameTip">格式不正确</span>
                       		<span class="tips-right hidden" id="usernameOkTip">格式正确</span>
        		  </div>

                    <div class="form-row"><span class="form-field"> 密码</span>
                        <input name="password" id="password" class="input-txt" type="password" value="" 
                        vrel="_f|ft|pw|ne=m:不能为空|sz=min:6,max:20,m:长度在6-20个字符之间,ww" 
                        warntip="#passwordTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus"  
                        oktip="#passwordOkTip"/>
                        <span class="tips-error hidden" id="passwordTip">提示</span>
                       	<span class="tips-right hidden" id="passwordOkTip">格式正确</span>
                    </div>
                    
                     <div class="form-row"><span class="form-field"> 重复密码</span>
                        <input name="repassword" id="repassword" class="input-txt" type="password" value="" vrel="_f|repw" warntip="#repasswordTip" oktip="#repasswordOkTip" style-wrong="input-error"  style-focus="input-focus" />
                        <span class="tips-error hidden" id="repasswordTip">错误</span>
                       	<span class="tips-right hidden" id="repasswordOkTip">格式正确</span>
                    </div>
                    <div class="form-row"><span class="form-field"> email</span>
                        <input name="email" id="email" class="input-txt" type="text" value=""  vrel="_f|ft|mail" warntip="#emailTip" oktip="#emailOkTip" style-wrong="input-error"  style-focus="input-focus" />
                        <span class="tips-error hidden" id="emailTip">格式不正确，请输入正确格式</span>
                        <span class="tips-right hidden" id="emailOkTip">输入正确</span>
                    </div>
		<?php 	if(V('-:appmode/permit',0)){?>
                    <div class="form-row"><span class="form-field"> 所属管理组</span>
                        <label>
                        <select name="groupid" id="groupid">
                          <option value="1">1</option>
                        </select>
                        </label>
          </div>
		<?php }?>
                      <div class="form-row"><span class="form-field"> 是否属于系统管理员</span>
                        <label>
                        <select name="is_root" id="is_root" class="input-txt">
                          <option value="1">是</option>
                          <option value="1" selected="selected">否</option>
                        </select>
                        </label>
                        <span class="tips-right" class="tips-desc">如果属于系统管理员组，那么默认情况下除系统管理员之外就不可以删除</span>
          </div>
  <div class="form form-s1">
                    <div class="form-cont">
						<a href="javascript:$('#shortLinkForm').submit();" class="btn-general highlight" name="保存修改"><span>保存修改</span></a>
						<a id="submitBtn" class="btn-general highlight" name="保存修改"><span>保存</span></a>
                        <span class="tips-error hidden" id="nameTip">提示</span>
                        <p class="form-tips">本部分是不开启会员系统情况下的管理员添加，如果开启了管理员与会员之间的关系，那么需要在系统中配置。</p><br />
<br />

                    </div>
                </div>
        </form>
    </div>

<script type="text/javascript">
function showPlus(){
	$("#plus").slideToggle(200);
}
var valid = Xwb.use('Validator', {

//var valid = new Validator({
	form: '#shortLinkForm',
    trigger:'#submitBtn',
	comForm : true,
	validators : {
			 'pw': function(elem, v, data, next){
						var reg = /^[a-zA-Z-0-9\.\-_\?]+$/;
						if(v){
							if(!data.m && data.m !== 0)
								data.m = '非法字符';
							this.report(reg.test(v), data);
						} else this.report(true, data);
						next();
			 },
			 'repw':function(elem, v, data, next){
						if($('#repassword').val!= $('#password').val){
							data.m = '两次输入不一致';
							this.report(false, data);
						} else{ 
							data.m = '验证通过';
						this.report(true, data);
						}
						next();
			 
			 }
			 
			}

});


</script>
</body>
</html>

