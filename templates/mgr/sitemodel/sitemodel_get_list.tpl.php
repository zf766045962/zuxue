<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择数据模型</title>
<link href="<?= CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>styleswitch.js"></script>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/admin-all.js"></script>
</head>
<body>
<div class="pad_10">
<form name="myform" action="" method="post">
<div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
		<tr>
		<th width="10%">ID</th>
		<th width="20%" align="left" >模型名称</th>
        <th width="20%" align="left" >数据表</th>
		<th width="30%" align="left" >模型描述</th>
		</tr>
        </thead>
        <tbody>
		<?php 
		if(!empty($infos)){
			foreach($infos as $info){
		?>
		<tr onclick="return_id(<?= $info['modelid'];?>)" title="点击选择" class="cu">
		<td width="10%" align="center"><?= $info['modelid'];?></td>
		<td width="20%" ><?= $info['name'];?></td>
        <td width="20%" ><?= $info['tablename'];?></td>
		<td width="30%" ><?= $info['description'];?></td>
		</tr>
		<?php 
			}
		}
		?>
		</tbody>
	</table>
</div>
</form>
</div>

<script language="javascript">
function return_id(modelid) {
	var obj = window.parent;
	if(obj.length > 1){
		obj[0].$('#sitemodelid').val(modelid);
		obj[0].$('#fieldid').val('');
		obj[0].$('#datatitle').val('');
		obj[0].$.dialog({id:'dialog'}).close();
	}else{
		obj.$('#sitemodelid').val(modelid);
		obj.$('#fieldid').val('');
		obj.$('#datatitle').val('');
		obj.$.dialog({id:'dialog'}).close();
	}
}
</script>
</body>
</html>