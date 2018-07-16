<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>模型管理</title>
<link href="<?= CSS_PATH?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>table_form.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
<link href="/js/lhgdialogsc/skins/discuz.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function dialog(url,title,width,height){
	$.dialog({
		title:title,
		id: 'dialog',
		width: width,
		height: height,
		fixed: true,
		lock: true,
		background: '#000',
		opacity: 0.5,
		content: 'url:'+url
	});
}
function confirmUrl(url,msg){
	$.dialog.confirm(msg,function (){
		window.location = url;
	});
}
</script>
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<div class="path">
    <p>当前位置：系统管理<span>&gt;</span>模型管理</p>
</div>
<div class="main-cont">
    <h3 class="title">模型列表
        <a class="btn-general"><span>导入模型</span></a>
        <a class="btn-general" onclick="dialog('<?= URL('mgr/sitemodel.add')?>','新增模型',500,300)"><span>新增模型</span></a>
    </h3>
    <div class="table-list">
        <table width="100%" cellspacing="0" >
            <thead>
                <tr>
                <th width="100">modelid</th>
                <th width="150">模型名称</th>
                <th width="150">数据表</th>
                <th width="150">模型类别</th>
                <th width="150">描述</th>
                <th width="80">状态</th>
                <th width="80">数据量</th>
                <th width="300">管理操作</th>
                </tr>
            </thead>
        <tbody>
        <?php $modelType = array(1=>'内容模型',9=>'自定义模型');
        if (!empty($datas)){ 
            foreach($datas as $r) {
        ?>
        <tr>
            <td align='center'><?= $r['modelid']?></td>
            <td align='center'><a href="<?= URL('mgr/sitemodel_field.init','modelid='.$r['modelid'])?>"><?= $r['name'];?></a></td>
            <td align='center'><a href="<?= URL('mgr/sitemodel_field.init','modelid='.$r['modelid'])?>"><?= $r['tablename'];?></a></td>
            <td align='center'><?= $modelType[$r['sql']];?></td>
            <td align='center'><?= $r['description']?></td>
            <td align='center'><?= $r['disabled'] ? L('icon_locked') : L('icon_unlock')?></td>
            <td align='center'><?= $r['items']?></td>
            <td align='center'><a href="<?= URL('mgr/sitemodel_field.init','modelid='.$r['modelid'])?>">字段管理</a>&nbsp;|&nbsp;<a href="javascript:dialog('<?= URL('mgr/sitemodel.add', 'modelid='.$r['modelid']);?>','修改模型信息',500,300)">编辑</a>&nbsp;|&nbsp;<a href="<?= URL('mgr/sitemodel.disabled','modelid='.$r['modelid'].'&disabled='.$r['disabled'])?>"><?= $r['disabled'] ? '<font color="red">启用</font>' : '禁用';?></a>&nbsp;|&nbsp;<a href="javascript:confirmUrl('<?= URL('mgr/sitemodel.delete','modelid='.$r['modelid'].'&items='.$r['items'])?>','您确定删除此模型吗？删除后不可恢复。');">删除</a>&nbsp;|&nbsp;<a href="<?= URL('mgr/sitemodel.export','modelid='.$r['modelid']);?>">导出</a>
            </td>
        </tr>
        <?php
        	}
        }
        ?>
        </tbody>
        </table>
       <div id="pages"><?= $pager;?></div>
    </div>
</div>
</body>
</html>
