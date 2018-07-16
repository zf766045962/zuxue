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
	
	if (document.form1.original.value=="")
		{
			alert("原字符不能为空！");
			document.form1.original.focus();
			return false;
		}
	
		return true;	
		//$("#form1").attr("action","");
		//$("#form1").submit();

	}
	

function quxiao1(){
	location='<?php echo URL('mgr/keywordsFilter.filterlist');?>';
	}
</script>

</head>
<body class="main-body">
		<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>添加关键字过滤</p></div>
        <div class="main-cont" style=" line-height:3">
        
        <h3 class="title">
         <a class="btn-general" href="<?php echo URL('mgr/keywordsFilter.filterlist')?>"><span>列表</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/keywordsFilter.add')?>"><span>添加</span></a>
        <?php if($flag=='1') echo "修改关键字过滤";else echo "添加关键字过滤"?>
        </h3>
		  <div class="set-area">
        	<div class="form web-info-form">
            <?php if($flag=='1'){?>
            <form action="<?php echo URL('mgr/keywordsFilter.modify_save')?>" name="form1" method="post" id="form1" onsubmit="return oper_submit()">
            <?php }else{?>
            <form action="<?php echo URL('mgr/keywordsFilter.save')?>" name="form1" method="post" id="form1" onsubmit="return oper_submit()">
            <?php }?>
            
            
                        
            <div class="form-row"><label class="form-field">原 字 符</label>
            <div class="form-cont"><input name="original" class="input-txt"  type="text" size="100" value="<?php echo $rss['original']?>" />
           
            <input type="hidden" name="id" id="id" value="<?php echo $rss['id']?>" />
            </div></div>
  
                        
              <div class="form-row"><label class="form-field">欲替换成新字符</label>
                        <div class="form-cont"> <input name="replace" class="input-txt"  type="text" size="100" value="<?php echo $rss['replace']?>" /> </div></div>
 

			 <div class="btn-area"><input type="submit" value="保 存"/>       
                    <a href="javascript:;" class="btn-general highlight" onclick="javascript:quxiao1();"><span>取消</span></a>
                    </div>
            </form>
            </div></div>
		
        </div>
        
        </div> 

</body>
</html>
