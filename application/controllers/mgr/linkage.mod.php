<?php
/**************************************************
*  Created:  2015-02-13
*
*  联动菜单
*
*  @Xsmart (C)2015-2099Inc.
*  @Author @chenyining
*
***************************************************/
include('action.abs.php'); 
class linkage_mod extends action {
	function __construct() {
		$this->childnode = array();
	}
	
	// 联动菜单列表
	public function init() {
		$infos = DS('mgr/linkage._get','',T_LINKAGE,'keyid = 0');
		TPL :: assign('infos',$infos);
		
		$this->_display('linkage/linkage_list');
	}
	
	// 添加/编辑联动菜单
	public function add() {
		$keyid 		= intval(V('r:keyid',0));
		$parentid 	= intval(V('r:parentid',0));
		$linkageid 	= intval(V('r:linkageid',0));
		if($linkageid > 0){
			$info 		= DS('mgr/linkage._get','',T_LINKAGE,'linkageid = '.$linkageid);
			$setting 	= string2array($info[0]['setting']);
			TPL :: assign('info',$info[0]);
			TPL :: assign('setting',$setting);
		}
		TPL :: assign('keyid',$keyid);
		TPL :: assign('parentid',$parentid);
		TPL :: assign('linkageid',$linkageid);
		$this->_display('linkage/linkage_add');
	}
	
	// 保存联动菜单
	public function save(){
		extract($_POST);
		$linkageid 			= intval($linkageid);
		$info['name'] 		= trim($info['name']);
		$info['description']= trim($info['description']);
		$info['style'] 		= intval($info['style']);
		$info['keyid'] 		= intval($info['keyid']);
		$info['parentid'] 	= intval($info['parentid']);
		if($info['style'] == 2){
			$info['setting'] = array2string(array('level'=>intval($info['level'])));
		}
		unset($info['level']);
		if($linkageid > 0){
			$rs = DS('mgr/linkage._update','',$info,T_LINKAGE,'linkageid',$linkageid);
		}else{
			$rs = DS('mgr/linkage._save','',$info,T_LINKAGE);
		}
		$sum = DS('mgr/linkage.get_total','',T_LINKAGE,'keyid='.$info['keyid']);
		$url = !$info['keyid'] ? URL('mgr/linkage.init') : URL('mgr/linkage.public_manage_submenu','keyid='.$info['keyid'].($sum > 30 ? '&parentid='.$info['parentid'] : ''));
		if($rs)
			$this->_succ('操作成功！', $url);
		else
			$this->_error('操作失败！', $url);
	}
	
	// 管理联动菜单子菜单
	public function public_manage_submenu() {
		$keyid 		= intval(V('r:keyid',0));
		$parentid 	= intval(V('r:parentid',0));
		$info 		= DS('mgr/linkage._get','',T_LINKAGE,'linkageid='.($parentid ? $parentid : $keyid));
		$tree 		= APP :: N('tree');
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$sum 		= DS('mgr/linkage.get_total','',T_LINKAGE,'keyid='.$keyid);
		$where 		= $sum > 30 ? 'keyid='.$keyid.' and parentid='.$parentid : 'keyid='.$keyid;
		$result 	= DS('mgr/linkage.get_info','',T_LINKAGE,$where,'listorder ,linkageid');
		
		if(!empty($result)){
			foreach($result as $areaid => $area){
				$areas[$area['linkageid']] = array('id'=>$area['linkageid'],'parentid'=>$area['parentid'],'name'=>$area['name'],'listorder'=>$area['listorder'],'style'=>$area['style'],'mod'=>$mod,'file'=>$file,'keyid'=>$keyid,'description'=>$area['description']);
				
				$areas[$area['linkageid']]['str_manage'] = ($sum > 30 && $this->_is_last_node($area['keyid'],$area['linkageid'])) ? '<a href="'.URL('mgr/linkage.public_manage_submenu','keyid='.$area['keyid'].'&parentid='.$area['linkageid']).'">管理子菜单</a> | ' : '';
				
				$areas[$area['linkageid']]['str_manage'] .= '<a href="javascript:dialog(\''.URL('mgr/linkage.add','keyid='.$keyid.'&parentid='.$area['linkageid']).'\',\'添加子菜单\',500,300);" onclick="add(\''.$keyid.'\',\''.new_addslashes($area['name']).'\',\''.$area['linkageid'].'\')">添加子菜单</a> | <a href="javascript:dialog(\''.URL('mgr/linkage.add','keyid='.$keyid.'&parentid='.$area['parentid'].'&linkageid='.$area['linkageid']).'\',\'编辑 - '.new_addslashes($area['name']).'\',500,300);">修改</a> | <a href="javascript:confirmUrl(\''.URL('mgr/linkage.delete','linkageid='.$area['linkageid'].'&keyid='.$area['keyid']).'\',\'您确定删除此菜单吗？删除后不可恢复。\');">删除</a> ';
			}
		}
		$str  = "<tr>
					<td align='center' width='80'><input name='listorders[\$id]' type='text' size='4' value='\$listorder' class='input-text-c'></td>
					<td align='center' width='100'>\$id</td>
					<td>\$spacer\$name</td>
					<td >\$description</td>
					<td align='center'>\$str_manage</td>
				</tr>";
		$tree->init($areas);
		$submenu = $tree->get_tree($parentid, $str);
		TPL :: assign('keyid',$keyid);
		TPL :: assign('info',$info[0]);
		TPL :: assign('submenu',$submenu);
		$this->_display('linkage/linkage_submenu');
	}
	private function _is_last_node($keyid,$linkageid) {
		$result = DS('mgr/linkage.get_total','',T_LINKAGE,'keyid='.$keyid.' and parentid='.$linkageid);
		return $result ? true : false;
	}
	
	// 菜单排序
	public function public_listorder() {
		extract($_POST);
		if(!is_array($listorders)) return false;
		if(!empty($listorders)){
			foreach($listorders as $linkageid=>$value)
			{
				$value = intval($value);
				DS('mgr/linkage._update','',array('listorder'=>$value),T_LINKAGE,'linkageid',$linkageid);
			}
		}
		APP :: redirect($this->_getReferer(), 3);
		//$this->_succ('保存成功！', 'GET_REFERER');
	}
	
	// 删除菜单
	public function delete() {
		$linkageid 	= intval(V('r:linkageid',0));
		$this->_get_childnode($linkageid);
		if(is_array($this->childnode)){
			foreach($this->childnode as $linkageid_tmp) {
				DS('mgr/linkage._del','',T_LINKAGE,'linkageid='.$linkageid_tmp);
			}
		}
		if($linkageid > 0){
			DS('mgr/linkage._del','',T_LINKAGE,'keyid='.$linkageid);
		}
		APP :: redirect($this->_getReferer(), 3);
		//$this->_succ('操作成功！', 'GET_REFERER');
	}
	private function _get_childnode($linkageid) {
		$where = array('parentid'=>$linkageid);
		$this->childnode[] = intval($linkageid);
		$result = DS('mgr/linkage.get_info','',T_LINKAGE,'parentid = '.$linkageid,'','','linkageid');
		if(!empty($result)) {
			foreach($result as $r) {
				$this->_get_childnode($r['linkageid']);
			}
		}
	}
	
	// 联动菜单列表 -> 返回菜单ID
	public function public_get_list() {
		$infos = DS('mgr/linkage._get','',T_LINKAGE,'keyid=0');
		TPL :: assign('infos',$infos);
		$this->_display('linkage/linkage_get_list');
	}
	
	// 下拉菜单
	public function select_linkage($param) {
		extract($param);
		$tree = APP :: N('tree');
		$result = DS('mgr/linkage._get','',T_LINKAGE,'keyid='.$keyid);
		$id = $id ? $id : $name;
		$string = "<select name='$name' id='$id' $property>\n<option value='0'>$alt</option>\n";
		if(!empty($result)) {
			foreach($result as $area) {	
				$categorys[$area['linkageid']] = array('id'=>$area['linkageid'], 'parentid'=>$area['parentid'], 'name'=>$area['name']);	
			}
		}
		$str  = "<option value='\$id' \$selected>\$spacer \$name</option>";
		$tree->init($categorys);
		$string .= $tree->get_tree($parentid, $str, $linkageid);
		$string .= '</select>';
		echo $string;
	}

	/**
	 * 生成联动菜单缓存
	 * @param init $linkageid
	 */
	public function public_cache() {
		set_time_limit(0);
		$linkageid 	= intval(V('r:linkageid'));
		$info 		= array();
		$r 			= DS('mgr/linkage._get','',T_LINKAGE,'linkageid = '.$linkageid);
		$r			= $r[0];
		$info['title'] 		= $r['name'];
		$info['style'] 		= $r['style'];
		$info['setting']	= string2array($r['setting']);
		$info['data'] 		= $this->submenulist($linkageid);
		//setcache($linkageid, $info,'linkage');
		$this->_succ('缓存更新成功！', URL('mgr/linkage.init'));
	}
	/**
	 * 子菜单列表
	 * @param unknown_type $keyid
	 */
	private function submenulist($keyid=0) {
		$keyid = intval($keyid);
		$datas = array();
		$where = ($keyid > 0) ? 'keyid='.$keyid : '';
		$result = DS('mgr/linkage.get_info','',T_LINKAGE,$where,'listorder ,linkageid','','linkageid,parentid,child,arrchildid');
		if(!empty($result)) {
			foreach($result as $r) {
				$arrchildid = $r['arrchildid'] = $this->get_arrchildid($r['linkageid'],$result);
				$child = $r['child'] =  is_numeric($arrchildid) ? 0 : 1;
				DS('mgr/linkage._update','',array('child'=>$child,'arrchildid'=>$arrchildid),T_LINKAGE,'linkageid',$r['linkageid']);
				$datas[$r['linkageid']] = $r;
			}
		}
		return $datas;
	}
	/**
	 * 获取子菜单ID列表
	 * @param $linkageid 联动菜单id
	 * @param $linkageinfo
	 */
	private function get_arrchildid($linkageid,$linkageinfo) {
		$arrchildid = $linkageid;
		if(is_array($linkageinfo)) {
			foreach($linkageinfo as $linkage) {
				if($linkage['parentid'] && $linkage['linkageid'] != $linkageid && $linkage['parentid'] == $linkageid) 	{
					$arrchildid .= ','.$this->get_arrchildid($linkage['linkageid'],$linkageinfo);
	
				}
			}
		}
		return $arrchildid;
	}
	
	/*public function ajax_getlist() {

		$keyid = intval($_GET['keyid']);
		$datas = getcache($keyid,'linkage');
		$infos = $datas['data'];
		$where_id = isset($_GET['parentid']) ? $_GET['parentid'] : intval($infos[$_GET['linkageid']]['parentid']);
		$parent_menu_name = ($where_id==0) ? $datas['title'] :$infos[$where_id]['name'];
		foreach($infos as $k=>$v) {
			if($v['parentid'] == $where_id) {
				$s[] = iconv('gb2312','utf-8',$v['linkageid'].','.$v['name'].','.$v['parentid'].','.$parent_menu_name);
			}
		}
		if(count($s)>0) {
			$jsonstr = json_encode($s);
			echo $_GET['callback'].'(',$jsonstr,')';
			exit;			
		} else {
			echo $_GET['callback'].'()';exit;			
		}
	}*/
	
	
}