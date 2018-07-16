
<?PHP TPL :: display("bbs/header")?>
<div id="append_parent"></div>
<!--<div id="hd">
	<?php
	//TPL :: display('head');
	//TPL :: display('headnav');
	?>
	<div class="second-banner tc"><img src="/images/second_r.gif" /></div>
	<?
	//TPL :: display("bbs/hd");
	?>
</div>-->                
<div id="wp" class="wp">
<div class="wp">
    <div class="index_content">
    	<div class="index_left">
        	<div class="box1">
                <div class="banana_rotate">
                    <div class="roll_img" id="roll_img_cc">
                    	<div id="portal_block_500" class="inrotate_img block move-span">	
                        	<div id="portal_block_500_content" class="dxb_bc">
                        		<div class="roll_img_cc" style="width: 2090px; position: absolute; left: 0px;">
									<!--<ul>
<? $banner = DS('publics._get','','bbs_post','classid = 12 and status = 1 order by lmorder asc limit 0,3'); //var_dump($banner);?>		
								<?php 
								if(!empty($banner)){
                                    foreach($banner as $k=>$v){
                                ?>
                                    	<li style="float:left;"><a href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" onClick="look(<?=$v['pid']?>)" target="_blank"><div class="roll_img_kk" id="roll_img_kk_1" rurl="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" width="686" height="278" alt="<?=$v['subject']?>" src="<?=$v['imgurl']?>" style="background:url('<?=$v['imgurl']?>');width:686px;height:278px;"></div></a></li>
										  <?php }}?>		
									</ul>-->
                                    <ul>
										<li style="float:left;"><a href="/index.php?m=bbs.thread_detail&fid=45&tid=80" onClick="look(80)" target="_blank"><div class="roll_img_kk" id="roll_img_kk_1" rurl="/index.php?m=bbs.thread_detail&fid=45&tid=80" width="686" height="278" alt=" 12月23日新品名单公布1" src="/var/upload/image/2015/01/20150104185235_10373.png" style="background:url('/var/upload/image/2015/01/20150104185235_10373.png');width:686px;height:278px;"></div></a></li>
										<li style="float:left;"><a href="/index.php?m=bbs.thread_detail&fid=45&tid=81" onClick="look(81)" target="_blank"><div class="roll_img_kk" id="roll_img_kk_1" rurl="/index.php?m=bbs.thread_detail&fid=45&tid=81" width="686" height="278" alt=" 12月23日新品名单公布2" src="/var/upload/image/2015/01/20150104190026_58433.png" style="background:url('/var/upload/image/2015/01/20150104190026_58433.png');width:686px;height:278px;"></div></a></li>
									</ul>
								</div>
							</div>
						</div>                        
                        <div class="leftbtn_picturn"></div>
						<div class="rightbtn_picturn"></div>
                        <div class="cr"></div>
                    </div>
                    <div style="display: block;" class="roll_opacity"></div>
                    <div style="display: block;" class="roll">
                        <div class="roll_title"><a target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>"></a></div>
                        <div class="roll_small_signimg_div">
							
                            <img class="roll_small_signimg current_con" src="/var/upload/image/2015/01/20150104185235_10373.png" height="29" width="50">
                            
                            <img class="roll_small_signimg" src="/var/upload/image/2015/01/20150104190026_58433.png" height="29" width="50">
                        </div>
                    </div>	
                    
                    <!--<div style="display: block;" class="roll_opacity"></div>
                    <div style="display: block;" class="roll">
                        <div class="roll_title"><a target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>"></a></div>
                        <div class="roll_small_signimg_div">
							<? if($banner[0]['imgurl'] != NULL ){?>	
                            <img class="roll_small_signimg current_con" src="<?=$banner[0]['imgurl'] ?>" height="29" width="50">
                            <? }if($banner[1]['imgurl'] != NULL ){?>
                            <img class="roll_small_signimg" src="<?=$banner[1]['imgurl'] ?>" height="29" width="50"><? }if($banner[2]['imgurl'] != NULL ){?><img class="roll_small_signimg" src="<?=$banner[2]['imgurl'] ?>" height="29" width="50"><? }?>
                        </div>
                    </div>-->
                </div>
        	</div>
			
            <!-- 活动 -->
           <? TPL :: display("bbs/index_activitys");?>  
            <!--社区热帖-->       
            <? TPL :: display("bbs/index_host");?>
            <div style="padding:20px 20px 20px 20px;"></div>    
        </div>
    	<!--签到/热门板块-->
        <? TPL :: display("bbs/index_right_top");?>
        <div class="cr"></div>
    </div>
<!--[/diy]-->
</div>
<script language="javascript" type="text/javascript">
// 复制 id1 HTML的数据到 id2
function copy_html(id1,id2){
	try{
		var html 	= document.getElementById(id1).innerHTML;
		document.getElementById(id2).innerHTML	= html;
		}catch(e){}
	}
	// 首页js 初使化
	index_js.init();
	// 签到
	signinFunc(".signin_expand",".tips_signin");
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();
	// 删除底部线条
	delete_bottom_line();
</script>
<div class="tborder_foot"></div>	


<script src="js/pic.js" type="text/javascript"></script>



</div>
<div style="margin-top:50px">
<?php TPL :: display('bbs/footer');?>
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