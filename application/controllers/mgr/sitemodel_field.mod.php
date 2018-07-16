<?php
/**************************************************
*  Created:  2015-01-13
*
*  文件说明
*
*  @Xsmart (C)2015-2099Inc.
*  @Author Chenyining
*  @lastDate  2015-05-21
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class sitemodel_field_mod extends action {
	public $db;
	function sitemodel_field_mod() {
		parent :: action();
		parent :: _initLanguage();
		$this->db = APP :: ADP('db');
	}

	// 字段初始化
	public function init() {
		$modelid 	= V('g:modelid',0);
		if($modelid == 0){
			exit;
		}
		$where 		= ' modelid = '.$modelid;
		$order 		= 'listorder ASC';
		$orderType 	= '';

		$page 	= (int)V('g:page', 1);
		$each 	= (int)V('g:each', 100);
		$offset = ($page - 1) * $each;
		$num 	= ($page - 1) * $each;
		$id 	= V('g:id', '');
		$count 	= DR('mgr/modelfieldCom.Counts','',' modelid='.$modelid);
		
		$pager 	= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $each, 'recordCount' => $count['rst'], 'linkNumber' => 10);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());

		$datas 	= DS('mgr/modelfieldCom.getList','',$where,$order,$offset,$each );
		$r 		= DS('mgr/sitemodelCom.getModelById','',$modelid);

		TPL :: assign('r',$r);
		TPL :: assign('modelid',$modelid);
		TPL :: assign('datas',$datas);
		$this->_display('sitemodel/sitemodel_field_manage');
	}

	// 添加字段
	public function add() {
		if($this->_isPost()) {
			$modelid	 	= $_POST['info']['modelid'] = intval($_POST['info']['modelid']);
			$model_table 	= $_POST['hidden']['tablename'];
			$tablename 		= $this->db->getTable($_POST['issystem'] ? $model_table : $model_table.'_data');
			$field 			= $_POST['info']['field'];
			$minlength 		= $_POST['info']['minlength'] ? $_POST['info']['minlength'] : 0;
			$maxlength 		= $_POST['info']['maxlength'] ? $_POST['info']['maxlength'] : 0;
			$field_type 	= $_POST['info']['formtype'];
			
			require MODEL_PATH.$field_type.'/config.inc.php';
			if(isset($_POST['setting']['fieldtype'])) {
				$field_type = $_POST['setting']['fieldtype'];
			}
			// 执行添加表字段
			require MODEL_PATH.'add.sql.php';
			// 附加属性值
			$_POST['info']['setting'] 	= array2string($_POST['setting']);
			$_POST['info']['siteid'] 	= 0;
			$rs 	= DS('mgr/modelfieldCom.save','',$_POST['info']);
			
			$url 	= URL('mgr/sitemodel_field.init','modelid='.$_POST['info']['modelid']);
			if($rs){
				$this->_succ('添加字段成功！', $url);
			}else{
				$this->_error('添加字段失败！', $url);
			}
		} else {
			require MODEL_PATH.'fields.inc.php';
			$modelid 	= V('r:modelid');
			// 全部字段
			$f_datas 	= DS('mgr/modelfieldCom.getFieldByModelId','',$modelid);
			foreach($f_datas as $_k=>$_v) {
				$exists_field[] = $_v['field'];
			}
			// 允许添加的字段 
			$all_field = array();
			foreach($fields as $_k=>$_v) {
				if(in_array($_k,$not_allow_fields) || in_array($_k,$exists_field) && in_array($_k,$unique_fields)) continue;
				$all_field[$_k] = $_v;
			}
			// 模型信息
			$m_r = DS('mgr/sitemodelCom.getModelById','',$modelid);
			TPL :: assign('m_r',$m_r);
			TPL :: assign('tablename',$m_r['tablename']);
			TPL :: assign('f_datas',$f_datas);
			TPL :: assign('modelid',$modelid);
			TPL :: assign('all_field',$all_field);
			$this->_display('sitemodel/sitemodel_field_add');
		}
	}
	
	// 编辑字段
	public function edit() {
		if($this->_isPost()) {
			$info 		= V("p:info");
			$oldfield 	= V("p:oldfield");
			$tablename 	= V("p:tablename");
			$setting 	= V('p:setting');
			$tablename 	= $this->db->getTable(intval(V('p:issystem')) ? $tablename : $tablename.'_data');
			$fieldid 	= intval(V('p:fieldid'));
			$modelid 	= intval($info['modelid']);
			$field 		= $info['field'];
			$minlength 	= $info['minlength'] ? $info['minlength'] : 0;
			$maxlength 	= $info['maxlength'] ? $info['maxlength'] : 0;
			$field_type = $info['formtype'];

			require MODEL_PATH.$field_type.'/config.inc.php';
			if(isset($setting['fieldtype'])) {
				$field_type = $setting['fieldtype'];
			}
			// 执行修改表字段
			require MODEL_PATH.'edit.sql.php';
			// 附加属性值
			$info['setting'] = array2string($setting);
			$rs 	= DS('mgr/modelfieldCom.save','',$info,$fieldid);
			$url 	= URL('mgr/sitemodel_field.init','modelid='.$modelid);
			if($rs){
				$this->_succ('保存成功！', $url);
			}else{
				$this->_error('保存失败！', $url);
			}
		} else {
			$modelid 	= V('g:modelid',0);
			$fieldid 	= V('g:fieldid',0);
			$m_r		= DS('mgr/sitemodelCom.getModelById','',$modelid);
			$r			= DS('mgr/modelfieldCom.getItemByKeyID','',$fieldid);
			TPL :: assign('modelid',$modelid);
			TPL :: assign('fieldid',$fieldid);
			TPL :: assign('m_r',$m_r);
			TPL :: assign('r',$r);
			TPL :: assign('tablename',$m_r['tablename']);
			$this->_display('sitemodel/sitemodel_field_edit');
		}
	}
	
	// 排序
	public function listorder() {
		$url = URL('mgr/sitemodel_field.init','modelid='.V('r:modelid'));
		if(isset($_POST['dosubmit'])) {
			foreach($_POST['listorders'] as $id => $listorder) {
				DS('mgr/modelfieldCom.save','',array('listorder'=>$listorder),$id,'fieldid');
			}
			$this->_succ('操作成功', $url);
		} else {
			$this->_error('操作失败', $url);
		}
	}
	
	// 禁止
	public function disabled() {
		$fieldid 	= intval(V('r:fieldid'));
		$modelid 	= intval(V('r:modelid'));
		$disabled 	= intval(V('r:disabled')) ? 0 : 1;
		$rs			= DS('mgr/modelfieldCom.save','',array('disabled'=>$disabled),$fieldid);
		$url		= URL('mgr/sitemodel_field.init','modelid='.$modelid);
		header('location:'.$url);
	}
	
	// 删除
	public function delete() {
		$fieldid 	= intval(V('r:fieldid'));
		$info		= DS('mgr/modelfieldCom.getOne','',array('fieldid'=>$fieldid));
		extract($info);
		$rs 		= DS('mgr/modelfieldCom.delOne','',$fieldid,'fieldid');
		$arr		= DS('mgr/modelfieldCom.getTableByModelid','',array('modelid'=>$modelid));
		$tablename  = $this->db->getTable($issystem ? $arr['tablename'] : $arr['tablename'].'_data');
		//$rs2 		= DS('mgr/modelfieldCom.drop_field','',$tablename,$r['field']);
		$field_type = $formtype;
		// 执行删除表字段
		require MODEL_PATH.'delete.sql.php';
		
		$url		= URL('mgr/sitemodel_field.init','modelid='.$modelid);
		if($rs){
			$this->_succ('操作成功', $url);
		}else{
			$this->_error('操作失败', $url);
		}
	}
	
	// 验证字段是否可添加
	public function public_checkfield() {
		$field 		= strtolower(V('r:field',''));
		$oldfield 	= strtolower(V('r:oldfield',''));
		if($field == $oldfield && $field != '')
			exit('1');
		$table	 	= V('r:t');
		$issystem 	= intval(V('r:issystem',0));
		$tablename 	= $this->db->getTable($issystem ? $model_table : $model_table.'_data');
		$fields 	= DR('mgr/modelfieldCom.get_fields','',V('r:modelid'));
		if(array_key_exists($field,$fields)) {
			exit('0');
		}else{
			exit('1');
		}
	}

	// 字段属性设置
	public function public_field_setting() {
		$fieldtype = V('r:fieldtype','');
		if($fieldtype == '')
			exit;
		require MODEL_PATH.$fieldtype.'/config.inc.php';
		ob_start();
		include MODEL_PATH.$fieldtype.'/field_add_form.inc.php';
		$data_setting = ob_get_contents();
		ob_end_clean();
		$settings = array(
			'field_basic_table'		=> $field_basic_table,
			'field_minlength'		=> $field_minlength,
			'field_maxlength'		=> $field_maxlength,
			'field_allow_search'	=> $field_allow_search,
			'field_allow_fulltext'	=> $field_allow_fulltext,
			'field_allow_isunique'	=> $field_allow_isunique,
			'field_allow_isposition'=> $field_allow_isposition,
			'setting'				=> $data_setting
		);
		exit( json_encode($settings) );
	}
	
	// 模型字段列表 -> 返回字段ID及名称
	public function public_get_field(){
		$infos = DS('mgr/modelfieldCom.getList','','modelid = '.V('r:modelid'));
		TPL :: assign('infos',$infos);
		$this->_display('sitemodel/sitemodel_get_field');
	}
	
}