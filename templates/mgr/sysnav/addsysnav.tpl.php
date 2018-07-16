<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>内容管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>

</head>
<body class="main-body">
	<div class="path">
	  <p>当前位置：后台管理<span>&gt;</span>系统菜单设置<span>&gt;</span>系统栏目管理</p></div>
         <div class="main-cont">
        <h3 class="title">添加系统分类</h3>
        <div class="set-area">
        <form name="form1" id="form1" method="post" action="<?php echo URL('mgr/sysNav.saveForm')?>">
                <div class="form web-info-form">
                    <div class="form-row"><label class="form-field">所属栏目</label>
                        <div class="form-cont">
                         <select name="parentid" style="background-color:#EEEEEE">
						  <?php echo $class;?>
                         </select></div>
                         </div>
                    <div class="form-row"><label class="form-field">栏目属性</label>
                        <div class="form-cont">
                         <select name="statue" style="background-color:#EEEEEE">
                           <option value="1">作为栏目与权限添加</option>
                           <option value="2">只用作栏目</option>
                           <option value="3">只用于权限</option>
						 
                         
                         </select></div>
                     </div>
                    <div class="form-row"><label class="form-field">板块所属</label>
                        <div class="form-cont">
                         <select name="systype" style="background-color:#EEEEEE">
                           <option value="1">内容管理</option>
                           <option value="0">系统管理</option>
                         </select></div>
                     </div>
                     <div class="form-row"><label class="form-field">栏目名称</label>
                     <div class="form-cont"><input name="classname" class="input-txt" type="text" size="50" /></div></div> 
                     
                      <div class="form-row"><label class="form-field">英文唯一名称</label>
                     <div class="form-cont">
                     <input name="uunique" class="input-txt" type="text" size="50" >
                     </div>
                     </div> 
                     
                      <div class="form-row"><label class="form-field">栏目模块排序</label> 
                      <div class="form-cont">
                      <input name="lmorder" type="text" class="input-txt" size="50" maxlength="20" />
                      <p class="form-tips">* 排序必须是数字,从小到大排序</p>
                      </div></div> 
                      
                       <div class="form-row"><label class="form-field">栏目链接地址</label>
                     <div class="form-cont">
                     <input name="classurl" class="input-txt" type="text" size="50" ></div></div> 
                      
                      <div class="form-row"><label class="form-field">栏目说明</label> 
                      <div class="form-cont">
                      <textarea name="readme" class="input-area area-s4 code-area" cols="10" rows="10" id="readme"></textarea></div></div>
                     
                     <div class="form-row"><label class="form-field">关键词</label>
                     <div class="form-cont">
                     <textarea name="keyword" class="input-area area-s4 code-area" cols="10" rows="10"  id="keyword"></textarea></div></div> 
                     
                    <div class="form-row"><label class="form-field">描述</label>
                    <div class="form-cont">
                    <textarea name="description" class="input-area area-s4 code-area" cols="10" rows="10"  id="description"></textarea>
                    </div>
                    </div> 
                    
                    <div class="btn-area">
                    	<a class="btn-general highlight" id="submitBtn" href="javascript:;" onclick="$('#form1').submit();"><span>保 存</span></a>
                  		<!--<input type="submit" value="保存" name="subtn" />-->
                    </div>
                </form>
            </div>
        </div>
       
        </div> 
</body>
</html>
