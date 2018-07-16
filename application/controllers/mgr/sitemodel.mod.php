<?php
/**************************************************
*  Created:  2015-01-12
*
*  文件说明
*
*  @Xsmart (C)2015-2099Inc.
*  @Author Chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class sitemodel_mod extends action {
	public $db;
	function sitemodel_mod() {
		parent :: action();
		parent :: _initLanguage();
		$this->db = APP :: ADP('db');
	}
	
	// 列表页
	public function init() {
		$page 	= (int)V('g:page', 1);
		$each 	= (int)V('g:each', 10);
		$offset = ($page -1) * $each;
		$num 	= ($page -1) * $each;
		$id 	= V('g:id', '');
		$count 	= DR('mgr/sitemodelCom.modelCounts');
		$pager 	= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $each, 'recordCount' => $count['rst'], 'linkNumber' => 10);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		//$categorys = getcache('category_content_'.$this->siteid,'commons');
		$datas = DS('mgr/sitemodelCom.modelList','',$offset,$each);
		TPL :: assign('datas',$datas);
		
		//模型文章数array('模型id'=>数量);
		/*$items = array();
		foreach ($datas as $k=>$r) {
			foreach ($categorys as $catid=>$cat) {
				if(intval($cat['modelid']) == intval($r['modelid'])) {
					$items[$r['modelid']] += intval($cat['items']);
				} else {
					$items[$r['modelid']] += 0;
				}
			}
			$datas[$k]['items'] = $items[$r['modelid']];
		}*/
		
		$this->_display('sitemodel/sitemodel_manage');
	}
	
	// 添加模型
	public function add() {
		if($this->_isPost()) {
			$info 				= V('p:info');
			$info['addtime'] 	= APP_LOCAL_TIMESTAMP;
			$modelid 			= DS('mgr/sitemodelCom.save','',$info);
			$post_sql  			= $info['sql'];
			if(!empty($post_sql)){
				$model_sql = file_get_contents(MODEL_PATH.'model'.$post_sql.'.sql');
			}
			
			$tablepre 	= $this->db->getPrefix();
			$tablename 	= $info['tablename'];
			$model_sql 	= str_replace('$basic_table', $tablepre.$tablename, $model_sql);
			$model_sql 	= str_replace('$table_data',$tablepre.$tablename.'_data', $model_sql);
			$model_sql 	= str_replace('$table_model_field',$tablepre.'model_field', $model_sql);
			$model_sql 	= str_replace('$modelid',$modelid,$model_sql);
			$model_sql 	= str_replace('$siteid',0,$model_sql);
			
			$rs = $this->db->sql_execute($model_sql);
			if($rs)
				exit('1');
				//$this->_succ('添加成功', URL('mgr/sitemodel.init'));
			else
				exit('0');
				//$this->_error('添加失败', URL('mgr/sitemodel.init'));
		} else {
			if(V("r:modelid")){
				$info = DS('mgr/sitemodelCom.get_one','',V("r:modelid"));
				TPL :: assign('info',$info);
			}
			$this->_display('sitemodel/sitemodel_add');
		}
	}
	
	//编辑模型
	public function edit() {
		if($this->_isPost()) {
			$info 				= V('p:info');
			$info['addtime'] 	= APP_LOCAL_TIMESTAMP;
			$rs 				= DS('mgr/sitemodelCom.save','',$info,V("r:modelid"),"modelid");
			echo $rs ? '1' : '0';
		}
	}
	
	// 检查表是否存在
	public function public_check_tablename() {
		$tablename = $_GET['tablename'];
		$tablename = $this->db->getTable($tablename);
		$rs = $this->db->table_exists(strip_tags($tablename));
		echo $rs ? 1 : 0;
	}

	// 禁用/启用
	public function disabled() {
		$modelid 	= intval(V('r:modelid',0));
		$disabled 	= V('r:disabled') ? 0 : 1;
		$rs = DS('mgr/sitemodelCom.save','',array('disabled'=>$disabled),$modelid);
		$url = URL('mgr/sitemodel.init');
		header('location:'.$url);
	}
	
	// 删除
	public function delete(){
		$rs = DS('mgr/sitemodelCom.delete','',V("r:modelid"));
		if($rs)
			$this->_succ('删除成功', URL('mgr/sitemodel.init'));
		else
			$this->_error('删除失败', URL('mgr/sitemodel.init'));
	}
	
	// 模型列表 -> 返回模型ID
	public function public_get_list() {
		$infos = DS('mgr/sitemodelCom.modelList','');
		TPL :: assign('infos',$infos);
		$this->_display('sitemodel/sitemodel_get_list');
	}
	
}