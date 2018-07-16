<?= TPL :: display('bbs/head_favorite')?>
<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd"><? TPL :: display("bbs/hd");?></div>                
<div id="wp" class="wp">
	<div id="ct" class="ct2_a wp cl sfavorite">
		<div  id="sd_bdl" class="back_left bdl" onMouseOver="showMenu({'ctrlid':this.id, 'pos':'dz'});" >
        	<dl class="a" id="lf_">
                <dt>个人中心</dt>
                <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
                <dd class="bdl_a"><a href="<?= URL('bbsUser.my_submit',"&cid=1")?>" title="帖子">帖子</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
               <?php /*?> <dd ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd ></dd><?php */?>
                <dd ><div style="height:18px; width:100%;"></div></dd>
			</dl>
		</div>
		<div class="mn ct1_feed float_l">
			<div class="cont_wp">
				<div class="thmenu">
					<div class="page_frame_navigation" >
 						<div style="left:343px;" class="follow_feed_cover"></div>
 						<ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
                            <li ><a href="<?= URL('bbsUser.my_submit',"&cid=1")?>" >主题</a></li>
                            <li ><a href="<?= URL('bbsUser.my_submit',"&cid=2")?>" >回复</a></li>
                            <li ><a href="<?= URL('bbsUser.my_submit',"&cid=3")?>" >点评</a></li>
                            <li class="a" ><a href="<?= URL('bbsUser.my_favorite')?>" >收藏</a></li>
                        </ul>
					</div>
				</div>
				<div class="bm bw0">
                <?php
                	//var_dump($re);
					if(!empty($re)){
						foreach($re as $pk => $pv){
				?>
					<h1 class="mt bbs"><img alt="favorite" src="images/favorite.gif" class="vm" />帖子</h1>
					<form method="post" autocomplete="off" name="delform" id="delform" action="#" onSubmit="showDialog('确定要删除选中的收藏吗？', 'confirm', '', '$(\'delform\').submit();'); return false;">
						<input type="hidden" name="formhash" value="be406b22" />
						<input type="hidden" name="delfavorite" value="true" />
						<ul id="favorite_ul" >
                        	<li id="fav_<?= $pv['uid']?>" class="bbda ptm pbm">
                            	<a class="y del" id="a_delete_<?= $pv['uid']?>" href="<?= URL('')?>" onClick="showWindow(this.id, this.href, 'get', 0);">删除</a>
                            	<label class="ptn o favorite_simcheck" ><span class="box_simcheck"></span>
									<input type="checkbox" name="favorite[]" class="pc" value="912818" />
                                </label>
								<div class="favcont_sfavlist">
                                	<a href="<?= URL('bbs.thread_detail',"pid=".$pv['id'])?>" target="_blank"><?= $pv['title']?></a> <span class="xg1"><span title="<?= $pv['dateline']?>"><?= $pv['dateline']?></span></span>
                                </div><div class="cr"></div>
                            </li>	
						</ul>
				<?php
						}
				?>
                    	<div class="mtm pns favorite_select">
							<label for="chkall" class="normalbtn graybtn" onClick="checkall_2(this.form, 'favorite')"><input type="checkbox" name="chkall" id="chkall" class="pc vm" style="display:none;" />全选</label>
							<label class="normalbtn graybtn" style="margin-left:10px;width:120px;"><button type="submit" name="delsubmit" value="true"><em>删除选中收藏</em></button></label>
                            <div class="cr"></div>
						</div>
					</form>
				<?php
				}else{
				?>
                    <h1 class="mt bbs"><img alt="favorite" src="images/favorite.gif" class="vm" />帖子</h1>
                    <p class="emp">您还没有添加任何收藏</p>
				<?php
				}
				?>
				</div>
				<div id="diycontentbottom" class="area"></div>
			</div>
		</div>
	</div>
	<div class="wp mtn"><div id="diy3" class="area"></div></div>
	<script type="text/javascript">
		function favorite_delete(favid) {
			var el = $('fav_' + favid);
			if(el) {
				el.style.display = "none";
			}
		}
		checkFun(".favorite_simcheck","checked_simcheck");
    </script>	
	<? TPL :: display("bbs/footer");?>
	<script type="text/javascript">
        scrolltop_obj 	= new goto_top();
        scrolltop_obj.init();
    </script>
    <script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>