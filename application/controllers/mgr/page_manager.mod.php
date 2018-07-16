<?php
include('action.abs.php');
class page_manager_mod extends action
{
	var $pm = null;
	//组件类别
	var $component_cty = array(
		'test1' => '首页图文类',
		'test2' => '列表类',
		'test3' => '详细类'
	);
	function page_manager_mod() 
	{
		parent :: action();
		$this->pm = APP :: N('pageManager');
	}
	
	function default_action() 
	{
		$list = $this->pm->get();
		//var_dump($list);
		TPL :: assign('pages', $list);
		$this->_display('pagelist');
	}
	
	//添加新的页面
	function createPageView()
	{
		$pageList = DR('mgr/PagePrototype.prototypeList', FALSE, PAGE_TYPE_CURRENT);
		//var_dump($pageList);
		TPL :: assign('pageList', $pageList);
		$this->_display('pageManager_createPageView');
	}

	//保存新页面
	function doCreatePage()
	{
		$data 	= (array)(V('p:data'));
		$proId 	= $data['prototype_id'];
		$url 	= URL('mgr/page_manager');
		
		$prototype = DR('mgr/PagePrototype.getPrototypeById',FALSE,$proId);
		//var_dump($prototype);die;
		
		if ( empty($proId) || !$prototype = DR('mgr/PagePrototype.getPrototypeById',FALSE,$proId) )
		{
			$this->_error('操作失败, 页面类型ID为空或页面类型不存在！', $url);
		}
		
		// organize data
		$db 			= APP :: ADP('db');
		$data['native']	= 0;
		$data['url']	= $prototype['url'];
		
		if ( $pageId = $db->save($data,'',T_PAGES) )
		{
			// insert page's component
			$this->addPageComponents($db, $pageId, json_decode($prototype['components'], TRUE));
			$this->_succ('操作已成功', URL('mgr/page_manager.setting', array('id'=>$pageId)) );
		}
		
		$this->_error('操作失败, 请检查一下参数', $url);
	}
	
	//页面设置列表
	function setting()
	{
		$page_id = V('g:id');
		if (!$page_id) {
			exit('param page_id missing');
		}

		// xsmart_pages 的信息
		$page 		= DS('mgr/PageModule.getPage', '', $page_id);
		
		if (!$page) {
			$this->_error('指定的页面不存在',URL('mgr/page_manager'));
		}
			
		// 获取模块
		$list 		= DS('mgr/PageModule.getPageModules', '', $page_id);
		// 排序后的模块
		$modules 	= DR('mgr/PageModule.groupByPos', '', $list, null);

		TPL :: assign('page_id', $page_id);
		TPL :: assign('page', $page);
		
		TPL :: assign('main_modules', isset($modules[1]) ? $modules[1] : null);
		//TPL :: assign('side_modules', isset($modules[2]) ? $modules[2] : null);

		$this->_display('page_setting');
	}
	
	// 组件选择列表  - ajax
	function componentCategory() {
		$page_id		= V('g:page_id');
		$componentType  = V('g:componentType');
		
		// 查询xsmart_components表 类型为$componentType 所有的数据
		$componentList	= $this->pm->getCustomeComponent($componentType);

		// 查询xsmart_page_manager表 查询出所有这个页面中已经添加的模块
		$pageComponentList 	= $this->pm->getPageComponentList($page_id);
		
		// 过滤已经添加的 每个页面只能有一个的模块
		$componentList 		= $this->filterPageComponent($componentList, $pageComponentList);

		// 组件分类  为了切换组件类别
		$componentsByCategory = array();
		foreach ($componentList as $component) {
			$componentsByCategory[$component['component_cty']][] = $component;
		}
		
		//arsort($componentsByCategory);
		//var_dump(array_keys($componentsByCategory));
		TPL :: assign('componentList', $componentsByCategory);

		TPL :: assign('component_cty', $this->component_cty);
		TPL :: assign('page_id', $page_id);
		$this->_display('componentCategory');
	}
	
	/**
	 * 页面组件开关设置
	 */
	/*function set() 
	{
		$page_id = V('g:page_id');
		$pmId 	 = V('g:c');
		$use 	 = V('g:use');

		if ($page_id && $pmId)
		{
			$result = $this->pm->onOff($page_id, $pmId, $use);
			if ($result) {
				DD('PageModule.getPageModules');
			}
		}

		APP :: redirect(URL('mgr/page_manager.setting', array('id'=>$page_id)), 3);
	}*/
	
	//保存排序
	function savesort() 
	{
		//$ids 		= V('p:ids');
		$main 		= V('p:main');
		$side 		= V('p:side');
		$page_id 	= V('g:page_id');
		//$pos 		= V('g:pos');
		
		$manager 	= APP :: N('pageManager');
		$result = array();
		
		$result['main'] 	= $manager->setSort(explode(',', $main), $page_id, 1);
		//$result['side'] 	= $manager->setSort(explode(',', $side), $page_id, 2);
		
		APP :: ajaxRst($result, $result['main'] ? 0 : 1);
		exit;
	}
	
	// 页面组件 设置页面
	function createComponentView()
	{
		$componentId 	= V('g:component_id', 0);
		$page_id		= V('g:page_id');
		$settingTpl		= V('g:settingTpl');
	
		$editHtm 		= TPL :: plugin('mgr/componentSettingTpl/'.$settingTpl, array('component_id' => $componentId, 'page_id' => $page_id), FALSE, FALSE);
		
		APP :: ajaxRst($editHtm);
	}
	
	
	/**
	 * 过滤某些页面已经添加的，每个页面只能有一个的组件
	 * @param array $componentList
	 * @param array $pageComponentList
	 */
	function filterPageComponent($componentList, $pageComponentList)
	{
		if (empty($pageComponentList))
		{
			return $componentList;	
		}
		
		// filter page component
		$list = array();
		foreach ($componentList as $aComponent)
		{
			$list[$aComponent['component_id']] = $aComponent;
		}
		
		foreach ($pageComponentList as $aPageCom)
		{
			$compId = $aPageCom['component_id'];
			if (isset($list[$compId]['type']) && $list[$compId]['type']==0)
			{
				unset($list[$compId]);
			}
		}
		
		return array_values($list);
	}
	
	// 添加组件 并设置组件配置项  xsmart_page_manager
	function doCreateComponent()
	{
		//var_dump(V('p'));die;
		$page_id = intval(V('p:page_id'));
		$data 	 = (array)(V('p:data'));
		if (empty($page_id) || empty($data['component_id']) )
		{
			$this->_error('操作失败, 页面ID或 组件ID不能为空！', array('default_action'));
		}
		
		// 数据组装
		$data['page_id']	= $page_id;
		$data['in_use']		= 1;
		$data['isNative']	= 0;
		
		$component			= DS('mgr/PageModule.getComponent', '', $data['component_id']);
		$data['title']		= (isset($data['title'])&&$data['title']) ? $data['title'] : $component['title'];
		$data['position']	= $component['component_type'];
		
		$db 	 			= APP :: ADP('db');
		$data['sort_num']	= $db->getOne('select max(sort_num) from '. $db->getTable(T_PAGE_MANAGER)) + 1;
		
		// Param
		$param 			= (array)(V('p:param'));
		$data['param'] 	= json_encode($param);
		$url 			= URL('mgr/page_manager.setting', array('id'=>$page_id));
		
		// set db and return
		if ($pmId = $db->save($data, '', T_PAGE_MANAGER))
		{
			$this->_succ('操作已成功', $url);
		}
		
		$this->_error('操作失败, 请检查一下参数', $url);
	}
	
	// 编辑 页面组件设置页
	function editComponentView()
	{
		$page_id 		= intval(V('g:page_id'));
		$pmId 	 		= intval(V('g:id'));
		$settingTpl 	= V('g:settingTpl');
		
		if ($pmId) {
			$data 	 = $this->pm->getPageManager($pmId);
			if (empty($data))
			{
				$url = URL('mgr/page_manager.setting', array('id'=>$page_id));
				$this->_error('找不到对应组件,请检查一下参数', $url);
			}
			$component 		= DS('mgr/PageModule.getComponent', '', $data['component_id']);
			$data['param'] 	= $this->getEditViewParam($data['param'], $data['component_id']);
			$data['title'] 	= $data['title'] ? $data['title'] : $component['title'];
			TPL :: assign('data', $data);
			TPL :: assign('pmId', $pmId);
			TPL :: assign('component', $component);
		}

		// 取得页面信息
		$page 			= DS('mgr/PageModule.getPage', '', $page_id);
		
		TPL :: assign('page', $page);
		TPL :: assign('page_id', $page_id);
		TPL :: assign('component_id', $pmId);
		$this->_display('componentSettingTpl/'.$settingTpl);
	}
	
	/**
	 * \ 获取 组件编辑页面的param参数，主要是和组件的默认值合并
	 * @param array $param
	 * @param id $componentId
	 */
	private function getEditViewParam($param, $componentId)
	{
		$param = json_decode($param, TRUE);
		$param = empty($param) ? array() : $param;
		
		$comCfg = DR('mgr/PageModule.configList', '', FALSE, $componentId);
		$comCfg = empty($comCfg) ? array() : $comCfg;
		
		return array_merge($comCfg, $param);
	}
	
	// 保存页面组件属性的修改
	function doEditComponent()
	{
		$data = V('p:data');
		// get vars
		$pmId 	= intval($data['component_id']);
		$url  	= URL('mgr/page_manager.setting', array('id'=>V('p:page_id')));
		if (!$pmId || !$aPm = $this->pm->getPageManager($pmId))
		{
			$this->_error('找不到对应组件,请检查一下参数', $url);
		}

		// build the param vars
		$param = (array)(V('p:param'));

		// 组装
		if (is_array($param))
		{
			$pmParam		= json_decode($aPm['param'], TRUE);
			$pmParam		= is_array($pmParam) ? $pmParam : array();
			$data['param']  = json_encode(array_merge($pmParam, $param));
		}
		//var_dump($data);die;
		// DB
		$db 	= APP :: ADP('db');
		$result = $db->save($data, $pmId, T_PAGE_MANAGER);
		if ($result || $result===0)
		{
			$this->_succ('操作已成功', $url);
		} else {
			$this->_error('操作失败！', $url);
		}
	}
	
	/**
	 * \brief add page components when create page
	 * @param dbconnect $db
	 * @param int $pageId
	 * @param array $componentList
	 */
	private function addPageComponents(&$db, $pageId, $componentList)
	{
		if (empty($pageId) || empty($componentList)) {
			return FALSE;
		}
		
		foreach ($componentList as $aComponent)
		{
			$aComponent['page_id'] = $pageId;
			$db->save($aComponent, '', T_PAGE_MANAGER);
		}
		return TRUE;
	}

	/**
	 * \brief do the eidt page action
	 */
	function doEditPage()
	{
		// get vars
		$pageId = intval(V('p:id'));
		$db 	= APP::ADP('db');
		if (!$pageId || !$data=$db->get($pageId,T_PAGES,'page_id') )
		{
			$this->_error('找不到对应页面,请检查一下参数', array('default_action'));
		}
		
		// update and return
		$url  = URL('mgr/page_manager.setting', array('id'=> $pageId));
		$data = (array)(V('p:data'));
		if ( $db->save($data,$pageId,T_PAGES,'page_id') ) 
		{
			$this->_succ('操作已成功', $url);
		} 
		
		$this->_error('操作失败！', $url);
	}
	
	// 删除页面组件
	function delComponent()
	{
		$pmId 	= intval(V('g:pmId'));
		$db 	= APP :: ADP('db');
		$url	= URL('mgr/page_manager.setting', array('id'=>V('g:page_id')));
		
		if ($pmId && $data = $db->get($pmId, T_PAGE_MANAGER)) 
		{
			if (empty($data['isNative']))
			{
				// delete the page_manager record
				if ($db->delete($pmId, T_PAGE_MANAGER)) {
					$this->_succ('操作已成功', $url);
				}
			} else {
				$this->_error('温馨提示：不能删除系统预设组件', $url);
			}
		} 
		$this->_error('操作失败，请检查输入参数是否正确', $url);
	}
	
	// 设置页面背景图片
	function setBackground() {
		$id = V('p:pid');
		$rs = false;
		if (!$id) {
			APP :: ajaxRst($rs);
		}
		if ($this->_isPost()) {
			$data = array(
				'bg'	 => V('p:bg'),// 图片
				'repeat' => V('p:repeat'),// 平铺
				'align'	 => V('p:align'),// 对齐方式
				'fixed'	 => V('p:fixed')// 背景固定
			);
			$data = json_encode($data);
			$data = array('params' => $data);
			$db = APP :: ADP('db');
			$rs = $db->save($data, $id, T_PAGES, 'page_id');
		}
		APP :: ajaxRst($rs);
	}

	function uploadBackground() {
		
			$file = V('f:bg');
			$maxSize = 2 * 1024 * 1024;
			$script = 'window.location="/js/blank.html?rand='.microtime().'";';
			$callback = V('g:callback');
			if ($file && $file['tmp_name']) {
				$pid = V('p:pid');
				if ($file['size'] > $maxSize) {
					APP::JSONP(FALSE,3040012, L('controller__setting__sizeLimit'),$callback,$script);
					break;
				}
				$info = getimagesize($file['tmp_name']);
				if ($info[2] != 3 && $info[2] != 2) {
					APP::JSONP(FALSE,610003, L('controller__setting__uploadImgType'),$callback,$script);
					break;
				}
				//上传文件
				$file_obj = APP :: ADP('upload');
				///以cc_uid md5为名保存文件
				if (!$file_obj->upload('bg', md5($pid), P_PAGE_BG, 'png,jpeg,jpg', $maxSize)) {
					APP :: JSONP(FALSE,610007, L('controller__setting__copyImgError'),$callback,$script);
					break;
				}
				//获取上传文件的信息
				$page_bg = $file_obj->getUploadFileInfo();
				//return APP::ajaxRst(F('fix_url', $skinBG['webpath']));
				APP :: JSONP(F('fix_url', $page_bg['webpath']) . '?_rand='.time(), 0, '', $callback, $script);
			}
			if($file&&$file['tmp_name']==''&&$file['size']==0){
				APP :: JSONP(FALSE,3040012, L('controller__setting__sizeLimit'),$callback,$script);
				return;
			}
			else{
				APP :: JSONP(FALSE, 610008, L('controller__setting__serverError'), $callback, $script);
				return;
			}
	}

	// 删除页面
	function delPage()
	{
		$pageId = intval(V('g:id'));
		$db 	= APP :: ADP('db');
		$url	= URL('mgr/page_manager');
		
		if ( $pageId && $data=$db->get($pageId,T_PAGES,'page_id') ) 
		{
			
			//导航是否在使用？（不管是否在显示）
			$navdata = DR('mgr/Nav.getNavByPageId', null, $pageId);
			if(!empty($navdata)){
				$this->_error('温馨提示：导航栏正使用该页面，不能删除', $url);
			}
			
			if (empty($data['native']))
			{
				// delete the 页面组件
				$db->delete($pageId, T_PAGE_MANAGER, 'page_id');
				
				// delete the page record
				if ( $db->delete($pageId,T_PAGES,'page_id') ) {
					$this->_succ('操作已成功', $url);
				}
			} else {
				$this->_error('温馨提示：不能删除系统预设组件', $url);
			}
		} 
		$this->_error('操作失败，请检查输入参数是否正确', $url);
	} 
	
	// 修改页面名称
	function doEditPageData(){
		$pageId 	= intval(V('p:page_id'));
		$page_name 	= strval(V('p:page_name'));
		$db 		= APP :: ADP('db');

		if ( $pageId > 0 && !empty($page_name) && $data=$db->get($pageId,T_PAGES,'page_id') )
		{
			$db->save(array('page_name' => $page_name), $pageId, T_PAGES, 'page_id');
			APP :: ajaxRst(true);
		}
		
		APP :: ajaxRst(false, -1 , '操作失败，请检查输入参数是否正确');
	}
	
	//添加组件
	function addComponent(){
		if(V('g:id',0) > 0){
			$info = DS('publics._get','','xsmart_components','component_id = '.V('g:id'));
			TPL :: assign('info', $info[0]);
		}
		TPL :: assign('component_cty', $this->component_cty);
		$this->_display('addComponent');
	}
	
	//保存组件
	function saveComponent(){
		if(!empty($_POST)){
			$component_id 	= V('p:component_id',0);
			$data 			= V('p:data');
			$data['preview_img'] = V('p:img');
			if($component_id > 0){
				$rs = DS('publics._update','',$data,'components','component_id',$component_id);
				
			}else{
				$rs = DS('publics._save','',$data,'components');
				$component_id = $rs;
			}
			if($rs){
				$this->_succ('操作已成功', URL('mgr/page_manager.addComponent','id='.$component_id));
			}
		}
	}
	
}
