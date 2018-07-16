<?php
/**************************************************
*  Created:  2014-03-03
*
*  会员卡密 控制器
*
*  @Xsmart (C)2014-2099Inc.
*  @Author @@陈壹宁
*
***************************************************/
include('action.abs.php');
include_once $_SERVER["DOCUMENT_ROOT"]."/application/class/page.class.php";	//引用分页类
class payCard_mod extends action {
		
/*************
*  tpl显示   *
*************/

	//设  置
	function setting(){
		$db 	= APP :: ADP('db');
		$info 	= $db->get(1,'paycard_setting','id');
		TPL :: assign('info',$info);
		$this->_display('payCard/setting');
	}
	
	function save_setting(){
		$db 	= APP :: ADP('db');
		$rs 	= $db->save(V('p'),1,'paycard_setting','id');
		if ($rs) {
			$this->_succ('操作已成功', array('setting'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}

	//生成卡密
	function cardAdd(){
		$db 	= APP :: ADP('db');
		$info 	= $db->get(1,'paycard_setting','id');
		TPL :: assign('info',$info);
		$this->_display('payCard/cardAdd');
	}
	
	function save_cardAdd(){
		extract($_POST);
		$_POST['addtime'] = date('Y-m-d H:i:s');
		unset($_POST['places']);
		unset($_POST['isOldPsw']);
		unset($_POST['kaStyle']);
		$db = APP :: ADP('db');
		$pid = $db->save($_POST,'','paycard_log','');
		$max = $db->getOne('SELECT max(id) FROM `xsmart_paycard`;');
		$str = '1234567890abcdefghijklmnopqrstuvwxyz';
		for($n = 0 ; $n < $num ; $n++){
			if($kaStyle == 0){
				$number = $prefix.uniqid().$str{mt_rand(0,35)};	
			}else{
				$number = $prefix.sprintf("%09d",$max);
			}

			$psw	= '';
			if($isOldPsw == 1){
				for($i=0;$i<6;$i++){
					$psw   .= $str{mt_rand(0,35)};
				}
				$psw = strtoupper($psw);
			}else{
				$psw = uniqid();
				if($isLetter == 1){
					$balance 	= $places - 13;
					for($i=0;$i<$balance;$i++){
						$psw   .= $str{mt_rand(0,35)};
					}
				}
		
				if($isLetter == 0){
					$psw 		= preg_replace("/[a-zA-Z]+/",'',$psw);
					$balance 	= $places - strlen($psw);
					for($i=0;$i<$balance;$i++){
						$psw   .= rand(0,9);
					}
				}
		
				$psw = str_shuffle($psw);
				
				if($isUpper == 1){
					$psw = strtoupper($psw);
				}
				if($isMD5 == 1){
					$psw = md5($psw);
				}
			}
			$data = array(
				'pid'		=> $pid,
				'classid'	=> $classid,
				'title'		=> $title,
				'number'	=> $number,
				'password'	=> $psw,
				'face_value'=> $face_value,
				'card_price'=> $face_value,
				'startDate'	=> $startDate,
				'endDate'	=> $endDate,
				//'card_type'	=> $card_type,
				'addtime'	=> time()//date('Y-m-d H:i:s')
			);
			if($isQRcode == 1){
				$check 		= strtotime($startDate).'-'.strtotime($endDate);
				$string		= $QRcode_http.'&n='.base64_encode($psw).'&check='.$check;
				//$qrcode =  $this->qrcode(400,400,$string);
				$qrcodeURL 	= $this->generateQRfromGoogle($string);
				$imageInfo 	= $this->downloadImageFromWeiXin($qrcodeURL);
				$imgUrl 	= '/var/qrcode/'.date('Y').'/'.date('m').'/';
				$this->create_folders(WEBSITE_URL.$imgUrl);
				$filename 	= $imgUrl.date('d').'_'.date('His').rand(0,9).'.jpg';
				$local_file = fopen(WEBSITE_URL.$filename, 'w');
				if ($local_file !== false){
					if (fwrite($local_file, $imageInfo["body"]) !== false) {
						$data['QRcode'] = $filename;
						fclose($local_file);
					}
				}
			}
			//var_dump($data);die;
			$max = $db->save($data,'','paycard','');
		}
		$this->_succ('操作已完成', array('cardList'));
	}
	
	//卡密列表
	function cardList(){
		$where = '1=1';
		if(V('g:pid',0) != 0){
			$where .= " and pid = ".V('g:pid');
		}
		/*if(V('g:card_type','') != ''){
			$where .= " and card_type = '".V('g:card_type')."'";
		}*/
		if(V('g:classid',0) != 0){
			$where .= " and classid = ".V('g:classid');
		}
		if(V('g:face_value','') != ''){
			$where .= ' and face_value = '.V('g:face_value');
		}
		if(V('g:title','') != ''){
			$where .= " and title like '%".V('g:title')."%'";
		}
		if(V('g:number','') != ''){
			$where .= " and number like '%".V('g:number')."%'";
		}
		if(V('g:password','') != ''){
			$where .= " and password like '%".V('g:password')."%'";
		}
		if(V('g:is_use',2) != 2){
			$where .= ' and is_use = '.V('g:is_use');
		}
		$pagesize = 100;
		if(isset($_GET['page'])){
			$offset = (V('g:page')-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		//var_dump($where);
		$total = DS('mgr/payCard.total','',$where);
		$result['info'] = DS('mgr/payCard.get_payCard','',$where,$limit);

		$m = V('g:m');
		unset($_GET['page']);
		$url = "?".http_build_query($_GET)."&page={page}";
		$page = new RewritePage($total,$pagesize,V('g:page'),$url);
		$result['pagehtml'] = $page -> myde_write();
		TPL :: assign('result',$result);
		
		$db 	= APP :: ADP('db');
		$setting = $db->get(1,'paycard_setting','id');
		TPL :: assign('setting',$setting);
		
		$this->_display('payCard/cardList');
	}
	
	//生成记录
	function kaList(){
		$where = '1=1';
		//var_dump($where);
		$pagesize = 50;
		if(isset($_GET['page'])){
			$offset = (V('g:page')-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		
		$total = DS('mgr/payCard.get_total','','xsmart_paycard_log',$where);
		$db  = APP :: ADP('db');
		$sql = 'select * from xsmart_paycard_log where '.$where.' order by id desc limit '.$limit;
		$info = $db->query($sql);
		TPL :: assign('info',$info);
		
		$m = V('g:m');
		unset($_GET['page']);
		$url = "?".http_build_query($_GET)."&page={page}";
		$page = new RewritePage($total,$pagesize,V('g:page'),$url);
		$pagehtml = $page -> myde_write();
		TPL :: assign('pagehtml',$pagehtml);
		
		$this->_display('payCard/kaList');
	}
	
	function editka(){
		$db 	= APP :: ADP('db');
		$info 	= $db->query('select * from xsmart_paycard_log where id = '. V('r:id'));
		TPL :: assign('info',$info[0]);
		$this->_display('payCard/editka');
	}
	function editka_save(){
		$rs = DS('publics._update','',V('p'),'paycard_log','id',V('r:id'));
		if ($rs){
			unset($_POST['id']);
			$rs = DS('publics._update','',$_POST,'paycard','pid',V('r:id'));
			if($rs)
				$this->_succ('操作已成功',array('kaList'));
		}
		$this->_error('操作失败', array('editka'));
	}
	
	function delCard(){
		$id = V("g:id");
		if(intval($id)){
			$db = APP :: ADP('db');
			$rs = $db->delete($id,'paycard','id');
			if ($rs){
				$this->_succ('操作已成功',array('cardList'));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
	}
	
	function delCardLog(){
		$id = V("g:id");
		if(intval($id)){
			$db = APP :: ADP('db');
			$rs = $db->delete($id,'paycard_log','id');
			if ($rs){
				$rs = $db->delete($id,'paycard','pid');
				$this->_succ('操作已成功',array('kaList'));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
	}

	//ajax 修改属性
	function updAttr(){
		extract($_POST);
		$val 	= substr($type,-1,1);
		$field 	= substr($type,0,-1);
		$rs 	= $field.'='.$val;
		$db 	= APP :: ADP('db');
		$sql	= "update $table set ".$rs." where id=$id";
		echo $db->execute($sql);
	}
	
	//导出数据
	function export(){
		$where = '1=1';
		if(V('g:pid',0) != 0){
			$where .= " and pid = ".V('g:pid');
		}
		/*if(V('g:card_type','') != ''){
			$where .= " and card_type = '".V('g:card_type')."'";
		}*/
		if(V('g:classid',0) != 0){
			$where .= " and classid = ".V('g:classid');
		}
		if(V('g:face_value','') != ''){
			$where .= ' and face_value = '.V('g:face_value');
		}
		if(V('g:title','') != ''){
			$where .= " and title like '%".V('g:title')."%'";
		}
		if(V('g:number','') != ''){
			$where .= " and number like '%".V('g:number')."%'";
		}
		if(V('g:password','') != ''){
			$where .= " and password like '%".V('g:password')."%'";
		}
		$is_use = '全部';
		if(V('g:is_use',2) != 2){
			$where .= ' and is_use = '.V('g:is_use');
			$is_use = V('g:is_use',2) == 1 ? '已使用' : '未使用';
		}
		
		$db = APP :: ADP('db');
		$sql = "select title,number,password,face_value,is_use,endDate,QRcode from xsmart_paycard where ".$where;
		$data = $db->query($sql);

		$file_name = date('Ymd').'-'.V('g:title','').'-'.$is_use;
		$table_data = '
			<table border="1">
				<th>名称</th>
				<th>卡号</th>
				<th>卡密</th>
				<th>面值</th>
				<th>是否使用</th>
				<th>有效期至</th>
				<th>二维码</th>
		';
		header('Content-Type: text/xls');
		header("Content-type:application/vnd.ms-excel;charset=utf-8");
		$str = mb_convert_encoding($file_name, 'gbk', 'utf-8');   
		header('Content-Disposition: attachment;filename="' .$str . '.xls"');
		header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
		header('Expires:0');
		header('Pragma:public');
		foreach ($data as $line){
			$table_data .= '<tr>';
			foreach ($line as $key => &$item){
				//$item = mb_convert_encoding($item, 'GBK', 'utf-8');
				if($key == 'is_use'){
					$item = $item == 1 ? '已使用' : '未使用';
				}
				if($item == ''){
					$item = '未填';
				}
				if($key == 'password'){
					$table_data .= '<td style="text-align:center; vnd.ms-excel.numberformat:@">' . $item . '</td>';
				}else if($key == 'QRcode' && $item != ''){
					$table_data .= '<td style="text-align:center;" width="50" height="50"><img src="'.LOCALHOST_URL_WEB.$item.'" width="50" height="50"></td>';
				}else{
					$table_data .= '<td style="text-align:center;">' . $item . '</td>';
				}
			}
			$table_data .= '</tr>';
		}
		$table_data .='</table>';
		echo $table_data;
		exit;
	}
	
	/**
	 * google api 二维码生成【QRcode可以存储最多4296个字母数字类型的任意文本，具体可以查看二维码数据格式】
	 * @param string $data 二维码包含的信息，可以是数字、字符、二进制信息、汉字。不能混合数据类型，数据必须经过UTF-8 URL-encoded.如果需要传递的信息超过2K个字节，请使用POST方式
	 * @param int $widhtHeight 生成二维码的尺寸设置
	 * @param string $EC_level 可选纠错级别，QR码支持四个等级纠错，用来恢复丢失的、读错的、模糊的、数据。
	 *                         L-默认：可以识别已损失的7%的数据
	 *                         M-可以识别已损失15%的数据
	 *                         Q-可以识别已损失25%的数据
	 *                         H-可以识别已损失30%的数据
	 * @param int $margin 生成的二维码离图片边框的距离
	 */
	function generateQRfromGoogle($data,$widhtHeight='430',$EC_level='L',$margin='1'){
		return 'http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.urlencode($data);
	}
	
	function qrcode($width,$height,$string){
		$post_data			= array();
		$post_data['cht'] 	= 'qr';
		$post_data['chs']	= $width."x".$height;
		$post_data['chl']	= $string;
		$post_data['choe']	= "UTF-8";
		$url				= "http://chart.apis.google.com/chart";
		$data_Array			= array();
		foreach($post_data as $key=>$value){
			$data_Array[]	= $key.'='.$value;
		}
		$data	= implode("&",$data_Array);
		$ch		= curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		//$result = "<img src =\"data:image/png;base64,".base64_encode($result)."\" >";
		return $result;
	}

	function create_folders($dir) {
    	return is_dir ( $dir ) or ($this->create_folders ( dirname ( $dir ) ) and mkdir ( $dir, 0777 ));  
	}
	
	function downloadImageFromWeiXin($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);    
		curl_setopt($ch, CURLOPT_NOBODY, 0);	//只取body头
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$package = curl_exec($ch);
		$httpinfo = curl_getinfo($ch);
		curl_close($ch);
		return array_merge(array('body' => $package), array('header' => $httpinfo)); 
	}
	//导入邮箱地址
	/*function save_import(){
		extract($_POST);
		$str = @file_get_contents('http://'.$_SERVER["HTTP_HOST"].$url);//WEBSITE_URL
		if(preg_match('/200/',$http_response_header[0])){
			$arr = explode('<br />',nl2br($str));
			foreach($arr as $key=>$val){
				if(trim($val) != ''){
					$data .= "(".$cid.",'".trim($val)."',1,'".date('Y-m-d H:i:s')."'),";
				}
			}
			$sql = 'INSERT INTO xsmart_email_address (`cid`,`address`,`is_ok`,`addtime`) VALUES'.$data;
			$db = APP :: ADP('db');
			if($db->execute(substr($sql,0,-1))){
				echo 1;
			}else{
				echo 2;
			}
		}else{
			echo 2;
		}
	}*/
	
	// 测试 更新数量
	/*function testUpd(){
		$db 	= APP :: ADP('db');
		$info 	= $db->query('select id from xsmart_paycard_log');
		if(!empty($info)){
			foreach($info as $key=>$val){
				$sql = 'select count(*) as num from xsmart_paycard where pid = '.$val['id'];
				$rs = $db->query($sql);
				$sql2 = 'update xsmart_paycard_log set num = '.$rs[0]['num'].' where id = '.$val['id'];
				$db->execute($sql2);
			}
		}
	}*/
	
}
