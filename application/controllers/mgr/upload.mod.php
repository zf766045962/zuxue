<?php
include('action.abs.php');

class upload_mod extends action{
	
	function uupload(){
		include('application/class/upload.class.php');
		$data['allowed_types']=V('r:types');
		$data['upload_path']=V('r:folders');
			
		
		$data['nametype']=V('r:nametype');
		
		if($data['allowed_types']!='jpg|gif|jpeg|png')
			$data['flag']="1";
		$obj=new upload($data);
		
		$aa=$obj->do_upload('upfile');
		
		$path=$obj->get_path().$aa;
		$arr=explode('../',$path);
		$path=$arr[1];
		
		if(V('r:water')=="" || V('r:water')!=0)
		{
			$this->setwaterpic($path);
			//echo "you".V('r:water',1);
		}else
		{
			//echo "wu".V('r:water',1);	
		}
		//exit;
		
		//$this->setwaterpic($path);
		$field=V('r:field');
	    echo "<script language=\"javascript\">parent.document.getElementById('".$field."').value='/".$path."';</script>";
		
		
		TPL :: assign('water',V('r:water'));
		TPL :: assign('field',$field);
		TPL :: assign('path',$path);
		TPL :: assign('value',$value);	
		TPL :: assign('types',$data['allowed_types']);
		TPL :: assign('folders',$data['upload_path']);
		TPL :: assign('nametype',$data['nametype']);
		$this->_display('upload/upload');
		}
		
	function iframe(){
		
		
		
		$field=V('r:field');
		$water=V('r:water');
		$value=V('r:value');
		
		
		$types=V('r:types');
		if($types=='' || $types==0)
			$types="jpg|gif|jpeg|png";//默认图片格式
		else if($types==1){
			$types="txt|doc|docx|xls|zip|rar|pdf";//文本格式
		}elseif($types==2){
			$types="jpg|gif|jpeg|png|swf";//图片和flash文件
		}
		
		$folders=V('r:folders');//文件夹名称
		
		if($folders=='')
			$folders='pic';//默认图片文件夹

		$nametype=V('r:nametype');   //$filename=0 默认名称; 1上传的名称； 2 时间戳名称
		//var_dump($nametype);
		if($nametype==0 || $nametype=='')
			$nametype=0;
		TPL :: assign('value',$value);	
	    TPL :: assign('water',$water);
		TPL :: assign('field',$field);
		TPL :: assign('types',$types);
		TPL :: assign('folders',$folders);
		TPL :: assign('nametype',$nametype);
		
		$this->_display('upload/upload');
		}
	
	
	
	function setwaterpic($image){//给图片加水印
	error_reporting(0);
		$image=trim($image);
		if($image){
			$img=getimagesize($image);
			switch($img[2]){
				case 1:$im=@imagecreatefromgif($image);break;
				case 2:$im=@imagecreatefromjpeg($image);break;
				case 3:$im=@imagecreatefrompng($image);break;
			}
			$ii=DR('mgr/waterpic.get');
			$ing=getimagesize($ii);
			switch($ing[2]){
				case 1:$in=@imagecreatefromgif($ii);break;
				case 2:$in=@imagecreatefromjpeg($ii);break;
				case 3:$in=@imagecreatefrompng($ii);break;
			}
			imagecopy($im,$in,$img[0]-$ing[0]-5,$img[1]-$ing[1]-5,0,0,$ing[0],$ing[1]);
			imagejpeg($im,$image);
		}
	}
	
}
?>