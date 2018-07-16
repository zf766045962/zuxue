<?php
/**************************************************
*  Created:  2012-3-13
*
*  百度UE编辑器
*
*  @Xsmart (C)2006-2099Inc.
*  @Author  赵志强
*
***************************************************/
class uEditor_editor
{

	function uEditor() {
		
	}

	function adp_init($config=array()) {

	}
	function showEditor($uEditor_file='ueditor',$uEditor_width='800',$uEditor_content='',$uEditor_id="editor")
	{
		echo '<script type="text/javascript" charset="utf-8" src="'.W_BASE_URL_PATH.$uEditor_file.'/editor_config.js"></script>';
		echo '<script type="text/javascript" charset="utf-8" src="'.W_BASE_URL_PATH.$uEditor_file.'/editor_api.js">';
		echo '	paths = [';
		echo "		'editor.js',";
		echo "		'core/browser.js',";
		echo "		'core/utils.js',";
		echo "		'core/EventBase.js',";
		echo "		'core/dom/dom.js',";
		echo "		'core/dom/dtd.js',";
		echo "		'core/dom/domUtils.js',";
		echo "		'core/dom/Range.js',";
		echo "		'core/dom/Selection.js',";
		echo "		'core/Editor.js',";
		echo "		'commands/inserthtml.js',";
		echo "		'commands/image.js',";
		echo "		'commands/justify.js',";
		echo "		'commands/font.js',";
		echo "		'commands/link.js',";
		echo "		'commands/map.js',";
		echo "		'commands/iframe.js',";
		echo "		'commands/removeformat.js',";
		echo "		'commands/blockquote.js',";
		echo "		'commands/indent.js',";
		echo "		'commands/print.js',";
		echo "		'commands/preview.js',";
		echo "		'commands/spechars.js',";
		echo "		'commands/emotion.js',";
		echo "		'commands/selectall.js',";
		echo "		'commands/paragraph.js',";
		echo "		'commands/directionality.js',";
		echo "		'commands/horizontal.js',";
		echo "		'commands/time.js',";
		echo "		'commands/rowspacing.js',";
		echo "		'commands/lineheight.js',";
		echo "		'commands/cleardoc.js',";
		echo "		'commands/anchor.js',";
		echo "		'commands/delete.js',";
		echo "		'commands/wordcount.js',";
		echo "		'plugins/pagebreak/pagebreak.js',";
		echo "		'plugins/checkimage/checkimage.js',";
		echo "		'plugins/undo/undo.js',";
		echo "		'plugins/paste/paste.js',           //粘贴时候的提示依赖了UI";
		echo "		'plugins/list/list.js',";
		echo "		'plugins/source/source.js',";
		echo "		'plugins/shortcutkeys/shortcutkeys.js',";
		echo "		'plugins/enterkey/enterkey.js',";
		echo "		'plugins/keystrokes/keystrokes.js',";
		echo "		'plugins/fiximgclick/fiximgclick.js',";
		echo "		'plugins/autolink/autolink.js',";
		echo "		'plugins/autoheight/autoheight.js',";
		echo "		'plugins/autofloat/autofloat.js',  //依赖UEditor UI,在IE6中，会覆盖掉body的背景图属性";
		echo "		'plugins/highlight/highlight.js',";
		echo "		'plugins/serialize/serialize.js',";
		echo "		'plugins/video/video.js',";
		echo "		'plugins/table/table.js',";
		echo "		'plugins/contextmenu/contextmenu.js',";
		echo "		'plugins/pagebreak/pagebreak.js',";
		echo "		'plugins/basestyle/basestyle.js',";
		echo "		'plugins/elementpath/elementpath.js',";
		echo "		'plugins/formatmatch/formatmatch.js',";
		echo "		'plugins/searchreplace/searchreplace.js',";
		echo "		'plugins/customstyle/customstyle.js',";
		echo "		'ui/ui.js',";
		echo "		'ui/uiutils.js',";
		echo "		'ui/uibase.js',";
		echo "		'ui/separator.js',";
		echo "		'ui/mask.js',";
		echo "		'ui/popup.js',";
		echo "		'ui/colorpicker.js',";
		echo "		'ui/tablepicker.js',";
		echo "		'ui/stateful.js',";
		echo "		'ui/button.js',";
		echo "		'ui/splitbutton.js',";
		echo "		'ui/colorbutton.js',";
		echo "		'ui/tablebutton.js',";
		echo "		'ui/toolbar.js',";
		echo "		'ui/menu.js',";
		echo "		'ui/combox.js',";
		echo "		'ui/dialog.js',";
		echo "		'ui/menubutton.js',";
		echo "		'ui/datebutton.js',";
		echo "		'ui/editorui.js',";
		echo "		'ui/editor.js',";
		echo "		'ui/multiMenu.js'";
		echo "	];";
		echo "</script>";
		echo '<link rel="stylesheet" type="text/css" href="'.W_BASE_URL_PATH.$uEditor_file.'/themes/default/ueditor.css"/>';
		echo '<script type="text/plain" id="'.uEditor_id.'" style="width:'.$uEditor_width.';">'.$uEditor_content.'</script>';
		echo '<script type="text/javascript">';
		echo '	var editor = new baidu.editor.ui.Editor();';
		echo '	editor.render("'.uEditor_id.'");';
		echo '</script>';
	}
	
	

}
?>
