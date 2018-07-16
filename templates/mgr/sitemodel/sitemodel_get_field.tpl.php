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
		<th width="20%" align="left" >字段名</th>
        <th width="20%" align="left" >别名</th>
		</tr>
        </thead>
        <tbody>
		<?php 
		if(!empty($infos)){
			foreach($infos as $info){
		?>
		<tr onclick="return_id(<?= $info['fieldid'];?>,'<?= $info['name'];?>')" title="点击选择" class="cu">
		<td width="10%" align="center"><?= $info['fieldid'];?></td>
		<td width="20%" ><?= $info['field'];?></td>
		<td width="30%" ><?= $info['name'];?></td>
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
function return_id(fieldid,fieldname) {
	var obj = window.parent;
	if(obj.length > 1){
		obj[0].$('#<?= V('g:idname1','fieldid');?>').val(fieldid);
		obj[0].$('#<?= V('g:idname2','datatitle');?>').val(fieldname);
		obj[0].$.dialog({id:'dialog'}).close();
	}else{
		obj.$('#<?= V('g:idname1','fieldid');?>').val(fieldid);
		obj.$('#<?= V('g:idname2','datatitle');?>').val(fieldname);
		obj.$.dialog({id:'dialog'}).close();
	}
}
</script>
</body>
</html>