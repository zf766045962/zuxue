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

function oper_submit(){
		$("#form1").attr("action","<?php echo URL('mgr/articleclass.move_save_class')?>");
		$("#form1").submit();
	}
	
function quxiao(){
	location='<?php echo URL('mgr/articleclass.classlist&lmid='.$lmid)?>';
	}
</script>

</head>
<body class="main-body">
		<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>内容发布<span>&gt;</span>分类管理</p></div>
        <div class="main-cont">      
                <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/articleclass.addclass&lmid='.$lmid)?>"><span>添加分类</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/articleclass.classlist&lmid='.$lmid)?>"><span>分类列表</span></a>移动分类</h3>
        
        <!--*********************************-->
        	
		<div class="set-area">
        	<div class="form web-info-form">
            	<form action="" name="form1" method="post" id="form1">                      
                     <div class="form-row"><label class="form-field">栏目名称</label><input type="hidden" name="lmid" value="<?php echo $lmid?>" />
                     <div class="form-cont"><?php echo $rss['classname']?></div></div> 
                     
                     <div class="form-row"><label class="form-field">当前所属栏目</label>
                     <div class="form-cont"><?php echo $rss['p']?><input type="hidden" name="classid" value="<?php echo $classid?>" /></div></div> 
                     
                     <div class="form-row"><label class="form-field">移动到：<br />不能指定为当前<br />栏目的下属子栏目<br/>不能指定为外部栏目</label>
                     <div class="form-cont"><select name="parentid" size="2" style="height:300px;width:500px; background:#EEEEEE">
         			<?php echo $info;?>
               </select></div></div> 
        
                    
                    <div class="btn-area">
                    <a href="javascript:;" class="btn-general highlight" onclick="javascript:oper_submit();"><span>保存</span></a>
                    <a href="javascript:;" class="btn-general highlight" onclick="javascript:quxiao();"><span>取消</span></a>
                    </div>
                </form>
            </div>
        </div>
        </div>
       
        <!--**************************************-->
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
