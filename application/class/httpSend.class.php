<?php
class httpSend  {

	function getSend($url,$param)
	{
		$ch = curl_init($url."?".$param);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ;
		
		$output = curl_exec($ch);
		
		return $output;	
	}
	
	function postSend($url,$param){
	
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	function gbkToUtf8($str)
	{
		return rawurlencode(iconv('GB2312','UTF-8',$str));	
	}

}
?>