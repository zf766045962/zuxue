<?php
/**************************************************
*  Created:  2015-03-23
*  
*  模型表单列表 筛选 的输出处理
*
*  @Xsmart (C)2015-2099 Nit Inc.
*  @Author Chenyining
*
***************************************************/
class form_list {
	public $initArr;
	function __construct($initArr = array()){
		$this->initArr = $initArr;
	}
	
	// 栏目
	function catid($value, $fieldinfo,$info){
		$rs = DS('mgr/modelForm.get_info','','article_class','classid = '.$value,'',1,'classname');
		return '<td align="center">'.(!empty($rs) ? $rs[0]['classname'] : ' - ').'</td>';
	}
	function catid_search($field, $value, $fieldinfo){
		$catid 	= intval(V('g:catid',0));
		$categorys 	= DS('mgr/modelForm.get_info','',T_ARTICLE_CLASS,'','lmorder,classid','','classid as id,classname as name,parentid','id');
		$tree 	= APP :: N('tree');
		$value 	= $value ? $value : $catid;
		$string = $fieldinfo['name']."：<select name='$field' id='$field'>";
		$string .= $catid ? "<option value='{$catid}' ".(V('g:catid') == $value ? 'selected' : '').">".$categorys[$catid]['name']."</option>\n" : '<option value="0">请选择'.$fieldinfo['name'].'</option>';
		$str  	= "<option value='\$id' \$selected>\$spacer \$name</option>";
		$tree->init($categorys);
		$string .= $tree->get_tree($catid, $str, $value, ($catid ? ' ' : ''));
		$string .= '</select>';
		return $string;
	}
	
	// 标题
	function title($value, $fieldinfo,$info){
		return '<td><a href="'.URL('mgr/modelForm.add',$this->initArr['urlParam'].'&id='.$info['id']).'" title="'.$value.'"><span '.title_style($info['style']).'>'.$value.'</span></a></td>';
	}
	function title_search($field, $value, $fieldinfo){
		return $fieldinfo['name']."：<input type='text' class='input-text' id='$field' name='$field' value='$value' />";
	}
	
	// 单行文本
	function text($value, $fieldinfo,$info) {
		return '<td align="center">'.$value.'</td>';
	}
	function text_search($field, $value, $fieldinfo){
		return $fieldinfo['name']."：<input type='text' class='input-text' id='$field' name='$field' value='$value' />";
	}
	
	// 多行文本
	function textarea($value, $fieldinfo,$info) {
		return '<td>'.$value.'</td>';
	}
	function textarea_search($field, $value, $fieldinfo){
		return $fieldinfo['name']."：<input type='text' class='input-text' id='$field' name='$field' value='$value' />";
	}
	
	// 数字
	function number($value, $fieldinfo,$info) {
		return '<td align="center">'.$value.'</td>';
	}
	function number_search($field, $value, $fieldinfo){
		return $fieldinfo['name']."：<input type='text' class='input-text' id='$field' name='$field' value='$value' />";
	}
	
	// 日期和时间
	function datetime($value, $fieldinfo,$info) {
		extract(string2array($fieldinfo['setting']));
		if($fieldtype == 'int'){
			$value = date($format,$value);
		}
		return '<td align="center">'.$value.'</td>';
	}
	function datetime_search($field, $value, $fieldinfo) {
		$form = APP :: N('form');
		return $fieldinfo['name'].'：'.$form->f_date("{$field}_min",$_POST[$field.'_min']).'~ '.$form->f_date("{$field}_max",$_POST[$field.'_max']);
	}
	
	// 选项
	function box($value, $fieldinfo,$info) {
		extract(string2array($fieldinfo['setting']));
		$options = explode("\n",$options);
		if(!empty($options)){
			foreach($options as $_k) {
				$v = explode("|",$_k);
				$k = trim($v[1]);
				$option[$k] = $v[0];
			}
		}
		if($boxtype == 'radio' || $boxtype == 'select'){
			$value = $option[$value];
		}else{
			$values = explode(",",$value);
			if(!empty($values)){
				foreach($values as $v) {
					$arr[] = $option[$v];
				}
				$value = implode(',',$arr);
			}
		}
		return '<td align="center">'.$value.'</td>';
	}
	function box_search($field, $value, $fieldinfo) {
		$form = APP :: N('form');
		extract($fieldinfo);
		extract(string2array($setting));
		$options = explode("\n",$options);
		$option[-1] = '--请选择--';
		if(!empty($options)){
			foreach($options as $_k) {
				$v = explode("|",$_k);
				$k = trim($v[1]);
				$option[$k] = $v[0];
			}
		}
		if($boxtype == 'radio' || $boxtype == 'select') {
			$string = $fieldinfo['name'].'：'.$form->select($option,$value,"name='$field' id='$field' $fieldinfo[formattribute]");
		}
		return $string;
	}
	
	// 单图片
	function image($value, $fieldinfo,$info) {
		return '<td align="center"><a href="javascript:image_priview(\''.$value.'\');">预览</a></td>';
	}
	
	// 联动菜单
	function linkage($value, $fieldinfo,$info){
		extract(string2array($fieldinfo['setting']));
		if($showtype){
			$form  = APP :: N('form');
			$infos = DS('mgr/linkage.get_info','',T_LINKAGE,'keyid = '.$linkageid,'listorder ,linkageid','','*','linkageid');
			$value = $form->menu_linkage_level($value,$linkageid,$infos);
			//$value = str_replace(' > ','","',$default_txt);
		}else{
			$rs = DS('mgr/linkage.get_info','',T_LINKAGE,'linkageid = '.$value,'',1,'name');
			$value = $rs[0]['name'];
		}
		return '<td align="center">'.$value.'</td>';
	}

	// ID关联/隐藏域
	function relateid($value, $fieldinfo,$info){
		extract(string2array($fieldinfo['setting']));
		$tablename = DS('mgr/modelForm.get_info','','model','modelid = '.$sitemodelid,'','','tablename');
		$tablename = $tablename[0]['tablename'];
		$showfield = DS('mgr/modelForm.get_info','','model_field','fieldid = '.$fieldid,'','','field');
		$showfield = $showfield[0]['field'];
		
		$info = DS('mgr/modelForm.get_info','',$tablename,'id = '.$value,'','',$showfield);
		return '<td align="center">'.$info[0][$showfield].'</td>';
	}
	
	// 万能字段
	/*function omnipotent($value, $fieldinfo,$info){
		return '<td align="center">'.$value.'</td>';
	}*/
	
}