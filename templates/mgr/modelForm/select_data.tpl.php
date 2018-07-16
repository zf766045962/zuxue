<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>从列表中选择数据</title>
<link href="<?= CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
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
<div class="pad_10" style="padding:10px;">
    <div id="searchid">
    <form name="searchform" id="searchform" action="<?= URL('mgr/modelForm.public_select_data','modelid='.V('g:modelid').'&catid='.V('g:catid'));?>" method="post">
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        	<tr>
            	<td>
                <div class="explain-col">
                    <?= $catid_search.$searchStr;?>
                    <a href="javascript:$('#searchform').submit();" class="btn-general highlight"><span><img src="<?= IMG_PATH;?>admin_img/search.png" style="float:left; padding:5px 2px 0 0;">搜 索</span></a>
            	</div>
            	</td>
        	</tr>
        </tbody>
    </table>
    </form>
    </div>

    <form name="myform" id="myform" action="" method="post" >
        <div class="table-list">
            <table width="100%">
                <thead>
                    <tr>
                    <th width="30">&nbsp;&nbsp;</th>
                    <th width="50">ID</th>
                    <?php if(!empty($listItem)){
						foreach($listItem as $key=>$val){
							if($val['fieldid'] == V('r:fieldid')) $name = $key;?>
                    <th><?= $val['name'];?></th>
                    <?php }}?>
                    </tr>
                </thead>
                <tbody>
                	<?php if(!empty($info)){
						foreach($info as $key=>$val){?>
                    <tr onclick="$(this).find('input').attr('checked', <?= V('r:t',1) == 1 ? "true" : "$(this).find('input').attr('checked') ? false : true";?>)" style="cursor:pointer;" title="点击选择">
                        <td align="center">
                        <?php if(V('r:t',1) == 1){?>
                        <input class="input" name="id[]" value="<?= $val['id'];?>" type="radio">
                        <?php }else{?>
                        <input class="input" name="id[]" value="<?= $val['id'];?>" type="checkbox">
                        <?php }?>
                        </td>
                        <td align="center"><?= $val['id'];?></td>
                        
                        <?php if(!empty($listItem)){
							foreach($listItem as $k=>$v){
								// 可以加入特殊处理
								// ...  to do
								$func = $v['formtype'];
								if(!method_exists($form_list, $func)){
									echo '<td></td>';continue;
								}
								$showValue = $form_list->$func($val[$k],$v,$val);
								if($name == $k) $jsInfo[$val['id']]['title'] = strip_tags($showValue);
								echo $showValue;
							}
						}
						?>
                    </tr>
                    <?php }}else{?>
                    <tr><td colspan="<?= count($listItem)+3;?>" style="text-align:center; line-height:40px; color:#666;">没有查询到与条件相匹配的数据</td></tr>
                    <?php }?>
            	</tbody>
            </table>
            
            <?php if(V('r:t',1) == 2){?>
            <div class="btn">
            	<a href="javascript:;" class="btn-general" onclick="checkAll('myform');"><span>全选/反选</span></a>
            </div>
            <?php }?>
            
            <div id="pages" style="text-align:center;"><?= $pager;?></div>
            <div style="margin:0; text-align:center;" class="btn-area">
                <a class="btn-general highlight" onclick="return_id('<?= V('r:field');?>');"><span>确 定</span></a>
                <a class="btn-general" id="pop_cancel"><span>取 消</span></a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
var api = frameElement.api, W = api.opener;
/*window.onload = function(){
	var v = ','+W.$.dialog.data('<?= V('r:field');?>')+',';
	$('.input').each(function (){
		if(v.indexOf(','+this.value+',') !== -1){
			$(this).attr('checked','checked');
		}
	});
}*/
$("#pop_cancel").click(function() {
	api.close();
});
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
// 操作选中项
function return_id(itemname) {
	var str	= 0;
	var idstr = tag = '';
	var list = <?= json_encode($jsInfo);?>;
	$("input[name='id[]']").each(function() {
		if($(this).attr('checked') == true) {
			str = 1;
			idstr += tag + $(this).val();
			tag = ',';
		}else{
			delete list[$(this).val()];
		}
	});
	if(str == 0) {
		$.dialog.alert('您未选中任何项！');return;
	}
	//*********************Start*****************************
	var html = '';
	$.each(list, function(i, data) {
		var ids = parseInt(Math.random() * 10000 + 10*i);
		html += "<li id='data"+ids+"'><input type='hidden' name='"+itemname+"_id[]' value='"+i+"'><input type='text' value='"+i+"' style='width:50px;' class='input-text' disabled><input type='text' name='"+itemname+"_name[]' value='"+data.title+"' style='width:310px;' class='input-text'> <input type='text' name='"+itemname+"_sort[]' value='0' style='width:50px;' class='input-text' <?= V('r:t',1) == 1 ? 'disabled' : '';?>> <a href=\"javascript:remove_div('data"+ids+"')\">移除</a> </li>";
	});
	//*********************End*******************************
	W.$('#'+itemname+'_tips').css('display','none');
	W.$('#'+itemname+'dataList').<?= V('r:t',1) == 1 ? 'html' : 'append';?>(html);
	api.close();
}
</script>
</body>
</html>