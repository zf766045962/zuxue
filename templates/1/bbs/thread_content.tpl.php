<? $tid= V('r:tid') == NULL?0:V('r:tid')?>
<? $fdnd2=DS('publics.get_total','','bbs_postcomment', "score = 3 and tid ='".V('r:tid')."'");?>
<? $zcnd2=DS('publics.get_total','','bbs_postcomment', "score = 4 and tid ='".V('r:tid')."'");?>
<? $all=DS('publics.get_total','','bbs_postcomment', "rpid = 0 and tid = $tid and comment != ''"); ?>
<? $plants =  DS('publics._get','','bbs_forum','fid='.V('r:fid'));	?>
<div class="headdiv_post">
    <div id="pt" class="bm cl bread_post">
        <div class="z">
            <a href="<?=URL('bbs.index')?>">互动社区</a><em>></em><a href="<?= URL('bbs.thread','&fid='.V('r:fid'))?>"><?=$plants[0]['name']?></a>
        </div>
    </div>
</div>
<div id="post_118007890" class="item_postlist graybar_postlist firstitem_postlist"  >
<table id="pid118007890" summary="pid118007890" cellspacing="0" cellpadding="0">
	<col width="64px" />
	<col width="594px"/>
	<tr>
<!--第一个帖子-->
		<td class="plc" colspan="2">
			<div class="thread_postlist">
    			<div class="p_pop blk bui sign_card_user_box5" id="userinfo118007890" style="display: none;margin-top: -11px;">
                	<div class="m z"><div id="userinfo118007890_ma" class="avatar"></div></div>
					<div class="i z" >
						<div class="sign_name" >
						<? $inss=DS('publics._get','','bbs_post', "pid = $tid"); ?>
						<? $all1=DS('publics.get_total','','bbs_post', "authorid = '".$inss[0]['authorid']."' "); ?>
						<? $nam=DS('publics._get','','users', "id= '".$inss[0]['authorid']."'");?>
						<? $qianming=DS('publics._get','','user_info1', "uid= '".$inss[0]['authorid']."'");?>
<a href="<?= URL('bbsUser.user_broadcast','&id='.$nam[0]['id'])?>" target="_blank" class="xi2"><?=$nam[0]['realname']?></a><!--<img src="images/mzvip3.jpg" class="mzvip"/>--><a href="#" target="_blank" class="mzpower" >
									<? 
									if($nam[0]['points'] < 50){
										echo '普通会员';
									}else if($nam[0]['points'] >= 50 and $nam[0]['points'] < 100  ){
										echo '铜牌会员';
									}else if($nam[0]['points'] >= 100 and $nam[0]['points'] < 150  ){
										echo '银牌会员';
									}else if($nam[0]['points'] >= 150 and $nam[0]['points'] < 300  ){
										echo '金牌会员';
									}else if($nam[0]['points'] >= 300 ){
										echo '钻石会员';
									}
									?></a>
							<div class="cr"></div>
						</div>
						<div><em>当前离线</em></div>
                        <dl class="cl sign_info">
                            <dt>注册时间</dt><dd>2009-10-11</dd>
                                <!--<dt>在线时间</dt><dd>1162小时</dd>-->
                                <dt>个性签名</dt><dd><?=$qianming[0]['sightml']?></dd>
                                <div class="cr" style="height:17px; overflow:hidden;">&nbsp;</div>
                                <?php /*?><dt>帖子</dt><dd>185</dd><?php */?>
                                <dt>积分</dt><dd><?=$nam[0]['points'] == NULL?0:$nam[0]['points']?></dd>
                        </dl>
						
						<div class="sign_user_info">
							<a href="<?= URL('bbsUser.user_broadcast','&id='.$nam[0]['id'])?>" target="_blank" title="查看详细资料"><em>更多资料</em><em class="arrow_2">&nbsp;</em></a>
						</div>
						<div id="avatarfeed"><span id="threadsortswait"></span></div>
					</div>
				</div>
				<div class="posttitlewrap">    
					<div class="avatar head_uinfo" onmouseover="showauthor(this, 'userinfo118007890')" data-href="home.php?mod=space&amp;uid=1304289"><img src="<?=$nam[0]['logo']==NULL?'images/course_conimg_27.png':$nam[0]['logo']?>"  onerror="this.onerror=null;this.src='images/course_conimg_27.png'" /><span class="shadowbox_avatar"> </span></div>
					<div class="posttitle"><a id="thread_subject" href="" title="<?=htmlspecialchars($inss[0]['subject'])?>"><dd style="color:<?=$inss[0]['sizecolor']?>"><?=htmlspecialchars($inss[0]['subject'])?></dd></a></div>
				</div>
        		<div class="pi infobar_post">
                	<!--1楼的显示楼层数-->
					<div class="barr_post">
						<span class="xi1"><?=$inss[0]['alltip']?></span><span class="replyicon_uinfo"></span>
                        <span class="xi1"><?=$inss[0]['looknum']?></span><span class="readicon_uinfo"></span>
						<span id="authorposton118007890">
						
                        <span title="2014-10-15 10:00:03">
						<?php 
							if(date('Y',time()) != date('Y',(int)$inss[0]['dateline'])){
								echo date('Y',time()) - date('Y',(int)$inss[0]['dateline']);
								echo '年前';
							}else if(date('m',time()) != date('m',(int)$inss[0]['dateline'])){
								echo date('m',time()) - date('m',(int)$inss[0]['dateline']);
								echo '个月前';
							}else if(date('d',(int)$inss[0]['dateline']) != date('d',time())){
								echo date('d',time()) - date('d',(int)$inss[0]['dateline']);
								echo '天前';
							}else if(date('H',(int)$inss[0]['dateline']) != date('H',time())){
								echo date('H',time()) - date('H',(int)$inss[0]['dateline']);
								echo '小时前';
							}else if(date('i',(int)$inss[0]['dateline']) != date('i',time())){
								echo date('i',time()) - date('i',(int)$inss[0]['dateline']);
								echo '分钟前';
							}else if(date('s',(int)$inss[0]['dateline']) != date('s',time())){
								echo date('s',time()) - date('s',(int)$inss[0]['dateline']);
								echo '秒前';
							}else {
								echo '刚刚';
								}									
						?>
						</span></span>
					</div> 
                    <div class="pti barl_post"><div class="pdbt"></div>
					<div class="authi"  >
						<a class="name_uinfo xw1" href="<?=URL('bbsUser.user_broadcast','&id='.$nam[0]['id'])?>" target="_blank" title="<?=$nam[0]['']?>"><?=$nam[0]['realname']?></a>

						<em class="userlevel_uinfo"><a class="mzvip" href="#"><!--<img src="images/mzvip3.jpg" title="" />--></a><a target="_blank" class="mzpower" ><? 
									if($nam[0]['points'] < 50){
										echo '普通会员';
									}else if($nam[0]['points'] >= 50 and $nam[0]['points'] < 100  ){
										echo '铜牌会员';
									}else if($nam[0]['points'] >= 100 and $nam[0]['points'] < 150  ){
										echo '银牌会员';
									}else if($nam[0]['points'] >= 150 and $nam[0]['points'] < 300  ){
										echo '金牌会员';
									}else if($nam[0]['points'] >= 300 ){
										echo '钻石会员';
									}
									?></a><span class="cr"></span></em>
					</div>
                </div>
			</div>
<div class="pct postcont_postlist">
<style type="text/css">.pcb{margin-right:0}</style><div class="pcb">
<div class="t_fsz">
<?=$inss[0]['content']?>
</div>
    
     
</div>
</div></div>

</td></tr>
<tr><td class="plc plm">

</td>
</tr>
<tr>
<td colspan="2" class="plc cbar_postlist">
<div class="score_post">
<a title="评分" class="xi2" id="sendnnu"><?=3*($zcnd2-$fdnd2)?> 分</a>
</div>
<div style="margin-top: -10px; margin-left: 400px; display: none; background-color: rgb(254, 146, 51); color: rgb(255, 255, 255); line-height: 24px; max-width: 300px; padding: 6px 10px; position: absolute;" class="tipBox5" id="tipBoxindex"></div>
<div class="po cbarbox_postlist">
<!--删除的帖子不显示-->
<div class="pob">
<a style="background-color: #32a5e7;
    border: 1px solid #32a5e7;
    border-radius: 2px;
    color: #fff !important;
    cursor: pointer;
     display: inline-block;
    font-size: 14px;
    height: 36px;
    line-height: 36px;
    margin: 0 0 0 10px;
    padding: 0 !important;
    text-align: center;
    width: 96px;
     float:right;"     href="#f_pst" data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;reppost=118007890&amp;extra=page%3D1&amp;page=1">回复</a>
                                                    
                                                                                                                                                                                                                <a  id="recommend_subtract" class="support_oppose" href="javascript:;" onclick = "tipdup()" title="<?=$fdnd2?> 人反对" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=0&amp;tid=5285291&amp;pid=118007890&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i >反对</i>
                                                                                </a>
  <script>
  	function tipdup(){
					var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   if(xmlhttp.responseText == '请先登录'){
					document.getElementById('tipBoxindex').style.display="block";
					document.getElementById('tipBoxindex').innerHTML="请先，<a href='javascript:void(0);' onclick='denglu();'>登录</a>";
					vart=setTimeout(function(){
					document.getElementById('tipBoxindex').style.display = "none";
					},2000)
					}else if(xmlhttp.responseText == '不能重复反对'){						
					document.getElementById('tipBoxindex').style.display="block";
					document.getElementById('tipBoxindex').innerHTML='抱歉，不能重复反对';
					vart=setTimeout(function(){
					document.getElementById('tipBoxindex').style.display = "none";
					},1000)
					}else if(xmlhttp.responseText == '你已经支持过了'){
						document.getElementById('tipBoxindex').style.display="block";
						document.getElementById('tipBoxindex').innerHTML='抱歉，你已经支持过了';
						vart=setTimeout(function(){
						document.getElementById('tipBoxindex').style.display = "none";
						},1000)
						}else{
							
							var soc = document.getElementById('sendnnu').innerHTML;	
							document.getElementById('sendnnu').innerHTML = (parseInt(soc)-3)+'&nbsp;'+'分';
							
							document.getElementById('recommend_subtract').title=xmlhttp.responseText;
							
							document.getElementById('tipBoxindex').style.display="block";
							document.getElementById('tipBoxindex').innerHTML='反对成功';
							vart=setTimeout(function(){
							document.getElementById('tipBoxindex').style.display = "none";
							},1000)
							
							
							}
    }
  }
xmlhttp.open("GET","<?=URL('bbs1.tipdup',"&tid=$tid")?>",true);
xmlhttp.send();	
		}
		
		
function tipsup(){
	
					var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   if(xmlhttp.responseText == '请先登录'){
					document.getElementById('tipBoxindex').style.display="block";
					document.getElementById('tipBoxindex').innerHTML="请先，<a href='javascript:void(0);' onclick='denglu();'>登录</a>";
					vart=setTimeout(function(){
					document.getElementById('tipBoxindex').style.display = "none";
					},2000)
					}else if(xmlhttp.responseText == '不能重复支持'){						
					document.getElementById('tipBoxindex').style.display="block";
					document.getElementById('tipBoxindex').innerHTML='抱歉，不能重复支持';
					vart=setTimeout(function(){
					document.getElementById('tipBoxindex').style.display = "none";
					},1000)
					}else if(xmlhttp.responseText == '你已经反对过了'){
						document.getElementById('tipBoxindex').style.display="block";
						document.getElementById('tipBoxindex').innerHTML='抱歉，你已经反对过了';
						vart=setTimeout(function(){
						document.getElementById('tipBoxindex').style.display = "none";
						},1000)
						}else{
							
							var soc = document.getElementById('sendnnu').innerHTML;	
							document.getElementById('sendnnu').innerHTML = (parseInt(soc)+3)+'&nbsp;'+'分';
							
							document.getElementById('recommend_add_118007890').title=xmlhttp.responseText;
							
							
							document.getElementById('tipBoxindex').style.display="block";
							document.getElementById('tipBoxindex').innerHTML='支持成功';
							vart=setTimeout(function(){
							document.getElementById('tipBoxindex').style.display = "none";
							},1000)
							}
    }
  }
xmlhttp.open("GET","<?=URL('bbs1.tipsup',"&tid=$tid")?>",true);
xmlhttp.send();	
		}		
		
		
		
  </script>                                                                                                                              
                                                                                                                                                                                                                <a id="recommend_add_118007890" class="support_oppose" href="javascript:;"  onclick = "tipsup()" title="<?=$zcnd2?> 人支持" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=1&amp;tid=5285291&amp;pid=118007890&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" >
                                                                                        <i>支持</i>
                                                                                </a>
                                                                                                                                
                                                                                            	                    					


<div class="cr"></div>
</div>
          	</div>
<div class="cr"></div>
</td>
</tr>
<tr class="ad">
</td>
</tr>
</table>

<script type="text/javascript" reload="1">
aimgcount[118007890] = ['3904092'];
attachimggroup(118007890);
attachimgshow(118007890);
var aimgfid = 0;
</script>

<!--兼容删除的帖子普通用户直接跳过-->
</div>
				</div>