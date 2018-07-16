<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>未开发供</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>未开发功能</p></div>
    <div class="main-cont">
        <h3 class="title">功能模块</h3>
		<div class="set-area">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w70" />
					<col />
					<col class="w140" />
					<col class="w170" />
					<col class="w100" />
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">标题内容</div></th>
						<th><div class="th-gap">字段1</div></th>
						<th><div class="th-gap">字段2</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
				<tfoot class="tb-tit-bg">
					<tr>
						<td colspan="5">
							<div class="pre-next">
	 							后台管理样式示例
							</div>
						</td>
					</tr>
				</tfoot>
				<tbody id="recordList">
					<tr>
						<td>1</td>
						<td class="td-hover">
							<div class="td-mar td-unfold">
								 索引内容1
							</div>
							<p class="fold-cotrol"><a href="#this"  name="show" class="hidden">更多&gt;&gt;</a></p>
						</td>
						<td><?php echo date('Y-m-d H:i', time());?></td>
						<td><div class="td-nowrap">
								字段内容
							</div>
						</td>
						<td>
							<a class="icon-del" href="javascript:delConfirm('<?php echo URL('mgr/developing.del', 'id=3' , 'admin.php');?>','确认要删除该信息吗');">删除</a></td>
					</tr>

				</tbody>
			</table>
            
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
