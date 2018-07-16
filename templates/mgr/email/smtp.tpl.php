<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>内容管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>SMTP服务器<span>&gt;</span>列表</p></div>
        <div class="main-cont">
        <h3 class="title">
        <a class="btn-general" href="<?php echo URL('mgr/email.addsmtp')?>"><span>添加SMTP</span></a>
        列表</h3>
        <div class="set-area">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w80" />
					<col class="w160" />
                    <col />
                    <col class="w80" />
                    <col class="w80" />
					<col style="width:180px;" />
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">主机</div></th>	
                        <th><div class="th-gap">登陆名</div></th>
                        <th><div class="th-gap">有效</div></th>
                        <th><div class="th-gap">排序</div></th>	
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
				<?php if(!empty($info)){
                	foreach($info as $key=>$val){
				?>
				<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
					<td><?= $val['id']?></td>
					<td><div class="td-nowrap"><?= $val['smtp']?></div></td>
					<td><div class="td-nowrap"><a href="<?= URL('mgr/email.addsmtp','id='.$val['id']);?>"><?= $val['username']?></a></div></td>
                    
                   	<td style="text-align:center;">
                    <a href="javascript:status('is_ok',<?= $val['id'];?>);"><img src="img/<?= $val['is_ok']?'yes':'no'?>.gif" id="is_ok<?= $val['id'];?>"/></a>
                    </td>
                    
					<td><div class="td-nowrap"><?php echo $val['sort']?> </div></td>
                    <td>
                        <a class="icon-edit" href="<?= URL('mgr/email.addsmtp','id='.$val['id']);?>">修改</a>
                        <a class="icon-del" href="javascript:delConfirm(<?= $val['id'];?>);">删除</a>
                    </td>
				</tr>
				<?php }}?>
				</tbody>
			</table>
            </div>
        </div>
	</div>
    <script>
		function delConfirm(id){
			if(confirm('您确定删除此信息？')){
				location.href = '<?= URL('mgr/email.delsmtp','id=');?>' + id;	
			}	
		}
		function status(key,val){
			var img = key + val;
			var src = $('#'+img).attr('src');
			if(src == 'img/no.gif'){
				$.post('<?= URL("mgr/email.updAttr");?>',{'id':val,'type':key+1,'table':'xsmart_email_smtp'},function(e){
					if(e == 1){
						$('#'+img).attr('src','img/yes.gif');
					}else{
						alert('操作失败');
					}
				});
			}else{
				$.post('<?= URL("mgr/email.updAttr");?>',{'id':val,'type':key+0,'table':'xsmart_email_smtp'},function(e){
					if(e == 1){
						$('#'+img).attr('src','img/no.gif');
					}else{
						alert('操作失败');
					}
				});
			}
		}
	</script>
</body>
</html>
