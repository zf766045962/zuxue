<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>列表 - 表单模型</title>
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
<div class="path">
    <p>当前位置：后台管理<span>&gt;</span>内容列表
</div>
<div class="main-cont" style=" line-height:24px">
    <h3 class="title">
        <a class="btn-general" href="<?= URL('mgr/modelForm.add','modelid=11&catid='.V('g:catid'));?>"><span><?  if(V('g:catid') == 2){ echo "添加课程体系";}if(V('g:catid') == 3){ echo "添加进阶课程";}if(V('g:catid') == 4){ echo "添加职业课程";}?></span></a><? if(V('g:catid') == 2){ echo "课程体系";}if(V('g:catid') == 3){ echo "进阶课程";} if(V('g:catid') == 4){ echo "职业课程";}?>列表 
    </h3>
</div>
<div class="pad_10">
    <div id="searchid">
    <form name="searchform" id="searchform" action="<?= URL('mgr/system.index','modelid='.V('g:modelid').'&catid='.V('g:catid'));?>" method="post">
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        	<tr>
            	<td>
                <div class="explain-col" style="display:none;">
					
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
                    <th width="15">&nbsp;&nbsp;</th>
                    <th width="25">ID</th>
                    <th width="120">名称</th>
					<th width="100">发布时间</th>
					<th width="120">管理操作</th>
					
                    </tr>
                </thead>
                <tbody>
                	<?php if(!empty($info)){
						foreach($info as $key=>$val){?>
                    <tr>
                        <td align="center"><input class="inputcheckbox" name="id[]" value="<?= $val['id'];?>" type="checkbox"></td>
                        <td align="center"><?= $val['id'];?></td>
						<td align="center"><a href="<?= URL('mgr/modelForm.add','modelid=11&catid='.V('g:catid').'&id='.$val['id']);?>"><?= $val['stitle'];?></a></td>
						<td align="center"><?= date('Y-m-d H:i:s',$val['inputtime']);?></td>
                        <td align='center'>
						<?
							if(V('r:catid') == 2){
						?>
							<a href="<?= URL('mgr/system.chapter','sid='.$val['id']);?>">章节列表</a> |
						<?
							}
							if(V('r:catid') == 3 || V('r:catid') == 4){
						?>
							<a href="<?= URL('mgr/system.chapter','sid='.$val['id']);?>">关联课程</a> |
						<?
							}
						?>
						<a href="<?= URL('mgr/modelForm.add','modelid=11&catid='.V('g:catid').'&id='.$val['id']);?>">编辑</a> 
						 | <a href="javascript:confirmUrl('<?= URL("mgr/modelForm.delete","modelid=11&catid=".V('g:catid').'&id='.$val['id'])?>','您确定要删除ID“<?= $val['id'];?>”的信息吗？');">删除</a>
						</td>
                    </tr>
                    <?php }}else{?>
                    <tr><td colspan="6" style="text-align:center; line-height:40px; color:#666;">没有查询到与条件相匹配的数据</td></tr>
                    <?php }?>
            	</tbody>
            </table>
            
            <div class="btn">
            	<a href="javascript:;" class="btn-general" onclick="checkAll('myform');"><span>全选/反选</span></a>
                <a href="javascript:chkallurl('id','<?= URL("mgr/modelForm.delete","modelid=11&catid=".V('g:catid'))?>','您确定要删除选中的信息吗？');" class="btn-general"><span><img src="<?= IMG_PATH;?>admin_img/delete.png" style="float:left; padding-top:2px;">批量删除</span></a>
            </div>
            
            <div id="pages"><?= $pager;?></div>
        </div>
    </form>
</div>

<script type="text/javascript">
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
function more_search(){
	$('#more_search').toggle();
	if($('#more_search').css('display') == 'none'){
		$('#more_search_img').attr('src','<?= IMG_PATH;?>admin_img/toggle-expand-dark.png');
	}else{
		$('#more_search_img').attr('src','<?= IMG_PATH;?>admin_img/toggle-collapse-dark.png');
	}
}
// 判断选中项 返回选中值
function ischeckedItems(itemname) {
	var str = 0;
	var id = tag = '';
	$("input[name='"+itemname+"[]']").each(function() {
		if($(this).attr('checked') == true) {
			str = 1;
			id += tag+$(this).val();
			tag = ',';
		}
	});
	if(str == 0) {
		$.dialog.alert('您未选中任何项！');
	}
	return id;
}
// 操作选中项
function chkallurl(itemname,url,msg){
   var idstr = ischeckedItems(itemname);
   if(idstr != ""){
		$.dialog.confirm(msg,function (){
			window.location = url+"&id="+idstr;
		});
   }
}
// 设置
function setting(){
	$.dialog({
		id:'setting',
		title:'设 置',
    	content: '每页显示：<input type="text" class="input-text" value="<?= $setting['pageSize'] ? $setting['pageSize'] : 10;?>" size="5" id="setPageSize">条<br /><div style="height:5px;"></div>列宽设置：<input type="text" class="input-text" value="<?= $setting['thWidth'];?>" size="35" id="setWidth">',
		cancel: true,
		cancelVal: '关闭',
		ok: function(){
			$.post('<?= URL('mgr/modelForm.setting','modelid='.V('g:modelid'));?>',{"thWidth":$('#setWidth').val(),"pageSize":$('#setPageSize').val()},function (e){
				if(e){
					location.reload();
				}else{
					$.dialog.alert('设置失败');
				}
			});
		}
	});
}
</script>
</body>
</html>