<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息分类管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>


<script src="<?php echo W_BASE_URL;?>js/infoclass.js" type="text/javascript"></script>

<link href="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.css" rel="StyleSheet">
<script src="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.js" type="text/javascript"></script>
<script>
(function($){
$(function() {
	bindSelectAll('#selectAll','#recordList > tr > td > input[type=checkbox]');
});

$(function() {
	$('#start,#end').datepick({
		dateFormat: 'yy-mm-dd',
		showAnim: 'fadeIn'
	});
	<?php if (in_array(V('r:disabled', 'all'), array(1,0,'all')) ) {?>
	$('#disabled').val('<?php echo V('r:disabled', 'all');?>');
	<?php }?>
	$('a[name="show"]').each(function(){
		$(this).click(function(){
			var tdMar = $(this).parent().prev('div');
			if(tdMar.height() == 60){
				tdMar.css({'height':'','overflow':''});
			} else {
				tdMar.css({'overflow':'hidden','height':'60px'});
			}
			if($(this).html()=="更多&gt;&gt;") $(this).html("收起&gt;&gt");
			else $(this).html("更多&gt;&gt");
		})
	});
});
})(jQuery);

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
</script>

</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>信息分类管理<span>&gt;</span><?php echo $lmname?></p></div>
        <div class="main-cont">
        <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/infoclass.addclassfylist&id='.$lmid)?>"><span>添加<?php echo $lmname?></span></a>
        <a class="btn-general" href="<?php echo URL('mgr/infoclass.classfylist&id='.$lmid)?>"><span><?php echo $lmname?>列表</span></a>
        
        <?php echo $lmname?>列表</h3>
		<div class="set-area" id="data_list">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w70" />
                    <col class="w70" />
					<col />
					<col class="w140" />
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
                        <th>&nbsp;</th>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">名称</div></th>	
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                	<?php if(!empty($list)){ $page=$list['page']; unset($list['page']); foreach($list as $key=>$value){?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    
                    <td width="10"><input type="checkbox" class="checkbox" name="id" value="<?php echo $value['contentid']?>" /></td>
                    <td><?php echo $value['contentid']?></td>
                   <td><div class="td-nowrap">[<?php echo $value['classname']?>]<?php echo $value['title']?></div>
                   </td>
                   
                    <td>
                        <a href="<?php echo URL('mgr/infoclass.modifyclassfylist&lmid='.$lmid.'&classid='.$value['classid'].'&contentid='.$value['contentid'])?>">修改</a> 
                        <a class="icon-del" href="javascript:delConfirm('admin.php?m=mgr/infoclass.del_content&id=<?php echo $value['contentid'];?>','确认要删除该信息吗');">删除</a>
                    </td>
                    </tr>
                 	<?php } }?>
                     <tr>
						<td colspan="4">
                        <?php if(!empty($list)){?>
                        <input type="button" name="check_all" id="check_all" onclick="checkAll('data_list')"  value="全选/反选"/>&nbsp;
                        <input type="button" id="RemoveAll" name="RemoveAll" value="批量删除" />
						<?php echo $page; } else {?>	
						 <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
                        <?php }?>	
						</td>
					</tr>
                   		
				</tbody>
			</table>
            </div>

        </div>
        
        </div> 

    <script type="text/javascript">
    	$('.td-hover').each(function(){
			var obj = $(this);
			var del = obj.children('.fold-cotrol').find('a'),tdMar = obj.find('.td-mar');
			if(tdMar.height() > 60) {
				tdMar.css({'overflow':'hidden','height':'60px'});
				obj.hover(function(){
					del.removeClass('hidden');
				},function(){
					del.addClass('hidden');
				});
			}
		});
    </script>
</body>
</html>
