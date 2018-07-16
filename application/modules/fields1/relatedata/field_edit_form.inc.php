<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<table cellpadding="2" cellspacing="1" width="98%">
	<tr>
      <td width="120">数据模型ID</td>
      <td><input type="text" id="sitemodelid" name="setting[sitemodelid]" value="<?= $setting['sitemodelid'];?>" size="8" class="input-text">
      <a class="btn-general" onclick="dialog('<?= URL('mgr/sitemodel.public_get_list')?>','在列表中选择',500,300)"><span>在列表中选择</span></a>
      </td>
    </tr>
    <tr>
      <td width="120">标题字段</td>
      <td><input type="hidden" id="fieldid" name="setting[fieldid]" value="<?= $setting['fieldid'];?>"/><input type="text" id="datatitle" value="<?= $setting['fieldname']['name'];?>" size="8" class="input-text" readonly="readonly">
      <a class="btn-general" onclick="select_field('<?= URL('mgr/sitemodel_field.public_get_field')?>');"><span>在列表中选择</span></a>
      </td>
    </tr>
	<tr>
	<td>关联方式</td>
	<td>
      	<label><input name="setting[showtype]" value="1" type="radio" <?= $setting['showtype'] == 1 ?'checked' : '';?>>
        单选</label>
        <label><input name="setting[showtype]" value="2" type="radio" <?= $setting['showtype'] == 2 ?'checked' : '';?>>
        多选</label>
	</td></tr>
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