<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>联动菜单管理</title>
<link href="<?= CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
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
	<h3 class="title"><font color="#FF0033"><?= $info['name'];?></font> - 联动菜单列表
        <a href="javascript:dialog('<?= URL('mgr/linkage.add','keyid='.$keyid)?>','添加子菜单',500,300);" class="btn-general"><span>添加子菜单</span></a>
        <a href="<?= !$info['keyid'] ? URL('mgr/linkage.init') : URL('mgr/linkage.public_manage_submenu','keyid='.$keyid.'&parentid='.$info['parentid']);?>" class="btn-general"><span>返回上级</span></a>
    </h3>
</div>
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<div class="pad_10">
    <form name="myform" action="<?= URL('mgr/linkage.public_listorder');?>" method="post">
        <div class="table-list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                <th width="90">排序</th>
                <th width="140">ID</th>
                <th width="240" align="left" >菜单名称</th>
                <th width="200">菜单描述</th>
                <th width="">管理操作</th>
                </tr>
                </thead>
                <tbody>
                <?= $submenu;?>
                </tbody>
            </table>
            <div class="btn">
            	<a onclick="$('#dosubmit').click();" class="btn-general highlight"><span>保存排序</span></a>
                <a href="<?= !$info['keyid'] ? URL('mgr/linkage.init') : URL('mgr/linkage.public_manage_submenu','keyid='.$keyid.'&parentid='.$info['parentid']);?>" class="btn-general"><span>返回上级</span></a>
            	<input type="submit" id="dosubmit" style="display:none;" />
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

function edit(id, name,parentid) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:name,id:'edit',iframe:'?m=admin&c=linkage&a=edit&linkageid='+id+'&parentid='+parentid,width:'500',height:'200'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
</script>
</body>
</html>