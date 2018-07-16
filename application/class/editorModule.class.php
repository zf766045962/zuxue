<?php
/**************************************************
*  	Created:  2014-05-06 20:50
*	
* 	KindEditor 组件集成
*
*  	@Xsmart (C)2014-2099Inc.
*  	@Author  陈壹宁
*	UpdateTime:  2015-03-18 15:28
*
***************************************************/
class editorModule {
	/* 	
		Function 对应表：
			上传文件弹出框		files
			上传图片弹出框		image
			批量上传弹出框		images
			浏览服务器：		fileManager
			上传按钮： 		uploadButton
			取色器：			colorPicker
			弹出框(HTML)：	dialog
			
		参数说明：
			* @param int 	$mode  			上传图片模式 分为三种 1=>网络图片+本地上传 2=>本地上传 3=>网络图片
			* @param String $type  			上传按钮 的文件类型  image,flash,media,file
			* @param String $uniqueName		唯一名称  将作为文本域的 id和name值
			* @param String $txtValue		默认的文本域值
			* @param String $btnValue		按钮显示值
			* @param String $attribute		万能属性 可以给input随意添加任何 属性=属性值
							使用方法 如：class="b" style="...",class="b" 逗号前为文本框属性  逗号后为按钮属性
			
			* @param int 	$isShow			文本框是否显示 1=>显示 0=>不显示 默认不填为显示
			* @param array 	$setting		弹窗参数 , 一个参数数组
							使用方法 如：
			$setting = array(
							'title'		=> '测试窗口',		窗口标题
							'width'		=> 500,				窗口宽度
							'content'	=> '',				内容主体 可以是HTML
							'yesBtn'	=> '确定',			确定按钮的显示值
							'noBtn'		=> '取消',			取消按钮的显示值
							'yesfunc'	=> ''				点击确定后调用的js函数名称
						)
	*/
	
	function __construct($isAdmin = 0){
		$fileInit = '';
		$fileInit .= '<link rel="stylesheet" href="'.W_BASE_URL.'kindeditor/themes/default/default.css" />';
		$fileInit .= "\r\n";
		$fileInit .= '<script src="'.W_BASE_URL.'kindeditor/kindeditor-min.js"></script>';
		$fileInit .= "\r\n";
		$fileInit .= '<script src="'.W_BASE_URL.'kindeditor/lang/zh_CN.js"></script>';
		$fileInit .= "\r\n";
		echo $isAdmin ? '' : $fileInit;
	}
	
	// 上传文件弹出框
	function files($uniqueName='fileUrl', $txtValue='', $btnValue='上传文件', $attribute=' , ', $isShow=1){
		$html = '';
		$html .= '<script>';
		$html .= "\r\n";
		$html .= '		KindEditor.ready(function(K) {';
		$html .= "\r\n";
		$html .= '			var editor = K.editor({';
		$html .= "\r\n";
		$html .= '				allowFileManager : true';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '			K("#'.$uniqueName.'Btn").click(function() {';
		$html .= "\r\n";
		$html .= '				editor.loadPlugin("insertfile", function() {';
		$html .= "\r\n";
		$html .= '					editor.plugin.fileDialog({';
		$html .= "\r\n";
		$html .= '						fileUrl : K("#'.$uniqueName.'").val(),';
		$html .= "\r\n";
		$html .= '						clickFn : function(url, title) {';
		$html .= "\r\n";
		$html .= '							K("#'.$uniqueName.'").val(url);';
		$html .= "\r\n";
		$html .= '							editor.hideDialog();';
		$html .= "\r\n";
		$html .= '						}';
		$html .= "\r\n";
		$html .= '					});';
		$html .= "\r\n";
		$html .= '				});';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '</script>';
		$html .= "\r\n";
		
		$isShow = $isShow ? 'text' : 'hidden' ;
		$attribute = explode(',',$attribute);
		$html .= '<input '.$attribute[0].' type="'.$isShow.'" id="'.$uniqueName.'" name="'.$uniqueName.'" value="'.$txtValue.'" readonly="readonly" />';
		$html .= "\r\n";
		$html .= '<input type="button" id="'.$uniqueName.'Btn" value="'.$btnValue.'" '.$attribute[1].'/>';
		$html .= "\r\n";
		return $html;
	}
	
	// 上传图片弹出框
	function image($mode=1, $uniqueName='imgUrl', $txtValue='', $btnValue='图片上传', $attribute=' , ', $isShow=1){
		$html = '';
		$html .= '<script>';
		$html .= "\r\n";
		$html .= '		KindEditor.ready(function(K) {';
		$html .= "\r\n";
		$html .= '			var editor = K.editor({';
		$html .= "\r\n";
		$html .= '				allowFileManager : true';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '			K("#'.$uniqueName.'Btn").click(function() {';
		$html .= "\r\n";
		$html .= '				editor.loadPlugin("image", function() {';
		$html .= "\r\n";
		$html .= '					editor.plugin.imageDialog({';
		$html .= "\r\n";
		if($mode == 2){
			$html .= '					showRemote : false,';
			$html .= "\r\n";
		}
		if($mode == 3){
			$html .= '					showLocal : false,';
			$html .= "\r\n";
		}
		$html .= '						imageUrl : K("#'.$uniqueName.'").val(),';
		$html .= "\r\n";
		$html .= '						clickFn : function(url, title, width, height, border, align) {';
		$html .= "\r\n";
		$html .= '							K("#'.$uniqueName.'").val(url);';
		$html .= "\r\n";
		$html .= '							K("#'.$uniqueName.'View").attr("src",url);';
		$html .= "\r\n";
		$html .= '							editor.hideDialog();';
		$html .= "\r\n";
		$html .= '						}';
		$html .= "\r\n";
		$html .= '					});';
		$html .= "\r\n";
		$html .= '				});';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '</script>';
		$html .= "\r\n";
		
		$isShow = $isShow ? 'text' : 'hidden' ;
		$attribute = explode(',',$attribute);
		$html .= '<input '.$attribute[0].' type="'.$isShow.'" id="'.$uniqueName.'" name="'.$uniqueName.'" value="'.$txtValue.'" readonly="readonly" />';
		$html .= "\r\n";
		$html .= '<input type="button" id="'.$uniqueName.'Btn" value="'.$btnValue.'" '.$attribute[1].'/>';
		$html .= "\r\n";
		return $html;
	}
	
	// 批量上传弹出框
	function images($uniqueName='selectImage', $btnValue='批量上传', $attribute=''){
		$html = '';
		$html .= '<script>';
		$html .= "\r\n";
		$html .= '		KindEditor.ready(function(K) {';
		$html .= "\r\n";
		$html .= '			var editor = K.editor({';
		$html .= "\r\n";
		$html .= '				allowFileManager : true';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '			K("#'.$uniqueName.'Btn").click(function() {';
		$html .= "\r\n";
		$html .= '				editor.loadPlugin("multiimage", function() {';
		$html .= "\r\n";
		$html .= '					editor.plugin.multiImageDialog({';
		$html .= "\r\n";
		$html .= '						clickFn : function(urlList) {';
		$html .= "\r\n";
		$html .= '							change_images(urlList,"'.$uniqueName.'"); //重要';//模型多图片
		$html .= "\r\n";
		$html .= '							editor.hideDialog();';
		$html .= "\r\n";
		$html .= '						}';
		$html .= "\r\n";
		$html .= '					});';
		$html .= "\r\n";
		$html .= '				});';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '</script>';
		$html .= "\r\n";

		$html .= '<input type="button" id="'.$uniqueName.'Btn" value="'.$btnValue.'" '.$attribute.'/>';
		$html .= "\r\n";
		return $html;
	}
	
	// 浏览服务器, 从服务器选择文件
	function fileManager($uniqueName='fileUrl', $txtValue='', $btnValue='浏览服务器', $attribute=' , ', $isShow=1){
		$html = '';
		$html .= '<script>';
		$html .= "\r\n";
		$html .= '		KindEditor.ready(function(K) {';
		$html .= "\r\n";
		$html .= '			var editor = K.editor({';
		$html .= "\r\n";
		$html .= '				fileManagerJson : "'.W_BASE_URL.'kindeditor/php/file_manager_json.php"';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '			K("#'.$uniqueName.'Btn").click(function() {';
		$html .= "\r\n";
		$html .= '				editor.loadPlugin("filemanager", function() {';
		$html .= "\r\n";
		$html .= '					editor.plugin.filemanagerDialog({';
		$html .= "\r\n";
		$html .= '						viewType : "VIEW",';
		$html .= "\r\n";
		$html .= '						dirName : "image",';
		$html .= "\r\n";
		$html .= '						clickFn : function(url, title) {';
		$html .= "\r\n";
		$html .= '							K("#'.$uniqueName.'").val(url);';
		$html .= "\r\n";
		$html .= '							K("#'.$uniqueName.'View").attr("src",url);';
		$html .= "\r\n";
		$html .= '							editor.hideDialog();';
		$html .= "\r\n";
		$html .= '						}';
		$html .= "\r\n";
		$html .= '					});';
		$html .= "\r\n";
		$html .= '				});';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '</script>';
		$html .= "\r\n";
		
		$isShow = $isShow ? 'text' : 'hidden' ;
		$attribute = explode(',',$attribute);
		$html .= '<input type="'.$isShow.'" id="'.$uniqueName.'" name="'.$uniqueName.'" value="'.$txtValue.'" readonly="readonly" '.$attribute[0].'/>';
		$html .= "\r\n";
		$html .= '<input type="button" id="'.$uniqueName.'Btn" value="'.$btnValue.'" '.$attribute[1].'/>';
		$html .= "\r\n";
		return $html;
	}
	
	// 上传按钮
	function uploadButton($type='file', $uniqueName='imgUrl', $txtValue='', $btnValue='上 传', $attribute=' , ', $isShow=1){
		$html = '';
		$html .= '<script>';
		$html .= "\r\n";
		$html .= '		KindEditor.ready(function(K) {';
		$html .= "\r\n";
		$html .= '			var uploadbutton = K.uploadbutton({';
		$html .= "\r\n";
		$html .= '				button	: K("#'.$uniqueName.'Btn")[0],';
		$html .= "\r\n";
		$html .= '				fieldName : "imgFile",';
		$html .= "\r\n";
		$html .= '				url		: "'.W_BASE_URL.'kindeditor/php/upload_json.php?dir='.$type.'",';
		$html .= "\r\n";
		$html .= '				afterUpload : function(data) {';
		$html .= "\r\n";
		$html .= '					if (data.error === 0) {';
		$html .= "\r\n";
		$html .= '						var url = K.formatUrl(data.url, "absolute");';
		$html .= "\r\n";
		$html .= '						K("#'.$uniqueName.'").val(url);';
		if($type == 'image'){
			$html .= "\r\n";
			$html .= '					K("#'.$uniqueName.'View").attr("src",url);';
		}
		$html .= "\r\n";
		$html .= '					} else {';
		$html .= "\r\n";
		$html .= '						alert(data.message);';
		$html .= "\r\n";
		$html .= '					}';
		$html .= "\r\n";
		$html .= '				},';
		$html .= "\r\n";
		$html .= '				afterError : function(str) {';
		$html .= "\r\n";
		$html .= '					alert(str);';
		$html .= "\r\n";
		$html .= '				}';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '			uploadbutton.fileBox.change(function(e) {';
		$html .= "\r\n";
		$html .= '				uploadbutton.submit();';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '</script>';
		$html .= "\r\n";
		
		$isShow = $isShow ? 'text' : 'hidden' ;
		$attribute = explode(',',$attribute);
		$html .= '<input '.$attribute[0].' type="'.$isShow.'" id="'.$uniqueName.'" name="'.$uniqueName.'" value="'.$txtValue.'" readonly="readonly" />';
		$html .= "\r\n";
		$html .= '<input type="button" id="'.$uniqueName.'Btn" value="'.$btnValue.'" '.$attribute[1].'/>';
		$html .= "\r\n";
		return $html;
	}
	
	// 取色器
	function colorPicker($uniqueName='color', $txtValue='', $btnValue='选择颜色', $attribute=' , ', $isShow=1){
		$html = '';
		$html .= '<script>';
		$html .= "\r\n";
		$html .= '		KindEditor.ready(function(K) {';
		$html .= "\r\n";
		$html .= '			var colorpicker;';
		$html .= "\r\n";
		$html .= '			K("#'.$uniqueName.'Btn").bind("click", function(e) {';
		$html .= "\r\n";
		$html .= '				e.stopPropagation();';
		$html .= "\r\n";
		$html .= '				if (colorpicker) {';
		$html .= "\r\n";
		$html .= '					colorpicker.remove();';
		$html .= "\r\n";
		$html .= '					colorpicker = null;';
		$html .= "\r\n";
		$html .= '					return;';
		$html .= "\r\n";
		$html .= '				}';
		$html .= "\r\n";
		$html .= '				var colorpickerPos = K("#'.$uniqueName.'Btn").pos();';
		$html .= "\r\n";
		$html .= '				colorpicker = K.colorpicker({';
		$html .= "\r\n";
		$html .= '					x : colorpickerPos.x,';
		$html .= "\r\n";
		$html .= '					y : colorpickerPos.y + K("#'.$uniqueName.'Btn").height(),';
		$html .= "\r\n";
		$html .= '					z : 19811214,';
		$html .= "\r\n";
		$html .= '					selectedColor : "default",';
		$html .= "\r\n";
		$html .= '					noColor : "无颜色",';
		$html .= "\r\n";
		$html .= '					click : function(color) {';
		$html .= "\r\n";
		$html .= '						K("#'.$uniqueName.'").val(color);';
		$html .= "\r\n";
		$html .= '						colorpicker.remove();';
		$html .= "\r\n";
		$html .= '						colorpicker = null;';
		$html .= "\r\n";
		$html .= '					}';
		$html .= "\r\n";
		$html .= '				});';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '			K(document).click(function() {';
		$html .= "\r\n";
		$html .= '				if (colorpicker) {';
		$html .= "\r\n";
		$html .= '					colorpicker.remove();';
		$html .= "\r\n";
		$html .= '					colorpicker = null;';
		$html .= "\r\n";
		$html .= '				}';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '</script>';
		$html .= "\r\n";
		
		$isShow = $isShow ? 'text' : 'hidden' ;
		$attribute = explode(',',$attribute);
		$html .= '<input '.$attribute[0].' type="'.$isShow.'" id="'.$uniqueName.'" name="'.$uniqueName.'" value="'.$txtValue.'" />';
		$html .= "\r\n";
		$html .= '<input type="button" id="'.$uniqueName.'Btn" value="'.$btnValue.'" '.$attribute[1].'/>';
		$html .= "\r\n";
		return $html;
	}

	// 弹窗
	function dialog($uniqueName='Alert', $btnValue='打开弹窗', $attribute='', $setting = array('title'=>'测试窗口','width'=>500,'content'=>'','yesBtn'=>'确定','noBtn'=>'取消','yesfunc'=>'')){
		extract($setting);
		$html = '';
		$html .= '<script>';
		$html .= "\r\n";
		$html .= '		KindEditor.ready(function(K) {';
		$html .= "\r\n";
		$html .= '			K("#'.$uniqueName.'Btn").click(function() {';
		$html .= "\r\n";
		$html .= '				var dialog = K.dialog({';
		$html .= "\r\n";
		
		$html .= '					width : '.($width ? $width : 500).',';
		$html .= "\r\n";
		$html .= '					title : "'.($title ? $title : '测试窗口').'",';
		$html .= "\r\n";
		$html .= '					body : "'.($content ? $content : '内容').'",';
		$html .= "\r\n";
		$html .= '					closeBtn : {';
		$html .= "\r\n";
		$html .= '						name : "关闭",';
		$html .= "\r\n";
		$html .= '						click : function(e) {';
		$html .= "\r\n";
		$html .= '							dialog.remove();';
		$html .= "\r\n";
		$html .= '						}';
		$html .= "\r\n";
		$html .= '					},';
		$html .= "\r\n";
		
		if(isset($yesBtn)){
		$html .= '					yesBtn : {';
		$html .= "\r\n";
		$html .= '						name : "'.$yesBtn.'",';
		$html .= "\r\n";
		$html .= '						click : function(e) {';
		$html .= "\r\n";
			if(isset($yesfunc)){
				$html .= '						'.$yesfunc.'();';
			}
		$html .= "\r\n";
		$html .= '						}';
		$html .= "\r\n";
		$html .= '					},';
		$html .= "\r\n";
		}
		
		if(isset($noBtn)){
		$html .= '					noBtn : {';
		$html .= "\r\n";
		$html .= '						name : "'.$noBtn.'",';
		$html .= "\r\n";
		$html .= '						click : function(e) {';
		$html .= "\r\n";
		$html .= '							dialog.remove();';
		$html .= "\r\n";
		$html .= '						}';
		$html .= "\r\n";
		$html .= '					}';
		}
		
		$html .= "\r\n";
		$html .= '				});';
		$html .= "\r\n";
		$html .= '			});';
		$html .= "\r\n";
		$html .= '		});';
		$html .= "\r\n";
		$html .= '</script>';
		$html .= "\r\n";
		
		$html .= '<input type="button" id="'.$uniqueName.'Btn" value="'.$btnValue.'" '.$attribute.'/>';
		$html .= "\r\n";
		return $html;
	}

	
}