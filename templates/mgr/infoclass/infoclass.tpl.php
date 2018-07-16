<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息分类管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script>
function openPop(url,title) {

	Xwb.use('MgrDlg',{
		modeUrl:url,
		formMode:false,
			success:function(ret){
				if (ret.errno==0){
					Xwb.ui.MsgBox.alert('修改成功','已经修改成功');
					window.location.reload(); 
				} else {
					Xwb.ui.MsgBox.alert('错误',ret.err);
				}
			},

		valcfg:{
			form:'AUTO',
			trigger:'#pop_ok',
		},
		dlgcfg:{
			cs:'win-topic win-fixed',
			width:600,
			onViewReady:function(View){
				var self=this;
				$(View).find('#pop_cancel').click(function(){
					self.close();
				})
			},
			title:title,
			formSuccess:function(){
				Xwb.ui.MsgBox.alert('提示','修改成功！');
			},
			destroyOnClose:true,

		}
	})
};

function checkAll(itemname){
		var _true = $(itemname).attr("checked");
		$("input[name='id[]']").attr("checked", _true);
}




</script>

</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>信息分类管理<span>&gt;</span>分类管理</p></div>
        <div class="main-cont">
        <h3 class="title"> <a class="btn-general" href="<?php echo URL('mgr/infoclass.addclass')?>"><span>添加分类</span></a>
        <a class="btn-general" href="<?php echo URL('mgr/infoclass.info')?>"><span>信息分类列表</span></a>
       信息分类列表</h3>
        <div class="set-area">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
				<colgroup>
					<col class="w70" />
					<col />
					<col />
                    <col class="w70" />
					<col class="w240" />
					
			
				</colgroup>
				<thead class="tb-tit-bg">
					<tr>
						<th><div class="th-gap">编号</div></th>
						<th><div class="th-gap">分类名称</div></th>	
						<th><div class="th-gap">内容</div></th>	
                        <th><div class="th-gap">排序</div></th>
						<th><div class="th-gap">操作</div></th>
					</tr>
				</thead>
			
				<tbody id="recordList">
                
                 <?php if(!empty($rss)){ 
				 foreach($rss as $key=>$val){
				 ?>
					<tr onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#EEF7FF'">
                    <td><?php echo $val['classid']?></td>
                   <td><div class="td-nowrap"><?php echo $val['classname']?><?php if($val['uunique']) echo "&nbsp;[英文名：".$val['uunique']."]"?>
                    </div>
                   </td>
                   <td><div class="td-nowrap">
                     &nbsp;<a href="javascript:openPop('<?php echo URL('mgr/infoclass.classfylist1','classid='.$val['classid'])?>','查看内容')">查看内容</a></div>
                   </td>
                    <td><div class="td-nowrap"><?php echo $val['lmorder']?></div>
                   </td>
                    <td>
                    	 <a class="icon-add"  href="<?php echo URL('mgr/infoclass.addclass','id='.$val['classid'])?>">添加子栏目</a>&nbsp;&nbsp;
                        <a class="icon-edit" href="<?php echo URL('mgr/infoclass.modifyclass','id='.$val['classid'])?>">修改</a>&nbsp;&nbsp;
                        <?php if($val['child']==0){?> 
                        <a class="icon-del" href="javascript:delConfirm('<?php echo URL('mgr/infoclass.del', 'id='.$val['classid'], 'admin.php');?>','删除栏目将同时删除此栏目中的所有内容，并且不能恢复！确定要删除此栏目吗？');">删除</a>
						<?php } else {?>
                        <a class="icon-del" href="javascript:alert('此栏目下还有子栏目，必须先删除下属子栏目后才能删除此栏目');">删除</a>
                        <?php }?>
                    </td>
                    </tr>	
			<?php } }?>	
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
