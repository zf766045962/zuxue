<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= V("r:modelid") ? '添加' : '编辑';?>联动菜单</title>
<link href="<?= CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>styleswitch.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
		$("#name").formValidator({onshow:"请输入菜单名称",onfocus:"菜单名称不能为空。"}).inputValidator({min:1,max:999,onerror:"菜单名称不能为空。"});
		
		$("#pop_cancel").click(function() {
			var api = frameElement.api, W = api.opener;api.close();
		});
	})
</script>
</head>
<body>
<br />
<div class="pad_10">
    <div class="common-form">
        <form name="myform" action="<?= URL('mgr/linkage.save');?>" method="post" id="myform" target="mainframe">
        <table width="100%" class="table_form contentWrap">
        	<?php if($keyid > 0) { ?>
            <tr>
            <td>上级菜单</td>
            <td>
            <?= APP :: M('mgr/linkage.select_linkage',array('keyid'=>$keyid, 'parentid'=>0, 'name'=>'info[parentid]', 'id'=>'parentid', 'alt'=>'无（作为一级栏目）', 'linkageid'=>$parentid, 'property'=>''));?>
            </td>
            </tr>
		  	<?php } ?>
            
            <tr>
            <td>菜单名称</td>
            <td>
            <input type="text" name="info[name]" value="<?= $info['name'];?>" class="input-text" id="name" size="30"></input>
            </td>
            </tr>
			<tr>
            <td>菜单标题</td>
            <td>
			<input type="text" name="info[title]" value="<?= $info['title'];?>" />
            </td>
            </tr>
            <tr>
            <td>菜单关键词</td>
            <td>
			<input type="text" name="info[keyword]" value="<?= $info['keyword'];?>" />
            </td>
            </tr>
            <tr>
            <td>菜单描述</td>
            <td>
            <textarea name="info[description]" rows="2" cols="20" id="description" class="inputtext" style="height:60px;width:300px;padding:3px 5px;"><?= $info['description'];?></textarea>
            </td>
            </tr>
            
            <tr>
            <td>排序</td>
            <td>
            <input type="text" name="info[listorder]" value="<?= $info['listorder'] ? $info['listorder'] : 0 ;?>" class="input-text" id="listorder" maxlength="6"></input>
            </td>
            </tr>
            
            <?php if($keyid == 0) { ?>
            <tr>
            <td>菜单风格</td>
            <td>
            <label><input name="info[style]" value="0" type="radio" <?= $info['style'] == 0 ? 'checked' : '';?>>&nbsp;下拉风格</label>&nbsp;&nbsp;<label><input name="info[style]" value="1" type="radio" <?= $info['style'] == 1 ? 'checked' : '';?>>&nbsp;弹出风格</label>&nbsp;&nbsp;<label><input name="info[style]" value="2" type="radio" <?= $info['style'] == 2 ? 'checked' : '';?>>&nbsp;SELECT联动，</label>显示 <input type="text" name="info[level]" value="<?= $setting['level'] ? $setting['level'] : 0;?>" class="input-text" id="level" size="5"></input>级
            </td>
            </tr>
            <?php }?>
        </table>
        <div class="bk15"></div>
        <div class="center">
            <div class="btn-area" style="margin:0;">
                <a onclick="$('#myform').submit();" class="btn-general highlight"><span>保 存</span></a>
                <a id="pop_cancel" class="btn-general"><span>取 消</span></a>
            </div>
        </div>
        <input type="hidden" name="linkageid" value="<?= $linkageid;?>">
		<input type="hidden" name="info[keyid]" value="<?= $keyid;?>">
        </form>
    </div>
</div>
</body>
</html>