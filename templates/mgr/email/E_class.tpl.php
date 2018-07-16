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
	  <p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>分类管理<span>&gt;</span>分类列表</p></div>
        <div class="main-cont">
        <h3 class="title">
        <a class="btn-general" href="<?php echo URL('mgr/email.addclass')?>"><span>添加分类</span></a>
        分类列表</h3>
        <div class="set-area">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w100" />
					<col class="w150" />
					<col style="width:100px;"/>
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">类名</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
                <?php if(!empty($info)){ 
					foreach($info as $key=>$val){
						$num = DS('mgr/email.total','','cid = '.$val['classid']);
				?>
				<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?= $val['classid']?></td>
                    <td><div class="td-nowrap"><a href="<?= URL('mgr/email.addclass','classid='.$val['classid']);?>"><?= $val['classname']?></a> &nbsp;（<?= $num;?>条）</div>
                    </td>
                    <td>
                     	<a class="icon-del" href="javascript:clear(<?= $val['classid'];?>);">清空地址</a>
                        <a class="icon-edit" href="<?= URL('mgr/email.addclass','classid='.$val['classid']);?>">修改</a>    
                        <a class="icon-del" href="javascript:delConfirm(<?= $val['classid'];?>);">删除</a>
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
			if(confirm('删除此类别同时会清除该分类下所有地址，是否执行此操作？')){
				location.href = '<?= URL('mgr/email.delclass','classid=');?>' + id;
			}	
		}
		function clear(id){
			if(confirm('您确定清除此分类下所有地址？')){
				location.href = '<?= URL('mgr/email.delclass','clear=1&classid=');?>' + id;
			}	
		}
    </script>
</body>
</html>
