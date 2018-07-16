<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>内容管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script src="<?php echo W_BASE_URL;?>js/album/calendar.js"></script>
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
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>内容发布<span>&gt;</span>分类管理</p></div>
        <div class="main-cont">
        <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/articleclass.recycle&lmid='.$lmid)?>"><span>回收站</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/articleclass.addclass&lmid='.$lmid)?>"><span>添加分类</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/articleclass.classlist&lmid='.$lmid)?>"><span>分类列表</span></a>
        分类列表</h3>
        <div class="set-area">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w70" />
					<col/>
                    <col class="w100" />
                    <col class="w70" />
					<col style="width:320px;" />
	
					
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">分类名称</div></th>	
                        <th><div class="th-gap">栏目属性</div></th>
                        <th><div class="th-gap">排序</div></th>		
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
                 <?php if(!empty($rss)){ 
				 foreach($rss as $key=>$val){
				 ?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?php echo $val['classid']?></td>
                   <td><div class="td-nowrap"><a href="<?php echo URL('mgr/articleclass.modifyclass','id='.$val['classid'].'&lmid='.$lmid)?>"><?php echo $val['classname']?></a>&nbsp;&nbsp;<?php if($val['uunique']) echo "[".$val['uunique']."]"?></div>
                   </td>
                   
                   <td><div class="td-nowrap"><?php if($val['elite']) echo "<span style='margin-right:10px'>推荐</span>"?><?php if($val['ontop']) echo "置顶"?></div> </td>
                   <td><div class="td-nowrap"><?php echo $val['lmorder']?> </div></td>
                   
                    <td>
                    <?php if($val['elite']){?>
                    <a class="icon-edit" href="<?php echo URL('mgr/articleclass.xietui','id='.$val['classid'])?>">解推</a>
                    <?php }else {?>
                    <a class="icon-edit" href="<?php echo URL('mgr/articleclass.tuijian','id='.$val['classid'])?>">推荐</a>
                    <?php }?>
                    
                    <?php if($val['ontop']){?>
                    <a class="icon-edit" href="<?php echo URL('mgr/articleclass.xieding','id='.$val['classid'])?>">解顶</a>
                    <?php }else {?>
                    <a class="icon-edit" href="<?php echo URL('mgr/articleclass.zhiding','id='.$val['classid'])?>">置顶</a>
                    <?php }?>

                    
                    	 <a class="icon-add" href="<?php echo URL('mgr/articleclass.addclass','id='.$val['classid'].'&lmid='.$lmid)?>">添加子栏目</a>
                        <a class="icon-edit" href="<?php echo URL('mgr/articleclass.modifyclass','id='.$val['classid'].'&lmid='.$lmid)?>">修改</a>
                        
                        <a class="icon-del" href="javascript:delConfirm('admin.php?m=mgr/articleclass.tmpdel&id=<?php echo $val['classid']?>','确定要将该栏目及下属栏目放入回收站吗？');">删除</a>
						
                    </td>
                    </tr>	
			<?php } }?>	
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
