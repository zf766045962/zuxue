<?php
include('action.abs.php');

class attachment_mod extends action{
	function attachment_mod(){
		parent :: action();
	}

	function album_list(){
	
		$aid='';
		$count=DR('common/attachmentCom.getAttachmentCount','',$aid);

		$page = (int)V('g:page', 1);
		$each = (int)V('g:each', 15);
		$offset = ($page -1) * $each;
		$num = ($page -1) * $each;
		$id = V('g:id', '');
		$pager = APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $each, 'recordCount' => $count['rst'], 'linkNumber' => 10);
		$pager->setParam($page_param);
		
		$rs=DS('common/attachmentCom.getAttachmentByAlbum','',$aid,$offset,$each);

		TPL :: assign('pager', $pager->makePage());

		TPL::assign('infos',$rs);
		TPL::assign('show_dialog',1);
	 	$this->_display('attachments/album_list');
	
	}

//裁剪图片
	function crop() {
	
		$picurl='http://localhost/phpcms_v9_UTF8/uploadfile/2011/1214/20111214054302974.jpg';
		$picurl=V('r:picurl');
		TPL::assign('picurl',$picurl);
		
	 	$this->_display('attachments/crop');
	
	}	
	
	
	//保存裁剪图片
	
	public function crop_upload() {	
	
		if (isset($GLOBALS["HTTP_RAW_POST_DATA"])) {

			$pic = $GLOBALS["HTTP_RAW_POST_DATA"];
			
			if (isset($_GET['width']) && !empty($_GET['width'])) {
				$width = intval($_GET['width']);
			}
			if (isset($_GET['height']) && !empty($_GET['height'])) {
				$height = intval($_GET['height']);
			}
			if (isset($_GET['file']) && !empty($_GET['file'])) {
				//if(is_image($_GET['file'])== false ) exit();
				$uploadObj = APP::ADP('upload');
				$savepath = P_URL_UPLOAD.'/pic/';
				$file_path=$uploadObj->setPath();
				
				if (strpos($_GET['file'], W_BASE_HTTP.W_BASE_URL_PATH)!==false) {
					$file = $_GET['file'];
					$basename = basename($file);
					if (strpos($basename, 'thumb_')!==false) {
						$file_arr = explode('_', $basename);
						$basename = array_pop($file_arr);
					}
					$fileNewName = 'thumb_'.$width.'_'.$height.'_'.$basename;
				} else {
					//pc_base::load_sys_class('attachment','',0);
					$module = V('g:module');
					$catid = V('g:catid');
					$siteid = 0;
					//$attachment = new attachment($module, $catid, $siteid);
					$uploadedfile['filename'] = basename($_GET['file']); 
					$uploadedfile['fileext'] = $this->fileext($_GET['file']);
					if (in_array($uploadedfile['fileext'], array('jpg', 'gif', 'jpeg', 'png', 'bmp'))) {
						$uploadedfile['isimage'] = 1;
					}
					$fileNewName = $uploadObj->setFilename();
					$fileNewName=$fileNewName.'.'.$uploadedfile['fileext'];
				//	$uploadObj->upload('Filedata',$fileName);
					
					
				//	$file_path = $this->upload_path.date('Y/md/');
				//	pc_base::load_sys_func('dir');
				//	dir_create($file_path);
				//	$new_file = date('Ymdhis').rand(100, 999).'.'.$uploadedfile['fileext'];
				//	$uploadedfile['filepath'] = date('Y/md/').$new_file;
				//	$aid = $attachment->add($uploadedfile);
				}
				//$filepath = date('Y/md/');
				file_put_contents($savepath.$file_path.$fileNewName, $pic);
			} else {
				//return false;
			}
			//echo pc_base::load_config('system', 'upload_url').$filepath.$new_file;
		//	$uploadObj->upload('Filedata',$fileName);
			echo W_BASE_HTTP.W_BASE_URL_PATH.$savepath.$file_path.$fileNewName;
			//echo $rst['webpath'];
			exit;
			
			
			$fileName=$path.$fileNewName;
			$uploadObj->upload('file',$fileName);
			$rst = $uploadObj->getUploadFileInfo();
			
			echo $rst['webpath'];
			exit;			
			
		}
					
					
	}			


	function swfupload() {
		if(isset($_POST['dosubmit']) ||(1==0)){
/*			if(isset($_POST['SWFUPLOADSESSID']))		$_COOKIE['SWFUPLOADSESSID'] = $_POST['SWFUPLOADSESSID'];
			

			$rst=array(
				'webpath'=>'tt',
				'savename'=>'xxxx',
			);
			$isimage=1;
			//echo 'aaa';
				echo $rst.','.$rst['webpath'].','.$isimage.','.$rst['savename'];
			exit;

		//if(V('p:_PHPSESSID'));
		session_id($_POST["SWFUPLOADSESSID"]);
		exit;
			if (isset($_POST["SWFUPLOADSESSID"])) {
				session_id($_POST["SWFUPLOADSESSID"]);
			}
			if (isset($_POST["SWFUPLOADSESSID"])) {
				session_id($_POST["SWFUPLOADSESSID"]);
			}
			
			echo session_id($_POST["SWFUPLOADSESSID"]);
			exit;
	*/	

			if( $_POST['swf_auth_key'] != md5(AUTH_KEY.$_POST['SWFUPLOADSESSID']) || ($_POST['isadmin']==0 )) exit();

			$originalName=$_FILES['Filedata']['name'];
			$uploadObj = APP::ADP('upload');
			$fileNewName = $uploadObj->setFilename();
			$path=$uploadObj->setPath();
			$fileName=$path.$fileNewName;
			$uploadObj->upload('Filedata',$fileName);
			$rst = $uploadObj->getUploadFileInfo();
			if ($rst['errcode'] != 0) {
				APP::ajaxRst(false, 40002, $rst['errmsg']); exit;
			}else{
			
				$isimage=1;
				
				$uid=USER::Uid();
				$type='img';
				$album=DS('common/attachmentCom.AlbumList','',$uid,$type);
				if($album){
					$albumid=$album[0]['id'];
				}else{
					$albumid=$this->saveAlbum('','img');
				}
				$param=array(
					'originalname'	=>	$originalName	,
					'filename'	=>	$fileNewName.'.'.$rst['extension']	,
					'filepath'	=>	$rst['savepath']	,
					'webpath'	=>	$rst['webpath']		,
					'filesize'	=>	$rst['filesize']	,
					'fileext'	=>	$rst['extension']	,
					'albumid'	=>	$albumid	,
					'filetype'	=>	'img'	,
				);

				$this->saveAttachment($param);
				echo $rst.','.$rst['webpath'].','.$isimage.','.$rst['savename'];


			}
			
		}else{
		
			$this->_display('attachments/swfupload');

		
		}

}
	



	//保存专辑
	function saveAlbum($data,$type){
	
			if(is_array($data)){
				
			
			}else{
				
				$keys = array(
					'album_name'=>$this->setAlbumName($type),
					'user_id'=>USER::uid(),
					'album_info'=>'',
					'add_time'=>APP_LOCAL_TIMESTAMP,
					'status'=>0,
					'tag'=>'',
					'album_type'=>$type,
				);
			
				$albumid=DS('common/attachmentCom.saveAlbum','','',$keys)	;
				return $albumid;			
			}

	
	}
	
	function setAlbumName($type='img'){
		switch ($type) { 
			case 'img': 
				return '默认相册';
			case 'video': 
				return '默认视频专辑';
			case 'doc': 
				return '默认文档资料';
			case 'soft': 
				return '默认其他资料';
		
		}
	
	
	}
	//保存附件
	function saveAttachment($param){
	
		$data= array(	
			'app'	=>	'article'	,
			'catid'	=>	'0'	,
			'originalname'	=>	''	,
			
			'filename'	=>	''	,
			'filepath'	=>	''	,
			'filesize'	=>	'0'	,
			'fileext'	=>	'0'	,
			'albumid'	=>	'0'	,
			'filetype'	=>	'img'	,
			'isthumb'	=>	'0'	,
			'downloads'	=>	'0'	,
			'userid'	=>	USER::Uid()	,
			'uploadtime'=>	APP_LOCAL_TIMESTAMP	,
			'uploadip'	=>	 F('get_client_ip')	,
			'status'	=>	'0'	,
			'authcode'	=>	md5($param['filesize'])	,
			'siteid'	=>	'0'	,
		);
		
		foreach ($data as $k=>$v) {
			if (isset($param[$k])) {
				$data[$k] = $param[$k];
			}
		}
		$aid=DS('common/attachmentCom.saveAttachment','',$data)	;

		return $aid;			


	}

	/**
	 * 设置upload上传的json格式cookie
	 */
	 function upload_json($aid,$src,$filename) {
		$arr['aid'] = intval($aid);
		$arr['src'] = trim($src);
		$arr['filename'] = urlencode($filename);
		$json_str = json_encode($arr);
		$att_arr_exist = param::get_cookie('att_json');
		$att_arr_exist_tmp = explode('||', $att_arr_exist);
		if(is_array($att_arr_exist_tmp) && in_array($json_str, $att_arr_exist_tmp)) {
			return true;
		} else {
			$json_str = $att_arr_exist ? $att_arr_exist.'||'.$json_str : $json_str;
			param::set_cookie('att_json',$json_str);
			return true;			
		}
	}
	
	/**
	 * 设置swfupload上传的json格式cookie
	 */
	 function swfupload_json() {
		$arr['aid'] = intval($_GET['aid']);
		$arr['src'] = trim($_GET['src']);
		$arr['filename'] = urlencode($_GET['filename']);
		$json_str = json_encode($arr);
		$att_arr_exist = param::get_cookie('att_json');
		$att_arr_exist_tmp = explode('||', $att_arr_exist);
		if(is_array($att_arr_exist_tmp) && in_array($json_str, $att_arr_exist_tmp)) {
			return true;
		} else {
			$json_str = $att_arr_exist ? $att_arr_exist.'||'.$json_str : $json_str;
			param::set_cookie('att_json',$json_str);
			return true;			
		}
	}
	
	/**
	 * 删除swfupload上传的json格式cookie
	 */	
	 function swfupload_json_del() {
		$arr['aid'] = intval($_GET['aid']);
		$arr['src'] = trim($_GET['src']);
		$arr['filename'] = urlencode($_GET['filename']);
		$json_str = json_encode($arr);
		$att_arr_exist = param::get_cookie('att_json');
		$att_arr_exist = str_replace(array($json_str,'||||'), array('','||'), $att_arr_exist);
		$att_arr_exist = preg_replace('/^\|\|||\|\|$/i', '', $att_arr_exist);
		param::set_cookie('att_json',$att_arr_exist);
		
		
	}	


	/**
	 * flash上传初始化
	 * 初始化swfupload上传中需要的参数
	 * @param $module 模块名称
	 * @param $catid 栏目id
	 * @param $args 传递参数
	 * @param $userid 用户id
	 * @param $groupid 用户组id
	 * @param $isadmin 是否为管理员模式
	 */
	function initupload($module, $catid,$args, $userid, $groupid = '8', $isadmin = '0'){
		$grouplist = getcache('grouplist','member');
		if($isadmin==0 && !$grouplist[$groupid]['allowattachment']) return false;
		extract(getswfinit($args));
		$siteid = get_siteid();
		$site_setting = get_site_setting($siteid);
		$file_size_limit = $site_setting['upload_maxsize'];
		$sess_id = SYS_TIME;
		$swf_auth_key = md5(pc_base::load_config('system','auth_key').$sess_id);
		$init =  'var swfu = \'\';
		$(document).ready(function(){
		swfu = new SWFUpload({
			flash_url:"'.JS_PATH.'swfupload/swfupload.swf?"+Math.random(),
			upload_url:"'.APP_PATH.'index.php?m=attachment&c=attachments&a=swfupload&dosubmit=1",
			file_post_name : "Filedata",
			post_params:{"SWFUPLOADSESSID":"'.$sess_id.'","module":"'.$module.'","catid":"'.$_GET['catid'].'","userid":"'.$userid.'","siteid":"'.$siteid.'","dosubmit":"1","thumb_width":"'.$thumb_width.'","thumb_height":"'.$thumb_height.'","watermark_enable":"'.$watermark_enable.'","filetype_post":"'.$file_types_post.'","swf_auth_key":"'.$swf_auth_key.'","isadmin":"'.$isadmin.'","groupid":"'.$groupid.'"},
			file_size_limit:"'.$file_size_limit.'",
			file_types:"'.$file_types.'",
			file_types_description:"All Files",
			file_upload_limit:"'.$file_upload_limit.'",
			custom_settings : {progressTarget : "fsUploadProgress",cancelButtonId : "btnCancel"},
	 
			button_image_url: "",
			button_width: 75,
			button_height: 28,
			button_placeholder_id: "buttonPlaceHolder",
			button_text_style: "",
			button_text_top_padding: 3,
			button_text_left_padding: 12,
			button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor: SWFUpload.CURSOR.HAND,

			file_dialog_start_handler : fileDialogStart,
			file_queued_handler : fileQueued,
			file_queue_error_handler:fileQueueError,
			file_dialog_complete_handler:fileDialogComplete,
			upload_progress_handler:uploadProgress,
			upload_error_handler:uploadError,
			upload_success_handler:uploadSuccess,
			upload_complete_handler:uploadComplete
			});
		})';
		return $init;
	}		


function fileext($filename) {
	return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
}

	

}
?>