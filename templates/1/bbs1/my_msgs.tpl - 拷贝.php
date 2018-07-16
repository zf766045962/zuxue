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
                <dd ><a href="<?= URL('bbsUser.my_dynamic',"&uid=$uid")?>" title="动态">动态</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_submit',"&uid=$uid")?>" title="帖子">帖子</a></dd>
                <dd  ><a href="<?= URL('bbsUser.my_follow',"&uid=$uid")?>" title="关系">关系</a></dd>
                <dd  class="bdl_a"><a href="<?= URL('bbsUser.my_msgs',"&uid=$uid")?>" title="消息">消息</a></dd>
                <?php /*?><dd  ><a href="<?= URL('bbsUser.my_basic_info',"&uid=$uid")?>" title="设置">设置</a></dd><?php */?>
                <dd  ></dd><dd ><div style="height:18px; width:100%;"></div></dd>
            </dl>
		</div>
		<div class="mn cont_wp wp_space_pm float_l">
			<div class="bm bw0 space">
        		<div class="page_frame_navigation" >
                    <div class="follow_feed_cover" style="left:22px;" ></div>
                    <ul class="tb cl page_frame_ul" style="padding-left:20px;">
                        <li class="y"><a href="javascript:void(0);" id="msgSettingBtn" class="xi2 msgsetbtn_nav">短消息设置</a></li>
                        <li class="a" ><a href="<?= URL('bbsUser.my_msgs',"&uid=$uid")?>">个人消息</a></li>
                        <li><a href="<?= URL('bbsUser.my_msgs',"&uid=$uid")?>">系统消息</a></li>
                        <li  ><a href="<?= URL('bbsUser.my_notice',"&uid=$uid")?>">提醒</a></li>
                    </ul>
                </div>                        
				<form id="deletepmform" action="<?= URL('')?>" method="post" autocomplete="off" name="deletepmform" attribute="0" onSubmit="if(this.getAttribute('attribute') == 0){return false;}">
					<div class="pagebar_space">
						<label id="checkAllPm" for="delete_all" class="but1 pn normalbtn graybtn" style="padding:7px 8px;" onClick="checkall_2(this.form, 'deletepm_');"><span style="display:none;" ><input type="checkbox" name="chkall" id="delete_all" class="pc"  /></span><strong>全选</strong></label>
						<span class="normalbtn graybtn" style="margin-left:20px;"<button id="deletePm" class="pn but1 disabledgraybtn" type="submit" name="deletepmsubmit_btn" value="true"><strong>删除</strong></button></span>
						<span class="normalbtn graybtn" style="margin-left:20px;"><button class="pn but1" type="button" name="markreadpm_btn" value="true" onClick="setpmstatus(this.form);"><strong>标记已读</strong></button></span>
						<a class="normalbtn bluebtn" style="float:right;" href="<?= URL('bbsUser.send_msg',"&uid=$uid")?>" target="_blank" ><strong>发消息</strong></a><div class="cr"></div>			
					</div>
                    
                    <div class="xld xlda pml mtm mbm">
                    <?php
                    	if(!empty($re)){
							foreach($re as $pk => $pv){
								$re1 = DS('publics._get','','users',"username='".$pv['fusername']."'");
					?>
                    
                           <!-- 忽略窗口开始  -->
                    <div id="fwin_a_feed_menu_<?= $re1[0]['id']?>" class="fwinmask" style="position: absolute; z-index: 601; left: 649px; top: 357px;display:none" initialized="true">
						<style type="text/css">object{visibility:hidden;}</style>
                        <table cellspacing="0" cellpadding="0" class="fwin">
                        	<tbody>
                            	<tr>
                                	<td id="fwin_content_a_feed_menu_<?= $re1[0]['id']?>" class="m_c" style="" fwin="a_feed_menu_2565806">
										<h3 class="flb" id="fctrl_a_feed_menu_<?= $re1[0]['id']?>" style="cursor: move;"><em id="return_a_feed_menu_<?= $re1[0]['id']?>" fwin="a_feed_menu_<?= $re1[0]['id']?>">忽略</em><span><a title="关闭" class="flbc" onClick="hideWindow('a_feed_menu_<?= $re1[0]['id']?>');" href="javascript:;">关闭</a></span></h3>
										<div id="2565806" fwin="a_feed_menu_2565806">
								<form onSubmit="ajaxpost(this.id, 'return_a_feed_menu_2565806');" action="home.php?mod=spacecp&amp;ac=pm&amp;op=pm_ignore&amp;plid=2565806&amp;username=呃呃呃" autocomplete="off" method="post" name="pmignoreform_2565806" id="pmignoreform_2565806" fwin="a_feed_menu_2565806">
									<input type="hidden" value="a_feed_menu_2565806" name="handlekey"><input type="hidden" value="http://bbs.meizu.cn/home.php?mod=space&amp;do=pm" name="referer">
									<input type="hidden" value="true" name="pmignoresubmit">
									<input type="hidden" value="ee9da631" name="formhash">
									<div class="c">确定把该用户加入忽略列表吗？</div>
									<div class="minwidth_fwin">&nbsp;</div>
									<p class="o pns btnbar_fwin_l"><a class="normalbtn bluebtn"><button value="true" name="pmignoresubmit_btn" type="submit" class=""><strong>确定</strong></button></a>
</p>
							</form>
							</div>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
                 <!-- 忽略窗口结束  -->
                  
						<dl id="pmlist_2551411" class="bbda cur1 cl">
							<dd class="m avt">
								<div class="o"  >
									<span style="display:none;"><input type="checkbox" name="deletepm_deluid[]" id="a_delete_2551411" class="pc" value="9607427" /></span>
                                    <span class="box_simcheck"></span>
								</div>
								<div class="im" style="position:relative">
									<a href="#" target="_blank" class="avatar">
                                    	<?php
                                        	if(empty($re1[0]['head_img'])){
										?>
                                       	<img src="images/w50h50.gif" />
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
							<dd class="ptm pm_c">发给&nbsp;<a class="name_pmlist" href="<?= URL('bbsUser.user_broadcast',"&uid=$uid&fid=".$re1[0]['id']."")?>" target="_blank">用户<?= $pv['fusername']?></a><span class="xg1"><span title="<?= date("Y-m-d H:i:s",$pv['sendTime'])?>"><?= date("Y-m-d H:i:s",$pv['sendTime'])?></span></span><br><p><?= $pv['message']?></p></dd>
							<div class="cr"></div>
                            <div class="mtop10 operation" >
								<div class="y msg_btnbar">
									<a href="home.php?mod=spacecp&amp;ac=pm&amp;op=pm_ignore&amp;username=用户9607427&amp;plid=2551411&amp;handlekey=pmignorehk_2551411" id="a_feed_menu_2551411" onClick="showWindow(this.id, this.href, 'get', 0);doane(event);" title="忽略">忽略</a>                                   &nbsp;&nbsp;&nbsp;
                                   <a href="#" id="pmlist_2551411_a">回复</a>
                                  	&nbsp;&nbsp;&nbsp;
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
				</form>
<script type="text/javascript">
	addBlockLink('deletepmform', 'dl');
</script>
<script>
	function del_msgs(id){
		window.location.href="<?= URL('bbsUser.del_msgs',"&uid=$uid&id")?>"+id;	
	}
</script>
			</div>
		</div>
		<div style="display:none;">
    		<div class="wrap_mzdialog" id="msgSetting">
        		<div class="head_mzdialog"><h3>消息设置</h3></div>
            	<div class="cont_mzdialog">
                	<form id="pmsettingform" name="pmsettingform" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=pm&amp;op=setting">
                    	<span class="checkbox_msgset">
                        	<label id="wrap_simcheck_0" class="wrap_simcheck"><em class="box_simcheck" onClick="$('wrap_simcheck_0').click();"> </em>
<input type="checkbox" name="onlyacceptfriendpm"  /><span>只接收好友的短消息</span></label>
                    	</span>
<script src="js/bbsjs/home_friendselector.js" type="text/javascript"></script>
<script type="text/javascript">
	var fs2;
	var clearlist2 = 0;
</script>
					<div class="cont_msgset">
						<h5>忽略列表</h5>
						<div class="cl">
							<div class=" un_selector un_selector2" onClick="$('ignoreName').focus();">
                            	<span id="ignoreNameWp">
<input id="ignoreName" name="ignoreName" class="pt" type="text" autocomplete="off"/>
									<div id="ignoreName_menu" style="display: none;">
										<ul id="friends" class="pmfrndl"></ul>
									</div>
								</span>	
							</div>
						</div>
						<div class="conttip_msgset">
                        	<p>如果你不希望收到某人的消息,可以把他加入到忽略列表</p>
							<p>使用"回车"将多个用户分割区分</p>
                        </div>
					</div>
					<div class="p_pof" id="showSelectBox_menu" unselectable="on" style="display:none;">
						<div class="pbm"><select class="ps" onChange="clearlist2=1;getUser(1, this.value)"><option value="-1">全部好友</option></select></div>
						<div id="selBox" class="ptn pbn">
							<ul id="selectorBox" class="xl xl2 cl"></ul>
						</div>
						<div class="cl">
							<button type="button" class="y pn" onClick="fs2.showPMFriend('showSelectBox_menu','selectorBox', $('showSelectBox'));doane(event)"><span>关闭</span></button>
						</div>
					</div>
                    <div class="btnbar_mzdialog">
                    	<button type="submit" name="settingsubmit" value="true" class="normalbtn bluebtn"><strong>确定</strong></button>
                        <button type="button" class="normalbtn graybtn mzCancelBtn">取消</button>
                        <input type="hidden" name="formhash" value="83c85172" />
                    </div>
                </form>
            </div>
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