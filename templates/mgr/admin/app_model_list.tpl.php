<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>页面设置 - 页面管理 - 界面管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin/admin_lib.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script>
function openPop(url,title) {

	Xwb.use('MgrDlg',{
		modeUrl:url,
		formMode:true,
		valcfg:{
			form:'AUTO',
			trigger:'#pop_ok',
			
			
		},
		dlgcfg:{
			cs:'win-topic win-fixed',
			width:700,
			onViewReady:function(View){
				var self=this;
				$(View).find('#pop_cancel').click(function(){
					self.close();
				})
			},
			title:title,
			destroyOnClose:true
		}
	})
};
</script>
</head>
<body class="main-body">
<div class="path">
  <p>当前位置：系统管理<span>&gt;</span>模块管理列表</p>
</div>
<div class="main-cont">
  <h3 class="title"><a rel="e:addpage" class="btn-general"><span onclick="openPop('<?=URL("mgr/app.app_edit")?>','创建模块')">创建模块</span></a>模块管理列表</h3>
  <div class="set-area">
    <table class="table" cellpadding="0" cellspacing="0" width="100%" border="0">
      <colgroup>
      <col />
      <col class="w80" />
      </colgroup>
      <thead class="tb-tit-bg">
        <tr>
          <th><div class="th-gap">模块名称</div></th><th><div class="th-gap" onclick="openPop('<?=URL("mgr/app.app_edit")?>','编辑模块')">编辑模块</div></th>
        </tr>
      </thead>
      <tfoot class="tb-tit-bg">
      </tfoot>
      <tbody>
        <tr>
          <td>模块名1</td><td><a onclick="openPop('<?=URL("mgr/app.app_edit")?>','编辑模块')">编辑</a> 删除</td>
        </tr>
      </tbody>
    </table>
    <p class="suggest-tips">*温馨提示：<br />
      当中只有部分页面支持设置，如果某个页面设置之后，它的子页面会自动应用这些设置。 譬如，“我的微博”、“我的粉丝”属于“我的首页”的子页面，也会应用“我的首页”的设置。</p>
  </div>
</div>
</body>
</html>
