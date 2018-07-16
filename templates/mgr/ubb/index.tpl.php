<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ubbname?>管理</title>
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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span><?=$ubbname?>管理<span>&gt;</span><?=$ubbname?></p></div>
        <div class="main-cont">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" class="w150" style="border-right:1px dashed #CCC;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<?php
                	if(isset($classlist) && !empty($classlist))
					{
						foreach($classlist as $rs)
						{
							if(intval($rs["parentid"])==0)
							{
				?>
                <tr>
                  <td>
                  <?php 
				  	if(V('r:bid')==5||V('r:bid')==6){
				  ?>
                  <a href="<?=URL("mgr/ubb&bid=".$rs["bid"]."&classid=".$rs["classid"])?>" style="padding:5px; display:block; <?=isset($classid)&&$classid==$rs["classid"]?"background:#CCC;":""?>"><?=$rs["classname"]?></a>
                  <?php 
					}else{
				  ?>
                  <a href="javascript:void(0)" style="padding:5px; display:block; <?=isset($classid)&&$classid==$rs["classid"]?"background:#CCC;":""?>"><?=$rs["classname"]?></a>
                  <?php			
					}
				  ?>
                  </td>
                </tr>
                    <?php
							}
							foreach($classlist as $rss)
							{
								if($rss["parentid"] == $rs["classid"])
								{
					?>
                <tr>
                  <td><a href="<?=URL("mgr/ubb&bid=".$rss["bid"]."&classid=".$rss["classid"])?>" style="padding:5px; display:block; <?=isset($classid)&&$classid==$rss["classid"]?"background:#CCC;":""?>">┆┣&nbsp;<?=$rss["classname"]?></a></td>
                </tr>
                    <?php
									
								}
							}
						}
					}
					else
					{
					?>
                <tr>
                  <td>没有查询到与条件相匹配的数据</td>
                </tr>
                  <?php
					}
				  ?>
              </table>
              </td>
              <td valign="top" style="padding-left:20px;">
              <form  name="form" id="form" method="post" action="<?php echo URL('mgr/ubb.saveubb')?>">
			    <table width="100%" border="0" cellspacing="0" cellpadding="5">
			     
                  <tr>
			        <td><strong>标题：</strong></td>
			        <td><div class="path"><p></span><?=$classname?></p></div></td>
		          </tr>
			     <?php /*?> <tr>
			        <td><strong>图片：</strong></td>
			        <td class="path"><?=upLoad::showUpload('img','imgurl',1,isset($info["imgurl"])?$info["imgurl"]:'')?></td>
		          </tr><?php */?>
			      <tr>
			        <td><strong>内容：</strong></td>
			        <td><?=uEditor::showEditor("content",1,isset($info["content"])?$info["content"]:'')?></td>
		          </tr>
			      <tr>
			        <td>&nbsp;</td>
			        <td align="center"><input type="submit" name="button" id="button" value="确认修改" />
		            <input type="hidden" name="id" id="id" value="<?=isset($info["id"])?$info["id"]:''?>" />
		            <input type="hidden" name="classid" id="classid" value="<?=isset($classid)?$classid:V("g:classid")?>" />
		            <input type="hidden" name="bid" id="bid" value="<?=V("g:bid")?>" /></td>
		          </tr>
                 
              </table>
              </form>
              </td>
            </tr>
          </table>
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
