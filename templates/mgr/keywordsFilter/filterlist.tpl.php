<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php header('Cache-control: private, must-revalidate');?> 
<title>内容管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>

<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/kind/kindeditor.js"></script>

<script src="<?php echo W_BASE_URL;?>js/keywordsFilter.js" type="text/javascript"></script>

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
	if (document.form1.serch1.value=="iid" && isNaN(document.form1.detail.value))
		{
			alert("id必须为数字！");
			document.form1.detail.focus();
			return false;
		}
	return true;
	}
</script>

</head>
<body class="main-body">
		<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>内容管理<span>&gt;</span>内容发布<span>&gt;</span>关键字列表</p></div>
        <div class="main-cont" style=" line-height:3">
        <h3 class="title">
        <a class="btn-general" href="<?php echo URL('mgr/keywordsFilter.filterlist')?>"><span>列表</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/keywordsFilter.add')?>"><span>添加</span></a>
        关键字过滤列表</h3>

		  <div class="set-area" id="data_list">
	        <div class="yang_info">
				<form action="<?php echo URL('mgr/keywordsFilter.filterlist')?>" name="form1" method="post" id="form1" onsubmit="return check()">
				<select class="select1" name="serch1">
				<option value="0">请选择……</option>
				<option value="original" <?php if($data['serch1']=='original') echo "selected"?>>原字符</option>
				<option value="iid" <?php if($data['serch1']=='iid') echo "selected"?>>id</option>
				</select>
				<input class="text1" type="text" name="detail" value="<?php echo $data['detail']?>"/>
				<input class="submit" type="submit" value="搜 索" />
				</form>
			</div>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
                	<col class="w40" />
					<col class="w70" />
					<col/>
                    <col style="width:450px" />
					<col class="w130" />
	
					
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
                    	<th><div class="th-gap">&nbsp;&nbsp;</div></th>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">原 字 符</div></th>  	
                        <th><div class="th-gap">替换成的新字符</div></th>	
                   
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
                 <?php if(!empty($rss)){ 
				 foreach($rss as $key=>$val){
				 ?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><input type="checkbox" name="id" value="<?php echo $val['id']?>" /></td>
                    <td><?php echo $val['id']?></td>
                   <td><div class="td-nowrap"><?php echo $val['original']?></div>
                   </td>
                  
                   
                   <td><div class="td-nowrap"><?php echo $val['replace'] ?></div> </td>
                   
                   
                 
                    <td>
					<?php $canshu="&serch1=".$data['serch1'];
					if($data['detail']!='') $canshu.="&detail=".$data['detail'];
					if(V('r:page')) $canshu.="&page=".V('r:page');
					?>
 
  						<a class="icon-edit" href="<?php echo URL('mgr/keywordsFilter.modify','id='.$val['id'])?>">修改</a>
                        <a class="icon-del" href="javascript:delConfirm('<?php echo URL('mgr/keywordsFilter.del', 'id='.$val['id'].$canshu, 'admin.php');?>','确定要将该条信息删除吗？');">删除</a>
       </td>
                    </tr>	
			<?php } }?>
					<tr>
						<td colspan="5">
                            <?php if(!empty($rss)){ ?>
  						   <input class="button" type="button" name="chkall" id="chkall" onclick="checkAll('data_list')" value="全选/反选" />
   						   <input class="button" type="button" id="remove" name="remove" value="批量删除" />
							<div class="yang_page">
						   <?php echo $page; } else {?>	
                           <div class='guide_info content_none'>没有查询到与条件相匹配的数据</div>
                           <?php }?>
						   </div>				
						</td>
					</tr>
			
			
				
				</tbody>
			</table>
            </div>
          

        </div>
        
        </div> 

    
</body>
</html>
