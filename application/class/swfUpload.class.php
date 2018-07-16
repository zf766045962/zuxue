<?php
/**************************************************
*  Created:  2012-3-13
*
*  swfupload上传
*
*  @Xsmart (C)2006-2099Inc.
*  @Author  赵志强  <wwwzhaozhiqiang@126.com>
*
***************************************************/
class swfUpload
{

	function swfUpload() {
		
	}

	function adp_init($config=array()) {

	}
	//$inputid 	为保存文件地址文本框
	//$maxsize	为上传大小 单位M
	//$type 	上传类型  图片img 文件file
	//$num		为允许同时上传个数
	//$uploadnum为第几个上传按钮
	function showUpload($inputid="imgurl",$maxsize=1,$type="img",$num=1,$uploadnum=1)
	{
		$types = "";
		if($type=="img")
		{
			$types = UPLOAD_IMG;
		}
		else if($type=="file")
		{
			$types = UPLOAD_FILE;
		}
		if($uploadnum==1)
		{
			echo "\r\n";
			echo '<script type="text/javascript" src="'.W_BASE_URL_PATH.'js/swfupload/swfupload.js"></script>';
			echo "\r\n";
			echo '<script type="text/javascript" src="'.W_BASE_URL_PATH.'js/swfupload/swfupload.queue.js"></script>';
			echo "\r\n";
			echo '<script type="text/javascript" src="'.W_BASE_URL_PATH.'js/swfupload/fileprogress.js"></script>';
			echo "\r\n";
			echo '<script type="text/javascript" src="'.W_BASE_URL_PATH.'js/swfupload/handlers.js"></script>';
			echo "\r\n";
		}
		
		echo '<script type="text/javascript">';
		echo "\r\n";
		echo '	var swfu'.$uploadnum.';';
		echo "\r\n";
		echo '	window.onload = function() {';
		echo "\r\n";
		echo '		var settings'.$uploadnum.' = {';
		echo "\r\n";
		echo '			flash_url : "'.W_BASE_URL_PATH.'js/swfupload/swfupload.swf",';
		echo "\r\n";
		echo '			flash9_url : "'.W_BASE_URL_PATH.'js/swfupload/swfupload_fp9.swf",';
		echo "\r\n";
		echo '			upload_url: "'.W_BASE_URL_PATH.'application/function/swf_upload.func.php",';
		echo "\r\n";
		echo '			post_params: {"PHPSESSID" : "'.session_id().'"},';
		echo "\r\n";
		echo '			file_size_limit : "'.$maxsize.' MB",';
		echo "\r\n";
		echo '			file_types : "'.$types.'",';
		echo "\r\n";
		echo '			file_types_description : "All Files",';
		echo "\r\n";
		echo '			file_upload_limit : 100,';
		echo "\r\n";
		echo '			file_queue_limit : '.$num.',';
		echo "\r\n";
		echo '			custom_settings : {';
		echo "\r\n";
		echo '				progressTarget : "fsUploadProgress'.$uploadnum.'",';
		echo "\r\n";
		echo '				resultinput : "'.$inputid.'",';
		echo "\r\n";
		echo '				cancelButtonId : "btnCancel'.$uploadnum.'"';
		echo "\r\n";
		echo '			},';
		echo "\r\n";
		echo '			debug: false,';
		echo "\r\n";
		echo '			// Button settings';
		echo "\r\n";
		echo '			button_image_url: "'.W_BASE_URL_PATH.'js/swfupload/images/xp2.png",';
		echo "\r\n";
		echo '			button_width: "61",';
		echo "\r\n";
		echo '			button_height: "22",';
		echo "\r\n";
		echo '			button_placeholder_id: "spanButtonPlaceHolder'.$uploadnum.'",';
		echo "\r\n";
		echo '			button_text: "<span></span>",';
		echo "\r\n";
		echo '			button_text_style: ".theFont { font-size: 16; }",';
		echo "\r\n";
		echo '			button_text_left_padding: 12,';
		echo "\r\n";
		echo '			button_text_top_padding: 3,';
		echo "\r\n";
		echo '			// The event handler functions are defined in handlers.js';
		echo "\r\n";
		echo '			swfupload_preload_handler : preLoad,';
		echo "\r\n";
		echo '			swfupload_load_failed_handler : loadFailed,';
		echo "\r\n";
		echo '			file_queued_handler : fileQueued,';
		echo "\r\n";
		echo '			file_queue_error_handler : fileQueueError,';
		echo "\r\n";
		echo '			file_dialog_complete_handler : fileDialogComplete,';
		echo "\r\n";
		echo '			upload_start_handler : uploadStart,';
		echo "\r\n";
		echo '			upload_progress_handler : uploadProgress,';
		echo "\r\n";
		echo '			upload_error_handler : uploadError,';
		echo "\r\n";
		echo '			upload_success_handler : uploadSuccess,';
		echo "\r\n";
		echo '			upload_complete_handler : uploadComplete,';
		echo "\r\n";
		echo '			queue_complete_handler : queueComplete	// Queue plugin event';
		echo "\r\n";
		echo '		};';
		echo "\r\n";
		echo '		swfu'.$uploadnum.' = new SWFUpload(settings'.$uploadnum.');';
		echo "\r\n";
		echo '	};';
		echo "\r\n";
		echo '</script>';
		echo "\r\n";
		echo '<div>';
		echo "\r\n";
		echo '	<input type="text" name="'.$inputid.'" id="'.$inputid.'">';
		echo "\r\n";
		echo '	<span id="spanButtonPlaceHolder'.$uploadnum.'" style="vertical-align:top;"></span>';
		echo "\r\n";
		echo '	<div style="display:none;" id="fsUploadProgress'.$uploadnum.'"></div>';
		echo "\r\n";
		echo '	<input id="btnCancel'.$uploadnum.'" type="button" value="取消" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px;" />';
		echo "\r\n";
		echo '</div>';
	}
	
	

}
?>
