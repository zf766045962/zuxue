<?= TPL :: display('bbs/head_search')?>
<body id="nv_home" class="pg_spacecp" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd"><?= TPL :: display("bbs/hd");?></div>                
<div id="wp" class="wp">
	<div id="ct" class="ct2_a wp cl">
        <div class="back_left bdl">
            <dl class="a" id="lf_">
                <dt>个人中心</dt>
                <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
                <dd class="bdl_a" ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
                <?php /*?><dd ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd ></dd><?php */?>
                <dd ><div style="height:18px; width:100%;"></div></dd>
            </dl>
        </div>
		<div class="mn cont_wp float_l">
			<div class="bm bw0 page_frame_navigation">
				<div class="follow_feed_cover" style="left:342px;" ></div>
                <ul class="tb cl page_frame_ul" style="padding-left:20px;" >
                    <li><a href="<?= URL('bbsUser.my_follow')?>">收听</a></li>
                    <li><a href="<?= URL('bbsUser.my_follow')?>">听众</a></li>
                    <li><a href="<?= URL('bbsUser.my_friend')?>">好友</a></li>
                    <li class="a"><a href="<?= URL('bbsUser.my_search')?>">搜索</a></li>
                </ul>
        	</div>
			<div class="ptm scf">
				<div class="relat_search">
					<form action="<?= URL('bbs.user_search')?>" method="post">
						<table cellpadding="0" cellspacing="0" class="tfm">
                        	<col width="116px;" /><col width="662px;" />
							<tr class="uname_relats"><th>用户名</th><td><input type="text" name="username" value="" class="px sbox2_relats" /><label class="wrap_simcheck"><span class="box_simcheck"></span><span>精确搜索</span><input type="checkbox" name="precision" class="pc" value="1"></label></td></tr>
							<tr class="uid_relats"><th>用户 UID</th><td><input type="text" name="uid" value="" class="px sbox2_relats" /></td></tr><tr class="borderline_relats"><th></th><td></td></tr>
							<tr class="sex_relats">
                            	<th>性别</th>
    							<td>
                                    <div>
                                        <select id="gender" name="gender">
                                            <option value="0">保密</option><option value="1">男</option><option value="2">女</option>
                                        </select>
                                    </div>
      							</td>
							</tr>
                            <tr class="birthd_relats select_w_102"><th>生日</th>
                                <td>
                                    <div>
                                        <select id="birthyear" name="birthyear" onChange="showbirthday();" class="ps">
                                            <option value="0"> 年 </option>
                                            <?php
                                                for($i = 2014;$i >= 1915;$i--){
                                            ?>
                                                <option value="<?= $i?>"><?= $i?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        <select id="birthmonth" name="birthmonth" onChange="showbirthday();" class="ps">
                                            <option value="0"> 月 </option>
                                           <?php
                                                for($j = 1;$j <= 12;$j++){
                                            ?>
                                                <option value="<?= $j?>"><?= $j?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <select id="birthday" name="birthday" class="ps">
                                            <option value="0"> 日 </option>
                                            <?php
                                                for($k = 1;$k <= 31;$k++){
                                            ?>
                                                <option value="<?= $k?>"><?= $k?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                    </div>
                                </td>
                            </tr>
							<tr class="reside_relats select_w_102"><th>居住地</th><td id="residecitybox" class="profile_setlist">
        						<div>
									<select name="resideprovince" id="resideprovince" class="ps" onChange="showdistrict('residecitybox', ['resideprovince', 'residecity', 'residedist', 'residecommunity'], 4, 1, 'reside')" tabindex="1" ischange="true" ><option value="">省份</option><option did="1" value="北京市">北京市</option><option did="2" value="天津市">天津市</option><option did="3" value="河北省">河北省</option><option did="4" value="山西省">山西省</option><option did="5" value="内蒙古自治区">内蒙古自治区</option><option did="6" value="辽宁省">辽宁省</option><option did="7" value="吉林省">吉林省</option><option did="8" value="黑龙江省">黑龙江省</option><option did="9" value="上海市">上海市</option><option did="10" value="江苏省">江苏省</option><option did="11" value="浙江省">浙江省</option><option did="12" value="安徽省">安徽省</option><option did="13" value="福建省">福建省</option><option did="14" value="江西省">江西省</option><option did="15" value="山东省">山东省</option><option did="16" value="河南省">河南省</option><option did="17" value="湖北省">湖北省</option><option did="18" value="湖南省">湖南省</option><option did="19" value="广东省">广东省</option><option did="20" value="广西壮族自治区">广西壮族自治区</option><option did="21" value="海南省">海南省</option><option did="22" value="重庆市">重庆市</option><option did="23" value="四川省">四川省</option><option did="24" value="贵州省">贵州省</option><option did="25" value="云南省">云南省</option><option did="26" value="西藏自治区">西藏自治区</option><option did="27" value="陕西省">陕西省</option><option did="28" value="甘肃省">甘肃省</option><option did="29" value="青海省">青海省</option><option did="30" value="宁夏回族自治区">宁夏回族自治区</option><option did="31" value="新疆维吾尔自治区">新疆维吾尔自治区</option><option did="32" value="台湾省">台湾省</option><option did="33" value="香港特别行政区">香港特别行政区</option><option did="34" value="澳门特别行政区">澳门特别行政区</option><option did="35" value="海外">海外</option><option did="36" value="其他">其他</option></select>                               	</div>
								</td>
							</tr>
							<tr class="borderline_relats"><th></th><td></td></tr>
    						<tr><td colspan="2" class="btnbar_relats"><button id="profilesubmitbtn" class="normalbtn bluebtn" /><strong>搜索</strong></button><span id="submit_result" class="rq"></span></td></tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	checkFun(".wrap_simcheck","checked_simcheck");
	simSelectFun(".relat_search select");
</script>	
     <?= TPL :: display("bbs/footer");?>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>