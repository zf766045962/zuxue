<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>页面设置 - 页面管理 - 界面管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin/admin_lib.js"></script>
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
			//	Xwb.ui.MsgBox.alert('提示','修改成功！');
				alert('555445');
			},
			destroyOnClose:true,

		}
	})
};
</script>
</head>
<body class="main-body">
    <form id="form1" name="form1" method="post" action="<?php echo URL('mgr/permit.test')?>">
<div class="path">
  <p>当前位置：系统管理<span>&gt;</span>组织机构列表</p>
</div>
<div class="main-cont">
  <h3 class="title"><a rel="e:addpage" class="btn-general"><span onclick="openPop('<?=URL("mgr/permit.appAdd")?>','新增组织机构')">增值机构</span></a>组织机构列表</h3>
  <div class="set-area">
  
  <?php if($appList){             
		foreach($appList as $app){
			$appinfo=array('id'=>$app['id'],'app_name'=>$app['app_name'],'app_title'=>$app['app_title']);
		
		?>
    <table class="table" cellpadding="0" cellspacing="0" width="100%" border="0">
      <colgroup>
      <col />
      <col class="w120" />
      <col class="w120" />
      </colgroup>
      <thead class="tb-tit-bg">
	    <tr>

          <th>
          
          <div class="th-gap"><?php echo $app['app_title'] ?>
        
            <input type="hidden" name="all[]"  id="all[]" value="<?php echo $app['app_name'] ?>" />
          </div>          </th>
          <th>&nbsp;<div class="icon-edit" onclick="openPop('<?=URL("mgr/permit.appAdd",$appinfo)?>','编辑部门')">编辑部门</div></th><th>&nbsp;<div class="icon-add" onclick="openPop('<?=URL("mgr/permit.moduleAdd",$appinfo)?>','增加下级部门')">增加下级部门</div></th>
        </tr>
      </thead>
      <tfoot class="tb-tit-bg">
      </tfoot>
      <tbody>
        <tr>
          <td colspan="3">
          <?php $modules=DS('mgr/permitCom.getModuleByAppname','',$app['app_name']);
			if(!empty($modules)){
				foreach($modules as $module){
					$module['app_title']=$app['app_title'];
		  ?>
          <input type="checkbox" name="<?php echo $app['app_name'].'_item[]' ?>" id="<?php echo $app['app_name'].'_item[]' ?>"  value="<?php  echo $module['module_name'] ;?>"/><input type="hidden" name="<?php echo $app['app_name'].'_all_item[]' ?>" id="<?php echo $app['app_name'].'_all_item[]' ?>" value="<?php  echo $module['module_name'] ;?>" />
            <span><?php  echo $module['module_title'] ;?></span>&nbsp;<a onclick="openPop('<?php echo URL('mgr/permit.moduleAdd',$module); ?>','修改模块');"><span class="icon-edit">&nbsp;</span></a>&nbsp;
            <?php }  //end modules foreach
			}	//end if
			else{
			?>
			暂无模块，点击添加<div class="icon-add" onclick="openPop('<?=URL("mgr/permit.moduleAdd",$appinfo)?>','增加模块')">增加模块</div>
			<?php }?> </td>
        </tr>
      </tbody>
    </table>
    <br />
<?php }  //end foreach
}//endif
?>
    <p class="suggest-tips">*温馨提示：<br />
      当中只有部分页面支持设置，如果某个页面设置之后，它的子页面会自动应用这些设置。 譬如，“我的微博”、“我的粉丝”属于“我的首页”的子页面，也会应用“我的首页”的设置。	
      
        $appinfo=array();
			  if(!empty($appinfo)){
				$appinfo=array('app_Name'=>$info['app_Name'],
						'id'=>$info['id'],
						'app_Name'=>$info['app_Name'],
						'app_title'=>$info['app_Name']);
	}</p>
  </div>
  
</div>
        <div class="center">

              <input type="submit" name="button" id="button" value="提交" />
            </div>
      </div>
    </form>
</body>
</html>
