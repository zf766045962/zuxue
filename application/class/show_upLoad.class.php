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
class show_upLoad {
	/*------------------------------------------------------
		最新的基于kindeditor 编辑器的上传组件
		修改时间 2013-03-19
		修改人   袁晓兵 
		$type 			表示上传类型      [ pic、flash、media、file  定义允许上传的文件扩展名可以在 /js/kindeditor/php/upload_json.php 文件里面增加。]
		$button_name	表示文本框接受的 name  
		$value			默认值
		$lang			表示语言版本      [ 阿拉伯语 ar.js、英语 en.js、简体中文 zh_CN.js、繁体中文zh_TW.js ]
		<input id="url3" type="text" value="" style="width:250px;height:18px;"/>
		<input id="image3" type="button" value="选择图片" />
		
		$style          样式 【例：class="xxxx"】
	------------------------------------------------------*/
	function showUpload($type="pic",$num=1,$button_name='imgurl',$value="",$lang="zh_CN",$upload_id="url3",$button_id="image3",$style="")
	{
		$html='';
		if($num==1)
		{
		$html.='<link rel="stylesheet" href="'.W_BASE_URL.'js/kindeditor/themes/default/default.css" />';
		$html.='<script src="'.W_BASE_URL.'js/kindeditor/kindeditor.js"></script>';
		$html.='<script src="'.W_BASE_URL.'js/kindeditor/lang/'.$lang.'.js"></script>';
		}
		
		$html.='<script>';
		$html.='KindEditor.ready(function(K) {';
		$html.="\r\n";
		$html.='				var uploadbutton = K.uploadbutton({';
		$html.="\r\n";
		$html.='					button : K("#'.$button_id.'")[0],';
		$html.="\r\n";
		$html.='					fieldName : "imgFile",';
		$html.="\r\n";
		$html.='					url : "'.W_BASE_URL.'js/kindeditor/php/upload_json.php?dir='.$type.'",';
		$html.="\r\n";
		$html.='					afterUpload : function(data) {';
		$html.="\r\n";
		$html.='						if (data.error === 0) {';
		$html.="\r\n";
		$html.='							var url = K.formatUrl(data.url,"absolute");';
		$html.="\r\n";
		$html.='							K("#'.$upload_id.'").val(url);';
		$html.="\r\n";
		$html.='						} else {';
		$html.="\r\n";
		$html.='							alert(data.message);';
		$html.="\r\n";
		$html.='						}'; 
		$html.="\r\n";
	    $html.='					},';
		$html.="\r\n";
	    $html.='					afterError : function(str) {';
		$html.="\r\n";
	    $html.='						alert(str);';
		$html.="\r\n";
	    $html.='					}';
		$html.="\r\n";
	    $html.='				});';
		$html.="\r\n";
	    $html.='				uploadbutton.fileBox.change(function(e) {';
		$html.="\r\n";
	    $html.='    				uploadbutton.submit();';
		$html.="\r\n";
	    $html.='				});';	
		$html.="\r\n";
	    $html.='});';
		$html.="\r\n";
        $html.='</script>';
	    $html.="\r\n";		
	    $html.='<label style="cursor:pointer">';
	    $html.='<input id="'.$upload_id.'" name="'.$button_name.'" type="text" value="'.$value.'" style="vertical-align:middle;width:260px;margin-right:5px" '.$style.' />';
	    $html.='<input id="'.$button_id.'" type="text" value="上传" style="width:100px;" />';	
	    $html.='</label>';	
		return $html;
		
	}
}