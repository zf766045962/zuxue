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
	  <p>当前位置：后台管理<span>&gt;</span>会员管理<span>&gt;</span><?=isset($info['id']) && intval($info['id'])>0?"修改":"添加"?>会员</p></div>
         <div class="main-cont">
        <h3 class="title"><?=isset($info['id']) && intval($info['id'])>0?"修改":"添加"?>会员</h3>
        <div class="set-area">
        <form  method="post" action="<?php echo URL('mgr/users.saveusers')?>">
                <div class="form web-info-form">
                  <div class="form-row">
                     <label class="form-field">用户名</label>
                     <div class="form-cont">
                     <input name="data[username]" type="text" class="input-txt"  value="<?=isset($info["username"])&&!empty($info["username"])?$info["username"]:""?>" size="50" maxlength="150" />                     
                      </div>
                  </div>
                  <div class="form-row">
                     <label class="form-field">性别</label>
                     <div class="form-cont">
                     <input name="data[sex]" type="radio" value="2" <?php echo $info['sex']==2?' checked="checked"':''?> />男&nbsp;
                     <input name="data[sex]" type="radio" value="1" <?php echo $info['sex']==1?' checked="checked"':''?> />女&nbsp;
                     <input name="data[sex]" type="radio" value="0" <?php echo $info['sex']==0?' checked="checked"':''?> />保密                    
                     </div>
                  </div>
                  <div class="form-row">
                     <label class="form-field">邮箱</label>
                     <div class="form-cont">
                     <input name="data[email]" type="text" class="input-txt"  value="<?=isset($info["email"])&&!empty($info["email"])?$info["email"]:""?>" size="50" maxlength="150" />                     
                      </div>
                  </div>
                  <div class="form-row">
                     <label class="form-field">Q Q</label>
                     <div class="form-cont">
                     <input name="data[qq]" type="text" class="input-txt"  value="<?=isset($info["qq"])&&!empty($info["qq"])?$info["qq"]:""?>" size="50" maxlength="150" />                     
                      </div>
                  </div>
                  <div class="form-row">
                     <label class="form-field">手机</label>
                     <div class="form-cont">
                     <input name="data[mobile]" type="text" class="input-txt"  value="<?=isset($info["mobile"])&&!empty($info["mobile"])?$info["mobile"]:""?>" size="50" maxlength="150" />                     
                      </div>
                  </div>
                  <div class="form-row">
                     <label class="form-field">联系地址</label>
                     <div class="form-cont">
                     <input name="data[address]" type="text" class="input-txt"  value="<?=isset($info["address"])&&!empty($info["address"])?$info["address"]:""?>" size="50" maxlength="150" />                     
                      </div>
                  </div>
                  <div class="form-row">
                     <label class="form-field">生日</label>
                     <div class="form-cont">
                     	<select name="year">
                        	<option value="0">请选择</option>
                            <? for($i=1970;$i<date("Y")+1;$i++){?>
    							<option value="<?=$i?>" <?php echo $info['year']==$i?'selected="selected"':'' ?> ><?=$i?></option>
    						<? }?>
                        </select>年 
                        <select name="month">
                        	<option value="0">请选择</option>
                            <? for($i=1;$i<=12;$i++){?>
    							<option value="<?=$i?>" <?php echo $info['month']==$i?'selected="selected"':'' ?>><?=$i?></option>
    						<? }?>
                        </select>月
                        <select name="day">
                        	<option value="0">请选择</option>
							<? for($i=1;$i<=31;$i++){?>
                                  <option value="<?=$i?>" <?php echo $info['day']==$i?'selected="selected"':'' ?>><?=$i?></option>
                            <? }?>                           
                        </select>日 
                     </div>
                  </div>      
                  <div class="form-row">
                     <label class="form-field">头像</label>
                     <div class="form-cont">
                       <?=upLoad::showUpload('img','imgurl',1,isset($info["imgurl"])?$info["imgurl"]:'','',10,true,210,21000)?>
                  	</div>
                  </div>
                  <div class="form-row">
                      <label class="form-field">个人介绍</label> 
                      <div class="form-cont">
                  		<textarea name="data[content]"  class="input-area" style="width:580px;"><?=isset($info["content"])&&!empty($info["content"])?$info["content"]:""?></textarea>
                    </div>
                  </div>
                     
                  <div class="form-row">
                        <label class="form-field">注册时间</label>
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

                   		  <input name="data[audit]" type="checkbox" id="data[audit]" value="1" checked="checked" <?=isset($info["audit"])&&$info["audit"]==1?'checked="checked"':''?>/>
                   		  <label for="data[audit]">审核</label>

                        </div>
                    </div> 
                    <div class="btn-area">
                 
                      <input type="hidden" name="id"  value="<?php echo !empty($info['id'])?$info['id']:''?>" />
                      <input type="submit" name="submssitBtn" id="submssitBtn" value="<?=isset($info['id']) && intval($info['id'])>0?"确认修改":"确认添加"?>" />
                  </div>
          </div>
                </form>
            </div>
        </div>
       
        </div> 

</body>
</html>
