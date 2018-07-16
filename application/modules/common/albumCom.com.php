<?php
/**
* 页面导航表管理：管理页面导航（nav）表
*
* @version $1.2: 2011/1/11 $
* @package Xsmart
* @copyright (C) 2009 - 2011 sina.com.cn
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

class Nav
{
db = APP::ADP('db');
		$this->db->setTable(T_ATTACHMENT_ALBUM);
		$this->table = $this->db->getTable(T_ATTACHMENT_ALBUM);
		$this->table_attachment = $this->db->getTable(T_ATTACHMENT);
	}

	function saveAlbum($id,$params){
		$keys = array(
			'album_name',
			'user_id',
			'user_name',
			'album_info',
			'add_time',
			'update_time',
			'is_pass',
			'tag',
			'album_type',
			);

		$data = array();
		foreach ($keys as $v) {
			if (isset($params[$v])) {
				$data[$v] = $this->db->escape($params[$v]);
			}
		}
		
		$rst = $this->db->save($data,$id);
		return RST($rst);
		
	
	}
	//专辑列表
	function AlbumList($uid,$type){
		$where=' where user_id="'.$uid.'" and album_type="'.$type.'"';
		$sql='select * from '.$table.$where;
		$rs=$this->db->query($sql);
		return RST($rs);
	}
	//专辑内的文件数量
	function getAttachmentCount($aid){
		$where=' where albumid="'.$aid.'" and album_type="'.$type.'"';
		$sql='select count(*) from '.$table_attachment.$where;
		$rs=$this->db->query($sql);
		return RST($rs);
	}
	
	//获取专辑内的文件列表
	function getAttachmentByAlbum($aid,$type){
		$where=' where albumid="'.$aid.		$where=' where albumid="'.$aid.'"
        and album_type="'.$type.'"';
		$sql='select * from '.$table_attachment.$where;
		$rs=$this->db->query($sql);
		return RST($rs);
	}
	//搜索附件
	function search($keyword){
		//todo..放在search.mod.php中
	}

}
	function get		$where=' where albumid="'.$aid.'"';
		$sql='select * from '.$table_attachment.$where;