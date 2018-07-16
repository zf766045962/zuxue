<div class="pl replypost_postlist">
					<h3 class="head_postlist cl"><span class="z"><em>534</em>条回复</span><span class="y tofloor_postlist">
					<label id="fj_btn" class="z" title="跳转到指定楼层">楼层直达</label>
					<input type="text" class="p_fre z" size="4" onkeyup="$('fj_btn').href='forum.php?mod=redirect&ptid=5285291&authorid=0&postno='+this.value" onkeydown="if(event.keyCode==13 && this.value !== '' ) {window.location=$('fj_btn').href;return false;}" title="跳转到指定楼层" /></span></h3>
<!--兼容删除的帖子直接跳过-->



<? $con=DS('publics._get','','bbs_postcomment', ' 1=1 order by id asc'); ?>

<? $con1=DS('publics._get','','users',"id='".$_SESSION['u_uid']."'"); ?>

<? foreach($con as $k=>$val){?>

<div id="post_118009247" class="item_postlist graybar_postlist">
<table id="pid118009247" summary="pid118009247" cellspacing="0" cellpadding="0">
    <col width="64px" />
    <col width="594px"/>
    <tr>
		<td class="pls" rowspan="2"> 
						<div class="p_pop blk bui sign_card_user_box5" id="userinfo118009247" style="display: none; margin-top: -11px;">
                        <div class="m z"><div id="userinfo118009247_ma" class="avatar"></div></div>
						<div class="i y" >
							<div>
								<div class="sign_name" >
									<a href="<?= URL('bbsUser.user_broadcast')?>" target="_blank" class="xi2"><? echo $val['author']?></a><img src="images/mzvip3.jpg" class="mzvip"/>
                                    <a href="#" target="_blank" class="mzpower" ><font color="#999999">铜牌会员	
</font></a>
									<div class="cr"></div>
                                </div><em>当前离线</em>
							</div>
							<dl class="cl sign_info">
                                <dt>注册时间</dt><dd>2009-10-11</dd>
                                <dt>在线时间</dt><dd>1162小时</dd>
                                <dt>个性签名</dt><dd></dd>
                                <div class="cr" style="height:17px; overflow:hidden;">&nbsp;</div>
                                <dt>帖子</dt><dd>185</dd>
                                <dt>魅力</dt><dd>2860</dd>
                                <dt>魅币</dt><dd>70</dd>
                            </dl>
							<div class="mzpro_user_info">
 								<img src='images/meizu_product_pic/m9.png' class='png_bg' alt='M9 数量:1' title='M9 数量:1' >
                                <img src='images/meizu_product_pic/m8.png' class='png_bg' alt='M8 数量:1' title='M8 数量:1' >
                                <img src='images/meizu_product_pic/m040.png' class='png_bg' alt='MX2手机 数量:1' title='MX2手机 数量:1' >
							</div>
                    		<div class="sign_user_info"><a href="<?= URL('bbsUser.user_broadcast')?>" target="_blank" title="查看详细资料"><em>更多资料</em><em class="arrow_2">&nbsp;</em></a></div>
							<div id="avatarfeed"><span id="threadsortswait"></span></div>
						</div>
						</div>
						<div>
							<div class="avatar head_uinfo" onmouseover="showauthor(this, 'userinfo118009247')" data-href="home.php?mod=space&amp;uid=1455083"><img src="images/w100h100.jpg"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></div>
						</div>
		</td>
		<td class="plc">
    					<div class="pi infobar_post">
<!--除开1楼的显示楼层数-->
							<div class="barr_post">
                				<strong class="z floor_infobar"><a href="forum.php?mod=redirect&goto=findpost&ptid=5285291&pid=118009247"  id="postnum118009247" onclick="setCopy(this.href, '帖子地址复制成功');return false;">
								<? if($k == 0 ){
									echo '沙发';
									}else if($k == 1){
										echo '板凳';
										}else if($k == 2){
											echo '凉席';	
											}else if($k == 3){
												echo '地板';
												}else{
													echo $k;
													echo '楼';
													} 
											
										
								
								?>
								</a></strong>
       						</div>   
							<div class="pti barl_post">
								<div class="pdbt"></div>
                                <div class="authi"  >
                                	<a class="name_uinfo" href="<?= URL('bbsUser.user_broadcast')?>" target="_blank" class="xw1" title="gtoroc"><? echo $val['author']?></a>
									<em class="userlevel_uinfo"><a class="mzvip" href="#"><img src="images/mzvip3.jpg" title="魅族产品认证用户" /></a><a href="#" target="_blank" class="mzpower" ><font color="#999999">铜牌会员</font></a><span class="cr"></span></em>
                <span id="authorposton118009247"><span title="2014-10-15 10:01:24">
				<?php 
					if(date('m',time()) != substr($val['dateline'],5,2)){
						echo date('m',time()) - substr($val['dateline'],5,2);
						echo '个月前';
						}else if(substr($con[0]['dateline'],8,2) != date('d',time())){
							echo date('d',time()) - substr($val['dateline'],8,2);
							echo '天前';
						}else if(substr($con[0]['dateline'],0,10) == date('Y-m-d',time())){
							echo date('H',time()) - substr($val['dateline'],10,12)+1;
							echo '小时前';
						}											
				?>
				</span></span>
								</div>
                			</div>
						</div>
						<div class="pct postcont_postlist fontsizelimit">
							<div class="pcb">
								<div class="t_fsz">
<table cellspacing="0" cellpadding="0">
	<tr>
    	<td class="t_f" id="postmessage_118009247">
        							<div><?=$val['comment']?></div>
        </td>
    </tr>
</table>
							</div>
    			 <div id="comment_118009274" class="cm comment_post"  >
    	<div class="comminner_post">
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-1746854.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/17/46/85/40/00/1746854/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-1746854.html" class="xi2 uname_pasth" title="可爱的菩提">可爱的菩提</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118011986&amp;ptid=5285291" title="11月发布">&nbsp;:&nbsp;11月发布</a><span class="xg1 comm_pasth"><span title="2014-10-15 11:11">5&nbsp;天前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        </div>
</div>
</div></div>

</td></tr>
<tr><td class="plc plm">

</td>
</tr>
<tr>
<td class="pls"></td>
        <td class="plc cbar_postlist">
						<div class="score_post"><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=5285291&amp;pid=118009247" onclick="showWindow('viewratings', this.href)" title="评分" class="xi2"></a></div>
						<div class="po cbarbox_postlist">
							<div class="pob">
								<a class="fastre" href="#editorheader" data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;repquote=118009247&amp;extra=page%3D1&amp;page=1">回复</a>
								<a id="recommend_subtract_118009247" class="support_oppose" href="javascript:;" onclick="supportOpFun(this.id);" title="0 人反对" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=0&amp;tid=5285291&amp;pid=118009247&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" ><i>反对</i></a>
								<a id="recommend_add_118009247" class="support_oppose" href="javascript:;"  onclick="supportOpFun(this.id);" title="0 人支持" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=1&amp;tid=5285291&amp;pid=118009247&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" ><i>支持</i></a>
								<div id="action_plist_118009247_menu" class="p_pop" style="display:none;width:118px;">
                    				<a class="float_l" href="forum.php?mod=viewthread&amp;tid=5285291&amp;page=1&amp;authorid=1455083" rel="nofollow">只看该作者</a>
									<a class="float_l" href="javascript:;" onclick="hideMenu('action_plist_118009247_menu','');showWindow('miscreport118009247', 'misc.php?mod=report&rtype=post&rid=118009247&tid=5285291&fid=22', 'get', -1);return false;">举报</a>
								</div>
								<em><a class="showmenu action_postlist" id="action_plist_118009247" onmouseover="showMenu(this.id)" href="javascript:;" hidefocus="true">操作<span class="arrow_gray"></span></a></em>
								<div class="cr"></div>
							</div>
          				</div><div class="cr"></div>
		</td>
	</tr>
	<tr class="ad"></td></tr>
</table>
<!--兼容删除的帖子普通用户直接跳过-->
					</div>
					
<?	} ?>				
					
					
					
					
<!--兼容删除的帖子普通用户直接跳过-->
<div id="post_118009274" class="item_postlist graybar_postlist">
<table id="pid118009274" summary="pid118009274" cellspacing="0" cellpadding="0">
<col width="64px" />
<col width="594px"/>
<tr>
<td class="pls" rowspan="2">
 
<div class="p_pop blk bui sign_card_user_box5" id="userinfo118009274" style="display: none; margin-top: -11px;">
<div class="m z">
<div id="userinfo118009274_ma" class="avatar"></div>
                    
</div>
<div class="i y" >
<div>
<div class="sign_name" >
<a href="space-uid-1455083.html" target="_blank" class="xi2">gtoroc</a><img src="images/mzvip3.jpg" class="mzvip"/>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=69" target="_blank" class="mzpower" ><font color="#999999">铜牌会员</font></a>
<div class="cr"></div>
</div>
<em>当前离线</em>
</div>
<dl class="cl sign_info">
                    	<dt>注册时间</dt><dd>2009-10-11</dd>
                        <dt>在线时间</dt><dd>1162小时</dd>
                        <dt>个性签名</dt><dd></dd>
                        <div class="cr" style="height:17px; overflow:hidden;">&nbsp;</div>
                        <dt>帖子</dt><dd>185</dd>
                        <dt>魅力</dt><dd>2860</dd>
                        <dt>魅币</dt><dd>70</dd>
                    </dl>
<div class="mzpro_user_info">
 <img src='http://bbs.res.meizu.com/resources/php/bbs/static/image/meizu_product_pic/m9.png' class='png_bg' alt='M9 数量:1' title='M9 数量:1' ><img src='http://bbs.res.meizu.com/resources/php/bbs/static/image/meizu_product_pic/m8.png' class='png_bg' alt='M8 数量:1' title='M8 数量:1' ><img src='http://bbs.res.meizu.com/resources/php/bbs/static/image/meizu_product_pic/m040.png' class='png_bg' alt='MX2手机 数量:1' title='MX2手机 数量:1' ></div>
                    <div class="sign_user_info">
                    	<a href="home.php?mod=space&amp;uid=1455083&amp;do=profile" target="_blank" title="查看详细资料"><em>更多资料</em><em class="arrow_2">&nbsp;</em></a>
                    </div>
                    
<div id="avatarfeed"><span id="threadsortswait"></span></div>
</div>
</div>
<div>

            

<div class="avatar head_uinfo" onmouseover="showauthor(this, 'userinfo118009274')" data-href="home.php?mod=space&amp;uid=1455083"><img src="http://img.res.meizu.com/img/download/uc/14/55/08/30/00/1455083/w100h100"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></div>

</div>




</td>
<td class="plc">
    

    	<div class="pi infobar_post">

<!--除开1楼的显示楼层数-->
<div class="barr_post">
                	<strong class="z floor_infobar">
                        <a href="forum.php?mod=redirect&goto=findpost&ptid=5285291&pid=118009274"  id="postnum118009274" onclick="setCopy(this.href, '帖子地址复制成功');return false;">地板</a>
                    </strong>
                </div>   
                
                
            <div class="pti barl_post">
<div class="pdbt">
</div>
                                    <div class="authi"  >
                                            <a class="name_uinfo" href="home.php?mod=space&amp;uid=1455083" target="_blank" class="xw1" title="gtoroc">gtoroc</a>
<em class="userlevel_uinfo">
<a class="mzvip" href="viewthread.php?tid=4563325&amp;page=1#pid104677457"><img src="images/mzvip3.jpg" title="魅族产品认证用户" /></a>

                                                            <a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=69" target="_blank" class="mzpower" ><font color="#999999">铜牌会员</font></a>
                            
<span class="cr"></span>
</em>
                                        <span id="authorposton118009274"><span title="2014-10-15 10:02:01">5&nbsp;天前</span></span>
                                                            </div>
                </div>
</div><div class="pct postcont_postlist fontsizelimit">
<div class="pcb">
<div class="t_fsz">
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_118009274"><div>
            	                	现在我们来谈谈PRO什么时候发布的事情                                        
            </div></td></tr></table>
</div>
    
    <div id="comment_118009274" class="cm comment_post"  >
    	<div class="comminner_post">
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-1746854.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/17/46/85/40/00/1746854/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-1746854.html" class="xi2 uname_pasth" title="可爱的菩提">可爱的菩提</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118011986&amp;ptid=5285291" title="11月发布">&nbsp;:&nbsp;11月发布</a><span class="xg1 comm_pasth"><span title="2014-10-15 11:11">5&nbsp;天前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        </div>
</div>
</div></div>

</td></tr>
<tr><td class="plc plm">

</td>
</tr>
<tr>
<td class="pls"></td>
<td class="plc cbar_postlist">
<div class="score_post">
<a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=5285291&amp;pid=118009274" onclick="showWindow('viewratings', this.href)" title="评分" class="xi2">3分</a>
</div>
<div class="po cbarbox_postlist">
<!--删除的帖子不显示-->
<div class="pob">
<a class="fastre" href="javascript:;" data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;repquote=118009274&amp;extra=page%3D1&amp;page=1">回复</a>
                                                    
                                                                                                                                                                                                                <a id="recommend_subtract_118009274" class="support_oppose" href="javascript:;" onclick="supportOpFun(this.id);" title="0 人反对" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=0&amp;tid=5285291&amp;pid=118009274&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>反对</i>
                                                                                </a>
                                                                                                                                
                                                                                                                                                                                                                <a id="recommend_add_118009274" class="support_oppose" href="javascript:;"  onclick="supportOpFun(this.id);" title="1 人支持" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=1&amp;tid=5285291&amp;pid=118009274&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>支持</i>
                                                                                </a>
                                                                                                                                
                                                                                            	                    					
<div id="action_plist_118009274_menu" class="p_pop" style="display:none;width:118px;">
                    <a class="float_l" href="forum.php?mod=viewthread&amp;tid=5285291&amp;page=1&amp;authorid=1455083" rel="nofollow">只看该作者</a>
                    
                    
                                            
                        
                                                                            <a class="float_l" href="javascript:;" onclick="hideMenu('action_plist_118009274_menu','');showWindow('miscreport118009274', 'misc.php?mod=report&rtype=post&rid=118009274&tid=5285291&fid=22', 'get', -1);return false;">举报</a>
                                                
                                                
                                                                                
                    </div>
<em>
                                        
                    
                                        <a class="showmenu action_postlist" id="action_plist_118009274" onmouseover="showMenu(this.id)" href="javascript:;" hidefocus="true">操作<span class="arrow_gray"></span></a>
                    </em>



<div class="cr"></div>
</div>
          	</div>
<div class="cr"></div>
</td>
</tr>
<tr class="ad">
</td>
</tr>
</table>


<!--兼容删除的帖子普通用户直接跳过-->
</div>
<!--兼容删除的帖子普通用户直接跳过-->
<div id="post_118009281" class="item_postlist graybar_postlist">
<table id="pid118009281" summary="pid118009281" cellspacing="0" cellpadding="0">
<col width="64px" />
<col width="594px"/>
<tr>
<td class="pls" rowspan="2">
 
<div class="p_pop blk bui sign_card_user_box5" id="userinfo118009281" style="display: none; margin-top: -11px;">
<div class="m z">
<div id="userinfo118009281_ma" class="avatar"></div>
                    
</div>
<div class="i y" >
<div>
<div class="sign_name" >
<a href="<?= URL('bbsUser.user_broadcast');?>" target="_blank" class="xi2">whatoat</a><img src="images/mzvip3.jpg" class="mzvip"/>
<a href="<?= URL('bbsUser.user_broadcast');?>" target="_blank" class="mzpower" ><font color="#FF7400">魅族工程师</font></a>
<div class="cr"></div>
</div>
<em>当前离线</em>
</div>
<dl class="cl sign_info">
                    	<dt>注册时间</dt><dd>2014-04-21</dd>
                        <dt>在线时间</dt><dd>88小时</dd>
                        <dt>个性签名</dt><dd></dd>
                        <div class="cr" style="height:17px; overflow:hidden;">&nbsp;</div>
                        <dt>帖子</dt><dd>22</dd>
                        <dt>魅力</dt><dd>1613</dd>
                        <dt>魅币</dt><dd>50</dd>
                    </dl>
<div class="mzpro_user_info">
 <img src='images/meizu_product_pic/m070.png' class='png_bg' alt='MX3 TD 数量:1' title='MX3 TD 数量:1' ></div>
                    <div class="sign_user_info">
                    	<a href="<?= URL('bbsUser.user_broadcast');?>" target="_blank" title="查看详细资料"><em>更多资料</em><em class="arrow_2">&nbsp;</em></a>
                    </div>
                    
<div id="avatarfeed"><span id="threadsortswait"></span></div>
</div>
</div>
<div>

            

<div class="avatar head_uinfo" onmouseover="showauthor(this, 'userinfo118009281')" data-href="home.php?mod=space&amp;uid=7297619"><img src="images/w100h100.jpg"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></div>

</div>




</td>
<td class="plc">
    

    	<div class="pi infobar_post">

<!--除开1楼的显示楼层数-->
<div class="barr_post">
                	<strong class="z floor_infobar">
                        <a href="forum.php?mod=redirect&goto=findpost&ptid=5285291&pid=118009281"  id="postnum118009281" onclick="setCopy(this.href, '帖子地址复制成功');return false;">7楼</a>
                    </strong>
                </div>   
                
                
            <div class="pti barl_post">
<div class="pdbt">
</div>
                                    <div class="authi"  >
                                            <a class="name_uinfo" href="home.php?mod=space&amp;uid=7297619" target="_blank" class="xw1" title="whatoat">whatoat</a>
<em class="userlevel_uinfo">
<a class="mzvip" href="viewthread.php?tid=4563325&amp;page=1#pid104677457"><img src="images/mzvip3.jpg" title="魅族产品认证用户" /></a>

                                                            <a href="<?= URL('bbsUser.user_broadcast');?>" target="_blank" class="mzpower" ><font color="#FF7400">魅族工程师</font></a>
                            
<span class="cr"></span>
</em>
                                        <span id="authorposton118009281"><span title="2014-10-15 10:02:09">5&nbsp;天前</span></span>
                                                            </div>
                </div>
</div><div class="pct postcont_postlist">
<div class="pcb">
<div class="t_fsz">
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_118009281"><div>
            	                	赞~<br />
<br />
                                        
            </div></td></tr></table>
</div>
    
    <div id="comment_118009281" class="cm comment_post"  >
    	<div class="comminner_post">
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-2317451.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/23/17/45/10/00/2317451/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="<?= URL('bbsUser.user_broadcast');?>" class="xi2 uname_pasth" title="DANG星星">DANG星星</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118164887&amp;ptid=5285291" title="求MX4电信版4G。。">&nbsp;:&nbsp;求MX4电信版4G。。</a><span class="xg1 comm_pasth"><span title="2014-10-20 13:07">半小时前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        	<div class="pstl"><div class="psti">
<a href="<?= URL('bbsUser.user_broadcast');?>" class="xi2 uname_pasth" title="钊哥19">钊哥19</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118083527&amp;ptid=5285291" title="工程师大哥，想问一下，MX2那个软件内存问题什么时候能解决啊，说了半年都没有回音啊，当初不是说了有解决方案并且在测试了吗？">&nbsp;:&nbsp;工程师大哥，想问一下，MX2那个软件内存问题什么时候能解决啊，说了半年都没有回音啊，当初不是说了有解决方案并且在测试了吗？</a><span class="xg1 comm_pasth"><span title="2014-10-17 15:27">3&nbsp;天前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-6571109.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/65/71/10/90/00/6571109/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-6571109.html" class="xi2 uname_pasth" title="伟大的人啊">伟大的人啊</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118046474&amp;ptid=5285291" title="活捉攻城狮偷懒！">&nbsp;:&nbsp;活捉攻城狮偷懒！</a><span class="xg1 comm_pasth"><span title="2014-10-16 12:22">4&nbsp;天前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-5518176.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/55/18/17/60/00/5518176/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-5518176.html" class="xi2 uname_pasth" title="天真无邪他爸">天真无邪他爸</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118035611&amp;ptid=5285291" title="逮着不放">&nbsp;:&nbsp;逮着不放</a><span class="xg1 comm_pasth"><span title="2014-10-15 23:51">5&nbsp;天前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-6535374.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/65/35/37/40/00/6535374/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-6535374.html" class="xi2 uname_pasth" title="天坠苍OL">天坠苍OL</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118015661&amp;ptid=5285291" title="活捉一只大Bug;-)">&nbsp;:&nbsp;活捉一只大Bug;-)</a><span class="xg1 comm_pasth"><span title="2014-10-15 12:40">5&nbsp;天前</span>
</span>
<span class="cr"> </span>
</div>
</div>
<div class="morebtn_compost"><a href="javascript:;" onclick="ajaxget('forum.php?mod=misc&action=commentmore&tid=5285291&pid=118009281&page=2', 'comment_118009281')">显示全部</a></div>
        </div>
</div>
</div></div>

</td></tr>
<tr><td class="plc plm">

</td>
</tr>
<tr>
<td class="pls"></td>
<td class="plc cbar_postlist">
<div class="score_post">
<a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=5285291&amp;pid=118009281" onclick="showWindow('viewratings', this.href)" title="评分" class="xi2">9分</a>
</div>
<div class="po cbarbox_postlist">
<!--删除的帖子不显示-->
<div class="pob">
<a class="fastre" href="javascript:;" data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;repquote=118009281&amp;extra=page%3D1&amp;page=1">回复</a>
                                                    
                                                                                                                                                                                                                <a id="recommend_subtract_118009281" class="support_oppose" href="javascript:;" onclick="supportOpFun(this.id);" title="0 人反对" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=0&amp;tid=5285291&amp;pid=118009281&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>反对</i>
                                                                                </a>
                                                                                                                                
                                                                                                                                                                                                                <a id="recommend_add_118009281" class="support_oppose" href="javascript:;"  onclick="supportOpFun(this.id);" title="3 人支持" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=1&amp;tid=5285291&amp;pid=118009281&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>支持</i>
                                                                                </a>
                                                                                                                                
                                                                                            	                    					
<div id="action_plist_118009281_menu" class="p_pop" style="display:none;width:118px;">
                    <a class="float_l" href="forum.php?mod=viewthread&amp;tid=5285291&amp;page=1&amp;authorid=7297619" rel="nofollow">只看该作者</a>
                    
                    
                                            
                        
                                                                            <a class="float_l" href="javascript:;" onclick="hideMenu('action_plist_118009281_menu','');showWindow('miscreport118009281', 'misc.php?mod=report&rtype=post&rid=118009281&tid=5285291&fid=22', 'get', -1);return false;">举报</a>
                                                
                                                
                                                                                
                    </div>
<em>
                                        
                    
                                        <a class="showmenu action_postlist" id="action_plist_118009281" onmouseover="showMenu(this.id)" href="javascript:;" hidefocus="true">操作<span class="arrow_gray"></span></a>
                    </em>



<div class="cr"></div>
</div>
          	</div>
<div class="cr"></div>
</td>
</tr>
<tr class="ad">
</td>
</tr>
</table>


<!--兼容删除的帖子普通用户直接跳过-->
</div>
<!--兼容删除的帖子普通用户直接跳过-->
<div id="post_118009286" class="item_postlist graybar_postlist">
<table id="pid118009286" summary="pid118009286" cellspacing="0" cellpadding="0">
<col width="64px" />
<col width="594px"/>
<tr>
<td class="pls" rowspan="2">
 
<div class="p_pop blk bui sign_card_user_box5" id="userinfo118009286" style="display: none; margin-top: -11px;">
<div class="m z">
<div id="userinfo118009286_ma" class="avatar"></div>
                    
</div>
<div class="i y" >
<div>
<div class="sign_name" >
<a href="space-uid-1184989.html" target="_blank" class="xi2">Cople</a><img src="images/mzvip3.jpg" class="mzvip"/>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=48" target="_blank" class="mzpower" ><font color="#999999">论坛精英</font></a>
<div class="cr"></div>
</div>
<em>当前离线</em>
</div>
<dl class="cl sign_info">
                    	<dt>注册时间</dt><dd>2008-11-23</dd>
                        <dt>在线时间</dt><dd>5049小时</dd>
                        <dt>个性签名</dt><dd>无魅友不魅族</dd>
                        <div class="cr" style="height:17px; overflow:hidden;">&nbsp;</div>
                        <dt>帖子</dt><dd>3786</dd>
                        <dt>魅力</dt><dd>26048</dd>
                        <dt>魅币</dt><dd>6291</dd>
                    </dl>
<div class="mzpro_user_info">
 <img src='http://bbs.res.meizu.com/resources/php/bbs/static/image/meizu_product_pic/m8.png' class='png_bg' alt='M8 数量:1' title='M8 数量:1' ><img src='http://bbs.res.meizu.com/resources/php/bbs/static/image/meizu_product_pic/m460.png' class='png_bg' alt='MX4 TD 数量:1' title='MX4 TD 数量:1' ><img src='http://bbs.res.meizu.com/resources/php/bbs/static/image/meizu_product_pic/m040.png' class='png_bg' alt='MX2 数量:1' title='MX2 数量:1' ></div>
                    <div class="sign_user_info">
                    	<a href="home.php?mod=space&amp;uid=1184989&amp;do=profile" target="_blank" title="查看详细资料"><em>更多资料</em><em class="arrow_2">&nbsp;</em></a>
                    </div>
                    
<div id="avatarfeed"><span id="threadsortswait"></span></div>
</div>
</div>
<div>

            

<div class="avatar head_uinfo" onmouseover="showauthor(this, 'userinfo118009286')" data-href="home.php?mod=space&amp;uid=1184989"><img src="http://img.res.meizu.com/img/download/uc/11/84/98/90/00/1184989/w100h100"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></div>

</div>




</td>
<td class="plc">
    

    	<div class="pi infobar_post">

<!--除开1楼的显示楼层数-->
<div class="barr_post">
                	<strong class="z floor_infobar">
                        <a href="forum.php?mod=redirect&goto=findpost&ptid=5285291&pid=118009286"  id="postnum118009286" onclick="setCopy(this.href, '帖子地址复制成功');return false;">9楼</a>
                    </strong>
                </div>   
                
                
            <div class="pti barl_post">
<div class="pdbt">
</div>
                                    <div class="authi"  >
                                            <a class="name_uinfo" href="home.php?mod=space&amp;uid=1184989" target="_blank" class="xw1" title="Cople">Cople</a>
<em class="userlevel_uinfo">
<a class="mzvip" href="viewthread.php?tid=4563325&amp;page=1#pid104677457"><img src="images/mzvip3.jpg" title="魅族产品认证用户" /></a>

                                                            <a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=48" target="_blank" class="mzpower" ><font color="#999999">论坛精英</font></a>
                            
<span class="cr"></span>
</em>
                                        <span id="authorposton118009286"><span title="2014-10-15 10:02:16">5&nbsp;天前</span></span>
                                                            </div>
                </div>
</div><div class="pct postcont_postlist fontsizelimit">
<div class="pcb">
<div class="t_fsz">
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_118009286"><div>
            	                	<font color="#515151"><font style="background-color:rgb(255, 255, 255)"><font face="微软雅黑"><font style="font-size:16px">JW 万豪酒店<img class='smilies_mz' src="http://bbs.res.meizu.com/resources/php/bbs/static/image/smiley/flyme3/gosh.gif" smilieid="138" border="0" alt="" /></font></font></font></font>                                        
            </div></td></tr></table>
</div>
    
    <div id="comment_118009286" class="cm comment_post"  >
    	<div class="comminner_post">
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-4894304.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/48/94/30/40/00/4894304/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-4894304.html" class="xi2 uname_pasth" title="酒店人">酒店人</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118158575&amp;ptid=5285291" title="JW万豪是万豪集团旗下其中的一个品牌">&nbsp;:&nbsp;JW万豪是万豪集团旗下其中的一个品牌</a><span class="xg1 comm_pasth"><span title="2014-10-20 09:53">3&nbsp;小时前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-2635875.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/26/35/87/50/00/2635875/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-2635875.html" class="xi2 uname_pasth" title="PentaxFun">PentaxFun</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118137870&amp;ptid=5285291" title="原名万豪酒店，但黄章经常光顾，甚觉不错，因此注资占股80%，遂更名为JW万豪！嘘，不要说是我告诉你的！">&nbsp;:&nbsp;原名万豪酒店，但黄章经常光顾，甚觉不错，因此注资占股80%，遂更名为JW万豪！嘘，不要说是我告诉你的！</a><span class="xg1 comm_pasth"><span title="2014-10-19 13:58">昨天&nbsp;13:58</span>
</span>
<span class="cr"> </span>
</div>
</div>
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-1234328.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/12/34/32/80/00/1234328/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<div class="psti">
<a href="space-uid-1234328.html" class="xi2 uname_pasth" title="sushilin">sushilin</a><a class="comcont_pasth" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=118092998&amp;ptid=5285291" title="对，这就是酒店名字，不要以这打错字了">&nbsp;:&nbsp;对，这就是酒店名字，不要以这打错字了</a><span class="xg1 comm_pasth"><span title="2014-10-17 20:57">3&nbsp;天前</span>
</span>
<span class="cr"> </span>
</div>
</div>
        </div>
</div>
</div></div>

</td></tr>
<tr><td class="plc plm">

</td>
</tr>
<tr>
<td class="pls"></td>
<td class="plc cbar_postlist">
<div class="score_post">
<a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=5285291&amp;pid=118009286" onclick="showWindow('viewratings', this.href)" title="评分" class="xi2"></a>
</div>
<div class="po cbarbox_postlist">
<!--删除的帖子不显示-->
<div class="pob">
<a class="fastre" href="javascript:;" data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;repquote=118009286&amp;extra=page%3D1&amp;page=1">回复</a>
                                                    
                                                                                                                                                                                                                <a id="recommend_subtract_118009286" class="support_oppose" href="javascript:;" onclick="supportOpFun(this.id);" title="0 人反对" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=0&amp;tid=5285291&amp;pid=118009286&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>反对</i>
                                                                                </a>
                                                                                                                                
                                                                                                                                                                                                                <a id="recommend_add_118009286" class="support_oppose" href="javascript:;"  onclick="supportOpFun(this.id);" title="0 人支持" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=1&amp;tid=5285291&amp;pid=118009286&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>支持</i>
                                                                                </a>
                                                                                                                                
                                                                                            	                    					
<div id="action_plist_118009286_menu" class="p_pop" style="display:none;width:118px;">
                    <a class="float_l" href="forum.php?mod=viewthread&amp;tid=5285291&amp;page=1&amp;authorid=1184989" rel="nofollow">只看该作者</a>
                    
                    
                                            
                        
                                                                            <a class="float_l" href="javascript:;" onclick="hideMenu('action_plist_118009286_menu','');showWindow('miscreport118009286', 'misc.php?mod=report&rtype=post&rid=118009286&tid=5285291&fid=22', 'get', -1);return false;">举报</a>
                                                
                                                
                                                                                
                    </div>
<em>
                                        
                    
                                        <a class="showmenu action_postlist" id="action_plist_118009286" onmouseover="showMenu(this.id)" href="javascript:;" hidefocus="true">操作<span class="arrow_gray"></span></a>
                    </em>



<div class="cr"></div>
</div>
          	</div>
<div class="cr"></div>
</td>
</tr>
<tr class="ad">
</td>
</tr>
</table>
 

<!--兼容删除的帖子普通用户直接跳过-->
</div>
<!--兼容删除的帖子普通用户直接跳过-->
<div id="post_118009377" class="item_postlist graybar_postlist">
<table id="pid118009377" summary="pid118009377" cellspacing="0" cellpadding="0">
<col width="64px" />
<col width="594px"/>
<tr>
<td class="pls" rowspan="2">
 
<div class="p_pop blk bui sign_card_user_box5" id="userinfo118009377" style="display: none; margin-top: -11px;">
<div class="m z">
<div id="userinfo118009377_ma" class="avatar"></div>
                    
</div>
<div class="i y" >
<div>
<div class="sign_name" >
<a href="space-uid-4161316.html" target="_blank" class="xi2">云千殇</a><img src="images/mzvip3.jpg" class="mzvip"/>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=15" target="_blank" class="mzpower" ><font color="#999999">金牌会员</font></a>
<div class="cr"></div>
</div>
<em>当前离线</em>
</div>
<dl class="cl sign_info">
                    	<dt>注册时间</dt><dd>2012-08-04</dd>
                        <dt>在线时间</dt><dd>378小时</dd>
                        <dt>个性签名</dt><dd></dd>
                        <div class="cr" style="height:17px; overflow:hidden;">&nbsp;</div>
                        <dt>帖子</dt><dd>965</dd>
                        <dt>魅力</dt><dd>7488</dd>
                        <dt>魅币</dt><dd>1839</dd>
                    </dl>
<div class="mzpro_user_info">
 <img src='http://bbs.res.meizu.com/resources/php/bbs/static/image/meizu_product_pic/m032.png' class='png_bg' alt='MX 四核手机 数量:1' title='MX 四核手机 数量:1' ></div>
                    <div class="sign_user_info">
                    	<a href="home.php?mod=space&amp;uid=4161316&amp;do=profile" target="_blank" title="查看详细资料"><em>更多资料</em><em class="arrow_2">&nbsp;</em></a>
                    </div>
                    
<div id="avatarfeed"><span id="threadsortswait"></span></div>
</div>
</div>
<div>

            

<div class="avatar head_uinfo" onmouseover="showauthor(this, 'userinfo118009377')" data-href="home.php?mod=space&amp;uid=4161316"><img src="http://img.res.meizu.com/img/download/uc/41/61/31/60/00/4161316/w100h100"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></div>

</div>




</td>
<td class="plc">
    

    	<div class="pi infobar_post">

<!--除开1楼的显示楼层数-->
<div class="barr_post">
                	<strong class="z floor_infobar">
                        <a href="forum.php?mod=redirect&goto=findpost&ptid=5285291&pid=118009377"  id="postnum118009377" onclick="setCopy(this.href, '帖子地址复制成功');return false;">18楼</a>
                    </strong>
                </div>   
                
                
            <div class="pti barl_post">
<div class="pdbt">
</div>
                                    <div class="authi"  >
                                            <a class="name_uinfo" href="home.php?mod=space&amp;uid=4161316" target="_blank" class="xw1" title="云千殇">云千殇</a>
<em class="userlevel_uinfo">
<a class="mzvip" href="viewthread.php?tid=4563325&amp;page=1#pid104677457"><img src="images/mzvip3.jpg" title="魅族产品认证用户" /></a>

                                                            <a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=15" target="_blank" class="mzpower" ><font color="#999999">金牌会员</font></a>
                            
<span class="cr"></span>
</em>
                                        <span id="authorposton118009377"><span title="2014-10-15 10:04:36">5&nbsp;天前</span></span>
                                                            </div>
                </div>
</div><div class="pct postcont_postlist fontsizelimit">
<div class="pcb">
<div class="t_fsz">
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_118009377"><div>
            	                	<a href="http://bbs.meizu.cn/forum.php?mod=redirect&goto=findpost&pid=118009349&ptid=5285291" target="_blank"><div class="quote"><blockquote><font size="2" class="fontsize_2"><font color="#999999">云千殇</font> <img id="aimg_m2zn3" onclick="zoom(this, this.src, 0, 0, 0)" class="zoom" src="images/mzvip3.jpg" onmouseover="img_onmouseoverfunc(this)" onload="thumbImg(this)" border="0" alt="" /> </font><font size="1" class="fontsize_1"></font>前排</blockquote></div></a>现在是第二次前排                                        
            </div></td></tr></table>
</div>
   
    <div id="comment_118009377" class="cm comment_post" style="display:none;" >
    	<div class="comminner_post">
        </div>
</div>
</div></div>

</td></tr>
<tr><td class="plc plm">

</td>
</tr>
<tr>
<td class="pls"></td>
<td class="plc cbar_postlist">
<div class="score_post">
<a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=5285291&amp;pid=118009377" onclick="showWindow('viewratings', this.href)" title="评分" class="xi2"></a>
</div>
<div class="po cbarbox_postlist">
<!--删除的帖子不显示-->
<div class="pob">
<a class="fastre" href="javascript:;" data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;repquote=118009377&amp;extra=page%3D1&amp;page=1">回复</a>
                                                    
                                                                                                                                                                                                                <a id="recommend_subtract_118009377" class="support_oppose" href="javascript:;" onclick="supportOpFun(this.id);" title="0 人反对" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=0&amp;tid=5285291&amp;pid=118009377&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>反对</i>
                                                                                </a>
                                                                                                                                
                                                                                                                                                                                                                <a id="recommend_add_118009377" class="support_oppose" href="javascript:;"  onclick="supportOpFun(this.id);" title="0 人支持" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=1&amp;tid=5285291&amp;pid=118009377&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>支持</i>
                                                                                </a>
                                                                                                                                
                                                                                            	                    					
<div id="action_plist_118009377_menu" class="p_pop" style="display:none;width:118px;">
                    <a class="float_l" href="forum.php?mod=viewthread&amp;tid=5285291&amp;page=1&amp;authorid=4161316" rel="nofollow">只看该作者</a>
                    
                    
                                            
                        
                                                                            <a class="float_l" href="javascript:;" onclick="hideMenu('action_plist_118009377_menu','');showWindow('miscreport118009377', 'misc.php?mod=report&rtype=post&rid=118009377&tid=5285291&fid=22', 'get', -1);return false;">举报</a>
                                                
                                                
                                                                                
                    </div>
<em>
                                        
                    
                                        <a class="showmenu action_postlist" id="action_plist_118009377" onmouseover="showMenu(this.id)" href="javascript:;" hidefocus="true">操作<span class="arrow_gray"></span></a>
                    </em>



<div class="cr"></div>
</div>
          	</div>
<div class="cr"></div>
</td>
</tr>
<tr class="ad">
</td>
</tr>
</table>

<script type="text/javascript" reload="1">
aimgcount[118009377] = ['m2zn3'];
attachimggroup(118009377);
attachimgshow(118009377);
var aimgfid = 0;
</script>

<!--兼容删除的帖子普通用户直接跳过-->
</div>
<!--兼容删除的帖子普通用户直接跳过-->
				<div id="postlistreply" ><div id="post_new" class="viewthread_table item_postlist graybar_postlist" style="display: none"></div></div>
				<div class="footdiv_post">
                    <form method="post" autocomplete="off" name="modactions" id="modactions">
                        <input type="hidden" name="formhash" value="10149d6d" />
                        <input type="hidden" name="optgroup" />
                        <input type="hidden" name="operation" />
                        <input type="hidden" name="listextra" value="page%3D1" />
                        <input type="hidden" name="page" value="1" />
                    </form>
					<div class="dividingline"></div>
					<div class="pgs mtm mbm cl pagebar">
						<span class="y"><a class="graybtn normalbtn" href="#">返回列表</a></span>
						<div class="pg">
							<a class="prev disprev"><em class="previcon"></em></a><strong>1</strong><a href="#">2</a><a href="#">3</a><a href="thread-5285291-4-1.html">4</a><a href="#" class="last">... 14</a><a href="#" class="nxt"><em class="nxticon"></em></a>
						</div>
					</div>
				</div>
			</div>