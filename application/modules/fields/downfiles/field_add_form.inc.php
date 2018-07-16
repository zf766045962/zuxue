<table cellpadding="2" cellspacing="1" width="98%">
	<tr> 
      <td width="130">允许上传的文件类型</td>
      <td><input type="text" name="setting[upload_allowext]" value="gif|jpg|jpeg|png|bmp" size="40" class="input-text"></td>
    </tr>
	<tr> 
      <td>是否从已上传中选择</td>
      <td><label><input type="radio" name="setting[isselectimage]" value="1"> 是 </label><label><input type="radio" name="setting[isselectimage]" value="0" checked> 否 </label></td>
    </tr>
	<tr> 
      <td>允许同时上传的个数</td>
      <td><input type="text" name="setting[upload_number]" value="10" size="3" class="input-text"></td>
    </tr>
	<tr>
	<td>附件下载方式</td>
	<td>
      	<label><input name="setting[downloadlink]" value="0" type="radio">
        链接到真实软件地址 </label>
        <label><input name="setting[downloadlink]" value="1" checked="checked" type="radio">
        链接到跳转页面 </label>
      
	</td></tr>	
	<tr>
	<td>文件下载方式</td>
	<td>
      	<label><input name="setting[downloadtype]" value="0" type="radio">
        链接文件地址 </label>
        <label><input name="setting[downloadtype]" value="1" checked="checked" type="radio">
        通过PHP读取 </label> 
	</td></tr>		
</table>