<table cellpadding="2" cellspacing="1" width="98%">
	<tr> 
      <td width="120">菜单ID</td>
      <td><input type="text" id="linkageid" name="setting[linkageid]" value="0" size="5" class="input-text">
      <a class="btn-general" onclick="dialog('<?= URL('mgr/linkage.public_get_list')?>','在列表中选择',500,300)"><span>在列表中选择</span></a>请到导航 系统管理 > 联动菜单 > 添加联动菜单
      </td>
    </tr>
	<tr>
	<td>显示方式</td>
	<td>
      	<label><input name="setting[showtype]" value="0" type="radio" checked="checked">
        只显示名称</label>
        <label><input name="setting[showtype]" value="1" type="radio">
        显示完整路径</label>
        <label><input name="setting[showtype]" value="2" type="radio">
        返回联动菜单id	</label>
        <label><input name="setting[showtype]" value="3" type="radio">
        返回菜单层级数组</label>
	</td></tr>
	<tr>
      <td>路径分隔符</td>
      <td><input type="text" name="setting[space]" value="" size="5" class="input-text"> 显示完整路径时生效</td>
    </tr>
	<tr> 
      <td>是否作为筛选字段</td>
      <td>
	  <label><input type="radio" name="setting[filtertype]" value="1"/> 是 </label>
	  <label><input type="radio" name="setting[filtertype]" value="0" checked="checked"/> 否 </label>
	  </td>
    </tr>		
</table>