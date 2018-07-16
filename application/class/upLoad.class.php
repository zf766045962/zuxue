<?php

/**************************************************
*  Created:  2012-3-13
*
*  swfUpload上传组件
*
*  @Xsmart (C)2006-2099Inc.
*  @Author  赵志强
*
***************************************************/


class upLoad {
	
	/*------------------------------------------------------
		$type 			表示上传类型  img，file
		$upload_id 		表示上传接收控件的id
		$num 			表示是一个页面的第几次引用
		$maxsize 		表示允许上传的大小 单位M
		$uoload_width 	表示上传控件的宽度
		$urlchange 		表示要更改的图片的id
		$isJquery 		表示本页面是否具有jquery
		$w 				缩略图宽度
		$h 				缩略图高度
		$corp 			是否裁切
		$center 		是否是中心裁切
	------------------------------------------------------*/
	function showUpload($type="img",$upload_id="imgurl",$num=1,$value='',$urlchange = '',$maxsize=5,$cut=false,$w=150,$h=150,$upload_width=250,$style='',$isJquery=true)
	{
		$types = "";
		$server = "";
		if($type=="img")
		{
			$types = UPLOAD_IMG;
		}
		else if($type=="file")
		{
			$types = UPLOAD_FILE;
			$server = "2";
		}
		else
		{
			$types = UPLOAD_IMG;
		}
		if($num == 1)
		{	
			
			if(!$isJquery)
			{
				echo "\r\n";
				echo '<script type="text/javascript" src="'.W_BASE_URL_PATH.'js/jquery.min.js"></script>';
			}
			echo "\r\n";
			echo '<script type="text/javascript" src="'.W_BASE_URL_PATH.'js/swfupload/swfupload.js"></script>';
			echo "\r\n";
			echo '<script type="text/javascript" src="'.W_BASE_URL_PATH.'js/swfupload/jquery.swfupload.js"></script>';
		}
		echo "\r\n";
		echo '<script type="text/javascript">';
		echo "\r\n";
		echo '	$(function(){';
		echo "\r\n";
		echo '		$("#swfupload-control'.$num.'").swfupload({';
		echo "\r\n";
		echo '		upload_url: "'.W_BASE_URL_PATH.'application/server/swf_upload'.$server.'.php?cut='.$cut.'&w='.$w.'&h='.$h.'",';
		echo "\r\n";
		echo '		file_size_limit : "'.$maxsize.'000",';
		echo "\r\n";
		echo '		file_types : "'.$types.'",';
		echo "\r\n";
		echo '		file_types_description : "All Files",';
		echo "\r\n";
		echo '		file_upload_limit : "0",';
		echo "\r\n";
		echo '		flash_url : "'.W_BASE_URL_PATH.'js/swfupload/swfupload.swf",';
		echo "\r\n";
		echo '		button_image_url : "'.W_BASE_URL_PATH.'js/swfupload/images/XP.png",';
		echo "\r\n";
		echo '		button_width : 61,';
		echo "\r\n";
		echo '		button_height : 22,';
		echo "\r\n";
		echo '		button_placeholder : $("#swfuploadbutton")[0],';
		echo "\r\n";
		echo '		debug: false,';
		echo "\r\n";
		echo '		img_input : "'.$upload_id.'",';
		echo "\r\n";
		echo '		img_urlcha : "'.$urlchange.'",';
		echo "\r\n";
		echo '		custom_settings : {something : "here"}';
		echo "\r\n";
		echo '	})';
		echo "\r\n";
		echo '	.bind("fileQueued", function(event, file){';
		echo "\r\n";
		echo '		$(this).swfupload("startUpload");';
		echo "\r\n";
		echo '	})';
		echo "\r\n";
		echo '});';
		echo "\r\n";
		echo '</script>';
		echo "\r\n";
		echo '<div id="swfupload-control'.$num.'">';
		echo "\r\n";
		echo '	<input type="text" name="'.$upload_id.'" id="'.$upload_id.'" width="'.$upload_width.'" style="width:'.$upload_width.'px;'.$style.'" value="'.$value.'" />';
		echo "\r\n";
		echo '	<input type="button" id="swfuploadbutton" name="swfuploadbutton" />';
		echo "\r\n";
		echo '</div>';
	}

}

