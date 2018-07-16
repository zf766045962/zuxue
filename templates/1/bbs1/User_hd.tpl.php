<div id="w_header">
    <div class="m_top">
        <div id="logo">
        	<a href="http://127.0.0.1:8004/"></a>
        </div>
        <ul class="c_menu">
            <li>
            	<a href="http://127.0.0.1:8004/" class="r_store">
                	<span class="hideLeft"></span></a>
            </li>
            <li>
            	<a href="http://127.0.0.1:8004/" class="r_prd ">
                	<span class="hideLeft"></span></a>
            </li>
            <li><a href="http://127.0.0.1:8004/" class="r_buy">
                	<span class="hideLeft"></span></a>
            </li>
            <li><a href="http://127.0.0.1:8004/" class="r_tech">
            	<span class="hideLeft"></span></a>
            </li>
            <li><a href="http://127.0.0.1:8004/" class="r_flyme">
            	<span class="hideLeft"></span></a>
                </li>
            <li><a href="http://127.0.0.1:8004/" class="r_bbs_selected"></a></li>
        </ul>
        <div id="mzCust" attribute="1" rel="1">
        	<span id="mzLoginArea1">
                <a id="newsNum" class="empty_newsnum" onmouseover="showMenu(this.id);">0</a>
                <a id="mzCustName" title="账户管理" class="longdot" onmouseover="showMenu(this.id);"><?= isset($_SESSION['u_name'])&&!empty($_SESSION['u_name'])?$_SESSION['u_name']:"";?><em class="arrow_dark"></em></a>
                <a id="mzUserHead" class="avatar"><img onerror="this.onerror=null;this.src='/images/noavatar_small.gif'" src="/images/noavatar_small.gif" ++onerror="this.onerror=null;this.src='/images/noavatar_big.gif"><span class="shadowbox_avatar"> </span></a>
                <div id="mzCustName_menu" class="p_pop" style="width:118px;display:none;">
                    <p><a class="actmanage_mzcust" href="<?= URL('bbsUser.my_userManage')?>">我的账户</a></p>
                    <p><a href="<?= URL('bbsUser.my_dynamic')?>">我的动态</a></p>
                    <p><a href="<?= URL('bbsUser.my_submit')?>">我的帖子</a></p>
                    <p><a href="<?= URL('bbsUser.my_follow')?>">我的好友</a></p>
                    <p><a href="<?= URL('bbsUser.my_msgs')?>" id="pm_ntc">我的消息</a></p>
                    <p><a href="<?= URL('bbsUser.my_basic_info')?>">个人设置</a></p>            
                    <p><a class="logout_mzcust" id="mzLogout" href="<?= URL('default.logout')?>">退出账户</a></p>
                </div>
                    <!--如果有新消息或提醒-->
                <div id="newsNum_menu" class="p_pop" style="width:400px;display:none;">
					<div id="firstLevelNews"></div>
					<div id="secLevelNews"></div>
                </div>
            </span>
		</div>
		<div class="cr"></div>
	</div>
</div>          
<div class="wp">
    <div id="nv">
        <ul>                                                    	
            <li id="mn_Nb934"><a href="<?= URL('bbs.index','gid=1')?>" hidefocus="true">首页</a></li>
            <li class="separator"> </li>
            <li id="mn_forum"><a href="<?= URL('bbs.forum','gid=1')?>" hidefocus="true">版块</a>	
            </li>
            <li class="separator"> </li>
            <li id="mn_N2dde"><a href="<?= URL('bbs.group','gid=1')?>" hidefocus="true">魅友家</a	
            ></li>
        </ul>
        <div id="morePlate_menu" class="p_pop moreplatebox" style="display:none;">
            <p><a href="http://127.0.0.1:8004/">产品讨论</a></p>
            <p><a href="http://127.0.0.1:8004/">资源分享</a></p>
            <p><a href="http://127.0.0.1:8004/">我爱 Flyme</a></p>
            <p><a href="http://127.0.0.1:8004/">智能生活</a></p>
            <p><a href="http://127.0.0.1:8004/">玩机达人</a></p>
            <p><a href="http://127.0.0.1:8004/">科技前沿</a></p>
            <p><a href="http://127.0.0.1:8004/">新人报到</a></p>
            <p><a href="http://127.0.0.1:8004/">魅友家大本营</a></p>
            <p><a href="http://127.0.0.1:8004/">魅友广场</a></p>
            <p><a href="http://127.0.0.1:8004/">摄影天地</a></p>
            <p><a href="http://127.0.0.1:8004/">二手交易</a></p>
            <p><a href="http://127.0.0.1:8004/">社区办公室</a></p>
            <p><a href="http://127.0.0.1:8004/">魅币兑换</a></p>
            <p><a href="http://127.0.0.1:8004/">商家活动</a></p>
        </div>
    </div>
    <div id="mu" class="cl" style="display:none;"></div>
    <div id="scbar" class="cl">
    	<form id="scbar_form" method="post" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="search.php?searchsubmit=yes" target="_blank">
        	<input name="mod" id="scbar_mod" value="search" type="hidden">
        	<input name="formhash" value="9e3f9660" type="hidden">
        	<input name="srchtype" value="title" type="hidden">
        	<input name="srhfid" value="0" type="hidden">
        	<input name="srhlocality" value="portal::index" type="hidden">
        	<div class="scbar_wrap">
            	<input placeholder="搜索话题和用户" class=" xg1" name="srchtxt" id="scbar_txt" autocomplete="off" type="text">
            	<button type="submit" name="searchsubmit" id="scbar_btn" sc="1" value="true"></button>
    		</div>
    
    	</form>
	</div>
    <div class="cr"> </div>
    <ul id="scbar_type_menu" class="p_pop" style="display: none;">
    	<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
        <li><a href="javascript:;" rel="user">用户</a></li>
    </ul>
    <script type="text/javascript">
		initSearchmenu('scbar', '');
	</script>
    <div class="cr"></div>
</div>
     
     