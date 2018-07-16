<div class="clearfloat"></div>
<div class="footer">
    <div class="foot_con">
        <div class="foot_nav">
            <ul class="foot_nav_top">
                <?
                    $footer_list = DS('publics._get','','article_class',' parentid = 7 and classid != 26 and classid != 27');
                    //var_dump($footer_list);
                    if(!empty($footer_list)){
                        foreach($footer_list as $key => $val){
                ?>		
                    <li><a href="<?= !empty($val['classurl'])?$val['classurl']:'javascript:;'?>"><?= $val['classname']?></a></li>
                <?
                        }
                    }
                ?>
            </ul> 
            <div class="clearfloat"></div>
            <?
                $class_list = DS('publics._get','','article_class',' parentid = 7 limit 5');
                if(!empty($class_list)){
                    foreach($class_list as $klist => $vlist){
            ?>
            
                    <ul class="foot_nav_btm" <?= $klist == 4 ? 'style="margin:0"' : '';?>>
                    
            <?           $list = DS('publics._get','','article_class',' parentid = '.$vlist['classid'].' order by lmorder desc');
                        
                        if(!empty($list)){
                            foreach($list as $_key => $_val){
            ?>
                        <li><a href="<?= !empty($_val['classurl'])?$_val['classurl']:'javascript:;'?>" title="<?= $_val['classname']?>"><?php if(!empty($_val['pictureurl'])){?><img src="<?= $_val['pictureurl']?>" /><?php }?><?= $_val['classname']?></a></li> 
                
            <?
                            }
                        }
            ?>
                    </ul>
            <?
                    }
                }                 
            ?>
        </div>         
        <div class="foot_right">
  <?php 
  	$erweima = DS('publics._get','','ad','bid=1 and classid=4 order by lmorder asc limit 0,2');
  	if(!empty($erweima)){
		foreach($erweima as $ek =>$ev){
  ?>
            <div class="weixin">
                <span class="ewm_title"><?= $ev['title']?></span>
                <img src="<?= $ev['imgurl']?>" style="width:139px;height:139px"/>
            </div>
  <?php
		}
	}	
  ?> 
        </div>    
        <div class="clearfloat"></div>
        <style>
            .bottom a{ color:#818181}
        </style>
        <?php
            $link = DS("publics2.links","","1");
        ?>
        <div class="friend_link">
        <?php
        
            if(!empty($link)){
            ?>
            <span>友情链接：</span>
            <?php foreach($link as $lk => $lv){
            ?>
            <a href="<?= (empty($lv['http']) || $lv['http'] == 'http://')?'javascript:;':$lv['http']?>"><?= $lv['title']?></a>
            <?php }}?>
        </div>
        <div class="clearfloat"></div>
        <?php $site_contact = DS('publics.get_index','','site_contact');?>
        <div class="bottom"><p><?= $site_contact[0]["value"];?>　技术支持：<a target="_blank" href="http://vi163.com">北方互动</a></p></div>
    </div>
	<!--乐语OMS客服版代码-->
<script type="text/javascript" src="http://lead.soperson.com/20000714/10050696.js"></script>


<!--百度分享代码开始-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"4","bdPos":"left","bdTop":"100"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<!--百度分享代码结束-->

</div>

