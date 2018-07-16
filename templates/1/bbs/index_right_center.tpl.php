<div class="titletext2" style="margin-top:30px">推荐阅读</div>

<div class="bread_line">
    				<div class="line" style="border: 0px solid #ccc;"></div>
    				<div class="cr"></div>
				</div>



<div class="readblock_expand recread_expand">
                    <div class="inrotate_img block move-span" id="portal_block_701"><div class="dxb_bc" id="portal_block_701_content"><ul class="toprec_recread cl">
<? $read = DS('publics._get','','bbs_post','classid = 9 and status = 1 order by lmorder asc limit 0,2');?>	
<? if(isset($read) && !empty($read)){?>
<? foreach($read as $k=>$v){?>
			
	<li>
		<a target="_blank" onClick="look(<?=$v['pid']?>)" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>"><img width="124" height="100" cc="<?=$v['subject']?>" src="<?=$v['imgurl']?>"></a>
		<a target="_blank" onClick="look(<?=$v['pid']?>)" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" title="<?=$v['subject']?>"><p><?=F("filter.cutStr",$v['subject'],18);?></p></a>
	</li>
<? }}?>		

	</ul>
	</div>
	</div>                                            <div class="padding_margin0 block move-span" id="portal_block_760"><div class="bread_line" style="height:1px">
		<div class="line"></div>
		<div class="cr"></div>
	</div><div class="dxb_bc" id="portal_block_760_content">
	<ul class="recitems_recread cl">
	<? $read1 = DS('publics._get','','bbs_post','classid = 9 and status = 1 order by lmorder asc limit 2,8');?>	
    <? if(isset($read1) && !empty($read1)){?>
	<? foreach($read1 as $k=>$v){?>
	<li class="thread">
		<a target="_blank" onClick="look(<?=$v['pid']?>)" title="<?=$v['subject']?>" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" class="cg"><?=$v['subject']?></a>
	</li>
	<? }}?>		
</ul></div></div></div>