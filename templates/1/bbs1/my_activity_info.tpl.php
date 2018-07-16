<!--Header-->
<?= TPL :: display('bbs/head_basicInfo')?>
<body id="nv_home" class="pg_spacecp" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="hd">                   
	<?php
		//头部导航 
		TPL :: display("bbs/hd");
		$uid = $_SESSION['u_uidss'];
    	$re = DS('publics.get_info','','users',"id='".$uid."'");
		$username = $re[0]['username'];
		$date = DS('publics._get','','user_info1','uid='.$uid);	
	?>
</div>                
<div id="wp" class="wp">

	<!--右侧导航开始-->
	<div class="back_left bdl ">
		<dl class="a" id="lf_">
			<dt>个人中心</dt>
			<dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
			<dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
			<?php /*?><dd  ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd><?php */?>
			<dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
			<?php /*?><dd  class="bdl_a" ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd>	<?php */?>			
            <dd ></dd><dd ><div style="height:18px; width:100%;"></div></dd>
		</dl>
	</div>
    <!--右侧导航结束-->
    
	<ul class="main_wp settinglist">
       <li class="items_setlist a" style="border:none;"><a class="stitle"><span>个人资料</span><span class="collapsed"></span></a></li>	
        <li>
        	<div>
				<ul class="tb cl">
            		<li ><a href="<?= URL('bbsUser.my_basic_info')?>">基本资料</a></li>
            		<li ><a href="<?= URL('bbsUser.my_profession_info')?>">职业信息</a></li>
            		<li  class="a"><a href="<?= URL('bbsUser.my_activity_info')?>">活动信息</a></li>
            		<li ><a href="<?= URL('bbsUser.my_info')?>">个人信息</a></li>
    			</ul><iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
				<form  enctype="multipart/form-data" method="post" action="<?=URL('bbs2.insrtsa','&staue=2')?>">
<input type="hidden" name="formhash" value="87a364a4">
<table cellspacing="0" cellpadding="0" id="profilelist" class="profile_setlist input_w_316">
<tbody><tr>
<th>用户名</th>
<td><?=$username?></td>
<td>&nbsp;</td>
</tr>                    	<tr class="select_w_316" id="tr_realname">
                        <th id="th_realname">真实姓名</th>
<td id="td_realname">
<input type="text" tabindex="1" value="<?=$date[0]['truename']?>" class="px" id="realname" name="date[truename]"><div id="showerror_realname" class="rq mtn"></div><p class="d"></p></td>
</tr>
                    	<tr class="select_w_316" id="tr_idcard">
                        <th id="th_idcard">证件号</th>
<td id="td_idcard">
<input type="text" tabindex="1" value="<?=$date[0]['ssr']?>" class="px" id="idcard" name="date[ssr]"><div id="showerror_idcard" class="rq mtn"></div><p class="d"></p></td>
</tr>
                    	<tr class="select_w_316" id="tr_idcardtype">
                        <th id="th_idcardtype">证件类型</th>
<td id="td_idcardtype">
<input type="text" tabindex="1" value="<?=$date[0]['ssr_document1']?>" class="px" id="idcardtype" name="date[ssr_document1]"><div id="showerror_idcardtype" class="rq mtn"></div><p class="d"></p></td>
</tr>

<!--<tr class="select_w_316" id="tr_privacy">
<th id="th_privacy">隐私保护</th>
<td id="td_privacy">
<span class="simselect"><strong><? 
	if($date[0]['show2'] == 0){
		echo '公开';
	}else if($date[0]['show2'] == 3){
		echo '保密';
	}else if($date[0]['show2'] == 1){
		echo '好友可见';
		} 
?>

</strong><em class="arrow_dark"></em><select id="" name="date[show3]">
<option value="0">公开</option>
<?php /*?><option selected="selected" value="1">好友可见</option><?php */?>
<option value="3">保密</option>
</select><ul style="width:95px;" class="selectbox_simu"><li><a attribute="0">公开</a></li><?php /*?><li><a attribute="1">好友可见</a></li><?php */?><li style="border:none;"><a attribute="3">保密</a></li></ul></span>
</td>
</tr>-->

<tr>
<td class="btnbar_setlist" colspan="3">
<input type="hidden" value="true" name="profilesubmit">
<button class="normalbtn bluebtn" value="true" id="profilesubmitbtn" name="profilesubmitbtn" type="submit"><strong>保存</strong></button>
<span class="rq" id="submit_result"></span>
</td>
</tr>
</tbody></table>
</form>
<script>  
    function infoSubmit(){
		document.getElementById('profilesubmitbtn').style.display="none";
		document.getElementById('profilesubmitbtn1').style.display="";
		var realname = document.getElementById('realname').value;//alert(bio);
		var idcard = document.getElementById('idcard').value;//alert(interest);
		var idcardtype = document.getElementById('idcardtype').value;//alert(idcardtype);
		var privacy3 = document.getElementById('privacy3').value;//alert(privacy3);
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();	
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 	
		}
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(xmlhttp.responseText == "1" || xmlhttp.responseText == "2"){
					window.location.href = "<?= URL('bbsUser.my_activity_info')?>";			
				}else{
					alert(xmlhttp.responseText);
					document.getElementById('profilesubmitbtn1').style.display="none";
					document.getElementById('profilesubmitbtn').style.display="";
				}
			}	
		}
		xmlhttp.open("GET","<?= URL('bbsUser.saveUserInfo',"&username=$username&realname=")?>"+realname+"&iid=3&idcard="+idcard+"&idcardtype="+idcardtype+"&privacy3="+privacy3,true);
		xmlhttp.send();					
	}
</script>
<script type="text/javascript">
	simSelectFun(".profile_setlist select");
	function show_error(fieldid, extrainfo) {
		var elem = $('th_'+fieldid);
		if(elem) {
			elem.className = "rq";
			fieldname = elem.innerHTML;
			extrainfo = (typeof extrainfo == "string") ? extrainfo : "";
			$('showerror_'+fieldid).innerHTML = "请检查该资料项 " + extrainfo;
			$(fieldid).focus();
		}
	}
	function show_success(message) {
		message = message == '' ? '资料更新成功' : message;
		showDialog(message, 'right', '提示信息', function(){
		top.window.location.href = top.window.location.href;
		}, 0, null, '', '', '', '', 3);
	}
	function clearErrorInfo() {
		var spanObj = $('profilelist').getElementsByTagName("div");
		for(var i in spanObj) {
			if(typeof spanObj[i].id != "undefined" && spanObj[i].id.indexOf("_")) {
				var ids = explode('_', spanObj[i].id);
				if(ids[0] == "showerror") {
					spanObj[i].innerHTML = '';
					$('th_'+ids[1]).className = '';
				}
			}
		}
	}
</script>
			</div>
		</li>
	</ul>
</div>
<? TPL :: display("bbs/footer");?>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>