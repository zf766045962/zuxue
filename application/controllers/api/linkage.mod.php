<?php
/**************************************************
*  Created:  2015-03-05
*
*  获取联动菜单接口
*
*  @Xsmart (C)2015-2099Inc.
*  @Author @chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class linkage_mod {
	/**
	 * 获取地区列表
	 */
	function ajax_getlist() {
		$keyid 		= intval(V('r:keyid'));
		$linkageid 	= V('r:linkageid',0);
		if($linkageid > 0){
			$info = DS('mgr/linkage.get_info','',T_LINKAGE,'linkageid = '.$linkageid,'','','parentid');
		}
		
		$parentid	= V('r:parentid',intval($info[0]['parentid']));
		$parentInfo = DS('mgr/linkage.get_info','',T_LINKAGE,'linkageid = '.$parentid,'','','name');
		$keyInfo 	= DS('mgr/linkage.get_info','',T_LINKAGE,'linkageid = '.$keyid,'','','name');
		
		$infos 	= DS('mgr/linkage.get_info','',T_LINKAGE,'keyid = '.$keyid.' and parentid = '.$parentid,'listorder ,linkageid');
		
		$parent_menu_name = ($parentid == 0) ? $keyInfo[0]['name'] : $parentInfo[0]['name'];

		if(!empty($infos)){
			foreach($infos as $k=>$v) {
				$s[] = $v['linkageid'].','.$v['name'].','.$v['parentid'].','.$parent_menu_name;
			}
		}
		
		if(count($s) > 0) {
			$jsonstr = json_encode($s);
			echo trim_script($_GET['callback']).'(',$jsonstr,')';exit;			
		} else {
			echo trim_script($_GET['callback']).'()';exit;	
		}
	}
	
	/**
	 * 获取地区父级路径路径
	 * @param $parentid 父级ID
	 * @param $keyid 菜单keyid
	 * @param $callback json生成callback变量
	 * @param $result 递归返回结果数组
	 * @param $infos
	 */
	function ajax_getpath($parentid = 0 ,$keyid = 0,$callback = '',$result = array(),$is = true) {
		if($is){
			$keyid 		= V('r:keyid');
			$parentid 	= V('r:parentid');
			$callback 	= V('r:callback');
		}

		if($parentid > 0) {
			$info = DS('mgr/linkage.get_info','',T_LINKAGE,'linkageid = '.$parentid,'',1,'name,parentid');
			$result[] = $info[0]['name'];
			return $this->ajax_getpath($info[0]['parentid'],$keyid,$callback,$result,false);
		} else {
			if(count($result) > 0) {
				krsort($result);
				$result = array_values($result);
				$jsonstr = json_encode($result);
				echo trim_script($callback).'(',$jsonstr,')';exit;		
			} else {
				$info = DS('mgr/linkage.get_info','',T_LINKAGE,'linkageid = '.$keyid,'',1,'name');
				$result[] = $info[0]['name'];
				$jsonstr = json_encode($result);
				echo trim_script($callback).'(',$jsonstr,')';exit;
			}
		}
	}
	/**
	 * 获取地区顶级ID
	 * Enter description here ...
	 * @param  $linkageid 菜单id
	 * @param  $keyid 菜单keyid
	 * @param  $callback json生成callback变量
	 * @param  $infos 递归返回结果数组
	 */
	function ajax_gettopparent($linkageid = 0,$keyid = 0,$callback = '',$is = true) {
		if($is){
			$linkageid 	= V('r:linkageid');
			$keyid 		= V('r:keyid');
			$callback 	= V('r:callback');
		}

		$info = DS('mgr/linkage.get_info','',T_LINKAGE,'linkageid = '.$linkageid,'',1,'parentid');
		
		if($info[0]['parentid'] != 0) {
			return $this->ajax_gettopparent($info[0]['parentid'],$keyid,$callback,false);
		} else {
			echo trim_script($callback).'(',$linkageid,')';exit;
		}
	}
	
	/************************************************************************
	 *
	 *	以下函数适用于select联动样式
	 *
	 ************************************************************************/
	function ajax_select() {
		$parent_id = V('r:parent_id',-1);
		$keyid = intval(V('r:keyid',0));
		
		$infos = DS('mgr/linkage.get_info','',T_LINKAGE,'keyid = '.$keyid.' and parentid = '.$parent_id,'listorder ,linkageid','','linkageid,parentid,name');
		
		$json_str = "[";
		$json = array();
		if(!empty($infos)){
			foreach($infos as $k=>$v) {
				$r = array(
					'region_id' => $v['linkageid'],
					'region_name' => $v['name']
				);
				$json[] = $this->JSON($r);
			}
		}
		$json_str .= implode(',',$json);
		$json_str .= "]";
		echo $json_str;
	}
	
	function JSON($array) {
		$this->arrayRecursive($array, 'urlencode', true);
		$json = json_encode($array);
		return urldecode($json);
	}
	
	function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
	{
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$this->arrayRecursive($array[$key], $function, $apply_to_keys_also);
			} else {
				$array[$key] = $function($value);
			}
	
			if ($apply_to_keys_also && is_string($key)) {
				$new_key = $function($key);
				if ($new_key != $key) {
					$array[$new_key] = $array[$key];
					unset($array[$key]);
				}
			}
		}
	}
	
}