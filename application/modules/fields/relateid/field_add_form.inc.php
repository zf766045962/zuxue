<table cellpadding="2" cellspacing="1" width="98%">
	<tr> 
        <td width="120">模型（数据表）</td>
        <td><input type="text" id="sitemodelid" name="setting[sitemodelid]" value="0" size="8" class="input-text">
        <a class="btn-general" onclick="dialog('<?= URL('mgr/sitemodel.public_get_list')?>','在列表中选择',500,300)"><span>在列表中选择</span></a>
        </td>
    </tr> 
    <tr>
        <td>是否显示关联项</td>
        <td>
            <label><input name="setting[isShowTit]" value="1" type="radio">
            是</label>
            <label><input name="setting[isShowTit]" value="2" type="radio" checked="checked">
            否</label>
        </td>
    </tr>
    <tr>
        <td width="120">显示项</td>
        <td><input type="hidden" id="fieldid" name="setting[fieldid]" value="" /><input type="text" id="datatitle" value="" size="8" class="input-text" readonly="readonly">
        <a class="btn-general" onclick="select_field('<?= URL('mgr/sitemodel_field.public_get_field');?>');"><span>在列表中选择</span></a>
        </td>
    </tr>
</table>
<script>
	function select_field(url){
		var modelid = $('#sitemodelid').val();
		if(modelid <= 0){
			$.dialog.alert('请先选择模型');return;
		}
		dialog(url + '&modelid=' + modelid,'在列表中选择',500,300);
	}
</script>