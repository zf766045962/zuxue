<?php
defined('IN_ADMIN') or exit('No permission resources.');
$this->db->query("ALTER TABLE `$tablename` DROP `$field`");
// 处理特殊自定义字段
switch($field_type) {
	case 'title':
		$this->db->query("ALTER TABLE `$tablename` DROP `style`");
	break;
	case 'islink':
		$this->db->query("ALTER TABLE `$tablename` DROP `islink`");
	break;
	case 'relatedata':
		$this->db->query("ALTER TABLE `$tablename` DROP `{$field}_idstr`");
	break;
}
?>