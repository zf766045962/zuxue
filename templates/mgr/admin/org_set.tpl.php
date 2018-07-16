<?php 
	if(isset($data)&&!empty($data)){
		$app_title=(isset($data)&&!empty($data))?$data['app_title']:'默认';
		$app_name=(isset($data)&&!empty($data)) ?$data['app_name']:'sys';
	}else exit('必须先选择应用才可以操作模块！');
		$id=  (isset($module)&&!empty($module))?$module['id']:'';
		$module_title=  (isset($module)&&!empty($module))?$module['module_title']:'';
		$module_name =	(isset($module)&&!empty($module))?$module['module_name']:'';
		$desc		 =	(isset($module)&&!empty($module))?$module['desc']	 :'';
	

?>
<form id="from1" method="post" name="form1" action="<?php echo URL('mgr/permit.moduleSave')?>">
<div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">所属应用</label>
          <div class="form-cont">
            <input type="text"  class="input-txt" name="app_title" id="app_title" readonly="readonly" value="<?php echo $app_title; ?>">
          </div>
        </div>
      
        <div class="form-row">
          <label class="form-field">模块名称</label>
          <div class="form-cont">
            <input type="text"  vrel="_f|ft|ne=m:不能为空|sz=min:1,max:20,m:长度在6-20个字符之间,ww" warntip="#usernameTip" class="input-txt" name="module_title" id="module_title" value="<?php echo $module_title; ?>">
            <span class="tips-error hidden" id="usernameTip">格式不正确</span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">唯一英文代码</label>
          <div class="form-cont">
            <input type="text" warntip="#nameTip2" vrel="english|ne=m:不能为空|sz=min:2,max:20,m:长度在6-20个字符之间,ww" class="input-txt" name="module_name" id="module_name" value="<?php echo $module_name; ?>">
            <span id="nameTip2" class="tips-error hidden"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">说明</label>
          <div class="form-cont">
          
            <textarea class="input-area area-s4 code-area" cols="10" rows="10"   name="desc" id="desc"><?php echo $desc; ?></textarea>
            <span id="nameTip2" class="tips-error hidden"></span> 
         </div>
        </div>
      
        <div class="center"> 
        	  <input type="hidden" value="<?php echo $id ?>" id="id" name="id">
              <input type="hidden" value="<?php echo $module_name ?>" id="module_name1" name="module_name1">
              <input type="hidden" value="<?php echo $app_name ?>" id="app_name" name="app_name">
            <div class="btn-area"><a  class="btn-general highlight" id="pop_ok" href="#"><span> 保 存 </span></a>  <a  class="btn-general highlight" id="pop_cancel" href="#"><span> 取消 </span></a>

            </div>
        </div>
        
</div>      
  <a class="ico-close-btn" href="#" id="xwb_cls" title="关闭"></a>
</form>

