<? $con  = DS('publics._get','','bbs_post',' classid = 13 and status = 1 order by lmorder asc limit 0,5');	?>
<? if(isset($con) && !empty($con)){?>
<? foreach($con as $k=>$v){?>

<div class="index_list mtop20">    
    <div>         
        <div class="iimage">
        	<a class="is_image" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" target="_blank" onclick="look(<?=$v['pid']?>)">		
            	<img src="<?=$v['imgurl']?>" title="<?=$v['subject']?>" height="213" width="311">
            </a>
        </div>          
        <div class="iright_k">          
        	<div class="ititle">          	
                <div class="index_forum"><?=$v['descr']?></div>                 
                <div class="cr"></div>          
            </div>
        	<div class="index_title" style="margin:3px 0 3px 0;">
            	<a class="cg" target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" title="<?=$v['subject']?>" onclick="look(<?=$v['pid']?>)"><?=$v['subject']?></a>
            </div>
            <div style="font-size:12px;margin:12px 0 10px 0;"> 	
                    <span class="readicon_uinfo_5" style="margin:0 4px 0 0;float:left;"></span>
                    <span class="spfont"><?=$v['looknum']?></span>
                    <span class="replyicon_uinfo_5" style="margin:0 4px 0 20px;float:left;"></span>
                    <span class="spfont"><?=$v['alltip']?></span>
                    <span class="spfont" style="margin:0 0 0 20px;">/ <a href="<?= URL('bbsUser.user_broadcast','&id='.$v['authorid'])?>"><?=$v['author']?></a></span>
                    <span class="spfont" style="margin:0 0 0 20px;">/ <span title="2014-10-15"><?php 
								
							if(date('Y',time()) != date('Y',(int)$v['dateline'])){
								echo date('Y',time()) - date('Y',(int)$v['dateline']);
								echo '年前';
							}else if(date('m',time()) != date('m',(int)$v['dateline'])){
								echo date('m',time()) - date('m',(int)$v['dateline']);
								echo '个月前';
							}else if(date('d',(int)$v['dateline']) != date('d',time())){
								echo date('d',time()) - date('d',(int)$v['dateline']);
								echo '天前';
							}else if(date('H',(int)$v['dateline']) != date('H',time())){
								echo date('H',time()) - date('H',(int)$v['dateline']);
								echo '小时前';
							}else if(date('i',(int)$v['dateline']) != date('i',time())){
								echo date('i',time()) - date('i',(int)$v['dateline']);
								echo '分钟前';
							}else if(date('s',(int)$v['dateline']) != date('s',time())){
								echo date('s',time()) - date('s',(int)$v['dateline']);
								echo '秒前';
							}else {
								echo '刚刚';
								}									
							?></span></span>
                    <span class="spfont alte" style="float:right;"><a class="alink" onclick="look(<?=$v['pid']?>)" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>">阅读全文</a></span>
                    <div class="cr"></div>
            </div>          
        	<div class="icontent" style="line-height:28px;margin-top:20px">
            	<?=$v['sketch']?>      
            </div>          
        	<?php /*?><div class="itail">
            	<div class="ishare">
                	<span class="bdsharebuttonbox isharebtn">      
                    	<a class="bds_tsina" href="#" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </span>
                </div>
            	<div class="cr"></div>          
            </div>   <?php */?>       
        </div>    
	</div>          
	<div class="cr"></div>
</div>

							<script>
									function look(pid){
										//alert()
										var xmlhttp;
										if (window.XMLHttpRequest){
													xmlhttp=new XMLHttpRequest();
										}else{
													xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
										 }xmlhttp.onreadystatechange=function(){
													if (xmlhttp.readyState==4 && xmlhttp.status==200){
													
													}
										}
											xmlhttp.open("GET","<?=URL('bbs2.indexlook','&tid=')?>"+pid,true);
											xmlhttp.send();	
										}
								</script>	
				
	    <? }?>
		<? }?>