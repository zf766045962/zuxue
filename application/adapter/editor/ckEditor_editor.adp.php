<?php
/**************************************************
*  Created:  2010-06-08
*
*  ckeditor操作
*
*  @Xsmart (C)2006-2099Inc.
*  @Author  liu
*
***************************************************/
include_once(P_ROOT."/editor/ckeditor/ckeditor.php");
class ckEditor_editor
{

	function ckEditor() {
		
	}

	function adp_init($config=array()) {

	}
	function showEditor($arr){
	

			$Text	=	isset($arr['Text'])?$arr['Text']:'';
			$css	=	isset($arr['css'])&& !($arr['css']=='')?$arr['css']:W_BASE_URL_PATH.'application/editor/ueditor/themes/default/iframe.css';
			$ID		=	isset($arr['ID'])?$arr['ID']:'Editor1';
			$EditorBodyStyle	=	isset($arr['EditorBodyStyle'])?$arr['EditorBodyStyle']:'font:normal 12px arial;';//默认样式
			


			$initialValue = $Text;
			$CKEditor = new CKEditor();
			$CKEditor->basePath = W_BASE_URL_PATH.'application/editor/ckeditor/';
			$CKEditor->editor("editor1", $initialValue);

	}
	
	

}
?>
