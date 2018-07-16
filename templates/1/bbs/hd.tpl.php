	<?
	$uid = $_SESSION['u_uid'];
	$uid1 = $_SESSION['u_uidss'];
	?>          
	<div class="wp">
        <div id="nv">
            <ul>                                                    	
                <li><a href="<?= URL('bbs.index')?>" hidefocus="true">社区首页</a></li>  
                <li class="separator"> </li>
                <li><a href="<?= URL('bbs.forum')?>" hidefocus="true">版块</a></li>
				<? if($_SESSION['u_uidss'] != NULL){?>
				<li class="separator"> </li>
				<li><a href="<?= URL('bbsUser.my_dynamic')?>" hidefocus="true">个人中心</a></li>
				<? }?>
                <?php /*?><li class="separator"> </li>
                <li><a href="<?= URL('bbs.group')?>" hidefocus="true">魅友家</a></li><?php */?>
            </ul>
        </div>
        <div id="mu" class="cl" style="display:none;"></div>
		
         <div id="scbar" class="cl">
            <form id="scbar_form" method="post" action="" target="_blank">
                <input name="mod" id="scbar_mod" value="search" type="hidden">
                <input name="formhash" value="9e3f9660" type="hidden">
                <input name="srchtype" value="title" type="hidden">
                <input name="srhfid" value="0" type="hidden">
                <input name="srhlocality" value="portal::index" type="hidden">
                <div class="scbar_wrap">   
               <input placeholder="搜索话题和用户" class=" xg1" name="srchtxt" id="scbar_txt" autocomplete="off" type="text" onkeyup="ztyh()"><button type="button" name="searchsubmit" id="scbar_btn" sc="1" value="true" onclick="sousuo()"></button>    	
			   <div style="display: none;width:218px; top:32px; " id="searchTip">   <ul>   	
			   <li style="" id="searchyByTile" class="searchitem">含<dd3 id="zhut"></dd3>的主题</li>
			   <li style="" id="searchByUser" class="searchitem">含<dd3 id="yhu"></dd3>的用户</li>   </ul></div>		
               </div>  
            </form>
			<script>
				$("#searchyByTile").click(function(){
					location.href = "<?=URL('bbs2.showshow','&key=')?>"+encodeURIComponent($("#scbar_txt").val())
					})
				$("#searchByUser").click(function(){
					location.href = "<?=URL('bbsUser.my_follow','&ccid=3'.'&username=')?>"+encodeURIComponent($("#scbar_txt").val())+'&searchsubmit=true&precision3=1'
					})	
				function ztyh(){
					var con = $("#scbar_txt").val()
					
					if(con.length != 0){
						$("#zhut").text(con)
						$("#yhu").text(con)
						$("#searchTip").attr("style","display: ;width:218px; top:32px;")
						}else{
						$("#searchTip").attr("style","display:none ;width:218px; top:32px;")
							}
					}
				$("#scbar_form").submit(function(){
					$("#scbar_form").attr("action","<?=URL('bbs2.showshow','&key=')?>"+encodeURIComponent($("#scbar_txt").val()))
					})
				function sousuo(){
					location.href = "<?=URL('bbs2.showshow','&key=')?>"+encodeURIComponent($("#scbar_txt").val())
					}
			</script>
            <div style="display:none">
                <a href="index.php?m=bbs.user_search"><button name='12' value="搜索">用户</button></a>
                <a href="index.php?m=bbs.forum_search"><button name='12' value="搜索">帖子</button></a>
            </div>
        </div>
		
        <div class="cr"> </div>
        <ul id="scbar_type_menu" class="p_pop" style="display: none;">
            <li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
            <li><a href="javascript:;" rel="user">用户</a></li>
        </ul>
        
        <div class="cr"></div>
    </div>
    </div>
    <div style="clear:both;"></div>