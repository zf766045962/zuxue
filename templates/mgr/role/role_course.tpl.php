<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>价格设定</title>
<link href="<?= CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?= JS_PATH;?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH;?>content_addtop.js"></script>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
<link href="/js/lhgdialogsc/skins/discuz.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	html{_overflow-y:scroll}
	.table-list th{ border:1px solid #d5dfe8;}
	.table-list tr td{ border:1px solid #eee;}
	.explain-col label{ margin-right:5px; cursor:pointer;}
</style>
</head>

<body>
<div class="path">
    <p>当前位置：后台管理<span>&gt;</span>价格设置
</div>
<div class="pad_10">
    <form name="myform" id="myform" action="" method="post" >
        <div class="table-list">
            <table width="100%">
                <thead>
                    <tr>
                    <th width="25">课程ID</th>
                    <th width="120">课程名称</th>
					<th width="100">学币</th>
					<th width="120">是否可查看</th>
					
                    </tr>
                </thead>
                <tbody>
                	<?php if(!empty($info)){
						foreach($info as $key=>$val){
						$res = DS('mgr/role.sql1','',"select * from xsmart_role_course where rid = ".V('r:id') .' and cid = '.$val['id']);
					?>
						
                    <tr>
                        <td align="center"><?= $val['id'];?></td>
						<td align="center"><?= $val['title']?></td>
						<td align="center">
						<input type="text" class="input-text" name="cprice" id="cprice_<?=$val['id']?>" value="<?= $res[0]['cprice']?>" /></td>
                        <td align='center'>
						<input type="radio" name="ctype_<?= $val['id'];?>" id="ctype_<?=$val['id'];?>" value="1" <?= $res[0]['ctype'] == 1 ? 'checked="checked"' : ''?> <? if(empty($res)){echo 'checked="checked"';}?>/>可查看视频 &nbsp;&nbsp;&nbsp;
						<input type="radio" name="ctype_<?= $val['id'];?>"<?= $res[0]['ctype'] == 2 ?'checked="checked"':''?> id="ctype_<?=$val['id'];?>" value="2" />不可查看视频 </td>
						<input type="hidden" value="<?= $val['id'];?>" name="cid" id="<?= $val['id'];?>" />
						<input type="hidden" value="<?= V('r:id');?>" name="rid" id="rid_<?= $val['id'];?>" />
                    </tr>
                    <?php }}?>
            	</tbody>
            </table>
			
			<div class="btn-area" id="btn1">
				<center><a class="btn_genera2" id="btn_sub" onclick="all_course()"><span>确认保存</span></a>
				</center>
				
			</div>
            
        </div>
    </form>
</div>

<script type="text/javascript">
function all_course(){
	var count = 0;
	$("[name='cid']").each(function(index, element) {
		
		if($("#cprice_"+$(element).attr('id')).val() == ""){
			count++;
		}
	});
	if(count > 0){
		alert("数据不能为空！");
		return false;
	}
	var url ="";
	//var url = "<?= URL('mgr/role.role_course');?>&info=";
	
	/*$("[name='cid']").each(function(index, element) {
		
		url += ','+$(element).val()+'-'+$('#rid_'+$(element).attr('id')).val()+'-'+$('#cprice_'+$(element).attr('id')).val()+'-'+$("input[name='ctype_"+$(element).attr('id')+"']:checked").val()
	});*/
	$("[name='cid']").each(function(index, element) {
		
		url += ','+$(element).val()+'-'+$('#rid_'+$(element).attr('id')).val()+'-'+$('#cprice_'+$(element).attr('id')).val()+'-'+$("input[name='ctype_"+$(element).attr('id')+"']:checked").val()
	});
	//alert(url)
	$.ajax({
			url:'<?= URL('mgr/role.role_course')?>',
			type:'POST',
			data:{
				info	: url
			},
			success:function(r){
				//e = eval('(' + r + ')');
				var api = frameElement.api, W = api.opener;api.close();	
			}
		});
	/*$.post(url,function(data){  
		var api = frameElement.api, W = api.opener;api.close();	
	});*/
}
function checkAll(obj){
	var form_obj=document.getElementById(obj);
	var input_obj=form_obj.getElementsByTagName('input');
	for(i=0;i<input_obj.length;i++){
		if(input_obj[i].type=='checkbox'){
			if(input_obj[i].checked==true){
				input_obj[i].checked='';
			}else{
				input_obj[i].checked='checked';
			}
		}
	}
}
function confirmUrl(url,msg){
	$.dialog.confirm(msg,function (){
		window.location = url;
	});
}


</script
</body>
</html>