<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>内容管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
</head>
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
<body class="main-body">
		<div class="path">
	  	<p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>内容发布</div>
        <div class="main-cont" style=" line-height:24px">
        
        <h3 class="title">
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&statue=1&lmid='.$lmid)?>"><span>回收站</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&modelid='.V('r:modelid').'&catid='.V('r:catid'))?>"><span>内容列表</span></a>
       <?php /*?> <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.add&lmid='.$lmid)?>"><span>内容发布</span></a><?php */?>
        <?php if($flag=='1') echo "修改内容";else echo "内容发布"?>
        </h3>
		  <div class="set-area" style="position:relative;">
		  <SCRIPT language=javascript>
        function ycxy()
        {
        ycxys = document.getElementById("ycxy2");
        if (ycxys.style.display == 'none')
        {
        ycxys.style.display = '';
		document.getElementById("ycxy_btn").style.background="url('css/admin/bgimg/xianyin.png') right no-repeat";
		document.getElementById("ycxy_btn").style.right="194px";
		document.getElementById("ycxy1").style.display="";
        }
        else
        {
        ycxys.style.display = 'none';
		document.getElementById("ycxy_btn").style.background="url('css/admin/bgimg/xianyin.png') 2px no-repeat";
		document.getElementById("ycxy_btn").style.right="-10px";
		document.getElementById("ycxy1").style.display="none";
        }
        return;
        }

function quxiao1(){
	location.href="<?= URL('mgr/arcticlepublish.articlelist&statue=0&modelid='.$mid.'&catid='.$cid);?>";
}
</SCRIPT><div id="ycxy_btn"><a onclick="ycxy()" href="javascript:void(0);"></a></div>
		  <form action="<?= URL('mgr/arcticlepublish.save')?>" name="form1" method="post" id="form1" onsubmit="return oper_submit()">
          <table class="yc">
		  <tr>
			 <td valign="top" style="border-right:1px #DFDFDF solid; overflow:auto; overflow-y:hidden;">
			 
        	<div class="form web-info-form" style="overflow:hidden;">
			
            <?= $html_left;?>
			
			<script type="text/javascript">
				var editor = new UE.ui.Editor();editor.render("content");
				 //1.2.4以后可以使用一下代码实例化编辑器
    			//UE.getEditor('myEditor')
			</script>
           
			 <div class="btn-area">	
			 <input type="hidden" name="catid" value="<?= $cid?>" />
				
                  <a class="btn-general highlight" onclick="$('#newsBtn').click();"><span>保存</span></a>
                    
				  <input type="submit" class="submit2" id="newsBtn" value="保存" style="width:72px; height:25px; text-align:center; background:url(./img/btn.jpg) no-repeat; line-height:25px; border:0; float:left; margin-right:15px;display:none;" />
                  <a href="javascript:;" class="btn-general highlight" onclick="quxiao1();" >
				  <span>取消</span></a>
				  <div style="clear:both;"></div>
             </div>
            
            </div>
			</td>
			<td width="10" id="ycxy1" style="z-index:0"></td>
			<td width="190" id="ycxy2" valign="top" style="border-left:1px #DFDFDF solid; overflow:auto; overflow-y:hidden;">
		     <!--右边开始-->
		     <div class="col_right">
    	    <div class="col-1">
        	<div class="content pad-6">
             
	<!--发布时间 结束-->
			<h6>发布者</h6>
			<input type="text" name="username" value="<?php if(!empty($username)){echo $username;}else{echo USER::get('screen_name');}?>" class="date input-txt"/><br><br>
            <?= $html_right?>
				
            </div>
        </div>
    </div>
    <input type="hidden" name="data[modelid]" value="<?=V("r:modelid")?>" />
    <input type="hidden" name="data[id]" value="<?=V("r:id")?>" />

    
    <script>
    	function oper_submit()
		{
			<?=$js?>
		}
    </script>
    <?= $times?>
	 		 <!--右边结束-->
			 </td>
			</tr>
			</table>
          </form>  
            
			</div>
		
        </div>
        
        </div> 


</body>
</html>
