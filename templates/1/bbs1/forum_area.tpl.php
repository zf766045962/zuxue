<div class="content_par">	
    <div class="content">	
		 <? $date = DS('publics._get','','system_nav','parentid = 254 order by  lmorder asc');?>
		 <? if($date != NULL){?>
		 <? foreach($date as $k=>$v){?>
		 
		<?  $str = $v['classurl'];
			$fub = explode("&",$str);
			$count=strpos($fub[1],"fub");
			$str=substr_replace($fub[1],"",$count,4);
		?>
      	 <div class="c_list">
            <h3><?=$v['classname']?></h3>
            <ul class="c_cate clearfix">
				<? $shop = DS('publics._get','','bbs_forum',"fup = $str and status = 1 order by displayorder asc");	?>
				<? foreach($shop as $k=>$v){?>
				<? $sttr = explode(",",$v['description']);?>	
                <li><a href="<?= URL('bbs.thread','&fid='.$v['fid']);?>"><i class="cc_logo"><img src="<?=$v['imgurl']?>" align="left" alt="" width="97" height="97" /></i><strong><?=$v['name']?></strong><p><?=$sttr[0]?><br /><?=$sttr[1]?></p></a>
                </li> 
				<? }?>             
            </ul>
        </div>		
		<? }?>
	    <? }?>
<?php /*?><div class="c_list">
            <h3>玩物励志</h3>
            <ul class="c_cate clearfix">
                <li><a href="<?= URL('bbs.thread');?>"><i class="cc_logo"><img src="images/common_103_icon.png" align="left" alt="" width="97" height="97" /></i><strong>产品讨论</strong><p>对魅族手机的一切建议都可以在这讨论<br />售后等问题请移步售后版块</p></a>
                </li>
                <li><a href="<?= URL('bbs.thread');?>"><i class="cc_logo"><img src="images/common_103_icon.png" align="left" alt="" width="97" height="97" /></i><strong>产品讨论</strong><p>对魅族手机的一切建议都可以在这讨论<br />售后等问题请移步售后版块</p></a>
                </li>
                <li><a href="<?= URL('bbs.thread');?>"><i class="cc_logo"><img src="images/common_103_icon.png" align="left" alt="" width="97" height="97" /></i><strong>产品讨论</strong><p>对魅族手机的一切建议都可以在这讨论<br />售后等问题请移步售后版块</p></a>
                </li>
            </ul>
        </div>
		<?php */?>
		
		
<?php /*?><div class="c_list">
            <h3>玩物励志</h3>
            <ul class="c_cate clearfix">
                <li><a href="<?= URL('bbs.thread');?>"><i class="cc_logo"><img src="images/common_111_icon.png" align="left" alt="" width="97" height="97" /></i><strong>产品讨论</strong><p>对魅族手机的一切建议都可以在这讨论<br />售后等问题请移步售后版块</p></a>
                </li>
                <li><a href="<?= URL('bbs.thread');?>"><i class="cc_logo"><img src="images/common_111_icon.png" align="left" alt="" width="97" height="97" /></i><strong>产品讨论</strong><p>对魅族手机的一切建议都可以在这讨论<br />售后等问题请移步售后版块</p></a>
                </li>
                <li><a href="<?= URL('bbs.thread');?>"><i class="cc_logo"><img src="images/common_111_icon.png" align="left" alt="" width="97" height="97" /></i><strong>产品讨论</strong><p>对魅族手机的一切建议都可以在这讨论<br />售后等问题请移步售后版块</p></a>
                </li>
            </ul>
        </div>
<div class="c_activity">
            <a href="<?= URL('bbs.thread');?>" class="ca_left_info"><img src="images/common_136_icon.png"  alt="" width="97" height="97" /><strong>商家活动区</strong><p>各地代理商活动发布区<br />专门发布面向当地魅友的优惠信息</p></a>
            <div class="ca_diy_pic">
                <div id="portal_block_1642" class="block move-span">
                    <div id="portal_block_1642_content" class="dxb_bc">
                        <div class="module cl ml">
                            <ul>
                                <li style="width: 647px;"><a href="<?= URL('bbs.thread_detail');?>" target="_blank"><img src="images/0751ba17761ec23897e0be9ff362233d.jpg" width="647" height="215" alt=" " /></a><p><a href="#" title=" " target="_blank"> </a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                                
            </div>
        </div><?php */?>
<?php /*?><div class="c_activity" style="margin-bottom:3px;">
            <a href="<?= URL('bbs.thread');?>" class="ca_left_info"><img src="images/common_104_icon.png"  alt="" width="97" height="97" /><strong>魅友家大本营</strong><p>魅族官方组织的各地魅友聚会活动<br />线下聚会其乐融融</p></a>
            <div class="ca_diy_pic">
                <div id="portal_block_1643" class="block move-span">
                    <div id="portal_block_1643_content" class="dxb_bc">
                        <div class="module cl ml">
                            <ul>
                                <li style="width: 647px;"><a href="<?= URL('bbs.thread');?>" target="_blank"><img src="images/67b24c2b351a9cfa7a948dfaa98dd028.jpg" width="647" height="214" alt=" " /></a>
<p><a href="<?= URL('bbs.thread_detail');?>" title=" " target="_blank"> </a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                                
            </div>
        </div>
    </div>            <?php */?>
</div>
</div>        