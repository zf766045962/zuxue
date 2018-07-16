<?php
/**************************************************
*  Created:  2012-3-13
*
*  百度UE编辑器
*
*  @Xsmart (C)2006-2099Inc.
*  @Author  赵志强  <wwwzhaozhiqiang@126.com>
*
***************************************************/
class uEditor
{

	function uEditor() {
		
	}

	function adp_init($config=array()) {

	}
	function showEditor($uEditor_id="content",$num=1,$uEditor_content='',$cutimg='',$imgwidth='',$uEditor_width=800)
	{
		
		if($cutimg!=='')
		{
			$_SESSION['EDITOR_CUTIMG'] = $cutimg;
			$_SESSION['EDITOR_IMG_SIZE'] = $imgwidth;
		}
		elseif($cutimg!=='' && !$cutimg)
		{
			$_SESSION['EDITOR_CUTIMG'] = false;
			$_SESSION['EDITOR_IMG_SIZE'] = 0;
		}
		else
		{
			
			$_SESSION['EDITOR_CUTIMG'] = $GLOBALS['EDITOR_CUTIMG'];
			$_SESSION["EDITOR_IMG_SIZE"] = $GLOBALS['EDITOR_IMG_SIZE'];
			
		}
		
		
		$uEditor_file = EDITOR_FILE;
		if($num==1)
		{
			echo "\r\n";
			echo '<script type="text/javascript" charset="utf-8" src="'.W_BASE_URL_PATH.$uEditor_file.'/editor_config.js"></script>';
			echo "\r\n";
			echo '<link rel="stylesheet" type="text/css" href="'.W_BASE_URL_PATH.$uEditor_file.'/themes/default/ueditor.css"/>';
			echo "\r\n";
			echo '<script type="text/javascript" charset="utf-8" src="'.W_BASE_URL_PATH.$uEditor_file.'/editor_all_min.js"></script>';
		}
		echo "\r\n";
		//echo '<script type="text/plain" id="'.$uEditor_id.'" style="width:'.$uEditor_width.'px;">'.$uEditor_content.'<script>';
		echo "<div id='ueditor".$num."'></div>";
		echo "\r\n";
		echo '<textarea id="'.$uEditor_id.'" name="'.$uEditor_id.'" style="width:'.$uEditor_width.'px;">'.$uEditor_content.'</textarea>';
		echo "\r\n";
		echo "";
		echo "\r\n";
		echo '<script type="text/javascript">';
		echo "\r\n";
//		echo '	var editor'.$num.' = new baidu.editor.ui.Editor();';
//		echo "\r\n";
//		echo '	editor'.$num.'.render("'.$uEditor_id.'");';
//		echo "\r\n";
		echo '	var setinter'.$num.' = setInterval(rent'.$num.',500);';
		echo "\r\n";
		echo "	function rent".$num."()";
		echo "\r\n";
		echo "	{";
		echo "\r\n";
		echo "	if(document.readyState=='complete')";
		echo "\r\n";
		echo "	{";
		echo "\r\n";
		echo '		var editor'.$num.' = new baidu.editor.ui.Editor();';
		echo "\r\n";
		echo '		editor'.$num.'.render("'.$uEditor_id.'")';
		echo "\r\n";
		echo "		clearInterval(setinter".$num.")";
		echo "\r\n";
		echo "	}";
		echo "\r\n";
		echo "	}";
		echo "\r\n";
/*		echo "	function baidu_editor_destroy_botton_click".$num."(){";
		echo "\r\n";
		echo "		var button = document.getElementById('baidu_editor_destroy');";
		echo "\r\n";
		echo "		if (button.value=='空白编辑器'){";
		echo "\r\n";
		echo "			var evalue".$num." = editor".$num.".getContent()";
		echo "\r\n";
		echo "			editor".$num.".destroy();document.getElementById('".$uEditor_id."').style.display='none'";
		echo "\r\n";
		echo '			document.getElementById("ueditor'.$num.'").style.display="";document.getElementById("ueditor'.$num.'").innerHTML="<textarea id='.$uEditor_id.'_t name='.$uEditor_id.'_t style=width:'.$uEditor_width.'px; height:400px;>'.$uEditor_content.'</textarea>";';
		echo "\r\n";
		echo "			document.getElementById('".$uEditor_id."_t').value = evalue;";
		echo "\r\n";
		echo "			document.getElementById('".$uEditor_id."_flag').value = '0';";
		echo "\r\n";
		echo "		}";
		echo "\r\n";
		echo "		button.value = 'HTML编辑器';";
		echo "\r\n";
		echo "		button.onclick = function(){";
		echo "\r\n";
		echo '			document.getElementById("ueditor'.$num.'").style.display="none";';
		echo "\r\n";
		echo "			document.getElementById('".$uEditor_id."').style.display=''";
		echo "\r\n";
		echo "			document.getElementById('".$uEditor_id."_flag').value = '1';";
		echo "\r\n";
		echo "			editor".$num.".render('".$uEditor_id."');";
		echo "\r\n";
		echo "			editvalue".$num." = document.getElementById('".$uEditor_id."').value;";
		echo "\r\n";
		echo "			editor".$num.".setContent(editvalue".$num.");";
		echo "\r\n";
		echo '			this.value="空白编辑器";';
		echo "\r\n";
		echo "			this.onclick = baidu_editor_destroy_botton_click".$num.";";
		echo "\r\n";
		echo "		}";
		echo "\r\n";
		echo "	}";
*/		echo "\r\n";
		echo '</script>';
		echo "\r\n";
		//echo '<input id="baidu_editor_destroy" type="button" onclick="baidu_editor_destroy_botton_click".$num."()" value="空白编辑器"/>';
		echo "\r\n";
		echo '<input type="hidden" name="'.$uEditor_id.'_flag" id="'.$uEditor_id.'_flag" value="1" />';
		echo "\r\n";
		
	}
	
	function showEditor_1_8($uEditor_id="content",$num=1,$uEditor_content='',$uEditor_width=800)
	{
		$uEditor_file = EDITOR_FILE;
		if($num==1)
		{
			echo "\r\n";
			echo '<script type="text/javascript" charset="utf-8" src="'.W_BASE_URL_PATH.$uEditor_file.'/editor_config.js"></script>';
			echo "\r\n";
			echo '<link rel="stylesheet" type="text/css" href="'.W_BASE_URL_PATH.$uEditor_file.'/themes/default/ueditor.css"/>';
			echo "\r\n";
			echo '<script type="text/javascript" charset="utf-8" src="'.W_BASE_URL_PATH.$uEditor_file.'/editor_all_min.js"></script>';
/*			echo '<script type="text/javascript" charset="utf-8" src="'.W_BASE_URL_PATH.$uEditor_file.'/editor_api.js">';
			echo "\r\n";
			echo '	paths = [';
			echo "\r\n";
			echo "		'editor.js',\r\n";
			echo "		'core/browser.js',\r\n";
			echo "		'core/utils.js',\r\n";
			echo "		'core/EventBase.js',\r\n";
			echo "		'core/dom/dom.js',\r\n";
			echo "		'core/dom/dtd.js',\r\n";
			echo "		'core/dom/domUtils.js',\r\n";
			echo "		'core/dom/Range.js',\r\n";
			echo "		'core/dom/Selection.js',\r\n";
			echo "		'core/Editor.js',\r\n";
			echo "		'commands/inserthtml.js',\r\n";
			echo "		'commands/image.js',\r\n";
			echo "		'commands/justify.js',\r\n";
			echo "		'commands/font.js',\r\n";
			echo "		'commands/link.js',\r\n";
			echo "		'commands/map.js',\r\n";
			echo "		'commands/iframe.js',\r\n";
			echo "		'commands/removeformat.js',\r\n";
			echo "		'commands/blockquote.js',\r\n";
			echo "		'commands/indent.js',\r\n";
			echo "		'commands/print.js',\r\n";
			echo "		'commands/preview.js',\r\n";
			echo "		'commands/spechars.js',\r\n";
			echo "		'commands/emotion.js',\r\n";
			echo "		'commands/selectall.js',\r\n";
			echo "		'commands/paragraph.js',\r\n";
			echo "		'commands/directionality.js',\r\n";
			echo "		'commands/horizontal.js',\r\n";
			echo "		'commands/time.js',\r\n";
			echo "		'commands/rowspacing.js',\r\n";
			echo "		'commands/lineheight.js',\r\n";
			echo "		'commands/cleardoc.js',\r\n";
			echo "		'commands/anchor.js',\r\n";
			echo "		'commands/delete.js',\r\n";
			echo "		'commands/wordcount.js',\r\n";
			echo "		'plugins/pagebreak/pagebreak.js',\r\n";
			echo "		'plugins/checkimage/checkimage.js',\r\n";
			echo "		'plugins/undo/undo.js',\r\n";
			echo "		'plugins/paste/paste.js',           //粘贴时候的提示依赖了UI\r\n";
			echo "		'plugins/list/list.js',\r\n";
			echo "		'plugins/source/source.js',\r\n";
			echo "		'plugins/shortcutkeys/shortcutkeys.js',\r\n";
			echo "		'plugins/enterkey/enterkey.js',\r\n";
			echo "		'plugins/keystrokes/keystrokes.js',\r\n";
			echo "		'plugins/fiximgclick/fiximgclick.js',\r\n";
			echo "		'plugins/autolink/autolink.js',\r\n";
			echo "		'plugins/autoheight/autoheight.js',\r\n";
			echo "		'plugins/autofloat/autofloat.js',  //依赖UEditor UI,在IE6中，会覆盖掉body的背景图属性\r\n";
			echo "		'plugins/highlight/highlight.js',\r\n";
			echo "		'plugins/serialize/serialize.js',\r\n";
			echo "		'plugins/video/video.js',\r\n";
			echo "		'plugins/table/table.js',\r\n";
			echo "		'plugins/contextmenu/contextmenu.js',\r\n";
			echo "		'plugins/pagebreak/pagebreak.js',\r\n";
			echo "		'plugins/basestyle/basestyle.js',\r\n";
			echo "		'plugins/elementpath/elementpath.js',\r\n";
			echo "		'plugins/formatmatch/formatmatch.js',\r\n";
			echo "		'plugins/searchreplace/searchreplace.js',\r\n";
			echo "		'plugins/customstyle/customstyle.js',\r\n";
			echo "		'ui/ui.js',\r\n";
			echo "		'ui/uiutils.js',\r\n";
			echo "		'ui/uibase.js',\r\n";
			echo "		'ui/separator.js',\r\n";
			echo "		'ui/mask.js',\r\n";
			echo "		'ui/popup.js',\r\n";
			echo "		'ui/colorpicker.js',\r\n";
			echo "		'ui/tablepicker.js',\r\n";
			echo "		'ui/stateful.js',\r\n";
			echo "		'ui/button.js',\r\n";
			echo "		'ui/splitbutton.js',\r\n";
			echo "		'ui/colorbutton.js',\r\n";
			echo "		'ui/tablebutton.js',\r\n";
			echo "		'ui/toolbar.js',\r\n";
			echo "		'ui/menu.js',\r\n";
			echo "		'ui/combox.js',\r\n";
			echo "		'ui/dialog.js',\r\n";
			echo "		'ui/menubutton.js',\r\n";
			echo "		'ui/datebutton.js',\r\n";
			echo "		'ui/editorui.js',\r\n";
			echo "		'ui/editor.js',\r\n";
			echo "		'ui/multiMenu.js'\r";
			echo "	];\r";
			echo "\r\n";
			echo "</script>";
			*/
		}
		echo "\r\n";
		echo '<script type="text/plain" id="'.$uEditor_id.'" name="'.$uEditor_id.'" style="width:'.$uEditor_width.'px;">'.$uEditor_content.'<script>';
		//echo '<textarea id="'.$uEditor_id.'" name="'.$uEditor_id.'" style="width:'.$uEditor_width.'px;">'.$uEditor_content.'</textarea>';
		echo '<input id="destroy" type="button" onclick="destroy()" value="销毁编辑器"/>';
		echo "\r\n";
		echo '<script type="text/javascript">';
		echo "\r\n";
		echo '	var editor'.$num.' = new baidu.editor.ui.Editor();';
		echo "\r\n";
		echo '	editor'.$num.'.render("'.$uEditor_id.'");';
		echo "\r\n";
		echo "	function destroy(){";
		echo "\r\n";
		echo "	editor.destroy();";
		echo "\r\n";
		echo "	var button = document.getElementById('destroy');";
		echo "\r\n";
		echo "	button.value = '重新渲染';";
		echo "\r\n";
		echo "	button.onclick = function(){";
		echo "\r\n";
		echo "		editor = new baidu.editor.ui.Editor();";
		echo "\r\n";
		echo "		editor.render('".$uEditor_id."');";
		echo "\r\n";
		echo '		this.value="销毁编辑器";';
		echo "\r\n";
		echo "		this.onclick = destroy;";
		echo "\r\n";
		echo "	}";
		echo "\r\n";
		echo "}";
		echo "\r\n";
		echo '</script>';
		echo "\r\n";
	}
	
	

}
?>
