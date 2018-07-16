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
	  <p>当前位置：后台管理<span>&gt;</span><?php if($bid==21){echo "院校banner";}else if($bid==22){echo "院校简介";}else if($bid==23){echo "院校新闻";}else if($bid==24){echo "院校课程";}?>管理<span>&gt;</span><?=isset($info['id']) && intval($info['id'])>0?"修改":"添加"?><?php if($bid==21){echo "院校banner";}else if($bid==22){echo "院校简介";}else if($bid==23){echo "院校新闻";}else if($bid==24){echo "院校课程";}?></p></div>
         <div class="main-cont">
        <h3 class="title"><?=isset($info['id']) && intval($info['id'])>0?"修改":"添加"?><?php if($bid==21){echo "院校banner";}else if($bid==22){echo "院校简介";}else if($bid==23){echo "院校新闻";}else if($bid==24){echo "院校课程";}?></h3>
        <div class="set-area">
        <form  name="form" id="form"  method="post" action="<?php echo URL('mgr/university.savead')?>">
                <div class="form web-info-form">
                    <div class="form-row"><label class="form-field">所属院校</label>
                        <div class="form-cont">
                         <select name="data[orid1]" id="data[orid1]" style="background-color:#EEEEEE"                 >
                          <option value="">请选择院校</option>
						  <?php 		
								foreach($univer as $cat){
									if($cat['linkageid'] == $info['orid1']){
							?>
								<option value="<?php echo $cat['linkageid']?>" selected="selected"><?php echo $cat['name']?></option>
						<?php		
									}else{
						?>
                        			<option value="<?php echo $cat['linkageid']?>"><?php echo $cat['name']?></option>
						<?				
									}
								}
						?>
                         </select>
                         </div>
                     </div>
                     <?php 
					 	if($bid==24){
					 ?>
                      <div class="form-row"><label class="form-field">所属院系</label>
                        <div class="form-cont">
                         <select name="data[orid2]" id="data[orid2]" style="background-color:#EEEEEE"                 >
                          <option value="">请选择院系</option>
						  <?php 		
								foreach($class as $cat){
									if($cat['classid'] == $info['orid2']){
							?>
								<option value="<?php echo $cat['classid']?>" selected="selected"><?php echo $cat['classname']?></option>
						<?php		
									}else{
						?>
                        			<option value="<?php echo $cat['classid']?>"><?php echo $cat['classname']?></option>
						<?				
									}
								}
						?>
                         </select>
                         </div>
                     </div>
                     <?php }?>
                     
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
                     <label class="form-field">院校图片</label>
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
            <script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script> 
			<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script> 
			<!--百度编辑器 结束--> 
				  
				  <div class="form-row">
                     <label class="form-field">内容</label>
                     <div class="form-cont">
                       <textarea id="edit_content" name="data[content]"><?=$info['content']?></textarea>
						<script type="text/javascript"> 
							var editor = new UE.ui.Editor(); 
							editor.render("edit_content"); 
						</script>
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
                      <a class="btn_genera2" onclick="$('#submssitBtn').click();"><span><?=isset($info['id']) && intval($info['id'])>0?"确认修改":"确认添加"?></span></a>
                      
                      <input type="submit" name="submssitBtn" id="submssitBtn" value="<?=isset($info['id']) && intval($info['id'])>0?"确认修改":"确认添加"?>" style="display:none;"/>
                  </div>
          </div>
                </form>
            </div>
        </div>
       
        </div> 
<script type="text/javascript">
	$("#submssitBtn").click(function(){
		$("#edit_content").html(editor.body.innerHTML);
	})


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
