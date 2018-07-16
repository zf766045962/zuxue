<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员管理</title>
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
	  <p>当前位置：后台管理<span>&gt;</span><?=isset($flagname)?$flagname:""?></p></div>
        <div class="main-cont">
        <h3 class="title">
        
        <?=isset($flagname)?$flagname:""?></h3>
		<div class="set-area">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>

					<col class="w50" />
					<col class="w70" />
                    <col class="w80" />
					<col class="w220"/>
                    <col class="w200" />
                    <col class="w150" />
                    <col class="w150" />
					<col class="w200" />
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">会员ID</div></th>
                        <th><div class="th-gap">性别</div></th>		
						<th><div class="th-gap">用户名</div></th>	
                        
                        <th><div class="th-gap">邮件</div></th>
                        <th><div class="th-gap">手机号</div></th>
                        <th><div class="th-gap">注册时间</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
				<?php
                	if(isset($userlist) && !empty($userlist))
					{
						$num = 0 ;
						foreach($userlist as $rs)
						{
							$num = $num+1;
				?>
				<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?php echo $num;?> . </td>
                    <td><div class="td-nowrap"><?php echo $rs['id']?></div></td>
                    <td><div class="td-nowrap">
					<?php if($rs['sex']==0){echo '保密';}else if($rs['sex']==1){echo '女';}else if($rs['sex']==2){echo '男';}	?>
                    </div></td>
                    <td><div class="td-nowrap"><?php echo $rs['username']?></div></td>
                    <td><?php echo $rs['email']?></td>
                    <td><?php echo $rs["mobile"]?></td>
                    <td><?php echo $rs["times"]?></td>
                    <td>
<?=$rs["audit"]==1?'<a class="icon-edit" href="'.URL("mgr/users.update","bid=".V("r:bid")."&flagtype=audit&flagvalue=0&id=".$rs["id"]."&audit=".V("r:audit")."&page=".V("r:page",1)."").'" style="color:red;">已审核</a>':'<a class="icon-edit" href="'.URL("mgr/users.update","bid=".V("r:bid")."&flagtype=audit&flagvalue=1&id=".$rs["id"]."&audit=".V("r:audit")."&page=".V("r:page",1)."").'" style="color:#929292;">未审核</a>'?>                    
                    	 <a class="icon-edit" href="<?=URL('mgr/users.add','id='.$rs["id"].'&page='.V("g:page").'')?>">修改</a>
                        <a class="icon-del" href="javascript:delConfirm('<?=URL('mgr/users.del','id='.$rs["id"].'&page='.V("g:page").'')?>','您确定要删除此会员信息吗？');">删除</a>
                    </td>
                    </tr>
                    <?php
						}
					}
					?>
                    <tr>
						<td colspan="8">
                        	<?php if(!empty($userlist)){ echo $pager;} else {?>
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
