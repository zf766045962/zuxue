<? $id = V('r:id')==NULL?$_SESSION['u_uidss']:V('r:id') ?>
<? $nam=DS('publics._get','','users', "id= $id");?>
<? $con=DS('publics._get','','bbs_postcomment', "authorid =$id  and comment != '' and tid != 0 and rpid = 0 or poststatus = 1 and authorid =$id order by dateline desc limit 0,5"); ?>
<? $all1=DS('publics.get_total','','bbs_post', "authorid =$id  "); ?>
<? $all2=DS('publics.get_total','','user_follow', "uid = '".V('r:id')."'"); ?>
<? $all3=DS('publics.get_total','','user_follow', "followuid = '".V('r:id')."'"); ?>
<? $all4=DS('publics.get_total','','bbs_postcomment', "authorid =$id  and comment != '' and tid != 0 and rpid = 0 or poststatus = 1 and authorid =$id"); ?>
<? $sa = DS('publics._get','','user_follow',"uid = '".$_SESSION['u_uidss']."' and followuid = '".V('r:id')."'");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $nam[0]['username']?>的广播  魅族社区 </title>
  
    <link rel="stylesheet" type="text/css" href="css/bbscss/style_1_common.css" />
    <link rel="stylesheet" type="text/css" href="css/bbscss/style_1_home_follow.css" />
    
    <script src="js/bbsjs/common.js" type="text/javascript"></script>
 
	
    <script src="js/bbsjs/home.js" type="text/javascript"></script>
    <script src="js/bbsjs/public.js" type="text/javascript"></script>
    <script src="js/bbsjs/jquery.elements.js" type="text/javascript"></script>
	
	
	
	<link rel="stylesheet" href="css/style.css" />
<link href="css/nav.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/head_select.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/subclass.js"></script>

<script>
window.onload=function(){
	TOP('list');
	TOP('list2');
	TOP('list3');
	TOP('list4');
};
</script>
<style>
body{
	font-family:"微软雅黑","Microsoft Yahei","宋体",Tahoma,"Simsun",Arial,Helvetica,sans-serif;
	font-size:14px;
	
	}
	a{text-decoration:none;}
.foot{
	font-size:12px;
	}	
#cnzz_stat_icon_1253224175{
	padding:14px 0 0;
	}	

.mark span{
	
    background: inherit;
    display:initial;
    float: inherit;
    height: inherit;
    margin: inherit;
    position: inherit;
    width: inherit;

   
	}	
.preview-pic{
	 height:inherit;
	 }	

.mark em {
    font-style: inherit;
    height: inherit;
    left: inherit;
    line-height: inherit;
    position: inherit;
    top: 0;
}	 
			
</style>


</head>
<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">

	<div id="append_parent5" style="display:none;">
		<div id="fwin_a_friend_li_5057668" class="fwinmask" style="position: fixed; z-index: 1301; left: 458px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin"><tbody><tr><td id="fwin_content_followmod" class="m_c" style="" fwin="followmod"><h3 class="flb" id="fctrl_followmod" style="cursor: move;"><em>提示信息</em><span><a title="关闭" onclick="hideWindowss1();" class="flbc" href="javascript:;">关闭</a></span></h3>
<div class="c altw">
<div class="alert_error">请先<a href="<?=URL('login')?>" target="_blank">登录</a><script reload="1" type="text/javascript">if(typeof errorhandle_followmod=='function') {errorhandle_followmod('请先登录', {});}</script></div>
</div>
<p class="o pns">
<button onclick="hideWindowss1();" id="closebtn" class="normalbtn bluebtn z" type="button" fwin="followmod"><strong>确定</strong></button>
<script reload="1" type="text/javascript">if($('closebtn')) {$('closebtn').focus();}</script>
</p>
</td></tr></tbody></table>


		</div>
		
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<div id="append_parent4" style="display:none;">
		<div id="fwin_a_friend_li_5057668" class="fwinmask" style="position: absolute; z-index: 1301; left: 458px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin"><tbody><tr><td id="fwin_content_a_friend_li_2904818" class="m_c" style="" fwin="a_friend_li_2904818"><h3 class="flb" id="fctrl_a_friend_li_2904818" style="cursor: move;"><em>提示信息</em><span><a title="关闭" onclick="hideWindowss();" class="flbc" href="javascript:;">关闭</a></span></h3>
<div class="c altw">
<div class="alert_error">你们已成为好友<script reload="1" type="text/javascript">if(typeof errorhandle_a_friend_li_2904818=='function') {errorhandle_a_friend_li_2904818('你们已成为好友', {});}</script></div>
</div>
<p class="o pns">
<button onclick="hideWindowss();" id="closebtn" class="normalbtn bluebtn z" type="button" fwin="a_friend_li_2904818"><strong>确定</strong></button>
<script reload="1" type="text/javascript">if($('closebtn')) {$('closebtn').focus();}</script>
</p>
</td></tr></tbody></table>


		</div>
		
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<div id="append_parent2" style="display:none">
		<div id="fwin_a_friend_li_5057668" class="fwinmask" style="position: absolute; z-index: 1302; left: 458px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody>
                	<tr>
                    	<td id="fwin_content_a_friend_li_5057668" class="m_c" style="" fwin="a_friend_li_5057668">			
                        	<h3 class="flb" id="fctrl_a_friend_li_5057668" style="cursor: move;">
								<em id="return_a_friend_li_5057668" fwin="a_friend_li_5057668">加为好友</em>
								<span><a title="关闭" class="flbc" onclick="fendcl();" href="javascript:;">关闭</a></span>
							</h3>
							<form onsubmit="ajaxpost(this.id, 'return_a_friend_li_5057668');" action="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=5057668" name="addform_5057668" id="addform_5057668" autocomplete="off" method="post" fwin="a_friend_li_5057668">
                                <input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow&amp;uid=5057668&amp;do=view&amp;from=space" name="referer">
                                <input type="hidden" value="true" name="addsubmit">
                                <input type="hidden" value="a_friend_li_5057668" name="handlekey"><input type="hidden" value="c0954ebf" name="formhash">
                                <div class="c input_w_316">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th width="60" valign="top" class="avt"><a href="space-uid-5057668.html"><img  src="<?=$nam[0]['head_img'] == NULL?'images/noavatar_big.gif':$nam[0]['head_img']?>"></a></th>
                                                <td valign="top">添加 <strong><?=$nam[0]['username']?></strong> 为好友，附言:<br>
                                                    <input type="text" style="margin:5px 0px;" onkeydown="ctrlEnter(event, 'addsubmit_btn', 1);" class="px" size="35" value="" id="note22" name="note">
                                                    <p class="mtn xg1">(附言为可选<?=$nam[0]['username']?> 会看到这条附言，最多50个字符 )</p>
                                                    <p style="margin:5px 0px;" class="mtm">分组: 
                                                        <select class="ps" name="gid" id="gid">
                                                            <option value="0">其他</option>
                                                            <option selected="selected" value="1">通过本站认识</option>
                                                            <option value="2">通过活动认识</option>
                                                            <option value="3">通过朋友认识</option>
                                                            <option value="4">亲人</option>
                                                            <option value="5">同事</option>
                                                            <option value="6">同学</option>
                                                            <option value="7">不认识</option>
                                                        </select>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								<p class="o pns btnbar_fwin_l"><a class="normalbtn bluebtn"><button value="true" onclick="addsubmit_btn1()" id="addsubmit_btn33" name="addsubmit_btn" type="button" fwin="a_friend_li_5057668"><strong>确定</strong></button></a></p>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<div id="append_parent" name="append_parentlo" style="display:none">
		<div id="fwin_followmod" class="fwinmask" style="position: absolute; z-index: 1301; left: 496px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody><tr>
                	<td id="fwin_content_followmod" class="m_c" style="" fwin="followmod">
                    	<h3 class="flb" id="fctrl_followmod" style="cursor: move;"><em>提示信息</em><span><a title="关闭" onclick="hideWindow2();" class="flbc" href="javascript:;">关闭</a></span></h3>
						<div class="c altw">
							<div class="alert_error" id="alert_error">请先<a href="<?=URL('login')?>" target="_blank" >登录</a></div>
						</div>
						<p class="o pns" id="pns1"><button   onclick = "hideWindow2()" id="closebtn" class="normalbtn bluebtn z" type="button" fwin="followmod"><strong>确定</strong></button>
					<script reload="1" type="text/javascript">if($('closebtn')) {$('closebtn').focus();}</script>
						</p>
					</td>
				</tr></tbody>
			</table>
		</div>
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<script>
		function hideWindow2(){
			document.getElementById('append_parent').style.display='none';
		}			
	</script>
	<div id="append_parent1" style="display:none">
		<div style="display: none;" id="append_parent">
			<div initialized="true" style="position: absolute; z-index: 601; left: 496px; top: 226px;" class="fwinmask" id="fwin_followmod"><style type="text/css">object{visibility:hidden;}</style>
            	<table cellspacing="0" cellpadding="0" class="fwin">
                	<tbody><tr>
                    	<td fwin="followmod" style="" class="m_c" id="fwin_content_followmod">
                        	<h3 style="cursor: move;" id="fctrl_followmod" class="flb"><em>提示信息</em><span><a href="javascript:;" class="flbc" onclick="hideWindow2();" title="关闭">关闭</a></span></h3>
							<div class="c altw">
								<div id="alert_error" class="alert_error">您已经收听过了</div>
							</div>
							<p class="o pns"><button fwin="followmod" type="button" class="normalbtn bluebtn z" id="closebtn" onclick="hideWindow2()"><strong>确定</strong></button>
					<script type="text/javascript" reload="1">if($('closebtn')) {$('closebtn').focus();}</script>
							</p>
						</td>
					</tr></tbody>
				</table>
			</div>
		</div>
		<div id="fwin_showMsgBox" class="fwinmask" style="position: absolute; z-index: 1301; left: 502px; top: 99px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody><tr>
                	<td id="fwin_content_showMsgBox" class="m_c login_showMsgBox" style="" fwin="showMsgBox">
                    	<div class="pm pm_chat">
							<h3 class="flb" id="fctrl_showMsgBox" style="cursor: move;"><span><a title="关闭" class="flbc" onclick="hieddd();" href="javascript:;">关闭</a></span></h3>
							<div class="pm_tac bbda cl">
        						<div class="fll"><?=$nam[0]['username']?></div>   
								<a target="_blank" class="pm_notes" href="<?=URL('bbs2.space','&uid='.$_SESSION['u_uidss'].'&followuid='.V('r:id'))?>"><div class="pm_notes_icon"> </div>查看聊天记录<div class="cr"></div></a>
								<a target="_blank" class="pm_space" href=""><div class="pm_space_icon"> </div>访问好友空间<div class="cr"></div></a>     	
								<div class="shadebox_chat"></div>
							</div>
        					<div class="pm_avatar"><img  src="<?=$nam[0]['head_img'] == NULL?'images/noavatar_big.gif':$nam[0]['head_img']?>"></div>        
							<div class="c">
								<ul id="msglist" class="pmb" fwin="showMsgBox"></ul>
								<script type="text/javascript">
                                    var refresh = true;
                                    var refreshHandle = -1;
                                </script>
								<div class="pmfm">
                                    <form onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id,  'return_showMsgBox');refreshMsg();" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;touid=5057668" autocomplete="off" method="post" name="pmform_5057668" id="pmform_5057668" fwin="showMsgBox">
                                        <input type="hidden" value="true" name="pmsubmit">
                                        <input type="hidden" value="5057668" name="touid">
                                        <input type="hidden" value="c0954ebf" name="formhash">
                                    	<div style="margin-bottom:5px" class="xi1" id="return_showMsgBox" fwin="showMsgBox"></div>
										<input type="hidden" value="showMsgBox" name="handlekey">
										<div class="tedt">
											<div style="display:none;" class="bar">
                                            	<div class="fpd">
													<a onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;" id="pmsml" title="表情" class="fsml" href="javascript:;" fwin="showMsgBox"><em></em></a>
    												<a onclick="seditor_fastUpload('pm', 'img');doane(event);" class="fmg" title="图片" href="javascript:;" id="pmimg" fwin="showMsgBox"><em></em></a>   
												</div>
											</div>
											<div class="area">
												<textarea autofocus="" onkeydown="ctrlEnter(event, 'pmsubmit_btn');" id="pmmessage" class="pt" name="message" cols="80" rows="3" fwin="showMsgBox"></textarea>
												<input type="hidden" value="" id="messageappend" name="messageappend" fwin="showMsgBox">
											</div>
										</div>
										<div style="margin-top:20px;" class="mtn pns cl">
 											<button style="width:96px !important;" onclick="send22()" id="pmsubmit_btn1" class="pn normalbtn bluebtn" type="button" fwin="showMsgBox"><strong>发送</strong></button>
 											<div style="display:none;" class="pma mtn z"><a onclick="refreshMsg();" title="刷新" href="javascript:;"><img class="vm" alt="刷新" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/pm-ico5.png"> 刷新</a></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</td>
				</tr></tbody>
			</table>
		</div>
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<div id="ajaxwaitid"></div>
	<div id="hd">
	<? TPL :: display('head');
	TPL :: display('headnav');?>
	<div class="second-banner tc">
    	<img src="/images/second_r.gif" />
    </div>
	<? TPL :: display("bbs/hd");?>
	</div>          
	   </div>               
	<div id="wp" class="wp"><style id="diy_style" type="text/css"></style>
		<div class="wp"><div id="diy1" class="area"></div></div>
		<div>
            <div id="meizu_space" >
        		<div class="space_box">
                    <div class="meizu_name">
                        <span class="inner_uname"><?=$nam[0]['username']?></span>
                        <a class="mzvip" href="#"><img src="images/mzvip3_b.jpg" title="" /><span class="cl"></span></a>
                    </div>
                    <div class="avatar_img">
                        <a class="avatar"><img src="
						
						<?
						if($nam[0]['head_img'] == NULL){
							echo 'images/noavatar_big.gif.png';
							}else{
							echo $nam[0]['head_img'];	
								}
						?>
						
						"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></a>
                    </div>
                    <div class="top20" >
                        <div class="grid" >
                            <div class="number" ><?=$all1==NULL?0:$all1?></div>
                            <div class="explain" >帖子</div>
                        </div>
                        <div class="grid" >
                            <div class="number" ><?=$all2==NULL?0:$all2?></div>
                            <div class="explain" >收听</div>
                        </div>
                        <div class="grid" >
                            <div class="number" ><?=$all3==NULL?0:$all3?></div>
                            <div class="explain" >听众</div>
                        </div>
                        <div class="cr" ></div>
                    </div>
				</div>
        		<div  class="space_box cut_line" style="padding-top:10px;" >	
					<div>
					<? if($sa == NULL){?>
						<a id="followmod2" class="social_listen normalbtn bluebtn" onclick="showWindow();" href="#">收听</a>
 					<? }else{?>
						<a id="followmod2" class="social_listen normalbtn bluebtn" onclick="showWindow1();" href="#">取消收听</a>
					<? }?>	
            		</div>
					<div>
					
						<a  id="followmod2" class="social_listen normalbtn bluebtn" onclick="seeend();" href="#">发送消息</a>

            		</div>
            		<?php /*?><div>
                		<div  style="float:left;" >
                    		<a href="#" id="a_sendpm_4040818" onclick="seeend()" title="发送消息" class="social_contact normalbtn graybtn w80">发消息</a>
                		</div>
                		<div style="float:left; margin-left:15px;" >
							<a href="#" id="a_friend_li_4040818" onclick="showfend()"  class="xi2 social_contact normalbtn graybtn w80">加为好友</a>
						</div>
                		<div class="cr"></div>
            		</div><?php */?>
        		</div>
        		<?php /*?><div  class="space_box cut_line" >
        			<div>
            			<span style="color:#FF7400">
        					<a href="#" target="_blank"><font color="#FF7400">魅族版主</font></a>
        				</span>
            		</div>
            		<div class="mzpro_pic" style=" margin-top:15px; ">
                    	              
					</div>
				</div>  <?php */?>
    		</div>
    <script type="text/javascript">
        function succeedhandle_followmod(url, msg, values) {
            var fObj = $('followmod');
            if(values['type'] == 'add') {
                fObj.innerHTML = '取消收听';
fObj.className = 'social_listen normalbtn graybtn';
                fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
            } else if(values['type'] == 'del') {
                fObj.innerHTML = '收听';
fObj.className = 'social_listen normalbtn bluebtn';
                fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&fuid='+values['fuid'];
            }
        }
    </script>
            <div class="ct1 wp cl personal_onfo" >
    			<div class=" ">
                	<div class="page_frame_navigation" >
    					<div class="follow_feed_cover" style="left:<? if(V('r:ccid') == 2){
								echo 129;
								}else{
								echo 22;
									}?>px;" ></div>
    					<ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
        					<li 
							<? if(V('r:ccid') == 1 or V('r:ccid') == NULL){
								echo 'class="a"';
								}?>
							 ><a href="<?= URL('bbsUser.user_broadcast','id='.V('r:id'))?>">广播</a></li>
        					<li <? if(V('r:ccid') == 2){
								echo 'class="a"';
								}?> ><a href="<?= URL('bbsUser.user_broadcast','&id='.V('r:id').'&ccid=2')?>" >主题</a></li>
        					<li  ><a href="<?= URL('bbsUser.user_info','&id='.V('r:id'))?>" >个人资料</a></li>
							<li class="manage_frame_nav" style="float:right;width:200px;position:relative"></li>
    					</ul>
					</div>         
					
					
					
					
					
					<? if(V('r:ccid') == 2){?>
					                      
					<div class="bm_c">



<div class="tl">
<form onsubmit="showDialog('确定要删除选中的主题吗？', 'confirm', '', '$(\'delform\').submit();'); return false;" action="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" id="delform" name="delform" autocomplete="off" method="post">
<input type="hidden" value="411141f6" name="formhash">
<input type="hidden" value="true" name="delthread">
                    <table cellspacing="0" cellpadding="0" class="space_thread_table">
                    <tbody>
				<tr class="space_th">
<td class="icn">&nbsp;</td>
<th>                
                            	<p class="space_tbmu">
                                    <a <? if(V('r:cccid') == 1 or V('r:cccid') == NULL){
										echo  'class="a"';
										}?> href="<?= URL('bbsUser.user_broadcast','&id='.V('r:id').'&ccid=2'.'&cccid=1')?>">发表</a>
                                    <span class="pipe">|</span>
                                    <a <? if(V('r:cccid') == 2){
										echo  'class="a"';
										}?> href="<?= URL('bbsUser.user_broadcast','&id='.V('r:id').'&ccid=2'.'&cccid=2')?>">回复</a>
                                </p>
                			</th>
<td class="frm">版块</td>
<td class="num">回复/查看</td>
<td class="by"><cite>发表时间</cite></td>
</tr>
				<? if(V('r:cccid') == 1 or V('r:cccid') == NULL){?>
				<? $tzi22=DS('publics.page_list','',20,"authorid = ".V('r:id'),'dateline desc',V('g'),'bbs_post')?>
				<? //$tzi22 = DS('publics._get','','bbs_post',"authorid = '".V('r:id')."' order by dateline desc");?>
				
				<? if(isset($tzi22['info']) && !empty($tzi22['info'])){?>
				<? foreach($tzi22['info'] as $k=>$v){?>
				<? $plant = DS('publics._get','','bbs_forum','fid='.$v['fid']);?>
				
				<tr><td class="icn">&nbsp;
				
				</td>
				<th class="scontent">
				<a target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$v['fid']."&tid=".$v['pid'])?>"><?=htmlspecialchars($v['subject'])?></a>
				
				</th>
				<td>
				<a target="_blank" class="forum" href="<?= URL('bbs.thread','&fid='.$v['fid'])?>"><?=$plant[0]['name']?></a>
				</td>
				
				<td class="num">
				<div class="sreply"><a target="_blank" class="xi2" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>"><?= $v['alltip']?></a></div>
				<div class="sview"><?= $v['looknum']?></div>
				</td>
				
				<td class="by">
				<div class="sview"><span ><?= date("Y-m-d",$v['dateline'])?></span></div>
				</td>
				</tr>
				
	   			<? }?>
				<tr>
					<td colspan="4">
			 	<div class="pages" style="margin-top:20px">
					
					<?= $tzi22['pagehtml']?>
				</div>
					
					</td>
					</tr>
				
				<? }else{?>
					<tr>
					<td colspan="4">
					
							<div class="emp" style=" padding:20px 0px;">
								<h2 class="mbw xg1 xs2 hm" style="margin:30px 0;">还没有发表主题</h2>
							</div>
						
					</td>
					</tr>	
					
				<? }?>
				
				<? }else if(V('r:cccid') == 2){?>
				
				<?php /*?>select distinct(tid) from xsmart_bbs_postcomment WHERE authorid = 36410<?php */?>
				
				<? $tzi22e=DS('publics.page_list33','',20,"pid != 0 and poststatus != 1 and  authorid=".V('r:id'),'dateline desc',V('g'),'bbs_postcomment','distinct(tid)')?>
				
				<?php /*?><? $tzi22e = DS('publics._get','','bbs_postcomment',"authorid = '".V('r:id')."' and comment != '' and rpid = 0 order by dateline desc");?><?php */?>
				
				<? if(isset($tzi22e['info']) && !empty($tzi22e['info'])){?>
				
				<? foreach($tzi22e['info'] as $k=>$v){?>
				
				<?
				
			 	 $tzi = DS('publics._get','','bbs_post','pid='.$v['tid']);	
				 $plant = DS('publics._get','','bbs_forum','fid='.$tzi[0]['fid']);	
				?>
				
				<tr><td class="icn">&nbsp;

</td>
<th class="scontent">
<a target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$tzi[0]['fid'].'&tid='.$tzi[0]['pid'])?> "><?=htmlspecialchars($tzi[0]['subject'])?></a>

</th>
<td>
<a target="_blank" class="forum" href="<?= URL('bbs.thread','&fid='.$tzi[0]['fid'])?>"><?= $plant[0]['name']?></a>
</td>

<td class="num">
<div class="sreply"><a target="_blank" class="xi2" href="<?= URL('bbs.thread_detail','&fid='.$plant[0]['fid'].'&tid='.$tzi[0]['pid'])?>"><?= $tzi[0]['alltip']?></a></div>
<div class="sview"><?= $tzi[0]['looknum']?></div>
</td>

<td class="by">
<div class="sview"><span><?= date("Y-m-d",$tzi[0]['dateline'])?></span></div>
</td>
</tr>
				<tr>
<td class="xg1" colspan="5">
                                <div class="guide_list_replay">     
								<?  $hf = DS('publics._get','','bbs_postcomment',"tid = '".$v['tid']."' and authorid = '".V('r:id')."' and comment != '' order by dateline desc");	?>     
								<? if(isset($hf) && !empty($hf)){?>
								<? foreach($hf as $k=>$vv){?>
		               
								<div class="tl_reply">
                                <a target="_blank" style="color:#3366dd;" href="<?= URL('bbs2.lczda','&lcid='.$vv['id'].'&tid='.$vv['tid'].'&fid='.$vv['pid'])?>">回复主题&nbsp;:&nbsp;<?= htmlspecialchars($vv['comment'])?></a></div>
		
								<? }?>   
								<? }?>     
                            	
                                
                            	<div class="arrow_guidelist"></div>
                            	</div>
                            	</td>
</tr>

				<? }?>
				<tr>
					<td colspan="4">
			 	<div class="pages" style="margin-top:20px">
					
					<?= $tzi22e['pagehtml']?>
				</div>
					
					</td>
					</tr>
				<? }else{?>
					<tr>
					<td colspan="4">
					
							<div class="emp" style=" padding:20px 0px;">
								<h2 class="mbw xg1 xs2 hm" style="margin:30px 0;">还没有回复主题</h2>
							</div>
						
					</td>
					</tr>	
					
				<? }?>
				
				<? }?>
</tbody></table>

</form>
				
<!-- 产品要求隐藏 <p class="mtm" style="height:20px;padding-top:10px;">本页有 1 篇帖子因隐私问题而隐藏</p> -->
</div>
<div class="pgs cl mtm pagebar">




</div>		

<script type="text/javascript">
function fuidgoto(fuid) {
window.location.href = 'home.php?mod=space&amp;do=thread&amp;view=we&amp;fuid='+fuid;
}
function viewforumthread(fid) {
window.location.href = 'home.php?mod=space&amp;uid=1145176&amp;do=thread&amp;view=me&amp;type=thread&amp;order=dateline&amp;from=space&amp;fid='+fid;
}
</script>

<!--[diy=diycontentbottom]--><div class="area" id="diycontentbottom"></div><!--[/diy]--></div>
					
					
					
					<? }else{?>
					<div class="flw_feed">
						<ul id="followlist">
						<? foreach($con as $k=>$v){?>
					
					
						<? $con66=DS('publics._get','','bbs_post', "pid ='".$v['tid']."'"); ?>
							<li class="cl" name = "lili" id="feed_li_3639169" onmouseover="this.className='flw_feed_hover cl'" onmouseout="this.className='cl'">	
						<?php 
							
							if(date('Y',time()) != date('Y',(int)$v['dateline'])){
								$times =  date('Y',time()) - date('Y',(int)$v['dateline']).'年前';
							}else if(date('m',time()) != date('m',(int)$zhf['dateline'])){
								$times =  date('m',time()) - date('m',(int)$v['dateline']).'个月前';
							}else if(date('d',(int)$v['dateline']) != date('d',time())){
								$times =  date('d',time()) - date('d',(int)$v['dateline']).'天前';
							}else if(date('H',(int)$v['dateline']) != date('H',time())){
								$times =  date('H',time()) - date('H',(int)$v['dateline']).'小时前';
							}else if(date('i',(int)$v['dateline']) != date('i',time())){
								$times =  date('i',time()) - date('i',(int)$v['dateline']).'分钟前';
							}else if(date('s',(int)$v['dateline']) != date('s',time())){
								$times =  date('s',time()) - date('s',(int)$v['dateline']).'秒前';
							}else {
								$times =  '刚刚';
								}	
							
																
						?>
								<div class="feed_li_box" >      	            
            						<div class="flw_article" style="margin-left:0; padding-left:0px;" >
                                		<div class="flw_author">
										<?	 $name = DS('publics._get','','bbs_forum','fid='.$v['pid']);?>
                                        	<a class="name_feedlist" href="javascript:;"><?=$nam[0]['username']?>&nbsp;&nbsp;</a> 发表于 <span title="<?=date('Y-m-d h:i',(int)$v['dateline'])?>"><?=$times?></span>&nbsp;&nbsp;#<a href="<?= URL('bbs.thread','&fid='.$v['pid'])?>"><?=$name[0]['name']?></a>
                                    	</div>
										
									<? if($v['poststatus'] == 1){?>
									<? $postsubs = DS('publics._get','','bbs_post','pid='.$v['tid']);?>	
										<h2 class="wx pbn">
                                    <a target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$v['pid'].'&tid='.$v['tid'])?>"><?=htmlspecialchars($postsubs[0]['subject'])?></a>
                                            </h2>
										<div id="original_content_15632896" class="pbm c cl atcont_flwlist">
                       						<?=$postsubs[0]['content']?>		
                                        </div>
										<div class="xg1 cl">
												<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1(<?=$v['id']?>)">回复&nbsp; </a></span>
												</div>
                            				</div>
										<? }else{?>
                                		<div class="flw_quotenote xs2 pbw"><a href="<?= URL('bbs2.lczda','&lcid='.$v['id'].'&tid='.$v['tid'].'&fid='.$v['pid'])?> " target="_blank" ><?=htmlspecialchars($v['comment'])?> <br /></a></div>
                						<div class="flw_quote guide_list_replay">
											<div class="arrow_guidelist"></div>
											
											 <h2 class="wx pbn"><a href="<?= URL('bbs.thread_detail','&fid='.$v['pid']."&tid=".$v['tid']."")?>" target="_blank">
							<?	 $tidname = DS('publics._get','','bbs_post','pid='.$v['tid']);
								 echo htmlspecialchars($tidname[0]['subject']);?>
								
							
							
							</a></h2>
								
                           					 <div id="original_content_<?= $pv['authorid']?>" class="pbm c cl atcont_flwlist">
							 <? echo $tidname[0]['content'];?>
							
							</div>                                            
                							<div class="xg1 cl">
												<div class="y flw_btnbar"><span class="y"><?php /*?><a href="javascript:;" id="relay_<?= $v['authorid']?>" onclick="quickrelay1(<?=$v['id']?>);">转播&nbsp; </a><?php */?><a href="javascript:;" onclick="quickreply1(<?=$v['id']?>)">回复&nbsp; </a></span>
												</div>
                            				</div>
                						</div>
										<? }?>
										<div class="cr"></div>
            						</div>			
	<script>
		function quickrelay1(id){
			document.getElementById('relaybox_'+id).style.display = "block";
		}
		
		function quickrelay2(id){
			document.getElementById('relaybox_'+id).style.display = "none";
		}
			
		function quickreply1(id){	
		$(".flw_replybox").attr("style","display:none")
			document.getElementById('replybox_'+id).style.display = "block";
		}
		
		function quickreply2(id){
			document.getElementById('replybox_'+id).style.display = "none";
		}
			
		function insert(idd,id,fid){
			var idss1 = "<?=$_SESSION['u_uidss']?> ";
	
		if(idss1 != 0 ){
				
			var yz = document.getElementById("load11").innerHTML
			var yz1 = document.getElementById("seccodeverify_SAyd29av01"+idd).value
			var con = document.getElementById('postmessage_'+idd).value;
			if(yz == yz1 && yz1.length != 0){
				if(con.length != 0 ){
					var xmlhttp;
					if (window.XMLHttpRequest){
						xmlhttp=new XMLHttpRequest();
			  		}else{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  		}
					xmlhttp.onreadystatechange=function(){
				 		if (xmlhttp.readyState==4 && xmlhttp.status==200){
							location.href=''
					//document.getElementById("load11").innerHTML=xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","<?=URL('bbs2.insers'),'&con='?>"+con+'&tid='+id+'&fid='+fid,true);
					xmlhttp.send();	
				}else{
					alert('请输入内容')
				}	
			}else{
				alert('验证码不正确')
			}	
			}else{
				document.getElementById('append_parent').style.display=""	
				location.hash="append_parent";
				}
		}	
		
		
	</script>	
									<div id="load11" style="display:none"></div>			
									<div style="display:none" class="flw_replybox cl" id="relaybox_<?=$v['id']?>">	
                                    	<span style="margin: -23px 135px 0 0;" class="cnr"></span>
										<form onsubmit="return ajaxpost2(this.id, 'return_qrelay_12918932');" action="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=5313176" id="postform_5313176" autocomplete="off" method="post">
                                        	<input type="hidden" value="true" name="relaysubmit">
                                        	<input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow" name="referer">
                                        	<input type="hidden" value="3554c853" name="formhash">
                                        	<input type="hidden" value="5313176" name="tid">
                                        	<input type="hidden" value="qrelay_12918932" name="handlekey">
            								<span class="flw_autopt"><textarea onkeyup="strLenCalc(this, 'checklen5313176', 140);" rows="4" cols="80" class="pts" name="note" id="note_5313176"></textarea></span>
            								<div style=" margin:30px 0px;">
												<div style="float:left; width:400px;" class="mtm sec identifying_code">
													<input type="hidden" value="SAyd29av0" name="sechash">验证码 			
                                                    <span onclick="showMenu({'ctrlid':this.id,'win':'qrelay_12918932'})" id="seccodeSAyd29av0">
                                                        <input type="text" tabindex="1" onblur="checksec('code', 'SAyd29av0')" class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av0<?=$v['id']?>" name="seccodeverify">
        												<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=22881&amp;idhash=SAyd29av0" onclick="updateseccode5('SAyd29av0','follow_rebroadcast')"></span>        
														<a class="xi2" onclick="updateseccode5('SAyd29av0','follow_rebroadcast');doane(event);" href="javascript:;">换一个</a>
														<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
													</span>
                                                    <div style="display:none;height:0px; width:0px; border-width:0px;" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>        <script reload="1" type="text/javascript">updateseccode5('SAyd29av0','follow_rebroadcast');</script>
													</div>
												</div>
                								<button tabindex="23" value="true" class="pn pnc" id="relaysubmit_btn" name="relaysubmit_btn" type="submit" style="float:right; margin-left:20px;"><span>转播</span></button><label style="margin-top:8px;" class="y wrap_simcheck checked_simcheck"><span class="box_simcheck"></span><input type="checkbox" checked="checked" value="1" class="pc" name="addnewreply">同时回复</label>      
                								<div style="float:right;  margin:8px 20px 0 0;">还能输入<span class="xg1" id="checklen5313176">140</span>字</div><div class="cr"></div>
            								</div>
											<div id="return_qrelay_12918932"></div>
										</form>
										<div class="cl closebar_replybox" onclick="quickrelay2(<?=$v['id']?>)"><a class="y xg1" onclick="display('relaybox_12918932')" href="javascript:;"></a></div>
										<script type="text/javascript">
                                            $('note_5313176').focus();
                                            function succeedhandle_qrelay_12918932(url, message, values) {
                                                $('relaybox_12918932').style.display = 'none';
                                                showCreditPrompt();
                                            }
                                        </script>
									</div>
									<div style="display:none" class="flw_replybox cl" id="replybox_<?=$v['id']?>">	
                                    	<span class="cnr"></span>
										<form class="mbm" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id, 'return_qreply_12918932', 'return_qreply_12918932', 'onerror');return false;" action="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;extra=&amp;tid=5313176&amp;replysubmit=yes" id="postform_12918932" autocomplete="off" method="post">
											<input type="hidden" value="3554c853" id="formhash" name="formhash">
											<input type="hidden" value="qreply_12918932" name="handlekey">
											<span style="display: none;" id="subjectbox"><input style="width: 25em" tabindex="21" value="" class="px" id="subject" name="subject"></span>
    										<span class="flw_autopt"><textarea rows="4" cols="80" class="pts" id="postmessage_<?=$v['id']?>" name="message"></textarea></span>
                                            <div style="margin:30px 0px;">
                                               <button tabindex="23" name="" value="true" class="pn pnc" id="postsubmit<?=$v['id']?>" style="float:right; margin-left:20px;" type="button" onclick="insert(<?=$v['id']?>,<?=$con66[0]['pid']?>,<?=$v['pid']?>)"><span>回复</span></button><div class="cr"></div>
                                            </div>    
											<div class="mtm">
												<input type="hidden" value="SAyd29av0" name="sechash">
												<ul>
                                                	<li><em class="d">验证码</em>
                                                    	<span>
                                                        	<input type="text" tabindex="1"  class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av01<?=$v['id']?>" name="seccodeverify">        
															<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=76004&amp;idhash=SAyd29av0" onclick="updateseccode5('SAyd29av0','follow_rebroadcast')"></span>        
															<a class="xi2" onclick="refreshCc(<?=$v['id']?>)" href="javascript:;">换一个</a><img id="checkCodeImg1<?=$v['id']?>" src="/code/vdimgck.php" width="68" height="24" class="yz" onclick="refreshCc(<?=$v['id']?>)">
															<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
														</span>
														<div style="display:none" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>        
<script reload="1" type="text/javascript">updateseccode5('SAyd29av0','follow_rebroadcast');</script>
										</div></li></ul></div></form>
										<ul class="list_replybox" id="newreply_5313176_12918932">
										
<? if($v['rpid'] == 0){?>
			
		<?	 $name = DS('publics._get','','bbs_postcomment',"comment != '' and tid=".$v['tid'] .' and rpid = 0 order by dateline desc limit 0,5');?>
			<? foreach($name as $kk22 =>$vv22 ){?> 
			<? if($vv22['author'] != NULL and $vv22['comment'] != NULL){?>
				<li><a class="d xi2" href="<?= URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."")?>"><?=$vv22['author']?>&nbsp;&nbsp;</a><?=htmlspecialchars($vv22['comment'])?></li>
				<? }?>
			<? }?>
		<? }else{?>
				<?	 $name31222 = DS('publics._get','','bbs_postcomment',"comment != '' and rpid=".$vv22['rpid'] .' order by dateline desc limit 0,5');?>	
				<? foreach($name31222 as $kk22 =>$vv22 ){?>
				<? if($vv22['author'] != NULL and $vv22['comment'] != NULL){?>
				<li><a class="d xi2" href="<?= URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."")?>"><?=$vv22['author']?>&nbsp;&nbsp;</a><?=htmlspecialchars($vv22['comment'])?></li>
				<? }?>	
		<? }?>
		<? }?>
		</ul>
		<div class="cl closebar_replybox"><a title="关闭" class="y xg1" onclick="quickreply2(<?=$v['id']?>)" href="javascript:;"></a>
		<? if($pv['classid'] == 0 and $kk22 == 4){?>
<a class="xi2" target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$v['pid']."&tid=".$v['tid']."")?>">去论坛查看所有回复<em class="arrow_2"> </em></a>
<? }?>
		</div>
<script type="text/javascript">
	function succeedhandle_qreply_12918932(url, msg, values) {
		var x = new Ajax();
		x.get('forum.php?mod=ajax&amp;action=getpost&amp;inajax=1&amp;tid='+values.tid+'&amp;fid='+values.fid+'&amp;id='+values.id, function(s){
			newli = document.createElement("li");
			newli.innerHTML = s;
			var ulObj = $('newreply_'+values.tid+'_12918932');
			ulObj.insertBefore(newli, ulObj.firstChild);
			$('postmessage_5313176_12918932').value = '';
			if(values.sechash) {
				updatesecqaa(values.sechash);
				updateseccode(values.sechash);
				$('seccodeverify_'+values.sechash).value='';
			}
		});
		if(parseInt(values.feedid)) {
			getNewFollowFeed(values.tid, values.fid, values.pid, values.feedid);
		}
	}
</script>
									</div>		
            						<div id="replybox_3639169" class="flw_replybox cl" style="display: none;"></div>
            						<div id="relaybox_3639169" class="flw_replybox cl" style="display: none;"></div>
<script type="text/javascript">
	spaceClosedFun();
</script>
        						</div>	
							</li>
	
	<? }?>
						</ul>
						<div id="loadingfeed" class="flw_more">
				<div class="flw_more" id="loadingfeed">
				
					<? if($con == NULL){?>
					<div class="flw_feed">
							<ul id="followlist">
										<div class="emp" style=" padding:20px 0px;">
								<h2 class="mbw xg1 xs2 hm" style="margin:30px 0;">还没有广播</h2>
							</div>
						</ul>
						<div class="cl closebar_replybox">
					</div>					
				<? }?>	
				
				<? if($k == 4 ){?>
					<a class="xi2" onclick="loadmore1(<?=$id?>);return false;" id="loadmore1" href="javascript:;">更多 »</a>
				<? }?>	
				</div>



			
		
			 
 


 
<iframe id="downloadframe" name="downloadframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
<script type="text/javascript">

setTimeout('refreshCc()',3000)
		function refreshCc(id) { 
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("load11").innerHTML=xmlhttp.responseText;
					//alert(xmlhttp.responseText)
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.yzz1') ?>",true);
			xmlhttp.send();			
			var ccImg = document.getElementById("checkCodeImg1"+id); 
			if (ccImg) { 
				ccImg.src= ccImg.src + '?' +Math.random(); 
			} 
		}
	
	function loadmore1(id){
				
				var num = document.getElementsByName("lili").length 
				var all44 = "<?=$all4?>" 
			 	if(all44 == num || all44 < num){
			 	$("#loadmore1").text("没有更多了 »")                                                                                                                                                                                                                                                       
			}else{
				//alert(document.getElementById("followlist").getElementsByTagName("li").length)
				var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								//document.getElementById('name'+id1).innerHTML = t1
								//document.getElementById("load11").innerHTML=xmlhttp.responseText;
									var oDiv=document.getElementById("followlist");
									var newNode = document.createElement("ddd");
									newNode.innerHTML = xmlhttp.responseText; 
									oDiv.appendChild(newNode);
									var num2 = document.getElementsByName("lili").length 
									if(all44 == num2 || all44 < num2){
											$("#loadmore1").text("没有更多了 »") 
										}
								//var oDiv=document.getElementById("followlist");
								//var txt =document.createHtmlNode(xmlhttp.responseText);
								//oDiv.appendChild(txt);
								
								//$("#followlist").append(xmlhttp.responseText)
								
								}
					}
						xmlhttp.open("POST","<?=URL("bbs2.lorderlist",'&num=')?>"+num+'&id='+id,true);
						xmlhttp.send();	
				
		
		}}
	function succeedhandle_attachpay(url, msg, values) {
		hideWindow('attachpay');
		window.location.href = url;
	}
</script>
					</div>
<script type="text/javascript" reload="1" >
	var scrollY = 0;
	var page = 2;
	var feedInfo = {scrollY: 0, archiver: 1, primary: 1, query: true, scrollNum:1};
	var loadingfeed = $('loadingfeed');
	function loadmore() {
		var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
		var sHeight = document.documentElement.scrollHeight;
		if(currentScroll >= scrollY && currentScroll > (sHeight/5-5) && (feedInfo.primary ||feedInfo.archiver) && feedInfo.query) {
			feedInfo.query = false;
			var archiver = 0;
			if(feedInfo.primary) {
				archiver = 0;
			} else if(feedInfo.archiver) {
				archiver = 1;
			}
			var url = 'home.php?mod=spacecp&ac=follow&op=getfeed&archiver='+archiver+'&page='+page+'&inajax=1'+'&uid=4040818&banavatar=1';
			var x = new Ajax();
			x.get(url, function(s) {
			if(trim(s) == 'false') {
				loadingfeed.innerHTML = "";
				loadingfeed.style.margin = "-1px 0px 0px 0px";
				if(!archiver) {
					feedInfo.primary = false;
					loadmore();
					page = 1;
				} else {
					feedInfo.archiver = false;
					page = 1;
				}
			} else {
				$('followlist').innerHTML = $('followlist').innerHTML + s;
			}
			if(!feedInfo.primary && !feedInfo.archiver) {
				loadingfeed.className = "";
				loadingfeed.innerHTML = "";
			}
			feedInfo.query = true;
		});
		page++;
		if(feedInfo.scrollNum) {
			feedInfo.scrollNum--;
		} else if(!feedInfo.scrollNum) {
			window.onscroll = null;
		}
	}
	scrollY = currentScroll;
	}
	window.onload = function() {
	scrollY =  document.documentElement.scrollTop || document.body.scrollTop;
	window.onscroll = loadmore;
	}
</script>
					<div id="diycontentbottom" class="area"></div>
				</div>
			</div>
					<? }?>
			
			
			
			
			
			
		</div>
	</div>
</div>
	<div class="cr"></div>
		</div>
<div class="wp mtn"><div id="diy3" class="area"></div></div>
<script type="text/javascript" reload="1">
	checkFun(".wrap_simcheck","checked_simcheck");
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();
	function succeedhandle_followmod(url, msg, values) {
		var numObj = $('followernum_'+values['fuid']);
		if(numObj) {followernum = parseInt(numObj.innerHTML);}
		if(values['type'] == 'add') {
			if(values['from'] == 'head') {
				if($('followflag')) $('followflag').style.display = '';
					if($('unfollowflag')) $('unfollowflag').style.display = 'none';
						if($('fbkname_'+values['fuid'])) $('fbkname_'+values['fuid']).style.display = '';
							} else if($('a_followmod_'+values['fuid'])) {
								$('a_followmod_'+values['fuid']).innerHTML = '取消收听';
								$('a_followmod_'+values['fuid']).className = 'listen_off';
								if(values['from'] != 'block') {
									$('a_followmod_'+values['fuid']).className = 'flw_btn_unfo';
								}
								$('a_followmod_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid']+(values['from'] == 'block' ? '&from=block' : '');
							}
							if(numObj) {
								numObj.innerHTML = followernum + 1;
							}
						} else if(values['type'] == 'del') {
							if(values['from'] == 'head') {
								if($('followflag')) $('followflag').style.display = 'none';
								if($('unfollowflag')) $('unfollowflag').style.display = '';
								if($('followbkame_'+values['fuid'])) $('followbkame_'+values['fuid']).innerHTML = '';
								if($('fbkname_'+values['fuid'])) {
								$('fbkname_'+values['fuid']).innerHTML = '[添加备注]';
								$('fbkname_'+values['fuid']).style.display = 'none';
							}
						} else if($('a_followmod_'+values['fuid']))  {
							$('a_followmod_'+values['fuid']).innerHTML = '收听';
							$('a_followmod_'+values['fuid']).className = 'listen_in';
							if(values['from'] != 'block') {
								$('a_followmod_'+values['fuid']).className = 'flw_btn_fo';
							}
							$('a_followmod_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&fuid='+values['fuid']+(values['from'] == 'block' ? '&from=block' : '');
						}
						if(numObj) {
							numObj.innerHTML = followernum - 1;
						}
} else if(values['type'] == 'special') {
if(values['from'] == 'head') {
var specialObj = $('specialflag_'+values['fuid']);
if(values['special'] == 1) {
specialObj.className = 'flw_specialfo';
specialObj.innerHTML = '添加特别收听';
} else {
specialObj.className = 'flw_specialunfo';
specialObj.innerHTML = '取消特别收听';
}
specialObj.title = specialObj.innerHTML;
specialObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&special='+values['special']+'&fuid='+values['fuid']+'&from=head';
} else {
$('a_specialfollow_'+values['fuid']).innerHTML = values['special'] == 1 ? '添加特别收听' : '取消特别收听';
$('a_specialfollow_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&special='+values['special']+'&fuid='+values['fuid'];
}
}
}
function changefeed(tid, pid, flag, obj) {
var x = new Ajax();
var o = obj.parentNode;
for(var i = 0; i < 4; i++) {
if(o.id.indexOf('original_content_') == -1) {
o = o.parentNode;
} else {
break;
}
}
x.get('forum.php?mod=ajax&action=getpostfeed&inajax=1&tid='+tid+'&pid='+pid+'&type=changefeed&flag='+flag, function(s){
o.innerHTML = s;
});
}
function vieworiginal(clickobj, id) {
var obj = $(id);
if(obj.style.display == 'none') {
obj.style.display =  '';
clickobj.innerHTML = '- 收起';
} else {
obj.style.display =  'none';
clickobj.innerHTML = '+ 展开全文';
}
}
ab = new img_move_float_box();
ab.init('follow_avatar');
</script>	

    
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>

<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
<script>
	var id = "<?=$_SESSION['u_uidss'] == V('r:id')?>";
	if(id == 1){
		
		location = "<?= URL('bbsUser.my_dynamic')?>"
		}
		
	
	var oDiv=document.getElementById('fwin_dialog_close');
	oDiv.click=function(){
		document.getElementById('append_parent1').style.display='none'
	};
	
	function showWindow1(){
	 var id22 = "<?=$_SESSION['u_uidss']?>";
	
		if(id22 != 0 ){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("alert_error").innerHTML = '取消收听成功';
					document.getElementById("pns1").innerHTML = '3 秒后窗口关闭';
					document.getElementById('append_parent').style.display=""
					setTimeout(function(){
						location.href = ""
					},1500)
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.showwind1'),'&id='.V('r:id')?>",true);
			xmlhttp.send();		
		}else{	
			document.getElementById('append_parent').style.display=""	
		}
	}
			
	function showWindow(){
		 var id22 = "<?=$_SESSION['u_uidss']?>";
	
		if(id22 != 0 ){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
							
						document.getElementById("alert_error").innerHTML = '收听成功';
						document.getElementById("pns1").innerHTML = '2 秒后窗口关闭';
						document.getElementById('append_parent').style.display=""
						setTimeout(function(){
							location.href = ""
						},2000)
					
					 
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.showwind'),'&id='.V('r:id')?>",true);
			xmlhttp.send();			
		}else{
			document.getElementById('append_parent').style.display=""	
		}
	}
	
<?php /*?>	function showWindow1(){
		 var id22 = "<?=$_SESSION['u_uidss']?>";
	
		if(id22 != 0 ){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("alert_error").innerHTML = '取消收听成功';
					document.getElementById("pns1").innerHTML = '2 秒后窗口关闭';
					document.getElementById('append_parent').style.display=""
					setTimeout(function(){
						location.href = ""
				},1500)	
			}
		}
		xmlhttp.open("GET","<?=URL('bbs2.showwind1'),'&id='.V('r:id')?>",true);
		xmlhttp.send();			
		}else{	
			document.getElementById('append_parent').style.display=""	
		}
	}
	<?php */?>
	function send22(){
		var xmlhttp;
		var con = document.getElementById("pmmessage").value;
		if(con.length != 0){
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		 	}xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById('append_parent1').style.display="none"	
					document.getElementById("alert_error").innerHTML = '发送成功';
					document.getElementById('append_parent').style.display=""	
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.send'),'&id='.V('r:id').'&con='?>"+encodeURIComponent(con),true);
			xmlhttp.send();	
		}else{
			alert('请输入内容')
		}		
	}
	
	function seeend(){
		var idss1 = "<?=$_SESSION['u_uidss']?> ";
	
		if(idss1 != 0 ){
			document.getElementById('append_parent1').style.display=""	
		}else{
			document.getElementById('append_parent').style.display=""
		}
	}
	
		function showfend(){
		
				var idss1 = "<?=$_SESSION['u_uidss']?> ";
					var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								
								if(xmlhttp.responseText == 1){
										document.getElementById('append_parent4').style.display=""	
									}else{
											
										if(idss1 != 0 ){
											document.getElementById('append_parent2').style.display=""	
										}else{
											document.getElementById('append_parent').style.display=""
										}
									}
								//document.getElementById('name'+id1).innerHTML = t1
								//document.getElementById("load11").innerHTML=xmlhttp.responseText;
								
								
								
								}
					}
						xmlhttp.open("GET","<?=URL("bbs2.fridend",'&id='.V('r:id'))?>",true);
						xmlhttp.send();		
	
	}
	
	
	function hieddd(){
		document.getElementById('append_parent1').style.display="none"	
	}
	
	function fendcl(){
		document.getElementById('append_parent2').style.display="none"	
	}
		
	
					
	function addsubmit_btn1(){			
		var sel = document.getElementById('gid').value;
		var con = document.getElementById('note22').value;
		var xmlhttp;
		if(con.length != 0){
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){	 
				if (xmlhttp.readyState==4 && xmlhttp.status==200){			
					if(xmlhttp.responseText == 222){
						document.getElementById('append_parent2').style.display="none"	
						document.getElementById("alert_error").innerHTML = '此单位是你您友';
						document.getElementById('append_parent').style.display=""
					}else{
						document.getElementById('append_parent2').style.display="none"	
						document.getElementById("alert_error").innerHTML = '添加成功';
						document.getElementById('append_parent').style.display=""	
					}
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.fend'),'&id='.V('r:id').'&con='?>"+con+'&sel='+sel,true);
			xmlhttp.send();	
		}else{
			alert('请输入内容')
		}		
	}	
	function hideWindowss(){
		document.getElementById('append_parent4').style.display="none"	
		}				
</script>
<div style="margin-top:50px">
<?php TPL :: display('footer');?>
</div>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/jquery.alerts.js"></script>
<script type="text/javascript" src="/js/jquery.ui.draggable.js"></script>
<script type="text/javascript">
// head-select
$(function(){
	$.head_select("#head_select","#inputselect");
});

//关注
atten();
recommend();
boutique('main_boutique');
//putaway();
ranking('ranOne');
ranking('ranTwo');
ranking('ranThree');


//团购
jQuery(".group-tab").slide({trigger:"click",effect:"left"});

// banner
jQuery(".slide_Box").slide({mainCell:".bd ul",autoPlay:true,trigger:"click"});

//重磅推荐jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:4,trigger:"click"});
jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//精品推荐jQuery(".main-boutique").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});
jQuery(".main-boutique").slide({trigger:"click"});

//新书上架
jQuery(".main-putaway").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//合作伙伴
jQuery(".slideBox").slide({ mainCell:"ul",vis:6,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});

//友情链接
jQuery(".multipleColumn").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",autoPlay:true,vis:6});

//总排行
jQuery(".ranking-box").slide({autoPlay:false,trigger:"click"});

//听书产品 jQuery(".main-product").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
jQuery(".main-product").slide({trigger:"click"});

//广告
jQuery(".main-ad").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
</script>
</body>
</html>