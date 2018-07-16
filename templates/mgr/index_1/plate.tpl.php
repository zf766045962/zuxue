<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$adname?>分类管理</title>
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
	  <p>当前位置：后台管理<span>&gt;</span><?=$adname?>分类管理<span>&gt;</span><?=$adname?></p></div>
        <div class="main-cont">
        <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/index_1.adplate','&fub='.V('r:fub').'&bid='.V('r:bid'))?>"><span>添加板块</span></a>
       <?php /*?> <a class="btn-general"  href="<?php echo URL('mgr/index_1.plate')?>"><span><?=$adname?>板块列表</span></a><?php */?>
        <?= $adname?>分类列表</h3>
		<div class="set-area">
			 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
		<colgroup>
			
				<col class="w60"/>
				<col/>
				<col class="w280" />
				<col class="w130" />
                <col class="w130" />
                <col class="w130" />
                <col class="w50" />
				<col class="w100" />
				<col class="w130" />
				</colgroup>
            <tr>
            
              <td>编号</td>
              <td>标题</td>
              <td>简介</td>
			   <td>今日发帖数量</td>
			  <td>昨天发帖数量</td>
			  <td>一共发帖数量</td>
              <td>排序</td>
			  <td>查看帖子</td>
              <td>操作</td>
            </tr>
            <?php
				if (isset($classlist) && !empty($classlist))
				{
					$num = 0;
					foreach($classlist as $rs)
					{
						$num = $num + 1;
			
			 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));	

			 $couunm = DS('publics.get_total','','bbs_post','fid='.$rs['fid'] . ' and '. 'dateline'.'>'. $beginToday);	
			
			 
			 $beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
 			 $endYesterday=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
			 $couunm1= DS('publics.get_total','','bbs_post','fid='.$rs['fid'] . ' and dateline'.'>'. $beginYesterday.' and dateline'.'<'. $endYesterday);		
						
			$couunm3 = DS('publics.get_total','','bbs_post','fid='.$rs['fid']);	 
						
			?>
            <tr>
              
              <td> <?= $rs["fid"];?> </td>
              <td><a href=""><?=$rs["name"]?></a><img src="<?=F("imgurl.geturl",$rs["imgurl"])?>" style="max-width:150px; max-height:50px; float:right;" border="0"  /></td>
              <td><?= $rs["description"];?></td>
			  
              <td><?= $couunm?></td>
			  <td><?= $couunm1?></td>
			  <td><?= $couunm3?></td>
			  
			  
			  <td><?= $rs["displayorder"];?></td>
			  
			  <td><a href="<?php echo URL('mgr/index_1.showtid','&classid='.$rs['fid'])?>">点击查看</a></td>
              <td>
                <a class="icon-edit" href="<?php echo URL('mgr/index_1.adplate','&classid='.$rs['fid'].'&bid='.V('r:bid').'&fub='.V('r:fub'))?>">修改</a>
              	<a class="" href="javascript:del(<?=$rs['fid']?>);"><?=$rs["status"]==0?"<em style='color:red'>未审核</em>":'已审核'?></a>
				
              </td>
            </tr>
            <?php
					}
				}
			?>
            <tr>
              <td colspan="9">
              <?php
              	if (isset($adlist) && !empty($adlist))
				{
					 echo $pager;?>
              <?php
				}
				else
				{
			  ?>
                
              <?php
				}
			  ?>
              </td>
            </tr>
          </table>
            </div>

        </div>
        
        </div> 

    <script type="text/javascript">
		function del(id){
			var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								//document.getElementById('name'+id1).innerHTML = t1
								//document.getElementById("load11").innerHTML=xmlhttp.responseText;
									//var obj1 = eval( "(" + xmlhttp.responseText + ")" );//转换后的JSON对象;
//									if(obj1.status == 202){
//										alert('操作失败')
//										location.href =""	
//										}else{
											location.href =""		
										//}
								}
					}
						xmlhttp.open("GET","<?=URL("mgr/index_1.status",'&id=')?>"+id,true);
						xmlhttp.send();		
			}
	
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
