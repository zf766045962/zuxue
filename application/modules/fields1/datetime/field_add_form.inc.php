<table cellpadding="2" cellspacing="1" bgcolor="#ffffff">
	<tr> 
      <td width="100">时间类型</td>
      <td>
	  <label><input type="radio" name="setting[fieldtype]" value="date" checked> 日期（<?php echo date('Y-m-d');?>）</label><br />
	  <label><input type="radio" name="setting[fieldtype]" value="datetime"> 日期+时间（<?php echo date('Y-m-d H:i:s');?>）</label><br />
	  <label><input type="radio" name="setting[fieldtype]" value="int"> 整数 </label> 显示格式：
      <select name="setting[format]">
	  <option value="Y-m-d Ah:i:s">12小时制：<?php echo date('Y-m-d h:i:s');?></option>
	  <option value="Y-m-d H:i:s">24小时制：<?php echo date('Y-m-d H:i:s');?></option>
	  <option value="Y-m-d H:i"><?php echo date('Y-m-d H:i');?></option>
	  <option value="Y-m-d"><?php echo date('Y-m-d');?></option>
	  <option value="m-d"><?php echo date('m-d');?></option>
	  </select>
	  </td>
    </tr>
	<tr> 
      <td>默认值</td>
      <td>
	  <label><input type="radio" name="setting[defaulttype]" value="0" checked/> 无 </label><label><input type="radio" name="setting[defaulttype]" value="1" /> 当前时间 </label><br />
	 </td>
    </tr>
</table>