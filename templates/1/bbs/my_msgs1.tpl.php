<?= TPL :: display('bbs/head_msgs')?>
<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
	<? TPL :: display("bbs/hd");?>
</div>               
<div id="wp" class="wp">
	<div id="ct" class="ct2_a wp cl">
		<div class="back_left bdl ">
        	<dl class="a" id="lf_">
				<dt>个人中心</dt>
                <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
                <dd  ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
                <dd  class="bdl_a"><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
                <?php /*?><dd  ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><?php */?>
                <dd  ></dd><dd ><div style="height:18px; width:100%;"></div></dd>
            </dl>
		</div>
		<div class="mn cont_wp wp_space_pm float_l">
			<div class="bm bw0 space">
        		<div class="page_frame_navigation" >
                    <div class="follow_feed_cover" style="left:22px;" ></div>
                    <ul class="tb cl page_frame_ul" style="padding-left:20px;">
                        <li class="a" ><a href="<?= URL('bbsUser.my_msgs')?>">个人消息</a></li>
                        <li><a href="<?= URL('bbsUser.my_msgs')?>">系统消息</a></li>
                        <li  ><a href="<?= URL('bbsUser.my_notice')?>">提醒</a></li>
                    </ul>
                </div>                        
                <div id="deletepmform">
					<div class="pagebar_space">
                        <label id="checkAllPm" for="delete_all" class="but1 pn normalbtn graybtn" style="padding:7px 8px;" onClick="checkall();"><span style="display:none;" ><input type="checkbox" name="chkall" id="delete_all" class="pc" onClick="allce()" /></span><strong>全选</strong></label>
						<em id="de"><span class="normalbtn graybtn disabledgraybtn" style="margin-left:20px;"<button id="deletePm" class="pn but1 disabledgraybtn" type="submit" name="deletepmsubmit_btn" value="true"><strong>删除</strong></button></span></em>
						<em id="de1" style="display:none" onClick="ded1()"><span class="normalbtn graybtn" style="margin-left:20px;"<button id="deletePm1" class="pn but1 disabledgraybtn" type="submit" name="deletepmsubmit_btn" value="true"><strong>删除</strong></button></span></em>
						<span class="normalbtn graybtn" style="margin-left:20px;"><button class="pn but1" type="button" name="markreadpm_btn" value="true" onClick="setpmstatus(this.form);"><strong>标记已读</strong></button></span>
						<a class="normalbtn bluebtn" style="float:right;" href="<?= URL('bbsUser.send_msg')?>" target="_blank" ><strong>发消息</strong></a><div class="cr"></div>			
					</div>
                    <div class="xld xlda pml mtm mbm">
					<script>
						function de1(){
							var checklist = document.getElementsByName ("deletepm_deluid");
						
							 for(var i=0;i<checklist.length;i++)
								   {
									  if(checklist[i].checked == 1){
										  var ss = 1
										  }
								   }
							if(ss == 1){
								document.getElementById('de1').style.display = "";
								document.getElementById('de').style.display = "none";
								}else{
								document.getElementById('de1').style.display = "none";
								document.getElementById('de').style.display = "";
								}
							}
						function allce(){  
								var checklist = document.getElementsByName ("deletepm_deluid");
								   if(document.getElementById("delete_all").checked)
								   {
									document.getElementById('de1').style.display = "";
									document.getElementById('de').style.display = "none";	   
								   for(var i=0;i<checklist.length;i++)
								   {
									  checklist[i].checked = 1;
								   }
								 }else{
									document.getElementById('de1').style.display = "none";
									document.getElementById('de').style.display = ""; 
								  for(var j=0;j<checklist.length;j++)
								  {
									 checklist[j].checked = 0;
								  }
								 }
							} 		
					</script>
                    <?php
                    	if(!empty($re)){
							foreach($re as $pk => $pv){
								$re1 = DS('publics._get','','users',"username='".$pv['fusername']."'");
								
					?>
						<dl id="pmlist_<?= $re1[0]['id']?>" class="bbda cur1 cl">
							<dd class="m avt">
								<div class="o"  >
									<span style="display:block;"><input type="checkbox" name="deletepm_deluid" id="a_delete_<?= $pv['id']?>" class="pc" value="<?=$pv['id']?>"  onClick="de1()" /></span>
                                    <span class="box_simcheck"></span>
								</div>
								<div class="im" style="position:relative">
									<a href="<?= URL('bbsUser.user_broadcast',"&id=".$re1[0]['id']."")?>" target="_blank" class="avatar">
                                    	<?php
                                        	if(empty($re1[0]['head_img'])){
										?>
                                       	<img src="images/w100h100.jpg" />
                                        <?php
											}else{
										?>
                                        <img src="<?= $re1[0]['head_img']?>" />
                                        <?php
											}
										?>
                                         <span class="shadowbox_avatar"> </span>
                                    </a>
								</div>
							</dd>
							<dd class="ptm pm_c">发给&nbsp;<a class="name_pmlist" href="<?= URL('bbsUser.user_broadcast',"&id=".$re1[0]['id']."")?>" target="_blank">用户<?= $pv['fusername']?></a><span class="xg1"><span title="<?= date("Y-m-d H:i:s",$pv['sendTime'])?>"><?= date("Y-m-d H:i:s",$pv['sendTime'])?></span></span><br><p><?= $pv['message']?></p></dd>
							<div class="cr"></div>
                            <div class="mtop10 operation" >
								<div class="y msg_btnbar">
                                   <a href="javascript:;" onClick="del_msgs(<?= $pv['id']?>)">删除</a>
                                </div>
								<div class="cr"></div>
							</div> 
						</dl>
                    <?php
							}
						}else{
					?>
                  <div class="bm bw0 pgs cl pagebar"></div>
                    <?php
							}
					?>
					</div>
					<div class="pgs pbm cl pagebar"></div>
                </div>
<script type="text/javascript">
	addBlockLink('deletepmform', 'dl');
</script>
<script>
	function ded1(){
		var checklist = document.getElementsByName ("deletepm_deluid");
		var dd = new Array();
		for(var i=0;i<checklist.length;i++){
			if(checklist[i].checked != false){
				dd[i] = checklist[i].value;
			}
		}				
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				location.href=''
			}	
		}
		xmlhttp.open("GET","<?= URL('bbs2.de',"&id")?>"+dd,true);
		xmlhttp.send();			   
	}
	function del_msgs(id){
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(xmlhttp.responseText == "成功删除"){
					window.location.href="<?= URL('bbsUser.my_msgs');?>";
				}else{
					alert(xmlhttp.responseText);
				}	
			}	
		}
		xmlhttp.open("GET","<?= URL('bbsUser.del_msgs',"&id")?>"+id,true);
		xmlhttp.send();	
	}
</script>
			</div>
		</div>
	</div>
<script type="text/javascript">
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();	
	public.box_simcheck('pc');
	hoverAdd(".cont_msgdetail","conth_msgdetail")
	showBox('#msgSettingBtn','#msgSetting',560,560,true,true)
	focusBox(".cont_msgset textarea");
	checkFun(".wrap_simcheck","checked_simcheck");
	checkControlBtn("#checkAllPm","#deletepmform .checked_simcheck","#deletePm","disabledgraybtn","#deletepmform");
	checkControlBtn("#deletepmform .box_simcheck","#deletepmform .checked_simcheck","#deletePm","disabledgraybtn","#deletepmform");
</script>
<script type="text/javascript">
	var page = 1;
	var gid = -1;
	var showNum = 0;
	var haveFriend = true;
	function getUser(pageId, gid) {
		page = parseInt(pageId);
		gid = isUndefined(gid) ? -1 : parseInt(gid);
		var x = new Ajax();
		x.get('home.php?mod=spacecp&ac=friend&op=getinviteuser&inajax=1&page='+ page + '&gid=' + gid + '&' + Math.random(), function(s) {
		var data = eval('('+s+')');
		var singlenum = parseInt(data['singlenum']);
		var maxfriendnum = parseInt(data['maxfriendnum']);
		fs2.addDataSource(data, clearlist2);
		haveFriend = singlenum && singlenum == 20 ? true : false;
		if(singlenum && fs2.allNumber < 20 && fs2.allNumber < maxfriendnum && maxfriendnum > 20 && haveFriend) {
			page++;
			getUser(page);
		}
	});
	}
	function selector() {
		var parameter = {'searchId':'ignoreName','searchWpId':'ignoreNameWp', 'showId':'friends', 'formId':'', 'showType':3, 'handleKey':'fs2', 'selBox':'selectorBox', 'selBoxMenu':'showSelectBox_menu', 'maxSelectNumber':'20', 'selectTabId':'selectNum', 'unSelectTabId':'unSelectTab', 'maxSelectTabId':'remainNum'};
		fs2 = new friendSelector(parameter);
		var listObj = $('selBox');
		listObj.onscroll = function() {
		clearlist2 = 0;
		if(this.scrollTop >= this.scrollHeight/5) {
			page++;
			gid = isUndefined(gid) ? -1 : parseInt(gid);
			if(haveFriend) {
				getUser(page, gid);
			}
		}
	} 
		getUser(page);
	}
	selector();
</script>
<div class="wp mtn"><div id="diy3" class="area"></div></div>	
<? TPL :: display("bbs/footer");?>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>