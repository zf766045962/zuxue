<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<table cellpadding="2" cellspacing="1" width="98%">
	<tr> 
      <td width="100">表单</td>
		<td><textarea name="setting[formtext]" rows="2" cols="20" id="options" style="height:100px;width:400px;"><?php echo new_html_special_chars($setting['formtext']);?></textarea><BR>
	  例如：&lt;input type='text' name='info[wanneng]' id='wanneng' value='{FIELD_VALUE}' class='input-text' &gt;<br />
      定义变量：{FIELD_VALUE}、{ID}、{MODELID}、{附属字段名}<br />
      自定义函数：{FUNC(函数名~~参数1,参数2,参数3)} 函数名也可以为php内置函数，最多三个参数
      </td>
    </tr>
	<tr> 
      <td>字段类型</td>
      <td>
	  <select name="setting[fieldtype]" onchange="javascript:fieldtype_setting(this.value);">
	  <option value="varchar" <?php if($setting['fieldtype']=='varchar') echo 'selected';?>>字符 VARCHAR</option>
	  <option value="tinyint" <?php if($setting['fieldtype']=='tinyint') echo 'selected';?>>整数 TINYINT(3)</option>
	  <option value="smallint" <?php if($setting['fieldtype']=='smallint') echo 'selected';?>>整数 SMALLINT(5)</option>
	  <option value="mediumint" <?php if($setting['fieldtype']=='mediumint') echo 'selected';?>>整数 MEDIUMINT(8)</option>
	  <option value="int" <?php if($setting['fieldtype']=='int') echo 'selected';?>>整数 INT(10)</option>
	  </select> <span id="minnumber" style="display:none"><input type="radio" name="setting[minnumber]" value="1" <?php if($setting['minnumber']==1) echo 'checked';?>/> <font color='red'>正整数</font> <input type="radio" name="setting[minnumber]" value="-1" <?php if($setting['minnumber']==-1) echo 'checked';?>/> 整数</span>
	  </td>
    </tr>
</table>