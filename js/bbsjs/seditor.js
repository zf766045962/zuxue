/*
	[Discuz!] (C)2001-2099 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: seditor.js 28601 2012-03-06 02:49:55Z monkey $
*/

function seditor_showimgmenu(seditorkey) {
	var imgurl = $(seditorkey + '_image_param_1').value;
	var width = parseInt($(seditorkey + '_image_param_2').value);
	var height = parseInt($(seditorkey + '_image_param_3').value);
	var extparams = '';
	if(width || height) {
		extparams = '=' + width + ',' + height
	}
	seditor_insertunit(seditorkey, '[img' + extparams + ']' + imgurl, '[/img]', null, 1);
	$(seditorkey + '_image_param_1').value = '';
	hideMenu();
}

function seditor_menu(seditorkey, tag) {
	var sel = false;
	if(!isUndefined($(seditorkey + 'message').selectionStart)) {
		sel = $(seditorkey + 'message').selectionEnd - $(seditorkey + 'message').selectionStart;
	} else if(document.selection && document.selection.createRange) {
		$(seditorkey + 'message').focus();
		var sel = document.selection.createRange();
		$(seditorkey + 'message').sel = sel;
		sel = sel.text ? true : false;
	}
	if(sel) {
		seditor_insertunit(seditorkey, '[' + tag + ']', '[/' + tag + ']');
		return;
	}
	var ctrlid = seditorkey + tag;
	var menuid = ctrlid + '_menu';
	if(!$(menuid)) {
		switch(tag) {
			case 'at':
				curatli = 0;
				atsubmitid = ctrlid + '_submit';
				setTimeout(function() {atFilter('', 'at_list','atListSet');$('atkeyword').focus();}, 100);
				str = '请输用户名<br /><input type="text" id="atkeyword" value="" class="px" onkeydown="atFilter(this.value, \'at_list\',\'atListSet\',event);" /><div class="p_pop" id="at_list" style="width:250px;"><ul><li>@朋友账号，就能提醒他来看帖子</li></ul></div>';
				submitstr = 'seditor_insertunit(\'' + seditorkey + '\', \'@\' + $(\'atkeyword\').value.replace(/<\\/?b>/g, \'\')+\' \'); hideMenu();';
				break;
			case 'url':
				str = '请输入链接地址<br /><input type="text" id="' + ctrlid + '_param_1" sautocomplete="off" style="width: 98%;margin:8px 0;" value="" class="px" />' +
					'<br />请输入链接文字<br /><input type="text" id="' + ctrlid + '_param_2" style="width: 98%;margin:8px 0;" value="" class="px" />';
				submitstr = "$('" + ctrlid + "_param_2').value !== '' ? seditor_insertunit('" + seditorkey + "', '[url='+seditor_squarestrip($('" + ctrlid + "_param_1').value)+']'+$('" + ctrlid + "_param_2').value, '[/url]', null, 1) : seditor_insertunit('" + seditorkey + "', '[url]'+$('" + ctrlid + "_param_1').value, '[/url]', null, 1);hideMenu();";
				break;
			case 'code':
			case 'quote':
				var tagl = {'quote' : '请输入要插入的引用', 'code' : '请输入要插入的代码'};
					str = tagl[tag] + '<br /><textarea id="' + ctrlid + '_param_1" style="width: 98%" cols="50" rows="5" class="txtarea"></textarea>';
				submitstr = "seditor_insertunit('" + seditorkey + "', '[" + tag + "]'+$('" + ctrlid + "_param_1').value, '[/" + tag + "]', null, 1);hideMenu();";
				break;
			case 'img':
				str = '请输入图片地址<br /><input type="text" id="' + ctrlid + '_param_1" style="width: 98%; margin:8px 0;" value="" class="px" onchange="loadimgsize(this.value, \'' + seditorkey + '\',\'' + tag + '\')" />' +
					'<p class="mtm" style=" margin:0 0 10px 0;">宽(可选) <input type="text" id="' + ctrlid + '_param_2" value="" class="px px3" /> &nbsp;' +
					'高(可选) <input type="text" id="' + ctrlid + '_param_3" value="" class="px px3" /></p>';
				submitstr = "seditor_insertunit('" + seditorkey + "', '[img' + ($('" + ctrlid + "_param_2').value !== '' && $('" + ctrlid + "_param_3').value !== '' ? '='+$('" + ctrlid + "_param_2').value+','+$('" + ctrlid + "_param_3').value : '')+']'+seditor_squarestrip($('" + ctrlid + "_param_1').value), '[/img]', null, 1);hideMenu();";
				break;
		}
		var menu = document.createElement('div');
		menu.id = menuid;
		menu.style.display = 'none';
		menu.className = 'p_pof upf';
		menu.style.width = '270px';
		$('append_parent').appendChild(menu);
		menu.innerHTML = '<span class="closebtn_at"><a onclick="hideMenu()" class="flbc" href="javascript:;">关闭</a></span><div class="p_opt cl"><form onsubmit="' + submitstr + ';return false;" autocomplete="off"><div>' + str + '</div><div class="pns mtn btnbar_opt"><button type="submit" id="' + ctrlid + '_submit" class="normalbtn bluebtn pnc"><strong>提交</strong></button><button type="button" onClick="hideMenu()" class="normalbtn graybtn mleft20"><em>取消</em></button></div></form></div>';
	}
	showMenu({'ctrlid':ctrlid,'evt':'click','duration':3,'cache':0,'drag':1});
}

function seditor_squarestrip(str) {
	str = str.replace('[', '%5B');
	str = str.replace(']', '%5D');
	return str;
}

function seditor_insertunit(key, text, textend, moveend, selappend) {
	try{
		$('fastpostimg_param_1').blur();
	}catch(e){}
	if($(key + 'message')) {
		$(key + 'message').focus();
	}
	textend = isUndefined(textend) ? '' : textend;
	moveend = isUndefined(textend) ? 0 : moveend;
	selappend = isUndefined(selappend) ? 1 : selappend;
	startlen = strlen(text);
	endlen = strlen(textend);
	if(!isUndefined($(key + 'message').selectionStart)) {
		if(selappend) {
			var opn = $(key + 'message').selectionStart + 0;
			if(textend != '') {
				text = text + $(key + 'message').value.substring($(key + 'message').selectionStart, $(key + 'message').selectionEnd) + textend;
			}
			$(key + 'message').value = $(key + 'message').value.substr(0, $(key + 'message').selectionStart) + text + $(key + 'message').value.substr($(key + 'message').selectionEnd);
			if(!moveend) {
				$(key + 'message').selectionStart = opn + strlen(text) - endlen;
				$(key + 'message').selectionEnd = opn + strlen(text) - endlen;
			}
		} else {
			text = text + textend;
			$(key + 'message').value = $(key + 'message').value.substr(0, $(key + 'message').selectionStart) + text + $(key + 'message').value.substr($(key + 'message').selectionEnd);
		}
	} else if(document.selection && document.selection.createRange) {
		var sel = document.selection.createRange();
		if(!sel.text.length && $(key + 'message').sel) {
			sel = $(key + 'message').sel;
			$(key + 'message').sel = null;
		}
		if(selappend) {
			if(textend != '') {
				text = text + sel.text + textend;
			}
			sel.text = text.replace(/\r?\n/g, '\r\n');
			if(!moveend) {
				sel.moveStart('character', -endlen);
				sel.moveEnd('character', -endlen);
			}
			sel.select();
		} else {
			sel.text = text + textend;
		}
	} else {
		$(key + 'message').value += text;
	}
	hideMenu(2);
	$j('#smilies_preview').hide();
	if(BROWSER.ie) {
		doane();
	}
}

function seditor_ctlent(event, script) {
	if(event.ctrlKey && event.keyCode == 13 || event.altKey && event.keyCode == 83) {
		eval(script);
	}
}

function loadimgsize(imgurl, editor, p) {
	var editor = !editor ? editorid : editor;
	var s = new Object();
	var p = !p ? '_image' : p;
	s.img = new Image();
	s.img.src = imgurl;
	s.loadCheck = function () {
		if(s.img.complete) {
			$(editor + p + '_param_2').value = s.img.width ? s.img.width : '';
			$(editor + p + '_param_3').value = s.img.height ? s.img.height : '';
		} else {
			setTimeout(function () {s.loadCheck();}, 100);
		}
	};
	s.loadCheck();
}

// -jt
//快速回复    直接上传图片
function seditor_fastUpload(seditorkey, tag){
	//$j("#"+seditorkey+"_file").trigger("click");
}

function seditor_fileChange(file,seditorkey){
	var imgExts = 'jpg, jpeg, gif, png',
		path = file.value,
		extpos = path.lastIndexOf('.'),
		ext = extpos == -1 ? '' : path.substr(extpos + 1, path.length).toLowerCase();
	
	if(imgExts.indexOf(ext) == -1){
		var msg = "上传失败，请选择图片文件(" + imgExts + ")";
		
		seditor_fastShow(msg);
		$j("#"+seditorkey+"_file").parent()[0].reset();
		return false;
	}	
	$j("#"+seditorkey+"_file").parent()[0].submit();
	$j("#"+seditorkey+"_file").parent()[0].reset();
}

function seditor_fastShow(msg){
	msg = msg || "上传失败";	
	//提示错误
	$j("#fastpost_tip :last-child").text(msg);
	$j("#fastpost_tip").show();
	setTimeout(function(){$j("#fastpost_tip").hide()},3000);
	
}

function seditor_fileOnLoad(){
	var STATUSMSG = {
		'-1' : '内部服务错误，可能是上传文件太大导致',
		'0' : '上传成功',
		'1' : '不支持此类扩展名文件上传',
		'2' : '服务器限制无法上传那么大的附件',
		'3' : '用户组限制无法上传那么大的附件',
		'4' : '不支持此类扩展名',
		'5' : '文件类型限制无法上传那么大的附件',
		'6' : '今日您已无法上传更多的附件',
		'7' : '请选择图片文件(jpg, jpeg, gif, png)',
		'8' : '附件文件无法保存',
		'9' : '没有正确的文件被上传',
		'10' : '您的操作有误，具体问题请与管理员联系',
		'11' : '今日您已无法上传那么大的附件'
	};

	var str = $j('#attachframe')[0].contentWindow.document.body.innerHTML;
	if(str == '') return false;
	var arr = str.split('|');
	var sizelimit = '', msg;
	if(arr[4] == 'ban') {
		sizelimit = '(附件类型被禁止)';
	} else if(arr[4] == 'perday') {
		sizelimit = '(不能超过 ' + arr[5]/1024000 + ' M)';
	} else if(arr[4] > 0) {
		sizelimit = '(不能超过 ' + arr[4]/1024000 + ' M)';
	}
	var flag = arr[0] == 'DISCUZUPLOAD' ? parseInt(arr[1]) : -1;
	//(arr[0] == 'DISCUZUPLOAD' ? parseInt(arr[1]) : -1,  sizelimit);
	if(flag !== 0){
		//提示错误
		msg = sizelimit ? sizelimit : "图片不符合规定"; //STATUSMSG[statusid] + sizelimit
		seditor_fastShow(STATUSMSG[flag] + sizelimit);
		return false;
	}
	seditor_updateImageList(arr[2]);
}
// 加载图片 
function seditor_updateImageList(aid) {
	$j.ajax({
		url:'forum.php?mod=ajax&fastupload=1&action=imagelist&aids=' + aid,
	    dataType:'json',
	    type:"GET",
	    async:false,
	    success:function(data){
			insertFastPostImgTag(data.id,data.src);
			var int = setTimeout("ifmAutoHeight('fastpostiframe')",50);//快速回复框高度自适应
			$j("#fastpostiframe").parents(".area").removeClass("defaulttext_area");//去掉输入框默认文字
		}
	})
}
/************** -jt ***********/
var initialized,allowhtml = true, allowbbcode = true, wysiwyg = 0, editbox, editwin, editdoc, textobj, editorcurrentheight = 150, postSubmited = false;

function newFastEditor(mode,initialtext) {
	var tipLogin = "tipBoxLogin";
	var fpm = "fastpostiframe";
	textobj = $("fastpostmessage");
	if($(tipLogin)){return false;}
	if($(fpm)) {
		editbox = $(fpm);
	} else {
		var iframe = document.createElement('iframe');
		iframe.frameBorder = '0';
		iframe.tabIndex = 2;
		iframe.hideFocus = true;
		iframe.allowTransparency = true;
		iframe.style.display = 'none';
		editbox = textobj.parentNode.appendChild(iframe);
		editbox.id = fpm;
	}

	editwin = editbox.contentWindow;
	editdoc = editwin.document;
	writeFastEditorContents("");
	
	setFastEditorEvents();
	//  去除 initFastEditor();
}

function writeFastEditorContents(text) {
	if(text == '' && (BROWSER.firefox || BROWSER.opera) && !BROWSER.chrome) {//排除chrome浏览器
		text = '<p></p>';
	}
	if(initialized && !(BROWSER.firefox && BROWSER.firefox >= '3' || BROWSER.opera)) {
		editdoc.body.innerHTML = text;
	} else {
		text = '<!DOCTYPE html PUBLIC "-/' + '/W3C/' + '/DTD XHTML 1.0 Transitional/' + '/EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' +
			'<html><head id="editorheader"><meta http-equiv="Content-Type" content="text/html; charset=' + charset + '" />' +
			(BROWSER.ie && BROWSER.ie > 7 ? '<meta http-equiv="X-UA-Compatible" content="IE=7" />' : '' ) +
			'<link rel="stylesheet" type="text/css" href="data/cache/style_' + STYLEID + '_wysiwyg.css?' + VERHASH + '" />' +
			(BROWSER.ie ? '<script>window.onerror = function() { return true; }</script>' : '') +
			'</head><body style="height:150px;overflow-y:hidden;visibility: visible;background:transparent;">' + text + '</body></html>';
		editdoc.designMode = 'on';
		editdoc = editwin.document;
		editdoc.open('text/html', 'replace');
		editdoc.write(text);
		editdoc.close();
		if(!BROWSER.ie) {
			var scriptNode = document.createElement("script");
			scriptNode.type = "text/javascript";
			scriptNode.text = 'window.onerror = function() { return true; }';
			editdoc.getElementById('editorheader').appendChild(scriptNode);
		}
		if(BROWSER_IS_MOBILE == 1){//快速回复框，手机中字体改为24px
			editdoc.body.style.fontSize = '24px';
		}
		editdoc.body.contentEditable = true;
		editdoc.body.spellcheck = false;
		initialized = true;
		if(BROWSER.safari) {
			editdoc.onclick = safariSel;
		}
	}

	setFastEditorStyle();

}

function safariSel(e) {
	e = e.target;
	if(e.tagName.match(/(img|embed)/i)) {
		var sel = editwin.getSelection(),rng= editdoc.createRange(true);
		rng.selectNode(e);
		sel.removeAllRanges();
		sel.addRange(rng);
	}
}

function setFastEditorStyle() {
	textobj.style.display = 'none';
	editbox.style.display = '';
	editbox.className = textobj.className;
	if(BROWSER.ie) {
		editdoc.body.style.border = '0px';
		editdoc.body.addBehavior('#default#userData');
		//try{$('subject').focus();} catch(e) {editwin.focus();}//此处会导致进入页面后自动跳到底部
	}
	if($(fastpostiframe)) {
		$(fastpostiframe).style.height = $(fastpostiframe).contentWindow.document.body.style.height = editorcurrentheight + 'px';
	}
}
function setFastEditorEvents() {
	if(editdoc.attachEvent) {
		try{
			editdoc.body.attachEvent('onmouseup', mouseUp);
			editdoc.body.attachEvent('onkeyup', keyUp);
			editdoc.body.attachEvent('onkeydown', keyDown);
			editdoc.body.attachEvent('onfocus', editFocus);
			editdoc.body.attachEvent('onblur', editBlur);
		} catch(e) {}
	}else{
		editdoc.addEventListener('mouseup', function(e) {mouseUp(e)}, true);
		editdoc.addEventListener('keyup', function(e) {keyUp(e)}, true);
		editdoc.addEventListener('keydown', function(e) {keyDown(e)}, true);
		editdoc.addEventListener('focus', function() {editFocus()}, true);
		editdoc.addEventListener('blur', function() {editBlur()}, true);
	}
}
function mouseUp(event) {
	for(i in EXTRAFUNC['mouseup']) {
		EXTRAEVENT = event;
		try {
			eval(EXTRAFUNC['mouseup'][i] + '()');
		} catch(e) {}
	}
}

function keyUp(event) {
	for(i in EXTRAFUNC['keyup']) {
		EXTRAEVENT = event;
		try {
			eval(EXTRAFUNC['keyup'][i] + '()');
		} catch(e) {}
	}
	ifmAutoHeight("fastpostiframe");
}

function keyDown(event) {
	ctlent(event);
	for(i in EXTRAFUNC['keydown']) {
		EXTRAEVENT = event;
		try {
			eval(EXTRAFUNC['keydown'][i] + '()');
		} catch(e) {}
	}
}
//快速回复框，默认文字背景
function editFocus(){//获得焦点去掉背景
	var frameBox = $j("#fastpostiframe");
	if(!frameBox){return false;}
	var hiddenBox = document.getElementById("fastposthiddenview");
	var frameBody = frameBox[0].contentWindow.document.body;
	var val = frameBody.innerHTML;
	var quote = hiddenBox.innerHTML;
	if(val == "<p></p>" && quote == "" || val == "" && quote == ""){
		//frameBox.parents(".area").removeClass("defaulttext_area");
		$j("#fastpostiframe").parents(".area").removeClass("defaulttext_area");//去掉输入框默认文字
	}
	checkFocus();
}
function editBlur(){//失去焦点添加背景
	var frameBox = $j("#fastpostiframe");
	if(!frameBox){return false;}
	var hiddenBox = document.getElementById("fastposthiddenview");
	var frameBody = frameBox[0].contentWindow.document.body;
	var val = frameBody.innerHTML;
	var quote = hiddenBox.innerHTML;
	if(val == "<p></p>"&& quote == "" || val == "" && quote == ""){
		//frameBox.parents(".area").addClass("defaulttext_area");
		//$j("#fastpostiframe").parents(".area").addClass("defaulttext_area");//输入框默认文字
	}
}
var ctlent_enable = {8:1,9:1,13:1};
function ctlent(event) {
	if(postSubmited == false && (event.ctrlKey && event.keyCode == 13) || (event.altKey && event.keyCode == 83) && editorsubmit) {
		if(in_array(editorsubmit.name, ['topicsubmit', 'replysubmit', 'editsubmit']) && !fasteditpostvalidate(editorform)) {
			doane(event);
			return;
		}
		postSubmited = true;
		editorsubmit.disabled = true;
		editorform.submit();
		return;
	}
	//注释掉下段代码解决文本中回车换行问题
	/*if(ctlent_enable[13] && event.keyCode == 13 && wysiwyg && $(editorid + '_insertorderedlist').className != 'hover' && $(editorid + '_insertunorderedlist').className != 'hover') {
		if(!BROWSER.opera) {
			insertText('<br>*', 5, 0);
                } else {
			insertText('<br> ', 5, 0);
		}
		keyBackspace();
		doane(event);
	}*/
	if(ctlent_enable[9] && event.keyCode == 9) {
		doane(event);
	}
	if(ctlent_enable[8] && event.keyCode == 8 && wysiwyg) {
		var sel = getSel();
		if(sel) {
			insertText('', sel.length - 1, 0);
			doane(event);
		}
	}
}

function getSel() {
	try {
		selection = editwin.getSelection();
		checkFocus();
		range = selection ? selection.getRangeAt(0) : editdoc.createRange();
		return readNodes(range.cloneContents(), false);
	} catch(e) {
		try {
			var range = editdoc.selection.createRange();
			if(range.htmlText && range.text) {
				return range.htmlText;
			} else {
				var htmltext = '';
				for(var i = 0; i < range.length; i++) {
					htmltext += range.item(i).outerHTML;
				}
				return htmltext;
			}
		} catch(e) {
			return '';
		}
	}
}

function insertText(text, movestart, moveend, select, sel) {
	checkFocus();
	try {
		var sel = editdoc.getSelection();
		var range = sel.getRangeAt(0);
		if(range && range.insertNode) {
			range.deleteContents();
		}
		var frag = range.createContextualFragment(text);
		var lnode = frag.lastChild;
		range.insertNode(frag);
		range.setEndAfter(lnode);
		range.setStartAfter(lnode);
		sel.removeAllRanges();
		sel.addRange(range);
	} catch(e) {
		sel = null;
		if(!isUndefined(editdoc.selection) && editdoc.selection.type != 'Text' && editdoc.selection.type != 'None') {
			movestart = false;
			editdoc.selection.clear();
		}

		if(isUndefined(sel) || sel == null) {
			sel = editdoc.selection.createRange();
			
		}
		if(BROWSER.firefox || BROWSER.opera)  {sel.innerHTML(text); } 
		sel.pasteHTML(text);

		if(text.indexOf('\n') == -1) {
			if(!isUndefined(movestart)) {
				sel.moveStart('character', -strlen(text) + movestart);
				sel.moveEnd('character', -moveend);
			} else if(movestart != false) {
				sel.moveStart('character', -strlen(text));
			}
			if(!isUndefined(select) && select) {
				sel.select();
			}
		}
	}
	checkFocus();
}

function readNodes(root, toptag) {
	var html = "";
	var moz_check = /_moz/i;

	switch(root.nodeType) {
		case Node.ELEMENT_NODE:
		case Node.DOCUMENT_FRAGMENT_NODE:
			var closed;
			if(toptag) {
				closed = !root.hasChildNodes();
				html = '<' + root.tagName.toLowerCase();
				var attr = root.attributes;
				for(var i = 0; i < attr.length; ++i) {
					var a = attr.item(i);
					if(!a.specified || a.name.match(moz_check) || a.value.match(moz_check)) {
						continue;
					}
					html += " " + a.name.toLowerCase() + '="' + a.value + '"';
				}
				html += closed ? " />" : ">";
			}
			for(var i = root.firstChild; i; i = i.nextSibling) {
				html += readNodes(i, true);
			}
			if(toptag && !closed) {
				html += "</" + root.tagName.toLowerCase() + ">";
			}
			break;

		case Node.TEXT_NODE:
			html = htmlspecialchars(root.data);
			break;
	}
	return html;
}

function checkFocus() {
	if(BROWSER.webkit){
		editwin.document.body.focus();
	}else if(BROWSER.firefox ){
		if(BROWSER.rv == "11.0"){//兼容ie11
			editwin.document.body.focus();
		}else{
			$j('#fastpostiframe').focus();
		}
	}else{
		editwin.focus();
	}
}

function insertSmiley(smilieid) {
	checkFocus();
	var src = $('smilie_' + smilieid).src;
	var code = $('smilie_' + smilieid).alt;
	insertText('<img src="' + src + '" border="0" smilieid="' + smilieid + '" alt="" />', false);
	$j("#fastpostiframe").parents(".area").removeClass("defaulttext_area");//去掉输入框默认文字
	hideMenu();
}

function getFastEditorContents() {
	return editdoc.body.innerHTML;
}

// forum post
var postpt = 0;
function fasteditpostvalidate(theform, noajaxpost) {
	var subBtnP = $j("#fastpostsubmit").parents('.normalbtn');
	if(subBtnP.hasClass('disabledgraybtn')){
		return false;
	}
	subDisableFun(subBtnP,1)	
	if(postpt) {
		return false;
	}
	postpt = 1;
	setTimeout(function() {postpt = 0}, 2000);
	noajaxpost = !noajaxpost ? 0 : noajaxpost;
	s = '';
	theform.message.value = html2bbcode(getFastEditorContents());
	if(theform.message.value == '' || theform.subject.value == '') {
		s = '抱歉，您尚未输入标题或内容';
		theform.message.focus();
	} else if(mb_strlen(theform.subject.value) > 80) {
		s = '您的标题超过 80 个字符的限制';
		theform.subject.focus();
	}
	if(!disablepostctrl && ((postminchars != 0 && mb_strlen(theform.message.value) < postminchars) || (postmaxchars != 0 && mb_strlen(theform.message.value) > postmaxchars))) {
		s = '内容太少或者太多了，请控制在' + postminchars + '~' + postmaxchars + '字节之间。论坛不欢迎无意义的简短回复，如果你只是想支持作者，请点击“支持”';
	}
	if(s) {
		tipPop("#fastpostsubmit",s,5000);
		doane();
		$('fastpostsubmit').disabled = false;
		return false;
	}
	
	// 匹配图片标识
	var rgx = /\[attachimg\]\d+\[\/attachimg\]/g, imgAttachs, imgIds = [],
		rgxsm = /\]\d+\[/, ipt, imgId,
		imgsLen, il;
	imgAttachs = theform.message.value.match(rgx);
	if(imgAttachs && imgAttachs.length > 0){
		imgsLen = imgAttachs.length;
		for(il = 0; il < imgsLen; il++){
			imgId = imgAttachs[il].replace("[attachimg]","").replace("[/attachimg]","");
			imgIds.push(imgId);
			
			var ipt = document.createElement("input");
			ipt.type = "hidden";
			ipt.name = "attachnew["+ imgId +"][description]";
			$("fastposthiddenview").appendChild(ipt);
		}
	}
	
	$('fastpostsubmit').disabled = true;
	theform.message.value = theform.message.value.replace(/([^>=\]"'\/]|^)((((https?|ftp):\/\/)|www\.)([\w\-]+\.)*[\w\-\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!]*)+\.(jpg|gif|png|bmp))/ig, '$1[img]$2[/img]');
	theform.message.value = parseurl(theform.message.value);
	if(!noajaxpost) {
		ajaxpost('fastpostform', 'fastpostreturn', 'fastpostreturn', 'onerror', $('fastpostsubmit'));
		return false;
	} else {
		return true;
	}
}

function insertFastPostImgTag(aid,src) {
	insertText('<img src="' + src + '" border="0" aid="attachimg_' + aid + '" alt="" />', false);
	
}

function removeAllChild(id){
    var div = document.getElementById(id);
    while(div.hasChildNodes()) //当div下还存在子节点时 循环继续
    {
        div.removeChild(div.firstChild);
    }
}
function ifmDelQuote(btn){
	$j(btn).live("click",function(){
		ifmDelQuoteFunc();
	})
}
function ifmDelQuoteFunc(){
	document.getElementById("fastposthiddenview").innerHTML = "";
	var form = $j("#fastpostform");//清空表单隐藏域
	form.find("input:hidden[name=reppost]").val("");
	form.find("input:hidden[name=reppid]").val("");
	form.find("input:hidden[name=noticeauthormsg]").val("");
	form.find("input:hidden[name=noticetrimstr]").val("");
	form.find("input:hidden[name=noticeauthor]").val("");
	//还原快速回复框高度
	var box = document.getElementById("fastpostiframe");
	var boxBody = box.contentWindow.document.body;
	var defaultH = 150;
	box.height = defaultH;
	boxBody.style.height = defaultH;
}
/* 快速回复框 高度自适应 */
function ifmAutoHeight(boxId){
	var box = document.getElementById(boxId);
	var boxBody = box.contentWindow.document.body;
	var defaultH = 150;
	boxBody.style.overflowY = "scroll";
	//box.height = defaultH;
	var bH = boxBody.scrollHeight,
	dH = box.contentWindow.document.documentElement.scrollHeight,
	maxH = Math.max(bH,dH),
	minH = Math.min(bH,dH);
	//boxBody.style.overflowY = "hidden";
	if(!BROWSER.ie || BROWSER.ie > 8){
		boxBody.style.overflowY = "hidden";
	}
	if(minH>defaultH){
		boxBody.style.height = minH;
		box.height = minH;
	}else{
		boxBody.style.height = defaultH;
		box.height = defaultH;
	}
}