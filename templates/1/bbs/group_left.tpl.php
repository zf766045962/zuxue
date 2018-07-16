<? $con  = DS('publics._get','','bbs_post',' classid = 10 and status = 1 order by lmorder asc limit 0,3');	?>

<? if(isset($con) && !empty($con)){?>
<? foreach($con as $k=>$v){?>
<div class="index_list  <?=$k==0?'':'mtop20'?>" >    
	<div>          
		<div class="iimage">
			<a class="is_image" onclick="look(<?=$v['pid']?>)" href='<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>' target="_blank">		
            	
				<img src="<?=$v['imgurl']?>" title="<?=$v['subject']?>" height="248" width="738">
			</a>
            <?php /*?><a class="myjicon_image">&nbsp;</a><?php */?>
		</div>          
		<div class="ititle">
        	<div class="index_forum"><?=$v['descr']?></div> 
			<div class="index_title">
				<a class="cg" target="_blank" onclick="look(<?=$v['pid']?>)" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" title="<?=$v['subject']?>" ><?=$v['subject']?></a>
			</div>
			<div class="ireply"><i></i><?=$v['alltip']?></div><div class="cr"></div>          
		</div>          
		<div class="icontent" ><?=$v['sketch']?> </div>          
		<div class="itail" >
			<a class="alink" onclick="look(<?=$v['pid']?>)" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" >阅读全文</a>
            <div class="cr"></div>          
		</div>    
	</div>
</div>                            

<? }?>
<? }?>
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
<?php /*?>              
<div id="load_index_list" rhref="/index_recommend.php?bid=1631" page="1" >
	<div class="load_font">浏览更多</div>
</div><?php */?>