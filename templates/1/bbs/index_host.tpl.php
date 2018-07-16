<div class="index_list mtop20 community_heat" style="padding:20px 20px 20px 20px;">
    <div class="t_title" style="border-bottom:1px solid #E6E6E6; padding-bottom:15px; ">
		<div style="float:left; font-size:16px; font-weight:bold; color:#333;">社区热帖</div>
		
		
		<? $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));?>
		<? $unm11=DS('publics.get_total','','bbs_post','dateline'.'>'. $beginToday);?>
		<? $topunm11 = DS('publics._get','','bbs_statistics','id = 1');?>
		<? if((int)$topunm11[0]['value'] < $unm11){?>
		<? DS('publics.date1','','bbs_statistics',"value  =	'".$unm11."'","id = 1");?>
		<? }?>
		<? $topunm22 = DS('publics._get','','bbs_statistics','id = 1');?>
		<? $topunm33 = DS('publics.get_total','','users','') ?>
        	<div style="float:right;margin-top:3px; height:20px;">
            	<span class="lsc">今日发帖 : 
                	<span class="clor"><?=$unm11?></span> </span><span class="flagstaff">|</span>
                <span class="lsc">历史最高 : 
                	<span class="clor" id="topunm"><?=$topunm22[0]['value']?></span> </span><span class="flagstaff">|</span>
                <span class="lsc">会员 : <span class="clor"><?=$topunm33?></span> </span>                    
            </div>
        	<div class="cr"></div>
    	</div>
		
		<div class="mn plate_mn" style="float:none; box-shadow:0 0 0 0 #ECECEC; width:675px;">
        	<div style="position: relative; border:0px none #000000;width:675px;" class="tl bm bmw" id="index_threadlist">
          	<table summary="forum_22" cellpadding="0" cellspacing="0">
			<? $host = DS('publics._get','','bbs_post','is_showindex = 1 order by  lmorder asc limit 0,10');?>
			<? if(isset($host) && !empty($host)){?>
			<? foreach($host as $k=>$v){?>
			<? $nam=DS('publics._get','','users', "id= '".$v['authorid']."'");?>
          		<tbody >	
                    <tr>		
                        <td class="userhead" style="padding:8px 0 !important;" >
                            <a class="avatar" id="stickthread_<?=$v['pid']?>" onmouseover="wzxx(<?=$v['pid']?>,<?=$v['authorid']?>)">
                            	<img src="<?= $nam[0]['logo'] == NULL?'images/course_conimg_27.png':$nam[0]['logo']?>"  isdrift="true" uid="2199310"  onerror="this.onerror=null;this.src='<?= $nam[0]['logo'] == NULL?'images/course_conimg_27.png':$nam[0]['logo']?>'" /><span class="shadowbox_avatar"> </span>
                            </a>
                        </td>		
                        <th class="common padding0 itemcont_threadlist" style="padding:8px 0 !important;" >
                            <div class="maincont_list" style="widows:100%;" >			
                                <a href="<?= URL('bbs.thread_detail','&fid=39&tid='.$v['pid'])?>" 2 onclick="look(<?=$v['pid']?>)" class="xst "  title="<?=strip_tags($v['subject'])?>" target="_blank"  ><?=strip_tags($v['subject'])?></a>
                                <img src="/images/folder_.gif" style="display:none;visibility:hidden;" />		
                                <span class="cr"> </span>	
                            </div>
                        </th>
                        <td class="latestreply_list" style="padding:8px 0 !important;" >	
                        <span>
                        <a c="1" class="author_list" href="<?= URL('bbsUser.user_broadcast','&id='.$v['authorid'])?>" style="font-size:14px;" hidefocus="true"><?= $nam[0]['realname']?></a></span>
                        </td>
                    </tr>
                </tbody>
           	    <? }?>
				<? }?>
       		</table>                    
       </div>
    </div>
</div>
<div id="appendss">

</div>
<script>
function wzxx(id,authorid){
			var top = $("#stickthread_"+id).offset().top
			var left = $("#stickthread_"+id).offset().left
			if($('#space_card_new_'+id).text().length == 0){
					var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								$("#appendss").append(xmlhttp.responseText)	
								$('#space_card_new_'+id).attr("style","position: absolute; top:"+top+"px; left: "+left+"px;display:block")
								
								}
								
					}

						//var json = '[{"aa":"33","bb":"44"},{"cc":"33","dd":"44"},{"ee":"33","ff":"44"}]';
						xmlhttp.open("POST","<?=URL("bbs2.showappenda")?>"+'&id='+id+'&authorid='+authorid,true);
						xmlhttp.send();		
			}else{
				$('#space_card_new_'+id).attr("style","position: absolute; top:"+top+"px; left: "+left+"px;display:block")
				}
		
			
	}
	function qxstyh(id,uid){
							var xmlhttp;
									if (window.XMLHttpRequest){
												xmlhttp=new XMLHttpRequest();
									}else{
												xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
									 }xmlhttp.onreadystatechange=function(){
												if (xmlhttp.readyState==4 && xmlhttp.status==200){
													
											var strJSON1 = xmlhttp.responseText;//得到的JSON
											var obj1 = eval( "(" + strJSON1 + ")" );//转换后的JSON对象
												$(".stnmnm"+uid).text(obj1.alls2)
												$(".tznmnm"+uid).text(obj1.alls3)
									
												$(".card_followmod_22"+uid).attr("style","display:none")
												$(".card_followmod_11"+uid).attr("style","")
												
												
												}
											}
										xmlhttp.open("GET","<?=URL("bbs2.showwind1")?>"+'&id='+uid,true);
										xmlhttp.send();	
									
							}	
						
							function styh(id,uid){
							var xmlhttp;
									if (window.XMLHttpRequest){
												xmlhttp=new XMLHttpRequest();
									}else{
												xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
									 }xmlhttp.onreadystatechange=function(){
												if (xmlhttp.readyState==4 && xmlhttp.status==200){
													
												var strJSON1 = xmlhttp.responseText;//得到的JSON
												var obj1 = eval( "(" + strJSON1 + ")" );//转换后的JSON对象
												$(".stnmnm"+uid).text(obj1.alls2)
												$(".tznmnm"+uid).text(obj1.alls3)	
													
												$(".card_followmod_22"+uid).attr("style","")
												$(".card_followmod_11"+uid).attr("style","display:none")
												
												
												}
											}
										xmlhttp.open("GET","<?=URL("bbs2.showwind")?>"+'&id='+uid+'&stat=2',true);
										xmlhttp.send();	
									
							}
</script>