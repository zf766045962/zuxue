<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>字段管理</title>
<link href="<?= CSS_PATH?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>table_form.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= JS_PATH?>admin_common.js"></script>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
<link href="/js/lhgdialogsc/skins/discuz.css" rel="stylesheet" type="text/css" />
</head>
<?php require P_COMS.'/fields/fields.inc.php';?>
<body>
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<div class="path">
    <p>当前位置：系统管理<span>&gt;</span><?= L('model_manage');?><span>&gt;</span><?= $r['name'].L('field_manage');?></p>
</div>
<div class="main-cont">
	<h3 class="title">字段列表
        <a href="<?= URL('mgr/modelForm.add','modelid='.$modelid);?>" class="btn-general" target="_blank"><span><?= L('priview_modelfield');?></span></a>
        <a href="<?= URL('mgr/sitemodel_field.add','modelid='.$modelid);?>" class="btn-general"><span><?= L('add_field');?></span></a>
    </h3>
</div>

<div class="pad-lr-10">
<form name="myform" id="myform" action="<?= URL('mgr/sitemodel_field.listorder','modelid='.$modelid);?>" method="post">
    <div class="table-list">
        <table width="100%" cellspacing="0" >
            <thead>
                <tr>
                    <th width="90">排序</th>
                    <th width="140">字段名</th>
                    <th width="140">别名</th>
                    <th width="100">类型</th>
                    <th width="60">主表</th>
                    <th width="60">必填</th>
                    <th width="60">搜索</th>
                    <th width="60">列表展示</th>
                    <th width="60">基本信息</th>
                    <th >管理操作</th>
                </tr>
            </thead>
            <tbody class="td-line">
            <?php if(!empty($datas[0]['fieldid'])){
            foreach($datas as $r) {
                $tablename = L($r['tablename']);
            ?>
            <tr>
                <td align='center'><input name='listorders[<?= $r['fieldid']?>]' type='text' size='3' value='<?= $r['listorder']?>' class='input-text-c'></td>
                <td style="padding-left:10px;"><a href="<?= URL('mgr/sitemodel_field.edit','modelid='.$r['modelid'].'&fieldid='.$r['fieldid']);?>"><?= $r['field'];?></a></td>
                <td style="padding-left:10px;"><a href="<?= URL('mgr/sitemodel_field.edit','modelid='.$r['modelid'].'&fieldid='.$r['fieldid']);?>"><?= $r['name'];?></a></td>
                <td align='center'><?= $r['formtype'];?></td>
                <td align='center'><?= $r['issystem'] ? L('icon_unlock') : L('icon_locked');?></td>
                <td align='center'><?= $r['minlength'] ? L('icon_unlock') : L('icon_locked');?></td>
                <td align='center'><?= $r['issearch'] ? L('icon_unlock') : L('icon_locked');?></td>
                <td align='center'><?= $r['isposition'] ? L('icon_unlock') : L('icon_locked');?></td>
                <td align='center'><?= $r['isbase'] ? L('icon_unlock') : L('icon_locked');?></td>
                <td align='center'>
                
                <a href="<?= URL('mgr/sitemodel_field.edit','modelid='.$r['modelid'].'&fieldid='.$r['fieldid']);?>">编辑</a>&nbsp;|&nbsp;<?php if(!in_array($r['field'],$forbid_fields)) { ?><a href="<?= URL('mgr/sitemodel_field.disabled','modelid='.$r['modelid'].'&fieldid='.$r['fieldid'].'&disabled='.$r['disabled']);?>"><?= $r['disabled'] ? '<font color="red">启用</font>' : '禁用';?></a><?php } else { ?><font color="#BEBEBE">禁用</font><?php } ?>&nbsp;|&nbsp;<?php if(!in_array($r['field'],$forbid_delete)) {?><a href="javascript:confirmUrl('<?= URL('mgr/sitemodel_field.delete','modelid='.$r['modelid'].'&fieldid='.$r['fieldid']);?>','您确定删除此字段吗？删除后不可恢复。');">删除</a><?php } else {?><font color="#BEBEBE">删除</font><?php }?>
                
                </td>
            </tr>
            <?php } 
			}else{?>
            <tr><td colspan="10" align='center'>暂无字段！</td></tr>
            <?php }?>
            </tbody>
        </table>

        <div class="btn">
        <input type="submit" name="dosubmit" id="dosubmit" style="display:none;" value=""/>
        <a class="btn-general highlight" onclick="$('#dosubmit').click();"><span>保存排序</span></a>
        <a href="<?= URL('mgr/sitemodel_field.add','modelid='.$modelid);?>" class="btn-general"><span><?= L('add_field');?></span></a>
        </div>
       
	</div>
</form>
</div>
<script>
function confirmUrl(url,msg){
	$.dialog.confirm(msg,function (){
		window.location = url;
	});
}
</script>
</body>
</html>
