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
			
		$("#form1").attr("action","<?php echo URL('mgr/articleclass.save_class')?>");
		$("#form1").submit();
	}
	
function oper_submit1(){
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
			
		$("#form1").attr("action","<?php echo URL('mgr/articleclass.modify_class')?>");
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
         <a class="btn-general" href="<?php echo URL('mgr/articleclass.classlist&lmid='.$lmid)?>"><span>分类列表</span></a>
         <?php if($flag=='1') echo "修改分类信息"; else echo "添加分类"?>
         </h3>
               
        <div class="set-area">
        	<div class="form web-info-form">
            	<form action="" name="form1" method="post" id="form1">
                
                    <div class="form-row"><label class="form-field">所属栏目</label>
                        <div class="form-cont">
                        <?php if($flag=='1'){?>
         				 <?php echo $rss['p']?><input type="hidden" name="classid" value="<?php echo $classid?>" /></div>
                         <label class="form-field"><a href="<?php echo URL('mgr/articleclass.moveclass&id='.$classid.'&lmid='.$lmid)?>" style="color:#F00">(点此移动栏目)</a></label> 
                         <?php } else {?>
                         <select name="parentid" style="background-color:#EEEEEE">
						  <?php echo $info;?>
                         </select></div>
                         <?php }?>
                         </div>
                     <div class="form-row"><label class="form-field">所属模型</label>
                        <div class="form-cont">
                         <select name="modelid" style="background-color:#EEEEEE">
						 <?php 
						 	if(!empty($sitemodel_list)&&isset($sitemodel_list)){
								foreach($sitemodel_list as $k_model=>$v_model){
									$selet = "";
									if($rss['modelid'] == $v_model['modelid']){
										$selet = ' selected="selected"';
									}
						 ?>
                         <option value="<?php echo !empty($v_model['modelid'])?$v_model['modelid']:""?>"  <?php echo $selet?>><?php echo !empty($v_model['name'])?$v_model['name']:""?></option>
                         <?php 
								}
							}
						 ?>
                         </select>
                         </div>
                     </div>
                         
                     <div class="form-row"><label class="form-field">栏目名称</label><input type="hidden" name="lmid" value="<?php echo $lmid?>" />
                     <div class="form-cont"><input name="classname" class="input-txt" type="text" size="50" value="<?php echo $rss['classname']?>"/></div></div> 
                     
                      <div class="form-row"><label class="form-field">英文唯一名称</label>
                     <div class="form-cont"><input name="uunique" class="input-txt" type="text" size="50" value="<?php echo $rss['uunique']?>"></div></div> 
                     
                      <div class="form-row"><label class="form-field">栏目模块排序</label> 
                      <div class="form-cont"><input name="lmorder" type="text" class="input-txt" size="50" maxlength="20" value="<?php if($rss['lmorder']) echo $rss['lmorder'];else echo "0"?>"/>
                      <p class="form-tips">* 排序必须是数字,从小到大排序</p>
                      </div></div> 
                      
                       <div class="form-row"><label class="form-field">栏目链接地址</label>
                     <div class="form-cont"><input name="classurl" class="input-txt" type="text" size="50" value="<?php echo $rss['classurl']?>"></div></div> 

                      <div class="form-row"><label class="form-field">栏目图片</label>
                     <div class="form-cont"><?php $upload=APP::N('show_upLoad');echo $upload->showUpload('pic',1,'pictureurl',isset($rss["pictureurl"])?$rss["pictureurl"]:'','zh_CN','url3','image3','class="input-txt"');?></div></div>

                      <div class="form-row"><label class="form-field">栏目说明</label> 
                      <div class="form-cont">
                      <textarea name="readme" class="input-area area-s4 code-area" cols="10" rows="10" id="readme"><?php echo $rss['readme']?></textarea></div></div>
                     
                     <div class="form-row"><label class="form-field">关键词</label>
                     <div class="form-cont">
                     <textarea name="keyword" class="input-area area-s4 code-area" cols="10" rows="10"  id="keyword"><?php echo $rss['keyword']?></textarea></div></div>
                     
                    <div class="form-row"><label class="form-field">描述</label>
                    <div class="form-cont">
                    <textarea name="description" class="input-area area-s4 code-area" cols="10" rows="10"  id="description"><?php echo $rss['description']?></textarea></div></div> 
                    
                     <div class="form-row"><label class="form-field">栏目属性</label> 
                      <div class="form-cont"><label><input type="checkbox" class="icon-check" name="elite" value="1" <?php if($rss['elite']==1) echo 'checked'?>/>推荐</label>
                      <label><input type="checkbox" class="icon-check" name="ontop" value="1" <?php if($rss['ontop']==1) echo 'checked'?>/>置顶 </label>
                      </div></div> 
                    
                    <div class="btn-area">
                    <?php if($flag=='1'){?>
                    <a href="javascript:;" class="btn-general highlight" onclick="javascript:oper_submit1();"><span>保存</span></a>
                    <?php } else {?>
                    <a href="javascript:;" class="btn-general highlight" onclick="javascript:oper_submit();"><span>添加</span></a>
                    <?php }?>
                    <a href="javascript:;" class="btn-general highlight" onclick="javascript:quxiao();"><span>取消</span></a>
                    </div>
                </form>
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
