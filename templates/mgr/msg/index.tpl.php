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
<?php
	//数据初始化
	$sex = array(0=>'<font color="#999">未填</font>',1=>'先生',2=>'女士');
	$type_rs = array(0=>'活动留言',1=>'我要买车',2=>'我要卖车',3=>'我要换车',4=>'车源询价',5=>'贷款留言');
?>
<table class="yc">
 <tr>

<td valign="top" style="border-left:1px #DFDFDF solid; overflow:auto; overflow-y:hidden;"><div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?= $navName;?></p></div>
        <div class="main-cont" style=" line-height:3">
       

		  <div class="set-area" id="data_list">
			<div class="yang_info" style="height:40px; line-height:24px;">

        <form action="<?= URL('mgr/msg.index')?>" name="form1" method="post" id="form1" onsubmit="return check()">
        <input type="hidden" name="statue" value="0" />
        <select name="key" class="select1">
			<option value="id" selected>编号</option>
            <option value="username" >姓名</option>
            <option value="phone" >电话</option>
            <option value="email" >邮件</option>
			<option value="addtime" >时间</option>
			<option value="content" >内容</option>
		</select>

        <input class="input-txt" type="text" name="val" value=""/>
		<span>类别：</span>
		<select name="type" class="select2" id='type'>
			<option value="-1" selected>全部留言</option>
			<option value="0" >活动留言</option>
			<option value="1" >我要买车</option>
            <option value="2" >我要卖车</option>
            <option value="3" >我要换车</option>
            <option value="4" >车源询价</option>
            <option value="5" >贷款留言</option>
		</select>
        <input class="submit" type="submit" value="搜 索" />
        <input type="button" value="筛选接口留言信息" onclick="javascript:location.href='<?= URL('mgr/msg.index','port=0')?>';"/>
        
        </form>
			</div>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w40" />
					<col class="w50" />
                    
					<col class="w100" />
					<col class="w80" />
					<col class="w60" />
					<col class="w100" />
					<col class="w170" />
                    <col class="w100" />
                    <col class="w300" />
                    <col class="w120" />
                    <col class="w90" />
				</colgroup>

				<thead class="tb-tit-bg"> 
					<tr>
                    	<th><div class="th-gap">&nbsp;&nbsp;</div></th>
						<th><div class="th-gap">编号</div></th>
                        
						<th><div class="th-gap">留言类型</div></th>
						<th><div class="th-gap">姓名</div></th>
						<th><div class="th-gap">性别</div></th>
                        <th><div class="th-gap">电话</div></th>
                        <th><div class="th-gap">邮箱</div></th>
                        <th><div class="th-gap">城市</div></th>
                        <th><div class="th-gap">留言内容</div></th>
                        <th><div class="th-gap">时间</div></th>
                        <th><div class="th-gap">操作</div></th>
                       <!-- <th><div class="th-gap">状态</div></th>-->
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
                    
					<td><div class="td-nowrap"><?= $type_rs[$val['type']];?></a></div></td>
                    <td><div class="td-nowrap"><?= $val['username'];?></a></div></td>
					<td><div class="td-nowrap"><?= $sex[$val['sex']];?></div></td>
					<td><div class="td-nowrap"><?= $val['phone'];?></div></td>
					<td><div class="td-nowrap"><?= $val['email'] == '' ? '<font color="#999">未填</font>' : $val['email'] ;?></div></td>
					<td><div class="td-nowrap">
					<?php 
						$db  = APP :: ADP('db');
						$city_sql = "select Name from xsmart_place where Id = ".$val["city"];
						$city = $db->query($city_sql, $fetch_mode = MYSQL_ASSOC);
						echo $city[0]['Name'];
					?></div></td>
					<td><div class="td-nowrap"><a title="<?= $val['content'];?>"><?= $val['content'] == '' ? '<font color="#999">未填</font>' : $val['content'] ;?></a></div></td>
					<td><div class="td-nowrap"><?= substr($val['addtime'],0,16);?></div></td>
                    <td><div class="td-nowrap"><a href="<?= URL("mgr/msg.detail",'id='.$val['id']);?>">查看</a> | <a href="<?= URL("mgr/msg.del",'id='.$val['id']);?>">删除</a></div></td>
                  <!--  <td><div class="td-nowrap"><?php if($val['is_root']) echo "<span style='color:#3e9a00'>已回复</span>";else echo "<span style='color:#F00'>未回复</span>";?></div></td>-->
                    </tr>	
			<?php }}?>
					<tr>
						<td colspan="11">
                            <?php if(!empty($msg_info)){ ?>
                            <input type="button" name="chkall" id="chkall" onclick="selchk('id')" value="全选/反选" />
                           <!-- <input type="button" id="auditall" name="auditall" value="批量审核"  onclick="chkallurl('id','<?= URL("mgr/arcticlepublish.update2","modelid=".V("r:modelid")."&classid=".$catid."&flag=update&flagtype=is_root&flagvalue=1&levels=".V("r:levels")."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1))?>','您确定要审核选中信息吗？')" />-->


                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" id="delall" name="delall" value="批量删除"  onclick="chkallurl('id','<?= URL("mgr/msg.del","classid=".$catid."&isreview=".V("r:isreview")."&ontop=".V("r:ontop")."&page=".V("r:page",1));?>','您确定要删除选中的信息吗？')" />

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
		
		$('#type').val(<?= $type;?>);
    </script>
	     
		 <div style="clear:both;"></div>
		 </tr>
		 </table>
</body>
</html>
