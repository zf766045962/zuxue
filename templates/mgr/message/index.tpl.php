<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ubbname?>分类管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>

<!--日历插件 Start-->
<link href="<?php echo W_BASE_URL;?>js/date/date.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/date/date.js"></script>
<!--日历插件 Stop-->
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


</script>

</head>
<body class="main-body">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>留言管理</p></div>

	   <div class="main-cont">
        <h3 class="title">留言分类列表</h3>
		<div class="">
        <form id="form1" name="form1" method="post" action="<?=URL("mgr/message","bid=".V("r:bid")."")?>">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table" style="margin-bottom:5px;">
            <tr>
              <td>
                                         
                  <label for="name">姓名：</label>
                  <input type="text" name="name" id="key" value="<?=V("r:key")?>" /> 
                  
                  
                  <input type="submit" name="button" id="button" value="搜索" />
              </td>
            </tr>
          </table>
        </form>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col style="width:35px;" />
					<col style="width:50px;" />
					<col style="width:100px;" />
					<col style="width:150px;" />
					
                    <col style="width:150px;" />
                    <col style="width:200px;" />
                    <col style="width:150px;" />
					<col style="width:100px;" />
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">&nbsp;</div></th>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">姓名</div></th>
                        <th><div class="th-gap">联系电话</div></th>
                        
						<th><div class="th-gap">Email</div></th>
						<th><div class="th-gap">发表时间</div></th>
						<th><div class="th-gap">客户IP</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>

				<tbody id="recordList">
				<?php 
				$num=0;
				if(isset($newslist)&&!empty($newslist)){
					foreach($newslist as $key=>$val){
						$num+=1;
				?>				 
				<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><input type="checkbox" name="id" value="<?php echo $val['id']?>" id="id" /></td>
                    <td>&nbsp;<?php echo $num?>.</td>
                    <td><?php echo !empty($val['name'])?F("filter.cutStr",$val['name'],20):''?></td>
                    <td><?php echo !empty($val['tel'])?$val['tel']:''?></td>
					
                    <td><?php echo !empty($val['email'])?F("filter.cutStr",$val['email'],30):''?></td>
                    <td><?php echo !empty($val['addtime'])?date('Y-m-d H:i:s',$val['addtime']):''?></td>
					<td><?php echo !empty($val['ip'])?F("filter.cutStr",$val['ip'],30):''?></td>
					<td>
						<a class="icon-edit" href="<?php echo URL('mgr/message.edit','id='.$val['id'].'&bid='.V("r:bid").'');?>">查看</a>
                        <a class="icon-del" href="javascript:delConfirm('<?=URL("mgr/message.delmessage","id=".$val['id']."&bid=".V("r:bid")."&page=".V("r:page",1)."")?>','您确定要删除此链接吗？');">删除</a>
					</td>
                 </tr>
				<?php			
					}
				}
				?> 
                  <tr>
              		<td colspan="8">
                    	<?php 
							if(isset($newslist)&&!empty($newslist)){
						?>
                        	<input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?=URL("mgr/message.delmessage","id=".$val['id']."&bid=".V("r:bid")."&page=".V("r:page",1)."&key=".urlencode(V("r:key"))."")?>','您确定要删除选中的信息吗？')" />&nbsp;&nbsp;&nbsp;&nbsp;
                		<?php echo $pager;?>
                        <?php		
							}else{
						?>
                         <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
                        <?php		
							}
						?>
                    </td>
                  </tr>  	
				</tbody>
			</table>
            </div>
            <div style="width:500px;height:30px;float:left;margin-left:350px;">
                	
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
