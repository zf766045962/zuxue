<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员组（角色）列表 - 管理员组管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>

<?php 


		function getRuningRoute($router){
		//	$m = 'mgr/admin/admin.app';
		$r = APP::_parseRoute($router); 
		$m = array(
			'path'=>$r[1],
			'class'=>$r[2],
			'function'=>$r[3],
		);
	//	return $m['path'].$m['class'].".".$m['function'] ;
		return $m;
		}

		/**
		 * 得到控制器名称
		 * @return string
		 */
		function _getController($router) {
				
				$router_str = getRuningRoute($router);
				return trim($router_str['path'], '/\\');
		}

		/**
		 * 得到模块名称
		 * @return string
		 */
		function _getModule($router) {
				$router_str = getRuningRoute($router);
				return $router_str['class'];
		}

		/**
		 * 复到action名称
		 * @return string
		 */
		function _getAction($router) {
				$router_str = getRuningRoute($router);
				return $router_str['function'];
		}
		
		$router='mgr/xx/admin.app';
		function getname($router){
		
			$str=_getModule($router)._getAction($router);
		
		}
		
		//过滤不合要求的字符串
		function route_escape($router){
		//$router='http://www.bacu.com/index.php?m=mgr/xx/admin.app';
		//todo...
		return $router;
		}
	/*
	print_r($menu);
	var_dump(getRuningRoute($router));
	var_dump(_getController($router)); 
	var_dump(_getModule($router));
	var_dump(_getAction($router));
	exit;
	*/
?>
<script type="text/javascript">

function checkAll(itemname){
	var _true = $('#'+itemname+'_a').attr("checked");
	$("input[name='"+itemname+"_all_item_selected[]']").attr("checked", _true);
	//$("input[name='ui_all_item_selected[]']").attr("checked", _true);
}

function checkAll2(itemname){
	$("input[name='"+itemname+"_all_item_selected[]']").each(function () {  
		$(this).attr("checked", !$(this).attr("checked"));
	});
}
//组装全部选中的权限
function submitForm(){
	var str = '';
	$(":input[type=checkbox][checked]").each(function(){
		if(str == ''){
			str = this.value;
		}else{
			str += ',' + $(this).val();
		}
	});
	$('#permissions').val(str);
	//alert($('#permissions').val());
	$('#form1').submit();
}
</script>

</head>
<body class="main-body">
<div class="main-wrap">
  <div class="path">
    <p>当前位置：系统设置<span>&gt;</span>管理组</p>
  </div>
  <div class="main-cont">
  <?= V('r:gid') == 1 ? '<b style="color:red">当前为超级管理组，拥有所有权限，无需设置。</b>' : ''?>
<form id="form1" name="form1" method="post" action="<?= URL('mgr/admingroup.savePermitByRoute')?>">
<div class="map-cont clear">
    <ull class="adobe-content">
        <?php
		 foreach(array_keys($menu) as $class1){?>
         <input type="hidden" name="all[]"  id="all[]" value="<?php echo $class1 ?>" />
        <li class="odd"><h4><?php echo $menu[$class1]['classname'] ?></h4>
        
        <!--  原先复选框的形式
        <label>
        <input id="<?php echo $class1 ?>_a" name="<?php echo $class1 ?>_a" type="checkbox" value="" onclick="checkAll('<?php echo $class1 ?>')" />全选 >
        </label>			-->	
        
        <!--  现在的按钮形式  	-->	
        <a class="btn-general highlight" href="javascript:;" onclick="checkAll2('<?php echo $class1 ?>')" style="margin-top:5px;"><span>全选 / 反选</span></a>
        
			<?php
			if(isset($menu[$class1]) && is_array($menu[$class1]))
			{ 
				foreach($menu[$class1] as $class2)
				{
					if(isset($class2)&& is_array($class2))
					{  
			?>
     	    <input type="hidden" name="<?php echo $class1 ?>_item[]"  id="<?php echo $class1 ?>_item[]" value="<?php echo $class1 ?>"  />
           
                <br />  <em class="form-field" style="width:110px;"><?php echo $class2['classname']; ?></em>
             <span class="arr">&gt;&gt;</span>
					<?php
						foreach($class2 as $class3)
						{
							if(is_array($class3))
							{
					?>
             
  						<input type="hidden" name="<?php echo $class1 ?>_all_item[]"  id="<?php echo $class1 ?>_item[]" value="<?php echo $class3['classname'] ?>" />
                        <label>
                        <input type="checkbox" name="<?php echo $class1 ?>_all_item_selected[]" value="<?= $class3['classid'] ?>" <?= in_array($class3['classid'],$permissions) ? 'checked' : '';?>/>
                       <a title="<?= $class3['classurl'] ?>"> <?= $class3['classname'] ?></a>
                       </label>
				 <?php 
				 			}
				 		}
				 	}
				 ?>
		    <?php 
					}
				}
			?>
       
          </li>
 
    <?php }?>
    <input name="gid" type="hidden" id="gid" value="<?= $gid ?>">
    <input name="permissions" type="hidden" id="permissions" value="">
    </ull>
<div class="center">  <div class="btn-area"><a href="javascript:;" id="submitBtn" class="btn-general highlight" name="保存修改" onclick="submitForm();"><span>提交</span></a><a href="<?php echo URL('mgr/admingroup')?>" id="submitBtn" class="btn-general highlight" name="保存修改"><span>返回</span></a></div></div>
</div>

</form>

  </div>
</div>

</body>
</html>
