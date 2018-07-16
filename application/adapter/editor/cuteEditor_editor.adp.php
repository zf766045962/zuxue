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
class cuteEditor_editor
{

	function cuteEditor() {
		
	}

	function adp_init($config=array()) {

	}
	function showEditor($arr){
			
			$Text	=	isset($arr['Text'])?$arr['Text']:'';
			$css	=	isset($arr['css'])?$arr['css']:'php.css';
			$ID		=	isset($arr['ID'])?$arr['ID']:'Editor1';
			$EditorBodyStyle	=	isset($arr['EditorBodyStyle'])?$arr['EditorBodyStyle']:'font:normal 12px arial;';//默认样式
			
			
		    $editor=new CuteEditor();
            $editor->ID=$ID	;
            $editor->Text=$Text;
            $editor->EditorBodyStyle=$EditorBodyStyle;
            $editor->EditorWysiwygModeCss=$css;
            $editor->Draw();
            $editor=null;
	
	}
	
	

}
?>
