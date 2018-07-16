<?php
include('action.abs.php');
class developing_mod extends action {

	function developing() {
		parent :: action();
	}

	/**
	 * 内容列表样式
	 */
	function default_action() {
		
		$this->_display('developing');
	}
}
