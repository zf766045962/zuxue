<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="addbg">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>发布<?= $modelInfo['name'];?>信息</title>
<link href="<?= CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link href="<?= W_BASE_URL;?>kindeditor/themes/default/default.css" rel="stylesheet" type="text/css"/>
<script language="javascript" type="text/javascript" src="<?= JS_PATH;?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH;?>content_addtop.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH;?>colorpicker.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH;?>hotkeys.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH;?>cookie.js"></script>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
<link href="/js/lhgdialogsc/skins/discuz.css" rel="stylesheet" type="text/css" />
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="/ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
<script type="text/javascript" src="<?= W_BASE_URL;?>kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="<?= W_BASE_URL;?>kindeditor/lang/zh_CN.js"></script>
<style type="text/css">
	html{_overflow-y:scroll;}
</style>
</head>
<body>
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<form name="myform" id="myform" action="<?= URL('mgr/modelForm.save',$getParam.'&id='.V('r:id'));?>" method="post" enctype="multipart/form-data" onsubmit="return checkForm();">
<div class="addContent">
    <div class="path">
		<p>当前位置：后台管理<span>&gt;</span>发布<?= $modelInfo['name'];?>信息
    </div>
    <div class="main-cont" style=" line-height:24px">
        <h3 class="title">
            <a class="btn-general" href="<?= URL('mgr/modelForm.infoList',$getParam);?>"><span><?= $modelInfo['name'];?>列表</span></a>发布<?= $modelInfo['name'];?>信息
        </h3>
    </div>
	<div class="col-right">
    	<div class="col-1">
            <div class="content pad-6">
			<?php 
			if(!empty($forminfos['senior'])) {
				foreach($forminfos['senior'] as $field=>$info) {
					if($info['isomnipotent']) continue;
					if($info['formtype'] == 'omnipotent') {
						foreach($forminfos['senior'] as $_fm=>$_fm_value) {
							if($_fm_value['isomnipotent']) {
							$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
							}
						}
					}
            ?>
            <h6><?php if($info['star']){ ?> <font color="red">*</font><?php } ?> <?= $info['name']?></h6>
            <?= $info['form']?> <?= $info['tips']?>
            <?php 
				}
			}
            ?>
          </div>
        </div>
    </div>
    
    <a title="展开与关闭" class="r-close" style="outline-style: none; outline-width: medium;background-color:#fbfbfb;" id="RopenClose" href="javascript:;" onmouseover="this.style.backgroundColor='#ecf2f7'" onmouseout="this.style.backgroundColor='#fbfbfb'"></a>

    <div class="col-auto">
        <div class="col-1">
            <div class="content pad-6">
                <table width="100%" cellspacing="0" class="table_form">
                <tbody>
				<?php 
				if(!empty($forminfos['base'])) {
					foreach($forminfos['base'] as $field=>$info) {
						if($info['isomnipotent']) continue;
						// ID关联（隐藏域）处理
						if($info['formtype'] == 'relateid'){
							$infoDetail = json_decode($info['form'],true);
							// 显示
							if($infoDetail['type'] == 1){
								$info['form'] = $infoDetail['data'];
							}
							// 不显示（隐藏域）
							if($infoDetail['type'] == 2){
								$relateidInput[] = $infoDetail['data']; continue;
							}
						}
						// 万能字段处理
						if($info['formtype'] == 'omnipotent') {
							foreach($forminfos['base'] as $_fm=>$_fm_value) {
								if($_fm_value['isomnipotent']) {
									$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
								}
							}
						}
                ?>
                    <tr>
                      <th width="80"><?php if($info['star']){ ?> <font color="red">*</font><?php } ?> <?= $info['name'];?>
                      </th>
                      <td><?= $info['form']?>  <?= $info['tips']?></td>
                    </tr>
                <?php
                	}
				}
                ?>
    			</tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<div class="fixed-bottom">
	<div class="fixed-but text-c">
        <div class="button"><input value="保存后返回列表" type="submit" name="dosubmit" class="cu"></div>
        <div class="button"><input value="保存并继续发表" type="submit" name="dosubmit_continue" class="cu"></div>
        <div class="button"><input value="返回列表" type="button" class="cu" onclick="window.location='<?= URL('mgr/modelForm.infoList',$getParam);?>';"></div>
    </div>
</div>

<?php // 输出隐藏域
if(!empty($relateidInput)){
	foreach($relateidInput as $key=>$val){
		echo $val;
	}
}?>
</form>
</body>
</html>

<script type="text/javascript">
// 只能放到最下面
var charset = 'utf-8';
var openClose = $("#RopenClose"),colRight = $(".addContent .col-right"),valClose = getcookie('openClose');
openClose.click(
	  function (){
		if(colRight.css("display")=="none"){
			setcookie('openClose',0,1);
			openClose.addClass("r-close");
			openClose.removeClass("r-open");
			colRight.show();
		}else{
			openClose.addClass("r-open");
			openClose.removeClass("r-close");
			colRight.hide();
			setcookie('openClose',1,1);
		}
	}
);
$(function(){
	if(valClose == 1){
		colRight.hide();
		openClose.addClass("r-open");
		openClose.removeClass("r-close");
	}else{
		colRight.show();
	}
	setTimeout(function (){openClose.height($(".addContent .col-auto").height());},1000);
});
// 表单验证
function checkForm(){
	<?= $formValidator;?>
	return true;
}
</script>