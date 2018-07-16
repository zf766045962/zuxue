<?= TPL :: display('head_userSearch')?>
<body id="nv_home" class="pg_spacecp" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent">
</div>
<div id="ajaxwaitid"></div>
<div id="hd"><?= TPL :: display('hd')?></div>               
<div id="wp" class="wp">
	<div id="ct" class="ct2_a wp cl">
		<div class="back_left bdl"><dl class="a" id="lf_">
            <dt>个人中心</dt>
                <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
                <dd  class="bdl_a" ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
                <?php /*?><dd  ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd ></dd><?php */?>
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
            <?php
				//var_dump($re);
            	if(empty($re)){
			?>
            <div class="tips_sresult"><h3>没有找到相关用户<a href="<?= URL('bbsUser.my_search')?>">换个搜索条件试试</a></h3></div>
            <?php
				}else{
			?>
			<div class="tips_sresult"><h3>以下是查找到的用户列表(最多显示 100 个)，您还可以<a href="<?= URL('bbsUser.my_search')?>">换个搜索条件试试</a></h3></div>
            <div class="sresult_ulist">
				<ul class="buddy cl relat_ulist">
                <?php
                	foreach($re as $pk => $pv){
				?>
                	<li class="bbda cl" >
                        <div class="flw_avt"><a class="avatar" href="<?= URL('bbsUser.user_broadcast',"&uuid=".$pv['uid'])?>" target="_blank" >
                         <?php
                         	if(empty($pv['head_img'])){
						 ?><img src="images/w100h100.jpg"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" />
                         <?php
							}else{
						 ?>	
                         <img src="<?= $pv['head_img']?>">
                         <?php
                         	
							}
						 ?>
                         <span class="shadowbox_avatar"> </span></a></div>
                        <div class="cont_ulist">
                            <h4 class="uname_sresult"><a href="<?= URL('bbsUser.user_broadcast')?>" title="<?= $pv['username']?>" target="_blank" style="color:#999999;"><?= $pv['username']?></a></h4>
                            <p class="maxh"><font color="#999999">级别</font> </p>
                            <div class="xg1">
                                <a href="javascript:;" id="interaction_<?= $pv['uid']?>" onMouseOver="showMenu(this.id);" class="showmenu">互动<span class="arrow_gray"></span></a>
                                <a href="" id="a_friend_<?= $pv['uid']?>" onClick="add_friend(<?= $pv['uid']?>)" title="加为好友">加为好友</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="javascript:;" id="a_followmod_<?= $pv['uid']?>" onClick="add_follow(<?= $pv['uid']?>)">收听</a>
                                <a href="javascript:;" id="b_followmod_<?= $pv['uid']?>" style="display:none">已收听</a>
                            </div>
                            <div id="interaction_<?= $pv['uid']?>_menu" class="p_pop" style="display: none; width: 80px;" tleft="true">
                                <p><a href="#" target="_blank" title="查看资料">查看资料</a></p>
                                <p><a href="<?= URL('')?>" target="_blank" title="去串个门">去串个门</a></p>
                                <p><a href="javascript:;" id="a_poke_<?= $pv['uid']?>" onClick="" title="打个招呼">打个招呼</a></p>
                                <p><a href="<?= URL('')?>" onClick="showWindow('showMsgBox', this.href, 'get', 0)" title="发送消息">发送消息</a></p>
                            </div>
                        </div>
                        <div class="cr"></div> 
                         <script>
                    	function add_follow(id){
							
							var xmlhttp;
							if(window.XMLHttpRequest){
								xmlhttp = new XMLHttpRequest();	
							}else{
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
							}
							xmlhttp.onreadystatechange = function(){
								if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
									//document.getElementById().innerHTML = xmlhttp.responseText;
									//alert(xmlhttp.responseText)
									if(xmlhttp.responseText == "成功添加关注"){
										//alert(id)
										document.getElementById('a_followmod_'+id).style.display = "none";
										document.getElementById('b_followmod_'+id).style.display = "";	
									}else{
										alert(xmlhttp.responseText);	
									}	
								}	
							}
							xmlhttp.open("get","<?= URL('bbsUser.add_follow',"&fid=")?>"+id,true);
							xmlhttp.send();	
						}
						function add_friend(){}
                   	</script>
                    </li>
                   	<?php
					}
					?>
                   
					<li class="cr" style="height:0px;margin:0px;padding:0px !important;"></li>
				</ul>
			</div>
            <?php
            	}
             ?>
			<div style="height:1px;clear:both;"> </div>
<!--<script type="text/javascript">
	function succeedhandle_followmod(url, msg, values) {
		var fObj = $('a_followmod_'+values['fuid']);
		if(values['type'] == 'add') {
			fObj.innerHTML = '取消收听';
			fObj.className = 'flw_btn_unfo';
			fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
		} else if(values['type'] == 'del') {
			fObj.innerHTML = '收听';
			fObj.className = 'flw_btn_fo';
			fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=5ab93d91&fuid='+values['fuid'];
		}
	}
	hoverAdd(".sresult_ulist li","ihover_sresult");
</script>-->
		</div>
	</div>
<script type="text/javascript">
	checkFun(".wrap_simcheck","checked_simcheck");
	simSelectFun(".relat_search select");
</script>	
<?= TPL :: display('footer')?>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>