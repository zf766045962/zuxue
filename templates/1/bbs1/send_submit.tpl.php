<!DOCTYPE HTML>
<html>
<head>
<meta property="qc:admins" content="2411272406706375" />
<meta property="wb:webmaster" content="e60ad6eb0df1a2b0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>发帖</title>
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_post.css" />
<link href="css/nav.css" rel="stylesheet" />
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>

<link rel="stylesheet" href="/css/style.css" />

<style>
body{
	font-family:"微软雅黑","Microsoft Yahei","宋体",Tahoma,"Simsun",Arial,Helvetica,sans-serif;
	font-size:14px;
	
	}
	
.foot{
	font-size:12px;
	}	
#cnzz_stat_icon_1253224175{
	padding:14px 0 0;
	}	 	
</style>

</head>
<body id="nv_forum" class="pg_post" onkeydown="if(event.keyCode==27) return false;">


<?php TPL :: display('head')?>
<?php TPL :: display('headnav')?>
<div class="second-banner tc">
    	<img src="/images/second_r.gif" />
    </div>
<div id="append_parent"></div>

<div id='alertaa' style="display:none">
<div style="position: absolute; z-index: 1301; left: 496px; top: 658px; " class="fwinmask" id="fwin_dialog" initialized="true"><style type="text/css">object{visibility:hidden;}</style><table cellspacing="0" cellpadding="0" class="fwin"><tbody><tr><td class="m_c"><h3 class="flb"><em>错误信息</em><span><a title="关闭" onclick="hideMenu1()" class="flbc" id="fwin_dialog_close" href="javascript:;">关闭</a></span></h3><div class="ie6_repair_minbox"> </div><div class="c altw"><div class="alert_error" id="alert_error"><p>抱歉，您尚未输入标题或内容</p></div></div><p class="o pns"><span class="z xg1">3 秒后窗口关闭</span></p></td></tr></tbody></table></div> 
<div id="fwin_dialog_cover" style="position: absolute; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 1637px; background-color: rgb(0, 0, 0); opacity: 0.5;"></div>
</div>

<div id="ajaxwaitid"></div>
<div id="hd">
	<?= TPL :: display('bbs/hd');?>
</div>                
<div id="wp" class="wp">
	<div class="newthread_post">
<script type="text/javascript">
	var allowpostattach = parseInt('');
	var allowpostimg = parseInt('1');
	var pid = parseInt('0');
	var tid = parseInt('0');
	var extensions = 'apk,cab,chm,pdf,zip,rar,tar,gz,bzip2,gif,jpg,jpeg,png,torrent';
	var imgexts = 'jpg, jpeg, gif, png';
	var postminchars = parseInt('0');
	var postmaxchars = parseInt('50000');
	var disablepostctrl = parseInt('0');
	var seccodecheck = parseInt('1');
	var secqaacheck = parseInt('0');
	var typerequired = parseInt('');
	var sortrequired = parseInt('1');
	var special = parseInt('0');
	var isfirstpost = 1;
	var allowposttrade = parseInt('');
	var allowpostreward = parseInt('');
	var allowpostactivity = parseInt('');
	var sortid = parseInt('154');
	var special = parseInt('0');
	var fid = 111;
	var postaction = 'newthread';
	var ispicstyleforum = 0;
</script>
<script src="js/bbsjs/forum_post.js" type="text/javascript"></script>
<script src="js/bbsjs/threadsort.js" type="text/javascript"></script>
<? $plants =  DS('publics._get','','bbs_forum','fid='.V('r:fid'));	?>
		<div id="pt" class="bm cl">
			<div class="z">  
    			<a href="<?= URL('bbs.index')?>">互动社区</a><em>&rsaquo;</em>
        		<a href="<?= URL('bbs.thread','&fid='.V('r:fid'))?>"><?=$plants[0]['name']?></a><em>&rsaquo;</em> 发表帖子
			</div>
		</div>
		<form method="post" autocomplete="off" id="postform" action="<?=URL('bbs2.content')?>"
onsubmit="return validate(this)">
		<div id="ct" class="ct2_a ct2_a_r wp cl">
			<div>
				<input type="hidden" name="formhash" id="formhash" value="65514a67" />
				<input type="hidden" name="posttime" id="posttime" value="1413279331" />
				<input type="hidden" name="wysiwyg" id="e_mode" value="1" />
				<?php 
					//表单
					TPL :: display('bbs/post')
				?>
            </div>
<script type="text/javascript" reload="1">
	checkFun(".wrap_simcheck","checked_simcheck");
	simSelectFun("#post_extra select");
</script>
			<div class="cr"></div>
		</div>
		<div class="cr"></div>
	</form>
	<iframe name="ajaxpostframe" id="ajaxpostframe" style="display: none;"></iframe>
		<div id="e_menus" class="editorrow" style="overflow: hidden; height: 0; border: none; background: transparent;">
    		<div id="e_editortoolbar" class="editortoolbar">
        		<div class="p_pop fnm" id="e_fontname_menu" style="display: none">
					<ul unselectable="on">
						<li onclick="discuzcode('fontname', '宋体')" style="font-family: 宋体" unselectable="on"><a href="javascript:;" title="宋体">宋体</a></li>
						<li onclick="discuzcode('fontname', '新宋体')" style="font-family: 新宋体" unselectable="on"><a href="javascript:;" title="新宋体">新宋体</a></li>
						<li onclick="discuzcode('fontname', '黑体')" style="font-family: 黑体" unselectable="on"><a href="javascript:;" title="黑体">黑体</a></li>
						<li onclick="discuzcode('fontname', '微软雅黑')" style="font-family: 微软雅黑" unselectable="on"><a href="javascript:;" title="微软雅黑">微软雅黑</a></li>
						<li onclick="discuzcode('fontname', 'Arial')" style="font-family: Arial" unselectable="on"><a href="javascript:;" title="Arial">Arial</a></li>
						<li onclick="discuzcode('fontname', 'Verdana')" style="font-family: Verdana" unselectable="on"><a href="javascript:;" title="Verdana">Verdana</a></li>
						<li onclick="discuzcode('fontname', 'simsun')" style="font-family: simsun" unselectable="on"><a href="javascript:;" title="simsun">simsun</a></li>
						<li onclick="discuzcode('fontname', 'Helvetica')" style="font-family: Helvetica" unselectable="on"><a href="javascript:;" title="Helvetica">Helvetica</a></li>
						<li onclick="discuzcode('fontname', 'Trebuchet MS')" style="font-family: Trebuchet MS" unselectable="on"><a href="javascript:;" title="Trebuchet MS">Trebuchet MS</a></li>
						<li onclick="discuzcode('fontname', 'Tahoma')" style="font-family: Tahoma" unselectable="on"><a href="javascript:;" title="Tahoma">Tahoma</a></li>
						<li onclick="discuzcode('fontname', 'Impact')" style="font-family: Impact" unselectable="on"><a href="javascript:;" title="Impact">Impact</a></li>
						<li onclick="discuzcode('fontname', 'Times New Roman')" style="font-family: Times New Roman" unselectable="on"><a href="javascript:;" title="Times New Roman">Times New Roman</a></li>
						<li onclick="discuzcode('fontname', '仿宋,仿宋_GB2312')" style="font-family: 仿宋,仿宋_GB2312" unselectable="on"><a href="javascript:;" title="仿宋,仿宋_GB2312">仿宋,仿宋_GB2312</a></li>
						<li onclick="discuzcode('fontname', '楷体,楷体_GB2312')" style="font-family: 楷体,楷体_GB2312" unselectable="on"><a href="javascript:;" title="楷体,楷体_GB2312">楷体,楷体_GB2312</a></li>
					</ul>
				</div>
            	<div class="p_pop fszm" id="e_fontsize_menu" style="display: none">
                    <ul unselectable="on">
                        <li onclick="discuzcode('fontsize', 1)" unselectable="on"><a href="javascript:;" title="1"><font size="1" unselectable="on">1</font></a></li>
                        <li onclick="discuzcode('fontsize', 2)" unselectable="on"><a href="javascript:;" title="2"><font size="2" unselectable="on">2</font></a></li>
                        <li onclick="discuzcode('fontsize', 3)" unselectable="on"><a href="javascript:;" title="3"><font size="3" unselectable="on">3</font></a></li>
                        <li onclick="discuzcode('fontsize', 4)" unselectable="on"><a href="javascript:;" title="4"><font size="4" unselectable="on">4</font></a></li>
                        <li onclick="discuzcode('fontsize', 5)" unselectable="on"><a href="javascript:;" title="5"><font size="5" unselectable="on">5</font></a></li>
                        <li onclick="discuzcode('fontsize', 6)" unselectable="on"><a href="javascript:;" title="6"><font size="6" unselectable="on">6</font></a></li>
                        <li onclick="discuzcode('fontsize', 7)" unselectable="on"><a href="javascript:;" title="7"><font size="7" unselectable="on">7</font></a></li>
                    </ul>
				</div>
			</div>
<script type="text/javascript">smilies_show('smiliesdiv', 8, editorid + '_');</script>
<script src="js/bbsjs/swfupload.js" type="text/javascript"></script>
<script src="js/bbsjs/swfupload.queue.js" type="text/javascript"></script>
<script src="js/bbsjs/handlers.js" type="text/javascript"></script>
<script src="js/bbsjs/fileprogress.js" type="text/javascript"></script>
<script type="text/javascript">
	function switchImagebutton(btn) {
		switchButton(btn, 'image');
		$(editorid + '_image_menu').style.height = '';
		doane();
	}
	function switchAttachbutton(btn) {
		switchButton(btn, 'attach');
		doane();
	}
</script>
			<div class="p_pof" id="e_image_menu" style="display: none" unselectable="on">
			<table width="100%" cellpadding="0" cellspacing="0" class="fwin">
            	<tr>
                	<td class="m_c">
                    	<div class="mtm">
							<ul class="tb tb_s cl" id="e_image_ctrl" style="margin-top:0;margin-bottom:0;">
                            	<li class="y"><span class="flbc" onclick="hideAttachMenu('image')">关闭</span></li>
								<li class="current" id="e_btn_imgattachlist"><a href="javascript:;" hidefocus="true" onclick="switchImagebutton('imgattachlist');">上传图片</a></li>
								<li id="e_btn_local" style="display:none;" did="e_btn_imgattachlist|local"><a href="javascript:;" hidefocus="true" onclick="switchImagebutton('local');">普通上传</a></li>
								<li id="e_btn_www"><a href="javascript:;" hidefocus="true" onclick="switchImagebutton('www');">网络图片</a></li>
							</ul>
							<div unselectable="on" id="e_www" style="display: none;">
								<div class="p_opt popupfix">
									<table cellpadding="0" cellspacing="0" width="100%">
										<tr class="xg1">
										<th width="74%" class="pbn">请输入图片地址</th>
										<th width="13%" class="pbn">宽(可选)</th>
										<th width="13%" class="pbn">高(可选)</th>
										</tr>
										<tr><td><input type="text" id="e_image_param_1" onchange="loadimgsize(this.value)" style="width: 95%;" value="" class="input_style1" autocomplete="off" /></td><td><input id="e_image_param_2" size="5" value="" class="input_style1 p_fre" autocomplete="off" /></td><td><input id="e_image_param_3" size="5" value="" class="input_style1 p_fre" autocomplete="off" /></td></tr>
									</table>
								</div>
								<div class="o">
									<button type="button" class="normalbtn bluebtn" id="e_image_submit"><strong>提交</strong></button>
								</div>
							</div>
							<div unselectable="on" id="e_local" style="display: none;">
								<div class="p_opt">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tbody id="imgattachbodyhidden" style="display:none">
    	<tr>
			<td class="atnu">
            	<span id="imglocalno[]">
            		<img src="http://127.0.0.1:8004/images/common_new.gif" />
                </span>
            </td>
			<td class="atna">
				<span id="imgdeschidden[]" style="display:none">
					<span id="imglocalfile[]"></span>
				</span>
				<input type="hidden" name="imglocalid[]" />
			</td>
			<td class="attc"><span id="imgcpdel[]"></span></td>
		</tr>
	</tbody>
</table>
<div class="p_tbl">
	<table cellpadding="0" cellspacing="0" summary="post_attachbody" border="0" width="100%">
    	<tbody id="imgattachbody"></tbody>
	</table>
</div>
<div class="upbk pbm bbda" style="border:none;">
	<div id="imgattachbtnhidden" style="display:none">
    	<span>
        	<form name="imgattachform" id="imgattachform" method="post" autocomplete="off" action="misc.php?mod=swfupload&amp;operation=upload&amp;simple=1&amp;type=image" target="attachframe" enctype="multipart/form-data">
            	<input type="hidden" name="uid" value="9594205">
                <input type="hidden" name="hash" value="03239fe96e901c9c7dc1674ea30142db">
                <input type="file" name="Filedata" size="45" class="filedata" />
			</form>			
		</span>
	</div>
	<div id="imgattachbtn" class="ptm pbn" style="padding-bottom:8px;"></div>
	<p id="imguploadbtn">
		<button class="normalbtn bluebtn vm" type="button" onclick="uploadAttach(0, 0, 'img')"><span>上传</span></button>
		<span class="xg1">&larr;选择完文件后请点击“上传”按钮</span>
	</p>
	<p id="imguploading" style="display: none;">
    	<img src="http://127.0.0.1:8004/images/uploading.gif" style="vertical-align: middle;" /> 上传中，请稍候，您可以
    	<a href="javascript:;" onclick="hideMenu()">暂时关闭这个小窗口</a>，上传完成后您会收到通知
	</p>
</div>
<div class="notice upnf">
	文件尺寸: <span class="xi1">小于 1000KB </span>, 可用扩展名: 
    <span class="xi1">jpg, jpeg, gif, png</span>&nbsp;<br />您今日还能上传 总大小 
    <strong>3.1MB</strong> 以内的文件
</div>
</div>
<div class="o">
<button onclick="hideAttachMenu('image')" class="normalbtn bluebtn">
<strong>确定</strong>
</button>
</div>
</div>
<div unselectable="on" id="e_imgattachlist">
	<div class="p_opt">
		<div class="pbm bbda cl">
			<div id="imgattach_notice" class="y"  style="display: none"></div>
			<span id="imgSpanButtonPlaceholder"></span>
		</div>
		<div class="upfilelist upfl bbda">
			<div id="imgattachlist"></div>
			<div id="unusedimgattachlist"></div>
			<div class="fieldset flash" id="imgUploadProgress"></div>
<script type="text/javascript">
	var imgUpload = new SWFUpload({
	upload_url: "http://127.0.0.1:8004/misc.php?mod=swfupload&action=swfupload&operation=upload&fid=111",
post_params: {"uid" : "9594205", "hash":"03239fe96e901c9c7dc1674ea30142db", "type":"image"},
	file_size_limit : "1000",
	file_types : "*.jpg;*.jpeg;*.gif;*.png",
	file_types_description : "Image File",
	file_upload_limit : 0,
	file_queue_limit : 0,
	swfupload_preload_handler : preLoad,
	swfupload_load_failed_handler : loadFailed,
	file_dialog_start_handler : fileDialogStart,
	file_queued_handler : fileQueued,
	file_queue_error_handler : fileQueueError,
	file_dialog_complete_handler : fileDialogComplete,
	upload_start_handler : uploadStart,
	upload_progress_handler : uploadProgress,
	upload_error_handler : uploadError,
	upload_success_handler : uploadSuccess,
	upload_complete_handler : uploadComplete,
	button_image_url : "http://127.0.0.1:8004/images/uploadbutton.png",
	button_placeholder_id : "imgSpanButtonPlaceholder",
	button_width: 100,
	button_height: 25,
	button_cursor:SWFUpload.CURSOR.HAND,
	button_window_mode: "transparent",
	custom_settings : {
	progressTarget : "imgUploadProgress",
	uploadSource: 'forum',
	uploadType: 'image',
	imgBoxObj: $('imgattachlist'),	
	maxSizePerDay: 3266560,
	filterType: {'jpeg':52428800,'png':52428800,'gif':52428800,'jpg':52428800},
	singleUpload: $('e_btn_local')
	},
	debug: false
});
	function createNewAlbum() {
		var inputObj = $('newalbum');
		if(inputObj.value == '' || inputObj.value == '请输入相册名称') {
			inputObj.value = '请输入相册名称';
		} else {
			var x = new Ajax();
			x.get('home.php?mod=misc&ac=ajax&op=createalbum&inajax=1&name=' + inputObj.value, function(s){
				var aid = parseInt(s);
				var albumList = $('uploadalbum');
				var haveoption = false;
				for(var i = 0; i < albumList.options.length; i++) {
					if(albumList.options[i].value == aid) {
						albumList.selectedIndex = i;
						haveoption = true;
						break;
					}
				}
				if(!haveoption) {
					var oOption = document.createElement("OPTION");
					oOption.text = trim(inputObj.value);
					oOption.value = aid;
					albumList.options.add(oOption);
					albumList.selectedIndex = albumList.options.length-1;
				}
					inputObj.value = ''
				});
				selectCreateTab(1)
			}
		}
		function selectCreateTab(flag) {
			var vwObj = $('uploadPanel');
			var opObj = $('createalbum');
			var selObj = $('uploadalbum');
			if(flag) {
				vwObj.style.display = '';
				opObj.style.display = 'none';
				selObj.value = selObj.options[0].value;
			} else {
				vwObj.style.display = 'none';
				opObj.style.display = '';
			}
		}
</script>
		</div>
		<div class="notice upnf">
		点击图片添加到帖子内容中<br />文件尺寸: <span class="xi1">小于 1000KB </span>
, 可用扩展名: <span class="xi1">jpg, jpeg, gif, png</span>&nbsp;
<br />您今日还能上传 总大小 <strong>3.1MB</strong> 以内的文件
		</div>
	</div>
	<div class="o">
		<button onclick="hideAttachMenu('image')" class="normalbtn bluebtn">
			<strong>确定</strong>
		</button>
	</div>
</div>
</div></td></tr></table>
</div>


<iframe name="attachframe" id="attachframe" style="display: none;" onload="uploadNextAttach();"></iframe>

<script type="text/javascript">
	if(wysiwyg) {
		newEditor(1, bbcode2html(textobj.value));
	} else {
		newEditor(0, textobj.value);
	}
	//editorsimple();
	var ATTACHNUM = {'imageused':0,'imageunused':0,'attachused':0,'attachunused':0}, 	ATTACHUNUSEDAID = new Array(), IMGUNUSEDAID = new Array();
ATTACHNUM['imageused'] = 0;
switchImagebutton('imgattachlist');
$(editorid + '_image').evt = false;
updateattachnum('image');
ATTACHNUM['attachused'] = 0;
switchAttachbutton('swfupload');
display('attachnotice_img');
	var msg = '';msg += '<p><label><input id="unused3900067" name="unused[]" value="3900067" checked type="checkbox" class="pc" /><span title="comingsoon3.jpg 2014-10-13 09:19">comingsoon3.jpg</span></label></p>'
IMGUNUSEDAID[3900067] = '3900067';
$('unusedlist_img').innerHTML = '<div class="cl">' + msg + '</div>';
$('unusednum_img').innerHTML = parseInt(1);
setCaretAtEnd();
	if(BROWSER.ie >= 5 || BROWSER.firefox >= '2') {
		_attachEvent(window, 'beforeunload', unloadAutoSave);
	}
</script>
	</div>

<script type="text/javascript">
	subClickFun('#postsubmit',1);
	var editorsubmit = $('postsubmit');
	var editorform = $('postform');
	function switchpost(href) {
		editchange = false;
		saveData(1);
		location.href = href + '&fid=111&cedit=yes&extra=';
		doane();
	}
	addAttach('img');
	(function () {
		var oSubjectbox = $('subjectbox'),
		oSubject = $('subject'),
		oTextarea = $('e_textarea'),
		sLen = 0;
		if(oSubjectbox) {
			if(oTextarea && oTextarea.style.display == '') {
				oTextarea.focus();
			}
		} else if(oSubject) {
			if(BROWSER.chrome) {
				sLen = oSubject.value.length;
				oSubject.setSelectionRange(sLen, sLen);
			}
				oSubject.focus();
		}
	})();
	if(loadUserdata('forum_'+discuz_uid)) {
		$('rstnotice').style.display = '';
	}
</script>
	<div class="cr"></div>
</div>	
<div style="margin-top:50px">
<?php TPL :: display('footer');?>
</div>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/jquery.alerts.js"></script>
<script type="text/javascript" src="/js/jquery.ui.draggable.js"></script>
<script type="text/javascript">
// head-select
$(function(){
	$.head_select("#head_select","#inputselect");
});

//关注
atten();
recommend();
boutique('main_boutique');
//putaway();
ranking('ranOne');
ranking('ranTwo');
ranking('ranThree');


//团购
jQuery(".group-tab").slide({trigger:"click",effect:"left"});

// banner
jQuery(".slide_Box").slide({mainCell:".bd ul",autoPlay:true,trigger:"click"});

//重磅推荐jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:4,trigger:"click"});
jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//精品推荐jQuery(".main-boutique").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});
jQuery(".main-boutique").slide({trigger:"click"});

//新书上架
jQuery(".main-putaway").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//合作伙伴
jQuery(".slideBox").slide({ mainCell:"ul",vis:6,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});

//友情链接
jQuery(".multipleColumn").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",autoPlay:true,vis:6});

//总排行
jQuery(".ranking-box").slide({autoPlay:false,trigger:"click"});

//听书产品 jQuery(".main-product").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
jQuery(".main-product").slide({trigger:"click"});

//广告
jQuery(".main-ad").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
</script>


</body>
</html>
