<?php
/**************************************************
*  Created:  2010-06-08
*
*  文件IO操作
*
*  @Xsmart (C)2006-2099Inc.
*  @Author  liu
*
***************************************************/
include_once(P_ROOT."/editor/cuteeditor/cuteeditor_files/include_CuteEditor.php");
class kindEditor_editor
{

	function kindEditor() {
		
	}

	function adp_init($config=array()) {

	}
	function showEditor($arr){
	
			$nextline='';
	
			$Text	=	isset($arr['Text'])?$arr['Text']:'';
			$css	=	isset($arr['css'])&& !($arr['css']=='')?$arr['css']:W_BASE_URL_PATH.'application/editor/ueditor/themes/default/iframe.css';
			$ID		=	isset($arr['ID'])?$arr['ID']:'Editor1';
			$EditorBodyStyle	=	isset($arr['EditorBodyStyle'])?$arr['EditorBodyStyle']:'font:normal 12px arial;';//默认样式
			
		echo '<script charset="utf-8" src="'.W_BASE_URL_PATH.'application/editor/kindeditor/kindeditor-min.js"></script>';
		echo '<script charset="utf-8" src="'.W_BASE_URL_PATH.'application/editor/kindeditor/lang/zh_CN.js"></script> ';
		echo '<script>';
		echo "	var editor;";
		echo "	KindEditor.ready(function(K) {";
		echo "		editor = K.create('textarea[name=\"content\"]', {";
		echo "			allowFileManager : true";
		echo "		});";
		
/* 		
		echo "		K('input[name=getHtml]').click(function(e) {";
		echo "			alert(editor.html());";
		echo "		});";
		echo "		K('input[name=isEmpty]').click(function(e) {	";
		echo "			alert(editor.isEmpty());	";
		echo "		});	";
		echo "		K('input[name=getText]').click(function(e) {	";
		echo "			alert(editor.text());	";
		echo "		});	";
		echo "		K('input[name=selectedHtml]').click(function(e) {	";
		echo "			alert(editor.selectedHtml());	";
		echo "		});	";
		echo "		K('input[name=setHtml]').click(function(e) {	";
		echo "			editor.html('<h3>Hello KindEditor</h3>');	";
		echo "		});	";
		echo "		K('input[name=setText]').click(function(e) {	";
		echo "			editor.text('<h3>Hello KindEditor</h3>');	";
		echo "		});	";
		echo "		K('input[name=insertHtml]').click(function(e) {	";
		echo "			editor.insertHtml('<strong>插入HTML</strong>');	";
		echo "		});	";
		echo "		K('input[name=appendHtml]').click(function(e) {	";
		echo "			editor.appendHtml('<strong>添加HTML</strong>');	";
		echo "		});	";
		echo "		K('input[name=clear]').click(function(e) {	";
		echo "			editor.html('');	";
		echo "		});	";
		
 */		
		echo "	});	";
		echo "</script>		";		
			
		echo '<textarea name="content" style="width:800px;height:400px;visibility:hidden;">'.$Text.'</textarea>';

			

	}
	
	

}
?>
