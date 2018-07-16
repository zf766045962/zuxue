<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>联动菜单管理</title>
<link href="<?= CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>styleswitch.js"></script>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/admin-all.js"></script>
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
</head>
<body>
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<div class="path">
    <p>当前位置：系统管理<span>&gt;</span>联动菜单<span>&gt;</span>菜单列表</p>
</div>
<div class="main-cont">
	<h3 class="title">联动菜单列表
        <a href="javascript:dialog('<?= URL('mgr/linkage.add')?>','添加联动菜单',500,300);" class="btn-general"><span>添加联动菜单</span></a>
    </h3>
</div>
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<div class="pad_10">
	<div class="explain-col">温馨提示：添加或修改联动菜单后，请点击联动菜单后“更新缓存”按钮</div>
	<div class="bk10"></div>
    <div class="table-list">
        <table width="100%" cellspacing="0">
            <thead>
                <tr>
                <th width="10%">ID</th>
                <th width="20%" align="left" >菜单名称</th>
                <th width="30%" align="left" >菜单描述</th>
                <th width="20%" >调用代码</th>
                <th width="20%" >管理操作</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(!empty($infos)){
                    foreach($infos as $key=>$info){
                ?>
                <tr>
                <td width="10%" align="center"><?= $info['linkageid']?></td>
                <td width="20%" ><?= $info['name']?></td>
                <td width="30%" ><?= $info['description']?></td>
                <td width="20%" class="text-c"><input type="text" value="{menu_linkage(<?= $info['linkageid']?>,'L_<?= $info['linkageid']?>')}" style="width:200px;"></td>
                <td width="20%" class="text-c"><a href="<?= URL('mgr/linkage.public_manage_submenu','keyid='.$info['linkageid']);?>">管理子菜单</a> | <a href="javascript:dialog('<?= URL('mgr/linkage.add','linkageid='.$info['linkageid'])?>','编辑 - <?= $info['name'];?>',500,300);">修改</a> | <a href="javascript:confirmUrl('<?= URL('mgr/linkage.delete','linkageid='.$info['linkageid']);?>','您确定删除此菜单吗？删除后不可恢复。');">删除</a> | <a href="<?= URL('mgr/linkage.public_cache','linkageid='.$info['linkageid']);?>">更新缓存</a></td>
                </tr>
                <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>