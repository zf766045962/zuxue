<?php
/**************************************************
*  Created:  2010-10-28
*
*  文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@liu
*
***************************************************/
include('action.abs.php'); 
class admin_mod extends action {
	function admin_mod() {

		parent :: action();
	}

	function index() {
		//var_dump($this->menu);
		TPL::assign('menu', $this->_getUserMenu(USER::uid()));
		TPL::assign('username', USER::get('screen_name'));
		$this->_display('index');
		
	}
	function index_content() {
		//var_dump($this->menu1);
		TPL::assign('menu', $this->_getUserMenu(USER::uid(),$this->menu1));
		TPL::assign('username', USER::get('screen_name'));
		$this->_display('index_content');
		
	}

	function map() {
		TPL::assign('menu', $this->_getUserMenu(USER::uid()));
		$this->_display('map');
	}

	function default_page () {
		$counts=array();
		if(V('-:appmode/member',0)){//使用默认时间缓存
			$counts['user']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'');
			$counts['user_login_last_day']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'last_login>'.strtotime('-1 day'));
			$counts['user_login_last_7day']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'last_login>'.strtotime('-7 day'));
			$counts['user_login_last_month']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'last_login>'.strtotime('-1 month'));
			$counts['user_login_last_3month']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'last_login>'.strtotime('-3 month'));
			$counts['user_reg_last_day']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'registerTime>'.strtotime('-1 day'));
			$counts['user_reg_last_7day']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'registerTime>'.strtotime('-7 day'));
			$counts['user_reg_last_month']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'registerTime>'.strtotime('-1 month'));
			$counts['user_reg_last_3month']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'registerTime>'.strtotime('-3 month'));
			if(V('-:appmode/member_check',0)){
				$counts['user_reg_check']=DS('mgr/adminCom.getCount',CACHE_TIME,T_USERS,'ischeck=0');
			}//未审核会员数
			//var_dump($counts);
		}
		TPL::assign('counts', $counts);
		$this->_display('default');
	}

	/**
	* 用户登录模板
	*/
	function login() {
			TPL :: assign('is_admin_report', USER::get('isAdminReport'));	//获取是否上报
			$this->_display('login');
	}
	
	//验证登陆
	function chklogin(){
			$username = trim(V('p:username'));
			$pwd = trim(V('p:password'));
			$verify_code = strtolower(V('p:verify_code'));
			
			if (empty($username) || empty($pwd)) {
				exit('{"state":"401", "msg":"帐号或密码不能为空"}');
			}
			//检查是否启用验证码
			if(IS_USE_CAPTCHA ) {
				$autocode = APP :: N('SimpleCaptcha');
				if (!$autocode->checkAuthcode($verify_code)) {
					exit('{"state":"403", "msg":"验证码错误，"}');
				}
			}


			$rs = DS('mgr/adminCom.getAdminByName', '', $username);
			if (!isset($rs)) {
				exit('{"state":"401", "msg":"帐号错误"}');
			}

			if ($rs['pwd'] != md5($pwd)) {
				exit('{"state":"402", "msg":"密码错误"}');
			}else{
					session_regenerate_id();   //防御Session Fixation
					USER::set('is_root', $rs['is_root']);	//设置管理员session
					USER::set('__CLIENT_ADMIN_ROOT', $rs['group_id']);	//设置管理员session
					USER::set('screen_name', $rs['username']);	//设置管理员session
					USER::set('__CLIENT_USER_ID', $rs['id']);	//设置管理员session
					USER::set('gid', $rs['group_id']);	//设置管理员session
					USER::aid($rs['id']);	
					
					if ( V('g:ajax') ) {
						exit('{"state":"200"}');
					} 
					APP::redirect(URL('mgr/admin.index_content'), 2);
			}
		if(V('-:appmode/member',0)){
		
		}else{
			
		}
	}
		
	/**
	* 退出登录
	*/
	function logout() {
		USER::aid('');
		USER::set('__CLIENT_ADMIN_ROOT', '');
		session_regenerate_id();   //防御Session Fixation
		//USER::resetInfo();
		APP :: redirect('mgr/admin.login', 2);
	}

	/**
	* 绘制验证码
	*/
	function authcode() {
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
/*
		$autocode = APP :: N('authCode');
		$autocode->setImage(array('type'=>'png','width'=>70,'height'=>25));
		$autocode->paint();
*/
		session_start();
		$autocode = APP :: N('SimpleCaptcha');
		$autocode->CreateImage();

	}


    /*
    * 管理员列表
    */
	function userlist() 
	{

		$page 			= (int)V('g:page', 1);
		$each 			= (int)V('g:each', 15);
		$offset 		= ($page -1) * $each;
		$num 			= ($page -1) * $each;
		$id 			= V('g:id', '');

		$rss = $rs = '';
        //获取管理员数量
        $count 			= DR('mgr/adminCom.getAdminNum');

		$pager 			= APP :: N('pager');
		$page_param 	= array('currentPage'=> $page, 'pageSize' => $each, 'recordCount' => $count['rst'], 'linkNumber' => 10);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());

		
		//获取管理员列表
		$rss 			= DS('mgr/adminCom.getAdminList');
		$rsgroup 		= DS('mgr/adminCom.getGroupList');
		
		//var_dump(USER::get('is_admin'));
		TPL :: assign('is_root', USER::get('is_root'));
		TPL :: assign('admin_id', USER::aid());
		TPL :: assign('num', $num);
		TPL :: assign('list', $rss);
		TPL :: assign('grouplist', $rsgroup);
		TPL :: display('mgr/admin/adminlist', '', 0, false);
	}

    /*
     * 管理员删除
     */
	function del() {
		$id = V('g:id', 0);
		$callback=array('userlist');
		if(V('-:appmode/permit',0)){
			$callback=array('default_action','admingroup');
		}
		if ($this->_getUid() == $id) {
			$this->_error('不能对自己进行删除操作', $callback);
		}
		if(V('-:appmode/permit',0)){
		
		}
		$p = DR('mgr/adminCom.getAdminById', '', $this->_getUid());	//获取当前操作者的数据
		if(!$p['rst']['is_root'] == '1') {
			$this->_error('无权删除内置管理员', array('search'));
		}

		$rs = DR('mgr/adminCom.delAdmin', '', $id);
		if ($rs['rst']) {
			$this->_succ('操作已成功',$callback);
		}
		
		$this->_error('删除失败', $callback);
	}
	
	function page_link(){
		$router=V('g:router','home/0/0');
		$router=explode('/',$router);
		//var_dump($router);
		$menu=$this->menu;
		//var_dump($menu);
		$link=array();
		$link[0]=array('title'=>$menu[$router[0]]['title'],
					   'url'=>$menu[$router[0]]['sub'][0]['sub'][0]['url']
					   );
		//$link[1]=$menu[$router[0]]['sub'][$router[1]]['title'];
		$link[2]=array('title'=>$menu[$router[0]]['sub'][$router[1]]['sub'][$router[2]]['title'],
					   'url'=>$menu[$router[0]]['sub'][$router[1]]['sub'][$router[2]]['url']);
		
		
		//var_dump($link);
		TPL::module('page_link',array('link'=>$link));
	}

    /*
     * 管理员修改密码
     */
	function repassword() 
	{
		$rs = DS('mgr/adminCom.getAdminById', '', USER::aid());	//获取当前操作者的数据
		TPL :: assign('info', $rs);
		TPL :: assign('username', $rs['username']);
		TPL :: display('mgr/admin/change_password', '', 0, false);
		
	}
	
	
	function savepwd()
	{
		$id = (int)V('p:id', 0);
		$new_pwd = trim(V('p:pwd'));
		$re_pwd = trim(V('p:re_pwd'));
		$old_pwd = trim(V('p:old_pwd'));
		if (!$old_pwd) {
			$this->_error('请输入原始密码', URL('mgr/admin.repassword', 'id='. $id));
		}
		if (!$new_pwd) {
			$this->_error('请输入新密码', URL('mgr/admin.repassword', 'id='. $id));
		}
		if ($new_pwd != $re_pwd) {
			$this->_error('两次输入的新密码不一致', URL('mgr/admin.repassword', 'id='. $id));
		}
		if ($new_pwd == $old_pwd) {
			$this->_error('新密码和原始密码一样，不能修改密码', URL('mgr/admin.repassword', 'id='. $id));
		}
		$p = DR('mgr/adminCom.getAdminById', '', $id);
		if (!$p['rst']) {
			$this->_error('不存在的用户', URL('mgr/admin.repassword', 'id='. $id));
		}
		// 如果是本人修改密码，则一定要验证旧密码
		if (md5($old_pwd) != $p['rst']['pwd']) {
			$this->_error('输入的旧密码不正确', URL('mgr/admin.repassword', 'id='. $id));
		}
		//判断当前操作者是否为超级管理员或本人
		$data = array(
						'pwd' => md5($new_pwd)
						);
		$rs = DR('mgr/adminCom.saveAdminById', '', $data, $id);
		if(!$rs['rst']) 
		{
			$this->_error('修改密码失败, 新密码可能与旧密码相同', URL('mgr/admin.repassword', 'id='. $id));
		}
		else if(intval($rs["rst"]) == 1)
		{
			/*echo "<script>alert('修改密码成功');history.go(-1);</script>";*/
			$this->_succ('操作已成功', URL('mgr/admin.repassword',''));	 
		}
		else
		{
			$this->_error('您无权限修改', URL('mgr/admin.repassword', 'id='. $id));
		}
	}
	
   /*
    * 搜索用户
    */
	function addAdminSet() {
		$list = DS('mgr/admingroup.getAdmingroupList');
		TPL :: assign('list',$list);
		TPL :: assign('uid',V('r:uid'));
		$this->_display('admin/add_admin_set');
	
	}
	
   /*
    * 添加管理员
    */
	function adminAdd() 
	{
		$gid 	= V('r:gid',0);
		$rs 	= DS('mgr/admingroup.getAdminAllgroupList');	//获取所有管理组列表
		TPL :: assign('list',$rs);
		TPL :: assign('gid',$gid);
		TPL :: display('mgr/admin/add_admin', '', 0, false);
	}
   /*
    * 修改管理员
    */
	function adminEdit() 
	{
		$id 	= V('r:id',0);
		if(intval($id)==0)
		{
			$this->_error('此管理员不能修改', 'javascript:history.go(-1);');
		}
		//获取所有管理组列表
		$rs 				= DS('mgr/admingroup.getAdminAllgroupList');
		$admininfo 		= DS('mgr/adminCom.getAdminById','',$id);
		if(!isset($admininfo) || empty($admininfo))
		{
			$this->_error('无法获取该管理员信息', 'javascript:history.go(-1);');
		}
		TPL :: assign('list',$rs);
		TPL :: assign('admininfo',$admininfo);
		TPL :: display('mgr/admin/add_admin', '', 0, false);
	}
   /*
    * 管理员添加（不开启会员模式）
    */
	function saveAdd_ModeNoMember() 
	{
		
		$username 			= trim(V('r:username'));
		$pwd 				= trim(V('r:password'));
		$is_root 			= trim(V('r:is_root'));
		$email 				= trim(V('r:email'));
		$group_id 			= trim(V('r:group_id'));
		$id 				= trim(V('r:id'));
		if (empty($username)) 
		{
			$this->_error('用户名不能为空', 'javascript:history.go(-1);');
		}
		if (empty($pwd)&&intval($id)==0) 
		{
			$this->_error('密码不能为空', 'javascript:history.go(-1);');
		}
		if (empty($email)) 
		{
			$this->_error('Email不能为空', 'javascript:history.go(-1);');
		}
		if(intval($id)>0)
		{
			if(empty($pwd))
			{
				$data = array(
								'username' 		=> $username,
								'email' 		=> $email,
								'addtime' 		=> APP_LOCAL_TIMESTAMP,
								'is_root' 		=> $is_root,
								
							);
			}
			else
			{
				$data = array(
								'username' 		=> $username,
								'pwd' 			=> md5($pwd),
								'email' 		=> $email,
								'addtime' 		=> APP_LOCAL_TIMESTAMP,
								'is_root' 		=> $is_root,
								
							);
			}
		}
		else
		{
			$adminchk = DS("mgr/adminCom.adminAddChk","",$username);
			if(intval($adminchk[0]["count"])>0)
			{
				$this->_error('此用户名已经存在', 'javascript:history.go(-1);');
			}
			$data = array(
							'username' 			=> $username,
							'pwd' 				=> md5($pwd),
							'group_id' 			=> $group_id,
							'email' 			=> $email,
							'addtime' 			=> APP_LOCAL_TIMESTAMP,
							'is_root' 			=> $is_root,
							
						);
		}
		$rs = DR('mgr/adminCom.saveAdminById', '', $data,$id);
		if ($rs['rst']) 
		{
			$this->_succ('操作已成功', array('userlist'));
		}
		$this->_error('添加失败', 'javascript:history.go(-1);');
		
	
	}



   /*
    * 管理员添加
    */
	function add() {
		$uid = trim(V('p:uid'));
		$pwd = trim(V('p:pwd'));
		
		$callback=array('userlist');
		if(V('-:appmode/permit',0)){
			$callback=array('default_action','admingroup');
		}

		if (empty($uid)) {
			$this->_error('用户id不能为空', array('search'));
		}

		$rst = DR('user/userCom.getUserByUid', '', $uid);
		if (!$rst['rst']) {
			$this->_error('该用户不存在', array('search'));
		}
		$username=$rst['rst']['username'];

		$p = DR('mgr/adminCom.getAdminById', '', $this->_getUid());	//获取当前操作者的数据
		if(!$p['rst']['group_id'] == '1') {
			$this->_error('您无权限添加，需要有超级管理员权限', array('search'));
		}

		$rs = DR('mgr/adminCom.getAdminByCCUid', '', $uid);
        if($rs['rst']) {
            $this->_error('该用户已是管理员', array('search'));
        }
        if(!V('p:group_id',0)) {
            $this->_error('请选择管理组', 'javascript:history.go(-1);');
        }
                                
		$data = array(
						'cc_uid' => $uid,
						'username' => $username,
						'pwd' => md5($pwd),
						'group_id' => V('p:group_id'),
						'addtime' =>APP_LOCAL_TIMESTAMP
						
					);
		$rs = DR('mgr/adminCom.saveAdminById', '', $data);
		if ($rs['rst']) {
			$this->_succ('操作已成功', $callback);
		}
		$this->_error('添加失败', array('search'));
	}
	//管理员操作日志
	function showlog() {
	
		//todo..
		
         TPL :: display('mgr/developing', '', 0, false);
         //TPL :: display('mgr/admin/add_admin', '', 0, false);
	}



	
}
