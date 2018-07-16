<?php
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class system_mod extends action {
	
	// 列表
	function index(){
		$modelid 	= intval(V('g:modelid','11'));
		$catid 		= intval(V('p:catid')) ? intval(V('p:catid')) : intval(V('g:catid'));
		$modelInfo 	= DS('mgr/sitemodelCom.get_one','',$modelid);
		$setting 	= string2array($modelInfo['default_style']);
		
		TPL :: assign('setting',$setting);
		$where 	= '';
		if($catid){
			$where .= ' and catid = '.$catid;
		}
		
		// 分页
		$page 		= (int)V('g:page', 1);
		$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 10);
		$offset 	= ($page -1) * $pageSize;
		$limit		= $offset.','.$pageSize;
		$total 		= DS('mgr/system.getTotal','','system',$where);
		//var_dump($total);
		$pager 		= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		
		// 数据
		$info = DS('mgr/system.getData','','system',$where,$order,$limit);
		TPL :: assign('info',$info);
		$this->_display('system/list');
	}
	
	// 添加 / 编辑 / 预览
	public function add() {
		$modelid 	= intval(V('r:modelid'));
		$catid 		= intval(V('r:catid'));
		$id 		= intval(V('r:id'));
		$modelInfo 	= DS('mgr/sitemodelCom.get_one','',$modelid);
		$fields		= DS('mgr/modelfieldCom.getList','','modelid = '.$modelid.' and f.disabled=0 and isadd=1','listorder ASC');
		// 栏目分类信息
		$categorys 	= DS('mgr/modelForm.get_info','',T_ARTICLE_CLASS,'','lmorder,classid','','classid as id,classname as name,parentid','id');
		// 数据信息
		$data		= DS('mgr/modelForm.getDataById','',$modelInfo['tablename'],$id);
		$form	 	= APP :: N('form');
		$form->init($modelid,$fields,$catid,$categorys);
		$forminfos 	= $form->get($data);
		
		TPL :: assign('modelInfo',$modelInfo);
		TPL :: assign('forminfos',$forminfos);
		TPL :: assign('formValidator',$form->formValidator);
		$this->_display('modelForm/add');
	}
	
	// 保存信息
	public function save (){
		$data = $_POST["info"];
		if(isset($_POST['dosubmit']) || isset($_POST['dosubmit_continue'])) {
			
			$form_save 	= APP :: N('form_save',V('r:modelid'));
			$info 		= $form_save->get($data);
			// 颜色选择为隐藏域 在这里进行取值
			$info['system']['style'] = $_POST['style_color'] && preg_match('/^#([0-9a-z]+)/i', $_POST['style_color']) ? $_POST['style_color'] : '';
			if($_POST['style_font_weight'] == 'bold') $info['system']['style'] = $info['system']['style'].';'.strip_tags($_POST['style_font_weight']);
			
			$systeminfo = $info['system'];
			$modelinfo 	= $info['model'];

			//$systeminfo['username'] = $data['username'] ? $data['username'] : $_SESSION['screen_name'];
			//$systeminfo['sysadd'] = defined('IN_ADMIN') ? 1 : 0;
			
			$modelInfo = DS('mgr/sitemodelCom.get_one','',V('r:modelid'));
			$tablename = $modelInfo['tablename'];
			
			// 添加OR编辑
			$id = intval(V('r:id',0));
			if($id > 0){
				// 主表
				$rs = DS('mgr/modelForm._update','',$systeminfo,$tablename,'id',$id);
				// 附属表
				$modelinfo['id'] = $id;
				DS('mgr/modelForm._update','',$modelinfo,$tablename.'_data','id',$id);
			}else{
				// 主表
				$id = $rs = DS('mgr/modelForm._save','',$systeminfo,$tablename);
				// 附属表
				$modelinfo['id'] = $id;
				DS('mgr/modelForm._save','',$modelinfo,$tablename.'_data');
			}
			if(isset($_POST['dosubmit'])) {
				$url = URL('mgr/modelForm.infoList','modelid='.V('r:modelid').'&catid='.V('r:catid'));
			} else {
				$url = URL('mgr/modelForm.add','modelid='.V('r:modelid').'&catid='.V('r:catid'));
			}
			if($id && $rs){
				$this->_succ('信息保存成功！', $url);
			}else{
				$this->_error('信息保存失败！', $url);
			}
		} 
	}
	
	// 删除
	public function delete(){
		$modelid 	= intval(V('r:modelid'));
		$id 		= V('r:id');
		$modelInfo 	= DS('mgr/sitemodelCom.get_one','',$modelid);
		$rs 		= DS('mgr/modelForm.delete','',$modelInfo['tablename'],'id in ('.$id.')');
		APP :: redirect($this->_getReferer(), 3);
	}
	
	function chapter(){
		$sid		= intval(V('g:sid'));
		$modelid 	= intval(V('g:modelid'));
		$catid 		= intval(V('p:sid')) ? intval(V('p:sid')) : intval(V('g:sid'));
		$modelInfo 	= DS('mgr/sitemodelCom.get_one','',$modelid);
		$setting 	= string2array($modelInfo['default_style']);
		TPL :: assign('setting',$setting);
		$where 	= '';
		if($catid){
			$where .= ' and systemid = '.$catid;
		}
		
		// 分页
		$page 		= (int)V('g:page', 1);
		$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 10);
		$offset 	= ($page -1) * $pageSize;
		$limit		= $offset.','.$pageSize;
		$total 		= DS('mgr/system.getTotal','','chapter',$where);
		$pager 		= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		
		// 数据
		$info = DS('mgr/system.getChapter','','chapter',$where,$order,$limit);
		TPL :: assign('info',$info);
		
		TPL :: assign('catid_search',$catid_search ? $catid_search : '');
		TPL :: assign('searchStr',$searchStr);
		
		$this->_display('system/chapter');
	}
	
}