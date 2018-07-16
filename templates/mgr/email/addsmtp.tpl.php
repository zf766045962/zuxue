<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加smtp</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>SMTP服务器<span>&gt;</span><?= V('r:id',0) == 0 ? '添加' : '修改';?></span></p></div>
    <div class="main-cont">
        <h3 class="title"><?= V('r:id',0) == 0 ? '添加' : '修改';?>SMTP</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<?php //var_dump($info);?>
            	<form action="<?= URL('mgr/email.save_smtp');?>" name="form1" method="post" id="this_form">
                  
                    <div class="form-row">
                        <label class="form-field">主机：</label>
                        <div class="form-cont">
                            <input name="smtp" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['smtp']) ? $info['smtp'] : '';?>" />
                            <p class="form-tips">腾讯 smtp.qq.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 新浪 smtp.sina.com<br />雅虎 smtp.yahoo.com &nbsp; 163 &nbsp;smtp.163.com</p>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">登陆名：</label>
                        <div class="form-cont">
                            <input name="username" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['username']) ? $info['username'] : '';?>" />
                            <p class="form-tips">* 为完整邮箱地址：SMTP服务器登陆帐号,同样是发件人</p>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">密码：</label>
                        <div class="form-cont">
                            <input name="password" class="input-txt" warntip="#nameTip" type="password" style="width:350px;" value="<?= isset($info['password']) ? $info['password'] : '';?>" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">有效：</label>
                        <div class="form-cont">
                          <select name="is_ok" id="is_ok">
                          	<option value="0" selected="selected">否</option>
                            <option value="1">是</option>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">排序：</label>
                        <div class="form-cont">
                            <input name="sort" class="input-txt" warntip="#nameTip" type="text" style="width:30px;" value="<?= isset($info['sort']) ? $info['sort'] : '0';?>" onfocus="this.select()" maxlength="5"/>
                            <p class="form-tips">* 群发时使用该序号顺序发送</p>
                        </div>
                    </div>

					<div class="btn-area" style="margin-top:0px;">
                    	<input type="hidden" name="id" value="<?= isset($info['id']) ? $info['id'] : '0';?>"/>
                   		<input type="submit" style="display:none;" />
                        <a href="javascript:subm();" class="btn-general highlight" name="保存修改">
                        <span>提交</span></a>
                        <a href="javascript:history.go(-1);" class="btn-general highlight" name="返回">
                        <span>返回</span></a>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
    
    
</div>
<script>
	function subm(){
		$('#submit').click();
	}
	$('#is_ok').val(<?= isset($info['is_ok']) ? $info['is_ok'] : '';?>);

</script>
</body>
</html>
