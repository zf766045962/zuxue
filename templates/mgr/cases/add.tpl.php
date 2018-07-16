<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$casesname?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span><?=$casesname?>管理<span>&gt;</span><?=isset($info['classid']) && intval($info['classid'])>0?"修改":"添加"?><?=$casesname?></p></div>
         <div class="main-cont">
        <h3 class="title"><?=isset($info['classid']) && intval($info['classid'])>0?"修改":"添加"?><?=$casesname?></h3>
        <div class="set-area">
        <form  name="form" id="form"  method="post" action="<?php echo URL('mgr/cases.savecases')?>" >
                <div class="form web-info-form">
                    <div class="form-row"><label class="form-field">所属栏目</label>
                        <div class="form-cont">
                         <select name="data[classid]" id="data[classid]" style="background-color:#EEEEEE" >
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
                         </div>
                         </div>
                     <div class="form-row"><label class="form-field">标题</label>
                     <div class="form-cont">
                     <input name="data[title]" type="text" class="input-txt" id="data[title]" 
                     	value="<?=isset($info["title"])&&!empty($info["title"])?$info["title"]:""?>" size="50" maxlength="150" />                      </div>
                  </div> 
                     
                      <div class="form-row"><label class="form-field">关键字</label>
                     	<div class="form-cont">
                     		<input name="data[keyword]" type="text" class="input-txt" id="data[keyword]" value="<?=isset($info["keyword"])&&!empty($info["keyword"])?$info["keyword"]:""?>" size="50" maxlength="150"><span style="color:red;">多关键字之间用空格分开</span>
                     	</div>
                     </div> 
                     
                  <div class="form-row"><label class="form-field">发布人</label> 
                      <div class="form-cont">
                      <input name="data[publisher]" id="data[publisher]" type="text" class="input-txt" size="50" maxlength="20" value="<?=isset($info["publisher"])&&!empty($info["publisher"])?$info["publisher"]:""?>"/>
                      </div>
                  </div> 
                      
                  <div class="form-row"><label class="form-field">来源</label>
                  	  <div class="form-cont">
                      <input name="data[source]" type="text" class="input-txt" id="data[source]"  value="<?=isset($info["source"])&&!empty($info["source"])?$info["source"]:""?>" maxlength="50">
                      </div>
                  </div> 
                  <div class="form-row">
                     <label class="form-field">图片</label>
                     <div class="form-cont">
                       <?=upLoad::showUpload('img','imgurl',1,isset($info["imgurl"])?$info["imgurl"]:'','',10,true,210,21000)?>
                  	</div>
                  </div>
                  
                  <div class="form-row">
                     <label class="form-field">外链接地址</label>
                     <div class="form-cont">
                       <input name="data[http]" type="text" class="input-txt" id="data[http]"  value="<?=isset($info["http"])&&!empty($info["http"])?$info["http"]:""?>" maxlength="50">
                  	</div>
                  </div> 
                  <div class="form-row">
                      <label class="form-field">简介</label> 
                      <div class="form-cont">
                  		<textarea name="data[description]" id="data[description]" class="input-area" cols="50" rows="6" style="width:580px;"><?=isset($info["description"])&&!empty($info["description"])?$info["description"]:""?></textarea>
                    </div>
                  </div>
                     
                     
                    <div class="form-row">
                        <label class="form-field">内容</label>
                        <div class="form-cont">
							<?=uEditor::showEditor("content",1,isset($info["content"])?$info["content"]:'',true,660)?>
							<input type="button" name="button" id="button" value="按钮" onclick="alert($('#111111').val())"/>
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
                      <input type="hidden" name="data[accesstime]" id="data[accesstime]" value="<?=isset($info['classid']) && intval($info['classid'])>0?"":date("Y-m-d H:i:s")?>" />
                      <input type="hidden" name="data[id]" id="data[id]" value="<?=V("g:id")?>" />
               		  <input type="hidden" name="data[bid]" id="data[bid]" value="<?=V("g:bid")?>" />
                      <input type="submit" name="submssitBtn" id="submssitBtn" value="<?=isset($info['classid']) && intval($info['classid'])>0?"确认修改":"确认添加"?>" />
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
