<?php
/**************************************************
*  Created:  2015-03-18
*  
*  模型表单保存添加处理类
*
*  @Xsmart (C)2015-2099 Nit Inc.
*  @Author Chenyining
*  @lastDate  2015-05-21
***************************************************/
class form_save {
	var $modelid;
	var $fields;
	var $data;
	var $info;
    function __construct($modelid) {
		$this->modelid = $modelid;
		$fields = DS('mgr/modelfieldCom.getList','','modelid = '.$modelid.' and F.disabled=0 and F.isadd=1','listorder ASC');
		if(!empty($fields)){
			foreach($fields as $key=>$val){
				$this->fields[$val['field']] = $val;
			}
		}
    }

	function get($data) {
		$this->info = array();
		$this->info['system'] = array();
		$this->info['model'] = array();
		$this->data = trim_script($data);
		if(!empty($this->data)){
			foreach($this->data as $field=>$value) {
				if(!isset($this->fields[$field]) && !check_in($field,'id')) continue;
				$func = $this->fields[$field]['formtype'];
				if(method_exists($this, $func)){
					$value = $this->$func($field, $value, $this->fields[$field]);
				}
				if($this->fields[$field]['issystem']) {
					$this->info['system'][$field] = $value;
				} else {
					$this->info['model'][$field] = $value;
				}
			}
		}
		return $this->info;
	}
	
	// 多行文本 √
	function textarea($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if(!$enablehtml) $value = strip_tags($value);
		return $value;
	}
	
	// 选项 √
	function box($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if($boxtype == 'checkbox' || $boxtype == 'multiple') {
			if(is_array($value) && count($value) > 0) {
				$value = implode(',', $value);
			}
		}
		return $value;
	}
	
	// 单图片 - 地址安全过滤 √
	function image($field, $value, $fieldinfo) {
		$value = remove_xss(str_replace(array("'",'"','(',')'),'',$value));
		$value = safe_replace($value);
		return trim($value);
	}
	
	// 多图片 √
	function images($field, $value, $fieldinfo) {
		//取得图片列表
		$pictures = $_POST[$field.'_url'];
		//取得图片说明
		$pictures_alt = isset($_POST[$field.'_alt']) ? $_POST[$field.'_alt'] : array();
		//取得图片排序
		$pictures_sort = isset($_POST[$field.'_sort']) ? $_POST[$field.'_sort'] : array();
		$array = $temp = array();
		if(!empty($pictures)) {
			foreach($pictures as $key=>$pic) {
				$temp['url'] = $pic;
				$temp['alt'] = str_replace(array('"',"'"),'`',$pictures_alt[$key]);
				$temp['sort']= $pictures_sort[$key];
				$array[$key] = $temp;
			}
		}
		$array = array2string($array);
		return $array;
	}
	
	// 数据关联 √
	function relatedata($field, $value, $fieldinfo) {
		extract(string2array($fieldinfo['setting']));
		// 取得数据ID
		$datas = $_POST[$field.'_id'];
		// 取得数据名称
		$datas_name = isset($_POST[$field.'_name']) ? $_POST[$field.'_name'] : array();
		// 取得数据排序
		$datas_sort = isset($_POST[$field.'_sort']) ? $_POST[$field.'_sort'] : array();
		$array = $temp = array();
		if(!empty($datas)) {
			foreach($datas as $key=>$data) {
				$id[] = $temp['id'] = $data;
				$temp['name'] = str_replace(array('"',"'"),'`',$datas_name[$key]);
				$temp['sort']= $datas_sort[$key] ? $datas_sort[$key] : 0;
				$array[$key] = $temp;
			}
		}
		$idstr = @implode(',',$id);
		if($this->fields[$field]['issystem']) {
			$this->info['system'][$field.'_idstr'] = $idstr;
		} else {
			$this->info['model'][$field.'_idstr'] = $idstr;
		}
		$array = array2string($array);
		return $array;
	}
	
	// 日期和时间 √
	function datetime($field, $value, $fieldinfo) {
		extract($fieldinfo);
		extract(string2array($setting));
		if($fieldtype == 'int') {
			$value = strtotime($value);
		}
		return $value;
	}
	
	// 转向链接 √
	function islink($field, $value, $fieldinfo) {
		$this->info['system']['islink'] = $this->data['islink'];
		return $value;
	}

	/*function groupid($field, $value) {
		$datas = '';
		if(!empty($_POST[$field]) && is_array($_POST[$field])) {
			$datas = implode(',',$_POST[$field]);
		}
		return $datas;
	}*/
	
}