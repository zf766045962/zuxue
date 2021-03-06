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
                    <th width="25">ID</th>
                    <th width="120">名称</th>
					<th width="100">学币设定</th>
					<th width="100">操作</th>
                    </tr>
                </thead>
                <tbody>
                	<?php if(!empty($info)){
						foreach($info as $key=>$val){
							$res = DS('mgr/role.sql1','',"select * from xsmart_role_system where rid = ".V('r:id') .' and sid = '.$val['id']);	
					?>
					
                    <tr>
                        <td align="center"><?= $val['id'];?></td>
						<td align="center"><?= $val['stitle']?></td>
						<td align="center">
						<input type="text" class="input-text" name="sprice" id="sprice_<?=$val['id']?>" value="<?= $res[0]['sprice']?>" /></td>
						<input type="hidden" value="<?= $val['id'];?>" name="sid" id="<?= $val['id'];?>" />
						<input type="hidden" value="<?= V('r:id');?>" name="rid" id="rid_<?= $val['id'];?>" />
						<td align="center">
						 <?
						 	if($val['catid'] ==2){
						 ?>
						<a onclick="dialog('<?= URL('mgr/role.rchapter','id='.V('r:id').'&sid='.$val['id']);?>','设定章节价格',700,500)" style="cursor:pointer">设定章节价格</a>
						<? }?>
						</td>
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
function dialog(url,title,width,height){
	$.dialog({
		title:title,
		id: 'dialsg',
		width: width,
		height: height,
		fixed: true,
		lock: true,
		background: '#000',
		opacity: 0.5,
		content: 'url:'+url
	});
}

function all_course(){
	var count = 0;
	$("[name='sid']").each(function(index, element) {
		
		if($("#sprice_"+$(element).attr('id')).val() == ""){
			count++;
		}
	});
	if(count > 0){
		alert("数据不能为空！");
		return false;
	}
	
	/*$url = "<?= URL('mgr/role.role_system');?>&info=";
	$("[name='sid']").each(function(index, element) {
		
		$url += ','+$(element).val()+'-'+$('#rid_'+$(element).attr('id')).val()+'-'+$('#sprice_'+$(element).attr('id')).val()
	});
	//alert($url)
	$.post($url,function(data){
		var api = frameElement.api, W = api.opener;api.close();
	});*/
	var url ="";
	$("[name='sid']").each(function(index, element) {
		
		url += ','+$(element).val()+'-'+$('#rid_'+$(element).attr('id')).val()+'-'+$('#sprice_'+$(element).attr('id')).val()+'-'+$("input[name='ctype_"+$(element).attr('id')+"']:checked").val()
	});
	//alert(url)  
	$.ajax({
			url:'<?= URL('mgr/role.role_system')?>',
			type:'POST',
			data:{
				info	: url
			},
			success:function(r){
				//e = eval('(' + r + ')');
				var api = frameElement.api, W = api.opener;api.close();	
			}
		});
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


</script>
</body>
</html>