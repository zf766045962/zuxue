<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站点设置</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
<script>
	window.onload = function() {
		$('#preview_loading').hide();
	}


	function preview(o) {
		$('#preview_loading').show();
		$('#logo_form').submit();
	}
	
	function uploadFinished(state, url) {
		$('#logo_form').get(0).reset();

		$('#preview_loading').hide();
		if (state != '200') {
			alert(state);
			return;
		}
		$('#logo_preview').attr('src', url);
		$('#logo').val(url);

	}
</script>
</head>
<body>
<div class="main-wrap">
	<div class="path"><p>当前位置：问题列表<span>&gt;</span>解答</p></div>
    <div class="main-cont">
        <h3 class="title">问题解答</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	
            	<form action="<?= URL('mgr/arcticlepublish.updpro');?>" name="form1" method="post" id="this_form">
                	<div class="form-row"><label class="form-field">编号：</label><font color="#FF0000"><?= V('r:id');?></font></div>
                    <!--<div class="form-row">
                        <label class="form-field">问题</label>
                        <div class="form-cont">
                            <input name="site_name" class="input-txt" vrel="sz=max:200,m:请缩减至二百个字内|ne=m:不能为空" warntip="#nameTip" type="text" value="<?php echo $config['site_name']; ?>" /><span class="tips-error hidden" id="nameTip"></span>
                            
                        </div>
                    </div>-->
                    
                    <div class="form-row">
                        <label class="form-field">问题：</label>
                        <div class="form-cont">
                            <input name="question" class="input-txt" vrel="sz=max:200,m:请缩减至二百个字内|ne=m:不能为空" warntip="#nameTip" type="text" value="<?= $info['question'];?>" style="width:580px;"/><span class="tips-error hidden" id="nameTip"></span>
                        </div>
                    </div>
                    <div class="form-row"><label class="form-field">提问时间：</label><?= $info["addtime"];?></div>
                    <div class="form-row">
                        <label class="form-field">解答：</label>
                        <div class="form-cont">
                        <textarea name="answer" class="input-area area-s4 code-area" cols="10" rows="10"><?= $info['answer'];?></textarea>
                          <p class="form-tips">（字数不能超过50个汉字）</p>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= V('r:id');?>"  />
                    <!--<div class="form-row">
                        <label class="form-field">底部联系我们</label>
                        <div class="form-cont">
                            <textarea name="site_contact" class="input-area area-s4 code-area"><?php echo $config['site_contact']; ?></textarea>
                            <p class="form-tips">（信息将显示在页面底部）</p>
                        </div>
                    </div>-->
                    
                    <div class="btn-area"><a href="javascript:subm();" class="btn-general highlight" name="保存修改"><span>提交</span></a>
                    <input type="submit" style="display:none;" />
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
