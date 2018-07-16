<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?= V("r:modelid") ? '新增模型' : '修改模型信息';?></title>
<link href="<?= CSS_PATH?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>table_form.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/admin-all.js"></script>
</head>
<body>
<div class="pad-lr-10" style="padding:24px;">
<form id="myform">
	<?= V("r:modelid") ? '<input type="hidden" id="sql" name="info[sql]" value="'.$info['sql'].'">' : '';?>
    <fieldset>
        <legend><?= L('basic_configuration')?></legend>
        <table width="100%" class="table_form">
            <tr>
            	<th width="120">模型类别：</th>
                <td class="y-bg">
                <select <?= V("r:modelid") ? 'disabled="disabled"' : 'name="info[sql]" id="sql"';?>>
                    <option value="0">&nbsp;选择模型类别&nbsp;</option>
                    <option value="1" <?= $info['sql'] == 1 ? 'selected="selected"' : '';?>>内容模型</option>
                    <!--<option value="2" <?= $info['sql'] == 2 ? 'selected="selected"' : '';?>>下载模型</option>
                    <option value="3" <?= $info['sql'] == 3 ? 'selected="selected"' : '';?>>任务模型</option>
                    <option value="4" <?= $info['sql'] == 4 ? 'selected="selected"' : '';?>>条件模型</option>-->
                    <option value="9" <?= $info['sql'] == 9 ? 'selected="selected"' : '';?>>自定义模型</option>
                </select>
                <div class="onError" style="display:none">请选择</div>
                </td>
            </tr>
            <tr>
                <th width="120"><?= L('model_name')?>：</th>
                <td class="y-bg"><input name="info[name]" type="text" class="input-text" id="name" size="30" value="<?= isset($info["name"]) ? $info["name"] : '';?>"  /></td>
            </tr>
            <tr>
                <th><?= L('model_tablename')?>：</th>
                <td class="y-bg"><input type="text" class="input-text" name="info[tablename]" id="tablename" size="30" value="<?= isset($info["tablename"]) ? $info["tablename"] : '';?>" <?= V("r:modelid") ? 'readonly="readonly"' : ''?> /></td>
            </tr>
            <tr>
                <th><?= L('description')?>：</th>
                <td class="y-bg"><input type="text" class="input-text" name="info[description]" id="description"  size="30" value="<?= isset($info["description"]) ? $info["description"] : '';?>"/></td>
            </tr>
        </table>
    </fieldset>
    
	<div class="bk15"></div>
    <fieldset style="display:none;">
        <legend><?= L('template_setting')?></legend>
        <table width="100%"  class="table_form">
            <tr>
                <th width="200"><?= L('available_styles');?></th>
                <td>
                <?php //echo form::select($style_list, '', 'name="info[default_style]" id="default_style" onchange="load_file_list(this.value)"', L('please_select'))?> 
                </td>
            </tr>
            <tr>
                <th width="200"><?= L('category_index_tpl')?>：</th>
                <td  id="category_template"></td>
            </tr>
            <tr>
                <th width="200"><?= L('category_list_tpl')?>：</th>
                <td  id="list_template"></td>
            </tr>
            <tr>
                <th width="200"><?= L('content_tpl')?>：</th>
                <td  id="show_template"></td>
            </tr>
        </table>
    </fieldset>
    
    <div class="center">
        <div class="btn-area" style="margin:0;">
        	<a href="#" onclick="formCheck();" class="btn-general highlight"><span>保 存</span></a>
        	<a href="#" id="pop_cancel" class="btn-general"><span>取 消</span></a>
        </div>
    </div>
    
	<div class="bk15"></div>
	<input name="modelid" id="modelid" type="hidden" value="<?= isset($info["modelid"]) ? $info["modelid"] : '';?>" />
</form>
</div>
<script type="text/javascript">
	// 添加/编辑模型验证
	function formCheck(){
		var sql 		= $("#sql").val();
		var name 		= $("#name").val();
		var tablename 	= $("#tablename").val();
		var modelid	 	= $("#modelid").val();
		var reg 	= /^([a-zA-Z0-9]|[_]){0,20}$/;
		if(sql < 1){
			Xwb.ui.MsgBox.alert('提示','请选择模型类别');
			return;
		}
		if(name.length < 1){
			Xwb.ui.MsgBox.alert('提示','请填写模型名称');
			return;
		}
		if(!reg.test(tablename)){
			Xwb.ui.MsgBox.alert('提示','表名必须为字母、数字、下划线');
			return;
		}

		<?php if( !V("r:modelid") ){?>
		var rs = $.ajax({
			url: "<?= URL("mgr/sitemodel.public_check_tablename");?>",
			data:'tablename='+tablename,
			type:'get',
			async: false
		}).responseText;
		if(rs == 1){
			Xwb.ui.MsgBox.alert('提示','表名已存在');
			return;
		}
		<?php }?>
		
		// ajax提交
		rs = $.ajax({
			url: "<?= URL('mgr/sitemodel.'.(V("r:modelid") ? 'edit' : 'add'))?>",
			data:$('#myform').serialize(),
			type:'post',
			async: false
		}).responseText;
		if(rs == 1){
			parent.location.reload();
		}else{
			Xwb.ui.MsgBox.alert('提示','操作失败');
			return;	
		}
	}
	
	$("#pop_cancel").click(function() {
		var api = frameElement.api, W = api.opener;api.close();
	});
</script>
</body>
</html>