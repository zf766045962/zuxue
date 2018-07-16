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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>充值卡管理<span>&gt;</span>设置</p></div>
    <div class="main-cont">
        <h3 class="title">设置</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<?php //var_dump($info);?>
            	<form action="<?= URL('mgr/payCard.save_setting');?>" name="form1" method="post" id="this_form">
                  
                  	<!--<div class="form-row">
                        <label class="form-field">卡类型：</label>
                        <div class="form-cont">
                           	<textarea name="card_type" class="input-txt" readonly="readonly"><?= isset($info['card_type']) ? $info['card_type'] : '';?></textarea>
                            <p class="form-tips">* 多类型用,号分隔</p>
                        </div>
                    </div>-->
                    
                    <div class="form-row">
                        <label class="form-field">面值设置：</label>
                        <div class="form-cont">
                            <textarea name="face_value" class="input-txt"><?= isset($info['face_value']) ? $info['face_value'] : '';?></textarea>
                            <p class="form-tips">* 请输入数字，多面值用,号分隔</p>
                        </div>
                    </div>
					
                    <div class="form-row">
                        <label class="form-field">二维码参数头地址：</label>
                        <div class="form-cont">
                            <textarea name="QRcode_http" class="input-txt"><?= isset($info['QRcode_http']) ? $info['QRcode_http'] : '';?></textarea>
                            <p class="form-tips">* 请输入http://完整地址，多地址,号分隔. </p>
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
