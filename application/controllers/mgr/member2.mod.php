<?php 
include('action.abs.php'); 
class member2_mod extends action 
{
	/*会员列表*/
	function memberlist()    
	{
		$type = V('r:type',2);
		TPL :: assign('type',$type);
		/*会员列表*/
		$username	=	V('r:username');
		TPL :: assign('username',$username);
		
		$realname	=	V('r:realname');
		TPL :: assign('realname',$realname);
		
		$email	=	V('r:email');
		TPL :: assign('email',$email);
		
		$phone	=	V('r:phone');
		TPL :: assign('phone',$phone);
		
		$where	=	' 1=1 ';
		
		if(!empty($username)) {
			$where	.=	' and username like "%'.$username.'%"';
		}
		
		if(!empty($realname)) {
			$where	.=	' and realname like "%'.$realname.'%"';
		}
		if(!empty($email)) {
			$where	.=	' and email like "%'.$email.'%"';
		}
		if(!empty($phone)) {
			$where	.=	' and phone like "%'.$phone.'%"';
		}
		
		$where .= ' and type = '.$type;
		
		$userlist = DS('mgr/member2.page_list','',20,$where,'addtime desc',V('r'),'users');
		TPL :: assign('userlist',$userlist);
		$this->_display('member/memberlist');
	}
	
	/*添加会员*/
	function add_member()
	{
		$rlist = DS('publics._get','','role',' 1=1');
		TPL :: assign('rlist',$rlist);
		
		$alist = DS('publics._get','','linkage',' parentid = 0 and keyid = 23');
		TPL :: assign('alist',$alist);
		
		$info	=	DS('mgr/member2._get','','users',"id='".V('r:id')."'");
		TPL :: assign('info',$info[0]);
		
		if(!empty($info[0]['orid'])){
			$presentCategory = DS('mgr/member2.get_present_category','',$info[0]['orid']);
			// $goods->get_present_category($goods_info['catid']);	 
			if(isset($presentCategory)){
				$count				= count($presentCategory)-1; 
				$a=0;
				for($i=$count;$i>=0;$i--){
					
					$catid		= $presentCategory[$i]['linkageid'];
					$parentid	= $presentCategory[$i]['parentid'];
					$category	= DS('mgr/member2.get_specifies_category','',$parentid);
					$goods_category[$a]	= $category;
					
					for($c=0;$c<count($goods_category);$c++){
						for($cat=0;$cat<count($goods_category[$c]);$cat++){
							if($goods_category[$c][$cat]['linkageid']==$catid){
								$goods_category[$c][$cat]['flag']='selected="selected"';
							}
						}
					}
					
					$a++;
				}
				
				$present_category	= $goods_category;	
				TPL :: assign('present_category'	,$present_category);		//当前选择的四级分类	
					
			}
			 
		}else{
			$goods_category	= DS('mgr/member2.get_specifies_category','',0);
		}
		TPL	:: assign('goods_category',		$goods_category);
		$this->_display('member/add_member');
	}
	
	function get_specifies_category()
	{
		$catid			= V('r:orid');
		$goods_category	= DS('mgr/member2.get_specifies_category','',$catid);
		//var_dump($goods_category);
		
		$property_html='<option value="0">请选择...</option>';
		if(!empty($goods_category['parentid'])){
			foreach($goods_category['parentid'] as $p){
				$property_html.='<option value="'.$p['linkageid'].'">'.$p['name'].'</option>';
			}
		}
		$category_html='<option value="0">请选择...</option>';
		if(!empty($goods_category)){
			unset($goods_category['parentid']);
			foreach($goods_category as $k=>$v){		
				$category_html.='<option value="'.$v['linkageid'].'">'.$v['name'].'</option>';
			}			
			
		}
		echo json_encode(array('category_html'=>$category_html));	
	}
	
	/*保存会员信息*/
	function saveMemberInfo(){
		$id		=	V('r:id');
		$data	=	V('p');
		//var_dump(V('r'));die;
		if((V('r:orid1') != 0) && (V('r:orid2') != 0) && (V('r:orid3') != 0)){
			$data['orid']		= 	V('r:orid3');
		}
		if(V('r:orid1') != 0 && V('r:orid2') != 0 && V('r:orid3') == 0){
			$data['orid']		= 	V('r:orid2');
		}
		if(V('r:orid1') != 0 && V('r:orid2') == 0 && V('r:orid3') == 0){
			$data['orid']		= 	V('r:orid1');
		}
		unset($data['orid1']);
		unset($data['orid2']);
		unset($data['orid3']);  
		
		if(empty($id)){
			$data['addtime']	=	time();
			$data['password']	=	md5($data['password']);
			$data['type']		= 	V('r:type','1');
			//var_dump($data);
			$re		=		DS('mgr/member2._save','',$data,'users');
		}else{
			if(!empty($data['password'])) {
			//	echo $data['password'].'|';
				$data['password']	=	md5($data['password']);
			//	echo $data['password']; 
				$data['ec_salt']	=	'';	
			} else {
				$user = DS("publics2._get","","users","id=".$id);
				$data['password'] = $user[0]['password']; 
				//unset($data['password']);
			}
			//var_dump($data);
			$re		=		DS('mgr/member2._update','',$data,'users','id',$id);
		}
		
		if($re){
			exit('{"info":"保存成功","status":"ok"}');
		}else{
			exit('{"info":"保存失败","status":"no"}');
		}
	}
	
	/*删除会员*/
	function del_member()
	{
		$info	=	DS('mgr/member2._del','','users',"id='".V('r:id')."'");
		if($info){
			echo 1;	
		}else{
			echo 0;	
		}
	}
	
	function check_username(){
		$username		= 		V('r:username','');
		$userinfo	    = 		DS("mgr/member2.check_username",'',$username);
		if(!empty($userinfo)){
			echo 1;
		}else{
			echo 0;
		} 
	}
	
	function d_address(){//获取用户收货地址
	  $userid 				= 			V('r:userid');
	  $where_userinfo 		= 			" userid='".$userid."'";
	  $userinfo 			= 			DS('mgr/member2.get_user','','xsmart_member',$where_userinfo);//获取会员信息
	  
	  TPL :: assign('userinfo',$userinfo);
	  TPL :: assign('userid',$userid);
	  $where 				= 			" uid='".$userid."' order by is_default desc";
	  $result 				= 			DS('mgr/member2.get_user','','xsmart_delivery_address',$where);
	  /*地区*/
	  $province_list 		= 			DS('publics.get_peisong_list','','1,2,3,4,5,6,7,8');//省 市 区联动下拉列表  得到所有父级id为1---8
	  TPL :: assign('province_list',$province_list);
	  TPL :: assign('result',$result);
	  $this->_display('member/d_address');
	}
	
	function mgr_AddressList(){//用户收货地址列表
		$uid	=	V('r:uid');
		$where  =   " uid = '".$uid."' and ";
		$data	=	$_POST;
		if(!empty($data)){
			foreach($data as $k=>$v){
				if($data[$k] != ''){
					if($k == 'consignee' || $k == 'phone'){
						$where .=  $k." like '%".trim($v)."%' and ";	
					}else if($k == 'addtime_start'){
						$where .=  " addtime >= '".strtotime($v)."' and ";						
					}else if($k == 'addtime_end'){
						$where .=  " addtime <= '".strtotime($v)."' and ";	
					}
				}
			}
		}
		$addressList	=	DS('mgr/member2.page_list_html2','',1,rtrim($where,' and '),'is_default desc,addtime desc',V('g'));
		TPL::assign('addressList',$addressList);
		$this->_display('member/mgr_AddressList');
	}
	
	function add_d_address(){//加载添加或修改收货地址页面
	  $userid 				= 		V('r:uid');
	  TPL :: assign('uid',$userid);
	  $userinfo 			= 		DS('mgr/member2.get_user','','xsmart_member'," userid = '".$userid."'");//获取会员信息
	  TPL :: assign('userinfo',$userinfo);
	  $id					=		V('r:id');
	  $addressInfo			=		DS('mgr/member2.get_user','','xsmart_delivery_address'," id = '".$id."'");//获取用户收货地址
	  if(!empty($addressInfo)){
	  	TPL :: assign('addressInfo',$addressInfo);
	  }
	  /*地区*/
	  $province_list 		= 		DS('publics.get_peisong_list','','1,2,3,4,5,6,7,8');//省 市 区联动下拉列表  得到所有父级id为1---8
	  TPL :: assign('province_list',$province_list);
	  TPL :: assign('userid',$userid);
	  $this -> _display('member/add_d_address');	
	}
	
	function save_add_d_address(){//保存收货地址添加的数据
	  if(!empty($_POST)){
		foreach($_POST as $k=>$v){
			$data[$k]		=		$v;	
		}
	  }
	  $data['addtime']				=		time();
	  $data['addUser']				=		USER::get('screen_name');
	  $data['addUser_updatetime']	=		time();
	  $re 							= 		DS('mgr/member2.save_user','',$data,'delivery_address');
	  if($re){
		if($data['is_default'] == 1){
			$data2['is_default']	=	0;
			$res	=	DS('mgr/member2.update_user','',$data2,'delivery_address','uid',$data['uid']);
			$data2['is_default']	=	1;
			$result	=	DS('mgr/member2.update_user','',$data2,'delivery_address','id',$re);
			echo 1;
			die;
		}
		echo 1;
	  }else{
		echo 2;  //保存失败
	  }
	}
	
	function save_d_address(){//保存收货地址信息(更新)
	  //$data['userid'] = V('r:userid');//用户ID
	  $id 					= 		V('r:id');
	  if(!empty($_POST)){
		foreach($_POST as $k=>$v){
			$data[$k]			=		$v;	
		}
	  }
	  $data['addUser']				=		USER::get('screen_name');
	  $data['addUser_updatetime']	=		time();
	  $res 					= 		DS('mgr/member2.update_user','',$data,'delivery_address','id',$id);
	  if($res){
		echo 1;
	  }else{
		echo 2;	
	  } 
	}
	function setDefault(){
	  $id		=	V('r:id');
	  $uid		=	V('r:uid');
	  $data['is_default']		=	0;
	  $result	=	DS('mgr/member2.update_user','',$data,'delivery_address','uid',$uid);
	  $data['is_default']	=	1;
	  $re	=	DS('mgr/member2.update_user','',$data,'delivery_address','id',$id);
	  echo 1;
	}
	function del_address(){	//删除收货地址方法

		$id		=	V('r:id');
		$re		=	DS('mgr/member2.del_user','','xsmart_delivery_address',"id = '".$id."'");
		if($re){
			echo 1;	
		}else{
			echo 0;	
		}
	}
	function del_addresses(){	//批量删除收货地址
		$strid	=	rtrim(V('r:strid'),',');
		$arr	=	explode(',',$strid);
		if(!empty($arr)){
			foreach($arr as $k=>$v){
				$re = DS('mgr/member2.del_user','','xsmart_delivery_address'," id = '".$v."'");	
			}
			echo 1;
		}
	}
	
	
	function update_member(){//更新会员审核状态
			extract($_POST);
//var_dump($_POST);
			$id = V('r:id');
			$val = substr($type,-1,1);
			$field = substr($type,0,-1);
			$rs = $field.'='.$val;
			$db = APP :: ADP('db');
			$table = $db->getTable(T_MEMBER);
			$sql="update ".$table." set ".$rs." where userid=".$id;
			$re = $db->execute($sql);
			if($re){
			  $sql_update_verify = "update ".$table." set is_verify_info = 2 where userid=".$id;	
			  $re_update_is_verify = $db->execute($sql_update_verify);//更新会员认证状态
			  if($re_update_is_verify){
				 echo 1;  
			  }
			}else{
			  echo 2;	
			}
	}
	/*投诉建议列表2014-4-15*/
	function get_user_complaints(){
		$data	=	$_POST;
		$where  =   '';
		if(!empty($data)){
				$where .= " isPass = 1 and ";
			foreach($data as $k=>$v){
				if($data[$k] != ''){
					if($k == 'start_addtime'){
						$where .= " addtime >= '".strtotime($v)."' and ";	
					}else if($k == 'end_addtime'){
						$where .= " addtime <= '".strtotime($v)."' and ";	
					}else if($k == 'username' || $k == 'qiye_1'){
						$where .= $k." like '%".$v."%' and ";	
					}else if($k == 'regist_type'){
						$where .= $k." = '".$v."' and ";	
					}
				}
			}
		}
		$complaints_list	=	DS('mgr/member2.mpage_list_html','','xsmart_complaints_user',10,rtrim($where,' and '),'addtime desc',V('r'));
		TPL :: assign('complaints_list',$complaints_list);
		$this->_display('member/mgr_complaints_list');
	}
	/*用户投诉详情*/
	function get_user_complaints_info(){
		$cid	=	V('r:cid');
		$complaintsInfo	=	DS('mgr/member2.get_user','','xsmart_complaints_user'," cid = '".$cid."'");
		/*echo '<pre>';
var_dump($complaintsInfo);
echo '</pre>';*/
		TPL :: assign('complaintsInfo',$complaintsInfo);
		$this->_display('member/mgr_complaints_info');	
	}
	/*批量删除投诉建议*/
	 function delSomeComplaints(){	
		$str	=	rtrim(V('r:str'),',');
		$arr	=	explode(',',$str);
		if(!empty($arr)){
			foreach($arr as $k=>$v){
				$re = DS('mgr/member2.del_user','','xsmart_complaints_user'," cid = '".$v."'");	

			}
			echo 1;
		}
	}
	/*单个删除投诉建议*/
	function delOneComplaints(){	
		$cid	=	V('r:cid');
		$re = DS('mgr/member2.del_user','','xsmart_complaints_user'," cid = '".$cid."'");	
		echo 1;
	}
	/*更新用户投诉信息,添加解决方案*/
	function update_user_complaint(){
		$cid			=	V('r:cid');
		$data['result']	=	V('r:result');
		$data['result_user']	=	USER::get('screen_name');
		$data['result_time']	=	time();
		$data['state']			=	2;
		$re		=		DS('mgr/member2.update_user','',$data,'complaints_user','cid',$cid);
		if($re){
			echo "<script>window.location.href='".URL('mgr/member2.get_user_complaints','&page='.V('r:page',1))."'</script>";	
		}else{
			echo "<script>alert('保存失败');history.go(-1);</script>";	
		}
	}
	/*获取会员等级列表方法*/
	function get_member_level_list(){
		$member_level_list	=	DS('mgr/member2.mpage_list_html','','xsmart_member_level',10,$where,'orderId desc,addTime desc',V('r'));
		/*echo '<pre>';
var_dump($member_level_list);
echo '</pre>';*/
		TPL :: assign('member_level_list',$member_level_list);
		$this->_display('member/mgr_member_level_list');	
	}
	/*加载修改或添加会员等级页面*/
	function am_member_level(){
		$id	 =	V('r:id');
		TPL :: assign('id',$id);
		$levelInfo	=	DS('mgr/member2.get_user','','xsmart_member_level'," id = '".$id."'");
		TPL :: assign('levelInfo',$levelInfo);
		$this->_display('member/mgr_member_level_am');
	}
	/*保存会员等级信息(更新,添加)*/
	function save_member_level_info(){
		$id		=	V('r:id');
		$data	=	V('p');
		if(!empty($data)){
			if(!empty($id)){
				$data['updateUser']	=	USER::get('screen_name');
				$data['updateTime']	=	time();
				$re	=	DS('mgr/member2.update_user','',$data,'member_level','id',$id);
			}else{
				$data['addUser']	=	USER::get('screen_name');
				$data['addTime']	=	time();
				$re	=	DS('mgr/member2.save_user','',$data,'member_level');
			}
			if($re){
				$this->_succ('操作已成功',array('get_member_level_list&page='.V('r:page',1).''));
			}else{
				$this->_error('操作失败','javascript:history.go(-1);');	
			}	
		}else{
			echo "<script>history.go(-1);</script>";
		}
	}
	/*批量或单个删除会员等级信息方法*/
	function delSome(){
		$re	=	DS('mgr/member2.delSome','','xsmart_member_level',rtrim(V('r:id'),','));
		if($re){
			echo 1;	
		}else{
			echo 0;	
		}
	}
	/*批量或单个更新会员等级信息方法*/
	function updateSome(){
		$re	=	DS('mgr/member2.updateSome','','xsmart_member_level',V('r:state'),rtrim(V('r:id'),','));
		if($re){
			echo 1;	
		}else{
			echo 0;	
		}	
	}
	/*收货地址*/
	function member_receive()
	{
		$this->_display('goods/member_receive');
	}
	/*查看订单*/
	function member_look()
	{
		/*$userid	=	V('r:userid','');
		$userorder	=	DS("mgr/memeber.get_userorder_list",'',$userid);
		TPL :: assign('userorder',$userorder);*/
		
		$this->_display('member/member_look');
	}
	/*订单查询*/
	function member_query()
	{
		
		$this->_display('goods/member_query');
		
	}
	/*查看账户明细*/
	function member_account()
	{
		$this->_display('goods/member_account');
		
	}
	/*调节会员账户*/
	function member_adjust()
	{
		$this->_display('goods/member_adjust');
		
	}
	//批量审核用户
	function up_member(){
	   //var_dump($_GET);die;
	   $userid = $_GET['id'];
	   
	   $page = $_GET['page'];
	   
	   $f_type = $_GET['f_type'];
	   
	   $result = DS('mgr/member2.update_member_more','','audit',$f_type,$userid);
	   
	   if ($result) {
		   
		  $this->_succ('操作已成功', array('memberlist&page='.$page.''));	
		  
	   }else{
		   
		  $this->_error('操作失败', 'javascript:history.go(-1);');
			
	   }
    }
	//批量认证用户
	function up_member2(){
	   //var_dump($_GET);die;
	   $userid = $_GET['id'];
	   
	   $page = $_GET['page'];
	   
	   $f_type = $_GET['f_type'];
	   
	   $result = DS('mgr/member2.update_member_more2','','is_verify',$f_type,$userid);
	   
	   if ($result) {
		   
		  $this->_succ('操作已成功', array('memberlist&page='.$page.''));	
		  
	   }else{
		   
		  $this->_error('操作失败', 'javascript:history.go(-1);');
			
	   }
    }
	/*会员等级*/
	function grade()
	{
		
		$this->_display('goods/grade');
		
	}
	/*添加等级*/
	function add_grade()
	{
		$this->_display('goods/add_grade');
	}
	/*编辑等级*/
	function edit_grade()
	{
		$this->_display('goods/edit_grade');
	}
	
	/*会员注册项*/
	function register()
	{
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		$pagesize 		= (int)V('g:pagesize', 20);
        $count 			= DS("mgr/memeber.get_register_list",'',($page-1)*$pagesize,$pagesize,"count");
		$pager 			= APP :: N('pager');
		$page_param 	= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count["count"], 'linkNumber' => 10);
		$pager 			-> setParam($page_param);
		$register	=	DS('mgr/memeber.get_register_list','',($page-1)*$pagesize,$pagesize,"list");
		TPL :: assign('register',$register);
		TPL :: assign('pager', $pager->makePage());
		$this->_display('member/register');
	}
	
	/*添加注册项*/
	function add_register()
	{
		//获取用户组或者说是角色
		$group=DS("mgr/memeber.goods_group",'');
		TPL::assign("group",$group);
		$this->_display('member/add_register');
	}
	//确认添加注册项
	function addd_register(){
		$uname	=	V('r:uname','');	//会员名称
		$order	=	V('r:order','');	//排序
		$description=V('r:description','');//描述
		if(empty($uname)){
			echo "<script>alert('用户名不能为空');history.go(-1)</script>";
			exit();
		}
		@$register	=	DS('mgr/memeber.get_register_must','',$uname,$order,$description);
		echo "<script>history.go(-1)</script>";
	}
	
	
	/*编辑注册项*/
	function edit_register()
	{
		$id	=	V('r:id' ,''); //获取会员注册项ID
		$edit_register	=	DS('mgr/memeber.get_edit_register','',$id);
		TPL :: assign('editregister',$edit_register);
		$this->_display('member/edit_register');
	}
	
	//确认修改会员注册项
	function editregister(){
		$id		=	V('r:id','');	//获取会员ID
		$order	=	V('r:order','');//排序
		$uname	=	V('r:uname','');//名称
		$description	=	V('r:description','');
		@$editregister	=	DS('mgr/memeber.editregister','',$id,$uname,$order,$description);
		echo "<script>history.go(-2)</script>";
	}
	
	//批量删除会员注册项
	function del_register(){
		$id		=	V('r:id','');	//会员ID
		$page	=	V('r:page','');	//当前页
		@$del_register	=	DS('mgr/memeber.del_register','',$id);
		echo "<script>window.location.href='/admin.php?m=mgr/member2.register&page=".$page."'</script>";
	}
	
	//会员列表修改属性
	function register_state(){
		$id		=	V('r:id','');
		$state	=	V('r:state','');	//启用
		$must	=	V('r:must','');		//必填
		@$register_state	=	DS('mgr/memeber.register_state','',$id,$state,$must);
		echo "<script>history.go(-1)</script>";
	}
	
	//邮件群发
	function email(){
		$email	=	DS('mgr/member2.register_state','');
		TPL :: assign('email',$email);
		$this->_display('member/email');	
	}
	
	//确认发送邮件
	function sendemail(){
		$title	=	V('r:title','');	//标题
		$sendid =	V('r:sendid','');	//用户组名称
		$description=V('r:aaaaa');	//描述
		//判断标题不能为空
		if(empty($title)){
			echo "<script>alert('标题不能为空');window.location.href='/admin.php?m=mgr/member2.email'</script>";
			die();
		}
		if(empty($description)){
			echo "<script>alert('描述不能为空');window.location.href='/admin.php?m=mgr/member2.email'</script>";
			die();
		}
		if(empty($sendid)){
			$emaill	=	DS('mgr/memeber.register_user','');
			foreach($emaill as $k=>$v){
				$test =new mailer("smtp.163.split.netease.com","disneymmjy123@163.com","mmjy321"); 
				$send =$test->send($v['email'],"联系人",$title,"已有客户向你发送一条信息详细请看如下:".$description);
				
			}
			echo "<script>alert('发送成功')</script>";
		}else{
			
			$email	=	DS('mgr/memeber.register_statee','',$sendid);
			foreach($email as $k=>$v){
				$test =new mailer("smtp.163.split.netease.com","disneymmjy123@163.com","mmjy321"); 
				$send =$test->send($v['email'],"联系人",$title,"已有客户向你发送一条信息详细请看如下:".$description);
				
			}
			echo "<script>alert('发送成功')</script>";	
		}	
		echo "<script>window.location.href='/admin.php?m=mgr/member2.email'</script>";
	}
	
	////////////////////////// 用户评论管理 ////////////////////////////////
	/*用户评论*/
	function review()
	{
		$this->_display('goods/review');
	}
	/*回复用户评论*/
	function review_detail()
	{
		$this->_display('goods/review_detail');
	}
	/*评论设置*/
	function review_set()
	{
		$this->_display('goods/review_set');
	}
	////////////////////////// 在线留言管理 ////////////////////////////////
	/*留言列表*/
	function message()
	{
		$this->_display('goods/message');
	}
	/*查看留言*/
	function message_detail()
	{
		$this->_display('goods/message_detail');
	}
	/*留言设置*/
	function message_set()
	{
		$this->_display('goods/message_set');
	}
	/*留言设置*/
	function member_xiadan()
	{
		setcookie("USERID",V("r:userid"),0,"/",$_SERVER['HTTP_HOST']);	
		setcookie("USERNAME",V("r:username"),0,"/",$_SERVER['HTTP_HOST']);	
		echo "<script>location='/index.shop_index'</script>";
	}
	
	
	function up_edm() {
		$email_list	=	$this->get_email();
		
		if($email_list) {
			$num	=	0;
			foreach($email_list as $k=>$re) {
				$info['cid']		=	'3';
				$info['address']	=	$re['email'];
				$info['is_ok']		=	'1';
				$info['addtime']	=	date('Y-m-d H:i:s',time());
				
				$result	=	DS('publics._save','',$info,'email_address');
				if($result) {
					$this->change_edm($re['email']);
					$num++;
				}
			}
		}
		
		if($num==count($email_list)) {
			exit('{"status":"1","info":"同步成功"}');
		} else {
			exit('{"status":"2","info":"'.(count($email_list)-$num).'条数据同步未成功"}');
		}
		
	}
	
	function get_email() {
		$db		=	APP::ADP('db');
		$sql	=	'select DISTINCT(`email`) as email from xsmart_users where `email`!="" and `is_edm`="0" ';
		$data	=	$db->query($sql);
		return $data;		
	}
	
	function change_edm($email) {
		$db		=	APP::ADP('db');
		$sql	=	'update xsmart_users set `is_edm`="1" where `email`="'.$email.'"';
		$db->execute($sql);
	}
	
	function import(){
		
		$class = DS("publics2._get","","linkage","keyid=23");
		TPL :: assign("class",$class);
		
		$role = DS("publics2._get","","role","id > 0");
		TPL :: assign("role",$role);
		 	 	
		$this->_display('member/import');
	}
	
	
	function save_import(){
		
		require_once 'Classes/PHPExcel.php';
		require_once 'Classes/PHPExcel/IOFactory.php';
		require_once 'Classes/PHPExcel/Reader/Excel5.php';
		$url 	= 	V('r:url');
		$sch	=	V('r:sch');
		$rid	=	V('r:rid',8);
		$objReader		=	PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
		$objPHPExcel	=	$objReader->load(WEBSITE_URL.$url);//$file_url即Excel文件的路径
		$sheet			=	$objPHPExcel->getSheet(0);//获取第一个工作表
		$highestRow		=	$sheet->getHighestRow();//取得总行数
		$highestColumn	=	$sheet->getHighestColumn(); //取得总列数
		
		//循环读取excel文件,读取一条,插入一条
		for($j=1;$j<=$highestRow;$j++){//从第一行开始读取数据
 			$str='';
 			for($k='A';$k<=$highestColumn;$k++){            //从A列读取数据
 			//这种方法简单，但有不妥，以'\\'合并为数组，再分割\\为字段值插入到数据库,实测在excel中，如果某单元格的值包含了\\导入的数据会为空       
  				$str.=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'\\';//读取单元格
 			}
 			//explode:函数把字符串分割为数组。
 			$info=explode("\\",$str);
			$data['email']				=	$info['0'];
			$data['username']			=	$info['1'];
			$data['type']				=	$info['2'];
			$data['realname']			=	$info['3'];
			$data['password']			=	md5($info['4']);
			$data['sex']				=	$info['5'];       
			$data['frozen_money']		=	$info['6'];
			$data['introduce']			=	$info['7'];
			$data['orid']				=	$sch;
			$data['roleid']				=	$rid;
			$data['addtime']			=	time();
			$data['uptime']				=	time();  
			$data['audit']				=	1;
			$uinfo = DS("publics2._get","","users","username=".$data['username']);
			if(empty($uinfo)){
				$re = DS("publics2._save","",$data,"users");  	   
			}else{
				$re = DS("publics2._update","",$data,"users","username",$data['username']);	
			}
		}
		$this->memberlist();  
	} 
	
}
?>