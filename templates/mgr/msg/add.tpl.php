<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>详细(修改)</title>
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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span><?= $navName;?></p></div>
    <div class="main-cont">
        <h3 class="title"><?= V('r:id',0) == 0 ? '添加' : '修改';?></h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<?php //var_dump($info);?>
            	<form action="<?= URL('mgr/msg.subm');?>" name="form1" method="post" id="this_form">
                  
                    <div class="form-row">
                        <label class="form-field">媒体名称：</label>
                        <div class="form-cont">
                            <input name="title" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['title']) ? $info['title'] : '';?>" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">媒体编码：</label>
                        <div class="form-cont">
                            <input name="code" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['code']) ? $info['code'] : '';?>" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">用户名：</label>
                        <div class="form-cont">
                            <input name="username" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['username']) ? $info['username'] : '';?>" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">密码：</label>
                        <div class="form-cont">
                            <input name="psw" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['psw']) ? $info['psw'] : '';?>" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">接口地址：</label>
                        <div class="form-cont">
                            <input name="address" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['address']) ? $info['address'] : '';?>" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">是否启用：</label>
                        <div class="form-cont">
                          <select name="is_root">
                          	<option value="0" selected="selected">禁用</option>
                            <option value="1">启用</option>
                          </select>
                        </div>
                    </div>
                    
                    <?php /*?><div class="form-row">
                        <label class="form-field">内容：</label>
                        <div class="form-cont" style="width:55%;">
                        <?php if($info['content'] != ''){?>
                        <textarea name="answer" class="input-area area-s4 code-area" cols="10" rows="10"><?= $info['content'];?></textarea>
                        <?php }else{echo '<font color="#999">未填</font>';}?>
                        <!--<p class="form-tips">（字数不能超过50个汉字）</p>-->
                        </div>
                    </div><?php */?>
                    
                    <div class="form-row">
                    	<label class="form-field">时间：</label>
						<?= isset($info['addtime']) ? $info['addtime'] : '-';?>
                    </div>

					<div class="btn-area" style="margin-top:0px;">
                    	<input type="hidden" name="id" value="<?= V('r:id',0);?>"  />
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
		 $('#this_form').submit();
	}
	$('#is_root').val(<?= $is_root;?>);
</script>
</body>
</html>
