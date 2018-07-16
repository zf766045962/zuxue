<form id="pwdForm" action="<?php echo URL('mgr/admin.add');?>" method="post">
	<div class="form-box">
		<div class="form-row">
			<label for="add-initial-password" class="form-field">密码</label>
			<div class="form-cont">
				<input name="pwd" class="ipt-txt" vrel="_f|ne|sz=min:6,max:16,m:长度为6-16位|pw" type="password" value="" warntip="#nameTip" /><span class="tips-error hidden" id="nameTip"></span>
      		<p class="form-tips">6-16位的数字或者字母</p>
			</div>
		</div>
		<div class="form-row">
			<label for="permission" class="form-field">所属管理组</label>
          <?php  // var_dump($list);?>
			<div class="form-cont">
				<select id="permission" name="group_id" class="w160" vrel="_f|ne"  warntip="#groupTip">
					<option value="0" selected="">选择管理组</option>
          <?php  
		  
		   if(isset($list) && !empty($list)){    
					 foreach($list as $value) {?>
					<option value="<?php echo $value['gid'] ?>"><?php echo $value['group_name'] ?></option>
          <?php }}?>
				</select>
				<span class="tips-error hidden" id="groupTip">请选择一个权限</span>
			</div>
		</div>
		<div class="form-row">
			<label  class="form-field">说明</label>
			<div class="form-cont">
   <?php 		   if(isset($list) && !empty($list)){ 
   					$n=0;   
					 foreach($list as $value) {
					 $n++;
					 if($n>5) break;
					 ?>
      		<p class="form-tips"><?php echo $value['group_name'].':'.$value['group_info'].'   '.$value['desc'] ?></p>
            <?php }}?>
			</div>
		</div>
   	<div class="btn-area">
			<input name="uid" type="hidden" id="uid" value="<?php echo $uid ?>"/>
			<a href="#" class="btn-general highlight" id="pop_ok"><span>确定</span></a>
			<a href="#" class="btn-general" id="pop_cancel"><span>取消</span></a>
   	</div>
   </div>
