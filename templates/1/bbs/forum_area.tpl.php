<div class="content_par">	
    <div class="content">	
		 <? $date = DS('publics._get','','system_nav','parentid = 241 order by  lmorder asc');?>
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
                <li><a href="<?= URL('bbs.thread','&fid='.$v['fid']);?>"><i class="cc_logo"><img src="<?=$v['imgurl']?>" align="left" alt="" width="97" height="97" /></i><strong><?=$v['name']?></strong><p title="<?= $sttr[0]?>"><?= F("publics.substrByWidth",$sttr[0],100);?><br /><?= F("publics.substrByWidth",$sttr[1],100);?></p></a>
                </li> 
				<? }?>             
            </ul>
        </div>		
		<? }?>
	    <? }?>
</div>
</div>
<div class="clearfloat"></div>