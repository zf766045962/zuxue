<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员组（角色）列表 - 管理员组管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type="text/javascript">
function openPop1(url,title) {
	Xwb.use('MgrDlg',{
		modeUrl:url,
		title:title,
		formMode:true,
		dlgcfg:{
			cs:'win-topic win-fixed',
			width:800,		
		}
		})
}
function openPop(url,title) {
	Xwb.use('MgrDlg',{
		modeUrl:url,
		title:title,
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
			onViewReady:function(View){
				var self=this;
				$(View).find('#pop_cancel').click(function(){
					self.close();
				})
			},
			width:700,		

			title:title,
			formSuccess:function(){
			//	Xwb.ui.MsgBox.alert('提示','修改成功！');
			},
			destroyOnClose:true,

		}
	})
};


</script>
</head>
<body class="main-body">
<div class="main-wrap">
  <div class="path">
    <p>当前位置：系统设置<span>&gt;</span>管理组</p>
  </div>
  <div class="main-cont">
    <h3 class="title">管理组列表<a rel="e:addpage" class="btn-general"><span onclick="openPop('<?=URL("mgr/admingroup.admingroupAdd")?>','新增管理组')">新增管理组</span></a></h3>
    <div class="set-area">
      <table class="table" cellpadding="0" cellspacing="0" width="100%" border="0">
        <colgroup>
        <col class="w70"/>
        <col />
        <col />
        <col class="w130" />
        <col class="w150" />
        </colgroup>
        <thead class="tb-tit-bg">
          <tr>
            <th><div class="th-gap">编号</div></th>
            <th><div class="th-gap">组名称</div></th>
            <th><div class="th-gap">管理员</div></th>
            <th><div class="th-gap">设定权限</div></th>
            <th><div class="th-gap">操作</div></th>
          </tr>
        </thead>
        <tfoot class="tb-tit-bg">
          <tr>
            <td colspan="5"><div class="pre-next"> <?php echo $pager;?> </div></td>
          </tr>
        </tfoot>
        <tbody>
          <?php if($list):?>
          <?php 
		  	$topnum = 0;
			foreach($list as $value)
			{
				$topnum = $topnum+1;
		?>
          <tr>
            <td><span style="font-weight:bold; font-size:14px;"><?=$topnum?> . </span></td>
            <td>
            <a  class="icon-operate" href="javascript:openPop('<?php echo URL('mgr/admingroup.admingroupEdit', 'gid='.$value['gid'] ,'admin.php');?>','修改管理组-<?php echo $value['group_name'] ?>')">
              <?php if(isset($value['group_name'])) echo F('escape', $value['group_name']); ?>
              </a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="icon-add" href="javascript:openPop('<?php echo URL('mgr/admingroup.admingroupAdd', 'pgid='.$value['gid'] ,'admin.php');?>','添加-<?php echo $value['group_name'] ?>-子分类')">添加子分类</a>
             <br />
             <span class="form-tips">&nbsp;&nbsp;<?php echo $value['desc'];?></span></td>
            <td><a class="icon-add" href="<?php echo URL('mgr/admin.adminAdd',"gid=".$value['gid']); ?>">添加用户</a>
			<?php 
				if(isset($rs[$value['gid']]))
				{
					$userlist=$rs[$value['gid']]['userinfo'];
					foreach($userlist as $user)
					{
						echo '<a class="icon-member" href="'.URL('mgr/admin.adminEdit','id='. $user['id']).'">'.$user['username'].'</a>'.'&nbsp;&nbsp;';
					}
				};	
			?>
             </td>
<!--            <td><a class="icon-set" href="javascript:openPop('<?php echo URL('mgr/admingroup.setPermitByRoute','gid='. $value['gid']); ?>')">权限设定</a>  </td>
-->            <td><a class="icon-set" href="<?php echo URL('mgr/admingroup.setPermitByRoute','gid='. $value['gid']); ?>">权限设定</a>  </td>
            <td>
              <a class="icon-edit" href="javascript:openPop('<?php echo URL('mgr/admingroup.admingroupEdit', 'gid='.$value['gid'] ,'admin.php');?>','修改管理组-<?php echo $value['group_name'] ?>')">修改</a>
			<?php if($value['type'] != 1):?>
              <a class="icon-del" href="javascript:delConfirm('<?php echo URL('mgr/admingroup.del', 'gid=' . $value['gid']);?>','您确定删除<?php echo $value['group_name'];?>吗？')">删除</a>
              <?php else : ?>
              <span class="icon-ban" title="系统内置，无法删除" >内置</span>
              <?php endif;?>
             </td>
          </tr>
          <?php
          	if (isset($childInfo[$value['gid']]))
			{
				$childlist = $childInfo[$value['gid']]["childlist"];
				$childnum = 0;
				foreach($childlist as $child)
				{
					$childnum = $childnum + 1;
					$flagstr 	= "┣";
					if($childnum == count($childlist))
					{
						$flagstr 	= "┗";
					}
					else
					{
						$flagstr 	= "┣";
					}
		  ?>
              <tr>
              	<td><span style="color:#F00; font-size:14px; "><?=$flagstr?></span></td>
                <td>
                <span style="color:#F00;"><?=$childnum?> . </span>
                <a  class="icon-operate" href="javascript:openPop('<?php echo URL('mgr/admingroup.admingroupEdit', 'gid='.$child['gid'] ,'admin.php');?>','修改管理组-<?php echo $child['group_name'] ?>')">
                  <?php if(isset($child['group_name'])) echo F('escape', $child['group_name']); ?>
                  </a>
                 <br />
                 <span class="form-tips">&nbsp;&nbsp;<?php echo $child['desc'];?></span></td>
                <td><a class="icon-add" href="<?php echo URL('mgr/admin.adminAdd','gid='.$child['gid']); ?>">添加用户</a>
                <?php 
					if(isset($childUser[$child['gid']]))
					{
						$userlist=$childUser[$child['gid']]['userinfo'];
						foreach($userlist as $user)
						{
							echo '<a class="icon-member" href="'.URL('mgr/admin.adminEdit','id='. $user['id']).'" >'.$user['username'].'</a>'.'&nbsp;&nbsp;';
						}
					};	
                ?>
                 </td>
<!--                <td><a class="icon-set" href="javascript:openPop('<?php echo URL('mgr/admingroup.setPermitByRoute','gid='. $child['gid']); ?>')">权限设定</a>  </td>
-->                <td><a class="icon-set" href="<?php echo URL('mgr/admingroup.setPermitByRoute','gid='. $child['gid']); ?>">权限设定</a>  </td>
                <td>
                  <a class="icon-edit" href="javascript:openPop('<?php echo URL('mgr/admingroup.admingroupEdit', 'gid='.$child['gid'] ,'admin.php');?>','修改管理组-<?php echo $child['group_name'] ?>')">修改</a>
                <?php if($child['type'] != 1):?>
                  <a class="icon-del" href="javascript:delConfirm('<?php echo URL('mgr/admingroup.del', 'gid=' . $child['gid']);?>','您确定删除<?php echo $child['group_name'];?>吗？')">删除</a>
                  <?php else : ?>
                  <span class="icon-ban" title="系统内置，无法删除" >内置</span>
                  <?php endif;?>
                 </td>
              </tr>
          <?php
				}
			}
		  ?>
          <?php
			}
		  ?>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
