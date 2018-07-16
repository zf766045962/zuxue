<?php
/**
* 附件数据操作
*
* @version $1.2: 2012/12/11 $
* author @@liu
*/

class  attachmentCom{
	var $db; 
	var $table;
	var $table_attachment;
	

	function attachmentCom(){
		$this->db = APP::ADP('db');
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
	//保存附件
	function saveAttachment($params){
		
		$this->db->setTable(T_ATTACHMENT);

		$rst = $this->db->save($params);
		return RST($rst);
		
	
	}
	
	
	//专辑列表
	function AlbumList($uid,$type){
		$where=' where user_id="'.$uid.'" and album_type="'.$type.'"';
		$sql='select * from '.$this->table.$where;
		$rs=$this->db->query($sql);
		return RST($rs);
	}
	//专辑内的文件数量
	function getAttachmentCount($aid){
		$where=($aid=='')?'':' where albumid="'.$aid.	'"'	;
		$sql='select count(*) from '.$this->table_attachment.$where;

		$rs=$this->db->getOne($sql);
		return RST($rs);
	}
	
	//获取专辑内的文件列表
	function getAttachmentByAlbum($aid, $offset = 0, $each = 15){
		if (!is_numeric($offset) || !is_numeric($each)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
		$where=($aid=='')?'':' where albumid="'.$aid.	'"'	;
		$sql='select * from '.$this->table_attachment.$where. ' ORDER BY `aid` LIMIT ' . $offset . ',' . $each;;
		$rs=$this->db->query($sql);
		return RST($rs);
	}
	//搜索附件
	function search($keyword){
		//todo..放在search.mod.php中
	}

}
