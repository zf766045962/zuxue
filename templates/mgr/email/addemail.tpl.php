<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加address</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>分类管理<span>&gt;</span><?= V('r:id',0) == 0 ? '添加' : '修改';?>邮箱地址</span></p></div>
    <div class="main-cont">
        <h3 class="title"><?= V('r:id',0) == 0 ? '添加' : '修改';?>邮箱地址</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<?php //var_dump($info);?>
            	<form action="<?= URL('mgr/email.save_email');?>" name="form1" method="post" id="this_form" onsubmit="return check()">

                    <div class="form-row">
                        <label class="form-field">E-mail：</label>
                        <div class="form-cont">
                            <input name="address" id="address" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['address']) ? $info['address'] : '';?>" />
                        </div>
                    </div>

                    <div class="form-row">
                        <label class="form-field">地址分类：</label>
                        <div class="form-cont">
                          <select name="cid" id="cid">
                          	<option value="0">请选择</option>
							<?php if(!empty($class)){
                           		foreach($class as $key=>$val){?>
                            	<option value="<?= $val['classid'];?>"><?= $val['classname'];?></option>    
                            <?php }}?>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">有效：</label>
                        <div class="form-cont">
                          <select  name="is_ok" id="is_ok">
                          	<option value="1">是</option>
							<option value="0">否</option>
                          </select>
                        </div>
                    </div>

					<div class="btn-area" style="margin-top:0px;">
                    	<input type="hidden" name="id" value="<?= isset($info['id']) ? $info['id'] : '0';?>"/>
                   		<input type="submit" style="display:none;" id="submit"/>
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
	function check(){
		if($('#address').val() == ''){
			alert('请填写Email地址');
			return false;
		}	
		if($('#cid').val() == 0){
			alert('请选择地址类别');
			return false;
		}
		return true;
	}
	$('#cid').val(<?= isset($info['cid']) ? $info['cid'] : 0;?>);
	$('#is_ok').val(<?= isset($info['is_ok']) ? $info['is_ok'] : 1;?>);
</script>
</body>
</html>
