<?php
/**************************************************
*  Created:  	2015-01-30
*  LastUpdate:  2015-02-06
*  公共方法
*
*  @Xsmart (C)2015-2099Inc.
*  @Author 陈壹宁 <chenyining@vi163.com>
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
	// 内容截取
	function substrByWidth($str,$width,$end = '...',$x3 = 0){
		return F('u8_title_substr',str_replace('&nbsp;',' ',strip_tags($str)),$width,$end,$x3);
	}
	
	// 匹配img标签src属性值
	function img_src($str){
		$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$str,$match);
		return RST($match[1]);
	}

	// 匹配a标签href属性值
	function file_src($str){
		$pattern = '/href\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^"\'>\s]+))/';
		preg_match_all($pattern,$str,$match);
		return RST($match[1]);
	}
	
	// 附件图片路径
	function img_src2($str){
		$pattern="/<[a|A].*?href=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$str,$match);
		return RST($match[1]);
	}

	//文件大小格式化
	function format_bytes($url) {
		$url = WEBSITE_URL.$url;
		$size = filesize($url);
		$units = array(' B', ' KB', ' MB', ' GB', ' TB');
		for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
		$re = round($size, 2).$units[$i];
		return RST($re);
	}

	//读取xls文件 ,返回数组
	function read_xls($file){
		$data = APP :: N('Spreadsheet_Excel_Reader');
		$data->setOutputEncoding('utf-8');
		$data->read(WEBSITE_URL.$file);
		error_reporting(E_ALL ^ E_NOTICE);
		$data = $data->sheets[0]["cells"];
		return RST($data);
	}
	
	//读取xml数据(文件) ,返回数组
	function read_xml($str,$type='file'){
		$xml	= APP :: N('xmlParse');
		if($type == 'file'){
			$xml->parseFile($str);	
		}else{
			$xml->parseString($str);
		}
		$tree	= $xml->getTree();
		return RST($tree);
	}
	
	//多维数据指定一项排序
	function multi_array_sort($multi_array,$sort_key,$sort=SORT_DESC){
		if(is_array($multi_array)){
			foreach ($multi_array as $row_array){
				if(is_array($row_array)){
					$key_array[] = $row_array[$sort_key];
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
		array_multisort($key_array,$sort,$multi_array);
		return $multi_array;
	}
	
	//获取IP地址
	function getIP() {
		if (@$_SERVER["HTTP_X_FORWARDED_FOR"]) 
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
		else if (@$_SERVER["HTTP_CLIENT_IP"]) 
		$ip = $_SERVER["HTTP_CLIENT_IP"]; 
		else if (@$_SERVER["REMOTE_ADDR"]) 
		$ip = $_SERVER["REMOTE_ADDR"]; 
		else if (@getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		else if (@getenv("HTTP_CLIENT_IP")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
		else if (@getenv("REMOTE_ADDR")) 
		$ip = getenv("REMOTE_ADDR");
		else 
		$ip = "Unknown";
		return RST($ip);
	}
	
	/**
	* 发送模板短信
	*
	* @param   string $to	  接收人手机号，多个用英文逗号分开
	* @param   array  $datas  参数数组
	* @param   int    $tempId 短信模板id
	* @param   string $appId  应用id
	* @param   string $is	  是否已上线
	* 测试Demo  F('publics.sendTemplateSMS','13311131777',array('1234','5'));
	*/
	function sendTemplateSMS($to,$datas,$tempId = 1,$appId = 'aaf98f89493ff1d3014941195f290151',$is = 0){
		$serverIP = $is ? 'app.cloopen.com' : 'sandboxapp.cloopen.com';
		$rest = APP :: N('CCPRestSms',$serverIP,'8883','2013-12-26');
		$rest->setAccount('aaf98f89493ff1d3014941190569014e','a1d7a43322f5409cb765d92c9b6bd661');
		$rest->setAppId($appId);
		$result = $rest->sendTemplateSMS($to,$datas,$tempId);
		if($result != NULL ) {
			return array('errCode'=>$result->statusCode,'errMsg'=>$result->statusMsg);
		}
	}

	/**
	* 将字符串转换为数组
	*
	* @param    string  $data   字符串
	* @param    bool    $isformdata 如果为0，则不使用new_stripslashes处理，可选参数，默认为1
	* @return   array   返回数组格式，如果，data为空，则返回空数组
	*/ 
	function str2arr($data, $isformdata = 1) {
		if($data == '') return array();
		if($isformdata) $data = new_stripslashes($data);
		@eval("\$array = $data;");  
		return $array;  
	}
	/**
	* 将数组转换为字符串
	*
	* @param    array   $data       数组
	* @param    bool    $isformdata 如果为0，则不使用new_stripslashes处理，可选参数，默认为1
	* @return   string  返回字符串，如果，data为空，则返回空
	*/ 
	function arr2str($data, $isformdata = 1) {
		if($data == '') return '';  
		if($isformdata) $data = new_stripslashes($data);
		return addslashes(var_export($data, TRUE));
	}
	
	// 自动创建目录
	function create_folders($dir) {
		return is_dir ( $dir ) or (create_folders ( dirname ( $dir ) ) and mkdir ( $dir, 0777 ));  
	}

	// 复制文件及目录到指定路径
	function xCopy($source, $destination, $child){
		if(!is_dir($source)){
			echo("Error:the $source is not a direction!");
			return RST(0);
		}   
		if(!is_dir($destination)){
			mkdir($destination,0777);
		}
		$handle = dir($source);
		while($entry = $handle->read()) {
			if(($entry!=".")&&($entry!="..")){
				if(is_dir($source."/".$entry)){
					if($child)
						$this->xCopy($source."/".$entry,$destination."/".$entry,$child);
				}else{
					copy($source."/".$entry,$destination."/".$entry);
				}
			}
		}
		return RST(1);
	}

	/*
		文件压缩
		压缩参数：
			$Path 需要压缩的文件或文件夹(文件可为数组)
			$ZipFile 压缩后的zip文件名及存放路径
			$Typ  压缩类型	1 文件夹		2 文件
			$Todo 后续操作	1 压缩后下载 	2 存放在服务器上(默认为/@Upload下)

		压缩文件夹示例：
			Tozip("./","../".date("d-H-i-s").".zip",1,2);
		压缩文件示例：
			$arr = array("../1.txt","../2.txt");
			Tozip($arr ,"../2.zip",2);
			Tozip("././upload", "../../upload.zip",1,1)
	*/
	function Tozip($Path, $ZipFile, $Typ=1, $Todo=2){
		/*if(!is_writeable($ZipFile)){
			exit("文件夹不可写!");
		}*/
		$Path = str_ireplace("\\","/",($Path));
		if(is_null($Path) or empty($Path) or !isset($Path)){
			return false;
		}
		if(is_null($ZipFile) or empty($ZipFile) or !isset($ZipFile)){
			return false;
		}
		$zip = APP :: N("PHPZip");
		if(substr($Path,-1,1) == "/"){
			$Path = substr($Path,0,strlen($Path)-1);
		}
		ob_end_clean();
		switch ($Typ){
			case "1":
				$zip->ZipDir($Path,$ZipFile,$Todo);
				break;
			case "2":
				$zip->ZipFile($Path,$ZipFile,$Todo);
				break;
		}
		if($Todo == 1){
			exit;
		}else{
			return true;
		}
	}
	
	// Curl Post
	function post($url, $data) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$tmpInfo = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Errno : '.curl_error($ch);
			return false;
		}
		curl_close($ch);
		return $tmpInfo;
	}
	
	/**
	* curl模拟登录的post方法
	* @param $url request地址
	* @param $header 模拟headre头信息
	* @return json
	*/
    function curlPost($url,$data,$getHeader=0,$host='mp.weixin.qq.com',$origin='https://mp.weixin.qq.com',$referer='https://mp.weixin.qq.com/') {
		$header = array(
            'Accept:*/*',
            'Accept-Charset:GBK,utf-8;q=0.7,*;q=0.3',
            //'Accept-Encoding:gzip,deflate,sdch',
            'Accept-Language:zh-CN,zh;q=0.8',
            'Connection:keep-alive',
            'Host:'.$host,
            'Origin:'.$origin,
            'Referer:'.$referer,
            'X-Requested-With:XMLHttpRequest'
        );
        $curl = curl_init(); //启动一个curl会话
        curl_setopt($curl, CURLOPT_URL, $url); //要访问的地址
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); //设置HTTP头字段的数组
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); //从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0'); //模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); //使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); //自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); //发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); //Post提交的数据包
        curl_setopt($curl, CURLOPT_COOKIE, $_SESSION['cookie']); //读取储存的Cookie信息
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); //设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, $getHeader); //显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //获取的信息以文件流的形式返回
		curl_setopt($curl, CURLOPT_SSLVERSION, 3);
        $result = curl_exec($curl); //执行一个curl会话
		if (curl_errno($curl)) {
			echo 'Errno : '.curl_error($curl);
			return false;
		}
        curl_close($curl); //关闭curl
        return $result;
    }

	//模拟获取内容函数
	function vget($url,$getHeader=0,$host='mp.weixin.qq.com',$origin='https://mp.weixin.qq.com',$referer='https://mp.weixin.qq.com/'){
		$header = array(
				'Accept:*/*',
				//'Accept-Encoding:gzip,deflate',
				'Accept-Language:zh-CN,zh;q=0.8',
				'Connection:keep-alive',
				'Host:'.$host,
				'Referer:'.$referer,
				'X-Requested-With:XMLHttpRequest'
		);
		$useragent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0';
		
		$curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header); //设置HTTP头字段的数组
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0'); // 模拟用户使用的浏览器
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
		curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
		curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的GET请求
		curl_setopt($curl, CURLOPT_COOKIE, $_SESSION['cookie']); // 读取上面所储存的Cookie信息
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		curl_setopt($curl, CURLOPT_HEADER, $getHeader); // 显示返回的Header区域内容
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
		curl_setopt($curl, CURLOPT_SSLVERSION, 3);
		$tmpInfo = curl_exec($curl); // 执行操作
		if (curl_errno($curl)) {
			echo 'Errno : '.curl_error($curl);
			return false;
		}
		curl_close($curl); // 关闭CURL会话
		return $tmpInfo; // 返回数据
	}