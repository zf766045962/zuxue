<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=isset($admininfo['id']) && intval($admininfo['id'])>0?"修改管理员":"添加管理员"?></title>

</head>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
<body>
	<div class="path"><p>当前位置：管理员管理<span>&gt;</span><?=isset($admininfo['id']) && intval($admininfo['id'])>0?"修改管理员":"添加管理员"?></p></div>
    <div class="main-cont">
    	<h3 class="title">用户信息</h3>
        <div id="need">
    	<form action="<?=URL("mgr/admin.saveAdd_ModeNoMember")?>" method="post" id="shortLinkForm">
              	  <div class="form-row">

                	<label for="name1" class="form-field">用户名</label>
                    	   <input name="username" id="username" value="<?=isset($admininfo['username'])?$admininfo['username']:""?>" class="input-txt" type="text"  vrel="_f|ft|english|ne=m:不能为空|sz=min:6,max:20,m:长度在6-20个字符之间,ww" warntip="#usernameTip" style-wrong="input-error" style-focus="input-focus" oktip="#usernameOkTip"/>
                             <span class="tips-error hidden" id="usernameTip">格式不正确</span>
                       		<span class="tips-right hidden" id="usernameOkTip">格式正确</span>
        		  </div>

                    <div class="form-row"><span class="form-field"> 密码</span>

                        <input name="password" id="password" class="input-txt" type="password" value="" 
                        vrel="_f|ft|<?=isset($admininfo['id']) && intval($admininfo['id'])>0?"":"ne|"?>sz=min:5,max:20,m:长度在5-20个字符之间,ww" 
                        warntip="#passwordTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus"  
                        oktip="#passwordOkTip"/>
                        <span class="tips-error hidden" id="passwordTip">提示</span>
                       	<span class="tips-right hidden" id="passwordOkTip">格式正确</span>
                    </div>
                    
                     <div class="form-row"><span class="form-field"> 重复密码</span>
                        <input name="repassword" id="repassword" class="input-txt" type="password" value="" 
                        vrel="_f|<?=isset($admininfo['id']) && intval($admininfo['id'])>0?"":"ne|"?>repw" 
                        warntip="#repasswordTip" 
                        oktip="#repasswordOkTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus" />
                        <span class="tips-error hidden" id="repasswordTip">错误</span>

                       	<span class="tips-right hidden" id="repasswordOkTip">格式正确</span>
                    </div>
                    <div class="form-row"><span class="form-field"> email</span>
                        <input name="email" id="email" class="input-txt" type="text" value="<?=isset($admininfo['email'])?$admininfo['email']:""?>"  vrel="_f|ft|mail|ne" warntip="#emailTip" oktip="#emailOkTip" style-wrong="input-error"  style-focus="input-focus" />
                        <span class="tips-error hidden" id="emailTip">格式不正确，请输入正确格式</span>
                        <span class="tips-right hidden" id="emailOkTip">输入正确</span>

                    </div>
		            <div class="form-row"><span class="form-field">管理员组</span>
                        <label>
                        <select name="group_id" id="group_id" onchange="return false" <?=isset($admininfo['id']) && intval($admininfo['id'])>0?"disabled":""?>
                        vrel="_f|ft|edit" 
                        warntip="#groupTip" 
                        style-wrong="input-error"  
                        style-focus="input-focus"  
                        oktip="#groupOkTip"                        
                        >
                          <option value="">&nbsp;-&nbsp;=&nbsp;请选择管理员模板&nbsp;=&nbsp;-&nbsp;</option>
							<?php 
                            if(isset($list))
                            {
                                $chk = "";
                                foreach($list as $item)
                                {
									$chk 		= "";
                                    if($gid == $item['gid'])
									{
                                        $chk 	= " selected=\"selected\"";
                                    }
                                    else
                                    {
                                        $chk 	= "";	
                                    }
									if(isset($admininfo['group_id']) && !empty($admininfo['group_id']))
									{
										$chk 	= " selected=\"selected\"";
									}
                                    if(intval($item["parent_id"])==0)
                                    {
                                        echo ' <option value="'.$item['gid'].'" '.$chk.'>'.$item['group_name'].'</option>';
                                    }
                                    foreach($list as $items)
                                    {
										$chk = "";
                                        if($gid == $items['gid'])
                                        {
                                            $chk = " selected=\"selected\"";
                                        }
                                        else{
                                            $chk = "";	
                                        }
										if(isset($admininfo['group_id']) && !empty($admininfo['group_id']))
										{
											$chk 	= " selected=\"selected\"";
										}
                                        if(intval($items["parent_id"])>0 && $items["parent_id"]==$item["gid"])
                                        {
                                            echo ' <option value="'.$items['gid'].'" '.$chk.'>&nbsp;&nbsp;┣'.$items['group_name'].'</option>';
                                        }
                                    }
                                }
                            }
                         ?>
                        </select>

                        </label>
                        <span  id="groupTip" class="tips-error hidden">格式不正确，请输入正确格式</span>
                        <span id="groupOkTip" class="tips-right hidden">选择该管理员相对应的相应的管理员权限组</span>
          			</div>
		            <div class="form-row" style="display:none"><span class="form-field"> 是否属于系统管理员</span>
                        <label>
                        <select name="is_root" id="is_root" class="">
                          <option value="1">是</option>
                          <option value="1" selected="selected">否</option>
                        </select>

                        </label>
                        <span class="tips-right tips-desc">如果属于系统管理员组，那么默认情况下除系统管理员之外就不可以删除</span>
          			</div>
  				<div class="form form-s1">
                    <div class="form-cont">
						<a id="submitBtn" class="btn-general highlight" name="<?=isset($admininfo['id']) && intval($admininfo['id'])>0?"确认修改":"确认添加"?>"><span><?=isset($admininfo['id']) && intval($admininfo['id'])>0?"确认修改":"确认添加"?></span></a>
                        <span class="tips-error hidden" id="nameTip">提示</span>
                        <p class="form-tips" style="display:none;">本部分是不开启会员系统情况下的管理员添加，如果开启了管理员与会员之间的关系，那么需要在系统中配置。</p><br />
						<br />

                    </div>
                </div>
  				<input type="hidden" name="id" id="id" value="<?=isset($admininfo['id']) && intval($admininfo['id'])>0?$admininfo['id']:""?>" />
        </form>
    </div>
</div>
<script type="text/javascript">
function showPlus()
{
	$("#plus").slideToggle(200);
}
var valid = Xwb.use('Validator', {

//var valid = new Validator({
	form: '#shortLinkForm',
    trigger:'#submitBtn',
	comForm : true,
	validators : {
			 'repw':function(elem, v, data, next)
			 {
				if($('#repassword').val()!= $('#password').val())
				{
					data.m = '两次输入不一致';
					this.report(false, data);
				} 
				else
				{ 
					data.m = '验证通过';
					this.report(true, data);
				}
				next();
			 
			 },
			 
			 
			  'edit':function(elem, v, data, next)
			 {
				if($('#group_id').val()=='')
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
			 
			 },


			}

});


</script>
</body>
</html>

