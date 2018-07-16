<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<table cellpadding="2" cellspacing="1" bgcolor="#ffffff">
	<tr> 
      <td width="100">时间类型</td>
      <td>
	  <label><input type="radio" name="setting[fieldtype]" value="date" <?php if($setting['fieldtype']=='date') echo 'checked';?>> 日期（<?=date('Y-m-d')?>）</label><br />
	  <label><input type="radio" name="setting[fieldtype]" value="datetime" <?php if($setting['fieldtype']=='datetime') echo 'checked';?>> 日期+时间（<?=date('Y-m-d H:i:s')?>）</label><br />
	  <label><input type="radio" name="setting[fieldtype]" value="int" <?php if($setting['fieldtype']=='int') echo 'checked';?>> 整数 </label> 显示格式：
      <select name="setting[format]">
	  <option value="Y-m-d Ah:i:s" <?php if($setting['format']=='Y-m-d Ah:i:s') echo 'selected';?>>12小时制：<?php echo date('Y-m-d h:i:s')?></option>
	  <option value="Y-m-d H:i:s" <?php if($setting['format']=='Y-m-d H:i:s') echo 'selected';?>>24小时制：<?php echo date('Y-m-d H:i:s')?></option>
	  <option value="Y-m-d H:i" <?php if($setting['format']=='Y-m-d H:i') echo 'selected';?>><?php echo date('Y-m-d H:i')?></option>
	  <option value="Y-m-d" <?php if($setting['format']=='Y-m-d') echo 'selected';?>><?php echo date('Y-m-d')?></option>
	  <option value="m-d" <?php if($setting['format']=='m-d') echo 'selected';?>><?php echo date('m-d')?></option>
	  </select>
	  </td>
    </tr>
	<tr> 
      <td>默认值</td>
      <td>
	  <label><input type="radio" name="setting[defaulttype]" value="0" <?= $setting['defaulttype'] ? '' : 'checked';?>/> 无 </label><label><input type="radio" name="setting[defaulttype]" value="1" <?= $setting['defaulttype'] ? 'checked' : '';?>/> 当前时间 </label><br />
	 </td>
    </tr>
</table>