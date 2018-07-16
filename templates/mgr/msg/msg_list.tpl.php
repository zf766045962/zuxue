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
<script src="<?php echo W_BASE_URL;?>js/album/calendar.js"></script>
<script type="text/javascript" src="<?php  W_BASE_URL;?>js/kind/kindeditor.js"></script>
<script src="<?php echo W_BASE_URL;?>js/article.js" type="text/javascript"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>
<script src="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.js" type="text/javascript"></script>
<link href="<?php echo W_BASE_URL;?>js/alert/jquery.alerts.css" rel="StyleSheet">

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
		alert("内容id必须为数字！");
		document.form1.detail.focus();
		return false;
	}
	return true;
}
</script>

</head>
<body class="main-body">

<table class="yc">
 <tr>

<td valign="top" style="border-left:1px #DFDFDF solid; overflow:auto; overflow-y:hidden;"><div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?= $navName;?></p></div>
        <div class="main-cont" style=" line-height:3">
       

		  <div class="set-area" id="data_list">
			<div class="yang_info" style="height:40px; line-height:24px;">

        <form action="<?= URL('mgr/msg.msg_list')?>" name="form1" method="post" id="form1" onsubmit="return check()">
        <input type="hidden" name="statue" value="0" />
        <select name="key" class="select1">
			<option value="id" selected>编号</option>
            <option value="title" >媒体名称</option>
            <option value="code" >媒体编码</option>
            <option value="username" >用户名</option>
			<option value="address" >接口地址</option>
		</select>

        <input class="input-txt" type="text" name="val" value=""/>
		<span>状态：</span>
		<select name="is_root" class="select2" id='is_root'>
       		<option value="-1" selected>不限</option>
			<option value="0" >启用</option>
			<option value="1" >禁止</option>
		</select>
        <input class="submit" type="submit" value="搜 索" />
        <a href="<?= URL('mgr/msg.add')?>" class="btn-general" style="float:right;"><span>添加授权媒体</span></a>
        </form>
			</div>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w40" />
					<col class="w50" />
                    
					<col class="w120" />
					<col class="w240" />
					<col class="w120" />
					<col class="w150" />
					<col class="w300" />
                    <col class="w120" />
                    <col class="w90" />
                    <col class="w50" />
				</colgroup>

				<thead class="tb-tit-bg">
					<tr>
                    	<th><div class="th-gap">&nbsp;&nbsp;</div></th>
						<th><div class="th-gap">编号</div></th>
                        
						<th><div class="th-gap">媒体名称</div></th>
						<th><div class="th-gap">媒体编码</div></th>
						<th><div class="th-gap">用户名</div></th>
                        <th><div class="th-gap">密码</div></th>
                        <th><div class="th-gap">接口地址</div></th>
                        <th><div class="th-gap">添加时间</div></th>
                        <th><div class="th-gap">操作</div></th>
                        <th><div class="th-gap">状态</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
             <?php 
				 if(isset($msg_info)&&!empty($msg_info)){
					foreach($msg_info as $key=>$val){
			 ?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><input type="checkbox" name="id" value="<?= $val['id'];?>" /></td>
                    <td><div class="td-nowrap"><?= $val['id'];?></div></td>
                    
					<td><div class="td-nowrap"><?= $val['title'];?></a></div></td>
                    <td><div class="td-nowrap"><?= $val['code'];?></a></div></td>
					<td><div class="td-nowrap"><?= $val['username'];?></div></td>
					<td><div class="td-nowrap"><?= $val['psw'];?></div></td>
					<td><div class="td-nowrap"><?= $val['address'];?></div></td>
					<td><div class="td-nowrap"><?= substr($val['addtime'],0,16);?></div></td>
                    <td><div class="td-nowrap"><a href="<?= URL("mgr/msg.add",'id='.$val['id']);?>">修改</a> | <a href="<?= URL("mgr/msg.del2",'id='.$val['id']);?>">删除</a></div></td>
                    
                  	<td><div class="td-nowrap"><?php if($val['is_root']) echo "<span style='color:#3e9a00'>启用</span>";else echo "<span style='color:#F00'>禁止</span>";?></div></td>
                    
                    </tr>	
			<?php }}?>
					<tr>
						<td colspan="10">
                            <?php if(!empty($msg_info)){ ?>
                            <input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />
                           <!-- <input type="button" id="auditall" name="auditall" value="批量审核"  onclick="chkallurl('id','<?= URL("mgr/arcticlepublish.update2","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=is_root&flagvalue=1&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1))?>','您确定要审核选中信息吗？')" />-->


                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?= URL("mgr/msg.del2","classid=".$catid."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1));?>','您确定要删除选中的信息吗？')" />

							<div style="text-align:center;"><?= $page_html;?></div>

						   
						   <?php  } else {?>
                           <div class='guide_info content_none'>没有查询到与条件相匹配的条目</div>
                           <?php }?>
	
						</td>
					</tr>
	
				</tbody>
			</table>
            </div>
          

        </div></td>
		
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
		
		$('#is_root').val(<?= $is_root;?>);
    </script>
	     
		 <div style="clear:both;"></div>
		 </tr>
		 </table>
</body>
</html>
