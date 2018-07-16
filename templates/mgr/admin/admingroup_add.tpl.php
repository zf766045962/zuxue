<?php 
		$group_name=(isset($data)&&!empty($data))?$data['group_name']:'';
		$permissions=(isset($data)&&!empty($data)) ?$data['permissions']:'';
		$desc=(isset($data)&&!empty($data)) ?$data['desc']:'';
		$gid=(isset($data)&&!empty($data)) ?$data['gid']:'';

?>
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<form id="from1" method="post" name="form1" action="<?php echo URL('mgr/admingroup.saveAdmingroup')?>">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">管理员组名称</label>
          <div class="">
            <input type="text"  vrel="_f|ft|ne=m:不能为空|sz=min:1,max:20,m:长度在不超过20个字符,ww" warntip="#nameTip" class="input-txt" name="group_name" id="group_name" value="<?php echo $group_name	;?>">
            <span class="tips-error hidden" id="nameTip">格式不正确</span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">权限模板</label>
          <div class="">
            <select id="permissionsId" name="permissionsId">
              <option value="">&nbsp;-&nbsp;=&nbsp;请选择管理员模板&nbsp;=&nbsp;-&nbsp;</option>
            <?php 
			if(isset($list))
			{
				$chk = "";
				$gidd = 0;
				$oldpermissionsId = "";
				if(intval($pgid) != 0)
				{
					$gidd = $pgid;
				}
				else
				{
					$gidd = $gid;
				}
				foreach($list as $item)
				{
					if($gidd == $item['gid']){
						$chk = " selected=\"selected\"";
						$oldpermissionsId = $item['gid'];
					}
					else
					{
						$chk = "";	
					}
					if(intval($item["parent_id"])==0)
					{
						echo ' <option value="'.$item['gid'].'" '.$chk.'>'.$item['group_name'].'</option>';
					}
					foreach($list as $items)
					{
						if($gidd == $items['gid'])
						{
							$chk = " selected=\"selected\"";
							$oldpermissionsId = $items['gid'];
						}
						else{
							$chk = "";	
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
            <label>
            
            </label>
          <span id="nameTip2" class="tips-desc">选择类似的管理组权限，方便后期设置</span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">说明</label>
          <div class="">
          
            <textarea class="input-area area-s4 code-area" cols="10" rows="10"   name="desc" id="desc"><?php echo $desc	;?></textarea>
            <span id="nameTip2" class="tips-error hidden"></span> </div>
        </div>
      
              <input type="hidden" value="<?php echo $gid ;?>" id="gid" name="gid">
              <input type="hidden" value="<?php echo $pgid;?>" id="pgid" name="pgid">
              <input type="hidden" value="<?php echo $oldpermissionsId;?>" id="oldpermissionsId" name="oldpermissionsId">
      </div>
        <div class="center">
            <div class="btn-area"><a  class="btn-general highlight" id="pop_ok" href="#"><span> 保 存 </span></a> 
             <a  class="btn-general highlight" id="pop_cancel" href="#"><span> 取消 </span></a>
              <label>
              
              </label>
            </div>
        </div>
        
        <input name="3" type="submit" style="display:none;"/>
  <a class="ico-close-btn" href="#" id="xwb_cls" title="关闭"></a>
</form>

