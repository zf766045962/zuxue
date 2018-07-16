<?php //TPL :: display('head_friend')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php
            if(isset($_SESSION['u_name'])&&!empty($_SESSION['u_name'])){
        ?>
         <title><?php echo '用户' . $_SESSION['u_name'] . '的论坛';?></title>
         <?php
            }else{
        ?>
        <title><?php echo '论坛';?></title>
        <?
        }
         ?>
    <meta name="keywords" content="用户<?php echo $_SESSION['u_name'];?>的好友" />
    <meta name="description" content="sb_share ,魅族社区" />
    <meta name="generator" content="MEIZU 2013" />
    <meta name="author" content="MEIZU" />
    <meta name="copyright" content="2003-2013 Comsenz Inc." />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta http-equiv="MSThemeCompatible" content="Yes" />
	<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
	<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_home_space.css" />
	<script type="text/javascript">
        var STYLEID = '1', STATICURL = 'static/', IMGDIR = '/images/', VERHASH = 'bay', charset = 'utf-8', discuz_uid = '9607427', cookiepre = 'MZBBS_2132_', cookiedomain = '', cookiepath = '/', showusercard = '0', attackevasive = '0', disallowfloat = 'login|newthread|tradeorder|activity|debate|usergroups|task', creditnotice = '', defaultstyle = '', REPORTURL = 'aHR0cDovL2Jicy5tZWl6dS5jbi9ob21lLnBocD9tb2Q9c3BhY2UmZG89ZnJpZW5k', SITEURL = 'http://127.0.0.1:8004/', JSPATH = '/js/';  
    // 是否是手机浏览器// 手机浏览器 1  
        var BROWSER_IS_MOBILE	= 0;		 
    </script>
	<script src="js/bbsjs/common.js" type="text/javascript"></script>
    <meta property="wb:webmaster" content="f1284c3017204ff7" />
    <meta property="qc:admins" content="1300463313655125636" />
    <meta name="application-name" content="魅族社区" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="msapplication-tooltip" content="魅族社区" />
    <meta name="msapplication-task" content="name=;action-uri=portal.php;icon-uri=images/portal.ico" />
    <meta name="msapplication-task" content="name=版块;action-uri=forum.php;icon-uri=images/bbs.ico" />
    <meta name="msapplication-task" content="name=;action-uri=group.php;icon-uri=images/group.ico" />
    <script src="js/bbsjs/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/bbsjs/home.js" type="text/javascript"></script>
   <!-- <script src="js/bbsjs/public.js" type="text/javascript"></script>-->
    <script src="js/bbsjs/jquery.elements.js" type="text/javascript"></script>
</head>

<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">
    <?= TPL :: display('bbs/my_friend_alert')?>
    <div id="ajaxwaitid"></div><div id="hd"><?= TPL :: display('bbs/hd')?></div>              
    <div id="wp" class="wp">
    	<div id="ct" class="ct2_a wp cl">
            <div class="back_left bdl ">
                <dl class="a" id="lf_">
                    <dt>个人中心</dt>
                    <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
                    <dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
                    <dd  class="bdl_a" ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
                    <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
                    <?php /*?><dd  ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd  ></dd><?php */?>
                    <dd ><div style="height:18px; width:100%;"></div></dd>
                </dl>
            </div>
            <div class="mn cont_wp float_l">
                <div class="bm bw0">
                    <div class="bm bw0 page_frame_navigation">
                        <div class="follow_feed_cover" style="left:235px;" ></div>
                        <ul class="tb cl page_frame_ul" style="padding-left:20px;" >
                            <li><a href="<?= URL('bbsUser.my_follow')?>">收听</a></li>
                            <li><a href="<?= URL('bbsUser.my_follow')?>">听众</a></li>
                            <li class="a"><a href="<?= URL('bbsUser.my_friend')?>">好友</a></li>
                            <li><a href="<?= URL('bbsUser.my_search')?>">搜索</a></li>
                        </ul>
                    </div>
                    <div class="bar_flist">
                        <div style="float:left;">
                            <div class="common" style="float:left; display:inline;">
                                <div class="select_box select_box_3" style="float:left;position:relative;margin-right:40px;_margin-right:20px;">
                                    <div class="box_menu" id="box_menu" value="" vl="" change_group="true"><?= empty($ggid)?'所有联系人':$ggid?><span class="arrow_dark"></span></div>
                                    <div class="son_menu"  id="friend" style="position:absolute; display:none;width:118px;">
                                        <ul>
                                            <li onclick="selected(this.value)" value="0" vl="0" class="one" >所有联系人</li>
                                            <li onclick="selected(this.value)" value="8" vl="8" class="" >其他</li>
                                            <li onclick="selected(this.value)" value="1" vl="1" class="" >通过本站认识</li>
                                            <li onclick="selected(this.value)" value="2" vl="2" class="" >通过活动认识</li>
                                            <li onclick="selected(this.value)" value="3" vl="3" class="" >通过朋友认识</li>
                                            <li onclick="selected(this.value)" value="4" vl="4" class="" >亲人</li>
                                            <li onclick="selected(this.value)" value="5" vl="5" class="" >同事</li>
                                            <li onclick="selected(this.value)" value="6" vl="6" class="" >同学</li>
                                            <li onclick="selected(this.value)" value="7" vl="7" class="" >不认识</li>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <script>
									(function(){
										var oFeind=document.getElementById('friend');
										var oMenu=document.getElementById('box_menu');
										var timer=null;
										
										oFeind.onmouseover=oMenu.onmouseover=function(){
											clearInterval(timer);
											oFeind.style.display='block';
										};
										
										oFeind.onmouseout=oMenu.onmouseout=function(){
											timer=setInterval(function(){
												oFeind.style.display='none';
											}, 500);
											
										};
									})();
							</script>
                            <script>
								function selected(gid){
									//alert(gid);
									window.location.href = "<?= URL('bbsUser.my_friend',"gid=")?>"+gid;
								}
                        	</script>  
                            <div class="common" style="float:left; display:inline;">
                                <div class="select_box select_box_4" style="float:left; position:relative;">
                                    <div class="box_menu" id="box_menu2" value="" vl="" changegroup="true" >移动到<span class="arrow_dark"></span></div>
                                    <div class="son_menu" id="friend1" style="position:absolute; display:none;width:118px;">
                                        <ul>
                                        	<li value="8" vl="8" class="" onclick="removed(this.value)">其他</li>
                                            <li value="1" vl="1" class="" onclick="removed(this.value)">通过本站认识</li>
                                            <li value="2" vl="2" class="" onclick="removed(this.value)">通过活动认识</li>                                        
                                            <li value="3" vl="3" class="" onclick="removed(this.value)">通过朋友认识</li>
                                            <li value="4" vl="4" class="" onclick="removed(this.value)">亲人</li>
                                            <li value="5" vl="5" class="" onclick="removed(this.value)">同事</li>                                        
                                            <li value="6" vl="6" class="" onclick="removed(this.value)">同学</li>                                        
                                            <li value="7" vl="7" class="" onclick="removed(this.value)">不认识</li>
										</ul>
                                    </div>
                               </div>
                            </div>
                        </div>
                        <script>
							(function(){
								var oFeind1=document.getElementById('friend1');
								var oMenu1=document.getElementById('box_menu2');
								var timer=null;
								
								oFeind1.onmouseover=oMenu1.onmouseover=function(){
									clearInterval(timer);
									oFeind1.style.display='block';
								};
								
								oFeind1.onmouseout=oMenu1.onmouseout=function(){
									timer=setInterval(function(){
										oFeind1.style.display='none';
									}, 500);
									
								};
							})();
						</script>
                        <script>
                        	function removed(gid){
								var arr=document.getElementsByName("friendgas");
								var arr1=new Array(); 
								for(i=0;i<arr.length;i++){
  									if(arr[i].checked){
   										 arr1[i] = arr[i].value;
   									}
								}
								var xmlhttp;
								if(window.XMLHttpRequest){
									xmlhttp = new XMLHttpRequest();	
								}else{
									xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
								}
								xmlhttp.onreadystatechange = function(){
									if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
										if(xmlhttp.responseText == "更改成功"){
											//alert(xmlhttp.responseText);	
											window.location.href = "<?= URL('bbsUser.my_friend')?>";
										}else{
											alert(xmlhttp.responseText);	
										}	
									}
								}
								xmlhttp.open("GET","<?= URL('bbsUser.remove_group',"gid=")?>"+gid+"&gasarr="+arr1,true);	
								xmlhttp.send();
							}
                        </script>
                          
                        <div style="float: right; display: inline;">
                            <div class="bm mtm"><div class="bm_c"></div></div>
                        </div>
                    </div>
                    <div class="cr"></div>	
				<?php 
					//$uid = $_SESSION['u_uid'];//$uid = 8926259;//var_dump($re);
					if(!empty($re)){
				?>
                    <div>
                        <div id="friend_ul">
                            <ul class="buddy cl relat_ulist">
						<?php
                            foreach($re as $pk => $pv){
								//$fthread = DS('publics.get_info','','bbs_thread',"authorid='".$pv['fuid']."' limit 1");//var_dump($fthread);
								
								//得到好友的信息资料
								$fuser = DS('publics.get_info','','users',"id='".$pv['fuid']."'");//var_dump($fuser);
								
								//判断是否收听好友
								$ff = DS('publics.get_info','','user_follow',"uid='".$_SESSION['u_uidss']."' and followuid='".$pv['fuid']."'");
								//var_dump($ff);
						?>
                                <li id="friend_<?= $pv['fuid']?>_li" class="cl" attribute="<?= $pv['fuid']?>">
                                    <label class="wrap_simcheck check_ulist"><!--<span class="box_simcheck"></span>-->
                                        <input type="checkbox" class="totalgoodsnum" name="friendgas" id="shuiyong" value="<?= $pv['fuid']?>" style="display:block"/>
                                    </label>
                                    <?php
										if(empty($ff)){
                                    ?>
                                    <a class="flw_btn_fo" href="javascript:;" id="a_followmod_<?= $pv['fuid']?>" onClick="add_follow(<?= $pv['fuid']?>)">收听</a>
                                    <a class="flw_btn_fo" href="javascript:;" id="b_followmod_<?= $pv['fuid']?>" style="display:none;" onClick="del_follow(<?= $pv['fuid']?>)">取消收听</a>
                                    <?php
										}else{
									?>
                                    	<a class="flw_btn_fo" href="javascript:;" id="a_followmod_<?= $pv['fuid']?>" style="display:none;" onClick="add_follow(<?= $pv['fuid']?>)">收听</a>
                                    	<a class="flw_btn_fo" href="javascript:;" id="b_followmod_<?= $pv['fuid']?>" onClick="del_follow(<?= $pv['fuid']?>)">取消收听</a>
                                    <?php
										}
									?>
                                    <a class="flw_avt" href="<?= URL('bbsUser.user_broadcast','u_uid='.$pv['fuid'])?>"><em class="gol" title="在线 18:54"></em><em class="avatar">
                                    <?php
                                    	if(!empty($fuser[0]['head_img'])){
									?>
                                    <img src="<?= $fuser[0]['head_img'];?>" isdrift="true" uid="<?= $pv['fuid']?>" onerror="this.onerror=null;this.src='images/noavatar_big.gif'" />
                                    <?php
										}else{
											
									?>	
                                    <img src="images/w100h100.jpg" isdrift="true" uid="<?= $pv['fuid']?>" onerror="this.onerror=null;this.src='images/noavatar_big.gif'" />
                                    <?php
										}
									?>
                                   <span class="shadowbox_avatar"></span></em></a>
                                    <div class="cont_ulist">
                                        <h4 class="name_ulist"><a href="<?= URL('bbsUser.user_broadcast','u_uid='.$pv['fuid'])?>" style="color:#999999;"><?= !empty($pv['fusername'])?$pv['fusername']:""?><font style="font-size:xx-small"><?= !($pv['note']==="")?"(".$pv['note'].")":""?></font></a><span id="friend_note_<?= $pv['fuid']?>" class="note xw0" title=""></span></h4>
                                        <p class="maxh"><?= $fthread[0]['subject']?></p>
                                        <div class="xg1" style="*border:1px solid #FFFFFF;">
                                            <a href="javascript:;" id="interaction_<?= $pv['fuid']?>" onMouseOver="showMenu(this.id);" class="showmenu" >互动<span class="arrow_gray"></span></a>
                                            <a href="javascript:;" id="opfrd_<?= $pv['fuid']?>" onMouseOver="showMenu(this.id);" class="showmenu">管理<span class="arrow_gray"></span></a>
                                        </div>
                                    </div>
                                    <div id="opfrd_<?= $pv['fuid']?>_menu" class="p_pop" style="display:none;width:118px;">
                                        <p><a href="javascript:;" id="friend_group_<?= $pv['fuid']?>" onClick="showgroup(<?= $pv['fuid']?>,<?= $pv['gid']?>);" title="好友分组">好友分组</a></p>
                                        <p><a href="javascript:;" id="friend_editnote_<?= $pv['fuid']?>" onClick="showupd(<?= $pv['fuid']?>)" title="备注">备注</a></p>
                                        <p><a href="javascript:;" id="a_ignore_<?= $pv['fuid']?>" onClick="del_friend(<?= $pv['fuid']?>)" title="删除">删除</a></p>
                                    </div>
                                    <div id="interaction_<?= $pv['fuid']?>_menu" class="p_pop" style="display:none;width: 118px;">
                                        <p><a href="<?= URL('bbsUser.user_broadcast',"fuid=".$pv['fuid']);?>" target="_blank" title="查看资料">查看资料</a></p>
                                        <p><a href="#" target="_blank" title="去串个门">去串个门</a></p>
                                        <p><a href="javascript:;" id="a_poke_<?= $pv['fuid']?>" onClick="showapoke(<?= $pv['fuid']?>);" title="打个招呼">打个招呼</a></p>
                                        <p><a href="javascript:;" id="a_sendpm_<?= $pv['fuid']?>" onClick="showMessage(<?= $pv['fuid']?>)" title="发送消息">发送消息</a></p>
                                    </div>
                                    
                                </li>
                          
                                
					<?php
						}
					?>
                            </ul>
                        </div>
                        <div class="bm bw0 pgs cl pagebar"></div>
    <script>
	
		//添加收听
    	function add_follow(id){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					//alert(xmlhttp.responseText);
					document.getElementById('a_followmod_'+id).style.display = "none";
					document.getElementById('b_followmod_'+id).style.display = "";
				}	
			}
			xmlhttp.open("GET","<?= URL('bbsUser.add_follow',"fid=")?>"+id,true);
			xmlhttp.send();	
		}
		
		//取消收听
		function del_follow(id){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					//alert(xmlhttp.responseText);
					document.getElementById('b_followmod_'+id).style.display = "none";
					document.getElementById('a_followmod_'+id).style.display = "";
				}	
			}
			xmlhttp.open("GET","<?= URL('bbsUser.del_follow',"fid=")?>"+id,true);
			xmlhttp.send();	
		}
		
		//删除好友
		function del_friend(id){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					if(xmlhttp.responseText == "成功删除好友"){
						window.location.href = "<?= URL('bbsUser.my_friend')?>";
					}else{
						alert(xmlhttp.responseText);	
					}	
				}
			}
			xmlhttp.open("GET","<?= URL('bbsUser.del_friend',"fid=")?>"+id,true);
			xmlhttp.send();	
		}
		
		//显示更改备注窗口
		function showupd(id){
			document.getElementById('fwin_followbkame_'+id).style.display = "";	
		}
			
		//隐藏更改备注窗口
		function hideupd(id){
			document.getElementById('fwin_followbkame_'+id).style.display = "none";		
		}
		
		//显示发信息窗口
		function showMessage(id){
			document.getElementById('fwin_showMsgBox_'+id).style.display = "";	
		}
		
		//隐藏发信息窗口
		function hideMessage(id){
			document.getElementById('fwin_showMsgBox_'+id).style.display = "none";		
		}
		
		//显示好友分组窗口
		function showgroup(id,gid){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					var nid = xmlhttp.responseText;
					//alert(nid);
					document.getElementById('fwin_friend_group_'+id).style.display = "";
					document.getElementById('radio_pway_'+nid+'_'+id).checked = "checked";
				}
			}
			xmlhttp.open("GET","<?= URL('bbsUser.grouped',"fid=")?>"+id+"&gid="+gid,true);
			xmlhttp.send();	
		}
		
		//隐藏好友分组窗口
		function hidegroup(id){
			document.getElementById('fwin_friend_group_'+id).style.display = "none";	
		}
		
		//显示打招呼窗口
		function showapoke(id){
			document.getElementById('fwin_a_poke_'+id).style.display = "";	
		}
		
		//隐藏打招呼窗口
		function hideapoke(id){
			document.getElementById('fwin_a_poke_'+id).style.display = "none";	
		}
    </script>
                    </div>
                    <?php
						}else{}		
					?>
                </div>
            </div>
        	<div id="diycontentbottom" class="area"></div>
    	</div>
	</div>
	<div class="wp mtn"><div id="diy3" class="area"></div></div>	
	<?= TPL :: display('bbs/footer')?>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>