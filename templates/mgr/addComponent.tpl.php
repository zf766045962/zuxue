<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：组件管理<span>&gt;</span><?= isset($info['component_id']) && intval($info['component_id']) > 0 ? "修改" : "添加";?>组件</p></div>
        <div class="main-cont">
        <h3 class="title"><?= isset($info['component_id']) && intval($info['component_id']) > 0 ? "修改" : "添加";?>组件</h3>
        <div class="set-area">
        <form  method="post" action="<?= URL('mgr/page_manager.saveComponent');?>">
                <div class="form web-info-form">
                  <div class="form-row">
                     <label class="form-field">组件分类</label>
                     <div class="form-cont">
                     	<select name="data[component_cty]">
                        	<option value="0">请选择</option>
                            <?php if(!empty($component_cty)){
								foreach($component_cty as $key=>$val){?>
    							<option value="<?= $key;?>" <?= $info['component_cty'] == $key ? 'selected="selected"':'' ;?> ><?= $val;?></option>
    						<?php }}?>
                        </select>
                     </div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">组件名称</label>
                     <div class="form-cont">
                     <input name="data[name]" type="text" class="input-txt" value="<?= isset($info["name"]) && !empty($info["name"]) ? $info["name"] : ""?>" size="50" maxlength="150" />
                     </div>
                  </div>
                  
				  <div class="form-row">
                     <label class="form-field">显示的名称</label>
                     <div class="form-cont">
                     <input name="data[title]" type="text" class="input-txt"  value="<?= isset($info["title"]) && !empty($info["title"]) ? $info["title"] : ""?>" size="50" maxlength="150" />
                     </div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">组件类型</label>
                     <div class="form-cont">
                     <label><input name="data[component_type]" type="radio" value="1" checked="checked" />&nbsp;页面主体&nbsp;</label>
                     <!--<label><<input name="data[component_type]" type="radio" value="2" <?= $info['component_type'] == 2 ? ' checked="checked"':''?> />侧边栏&nbsp</label><;-->
                     </div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">模块标识</label>
                     <div class="form-cont">
                     <input name="data[symbol]" type="text" class="input-txt"  value="<?=isset($info["symbol"])&&!empty($info["symbol"])?$info["symbol"]:""?>" size="50" maxlength="150" />               
                     </div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">设置项TPL名称</label>
                     <div class="form-cont">
                     <input name="data[settingTpl]" type="text" class="input-txt"  value="<?= isset($info["settingTpl"]) && !empty($info["settingTpl"]) ? $info["settingTpl"] : "" ;?>"  maxlength="50" />                     
                     </div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">预览图片</label>
                     <div class="form-cont">
                     <?php $editor = APP :: N('editorModule');
					 	echo $editor->image(2,'img',isset($info["preview_img"]) && !empty($info["preview_img"]) ? $info["preview_img"] : "",'上传预览图','class="input-txt"');
					 ?>
                     </div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">模块说明</label>
                     <div class="form-cont">
                     <textarea rows="10" cols="10" class="input-area code-area" name="data[desc]" style="width:300px;"><?= isset($info["desc"])&&!empty($info["desc"]) ? $info["desc"] : "";?></textarea>
                     </div>
                  </div>

                  <div class="btn-area">
                      <input type="hidden" name="component_id" value="<?= !empty($info['component_id']) ? $info['component_id'] : 0;?>" />
                      <input type="submit" name="submssitBtn" id="submssitBtn" value="<?=isset($info['id']) && intval($info['id'])>0?"确认修改":"确认添加"?>" />
                  </div>
          </div>
                </form>
            </div>
        </div>
       
        </div> 

</body>
</html>
