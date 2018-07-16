<table cellpadding="2" cellspacing="1" width="98%">
	<tr> 
      <td width="130">文本框长度</td>
      <td><input type="text" name="setting[size]"  size="10" class="input-text"></td>
    </tr>
	<tr> 
      <td>默认值</td>
      <td><input type="text" name="setting[defaultvalue]"  size="40" class="input-text"></td>
    </tr>
	<tr> 
      <td>表单显示模式</td>
      <td><label><input type="radio" name="setting[show_type]" value="1" /> 图片模式 </label><label><input type="radio" name="setting[show_type]" value="0" checked/> 文本框模式 </label></td>
    </tr>
    <tr> 
      <td>允许上传的图片大小</td>
      <td><input type="text" name="setting[upload_maxsize]" value="1024" size="5" class="input-text">KB 提示：1KB=1024Byte，1MB=1024KB *</td>
    </tr>
	<tr> 
      <td>允许上传的图片类型</td>
      <td><input type="text" name="setting[upload_allowext]" value="gif|jpg|jpeg|png|bmp" size="40" class="input-text"></td>
    </tr>
	<tr> 
      <td>是否在图片上添加水印</td>
      <td><label><input type="radio" name="setting[watermark]" value="1"> 是 </label><label><input type="radio" name="setting[watermark]" value="0" checked> 否 </label></td>
    </tr>
	<tr> 
      <td>是否从已上传中选择</td>
      <td><label><input type="radio" name="setting[isselectimage]" value="1" checked> 是 </label><label><input type="radio" name="setting[isselectimage]" value="0"> 否 </label></td>
    </tr>
	<tr> 
      <td>图像大小</td>
      <td>宽 <input type="text" name="setting[images_width]" value="" size="3" class="input-text">px 高 <input type="text" name="setting[images_height]" value="" size="3" class="input-text">px</td>
    </tr>
</table>