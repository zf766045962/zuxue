<div id="flw_header" class="mbw bbs cl" style=" background-color:#FFFFFF; border:#e6e6e6 1px solid;">
    <div class="follow_avatar" style="position:relative;"  >
        <a class="avatar" href="<?= URL('bbsUser.my_avatar')?>">
            <img src="images/w200h200.jpg"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" />			
            <span class="shadowbox_avatar"> </span>
        </a>
        <div class="follow_avatar_absolute" style="display:none;">
            <a href="<?= URL('bbsUser.my_avatar')?>">修改头像</a>
        </div>                       
    </div>
    <div class="broadcast" style="width:578px;_width:577px; border-left:#e6e6e6 1px solid;" >
    	<div class="broadcast_top" >
            <div class="uname_broadcast" title="用户38429708">
                <span class="inner_uname">用户38429708</span>
                <span class="cl"></span>
            </div>
        	<div style="float:right; padding-top:5px;">
                <span class="c">广播</span><span class="f"><a href="<?= URL('')?>">0</a></span>
                <span class="c">收听</span><span class="f"><a href="#">2</a></span>
                <span class="c">听众</span><span class="f"><a href="#">0</a></span>
            </div>
        	<div class="cr"></div>
    	</div>
<script src="js/bbsjs/forum.js" type="text/javascript"></script>
<script src="js/bbsjs/forum_moderate.js" type="text/javascript"></script>
<script type="text/javascript">
	var postminchars = parseInt('0');
	var postmaxchars = parseInt('50000');
	var disablepostctrl = parseInt('0');
</script>
    	<form method="post" autocomplete="off" id="fastpostform" action="home.php?mod=spacecp&amp;ac=follow&amp;op=newthread&amp;topicsubmit=yes&amp;infloat=yes&amp;handlekey=fastnewpost&amp;inajax=1" onsubmit="return fastpostvalidate(this);" >
        	<div id="fastpostreturn" style="margin:-5px 0 5px"></div>
        	<div style=" position:relative;z-index:9;">                           
				<div id="flw_post_extra" class="mtn cl" style=" width:578px;_width:577px;">
					<div  id="fastposteditor">
						<div class="tedt2" style="background-color:#f9f9f9; _width:576px;_overflow:hidden;">
							<div class="area" style="background-color:#f9f9f9;" ><textarea style="height:55px;width:554px;font-size:14px; padding: 5px 0 0 20px;outline:none;" cols="70" name="message" id="fastpostmessage" value='你在做什么呢？' onKeyDown="seditor_ctlent(event, '$(\'fastpostsubmit\').click()');" tabindex="12" class="pt2 xs2"></textarea></div>
							<div id="flw_bar" class="bar2" style="_width:569px;height:39px;*height:39px;" >
    							<div style="float:left; width:120px; margin-top:8px;">
        							<div class="fpd">
            							<a href="javascript:;" class="fsml" title="表情" id="fastpostsml" onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;"><em></em></a>
<script type="text/javascript" reload="1">smilies_show('fastpostsmiliesdiv', 8, 'fastpost');</script>
									</div>
<script src="js/bbsjs/seditor.js" type="text/javascript"></script>
<script type="text/javascript" reload="1"> wysiwyg = undefined;</script>
    							</div>
    							<div style="float:right; margin:0px; padding:0px; width:435px;">
        							<button type="submit" name="topicsubmit_btn" id="fastpostsubmit" value="topicsubmitbtn" tabindex="13" class="pn pnc" style=" float:right;" >发表</button>
        							<span class="checkbox_flwbar"><label id="wrap_simcheck" class="wrap_simcheck"><em class="box_simcheck"> </em><input type="checkbox" name="syncbbs" id="syncbbs" value="1" isclick='showsyncinfo' onclick="showSyncInfo(this.checked)" /><span>同步到论坛</span></label></span>
        							<div class="z ptm" id="forumlistdev" style="display: none;float:right; margin:5px 0 0 0; padding:0; background-color:#f9f9f9;height:25px; _overflow:hidden;">
										<select name="forumlist" id="forumlist" class="ps z" onchange="addforumlist(this);" style="display: none;"><option value="0">选择版块</option><optgroup label="--魅族公司"></optgroup><optgroup label="--魅族产品"><option value="22">产品讨论</option><option value="62">资源分享</option></optgroup><optgroup label="--科技海岸"><option value="103">玩机达人</option><option value="110">科技前沿</option></optgroup><optgroup label="--社区生活"><option value="104">魅友家大本营</option><option value="10">魅友广场</option><option value="84">摄影天地</option><option value="20">二手交易</option></optgroup><optgroup label="--社区建设"><option value="13">社区办公室</option><option value="47">投诉与处罚</option><option value="29">魅币兑换</option></optgroup><optgroup label="--代理商版块"><option value="136">商家活动</option></optgroup></select>
            							<div class="ftid"><span class="ftid" id="threadclass"></span></div>
         							</div>
        							<div class="cr"></div>
    							</div>
    							<div class="cr"></div>
							</div>
						</div>
					</div>
<script type="text/javascript">
	simSelectFun("#forumlistdev select");
	boxFocusFun2("#fastposteditor textarea","#subject","#fastposteditor .tedt2","#flw_post_subject","boxfocus","boxfocus2","你在做什么呢？","主题");
	var editorid = '';
    var ATTACHNUM = {'imageused':0,'imageunused':0,'attachused':0,'attachunused':0}, ATTACHUNUSEDAID = new Array(), IMGUNUSEDAID = new Array();
</script>
<script src="js/bbsjs/handlers.js" type="text/javascript"></script>
<script src="js/bbsjs/fileprogress.js" type="text/javascript"></script>
        			<div class="upfl">
                    	<div id="attachlist" class="fieldset flash cl"><span style="font-size:0"></span></div>
					</div>
        			<div class="mtm sec">
						<input name="sechash" type="hidden" value="So6X8130" />验证码 
            			<span id="seccodeSo6X8130" onclick="showMenu(this.id)"><input name="seccodeverify" id="seccodeverify_So6X8130" type="text" autocomplete="off" style="ime-mode:disabled;width:100px" class="txt px vm" onblur="checksec('code', 'So6X8130')" tabindex="1" /><span id="seccode_So6X8130_secshow" class="seccode_image" ></span><a href="javascript:;" onclick="updateseccode5('So6X8130','follow_rebroadcast');doane(event);" class="xi2">换一个</a><span id="checkseccodeverify_So6X8130" class="seccheck_status"><img src="images/none.gif" width="16" height="16" class="vm" /></span></span>
            			<div id="seccodeSo6X8130_menu" class="p_pop p_opt" style="display:none">
            				<span id="seccode_So6X8130"></span>
<script type="text/javascript" reload="1">updateseccode5('So6X8130','follow_rebroadcast');</script>
						</div>
					</div>
                    <input type="hidden" name="formhash" value="4ab54a0d" />
                    <input type="hidden" name="usesig" value="" />
                    <input type="hidden" name="adddynamic" value="1" />
                    <input type="hidden" name="addfeed" value="1" />
                    <input type="hidden" name="topicsubmit" value="true" />
                    <input type="hidden" name="referer" value="http://localhost:8002/" />
    			</div>
    			<div id="flw_post_subject" style="display:none;_width:596px;" >
                    <span id="flw_checklen" class="float_number" >
                        <span id="checklen" class="xg1">70</span>
                    </span>
        			<input type="text" id="subject" name="subject" value="主题" onkeyup="strLenCalc(this, 'checklen', 70);" tabindex="11" style="font-size:14px;"  />
    			</div>
			</div>  
            </form>
		</div>
<script type="text/javascript">
var nofollowfeed = 0;
var userdatakey = cookiepre+'fastpost9607427';
function showSyncInfo(flag) {
if(flag){
document.getElementById("wrap_simcheck").setAttribute("class","wrap_simcheck checked_simcheck");
}else{
document.getElementById("wrap_simcheck").setAttribute("class","wrap_simcheck");
}
display('flw_post_subject');
display('forumlistdev');

var sObj = $('subject');
sObj.value = '';
strLenCalc(sObj, 'checklen', 70);
}
function fastpostvalidateextra() {
var sObj = $('subject');
if(!$('syncbbs').checked) {
$('subject').value = '  ';
}
return true;
}
function backupContent() {
var obj = $('fastpostform');
if(!obj) return;
var data = subject = message = '';
saveUserdata(userdatakey, data);
for(var i = 0; i < obj.elements.length; i++) {
var el = obj.elements[i];
if(el.name != '' && el.tagName == 'SELECT') {
var elvalue = el.value;
if(trim(elvalue)) {
data += el.name + String.fromCharCode(9) + el.tagName + String.fromCharCode(9) + el.type + String.fromCharCode(9) + elvalue + String.fromCharCode(9, 9);
if(el.tagName == 'SELECT' && el.name == 'defaultforum') {
var values = {};
for(var j = 0; j < el.options.length; j++) {
var option = el.options[j];
var ov = parseInt(option.value);
if(typeof values[option.value] == 'undefined' && !isNaN(ov) && option.innerText != '' && option.innerText != 'undefined') {
data += el.name + String.fromCharCode(9) + option.tagName + String.fromCharCode(9) + option.value + String.fromCharCode(9) + option.text + String.fromCharCode(9, 9);
values[option.value] = option.value;
}
}
}
}
}
}
saveUserdata(userdatakey, data);
}
function addforumlist(listObj) {
var fid = listObj.value;
if(fid) {
var dforum = $('fid');
//判断是否已经在列表中
var haveoption = false;
for(var i = 0; i < dforum.options.length; i++) {
if(dforum.options[i].value == fid) {
dforum.selectedIndex = i;
haveoption = true;
break;
}
}
if(!haveoption) {
var option = listObj.options[listObj.selectedIndex];
var oOption = document.createElement("OPTION");
oOption.text = trim(option.text);
oOption.value = option.value;
dforum.options.add(oOption);
dforum.selectedIndex = dforum.options.length-1;
}

modifyformurl(fid);
}
dforum.style.display = '';
listObj.style.display = 'none';
}
function modifyformurl(mfid) {
if(parseInt(mfid)) {
backupContent();
//noteX 修改表单中的两个固定地址
$('fastpostform').action = 'home.php?mod=spacecp&ac=follow&op=newthread&topicsubmit=yes&infloat=yes&handlekey=fastnewpost&inajax=1&fid='+mfid;
if(upload) {
fid = mfid;
var uploadurl = '/misc.php?mod=swfupload&action=swfupload&operation=upload&fid='+mfid;
upload.setUploadURL(uploadurl);
}
getthreadclass();
} else {
var flist = $('forumlist');
var dforum = $('fid');
dforum.style.display = 'none';
flist.style.display = '';
}

}


function resumeContent() {
var data = loadUserdata(userdatakey);
if(in_array((data = trim(data)), ['', 'null', 'false', null, false])) {
modifyformurl(108);
return false;
}
var data = data.split(/\x09\x09/);
var formObj = $('fastpostform');
var sValue = 0;
for(var i = 0; i < formObj.elements.length; i++) {
var el = formObj.elements[i];
if(el.name != '' && el.tagName == 'SELECT') {
for(var j = 0; j < data.length; j++) {
var ele = data[j].split(/\x09/);
if(ele[0] == el.name) {
elvalue = !isUndefined(ele[3]) ? ele[3] : '';
if(ele[1] == 'SELECT') {
//添加选项
var values = {0:0,108:108};
for(var oi = 0; oi < data.length; oi++) {
var oObj = data[oi].split(/\x09/);
if(oObj[0] == el.name && oObj[1] == 'OPTION' && typeof values[oObj[2]] == 'undefined') {
var oOption = document.createElement("OPTION");
el.options.add(oOption);
oOption.text = oObj[3];
values[oObj[2]] = oOption.value = oObj[2];
if(elvalue == oObj[2]) {
el.selectedIndex = el.options.length-1;
modifyformurl(elvalue);
}
}
}
if(el.options.length < 2) {
modifyformurl(0);
}

}
break
}
}
}
}
}
function succeedhandle_fastnewpost(url, msg, values) {
if(nofollowfeed) {
window.location.reload();
} else {
if(parseInt(values.feedid)) {
getNewFollowFeed(values.tid, values.fid, values.pid, values.feedid);
} else {
showDialog(msg, 'notice', null, null, 0, null, null, null, null, 3);
}
showCreditPrompt();
//清空上次的输入
var sObj = $('subject');
$('attachlist').innerHTML = $('fastpostmessage').value = sObj.value = '';
strLenCalc(sObj, 'checklen', 70);
if(values.sechash) {
updatesecqaa(values.sechash);
updateseccode(values.sechash);
$('seccodeverify_'+values.sechash).value='';
}
//var msg = '您的主题已发布，<a href="'+url+'" class="xi2">点击这里查看主题</a>'
//showDialog(msg, 'notice', null, null, 0, null, null, null, null, 3);
}

}
function getNewFollowFeed(tid, fid, pid, feedid) {
var x = new Ajax();
x.get('forum.php?mod=ajax&action=getpostfeed&inajax=1&tid='+tid+'&fid='+fid+'&pid='+pid+'&feedid='+feedid, function(s){
newli = document.createElement("li");
newli.innerHTML = s;
var listObj = $('followlist');

listObj.insertBefore(newli, listObj.firstChild);
});
}

resumeContent();

function cleartitle(obj) {
if($('flw_post_subject').style.display== 'none') {
var sObj = $('subject');
sObj.value = '';
strLenCalc(sObj, 'checklen', 70);
obj.innerHTML = '添加标题';
} else {
obj.innerHTML = '自动截取标题';
}
}
</script>
				</div>