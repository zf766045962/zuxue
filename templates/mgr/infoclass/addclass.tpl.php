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


	function oper_submit()
	{
		if (document.form1.classname.value=="")
		{
			alert("栏目名称不能为空！");
			document.form1.classname.focus();
			return false;
		}
		if(document.form1.lmorder.value!=""){
		if(isNaN(document.form1.lmorder.value)){ 
			alert("栏目模块排序必须是数字！");
			document.form1.lmorder.focus();
			return false;
		}
		}
			
		$("#form1").attr("action","<?php echo URL('mgr/infoclass.save_class')?>");
		$("#form1").submit();
	}

	function oper_submit1()
	{
		if (document.form1.classname.value=="")
		{
			alert("栏目名称不能为空！");
			document.form1.classname.focus();
			return false;
		}
		if(document.form1.lmorder.value!=""){
		if(isNaN(document.form1.lmorder.value)){ 
			alert("栏目模块排序必须是数字！");
			document.form1.lmorder.focus();
			return false;
		}
		}
			
		$("#form1").attr("action","<?php echo URL('mgr/infoclass.modify_class')?>");
		$("#form1").submit();
	}
	
	function quxiao(){
		location="<?php echo URL('mgr/infoclass.info')?>";
		}
</script>

</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>信息分类管理<span>&gt;</span>分类管理</p></div>
        <div class="main-cont" style="line-height:3">
        <?php if(!empty($rss)){ ?>
        <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/infoclass.addclass')?>"><span>添加分类</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/infoclass.info')?>"><span>信息分类列表</span></a>修改分类</h3>
        <div class="set-area"><div class="form web-info-form">
        <form action="" name="form1" method="post" id="form1">
        
        <div class="form-row"> <label class="form-field">所属栏目</label>
        <div class="form-cont"><?php echo $rss['p']?><input type="hidden" name="classid" class="input-txt" value="<?php echo $classid?>" /></div></div>
        
         <div class="form-row"> <label class="form-field">栏目名称</label>
         <div class="form-cont"><input name="classname" class="input-txt" style="width:261px" type="text" size="50" value="<?php echo $rss['classname']?>"></div></div>
         
          <?php if($rss['parentid']==0){?>
          <div class="form-row"> <label class="form-field">英文唯一名称</label>
          <div class="form-cont"><input name="uunique" class="input-txt" style="width:261px" type="text" value="<?php echo $rss['uunique']?>" size="50"></div></div>
           <?php }?>
           
           <div class="form-row"> <label class="form-field">栏目模块排序</label>
           <div class="form-cont"><input name="lmorder" type="text" class="input-txt" style="width:261px" size="50" maxlength="20" value="<?php  if($rss['lmorder']) echo $rss['lmorder'];else echo "0"?>"><p class="form-tips">（排序必须是数字,从小到大排序）</p></div></div>
           
         <div class="form-row"> <label class="form-field">栏目说明</label>
         <div class="form-cont"><textarea name="readme" class="input-area area-s4 code-area" cols="50" rows="4" id="readme"><?php echo $rss['readme']?></textarea></div></div>
         
         <?php if($rss['parentid']==0){?>
         <div class="form-row"> <label class="form-field">栏目属性</label>
         <div class="form-cont"><input type="checkbox" name="sys_statue" value="1" <?php if($rss['sys_statue']) echo "checked";?>/>设为系统栏目&nbsp;&nbsp;<span style="color:#F00">* 只作用于一级栏目，设置后栏目不可删除</span></div></div>
         <?php }?>
        
        <div class="btn-area"><a href="javascript:;" class="btn-general highlight" onclick="javascript:oper_submit1();"><span>保存</span></a>
        <a href="javascript:;" class="btn-general highlight" onclick="javascript:quxiao();"><span>取消</span></a>
        </div>
        </form>
        </div></div>
        <?php } else {?>
<!--*******************************-->
   <h3 class="title"><a class="btn-general" href="<?php echo URL('mgr/infoclass.addclass')?>"><span>添加分类</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/infoclass.info')?>"><span>信息分类列表</span></a>
        添加分类</h3>		

	 <div class="set-area"><div class="form web-info-form">
        <form action="" name="form1" method="post" id="form1">
        
        <div class="form-row"> <label class="form-field">所属栏目</label>
        <div class="form-cont"><select name="parentid" style="background-color:#EEEEEE">
			<?php echo $info?>
        </select></div></div>
        
        <div class="form-row"> <label class="form-field">栏目名称</label>
        <div class="form-cont"><input name="classname" class="input-txt" style="width:261px" type="text" size="50"><span style="color:#F00">* </span></div></div>
        
        <div class="form-row"> <label class="form-field">英文唯一名称</label>
        <div class="form-cont"><input name="uunique" class="input-txt" style="width:261px" type="text" size="50"><span style="color:#F00"> 只作用于一级栏目</span></div></div>
        
         <div class="form-row"> <label class="form-field">栏目模块排序</label>
         <div class="form-cont"><input name="lmorder" type="text" class="input-txt" style="width:261px" size="50" maxlength="20" value="0"><span> 排序必须是数字,从小到大排序</span></div></div>
         
          <div class="form-row"> <label class="form-field">栏目说明</label>
          <div class="form-cont"><textarea name="readme" class="input-area area-s4 code-area" cols="50" rows="4" id="readme"></textarea></div></div>
          
         <div class="form-row"> <label class="form-field">栏目属性</label>
         <div class="form-cont"><input type="checkbox" name="sys_statue" value="1" />设为系统栏目 &nbsp;&nbsp;<span style="color:#F00">* 只作用于一级栏目，设置后栏目不可删除</span></div></div>
         
          <div class="btn-area"><a href="javascript:;" class="btn-general highlight" onclick="javascript:oper_submit();"><span>保存</span></a>
        <a href="javascript:;" class="btn-general highlight" onclick="javascript:quxiao();"><span>取消</span></a>
        </div>
        </form>
        </div></div>

  <!--********************************************-->
  <?php }?>
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
