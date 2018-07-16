<?php
/**************************************************
*  Created:  2015-03-16
*
*  万能字段自定义函数库
*
*  @Xsmart (C)2014-2099Inc.
*  @Author chenyining
*  @lastDate  2015-03-16
***************************************************/

function testfunc($val1,$val2) {
	return '经过自定义函数处理后为：'.$val1.'和'.$val2;
}

function sysid_input(){
	$result = DS('publics._get','','system',' id = '.$_GET['sid']);
	$html = $result[0]['stitle'].'<input type="hidden" name="info[sysid]" value="'. $_GET['sid'].'" />';
	return $html;
}

function techer_input(){
	$teachid = DS('publics._get','','course','id = '.V('r:id'));
	$result = DS('publics._get','','users','type = 1');
	$html = '<select name="info[teach_id]">';
	if($result){
		foreach($result as $key => $val){
			$kt = $teachid[0]['teach_id'] == $val['id'] ? 'selected = "selected"':'';
			$html .= '<option value="'.$val['id'].'" '.$kt. '>'.$val['realname'].'</option>';
		}
	}
	$html .= '</select>';
	return $html;
}

?>
