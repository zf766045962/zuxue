<div class=" follow_feed_boxval ">
    <div class="page_frame_navigation" >
        <div class="follow_feed_cover" style="left:21px;" ></div>
        <ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
            <li  class="a"><a href="<?= URL('bbsUser.my_dynamic')?>">关注</a></li>
            <li ><a href="<?= URL('bbsUser.my_dynamic')?>">大厅</a></li>
            <li ><a href="<?= URL('bbsUser.my_dynamic')?>">广播</a></li>
                                    </ul>
    </div>
    <div class="flw_feed">
		<ul id="followlist">
			<li class="cl" id="feed_li_12245973" onmouseover="this.className='flw_feed_hover cl'" onmouseout="this.className='cl'">
            	<div class="feed_li_box" >
                	<div class="z flw_avt">
                    	<a class="avatar"><img src="images/w50h50.jpg"  isdrift="true" uid="4741608"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></a>
    					<span class="cnr"></span>
    				</div>       
					<div class="flw_article" style=" " >
                		<div class="flw_author">
                            <a class="name_feedlist" href="<?= URL('bbsUser.user_broadcast')?>">不赦&nbsp;&nbsp;</a> 发表于 <span title="2014-10-12 14:59">昨天&nbsp;14:59</span>&nbsp;&nbsp;#
                            <a href="<?= URL('bbs.thread')?>">产品讨论</a>
                    	</div>
                		<div class="flw_quotenote xs2 pbw"><a href="<?= URL('bbs.thread_detail')?>" target="_blank" > 我大概要充两小时，你这个。。。。。每次都只要1个小时就能充满了吗？<br /></a></div>
						<div class="flw_quote guide_list_replay">
							<div class="arrow_guidelist"></div>
                            	<h2 class="wx pbn"><a href="<?= URL('bbs.thread_detail')?>" target="_blank">论四妹神一般的充电速度，可以申请吉尼斯世界纪录了嘛？</a></h2>
    							<div class="pbm c cl atcont_flwlist" id="original_content_12245973" >
        							<div class="flw_image">
                                    	<ul>
                                        	<li><img id="aimg_o8ayC3898877" src="images/145358fqsy964kk9r6r631.jpg.thumb.jpg" border="0" alt="S41012-142257.jpg" onclick="changefeed(5280664, 117921998, 1, this)" style="cursor: pointer;" /></li>
                                            <li><img id="aimg_VqYqw3898878" src="images/145433rsznhmuggf767t22.jpg.thumb.jpg" border="0" alt="S41012-144939.jpg" onclick="changefeed(5280664, 117921998, 1, this)" style="cursor: pointer;" /></li>
                                        </ul>
                                    </div>如题                                            
								</div>
    							<div class="xg1 cl">
									<div class="y flw_btnbar"><span class="y"><a href="javascript:;" id="relay_12245973" onclick="quickrelay(12245973, 5280664);">转播&nbsp; </a><a href="javascript:;" onclick="quickreply(22, 5280664, 12245973)">回复&nbsp; </a></span></div>
    					</div>
                	</div>                
					<div class="cr"></div>
				</div>
				<div id="replybox_12245973" class="flw_replybox cl" style="display: none;"></div>
				<div id="relaybox_12245973" class="flw_replybox cl" style="display: none;"></div>
<script type="text/javascript">
	spaceClosedFun();
</script>
			</div>
		</li>
	</ul>
		<div id="loadingfeed" class="flw_more"><a href="javascript:;" onclick="loadmore();return false;" class="xi2">更多 &raquo;</a></div>
		<iframe id="downloadframe" name="downloadframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
<script type="text/javascript">
function succeedhandle_attachpay(url, msg, values) {
hideWindow('attachpay');
window.location.href = url;
//$('downloadframe').src = url;
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

var url = 'home.php?mod=spacecp&ac=follow&op=getfeed&archiver='+archiver+'&page='+page+'&inajax=1'+'&viewtype=follow';
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
<div id="diycontentbottom" class="area"></div></div>