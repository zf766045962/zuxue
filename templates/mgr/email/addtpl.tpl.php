<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加模板</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
</head>
<body>
<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>邮件模板<span>&gt;</span><?= V('r:id',0) == 0 ? '添加' : '修改';?>模板</p></div>
    <div class="main-cont">
        <h3 class="title"><?= V('r:id',0) == 0 ? '添加' : '修改';?>模板</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<?php //var_dump($info);?>
            	<form action="<?= URL('mgr/email.save_tpl');?>" name="form1" method="post" id="this_form">
                
                  	<div class="form-row">
                        <label class="form-field">模板名称：</label>
                        <div class="form-cont">
                            <input name="tplname" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['tplname']) ? $info['tplname'] : '自定义模板'.$num;?>" />
                        </div>
                    </div>
                   	
                    <div class="form-row">
                        <label class="form-field">模板效果图：</label>
                        <div class="form-cont">
                            <?php $upload = APP :: N('show_upLoad');echo $upload->showUpload('pic',1,'tpl_pic',$info['tpl_pic'],'zh_CN','tpl_pic','image1','class="input-txt"');?>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">邮件标题：</label>
                        <div class="form-cont">
                            <input name="title" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" value="<?= isset($info['title']) ? $info['title'] : '';?>" />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">邮件正文：</label>
                        <div class="form-cont">
                            <textarea name="content" id="content" cols="10" rows="10" style="min-height:430px;"><?= isset($info['content']) ? $info['content'] : '';?></textarea>
                            <p class="form-tips" style="color:#F00;">* 请注意图片URL路径问题</p>
                        </div>
                    </div>
                    <script type="text/javascript">
					var editor = new UE.ui.Editor();editor.render("content");
					</script>

					<div class="btn-area" style="margin-top:0px;">
                    	<input type="hidden" name="id" value="<?= isset($info['id']) ? $info['id'] : '0';?>"/>
                   		<input type="submit" style="display:none;" id="submit"/>
                        <a href="javascript:subm();" class="btn-general highlight" name="保存修改">
                        <span>保存</span></a>
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
</script>
</body>
</html>
