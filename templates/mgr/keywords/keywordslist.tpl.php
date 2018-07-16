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

<script src="<?php echo W_BASE_URL;?>js/keywords.js" type="text/javascript"></script>

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
        <a class="btn-general" href="<?php echo URL('mgr/keywords.keywordslist')?>"><span>关键字列表</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/keywords.add')?>"><span>添加关键字</span></a>
        关键字列表</h3>

		  <div class="set-area" id="data_list">
			<div class="yang_info">
				<form action="<?php echo URL('mgr/keywords.keywordsList')?>" name="form1" method="post" id="form1" onsubmit="return check()">
				<select class="select1" name="serch1">
				<option value="0">请选择……</option>
				<option value="keywords" <?php if($data['serch1']=='keywords') echo "selected"?>>关键字</option>
				<option value="iid" <?php if($data['serch1']=='iid') echo "selected"?>>id</option>
				</select>
				<input class="text1" type="text" name="detail" value="<?php echo $data['detail']?>"/>
				<div class="text2">属性：</div>
				<select class="select1" name="serch2">
				<option value="0">请选择……</option>
				<option value="levels0" <?php if($data['serch2']=='levels0') echo "selected"?>>未推荐</option> 
				<option value="levels1" <?php if($data['serch2']=='levels1') echo "selected"?>>已推荐</option>
				<option value="isshow0" <?php if($data['serch2']=='isshow0') echo "selected"?>>未显示</option> 
				<option value="isshow1" <?php if($data['serch2']=='isshow1') echo "selected"?>>已显示</option> 
				</select>
				<input class="submit" type="submit" value="搜 索" />
				</form>
			</div>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
                	<col class="w40" />
					<col class="w70" />
					<col/>
                    <col class="w50" />
                    <col class="w80" />
                    <col class="w80" />

                    <col class="w80" /> 
					<col class="w190" />
	
					
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
                    	<th><div class="th-gap">&nbsp;&nbsp;</div></th>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">关键字</div></th>  	
                        <th><div class="th-gap">排序</div></th>	
                        <th><div class="th-gap">搜索次数</div></th>
                        <th><div class="th-gap"> 是否推荐</div></th>
                       
                        <th><div class="th-gap">是否显示</div></th>
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
                   <td><div class="td-nowrap"><?php echo mb_substr($val['keywords'],0,40,'utf-8')?></div>
                   </td>
                  
                   
                   <td><div class="td-nowrap"><?php echo $val['list'] ?></div> </td>
                   
                   
                    <td><div class="td-nowrap"><?php echo $val['serchnum']?></div></td>
                    <td><div class="td-nowrap"><?php if($val['levels']==1) echo "是";else echo "否";?> </div></td>

                  <td><div class="td-nowrap"><?php if($val['isshow']==1) echo "是";else echo "否";?> </div></td>
                    <td>
					<?php $canshu="&serch1=".$data['serch1']."&serch2=".$data['serch2'];
					if($data['detail']!='') $canshu.="&detail=".$data['detail'];
					if(V('r:page')) $canshu.="&page=".V('r:page');
					?>
                     
                    
                    <?php if($val['levels']){?>
                    <a  href="<?php echo URL('mgr/keywords.xietui','id='.$val['id']).$canshu?>">解推</a>&nbsp;
                    <?php }else {?>
                    <a   href="<?php echo URL('mgr/keywords.tuijian','id='.$val['id']).$canshu?>">推荐</a>&nbsp;
                    <?php }?>
                    
                     <?php if($val['isshow']){?>
                    <a  href="<?php echo URL('mgr/keywords.jiexian','id='.$val['id']).$canshu?>">解显</a>&nbsp;
                    <?php }else {?>
                    <a   href="<?php echo URL('mgr/keywords.xianshi','id='.$val['id']).$canshu?>">显示</a>&nbsp;
                    <?php }?>
  						<a class="icon-edit" href="<?php echo URL('mgr/keywords.modify','id='.$val['id'])?>">修改</a>
                        <a class="icon-del" href="javascript:delConfirm('/admin.php?m=mgr/keywords.del&id=<?php echo $val['id'].$canshu;?>','确定要将该条信息删除吗？');">删除</a>
       </td>
                    </tr>	
			<?php } }?>
					<tr>
						<td colspan="8">
                         
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
