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
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/kind/kindeditor.js"></script>

<script src="<?php echo W_BASE_URL;?>js/article.js" type="text/javascript"></script>

<link href="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.css" rel="StyleSheet">
<script src="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.js" type="text/javascript"></script>

<script>
function checkAll(obj){
	var form_obj=document.getElementById(obj);
	var input_obj=form_obj.getElementsByTagName('input');
	for(i=0;i<input_obj.length;i++){
		if(input_obj[i].type=='checkbox'){
			if(input_obj[i].checked==true){
				input_obj[i].checked='';
			}else{
				input_obj[i].checked='checked';
			}
		}
	}
}
function check(){
	if (document.form1.serch1.value=="aid" && isNaN(document.form1.detail.value))
		{
			alert("文章id必须为数字！");
			document.form1.detail.focus();
			return false;
		}
	return true;
	}
</script>

</head>
<body class="main-body">
		<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>内容发布<span>&gt;</span>文章发布</p></div>
        <div class="main-cont" style=" line-height:3">
        <h3 class="title">
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&statue=1&lmid='.$lmid)?>"><span>回收站</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.articlelist&statue=0&lmid='.$lmid)?>"><span>文章列表</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/arcticlepublish.add&lmid='.$lmid)?>"><span>文章发布</span></a>
        回收站文章列表</h3>
         <div>
        <form action="<?php echo URL('mgr/arcticlepublish.serch')?>" name="form1" method="post" id="form1" onsubmit="return check()">
        <input type="hidden" name="statue" value="1" /><input type="hidden" name="lmid" value="<?php echo $lmid?>" />
        <select name="serch1"><option value="0">请选择……</option><option value="title" <?php if($data['serch1']=='title') echo "selected"?>>标题</option>
        <option value="aid" <?php if($data['serch1']=='aid') echo "selected"?>>文章id</option></select>
        
        <input type="text" name="detail" value="<?php echo $data['detail']?>"/>
        
        属性：<select name="serch2">
        <option value="0">请选择……</option>
        <option value="isreview0" <?php if($data['serch2']=='isreview0') echo "selected"?>>未审核</option> 
        <option value="isreview1" <?php if($data['serch2']=='isreview1') echo "selected"?>>已审核</option> 
        <option value="levels0" <?php if($data['serch2']=='levels0') echo "selected"?>>未推荐</option> 
        <option value="levels1" <?php if($data['serch2']=='levels1') echo "selected"?>>已推荐</option>
         <option value="ontop0" <?php if($data['serch2']=='ontop0') echo "selected"?>>未置顶</option>
         <option value="ontop1" <?php if($data['serch2']=='ontop1') echo "selected"?>>已置顶</option>
           <option value="laydown0" <?php if($data['serch2']=='laydown0') echo "selected"?>>未搁置</option>
         <option value="laydown1" <?php if($data['serch2']=='laydown1') echo "selected"?>>已搁置</option>
        </select>
        
        类别：<select name="classfy"><?php echo $info?></select>
        
        <input type="submit" value="搜 索" />
        </form>
        
        </div>
		  <div class="set-area" id="data_list">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
                	<col class="w40" />
					<col class="w70" />
					<col/>
 
					<col class="w170" />
	
					
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
                 		<th><div class="th-gap">&nbsp;&nbsp;</div></th>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">文章标题</div></th>  	

						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
                 <?php if(!empty($rss)){ 
				 foreach($rss as $key=>$val){
				 ?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                 	<td><input type="checkbox" name="id" value="<?php echo $val['aid']?>" /></td>
                    <td><?php echo $val['aid']?></td>
                   <td><div class="td-nowrap"><?php echo "[".$val['classname']."]".$val['title']?></div>
                   </td>       
                    <td>
                    	<?php $canshu="&lmid=".$lmid."&statue=1&serch1=".$data['serch1']."&serch2=".$data['serch2']."&classfy=".$data['classfy']."";
					if($data['detail']!='') $canshu.="&detail=".$data['detail'];
					?>
                        <a class="icon-edit" href="<?php echo URL('mgr/arcticlepublish.restore'.$canshu,'id='.$val['aid'])?>">还原</a>
                        
                        <a class="icon-del" href="javascript:delConfirm('/admin.php?m=mgr/arcticlepublish.del&id=<?php echo $val['aid'].$canshu?>','确定要彻底删除吗？');">彻底删除</a>
						
                    </td>
                    </tr>	
			<?php } }?>
					<tr>
						<td colspan="4">
                            <?php if(!empty($rss)){ ?>
						 <input type="button" name="chkall" id="chkall" onclick="checkAll('data_list')" value="全选/反选" />
                            <input type="button" id="restoreAll" name="restoreAll" value="批量还原" />
   						   <input type="button" id="remove" name="remove" value="批量删除" />
                           &nbsp;&nbsp;&nbsp;&nbsp;
						   
						   <?php echo $page; } else {?>	
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
