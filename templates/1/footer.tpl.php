<!--footer-->
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
                    
            <?           $list = DS('publics._get','','article_class',' parentid = '.$vlist['classid']);
                        
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
            <div class="weixin">
                <span class="ewm_title">微信二维码：</span>
                <img src="images/weixin.jpg" style="width:139px;height:139px"/>
            </div>
            <div class="weixin">
                <span class="ewm_title">新浪二维码：</span>
                <img src="images/xinlang.jpg" style="width:139px;height:139px"/>
            </div>
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
        <!--<div class="bottom"><p>公告京ICP备09096283&nbsp;&nbsp;Copyright©2014学啊版权所有<span>技术支持：北方互动</span></p></div>-->
        <div class="bottom"><?= $site_contact[0]["value"];?>技术支持：<a target="_blank" href="http://vi163.com">北方互动</a></div>
    </div>
</div>
<!--footer--end-->
</div>
</body>
</html>
