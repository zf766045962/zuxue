<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $linkname;?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.pop{ margin:inherit; width:inherit;}
</style>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_Datatype.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/Validform_v5.3.2_ncr_min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/qiehuan.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo W_BASE_URL;?>js/My97DatePicker/WdatePicker.js"></script>
<?php $editor = APP :: N('editorModule');?>
<?php $getID3 = APP :: N('AudioInfo');?>
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>角色管理<span>&gt;</span><?= isset($info['id']) && intval($info['id']) > 0 ? "修改" : "添加";?>角色</p>
    </div>
    <div class="main-cont">
        <h3 class="title">
		<a class="btn-general" href="<?= URL('mgr/role.index','&page='.V('r:page',1))?>"><span>返回列表</span></a>
		</h3>
        <style>.ww1 li a:hover{ text-decoration:none;}</style>
        <div class="conh1">
            <div id="butong_net1">
            <div class="set-area">
                <div class="form web-info-form">
                    <form id="form" method="post" action="<?= URL('mgr/role.saveMemberInfo','&id='.$info["id"])?>">
                        <div class="dis" name="f">
                            
							<div class="form-row"><label class="form-field">角色名称</label>
                            <div class="form-cont" style="line-height:19px;">
                            <input name="title" type="text" class="input-txt" id="title" value="<?= $info["title"]?$info["title"]:''?>" maxlength="150" style="line-height:10px;"/>
                            </div>
                            </div>
                            
                            <div class="form-row"><label class="form-field">排序</label>
                            <div class="form-cont" style="line-height:19px;">
                            <input name="listorder" type="text" class="input-txt" id="listorder" value="<?= $info["listorder"]?$info["listorder"]:''?>" maxlength="16" style="line-height:10px;" />
                            </div>
                            </div>
							
                            <div class="form-row"><label class="form-field">添加时间</label>
                            <div class="form-cont">
                           <input name="inputtime" type="text" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate span1" value="<?= $info["inputtime"] ? date('Y-m-d H:i:s',$info["inputtime"]) : date('Y-m-d H:i:s',time())?>"  style="width:184px;" class="Wdate span1"  />
                            </div>
                            </div>
							
							<div class="form-row"><label class="form-field">更新时间</label>
                            <div class="form-cont">
                            <input name="updatetime" type="text" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate span1" value="<?=$info["updatetime"]?date('Y-m-d H:i:s',$info["updatetime"]):date('Y-m-d H:i:s',time())?>"  style="width:184px;" class="Wdate span1"  />
                            </div>
                            </div>

                            <div class="btn-area" id="btn1">
                                <a class="btn_genera2" id="btn_sub"><span>确认保存</span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>

        </div>
	</div>
<?= V('r:t','') == 'pic' ? '<script>$("#picLi").click();</script>' : '';?>
<script>
	$("#form").Validform({
		btnSubmit:"#btn_sub",
		tiptype:4,
		ajaxPost:true,
		callback:function(data){
			alert(data.info);
			if(data.status == 'ok'){
				location = '<?= URL('mgr/role.index')?>';	
			}
		}
	});
	
	function change_days(id) {
	var html	=	'';
	if(id==4 || id==6 || id==9 || id==11) {
		for(var i=1;i<=30;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';	
		}
	} else if(id==2 && $("#year").val()%4==0) {
		for(var i=1;i<=29;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';
		}
	} else if(id==2 && $("#year").val()%4!=0) {
		for(var i=1;i<=28;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';
		}
	} else {
		for(var i=1;i<=31;i++) {
			html	+=	'<option value="'+i+'">'+i+'</option>';
		}	
	}	
	$("#days").html(html);
}
</script>
</body>
</html>