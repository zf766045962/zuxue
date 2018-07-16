<?php 
		$app_title=(isset($data)&&!empty($data))?$data['app_title']:'';
		$app_name=(isset($data)&&!empty($data)) ?$data['app_name']:'';
		$desc=(isset($data)&&!empty($data)) ?$data['desc']:'';
		$id=(isset($data)&&!empty($data)) ?$data['id']:'';

?>
<form id="from1" method="post" name="form1" action="<?php echo URL('mgr/permit.Appsave')?>">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">应用标题</label>
          <div class="form-cont">
            <input type="text"  vrel="_f|ft|ne=m:不能为空|sz=min:1,max:20,m:长度在不超过20个字符,ww" warntip="#usernameTip" class="input-txt" name="app_title" id="app_title" value="<?php echo $app_title	;?>">
            <span class="tips-error hidden" id="usernameTip">格式不正确</span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">唯一英文名称</label>
          <div class="form-cont">
            <input type="text" warntip="#nameTip2" vrel="english|ne=m:不能为空|sz=min:2,max:20,m:长度在2-20个字符之间,ww" class="input-txt" name="app_name" id="app_name" value="<?php echo $app_name	;?>">
            <span id="nameTip2" class="tips-error hidden"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">说明</label>
          <div class="form-cont">
          
            <textarea class="input-area area-s4 code-area" cols="10" rows="10"   name="desc" id="desc"><?php echo $desc	;?></textarea>
            <span id="nameTip2" class="tips-error hidden"></span> </div>
        </div>
      
              <input type="hidden" value="<?php echo $id ;?>" id="id" name="id">
              <input type="hidden" value="<?php echo $app_name ;?>" id="app_name1" name="app_name1">
      </div>
        <div class="center">
            <div class="btn-area"><a  class="btn-general highlight" id="pop_ok" href="#"><span> 保 存 </span></a>  <a  class="btn-general highlight" id="pop_cancel" href="#"><span> 取消 </span></a>
              <label>
              
              </label>
            </div>
        </div>
        
        
  <a class="ico-close-btn" href="#" id="xwb_cls" title="关闭"></a>
</form>

