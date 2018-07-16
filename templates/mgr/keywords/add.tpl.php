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

<script>
function oper_submit(){
	
	if (document.form1.keywords.value=="")
		{
			alert("关键字不能为空！");
			document.form1.keywords.focus();
			return false;
		}
	
	if(document.form1.list.value!=""){
		if(isNaN(document.form1.list.value)){ 
			alert("排序必须是数字！");
			document.form1.list.focus();
			return false;
		}
		}
	if(document.form1.serchnum.value!=""){
		if(isNaN(document.form1.serchnum.value)){ 
			alert("搜索数量必须是数字！");
			document.form1.serchnum.focus();
			return false;
		}
		}
		return true;	
		//$("#form1").attr("action","");
		//$("#form1").submit();

	}
	

function quxiao1(){
	location='<?php echo URL('mgr/keywords.keywordslist');?>';
	}
</script>

</head>
<body class="main-body">
		<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>添加关键字</p></div>
        <div class="main-cont" style=" line-height:3">
        
        <h3 class="title">
         <a class="btn-general" href="<?php echo URL('mgr/keywords.keywordslist')?>"><span>关键字列表</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/keywords.add')?>"><span>添加关键字</span></a>
        <?php if($flag=='1') echo "修改关键字";else echo "添加关键字"?>
        </h3>
		  <div class="set-area">
        	<div class="form web-info-form">
            <?php if($flag=='1'){?>
            <form action="<?php echo URL('mgr/keywords.modify_save')?>" name="form1" method="post" id="form1" onsubmit="return oper_submit()">
            <?php }else{?>
            <form action="<?php echo URL('mgr/keywords.save')?>" name="form1" method="post" id="form1" onsubmit="return oper_submit()">
            <?php }?>
            
            
                        
            <div class="form-row"><label class="form-field">关键字</label>
            <div class="form-cont"><textarea name="keywords" class="input-area" style="width:250px; height:50px" id="keywords"><?php echo $rss['keywords']?></textarea>
            <span>(多关键字用分号；分开)</span>
            <input type="hidden" name="id" id="id" value="<?php echo $rss['id']?>" />
            </div></div>
            
             <div class="form-row"><label class="form-field">排 序</label>
                        <div class="form-cont"> <input name="list" class="input-txt"  type="text" size="100" value="<?php if($rss['list']) echo $rss['list']; else echo '0'?>" /> <span>必须为数字，排序按从小到大排序,默认为0</span></div></div>
            
            <div class="form-row"><label class="form-field">搜索数量</label>
                        <div class="form-cont"><input name="serchnum" class="input-txt"  type="text" size="100" value="<?php if($rss['serchnum']) echo $rss['serchnum'];else echo "0";?>"/>
                        </div></div>
                        
              <div class="form-row"><label class="form-field">url</label>
                        <div class="form-cont"> <input name="url" class="input-txt"  type="text" size="100" value="<?php echo $rss['url']?>" /> <span>例：http://www.baidu.com</span></div></div>
                        
 
            <div class="form-row"><label class="form-field">相关设置</label>
            <div class="form-cont"><input class="icon-check" type="checkbox" name="levels" value="1" <?php if($rss['levels']) echo "checked"?>/>推荐&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="icon-check" type="checkbox" name="isshow" value="1" <?php if($rss['isshow']) echo "checked";if(!isset($rss['isshow'])) echo "checked";?>/>显示
            </div></div>

			 <div class="btn-area"><input type="submit" value="保存"/>       
                    <a href="javascript:;" class="btn-general highlight" onclick="javascript:quxiao1();"><span>取消</span></a>
                    </div>
            </form>
            </div></div>
		
        </div>
        
        </div> 

</body>
</html>
