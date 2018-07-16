<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$adname?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
<?php $editor = APP :: N('editorModule');?>
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?=$adname?>管理<span>&gt;</span><?=isset($info['classid']) && intval($info['classid'])>0?"修改":"添加"?><?=$adname?></p></div>
         <div class="main-cont">
        <h3 class="title"><?=isset($info['classid']) && intval($info['classid'])>0?"修改":"添加"?><?=$adname?></h3>
        <div class="set-area">
        <form  name="form" id="form"  method="post" action="<?php echo URL('mgr/ad.savead')?>">
                <div class="form web-info-form">
                    <div class="form-row"><label class="form-field">所属栏目</label>
                        <div class="form-cont">
                         <select name="data[classid]" id="data[classid]" style="background-color:#EEEEEE" 
                            vrel="_f|ft|edit" 
                            warntip="#classidTip" 
                            style-wrong="input-error"  
                            style-focus="input-focus"  
                            oktip="#classidOkTip"                        
                         >
                          <option value="">请选择分类</option>
						  <?php
							if(isset($classlist) && !empty($classlist))
							{
								foreach ($classlist as $rs)
								{
									$flag = "";
									if($rs["parentid"]==0)
									{
										$flag = "";
										if(isset($info["classid"]) && $rs["classid"]==$info["classid"])
										{
											$flag = ' selected="selected"';
										}
										else
										{
											$flag = "";
										}
										echo '<option value="'.$rs["classid"].'" '.$flag.'>'.$rs["classname"].'</option>';
									}
									foreach ($classlist as $rss)
									{
										if($rss["parentid"]==$rs["classid"])
										{
											$flag = "";
											if(isset($info["classid"]) && $rss["classid"]==$info["classid"])
											{
												$flag = ' selected="selected"';
											}
											else
											{
												$flag = "";
											}
											echo '<option value="'.$rss["classid"].'" '.$flag.'>&nbsp;┣&nbsp;'.$rss["classname"].'</option>';
										}
									}
								}
							}
						  ?>
                         </select>
                            <span  id="classidTip" class="tips-error hidden">请选择相关信息分类</span>
                            <span id="classidOkTip" class="tips-right hidden">已选择</span>
                         </div>
                         </div>
                     <div class="form-row"><label class="form-field">标题</label>
                     <div class="form-cont">
                     <input name="data[title]" type="text" class="input-txt" id="data[title]" 
                     	value="<?=isset($info["title"])&&!empty($info["title"])?$info["title"]:""?>" size="50" maxlength="150"
                        vrel="_f|ft|<?=isset($classinfo['id']) && intval($classinfo['id'])>0?"":"ne|"?>sz=min:2,max:150,m:长度在2-150个字符之间,ww" 
                        warntip="#classnameTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus"  
                        oktip="#classnameOkTip"/>
                        <span class="tips-error hidden" id="classnameTip">提示</span>
                       	<span class="tips-right hidden" id="classnameOkTip">格式正确</span>
                      </div>
                  </div> 
                     
                     
                  <div class="form-row">
                     <label class="form-field">图片</label>
                     <div class="form-cont">
                     	<?= $editor->image(1,'imgurl',isset($info["imgurl"]) ? $info["imgurl"] : '','上传图片','class="input-txt",style="display:none;"');?>
                        <a class="btn_general" onclick="$('#imgurlBtn').click();"><span>上传图片</span></a>
                       <?php //upLoad::showUpload('img','imgurl',1,isset($info["imgurl"])?$info["imgurl"]:'')?>
                  	</div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">链接地址</label>
                     <div class="form-cont">
                       <input name="data[http]" type="text" class="input-txt" id="data[http]"  value="<?=isset($info["http"])&&!empty($info["http"])?$info["http"]:"http://"?>" maxlength="150">
                  	</div>
                  </div> 
                  <div class="form-row">
                      <label class="form-field">简介</label> 
                      <div class="form-cont">
                  		<textarea name="data[description]" id="data[description]" class="input-area" cols="50" rows="6" style="width:400px;"><?=isset($info["description"])&&!empty($info["description"])?$info["description"]:""?></textarea>
                    </div>
                  </div>
                  <div class="form-row">
                     <label class="form-field">排序</label>
                     <div class="form-cont">
                       <input name="data[lmorder]" type="text" class="input-txt" id="data[lmorder]"  value="<?=isset($info["lmorder"])&&!empty($info["lmorder"])?$info["lmorder"]:"0"?>" maxlength="50">
                  	</div>
                  </div> 
                     
                    <div class="form-row">
                        <label class="form-field">发布时间</label>
                        <div class="form-cont">
                          <input name="data[times]" type="text" class="input-txt" id="data[times]" 
                            value="<?=isset($info["times"])&&!empty($info["times"])?$info["times"]:date("Y-m-d H:i:s")?>" size="50" maxlength="20"
                            vrel="_f|ft|ne" 
                            warntip="#timesTip" 
                            style-wrong="input-error"  
                            style-focus="input-focus"  
                            oktip="#timesOkTip"/>
                          <span class="tips-error hidden" id="timesTip">提示</span>
                          <span class="tips-right hidden" id="timesOkTip">格式正确</span>
                        </div>
                    </div> 
                    <div class="form-row">
                    <label class="form-field">属性</label>
                    	<div class="form-cont">
                   		  <input type="checkbox" name="data[recommend]" id="data[recommend]" value="1" <?=isset($info["recommend"])&&$info["recommend"]==1?'checked="checked"':''?> />
                   		  <label for="data[recommend]">推荐</label>
                   		  <input name="data[audit]" type="checkbox" id="data[audit]" value="1" checked="checked" <?=isset($info["audit"])&&$info["audit"]==1?'checked="checked"':''?>/>
                   		  <label for="data[audit]">审核</label>
                   		  <input type="checkbox" name="data[top]" id="data[top]" value="1" <?=isset($info["top"])&&$info["top"]==1?'checked="checked"':''?>/>
                   		  <label for="data[top]">置顶</label>
                        </div>
                    </div> 
                    <div class="btn-area">
                      <input type="hidden" name="data[id]" id="data[id]" value="<?=V("g:id")?>" />
               		  <input type="hidden" name="data[bid]" id="data[bid]" value="<?=V("g:bid")?>" />
                      <a class="btn_genera2" onclick="$('#submssitBtn').click();"><span><?=isset($info['classid']) && intval($info['classid'])>0?"确认修改":"确认添加"?></span></a>
                      
                      <input type="submit" name="submssitBtn" id="submssitBtn" value="<?=isset($info['classid']) && intval($info['classid'])>0?"确认修改":"确认添加"?>" style="display:none;"/>
                  </div>
          </div>
                </form>
            </div>
        </div>
       
        </div> 
<script type="text/javascript">
var valid = Xwb.use('Validator', {
	form: '#form',
	comForm : true,
	validators : {
					'edit':function(elem, v, data, next)
			 		{
						if($("select[id='data[classid]']").val()=="")
						{
							data.m = '该项为必选';
							this.report(false, data);
						} 
						else
						{ 
							data.m = '验证通过';
							this.report(true, data);
						}
						next();
			 		}
				}
			});
</script>
</body>
</html>
