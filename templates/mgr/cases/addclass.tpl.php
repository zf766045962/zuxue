<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$casesname?>分类管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?=$casesname?>分类管理<span>&gt;</span></p></div>
         <div class="main-cont">
        <h3 class="title"><?=isset($info['classid']) && intval($info['classid'])>0?"修改":"添加"?><?=$casesname?>分类</h3>
        <div class="set-area">
        <form  name="form1a" id="form1a" method="post" action="<?php echo URL('mgr/cases.saveclass')?>">
                <div class="form web-info-form">
                    <div class="form-row"><label class="form-field">所属栏目</label>
                        <div class="form-cont">
                         <select name="parentid" style="background-color:#EEEEEE">
						  <option value="0">作为顶级分类</option>
                          <?php
                          	if(isset($classlist) && !empty($classlist))
							{
								foreach ($classlist as $rs)
								{
									$flag = "";
									if($rs["parentid"]==0)
									{
										foreach ($classlist as $rss)
										{
											if(isset($info["classid"]))
											{
												if($rs["classid"] == $rss["parentid"] && $rss["classid"]==V("g:classid"))
												{
													$flag = ' selected="selected"';
												}
											}
											else
											{
												if($rs["classid"]==V("g:classid"))
												{
													$flag = ' selected="selected"';
												}
											}
										}
										echo '<option value="'.$rs["classid"].'" '.$flag.'>'.$rs["classname"].'</option>';
									}
									foreach ($classlist as $rss)
									{
										if($rss["parentid"]==$rs["classid"])
										{
											echo '<option value="'.$rss["classid"].'" >&nbsp;┣&nbsp;'.$rss["classname"].'</option>';
										}
									}
								}
							}
						  ?>
                         </select></div>
                         </div>
                     <div class="form-row"><label class="form-field">栏目名称</label>
                     <div class="form-cont"><input name="classname" id="classname" class="input-txt" type="text" size="50" 
                     	value="<?=isset($info)&&!empty($info)?$info["classname"]:""?>"
                        vrel="_f|ft|<?=isset($classinfo['id']) && intval($classinfo['id'])>0?"":"ne|"?>sz=min:2,max:20,m:长度在2-20个字符之间,ww" 
                        warntip="#classnameTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus"  
                        oktip="#classnameOkTip"/>
                        <span class="tips-error hidden" id="classnameTip">提示</span>
                       	<span class="tips-right hidden" id="classnameOkTip">格式正确</span>
                      </div>
                      </div> 
                     
                      <div class="form-row"><label class="form-field">英文唯一名称</label>
                     <div class="form-cont">
                     <input name="uunique" id="uunique" class="input-txt" type="text" size="50" value="<?=isset($info)&&!empty($info)?$info["uunique"]:""?>">
                     </div>
                     </div> 
                     
                      <div class="form-row"><label class="form-field">栏目模块排序</label> 
                      <div class="form-cont">
                      <input name="lmorder" id="lmorder" type="text" class="input-txt" size="50" maxlength="20" value="<?=isset($info)&&!empty($info)?$info["lmorder"]:""?>"/>
                      <p class="form-tips">* 排序必须是数字,从小到大排序</p>
                      </div></div> 
                      
                       <div class="form-row"><label class="form-field">栏目链接地址</label>
                     <div class="form-cont">
                     <input name="classurl" id="classurl" class="input-txt" type="text" size="50"  value="<?=isset($info)&&!empty($info)?$info["classurl"]:""?>"></div></div> 
                      
                      <div class="form-row"><label class="form-field">栏目说明</label> 
                      <div class="form-cont">
                      <textarea name="readme" id="readme" class="input-area area-s4 code-area" cols="10" rows="10"><?=isset($info)&&!empty($info)?$info["readme"]:""?></textarea></div></div>
                     
                     <div class="form-row"><label class="form-field">关键词</label>
                     <div class="form-cont">
                     <textarea name="keyword" class="input-area area-s4 code-area" cols="10" rows="10"  id="keyword"><?=isset($info)&&!empty($info)?$info["keyword"]:""?></textarea></div></div> 
                     
                    <div class="form-row"><label class="form-field">描述</label>
                    <div class="form-cont">
                    <textarea name="description" class="input-area area-s4 code-area" cols="10" rows="10"  id="description"><?=isset($info)&&!empty($info)?$info["description"]:""?></textarea>
                    </div>
                    </div> 
                    
                    <div class="btn-area">
                  	 		<a id="submitBtn" class="btn-general highlight" name="<?=isset($info['classid']) && intval($info['classid'])>0?"确认修改":"确认添加"?>"><span><?=isset($info['classid']) && intval($info['classid'])>0?"确认修改":"确认添加"?></span></a>
                      		<input type="hidden" name="id" id="id" value="<?=V("g:id")?>" />
                      		<input type="hidden" name="bid" id="bid" value="<?=V("g:bid")?>" />
                    </div>
                    </div>
                </form>
            </div>
        </div>
       
        </div> 
<script type="text/javascript">
var valid = Xwb.use('Validator', {
	form: '#form1a',
    trigger:'#submitBtn',
	comForm : true
			});


</script>
</body>
</html>
