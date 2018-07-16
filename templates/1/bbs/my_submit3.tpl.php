<?= TPL :: display('head_submit')?>
<body id="nv_forum" class="pg_guide" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
 <? TPL :: display('header');?>
	 <? TPL :: display("bbs/hd");?>
</div>                
<div id="wp" class="wp">
<style type="text/css">
	.xl2 { background: url(images/vline.png) repeat-y 50% 0; }
	.xl2 li { width: 49.9%; }
	.xl2 li em { padding-right: 10px; }
	.xl2 .xl2_r em { padding-right: 0; }
	.xl2 .xl2_r i { padding-left: 10px; }
</style>
<div class="boardnav">
 <!-- 个人中心 帖子 -->
<div id="ct" class="ct2_a wp cl" >
	<div  id="sd_bdl" class="back_left bdl" onMouseOver="showMenu({'ctrlid':this.id, 'pos':'dz'});" >
    	<dl class="a" id="lf_">
            <dt>个人中心</dt>
            <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
            <dd  class="bdl_a"><a href="<?= URL('bbsUser.my_submit',"&cid=1")?>" title="帖子">帖子</a></dd>
            <?php /*?><dd  ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd><?php */?>
            <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
            <?php /*?><dd ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><?php */?>
            <dd ></dd>
            <dd ><div style="height:18px; width:100%;"></div></dd>
		</dl>
	</div>
	<div class="mn ct1_feed float_l" >
		<div id="threadlist" class="tl bm cont_wp">
			<div class="thmenu">
				<div class="page_frame_navigation" >
                	<div class="follow_feed_cover" style="left:129px;" ></div>
                    <ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
                        <li  ><a href="<?= URL('bbsUser.my_submit',"&cid=1")?>">主题</a></li>
                        <li  ><a href="<?= URL('bbsUser.my_submit',"&cid=2")?>">回复</a></li>
                        <li class="a"><a href="<?= URL('bbsUser.my_submit',"&cid=3")?>" >点评</a></li>
                        <li ><a href="<?= URL('bbsUser.my_favorite')?>" >收藏</a></li>
                    </ul>
                </div>
            </div>
				<div class="guide_indicate bm_c">
<table class="conbar_guide" cellspacing="0" cellpadding="0">
	<col width="300px" /><col width="90px" /><col width="90px" /><col width="88px" /><col width="108px" />
	<tr>
		<td class="common" >
		<!--主题 回复 下面的筛选框-->
					<div class="cname" style="margin-right:8px;">状态</div>
					<div class="select_box select_box_1" style="float:left; position:relative;">
                    	<div class="box_menu" value="" vl="" style="color:#1daeed;" filter="true" >全部<span class="arrow_dark"></span></div>
						<div class="son_menu" style="position:absolute; display:none;width:118px;">
                        	<ul>
                            	<li value="" vl=""  class="one" >全部</li>
                                <li value="common" vl="common"    class="" >已发表</li>
                                <li value="save" vl="save"    class="" >草稿</li>
                                <li value="close" vl="close"    class="" >关闭</li>
                                <li value="aduit" vl="aduit"    class="" >待审核</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cname" style="margin-left:30px;margin-right:8px;" >选择版块</div>
                    <div class="select_box select_box_2" style="float:left; position:relative;">
                    <div class="box_menu" value="0"  vl="0" style="color:#1daeed;" filter="true" >全部<span class="arrow_dark"></span></div>
                    <div class="son_menu" style="position:absolute; display:none;width:138px;height:320px;overflow-y:scroll;">
						<ul>
							<li value="0" vl="" class="one" >全部</li>
                            <li value="6"   vl="6" >售前售后服务</li>
                            <!-- 下面是子版块 -->
                            <li value="22"   vl="22" >产品讨论</li>
                            <li value="62"   vl="62" >资源分享</li>
                            <li value="60"   vl="60" >我爱 Flyme</li>
                            <!-- 下面是子版块 -->
                            <li value="81"   vl="81" >M8软件发布区</li>
                            <li value="126"   vl="126" >Flyme适配</li>
                            <li value="114"   vl="114" >Ubuntu</li>
                            <li value="103"   vl="103" >玩机达人</li>
                            <li value="110"   vl="110" >科技前沿</li>
                            <!-- 下面是子版块 -->
                            <li value="111"   vl="111" >新人报到</li>
                            <li value="104"   vl="104" >魅友家大本营</li>
                            <li value="10"   vl="10" >魅友广场</li>
                            <li value="84"   vl="84" >摄影天地</li>
                            <li value="20"   vl="20" >二手交易</li>
                            <!-- 下面是子版块 -->
                            <li value="13"   vl="13" >社区办公室</li>
                            <li value="29"   vl="29" >魅币兑换</li>
                            <!-- 下面是子版块 -->
                            <li value="47"   vl="47" >投诉与处罚</li>
                            <li value="136"   vl="136" >商家活动</li>
                            <!-- 下面是子版块 -->
						</ul>
					</div>
				</div>
                                                                            
		</td>
       	<td class="by">板块</td><td class="by">作者</td><td class="num">回复/查看</td><td class="by">发表时间</td>
	</tr>
</tbody>
</table>
				</div>
				<div class="guide_indicate bm_c"><div id="forumnew" style="display:none"></div>
<table cellspacing="0" cellpadding="0"  class="guide_reply" >
	<?php
    	//var_dump($re);
		if(!empty($re)){
			foreach($re as $pk => $pv){
				$re1 = DS('publics.get_info','','bbs_post',"pid='".$pv['pid']."'");
				//var_dump($re1);
				if(!empty($re1)){
					foreach($re1 as $ak => $av){
	?>
    		
	<tbody id="normalthread_5281412">
		<tr>
			<th class="common">
					<div class="title_guidelist">
 						<a href="<?= URL('bbs.thread_detail')?>" target="_blank" class="xst" title="<?= $av['subject']?>"><?= $av['subject']?></a>
                    </div>
			</th>
			<td class="by"><a href="<?= URL('bbs.thread')?>" target="_blank">投诉与处罚</a></td>
			<td class="by"><cite><a href="<?= URL('')?>" c="1"><?= $av['author']?></a></cite></td>
			<td class="num"><a href="<?= URL('')?>" class="xi2">47</a><div class="br"><em>874</em></div></td>
            <td class="by" style="padding-right:20px;"><div class="br"><em><a href="<?= URL('')?>"><span title="<?= $av['dateline']?>"><?= $av['dateline']?></span></a></em></div></td>
		</tr>
	</tbody>
    <tbody class="bw0_all">
		<tr><td colspan="5"><div class="guide_list_replay"><div class="tl_reply pbm xg1"><a target="_blank" href="<?= URL('')?>">回复主题&nbsp;:&nbsp;<?= $pv['comment']?></a></div><div class="arrow_guidelist"></div></div></td></tr>
	</tbody>
    <?php 
					}
				}
			}
		}else{
	?>
    <tbody class="bw0_all"><tr><th colspan="5"><p class="emp">暂时还没有回复</p></th></tr></tbody>
    <?php
		}
	?>		
</table>
                    <div class="cr"></div>
				</div>
                <div class="bm bw0 pgs cl pagebar"></div>
			</div>
		</div>
	</div>
</div>
<div id="filter_special_menu" class="p_pop" style="display:none">
	<ul>
        <li><a href="<?= URL('')?>" target="_blank">投票</a></li>
        <li><a href="<?= URL('')?>" target="_blank">商品</a></li>
        <li><a href="<?= URL('')?>" target="_blank">悬赏</a></li>
        <li><a href="<?= URL('')?>" target="_blank">活动</a></li>
	</ul>
</div>
<? TPL :: display("bbs/footer");?>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
<script type="text/javascript">
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();
	aa = new menu_box();
	aa.init('select_box_1' , 'reply');
	bb = new menu_box();
	bb.init('select_box_2' , 'reply');
	hoverAdd(".guide_theme tbody","listhover_forum");
</script>