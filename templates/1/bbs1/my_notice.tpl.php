<?= TPL :: display('bbs/head_basicInfo')?>
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
                <?php /*?><dd ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd><?php */?>
                <dd class="bdl_a"><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
                <?php /*?><dd ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd  ></dd><?php */?>
				<dd ><div style="height:18px; width:100%;"></div></dd>
			</dl>
		</div>
		<div class="mn cont_wp float_l">
			<div class="bm bw0">
        		<div class="page_frame_navigation" >
            		<div class="follow_feed_cover" style="left:236px;" ></div>
                	<ul class="tb cl page_frame_ul" style="padding-left:20px;" >
                    	<li class="y"><a href="#" target="_blank" class="xi2 msgsetbtn_nav">屏蔽管理</a></li>
                        <li ><a href="<?= URL('bbsUser.my_msgs')?>">个人消息</a></li>
                        <li><a href="<?= URL('bbsUser.my_msgs')?>">系统消息</a></li>
                        <li  class="a"  ><a href="<?= URL('bbsUser.my_notice')?>">提醒</a></li>
                	</ul>
            	</div>
				<div class="xld xlda notice_msg">
					<div class="nts pml">
                    	<?php
                        	 //var_dump($re);
							if(!empty($re)){
								foreach($re as $pk => $pv){
						?>
                    	<dl class="cl "  notice="5430639">
							<table cellspacing="0" cellpadding="0">
								<col width="34px" /><col width="744px" />
								<tr>
    								<th><div class="avt mbn"><a class="avatar"><img src="images/systempm.png" alt="systempm" /><span class="shadowbox_avatar"> </span></a></div></th>
    								<td>
										<div class="ntc_body readntc_body"><?= $pv['note']?></div>
        								<div class="time_msgnotice">
            								<span class="xg1 xw0"><span title="<?= date("Y-m-d",$pv['dateline'])?>"><?= date("Y-m-d",$pv['dateline'])?></span></span><a class="shield_msgnotice" href="<?= URL('bbsUser.my_notice')?>" id="a_note_5430639" onClick="showWindow(this.id, this.href, 'get', 0);" title="屏蔽">屏蔽</a>
										</div><div class="cr"></div>
    								</td>
								</tr>
							</table>
            			</dl>
						<?php
								}
							}else{
						?>
                        <dl class="cl "  notice="5430639">当前没有相应的提醒信息</dl>
						<?php
							}
						?>
					</div>
				</div>
				<div class="pgs cl pagebar"></div>
			</div>
		</div>
		<div style="display:none;">
    		<div class="wrap_mzdialog" id="msgSetting">
        		<div class="head_mzdialog"><h3>消息设置</h3></div>
            	<div class="cont_mzdialog">
                	<form id="pmsettingform" name="pmsettingform" method="post" autocomplete="off" action="#">
                    	<span class="checkbox_msgset">
                        	<label class="wrap_simcheck">
                            	<em class="box_simcheck"> </em><input type="checkbox" name="onlyacceptfriendpm" /><span>只接收好友的短消息</span>
                        	</label>
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
                                	<span id="ignoreNameWp"><input id="ignoreName" name="ignoreName" class="pt" type="text" autocomplete="off"/><div id="ignoreName_menu" style="display: none;"><ul id="friends" class="pmfrndl"></ul></div></span>
								</div>
							</div>
                    		<div class="conttip_msgset">
                            	<p>如果你不希望收到某人的消息,可以把他加入到忽略列表</p><p>使用"回车"将多个用户分割区分</p>
                            </div>
						</div>
						<div class="p_pof" id="showSelectBox_menu" unselectable="on" style="display:none;">
							<div class="pbm">
                            	<select class="ps" onChange="clearlist2=1;getUser(1, this.value)">
                                	<option value="-1">全部好友</option>
                                </select>
                            </div>
							<div id="selBox" class="ptn pbn"><ul id="selectorBox" class="xl xl2 cl"></ul></div>
							<div class="cl"><button type="button" class="y pn" onClick="fs2.showPMFriend('showSelectBox_menu','selectorBox', $('showSelectBox'));doane(event)"><span>关闭</span></button></div>
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
	<div class="wp mtn"><div id="diy3" class="area"></div></div>
	<script type="text/javascript">
        // 头像浮动
        adrift 	= new avatar_drift();
        adrift.init();
        hoverAdd(".notice_msg dl","hover");
        public.box_simcheck('pc');
        showBox('#msgSettingBtn','#msgSetting',560,560,true,true)
        focusBox(".cont_msgset textarea");
        checkFun(".wrap_simcheck","checked_simcheck");	
        //功能: 禁用一个a元素;
        function disableLink(link) {
            //删除href属性,使其成为文本元素
            link.removeAttribute("href");
            //设置disabled属性
            link.setAttribute("disabled", "disabled");
        }
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
	<? TPL :: display("bbs/footer");?>
	<script type="text/javascript">
		scrolltop_obj 	= new goto_top();
		scrolltop_obj.init();
	</script>
	<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>