<!--Header-->
<?= TPL :: display('bbs/head_basicInfo')?>
<body id="nv_home" class="pg_spacecp" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
	<?php
		//头部导航
		TPL :: display("bbs/hd");
		$uid = $_SESSION['u_uidss'];
		$re = DS('publics.get_info','','users',"id='".$uid."'");
		$username = $re[0]['username'];
	?>
</div>                
<div id="wp" class="wp">

	<!--右侧导航开始-->
	<div class="back_left bdl ">
    	<dl class="a" id="lf_">
			<dt>个人中心</dt>
			<dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
			<dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
			<dd ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
			<dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
			<?php /*?><dd class="bdl_a"><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd ></dd><?php */?>
			<dd ><div style="height:18px; width:100%;"></div></dd>
		</dl>
	</div>
    <!--右侧导航结束-->
    
	<ul class="main_wp settinglist">
        <li class="items_setlist a" style="border:none;" ><a class="stitle" href="home.php?mod=spacecp&amp;ac=profile"><span>个人资料</span><span class="collapsed" ></span></a><span class="itemicon_setlist"> </span></li>	
    	<li>
    		<div>
                <ul class="tb cl">
                    <li ><a href="<?= URL('bbsUser.my_basic_info')?>">基本资料</a></li>
                    <li  class="a"><a href="<?= URL('bbsUser.my_profession_info')?>">职业信息</a></li>
                    <li ><a href="<?= URL('bbsUser.my_activity_info')?>">活动信息</a></li>
                    <li ><a href="<?= URL('bbsUser.my_info')?>">个人信息</a></li>
                </ul>
        <iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
        <form action="<?= URL('bbsUser.saveUserInfo',"&username=$username&iid=2")?>" method="post" id="frm" enctype="multipart/form-data">
<table cellspacing="0" cellpadding="0" class="profile_setlist input_w_316" id="profilelist">
	<tr>
		<th>用户名</th>
		<td>用户<?= $username?></td>
		<td>&nbsp;</td>
	</tr>                    	
    <tr id="tr_education" class="select_w_316">
		<th id="th_education">学历</th>
		<td id="td_education">
			<select name="education" id="education" class="ps" tabindex="1" ischange="true">
            <?php
            	if(empty($re1[0]['education'])){
			?>
            <option value="" selected>其它</option>
            <option value="1">小学</option><option value="2">中学</option><option value="3">专科</option><option value="4">本科</option><option value="5">硕士</option><option value="6">博士</option>
            <?php
				}else if($re1[0]['education'] == 1){
			?>
            <option value="0" >其它</option>
            <option value="1" selected>小学</option><option value="2">中学</option><option value="3">专科</option><option value="4">本科</option><option value="5">硕士</option><option value="6">博士</option>
            <?php
				}else if($re1[0]['education'] == 2){
			?>
            <option value="0" >其它</option>
            <option value="1" >小学</option><option value="2" selected>中学</option><option value="3">专科</option><option value="4">本科</option><option value="5">硕士</option><option value="6">博士</option>
            <?php
				}else if($re1[0]['education'] == 3){
			?>
            <option value="0" >其它</option>
            <option value="1" >小学</option><option value="2">中学</option><option value="3" selected>专科</option><option value="4">本科</option><option value="5">硕士</option><option value="6">博士</option>
            <?php
				}else if($re1[0]['education'] == 4){
			?>
            <option value="0" >其它</option>
            <option value="1" >小学</option><option value="2">中学</option><option value="3">专科</option><option value="4" selected>本科</option><option value="5">硕士</option><option value="6">博士</option>
            <?php
				}else if($re1[0]['education'] == 5){
			?>
            <option value="" >其它</option>
            <option value="1" >小学</option><option value="2">中学</option><option value="3">专科</option><option value="4" >本科</option><option value="5" selected>硕士</option><option value="6">博士</option>
            <?php
				}else if($re1[0]['education'] == 6){
			?>
            <option value="" >其它</option>
            <option value="1" >小学</option><option value="2">中学</option><option value="3">专科</option><option value="4" >本科</option><option value="5">硕士</option><option value="6" selected>博士</option>
            <?php
				}
			?>
            </select>
			<div class="rq mtn" id="showerror_education"></div><p class="d"></p>
		</td>
	</tr>
	<tr id="tr_graduateschool" class="select_w_316">
		<th id="th_graduateschool">毕业学校</th>
		<td id="td_graduateschool">
			<input type="text" name="graduateschool" id="graduateschool" class="px" value="<?= empty($re1[0]['graduateschool'])?'':$re1[0]['graduateschool']?>" tabindex="1" />
            <div class="rq mtn" id="showerror_graduateschool"></div><p class="d"></p>
		</td>
	</tr>
	<?php
    	if(empty($re1[0]['privacy2'])){
	?>
    <tr id="tr_privacy" class="select_w_316"><th id="th_privacy">隐私保护</th><td id="td_privacy"><select name="privacy2"><option value="0" selected="selected">公开</option><option value="1">好友可见</option><option value="3">保密</option></select></td></tr>
    <?php
		}else if($re1[0]['privacy2'] == 1){
	?>
    <tr id="tr_privacy" class="select_w_316"><th id="th_privacy">隐私保护</th><td id="td_privacy"><select name="privacy2"><option value="0">公开</option><option value="1" selected="selected">好友可见</option><option value="3">保密</option></select></td></tr>
    	<?php
        	}else{
		?>
        <tr id="tr_privacy" class="select_w_316"><th id="th_privacy">隐私保护</th><td id="td_privacy"><select name="privacy2"><option value="0">公开</option><option value="1">好友可见</option><option value="3" selected="selected">保密</option></select></td></tr>
        <?php
			}
		?>
		<tr><td colspan="3" class="btnbar_setlist"><button id="profilesubmitbtn" class="normalbtn bluebtn" onclick='copy()'/><strong>保存</strong></button><span id="submit_result" class="rq"></span></td></tr>
	</tr>
</table>
	</form>
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
<script>
	function copy()
	{
		var frm = document.getElementById('frm');
		frm.submit();
	}
</script>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<? TPL :: display("bbs/footer");?>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>