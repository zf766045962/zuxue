<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户组添加</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="/public/css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type="text/javascript">
	var addHtmlMode=['<form action="<?php echo URL('mgr/usergroup.editusergroup');?>" method="post" id="form1"  name="add-newlink">',
					'	<div class="form-box">',
					'		<div class="form-row">',
					'			<label for="g_name" class="form-field">用户组名称</label>',
					'			<div class="form-cont">',
					'				<input id="g_name" name="g_name" class="ipt-txt" type="text" warntip="#nameTip1" vrel="_f|sz=max:20,m:不能超过10个字,ww:true|ne=m:不能为空" value=""/><span id="nameTip1" class="tips-error hidden">验证错误提示</span>',
	                '    			<p class="form-tips">用户组名称的长度不得超过10个汉字</p>',
					'			</div>',
					'		</div>',
					'		<div class="form-row">',
					'			<label for="g_name" class="form-field">说明</label>',
					'			<div class="form-cont">',
					'				<input id="g_desc" name="g_desc" class="ipt-txt" type="text" value="用户组说明" warntip="#linkTip1" vrel="_f|sz=max:255,m:不能超过255字符|ne=m:不能为空"/><span class="tips-error hidden" id="linkTip1"></span>',
					'			</div>',
					'		</div>',
			
					
					'		<div class="btn-area">',
					'			<input type="hidden" name="action" id="add_action" value="foot" />',
					'			<a class="btn-general  highlight" id="pop_ok" href="#this" id="pop_submit"><span>确定</span></a>',
					'			<a class="btn-general" id="pop_cancel" href="#this" id="pop_cancel"><span>取消</span></a>',
					'		</div>',
					'	</div>',
					'</form>'].join('');
	var editHtmlMode=['<form action="<?php echo URL('mgr/usergroup.editusergroup');?>" method="post" id="form2" name="changes-newlink">',
					'	<div class="form-box">',
					'		<div class="form-row">',
					'			<label for="edit_name" class="form-field">链接文字</label>',
					'			<div class="form-cont">',
					'				<input name="g_name" id="g_name" class="ipt-txt" type="text" value="" warntip="#nameTip2" vrel="_f|sz=max:12,m:不能超过6个字,ww:true|ne=m:不能为空"/><span class="tips-error hidden" id="nameTip2"> </span>',
	                '           	 <p class="form-tips">链接文字的长度不得超过6</p>',
					'			</div>',
					'		</div>',
					'		<div class="form-row">',
					'			<label for="edit_address" class="form-field">链接</label>',
					'			<div class="form-cont">',
					'				<input name="g_desc" id="g_desc" class="ipt-txt" type="text" value="http://" warntip="#linkTip2" vrel="_f|sz=max:255,m:不能超过255字符|ne=m:不能为空"/><span class="tips-error hidden" id="linkTip2"> </span>',
	                '			</div>',
					'		</div>',
					'		<div class="btn-area">',
					'			<input type="hidden" name="gid" id="gid" value="" />',
					'			<input type="hidden" name="action" id="edit_action" value="" />',
					'			<a class="btn-general  highlight" id="pop_ok" href="#" id="pop_submit"><span>确定</span></a>',
					'			<a class="btn-general" id="pop_cancel" href="#" id="pop_cancel"><span>取消</span></a>',
					'		</div>',
					'	</div>',
					'</form>'].join('');
	function add(o) {
	    Xwb.use('MgrDlg',{
			modeHtml:addHtmlMode,
			formMode:true,
			valcfg:{
				form:'#form1',
				trigger: '#pop_ok'
			},
			dlgcfg:{
				cs:'win-link win-fixed',
				onViewReady:function(View){
					var self=this;
					$(View).find('#pop_cancel').click(function(){
						self.close();
					});
					$(View).find('#add_action').val(o);
				},
				destroyOnClose:true,
				actionMgr:false,
				title:'添加链接'
			}
		})
	}

	function edit(id,action) {
			Xwb.use('MgrDlg',{
					modeHtml:editHtmlMode,
					formMode:true,
					valcfg:{
						form:'#form2',
						trigger: '#pop_ok'
					},
					dlgcfg:{
						cs:'win-link win-fixed',
						onViewReady:function(View){
							var self=this;
							$(View).find('#pop_cancel').click(function(){
								self.close();
							});
							$(View).find('#gid').val(id);
							
							$(View).find('#edit_action').val(action);
							$.ajax({
					                url: "<?php echo URL('mgr/usergroup.getUsergroupByGid','user.php');?>>",
									type: 'get',
					                dataType:"json",
					                data : {id:id, action:action},
					                success : function(ret){
										
										$(View).find('#g_name').val(ret.rst.g_name);
										$(View).find('#g_desc').val(ret.rst.g_desc);
									}
							});
						},
						destroyOnClose:true,
						actionMgr:false,
						title:'修改链接'
					}
				})
	}
</script>
</head>
<body>
<div class="main-body">
	<div class="path">
	  <p>当前位置：应用管理<span>&gt;</span>应用管理</p>
	</div>
    <div class="main-cont">
        <h3 class="title"><a class="btn-general" href="javascript:add('head');"><span>添加新的应用</span></a>应用列表</h3>
        <div class="set-area">
            <table class="table" cellpadding="0" cellspacing="0" width="100%" border="0">
                <colgroup>
                    <col class="w120" />
                    <col />
                    <col class="w140" />
                </colgroup>
                <thead class="tb-tit-bg">
                    <tr>
                        <th width="23%"><div class="th-gap">应用名称</div></th>
                      <th width="37%"><div class="th-gap">属性</div></th>
                      <th width="40%"><div class="th-gap">操作</div></th>
                  </tr>
                </thead>
                <tfoot class="tb-tit-bg"></tfoot>
                <tbody>
                    <?php if(isset($usergroup) && is_array($usergroup)):?>
                        <?php foreach($usergroup as $key=>$value):?>
                            <tr>
                                <td><?php echo $value['g_name'];?></td>
                                <td><a href="<?php echo $value['is_admin'];?>" target="_blank"><?php echo $value['is_admin'];?></a></td>
                                <td><a class="icon-edit" title="设置功能模块" href="javascript:edit('<?php echo $value['gid'];?>','head')">添加权限</a><a class="icon-edit" title="编辑" href="javascript:edit('<?php echo $value['gid'];?>','head')">编辑</a><a class="icon-del" title="删除" href="javascript:delConfirm('<?php echo URL('mgr/usergroup.del','action=del&gid='.$value['gid']);?>');">删除</a></td>
                  </tr>
                            <tr>
                                <td><?php echo $value['g_name'];?></td>
                                <td><a href="<?php echo $value['is_admin'];?>" target="_blank"><?php echo $value['is_admin'];?></a></td>
                                <td><a class="icon-edit" title="编辑" href="javascript:edit('<?php echo $value['gid'];?>','head')">编辑</a><a class="icon-del" title="删除" href="javascript:delConfirm('<?php echo URL('mgr/usergroup.del','action=del&gid='.$value['gid']);?>');">删除</a></td>
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
