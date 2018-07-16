<?php 


/// LOG　控制类
class editor
{
	function editor(){
	}
	
	function &instance()
	{
		static $c;
		if(empty($c)) {
			$c = APP::ADP('editor');
		}
		return $c;
	}
	//------------------------------------------------------------------
	
	
	function run($arr)
	{	
		$c = & editor::instance();
		return $c->showEditor($arr);
	}
	
}