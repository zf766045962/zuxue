<?php
/**************************************************
*  Created:  2015-02-06
*
*  模型表单 - Public
*
*  @Xsmart (C)2015-2099Inc.
*  @Author Chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class modelForm_mod extends action {
	// 选择关联数据
	function public_select_data(){
		$this->infoList(0);
	}
	// 操作项
	function operation($param){
		TPL :: assign('param',$param);
		$this->_display('modelForm/operation');
	}
	// 列表
	function infoList($type = 1){
		$modelid 	= intval(V('g:modelid'));
		$catid 		= intval(V('p:catid')) ? intval(V('p:catid')) : intval(V('g:catid'));
		$modelInfo 	= DS('mgr/sitemodelCom.get_one','',$modelid);
		TPL :: assign('modelInfo',$modelInfo);
		$setting 	= string2array($modelInfo['default_style']);
		TPL :: assign('setting',$setting);
		// 构造添加链接GET值
		$get = $_GET;
		unset($get['m']);
		unset($get['router']);
		unset($get['page']);
		$getParam = urldecode(http_build_query($get));
		TPL :: assign('getParam',$getParam);
		// 显示在列表的字段
		$listItem 	= DS('mgr/modelfieldCom.getList','','modelid = '.$modelid.' and F.disabled = 0 and F.isposition = 1','listorder ASC',0,0,'field');
		// 筛选的字段
		$searchItem = DS('mgr/modelfieldCom.getList','','modelid = '.$modelid.' and F.disabled = 0 and F.issearch = 1','listorder ASC',0,0,'field');
		TPL :: assign('listItem',$listItem);
		TPL :: assign('searchItem',$searchItem);
		$form_list = APP :: N('form_list',array('urlParam'=>$getParam));
		TPL :: assign('form_list',$form_list);
		
		// 筛选
		$where 	= '';
		$searchStr = '';
		$_logic = intval(V('p:logic',1)) == 1 ? 'and' : 'or';
		// 处理关联ID的筛选
		if(strpos($getParam,'@id') !== false){
			foreach($get as $key=>$val){
				if(strpos($key,'@id') !== false){
					$field = str_replace('@','',$key);
					$check = DS('mgr/modelForm.get_info','','model_field','modelid = '.$modelid.' and disabled = 0 and field = "'.$field.'"','',1,'fieldid');
					if(!empty($check))
					$where .= 'and a.'.$field.' = '.$val;
				}
			}
		}
		if($catid > 0){
			$ids = DS('mgr/modelForm.getClassidStr','',$catid);
			$where .= 'and a.catid in ('.$ids['ids'].') ';
		}
		if(!empty($searchItem)){
			$flag = $_logic == 'and' ? true : false;
			$show = false;
			foreach($searchItem as $key=>$val){
				// 栏目特殊处理
				if($val['formtype'] == 'catid'){
					$catid_search = $form_list->catid_search($val['field'],$_POST[$val['field']],$val);
					continue;
				}
				// 筛选项
				$func = $val['formtype'].'_search';
				if(method_exists($form_list, $func)){
					$searchStr .= $form_list->$func($val['field'],V('p:'.$val['field']),$val);
				}
				// 筛选Sql
 				if(isset($_POST[$val['field']]) || isset($_POST[$val['field'].'_min']) && isset($_POST[$val['field'].'_max'])){
					$t = $val['issystem'] ? 'a' : 'b';
					$logic = $flag ? $_logic : ' and (';
					if($val['formtype'] == 'box'){
						if($_POST[$val['field']] != -1){
							$show = $flag = true;
							$where .= $logic." $t.".$val['field']." = '".$_POST[$val['field']]."' ";
						}
					}else if($val['formtype'] == 'datetime'){
						$itemSetting = string2array($val['setting']);
						if($_POST[$val['field'].'_min'] != '' && $_POST[$val['field'].'_max'] != ''){
							$show = $flag = true;
							$where .= $logic." ($t.".$val['field']." >= '".($itemSetting['fieldtype'] == 'int' ? strtotime($_POST[$val['field'].'_min']) : $_POST[$val['field'].'_min'])."' and $t.".$val['field']." <= '".($itemSetting['fieldtype'] == 'int' ? strtotime($_POST[$val['field'].'_max']) : $_POST[$val['field'].'_max'])."') ";
						}
					}else if($_POST[$val['field']] != ''){
						$show = $flag = true;
						$where .= $logic." $t.".$val['field']." like '%".$_POST[$val['field']]."%' ";
					}
				}
			}
			$where .= $_logic == 'and' || !$flag ? '' : ')';
			TPL :: assign('show',$show);
		}

		// 排序Sql
		$order = 'a.id desc';

		// 分页
		$page 		= (int)V('g:page', 1);
		$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 10);
		$offset 	= ($page - 1) * $pageSize;
		$limit		= $offset.','.$pageSize;
		$total 		= DS('mgr/modelForm.getTotal','',$modelInfo['tablename'],$where);
		$pager 		= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		
		// 数据
		$info = DS('mgr/modelForm.getData','',$modelInfo['tablename'],$where,$order,$limit);
		TPL :: assign('info',$info);
		
		TPL :: assign('catid_search',$catid_search ? $catid_search : '');
		TPL :: assign('searchStr',$searchStr);
		
		$this->_display('modelForm/'.($type ? 'list' : 'select_data'));
	}
	
	// 添加 / 编辑 / 预览
	public function add() {
		$modelid 	= intval(V('r:modelid'));
		$catid 		= intval(V('r:catid'));
		$id 		= intval(V('r:id'));
		// 构造添加链接GET值
		$get = $_GET;
		unset($get['m']);
		unset($get['router']);
		unset($get['id']);
		$getParam = urldecode(http_build_query($get));
		TPL :: assign('getParam',$getParam);
		$modelInfo 	= DS('mgr/sitemodelCom.get_one','',$modelid);
		$fields		= DS('mgr/modelfieldCom.getList','','modelid = '.$modelid.' and F.disabled=0 and F.isadd=1','listorder ASC');
		// 栏目分类信息
		$categorys 	= DS('mgr/modelForm.get_info','',T_ARTICLE_CLASS,'','lmorder,classid','','classid as id,classname as name,parentid','id');
		// 数据信息
		$data		= DS('mgr/modelForm.getDataById','',$modelInfo['tablename'],$id);
		$form	 	= APP :: N('form');
		$form->init($modelid,$fields,$catid,$categorys);
		$forminfos 	= $form->get($data);
		// 来源控制器
		//$referer_m = preg_match('/\?m=([\w\/\.]+)/i',$_SERVER['HTTP_REFERER'],$arr) ? $arr[1] : '';
		//TPL :: assign('referer_m',$referer_m);
		TPL :: assign('modelInfo',$modelInfo);
		TPL :: assign('forminfos',$forminfos);
		TPL :: assign('formValidator',$form->formValidator);
		
		$this->_display('modelForm/add');
	}
	
	// 保存信息
	public function save (){
		// 构造跳转链接GET值
		$get = $_GET;
		unset($get['m']);
		unset($get['id']);
		$getParam = urldecode(http_build_query($get));
		
		$data = $_POST["info"];
		if(!empty($_POST)) {
			$form_save 	= APP :: N('form_save',V('r:modelid'));
			$info 		= $form_save->get($data);
			// 颜色选择为隐藏域 在这里进行取值
			$info['system']['style'] = $_POST['style_color'] && preg_match('/^#([0-9a-z]+)/i', $_POST['style_color']) ? $_POST['style_color'] : '';
			if($_POST['style_font_weight'] == 'bold') $info['system']['style'] = $info['system']['style'].';'.strip_tags($_POST['style_font_weight']);
			
			$systeminfo = $info['system'];
			$modelinfo 	= $info['model'];
			
			// 管理员session信息字段单独处理
			if(isset($data['admin_uid'])){
				$systeminfo['admin_uid'] = USER :: uid();
			}
			if(isset($data['admin_gid'])){
				$systeminfo['admin_gid'] = USER :: get('gid');
			}
			if(isset($data['admin_uname'])){
				$systeminfo['admin_uname'] = USER :: get('screen_name');
			}
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
		}
		if(isset($_POST['dosubmit'])) {
			$url = URL('mgr/modelForm.infoList',$getParam);
		}
		if(isset($_POST['dosubmit_continue'])) {
			$url = URL('mgr/modelForm.add',$getParam);
		}
		if($id && $rs){
			$this->_succ('信息保存成功！', $url);
		}else{
			$this->_error('信息保存失败！', $url);
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
	
	// 设置
	function setting (){
		$data = array('default_style' => array2string($_POST));
		$rs = DS('mgr/modelForm._update','',$data,T_MODEL,'modelid',V('r:modelid'));
		echo $rs ? 1 : 0;
	}
}