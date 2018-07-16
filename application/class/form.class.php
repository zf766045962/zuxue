<?php
/**************************************************
*  Created:  2015-03-01
*  
*  模型表单组件类
*
*  @Xsmart (C)2015-2099 Nit Inc.
*  @Author Chenyining
*  @lastDate  2015-03-24
***************************************************/
class form {
	var $form;
	var $modelid;
	var $fields;
	var $id;
	var $formValidator;

    function init($modelid,$fields,$catid = 0,$categorys = array()) {
		$this->modelid 		= $modelid;
		$this->catid 		= $catid;
		$this->categorys 	= $categorys;
		$this->fields 		= $fields;
    }

	function get($data = array()) {
		$this->data = $data;
		if(isset($data['id'])) $this->id = $data['id'];
		$info = array();
		if(!empty($this->fields)){
			foreach($this->fields as $k=>$v) {
				$field 	= $v['field'];
				$func 	= $v['formtype'];
				$value 	= isset($data[$field]) ? new_html_special_chars($data[$field]) : '';
				if(!method_exists($this, $func)) continue;
				$form = $this->$func($field, $value, $v);
				if($form !== false) {
					$star = $v['minlength'] || $v['pattern'] ? 1 : 0;
					$info[($v['isbase'] ? 'base' : 'senior')][$field] = array('name'=>$v['name'], 'tips'=>$v['tips'], 'form'=>$form, 'star'=>$star,'isomnipotent'=>$v['isomnipotent'],'formtype'=>$v['formtype']);
				}
			}
		}
		return $info;
	}
	
	// 栏目 √
	function catid($field, $value, $fieldinfo) {
		extract($fieldinfo);
		$tree 	= APP :: N('tree');
		$value 	= $value ? $value : $this->catid;
		$string = "<select name='info[$field]' id='$field'>\n<option value='0'>请选择$name</option>\n";
		$string .= $this->catid ? "<option value='{$this->catid}' ".($this->catid == $value ? 'selected' : '').">".$this->categorys[$this->catid]['name']."</option>\n" : '';
		$str  	= "<option value='\$id' \$selected>\$spacer \$name</option>";
		$tree->init($this->categorys);
		$string .= $tree->get_tree($this->catid, $str, $value, ($this->catid ? ' ' : ''));
		$string .= '</select>';
		
		if($errortips){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($field <= 0){
				$.dialog.alert('{$name}：$errortips');
				return false;
			}
			";
		}
		return $string;
	}
	
	// 单行文本 √
	function text($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if(!$value) $value = $defaultvalue;
		$type = $ispassword ? 'password' : 'text';
		
		if($pattern || $minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
			if($pattern != '') $this->formValidator .= "
			var {$field}Reg = $pattern;
			if(!{$field}Reg.test($field)){
				$.dialog.alert('{$name}：$errortips');
				return false;
			}
			";
		}
		return '<input type="'.$type.'" name="info['.$field.']" id="'.$field.'" size="'.$size.'" value="'.$value.'" class="input-text" '.$formattribute.' '.$css.'>';
	}
	
	// 多行文本 √
	function textarea($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if(!$value) $value = $defaultvalue;
		$value = empty($value) ? $defaultvalue : $value;
		
		$str = "<textarea name='info[{$field}]' id='$field' class='input-text' style='width:{$width}%;height:{$height}px;margin-right:5px;' $formattribute $css";
		if($maxlength) $str .= " onkeyup=\"strlen_verify(this, '{$field}_len', {$maxlength})\"";
		$str .= ">".stripcslashes(htmlspecialchars_decode($value))."</textarea>";
		if($maxlength) $str .= '还可输入<B><span id="'.$field.'_len">'.$maxlength.'</span></B> 个字符';
		
		if($pattern || $minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
			if($pattern != '') $this->formValidator .= "
			var {$field}Reg = $pattern;
			if(!{$field}Reg.test($field)){
				$.dialog.alert('{$name}：$errortips');
				return false;
			}
			";
		}
		return $str;
	}
	
	// 编辑器 √
	function editor($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if(!$height) $height = 300;
		$allowupload = defined('IN_ADMIN') ? 1 : 0;
		if(!$value) $value = $defaultvalue;
	
		$str = "<div id='{$field}_tip'></div>".'<textarea name="info['.$field.']" id="'.$field.'" boxid="'.$field.'">'.stripcslashes(htmlspecialchars_decode($value)).'</textarea>';
		$str .= '<script type="text/javascript">var '.$field.'_editor = new UE.ui.Editor();'.$field.'_editor.render("'.$field.'");</script>';
		
		if($pattern || $minlength){
			$this->formValidator .= "
			var $field = {$field}_editor.getContent();
			if(!$field){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
			if($pattern != '') $this->formValidator .= "
			var {$field}Reg = $pattern;
			if(!{$field}Reg.test($field)){
				$.dialog.alert('{$name}：$errortips');
				return false;
			}
			";
		}
        return $str;
	}
	
	// 标题 √
	function title($field, $value, $fieldinfo) {
		extract($fieldinfo);
		$style_arr = explode(';',$this->data['style']);
		$style_color = $style_arr[0];
		$style_font_weight = $style_arr[1] ? $style_arr[1] : '';	
		if(!$value) $value = $defaultvalue;

		$str = '<input type="text" style="width:400px;'.($style_color ? 'color:'.$style_color.';' : '').($style_font_weight ? 'font-weight:'.$style_font_weight.';' : '').'" name="info['.$field.']" id="'.$field.'" value="'.$value.'" class="measure-input " onkeyup="strlen_verify(this, \'title_len\', '.$maxlength.');"/><input type="hidden" name="style_color" id="style_color" value="'.$style_color.'">
		<input type="hidden" name="style_font_weight" id="style_font_weight" value="'.$style_font_weight.'">';
		if(defined('IN_ADMIN')) $str .= '<img src="'.IMG_PATH.'icon/colour.png" width="15" height="16" onclick="colorpicker(\''.$field.'_colorpanel\',\'set_title_color\');" style="cursor:pointer;margin-right:2px;"/> 
		<img src="'.IMG_PATH.'icon/bold.png" width="10" height="10" onclick="input_font_bold()" style="cursor:pointer;margin-right:2px;"/> <span id="'.$field.'_colorpanel" style="position:absolute;" class="colorpanel"></span>';
		$str .= '还可输入<B><span id="title_len">'.$maxlength.'</span></B> 个字符';
		
		if($pattern || $minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
			if($pattern != '') $this->formValidator .= "
			var {$field}Reg = $pattern;
			if(!{$field}Reg.test($field)){
				$.dialog.alert('{$name}：$errortips');
				return false;
			}
			";
		}
		return $str;
	}
	
	// 选项 √
	function box($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if($value == '') $value = $defaultvalue;
		$options = explode("\n",$options);
		if(!empty($options)){
			foreach($options as $_k) {
				$v = explode("|",$_k);
				$k = trim($v[1]);
				$option[$k] = $v[0];
			}
		}
		switch($boxtype) {
			case 'radio':
				$string = $this->radio($option,$value,"name='info[$field]' $fieldinfo[formattribute]",$width,$field);
			break;
	
			case 'checkbox':
				$string = $this->checkbox($option,$value,"name='info[$field][]' $fieldinfo[formattribute]",1,$width,$field);
			break;
	
			case 'select':
				$string = $this->select($option,$value,"name='info[$field]' id='$field' $fieldinfo[formattribute]");
			break;
	
			case 'multiple':
				$string = $this->select($option,$value,"name='info[$field][]' id='$field ' size=2 multiple='multiple' style='height:60px;' $fieldinfo[formattribute]");
			break;
		}
		return $string;
	}
	
	// 数字 √
	function number($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if(!$value) $value = $defaultvalue;
		if($minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
		}
		return "<input type='text' name='info[$field]' id='$field' value='$value' class='input-text' size='$size' {$formattribute} {$css}>";
	}
	
	// 日期和时间 √
	function datetime($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		$isdatetime = 0;
		$timesystem = 0;
		if($fieldtype == 'int') {
			if($format == 'Y-m-d Ah:i:s') $format = 'Y-m-d h:i:s';
			if($value){
				$value = date($format,$value);
			}else{
				$value = $defaulttype ? date($format) : '';
			}
			$isdatetime = strlen($format) > 6 ? 1 : 0;
			if($format == 'Y-m-d h:i:s') {
				$timesystem = 0;
			} else {
				$timesystem = 1;
			}
		} else if($fieldtype == 'datetime') {
			if(!$value){
				$value = $defaulttype ? date('Y-m-d H:i:s') : '';
			}			
			$isdatetime = 1;
		}else if($fieldtype == 'date') {
			if(!$value){
				$value = $defaulttype ? date('Y-m-d') : '';
			}
			$isdatetime = 0;
		}
		
		if($minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
		}
		return $this->f_date("info[$field]",$value,$isdatetime,1,'true',$timesystem);
	}
	
	// 单图片 √
	function image($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		$editor = APP :: N('editorModule',1);
		$str = '';
		$value = $value ? $value : ($defaultvalue ? $defaultvalue : '');
		$width = $images_width ? $images_width : 135;
		$height= $images_height ? $images_height : 113;
		
		if($minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
		}
		
		if($show_type == 1) {
			$preview_img = $value ? $value : IMG_PATH.'icon/upload-pic.png';
			$str .= $editor->image($isselectimage ? 1 : 2,$field,$value,'','class="input-text" name="info['.$field.']" ondblclick="image_priview(this.value);",style="display:none;"',0);
			return $str."<div class='upload-pic img-wrap'><a href='javascript:void(0);' onclick=\"$('#{$field}Btn').click();\"><img src='$preview_img' id='{$field}View' width='{$width}' height='{$height}' style='cursor: pointer;' /></a></div>";
		}
		
		if($show_type == 0) {
			$str .= $editor->image($isselectimage ? 1 : 2,$field,$value,'','class="input-text" size="'.$size.'" name="info['.$field.']" ondblclick="image_priview(this.value);",style="display:none;"');
			return $str.'<a class="btn-general" href="javascript:;" onclick="$(\'#'.$field.'Btn\').click();"><span>选择图片</span></a>';
		}
	}
	
	// 多图片 √
	function images($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		$editor = APP :: N('editorModule',1);
		
		$list_str = '<input name="info['.$field.']" type="hidden" value="">';
		$value = $value ? string2array(new_html_entity_decode($value)) : $value;
		if(is_array($value) && !empty($value)) {
			$value = F('publics.multi_array_sort',$value,'sort',SORT_ASC);
			$list_str .= '<div class="picList">';
			foreach($value as $_k=>$_v) {
				$list_str .= "<li id='image_{$field}_{$_k}'><input type='text' name='{$field}_url[]' value='{$_v[url]}' style='width:310px;' ondblclick='image_priview(this.value);' class='input-text' readonly> <input type='text' name='{$field}_alt[]' value='{$_v[alt]}' style='width:160px;' class='input-text'> <input type='text' name='{$field}_sort[]' value='{$_v[sort]}' style='width:50px;' class='input-text'> <a href=\"javascript:remove_div('image_{$field}_{$_k}')\">移除</a></li>";
			}
			$list_str .= '</div>';
		} else {
			$list_str .= '<center><div class="onShow" id="'.$field.'_tips">未上传任何图片，双击地址可预览图片</div></center>';
		}
		
		$string = '<fieldset class="blue pad-10"><legend>图片列表</legend>'.$list_str.'<div id="'.$field.'picList" class="picList"></div></fieldset><div class="bk10"></div>';
		$string .= $editor->images($field,'','style="display:none;"');
		$string .= '<a class="btn-general highlight" onclick="$(\'#'.$field.'Btn\').click();" href="javascript:;"><span>选择图片</span></a>';
		return $string;
	}
	
	// 数据关联 √
	function relatedata($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		
		$list_str = '';
		$value = $value ? string2array(new_html_entity_decode($value)) : $value;
		if(is_array($value) && !empty($value)) {
			$value = F('publics.multi_array_sort',$value,'sort',SORT_ASC);
			foreach($value as $_k=>$_v) {
				$list_str .= "<li id='data_{$field}_{$_k}'><input type='hidden' name='{$field}_id[]' value='{$_v[id]}'><input type='text' value='{$_v[id]}' style='width:50px;' class='input-text' disabled><input type='text' name='{$field}_name[]' value='{$_v[name]}' style='width:310px;' class='input-text'> <input type='text' name='{$field}_sort[]' value='{$_v[sort]}' style='width:50px;' class='input-text' ".($showtype == 1 ? 'disabled' : '')."> <a href=\"javascript:remove_div('data_{$field}_{$_k}')\">移除</a></li>";
			}
		} else {
			$list_str .= '<center><div class="onShow" id="'.$field.'_tips">未关联任何数据</div></center>';
		}
		
		$string = '<fieldset class="blue pad-10"><legend>数据列表</legend><input name="info['.$field.']" type="hidden" value=""><div id="'.$field.'dataList" class="picList">'.$list_str.'</div></fieldset><div class="bk10"></div>';
		$string .= '<a class="btn-general highlight" onclick="select_data(\''.URL('mgr/modelForm.public_select_data','field='.$field.'&modelid='.$sitemodelid.'&fieldid='.$fieldid.'&t='.$showtype).'\',\'在列表中选择\',1000,600,\'dialog_'.$field.'\');" href="javascript:;"><span>选择数据</span></a>';
		if(!defined('RELATEDATA_INIT')) {
			define('RELATEDATA_INIT', 1);
			$string .= '<script type="text/javascript">
			function select_data(url,title,width,height,id){
				$.dialog.data("'.$field.'Obj",$("#'.$field.'")[0]);
				$.dialog.data("'.$field.'",$("#'.$field.'").val());
				dialog(url,title,width,height,id).max().position(0,0);
			}
			</script>';
		}
		
		return $string;
	}
	
	// 多文件上传
	function downfiles($field, $value, $fieldinfo) {
		extract(string2array($fieldinfo['setting']));
		$list_str = '';
		if($value) {
			$value = string2array(new_html_entity_decode($value));
			if(is_array($value)) {
				foreach($value as $_k=>$_v) {
				$list_str .= "<div id='multifile{$_k}'><input type='text' name='{$field}_fileurl[]' value='{$_v[fileurl]}' style='width:310px;' class='input-text'> <input type='text' name='{$field}_filename[]' value='{$_v[filename]}' style='width:160px;' class='input-text'> <a href=\"javascript:remove_div('multifile{$_k}')\">".L('remove_out')."</a></div>";
				}
			}
		}
		$string = '<input name="info['.$field.']" type="hidden" value="1">
		<fieldset class="blue pad-10">
		<legend>'.L('file_list').'</legend>';
		$string .= $list_str;
		$string .= '<ul id="'.$field.'" class="picList"></ul>
		</fieldset>
		<div class="bk10"></div>
		';
		
		if(!defined('IMAGES_INIT')) {
			$str = '<script type="text/javascript" src="'.JS_PATH.'swfupload/swf2ckeditor.js"></script>';
			define('IMAGES_INIT', 1);
		}
		$authkey = upload_key("$upload_number,$upload_allowext,$isselectimage");
		$string .= $str."<input type=\"button\"  class=\"button\" value=\"".L('multiple_file_list')."\" onclick=\"javascript:flashupload('{$field}_multifile', '".L('attachment_upload')."','{$field}',change_multifile,'{$upload_number},{$upload_allowext},{$isselectimage}','content','$this->catid','{$authkey}')\"/>    <input type=\"button\" class=\"button\" value=\"".L('add_remote_url')."\" onclick=\"add_multifile('{$field}')\">";
		return $string;
	}
	
	// 转向链接 √
	function islink($field, $value, $fieldinfo) {
		if($value) {
			$url = $this->data['url'];
			$checked = 'checked';
		} else {
			$disabled = 'disabled';
			$url = $checked = '';
		}
		$size = $fieldinfo['size'] ? $fieldinfo['size'] : 25;
		return '<input type="hidden" name="info[islink]" id="islink" value="0"><input type="text" name="info['.$field.']" id="'.$field.'" value="'.$url.'" size="'.$size.'" maxlength="255" '.$disabled.' class="input-text"> <label><input type="checkbox" onclick="ruselinkurl(this,\''.$field.'\');" '.$checked.'> <font color="red">转向链接</font></label>';
	}
	
	// 会员组
	/*function groupid($field, $value, $fieldinfo) {
		extract(string2array($fieldinfo['setting']));
		$grouplist = getcache('grouplist','member');
		foreach($grouplist as $_key=>$_value) {
			$data[$_key] = $_value['name'];
		}
		return '<input type="hidden" name="info['.$field.']" value="1">'.form::checkbox($data,$value,'name="'.$field.'[]" id="'.$field.'"','','120');
	}*/
	
	// 地图字段
	/*function map($field, $value, $fieldinfo) {
		extract($fieldinfo);
		$setting = string2array($setting);
		$size = $setting['size'];
		$errortips = $this->fields[$field]['errortips'];
		$modelid = $this->fields[$field]['modelid'];
		$tips = $value ? L('editmark','','map') : L('addmark','','map');
		return '<input type="button" name="'.$field.'_mark" id="'.$field.'_mark" value="'.$tips.'" class="button" onclick="omnipotent(\'selectid\',\''.APP_PATH.'api.php?op=map&field='.$field.'&modelid='.$modelid.'\',\''.L('mapmark','','map').'\',1,700,420)"><input type="hidden" name="info['.$field.']" value="'.$value.'" id="'.$field.'" >';
	}*/
	
	/**
	 * 联动菜单 √
	 * @param $id 生成联动菜单的样式id
	 * @param $defaultvalue 默认值
	 * @param $linkageid 联动菜单id
	 */
	function linkage($id = 'linkid', $defaultvalue = 0, $fieldinfo) {
		extract(string2array($fieldinfo["setting"]));
		$linkageid = intval($linkageid);
		$datas 	= array();
		
		$r 		= DS('mgr/linkage._get','',T_LINKAGE,'linkageid = '.$linkageid);
		$datas['title'] 	= $r[0]['name'];
		$datas['style'] 	= $r[0]['style'];
		$datas['setting']	= string2array($r[0]['setting']);
		$datas['data'] 		= DS('mgr/linkage.get_info','',T_LINKAGE,'keyid = '.$linkageid,'listorder ,linkageid','','*','linkageid');
		$infos = $datas['data'];
		
		if($datas['style'] == '1') {
			$title = $datas['title'];
			$container = 'content'.random(3).date('is');
			if(!defined('LINKAGE_INIT_1')) {
				define('LINKAGE_INIT_1', 1);
				$string .= '<script type="text/javascript" src="'.JS_PATH.'linkage/js/pop.js"></script>';
			}
			$var_div = $defaultvalue ? $this->menu_linkage_level($defaultvalue,$linkageid,$infos) : $datas['title'];
			$var_input = '<input type="hidden" name="info['.$id.']" value="'.$defaultvalue.'">';
			$string .= '<div name="'.$id.'" value="" id="'.$id.'" class="ib" style=" line-height:24px;margin-right:5px;">'.$var_div.'</div>'.$var_input.'<a href="javascript:open_linkage(\''.$id.'\',\''.$title.'\','.$container.',\''.$linkageid.'\');" class="btn-general"><span>选择</span></a>';
			
			$string .= '<script type="text/javascript">';
			$string .= 'var returnid_'.$id.'= \''.$id.'\';';
			$string .= 'var returnkeyid_'.$id.' = \''.$linkageid.'\';';
			$string .= 'var '.$container.' = new Array(';
			foreach($infos as $k=>$v) {
				if($v['parentid'] == 0) {
					$s[]='new Array(\''.$v['linkageid'].'\',\''.$v['name'].'\',\''.$v['parentid'].'\')';
				} else {
					continue;
				}
			}
			$s = implode(',',$s);
			$string .=$s;
			$string .= ')';
			$string .= '</script>';
			
		} else if($datas['style'] == '2') {
			if(!defined('LINKAGE_INIT_2')) {
				define('LINKAGE_INIT_2', 1);
				$string .= '<script type="text/javascript" src="'.JS_PATH.'linkage/js/jquery.ld.js"></script>';
			}
			$default_txt = '';
			if($defaultvalue) {
				$default_txt = $this->menu_linkage_level($defaultvalue,$linkageid,$infos);
				$default_txt = '["'.str_replace(' > ','","',$default_txt).'"]';
			}
			$string .= '<input type="hidden" name="info['.$id.']" id="'.$id.'" value="'.$defaultvalue.'">';	
			for($i=1;$i<=$datas['setting']['level'];$i++) {
				$string .='<select class="pc-select-'.$id.'" name="'.$id.'-'.$i.'" id="'.$id.'-'.$i.'"><option value="">请选择菜单</option></select> ';
			}
			
			$string .= '<script type="text/javascript">
						$(function(){
							var $ld5 = $(".pc-select-'.$id.'");
							$ld5.ld({ajaxOptions : {"url" : "'.URL('api/linkage.ajax_select','keyid='.$linkageid).'"},defaultParentId : 0,isload : '.($defaultvalue ? '0' : '1').',style : {"width" : "'.$showWidth.'"}});
							var ld5_api = $ld5.ld("api");
							ld5_api.selected('.$default_txt.');
							$ld5.bind("change",onchange);
							function onchange(e){
								var $target = $(e.target);
								var index = $ld5.index($target);
								$("#'.$id.'-'.$i.'").remove();
								$("#'.$id.'").val($ld5.eq(index).show().val());
								index ++;
								$ld5.eq(index).show();
							}
						});
						</script>';
			
		} else {
			$title = $defaultvalue ? $infos[$defaultvalue]['name'] : $datas['title'];
			$colObj = random(3).date('is');
			$string = '';
			if(!defined('LINKAGE_INIT')) {
				define('LINKAGE_INIT', 1);
				$string .= '<script type="text/javascript" src="'.JS_PATH.'linkage/js/mln.colselect.js"></script>';
				$string .= '<link href="'.JS_PATH.'linkage/style/admin.css" rel="stylesheet" type="text/css">';
			}
			$string .= '<input type="hidden" name="info['.$id.']" value="'.$defaultvalue.'"><div id="'.$id.'"></div>';
			$string .= '<script type="text/javascript">';
			$string .= 'var colObj'.$colObj.' = {"Items":[';
			if(!empty($infos)){
				foreach($infos as $k=>$v) {
					$s .= '{"name":"'.$v['name'].'","topid":"'.$v['parentid'].'","colid":"'.$v['linkageid'].'","value":"'.$v['linkageid'].'","fun":function(){}},';
				}
			}
			$string .= substr($s, 0, -1);
			$string .= ']};';
			$string .= '$("#'.$id.'").mlnColsel(colObj'.$colObj.',{';
			$string .= 'title:"'.$title.'",';
			$string .= 'value:"'.$defaultvalue.'",';
			$string .= 'width:"'.$showWidth.'"';
			$string .= '});';
			$string .= '</script>';
		}
		
		if($minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('请选择{$name}！');
				return false;
			}";
		}
		return $string;
	}
	// 联动菜单层级 √
	function menu_linkage_level($linkageid,$keyid,$infos,$result=array()) {
		if(array_key_exists($linkageid,$infos)) {
			$result[] = $infos[$linkageid]['name'];
			return $this->menu_linkage_level($infos[$linkageid]['parentid'],$keyid,$infos,$result);
		}
		krsort($result);
		return implode(' > ',$result);
	}
	
	// 万能字段 √
	function omnipotent($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		$formtext = str_replace('{FIELD_VALUE}',$value,$formtext);
		$formtext = str_replace('{MODELID}',$this->modelid,$formtext);
		preg_match_all('/{FUNC\((.*)\)}/',$formtext,$_match);
		if(!empty($_match[1])){
			foreach($_match[1] as $key=>$match_func) {
				$string = '';
				$params = explode('~~',$match_func);
				$user_func = $params[0];
				$arr 	= explode(',',$params[1]);
				// 支持三个参数
				$string = F('extention.'.$user_func,$arr[0],$arr[1],$arr[2]);
				$formtext = str_replace($_match[0][$key],$string,$formtext);
			}
		}
		$id  = $this->id ? $this->id : 0;
		$formtext = str_replace('{ID}',$id,$formtext);
		$errortips = $this->fields[$field]['errortips'];
		
		if($pattern || $minlength){
			$this->formValidator .= "
			var $field = $(\"#$field\").val();
			if($.trim($field) == ''){
				$.dialog.alert('{$name}：不允许为空！');
				return false;
			}";
			if($pattern != '') $this->formValidator .= "
			var {$field}Reg = $pattern;
			if(!{$field}Reg.test($field)){
				$.dialog.alert('{$name}：$errortips');
				return false;
			}
			";
		}
		
		return $formtext;
	}
	
	// 关联字段/隐藏域关联 √
	function relateid($field, $value, $fieldinfo) {
		extract(string2array($fieldinfo['setting']));
		$tablename = DS('mgr/modelForm.get_info','','model','modelid = '.$sitemodelid,'','','tablename');
		$tablename = $tablename[0]['tablename'];
		$value = $value ? $value : V('g:'.$tablename.'@id',0);
		// 显示（取设置数据）
		if($isShowTit == 1){
			$showfield = DS('mgr/modelForm.get_info','','model_field','fieldid = '.$fieldid,'','','field');
			$showfield = $showfield[0]['field'];
			$info = DS('mgr/modelForm.get_info','',$tablename,'id = '.$value,'','',$showfield);
			$data['data'] = $info[0][$showfield];
		}
		$data['type'] = $isShowTit;
		$data['data'] .= '<input type="hidden" name="info['.$field.']" id="'.$field.'" value="'.$value.'">';
		return json_encode($data,true);
	}
	
//-------------------------------------------华丽的分割线----------------------------------------------	
	
	/**
	 * 单选框
	 * 
	 * @param $array 选项 二维数组
	 * @param $id 默认选中值
	 * @param $str 属性
	 */
	public static function radio($array = array(), $id = 0, $str = '', $width = 0, $field = '') {
		$string = '';
		foreach($array as $key=>$value) {
			$checked = trim($id) == trim($key) ? 'checked' : '';
			$string .= $width ? '<label class="ib" style="margin-right:2px;width:'.$width.'px">' : '<label style="margin-right:2px;">';
			$string .= '<input type="radio" '.$str.' id="'.$field.'_'.new_html_special_chars($key).'" '.$checked.' value="'.$key.'"> '.$value.'</label>';
		}
		return $string;
	}
	/**
	 * 复选框
	 * 
	 * @param $array 选项 二维数组
	 * @param $id 默认选中值，多个用 '逗号'分割
	 * @param $str 属性
	 * @param $defaultvalue 是否增加默认值 默认值为 -99
	 * @param $width 宽度
	 */
	public static function checkbox($array = array(), $id = '', $str = '', $defaultvalue = '', $width = 0, $field = '') {
		$string = '';
		$id = trim($id);
		if($id != '') $id = strpos($id, ',') ? explode(',', $id) : array($id);
		$i = 1;
		foreach($array as $key=>$value) {
			$key = trim($key);
			$checked = ($id && in_array($key, $id)) ? 'checked' : '';
			$string .= $width ? '<label class="ib" style="margin-right:2px;width:'.$width.'px">' : '<label style="margin-right:2px;">';
			$string .= '<input type="checkbox" '.$str.' id="'.$field.'_'.$i.'" '.$checked.' value="'.new_html_special_chars($key).'"> '.new_html_special_chars($value).'</label>';
			$i++;
		}
		return $string;
	}
	/**
	 * 下拉选择框
	 */
	public static function select($array = array(), $id = 0, $str = '', $default_option = '') {
		$string = '<select '.$str.'>';
		$default_selected = (empty($id) && $default_option) ? 'selected' : '';
		if($default_option) $string .= "<option value='' $default_selected>$default_option</option>";
		if(!is_array($array) || count($array)== 0) return false;
		$ids = array();
		if(isset($id)) $ids = explode(',', $id);
		foreach($array as $key=>$value) {
			$selected = in_array($key, $ids) ? 'selected' : '';
			$string .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
		}
		$string .= '</select>';
		return $string;
	}
	/**
	 * 日期时间控件
	 * 
	 * @param $name 控件name，id
	 * @param $value 选中值
	 * @param $isdatetime 是否显示时间
	 * @param $loadjs 是否重复加载js，防止页面程序加载不规则导致的控件无法显示
	 * @param $showweek 是否显示周，使用，true | false
	 */
	public static function f_date($name, $value = '', $isdatetime = 0, $loadjs = 0, $showweek = 'true', $timesystem = 1) {
		if($value == '0000-00-00 00:00:00') $value = '';
		$id = preg_match("/\[(.*)\]/", $name, $m) ? $m[1] : $name;
		if($isdatetime) {
			$size = 21;
			$format = '%Y-%m-%d %H:%M:%S';
			if($timesystem){
				$showsTime = 'true';
			} else {
				$showsTime = '12';
			}
			
		} else {
			$size = 10;
			$format = '%Y-%m-%d';
			$showsTime = 'false';
		}
		$str = '';
		if(!defined('CALENDAR_INIT')) {
			define('CALENDAR_INIT', 1);
			$str .= '<link rel="stylesheet" type="text/css" href="'.JS_PATH.'calendar/jscal2.css"/>
			<link rel="stylesheet" type="text/css" href="'.JS_PATH.'calendar/border-radius.css"/>
			<link rel="stylesheet" type="text/css" href="'.JS_PATH.'calendar/win2k.css"/>
			<script type="text/javascript" src="'.JS_PATH.'calendar/calendar.js"></script>
			<script type="text/javascript" src="'.JS_PATH.'calendar/lang/en.js"></script>';
		}
		$str .= '<input type="text" name="'.$name.'" id="'.$id.'" value="'.$value.'" size="'.$size.'" class="date" readonly>&nbsp;';
		$str .= '<script type="text/javascript">
			Calendar.setup({
			weekNumbers: '.$showweek.',
		    inputField : "'.$id.'",
		    trigger    : "'.$id.'",
		    dateFormat: "'.$format.'",
		    showTime: '.$showsTime.',
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script>';
		return $str;
	}
	
}?>