<div id="flw_header" class="mbw bbs cl" style=" background-color:#FFFFFF; border:#e6e6e6 1px solid;">
    <div class="follow_avatar" style="position:relative;" id="follow_avatar" onmouseover="ssbb()">
        <a class="avatar" >
	<?php
        $uid = $_SESSION['u_uidss'];
        $re1 = DS('publics._get','','users',"id='".$uid."'");// var_dump($re1);
        $re2 = DS('publics._get','','user_count',"uid='$uid'");
		

        //判断用户是否设置头像
        if(empty($re1[0]['logo'])){
    ?>
        	<img src="images/course_conimg_27.png"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" />
    <?php
        }else{
    ?>
        	<img src="<?php echo($re1[0]['logo'])?>" />	
    <?php
        }
    ?>	
		<? $all1=DS('publics.get_total','','bbs_post', "authorid =$uid  "); ?>
		<? $all2=DS('publics.get_total','','user_follow', "uid = '".$uid."'"); ?>
		<? $all3=DS('publics.get_total','','user_follow', "followuid = '".$uid."'"); ?>
				
    		<span class="shadowbox_avatar"></span>
        </a>
        <script>
			function ssbb(){
				document.getElementById('follow_avatar_absolute').style.display = "block";
			}
			var oDiv=document.getElementById('follow_avatar');
			oDiv.onmouseout=function(){
				document.getElementById('follow_avatar_absolute').style.display='none';
			};		
		</script>
        <!--<div class="follow_avatar_absolute" style="display:none;" id="follow_avatar_absolute">
        	<a href="<?= URL('center.center_set')?>">修改头像</a>
        </div>  -->                     
    </div>
    <div class="broadcast" style="width:578px;_width:577px; border-left:#e6e6e6 1px solid;" >
    	<div class="broadcast_top" >
            <div class="uname_broadcast" title="用户<?= $re1[0]['realname']?>">
                <span class="inner_uname"><?= $re1[0]['realname']?></span><span class="cl"></span>
            </div>
        	<div style="float:right; padding-top:5px;">
                <span class="c">帖子</span><span class="f"><a href="<?=URL("bbsUser.my_submit",'&ccid=1')?>"><?=$all1==NULL?0:$all1?></a></span>
                <span class="c">收听</span><span class="f"><a href="<?=URL("bbsUser.my_follow",'&ccid=1')?>"><?=$all2==NULL?0:$all2?></a></span>
                <span class="c">听众</span><span class="f"><a href="<?=URL("bbsUser.my_follow",'&ccid=2')?>"><?=$all3==NULL?0:$all3?></a></span>
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
        <div id="fastpostreturn" style="margin:-5px 0 5px"></div>
        <div style=" position:relative;z-index:9;">                           
            <div id="flw_post_extra" class="mtn cl" style=" width:578px;_width:577px;">
                <div  id="fastposteditor">
                    <div class="tedt2" style="background-color:#f9f9f9; _width:576px;_overflow:hidden;">
                        <div class="area" style="background-color:#f9f9f9;" >
                        	<textarea style="height:55px;width:554px;font-size:14px; padding: 5px 0 0 20px;outline:none;" cols="70" name="message" id="fastpostmessage" value='你在做什么呢？' datatype="*" errormsg="信息不能为空"  tabindex="12" class="pt2 xs2"></textarea>
                        </div>
                        <div id="flw_bar" class="bar2" style="_width:569px;height:39px;*height:39px;" >
                          
                            <div style="float:right; margin:0px; padding:0px; width:435px;">
                                <button id="fastpostsubmit" tabindex="13" class="pn pnc" style=" float:right;" onclick="return pSubmit()">发表</button>
                                <span class="checkbox_flwbar"><label id="wrap_simcheck" class="wrap_simcheck"><em class="box_simcheck"></em><input type="checkbox" name="syncbbs" id="syncbbs" value="1" isclick='showsyncinfo' onclick="showSyncInfo(this.checked)" /><span>同步到论坛</span></label></span>
                                <div class="z ptm" id="forumlistdev" style="display: none;float:right; margin:5px 0 0 0; padding:0; background-color:#f9f9f9;height:25px; _overflow:hidden;">
								
                               <select name="forumlist" id="forumlist" class="ps z" onchange="addforumlist(this);" style="display: none;">
							   <option value="0">选择版块</option
							   ><? $plantlist = DS('publics._get','','bbs_forum','status = 1');?>
							   <? if(isset($plantlist) && !empty($plantlist)){?>
							   <? foreach($plantlist as $k=>$v){?>
							    	<option value="<?=$v['fid']?>"><?=$v['name']?></option>
							   <? }?>
							   <? }?>
							   </select>
                                    <div class="ftid"><span class="ftid" id="threadclass"></span></div>
                                </div><div class="cr"></div>
                            </div><div class="cr"></div>
                        </div>
                    </div>
                </div>
<script>
	function pSubmit(){
		var forumlist = document.getElementById('forumlist').value;
		var message = document.getElementById('fastpostmessage').value;
		var subject = document.getElementById('subject').value;
		
		var d = document.getElementById("wrap_simcheck").getAttribute("class");
		if(d.length == 30){
			if(forumlist != 0 ){
				var xmlhttp;
					if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();	
					}else{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
					}
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							if(xmlhttp.responseText == "发表成功"){
								window.location.href="<?= URL('bbsUser.my_dynamic');?>";
							}else{
								alert(xmlhttp.responseText);
							}
						}
					}
					
					xmlhttp.open("GET","<?= URL('bbsUser.send_submit_finish1',"&fid=")?>"+forumlist+'&message='+encodeURIComponent(message)+'&subject='+encodeURIComponent(subject),true);
					
					xmlhttp.send();
				}else{
					alert('请选择板块')
					}
			}else{
				var xmlhttp;
					if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();	
					}else{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
					}
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							if(xmlhttp.responseText == "发表成功"){
								window.location.href="<?= URL('bbsUser.my_dynamic');?>";
							}else{
								alert(xmlhttp.responseText);
							}
						}
					}
					
					xmlhttp.open("GET","<?= URL('bbsUser.send_submit_finish',"&fid=")?>"+forumlist+'&message='+message+'&subject='+subject,true);
					
					xmlhttp.send();
				
				}
		 
		
	}
</script>
<script type="text/javascript">
	simSelectFun("#forumlistdev select");
	boxFocusFun2("#fastposteditor textarea","#subject","#fastposteditor .tedt2","#flw_post_subject","boxfocus","boxfocus2","你在做什么呢？","主题");
	var editorid = '';
	var ATTACHNUM = {'imageused':0,'imageunused':0,'attachused':0,'attachunused':0}, ATTACHUNUSEDAID = new Array(), IMGUNUSEDAID = new Array();
</script>
</script>
<script src="js/bbsjs/handlers.js" type="text/javascript"></script>
<script src="js/bbsjs/fileprogress.js" type="text/javascript"></script>
                <div class="upfl">
                	<div id="attachlist" class="fieldset flash cl"><span style="font-size:0"></span></div>
                </div>
            </div>
            <div id="flw_post_subject" style="display:none;_width:596px;" >
                <span id="flw_checklen" class="float_number" ></span>
                <input type="text" id="subject" name="subject" value="主题" onkeyup="strLenCalc(this, 'checklen', 70);" tabindex="11" style="font-size:14px;"  />
            </div>
        </div>  
        <!--</form>-->
    </div>
<script type="text/javascript">
	var nofollowfeed = 0;
	var userdatakey = cookiepre+'fastpost9607427';
	function showSyncInfo(flag) {
		if(flag){
			document.getElementById("wrap_simcheck").setAttribute("class","wrap_simcheck checked_simcheck");
			document.getElementById("forumlistdev").style.display = ""
			document.getElementById("flw_post_subject").style.display = ""
		}else{
			document.getElementById("wrap_simcheck").setAttribute("class","wrap_simcheck");
			document.getElementById("forumlistdev").style.display = "none"
			document.getElementById("flw_post_subject").style.display = "none"
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
							if(el.options.length < 2) {modifyformurl(0);}
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