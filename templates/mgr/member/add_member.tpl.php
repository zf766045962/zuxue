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

<?php $editor = APP :: N('editorModule');?>

<?php $getID3 = APP :: N('AudioInfo');?>
<!--百度编辑器 开始-->
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo W_BASE_URL;?>ueditor/editor_all.js"></script>
<!--百度编辑器 结束-->
</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>会员管理<span>&gt;</span><?= isset($info['id']) && intval($info['id']) > 0 ? "修改" : "添加";?>会员</p>
    </div>
    <div class="main-cont">
        <h3 class="title">
		<a class="btn-general" href="<?= URL('mgr/member2.memberlist','&type='.V('r:type'))?>"><span>返回列表</span></a>
		</h3>
        <style>.ww1 li a:hover{ text-decoration:none;}</style>
        <div class="conh1">
            <div id="butong_net1">
            <div class="set-area">
                <div class="form web-info-form">
                    <form id="form" method="post" action="<?= URL('mgr/member2.saveMemberInfo','&id='.$info["id"])?>">
                        <div class="dis" name="f">
                            <div class="form-row"><label class="form-field">＊用户账号</label>
                            	<div class="form-cont">
                                <?php
                                	if(!empty($info)){
								?>
                                <p><?= $info["username"]?></p>
                                <?php
									}else{
								?>
                           		<input name="username" type="text" class="input-txt" id="username" value="" maxlength="150" datatype="m"  maxlength="11" errormsg="请填写有效手机号"  />
                                <?php }?>
                           		</div>
                            </div>
							
							<div class="form-row"><label class="form-field">昵称</label>
                            	<div class="form-cont" style="line-height:19px;">
                            	<input name="realname" type="text" class="input-txt" id="realname" value="<?=isset($info["realname"]) && !empty($info["realname"]) ? $info["realname"] : '';?>" maxlength="150" datatype="*3-10" errormsg="昵称格式无效"/>
                            	</div>
                            </div>
                            <?php 
								if(empty($info)){
							?>
                            <div class="form-row"><label class="form-field">密码</label>
                            <div class="form-cont" style="line-height:19px;">
                            <input name="password" type="password" class="input-txt" id="password" value="" maxlength="16" datatype="*6-16" ignore="ignore" errormsg="密码长度在6-16位之间" />&nbsp;<font color="#666666">填写密码后将修改用户密码</font>
                            </div>
                            </div>
							<?php }?>
                            
							<div class="form-row">
                            <label class="form-field">性别</label> 
                            <div class="form-cont">
                                <label><input type="radio" name="sex" value="1" <?= $info["sex"] == 1 || !isset($info["sex"])?'checked="checked"' : ''?>/>男</label>
                                <label><input type="radio" name="sex" value="2" <?= $info["sex"] == 2 ? 'checked="checked"':'';?>/>女</label>
                            </div>
                            </div>
							
							<div class="form-row"><label class="form-field">选择角色</label>
                            <div class="form-cont">
                            <select name="roleid">
								<option>请选择</option>
								<?
									if($rlist){
										foreach($rlist as $kr => $vr){
								?>
									<option value="<?= $vr['id']?>" <?= $info["roleid"] == $vr['id'] ? 'selected="selected"' : ''?> ><?= $vr['title']?></option>
								<?
										}
									}
								?>
							</select>
                            </div>
                            </div>
							<?php 
								if(V("r:type")==2){
							?>  
                                 
                            <div class="form-row"><label class="form-field">明星学员</label>
                            <div class="form-cont">    
                            <label><input name="isstart" type="checkbox" id="isstart" value="1" <?= isset($info["isstart"]) && !empty($info["isstart"]) ? "checked" : '';?>/><label>
                            </div> 
                            </div>
                            
                            <div class="form-row">
                            <label class="form-field">明星学员头像</label>  
                            <div class="form-cont">
                            <div class="f_upbox"><img src="<?= !empty($info['head_img'])?$info['head_img']:"images/f_center_03.jpg"?>" id="head_imgView" ></div><br/>
                            <?= $editor->image(1,'head_img',isset($info["head_img"]) ? $info["head_img"]:'','上传图片','class="input-txt",style="display:none;"');?>
                            <a class="btn_general" onclick="$('#head_imgBtn').click();"><span>上传头像</span></a>
                            </div>
                            </div>
                            
                            <div class="form-row"><label class="form-field">学员类型</label>
                            <div class="form-cont">
                            <input name="startname" type="text" class="input-txt" id="startname" value="<?=isset($info["startname"]) && !empty($info["startname"]) ? $info["startname"] : '';?>" />
                            </div>
                            </div>
                            
                            
                            <div class="form-row"><label class="form-field">学习时间</label>
                            <div class="form-cont">
                            <input name="studytime" type="text" class="input-txt" id="studytime" value="<?=isset($info["studytime"]) && !empty($info["studytime"]) ? $info["studytime"] : '';?>"  />
                            </div>      
                            </div>
                            
                            <div class="form-row"><label class="form-field">报名课程数</label>
                            <div class="form-cont">
                            <input name="studynum" type="text" class="input-txt" id="studynum" value="<?=isset($info["studynum"]) && !empty($info["studynum"]) ? $info["studynum"] : '';?>"  />
                            </div>
                            </div>
                                 
							<?php
								}
							?>
							<div class="form-row"><label class="form-field">选择机构</label> 
                            <div class="form-cont">
                            <select id="oneCategory" name="orid1" onchange="select_category(this.value,'twoCategory')">
								<option value="0">请选择...</option>
								<?php 
									if(empty($info['orid'])&&!empty($goods_category)){
										foreach($goods_category as $cat){
								?>
								<option value="<?php echo $cat['linkageid']?>" ><?php echo $cat['name']?></option>
								<?php		
										}
									}else if(!empty($info['orid'])&&!empty($present_category)){
										foreach($present_category[0] as $cat){
								?>
								<option value="<?php echo $cat['linkageid']?>" <?php echo $cat['flag']?>><?php echo $cat['name']?></option>
								<?php	
										}
									}
								?>
							  </select>
							 <!-- <select id="twoCategory" name="orid2" onchange="select_category(this.value,'fourCategory')">
								<option value="0">请选择...</option>
								<?php 
									/*if(!empty($info['orid'])&&!empty($present_category)){
										foreach($present_category[1] as $cat){*/
								?>
								<option value="<?php echo $cat['linkageid']?>" <?php echo $cat['flag']?>><?php echo $cat['name']?></option>
								<?php	
										/*}
									}*/
								?>
							</select>
							<select id="fourCategory" name="orid3" onchange="select_category(this.value,'fiveCategory')">
							<option value="0">请选择...</option>
							<?php 
								/*if(!empty($goods_info['orid'])&&!empty($present_category)){
									foreach($present_category[2] as $cat){*/
							?>
							<option value="<?php echo $cat['linkageid']?>" <?php echo $cat['flag']?>><?php echo $cat['name']?></option>
							<?php	
									/*}
								}*/
							?>
							</select>-->
                            </div>
                            </div>
							
							<script>
								function select_category(v,id){
									if(v!=''){
										$.post("<?php echo URL('mgr/member2.get_specifies_category')?>",{orid:v},function(json){
											var obj=eval('('+json+')');
											if(obj.category_html!=''){
												$("#"+id).html(obj.category_html);
											}
										});   
									}	    
								}
							</script>
							<?php 
								if(empty($info)){
							?>
                            <div class="form-row"><label class="form-field">＊邮箱</label>
                            <div class="form-cont">
                            <input name="email" type="text" class="input-txt" id="email" value="<?=isset($info["email"]) && !empty($info["email"]) ? $info["email"] : '';?>" datatype="e" nullmsg="请填写邮箱" errormsg="请填写有效邮箱" />
                            </div>
                            </div>
                            
                            <div class="form-row"><label class="form-field">＊手机</label>
                            <div class="form-cont">
                            <input name="phone" type="text" class="input-txt" id="phone" value="<?=isset($info["phone"]) && !empty($info["phone"]) ? $info["phone"] : '';?>" maxlength="11" nullmsg="请填写手机号" errormsg="请填写有效手机号" datatype="m"/>
                            </div>
                            </div>
							<?php }?>
                            
                            <div class="form-row"><label class="form-field">地址</label>
                            <div class="form-cont">
                                <select name="location_p" style="background-color:#EEEEEE"></select>
                                <select name="location_c" style="background-color:#EEEEEE"></select>
                                <select name="location_a" style="background-color:#EEEEEE"></select>
                            </div>
                            </div>
							
							<div class="form-row"><label class="form-field">详细地址</label>
                                <div class="form-cont">
                                	<input name="address" type="text" class="input-txt" id="address" value="<?=isset($info["address"]) && !empty($info["address"]) ? $info["address"] : '';?>" />
                                </div>
                            </div>
                            
							<script src="js/region_select.js"></script>
							
                            <script type="text/javascript">
                                new PCAS("location_p", "location_c", "location_a", '<?= $info['location_p']?>', '<?= $info['location_c']?>', '<?= $info['location_a']?>');
                            </script>
                            
							<div class="form-row"><label class="form-field">个人简介</label>
                                <div class="form-cont">
								<textarea name="introduce" id="introduce" class="input-txt"><?=isset($info["introduce"]) && !empty($info["introduce"]) ? $info["introduce"] : '';?></textarea>
                                </div>
                            </div>
							
							<input type="hidden" name="type" value="<?= V('r:type')?>" />
							
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
				location = location;	
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