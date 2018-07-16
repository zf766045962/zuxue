<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$linkname?>分类管理</title>
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
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?=$linkname?>分类管理<span>&gt;</span><?=$linkname?></p></div>
        <div class="main-cont">
        <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/link.addclass&bid='.$bid)?>"><span>添加<?=$linkname?>分类</span></a>
        <a class="btn-general"  href="<?php echo URL('mgr/link.classlist&bid='.$bid)?>"><span><?=$linkname?>分类列表</span></a>
        <?=$linkname?>分类列表</h3>
		<div class="set-area">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>

					<col class="w70" />
					<col/>
					<col/>
                    <col class="w100" />
                    <col class="w70" />
					<col class="w250" />
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>

						<th><div class="th-gap">分类名称</div></th>	
						<th><div class="th-gap">英文名称</div></th>	
                        <th><div class="th-gap">编辑内容</div></th>
                        <th><div class="th-gap">排序</div></th>		
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
				<?php
                	if(isset($classlist) && !empty($classlist))
					{
						$num = 0;
						foreach($classlist as $rs)
						{
							if(intval($rs["parentid"])==0)
							{
								$num = $num + 1 ;
				?>
				<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?=$num?> - <?php echo $rs['classid'];?></td>
                   <td><div class="td-nowrap"><?php echo $rs['classname']?></div>
                   <td><div class="td-nowrap"><?php echo $rs['uunique']?></div>
                   </td>
                    <td><a class="icon-edit" href="<?=URL("mgr/link","bid=".$rs["bid"]."&classid=".$rs["classid"]."")?>">编辑内容</a></td>
                    <td><?=$rs["lmorder"]?></td>
                    <td>
                    	 <a class="icon-add" href="<?=URL("mgr/link.addclass","bid=".$rs["bid"]."&classid=".$rs["classid"]."")?>">添加子栏目</a>
                       <a class="icon-edit" href="<?=URL("mgr/link.addclass","bid=".$rs["bid"]."&classid=".$rs["classid"]."&id=".$rs["classid"]."")?>">修改</a>
                        <a class="icon-del" href="javascript:delConfirm('<?=URL("mgr/link.delclass","bid=".$rs["bid"]."&id=".$rs["classid"]."")?>','您确定要删除此分类信息吗？');">删除</a>
                    </td>
                    </tr>
                    <?php
							}
							$num2 = 0 ;
							foreach($classlist as $rss)
							{
								if($rss["parentid"] == $rs["classid"])
								{
									$num2 = $num2 + 1;
					?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?=$num2?> - <?php echo $rss['classid'];?></td>
                   <td><div class="td-nowrap">┋┣&nbsp;<?php echo $rss['classname']?></div>
                   <td><div class="td-nowrap">┋┣&nbsp;<?php echo $rss['uunique']?></div>
                   </td>
                    <td><a class="icon-edit" href="<?=URL("mgr/link","bid=".$rss["bid"]."&classid=".$rss["classid"]."")?>">编辑内容</a></td>
                    <td><?=$rss["lmorder"]?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <a class="icon-edit" href="<?=URL("mgr/link.addclass","bid=".$rss["bid"]."&classid=".$rss["classid"]."&id=".$rss["classid"]."")?>">修改</a>
                        <a class="icon-del" href="javascript:delConfirm('<?=URL("mgr/link.delclass","bid=".$rss["bid"]."&id=".$rss["classid"]."")?>','您确定要删除此分类信息吗？');">删除</a>
                    </td>
                    </tr>
                  
                    <?php
									
								}
							}
							$num2 = 0 ;
						}
						$num=0;
					}
					else
					{
					?>
                    <tr>
						<td colspan="6">
                        	<?php if(!empty($list)){ echo $page;} else {?>
                             <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
							<?php }?>		
						</td>
					</tr>
                  <?php
					}
				  ?>
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
