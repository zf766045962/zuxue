<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员用户列表 - 帐号管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
</head>
<body class="main-body">
<div class="main-wrap">
	<div class="path"><p>当前位置：系统设置<span>&gt;</span>管理员设置</p></div>
	<div class="main-cont">
    <h3 class="title">管理员用户列表<a href="<?=URL("mgr/admin.adminAdd")?>"  class="btn-general"><span >新增管理员</span></a></h3>
    <div class="set-area">
        <table class="table" cellpadding="0" cellspacing="0" width="100%" border="0">
            <colgroup>
                <col class="w70"/>
                <col />
                <col class="w250" />
                <col class="w150" />
                <col class="w130" />
            </colgroup>
            <thead class="tb-tit-bg">
                <tr>
                    <th><div class="th-gap">编号</div></th>
                    <th><div class="th-gap">管理员昵称</div></th>
                    <th><div class="th-gap">权限</div></th>
                    <th><div class="th-gap">添加时间</div></th>
                    <th><div class="th-gap">操作</div></th>
                </tr>
            </thead>
            <tfoot class="tb-tit-bg">
                <tr>
                    <td colspan="5">
                    	<div class="pre-next">
                            <?php echo $pager;?>
                        </div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php if($list):?>
                <?php //var_dump($list);?>
                <?php 
				foreach($list as $value):
				
				$username=isset($value['userinfo']['nickname'])?isset($value['userinfo']['nickname']):$value['username'];
				
				?>
                    <tr>
                        <td><?php echo ++$num;?> . </td>
                        <td><a href="<?php echo URL('mgr/admin.showlog', 'id='.$value['id'] ,'admin.php');?>"><?php  echo $username?></a>
                        </td>
                        <td><?php
								if(isset($grouplist) && !empty($grouplist))
								{
                        			foreach($grouplist as $rs)
									{
										if($value["group_id"] == $rs["gid"])
										{	
											if(intval($rs["parent_id"])!=0)
											{
												foreach($grouplist as $prs)
												{
													if($rs["parent_id"] == $prs["gid"])
													{
														echo $prs["group_name"]." <font color='#FF0000'>-></font> ";
													}
												}
											}
											echo $rs["group_name"];
										}
										else
										{
											echo "";
										}
									}
								}
							?></td>
                        <td><?php echo date('Y-m-d H:i:s', $value['addtime']);?></td>
                        <td>
                            <?php if($is_root && $value['id'] != $admin_id):?>
                                <a class="icon-edit" href="<?php echo URL('mgr/admin.adminEdit', 'id='.$value['id'] ,'admin.php');?>">修改</a>&nbsp;&nbsp;<a class="icon-permission" href="javascript:delConfirm('<?php echo URL('mgr/admin.del', 'id=' . $value['id']);?>','您删除管理员<?php echo $username;?>吗？')">删除</a>
                            <?php endif;?>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>
