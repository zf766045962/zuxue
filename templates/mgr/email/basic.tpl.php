<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>全局设置</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>全局设置</p></div>
    <div class="main-cont">
        <h3 class="title">全局设置</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<?php //var_dump($info);?>
            	<form action="<?= URL('mgr/email.save_basic');?>" name="form1" method="post" id="this_form">
                  
                    <div class="form-row">
                        <label class="form-field">管理员邮箱：</label>
                        <div class="form-cont">
                            <input name="admin_email" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['admin_email']) ? $info['admin_email'] : '';?>" />
                            <p class="form-tips">* SMTP测试</p>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">发件人：</label>
                        <div class="form-cont">
                            <input name="sender" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['sender']) ? $info['sender'] : '';?>" />
                            <p class="form-tips">* 会显示在发件人栏位</p>
                        </div>
                    </div>
                    

					<div class="btn-area" style="margin-top:0px;">
                   		<input type="submit" style="display:none;" />
                        <a href="javascript:subm();" class="btn-general highlight" name="保存修改">
                        <span>保存</span></a>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
    
    
</div>
<script>
	function subm(){
		 $('#this_form').submit();
	}
</script>
</body>
</html>
