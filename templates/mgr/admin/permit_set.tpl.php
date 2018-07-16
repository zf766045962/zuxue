<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<?php // var_dump($permissions);var_dump($gid);?>
<form id="form1" name="form1" method="post" action="<?php echo URL('mgr/admingroup.savePermit')?>">
  <div class="map-cont clear">
  <ul class="adobe-content">
  <?php if($appList){             
		foreach($appList as $app){
			$appinfo=array('id'=>$app['id'],'app_name'=>$app['app_name'],'app_title'=>$app['app_title']);
		
		?>
  <li class="odd">
     <h4><?php echo $app['app_title'] ?></h4>
      <input type="hidden" name="all[]"  id="all[]" value="<?php echo $app['app_name'] ?>" />
        <?php $modules=DS('mgr/permitCom.getModuleByAppname','',$app['app_name']);
			if(!empty($modules)){
				foreach($modules as $module){
					$module['app_title']=$app['app_title'];
		  ?> <input type="hidden" name="<?php echo $app['app_name'].'_all_item[]' ?>" id="<?php echo $app['app_name'].'_all_item[]' ?>" value="<?php  echo $module['module_name'] ;?>" />
       <input type="checkbox" name="<?php echo $app['app_name'].'_item[]' ?>" 
       id="<?php echo $app['app_name'].'_item[]' ?>"  
       value="<?php  echo $module['module_name'] ;?>" 
	   <?php 
	   $per_selected=0;
	   if(is_array($permissions) &&isset($permissions) && isset($app['app_name']) &&isset($module['module_name'])){
	  // var_dump($app['app_name']);
	 //  var_dump($module['module_name']);
	 //  var_dump($permissions);
	 //  
	   $per_selected=isset($permissions[$app['app_name']][$module['module_name']])?$permissions[$app['app_name']][$module['module_name']]:0;
	   }
	   if($per_selected==1) : ?> checked="checked" <?php endif?>/>  
        <a><?php  echo $module['module_title'] ;?>
        </a> 
        <?php }  //end modules foreach
			}	//end if
		?>
   </li>
  <?php }  //end foreach?>
  <?php }//endif?>
  <p class="suggest-tips">*温馨提示：<br />
    当中只有部分页面支持设置，如果某个页面设置之后，它的子页面会自动应用这些设置。</p>
  <div class="center">
    <?php
	//$gid=V('r:gid');
	 if($gid==0){echo '必须先选择管理组。';}else{echo $gid;}  ?>
    <input name="gid" type="hidden" id="gid" value="<?php echo $gid ?>">
    <input type="submit" name="button" id="button" value="提交" />
  </div>
    <div class="btn-area"><a name="保存修改" class="btn-general highlight" id="pop_ok" href="#"><span>提交</span></a></div>
    <div class="btn-area"><a name="取消" class="btn-general highlight" id="pop_cancel" href="#"><span>取消</span></a></div>
  </div>
  <a class="ico-close-btn" href="#" id="xwb_cls" title="关闭"></a>
</form>
